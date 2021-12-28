<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

class PayseraPaymentActions
{
    public function build(): void
    {
        add_action('admin_post_paysera_payment_gateway_change', [$this, 'changePaymentGatewayStatus']);
    }

    public function changePaymentGatewayStatus(): void
    {
        if (sanitize_text_field($_GET['change']) === 'enable') {
            WC()->payment_gateways->payment_gateways()['paysera']->update_option('enabled', 'yes');
        } else {
            WC()->payment_gateways->payment_gateways()['paysera']->update_option('enabled', 'no');
        }

        wp_redirect('admin.php?page=paysera-payments');
    }
}
