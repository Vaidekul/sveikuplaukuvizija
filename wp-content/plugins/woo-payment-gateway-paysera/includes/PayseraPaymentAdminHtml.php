<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

class PayseraPaymentAdminHtml
{
    private $payseraPaymentHelper;

    public function __construct()
    {
        $this->payseraPaymentHelper = new PayseraPaymentHelper();
    }

    public function buildCheckoutSettings(string $activeTab, ?int $projectId): void
    {
        wp_enqueue_style('paysera-admin-style', PayseraPaths::PAYSERA_DELIVERY_STYLESHEET);
        wp_enqueue_style('select2-css', PayseraPaths::SELECT_2_CSS);
        wp_enqueue_script('select2-js', PayseraPaths::SELECT_2_JS, ['jquery']);
        wp_enqueue_script('paysera-backend-script', PayseraPaths::PAYSERA_PAYMENT_BACKEND_JS, ['jquery']);

        printf('<form action="options.php" class="paysera-settings" method="post">');
        printf(
            '<div><img class="paysera-delivery-settings-logo" src="' . PayseraPaths::PAYSERA_LOGO
            . '" alt="paysera-logo"/></div>'
        )
        ;
        printf('<nav class="nav-tab-wrapper woo-nav-tab-wrapper">');
        printf('<a class="nav-tab ');

        if ($activeTab == PayseraPaymentAdmin::TAB_MAIN_SETTINGS) {
            printf('nav-tab-active');
        }

        printf('"href="' . $this->payseraPaymentHelper->settingsUrl() . '">');
        printf(__('Main Settings', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>');

        if ($projectId !== null) {
            printf('<a class="nav-tab ');

            if ($activeTab == PayseraPaymentAdmin::TAB_EXTRA_SETTINGS) {
                printf('nav-tab-active');
            }

            printf(
                '"href="'
                . $this->payseraPaymentHelper->settingsUrl(['tab' => PayseraPaymentAdmin::TAB_EXTRA_SETTINGS]) . '">'
            );
            printf(__('Extra Settings', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>');
            printf('<a class="nav-tab ');

            if ($activeTab == PayseraPaymentAdmin::TAB_ORDER_STATUS) {
                printf('nav-tab-active');
            }

            printf(
                '"href="'
                . $this->payseraPaymentHelper->settingsUrl(['tab' => PayseraPaymentAdmin::TAB_ORDER_STATUS]) . '">'
            );
            printf(__('Order Status', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>');
            printf('<a class="nav-tab ');

            if ($activeTab == PayseraPaymentAdmin::TAB_PROJECT_ADDITIONS) {
                printf('nav-tab-active');
            }

            printf(
                '"href="'
                . $this->payseraPaymentHelper->settingsUrl(['tab' => PayseraPaymentAdmin::TAB_PROJECT_ADDITIONS]) . '">'
            );
            printf(__('Project Additions', PayseraPaths::PAYSERA_TRANSLATIONS) . '</a>');
        }
        printf('</nav>');

        if ($activeTab == PayseraPaymentAdmin::TAB_MAIN_SETTINGS) {
            settings_fields(PayseraPaymentSettings::MAIN_SETTINGS_NAME);
            do_settings_sections('paysera-payment-main');
        } elseif ($activeTab == PayseraPaymentAdmin::TAB_EXTRA_SETTINGS) {
            settings_fields(PayseraPaymentSettings::EXTRA_SETTINGS_NAME);
            do_settings_sections('paysera-payment-extra');
        } elseif ($activeTab == PayseraPaymentAdmin::TAB_ORDER_STATUS) {
            settings_fields(PayseraPaymentSettings::STATUS_SETTINGS_NAME);
            do_settings_sections('paysera-payment-status');
        } elseif ($activeTab == PayseraPaymentAdmin::TAB_PROJECT_ADDITIONS) {
            settings_fields(PayseraPaymentSettings::PROJECT_ADDITIONS_SETTINGS_NAME);
            do_settings_sections('paysera-payment-project-additions');
        }

        submit_button();

        printf('</form>');
    }

    public function enablePayseraPaymentHtml(): string
    {
        wp_enqueue_style('paysera-enable-style', PayseraPaths::PAYSERA_PAYMENT_STYLESHEET);

        $html = '';

        $isEnabled = filter_var(
            WC()->payment_gateways->payment_gateways()['paysera']->enabled,
            FILTER_VALIDATE_BOOLEAN
        );

        $html .= '<a href="' . admin_url('admin-post.php?action=paysera_payment_gateway_change&change=enable')
            . '" class="button paysera-button' . (($isEnabled === true) ? ' paysera-button-active"' : '"') . '>'
            . __('Enable', PayseraPaths::PAYSERA_TRANSLATIONS)
        ;

        $html .= '<a href="' . admin_url('admin-post.php?action=paysera_payment_gateway_change&change=disable')
            . '" class="button paysera-button' . (($isEnabled === false) ? ' paysera-button-active"' : '"') . '>'
            . __('Disable', PayseraPaths::PAYSERA_TRANSLATIONS)
        ;

        $html .= '</a>';

        return $html;
    }
}
