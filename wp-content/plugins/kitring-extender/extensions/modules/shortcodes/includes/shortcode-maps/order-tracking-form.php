<?php
/**
* KW
*/

$param = array(
	'name'				=> esc_attr__( 'Order Tracking Form', 'sobari_sc' ),
	'base'				=> 'dahz_order_tracking_form',
	'category'	=> array( 'WooCommerce' ),
	'description'		=> esc_attr__( 'Lets a user see the status of an order', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-order-tracking.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Color Scheme', 'sobari_sc' ),
	'param_name'	=> 'color_scheme',
	'value'			=> array(
		'Default'   => 'default',
		'Light'     => 'light',
		'Dark'      => 'dark',
	),
	'description'	=> esc_attr__( 'Set the product color scheme.', 'sobari_sc' )
);
return $param;
