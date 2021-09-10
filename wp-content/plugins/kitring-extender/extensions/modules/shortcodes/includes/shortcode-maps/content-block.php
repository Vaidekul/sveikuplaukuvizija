<?php
/**
*
*/

$param = array(
	'name'			=> esc_attr__( 'Content Block', 'sobari_sc' ),
	'base'			=> 'dahz-block',
	'php_class_name'=> 'content_block',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Place content block', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-content-block.svg",
	'params'		=> array(),
	'js_view' 		=> 'ContentBlockView'
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Content Block', 'sobari_sc' ),
	'param_name'	=> 'id',
	'value'			=> array(),
	'description'	=> esc_attr__( 'Select content block', 'sobari_sc' ),
);
return $param;
