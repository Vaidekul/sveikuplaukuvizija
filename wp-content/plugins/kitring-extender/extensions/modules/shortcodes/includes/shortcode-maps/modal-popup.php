<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Modal Popup', 'sobari_sc' ),
	'base'				=> 'modal_popup',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Create modal dialogs with different styles and transitions', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-modal-pop-up.svg",
	'params'			=> array(),
	'dahz_animated_on'	=> true
);

$param['params'][] = array(
	'type' 			=> 'radio_image',
	'heading' 		=> esc_attr__( 'Modal Style', 'sobari_sc' ),
	'param_name' 	=> 'modal_style',
	'description' 	=> esc_attr__( 'Select shortcode style', 'sobari_sc' ),
	'std'			=> '',
	'value'			=> array(
		''		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_modal-style-1.svg",
		'split_image'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_modal-style-2.svg",
	)
);

$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image', 'sobari_sc' ),
	'param_name'	=> 'image_split',
	'description'	=> esc_attr__( 'Select image from media library', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'modal_style',
		'value'		=> 'split_image',
	)
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Modal Title', 'sobari_sc' ),
	'param_name'	=> 'enable_text_heading',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Modal Title', 'sobari_sc' ),
	'param_name'	=> 'modal_heading',
	'description'	=> esc_attr__( 'Modal Title', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_text_heading',
		'value'		=> 'true',
	)
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Modal Title Color', 'sobari_sc' ),
	'param_name'	=> 'modal_heading_text_color',
	'dependency'	=> array(
		'element'	=> 'enable_text_heading',
		'value'		=> 'true',
	)
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Modal Border Color', 'sobari_sc' ),
	'param_name'	=> 'modal_border_color',
	'dependency'	=> array(
		'element'	=> 'enable_text_heading',
		'value'		=> 'true',
	)
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Full Modal', 'sobari_sc' ),
	'param_name'	=> 'is_full_modal',
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Modal Height', 'sobari_sc' ),
	'param_name'	=> 'modal_height',
	'description'	=> esc_attr__( 'This height option only works when the layout is not fullwidth (use px, % or vh)', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Overflow Auto', 'sobari_sc' ),
	'param_name'	=> 'is_auto_overflow',
	// 'dependency'	=> array(
	// 	'element'	=> 'is_full_modal',
	// 	'empty'		=> true,
	// )
);

$param['params'][] = array(
	'type'			=> 'textarea_html',
	'heading'		=> esc_attr__( 'Contents of Modal', 'sobari_sc' ),
	'param_name'	=> 'content',
	'description'	=> esc_attr__( 'Add your content to be displayed in modal', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'background_color',
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Modal Trigger', 'sobari_sc' ),
	'param_name'	=> 'trigger',
	'std'			=> 'buttons',
	'value'			=> array(
		'Button'	=> 'buttons',
		'Image'		=> 'image'
	),
	'description'	=> esc_attr__( 'Modal Trigger', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Text', 'sobari_sc' ),
	'param_name'	=> 'button_label',
	'std'			=> 'Modal Button',
	'group'			=> __( 'Button' , 'sobari_sc' )
);

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Style', 'sobari_sc' ),
	// 'param_name'	=> 'button_style',
	// 'std'			=> 'de-btn--boxed de-btn--fill',
	// 'value'			=> array(
		// __( 'Fill', 'sobari_sc' ) => 'de-btn--boxed de-btn--fill',
		// __( 'Outline', 'sobari_sc' ) => 'de-btn--boxed de-btn--outline',
		// __( 'Text', 'sobari_sc' ) => 'de-btn--text',
	// ),
	// 'group'			=> __( 'Button' , 'sobari_sc' )
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
	// 'group'			=> __( 'Button' , 'sobari_sc' )
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
	// 'group'			=> __( 'Button' , 'sobari_sc' )
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
	// 'group'			=> __( 'Button' , 'sobari_sc' )
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	// 'param_name'	=> 'text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'group'			=> __( 'Button' , 'sobari_sc' )
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
	// 'group'			=> __( 'Button' , 'sobari_sc' )
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
	// 'group'			=> __( 'Button' , 'sobari_sc' )
// );

// $param['params'][] = array(
	// 'type'			=> 'textfield',
	// 'heading'		=> esc_attr__( 'Button Border Radius', 'sobari_sc' ),
	// 'param_name'	=> 'border_radius',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
	// 'group'			=> __( 'Button' , 'sobari_sc' )
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Size', 'sobari_sc' ),
	// 'param_name'	=> 'size',
	// 'std'			=> '',
	// 'value'			=> array(
		// __( 'Default', 'sobari_sc' ) => '',
		// __( 'Small', 'sobari_sc' ) => 'de-btn--small',
		// __( 'Large', 'sobari_sc' ) => 'de-btn--large',
	// ),
	// 'description'	=> esc_attr__( 'Select button display size', 'sobari_sc' ),
	// 'group'			=> __( 'Button' , 'sobari_sc' )
// );

dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button( 'button', __( 'Button', 'sobari_sc' ) ) );

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Alignment', 'sobari_sc' ),
	'param_name'	=> 'alignment',
	'std'			=> 'uk-inline',
	'value'			=> array(
		__( 'Inline', 'sobari_sc' ) => 'uk-inline',
		__( 'Left', 'sobari_sc' ) => 'uk-text-left',
		__( 'Center', 'sobari_sc' ) => 'uk-text-center',
		__( 'Right', 'sobari_sc' ) => 'uk-text-right',
	),
	'description'	=> esc_attr__( 'Select button alignment', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Use Icon?', 'sobari_sc' ),
	'param_name'	=> 'is_icon',
	'description'	=> esc_attr__( 'Do you want to use icon?', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Alignment', 'sobari_sc' ),
	'param_name'	=> 'icon_alignment',
	'value'			=> array(
		__( 'Left', 'sobari_sc' ) => 'uk-flex-first',
		__( 'Right', 'sobari_sc' ) => '',
	),
	'dependency'	=> array(
		'element'	=> 'is_icon',
		'not_empty'	=> true
	),
	'description'	=> esc_attr__( 'Select icon alignment', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' ),
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
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
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Fullwidth Button?', 'sobari_sc' ),
	'param_name'	=> 'is_fullwidth',
	'description'	=> esc_attr__( 'Make 100% width button', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Gutter', 'sobari_sc' ),
	'param_name'	=> 'gutter',
	'std'			=> 'uk-margin-right',
	'value'			=> array(
		__( 'Default', 'sobari_sc' ) => 'uk-margin-right',
		__( 'Small', 'sobari_sc' ) => 'uk-margin-small-right',
		__( 'Medium', 'sobari_sc' ) => 'uk-margin-medium-right',
		__( 'Large', 'sobari_sc' ) => 'uk-margin-large-right',
		__( 'Collapse', 'sobari_sc' ) => '',
	),
	'description'	=> esc_attr__( 'Select gutter for multiple button', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'sobari_sc' ) => '',
		__( 'Small', 'sobari_sc' ) => 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' ) => 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' ) => 'uk-box-shadow-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-xlarge',
	),
	'description'	=> esc_attr__( 'Select box shadow style', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Add Extra Bottom Shadow', 'sobari_sc' ),
	'param_name'	=> 'is_extra_boxshadow',
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'hover_box_shadow',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'sobari_sc' ) => '',
		__( 'Small', 'sobari_sc' ) => 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' ) => 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' ) => 'uk-box-shadow-hover-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-hover-xlarge',
	),
	'description'	=> esc_attr__( 'Select box shadow hover style', 'sobari_sc' ),
	'group'			=> __( 'Button' , 'sobari_sc' )
);

$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image', 'sobari_sc' ),
	'param_name'	=> 'image',
	'description'	=> esc_attr__( 'Image', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'trigger',
		'value'		=> 'image',
	)
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Image Size', 'sobari_sc' ),
	'param_name'	=> 'image_size',
	'description'	=> esc_attr__( 'Image Size', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'trigger',
		'value'		=> 'image',
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Image Alignment', 'sobari_sc' ),
	'param_name'	=> 'image_alignment',
	'value'			=> array(
		'Left'		=> 'left',
		'Center'	=> 'center',
		'Right'		=> 'right'
	),
	'description'	=> esc_attr__( 'Image Alignment', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'trigger',
		'value'		=> 'image',
	)
);

$param['params'][] = array(
	"type" => "dropdown",
	"heading" => __( "CSS Animation", "sobari" ),
	"param_name" => "animation",
	"std"		=> 'uk-animation-fade',
	"value" => array(
		__( 'Fade', 'sobari_sc' ) 					=> 'uk-animation-fade',
		__( 'Scale up', 'sobari_sc' ) 				=> 'uk-animation-scale-up',
		__( 'Scale down', 'sobari_sc' ) 			=> 'uk-animation-scale-down',
		__( 'Slide top 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-top',
		__( 'Slide bottom 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-bottom',
		__( 'Slide left 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-left',
		__( 'Slide right 100%', 'sobari_sc' ) 		=> 'uk-animation-slide-right',
		__( 'Slide top small', 'sobari_sc' ) 		=> 'uk-animation-slide-top-small',
		__( 'Slide bottom small', 'sobari_sc' ) 	=> 'uk-animation-slide-bottom-small',
		__( 'Slide left small', 'sobari_sc' ) 		=> 'uk-animation-slide-left-small',
		__( 'Slide right small', 'sobari_sc' ) 		=> 'uk-animation-slide-right-small',
		__( 'Slide top medium', 'sobari_sc' ) 		=> 'uk-animation-slide-top-medium',
		__( 'Slide bottom medium', 'sobari_sc' ) 	=> 'uk-animation-slide-bottom-medium',
		__( 'Slide left medium', 'sobari_sc' ) 		=> 'uk-animation-slide-left-medium',
		__( 'Slide right medium', 'sobari_sc' ) 	=> 'uk-animation-slide-right-medium'
	),
);

return $param;
