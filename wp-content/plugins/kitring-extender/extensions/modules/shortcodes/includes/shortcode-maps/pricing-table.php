<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Pricing Table', 'sobari_sc' ),
	'base'				=> 'pricing_table',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Your pricing table information', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-pricing-table.svg",
	'params'			=> array()
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Title', 'sobari_sc' ),
	'param_name'	=> 'title',
	'std'			=> 'Family Law',
	'description'	=> esc_attr__( 'type table title', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Subitle', 'sobari_sc' ),
	'param_name'	=> 'subtitle',
	'std'			=> 'We can help you',
	'description'	=> esc_attr__( 'type table subtitle', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'				=> 'textfield',
	'heading'			=> esc_attr__( 'Currency Symbol', 'sobari_sc' ),
	'param_name'		=> 'currency_symbol',
	'std'				=> '$',
	'description'		=> esc_attr__( 'type currency symbol', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'				=> 'textfield',
	'heading'			=> esc_attr__( 'Price', 'sobari_sc' ),
	'param_name'		=> 'price',
	'description'		=> esc_attr__( 'Type price', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Recurring Fee', 'sobari_sc' ),
	'param_name'	=> 'recurring_fee',
	'std'			=> 'Per month',
	'description'	=> esc_attr__( 'Type recurring fee', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Description', 'sobari_sc' ),
	'param_name'	=> 'description',
	'std'			=> 'Lorem ipsum dolor si amet',
	'description'	=> esc_attr__( 'Select label alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Use icon?', 'sobari_sc' ),
	'param_name'	=> 'is_icon',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Type', 'sobari_sc' ),
	'param_name'	=> 'icon_or_image',
	'value'			=> array(
		__( 'Icon', 'upsob_sc' )	=> 'icon',
		__( 'Image', 'upsob_sc' )	=> 'image',
	),
	'dependency'	=> array(
		'element'	=> 'is_icon',
		'not_empty'	=> true
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
	'dependency'	=> array(
		'element'	=> 'icon_or_image',
		'value'		=> 'icon'
	),
	'description'	=> esc_attr__( 'Select icon library', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image as icon', 'sobari_sc' ),
	'param_name'	=> 'icon_image',
	'dependency'	=> array(
		'element'	=> 'icon_or_image',
		'value'		=> 'image'
	),
	'description'	=> esc_attr__( 'set image.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'iconpicker',
	'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
	'param_name'	=> 'icon_salon',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> false,
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
	'param_name'	=> 'icon_beautysalon',
	'value' 			=> 'fa fa-adjust',
	'settings' 			=> array(
		'emptyIcon' 	=> false,
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
		'emptyIcon' 	=> false,
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
		'emptyIcon' 	=> false,
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
		'element'	=> 'icon_or_image',
		'value'		=> 'icon'
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
	'param_name'	=> 'icon_color',
	'dependency'	=> array(
		'element'	=> 'icon_or_image',
		'value'		=> 'icon'
	),
);

$param['params'][] = array(
	'type'			=> 'param_group',
	'heading'		=> esc_attr__( 'Labels', 'sobari_sc' ),
	'param_name'	=> 'labels',
	'group'			=> __( 'Contents', 'sobari_sc' ),
	'value'			=> urlencode( json_encode( array(
					array(
						'type'			=> 'check-mark',
						'icon_color'	=> '#726240'
					),
					array(
						'type'			=> 'check-mark',
						'icon_color'	=> '#726240'
					),
					array(
						'type'			=> 'x-mark',
						'icon_color'	=> '#726240'
					),
					array(
						'type'			=> 'x-mark',
						'icon_color'	=> '#726240'
					),
	))),
	'params' => array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_attr__( 'Type', 'sobari_sc' ),
			'param_name'	=> 'type',
			'value'			=> array(
				__( 'Text with icon', 'sobari_sc' ) => 'text_icon',
				__( 'Only text', 'sobari_sc' ) 		=> 'text',
				__( 'Only icon', 'sobari_sc' ) 		=> 'icon',
				__( 'Check mark', 'sobari_sc' ) 	=> 'check-mark',
				__( 'X mark', 'sobari_sc' ) 		=> 'x-mark',
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Label', 'sobari_sc' ),
			'param_name'	=> 'label',
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array( 'text_icon', 'text' )
			),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_attr__( 'Set as disabled label?', 'sobari_sc' ),
			'param_name'	=> 'disabled_label',
			'value' 		=> array( __( 'Yes', 'js_composer' ) => 'yes' ),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array( 'text_icon', 'text' )
			),
		),
		array(
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
				__( 'Beauty Salon', 'sobari_sc' )		=> 'beautysalon',
				__( 'Salon', 'sobari_sc' )		=> 'salon',
				__( 'Grooming', 'sobari_sc' )		=> 'grooming',
				__( 'Tattoo Studio', 'sobari_sc' )		=> 'tattoostudio',
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array( 'text_icon', 'icon' )
			),
			'description'	=> esc_attr__( 'Select icon library', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_salon',
			'value' 			=> 'fa fa-adjust',
			'settings' 			=> array(
				'emptyIcon' 	=> false,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'salon',
				'source'		=> dahz_shortcodes_helper()->get_font( 'salon' )
			),
			'dependency'	=> array(
				'element'	=> 'icon_type',
				'value'		=> 'salon',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_beautysalon',
			'value' 			=> 'fa fa-adjust',
			'settings' 			=> array(
				'emptyIcon' 	=> false,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'beautysalon',
				'source'		=> dahz_shortcodes_helper()->get_font( 'beauty-salon' )
			),
			'dependency'	=> array(
				'element'	=> 'icon_type',
				'value'		=> 'beautysalon',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_grooming',
			'value' 			=> 'fa fa-adjust',
			'settings' 			=> array(
				'emptyIcon' 	=> false,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'grooming',
				'source'		=> dahz_shortcodes_helper()->get_font( 'grooming' )
			),
			'dependency'	=> array(
				'element'	=> 'icon_type',
				'value'		=> 'grooming',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
			'param_name'	=> 'icon_tattoostudio',
			'value' 			=> 'fa fa-adjust',
			'settings' 			=> array(
				'emptyIcon' 	=> false,
				'iconsPerPage' 	=> 4000,
				'type'			=> 'tattoostudio',
				'source'		=> dahz_shortcodes_helper()->get_font( 'tattoo-studio' )
			),
			'dependency'	=> array(
				'element'	=> 'icon_type',
				'value'		=> 'tattoostudio',
			),
			'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
		),
		array(
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
		),
		array(
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
		),
		array(
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
		),
		array(
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
		),
		array(
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
		),
		array(
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
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
			'param_name'	=> 'icon_color',
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array( 'text_icon', 'icon', 'check-mark', 'x-mark' )
			),
		)
	),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Text', 'sobari_sc' ),
	'param_name'	=> 'button_text',
	'std'			=> 'Buy Now',
	'group'			=> __( 'Button', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'de_link',
	'heading'		=> esc_attr__( 'Link URL', 'sobari_sc' ),
	'param_name'	=> 'button_link',
	'description'	=> esc_attr__( 'Enter or pick a link, an image or a video file', 'sobari_sc' ),
	'group'			=> __( 'Button', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Link Title', 'sobari_sc' ),
	'param_name'	=> 'button_title',
	'std'			=> 'buy now',
	'group'			=> __( 'Button', 'sobari_sc' ),
	'description'	=> esc_attr__( 'Enter an optional text for the attribute of the link which will appear on hover', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Link Target', 'sobari_sc' ),
	'param_name'	=> 'button_target',
	'group'			=> __( 'Button', 'sobari_sc' ),
	'std'			=> '_self',
	'value'			=> array(
		__( 'Same Window', 'sobari_sc' ) => '_self',
		__( 'New Window', 'sobari_sc' ) => '_blank',
		__( 'Scroll', 'sobari_sc' ) => 'scroll',
	)
);

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Style', 'sobari_sc' ),
	// 'param_name'	=> 'button_style',
	// 'group'			=> __( 'Button', 'sobari_sc' ),
	// 'std'			=> 'de-btn--boxed de-btn--fill',
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
	// 'group'			=> __( 'Button', 'sobari_sc' ),
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
	// 'group'			=> __( 'Button', 'sobari_sc' ),
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
	// 'group'			=> __( 'Button', 'sobari_sc' ),
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	// 'group'			=> __( 'Button', 'sobari_sc' ),
	// 'param_name'	=> 'text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'colorpicker',
	// 'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	// 'group'			=> __( 'Button', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_color',
	// 'edit_field_class'	=> 'vc_col-sm-6',
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Button Text Style', 'sobari_sc' ),
	// 'param_name'	=> 'hover_text_style',
	// 'group'			=> __( 'Button', 'sobari_sc' ),
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
	// 'group'			=> __( 'Button', 'sobari_sc' ),
	// 'std'			=> '0',
	// 'dependency'	=> array(
		// 'element'	=> 'button_style',
		// 'value'		=> array( 'de-btn--boxed de-btn--fill', 'de-btn--boxed de-btn--outline' ),
	// ),
// );

// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'heading'		=> esc_attr__( 'Size', 'sobari_sc' ),
	// 'param_name'	=> 'size',
	// 'group'			=> __( 'Button', 'sobari_sc' ),
	// 'std'			=> '',
	// 'value'			=> array(
		// __( 'Default', 'sobari_sc' ) => '',
		// __( 'Small', 'sobari_sc' ) => 'de-btn--small',
		// __( 'Large', 'sobari_sc' ) => 'de-btn--large',
	// ),
	// 'description'	=> esc_attr__( 'Select button display size', 'sobari_sc' ),
// );
dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button( 'button', __( 'Button', 'sobari_sc' ) ) );
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Title Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'title_tag',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'h2',
	'value'			=> array(
		__( 'H1', 'upsob_sc' )	=> 'h1',
		__( 'H2', 'upsob_sc' )	=> 'h2',
		__( 'H3', 'upsob_sc' )	=> 'h3',
		__( 'H4', 'upsob_sc' )	=> 'h4',
		__( 'H5', 'upsob_sc' )	=> 'h5',
		__( 'H6', 'upsob_sc' )	=> 'h6',
	)
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Title Color', 'sobari_sc' ),
	'param_name'	=> 'title_color',
	'std'			=> '#0e0e0e',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Title Font Size', 'sobari_sc' ),
	'param_name'	=> 'title_font_size',
	'std'			=> '25px',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Title Line Height', 'sobari_sc' ),
	'param_name'	=> 'title_line_height',
	'std'			=> '1.25em',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Use theme default font family?', 'sobari_sc' ),
	'param_name'	=> 'use_theme_fonts',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'yes' ),
	'std'			=> 'yes',
	'description'	=> __( 'Use font family from theme customizer.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'google_fonts',
	'param_name'	=> 'google_fonts',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'value'			=> 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
	'settings'		=> array(
		'fields'	=> array(
			'font_family_description'	=> __( 'Select font family.', 'sobari_sc' ),
			'font_style_description'	=> __( 'Select font styling.', 'sobari_sc' ),
		),
	),
	'dependency' => array(
		'element' => 'use_theme_fonts',
		'value_not_equal_to' => 'yes',
	),
);
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Subtitle Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'subtitle_tag',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'h6',
	'value'			=> array(
		__( 'H1', 'upsob_sc' )	=> 'h1',
		__( 'H2', 'upsob_sc' )	=> 'h2',
		__( 'H3', 'upsob_sc' )	=> 'h3',
		__( 'H4', 'upsob_sc' )	=> 'h4',
		__( 'H5', 'upsob_sc' )	=> 'h5',
		__( 'H6', 'upsob_sc' )	=> 'h6',
		__( 'p', 'upsob_sc' )	=> 'p',
	)
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Subtitle Custom Font Size', 'sobari_sc' ),
	'param_name'	=> 'subtitle_custom_font_size',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Subtitle Color', 'sobari_sc' ),
	'param_name'	=> 'subtitle_color',
	'std'			=> '#977a3e',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Enable Badge', 'sobari_sc' ),
	'param_name'	=> 'enable_badge',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Badge Text', 'sobari_sc' ),
	'param_name'	=> 'badge_text',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_badge',
		'not_empty'	=> true,
	)
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Badge Text Color', 'sobari_sc' ),
	'param_name'	=> 'badge_text_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_badge',
		'not_empty'	=> true,
	)
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Badge Text Background Color', 'sobari_sc' ),
	'param_name'	=> 'badge_text_bg_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_badge',
		'not_empty'	=> true,
	)
);

$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Price Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'price_tag',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'h1',
	'value'			=> array(
		__( 'H1', 'upsob_sc' )	=> 'h1',
		__( 'H2', 'upsob_sc' )	=> 'h2',
		__( 'H3', 'upsob_sc' )	=> 'h3',
		__( 'H4', 'upsob_sc' )	=> 'h4',
		__( 'H5', 'upsob_sc' )	=> 'h5',
		__( 'H6', 'upsob_sc' )	=> 'h6',
	)
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Price Color', 'sobari_sc' ),
	'param_name'	=> 'price_color',
	'std'			=> '#0e0e0e',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Price Font Size', 'sobari_sc' ),
	'param_name'	=> 'price_font_size',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'			=> '54px',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Price Line Height', 'sobari_sc' ),
	'param_name'	=> 'price_line_height',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'			=> '1.25em',
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Use theme default font family?', 'sobari_sc' ),
	'param_name'	=> 'price_use_theme_fonts',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'std'			=> 'yes',
	'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'yes' ),
	'description'	=> __( 'Use font family from theme customizer.', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'google_fonts',
	'param_name'	=> 'price_google_fonts',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'value'			=> 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
	'settings'		=> array(
		'fields'	=> array(
			'font_family_description'	=> __( 'Select font family.', 'sobari_sc' ),
			'font_style_description'	=> __( 'Select font styling.', 'sobari_sc' ),
		),
	),
	'dependency' => array(
		'element' => 'price_use_theme_fonts',
		'value_not_equal_to' => 'yes',
	),
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Recurring fee Font Size', 'sobari_sc' ),
	'param_name'	=> 'recurring_fee_font_size',
	'std'			=> '17px',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Recurring fee Color', 'sobari_sc' ),
	'param_name'	=> 'recurring_fee_color',
	'std'			=> '#977a3e',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Recurring Fee Border Color', 'sobari_sc' ),
	'param_name'	=> 'recurring_fee_border_color',
	'std'			=> '#977a3e',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Description Font Size', 'sobari_sc' ),
	'param_name'	=> 'description_font_size',
	'std'			=> '16px',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Description Color', 'sobari_sc' ),
	'param_name'	=> 'description_color',
	'std'			=> '#545454',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Content Font Size', 'sobari_sc' ),
	'param_name'	=> 'content_font_size',
	'std'			=> '16px',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Content Color', 'sobari_sc' ),
	'param_name'	=> 'content_color',
	'std'			=> '#545454',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Disabled Content Color', 'sobari_sc' ),
	'param_name'	=> 'disabled_content_color',
	'std'			=> '#c1c1c1',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);


$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Divider Color', 'sobari_sc' ),
	'param_name'	=> 'divider_color',
	'std'			=> '#dcdcdc',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'background_color',
	'std'			=> '#ffffff',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Outer Border Width', 'sobari_sc' ),
	'std'			=> '2px',
	'param_name'	=> 'outer_border_width',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Border Color', 'sobari_sc' ),
	'param_name'	=> 'table_border_color',
	'std'			=> '#dcdcdc',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-xlarge',
	),
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'hover_box_shadow',
	'std'			=> 'uk-box-shadow-hover-medium',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-hover-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-hover-xlarge',
	),
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
return $param;
