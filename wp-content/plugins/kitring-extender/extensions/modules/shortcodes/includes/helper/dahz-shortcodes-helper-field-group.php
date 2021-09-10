<?php
$field_group = array();

$field_group['button'] = array();

$field_group['css_animation'] = array();

$field_group['dahz_lazy_shortcode'] = array(
	array(
		'type'			=> 'checkbox',
		'heading'		=> esc_attr__( 'Enable Lazyload', 'sobari_sc' ),
		'param_name'	=> 'enable_dahz_lazy_shortcode',
		'value'			=> array( 'Yes'	=> 'true' ),
		'description'	=> esc_attr__( 'enable lazyload for better performance', 'sobari_sc' ),
	)
);

$field_group['icon'] = array(
	array(
		'type'			=> 'checkbox',
		'heading'		=> esc_attr__( 'Use Icon?', 'sobari_sc' ),
		'param_name'	=> 'is_use_icon',
		'value'			=> array( 'Yes, please'	=> 'true', ),
		'description'	=> esc_attr__( 'Do you want to use icon?', 'sobari_sc' ),
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
			__( 'Tattoo Studio', 'sobari_sc' )		=> 'tattoostudio',
		),
		'dependency'	=> array(
			'element'	=> 'is_use_icon',
			'value'			=> 'true',
		),
		'param_name'	=> 'icon_type',
		'description'	=> __( 'Select icon library.', 'sobari_sc' ),
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
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_fontawesome',
		'value'			=> 'fa fa-info-circle',
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'fontawesome',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_openiconic',
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'openiconic',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'openiconic',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_typicons',
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'typicons',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'typicons',
		),
		'description' => __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_entypo',
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'entypo',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'entypo',
		),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_linecons',
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'linecons',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'linecons',
		),
		'description' => __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_pixelicons',
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'pixelicons',
			'source' => $pixel_icons,
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'pixelicons',
		),
		'description' => __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> __( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_monosocial',
		'value'			=> 'vc-mono vc-mono-fivehundredpx',
		// default value to backend editor admin_label
		'settings'		=> array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'monosocial',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency'	=> array(
			'element'	=> 'icon_type',
			'value'			=> 'monosocial',
		),
		'description' => __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_attr__( 'Icon Position', 'sobari_sc' ),
		'param_name'	=> 'icon_position',
		'value'			=> array(
			'Left'		=> 'left',
			'Right'		=> 'right',
		),
		'dependency'	=> array(
			'element'	=> 'is_use_icon',
			'value'			=> 'true',
		),
	)
);

$field_group['button'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Button Label', 'sobari_sc' ),
	'param_name'	=> 'button_label',
	'std'			=> 'Button',
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Style', 'sobari_sc' ),
	'param_name'	=> 'button_style',
	'value'			=> array(
		'Fill'		=> 'fill',
		'Outline'	=> 'outline',
		'Text'		=> 'text'
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);

$field_group['button'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Button Color', 'sobari_sc' ),
	'param_name'	=> 'button_color',
	'std'			=> '#000',
	'dependency'	=> array(
		'element'	=> 'button_style',
		'value'			=> 'fill',
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Button Hover Color', 'sobari_sc' ),
	'param_name'	=> 'button_hover_color',
	'std'			=> '#999',
	'dependency'	=> array(
		'element'	=> 'button_style',
		'value'			=> 'fill',
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Outline Color', 'sobari_sc' ),
	'param_name'	=> 'button_outline_color',
	'std'			=> '#000',
	'dependency'	=> array(
		'element'	=> 'button_style',
		'value'			=> 'outline',
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Outline Hover Color', 'sobari_sc' ),
	'param_name'	=> 'button_outline_hover_color',
	'std'			=> '#000',
	'dependency'	=> array(
		'element'	=> 'button_style',
		'value'			=> 'outline',
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Label Color', 'sobari_sc' ),
	'param_name'	=> 'button_label_color',
	'std'			=> '#fff',
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Label Hover Color', 'sobari_sc' ),
	'param_name'	=> 'button_label_hover_color',
	'std'			=> '#fff',
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Label Size', 'sobari_sc' ),
	'param_name'	=> 'button_size',
	'std'			=> '12px',
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Border Radius', 'sobari_sc' ),
	'param_name'	=> 'button_border_radius',
	'std'			=> '0',
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Fullwidth', 'sobari_sc' ),
	'param_name'	=> 'button_is_fullwidth',
	'value'			=> array( 'Yes, please'	=> 'true', ),
	'std'			=> 'true',
	'dependency'	=> array(
		'element'	=> 'button_style',
		'value'			=> array( 'fill', 'outline' ),
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);
$field_group['button'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Button Position', 'sobari_sc' ),
	'param_name'	=> 'button_alignment',
	'value'			=> array(
		'Left'		=> 'left',
		'Right'		=> 'right',
		'Center'	=> 'center',
	),
	'group'			=> __( 'Button Options', 'sobari_sc' ),
);

$button_icon = $field_group['icon'];

foreach( $button_icon as $key => $icon ) {
	$button_icon[$key]['param_name'] = 'button_' . $button_icon[$key]['param_name'];

	$button_icon[$key]['group'] = __( 'Button Options', 'sobari_sc' );
	if ( isset( $button_icon[$key]['dependency']['element'] ) ) {
		$button_icon[$key]['dependency']['element'] = 'button_' . $button_icon[$key]['dependency']['element'];
	}
}

$field_group['button'] = array_merge( $field_group['button'], $button_icon );

$field_group['css_animation'][] = array(
	'type'			=> 'animation_style',
	'heading'		=> esc_attr__( 'Css Animation', 'sobari_sc' ),
	'param_name'	=> 'css_animation',
	'description'	=> esc_attr__( 'Css Animation', 'sobari_sc' ),
	'value'			=> array(
		'Inline'	=> 'inline',
		'Left'		=> 'left',
		'Right'		=> 'right',
		'Center'	=> 'center',
	)
);
$field_group['content'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Padding', 'sobari_sc' ),
	'param_name'	=> 'content_padding',
	'description'	=> esc_attr__( 'Padding : Top Right Bottom Left', 'sobari_sc' ),
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Title', 'sobari_sc' ),
	'param_name'	=> 'content_title',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Title Tag Name', 'sobari_sc' ),
	'param_name'	=> 'content_title_tag_name',
	'value'			=> $field_option['tag'],
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Title Size', 'sobari_sc' ),
	'param_name'	=> 'content_title_size',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Title Line Height', 'sobari_sc' ),
	'param_name'	=> 'content_title_line_height',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Title Color', 'sobari_sc' ),
	'param_name'	=> 'content_title_color',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'textarea_html',
	'heading'		=> esc_attr__( 'Content', 'sobari_sc' ),
	'param_name'	=> 'content',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Content Margin Bottom', 'sobari_sc' ),
	'param_name'	=> 'content_margin_bottom',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['content'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Content Color', 'sobari_sc' ),
	'param_name'	=> 'content_color',
	'group'			=> __( 'Content', 'sobari_sc' ),
);
$field_group['font'] = array(
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Use theme default font family?', 'sobari_sc' ),
		'param_name'	=> 'use_theme_fonts',
		'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
		'description'	=> __( 'Use font family from theme customizer.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'google_fonts',
		'param_name'	=> 'google_fonts',
		'value'			=> 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'settings'		=> array(
			'fields'	=> array(
				'font_family_description'	=> __( 'Select font family.', 'sobari_sc' ),
				'font_style_description'	=> __( 'Select font styling.', 'sobari_sc' ),
			),
		),
		'dependency'	=> array(
			'element'				=> 'use_theme_fonts',
			'value_not_equal_to'	=> 'true',
		)
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Font Size', 'sobari_sc' ),
		'param_name'	=> 'font_size',
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Line Height', 'sobari_sc' ),
		'param_name'	=> 'line_height',
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Letter Spacing', 'sobari_sc' ),
		'param_name'	=> 'letter_spacing',
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Font Style', 'sobari_sc' ),
		'param_name'	=> 'font_style',
		'value'			=> array(
			'Normal'	=> 'normal',
			'Italic'	=> 'italic'
		)
	)
);

return $field_group;
