<?php

declare(strict_types=1);

defined('ABSPATH') or exit;

use Paysera\Includes\PayseraDeliveryActions;
use Paysera\Includes\PayseraDeliverySettings;
use Paysera\Includes\PayseraPaths;

abstract class Paysera_Delivery_Gateway extends WC_Shipping_Method
{
    /**
     * @var string
     */
    public $deliveryGatewayCode;

    /**
     * @var string
     */
    public $defaultTitle;

    /**
     * @var string
     */
    public $receiverType;

    /**
     * @var string
     */
    public $defaultDescription;

    private $payseraDeliveryActions;
    private $payseraDeliverySettings;

    public function __construct($instance_id = 0)
    {
        parent::__construct();

        $this->payseraDeliveryActions = new PayseraDeliveryActions();
        $this->payseraDeliverySettings = new PayseraDeliverySettings();

        $this->id = $this->generateId(absint($instance_id));
        $this->instance_id = absint($instance_id);
        $this->title = $this->defaultTitle;
        $this->method_title = $this->defaultTitle;
        $this->method_description = $this->buildMethodDescription();

        $this->init_form_fields();
        $this->init_settings();

        $this->title = $this->get_option('title');

        $this->payseraDeliveryActions->changeDeliveryGatewayReceiverType($this->id, $this->receiverType);

        $this->supports = [
            'shipping-zones',
            'instance-settings',
            'instance-settings-modal',
        ];

        add_action('woocommerce_update_options_shipping_' . $this->id, [$this, 'process_admin_options']);
    }

    public function calculate_shipping($package = [])
    {
        $rate = [
            'id' => $this->id,
            'label' => $this->title,
            'cost' => $this->instance_settings[PayseraDeliverySettings::FEE],
        ];

        $freeDeliveryLimit = $this->instance_settings[PayseraDeliverySettings::FREE_DELIVERY_LIMIT];

        if ($freeDeliveryLimit > 0 && WC()->cart->get_displayed_subtotal() > $freeDeliveryLimit) {
            $rate['cost'] = 0;
        }

        $this->add_rate($rate);
    }

    public function init_form_fields(): void
    {
        $this->instance_form_fields = [
            'title' => [
                'title' => __('Method title', PayseraPaths::PAYSERA_TRANSLATIONS),
                'type' => 'text',
                'description' =>
                    __(
                        'This controls the title which the user sees during shipping selection.',
                        PayseraPaths::PAYSERA_TRANSLATIONS
                    ),
                'default' => $this->defaultTitle,
                'desc_tip' => true,
            ],
            PayseraDeliverySettings::FEE => [
                'title' => __('Delivery Fee', PayseraPaths::PAYSERA_TRANSLATIONS),
                'type' => 'price',
                'default' => PayseraDeliverySettings::DEFAULT_FEE,
                'placeholder' => wc_format_localized_price(PayseraDeliverySettings::DEFAULT_FEE),
                'description' => get_woocommerce_currency_symbol(),
                'desc_tip' => true,
            ],
            PayseraDeliverySettings::MINIMUM_WEIGHT => [
                'title' => __('Minimum weight', PayseraPaths::PAYSERA_TRANSLATIONS),
                'type' => 'price',
                'default' => PayseraDeliverySettings::DEFAULT_MINIMUM_WEIGHT,
                'placeholder' => wc_format_localized_price(PayseraDeliverySettings::DEFAULT_MINIMUM_WEIGHT),
                'description' => __('Kilograms', PayseraPaths::PAYSERA_TRANSLATIONS),
                'desc_tip' => true,
            ],
            PayseraDeliverySettings::MAXIMUM_WEIGHT => [
                'title' => __('Maximum weight', PayseraPaths::PAYSERA_TRANSLATIONS),
                'type' => 'price',
                'default' => PayseraDeliverySettings::DEFAULT_MAXIMUM_WEIGHT,
                'placeholder' => wc_format_localized_price(PayseraDeliverySettings::DEFAULT_MAXIMUM_WEIGHT),
                'description' => __('Kilograms', PayseraPaths::PAYSERA_TRANSLATIONS),
                'desc_tip' => true,
            ],
            PayseraDeliverySettings::SENDER_TYPE => [
                'title' => __('Preferred pickup type', PayseraPaths::PAYSERA_TRANSLATIONS),
                'type' => 'select',
                'class' => 'wc-enhanced-select',
                'default' => PayseraDeliverySettings::TYPE_COURIER,
                'options' => $this->getSenderTypeOptions(),
            ],
            PayseraDeliverySettings::FREE_DELIVERY_LIMIT => [
                'title' => __('Minimum order amount for free shipping', PayseraPaths::PAYSERA_TRANSLATIONS),
                'type' => 'price',
                'placeholder' => wc_format_localized_price(PayseraDeliverySettings::DEFAULT_FREE_DELIVERY_LIMIT),
                'description' => __(
                    'Users will need to spend this amount to get free shipping.',
                    PayseraPaths::PAYSERA_TRANSLATIONS
                ),
                'default' => PayseraDeliverySettings::DEFAULT_FREE_DELIVERY_LIMIT,
                'desc_tip' => true,
            ],
        ];
    }

    private function buildMethodDescription(): string
    {
        wp_enqueue_style('paysera-frontend-style', PayseraPaths::PAYSERA_DELIVERY_STYLESHEET);

        $minimumWeight = PayseraDeliverySettings::DEFAULT_MINIMUM_WEIGHT;
        $maximumWeight = PayseraDeliverySettings::DEFAULT_MAXIMUM_WEIGHT;
        $fee = PayseraDeliverySettings::DEFAULT_FEE;
        $preferredPickupType = PayseraDeliverySettings::DEFAULT_TYPE;

        if (get_option($this->get_instance_option_key()) !== false) {
            $minimumWeight = (float) $this->get_instance_option(PayseraDeliverySettings::MINIMUM_WEIGHT);
            $maximumWeight = (float) $this->get_instance_option(PayseraDeliverySettings::MAXIMUM_WEIGHT);
            $fee = (float) $this->get_instance_option(PayseraDeliverySettings::FEE);
            $preferredPickupType = $this->get_instance_option(PayseraDeliverySettings::SENDER_TYPE);

            $this->payseraDeliveryActions->changeDeliveryGatewayMinimumWeight($this->id, $minimumWeight);
            $this->payseraDeliveryActions->changeDeliveryGatewayMaximumWeight($this->id, $maximumWeight);
            $this->payseraDeliveryActions->changeDeliveryGatewaySenderType($this->id, $preferredPickupType);
        }

        return sprintf(
            __($this->defaultDescription, PayseraPaths::PAYSERA_TRANSLATIONS),
            $this->getDeliveryGatewayTitle()
        ) . $this->buildExtraDescription($minimumWeight, $maximumWeight, $fee, $preferredPickupType)
        ;
    }

    private function buildExtraDescription(
        float $minimumWeight,
        float $maximumWeight,
        float $fee,
        string $preferredPickupType
    ): string {
        $extraDescription = '';

        if ($maximumWeight > 0) {
            $extraDescription .= sprintf(
                '<div class="paysera-delivery-extra-description"><strong>%s</strong> %s-%skg</div>',
                __('Allowed weight:', PayseraPaths::PAYSERA_TRANSLATIONS),
                $minimumWeight,
                $maximumWeight
            );
        }

        if ($fee > 0) {
            $extraDescription .= sprintf(
                '<div class="paysera-delivery-extra-description"><strong>%s</strong> %s%s</div>',
                __('Delivery Fee:', PayseraPaths::PAYSERA_TRANSLATIONS),
                $fee,
                get_woocommerce_currency_symbol()
            );
        }

        $extraDescription .= sprintf(
            '<div class="paysera-delivery-extra-description"><strong>%s</strong> %s</div>',
            __('Preferred pickup type:', PayseraPaths::PAYSERA_TRANSLATIONS),
            __(PayseraDeliverySettings::READABLE_TYPES[$preferredPickupType], PayseraPaths::PAYSERA_TRANSLATIONS)
        );

        return $extraDescription;
    }

    private function getDeliveryGatewayTitle(): string
    {
        return str_replace(['Terminals', 'Courier'], '', $this->defaultTitle);
    }

    private function getSenderTypeOptions(): array
    {
        $shipmentMethods = $this->payseraDeliverySettings->getDeliveryPluginSettings()->getShipmentMethods();

        $senderTypes = [];

        if ($this->receiverType === PayseraDeliverySettings::TYPE_COURIER) {
            if ($shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_COURIER_2_COURIER] === true) {
                $senderTypes[PayseraDeliverySettings::TYPE_COURIER] = __('Courier', PayseraPaths::PAYSERA_TRANSLATIONS);
            }

            if ($shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_PARCEL_MACHINE_2_COURIER] === true) {
                $senderTypes[PayseraDeliverySettings::TYPE_PARCEL_MACHINE] =
                    __('Parcel locker', PayseraPaths::PAYSERA_TRANSLATIONS)
                ;
            }
        } elseif ($this->receiverType === PayseraDeliverySettings::TYPE_PARCEL_MACHINE) {
            if ($shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_COURIER_2_PARCEL_MACHINE] === true) {
                $senderTypes[PayseraDeliverySettings::TYPE_COURIER] = __('Courier', PayseraPaths::PAYSERA_TRANSLATIONS);
            }

            if (
                $shipmentMethods[PayseraDeliverySettings::SHIPMENT_METHOD_PARCEL_MACHINE_2_PARCEL_MACHINE] === true
            ) {
                $senderTypes[PayseraDeliverySettings::TYPE_PARCEL_MACHINE] =
                    __('Parcel locker', PayseraPaths::PAYSERA_TRANSLATIONS)
                ;
            }
        }

        return $senderTypes;
    }

    private function generateId(int $instanceId): string
    {
        return $instanceId > 0
            ? PayseraDeliverySettings::DELIVERY_GATEWAY_PREFIX . $this->deliveryGatewayCode . ':' . $instanceId
            : PayseraDeliverySettings::DELIVERY_GATEWAY_PREFIX . $this->deliveryGatewayCode
        ;
    }
}
