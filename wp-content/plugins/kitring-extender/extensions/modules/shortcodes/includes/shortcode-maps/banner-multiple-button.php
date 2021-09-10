<?php

$param = array(
	'name'			=> __( 'Multiple Button Banner', 'sobari_sc' ),
	'base'			=> 'dahz_banner_multiple_button',
	'category'	=> array( 'Content' ),
	'description'	=> __( 'Banner with multiple button', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-banner-multiple-button.svg",
	'params'		=> array()
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> __( 'Image', 'sobari_sc' ),
	'param_name'	=> 'image',
	'description'	=> __( 'Select image from library', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Image Size', 'sobari_sc' ),
	'param_name'	=> 'image_size',
	'description'	=> __( 'Enter image size (example: "thumbnail", "medium", "large", "full" or other size defined by theme ). Alternatively enter size by pixel (example: 200x100 (Width x Height))', 'sobari_sc' ),
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
	'type'			=> 'dropdown',
	'heading'		=> __( 'Hover Effect', 'sobari_sc' ),
	'param_name'	=> 'hover_effect',
	'value'			=> array(
		__( 'Zoom', 'sobari_sc' )					=> 'zoom',
		__( 'Zoom Glare', 'sobari_sc' )				=> 'zoom-glare',
		__( 'Push', 'sobari_sc' )					=> 'push',
		__( 'Push Glare', 'sobari_sc' )				=> 'push-glare',
		__( 'Parallax Tilt', 'sobari_sc' )			=> 'parallax-tilt',
		__( 'Parallax Tilt Glare', 'sobari_sc' )	=> 'parallax-tilt-glare',
	),
	'description'	=> __( 'Select hover effect', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
	'param_name'	=> 'color_overlay',
	'description'	=> __( 'Set banner color overlay', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Button Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	 => '',
		__( 'Small', 'sobari_sc' )	 => 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )	 => 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )	 => 'uk-box-shadow-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-xlarge',
	),
	'description'	=> __( 'Select box shadow style', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Add Extra Bottom Shadow', 'sobari_sc' ),
	'param_name'	=> 'is_extra_boxshadow',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Button Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'hover_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	 => '',
		__( 'Small', 'sobari_sc' )	 => 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )	 => 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )	 => 'uk-box-shadow-hover-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-hover-xlarge',
	),
	'description'	=> __( 'Select box shadow hover style', 'sobari_sc' ),
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
	'heading'		=> __( 'Title', 'sobari_sc' ),
	'param_name'	=> 'info_title',
	'description'	=> __( 'Text will be displayed for banner title', 'sobari_sc' ),
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
	'description'	=> __( 'Select element tag', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Title Color', 'sobari_sc' ),
	'param_name'	=> 'title_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Title Background Color', 'sobari_sc' ),
	'param_name'	=> 'title_background_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'font_container',
	'param_name'	=> 'font_container',
	'value'			=> '',
	'settings'		=> array(
		'fields'	=> array(
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
$param['params'][] = array(
	'type' 			=> 'textarea_html',
	'holder' 		=> 'div',
	'heading' 		=> __( 'Text', 'js_composer' ),
	'param_name' 	=> 'content',
	'value' 		=> __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Description Color', 'sobari_sc' ),
	'param_name'	=> 'description_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Description Background Color', 'sobari_sc' ),
	'param_name'	=> 'description_background_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Description Position', 'sobari_sc' ),
	'param_name'	=> 'description_position',
	'description'	=> __( 'Select description position', 'sobari_sc' ),
	'value'			=> array(
		__( 'Under Title', 'sobari_sc' ) => '',
		__( 'Above Title', 'sobari_sc' ) => 'uk-flex-first',
	)
);
$param['params'][] = array(
	'type'		 => 'param_group',
	'heading'	 => __( 'Buttons', 'sobari_sc' ),
	'param_name' => 'buttons',
	'group'		 => __( 'Buttons', 'sobari_sc' ),
	'params'	 => array(
		array(
			'type'			=> 'attach_image',
			'heading'		=> __( 'Hover Background Image', 'sobari_sc' ),
			'param_name'	=> 'hover_bg_image',
			'description'	=> __( 'Add an optional image background when hovering button', 'sobari_sc' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> __( 'Button Text', 'sobari_sc' ),
			'param_name'	=> 'button_text',
			'std'			=> '',
		),
		array(
			'type'			=> 'de_link',
			'heading'		=> __( 'Link URL', 'sobari_sc' ),
			'param_name'	=> 'button_link',
			'description'	=> __( 'Enter or pick a link, an image or a video file', 'sobari_sc' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> __( 'Link Title', 'sobari_sc' ),
			'param_name'	=> 'button_title',
			'description'	=> __( 'Enter an optional text for the attribute of the link which will appear on hover', 'sobari_sc' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Link Target', 'sobari_sc' ),
			'param_name'	=> 'banner_button_target',
			'value'			=> array(
				__( 'Same Window', 'sobari_sc' ) => '_self',
				__( 'New Window', 'sobari_sc' )	 => '_blank',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_attr__( 'Button Type', 'upsob_sc' ),
			'param_name'	=> "buttton_type",
			'description'	=> esc_attr__( 'Select button Type', 'upsob_sc' ),
			'value'			=> array(
				esc_attr__( 'Default', 'upsob_sc' )		=> 'uk-button-default',
				esc_attr__( 'Primary', 'upsob_sc' )		=> 'uk-button-primary',
				esc_attr__( 'Secondary', 'upsob_sc' )	=> 'uk-button-secondary',
				esc_attr__( 'Danger', 'upsob_sc' )		=> 'uk-button-danger',
				esc_attr__( 'Text', 'upsob_sc' )		=> 'uk-button-text',
				esc_attr__( 'Link', 'upsob_sc' )		=> 'uk-button-link',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_attr__( 'Button Size', 'upsob_sc' ),
			'param_name'	=> "button_size",
			'description'	=> esc_attr__( 'Select button size', 'upsob_sc' ),
			'value'			=> array(
				esc_attr__( 'Default', 'upsob_sc' )		=> '',
				esc_attr__( 'Small', 'upsob_sc' )		=> 'uk-button-small',
				esc_attr__( 'Large', 'upsob_sc' )		=> 'uk-button-large',
			),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> __( 'Use Icon?', 'sobari_sc' ),
			'param_name'	=> 'use_icon',
			'description'	=> __( 'Do you want to use icon?', 'sobari_sc' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_attr__( 'Icon Alignment', 'sobari_sc' ),
			'param_name'	=> 'icon_alignment',
			'value'			=> array(
				__( 'Right', 'sobari_sc' )	=> '',
				__( 'Left', 'sobari_sc' )	=> 'uk-flex-first',
			),
			'dependency'	=> array(
				'element'	=> 'use_icon',
				'not_empty'	=> true
			),
			'description'	=> esc_attr__( 'Select icon alignment', 'sobari_sc' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Icon library', 'sobari_sc' ),
			'value'			=> array(
				__( 'Font Awesome', 'sobari_sc' )	=> 'fontawesome',
				__( 'Open Iconic', 'sobari_sc' )	=> 'openiconic',
				__( 'Typicons', 'sobari_sc' )		=> 'typicons',
				__( 'Entypo', 'sobari_sc' )			=> 'entypo',
				__( 'Linecons', 'sobari_sc' )		=> 'linecons',
				__( 'Mono Social', 'sobari_sc' )	=> 'monosocial',
				__( 'Material', 'sobari_sc' )		=> 'material',
				__( 'Beauty Salon', 'sobari_sc' )	=> 'beautysalon',
				__( 'Salon', 'sobari_sc' )			=> 'salon',
				__( 'Grooming', 'sobari_sc' )		=> 'grooming',
				__( 'Tattoo Studio', 'sobari_sc' )	=> 'tattoostudio',
				__( 'Barbershop', 'sobari_sc' )		=> 'barbershop',
			),
			'param_name'	=> 'type',
			'description'	=> __( 'Select icon library', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'use_icon',
				'not_empty'	=> true
			)
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_barbershop',
			'settings' 			=> array(
				'emptyIcon' 	=> true,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'barbershop',
				'source'		=> dahz_shortcodes_helper()->get_font( 'barbershop' )
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'barbershop',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_salon',
			'settings' 			=> array(
				'emptyIcon' 	=> true,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'salon',
				'source'		=> dahz_shortcodes_helper()->get_font( 'salon' )
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'salon',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_beautysalon',
			'settings' 			=> array(
				'emptyIcon' 	=> true,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'beautysalon',
				'source'		=> dahz_shortcodes_helper()->get_font( 'beauty-salon' )
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'beautysalon',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_grooming',
			'settings' 			=> array(
				'emptyIcon' 	=> true,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'grooming',
				'source'		=> dahz_shortcodes_helper()->get_font( 'grooming' )
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'grooming',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_tattoostudio',
			'settings' 			=> array(
				'emptyIcon' 	=> true,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'tattoostudio',
				'source'		=> dahz_shortcodes_helper()->get_font( 'tattoo-studio' )
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'tattoostudio',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_fontawesome',
			'value'			=> 'fa fa-adjust',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'fontawesome',
			),
			'description'	=> __( 'Select icon from library', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_openiconic',
			'value'			=> 'vc-oi vc-oi-dial',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'type'		=> 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'openiconic',
			),
			'description'	=> __( 'Select icon from library', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_typicons',
			'value'			=> 'typcn typcn-adjust-brightness',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'type'		=> 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'typicons',
			),
			'description'	=> __( 'Select icon from library', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_entypo',
			'value'			=> 'entypo-icon entypo-icon-note',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'type'		=> 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'entypo',
			),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_linecons',
			'value'			=> 'vc_li vc_li-heart',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'type'		=> 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'linecons',
			),
			'description'	=> __( 'Select icon from library', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_monosocial',
			'value'			=> 'vc-mono vc-mono-fivehundredpx',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'type'		=> 'monosocial',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'monosocial',
			),
			'description'	=> __( 'Select icon from library', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> __( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_material',
			'value'			=> 'vc-material vc-material-cake',
			// default value to backend editor admin_label
			'settings'		=> array(
				'emptyIcon'	=> false,
				// default true, display an "EMPTY" icon?
				'type'		=> 'material',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'material',
			),
			'description'	=> __( 'Select icon from library', 'sobari_sc' ),
		),
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Mobile Min Height', 'sobari_sc' ),
	'param_name'	=> 'mobile_min_height',
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Custom Title Responsive', 'sobari_sc' ),
	'param_name'	=> 'enable_custom_title_responsive',
	'group'			=> __( 'Settings', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'title_responsive_size',
	'param_name'	=> 'custom_title_responsive_size',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_custom_title_responsive',
		'not_empty'	=> true,
	)
);

return $param;
