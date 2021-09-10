<?php

$pie = array(

	array(
		'type' => 'textfield',
		'heading' => __( 'Label', 'js_composer' ),
		'param_name' => 'label',
		'std'		=> '80',
		'description' => __( 'Enter text used as title of bar.', 'js_composer' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Value', 'js_composer' ),
		'param_name' => 'value',
		'std'		=> '80',
		'description' => __( 'Enter value of bar.', 'js_composer' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Units', 'js_composer' ),
		'std'		=> '%',
		'param_name' => 'units',
		'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'js_composer' ),
	),
	array(
		'type'			=> 'slider',
		'heading'		=> esc_attr__( 'Circle Thickness', 'sobari_sc' ),
		'param_name'	=> 'circle_thickness',
		'settings'		=> array(
			'min'		=> 1,
			'max'		=> 40,
			'step'		=> 1
		)
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_attr__( 'Piechart Bar Color', 'sobari_sc' ),
		'param_name'	=> 'pie_color',
		'std'			=> '#726240',
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_attr__( 'Piechart Track Color', 'sobari_sc' ),
		'param_name'	=> 'pie_track_color',
		'std'			=> '#eaeaea',
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
		'param_name'	=> 'text_color',
		'std'			=> '#726240',
		'edit_field_class'	=> 'vc_col-sm-6'
	),
);
$pie = array_merge( $pie, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );
return $pie;