<?php

$param = array(
	'name'				=> esc_attr__( 'My Account', 'sobari_sc' ),
	'base'				=> 'dahz_my_account',
	'category'	=> array( 'WooCommerce' ),
	'description'		=> esc_attr__( 'Shows the my account sections', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-ecommerce-67.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Order Count', 'sobari_sc' ),
	'param_name'	=> 'order_count',
	'description'	=> esc_attr__( 'You can specify the number or order to show, its set by default to 15 (use -1to display all orders)', 'sobari_sc' )
);
return $param;
