<?php
/**
* KW
*/

$param = array(
	'name'				=> esc_attr__( 'Product Page', 'sobari_sc' ),
	'base'				=> 'dahz_product_page',
	'category'	=> array( 'WooCommerce' ),
	'description'		=> esc_attr__( 'Show single product by ID or SKU', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-ecommerce-01.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type' => 'autocomplete',
	'heading' => esc_attr__( 'Select identificator ( auto complete )', 'sobari_sc' ),
	'param_name' => 'product_ids',
	'settings' => array(
		'multiple' 		=> false,
		'sortable' 		=> false,
		'unique_values' => true,
		'min_length' => 1,
		'query_value'=>'product',
		'query_type'=>'post'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'description' => __( 'Input product ID or product SKU or product title to see suggestions', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Product Color Scheme', 'sobari_sc' ),
	'param_name'	=> 'product_color_scheme',
	'value'			=> array(
		'Default'   => 'default',
		'Light'     => 'light',
		'Dark'      => 'dark',
	),
	'description'	=> esc_attr__( 'Set the product color scheme.', 'sobari_sc' ),
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Breadcrumbs?', 'sobari_sc' ),
	'param_name'	=> 'disable_breadcrumbs',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Product Nav?', 'sobari_sc' ),
	'param_name'	=> 'disable_product_nav',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Description Tab?', 'sobari_sc' ),
	'param_name'	=> 'disable_description_tab',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Additional Information Tab?', 'sobari_sc' ),
	'param_name'	=> 'disable_additional_information_tab',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Review Tab?', 'sobari_sc' ),
	'param_name'	=> 'disable_review_tab',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Related Tab?', 'sobari_sc' ),
	'param_name'	=> 'disable_related_tab',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Up Sells Products?', 'sobari_sc' ),
	'param_name'	=> 'disable_upsells_products',
	'group'         => __( 'Setting', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Recently View Products?', 'sobari_sc' ),
	'param_name'	=> 'disable_recently_view_products',
	'group'         => __( 'Setting', 'sobari_sc' )
);
return $param;
