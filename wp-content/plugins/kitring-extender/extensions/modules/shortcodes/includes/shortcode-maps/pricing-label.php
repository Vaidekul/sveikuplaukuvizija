<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Pricing Label', 'sobari_sc' ),
	'base'				=> 'pricing_label',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Labels for pricing table in current row', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-pricing-label.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Label Alignment', 'sobari_sc' ),
	'param_name'	=> 'alignment',
	'std'			=> 'uk-text-left',
	'value'			=> array(
		__( 'Left', 'sobari_sc' ) => 'uk-text-left',
		__( 'Center', 'sobari_sc' ) => 'uk-text-center',
		__( 'Right', 'sobari_sc' ) => 'uk-text-right',
	),
	'description'	=> esc_attr__( 'Select label alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Label Title', 'sobari_sc' ),
	'std'			=> 'Features',
	'param_name'	=> 'title',
	'description'	=> esc_attr__( 'Select label alignment', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'param_group',
	'heading'		=> esc_attr__( 'Labels', 'sobari_sc' ),
	'param_name'	=> 'labels',
	'group'			=> __( 'Contents', 'sobari_sc' ),
	'value'			=> urlencode( json_encode( array(
					array(
						'label'	=> 'Responsive',
					),
					array(
						'label'	=> 'Live Streaming',
					),
					array(
						'label'	=> 'Adaptive Bitrates',
					),
					array(
						'label'	=> 'Analytics',
					),
	) )	 ),
	'params' => array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Label', 'sobari_sc' ),
			'param_name'	=> 'label',
		)
	),
);
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Title Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'title_tag',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'h5',
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
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Title Font Size', 'sobari_sc' ),
	'param_name'	=> 'title_font_size',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Title Line Height', 'sobari_sc' ),
	'param_name'	=> 'title_line_height',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Use theme default font family?', 'sobari_sc' ),
	'param_name'	=> 'use_theme_fonts',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'yes' ),
	'std' 			=> 'yes',
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
	'heading'		=> __( 'Label Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'label_tag',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'p',
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
	'heading'		=> __( 'Label Custom Font Size', 'sobari_sc' ),
	'param_name'	=> 'label_custom_font_size',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6',
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Label Color', 'sobari_sc' ),
	'param_name'	=> 'label_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Border Color', 'sobari_sc' ),
	'param_name'	=> 'border_color',
	'std'			=> '#dcdcdc',
	'group'			=> __( 'Styling', 'sobari_sc' ),
);
return $param;
