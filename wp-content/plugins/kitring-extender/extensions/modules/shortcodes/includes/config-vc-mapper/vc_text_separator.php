<?php
$separator = array(
	array(
		'type' => 'textfield',
		'heading' => __( 'Title', 'js_composer' ),
		'param_name' => 'title',
		'holder' => 'div',
		'value' => __( 'Text With Separator', 'js_composer' ),
		'description' => __( 'Add text to separator.', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Title position', 'js_composer' ),
		'param_name' => 'title_align',
		'value' => array(
			__( 'Center', 'js_composer' ) => 'separator_align_center',
			__( 'Left', 'js_composer' ) => 'separator_align_left',
			__( 'Right', 'js_composer' ) => 'separator_align_right',
		),
		'description' => __( 'Select title location.', 'js_composer' ),
	),
	array(
			'type' => 'hidden',
			'param_name' => 'layout',
			'value' => 'separator_with_text',
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Element Tag', 'js_composer' ),
		'param_name' => 'tag',
		'std'	=> 'h4',
		'value' => dahz_shortcode_helper_get_field_option( 'tag' ),
		'description' => __( 'Element tag.', 'js_composer' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Custom font Size?', 'js_composer' ),
		'param_name' => 'enable_custom_font_size',
		'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
		'description' => __( 'Use custom font size(ex: 16px).', 'js_composer' ),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Custom Font Size', 'js_composer' ),
		'param_name' 		=> 'custom_font_size',
		'dependency'	=> array(
			'element'	=> 'enable_custom_font_size',
			'not_empty'	=> true,
		)
	),
	array(
		'type' 				=> 'colorpicker',
		'heading' 			=> __( 'Text Color', 'js_composer' ),
		'param_name' 		=> 'text_color',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Alignment', 'js_composer' ),
		'param_name' => 'align',
		'value' => array(
			__( 'Center', 'js_composer' ) => 'align_center',
			__( 'Left', 'js_composer' ) => 'align_left',
			__( 'Right', 'js_composer' ) => 'align_right',
		),
		'description' => __( 'Select separator alignment.', 'js_composer' ),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Border Color', 'js_composer' ),
		'param_name' => 'accent_color',
		'description' => __( 'Select color of separator', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Border Style', 'js_composer' ),
		'param_name' => 'style',
		'value' => dahz_shortcode_helper_get_field_option( 'border_style' ),
		'description' => __( 'Separator display style.', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Border width', 'js_composer' ),
		'param_name' => 'border_width',
		'value' => getVcShared( 'separator border widths' ),
		'description' => __( 'Select border width (pixels).', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Element width', 'js_composer' ),
		'param_name' => 'el_width',
		'value' => getVcShared( 'separator widths' ),
		'description' => __( 'Select separator width (percentage).', 'js_composer' ),
	)
);

$dahz_separator = array_merge( $separator, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );

return $dahz_separator;
