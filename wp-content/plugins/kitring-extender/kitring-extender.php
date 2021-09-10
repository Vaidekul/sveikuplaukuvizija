<?php
/**
 * Plugin Name: Kitring Extender
 * Plugin URI: 
 * Description: Dahz kitring extended plugin
 * Version: 2.0.0
 * Author: DAHZ
 * Author URI: http://daffyhazan.com
 *
 * Text Domain: kitring
 * Domain Path: /languages/
 *
 * @package DahzExtender
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define DAHZEXTENDER_PLUGIN_FILE.
if ( ! defined( 'DAHZEXTENDER_PLUGIN_FILE' ) ) {
	define( 'DAHZEXTENDER_PLUGIN_FILE', __FILE__ );
}
// Include the main DahzExtender class.
include_once dirname( __FILE__ ) . '/extensions/dahz-panel-framework/dahz-panel-framework.php';

if ( ! class_exists( 'DahzExtender' ) ) {
	include_once dirname( __FILE__ ) . '/extensions/class-dahzextender.php';
}

/**
 * Main instance of DahzExtender.
 *
 * Returns the main instance of DahzExtender to prevent the need to use globals.
 *
 * @return DahzExtender
 */
function DahzExtender() {
	return DahzExtender::instance();
}


// Global for backwards compatibility.
$GLOBALS['DahzExtender'] = DahzExtender();
