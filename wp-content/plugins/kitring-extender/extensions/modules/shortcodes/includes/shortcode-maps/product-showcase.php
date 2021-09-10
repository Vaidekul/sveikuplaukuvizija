<?php

$param = array(
	'name'			=> __( 'Product Showcase', 'sobari_sc' ),
	'base'			=> 'product_showcase',
	'category'	=> array( 'WooCommerce', 'Content' ),
	'description'	=> __( 'Display selected product in styles', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-product-showcase.svg",
	'params'		=> array(),
);
# GENERAL
# LAYOUT
$param['params'][] = array(
	'type'			=> 'radio_image',
	'param_name'	=> 'layout',
	'heading'		=> __( 'Showcase Layout', 'sobari_sc' ),
	'description'	=> __( 'Select showcase layout', 'sobari_sc' ),
	'std'			=> 'layout-1',
	'value'			=> array(
		'layout-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-showcase-style-1.svg",
		'layout-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-showcase-style-2.svg",
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'ratio',
	'heading'		=> __( 'Media Ratio', 'sobari_sc' ),
	'description'	=> __( 'Specify the aspect ratio for the media', 'sobari_sc' ),
	'std'			=> '7-5',
	'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_hide_cat',
	'heading'		=> __( 'Hide Category', 'sobari_sc' ),
);
// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'param_name'	=> 'display_cat',
	// 'heading'		=> __( 'Display Category', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Category', 'sobari_sc' )	=> 'product_cat',
		// __( 'Brand', 'sobari_sc' )		=> 'brand',
	// ),
// );
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_hide_border',
	'heading'		=> __( 'Hide Border', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_hide_subtitle',
	'heading'		=> __( 'Hide Subtitle / Price', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_hide_description',
	'heading'		=> __( 'Hide Description', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'param_name'	=> 'excerpt',
	'heading'		=> __( 'Excerpt / Description Length', 'sobari_sc' ),
	'description'	=> __( 'Maximum exceprt to show. Value limited from 5-50', 'sobari_sc' ),
	'std'			=> '20',
);
# BUTTON
// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'param_name'	=> 'button_style',
	// 'heading'		=> __( 'Button Style', 'sobari_sc' ),
	// 'description'	=> __( 'Select button style', 'sobari_sc' ),
	// 'std'			=> 'de-btn--text',
	// 'value'			=> array(
		// __( 'Fill', 'sobari_sc' )	 => 'de-btn--boxed de-btn--fill',
		// __( 'Outline', 'sobari_sc' ) => 'de-btn--boxed de-btn--outline',
		// __( 'Text', 'sobari_sc' )	 => 'de-btn--text',
	// ),
// );
// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'param_name'	=> 'bg_color',
	// 'heading'		=> __( 'Background Color', 'sobari_sc' ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill' ),
	// ),
// );
// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'param_name'	=> 'border_color',
	// 'heading'		=> __( 'Border Color', 'sobari_sc' ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--outline' ),
	// ),
// );
// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'param_name'	=> 'hover_bg_color',
	// 'heading'		=> __( 'Hover Background Color', 'sobari_sc' ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
// );
// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'param_name'	=> 'text_color',
	// 'heading'		=> __( 'Text Color', 'sobari_sc' ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );
// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'param_name'	=> 'hover_text_color',
	// 'heading'		=> __( 'Hover Text Color', 'sobari_sc' ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );
// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'param_name'	=> 'button_text_hover',
	// 'heading'		=> __( 'Button Text Style', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Change Color', 'sobari_sc' )	 => '',
		// __( 'Thin Underline', 'sobari_sc' )	 => 'de-btn--underline-thin',
		// __( 'Thick Underline', 'sobari_sc' ) => 'de-btn--underline-thick',
	// ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--text' ),
	// ),
// );
// $param['params'][] = array(
	// 'type'			=> 'textfield',
	// 'param_name'	=> 'border_radius',
	// 'heading'		=> __( 'Button Border Radius', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
// );
// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'param_name'	=> 'button_size',
	// 'heading'		=> __( 'Button Size', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Default', 'sobari_sc' ) => '',
		// __( 'Small', 'sobari_sc' )	 => 'de-btn--small',
		// __( 'Large', 'sobari_sc' )	 => 'de-btn--large',
	// ),
// );
dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button() );
# HEIGHT
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'height',
	'heading'		=> __( 'Height', 'sobari_sc' ),
	'value'			=> array(
		__( 'Auto', 'sobari_sc' ) => '',
		__( 'Viewport', 'sobari_sc' ) => 'offset-bottom: false;',
		__( 'Viewport (Minus 20%)', 'sobari_sc' ) => 'offset-bottom: 20;',
		__( 'Viewport (Minus the Following Section)', 'sobari_sc' ) => 'offset-bottom: true;',
	),
);
$param['params'][] = array(
	'type'			=> 'slider',
	'param_name'	=> 'min_height',
	'heading'		=> __( 'Min Height', 'sobari_sc' ),
	'settings'		=> array(
		'min'	=> '200',
		'max'	=> '800',
		'step'	=> '50',
	),
	'dependency'	=> array(
		'element'	=> 'height',
		'value'		=> array( 'offset-bottom: false;', 'offset-bottom: 20;', 'offset-bottom: true;' ),
	),
);
# SLIDER
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'color_scheme',
	'heading'		=> __( 'Slide Nav & Dot Nav Color Scheme', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'color_scheme' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_slide_nav',
	'heading'		=> __( 'Show Slide Nav', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'slide_nav_pos',
	'heading'		=> __( 'Slide Nav Position', 'sobari_sc' ),
	'value'			=> array(
		__( 'Inside', 'sobari_sc' )	 => '',
		__( 'Outside', 'sobari_sc' ) => '-out',
	),
	'dependency'	=> array(
		'element'	=> 'is_slide_nav',
		'not_empty'	=> true,
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_nav_hover',
	'heading'		=> __( 'Show Slide Nav When Hover', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'is_slide_nav',
		'not_empty'	=> true,
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'slide_nav_breakpoint',
	'heading'		=> __( 'Slide Nav Breakpoint', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
	'dependency'	=> array(
		'element'	=> 'is_slide_nav',
		'not_empty'	=> true,
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_slide_dot',
	'heading'		=> __( 'Show Dot Nav', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'slide_dot_breakpoint',
	'heading'		=> __( 'Dot Nav Breakpoint', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
	'dependency'	=> array(
		'element'	=> 'is_slide_dot',
		'not_empty'	=> true,
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'autoplay',
	'heading'		=> __( 'Autoplay Interval', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'autoplay_interval' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_disable_infinite',
	'heading'		=> __( 'Disable Infinite Scroll', 'sobari_sc' ),
);
# CONTENT
$param['params'][] = array(
	'group'			=> __( 'Content', 'sobari_sc' ),
	'type'			=> 'param_group',
	'param_name'	=> 'product_showcase_item',
	'heading'		=> '',
	'value'			=> urlencode( json_encode( array(
					array(
						'type' 			=> 'custom',
						'cat_text' 		=> 'Category Item',
						'title'			=> 'Product Showcase Title Goes Here',
						'hover_effect'	=> 'fade',
						'subtitle'		=> 'Subtitle text goes here',
						'description'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium, augue id molestie condimentum, diam sem aliquet leo, sit amet rhoncus lectus ipsum ut lacus.',
						'button_text'	=> 'Read More',
						'button_title'	=> 'Read more',
						'button_target'	=> '_self'
					),
					array(
						'type' 			=> 'custom',
						'cat_text' 		=> 'Category Item',
						'title'			=> 'Product Showcase Title Goes Here',
						'hover_effect'	=> 'fade',
						'subtitle'		=> 'Subtitle text goes here',
						'description'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium, augue id molestie condimentum, diam sem aliquet leo, sit amet rhoncus lectus ipsum ut lacus.',
						'button_text'	=> 'Read More',
						'button_title'	=> 'Read more',
						'button_target'	=> '_self'
					),					
	))),
	'params'		=> array(
		array(
			'type'			=> 'radio_button',
			'param_name'	=> 'type',
			'heading'		=> __( 'Product Showcase Type', 'sobari_sc' ),
			'description'	=> __( 'Select product menu type', 'sobari_sc' ),
			'std'			=> 'custom',
			'value'			=> array(
				'woo'		=> __( 'Woo Product', 'sobari_sc' ),
				'custom'	=> __( 'Custom', 'sobari_sc' ),
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'product_ids',
			'heading'		=> __( 'Product ID', 'sobari_sc' ),
			'description'	=> __( 'Input product ID', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'woo',
			),
		),
		array(
			'type'			=> 'dropdown',
			'param_name'	=> 'target',
			'heading'		=> __( 'Button Links to:', 'sobari_sc' ),
			'value'			=> array(
				__( 'Default', 'sobari_sc' )			=> 'default',
				__( 'Go to Product Page', 'sobari_sc' )	=> 'single',
				__( 'Open Quickview', 'sobari_sc' )		=> 'quickview',
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'woo',
			),
		),
		array(
			'type'			=> 'checkbox',
			'param_name'	=> 'is_custom_image',
			'heading'		=> __( 'Use Custom Image', 'sobari_sc' ),
			'description'	=> __( 'If uncheck will be used product image default', 'sobari_sc' ),
			'std'			=> 'false',
			'value'			=> array(
				__( 'Yes', 'sobari_sc' ) => 'true',
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'woo',
			),
		),
		array(
			'type'			=> 'attach_image',
			'param_name'	=> 'image',
			'heading'		=> __( 'Image', 'sobari_sc' ),
			'description'	=> __( 'Select image from library', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'is_custom_image',
				'value'		=> 'true',
			),
		),
		array(
			'type'			=> 'attach_image',
			'param_name'	=> 'image_hover',
			'heading'		=> __( 'Image Hover', 'sobari_sc' ),
			'description'	=> __( 'Select image from library', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'is_custom_image',
				'value'		=> 'true',
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'cat_text',
			'heading'		=> __( 'Category Text', 'sobari_sc' ),
			'description'	=> __( 'Insert category text', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'title',
			'heading'		=> __( 'Title', 'sobari_sc' ),
			'description'	=> __( 'Insert title text', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'attach_image',
			'param_name'	=> 'custom_image',
			'heading'		=> __( 'Image', 'sobari_sc' ),
			'description'	=> __( 'Select image from library', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'attach_image',
			'param_name'	=> 'custom_image_hover',
			'heading'		=> __( 'Image Hover', 'sobari_sc' ),
			'description'	=> __( 'Select image from library', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'param_name'	=> 'hover_effect',
			'heading'		=> __( 'Hover Effect', 'sobari_sc' ),
			'description'	=> __( 'Select hover effect', 'sobari_sc' ),
			'value'			=> array(
				__( 'None', 'sobari_sc' )				 => 'none',
				__( 'Fade', 'sobari_sc' )				 => 'fade',
				__( 'Zoom', 'sobari_sc' )				 => 'zoom',
				__( 'Zoom Glare', 'sobari_sc' )			 => 'zoom-glare',
				__( 'Push', 'sobari_sc' )				 => 'push',
				__( 'Push Glare', 'sobari_sc' )			 => 'push-glare',
				__( 'Parallax-Tilt', 'sobari_sc' )		 => 'parallax-tilt',
				__( 'Parallax-Tilt Glare', 'sobari_sc' ) => 'parallax-tilt-glare',
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'subtitle',
			'heading'		=> __( 'Subtitle / Price', 'sobari_sc' ),
			'description'	=> __( 'Insert subtitle or price text', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'description',
			'heading'		=> __( 'Description', 'sobari_sc' ),
			'description'	=> __( 'Insert description text', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'button_text',
			'heading'		=> __( 'Button Text', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'de_link',
			'param_name'	=> 'button_url',
			'heading'		=> __( 'Link URL', 'sobari_sc' ),
			'description'	=> __( 'Enter or pick a link, an image or a video file', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'textfield',
			'param_name'	=> 'button_title',
			'heading'		=> __( 'Link Title', 'sobari_sc' ),
			'description'	=> __( 'Enter an optional text for the title attribute of the link, which will appear on hover', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'param_name'	=> 'button_target',
			'heading'		=> __( 'Link Target', 'sobari_sc' ),
			'value'			=> array(
				__( 'Same Window', 'sobari_sc' ) => '_self',
				__( 'New Window', 'sobari_sc' )	 => '_blank',
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'custom',
			),
		),
	),

	
);
# STYLING
# CATEGORY
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'dropdown',
	'param_name'	=> 'cat_tag',
	'heading'		=> __( 'Category Text Element Tag', 'sobari_sc' ),
	'description'	=> __( 'Select element tag', 'sobari_sc' ),
	'std'			=> 'p',
	'value'			=> dahz_shortcode_helper_get_field_option( 'tag' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'textfield',
	'param_name'	=> 'cat_font_size',
	'heading'		=> __( 'Category Text Font Size', 'sobari_sc' ),
	'description'	=> __( 'Enter font size', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'checkbox',
	'param_name'	=> 'is_cat_uppercase',
	'heading'		=> __( 'Category Uppercase', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'colorpicker',
	'param_name'	=> 'cat_text_color',
	'std'			=> '#726240',
	'heading'		=> __( 'Category Text Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'colorpicker',
	'param_name'	=> 'cat_border_color',
	'std'			=> '#726240',
	'heading'		=> __( 'Border Color', 'sobari_sc' ),
);
# TITLE
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'dropdown',
	'param_name'	=> 'title_tag',
	'heading'		=> __( 'Title Element Tag', 'sobari_sc' ),
	'description'	=> __( 'Select element tag', 'sobari_sc' ),
	'std'			=> 'h1',
	'value'			=> dahz_shortcode_helper_get_field_option( 'tag' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'textfield',
	'param_name'	=> 'title_font_size',
	'heading'		=> __( 'Title Font Size', 'sobari_sc' ),
	'std'			=> '62px',
	'description'	=> __( 'Enter font size', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'textfield',
	'param_name'	=> 'title_line_height',
	'heading'		=> __( 'Title Line Height', 'sobari_sc' ),
	'std'			=> '1.25',
	'description'	=> __( 'Enter line', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'checkbox',
	'param_name'	=> 'is_title_uppercase',
	'heading'		=> __( 'Title Uppercase', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'colorpicker',
	'param_name'	=> 'title_color',
	'heading'		=> __( 'Title Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'checkbox',
	'param_name'	=> 'use_theme_fonts',
	'heading'		=> __( 'Use Theme Default Font Family', 'sobari_sc' ),
	'description'	=> __( 'Use font family from the theme', 'sobari_sc' ),
	'value'			=> array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'google_fonts',
	'param_name'	=> 'google_fonts',
	'value'			=> 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
	'settings'		=> array(
		'fields'	=> array(
			'font_family_description'	=> __( 'Select font family', 'sobari_sc' ),
			'font_style_description'	=> __( 'Select font styling', 'sobari_sc' ),
		),
	),
	'dependency'	=> array(
		'element'	=> 'use_theme_fonts',
		'value_not_equal_to' => 'yes',
	),
);
# PRICE
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'dropdown',
	'param_name'	=> 'subtitle_tag',
	'heading'		=> __( 'Subtitle / Price Element Tag', 'sobari_sc' ),
	'description'	=> __( 'Select element tag', 'sobari_sc' ),
	'std'			=> 'p',
	'value'			=> dahz_shortcode_helper_get_field_option( 'tag' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'textfield',
	'param_name'	=> 'subtitle_font_size',
	'heading'		=> __( 'Subtitle / Price Font Size', 'sobari_sc' ),
	'std'			=> '20px',
	'description'	=> __( 'Enter font size', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'checkbox',
	'param_name'	=> 'is_subtitle_uppercase',
	'heading'		=> __( 'Subtitle / Price Uppercase', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'colorpicker',
	'param_name'	=> 'subtitle_color',
	'heading'		=> __( 'Subtitle / Price Color', 'sobari_sc' ),
);
# DESCRIPTION
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'textfield',
	'param_name'	=> 'description_font_size',
	'heading'		=> __( 'Description Font Size', 'sobari_sc' ),
	'description'	=> __( 'Enter font size', 'sobari_sc' ),
);
$param['params'][] = array(
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'type'			=> 'colorpicker',
	'param_name'	=> 'description_color',
	'heading'		=> __( 'Description Color', 'sobari_sc' ),
);

return $param;
