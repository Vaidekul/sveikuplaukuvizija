<?php
/**
*
*/

$param = array(
	'name'			=> esc_attr__( 'Product Attribute', 'sobari_sc' ),
	'base'			=> 'dahz_product_attribute',
	'category'	=> array( 'WooCommerce' ),
	'description'	=> esc_attr__( 'List products with ab attribute shortcode', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-ecommerce-01.svg",
	'params'		=> array()
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Product Display', 'sobari_sc' ),
	'param_name'	=> 'shortcode_style',
	'value'			=> array(
		'Grid'		=> 'grid',
		'Carousel'	=> 'carousel'
	),
	'description'	=> esc_attr__( 'Product Display Style', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Item per-page', 'sobari_sc' ),
	'param_name'	=> 'total_products',
	'std'			=> '10',
	'description'	=> esc_attr__( 'Item per-page', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Columns', 'sobari_sc' ),
	'param_name'	=> 'columns',
	'value'			=> dahz_shortcode_helper_get_field_option( 'columns' ),
	'description'	=> esc_attr__( 'Columns', 'sobari_sc' ),
);

$param['params'][]  = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Column Gap (Gutter)', 'sobari_sc' ),
	'param_name'	=> 'row_column_gap',
	'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	'description'	=> __( 'Select gap between column in row', 'sobari_sc' ),
);

// $param['params'][] = array(
	// 'type'			=> 'radio_image',
	// 'heading'		=> esc_attr__( 'Product Layout Style', 'sobari_sc' ),
	// 'param_name'	=> 'loop_product_layout',
	// 'value'			=> dahz_shortcode_helper_get_field_option( 'loop_product_layout' ),
	// 'description'	=> esc_attr__( 'Columns', 'sobari_sc' ),
// );

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Order By', 'sobari_sc' ),
	'param_name'	=> 'order_by',
	'value'			=> dahz_shortcode_helper_get_field_option( 'product_order_by' ),
	'description'	=> esc_attr__( 'Order By', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Sort By', 'sobari_sc' ),
	'param_name'	=> 'sort_by',
	'value'			=> dahz_shortcode_helper_get_field_option( 'sort_by' ),
	'description'	=> esc_attr__( 'Sort By', 'sobari_sc' ),
);
if (function_exists('wc_get_attribute_taxonomies')) {
	$attributes_tax = wc_get_attribute_taxonomies();

	$attributes = array();

	foreach ( $attributes_tax as $attribute ) {

		$attributes[ $attribute->attribute_label ] = $attribute->attribute_name;

	}

	$param['params'][]  = array(
		'type' 			=> 'dropdown',
		'heading' 		=> __( 'Attribute', 'js_composer' ),
		'param_name' 	=> 'attribute',
		'value' 		=> $attributes,
		'save_always' 	=> true,
		'description' 	=> __( 'List of product taxonomy attribute', 'js_composer' ),
	);
}

$param['params'][]  = array(
	'type' 			=> 'checkbox',
	'heading' 		=> __( 'Filter', 'js_composer' ),
	'param_name' 	=> 'filter',
	'value' 		=> array( 'empty' => 'empty' ),
	'save_always' 	=> true,
	'description' 	=> __( 'Taxonomy values', 'js_composer' ),
	'dependency' 	=> array(
		'callback' 	=> 'vcWoocommerceProductAttributeFilterDependencyCallback',
	),
);

$param['params'][]  = array(
	'type' 			=> 'dropdown',
	'heading' 		=> __( 'Terms Operator', 'js_composer' ),
	'param_name' 	=> 'terms_operator',
	'value' 		=> dahz_shortcode_helper_get_field_option( 'operator' ),
	'save_always' 	=> true,
	'description' 	=> __( 'Terms operator', 'js_composer' ),
);

$param['params'][]  = array(
	'type' 			=> 'checkbox',
	'heading' 		=> __( 'Advance Option', 'js_composer' ),
	'param_name' 	=> 'advance_option',
	'save_always' 	=> true,
	'description' 	=> __( 'Enable this option to show advance options', 'js_composer' ),
);

$param['params'][] = array(
	'type'			=> 'autocomplete',
	'heading'		=> esc_attr__( 'Select Product Categories', 'sobari_sc' ),
	'param_name'	=> 'product_cat_ids',
	'settings'		=> array(
		'multiple'		=> true,
		'sortable'		=> true,
		'unique_values' => true,
		'min_length'	=> 1,
		'query_value'	=> 'product_cat',
		'query_type'	=> 'taxonomy'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'save_always'	=> true,
	'description'	=> esc_attr__( 'Enter List of Products Categories', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'advance_option',
		'not_empty'	=> true,
	),
);

$param['params'][]  = array(
	'type' 			=> 'dropdown',
	'heading' 		=> __( 'Filter By', 'js_composer' ),
	'param_name' 	=> 'filter_by',
	'value' 		=> dahz_shortcode_helper_get_field_option( 'product_filter' ),
	'save_always' 	=> true,
	'description' 	=> __( 'Filter product', 'js_composer' ),
	'dependency'	=> array(
		'element'	=> 'advance_option',
		'not_empty'	=> true,
	),
);

$param['params'][]  = array(
	'type' 			=> 'dropdown',
	'heading' 		=> __( 'Product Visibility', 'js_composer' ),
	'param_name' 	=> 'product_visibility',
	'value' 		=> dahz_shortcode_helper_get_field_option( 'product_visibility' ),
	'save_always' 	=> true,
	'description' 	=> __( 'Product Visibility', 'js_composer' ),
	'dependency'	=> array(
		'element'	=> 'advance_option',
		'not_empty'	=> true,
	),
);
dahz_shortcode_add_package( $param, dahz_shortcode_get_group_product_settings() );
return $param;
