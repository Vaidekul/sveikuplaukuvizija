<?php

/**
* a
*/
$param = array(
	'name'				=> esc_attr__( 'Testimonials', 'sobari_sc' ),
	'base'				=> 'testimonials',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'An appealing testimonial slider', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-testimonial.svg",
	'params'			=> array(),
);
$param['params'][] = array(
	'type' 			=> 'radio_image',
	'heading' 		=> esc_attr__( 'Testimonials Slider Style', 'sobari_sc' ),
	'param_name' 	=> 'testimonial_style',
	'description' 	=> esc_attr__( 'Pick 1 style for testimonials', 'sobari_sc' ),
	'value'			=> array(
		'style-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_testimonial-style-1.svg",
		'style-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_testimonial-style-2.svg",
		'style-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_testimonial-style-3.svg",
		'style-4'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_testimonial-style-4.svg",
	)
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Quote Color', 'sobari_sc' ),
	'param_name' 	=> 'quote_color',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Border Color', 'sobari_sc' ),
	'param_name' 	=> 'border_color',
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-4' ),
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Background Color', 'sobari_sc' ),
	'param_name' 	=> 'background_color',
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Name Color', 'sobari_sc' ),
	'param_name' 	=> 'name_color',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Name Hover Color', 'sobari_sc' ),
	'param_name' 	=> 'name_hover_color',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Rating Color', 'sobari_sc' ),
	'param_name' 	=> 'rating_color',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Role Color', 'sobari_sc' ),
	'param_name' 	=> 'role_color',
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading' 		=> __( 'Inactive Color', 'sobari_sc' ),
	'param_name' 	=> 'inactive_color',
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
);


$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Desktop Landscape Column', 'sobari_sc' ),
    'param_name'	=> 'desktop_landscape_columns',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Tablet Landscape Column', 'sobari_sc' ),
    'param_name'	=> 'tablet_landscape_columns',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Phone Landscape Column', 'sobari_sc' ),
    'param_name'	=> 'phone_landscape_columns',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Phone Potrait Column', 'sobari_sc' ),
    'param_name'	=> 'phone_potrait_columns',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Column Gap (Gutter)', 'sobari_sc' ),
	'param_name'	=> 'column_gap',
	'value'			=> array(
		__( 'Default', 'sobari_sc' )               => '',
		__( 'Small', 'sobari_sc' )                 => 'uk-grid-small',
		__( 'Medium', 'sobari_sc' )                => 'uk-grid-medium',
		__( 'Large', 'sobari_sc' )                 => 'uk-grid-large',
		__( 'Collapse (No Gutter)', 'sobari_sc' )  => 'uk-grid-collapse',
	),
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
    'description'	=> esc_attr__( 'Select gap between column in row', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Slide Nav & Dot Nav Color Scheme', 'sobari_sc' ),
    'param_name'	=> 'slide_nav_color',
    'value'			=> array(
        __( 'Default', 'sobari_sc' ) => '',
        __( 'Light', 'sobari_sc' ) => 'uk-light',
        __( 'Dark', 'sobari_sc' ) => 'uk-dark',
    ),
    'description'	=> esc_attr__( 'Set the slide nav & dot nav color scheme', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Show Slide Nav', 'sobari_sc' ),
	'param_name'	=> 'is_show_slide_nav',
);
$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Slide Nav Position', 'sobari_sc' ),
    'param_name'	=> 'slide_nav_position',
    'value'			=> array(
        __( 'Inside', 'sobari_sc' ) 		=> '',
        __( 'Outside', 'sobari_sc' ) 		=> '-out',
        __( 'Top Left', 'sobari_sc' ) 		=> 'top-left',
        __( 'Top Right', 'sobari_sc' ) 		=> 'top-right',
        __( 'Center Left', 'sobari_sc' ) 	=> 'center-left',
        __( 'Center Right', 'sobari_sc' ) 	=> 'center-right',
        __( 'Bottom Left', 'sobari_sc' ) 	=> 'bottom-left',
        __( 'Bottom Center', 'sobari_sc' ) 	=> 'bottom-center',
        __( 'Bottom Right', 'sobari_sc' ) 	=> 'bottom-right',
    ),
    'dependency'	=> array(
        'element'	=> 'is_show_slide_nav',
        'value'		=> 'true',
    ),
    'description'	=> esc_attr__( 'Set Slide Nav position', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Show Slide Nav When Hover', 'sobari_sc' ),
    'param_name'	=> 'is_hover_show_slide_nav',
);

$param['params'][] = array(
    "type"          => "dropdown",
    "heading"       => __( "Slide Nav Breakpoint", "sobari" ),
    "param_name"    => "slide_nav_breakpoint",
    "value"         => array(
        'Always' 					=> '',
        'Small (Phone Landscape)'	=> '@s',
        'Medium (Tablet Landscape)'	=> '@m',
        'Large (Desktop)'			=> '@l',
        'X-Large (Large Screen)'	=> '@xl'
    ),
    'dependency'	=> array(
        'element'	=> 'is_show_slide_nav',
        'value'		=> 'true',
    ),
    'description'		=> esc_attr__( 'Only affects device widths of selected and larger', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Show Dot Nav', 'sobari_sc' ),
    'param_name'	=> 'is_show_dot_nav',
);

$param['params'][] = array(
    "type"          => "dropdown",
    "heading"       => __( "Dot Nav Position", "sobari" ),
    "param_name"    => "dot_nav_position",
	"value"         => array(
		__( 'Center', 'sobari_sc' ) => 'uk-flex-center',
		__( 'Left', 'sobari_sc' ) 	=> 'uk-flex-left',
		__( 'Right', 'sobari_sc' ) 	=> 'uk-flex-right'
    ),
    'dependency'	=> array(
        'element'	=> 'is_show_dot_nav',
        'value'		=> 'true',
    ),
    'description'		=> esc_attr__( 'Select Dot Nav Position', 'sobari_sc' ),
);

$param['params'][] = array(
    "type"          => "dropdown",
    "heading"       => __( "Dot Nav Breakpoint", "sobari" ),
    "param_name"    => "dot_nav_breakpoint",
    "value"         => array(
        'Always' 					=> '',
        'Small (Phone Landscape)'	=> '@s',
        'Medium (Tablet Landscape)'	=> '@m',
        'Large (Desktop)'			=> '@l',
        'X-Large (Large Screen)'	=> '@xl'
    ),
    'dependency'	=> array(
        'element'	=> 'is_show_dot_nav',
        'value'		=> 'true',
    ),
    'description'		=> esc_attr__( 'Only affects device widths of selected and larger', 'sobari_sc' ),
);

$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Autoplay Interval', 'sobari_sc' ),
	'param_name' => 'autoplay_interval',
	'value'		 => array(
		'None'               => '',
		'Default - ms 300'   => '300',
		'ms 100'             => '100',
		'ms 200'             => '200',
		'ms 400'             => '400',
		'ms 500'             => '500',
		'ms 600'             => '600',
		'ms 700'             => '700',
		'ms 800'             => '800',
		'ms 900'             => '900',
		'ms 1000'            => '1000',
		'ms 1100'            => '1100',
		'ms 1200'            => '1200',
		'ms 1300'            => '1300',
		'ms 1400'            => '1400',
		'ms 1500'            => '1500',
		'ms 1600'            => '1600',
		'ms 1700'            => '1700',
		'ms 1800'            => '1800',
		'ms 1900'            => '1900',
		'ms 2000'            => '2000'
	),
	'description'	=> esc_attr__( 'The delay between switching slides in autoplay mode', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Disable Infinite Scroll', 'sobari_sc' ),
    'param_name'	=> 'is_disable_infinite_scroll',
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Enable Slide in Sets', 'sobari_sc' ),
    'param_name'	=> 'is_enable_in_sets',
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3', 'style-4' ),
	),
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Center the Active Slide', 'sobari_sc' ),
    'param_name'	=> 'is_center_active_slide',
	'dependency'	=> array(
		'element'	=> 'testimonial_style',
		'value'		=> array( 'style-3','style-4' ),
	),
);

$param['params'][] = array(
	'type'			=> 'param_group',
	'heading'		=> esc_attr__( '', '' ),
	'param_name'	=> 'values',
	'description'	=> esc_attr__( 'Description Here', 'sobari_sc' ),
	'group'    		=> __( 'Content', 'sobari_sc' ),
	'params' => array(
		array(
			'type' => 'attach_image',
			'heading' => esc_attr__( 'Image', 'sobari_sc' ),
			'param_name' => 'image',
			'description' => esc_attr__( 'Description Here', 'sobari_sc' ),
			'admin_label' => true,
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_attr__( 'Name', 'sobari_sc' ),
			'param_name'	=> 'name',
			'description'	=> esc_attr__( 'Name', 'sobari_sc' ),
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_attr__( 'Role', 'sobari_sc' ),
			'param_name'	=> 'role',
			'description'	=> esc_attr__( 'Role', 'sobari_sc' ),
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_attr__( 'URL Link', 'sobari_sc' ),
			'param_name'	=> 'url_link',
			'description'	=> esc_attr__( 'URL Link', 'sobari_sc' ),
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_attr__( 'Quote Content', 'sobari_sc' ),
			'param_name'	=> 'quote_content',
			'description'	=> esc_attr__( 'Content', 'sobari_sc' ),
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_attr__( 'Stars Rating', 'sobari_sc' ),
			'param_name' 	=> 'stars_rating',
			'description' 	=> esc_attr__( 'Pick 1 style for testimonials', 'sobari_sc' ),
			'value'			=> array(
				'Hidden'    => 'hidden',
				'5 Stars'   => '5em',
				'4.5 Stars' => '4.5em',
				'4 Stars'   => '4em',
				'3.5 Stars' => '3.56em',
				'3 Stars'   => '3em',
				'2.5 Stars' => '2.54em',
				'2 Stars'   => '2em',
				'1.5 Stars' => '1.5em',
				'1 Stars'   => '1em'
			),
		),
	),
);

$param['params'][] = array(
	'type' 			=> 'checkbox',
	'heading' 		=> __( 'Custom Font Size', 'sobari_sc' ),
	'param_name' 	=> 'custom_font_size',
	'description' 	=> __( 'Enable custom font size each element', 'sobari_sc' ),
	'group'			=> __( 'Typography', 'sobari_sc' )
);

$param['params'][] = array(
	'type' 				=> 'dropdown',
	'heading' 			=> esc_attr__( 'Quote Inherit Font', 'sobari_sc' ),
	'param_name' 		=> 'quote_inherit_font',
	'description' 		=> esc_attr__( 'Please select if you would like your testimonial quote to inherit a font family', 'sobari_sc' ),
	'value'				=> array(
		'Primary Font'  => 'primary',
		'Secondary Font'=> 'secondary',
	),
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'textfield',
	'heading' => __( 'Quote Font Size', 'sobari_sc' ),
	'param_name' => 'quote_font_size',
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'textfield',
	'heading' => __( 'Quote Line Height', 'sobari_sc' ),
	'param_name' => 'quote_line_height',
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'textfield',
	'heading' => __( 'Quote Letter Spacing', 'sobari_sc' ),
	'param_name' => 'quote_letter_spacing',
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'textfield',
	'heading' => __( 'Name Font Size', 'sobari_sc' ),
	'param_name' => 'name_font_size',
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'textfield',
	'heading' => __( 'Role Font Size', 'sobari_sc' ),
	'param_name' => 'role_font_size',
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
$param['params'][] = array(
	'type' => 'textfield',
	'heading' => __( 'Rating Icon Size', 'sobari_sc' ),
	'param_name' => 'rating_icon_size',
	'dependency'	=> array(
		'element'	=> 'custom_font_size',
		'value'		=> 'true',
	),
	'group'			=> __( 'Typography', 'sobari_sc' )
);
return $param;
