<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

use Paysera\DeliveryApi\MerchantClient\Entity\Address;
use Paysera\DeliveryApi\MerchantClient\Entity\Contact;
use Paysera\DeliveryApi\MerchantClient\Entity\OrderCreate;
use Paysera\DeliveryApi\MerchantClient\Entity\Party;
use Paysera\DeliveryApi\MerchantClient\Entity\ShipmentCreate;
use Exception;

class PayseraDeliveryAdmin
{
    public const TAB_GENERAL_SETTINGS = 'general_settings';
    public const TAB_DELIVERY_GATEWAYS_LIST_SETTINGS = 'delivery_gateways_list_settings';

    private $payseraAdminHtml;
    private $payseraDeliveryAdminHtml;
    private $payseraDeliveryLibraryHelper;
    private $payseraDeliverySettings;
    private $payseraDeliveryActions;
    private $payseraDeliveryHelper;
    private $tab;
    private $tabs;

    public function __construct()
    {
        $this->payseraAdminHtml = new PayseraAdminHtml();
        $this->payseraDeliveryAdminHtml = new PayseraDeliveryAdminHtml();
        $this->payseraDeliveryLibraryHelper = new PayseraDeliveryLibraryHelper();
        $this->payseraDeliverySettings = new PayseraDeliverySettings();
        $this->payseraDeliveryActions = new PayseraDeliveryActions();
        $this->payseraDeliveryHelper = new PayseraDeliveryHelper();
        $this->tab = self::TAB_GENERAL_SETTINGS;
        $this->tabs = [
            self::TAB_GENERAL_SETTINGS,
            self::TAB_DELIVERY_GATEWAYS_LIST_SETTINGS,
        ];
    }

    public function build(): void
    {
        add_action('admin_init', [$this, 'settingsInit']);
        add_action('woocommerce_checkout_order_processed', [$this, 'createDeliveryOrder'], 1, 1);
    }

    public function settingsInit(): void
    {
        if (array_key_exists('tab', $_GET) === true) {
            $this->tab = $_GET['tab'];
        }

        if (in_array($this->tab, $this->tabs) === false) {
            $this->tab = self::TAB_GENERAL_SETTINGS;
        }

        add_settings_section(
            'paysera_delivery_section',
            null,
            [$this, 'payseraDeliverySettingsSectionCallback'],
            PayseraDeliverySettings::SETTINGS_NAME
        );

        register_setting(PayseraDeliverySettings::SETTINGS_NAME, PayseraDeliverySettings::SETTINGS_NAME);

        if ($this->tab === self::TAB_GENERAL_SETTINGS) {
            add_settings_field(
                'paysera_delivery_project_id',
                __('Project ID', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'projectIdRender'],
                PayseraDeliverySettings::SETTINGS_NAME,
                'paysera_delivery_section'
            );
            add_settings_field(
                'paysera_delivery_project_password',
                __('Project password', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'projectPasswordRender'],
                PayseraDeliverySettings::SETTINGS_NAME,
                'paysera_delivery_section'
            );
            add_settings_field(
                'paysera_delivery_test_mode',
                __('Test mode', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'testModeRender'],
                PayseraDeliverySettings::SETTINGS_NAME,
                'paysera_delivery_section'
            );
            add_settings_field(
                'paysera_delivery_house_number_field',
                __('House number field', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'houseNumberFieldRender'],
                PayseraDeliverySettings::SETTINGS_NAME,
                'paysera_delivery_section'
            );
        } elseif ($this->tab === self::TAB_DELIVERY_GATEWAYS_LIST_SETTINGS) {
            add_settings_field(
                'paysera_delivery_gateways',
                __('Delivery Gateways', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'buildDeliveryGatewaysList'],
                PayseraDeliverySettings::SETTINGS_NAME,
                'paysera_delivery_section'
            );
        }
    }

    public function buildSettings(): void
    {
        if (isset($_REQUEST['settings-updated'])) {
            printf($this->payseraAdminHtml->getSettingsSavedMessage());
        }

        $this->payseraDeliveryAdminHtml->buildDeliverySettings(
            $_GET['tab'] ?? $this->tab,
            $this->payseraDeliverySettings->getDeliveryPluginSettings()->getProjectId()
        );
    }

    public function payseraDeliverySettingsSectionCallback(): void
    {
    }

    public function projectIdRender(): void
    {
        printf(
            $this->payseraAdminHtml->getNumberInput(),
            esc_attr(PayseraDeliverySettings::SETTINGS_NAME . '[' . PayseraDeliverySettings::PROJECT_ID . ']'),
            esc_attr($this->payseraDeliverySettings->getDeliveryPluginSettings()->getProjectId())
        );
    }

    public function projectPasswordRender(): void
    {
        printf(
            $this->payseraAdminHtml->getTextInput(),
            esc_attr(PayseraDeliverySettings::SETTINGS_NAME . '[' . PayseraDeliverySettings::PROJECT_PASSWORD . ']'),
            esc_attr($this->payseraDeliverySettings->getDeliveryPluginSettings()->getProjectPassword())
        );
    }

    public function testModeRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraDeliverySettings::SETTINGS_NAME . '[' . PayseraDeliverySettings::TEST_MODE . ']',
                $this->payseraDeliverySettings->getDeliveryPluginSettings()->isTestModeEnabled() === true
                    ? 'yes' : 'no'
            )
        );
    }

    public function houseNumberFieldRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraDeliverySettings::SETTINGS_NAME . '[' . PayseraDeliverySettings::HOUSE_NUMBER_FIELD . ']',
                $this->payseraDeliverySettings->getDeliveryPluginSettings()->isHouseNumberFieldEnabled() === true
                    ? 'yes' : 'no'
            )
        );
    }

    public function buildDeliveryGatewaysList(): void
    {
        $deliveryGateways = $this->payseraDeliveryLibraryHelper->getPayseraDeliveryGateways();

        $this->payseraDeliveryActions->setDeliveryGatewayTitles($deliveryGateways);
        $this->payseraDeliveryActions->reSyncDeliveryGatewayStatus($deliveryGateways);
        $this->payseraDeliveryActions->syncShipmentMethodsStatus(
            $this->payseraDeliveryLibraryHelper->getPayseraShipmentMethods()
        );

        if (empty($deliveryGateways) === false) {
            printf(
                $this->payseraDeliveryAdminHtml->buildDeliveryGatewaysHtml(
                    $deliveryGateways,
                    get_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME)
                )
            );
        } else {
            printf(
                sprintf(
                    "<strong style='%s'>%s</strong>",
                    'color: red',
                    __('Either project id or project password is incorrect', PayseraPaths::PAYSERA_TRANSLATIONS)
                )
            );
        }
    }

    public function createDeliveryOrder(?string $orderId): void
    {
        $pluginSettings = $this->payseraDeliverySettings->getDeliveryPluginSettings();

        if ($orderId === null || $pluginSettings->isTestModeEnabled() === true) {
            return;
        }

        $order = wc_get_order($orderId);

        $deliveryGatewayCode = '';

        if (empty($order->get_shipping_methods()) === true) {
            return;
        }

        foreach ($order->get_shipping_methods() as $shippingMethod) {
            $deliveryGatewayCode = $shippingMethod->get_data()['method_id'];

            if ($this->payseraDeliveryHelper->isPayseraDeliveryGateway($deliveryGatewayCode) === false) {
                return;
            }
        }

        $shipments = [];

        foreach ($order->get_items() as $item) {
            $quantity = $item->get_data()['quantity'];
            $productId = $item->get_data()['product_id'];

            $productInfo = wc_get_product($productId);

            for ($productQuantity = 1; $productQuantity <= $quantity; $productQuantity++) {
                $shipments[] = (new ShipmentCreate())
                    ->setWeight((int) (($productInfo->get_weight() ?? 0) * 1000))
                    ->setLength((int) (($productInfo->get_length() ?? 0) * 10))
                    ->setWidth((int) (($productInfo->get_width() ?? 0) * 10))
                    ->setHeight((int) (($productInfo->get_height() ?? 0) * 10))
                ;
            }
        }

        $deliveryGatewaySettings = $this->payseraDeliverySettings->getDeliveryGatewaySettings($deliveryGatewayCode);

        $receiverParty = (new Party())
            ->setTitle($order->get_billing_first_name() . ' ' . $order->get_billing_last_name())
            ->setEmail($order->get_billing_email())
            ->setPhone($order->get_billing_phone())
        ;

        $receiverAddress = (new Address())
            ->setCountry($order->get_shipping_country())
            ->setState($order->get_shipping_state())
            ->setCity($order->get_shipping_city())
            ->setStreet($order->get_shipping_address_1())
            ->setPostalCode($order->get_shipping_postcode())
        ;

        if (WC()->session->get('shipping_house_no') !== '') {
            $receiverAddress->setHouseNumber(WC()->session->get('shipping_house_no'));
        } elseif (WC()->session->get('billing_house_no') !== '') {
            $receiverAddress->setHouseNumber(WC()->session->get('billing_house_no'));
        }

        $orderCreate = (new OrderCreate())
            ->setShipmentGatewayCode($this->payseraDeliveryHelper->resolveDeliveryGatewayCode($deliveryGatewayCode))
            ->setShipmentMethodCode(
                $deliveryGatewaySettings->getSenderType() . '2' . $deliveryGatewaySettings->getReceiverType()
            )
            ->setShipments($shipments)
            ->setReceiver(
                $this->payseraDeliveryLibraryHelper->createOrderParty(
                    $deliveryGatewaySettings->getReceiverType(),
                    'receiver',
                    (new Contact())->setParty($receiverParty)->setAddress($receiverAddress)
                )
            )
        ;

        if ($pluginSettings->getResolvedProjectId() !== null) {
            $orderCreate->setProjectId($pluginSettings->getResolvedProjectId());
        }

        $merchantClient = $this->payseraDeliveryLibraryHelper->getMerchantClient();

        if ($merchantClient === null) {
            return;
        }

        if ($deliveryGatewaySettings->getReceiverType() === PayseraDeliverySettings::TYPE_PARCEL_MACHINE) {
            $order->add_order_note(
                $this->payseraDeliveryLibraryHelper->formatSelectedTerminalNote(
                    WC()->session->get('paysera_terminal_country'),
                    WC()->session->get('paysera_terminal_city'),
                    $this->payseraDeliveryHelper->resolveDeliveryGatewayCode($deliveryGatewayCode),
                    WC()->session->get('terminal')
                )
            );
        }

        try {
            $orderNumber = $merchantClient->createOrder($orderCreate)->getNumber();
        } catch (Exception $exception) {
            $errorMessage = $exception->getResponse()->getBody()->getContents();
            error_log(PayseraDeliveryLibraryHelper::PAYSERA_DELIVERY_EXCEPTION_TEXT . $errorMessage);

            $order->add_order_note(
                __(
                    PayseraPaths::PAYSERA_MESSAGE . 'Delivery order creation failed, please create order manually in Paysera system',
                    PayseraPaths::PAYSERA_TRANSLATIONS
                ) . '<br>' . __('Error:', PayseraPaths::PAYSERA_TRANSLATIONS) . '<br>' . $errorMessage
            );

            return;
        }

        $order->add_order_note(
            sprintf(
                __(PayseraPaths::PAYSERA_MESSAGE . 'Delivery order created - %s', PayseraPaths::PAYSERA_TRANSLATIONS),
                $orderNumber
            )
        );
    }
}
