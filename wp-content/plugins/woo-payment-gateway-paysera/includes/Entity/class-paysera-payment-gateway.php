<?php

declare(strict_types=1);

defined('ABSPATH') or exit;

use Paysera\Includes\PayseraPaths;
use Paysera\Includes\PayseraPaymentFieldGenerator;
use Paysera\Includes\PayseraPaymentSettings;
use Paysera\Includes\PayseraPaymentRequest;

class Paysera_Payment_Gateway extends WC_Payment_Gateway
{
    private $paymentPluginSettings;
    private $payseraPaymentFieldGenerator;
    private $payseraPaymentRequest;

    private const RESPONSE_STATUS_CONFIRMED = 1;
    private const RESPONSE_STATUS_ADDITIONAL_INFO = 3;

    public function __construct()
    {
        $this->paymentPluginSettings = (new PayseraPaymentSettings())->getPaymentPluginSettings();
        $this->payseraPaymentFieldGenerator = new PayseraPaymentFieldGenerator();
        $this->payseraPaymentRequest = new PayseraPaymentRequest();

        $this->id = 'paysera';
        $this->has_fields = true;
        $this->method_title = $this->paymentPluginSettings->getTitle();
        $this->method_description = $this->paymentPluginSettings->getDescription();
        $this->icon = apply_filters('woocommerce_paysera_icon', PayseraPaths::PAYSERA_LOGO);
        $this->title = $this->paymentPluginSettings->getTitle();
        $this->description = $this->paymentPluginSettings->getDescription();

        $this->init_form_fields();
        $this->init_settings();

        add_action('woocommerce_thankyou_paysera', [$this, 'processOrderAfterPayment']);
        add_action('woocommerce_api_wc_gateway_paysera', [$this, 'checkCallbackRequest']);
        add_action('woocommerce_update_options_payment_gateways_paysera', [$this, 'process_admin_options']);
    }

    public function admin_options(): void
    {
        wp_redirect('admin.php?page=paysera-payments');
    }

    public function payment_fields(): void
    {
        wp_enqueue_style('custom-frontend-style', PayseraPaths::PAYSERA_PAYMENT_STYLESHEET);
        wp_enqueue_script('custom-backend-script', PayseraPaths::PAYSERA_PAYMENT_FRONTEND_JS, ['jquery']);

        print_r($this->payseraPaymentFieldGenerator->generate());
    }

    public function process_payment($order_id): array
    {
        $order = wc_get_order($order_id);
        $order->add_order_note(
            __(PayseraPaths::PAYSERA_MESSAGE . 'Order checkout process is started', PayseraPaths::PAYSERA_TRANSLATIONS)
        );
        $this->updateOrderStatus($order, $this->paymentPluginSettings->getPendingCheckoutStatus());

        wc_maybe_reduce_stock_levels($order_id);

        return [
            'result' => 'success',
            'redirect' => $this->payseraPaymentRequest->buildPaymentRequestUrl(
                $order,
                ($this->paymentPluginSettings->isListOfPaymentsEnabled() === true)
                    ? esc_html($_REQUEST['payment']['pay_type']) : '',
                $this->get_return_url($order)
            ),
        ];
    }

    public function processOrderAfterPayment($order_id): void
    {
        $order = wc_get_order($order_id);
        $currentStatus = 'wc-' . $order->get_status();

        if (
            $currentStatus === $this->paymentPluginSettings->getPendingCheckoutStatus()
            && $currentStatus !== $this->paymentPluginSettings->getNewOrderStatus()
        ) {
            $order->add_order_note(
                __(PayseraPaths::PAYSERA_MESSAGE . 'Customer came back to page', PayseraPaths::PAYSERA_TRANSLATIONS)
            );
            $this->updateOrderStatus($order, $this->paymentPluginSettings->getNewOrderStatus());
        }
    }

    public function checkCallbackRequest(): void
    {
        try {
            $response = WebToPay::validateAndParseData(
                $_REQUEST,
                $this->paymentPluginSettings->getProjectId(),
                $this->paymentPluginSettings->getProjectPassword()
            );

            if ((int) $response['status'] === self::RESPONSE_STATUS_CONFIRMED) {
                $order = wc_get_order($response['orderid']);

                if ($this->isPaymentValid($order, $response) === true) {
                    error_log(
                        $this->formatLogMessage(
                            $order,
                            __('Payment confirmed with a callback', PayseraPaths::PAYSERA_TRANSLATIONS)
                        )
                    );

                    $order->add_order_note(
                        __(
                            PayseraPaths::PAYSERA_MESSAGE . 'Callback order payment completed',
                            PayseraPaths::PAYSERA_TRANSLATIONS
                        )
                    );
                    $this->updateOrderStatus($order, $this->paymentPluginSettings->getPaidOrderStatus());

                    print_r('OK');
                }
            } elseif ((int) $response['status'] === self::RESPONSE_STATUS_ADDITIONAL_INFO) {
                print_r('Expecting status 1, status 3 received');
            }
        } catch (Exception $exception) {
            $error = get_class($exception) . ': ' . $exception->getMessage();
            error_log($error);
            print_r($error);
        }

        exit();
    }

    private function isPaymentValid(WC_Order $order, array $response): bool
    {
        if ((string) ($order->get_total() * 100) !== $response['amount']) {
            throw new Exception(
                $this->formatLogMessage($order, __('Amounts do not match', PayseraPaths::PAYSERA_TRANSLATIONS))
            );
        }

        if ($order->get_currency() !== $response['currency']) {
            throw new Exception(
                $this->formatLogMessage($order, __('Currencies do not match', PayseraPaths::PAYSERA_TRANSLATIONS))
            );
        }

        return true;
    }

    private function formatLogMessage(WC_Order $order, string $message): string
    {
        return sprintf(
            __('%s: Order %s; Amount: %s%s', PayseraPaths::PAYSERA_TRANSLATIONS),
            $message,
            $order->get_id(),
            $order->get_total(),
            $order->get_currency()
        );
    }

    private function updateOrderStatus(WC_Order $order, string $status): void
    {
        $orderStatus = str_replace('wc-', '', $status);
        $order->update_status(
            $orderStatus,
            __(
                PayseraPaths::PAYSERA_MESSAGE . 'Status changed to ',
                PayseraPaths::PAYSERA_TRANSLATIONS
            ) . $orderStatus,
            true
        );
    }
}
