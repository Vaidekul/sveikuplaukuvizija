<?php
$tabs = array(
	array(
		'type' 			=> 'el_id',
		'param_name' 	=> 'dahz_id',
		'settings' 		=> array(
			'auto_generate' => true,
		),
		'save_always'	=> true,
		'edit_field_class'=> 'hidden',
		'heading' 		=> __( 'Section ID', 'js_composer' ),
		'description' 	=> __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Tab Navigation', 'js_composer' ),
		'param_name' => 'tab_navigation',
		'value' => array(
			__( 'Tabs', 'js_composer' ) => 'tabs',
			__( 'Subnav', 'js_composer' ) => 'subnav',
			__( 'Subnav Pill', 'js_composer' ) => 'subnavpill',
			__( 'Thumbnav', 'js_composer' ) => 'thumbnav',
		),
		'description' => __( 'Select text source.', 'js_composer' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Thumbnav Width', 'js_composer' ),
		'param_name' => 'thumbnav_width',
		'edit_field_class'	=> 'vc_col-sm-6',
		'description' => __( 'Set thumbnav width.', 'js_composer' ),
		'dependency'	=> array(
			'element'	=> 'tab_navigation',
			'value'		=> 'thumbnav'
		)
	),
	array(
		'type' 				=> 'textfield',
		'heading' 			=> __( 'Thumbnav Height', 'js_composer' ),
		'param_name' 		=> 'thumbnav_height',
		'edit_field_class'	=> 'vc_col-sm-6',
		'description' 		=> __( 'Set thumbnav height.', 'js_composer' ),
		'dependency'		=> array(
			'element'		=> 'tab_navigation',
			'value'			=> 'thumbnav'
		)
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> __( 'Position', 'js_composer' ),
		'param_name' 	=> 'position',
		'value' 		=> array(
			__( 'Top', 'js_composer' ) 		=> 'uk-tab-top',
			__( 'Bottom', 'js_composer' ) 	=> 'uk-tab-bottom',
			__( 'Left', 'js_composer' ) 	=> 'uk-tab-left',
			__( 'Right', 'js_composer' ) 	=> 'uk-tab-right',
		),
		'description' => __( 'Select tab position.', 'js_composer' ),
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> __( 'Alignment', 'js_composer' ),
		'param_name' 	=> 'alignment',
		'value' 		=> array(
			__( 'Left', 'js_composer' ) 	=> '',
			__( 'Center', 'js_composer' ) 	=> 'uk-flex-center',
			__( 'Right', 'js_composer' ) 	=> 'uk-flex-right',
		),
		'description' => __( 'Select tab position.', 'js_composer' ),
		'dependency'		=> array(
			'element'		=> 'position',
			'value'			=> array( 'uk-tab-top', 'uk-tab-bottom' )
		)
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> __( 'Margin', 'js_composer' ),
		'param_name' 	=> 'tab_margin',
		'value' 		=> array(
			__( 'default', 'js_composer' ) 		=> 'uk-margin',
			__( 'Small', 'js_composer' ) 		=> 'uk-margin-small',
			__( 'Medium', 'js_composer' ) 		=> 'uk-margin-medium',
			__( 'Large', 'js_composer' ) 		=> 'uk-margin-large',
		),
		'description' 		=> __( 'Select Margin between tab and content.', 'js_composer' ),
		'dependency'		=> array(
			'element'		=> 'position',
			'value'			=> array( 'uk-tab-top', 'uk-tab-bottom' )
		)
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> __( 'Grid Width', 'js_composer' ),
		'param_name' 	=> 'width',
		'value' 		=> array(
			__( 'Auto', 'js_composer' ) 		=> 'uk-width-auto',
			__( '50%', 'js_composer' ) 			=> 'uk-width-1-2',
			__( '33%', 'js_composer' ) 			=> 'uk-width-1-3',
			__( '25%', 'js_composer' ) 			=> 'uk-width-1-4',
			__( '20%', 'js_composer' ) 			=> 'uk-width-1-5',
			__( 'Small', 'js_composer' ) 		=> 'uk-width-small',
			__( 'Medium', 'js_composer' ) 		=> 'uk-width-medium',
			__( 'Large', 'js_composer' ) 		=> 'uk-width-large',
		),
		'description' 		=> __( 'Select tab width.', 'js_composer' ),
		'dependency'		=> array(
			'element'		=> 'position',
			'value'			=> array( 'uk-tab-left', 'uk-tab-right' )
		)
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> __( 'Grid Breakpoint', 'js_composer' ),
		'param_name' 	=> 'breakpoint',
		'value' 		=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'description' 		=> __( 'Select tab width breakpoint.', 'js_composer' ),
		'dependency'		=> array(
			'element'		=> 'position',
			'value'			=> array( 'uk-tab-left', 'uk-tab-right' )
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Grid Gutter', 'sobari_sc' ),
		'param_name'	=> 'tab_grid_gutter',
		'description'	=> __( 'Select gap between column in row', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
		'dependency'		=> array(
			'element'		=> 'position',
			'value'			=> array( 'uk-tab-left', 'uk-tab-right' )
		)
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> __( 'Center Vertical Alignment?', 'js_composer' ),
		'param_name' 	=> 'enable_center_vertical',
		'dependency'		=> array(
			'element'		=> 'position',
			'value'			=> array( 'uk-tab-left', 'uk-tab-right' )
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'CSS Animation', 'sobari_sc' ),
		'param_name'	=> 'content_css_animation',
		'value'			=> dahz_shortcode_helper_get_field_option( 'animation' ),
		'description'	=> __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'sobari_sc' ),
	),
	array(
		'type' => 'textfield',
		'param_name' => 'active_section',
		'heading' => __( 'Active section', 'js_composer' ),
		'value' => 1,
		'description' => __( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'js_composer' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'TitleElement Tag', 'sobari_sc' ),
		'param_name'	=> 'tag',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'std'			=> 'h4',
		'value'			=> array(
			'h1'	=> 'h1',
			'h2'	=> 'h2',
			'h3'	=> 'h3',
			'h4'	=> 'h4',
			'h5'	=> 'h5',
			'h6'	=> 'h6',
			'p'		=> 'p',
		),
		'description'	=> esc_attr__( 'Select Element Tag', 'sobari_sc' ),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> __( 'Custom font size?', 'js_composer' ),
		'param_name' 	=> 'custom_font_size',
		'group'			=> __( 'Styling', 'sobari_sc' ),
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> __( 'font size?', 'js_composer' ),
		'param_name' 	=> 'font_size',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'dependency'		=> array(
			'element'		=> 'custom_font_size',
			'not_empty'		=> true
		)
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Active Color', 'js_composer' ),
		'param_name' 	=> 'active_color',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Inactive Color', 'js_composer' ),
		'param_name' 	=> 'inactive_color',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Active Border Color', 'js_composer' ),
		'param_name' 	=> 'active_border_color',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'		=> array(
			'element'		=> 'tab_navigation',
			'value'			=> 'tabs'
		)
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Inactive Border Color', 'js_composer' ),
		'param_name' 	=> 'inactive_border_color',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'dependency'		=> array(
			'element'		=> 'tab_navigation',
			'value'			=> 'tabs'
		)
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Active BG Color', 'js_composer' ),
		'param_name' 	=> 'active_bg_color',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'dependency'		=> array(
			'element'		=> 'tab_navigation',
			'value'			=> 'subnavpill'
		)
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Inactive Hover Color', 'js_composer' ),
		'param_name' 	=> 'inactive_hover_color',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'dependency'		=> array(
			'element'		=> 'tab_navigation',
			'value'			=> 'subnavpill'
		)
	),
	array(
		'type' 			=> 'colorpicker',
		'heading' 		=> __( 'Inactive Hover BG Color', 'js_composer' ),
		'param_name' 	=> 'inactive_hover_bg_color',
		'edit_field_class'	=> 'vc_col-sm-6',
		'group'			=> __( 'Styling', 'sobari_sc' ),
		'dependency'		=> array(
			'element'		=> 'tab_navigation',
			'value'			=> 'subnavpill'
		)
	),
);

$dahz_tabs = array_merge( $tabs, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );

return $dahz_tabs;
