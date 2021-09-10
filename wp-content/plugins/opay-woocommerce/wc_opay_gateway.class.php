<?php

class WC_OPAY_Gateway extends WC_Payment_Gateway {

    public function __construct()
    {
        // Older WooCommerce version doesn't set WC function
        if (function_exists('WC'))
        {
            $this->wc = WC();
        }
        elseif (isset($GLOBALS['woocommerce']))
        {
            $this->wc = $GLOBALS['woocommerce'];
        }

        // Sets system language
        $this->wp_language = substr(get_locale(), 0, 2);

        // The global ID for this Payment method
        $this->id = 'opay';
        if (is_admin())
        {
            // The Title shown on the top of the Payment Gateways Page next to all the other Payment Gateways
            $this->method_title = __( 'OPAY Payment Gateway', 'opay-woocommerce');
        }
        else
        {
            // The Title shown on the top of the Payment Gateways Page next to all the other Payment Gateways
            $this->method_title = ($this->get_settings('payment_gateway_name') != '') ? $this->get_settings('payment_gateway_name') : __( 'OPAY Payment Gateway', 'opay-woocommerce');
        }

        // The title to be used for the vertical tabs that can be ordered top to bottom
        $this->title = ($this->get_settings('payment_gateway_name') != '') ? $this->get_settings('payment_gateway_name') : __( 'OPAY Payment Gateway', 'opay-woocommerce');


        // The description for this Payment Gateway, shown on the actual Payment options page on the backend
        $this->method_description = __( 'OPAY Payment Gateway plugin for WooCommerce', 'opay-woocommerce' );


        // URL of an image next to the gateway's name on the frontend
        $this->icon = null;

        // when doing a direct integration (when CC fields are integrated in)
        $this->has_fields = true;
        $this->supports = array( 'default_credit_card_form' );


        // This basically defines your settings which are then loaded with init_settings()
        $this->init_form_fields();

        // After init_settings() is called, you can get the settings and load them into variables, e.g:
        // $this->title = $this->get_option( 'title' );
        $this->init_settings();

        // Turn these settings into variables we can use
        foreach ($this->settings as $setting_key => $value) {
            $this->$setting_key = $value;
        }

        if (is_admin())
        {
            if (version_compare(WOOCOMMERCE_VERSION, '2.0.0', '>='))
            {
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
            }
            else
            {
                add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
            }

            add_action('admin_enqueue_scripts', array($this, 'add_admin_javascript'));
        }
        else
        {
            add_action('woocommerce_thankyou_'.$this->id, array($this, 'handle_request_to_redirect_url'));
        }

        add_action( 'woocommerce_api_wc_opay_gateway',  array($this, 'handle_request_to_web_service_url') );
    }

    public function get_title()
    {
        /**
         * Title field could get translated by WCML on load. Since translations
         * for this field come from our side, we prevent that.
         */
        $paymentGatewayName = ($this->get_settings('payment_gateway_name') != '') ? $this->get_settings('payment_gateway_name') : __( 'OPAY Payment Gateway', 'opay-woocommerce');        $this->title = $this->title != $paymentGatewayName ? $paymentGatewayName : $this->title;
        return $this->title;
    }

    protected function set_order_complete()
    {
        try
        {
            if (!isset($this->opay))
            {
                $this->opay = new OpayGateway();
            }

            $parametersArray = array();

            if (isset($_POST['encoded']))
            {
                $parametersArray = $this->opay->convertEncodedStringToArrayOfParameters($_POST['encoded']);
            }
            else if (isset($_GET['encoded']))
            {
                $parametersArray = $this->opay->convertEncodedStringToArrayOfParameters($_GET['encoded']);
            }
            else if (isset($_POST['password_signature']) || isset($_POST['rsa_signature']))
            {
                $parametersArray = $_POST;
            }
            else if (isset($_GET['password_signature']) || isset($_GET['rsa_signature']))
            {
                $parametersArray = $_GET;
            }


            if (!empty($parametersArray))
            {
                if ($this->signature_type == 'rsa_private_key')
                {
                    $this->opay->setMerchantRsaPrivateKey($this->private_key);
                    $this->opay->setOpayCertificate($this->opay_certificate);
                }
                else
                {
                    $this->opay->setSignaturePassword($this->signature_password);
                }

                if ($this->opay->verifySignature($parametersArray))
                {
                    if ($parametersArray['status'] == '1')
                    {
                        global $wpdb;
                        $request = "SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_NAME = '{$wpdb->posts}' AND TABLE_SCHEMA = '{$wpdb->dbname}'";
                        $result = $wpdb->get_row($request);
                        $engine = isset($result->ENGINE) ? $result->ENGINE : '';
                        $order = new WC_Order($parametersArray['order_nr']);
                        // if such order exists
                        if (isset($order->billing_country))
                        {
                            if ($engine == 'InnoDB') {
                                // Locking order until order state is changed to avoid possible double payment captures when user redirect and callback are happening at the exact same time
                                $wpdb->query('START TRANSACTION');

                                $lockedOrder = $wpdb->get_row($wpdb->prepare("SELECT id, post_status FROM {$wpdb->posts} WHERE id = %s AND post_type = 'shop_order' FOR UPDATE", $parametersArray['order_nr']));
                                if (
                                    isset($lockedOrder->post_status) &&
                                    $lockedOrder->post_status != 'wc-pending' && 
                                    $lockedOrder->post_status != 'wc-cancelled'
                                ) {
                                    $wpdb->query('ROLLBACK');
                                    return;
                                }
                            }
                            if (method_exists($order, 'get_order_currency'))
                            {
                                $currency = strtoupper($order->get_order_currency());
                            }
                            else
                            {
                                $currency = strtoupper(get_woocommerce_currency());
                            }

                            if ($currency == strtoupper($parametersArray['p_currency']))
                            {
                                $orderTotal = intval(number_format($order->get_total(), 2, '', ''));
                                if ($parametersArray['p_amount'] >= $orderTotal)
                                {
                                    if (in_array(strtolower($order->status), array('pending', 'cancelled')))
                                    {
                                        $order->payment_complete();
                                    }

                                }
                            }
                            if ($engine == 'InnoDB') {
                                $wpdb->query('COMMIT');
                            }
                        }
                    }
                }
            }
        }
        catch (OpayGatewayException $e)
        {
            // do nothing
        }

    }

    public function handle_request_to_redirect_url($orderId)
    {
        global $woocommerce;
        require_once dirname(__FILE__).'/lib/opay_8.1.gateway.inc.php';

        $this->set_order_complete();
        $woocommerce->cart->empty_cart();
    }

    public function handle_request_to_web_service_url()
    {
        require_once dirname(__FILE__).'/lib/opay_8.1.gateway.inc.php';

        // request came from checkout page. Here we redirect customer to OPAY
        if (!empty($_REQUEST['redirect-to-opay']) && !empty($_REQUEST['order_nr']))
        {
            $order = new WC_Order($_REQUEST['order_nr']);

            // Get country code
            if (isset($order->billing_country))
            {
                $country = $order->billing_country;
            }
            else
            {
                $country = get_option('woocommerce_default_country');
            }

            // if such order exists
            $paramsArray = array(
                'website_id'            => $this->website_id,
                'order_nr'              => $order->id,
                'redirect_url'          => $this->get_return_url($order),
                'web_service_url'       => $this->wc->api_request_url(__CLASS__),
                'standard'              => 'opay_8.1',
                'country'               => $country,
                'amount'                => number_format($order->get_total(), 2, '', ''),
                'currency'              => get_woocommerce_currency(),
                'c_email'               => $order->billing_email,
                'c_mobile_nr'           => $order->billing_phone
            );

            if (!empty($_REQUEST['channel']))
            {
                $paramsArray['pass_through_channel_name'] = $_REQUEST['channel'];
                $order->add_order_note(__( 'Customer chose payment method', 'opay-woocommerce').': '.$_REQUEST['channel']);
            }
            else
            {
                $order->add_order_note(__( 'Customer redirected to external OPAY page', 'opay-woocommerce'));
            }

            if (!empty($_REQUEST['language']))
            {
                $paramsArray['language'] = $_REQUEST['language'];
            }
            else
            {
                $paramsArray['language'] = $this->wp_language;
            }

            if ($this->test_mode == 'enabled')
            {
                $paramsArray['test'] = $this->user_id;
            }

            if (!isset($this->opay))
            {
                $this->opay = new OpayGateway();
            }

            if ($this->signature_type == 'rsa_private_key')
            {
                $this->opay->setMerchantRsaPrivateKey($this->private_key);
                $this->opay->setOpayCertificate($this->opay_certificate);
            }
            else
            {
                $this->opay->setSignaturePassword($this->signature_password);
            }

            $paramsArray = $this->opay->signArrayOfParameters($paramsArray);

            echo $this->opay->generatetAutoSubmitForm('https://gateway.opay.lt/pay/', $paramsArray);
        }
        else
        {
            $this->set_order_complete();
            echo 'OK';
        }
        exit();
    }

    public function add_admin_javascript()
    {
        global $opayClassName;
        // Get current tab/section
        $current_tab     = empty($_GET['tab'] ) ? 'general' : sanitize_title( $_GET['tab']);
        $current_section = empty($_REQUEST['section'] ) ? '': sanitize_title( $_REQUEST['section']);

        // Checking if we are in the checkout settings tab and in opay section
        //
        // Now Tab name is set to 'checkout', though in WC version 2.0.20
        // 'payment_gateways' is being used.
        // Now section name is set to class id but until version 2.6.0 it was
        // set to class name.
        if (in_array($current_tab, array('checkout', 'payment_gateways'))
            && in_array($current_section, array(strtolower($opayClassName), $this->id))
        ) {
            wp_enqueue_script('opay-woocommerce-admin', plugins_url().DIRECTORY_SEPARATOR.'opay-woocommerce'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'opay-woocommerce-admin.js', array('jquery'), 'v1.2');
        }
    }

    public function init_form_fields()
    {
        $this->form_fields = array(
            'enabled' => array(
                'title'     => __('Enable / Disable', 'opay-woocommerce'),
                'label'     => __('Enable OPAY Gateway', 'opay-woocommerce'),
                'type'      => 'checkbox',
                'default'   => 'no',
            ),
            'website_id' => array(
                'title'     => '*'.__('Website ID', 'opay-woocommerce'),
                'type'      => 'text',
                'custom_attributes' => array( 'required' => 'required' )
            ),
            'test_mode' => array(
                'title'     => __('Test mode', 'opay-woocommerce'),
                'type'      => 'select',
                'options'   => array(
                    'enabled'   =>  __('Enabled', 'opay-woocommerce'),
                    'disabled'  =>  __('Disabled', 'opay-woocommerce')
                ),
                'default' => 'disabled'
            ),
            'user_id' => array(
                'title'       => '*'.__( 'User ID', 'opay-woocommerce'),
                'type'        => 'text',
                'desc_tip' => __('Needed when Test mode is enabled', 'opay-woocommerce'),
                'custom_attributes' => array( 'required' => 'required' )
            ),
            'signature_type' => array(
                'title'     => __('Sign data with', 'opay-woocommerce'),
                'type'      => 'select',
                'options'   => array(
                    'rsa_private_key'     =>  __('RSA private key', 'opay-woocommerce'),
                    'signature_password'  =>  __('Signature password', 'opay-woocommerce')
                ),
                'default' => 'rsa_private_key'
            ),
            'private_key' => array(
                'title' => '*'.__( 'Private key', 'opay-woocommerce'),
                'type'  => 'textarea',
                'css'   => 'height:200px;',
                'custom_attributes' => array( 'required' => 'required' )
            ),
            'opay_certificate' => array(
                'title'       => '*'.__( 'OPAY\'s certificate', 'opay-woocommerce'),
                'type'        => 'textarea',
                'css'   => 'height:200px;',
                'custom_attributes' => array( 'required' => 'required' )
            ),
            'signature_password' => array(
                'title'     => '*'.__('Signature password', 'opay-woocommerce'),
                'type'      => 'text',
                'custom_attributes' => array( 'required' => 'required' )
            ),
            'show_payment_methods' => array(
                'title'     => __('Show payment methods', 'opay-woocommerce'),
                'type'      => 'select',
                'options'   => array(
                    'in_checkout_page_grouped'  =>  __('In checkout page grouped', 'opay-woocommerce'),
                    'in_checkout_page'          =>  __('In checkout page', 'opay-woocommerce'),
                    'in_external_opay_page'     =>  __('In external OPAY page', 'opay-woocommerce')
                ),
                'default' => 'in_checkout_page_grouped'
            ),
            'height_of_banks_icons' => array(
                'title'     => __('Height of banks\' icons', 'opay-woocommerce'),
                'type'      => 'select',
                'options'   => array(
                    '33' =>  '33px',
                    '49' =>  '49px',
                ),
                'default' => '33'
            )
        );
    }


    public function process_payment( $order_id )
    {
        if (empty($_REQUEST['channel']) && empty($_REQUEST['no-channel']))
        {
            throw new Exception( __( 'Please choose payment method', 'opay-woocommerce' ) );
        }

        $paramsArray['redirect-to-opay'] = '1';
        $paramsArray['order_nr'] = $order_id;

        if (!empty($_REQUEST['channel']))
        {
            $paramsArray['channel'] = $_REQUEST['channel'];
        }

        $paramsArray['language'] = $this->wp_language;

        return array(
                'result'   => 'success',
                'redirect' => add_query_arg($paramsArray, $this->wc->api_request_url(__CLASS__)),
        );

    }

    /**
     * Overidden function.
     * Older woocommerce versions use this instead of credit_card_form.
     */
    public function payment_fields()
    {
        $this->credit_card_form();
    }

    // overriding abstract-wc-payment-gateway.php method  credit_card_form()
    public function credit_card_form($args = array(), $fields = array())
    {
        $str = '';
        if (in_array($this->show_payment_methods, array('in_checkout_page_grouped', 'in_checkout_page')))
        {
            $channelsArray = $this->get_channels();

            if (!empty($channelsArray))
            {
                if ($this->show_payment_methods == 'in_checkout_page')
                {
                    $str .= '<ul style="display: block; list-style: outside none none; margin: 0; padding: 10px 0 0;">';
                }
                foreach ($channelsArray as $groupKey => $group)
                {
                    if ($this->show_payment_methods == 'in_checkout_page_grouped')
                    {
                        $str .= '<label class="opay-payment-group-title opay-payment-group-title-'.$groupKey.'" style="padding-top:5px; font-weight:bold;">'.$group['group_title'].'</label>';
                        $str .= '<ul class="opay-payment-group opay-payment-group-'.$groupKey.'" style="display: block; list-style: outside none none; margin: 0; padding: 10px 0 0;">';
                    }
                    foreach ($group['channels'] as $channelKey => $channel)
                    {
                        if ($this->height_of_banks_icons == '33')
                        {
                            $width = '110px';
                        }
                        else if ($this->height_of_banks_icons == '49')
                        {
                            $width = '170px';
                        }

                        if ($this->show_payment_methods == 'in_checkout_page')
                        {
                            $groupClass = ' opay-payment-group-'.$groupKey;
                        }
                        else
                        {
                            $groupClass = '';
                        }

                        $str .= '
                            <li class="opay-payment-item'.$groupClass.' opay-payment-item-'.$channelKey.'" style="box-sizing: border-box; display: block; float: left; list-style: outside none none; margin: 0; padding: 2px; position: relative; width:'.$width.';">
                               <label for="in-'.$channelKey.'" style="border:solid 1px #d8d7d7; display: block; padding: 0 0 35px;" onMouseOver="this.style.backgroundColor=\'#e4e4e4\'"  onMouseOut="this.style.backgroundColor=\'\'">
                                  <span title="'.$channel['title'].'" style="background-image:url('.$channel['logo_urls']['color_'.$this->height_of_banks_icons.'px'].');  background-position: center center; background-repeat: no-repeat; display: block; height: 65px; position: relative;">
                                     <input type="radio" id="in-'.$channelKey.'" value="'.$channelKey.'" name="channel" style="display: inline-block; left: 50%; margin-left: -5px; position: absolute; top: 70px;">
                                  </span>
                               </label>
                            </li>
                        ';
                    }
                    if ($this->show_payment_methods == 'in_checkout_page_grouped')
                    {
                        $str .= '</ul>';
                        $str .= '<div style="clear: both; margin-bottom:10px;" class="opay-clear"></div>';
                    }
                }
                if ($this->show_payment_methods == 'in_checkout_page')
                {
                    $str .= '</ul>';
                    $str .= '<div style="clear: both; margin-bottom:10px;" class="opay-clear"></div>';
                }
            }

        }

        if ($str != '')
        {
            echo $str;
        }
        else
        {
            echo ($this->get_settings('payment_gateway_description') != '') ? '<p>'.$this->get_settings('payment_gateway_description').'</p>' : '';
            echo '<input type="hidden" name="no-channel" value="1">';
        }
    }

    protected function get_settings($name = '')
    {
        $paramsArray = array(
                'service_name' => 'getSettings',
                'website_id'   => $this->get_option('website_id'),
        );

        $paramsArray['language'] = $this->wp_language;

        $session_var_name = 'website_settings'.md5(serialize($paramsArray));

        if ($this->get_session_var($session_var_name) === false)
        {
            require_once dirname(__FILE__).'/lib/opay_8.1.gateway.inc.php';

            if (!isset($this->opay))
            {
                $this->opay = new OpayGateway();
            }

            if ($this->get_option('signature_type') == 'rsa_private_key')
            {
                $this->opay->setMerchantRsaPrivateKey($this->get_option('private_key'));
                $this->opay->setOpayCertificate($this->get_option('opay_certificate'));
            }
            else
            {
                $this->opay->setSignaturePassword($this->get_option('signature_password'));
            }

            try
            {
                $paramsArray = $this->opay->signArrayOfParameters($paramsArray);
                $array = $this->opay->webServiceRequest('https://gateway.opay.lt/api/websites/', $paramsArray);
                if (!empty($array['response']['result']))
                {
                    $this->set_session_var($session_var_name, $array['response']['result']);
                }
            }
            catch (OpayGatewayException $e)
            {
                // do nothing
            }
        }

        $website_settings = $this->get_session_var($session_var_name);
        if ($name != '')
        {
            return (isset($website_settings[$name])) ? $website_settings[$name] : '';
        }
        else
        {
            return (isset($website_settings)) ? $website_settings : array();
        }
    }

    protected function get_channels()
    {
        if (!isset($this->channels))
        {
            require_once dirname(__FILE__).'/lib/opay_8.1.gateway.inc.php';

            if (method_exists($this, 'get_order_total'))
            {
                $amount = number_format($this->get_order_total(), 2, '', '');
            }
            else
            {
                $amount = number_format($this->wc->cart->total, 2, '', '');
            }

            // Get country code
            if (isset($_REQUEST['country']))
            {
                $country = $_REQUEST['country'];
            }
            else
            {
                $country = get_option('woocommerce_default_country');
            }

            $paramsArray = array(
                'website_id'            => $this->website_id,
                'order_nr'              => 'order nr',
                'redirect_url'          => $this->get_return_url(),
                'web_service_url'       => $this->wc->api_request_url(__CLASS__),
                'standard'              => 'opay_8.1',
                'country'               => $country,
                'amount'                => $amount,
                'currency'              => get_woocommerce_currency()
            );

            $paramsArray['language'] = $this->wp_language;

            if ($this->test_mode == 'enabled')
            {
                $paramsArray['test'] = $this->user_id;
            }

            if (!isset($this->opay))
            {
                $this->opay = new OpayGateway();
            }

            if ($this->signature_type == 'rsa_private_key')
            {
                $this->opay->setMerchantRsaPrivateKey($this->private_key);
                $this->opay->setOpayCertificate($this->opay_certificate);
            }
            else
            {
                $this->opay->setSignaturePassword($this->signature_password);
            }

            try
            {
                $paramsArray = $this->opay->signArrayOfParameters($paramsArray);
                $array = $this->opay->webServiceRequest('https://gateway.opay.lt/api/listchannels/', $paramsArray);

                if (!empty($array['response']['result']))
                {
                    $this->channels = $array['response']['result'];
                }

            }
            catch (OpayGatewayException $e)
            {
                // do nothing
            }
        }

        return (isset($this->channels)) ? $this->channels : array();
    }

    public function validate_fields()
    {
        return true;
    }

    private function get_session_var($name)
    {
        if (isset($this->wc->session))
        {
            if (method_exists($this->wc->session, 'get'))
            {
                return $this->wc->session->get($name, false);
            }
            else
            {
                if (isset($this->wc->session->$name))
                {
                    return $this->wc->session->$name;
                }
            }
        }
        return false;
    }

    private function set_session_var($name, $value)
    {
        if (isset($this->wc->session))
        {
            if (method_exists($this->wc->session, 'set'))
            {
                $this->wc->session->set($name, $value);
            }
            else
            {
                $this->wc->session->$name = $value;
            }

        }
    }
}

