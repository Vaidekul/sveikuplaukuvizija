<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Product Pair', 'sobari_sc' ),
	'base'				=> 'product_pair',
	'category'	=> array( 'WooCommerce' ),
	'description'		=> esc_attr__( 'Create 2 products paired', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-product-pair.svg",
	'params'			=> array(),
);
$param['params'][] = array(
	'type' => 'autocomplete',
	'heading' => esc_attr__( 'Select Product', 'sobari_sc' ),
	'param_name' => 'product_ids1',
	'group' => __( 'Product 1', 'sobari_sc' ),
	'settings' => array(
		'multiple' 		=> false,
		'sortable' 		=> true,
		'unique_values' => true,
		'min_length' => 1,
		'query_value'=>'product',
		'query_type'=>'post'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'save_always' => true,
	'description' => __( 'Enter List of Products', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Media Ratio', 'sobari_sc' ),
	'param_name'	=> 'media_ratio_product_1',
	'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
	'save_always'	=> true,
	'description'	=> __( 'Set the media ratio', 'sobari_sc' ),
	'group' 		=> __( 'Product 1', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' => 'autocomplete',
	'heading' => esc_attr__( 'Select Product', 'sobari_sc' ),
	'param_name' => 'product_ids2',
	'group' => __( 'Product 2', 'sobari_sc' ),
	'settings' => array(
		'multiple' => true,
		'sortable' => true,
		'unique_values' => true,
		'min_length' => 1,
		'query_value'=>'product',
		'query_type'=>'post'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'save_always' => true,
	'description' => __( 'Enter List of Products', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Media Ratio', 'sobari_sc' ),
	'param_name'	=> 'media_ratio_product_2',
	'std'			=> '5-7',
	'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
	'save_always'	=> true,
	'description'	=> __( 'Set the media ratio', 'sobari_sc' ),
	'group' 		=> __( 'Product 2', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Vertical Alignment', 'sobari_sc' ),
	'param_name'	=> 'vertical_alignment',
	'std'			=> 'uk-flex-middle',
	'value'			=> array(
		__( 'Top', 'upsob_sc' )	=> 'uk-flex-top',
		__( 'Center', 'upsob_sc' )	=> 'uk-flex-middle',
		__( 'Bottom', 'upsob_sc' )	=> 'uk-flex-bottom',
	),
	'save_always'	=> true,
	'description'	=> __( 'Set vertical alignment product pair', 'sobari_sc' ),
	'group' 		=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Product Animation On Hover', 'sobari_sc' ),
	'param_name'	=> 'hover_animation',
	'std'			=> 'zoom',
	'value'			=> array(
		esc_attr__( 'Zoom', 'sobari_sc' )		=> 'zoom',
		esc_attr__( 'Slide', 'sobari_sc' )		=> 'slide',
		esc_attr__( 'framed', 'sobari_sc' )		=> 'framed'
	),
	'description'	=> esc_attr__( 'Description Here', 'sobari_sc' ),
	'group' 		=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Framed Color', 'sobari_sc' ),
	'param_name'	=> 'color_frame',
	'description'	=> esc_attr__( 'Description Here', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'hover_animation',
		'value'		=> 'framed',
	),
	'group' 		=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Product Gap', 'sobari_sc' ),
	'param_name'	=> 'gap',
	'std'			=> '',
	'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	'description'	=> esc_attr__( 'Spacing between product.', 'sobari_sc' ),
	'group' 		=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Display Category', 'sobari_sc' ),
	'param_name'	=> 'display_brand_or_category',
	'std'			=> 'category',
	'value'			=> array(
		esc_attr__( 'None', 'sobari_sc' )		=> '',
		// esc_attr__( 'Brand', 'sobari_sc' )		=> 'brand',
		esc_attr__( 'Category', 'sobari_sc' )	=> 'category'
	),
	'description'	=> esc_attr__( 'Choose category to display', 'sobari_sc' ),
	'group' 		=> __( 'Styling', 'sobari_sc' ),
);
return $param;
