<?php

/**
* a
*/
$param = array(
	'name'				=> esc_attr__( 'Cascading Image', 'sobari_sc' ),
	'base'				=> 'cascading_image',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Animated overlapping images', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-cascading-image.svg",
	'params'			=> array(),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Image Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'value'			=> array(
		'None'				=> '',
		'Small Depth'		=> 'uk-box-shadow-small',
		'Medium Depth'		=> 'uk-box-shadow-medium',
		'Large Depth'		=> 'uk-box-shadow-large',
		'Very Large Depth'	=> 'uk-box-shadow-xlarge'
	),
	'description'	=> esc_attr__( 'Select image box shadow style', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Cascading Image Alignment', 'sobari_sc' ),
	'param_name'	=> 'image_alignment',
	'value'			=> array(
		'Left'		=> 'left',
		'Center'	=> 'center',
		'Right'		=> 'right'
	),
	'description'	=> esc_attr__( 'Select cascading image alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'param_group',
	'heading'		=> esc_attr__( '', '' ),
	'param_name'	=> 'values',
	'description'	=> esc_attr__( 'Description Here', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Image', 'sobari_sc' ),
	'params' => array(
		array(
			'type' => 'attach_image',
			'heading' => esc_attr__( 'Image', 'sobari_sc' ),
			'param_name' => 'image',
			'description' => esc_attr__( 'Description Here', 'sobari_sc' ),
			'admin_label' => true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Offset X', 'sobari_sc' ),
			'param_name'	=> 'offset_x',
			'description'	=> esc_attr__( 'Offset X', 'sobari_sc' ),
			'std'			=> '0%'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Offset Y', 'sobari_sc' ),
			'param_name'	=> 'offset_y',
			'description'	=> esc_attr__( 'Offset Y', 'sobari_sc' ),
			'std'			=> '0%'
		),
		array(
			"type" => "dropdown",
			"heading" => __( "CSS Animation", "sobari" ),
			"param_name" => "animation",
			"value" => array(
				__( 'Fade', 'sobari_sc' ) 					=> 'uk-animation-fade',
				__( 'Scale up', 'sobari_sc' ) 				=> 'uk-animation-scale-up',
				__( 'Scale down', 'sobari_sc' ) 			=> 'uk-animation-scale-down',
				__( 'Slide top 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-top',
				__( 'Slide bottom 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-bottom',
				__( 'Slide left 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-left',
				__( 'Slide right 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-right',
				__( 'Slide top small', 'sobari_sc' ) 		=> 'uk-animation-slide-top-small',
				__( 'Slide bottom small', 'sobari_sc' ) 	=> 'uk-animation-slide-bottom-small',
				__( 'Slide left small', 'sobari_sc' ) 		=> 'uk-animation-slide-left-small',
				__( 'Slide right small', 'sobari_sc' ) 		=> 'uk-animation-slide-right-small',
				__( 'Slide top medium', 'sobari_sc' ) 		=> 'uk-animation-slide-top-medium',
				__( 'Slide bottom medium', 'sobari_sc' ) 	=> 'uk-animation-slide-bottom-medium',
				__( 'Slide left medium', 'sobari_sc' ) 		=> 'uk-animation-slide-left-medium',
				__( 'Slide right medium', 'sobari_sc' ) 	=> 'uk-animation-slide-right-medium',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Delay Line Animation', 'sobari_sc' ),
			'param_name' => 'delay_line_animation',
			'std'		=> '0',
			'value'		 => array(
				'None'               => '0',
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
		),
	),
);
return $param;
