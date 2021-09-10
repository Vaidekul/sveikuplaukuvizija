<?php

$param = array(
	'name'			=> __( 'Hotspot', 'sobari_sc' ),
	'base'			=> 'dahz_hotspot',
	'description'	=> __( 'Add hotspot on your image', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . 'assets/images/icon/df_element-icon-image-hotspot.svg',
	'params'		=> array(),
);

$param['params'][] = array(
	'type'			=> 'de_tagging',
	'param_name'	=> 'tagging_image',
	'heading'		=> '',
	'settings'		=> array(
		'control'	=> 'general',
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'action_type',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Tagging Text Mode', 'sobari_sc' ),
	'description'	=> __( 'Display tagging text when hover or click', 'sobari_sc' ),
	'value'			=> array(
		__( 'Click', 'sobari_sc' )	=> 'click',
		__( 'Hover', 'sobari_sc' )	=> 'hover',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'tagging_type',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Tagging Type', 'sobari_sc' ),
	'description'	=> __( 'Select product tagging type', 'sobari_sc' ),
	'value'			=> array(
		__( 'Number', 'sobari_sc' )		 => 'number',
		__( 'Icon +', 'sobari_sc' )		 => 'icon',
		__( 'Custom Icon', 'sobari_sc' ) => 'custom',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'icon_type',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Icon Library', 'sobari_sc' ),
	'description'	=> __( 'Select icon library', 'sobari_sc' ),
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
		'element'	=> 'tagging_type',
		'value'		=> 'custom',
	),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_barbershop',
	'settings' 			=> array(
		'emptyIcon' 	=> true,
		'type'			=> 'barbershop',
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'group'			=> __( 'Settings', 'sobari_sc' ),
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
	'param_name'	=> 'icon_size',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Icon Size', 'sobari_sc' ),
	'description'	=> __( 'Please enter the size for your icon. Enter number in pixel (default is 16)', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'tagging_type',
		'value'		=> 'custom',
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'icon_color',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Icon Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'icon_bg_color',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Background Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_pulse',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Disable Pulse Animation', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_animate',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Animate Tagging when Appear', 'sobari_sc' ),
);

return $param;
