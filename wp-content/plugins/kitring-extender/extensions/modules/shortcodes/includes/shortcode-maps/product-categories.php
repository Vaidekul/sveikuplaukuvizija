<?php


$param = array(
	'name'			=> esc_attr__( 'Product Categories', 'sobari_sc' ),
	'base'			=> 'dahz_product_categories',
	'category'	=> array( 'WooCommerce' ),
	'description'	=> esc_attr__( 'Display product categories loop', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-woo-ecommerce-01.svg",
	'params'		=> array()
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Product Display', 'sobari_sc' ),
	'param_name'	=> 'shortcode_style',
	'value'			=> array(
		'Grid'		=> 'grid',
		'Slider'	=> 'carousel'
	),
	'description'	=> esc_attr__( 'Display product as grid or slider', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Item per Page (Limit)', 'sobari_sc' ),
	'param_name'	=> 'total_products',
	'std'			=> '10',
	'description'	=> esc_attr__( 'The number of product to display', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Columns', 'sobari_sc' ),
	'param_name'	=> 'columns',
	'value'			=> dahz_shortcode_helper_get_field_option( 'columns' ),
	'description'	=> esc_attr__( 'How much column grid', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Column Gap (Gutter)', 'sobari_sc' ),
	'param_name'	=> 'row_column_gap',
	'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	'description'	=> __( 'Select gap between product column', 'sobari_sc' ),
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
	'save_always'	=> true,
	'description'	=> esc_attr__( 'Display a specified product category', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Hide If Empty', 'sobari_sc' ),
	'param_name'	=> 'hide_empty',
	'save_always'	=> true,
	'description'	=> __( 'Enable this option to hide empty category', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Show Total Number of Items', 'sobari_sc' ),
	'param_name'	=> 'show_total_number',
	'save_always'	=> true,
	'description'	=> __( 'Enable this option to show number of items', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Order By', 'sobari_sc' ),
	'param_name'	=> 'order_by',
	'value'			=> dahz_shortcode_helper_get_field_option( 'tax_order_by' ),
	'description'	=> esc_attr__( 'Sort the product displayed by the entered option', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Sort Order', 'sobari_sc' ),
	'param_name'	=> 'sort_by',
	'value'			=> dahz_shortcode_helper_get_field_option( 'sort_by' ),
	'description'	=> esc_attr__( 'Designated the ascending or descending order', 'sobari_sc' ),
);

dahz_shortcode_add_package( $param, dahz_shortcode_get_group_product_settings() );

$param['params'][] = array(
	'type'			=> 'radio_image',
	'heading'		=> __( 'Product Categories Style', 'sobari_sc' ),
	'param_name'	=> 'product_tax_style',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'value'			=> array(
		'layout-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-1.svg",
		'layout-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-2.svg",
		'layout-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-3.svg",
		'layout-4'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-4.svg",
	),
	'description'	=> esc_attr__( 'Product categories', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Hover Effect', 'sobari_sc' ),
	'param_name'	=> 'hover_effect',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'value'			=> array(
		__( 'Zoom', 'sobari_sc' )					=> 'zoom',
		__( 'Zoom Glare', 'sobari_sc' )				=> 'zoom-glare',
		__( 'Push', 'sobari_sc' )					=> 'push',
		__( 'Push Glare', 'sobari_sc' )				=> 'push-glare',
		__( 'Parallax Tilt', 'sobari_sc' )			=> 'parallax-tilt',
		__( 'Parallax Tilt Glare', 'sobari_sc' )	=> 'parallax-tilt-glare',
	),
	'description'	=> esc_attr__( 'Select hover effect', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Show Total Number When Hover', 'sobari_sc' ),
	'param_name'	=> 'show_total_number_when_hover',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> esc_attr__( 'Total number of item will be shown when hovering', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Always Show on Mobile', 'sobari_sc' ),
	'param_name'	=> 'always_show_on_mobile',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'show_total_number_when_hover',
		'not_empty'	=> true,
	),
	'description'	=> esc_attr__( 'Total number of item will be shown when mobile', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Text Color', 'sobari_sc' ),
	'param_name'	=> 'text_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
	'param_name'	=> 'color_overlay',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Hover Text Color', 'sobari_sc' ),
	'param_name'	=> 'hover_text_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Hover Border Color', 'sobari_sc' ),
	'param_name'	=> 'hover_border_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Hover Color Overlay', 'sobari_sc' ),
	'param_name'	=> 'hover_color_overlay',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
	'param_name'	=> 'enable_gradient',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Hover Color Overlay', 'sobari_sc' ),
	'param_name'	=> 'hover_color_overlay_2',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_gradient',
		'not_empty'	=> true,
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
	'param_name'	=> 'gradient_direction',
	'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_gradient',
		'not_empty'	=> true,
	)
);

return $param;