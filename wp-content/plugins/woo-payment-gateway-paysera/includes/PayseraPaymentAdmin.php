<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

class PayseraPaymentAdmin
{
    public const TAB_MAIN_SETTINGS = 'main_settings';
    public const TAB_EXTRA_SETTINGS = 'extra_settings';
    public const TAB_ORDER_STATUS = 'order_status';
    public const TAB_PROJECT_ADDITIONS = 'project_additions';

    private $payseraAdminHtml;
    private $payseraPaymentAdminHtml;
    private $paymentPluginSettings;
    private $payseraPaymentHelper;

    protected $tab;
    protected $tabs;

    public function __construct()
    {
        $this->payseraAdminHtml = new PayseraAdminHtml();
        $this->payseraPaymentAdminHtml = new PayseraPaymentAdminHtml();
        $this->paymentPluginSettings = (new PayseraPaymentSettings())->getPaymentPluginSettings();
        $this->payseraPaymentHelper = new PayseraPaymentHelper();
        $this->tab = self::TAB_MAIN_SETTINGS;
        $this->tabs = [
            self::TAB_MAIN_SETTINGS,
            self::TAB_EXTRA_SETTINGS,
            self::TAB_ORDER_STATUS,
            self::TAB_PROJECT_ADDITIONS,
        ];
    }

    public function build()
    {
        add_action('admin_init', [$this, 'settingsInit']);
    }

    public function settingsInit(): void
    {
        if (array_key_exists('tab', $_GET) === true) {
            $this->tab = $_GET['tab'];
        }

        if (in_array($this->tab, $this->tabs) === false) {
            $this->tab = self::TAB_MAIN_SETTINGS;
        }

        add_settings_section(
            'paysera_payment_main_section',
            null,
            [$this, 'payseraPaymentSettingsSectionCallback'],
            'paysera-payment-main'
        );
        add_settings_section(
            'paysera_payment_extra_section',
            null,
            [$this, 'payseraPaymentSettingsSectionCallback'],
            'paysera-payment-extra'
        );
        add_settings_section(
            'paysera_payment_status_section',
            null,
            [$this, 'payseraPaymentSettingsSectionCallback'],
            'paysera-payment-status'
        );
        add_settings_section(
            'paysera_payment_project_additions_section',
            null,
            [$this, 'payseraPaymentSettingsSectionCallback'],
            'paysera-payment-project-additions'
        );

        register_setting(PayseraPaymentSettings::MAIN_SETTINGS_NAME, PayseraPaymentSettings::MAIN_SETTINGS_NAME);
        register_setting(PayseraPaymentSettings::EXTRA_SETTINGS_NAME, PayseraPaymentSettings::EXTRA_SETTINGS_NAME);
        register_setting(PayseraPaymentSettings::STATUS_SETTINGS_NAME, PayseraPaymentSettings::STATUS_SETTINGS_NAME);
        register_setting(
            PayseraPaymentSettings::PROJECT_ADDITIONS_SETTINGS_NAME,
            PayseraPaymentSettings::PROJECT_ADDITIONS_SETTINGS_NAME
        );

        if ($this->tab === self::TAB_MAIN_SETTINGS) {
            add_settings_field(
                'paysera_payment_enable',
                __('Enable', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'enableRender'],
                'paysera-payment-main',
                'paysera_payment_main_section'
            );
            add_settings_field(
                'paysera_payment_project_id',
                __('Project ID', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'projectIdRender'],
                'paysera-payment-main',
                'paysera_payment_main_section'
            );
            add_settings_field(
                'paysera_payment_project_password',
                __('Project password', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'projectPasswordRender'],
                'paysera-payment-main',
                'paysera_payment_main_section'
            );
            add_settings_field(
                'paysera_payment_test_mode',
                __('Test mode', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'testModeRender'],
                'paysera-payment-main',
                'paysera_payment_main_section'
            );
        } elseif ($this->tab === self::TAB_EXTRA_SETTINGS) {
            add_settings_field(
                'paysera_payment_title',
                __('Title', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'titleRender'],
                'paysera-payment-extra',
                'paysera_payment_extra_section'
            );
            add_settings_field(
                'paysera_payment_description',
                __('Description', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'descriptionRender'],
                'paysera-payment-extra',
                'paysera_payment_extra_section'
            );
            add_settings_field(
                'paysera_payment_list_of_payments',
                __('List of payments', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'listOfPaymentsRender'],
                'paysera-payment-extra',
                'paysera_payment_extra_section'
            );
            add_settings_field(
                'paysera_payment_specific_countries',
                __('Specific countries', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'specificCountriesRender'],
                'paysera-payment-extra',
                'paysera_payment_extra_section'
            );
            add_settings_field(
                'paysera_payment_grid_view',
                __('Grid view', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'gridViewRender'],
                'paysera-payment-extra',
                'paysera_payment_extra_section'
            );
            add_settings_field(
                'paysera_payment_buyer_consent',
                __('Buyer consent', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'buyerConsentRender'],
                'paysera-payment-extra',
                'paysera_payment_extra_section'
            );
        } elseif ($this->tab === self::TAB_ORDER_STATUS) {
            add_settings_field(
                'paysera_payment_new_order_status',
                __('New Order Status', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'newOrderStatusRender'],
                'paysera-payment-status',
                'paysera_payment_status_section'
            );
            add_settings_field(
                'paysera_payment_paid_order_status',
                __('Paid Order Status', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'paidOrderStatusRender'],
                'paysera-payment-status',
                'paysera_payment_status_section'
            );
            add_settings_field(
                'paysera_payment_pending_checkout',
                __('Pending Checkout', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'pendingCheckoutRender'],
                'paysera-payment-status',
                'paysera_payment_status_section'
            );
        } elseif ($this->tab === self::TAB_PROJECT_ADDITIONS) {
            add_settings_field(
                'paysera_payment_enable_ownership_code',
                __('Ownership code', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'enableOwnershipCodeRender'],
                'paysera-payment-project-additions',
                'paysera_payment_project_additions_section'
            );
            add_settings_field(
                'paysera_payment_ownership_code',
                __('Write your ownership code', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'ownershipCodeRender'],
                'paysera-payment-project-additions',
                'paysera_payment_project_additions_section'
            );
            add_settings_field(
                'paysera_payment_quality_sign',
                __('Quality sign', PayseraPaths::PAYSERA_TRANSLATIONS),
                [$this, 'qualitySignRender'],
                'paysera-payment-project-additions',
                'paysera_payment_project_additions_section'
            );
        }
    }

    public function buildSettings(): void
    {
        if (isset($_REQUEST['settings-updated'])) {
            printf($this->payseraAdminHtml->getSettingsSavedMessage());
        }

        $this->payseraPaymentAdminHtml->buildCheckoutSettings(
            $_GET['tab'] ?? $this->tab,
            $this->paymentPluginSettings->getProjectId()
        );
    }

    public function payseraPaymentSettingsSectionCallback(): void
    {
    }

    public function enableRender(): void
    {
        printf($this->payseraPaymentAdminHtml->enablePayseraPaymentHtml());
    }

    public function projectIdRender(): void
    {
        printf(
            $this->payseraAdminHtml->getNumberInput(),
            esc_attr(PayseraPaymentSettings::MAIN_SETTINGS_NAME . '[' . PayseraPaymentSettings::PROJECT_ID . ']'),
            esc_attr($this->paymentPluginSettings->getProjectId())
        );
    }

    public function projectPasswordRender(): void
    {
        printf(
            $this->payseraAdminHtml->getTextInput(),
            esc_attr(PayseraPaymentSettings::MAIN_SETTINGS_NAME . '[' . PayseraPaymentSettings::PROJECT_PASSWORD . ']'),
            esc_attr($this->paymentPluginSettings->getProjectPassword())
        );
    }

    public function testModeRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraPaymentSettings::MAIN_SETTINGS_NAME . '[' . PayseraPaymentSettings::TEST_MODE . ']',
                $this->paymentPluginSettings->isTestModeEnabled() === true
                    ? 'yes' : 'no'
            )
        );
    }

    public function titleRender(): void
    {
        printf(
            $this->payseraAdminHtml->getTextInput(),
            esc_attr(PayseraPaymentSettings::EXTRA_SETTINGS_NAME . '[' . PayseraPaymentSettings::TITLE . ']'),
            esc_attr($this->paymentPluginSettings->getTitle())
        );
    }

    public function descriptionRender(): void
    {
        printf(
            $this->payseraAdminHtml->getTextAreaInput(),
            esc_attr(PayseraPaymentSettings::EXTRA_SETTINGS_NAME . '[' . PayseraPaymentSettings::DESCRIPTION . ']'),
            esc_attr($this->paymentPluginSettings->getDescription())
        );
    }

    public function listOfPaymentsRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraPaymentSettings::EXTRA_SETTINGS_NAME . '['
                . PayseraPaymentSettings::LIST_OF_PAYMENTS . ']',
                $this->paymentPluginSettings->isListOfPaymentsEnabled() === true ? 'yes' : 'no'
            )
        );
    }

    public function specificCountriesRender(): void
    {
        printf(
            $this->payseraAdminHtml->getMultipleSelectInput(
                $this->payseraPaymentHelper->getWooCommerceCountries(),
                $this->paymentPluginSettings->getSpecificCountries() ?? []
            ),
            esc_attr(
                PayseraPaymentSettings::EXTRA_SETTINGS_NAME . '[' . PayseraPaymentSettings::SPECIFIC_COUNTRIES . ']'
            )
        );
    }

    public function gridViewRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraPaymentSettings::EXTRA_SETTINGS_NAME . '[' . PayseraPaymentSettings::GRID_VIEW . ']',
                $this->paymentPluginSettings->isGridViewEnabled() === true ? 'yes' : 'no'
            )
        );
    }

    public function buyerConsentRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraPaymentSettings::EXTRA_SETTINGS_NAME . '[' . PayseraPaymentSettings::BUYER_CONSENT . ']',
                $this->paymentPluginSettings->isBuyerConsentEnabled() === true ? 'yes' : 'no'
            )
        );
    }

    public function newOrderStatusRender(): void
    {
        printf(
            $this->payseraAdminHtml->getSelectInput(
                $this->payseraPaymentHelper->getWooCommerceOrderStatuses(),
                $this->paymentPluginSettings->getNewOrderStatus()
            ),
            esc_attr(
                PayseraPaymentSettings::STATUS_SETTINGS_NAME . '[' . PayseraPaymentSettings::NEW_ORDER_STATUS . ']'
            )
        );
    }

    public function paidOrderStatusRender(): void
    {
        printf(
            $this->payseraAdminHtml->getSelectInput(
                $this->payseraPaymentHelper->getWooCommerceOrderStatuses(),
                $this->paymentPluginSettings->getPaidOrderStatus()
            ),
            esc_attr(
                PayseraPaymentSettings::STATUS_SETTINGS_NAME . '[' . PayseraPaymentSettings::PAID_ORDER_STATUS . ']'
            )
        );
    }

    public function pendingCheckoutRender(): void
    {
        printf(
            $this->payseraAdminHtml->getSelectInput(
                $this->payseraPaymentHelper->getWooCommerceOrderStatuses(),
                $this->paymentPluginSettings->getPendingCheckoutStatus()
            ),
            esc_attr(
                PayseraPaymentSettings::STATUS_SETTINGS_NAME . '['
                . PayseraPaymentSettings::PENDING_CHECKOUT_STATUS . ']'
            )
        );
    }

    public function enableOwnershipCodeRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraPaymentSettings::PROJECT_ADDITIONS_SETTINGS_NAME . '['
                . PayseraPaymentSettings::OWNERSHIP_CODE_ENABLED . ']',
                $this->paymentPluginSettings->isOwnershipCodeEnabled() === true ? 'yes' : 'no'
            )
        );
    }

    public function ownershipCodeRender(): void
    {
        printf(
            $this->payseraAdminHtml->getTextInput(),
            esc_attr(
                PayseraPaymentSettings::PROJECT_ADDITIONS_SETTINGS_NAME . '['
                . PayseraPaymentSettings::OWNERSHIP_CODE . ']'
            ),
            esc_attr($this->paymentPluginSettings->getOwnershipCode())
        );
    }

    public function qualitySignRender(): void
    {
        printf(
            $this->payseraAdminHtml->prepareEnableHtml(
                PayseraPaymentSettings::PROJECT_ADDITIONS_SETTINGS_NAME . '['
                . PayseraPaymentSettings::QUALITY_SIGN_ENABLED . ']',
                $this->paymentPluginSettings->isQualitySignEnabled() === true ? 'yes' : 'no'
            )
        );
    }
}
