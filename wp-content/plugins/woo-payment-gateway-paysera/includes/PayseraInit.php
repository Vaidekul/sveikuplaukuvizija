<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

use WC_Shipping_Rate;

class PayseraInit
{
    private $paymentPluginSettings;
    private $payseraDeliveryHelper;
    private $payseraDeliverySettings;
    private $payseraDeliveryLibraryHelper;
    private $payseraDeliveryAdminHtml;
    private $notices;
    private $errors;

    public function __construct()
    {
        $this->paymentPluginSettings = (new PayseraPaymentSettings())->getPaymentPluginSettings();
        $this->payseraDeliveryHelper = new PayseraDeliveryHelper();
        $this->payseraDeliverySettings = new PayseraDeliverySettings();
        $this->payseraDeliveryLibraryHelper = new PayseraDeliveryLibraryHelper();
        $this->payseraDeliveryAdminHtml = new PayseraDeliveryAdminHtml();
        $this->notices = [];
        $this->errors = [];
    }

    public function build()
    {
        add_action('plugins_loaded', [$this, 'loadPayseraPlugin']);
        add_action('admin_notices', [$this, 'displayAdminErrors']);
        add_action('admin_notices', [$this, 'displayAdminNotices']);
        add_filter('woocommerce_payment_gateways', [$this, 'registerPaymentGateway']);
        add_filter('plugin_action_links_' . PayseraPluginPath . '/paysera.php', [$this, 'addPayseraPluginActionLinks']);
        add_action('wp_head', [$this, 'addMetaTags']);
        add_action('wp_head', [$this, 'addQualitySign']);
        add_filter('woocommerce_shipping_methods', [$this, 'registerDeliveryGateways']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_filter('woocommerce_cart_shipping_method_full_label', [$this, 'deliveryGatewayLogos'], PHP_INT_MAX, 2);
    }

    public function loadPayseraPlugin(): bool
    {
        load_plugin_textdomain(PayseraPaths::PAYSERA_TRANSLATIONS, false, PayseraPluginPath . '/languages/');

        if (class_exists('woocommerce') === false) {
            $this->addError(__('WooCommerce is not active', PayseraPaths::PAYSERA_TRANSLATIONS));
            return false;
        }

        if ($this->payseraDeliverySettings->getDeliveryPluginSettings()->getProjectId() === null) {
            $notice = sprintf(__(
                'NEW! With the latest version, you can integrate delivery options into your e-shop. More about the %s ',
                PayseraPaths::PAYSERA_TRANSLATIONS
            ),
                '<a href="' . admin_url(PayseraPaths::PAYSERA_ADMIN_SETTINGS_LINK) . ' "> '
                . __('Plugin & Services.', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>'
            );
            $this->addNotice($notice);
        }

        $payseraPlugins = $this->getPayseraPlugins();

        if (empty($payseraPlugins) === false) {
            if (count($payseraPlugins) > 1) {
                $this->addNotice(__('More than 1 Paysera plugin active', PayseraPaths::PAYSERA_TRANSLATIONS));
            }
        }

        return true;
    }

    public function displayAdminErrors(): void
    {
        if (empty($this->errors) === false) {
            foreach ($this->errors as $error) {
                echo wp_kses(
                    '<div class="error"><p><b>'
                    . __('Paysera Payment And Delivery', PayseraPaths::PAYSERA_TRANSLATIONS) . ': </b><br>'
                    . $error . '</p></div>',
                    ['div' => ['class' => []], 'p' => [], 'b' => [], 'br' => [], 'a' => ['href' => []]]
                );
            }
        }
    }

    public function displayAdminNotices(): void
    {
        if (empty($this->notices) === false) {
            foreach ($this->notices as $notice) {
                echo wp_kses(
                    '<div class="notice notice-info is-dismissible"><p><b>'
                    . __('Paysera Payment And Delivery', PayseraPaths::PAYSERA_TRANSLATIONS) . ': </b><br>'
                    . $notice . '</p></div>',
                    ['div' => ['class' => []], 'p' => [], 'b' => [], 'br' => [], 'a' => ['href' => []]]
                );
            }
        }
    }

    public function registerPaymentGateway(array $methods): array
    {
        require_once 'Entity/class-paysera-payment-gateway.php';

        $methods[] = 'Paysera_Payment_Gateway';

        return $methods;
    }

    public function addPayseraPluginActionLinks(array $links): array
    {
        wp_enqueue_style('paysera-payment-style', PayseraPaths::PAYSERA_PAYMENT_STYLESHEET);

        $documentationLink = '<a href="' . PayseraPaths::PAYSERA_DOCUMENTATION_LINK . '" target="_blank">'
            . __('Documentation', PayseraPaths::PAYSERA_TRANSLATIONS) .'</a>'
        ;

        if (class_exists('woocommerce') === true) {
            $settingsLink = '<a href="' . admin_url(PayseraPaths::PAYSERA_ADMIN_SETTINGS_LINK) . '">'
                . __('Settings', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>'
            ;
        } else {
            $settingsLink = '<a class="paysera-delivery-error-link" ">'
                . __('WooCommerce is not active', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>'
            ;
        }

        array_unshift($links, $settingsLink, $documentationLink);

        return $links;
    }

    public function addMetaTags(): void
    {
        if (
            $this->paymentPluginSettings->isOwnershipCodeEnabled() === true
            && (
                $this->paymentPluginSettings->getOwnershipCode() !== null
                && $this->paymentPluginSettings->getOwnershipCode() !== ''
            )
        ) {
            echo wp_kses(
                '<meta name="verify-paysera" content="' . $this->paymentPluginSettings->getOwnershipCode() . '">',
                ['meta' => ['name' => [], 'content' => []]]
            );
        }
    }

    public function addQualitySign(): void
    {
        if (
            $this->paymentPluginSettings->isQualitySignEnabled() === true
            && $this->paymentPluginSettings->getProjectId() !== null
        ) {
            $this->addQualitySignScript($this->paymentPluginSettings->getProjectId());
        }
    }

    public function registerDeliveryGateways(array $methods): array
    {
        $settings = $this->payseraDeliverySettings->getDeliveryPluginSettings();

        foreach ($settings->getDeliveryGateways() as $deliveryGateway => $isEnabled) {
            if ($isEnabled === false) {
                continue;
            }

            foreach (PayseraDeliverySettings::DELIVERY_GATEWAY_TYPE_MAP as $deliveryGatewayType) {
                if (
                    $this->isDeliveryGatewayShippingMethodAllowed(
                        $settings->getShipmentMethods(),
                        $deliveryGateway,
                        $deliveryGatewayType
                    )
                ) {
                    require_once 'Entity/class-paysera-' . $deliveryGateway . '-' . $deliveryGatewayType . '-delivery.php';

                    $methods['paysera_delivery_' . $deliveryGateway . '_' . $deliveryGatewayType] =
                        'Paysera_' . ucfirst($deliveryGateway) . '_' . ucfirst($deliveryGatewayType) . '_Delivery'
                    ;
                }
            }
        }

        return $methods;
    }

    public function enqueueScripts(): void
    {
        wp_enqueue_style('select2-css', PayseraPaths::SELECT_2_CSS);
        wp_enqueue_script('select2-js', PayseraPaths::SELECT_2_JS, ['jquery']);
        wp_enqueue_script('paysera-delivery-frontend-js', PayseraPaths::PAYSERA_DELIVERY_FRONTEND_JS, ['jquery']);
        wp_register_script(
            'paysera-delivery-frontend-ajax-js',
            PayseraPaths::PAYSERA_DELIVERY_FRONTEND_AJAX_JS,
            [],
            false,
            true
        );
        wp_enqueue_script('paysera-delivery-frontend-ajax-js');
        wp_localize_script(
            'paysera-delivery-frontend-ajax-js',
            'ajax_object',
            ['ajaxurl' => admin_url('admin-ajax.php')]
        );
    }

    public function deliveryGatewayLogos(string $label, WC_Shipping_Rate $shippingRate): string
    {
        $deliveryGateways = $this->payseraDeliveryLibraryHelper->getPayseraDeliveryGateways();

        foreach ($deliveryGateways as $deliveryGateway) {
            if (
                $shippingRate->get_method_id() === PayseraDeliverySettings::DELIVERY_GATEWAY_PREFIX
                . $deliveryGateway->getCode() . '_courier:' . $shippingRate->get_instance_id()
                ||
                $shippingRate->get_method_id() === PayseraDeliverySettings::DELIVERY_GATEWAY_PREFIX
                . $deliveryGateway->getCode() . '_terminals:' . $shippingRate->get_instance_id()
            ) {
                $label .= '<br>'
                    . $this->payseraDeliveryAdminHtml->generateDeliveryGatewayLogoHtml($deliveryGateway, true)
                ;
            }
        }

        return $label;
    }

    private function getPayseraPlugins(): array
    {
        $plugins = [];

        foreach (get_option('active_plugins') as $activePlugin) {
            if (strpos($activePlugin, 'paysera') !== false) {
                $plugins[] = $activePlugin;
            }
        }

        return $plugins;
    }

    private function addError(string $errorText): self
    {
        $this->errors[] = __($errorText, PayseraPaths::PAYSERA_TRANSLATIONS);

        return $this;
    }

    private function addNotice(string $noticeText): self
    {
        $this->notices[] = __($noticeText, PayseraPaths::PAYSERA_TRANSLATIONS);

        return $this;
    }

    private function addQualitySignScript(int $projectId): void
    {
        wp_enqueue_script('quality-sign-js', PayseraPaths::PAYSERA_PAYMENT_QUALITY_SIGN_JS, ['jquery']);
        wp_localize_script(
            'quality-sign-js',
            'data',
            [
                'project_id' => $projectId,
                'language'=> explode('_', get_locale())[0],
            ]
        );
    }

    private function isDeliveryGatewayShippingMethodAllowed(
        array $shipmentMethods,
        string $deliveryGateway,
        string $deliveryGatewayType
    ): bool {
        if (
            (
                (
                    $shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_COURIER_2_COURIER] === true
                    || $shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_PARCEL_MACHINE_2_COURIER] === true
                ) && $deliveryGatewayType === PayseraDeliverySettings::TYPE_COURIER
            )
            ||
            (
                (
                    $shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_COURIER_2_PARCEL_MACHINE] === true
                    || $shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_PARCEL_MACHINE_2_PARCEL_MACHINE] === true
                ) && $deliveryGatewayType === PayseraDeliverySettings::TYPE_TERMINALS
            )
        ) {
            if (
                $this->payseraDeliveryHelper->deliveryGatewayClassExists(
                    $deliveryGateway,
                    $deliveryGatewayType
                ) === false
            ) {
                $this->createDeliveryClass($deliveryGateway, $deliveryGatewayType);
            }

            return true;
        }

        return false;
    }

    private function createDeliveryClass(string $deliveryGateway, string $deliveryGatewayType): void
    {
        $deliveryClass = 'Paysera_' . ucfirst($deliveryGateway) . '_' . ucfirst($deliveryGatewayType) . '_Delivery';

        $description = '%s courier will deliver the parcel to the selected parcel terminal for customer to pickup any time.';

        if ($deliveryGatewayType === PayseraDeliverySettings::TYPE_COURIER) {
            $description = "%s courier will deliver the parcel right to the customer\'s hands.";
        }

        $receiverType = $deliveryGatewayType === PayseraDeliverySettings::TYPE_COURIER ?
            PayseraDeliverySettings::TYPE_COURIER : PayseraDeliverySettings::TYPE_PARCEL_MACHINE
        ;

        $deliveryGatewayTitles = $this->payseraDeliverySettings->getDeliveryPluginSettings()->getDeliveryGatewayTitles();
        $deliveryGatewayTitle = $deliveryGatewayTitles[$deliveryGateway] . ' '
            . __(ucfirst($deliveryGatewayType), PayseraPaths::PAYSERA_TRANSLATIONS)
        ;

        $classCode = '<?php

defined(\'ABSPATH\') or exit;

if (class_exists(\'Paysera_Delivery_Gateway\') === false) {
    require_once \'abstract-paysera-delivery-gateway.php\';
}

class ' . $deliveryClass . ' extends Paysera_Delivery_Gateway
{
    public $deliveryGatewayCode = \'' . $deliveryGateway . '_' . $deliveryGatewayType  . '\';
    public $defaultTitle = \'' . $deliveryGatewayTitle . '\';
    public $receiverType = \'' . $receiverType . '\';
    public $defaultDescription = \'' . $description . '\'; 
}
';

        file_put_contents(
            plugin_dir_path(__FILE__) . 'Entity/class-paysera-'
            . $deliveryGateway . '-' . $deliveryGatewayType . '-delivery.php',
            $classCode
        );
    }
}
