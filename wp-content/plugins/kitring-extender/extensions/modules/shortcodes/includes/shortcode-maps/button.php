<?php

$param = array(
	'name'				=> esc_attr__( 'Button', 'sobari_sc' ),
	'base'				=> 'button',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Easily create nice looking buttons, which come in different styles', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-button.svg",
	'params'			=> array(),
	'dahz_animated_on'	=> true
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Text', 'sobari_sc' ),
	'param_name'	=> 'button_text',
	'std'			=> __( 'Button', 'sobari_sc' ),
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
	'param_name'	=> 'button_target',
	'value'			=> array(
		__( 'Same Window', 'sobari_sc' ) => '_self',
		__( 'New Window', 'sobari_sc' ) => '_blank',
		__( 'Lightbox', 'sobari_sc' ) => 'lightbox',
		__( 'Scroll', 'sobari_sc' ) => 'scroll',
	)
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
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	// 'param_name'	=> 'text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
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
// );

// $param['params'][] = array(
	// 'type'			=> 'textfield',
	// 'heading'		=> esc_attr__( 'Button Border Radius', 'sobari_sc' ),
	// 'param_name'	=> 'border_radius',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
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
// );
dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button() );

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Alignment', 'sobari_sc' ),
	'param_name'	=> 'alignment',
	'value'			=> array(
		__( 'Inline', 'sobari_sc' ) => 'uk-inline',
		__( 'Left', 'sobari_sc' ) => 'uk-text-left',
		__( 'Center', 'sobari_sc' ) => 'uk-text-center',
		__( 'Right', 'sobari_sc' ) => 'uk-text-right',
	),
	'description'	=> esc_attr__( 'Select button alignment', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Use Icon?', 'sobari_sc' ),
	'param_name'	=> 'is_icon',
	'description'	=> esc_attr__( 'Do you want to use icon?', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Alignment', 'sobari_sc' ),
	'param_name'	=> 'icon_alignment',
	'value'			=> array(
		__( 'Right', 'sobari_sc' ) 	=> '',
		__( 'Left', 'sobari_sc' ) 	=> 'uk-flex-first',
	),
	'dependency'	=> array(
		'element'	=> 'is_icon',
		'not_empty'	=> true
	),
	'description'	=> esc_attr__( 'Select icon alignment', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Library', 'sobari_sc' ),
	'param_name'	=> 'icon_type',
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
	'dependency'	=> array(
		'element'	=> 'is_icon',
		'not_empty'	=> true
	),
	'description'	=> esc_attr__( 'Select icon library', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_barbershop',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'type'			=> 'barbershop',
		'iconsPerPage' 	=> 4000,
		'source'		=> dahz_shortcodes_helper()->get_font( 'barbershop' )
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'barbershop',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_salon',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'salon',
		'source'		=> dahz_shortcodes_helper()->get_font( 'salon' )
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'salon',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_beautysalon',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'beautysalon',
		'source'		=> dahz_shortcodes_helper()->get_font( 'beauty-salon' )
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'beautysalon',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_grooming',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'grooming',
		'source'		=> dahz_shortcodes_helper()->get_font( 'grooming' )
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'grooming',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_tattoostudio',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'iconsPerPage' 	=> 4000,
		'type'			=> 'tattoostudio',
		'source'		=> dahz_shortcodes_helper()->get_font( 'tattoo-studio' )
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'tattoostudio',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_fontawesome',
	'value' => 'fa fa-adjust',
	'settings' => array(
		'emptyIcon' => false,
		'iconsPerPage' => 4000,
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'fontawesome',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_linecons',
	'value' => 'vc_li vc_li-heart',
	// default value to backend editor admin_label
	'settings' => array(
		'emptyIcon' => false,
		// default true, display an "EMPTY" icon?
		'type' => 'linecons',
		'iconsPerPage' => 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'linecons',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_openiconic',
	'value' => 'vc-oi vc-oi-dial',
	// default value to backend editor admin_label
	'settings' => array(
		'emptyIcon' => false,
		// default true, display an "EMPTY" icon?
		'type' => 'openiconic',
		'iconsPerPage' => 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'openiconic',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_typicons',
	'value' => 'typcn typcn-adjust-brightness',
	// default value to backend editor admin_label
	'settings' => array(
		'emptyIcon' => false,
		// default true, display an "EMPTY" icon?
		'type' => 'typicons',
		'iconsPerPage' => 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'typicons',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_monosocial',
	'value' => 'vc-mono vc-mono-fivehundredpx',
	// default value to backend editor admin_label
	'settings' => array(
		'emptyIcon' => false,
		// default true, display an "EMPTY" icon?
		'type' => 'monosocial',
		'iconsPerPage' => 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'monosocial',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_entypo',
	'value' => 'entypo-icon entypo-icon-note',
	// default value to backend editor admin_label
	'settings' => array(
		'emptyIcon' => false,
		// default true, display an "EMPTY" icon?
		'type' => 'entypo',
		'iconsPerPage' => 4000,
		// default 100, how many icons per/page to display
	),
	'dependency'	=> array(
		'element'	=> 'icon_type',
		'value'		=> 'entypo',
	),
	'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Icon Size', 'sobari_sc' ),
	'param_name'	=> 'icon_size',
	'dependency'	=> array(
		'element'	=> 'is_icon',
		'not_empty'	=> true
	),
	'description'	=> esc_attr__( 'Please enter the size for your icon. Enter number in pixel (default is 22)', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Fullwidth Button?', 'sobari_sc' ),
	'param_name'	=> 'is_fullwidth',
	'description'	=> esc_attr__( 'Make 100% width button', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Gutter', 'sobari_sc' ),
	'param_name'	=> 'gutter',
	'value'			=> array(
		__( 'Collapse', 'sobari_sc' ) => '',
		__( 'Default', 'sobari_sc' ) => 'uk-margin-right',
		__( 'Small', 'sobari_sc' ) => 'uk-margin-small-right',
		__( 'Medium', 'sobari_sc' ) => 'uk-margin-medium-right',
		__( 'Large', 'sobari_sc' ) => 'uk-margin-large-right',
	),
	'description'	=> esc_attr__( 'Select gutter for multiple button', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' ) => '',
		__( 'Small', 'sobari_sc' ) => 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' ) => 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' ) => 'uk-box-shadow-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-xlarge',
	),
	'description'	=> esc_attr__( 'Select box shadow style', 'sobari_sc' ),
	'group'			=> 'Setting',
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Add Extra Bottom Shadow', 'sobari_sc' ),
	'param_name'	=> 'is_extra_boxshadow',
	'group'			=> 'Setting',
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'hover_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' ) => '',
		__( 'Small', 'sobari_sc' ) => 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' ) => 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' ) => 'uk-box-shadow-hover-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-hover-xlarge',
	),
	'description'	=> esc_attr__( 'Select box shadow hover style', 'sobari_sc' ),
	'group'			=> 'Setting',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Lightbox Width', 'sobari_sc' ),
	'param_name'	=> 'lightbox_width',
	'description'	=> esc_attr__( 'Set the width and height for lightbox content', 'sobari_sc' ),
	'group'			=> 'Setting',
	'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Lightbox Height', 'sobari_sc' ),
	'param_name'	=> 'lightbox_height',
	'description'	=> esc_attr__( 'I.e. image, video or iframe', 'sobari_sc' ),
	'group'			=> 'Setting',
	'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Margin Top', 'sobari_sc' ),
	'param_name'	=> 'margin_top',
	'group'			=> 'Setting',
	'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Margin Right', 'sobari_sc' ),
	'param_name'	=> 'margin_right',
	'group'			=> 'Setting',
	'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Margin Bottom', 'sobari_sc' ),
	'param_name'	=> 'margin_bottom',
	'group'			=> 'Setting',
	'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Margin Left', 'sobari_sc' ),
	'param_name'	=> 'margin_left',
	'group'			=> 'Setting',
	'edit_field_class'	=> 'vc_col-sm-6',
);
return $param;
