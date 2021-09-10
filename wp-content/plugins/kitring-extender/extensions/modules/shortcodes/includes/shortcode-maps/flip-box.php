<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Flip Box', 'sobari_sc' ),
	'base'				=> 'flip_box',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Add interactive flip box element', 'sobari_sc' ),
	'icon'              => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-flip-box.svg",
	'params'			=> array(),
);
$param['params'][] = array(
	'type'			=> 'textarea',
	'heading'		=> esc_attr__( 'Front Box Content', 'sobari_sc' ),
	'param_name'	=> 'fb_content',
	'description'	=> esc_attr__( 'The text that will display on the front of your flip box', 'sobari_sc' ),
	'std'			=> 'Front Box Content',
	'group' => __( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	'param_name'	=> 'fb_text_color',
	'std'			=> '#ffffff',
	'group' => __( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'          => 'attach_image',
	'heading'       => esc_attr__( 'Background Image', 'sobari_sc' ),
	'param_name'    => 'fb_bg_image',
	'group'         => __( 'Front Side', 'sobari_sc' ),
	'description'   => __( 'Select a background image from the media library', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'fb_bg_color',
	'std'			=> 'rgba(0,0,0,0.8)',
	'group'         => __( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' 			=> 'checkbox',
	'heading' 		=> esc_attr__( 'BG Color overlay on BG Image', 'sobari_sc' ),
	'param_name' 	=> 'fb_is_bg_overlay',
	'value'			=> "1",
	'group' 		=> __( 'Front Side', 'sobari_sc' ),
	'description' 	=> __( 'Checking this will overlay your BG color on your BG image', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Use Icon?', 'sobari_sc' ),
	'param_name'	=> 'fb_is_use_icon',
	'description'	=> esc_attr__( 'Do you want to use icon?', 'sobari_sc' ),
	'group'			=> __( 'Front Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Type', 'sobari_sc' ),
	'param_name'	=> 'icon_source',
	'value'			=> array(
		__( 'Icon', 'sobari_sc' ) => 'icon',
		__( 'Image', 'js_composer' ) => 'image'
	),
	'dependency'	=> array(
		'element'	=> 'fb_is_use_icon',
		'value'		=> 'true',
	),
	'group'			=> __( 'Front Side', 'sobari_sc' ),
	'description'	=> esc_attr__( 'Select icon library', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Images Upload', 'sobari_sc' ),
	'param_name'	=> 'icon_image',
	'description'	=> esc_attr__( 'Images Upload', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'image',
	),
	'group'			=> __( 'Front Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
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
	'param_name'	=> 'fb_icon_type',
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
	'description'	=> esc_attr__( 'Select icon library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_barbershop',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'barbershop',
		'source'		=> dahz_shortcodes_helper()->get_font( 'barbershop' )
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'barbershop',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_salon',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'salon',
		'source'		=> dahz_shortcodes_helper()->get_font( 'salon' )
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'salon',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_beautysalon',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'beautysalon',
		'source'		=> dahz_shortcodes_helper()->get_font( 'beauty-salon' )
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'beautysalon',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_grooming',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'grooming',
		'source'		=> dahz_shortcodes_helper()->get_font( 'grooming' )
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'grooming',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_tattoostudio',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'tattoostudio',
		'source'		=> dahz_shortcodes_helper()->get_font( 'tattoo-studio' )
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'tattoostudio',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_fontawesome',
	'value'			=> 'fa fa-info-circle',
		'settings'		=> array(
		'emptyIcon'	=> false,
		// default true, display an "EMPTY" icon?
		'iconsPerPage'	=> 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'fontawesome',
	),
	'description'	=> esc_attr__( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_openiconic',
	'settings'		=> array(
		'emptyIcon'	=> false,
		// default true, display an "EMPTY" icon?
		'type'		=> 'openiconic',
		'iconsPerPage'	=> 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'openiconic',
	),
	'description'	=> esc_attr__( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_typicons',
	'settings'		=> array(
		'emptyIcon'	=> false,
		// default true, display an "EMPTY" icon?
		'type'		=> 'typicons',
		'iconsPerPage'	=> 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'typicons',
	),
	'description'	=> esc_attr__( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_entypo',
	'settings'		=> array(
		'emptyIcon'	=> false,
		// default true, display an "EMPTY" icon?
		'type'		=> 'entypo',
		'iconsPerPage'	=> 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'entypo',
	),
	'description'	=> esc_attr__( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_linecons',
	'settings'		=> array(
		'emptyIcon'	=> false,
		// default true, display an "EMPTY" icon?
		'type'		=> 'linecons',
		'iconsPerPage'	=> 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'linecons',
	),
	'description'	=> esc_attr__( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_monosocial',
	'value'			=> 'vc-mono vc-mono-fivehundredpx',
	// default value to backend editor admin_label
	'settings'		=> array(
		'emptyIcon'	=> false,
		// default true, display an "EMPTY" icon?
		'type'		=> 'monosocial',
		'iconsPerPage'	=> 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'fb_icon_type',
		'value'		=> 'monosocial',
	),
	'description'	=> esc_attr__( 'Select icon from library.', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Front Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_color',
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
	'group' => esc_attr__( 'Front Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Gradient Icon', 'sobari_sc' ),
	'param_name'	=> 'enable_gradient_icon',
	'description'	=> esc_attr__( 'Gradient Icon', 'sobari_sc' ),
	'group'			=> __( 'Front Side', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
	'param_name'	=> 'gradient_direction',
	'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_gradient_icon',
		'not_empty'	=> true,
	),
	'group'			=> __( 'Front Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color 2', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_color_2',
	'group'         => __( 'Front Side', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_gradient_icon',
		'not_empty'	=> true,
	),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Icon Size', 'sobari_sc' ),
	'param_name'	=> 'fb_icon_size',
	'std'		=> '60',
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
	'description'	=> __( 'Please enter the size for your icon. Enter in number of pixels - Don`t enter "px", default is "60"', 'sobari_sc' ),
	'group' => esc_attr__( 'Front Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textarea_html',
	'heading'		=> esc_attr__( 'Back Box Content', 'sobari_sc' ),
	'param_name'	=> 'content',
	'description'	=> esc_attr__( 'The text that will display on the back of your flip box', 'sobari_sc' ),
	'std'			=> 'Back Box Content',
	'group' 		=> esc_attr__( 'Back Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	'param_name'	=> 'bb_text_color',
	'std'			=> '#ffffff',
	'group' => esc_attr__( 'Back Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'          => 'attach_image',
	'heading'       => esc_attr__( 'Background Image', 'sobari_sc' ),
	'param_name'    => 'bb_bg_image',
	'group'         => esc_attr__( 'Back Side', 'sobari_sc' ),
	'description'   => esc_attr__( 'Select a background image from the media library', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'bb_bg_color',
	'std'			=> 'rgba(99,99,99,0.8)',
	'group'         => esc_attr__( 'Back Side', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' 			=> 'checkbox',
	'heading' 		=> esc_attr__( 'BG Color overlay on BG Image', 'sobari_sc' ),
	'param_name' 	=> 'bb_is_bg_overlay',
	'value'			=> "1",
	'group' 		=> esc_attr__( 'Back Side', 'sobari_sc' ),
	'description' 	=> esc_attr__( 'Checking this will overlay your BG color on your BG image', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Button', 'sobari_sc' ),
	'param_name'	=> 'enable_button',
	'description'	=> esc_attr__( 'Display a button on back side', 'sobari_sc' ),
	'group'			=> __( 'Back Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'de_link',
	'heading'		=> esc_attr__( 'Button Link URL', 'sobari_sc' ),
	'param_name'	=> 'button_link_url',
	'description'	=> esc_attr__( 'Please enter the URL for your button link', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_button',
		'value'		=> 'true',
	),
	'group'			=> __( 'Back Side', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Text', 'sobari_sc' ),
	'param_name'	=> 'button_text',
	'description'	=> esc_attr__( 'Please enter the title for your button.', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_button',
		'value'		=> 'true',
	),
	'group'			=> __( 'Back Side', 'sobari_sc' ),
);

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Style', 'sobari_sc' ),
	// 'param_name'	=> 'button_style',
	// 'value'			=> array(
		// __( 'Fill', 'sobari_sc' ) => 'de-btn--boxed de-btn--fill',
		// __( 'Outline', 'sobari_sc' ) => 'de-btn--boxed de-btn--outline',
		// __( 'Text', 'sobari_sc' ) => 'de-btn--text',
	// ),
	// 'dependency'	=> array(
		// 'element'	=> 'enable_button',
		// 'value'		=> 'true',
	// ),
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	// 'param_name'	=> 'bg_color',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> 'de-btn--boxed de-btn--fill',
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Border Color', 'sobari_sc' ),
	// 'param_name'	=> 'border_color',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> 'de-btn--boxed de-btn--outline',
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Background Color', 'sobari_sc' ),
	// 'param_name'	=> 'hover_bg_color',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Button Text Color', 'sobari_sc' ),
	// 'param_name'	=> 'button_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'dependency'	=> array(
		// 'element'	=> 'enable_button',
		// 'value'		=> 'true',
	// ),
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'dependency'	=> array(
		// 'element'	=> 'enable_button',
		// 'value'		=> 'true',
	// ),
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Text Style', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_style',
	// 'value'			=> array(
		// __( 'Change Color', 'sobari_sc' ) => '',
		// __( 'Thin Underline', 'sobari_sc' ) => 'de-btn--underline-thin',
		// __( 'Thick Underline', 'sobari_sc' ) => 'de-btn--underline-thick',
	// ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> 'de-btn--text',
	// ),
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'textfield',
	// 'heading'		=> esc_attr__( 'Button Border Radius', 'sobari_sc' ),
	// 'param_name'	=> 'border_radius',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Size', 'sobari_sc' ),
	// 'param_name'	=> 'size',
	// 'value'			=> array(
		// __( 'Default', 'sobari_sc' ) => '',
		// __( 'Small', 'sobari_sc' ) => 'de-btn--small',
		// __( 'Large', 'sobari_sc' ) => 'de-btn--large',
	// ),
	// 'description'	=> esc_attr__( 'Select button display size', 'sobari_sc' ),
	// 'group'			=> __( 'Back Side', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'enable_button',
		// 'value'		=> 'true',
	// ),
// );

dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button( 'button', __( 'Back Side', 'sobari_sc' ) ) );

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Min Height ( for desktop )', 'sobari_sc' ),
	'param_name'	=> 'min_height',
	'std'		=> '300',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> 'Please enter the minimum height you would like for your box. Enter in number of pixels - Dont1t enter "px", default is 300',
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Min Height( for mobile )', 'sobari_sc' ),
	'param_name'	=> 'min_height_mobile',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'		=> '300',
	'description'	=> 'Please enter the minimum height you would like for your box. Enter in number of pixels - Dont1t enter "px", default is 300',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Horizontal Content Alignment', 'sobari_sc' ),
	'description'	=> esc_attr__( 'Horizontal alignment', 'sobari_sc' ),
	'param_name'	=> 'horizontal_alignment',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'			=> 'center',
	'value'			=> array(
		esc_attr__( 'Left', 'sobari_sc' )	 => 'left',
		esc_attr__( 'Center', 'sobari_sc' ) => 'center',
		esc_attr__( 'Right', 'sobari_sc' ) => 'right'
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Vertical Content Alignment', 'sobari_sc' ),
	'description'	=> esc_attr__( 'Vertical Alignment', 'sobari_sc' ),
	'param_name'	=> 'vertical_alignment',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'			=> 'center',
	'value'			=> array(
		esc_attr__( 'Top', 'sobari_sc' )	 => 'top',
		esc_attr__( 'Center', 'sobari_sc' ) => 'center',
		esc_attr__( 'Bottom', 'sobari_sc' ) => 'bottom'
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Flip Direction', 'sobari_sc' ),
	'description'	=> esc_attr__( 'Select flip direction when hover', 'sobari_sc' ),
	'param_name'	=> 'flip_direction',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'			=> 'horizontal_to_left',
	'value'			=> array(
		esc_attr__( 'Horizontal To Left', 'sobari_sc' )	 => 'horizontal_to_left',
		esc_attr__( 'Horizontal To Right', 'sobari_sc' ) => 'horizontal_to_right',
		esc_attr__( 'Vertical To Bottom', 'sobari_sc' ) => 'vertical_to_bottom',
		esc_attr__( 'Vertical To Top', 'sobari_sc' ) => 'vertical_to_top',
	),
);
return $param;
