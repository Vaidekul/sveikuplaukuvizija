<?php

$param = array(
	'name'			=> esc_attr__( 'Video Banner', 'sobari_sc' ),
	'base'			=> 'dahz_banner_video',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Banner with overlay video', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-banner-video.svg",
	'params'		=> array()
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image', 'sobari_sc' ),
	'param_name'	=> 'image',
	'description'	=> esc_attr__( 'Select image from library', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Image Size', 'sobari_sc' ),
	'param_name'	=> 'image_size',
	'description'	=> esc_attr__( 'Enter image size (example: "thumbnail", "medium", "large", "full" or other size defined by theme ). Alternatively enter size by pixel (example: 200x100 (Width x Height))', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'bg_color',
	'description'	=> __( 'Set banner background color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
	'param_name'	=> 'blend_mode',
	'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'image_blend_mode' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
	'param_name'	=> 'color_overlay',
	'description'	=> __( 'Set banner color overlay', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	 => '',
		__( 'Small', 'sobari_sc' )	 => 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )	 => 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )	 => 'uk-box-shadow-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-xlarge',
	),
	'description'	=> esc_attr__( 'Select box shadow style', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Add Extra Bottom Shadow', 'sobari_sc' ),
	'param_name'	=> 'is_extra_boxshadow',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'hover_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	 => '',
		__( 'Small', 'sobari_sc' )	 => 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )	 => 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )	 => 'uk-box-shadow-hover-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-hover-xlarge',
	),
	'description'	=> esc_attr__( 'Select box shadow hover style', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Video URL', 'sobari_sc' ),
	'param_name'	=> 'video_url',
	'description'	=> esc_attr__( 'Enter video url. Youtube or Vimeo', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Mute Video', 'sobari_sc' ),
	'param_name'	=> 'enable_mute_video',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Text Position', 'sobari_sc' ),
	'param_name'	=> 'text_position',
	'description'	=> __( 'Set the position for title and description', 'sobari_sc' ),
	'value'			=> array(
		__( 'Top Left', 'sobari_sc' )		=> 'uk-flex-left uk-flex-top',
		__( 'Top Center', 'sobari_sc' )		=> 'uk-flex-left uk-flex-middle',
		__( 'Top Right', 'sobari_sc' )		=> 'uk-flex-left uk-flex-bottom',
		__( 'Center Left', 'sobari_sc' )	=> 'uk-flex-center uk-flex-top',
		__( 'Center Center', 'sobari_sc' )	=> 'uk-flex-center uk-flex-middle',
		__( 'Center Right', 'sobari_sc' )	=> 'uk-flex-center uk-flex-bottom',
		__( 'Bottom Left', 'sobari_sc' )	=> 'uk-flex-right uk-flex-top',
		__( 'Bottom Center', 'sobari_sc' )	=> 'uk-flex-right uk-flex-middle',
		__( 'Bottom Right', 'sobari_sc' )	=> 'uk-flex-right uk-flex-bottom',
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Title', 'sobari_sc' ),
	'param_name'	=> 'info_title',
	'description'	=> esc_attr__( 'Text will be displayed for banner title', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Title Element Tag', 'sobari_sc' ),
	'param_name'	=> 'tag',
	'value'			=> array(
		'h1'	=> 'h1',
		'h2'	=> 'h2',
		'h3'	=> 'h3',
		'h4'	=> 'h4',
		'h5'	=> 'h5',
		'h6'	=> 'h6',
	),
	'description'	=> esc_attr__( 'Select element tag', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Title Color', 'sobari_sc' ),
	'param_name'	=> 'title_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Title Background Color', 'sobari_sc' ),
	'param_name'	=> 'title_background_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'		 => 'font_container',
	'param_name' => 'font_container',
	'value'		 => '',
	'settings'	 => array(
		'fields' => array(
			'font_size',
			'line_height',
			'font_size_description'		=> __( 'Enter font size', 'sobari_sc' ),
			'line_height_description'	=> __( 'Enter line height', 'sobari_sc' ),
		),
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Use theme default font family?', 'sobari_sc' ),
	'param_name'	=> 'use_theme_fonts',
	'value'			=> array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
	'description'	=> __( 'Use font family from the theme', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'		 => 'google_fonts',
	'param_name' => 'google_fonts',
	'value'		 => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
	'settings'	 => array(
		'fields' => array(
			'font_family_description' => __( 'Select font family', 'sobari_sc' ),
			'font_style_description' => __( 'Select font styling', 'sobari_sc' ),
		),
	),
	'dependency' => array(
		'element' => 'use_theme_fonts',
		'value_not_equal_to' => 'yes',
	),
);
$param['params'][] = array(
	'type' 			=> 'textarea_html',
	'holder' 		=> 'div',
	'heading' 		=> __( 'Text', 'js_composer' ),
	'param_name' 	=> 'content',
	'value' 		=> __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Description Color', 'sobari_sc' ),
	'param_name'	=> 'description_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Description Background Color', 'sobari_sc' ),
	'param_name'	=> 'description_background_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Description Position', 'sobari_sc' ),
	'param_name'	=> 'description_position',
	'description'	=> esc_attr__( 'Select description position', 'sobari_sc' ),
	'value'		=> array(
		__( 'Under Title', 'sobari_sc' ) => '',
		__( 'Above Title', 'sobari_sc' ) => 'uk-flex-first',
	)
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Text', 'sobari_sc' ),
	'param_name'	=> 'button_text',
);
$param['params'][] = array(
	'type'			=> 'de_link',
	'heading'		=> esc_attr__( 'Link URL', 'sobari_sc' ),
	'param_name'	=> 'button_link',
	'description'	=> esc_attr__( 'Enter or pick a link, an image or a video file', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Link Title', 'sobari_sc' ),
	'param_name'	=> 'button_title',
	'description'	=> esc_attr__( 'Enter an optional text for the attribute of the link which will appear on hover', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Link Target', 'sobari_sc' ),
	'param_name'	=> 'banner_button_target',
	'value'			=> array(
		__( 'Same Window', 'sobari_sc' ) => '_self',
		__( 'New Window', 'sobari_sc' )	 => '_blank',
	)
);
// $param['params'][] = array(
	// 'type'				=> 'colorpicker',
	// 'heading'			=> __( 'Text Color', 'sobari_sc' ),
	// 'param_name'		=> 'button_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );
// $param['params'][] = array(
	// 'type'				=> 'colorpicker',
	// 'heading'			=> __( 'Hover Text Color', 'sobari_sc' ),
	// 'param_name'		=> 'button_hover_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );
// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Text Style', 'sobari_sc' ),
	// 'param_name'	=> 'button_hover_text_style',
	// 'value'			=> array(
		// __( 'Change Color', 'sobari_sc' )	 => '',
		// __( 'Thin Underline', 'sobari_sc' )	 => 'de-btn--underline-thin',
		// __( 'Thick Underline', 'sobari_sc' ) => 'de-btn--underline-thick',
	// )
// );
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Visibility', 'sobari_sc' ),
	'param_name'	=> 'button_visibility',
	'value'			=> array(
		__( 'Always Visible', 'sobari_sc' )	=> '',
		__( 'When Hover', 'sobari_sc' )		=> 'visible-hover',
		__( 'Hidden', 'sobari_sc' )			=> 'hidden',
	)
);
$param['params'][] = array(
	'type'				=> 'textfield',
	'heading'			=> __( 'Mobile Min Height', 'sobari_sc' ),
	'param_name'		=> 'mobile_min_height',
	'group'				=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'				=> 'checkbox',
	'heading'			=> __( 'Custom title responsive', 'sobari_sc' ),
	'param_name'		=> 'enable_custom_title_responsive',
	'group'				=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'				=> 'title_responsive_size',
	'param_name'		=> 'custom_title_responsive_size',
	'group'				=> __( 'Settings', 'sobari_sc' ),
	'dependency'		=> array(
		'element'		=> 'enable_custom_title_responsive',
		'not_empty'		=> true,
	)
);
$param['params'][] = array(
	'type'				=> 'checkbox',
	'heading'			=> __( 'Play inline on mobile devices', 'sobari_sc' ),
	'param_name'		=> 'enable_play_inline_mobile',
	'group'				=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'				=> 'checkbox',
	'heading'			=> __( 'Disable cover video', 'sobari_sc' ),
	'param_name'		=> 'disable_cover',
	'group'				=> __( 'Settings', 'sobari_sc' ),
);

return $param;
