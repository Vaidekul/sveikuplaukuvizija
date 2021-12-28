<?php

declare(strict_types=1);

namespace Paysera\Includes;

use WP_Error;

defined('ABSPATH') or exit;

class PayseraDeliveryFrontHtml
{
    private $payseraDeliveryLibraryHelper;
    private $payseraDeliveryHelper;
    private $payseraDeliverySettings;

    public function __construct()
    {
        $this->payseraDeliveryLibraryHelper = new PayseraDeliveryLibraryHelper();
        $this->payseraDeliveryHelper = new PayseraDeliveryHelper();
        $this->payseraDeliverySettings = new PayseraDeliverySettings();
    }

    public function build(): void
    {
        add_action('woocommerce_review_order_before_payment', [$this, 'terminalLocationSelection']);
        add_action('woocommerce_checkout_process', [$this, 'checkoutFieldProcess']);
        add_action('woocommerce_after_checkout_validation', [$this, 'validateWeight'], 9999, 2);
        add_action('wp_ajax_change_paysera_method', [$this, 'changePayseraMethod']);
        add_action('wp_ajax_nopriv_change_paysera_method', [$this, 'changePayseraMethod']);
        add_action('wp_ajax_change_paysera_country', [$this, 'changePayseraCountry']);
        add_action('wp_ajax_nopriv_change_paysera_country', [$this, 'changePayseraCountry']);
        add_action('wp_ajax_change_paysera_city', [$this, 'changePayseraCity']);
        add_action('wp_ajax_nopriv_change_paysera_city', [$this, 'changePayseraCity']);
        add_action('woocommerce_after_checkout_validation', [$this, 'validateTerminalLocationField'], 9999, 2);
        add_filter('woocommerce_checkout_fields', [$this, 'addRequiredHouseField']);
    }

    public function addRequiredHouseField(array $fields): array
    {
        $pluginSettings = $this->payseraDeliverySettings->getDeliveryPluginSettings();

        if ($pluginSettings->isHouseNumberFieldEnabled() === true) {
            $fields['billing']['billing_house_no'] = [
                'label' => __('House Number', PayseraPaths::PAYSERA_TRANSLATIONS),
                'placeholder' => __('House Number', PayseraPaths::PAYSERA_TRANSLATIONS),
                'priority' => 51,
                'required' => true,
                'clear' => true
            ];

            $fields['shipping']['shipping_house_no'] = [
                'label' => __('House Number', PayseraPaths::PAYSERA_TRANSLATIONS),
                'placeholder'  => __('House Number', PayseraPaths::PAYSERA_TRANSLATIONS),
                'priority' => 51,
                'required' => true,
                'clear' => true
            ];
        }

        return $fields;
    }

    public function validateTerminalLocationField(array $fields, WP_Error $error): void
    {
        $deliveryGatewayCode = '';

        foreach ($_POST['shipping_method'] as $method) {
            if ($this->payseraDeliveryHelper->isPayseraDeliveryGateway($method) === false) {
                return;
            }

            $deliveryGatewayCode = $method;
        }

        $receiverType = $this->payseraDeliverySettings->getDeliveryGatewaySettings($deliveryGatewayCode)
            ->getReceiverType()
        ;

        if (
            ($receiverType === PayseraDeliverySettings::TYPE_PARCEL_MACHINE)
            && (!isset($_POST['paysera_terminal']) || $_POST['paysera_terminal'] === 'default')
        ) {
            $error->add('validation', __('Please select the terminal location', PayseraPaths::PAYSERA_TRANSLATIONS));
        }
    }

    public function changePayseraMethod(): void
    {
        $countries = [];

        $countries['default'] = __('Please select the country', PayseraPaths::PAYSERA_TRANSLATIONS);

        foreach ($this->payseraDeliveryLibraryHelper->getPayseraCountries(
            $this->payseraDeliveryHelper->resolveDeliveryGatewayCode($_POST['shipping_method'])
        ) as $countryCode => $country) {
            $countries[$countryCode] = $country;
        }

        printf(json_encode($countries));

        wp_die();
    }

    public function changePayseraCountry(): void
    {
        $cities = [];

        $cities['default'] = __('Please select the city/municipality', PayseraPaths::PAYSERA_TRANSLATIONS);

        foreach ($this->payseraDeliveryLibraryHelper->getPayseraCities(
            $_POST['country'],
            $this->payseraDeliveryHelper->resolveDeliveryGatewayCode($_POST['shipping_method'])
        ) as $city) {
            $cities[$city] = $city;
        }

        printf(json_encode($cities));

        wp_die();
    }

    public function changePayseraCity(): void
    {
        $parcelMachines = $this->payseraDeliveryLibraryHelper->getParcelMachinesLocations(
            $_POST['country'],
            $_POST['city'],
            $this->payseraDeliveryHelper->resolveDeliveryGatewayCode($_POST['shipping_method'])
        );

        $parcelMachines['default'] = __('Please select the terminal location', PayseraPaths::PAYSERA_TRANSLATIONS);

        printf(json_encode($parcelMachines));

        wp_die();
    }

    public function validateWeight(array $fields, WP_Error $error): void
    {
        $chosenMethods = WC()->session->get('chosen_shipping_methods');

        if (empty($chosenMethods) === true || $chosenMethods[0] === false) {
            return;
        }

        foreach ($chosenMethods as $method) {
            if ($this->payseraDeliveryHelper->isPayseraDeliveryGateway($method) === false) {
                return;
            }
        }

        $deliveryGatewayTitle = $this->payseraDeliverySettings->getDeliveryPluginSettings()
            ->getDeliveryGatewayTitles()[$this->payseraDeliveryHelper->resolveDeliveryGatewayCode($chosenMethods[0])]
        ;
        $deliveryGatewaySettings = $this->payseraDeliverySettings->getDeliveryGatewaySettings($chosenMethods[0]);

        $minimumWeight = $deliveryGatewaySettings->getMinimumWeight();
        $maximumWeight = $deliveryGatewaySettings->getMaximumWeight();

        $totalWeight = 0;

        foreach (WC()->shipping->get_packages()[0]['contents'] as $product) {
            $totalWeight += (float) wc_get_product($product['product_id'])->get_weight() * $product['quantity'];
        }

        if ($totalWeight > $maximumWeight) {
            $message = sprintf(
                __('Sorry, %d kg exceeds the maximum weight of %d kg for %s', PayseraPaths::PAYSERA_TRANSLATIONS),
                $totalWeight,
                $maximumWeight,
                $deliveryGatewayTitle
            );

            $error->add('validation', __($message, PayseraPaths::PAYSERA_TRANSLATIONS));
        }

        if ($totalWeight < $minimumWeight) {
            $message = sprintf(
                __(
                    'Sorry, %d kg is not enough for the minimum weight of %d kg for %s',
                    PayseraPaths::PAYSERA_TRANSLATIONS
                ),
                $totalWeight,
                $minimumWeight,
                $deliveryGatewayTitle
            );

            $error->add('validation', __($message, PayseraPaths::PAYSERA_TRANSLATIONS));
        }
    }

    public function checkoutFieldProcess(): void
    {
        if (isset($_POST['paysera_city'])) {
            WC()->session->set('paysera_terminal_city', $_POST['paysera_city']);
        }

        if (isset($_POST['paysera_country'])) {
            WC()->session->set('paysera_terminal_country', $_POST['paysera_country']);
        }

        if (isset($_POST['paysera_terminal'])) {
            WC()->session->set('terminal', $_POST['paysera_terminal']);
        }

        if (isset($_POST['billing_house_no']) && isset($_POST['shipping_house_no'])) {
            WC()->session->set('billing_house_no', $_POST['billing_house_no']);
            WC()->session->set('shipping_house_no', $_POST['shipping_house_no']);
        }
    }

    public function terminalLocationSelection(): void
    {
        wp_enqueue_style('paysera-frontend-style', PayseraPaths::PAYSERA_DELIVERY_STYLESHEET);

        printf(
            $this->createSelectField(
                'paysera-delivery-terminal-country',
                'Terminal country',
                'paysera_country',
                'Please select the country'
            )
            . $this->createSelectField(
                'paysera-delivery-terminal-city',
                'Terminal city',
                'paysera_city',
                'Please select the city/municipality'
            )
            . $this->createSelectField(
                'paysera-delivery-terminal-location',
                'Terminal location',
                'paysera_terminal',
                'Please select the terminal location'
            )
        );
    }

    private function createSelectField(
        string $className,
        string $label,
        string $selectionName,
        string $defaultOption
    ): string {
        return '<div class="' . $className . ' paysera-delivery-terminal">'
        . '<span>' . __($label, PayseraPaths::PAYSERA_TRANSLATIONS)
        . ' <span class="paysera-delivery-required">*</span></span>'
        . '<select class="' . $className . '-selection" name="' . $selectionName . '">'
        . '<option value="default">' . __($defaultOption, PayseraPaths::PAYSERA_TRANSLATIONS) . '</option>'
        . '</select></div>';
    }
}
