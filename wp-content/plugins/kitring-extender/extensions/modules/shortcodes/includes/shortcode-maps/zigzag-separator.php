<?php
/**
*
*/

$param = array(
	'name'				=> esc_attr__( 'Zigzag Separator', 'sobari_sc' ),
	'base'				=> 'zigzag_separator',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Horizontal zigzag separator line', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-zigzag-separator.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Line Type', 'sobari_sc' ),
	'param_name' => 'zigzag_type',
	'std'			=> 'small',
	'value'			=> array(
		'Small Line'     => 'small',
		'Fullwidth Line' => '100'
	),
	'description'		=> esc_attr__( 'Select zigzag type', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Line Alignment', 'sobari_sc' ),
	'param_name'	=> 'line_alignment',
	'std'			=> 'left',
	'value'			=> array(
		'Left'     => 'left',
		'Center'   => 'center',
		'Right'    => 'right'
	),
	'dependency'	=> array(
		'element'	=> 'zigzag_type',
		'value'		=> 'small'
	),
	'description'		=> esc_attr__( 'Select line alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Border Width', 'sobari_sc' ),
	'param_name' => 'border_width',
	'std'			=> '8',
	'value'			=> array(
		'Extra Small'    => '8',
		'Small'          => '10',
		'Medium'         => '12',
		'Large'          => '15',
		'Extra Large'    => '20'
	),
	'description'		=> esc_attr__( 'Please select thickness of your line', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Custom Line Width', 'sobari_sc' ),
	'param_name'	=> 'custom_line_width',
	'description'	=> esc_attr__( 'Enter a date for the countdown to expire. Use the ISO 8601 format. YYYY-MM-DDThh:mm:ssTZD, e.g 2018-02-13T03:41:37+00:00 (UTC time).', 'sobari_sc' ),
	'std'			=> '50',
	'dependency'	=> array(
		'element'	=> 'zigzag_type',
		'value'		=> 'small'
	),
	'description'		=> esc_attr__( 'If you would like to control the specific number of percents that your divider is (widthwise), enter it here. Dont enter "%", just number e.g 20 ', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Zigzag Color', 'sobari_sc' ),
	'std'			=> '#dcdcdc',
	'param_name'	=> 'zigzag_color',
);
return $param;
