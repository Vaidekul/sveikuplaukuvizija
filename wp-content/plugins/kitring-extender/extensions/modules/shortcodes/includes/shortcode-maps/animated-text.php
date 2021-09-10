<?php
/**
*
*/
$param = array(
	'name'			=> esc_attr__( 'Animated Text', 'sobari_sc' ),
	'base'			=> 'animated_text',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Text with animated background', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-animated-text.svg",
	'params'		=> array(),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Text Style', 'sobari_sc' ),
	'param_name'	=> 'style',
	'std'			=> 'default',
	'value'			=> array(
		'Animated Text With Image Background'	=> 'image_background',
		'Animated Text'							=> 'default'
	)
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image Background', 'sobari_sc' ),
	'param_name'	=> 'image',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'image_background'
	)
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Inner Text Color', 'sobari_sc' ),
	'param_name'	=> 'inner_text_color',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> array( 'image_background', 'default' )
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Outer Text Color', 'sobari_sc' ),
	'param_name'	=> 'outer_text_color',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'image_background'
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Text', 'sobari_sc' ),
	'param_name'	=> 'text',
	'std'			=> __( 'Animated Text', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Font Size', 'sobari_sc' ),
	'param_name'	=> 'font_size',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Line Height', 'sobari_sc' ),
	'param_name'	=> 'line_height',
);
$param['params'][] = array(
	'type' => 'checkbox',
	'heading' => __( 'Use theme default font family?', 'js_composer' ),
	'param_name' => 'use_theme_fonts',
	'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
	'description' => __( 'Use font family from the theme.', 'js_composer' ),
);

$param['params'][] = array(
	'type'			=> 'google_fonts',
	'param_name'	=> 'google_fonts',
	'value'			=> 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
	'settings'		=> array(
		'fields'	=> array(
			'font_family_description'	=> __( 'Select font family.', 'sobari_sc' ),
			'font_style_description'	=> __( 'Select font styling.', 'sobari_sc' ),
		),
	),
	'dependency' => array(
		'element' => 'use_theme_fonts',
		'value_not_equal_to' => 'yes',
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Animation Duration', 'sobari_sc' ),
	'param_name'	=> 'animation_duration',
	'value'			=> array(
		'Slow'	=> '16',
		'Slower'=> '20',
		'Medium'=> '8',
		'Fast'	=> '4',
		'Faster'=> '2'
	)
);

return $param;
