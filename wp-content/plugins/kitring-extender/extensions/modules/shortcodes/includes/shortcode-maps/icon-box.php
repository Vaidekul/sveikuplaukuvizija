<?php

$param = array(
	'name'				=> esc_attr__( 'Icon Box', 'sobari_sc' ),
	'base'				=> 'icon_box',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Display icon box in styles', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-box-icon.svg",
	'params'			=> array(),
	'dahz_animated_on'	=> true
);
$param['params'][] = array(
	'type'			=> 'radio_image',
	'heading'		=> esc_attr__( 'Icon Box Style', 'sobari_sc' ),
	'param_name'	=> 'style',
	'description'	=> esc_attr__( 'Icon Box Style.', 'sobari_sc' ),
	'std'			=> 'style-1',
	'value'			=> array(
		'style-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_icon-box-style-1.svg",
		'style-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_icon-box-style-2.svg",
		'style-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_icon-box-style-3.svg"
	)
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Type', 'sobari_sc' ),
	'param_name'	=> 'icon_source',
	'value'			=> array(
		__( 'Icon', 'sobari_sc' ) => 'icon',
		__( 'Image', 'js_composer' ) => 'image'
	),
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
	'description'	=> esc_attr__( 'Select icon library', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
);
$param['params'][] = array(
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
	'description'	=> esc_attr__( 'Please enter the size for your icon. Enter number in pixel (default is 22)', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
	'param_name'	=> 'icon_color',
	'edit_field_class'	=> 'vc_col-sm-6',
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Hover Color', 'sobari_sc' ),
	'param_name'	=> 'icon_hover_color',
	'edit_field_class'	=> 'vc_col-sm-6',
	'dependency'	=> array(
		'element'	=> 'icon_source',
		'value'		=> 'icon',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Background Hover Color', 'sobari_sc' ),
	'param_name'	=> 'icon_bg_hover_color',
	'edit_field_class'	=> 'vc_col-sm-6',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> array( 'style-2', 'style-3' ),
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Border Color', 'sobari_sc' ),
	'param_name'	=> 'icon_border_color',
	'edit_field_class'	=> 'vc_col-sm-6',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> array( 'style-2', 'style-3' ),
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Border Radius', 'sobari_sc' ),
	'param_name'	=> 'icon_border_radius',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'style-2',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Border Width', 'sobari_sc' ),
	'param_name'	=> 'icon_border_width',
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> array( 'style-2', 'style-3' ),
	),
	'value'			=> array(
		__( '1px', 'sobari_sc' ) => '1px',
		__( '2px', 'sobari_sc' ) => '2px',
		__( '3px', 'sobari_sc' ) => '3px',
		__( '4px', 'sobari_sc' ) => '4px',
		__( '5px', 'sobari_sc' ) => '5px',
		__( '6px', 'sobari_sc' ) => '6px',
		__( '7px', 'sobari_sc' ) => '7px',
		__( '8px', 'sobari_sc' ) => '8px',
		__( '9px', 'sobari_sc' ) => '9px',
		__( '10px', 'sobari_sc' ) => '10px',
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Box Alignment', 'sobari_sc' ),
	'param_name'	=> 'alignment',
	'value'			=> array(
		__( 'Left', 'sobari_sc' ) => 'uk-text-left',
		__( 'Center', 'sobari_sc' ) => 'uk-text-center',
		__( 'Right', 'sobari_sc' ) => 'uk-text-right',
	),
	'description'	=> esc_attr__( 'Select button alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'title', 'sobari_sc' ),
	'param_name'	=> 'title',

	'description'	=> esc_attr__( 'Please enter title.', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Title Element Tag', 'sobari_sc' ),
	'param_name'	=> 'title_tag',
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'value'			=> array(
		__( 'H1', 'upsob_sc' )	=> 'h1',
		__( 'H2', 'upsob_sc' )	=> 'h2',
		__( 'H3', 'upsob_sc' )	=> 'h3',
		__( 'H4', 'upsob_sc' )	=> 'h4',
		__( 'H5', 'upsob_sc' )	=> 'h5',
		__( 'H6', 'upsob_sc' )	=> 'h6',
	)
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'title color', 'sobari_sc' ),
	'param_name'	=> 'title_color',
	'description'	=> esc_attr__( 'Please enter title color.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Description', 'sobari_sc' ),
	'param_name'	=> 'description',
	'description'	=> esc_attr__( 'Please enter description.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Description color', 'sobari_sc' ),
	'param_name'	=> 'description_color',
	'description'	=> esc_attr__( 'Please set description color.', 'sobari_sc' ),
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
	'param_name'	=> 'button_target',
	'value'			=> array(
		__( 'Same Window', 'sobari_sc' ) => '_self',
		__( 'New Window', 'sobari_sc' ) => '_blank',
		__( 'Scroll', 'sobari_sc' ) => 'scroll',
	)
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	'param_name'	=> 'button_text_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	'param_name'	=> 'button_hover_text_color',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Text Style', 'sobari_sc' ),
	'param_name'	=> 'button_text_style',
	'value'			=> array(
		__( 'Change Color', 'sobari_sc' ) => '',
		__( 'Thin Underline', 'sobari_sc' ) => 'de-btn--underline-thin',
		__( 'Thick Underline', 'sobari_sc' ) => 'de-btn--underline-thick',
	),
);

return $param;
