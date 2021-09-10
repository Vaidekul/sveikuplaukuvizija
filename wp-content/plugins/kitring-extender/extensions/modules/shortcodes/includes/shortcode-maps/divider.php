<?php
/**
*
*/

$param = array(
	'name'				=> esc_attr__( 'Divider', 'sobari_sc' ),
	'base'				=> 'divider',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Add horizontal divider', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-divider.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type' 			=> 'dropdown',
	'heading' 		=> esc_attr__( 'Line Type', 'sobari_sc' ),
	'param_name' 	=> 'line_type',
	'std'			=> 'small',
	'value'			=> array(
		'Small Line'     => 'small',
		'Fullwidth Line' => 'fullwidth'
	),
	'description'		=> esc_attr__( 'Select line type', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Line Alignment', 'sobari_sc' ),
	'param_name' => 'line_alignment',
	'std'		=> 'left',
	'value'			=> array(
		'Left'     => 'left',
		'Center'   => 'center',
		'Right'    => 'right'
	),
	'dependency'	=> array(
		'element'	=> 'line_type',
		'value'		=> 'small'
	),
	'description'		=> esc_attr__( 'Select line alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Line Thickness', 'sobari_sc' ),
	'param_name' => 'line_thickness',
	'std'		 => '2px',
	'value'		 => array(
		'1px'    => '1px',
		'2px'    => '2px',
		'3px'    => '3px',
		'4px'    => '4px',
		'5px'    => '5px',
		'6px'    => '6px',
		'7px'    => '7px',
		'8px'    => '8px',
		'9px'    => '9px',
		'10px'   => '10px',
		'11px'   => '11px',
		'12px'   => '12px',
		'13px'   => '13px',
		'14px'   => '14px',
		'15px'   => '15px',
		'16px'   => '16px',
		'17px'   => '17px',
		'18px'   => '18px',
		'19px'   => '19px',
		'20px'   => '20px',
	),
	'description'		=> esc_attr__( 'Please select thickness of your line', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Custom Line Width', 'sobari_sc' ),
	'param_name'	=> 'custom_line_width',
	'description'	=> esc_attr__( 'Enter a date for the countdown to expire. Use the ISO 8601 format. YYYY-MM-DDThh:mm:ssTZD, e.g 2018-02-13T03:41:37+00:00 (UTC time).', 'sobari_sc' ),
	"value" 		=> "",
	'dependency'	=> array(
		'element'	=> 'line_type',
		'value'		=> 'small'
	),
	'std'			=> '100',
	'description'		=> esc_attr__( 'If you would like to control the specific number of pixels that your divider is (widthwise), enter it here. Dont enter "px", just number e.g 20 ', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Line Color', 'sobari_sc' ),
	'param_name'	=> 'line_color',
	'std'			=> '#dcdcdc'
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Gradient', 'sobari_sc' ),
	'param_name'	=> 'enable_gradient',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Line Color 2', 'sobari_sc' ),
	'param_name'	=> 'line_color_2',
	'dependency'	=> array(
		'element'	=> 'enable_gradient',
		'value'		=> 'true'
	),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Gradient Direction', 'sobari_sc' ),
	'param_name' => 'gradient_direction',
	'value'			=> array(
		'Left to Right'             => '90deg',
		'Left Top to Right Bottom'  => '135deg',
		'Left Bottom to Right Top'  => '45deg',
		'Bottom to Top'             => 'to bottom'
	),
	'save_always' 	=> true,
	'dependency'	=> array(
		'element'	=> 'enable_gradient',
		'value'		=> 'true'
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Animate Line', 'sobari_sc' ),
	'param_name'	=> 'enable_animate',
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Delay Line Animation', 'sobari_sc' ),
	'param_name' => 'delay_line_animation',
	'std'		=> 'none',
	'value'		 => array(
		'None'               => 'none',
		'Default - ms 300'   => '300',
		'ms 100'             => '100',
		'ms 200'             => '200',
		'ms 400'             => '400',
		'ms 500'             => '500',
		'ms 600'             => '600',
		'ms 700'             => '700',
		'ms 800'             => '800',
		'ms 900'             => '900',
		'ms 1000'            => '1000',
		'ms 1100'            => '1100',
		'ms 1200'            => '1200',
		'ms 1300'            => '1300',
		'ms 1400'            => '1400',
		'ms 1500'            => '1500',
		'ms 1600'            => '1600',
		'ms 1700'            => '1700',
		'ms 1800'            => '1800',
		'ms 1900'            => '1900',
		'ms 2000'            => '2000'
	),
	'description'		=> esc_attr__( 'Specify the entrance animation delay in milliseconds', 'sobari_sc' ),
);
return $param;
