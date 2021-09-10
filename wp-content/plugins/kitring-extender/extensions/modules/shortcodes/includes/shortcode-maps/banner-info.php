<?php

$param = array(
	'name'			=> __( 'Product or Banner Info', 'sobari_sc' ),
	'base'			=> 'dahz_banner_info',
	'category'	=> array( 'WooCommerce', 'Content' ),
	'description'	=> __( 'Product banner with special styles', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-product-banner-info.svg",
	'params'		=> array(),
);
$param['params'][] = array(
	'type'			=> 'radio_image',
	'param_name'	=> 'info',
	'heading'		=> __( 'Shortcode Type', 'sobari_sc' ),
	'description'	=> __( 'Select shortcode type', 'sobari_sc' ),
	'std'			=> 'info-image',
	'value'			=> array(
		'info-image'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-custom.svg",
		'info-product'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-product.svg",
	),
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'param_name'	=> 'image',
	'heading'		=> __( 'Image', 'sobari_sc' ),
	'description'	=> __( 'Select image from media library', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'info',
		'value'		=> array( 'info-image' ),
	),
);
$param['params'][] = array(
	'type'			=> 'autocomplete',
	'param_name'	=> 'product_ids',
	'heading'		=> __( 'Product ID', 'sobari_sc' ),
	'description'	=> __( 'Input product ID or product SKU or product title to see suggestion', 'sobari_sc' ),
	'settings'		=> array(
		'multiple'		=> false,
		'sortable'		=> true,
		'unique_values'	=> true,
		'min_length'	=> 1,
		'query_value'	=> 'product',
		'query_type'	=> 'product',
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'save_always'	=> true,
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'image_position',
	'heading'		=> __( 'Image Position', 'sobari_sc' ),
	'description'	=> __( 'Select image position', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'position' ),
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'param_name'	=> 'hover_image',
	'heading'		=> __( 'Hover Image', 'sobari_sc' ),
	'description'	=> __( 'Select image from media library', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'info',
		'value'		=> array( 'info-image' ),
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'disable_secondary',
	'heading'		=> __( 'Disable Secondary Image on Hover?', 'sobari_sc' ),
	'description'	=> __( 'If yes, the secondary image will not shown', 'sobari_sc' ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'hover_effect',
	'heading'		=> __( 'Hover Effect', 'sobari_sc' ),
	'description'	=> __( 'Select hover effect', 'sobari_sc' ),
	'value'			=> array(
		__( 'Zoom', 'sobari_sc' )					=> 'zoom',
		__( 'Zoom Glare', 'sobari_sc' )				=> 'zoom-glare',
		__( 'Push', 'sobari_sc' )					=> 'push',
		__( 'Push Glare', 'sobari_sc' )				=> 'push-glare',
		__( 'Parallax Tilt', 'sobari_sc' )			=> 'parallax-tilt',
		__( 'Parallax Tilt Glare', 'sobari_sc' )	=> 'parallax-tilt-glare',
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'param_name'	=> 'info_title',
	'heading'		=> __( 'Title', 'sobari_sc' ),
	'description'	=> __( 'Text that will be displayed for banner title', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'info',
		'value'		=> array( 'info-image' ),
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'tag',
	'heading'		=> __( 'Title Element Tag', 'sobari_sc' ),
	'description'	=> __( 'Select element tag', 'sobari_sc' ),
	'value'			=> array(
		'h1'	=> 'h1',
		'h2'	=> 'h2',
		'h3'	=> 'h3',
		'h4'	=> 'h4',
		'h5'	=> 'h5',
		'h6'	=> 'h6',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'title_color',
	'heading'		=> __( 'Title or Product Name Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' 			=> 'textarea_html',
	'holder' 		=> 'div',
	'heading' 		=> __( 'Text', 'js_composer' ),
	'param_name' 	=> 'content',
	'value' 		=> __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'description_color',
	'heading'		=> __( 'Description or Price Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'text_position',
	'heading'		=> __( 'Text Position', 'sobari_sc' ),
	'description'	=> __( 'Select position for title and description', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'position' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'param_name'	=> 'button_text',
	'heading'		=> __( 'Button Text', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'de_link',
	'param_name'	=> 'button_link',
	'heading'		=> __( 'Link URL', 'sobari_sc' ),
	'description'	=> __( 'Enter or pick a link, an image or a video file', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'info',
		'value'		=> array( 'info-image' )
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'param_name'	=> 'button_title',
	'heading'		=> __( 'Link Title', 'sobari_sc' ),
	'description'	=> __( 'Enter an optional text for the attribute of the link which will appear on hover', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'banner_button_target',
	'heading'		=> __( 'Link Target', 'sobari_sc' ),
	'value'			=> array(
		__( 'Same Window', 'sobari_sc' ) => '_self',
		__( 'New Window', 'sobari_sc' )	 => '_blank',
	),
	'dependency'	=> array(
		'element'	=> 'info',
		'value'		=> array( 'info-image' ),
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'product_button_target',
	'heading'		=> __( 'Link Target', 'sobari_sc' ),
	'value'			=> array(
		__( 'Same Window', 'sobari_sc' )	=> '_self',
		__( 'New Window', 'sobari_sc' )		=> '_blank',
		__( 'Open Quickview', 'sobari_sc' )	=> 'quickview',
	),
	'dependency'	=> array(
		'element'	=> 'info',
		'value'		=> array( 'info-product' ),
	),
);
$param['params'][] = array(
	'type'				=> 'colorpicker',
	'param_name'		=> 'text_color',
	'heading'			=> __( 'Text Color', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'				=> 'colorpicker',
	'param_name'		=> 'hover_text_color',
	'heading'			=> __( 'Hover Text Color', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'hover_text_style',
	'heading'		=> __( 'Button Text Style', 'sobari_sc' ),
	'value'			=> array(
		__( 'Change Color', 'sobari_sc' )	 => '',
		__( 'Thin Underline', 'sobari_sc' )	 => 'de-btn--underline-thin',
		__( 'Thick Underline', 'sobari_sc' ) => 'de-btn--underline-thick',
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'remove_top_padding',
	'heading'		=> __( 'Image Padding', 'sobari_sc' ),
	'value'			=> array( __( 'Disable Padding Top', 'sobari_sc' ) => true ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'remove_right_padding',
	'heading'		=> '',
	'value'			=> array( __( 'Disable Padding Right', 'sobari_sc' ) => true ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'remove_bottom_padding',
	'heading'		=> '',
	'value'			=> array( __( 'Disable Padding Bottom', 'sobari_sc' ) => true ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'remove_left_padding',
	'heading'		=> '',
	'description'	=> __( 'By default images will be resized to 1:1 dimensions. If you want to change this please check the option above', 'sobari_sc' ),
	'value'			=> array( __( 'Disable Padding Left', 'sobari_sc' ) => true ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'radio_image',
	'param_name'	=> 'banner_style',
	'heading'		=> __( 'Product or Banner Responsive Style', 'sobari_sc' ),
	'description'	=> __( 'Select shortcode responsive layout', 'sobari_sc' ),
	'value'			=> array(
		''			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-inherit.svg",
		'style-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-style-1.svg",
		'style-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-style-2.svg",
		'style-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-style-3.svg",
		'style-4'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-banner-info-style-4.svg",
	),
	'group'			=> __( 'Settings', 'sobari_sc' ),
);

return $param;
