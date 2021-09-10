<?php
/*
Plugin Name: WooCommerce Additional Fees On Checkout (Free)
Plugin URI: http://www.wpsuperiors.com/product/woo-additional-fees-on-checkout/
Description: Create an field on checkout page to apply an extra cost. *Do not activate FREE and PREMIUM at the same time.*
Version: 1.4.1
Author: WPSuperiors
Author URI: https://www.wpsuperiors.com/woocommerce-additional-fees-on-checkout/
* WC requires at least: 3.5.0
* WC tested up to: 5.6.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	wp_die('Please Go Back');
	exit;
}
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
add_action( 'admin_init', 'active_check' );
function active_check() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        add_action( 'admin_notices', 'active_failed_notice' );
        deactivate_plugins( plugin_basename( __FILE__ ) ); 
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function active_failed_notice(){
    ?><div class="error"><p>Please Activate <b>WooCommerce</b> Plugin, Before You Proceed To Activate <b>WooCommerce Additional Fees On Checkout (Free)</b> Plugin.</p></div><?php
}


define('WPS_EXT_CST', 'Woo Extra Cost/Fees');

define( 'WPS_EXT_CST_BASE', plugin_basename( __FILE__ ) );
define( 'WPS_EXT_CST_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPS_EXT_CST_URL', plugin_dir_url( __FILE__ ) );
define( 'WPS_EXT_CST_AST', plugin_dir_url( __FILE__ ).'assets/' );
define( 'WPS_EXT_CST_JS', plugin_dir_url( __FILE__ ).'assets/js' );
define( 'WPS_EXT_CST_CSS', plugin_dir_url( __FILE__ ).'assets/CSS' );

require 'classes/wps-ext-cst-main.php';
require 'classes/wps-ext-cst-admin.php';
require 'classes/wps-ext-cst-admin-settings.php';
require 'classes/wps-ext-cst-frontend.php';
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wps_wafc_action_links_free' );
function wps_wafc_action_links_free($links)
{
    $plugin_links = array(
                '<a href="' . admin_url( 'admin.php?page=wps-ext-cst-option' ) . '">' . __( 'Settings') . '</a>',
                '<a href="https://www.wpsuperiors.com/contact-us/">' . __( 'Get Support') . '</a>',
                '<a href="https://www.wpsuperiors.com/woocommerce-additional-fees-on-checkout/">' . __( 'Get Premium') . '</a>'
            );
            return array_merge( $plugin_links, $links );
}


add_action(
    'wp_footer'
    , function() {
        ?>
        <script>
            jQuery( document ).ready(function( $ ) {
				jQuery('body').trigger('update_checkout');
			});
        </script>
        <?php
    }
    , 21
);