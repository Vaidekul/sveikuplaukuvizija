<?php

declare(strict_types=1);

namespace Paysera\Includes;

use Paysera\Includes\Entity\PayseraPaymentPluginSettings;

defined('ABSPATH') or exit;

class PayseraPaymentSettings
{
    public const MAIN_SETTINGS_NAME = 'paysera_payment_main_settings';
    public const EXTRA_SETTINGS_NAME = 'paysera_payment_extra_settings';
    public const STATUS_SETTINGS_NAME = 'paysera_payment_status_settings';
    public const PROJECT_ADDITIONS_SETTINGS_NAME = 'paysera_payment_project_additions_settings';

    public const PROJECT_ID = 'project_id';
    public const PROJECT_PASSWORD = 'project_password';
    public const TEST_MODE = 'test_mode';
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const LIST_OF_PAYMENTS = 'list_of_payments';
    public const SPECIFIC_COUNTRIES = 'specific_countries';
    public const GRID_VIEW = 'grid_view';
    public const BUYER_CONSENT = 'buyer_consent';
    public const NEW_ORDER_STATUS = 'new_order_status';
    public const PAID_ORDER_STATUS = 'paid_order_status';
    public const PENDING_CHECKOUT_STATUS = 'pending_checkout_status';
    public const OWNERSHIP_CODE_ENABLED = 'ownership_code_enabled';
    public const OWNERSHIP_CODE = 'ownership_code';
    public const QUALITY_SIGN_ENABLED = 'quality_sign_enabled';

    public const DEFAULT_TITLE = 'All popular payment methods';
    public const DEFAULT_DESCRIPTION = 'Choose a payment method on the Paysera page';

    public const DEFAULT_ISO_639_1_LANGUAGE = 'en';
    public const DEFAULT_ISO_639_2_LANGUAGE = 'ENG';

    public const ISO_639_1_LANGUAGES = [
        'lt',
        'lv',
        'et',
        'ru',
        'bg',
        'pl',
        'en',
    ];

    public const ISO_639_2_LANGUAGES = [
        'lt' => 'LIT',
        'lv' => 'LAV',
        'et' => 'EST',
        'ru' => 'RUS',
        'de' => 'GER',
        'pl' => 'POL',
        'en' => 'ENG',
    ];

    public function getPaymentPluginSettings(): PayseraPaymentPluginSettings
    {
        $mainOptions = get_option(self::MAIN_SETTINGS_NAME);
        $extraOptions = get_option(self::EXTRA_SETTINGS_NAME);
        $statusOptions = get_option(self::STATUS_SETTINGS_NAME);
        $projectAdditionsOptions = get_option(self::PROJECT_ADDITIONS_SETTINGS_NAME);

        //ToDo: remove old options after some time
        $oldOptions = get_option('woocommerce_paysera_settings');

        $payseraPaymentPluginSettings = new PayseraPaymentPluginSettings();

        if (isset($mainOptions[self::PROJECT_ID])) {
            $payseraPaymentPluginSettings->setProjectId((int) trim($mainOptions[self::PROJECT_ID]));
        } elseif (isset($oldOptions['projectid'])) {
            $payseraPaymentPluginSettings->setProjectId((int) $oldOptions['projectid']);
        }

        if (isset($mainOptions[self::PROJECT_PASSWORD])) {
            $payseraPaymentPluginSettings->setProjectPassword(trim($mainOptions[self::PROJECT_PASSWORD]));
        } elseif (isset($oldOptions['password'])) {
            $payseraPaymentPluginSettings->setProjectPassword($oldOptions['password']);
        }

        if (isset($mainOptions[self::TEST_MODE])) {
            $payseraPaymentPluginSettings->setTestModeEnabled($mainOptions[self::TEST_MODE] === 'yes');
        } elseif (isset($oldOptions['test'])) {
            $payseraPaymentPluginSettings->setTestModeEnabled($oldOptions['test'] === 'yes');
        } else {
            $payseraPaymentPluginSettings->setTestModeEnabled(false);
        }

        if (isset($extraOptions[self::TITLE])) {
            $payseraPaymentPluginSettings->setTitle($extraOptions[self::TITLE]);
        } elseif (isset($oldOptions['title'])) {
            $payseraPaymentPluginSettings->setTitle($oldOptions['title']);
        } else {
            $payseraPaymentPluginSettings->setTitle(__(self::DEFAULT_TITLE, PayseraPaths::PAYSERA_TRANSLATIONS));
        }

        if (isset($extraOptions[self::DESCRIPTION])) {
            $payseraPaymentPluginSettings->setDescription($extraOptions[self::DESCRIPTION]);
        } elseif (isset($oldOptions['description'])) {
            $payseraPaymentPluginSettings->setDescription($oldOptions['description']);
        } else {
            $payseraPaymentPluginSettings->setDescription(
                __(self::DEFAULT_DESCRIPTION, PayseraPaths::PAYSERA_TRANSLATIONS)
            );
        }

        if (isset($extraOptions[self::LIST_OF_PAYMENTS])) {
            $payseraPaymentPluginSettings->setListOfPaymentsEnabled($extraOptions[self::LIST_OF_PAYMENTS] === 'yes');
        } elseif (isset($oldOptions['paymentType'])) {
            $payseraPaymentPluginSettings->setListOfPaymentsEnabled($oldOptions['paymentType'] === 'yes');
        } else {
            $payseraPaymentPluginSettings->setListOfPaymentsEnabled(false);
        }

        if (isset($extraOptions[self::SPECIFIC_COUNTRIES])) {
            $payseraPaymentPluginSettings->setSpecificCountries($extraOptions[self::SPECIFIC_COUNTRIES]);
        } elseif (isset($oldOptions['countriesSelected'])) {
            $normalizedSpecificCountries = [];

            if ($oldOptions['countriesSelected'] !== '') {
                foreach ($oldOptions['countriesSelected'] as $countryCode) {
                    $normalizedSpecificCountries[] = strtoupper($countryCode);
                }
            }

            $payseraPaymentPluginSettings->setSpecificCountries($normalizedSpecificCountries);
        }

        if (isset($extraOptions[self::GRID_VIEW])) {
            $payseraPaymentPluginSettings->setGridViewEnabled($extraOptions[self::GRID_VIEW] === 'yes');
        } elseif (isset($oldOptions['style'])) {
            $payseraPaymentPluginSettings->setGridViewEnabled($oldOptions['style'] === 'yes');
        } else {
            $payseraPaymentPluginSettings->setGridViewEnabled(false);
        }

        if (isset($extraOptions[self::BUYER_CONSENT])) {
            $payseraPaymentPluginSettings->setBuyerConsentEnabled($extraOptions[self::BUYER_CONSENT] === 'yes');
        } elseif (isset($oldOptions['buyerConsent'])) {
            $payseraPaymentPluginSettings->setBuyerConsentEnabled($oldOptions['buyerConsent'] === 'yes');
        } else {
            $payseraPaymentPluginSettings->setBuyerConsentEnabled(true);
        }

        if (isset($statusOptions[self::NEW_ORDER_STATUS])) {
            $payseraPaymentPluginSettings->setNewOrderStatus($statusOptions[self::NEW_ORDER_STATUS][0]);
        } elseif (isset($oldOptions['paymentNewOrderStatus'])) {
            $payseraPaymentPluginSettings->setNewOrderStatus($oldOptions['paymentNewOrderStatus']);
        } else {
            $payseraPaymentPluginSettings->setNewOrderStatus('wc-processing');
        }

        if (isset($statusOptions[self::PAID_ORDER_STATUS])) {
            $payseraPaymentPluginSettings->setPaidOrderStatus($statusOptions[self::PAID_ORDER_STATUS][0]);
        } elseif (isset($oldOptions['paymentCompletedStatus'])) {
            $payseraPaymentPluginSettings->setPaidOrderStatus($oldOptions['paymentCompletedStatus']);
        } else {
            $payseraPaymentPluginSettings->setPaidOrderStatus('wc-completed');
        }

        if (isset($statusOptions[self::PENDING_CHECKOUT_STATUS])) {
            $payseraPaymentPluginSettings->setPendingCheckoutStatus($statusOptions[self::PENDING_CHECKOUT_STATUS][0]);
        } elseif (isset($oldOptions['paymentPendingStatus'])) {
            $payseraPaymentPluginSettings->setPendingCheckoutStatus($oldOptions['paymentPendingStatus']);
        } else {
            $payseraPaymentPluginSettings->setPendingCheckoutStatus('wc-pending');
        }
        if (isset($projectAdditionsOptions[self::OWNERSHIP_CODE_ENABLED])) {
            $payseraPaymentPluginSettings->setOwnershipCodeEnabled(
                $projectAdditionsOptions[self::OWNERSHIP_CODE_ENABLED] === 'yes'
            );
        } elseif (isset($oldOptions['enableOwnershipCode'])) {
            $payseraPaymentPluginSettings->setOwnershipCodeEnabled($oldOptions['enableOwnershipCode'] === 'yes');
        } else {
            $payseraPaymentPluginSettings->setOwnershipCodeEnabled(false);
        }

        if (isset($projectAdditionsOptions[self::OWNERSHIP_CODE])) {
            $payseraPaymentPluginSettings->setOwnershipCode($projectAdditionsOptions[self::OWNERSHIP_CODE]);
        } elseif (isset($oldOptions['ownershipCode'])) {
            $payseraPaymentPluginSettings->setOwnershipCode($oldOptions['ownershipCode']);
        }

        if (isset($projectAdditionsOptions[self::QUALITY_SIGN_ENABLED])) {
            $payseraPaymentPluginSettings->setQualitySignEnabled(
                $projectAdditionsOptions[self::QUALITY_SIGN_ENABLED] === 'yes'
            );
        } elseif (isset($oldOptions['enableQualitySign'])) {
            $payseraPaymentPluginSettings->setQualitySignEnabled($oldOptions['enableQualitySign'] === 'yes');
        } else {
            $payseraPaymentPluginSettings->setQualitySignEnabled(false);
        }
        return $payseraPaymentPluginSettings;
    }
}
