<?php
$custom_heading = array(
	array(
		'type' 			=> 'el_id',
		'param_name' 	=> 'dahz_id',
		'settings' 		=> array(
			'auto_generate' => true,
		),
		'save_always'	=> true,
		'edit_field_class'=> 'hidden',
		'heading' 		=> __( 'Section ID', 'js_composer' ),
		'description' 	=> __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Text source', 'js_composer' ),
		'param_name' => 'source',
		'std'		=> '',
		'value' => array(
			__( 'Custom text', 'js_composer' ) => '',
			__( 'Post or Page Title', 'js_composer' ) => 'post_title',
		),
		'std' => '',
		'description' => __( 'Select text source.', 'js_composer' ),
	),
	array(
		'type' => 'textarea',
		'heading' => __( 'Text', 'js_composer' ),
		'param_name' => 'text',
		'admin_label' => true,
		'value' => __( 'This is custom heading element', 'js_composer' ),
		'description' => __( 'Note: If you are using non-latin characters be sure to activate them under Settings/WPBakery Page Builder/General Settings.', 'js_composer' ),
		'dependency' => array(
			'element' => 'source',
			'is_empty' => true,
		),
	),
	array(
		'type'			=> 'de_link',
		'heading'		=> esc_attr__( 'Link URL', 'sobari_sc' ),
		'param_name'	=> 'button_link',
		'description'	=> esc_attr__( 'Enter or pick a link, an image or a video file', 'sobari_sc' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Link Title', 'sobari_sc' ),
		'param_name'	=> 'button_title',
		'description'	=> esc_attr__( 'Enter an optional text for the attribute of the link which will appear on hover', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_attr__( 'Link Target', 'sobari_sc' ),
		'param_name'	=> 'button_target',
		'std'			=> '_self',
		'value'			=> array(
			__( 'Same Window', 'sobari_sc' ) 	=> '_self',
			__( 'New Window', 'sobari_sc' ) 	=> '_blank',
			__( 'Modal', 'sobari_sc' ) 			=> 'modal',
			__( 'Scroll', 'sobari_sc' ) 		=> 'scroll',
		)
	),
	array(
		'type' => 'font_container',
		'param_name' => 'font_container',
		'value' => 'tag:h4|text_align:left',
		'settings' => array(
			'fields' => array(
				'tag' => 'h4',
				// default value h2
				'text_align',
				'font_size',
				'line_height',
				'color',
				'tag_description' => __( 'Select element tag.', 'js_composer' ),
				'text_align_description' => __( 'Select text alignment.', 'js_composer' ),
				'font_size_description' => __( 'Enter font size.', 'js_composer' ),
				'line_height_description' => __( 'Enter line height.', 'js_composer' ),
				'color_description' => __( 'Select heading color.', 'js_composer' ),
			),
		),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
		'param_name'	=> 'enable_gradient',
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Text Color 2', 'sobari_sc' ),
		'param_name'	=> 'text_color_2',
		'dependency'	=> array(
			'element'	=> 'enable_gradient',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
		'param_name'	=> 'gradient_direction',
		'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
		'dependency'	=> array(
			'element'	=> 'enable_gradient',
			'not_empty'	=> true,
		)
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use theme default font family?', 'js_composer' ),
		'param_name' => 'use_theme_fonts',
		'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
		'description' => __( 'Use font family from the theme.', 'js_composer' ),
	),
	array(
		'type' => 'google_fonts',
		'param_name' => 'google_fonts',
		'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'settings' => array(
			'fields' => array(
				'font_family_description' => __( 'Select font family.', 'js_composer' ),
				'font_style_description' => __( 'Select font styling.', 'js_composer' ),
			),
		),
		'dependency' => array(
			'element' => 'use_theme_fonts',
			'value_not_equal_to' => 'yes',
		),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Lightbox Width', 'js_composer' ),
		'param_name' 		=> 'lightbox_width',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'				=> __( 'Settings', 'sobari_sc' ),
		'description' => __( 'Use font family from the theme.', 'js_composer' ),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Lightbox Height', 'js_composer' ),
		'param_name' 		=> 'lightbox_height',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'				=> __( 'Settings', 'sobari_sc' ),
		'description' => __( 'Use font family from the theme.', 'js_composer' ),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Margin Top', 'js_composer' ),
		'param_name' 		=> 'margin_top',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'				=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Margin Right', 'js_composer' ),
		'param_name' 		=> 'margin_right',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'				=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Margin Bottom', 'js_composer' ),
		'param_name' 		=> 'margin_bottom',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'				=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Margin Left', 'js_composer' ),
		'param_name' 		=> 'margin_left',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'				=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Custom Responsive Size?', 'js_composer' ),
		'param_name' => 'custom_responsive_size',
		'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
		'group'				=> __( 'Settings', 'sobari_sc' ),
		'description' => __( 'Use custom size for responsive', 'js_composer' ),
	),
	array(
		'type' 				=> 'title_responsive_size',
		'param_name' 		=> 'custom_font_size',
		'group'				=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'custom_responsive_size',
			'not_empty'	=> true,
		)
	)
);

$dahz_custom_heading = array_merge( $custom_heading, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );

return $dahz_custom_heading;