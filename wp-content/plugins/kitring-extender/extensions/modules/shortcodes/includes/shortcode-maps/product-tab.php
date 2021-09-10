<?php


$param = array(
	'name'			=> esc_attr__( 'Product Tab', 'sobari_sc' ),
	'base'			=> 'dahz_product_tab',
	'category'	=> array( 'WooCommerce' ),
	'description'	=> esc_attr__( 'Display product with filter in styles', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-ecommerce-01.svg",
	'params'		=> array()
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Filter Product By', 'sobari_sc' ),
	'param_name'	=> 'filter_product',
	'value'			=> array(
		__( 'Category', 'upsob_sc' )	=> 'category',
		__( 'Feature', 'upsob_sc' )		=> 'feature'
	),
	'description'	=> esc_attr__( 'Display product as grid or slider', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'autocomplete',
	'heading'		=> esc_attr__( 'Categories', 'sobari_sc' ),
	'param_name'	=> 'product_cat_ids',
	'settings'		=> array(
		'multiple'		=> true,
		'sortable'		=> true,
		'unique_values'	=> true,
		'min_length'	=> 1,
		'query_value'	=> 'product_cat',
		'query_type'	=> 'taxonomy'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'dependency'	=> array(
		'element'	=> 'filter_product',
		'value'		=> 'category',
	),
	'save_always'	=> true,
	'description'	=> esc_attr__( 'Display a specified product category', 'sobari_sc' ),
);

// $param['params'][] = array(
	// 'type'			=> 'radio_image',
	// 'heading'		=> esc_attr__( 'Product Layout Style', 'sobari_sc' ),
	// 'param_name'	=> 'loop_product_layout',
	// 'value'			=> dahz_shortcode_helper_get_field_option( 'loop_product_layout' ),
	// 'description'	=> esc_attr__( 'Columns', 'sobari_sc' ),
// );

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
$param['params'][]  = array(
	'type' 			=> 'checkbox',
	'heading' 		=> __( 'Load More Button', 'js_composer' ),
	'param_name' 	=> 'enable_load_more',
	'save_always' 	=> true,
	'description' 	=> __( 'Show load more button with ajax button.', 'js_composer' ),
);
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
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Feature Products', 'sobari_sc' ),
	'param_name'	=> 'features',
	'value' 		=> array(
		__( 'Best Selling', 'js_composer' ) => 'best_selling',
		__( 'On Sale', 'js_composer' ) 		=> '.sale',
		__( 'Top Rated', 'js_composer' ) 	=> 'top_rated',
		__( 'Featured', 'js_composer' ) 	=> '.featured',

	),
	'description'	=> esc_attr__( 'Sort By', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'filter_product',
		'value'		=> 'feature',
	),
);

dahz_shortcode_add_package(
	$param,
	array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Product Color Scheme', 'sobari_sc' ),
			'param_name'	=> 'product_color_scheme',
			'value'			=> dahz_shortcode_helper_get_field_option( 'color_scheme' ),
			'save_always'	=> true,
			'description'	=> __( 'Product Color Scheme', 'sobari_sc' ),
			'group'			=> __( 'Product Settings', 'sobari_sc' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Phone Potrait Column', 'sobari_sc' ),
			'param_name'	=> 'phone_potrait_column',
			'value'			=> dahz_shortcode_helper_get_field_option( 'columns' ),
			'save_always'	=> true,
			'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
			'group'			=> __( 'Product Settings', 'sobari_sc' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Phone Landscape Column', 'sobari_sc' ),
			'param_name'	=> 'phone_landscape_column',
			'value'			=> dahz_shortcode_helper_get_field_option( 'columns' ),
			'save_always'	=> true,
			'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
			'group'			=> __( 'Product Settings', 'sobari_sc' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Tablet Landscape Column', 'sobari_sc' ),
			'param_name'	=> 'tablet_landscape_column',
			'value'			=> dahz_shortcode_helper_get_field_option( 'columns' ),
			'save_always'	=> true,
			'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
			'group'			=> __( 'Product Settings', 'sobari_sc' ),
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> __( 'Alignment', 'js_composer' ),
			'param_name' 	=> 'alignment',
			'value' 		=> array(
				__( 'Left', 'js_composer' ) 	=> '',
				__( 'Center', 'js_composer' ) 	=> 'uk-flex-center',
				__( 'Right', 'js_composer' ) 	=> 'uk-flex-right',
			),
			'description'	=> __( 'Select tab position.', 'js_composer' ),
			'group'			=> __( 'Product Settings', 'sobari_sc' ),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> __( 'Active Color', 'js_composer' ),
			'param_name' 		=> 'active_color',
			'group'				=> __( 'Product Settings', 'sobari_sc' ),
			'edit_field_class'	=> 'vc_col-sm-6',
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> __( 'Inactive Color', 'js_composer' ),
			'param_name' 		=> 'inactive_color',
			'group'				=> __( 'Product Settings', 'sobari_sc' ),
			'edit_field_class'	=> 'vc_col-sm-6',
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> __( 'Active Border Color', 'js_composer' ),
			'param_name' 		=> 'active_border_color',
			'group'				=> __( 'Product Settings', 'sobari_sc' ),
			'edit_field_class'	=> 'vc_col-sm-6',
		)
	)

);

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Style', 'sobari_sc' ),
	// 'param_name'	=> 'button_style',
	// 'group'				=> __( 'Product Settings', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Fill', 'sobari_sc' ) => 'de-btn--boxed de-btn--fill',
		// __( 'Outline', 'sobari_sc' ) => 'de-btn--boxed de-btn--outline',
		// __( 'Text', 'sobari_sc' ) => 'de-btn--text',
	// ),
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	// 'param_name'	=> 'bg_color',
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> 'de-btn--boxed de-btn--fill',
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Border Color', 'sobari_sc' ),
	// 'param_name'	=> 'border_color',
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> 'de-btn--boxed de-btn--outline',
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Background Color', 'sobari_sc' ),
	// 'param_name'	=> 'hover_bg_color',
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'param_name'	=> 'text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Text Style', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_style',
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Change Color', 'sobari_sc' ) => '',
		// __( 'Thin Underline', 'sobari_sc' ) => 'de-btn--underline-thin',
		// __( 'Thick Underline', 'sobari_sc' ) => 'de-btn--underline-thick',
	// ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> 'de-btn--text',
	// ),
// );

// $param['params'][] = array(
	// 'type'			=> 'textfield',
	// 'heading'		=> esc_attr__( 'Button Border Radius', 'sobari_sc' ),
	// 'param_name'	=> 'border_radius',
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Size', 'sobari_sc' ),
	// 'param_name'	=> 'size',
	// 'group'			=> __( 'Product Settings', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Default', 'sobari_sc' ) => '',
		// __( 'Small', 'sobari_sc' ) => 'de-btn--small',
		// __( 'Large', 'sobari_sc' ) => 'de-btn--large',
	// ),
	// 'description'	=> esc_attr__( 'Select button display size', 'sobari_sc' ),
// );
dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button( 'button', __( 'Product Settings', 'sobari_sc' ) ) );

return $param;
