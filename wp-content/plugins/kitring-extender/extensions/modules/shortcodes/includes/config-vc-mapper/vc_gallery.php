<?php
$param = array();
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
	'heading'		=> esc_attr__( 'Gallery Layout', 'sobari_sc' ),
	'param_name'	=> 'shortcode_style',
	'value'			=> array(
		'Grid'		=> 'uk-grid',
		'Slider'	=> 'uk-slider',
		'Masonry'	=> 'masonry'
	),
	'save_always'	=> true,
	'description'	=> esc_attr__( 'Select gallery layout', 'sobari_sc' ),
);

$param[] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Parallax?', 'sobari_sc' ),
	'param_name'	=> 'enable_parallax',
	'dependency'	=> array(
		'element'	=> 'shortcode_style',
		'value'		=> array( 'uk-grid', 'masonry' ),
	),
);

$param[] = array(
	'type'			=> 'slider',
	'param_name'	=> 'parallax_speed',
	'heading'		=> __( 'Parallax Speed', 'sobari_sc' ),
	'description'	=> __( 'Setting for parallax speed', 'sobari_sc' ),
	'std'			=> '0',
	'settings'		=> array(
		'min'		=> 0,
		'max'		=> 600,
		'step'		=> 10,
	),
	'dependency'	=> array(
		'element'	=> 'enable_parallax',
		'not_empty'	=> true,
	),
);

$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Grid Columns', 'sobari_sc' ),
	'param_name'	=> 'columns',
	'std'			=> '3',
	'value'			=> array(
		__( '1 columns', 'sobari_sc' )	=> '1',
		__( '2 columns', 'sobari_sc' )	=> '2',
		__( '3 columns', 'sobari_sc' )	=> '3',
		__( '4 columns', 'sobari_sc' )	=> '4',
		__( '5 columns', 'sobari_sc' )	=> '5',
		__( '6 columns', 'sobari_sc' )	=> '6',
	),
	'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Column Gap (Gutter)', 'sobari_sc' ),
	'param_name'	=> 'row_column_gap',
	'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	'description'	=> __( 'Select gap between product column', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'On Click', 'sobari_sc' ),
	'param_name'	=> 'on_click',
	'value'			=> array(
		__( 'Do Nothing', 'upsob_sc' )		=> '',
		__( 'Open Lightbox', 'upsob_sc' )	=> 'lightbox',
		__( 'Open Custom Link', 'upsob_sc' )=> 'custom_link',
	),
	'description'	=> __( 'wWhat to do when image is clicked?', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Media Hover Effect', 'sobari_sc' ),
	'param_name'	=> 'hover_effect',
	'std'			=> 'none',
	'value'			=> array(
		__( 'None', 'sobari_sc' )					=> 'none',
		__( 'Zoom', 'sobari_sc' )					=> 'zoom',
		__( 'Zoom Glare', 'sobari_sc' )				=> 'zoom-glare',
		__( 'Push', 'sobari_sc' )					=> 'push',
		__( 'Push Glare', 'sobari_sc' )				=> 'push-glare',
		__( 'Parallax Tilt', 'sobari_sc' )			=> 'parallax-tilt',
		__( 'Parallax Tilt Glare', 'sobari_sc' )	=> 'parallax-tilt-glare',
	),
	'description'	=> esc_attr__( 'Select hover effect', 'sobari_sc' ),
	'save_always'	=> true
);

$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Box Shadow', 'sobari_sc' ),
	'description'	=> __( 'Select gallery box shadow style', 'sobari_sc' ),
	'param_name'	=> 'image_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-xlarge',
	),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Hover Box Shadow', 'sobari_sc' ),
	'description'	=> __( 'Select gallery hover box shadow style', 'sobari_sc' ),
	'param_name'	=> 'image_hover_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-hover-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-hover-xlarge',
	),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Height', 'sobari_sc' ),
	'param_name'	=> 'height',
	'value'			=> array(
		__( 'Auto', 'sobari_sc' )	=> 'auto',
		__( 'Viewport', 'sobari_sc' )	=> 'viewport',
		__( 'Viewport (Minus 20%)', 'sobari_sc' )	=> 'viewport-minus-percent',
		__( 'Viewport (Minus the following section)', 'sobari_sc' )	=> 'viewport-minus-section'
	),
	'dependency'	=> array(
		'element'	=> 'shortcode_style',
		'value'		=> 'uk-slider'
	),
	'description'	=> esc_attr__( 'The height will adapt automatically based on its content. Alternatively, the height can adapt to the height of the viewport. Note: make sure no height is set in the section / row settings when using one of the option', 'sobari_sc' )

);
$param[] = array(
	'type'			=> 'slider',
	'heading'		=> esc_attr__( 'Min Height', 'sobari_sc' ),
	'param_name'	=> 'min_height',
	'settings'		=> array(
		'min'		=> 200,
		'max'		=> 800,
		'step'		=> 50
	),
	'dependency'	=> array(
		'element'	=> 'height',
		'value'		=> array( 'viewport', 'viewport-minus-percent', 'viewport-minus-section' )
	),
	'description'	=> esc_attr__( 'Set the minimum height. This is useful if the content is too large on small devices', 'sobari_sc' )
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Hover Type', 'sobari_sc' ),
	'param_name'	=> 'image_hover_style',
	'value'			=> array(
		__( 'None', 'sobari_sc' )									=> '',
		__( 'Style 1( icon only )', 'sobari_sc' )					=> 'style-1',
		__( 'Style 2( Centered title and caption )', 'sobari_sc' )	=> 'style-2',
		__( 'Style 3( title and caption with arrow )', 'sobari_sc' )=> 'style-3',
		__( 'Style 4( title and caption below )', 'sobari_sc' )		=> 'style-4',
	),
	'description'	=> esc_attr__( 'Select hover type', 'sobari_sc' ),
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover BG Color', 'sobari_sc' ),
	'param_name'	=> 'hover_bg_color',
	'edit_field_class'	=> 'vc_col-sm-6',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'not_empty'	=> true
	),
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	'param_name'	=> 'text_color',
	'edit_field_class'	=> 'vc_col-sm-6',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> array( 'style-2', 'style-3', 'style-4' )
	),
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
	'param_name'	=> 'icon_color',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> 'style-1'
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Overlay Color', 'sobari_sc' ),
	'param_name'	=> 'overlay_color',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> array( 'style-2', 'style-3' )
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Text Color', 'sobari_sc' ),
	'param_name'	=> 'hover_text_color',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> array( 'style-2', 'style-3' )
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Border Color', 'sobari_sc' ),
	'param_name'	=> 'border_color',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> array( 'style-2' )
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param[] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Arrow Color', 'sobari_sc' ),
	'param_name'	=> 'arrow_color',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> array( 'style-3' )
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param[] = array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Show Caption When Hover', 'sobari_sc' ),
	'param_name'	=> 'show_caption_when_hover',
	'dependency'	=> array(
		'element'	=> 'image_hover_style',
		'value'		=> array( 'style-2', 'style-3' )
	),
);
$param[] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Media Ratio', 'sobari_sc' ),
	'param_name'	=> 'media_ratio',
	'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
	'save_always'	=> true,
	'description'	=> __( 'Set the aspect ratio for the media', 'sobari_sc' ),
	'group'			=> __( 'Images', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'shortcode_style',
		'value'		=> array( 'uk-grid', 'uk-slider' )
	),
);
$param[] = array(
	'type'			=> 'param_group',
	'heading'		=> esc_attr__( 'Images', 'sobari_sc' ),
	'param_name'	=> 'images',
	'group'			=> __( 'Images', 'sobari_sc' ),
	'params' => array(
		array(
			'type'			=> 'attach_image',
			'heading'		=> esc_attr__( 'Image', 'sobari_sc' ),
			'description'	=> esc_attr__( 'Specify images from media library. Image title and caption are set via WordPress media library', 'sobari_sc' ),
			'param_name'	=> 'image',
		),
		// array(
			// 'type'			=> 'slider',
			// 'heading'		=> esc_attr__( 'Media Width', 'sobari_sc' ),
			// 'param_name'	=> 'media_width',
			// 'description'	=> esc_attr__( 'Setting for image width and height on worked if showcase style is masonry', 'sobari_sc' ),
			// 'settings'		=> array(
				// 'min'		=> 1,
				// 'max'		=> 6,
				// 'step'		=> 1
			// )
		// ),
		// array(
			// 'type'			=> 'slider',
			// 'heading'		=> esc_attr__( 'Media Height', 'sobari_sc' ),
			// 'param_name'	=> 'media_height',
			// 'description'	=> esc_attr__( 'Setting for image width and height on worked if showcase style is masonry', 'sobari_sc' ),
			// 'settings'		=> array(
				// 'min'		=> 1,
				// 'max'		=> 6,
				// 'step'		=> 1
			// )
		// ),
		array(
			'type'			=> 'attach_image',
			'heading'		=> esc_attr__( 'Image Hover', 'sobari_sc' ),
			'description'	=> esc_attr__( 'Select an optional image that appears on hover', 'sobari_sc' ),
			'param_name'	=> 'image_hover',
		),
		array(
			'type'			=> 'de_link',
			'heading'		=> esc_attr__( 'URL Link', 'sobari_sc' ),
			'param_name'	=> 'url_link',
			'description'	=> esc_attr__( 'URL link will be generated if the option is set as open custom link', 'sobari_sc' ),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_attr__( 'Open in new tab', 'sobari_sc' ),
			'param_name'	=> 'open_new_tab',
		),
	),
);
$column = array(
	__( '1 columns', 'sobari_sc' )	=> '1',
	__( '2 columns', 'sobari_sc' )	=> '2',
	__( '3 columns', 'sobari_sc' )	=> '3',
	__( '4 columns', 'sobari_sc' )	=> '4',
	__( '5 columns', 'sobari_sc' )	=> '5',
	__( '6 columns', 'sobari_sc' )	=> '6',
);
$param = array_merge( $param, array(
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Phone Potrait Column', 'sobari_sc' ),
		'param_name'	=> 'phone_potrait_column',
		'value'			=> $column,
		'save_always'	=> true,
		'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Phone Landscape Column', 'sobari_sc' ),
		'param_name'	=> 'phone_landscape_column',
		'value'			=> $column,
		'save_always'	=> true,
		'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Tablet Landscape Column', 'sobari_sc' ),
		'param_name'	=> 'tablet_landscape_column',
		'value'			=> $column,
		'save_always'	=> true,
		'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
	    'type'			=> 'dropdown',
	    'heading'		=> esc_attr__( 'Slide Nav & Dot Nav Color Scheme', 'sobari_sc' ),
	    'param_name'	=> 'slide_nav_color',
	    'value'			=> array(
	        __( 'Default', 'sobari_sc' ) => '',
	        __( 'Light', 'sobari_sc' ) => 'uk-light',
	        __( 'Dark', 'sobari_sc' ) => 'uk-dark',
	    ),
	    'description'	=> esc_attr__( 'Set the slide nav & dot nav color scheme', 'sobari_sc' ),
	    'group'         => esc_attr__( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Show Slide Nav', 'sobari_sc' ),
		'param_name'	=> 'show_slide_nav',
		'save_always'	=> true,
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'uk-slider'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Slide Nav Position', 'sobari_sc' ),
		'param_name'	=> 'slide_nav_position',
		'value'			=> array(
			__( 'Outside', 'sobari_sc' )	=> '-out',
			__( 'Inside', 'sobari_sc' )	=> '',
		),
		'save_always'	=> true,
		'description'	=> __( 'Set slide nav position', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'show_slide_nav',
			'not_empty'	=> true,
		),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Show Slide Nav When Hover', 'sobari_sc' ),
		'param_name'	=> 'show_slide_nav_when_hover',
		'save_always'	=> true,
		'dependency'	=> array(
			'element'	=> 'show_slide_nav',
			'not_empty'	=> true,
		),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Slide Nav Breakpoint', 'sobari_sc' ),
		'param_name'	=> 'slide_nav_breakpoint',
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'save_always'	=> true,
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'show_slide_nav',
			'not_empty'	=> true,
		),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Show Dot Nav', 'sobari_sc' ),
		'param_name'	=> 'show_dot_nav',
		'save_always'	=> true,
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'uk-slider'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Dot Nav Breakpoint', 'sobari_sc' ),
		'param_name'	=> 'dot_nav_breakpoint',
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'save_always'	=> true,
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'show_dot_nav',
			'not_empty'	=> true,
		),
		'group'			=> __( 'Settings', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Auto Play Interval', 'sobari_sc' ),
		'param_name'	=> 'auto_play_interval',
		'value'			=> dahz_shortcode_helper_get_field_option( 'autoplay_interval' ),
		'save_always'	=> true,
		'description'	=> __( 'The delay between switching slides in autoplay mode', 'sobari_sc' ),
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'uk-slider'
		)
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Infinite Scroll', 'sobari_sc' ),
		'param_name'	=> 'enable_infinite',
		'save_always'	=> true,
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'uk-slider'
		)
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Slide in Sets', 'sobari_sc' ),
		'param_name'	=> 'enable_slide',
		'save_always'	=> true,
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'uk-slider'
		)
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Center the Active Slide', 'sobari_sc' ),
		'param_name'	=> 'enable_center_active',
		'save_always'	=> true,
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'uk-slider'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Mobile Media Ratio', 'sobari_sc' ),
		'param_name'	=> 'mobile_media_ratio',
		'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
		'save_always'	=> true,
		'description'	=> __( 'Set the mobile media ratio', 'sobari_sc' ),
		'group'			=> __( 'Settings', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'shortcode_style',
			'value'		=> 'masonry'
		)
	)
), dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );
return $param;
