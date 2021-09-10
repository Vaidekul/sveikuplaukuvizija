<?php

$param = array(
	'name'			=> esc_attr__( 'Scroll To', 'sobari_sc' ),
	'base'			=> 'scroll_to',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Add smooth scrolling to page anchors', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-scroll-to.svg",
	'params'		=> array()
);

$param['params'][] = array(
	'type'			=> 'textarea',
	'heading'		=> __( 'Insert ID Scroll', 'js_composer' ),
	'param_name'	=> 'scroll_to_id',
	'description'	=> __( 'Insert ID that you want to scroll. (Separate by new line)', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'textarea',
	'heading'		=> __( 'Insert Title Scroll', 'js_composer' ),
	'param_name'	=> 'scroll_to_title',
	'description'	=> __( 'Insert title that you want to scroll. (Separate by new line)', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Hide Bullets', 'js_composer' ),
	'param_name'	=> 'scroll_hide_bullets',
	'value'			=> array( __( 'Yes, please', 'js_composer' ) => 'true' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Color', 'js_composer' ),
	'param_name'	=> 'scroll_color_dots',
	'description'	=> __( 'Color for dots', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Color Active', 'js_composer' ),
	'param_name'	=> 'scroll_color_dots_active',
	'description'	=> __( 'Color for dots when active', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Extra Class', 'js_composer' ),
	'param_name'	=> 'extra_class',
	'description'	=> __( 'Extra class for scroll to', 'js_composer' ),
);
return $param;
