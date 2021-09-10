<?php

/*
Plugin Name: OPAY - Woocommerce
Description: This Woocommerce plugin integrates different payment methods supplied by OPAY Payment Gateway
Version: 1.3.6
Author: OPAY
Author URI: http://opay.lt
*/

$opayClassName = 'WC_OPAY_Gateway';

add_action('plugins_loaded', 'woocommerce_opay_gateway_init', 0);


function woocommerce_opay_gateway_init()
{
    load_plugin_textdomain('opay-woocommerce', false, dirname(plugin_basename( __FILE__ )).DIRECTORY_SEPARATOR.'languages' );

    global $opayClassName;
    // If WC_Payment_Gateway class doesn't exist, then WooCommerce is not installed on the site.
    if (!class_exists( 'WC_Payment_Gateway')) { return; }

    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.strtolower($opayClassName).'.class.php');

    // Adding OPAY Gateway to payment gateways
    add_filter('woocommerce_payment_gateways', 'woocommerce_add_opay_gateway' );

    function woocommerce_add_opay_gateway($methods)
    {
        global $opayClassName;
        $methods[] = strtolower($opayClassName);
        return $methods;
    }
}
