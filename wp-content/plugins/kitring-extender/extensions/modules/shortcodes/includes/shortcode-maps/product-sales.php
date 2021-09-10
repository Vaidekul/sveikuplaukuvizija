<?php
/**
*
*/

$param = array(
	'name'			=> esc_attr__( 'Sale Product', 'sobari_sc' ),
	'base'			=> 'dahz_product_sales',
	'category'	=> array( 'WooCommerce' ),
	'description'	=> esc_attr__( 'List all product on sales', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-sale-products.svg",
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
	'heading' 		=> __( 'Category Operator', 'js_composer' ),
	'param_name' 	=> 'cat_operator',
	'value' 		=> dahz_shortcode_helper_get_field_option( 'operator' ),
	'save_always' 	=> true,
	'description' 	=> __( 'Category Operator', 'js_composer' ),
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
