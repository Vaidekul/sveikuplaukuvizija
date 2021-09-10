<?php

$bar = array(

	array(
		'type' => 'param_group',
		'heading' => __( 'Values', 'js_composer' ),
		'param_name' => 'values',
		'description' => __( 'Enter values for graph - value, title and color.', 'js_composer' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => __( 'Development', 'js_composer' ),
				'value' => '90',
				'bar_color'	=> '#726240',
				'background_color' => '#eaeaea'
			),
			array(
				'label' => __( 'Design', 'js_composer' ),
				'value' => '80',
				'bar_color'	=> '#726240',
				'background_color' => '#eaeaea'
			),
			array(
				'label' => __( 'Marketing', 'js_composer' ),
				'value' => '70',
				'bar_color'	=> '#726240',
				'background_color' => '#eaeaea'
			),
		) ) ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Label', 'js_composer' ),
				'param_name' => 'label',
				'description' => __( 'Enter text used as title of bar.', 'js_composer' ),
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Value', 'js_composer' ),
				'param_name' => 'value',
				'description' => __( 'Enter value of bar.', 'js_composer' ),
				'admin_label' => true,
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Bar Color', 'sobari_sc' ),
				'param_name'	=> 'bar_color',
				'edit_field_class'	=> 'vc_col-sm-6'
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
				'param_name'	=> 'background_color',
				'edit_field_class'	=> 'vc_col-sm-6'
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
				'param_name'	=> 'text_color',
				'edit_field_class'	=> 'vc_col-sm-6'
			),
		),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Units', 'js_composer' ),
		'param_name' => 'units',
		'std'		=> '%',
		'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'js_composer' ),
	),
	array(
		'type'			=> 'slider',
		'heading'		=> esc_attr__( 'Border Radius', 'sobari_sc' ),
		'param_name'	=> 'border_radius',
		'std'			=> '0',
		'settings'		=> array(
			'min'		=> 0,
			'max'		=> 20,
			'step'		=> 1
		)
	),
);
$bar = array_merge( $bar, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );
return $bar;
