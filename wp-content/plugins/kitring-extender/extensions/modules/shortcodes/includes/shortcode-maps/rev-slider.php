<?php
/**
*
*/

$param = array(
	'name'			=> esc_attr__( 'Revolution Slider', 'sobari_sc' ),
	'base'			=> 'dahz_rev_slider',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Place Revolution Slider', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-rev-slider.svg",
	'params'		=> array()
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Revolution Slider Lists', 'sobari_sc' ),
	'param_name'	=> 'alias',
	'value'			=> array(),
	'description'	=> esc_attr__( 'Select revolution slider item', 'sobari_sc' ),
);
return $param;
