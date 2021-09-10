<?php
$param = array();

$column = array(
	__( '1 columns', 'sobari_sc' )		=> '1-1',
	__( '2 columns', 'sobari_sc' )		=> '1-2',
	__( '3 columns', 'sobari_sc' )		=> '1-3',
	__( '4 columns', 'sobari_sc' )		=> '1-4',
	__( '5 columns', 'sobari_sc' )		=> '1-5',
	__( '6 columns', 'sobari_sc' )		=> '1-6',
	__( '5/6 columns', 'sobari_sc' )	=> '5-6',
	__( '4/5 columns', 'sobari_sc' )	=> '4-5',
	__( '3/5 columns', 'sobari_sc' )	=> '3-5',
);

$param[] = 	array(
	'type' 			=> 'el_id',
	'param_name' 	=> 'dahz_id',
	'settings' 		=> array(
		'auto_generate' => true,
	),
	'save_always'	=> true,
	'edit_field_class'=> 'hidden',
	'heading' 		=> __( 'Section ID', 'js_composer' ),
	'description' 	=> __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
);

$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Desktop Columns', 'sobari_sc' ),
	'param_name'	=> 'columns',
	'std'			=> '3',
	'value'			=> $column,
	'description'	=> esc_attr__( 'How much column grid', 'sobari_sc' ),

);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Tablet Landscape Column', 'sobari_sc' ),
	'param_name'	=> 'tablet_landscape_column',
	'std'			=> '2',
	'value'			=> $column,
	'save_always'	=> true,
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Phone Landscape Column', 'sobari_sc' ),
	'param_name'	=> 'phone_landscape_column',
	'std'			=> '1',
	'value'			=> $column,
	'save_always'	=> true,
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Phone Potrait Column', 'sobari_sc' ),
	'param_name'	=> 'phone_potrait_column',
	'std'			=> '1',
	'value'			=> $column,
	'save_always'	=> true,
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Column Gap (Gutter)', 'sobari_sc' ),
	'param_name'	=> 'row_column_gap',
	'std'			=> '',
	'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	'description'	=> __( 'Select gap between product column', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Display Divider Between Grid', 'sobari_sc' ),
	'param_name'	=> 'row_display_divider_between',
	'value'			=> true,
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> __( 'Divider Color', 'sobari_sc' ),
	'param_name'	=> 'row_divider_color',
	'value'			=> true,
	'dependency'	=> array(
		'element'	=> 'row_display_divider_between',
		'not_empty'	=> true,
	)
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Height', 'sobari_sc' ),
	'param_name'	=> 'height',
	'std'			=> '',
	'value'			=> array(
		__( 'Auto', 'sobari_sc' )										=> '',
		__( 'Viewport', 'sobari_sc' )									=> 'viewport',
		__( 'Viewport ( minus 20% )', 'sobari_sc' )						=> 'viewport-20',
		__( 'Viewport ( minus the following section )', 'sobari_sc' )	=> 'viewport-bottom',
		
	),
	'description'	=> esc_attr__( 'How much column grid', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'slider',
	'heading'		=> esc_attr__( 'Min Height', 'sobari_sc' ),
	'param_name'	=> 'min_height',
	'std'			=> 200,
	'settings'		=> array(
		'min'		=> 200,
		'step'		=> 50,
		'max'		=> 800
	),
	'dependency'	=> array(
		'element'	=> 'height',
		'not_empty'	=> true,
	),
	'description'	=> esc_attr__( 'How much column grid', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Slide Nav & Dot Nav Color Scheme', 'sobari_sc' ),
	'param_name'	=> 'nav_color_scheme',
	'std'			=> '',
	'value'			=> array(
		__( 'default', 'sobari_sc' )	=> '',
		__( 'Light', 'sobari_sc' )		=> 'uk-light',
		__( 'Dark', 'sobari_sc' )		=> 'uk-dark',
		
	),
	'description'	=> esc_attr__( 'How much column grid', 'sobari_sc' ),
);
$param = array_merge( $param, array(
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Show Slide Nav', 'sobari_sc' ),
		'param_name'	=> 'show_slide_nav',
		'save_always'	=> true,
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Slide Nav Position', 'sobari_sc' ),
		'param_name'	=> 'slide_nav_position',
		'std'			=> '',
		'value'			=> array(
			__( 'Outside', 'sobari_sc' )	=> '-out',
			__( 'Inside', 'sobari_sc' )	=> '',
		),
		'save_always'	=> true,
		'description'	=> __( 'Set slide nav position', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Show Slide Nav When Hover', 'sobari_sc' ),
		'param_name'	=> 'show_slide_nav_when_hover',
		'save_always'	=> true,
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Slide Nav Breakpoint', 'sobari_sc' ),
		'param_name'	=> 'slide_nav_breakpoint',
		'std'			=> '',
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'save_always'	=> true,
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Show Dot Nav', 'sobari_sc' ),
		'param_name'	=> 'show_dot_nav',
		'save_always'	=> true,
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Dot Nav Breakpoint', 'sobari_sc' ),
		'param_name'	=> 'dot_nav_breakpoint',
		'std'			=> '',
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'save_always'	=> true,
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Auto Play Interval', 'sobari_sc' ),
		'param_name'	=> 'auto_play_interval',
		'std'			=> '',
		'value'			=> dahz_shortcode_helper_get_field_option( 'autoplay_interval' ),
		'save_always'	=> true,
		'description'	=> __( 'The delay between switching slides in autoplay mode', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Infinite Scroll', 'sobari_sc' ),
		'param_name'	=> 'enable_infinite',
		'save_always'	=> true,
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Slide in Sets', 'sobari_sc' ),
		'param_name'	=> 'enable_slide',
		'save_always'	=> true,
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Center the Active Slide', 'sobari_sc' ),
		'param_name'	=> 'enable_center_active',
		'save_always'	=> true,
	),
), dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );
return $param;

