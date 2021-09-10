<?php

$param = array(
	'name'			=> esc_attr__( 'Social Media', 'upsob_sc' ),
	'base'			=> 'social_media',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Links to your social media profile', 'sobari_sc' ),
  'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-social.svg",
	'params'		=> array(),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Social Media Style', 'upsob_sc' ),
	'param_name'	=> 'style',
	'description'	=> esc_attr__( 'Define social media style', 'upsob_sc' ),
	'value'			=> array(
		esc_attr__( 'Default', 'upsob_sc' )	=> 'default',
		esc_attr__( 'Outline', 'upsob_sc' )	=> 'outline',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Size', 'upsob_sc' ),
	'param_name'	=> 'icon_size',
	'description'	=> esc_attr__( 'Define social media icon size', 'upsob_sc' ),
	'value'			=> array(
		esc_attr__( 'Normal - Default', 'upsob_sc' )	=> 'default',
		esc_attr__( 'Small', 'upsob_sc' )				=> 'small',
		esc_attr__( 'Large', 'upsob_sc' )				=> 'large',
		esc_attr__( 'Extra Large', 'upsob_sc' )			=> 'extra_large',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Alignment', 'upsob_sc' ),
	'param_name'	=> 'icon_alignment',
	'description'	=> esc_attr__( 'Define social media icon alignment', 'upsob_sc' ),
	'value'			=> array(
		esc_attr__( 'Left', 'upsob_sc' )	=> 'uk-flex-left',
		esc_attr__( 'Center', 'upsob_sc' )	=> 'uk-flex-center',
		esc_attr__( 'Right', 'upsob_sc' )	=> 'uk-flex-right',
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Custom Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color',
	'description'	=> esc_attr__( 'Custom color for social media', 'upsob_sc' ),
	'value'			=> array(
		esc_attr__( 'Yes', 'upsob_sc' )	=> 'true',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Default Color', 'upsob_sc' ),
	'param_name'	=> 'default_color',
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'value'		=> 'true',
	),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Color', 'upsob_sc' ),
	'param_name'	=> 'hover_color',
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'value'		=> 'true',
	),
	'edit_field_class'	=> 'vc_col-sm-6',
);
return $param;
