<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

class PayseraDeliveryHelper
{
    public function settingsUrl(array $query = []): string
    {
        return esc_url(admin_url('admin.php?page=paysera-delivery') . '&' . http_build_query($query));
    }

    public function resolveDeliveryGatewayCode(string $deliveryGatewayCode): string
    {
        return str_replace(
            ['_terminals', '_courier', PayseraDeliverySettings::DELIVERY_GATEWAY_PREFIX],
            '',
            strripos($deliveryGatewayCode, ':')
                ? stristr($deliveryGatewayCode, ':', true)
                : $deliveryGatewayCode
        );
    }

    public function isPayseraDeliveryGateway(string $deliveryGateway): bool
    {
        return (strpos($deliveryGateway, PayseraDeliverySettings::DELIVERY_GATEWAY_PREFIX) !== false);
    }

    public function deliveryGatewayClassExists(string $deliveryGateway, string $gatewayType): bool
    {
        return file_exists(
            plugin_dir_path(__FILE__) . 'Entity/class-paysera-'
            . $deliveryGateway . '-' . $gatewayType . '-delivery.php'
        );
    }
}
