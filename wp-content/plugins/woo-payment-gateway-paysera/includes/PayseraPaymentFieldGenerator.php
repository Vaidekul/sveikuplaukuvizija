<?php

declare(strict_types=1);

namespace Paysera\Includes;

defined('ABSPATH') or exit;

use WebToPay_PaymentMethodCountry;

class PayseraPaymentFieldGenerator
{
    private $payseraPaymentFrontHtml;
    private $payseraPaymentLibraryHelper;
    private $paymentPluginSettings;

    public function __construct()
    {
        $this->payseraPaymentFrontHtml = new PayseraPaymentFrontHtml();
        $this->payseraPaymentLibraryHelper = new PayseraPaymentLibraryHelper();
        $this->paymentPluginSettings = (new PayseraPaymentSettings())->getPaymentPluginSettings();
    }

    public function generate(): string
    {
        $billingCountry = strtolower(WC()->customer->get_billing_country());

        $paymentField = '';

        if ($this->paymentPluginSettings->isListOfPaymentsEnabled() === true) {
            $countries = $this->getCountries(
                $this->payseraPaymentLibraryHelper->getPaymentMethodList(
                    $this->paymentPluginSettings->getProjectId(),
                    round(WC()->cart->total * 100),
                    get_woocommerce_currency(),
                    $this->getLanguage()
                )
            );

            if (empty($countries) === false) {
                $paymentField .= $this->payseraPaymentFrontHtml->buildCountriesList($countries, $billingCountry)
                    . '<br/>'
                ;
            }

            $paymentField .= $this->payseraPaymentFrontHtml->buildPaymentsList(
                $countries,
                $this->paymentPluginSettings->isGridViewEnabled(),
                $billingCountry
            );
        } else {
            $paymentField = $this->paymentPluginSettings->getDescription() . '<br/>';
        }

        if ($this->paymentPluginSettings->isBuyerConsentEnabled() === true) {
            $paymentField .= '<br/>' . $this->payseraPaymentFrontHtml->buildBuyerConsent();
        }

        return $paymentField;
    }

    /**
     * @param WebToPay_PaymentMethodCountry[] $payseraCountries
     * @return array
     */
    private function getCountries(array $payseraCountries): array
    {
        $specificCountries = $this->paymentPluginSettings->getSpecificCountries();

        $countries = [];

        foreach ($payseraCountries as $country) {
            if (
                empty($specificCountries) === false
                && in_array(strtoupper($country->getCode()), $specificCountries) === false
            ) {
                continue;
            }

            $countries[] = [
                'code' => $country->getCode(),
                'title' => $country->getTitle(),
                'groups' => $country->getGroups(),
            ];
        }

        return $countries;
    }

    private function getLanguage(): string
    {
        $language = explode('_', get_locale())[0];

        if (in_array($language, PayseraPaymentSettings::ISO_639_1_LANGUAGES) === true) {
            return $language;
        }

        return PayseraPaymentSettings::DEFAULT_ISO_639_1_LANGUAGE;
    }
}
