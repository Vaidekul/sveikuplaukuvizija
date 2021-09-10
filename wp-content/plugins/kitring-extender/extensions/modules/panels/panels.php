<?php
if ( ! defined('ABSPATH') ) {
	exit;
}


$dpf = DPF_Core::getInstance( 'dahz-extender' );
$adminPanel = $dpf->createAdminPanel( array(
	'name' => 'Dahz Extender',
	// 'desc' => 'Description Here',
) );


/**
 * Register and call the panel included for DPF
 */
include DAHZEXTENDER_MODULES_ABSPATH . 'panels/panel-views/panels-portfolio.php';