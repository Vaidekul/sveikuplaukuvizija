<?php

declare(strict_types=1);

namespace Paysera\Includes;

use Paysera\Includes\Entity\PayseraDeliveryGatewaySettings;
use Paysera\Includes\Entity\PayseraDeliveryPluginSettings;

defined('ABSPATH') or exit;

class PayseraDeliverySettings
{
    public const SETTINGS_NAME = 'paysera_delivery_settings';
    public const DELIVERY_GATEWAYS_SETTINGS_NAME = 'paysera_delivery_gateways_settings';
    public const DELIVERY_GATEWAYS_TITLES = 'paysera_delivery_gateways_titles';

    public const PROJECT_ID = 'project_id';
    public const RESOLVED_PROJECT_ID = 'resolved_project_id';
    public const PROJECT_PASSWORD = 'project_password';
    public const TEST_MODE = 'test_mode';
    public const HOUSE_NUMBER_FIELD = 'house_number_field';
    public const DELIVERY_GATEWAYS = 'delivery_gateways';
    public const SHIPMENT_METHODS = 'shipment_methods';

    public const MINIMUM_WEIGHT = 'minimum_weight';
    public const MAXIMUM_WEIGHT = 'maximum_weight';
    public const SENDER_TYPE = 'sender_type';
    public const RECEIVER_TYPE = 'receiver_type';
    public const FEE = 'fee';
    public const FREE_DELIVERY_LIMIT = 'free_delivery_limit';

    public const DEFAULT_MINIMUM_WEIGHT = 0;
    public const DEFAULT_MAXIMUM_WEIGHT = 30;
    public const DEFAULT_FEE = 0;
    public const DEFAULT_TYPE = self::TYPE_COURIER;
    public const DEFAULT_FREE_DELIVERY_LIMIT = 0;

    public const SHIPMENT_METHOD_COURIER_2_COURIER = 'courier2courier';
    public const SHIPMENT_METHOD_COURIER_2_PARCEL_MACHINE = 'courier2parcel-machine';
    public const SHIPMENT_METHOD_PARCEL_MACHINE_2_COURIER = 'parcel-machine2courier';
    public const SHIPMENT_METHOD_PARCEL_MACHINE_2_PARCEL_MACHINE = 'parcel-machine2parcel-machine';

    public const TYPE_COURIER = 'courier';
    public const TYPE_PARCEL_MACHINE = 'parcel-machine';
    public const TYPE_TERMINALS = 'terminals';

    public const DELIVERY_GATEWAY_TYPE_MAP = [
        self::TYPE_COURIER,
        self::TYPE_TERMINALS
    ];

    public const READABLE_TYPES = [
        self::TYPE_COURIER => 'Courier',
        self::TYPE_PARCEL_MACHINE => 'Parcel locker',
    ];

    public const DELIVERY_GATEWAY_PREFIX = 'paysera_delivery_';

    public function getDeliveryGatewaySettings(string $deliveryGatewayCode): PayseraDeliveryGatewaySettings
    {
        $options = get_option(self::DELIVERY_GATEWAYS_SETTINGS_NAME);

        $payseraDeliveryGatewaySettings = (new PayseraDeliveryGatewaySettings())
            ->setMinimumWeight(
                $options[$deliveryGatewayCode . '_' . self::MINIMUM_WEIGHT] ?? self::DEFAULT_MINIMUM_WEIGHT
            )
            ->setMaximumWeight(
                $options[$deliveryGatewayCode . '_' . self::MAXIMUM_WEIGHT] ?? self::DEFAULT_MAXIMUM_WEIGHT
            )
        ;

        if (isset($options[$deliveryGatewayCode . '_' . self::SENDER_TYPE])) {
            $payseraDeliveryGatewaySettings->setSenderType($options[$deliveryGatewayCode . '_' . self::SENDER_TYPE]);
        } else {
            $payseraDeliveryGatewaySettings->setSenderType(self::DEFAULT_TYPE);
        }

        if (isset($options[$deliveryGatewayCode . '_' . self::RECEIVER_TYPE])) {
            $payseraDeliveryGatewaySettings->setReceiverType(
                $options[$deliveryGatewayCode . '_' . self::RECEIVER_TYPE]
            );
        }

        return $payseraDeliveryGatewaySettings;
    }

    public function getDeliveryPluginSettings(): PayseraDeliveryPluginSettings
    {
        $options = get_option(self::SETTINGS_NAME);
        $deliveryGatewaysOptions = get_option(self::DELIVERY_GATEWAYS_SETTINGS_NAME);
        $deliveryGatewaysTitles = get_option(self::DELIVERY_GATEWAYS_TITLES);

        $payseraDeliveryPluginSettings = new PayseraDeliveryPluginSettings();

        if (isset($options[self::PROJECT_ID])) {
            $payseraDeliveryPluginSettings->setProjectId((int) trim($options[self::PROJECT_ID]));
        }

        if (isset($deliveryGatewaysOptions[self::RESOLVED_PROJECT_ID])) {
            $payseraDeliveryPluginSettings->setResolvedProjectId($deliveryGatewaysOptions[self::RESOLVED_PROJECT_ID]);
        }

        if (isset($options[self::PROJECT_PASSWORD])) {
            $payseraDeliveryPluginSettings->setProjectPassword(trim($options[self::PROJECT_PASSWORD]));
        }

        if (isset($options[self::TEST_MODE])) {
            $payseraDeliveryPluginSettings->setTestModeEnabled($options[self::TEST_MODE] === 'yes');
        }

        if (isset($options[self::HOUSE_NUMBER_FIELD])) {
            $payseraDeliveryPluginSettings->setHouseNumberFieldEnabled($options[self::HOUSE_NUMBER_FIELD] === 'yes');
        }

        if (isset($deliveryGatewaysOptions[self::DELIVERY_GATEWAYS])) {
            $payseraDeliveryPluginSettings->setDeliveryGateways($deliveryGatewaysOptions[self::DELIVERY_GATEWAYS]);
        }

        if (isset($deliveryGatewaysOptions[self::DELIVERY_GATEWAYS])) {
            $payseraDeliveryPluginSettings->setDeliveryGatewayTitles($deliveryGatewaysTitles[self::DELIVERY_GATEWAYS]);
        }

        if (isset($deliveryGatewaysOptions[self::SHIPMENT_METHODS])) {
            $payseraDeliveryPluginSettings->setShipmentMethods($deliveryGatewaysOptions[self::SHIPMENT_METHODS]);
        }

        return $payseraDeliveryPluginSettings;
    }
}
