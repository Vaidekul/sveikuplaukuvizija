<?php
$tabs = array(
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon',
		'value' => array(
			__( 'Plus', 'js_composer' ) 	=> 'plus|minus',
			__( 'Expand', 'js_composer' ) 	=> 'expand|shrink',
			__( 'Chevron', 'js_composer' ) 	=> 'chevron-up|chevron-down',
			__( 'More', 'js_composer' ) 	=> 'more-open|more-close',
			__( 'Arrow', 'js_composer' ) 	=> 'arrow-up|arrow-down',
		),
		'description' => __( 'Select icon.', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon Ration', 'js_composer' ),
		'param_name' => 'icon_ratio',
		'value' => array(
			__( '1', 'js_composer' ) 	=> '1',
			__( '1.5', 'js_composer' ) 	=> '1.5',
			__( '2', 'js_composer' ) 	=> '2',
			__( '2.5', 'js_composer' ) 	=> '2.5',
			__( '3', 'js_composer' ) 	=> '3',
			__( '3.5', 'js_composer' ) 	=> '3.5',
			__( '4', 'js_composer' ) 	=> '4',
			__( '4.5', 'js_composer' ) 	=> '4.5',
			__( '5', 'js_composer' ) 	=> '5',
		),
		'description' => __( 'Select icon ratio.', 'js_composer' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Allow Multiple Open Items', 'js_composer' ),
		'param_name' => 'enable_multiple_open',
		'description' => __( 'Allow Multiple Open Items.', 'js_composer' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Allow All Items To Be Closed', 'js_composer' ),
		'param_name' => 'enable_close_all',
		'description' => __( 'Allow All Items To Be Closed.', 'js_composer' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'TitleElement Tag', 'sobari_sc' ),
		'param_name'	=> 'tag',
		'std'			=> 'h4',
		'value'			=> array(
			'h1'	=> 'h1',
			'h2'	=> 'h2',
			'h3'	=> 'h3',
			'h4'	=> 'h4',
			'h5'	=> 'h5',
			'h6'	=> 'h6',
			'p'		=> 'p',
		),
		'description'	=> esc_attr__( 'Select Element Tag', 'sobari_sc' ),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> __( 'Custom font size?', 'js_composer' ),
		'param_name' 	=> 'custom_font_size',
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> __( 'font size', 'js_composer' ),
		'param_name' 	=> 'font_size',
		'dependency'		=> array(
			'element'		=> 'custom_font_size',
			'not_empty'		=> true
		)
	),
	array(
		'type' => 'textfield',
		'param_name' => 'active_section',
		'heading' => __( 'Active section', 'js_composer' ),
		'value' => 1,
		'description' => __( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'js_composer' ),
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Active Color', 'js_composer' ),
		'param_name' 	=> 'active_color',
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Inactive Color', 'js_composer' ),
		'param_name' 	=> 'inactive_color',
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Border Color', 'js_composer' ),
		'param_name' 	=> 'border_color',
		'edit_field_class'	=> 'vc_col-sm-6',
	)
);

$dahz_tabs = array_merge( $tabs, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra(), dahz_shortcodes_get_group_dahz_id() );

return $dahz_tabs;
