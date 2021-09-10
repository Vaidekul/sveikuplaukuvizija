<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Count Down', 'sobari_sc' ),
	'base'				=> 'count_down',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Show animated count down', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-countdown.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Date & Time', 'sobari_sc' ),
	'param_name'	=> 'date_time',
	'description'	=> esc_attr__( 'Enter a date for the countdown to expire. Use the ISO 8601 format. YYYY-MM-DDThh:mm:ssTZD, e.g 2018-02-13T03:41:37+00:00 (UTC time).', 'sobari_sc' ),
	"value" 		=> "",
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Labels - Days', 'sobari_sc' ),
	'param_name'	=> 'days_label',
	"value" 		=> "",
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Labels - Hours', 'sobari_sc' ),
	'param_name'	=> 'hours_label',
	"value" 		=> "",
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Labels - Minutes', 'sobari_sc' ),
	'param_name'	=> 'minutes_label',
	"value" 		=> "",
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Labels - Seconds', 'sobari_sc' ),
	'param_name'	=> 'seconds_label',
	"value" 		=> "",
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Show Label', 'sobari_sc' ),
	'param_name'	=> 'show_label',
);

$param['params'][] = array(
	'type' 			=> 'radio_image',
	'heading' 		=> esc_attr__( 'Countdown Style', 'sobari_sc' ),
	'param_name' 	=> 'countdown_style',
	'description' 	=> esc_attr__( 'Pick 1 style for countdown', 'sobari_sc' ),
	'value'			=> array(
		'style-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_countdown-style-1.svg",
		'style-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_countdown-style-2.svg",
	),
	'group'			=> esc_attr__( 'Styling', 'sobari_sc' )
);
$param['params'][] = array(
	'type' 			=> 'dropdown',
	'heading' 		=> esc_attr__( 'Countdown Alignment', 'sobari_sc' ),
	'param_name' 	=> 'countdown_alignment',
	'std' 			=> 'left',
	'value'			=> array(
		'Left'		=> 'left',
		'Center' 	=> 'center',
		'Right' 	=> 'right',
	),
	'group'			=> esc_attr__( 'Styling', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Delimiter Value', 'sobari_sc' ),
	'param_name'	=> 'delimiter_value',
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Countdown Font Size', 'sobari_sc' ),
	'param_name'	=> 'countdown_font_size',
	'std'			=> '14',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-2'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Countdown Color', 'sobari_sc' ),
	'param_name'	=> 'countdown_color',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-2'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Number Font Size', 'sobari_sc' ),
	'param_name'	=> 'number_font_size',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Number Color', 'sobari_sc' ),
	'param_name'	=> 'number_color',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Delimiter Font Size', 'sobari_sc' ),
	'param_name'	=> 'delimiter_font_size',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Delimiter Color', 'sobari_sc' ),
	'param_name'	=> 'delimiter_color',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Label Font Size', 'sobari_sc' ),
	'param_name'	=> 'label_font_size',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Label Color', 'sobari_sc' ),
	'param_name'	=> 'label_color',
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group' 		=> esc_attr__( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Label Margin', 'sobari_sc' ),
	'param_name' => 'label_margin',
	'value'			=> array(
		'Default'	=> 'uk-margin',
		'Small' 	=> 'uk-margin-small',
		'Medium' 	=> 'uk-margin-medium',
		'None' 		=> 'uk-margin-remove',
	),
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group'			=> esc_attr__( 'Styling', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Countdown Gutter', 'sobari_sc' ),
	'param_name' => 'countdown_gutter',
	'value'			=> array(
		'Small'		=> 'uk-grid-small',
		'Medium' 	=> 'uk-grid-medium',
		'Default'	=> 'uk-grid',
		'Large' 	=> 'uk-grid-large',
		'Collapse' 	=> 'uk-grid-collapse',
	),
	'dependency'	=> array(
		'element'	=> 'countdown_style',
		'value'		=> 'style-1'
	),
	'group'			=> esc_attr__( 'Styling', 'sobari_sc' )
);
return $param;
