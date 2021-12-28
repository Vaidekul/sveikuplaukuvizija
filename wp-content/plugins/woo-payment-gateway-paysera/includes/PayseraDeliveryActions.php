<?php

declare(strict_types=1);

namespace Paysera\Includes;

use Paysera\DeliveryApi\MerchantClient\Entity\ShipmentGateway;
use Paysera\DeliveryApi\MerchantClient\Entity\ShipmentMethod;

defined('ABSPATH') or exit;

class PayseraDeliveryActions
{
    public function build(): void
    {
        add_action('admin_post_paysera_delivery_gateway_change', [$this, 'changeDeliveryGatewayStatus']);
    }

    public function changeDeliveryGatewayStatus(): void
    {
        $isEnabled = false;
        $deliveryGateway = sanitize_text_field($_GET['gateway']);

        if (sanitize_text_field($_GET['change']) === 'enable') {
            $isEnabled = true;
        }

        $this->updateDeliveryGatewayStatus($deliveryGateway, $isEnabled);

        wp_redirect(
            'admin.php?page=paysera-delivery&tab=' . PayseraDeliveryAdmin::TAB_DELIVERY_GATEWAYS_LIST_SETTINGS
        );
    }

    /**
     * @param ShipmentGateway[]
     */
    public function setDeliveryGatewayTitles(array $deliveryGateways): void
    {
        foreach ($deliveryGateways as $deliveryGateway) {
            $this->updateDeliveryGatewayTitle($deliveryGateway->getCode(), $deliveryGateway->getDescription());
        }
    }

    /**
     * @param ShipmentGateway[]
     */
    public function reSyncDeliveryGatewayStatus(array $deliveryGateways): void
    {
        foreach ($deliveryGateways as $deliveryGateway) {
            if ($deliveryGateway->isEnabled() === false) {
                $this->updateDeliveryGatewayStatus($deliveryGateway->getCode(), false);
            }
        }
    }

    /**
     * @param ShipmentMethod[]
     */
    public function syncShipmentMethodsStatus(array $shipmentMethods): void
    {
        foreach ($shipmentMethods as $shipmentMethod) {
            $this->updateShipmentMethodStatus($shipmentMethod->getCode(), $shipmentMethod->isEnabled());
        }
    }

    public function changeDeliveryGatewayMinimumWeight(string $deliveryGatewayCode, float $minimumWeight): void
    {
        $this->updateOptions($deliveryGatewayCode . '_' . PayseraDeliverySettings::MINIMUM_WEIGHT, $minimumWeight);
    }

    public function changeDeliveryGatewayMaximumWeight(string $deliveryGatewayCode, float $maximumWeight): void
    {
        $this->updateOptions($deliveryGatewayCode . '_' . PayseraDeliverySettings::MAXIMUM_WEIGHT, $maximumWeight);
    }

    public function changeDeliveryGatewayReceiverType(string $deliveryGatewayCode, string $receiverType): void
    {
        $this->updateOptions($deliveryGatewayCode . '_' . PayseraDeliverySettings::RECEIVER_TYPE, $receiverType);
    }

    public function changeDeliveryGatewaySenderType(string $deliveryGatewayCode, string $senderType): void
    {
        $this->updateOptions($deliveryGatewayCode . '_' . PayseraDeliverySettings::SENDER_TYPE, $senderType);
    }

    public function updateResolvedProjectId(string $projectId): void
    {
        $this->updateOptions(PayseraDeliverySettings::RESOLVED_PROJECT_ID, $projectId);
    }

    private function updateOptions(string $optionName, $optionValue): void
    {
        $options = get_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME);

        $options[$optionName] = $optionValue;

        update_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME, $options);
    }

    private function updateDeliveryGatewayStatus(string $deliveryGateway, bool $isEnabled): void
    {
        $options = get_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME);

        $options[PayseraDeliverySettings::DELIVERY_GATEWAYS][$deliveryGateway] = $isEnabled;

        update_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME, $options);
    }

    private function updateDeliveryGatewayTitle(string $deliveryGateway, string $title): void
    {
        $options = get_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_TITLES);

        $options[PayseraDeliverySettings::DELIVERY_GATEWAYS][$deliveryGateway] = $title;

        update_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_TITLES, $options);
    }

    private function updateShipmentMethodStatus(string $shipmentMethod, bool $isEnabled): void
    {
        $options = get_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME);

        $options[PayseraDeliverySettings::SHIPMENT_METHODS][$shipmentMethod] = $isEnabled;

        update_option(PayseraDeliverySettings::DELIVERY_GATEWAYS_SETTINGS_NAME, $options);
    }
}
