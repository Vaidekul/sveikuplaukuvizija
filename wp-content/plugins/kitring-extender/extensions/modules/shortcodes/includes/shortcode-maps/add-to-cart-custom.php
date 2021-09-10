<?php
$param = array(
	'name'			=> esc_attr__( 'Add to Cart Custom', 'upsob_sc' ),
	'base'			=> 'add_to_cart_custom',
	'category'	=> array( 'WooCommerce' ),
	'description'	=> esc_attr__( 'Show the price and add to cart button of a single product by ID', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-add-to-cart.svg",
	'params'		=> array(),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Product ID', 'upsob_sc' ),
	'param_name'	=> 'product_id',
	'description'	=> esc_attr__( 'Select product to display', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Show Price', 'upsob_sc' ),
	'param_name'	=> 'show_price',
	'value'			=> array(
		esc_attr__( 'Yes', 'upsob_sc' )	=> 'true',
		esc_attr__( 'No', 'upsob_sc' )	=> 'false',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Price Color', 'upsob_sc' ),
	'param_name'	=> 'price_color',
	'description'	=> esc_attr__( 'Select price color', 'upsob_sc' ),
);

dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button() );

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Alignment', 'upsob_sc' ),
	'param_name'	=> 'alignment',
	'value'			=> array(
		esc_attr__( 'Left', 'upsob_sc' )	=> 'uk-text-left',
		esc_attr__( 'Center', 'upsob_sc' )	=> 'uk-text-center',
		esc_attr__( 'Right', 'upsob_sc' )	=> 'uk-text-right',
	),
);

return $param;
