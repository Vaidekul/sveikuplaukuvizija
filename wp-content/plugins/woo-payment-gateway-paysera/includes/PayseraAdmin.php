<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

class PayseraAdmin
{
    private $payseraDeliveryAdmin;
    private $payseraPaymentAdmin;
    private $payseraAdminHtml;

    public function __construct()
    {
        $this->payseraDeliveryAdmin = new PayseraDeliveryAdmin();
        $this->payseraPaymentAdmin = new PayseraPaymentAdmin();
        $this->payseraAdminHtml = new PayseraAdminHtml();
    }

    public function build(): void
    {
        add_action('admin_menu', [$this, 'payseraAdminMenu']);
    }

    public function payseraAdminMenu(): void
    {
        if (class_exists('woocommerce') === true) {
            add_menu_page(
                'Paysera',
                'Paysera',
                'manage_options',
                'paysera',
                [$this, 'payseraAboutPage'],
                PayseraPaths::PAYSERA_FAVICON,
                58
            );

            add_submenu_page(
                'paysera',
                'About',
                __('About', PayseraPaths::PAYSERA_TRANSLATIONS),
                'manage_options',
                'paysera',
                [$this, 'payseraAboutPage']
            );
            add_submenu_page(
                'paysera',
                'Delivery',
                __('Delivery', PayseraPaths::PAYSERA_TRANSLATIONS),
                'manage_options',
                'paysera-delivery',
                [$this, 'payseraDeliverySettings']
            );
            add_submenu_page(
                'paysera',
                'Payments',
                __('Payments', PayseraPaths::PAYSERA_TRANSLATIONS),
                'manage_options',
                'paysera-payments',
                [$this, 'payseraPaymentSettings']
            );
        }
    }

    public function payseraAboutPage(): void
    {
        printf($this->payseraAdminHtml->buildAboutPage());
    }

    public function payseraDeliverySettings(): void
    {
        $this->payseraDeliveryAdmin->buildSettings();
    }

    public function payseraPaymentSettings(): void
    {
        $this->payseraPaymentAdmin->buildSettings();
    }
}
