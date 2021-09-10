<?php

return array(
	array(
		'type'			=> 'el_id',
		'param_name'	=> 'dahz_id',
		'heading'		=> __( 'Row ID', 'js_composer' ),
		'description'	=> __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
		'settings'		=> array(
			'auto_generate' => true,
		),
		'save_always'	=> true,
		'edit_field_class'=> 'hidden',
	),
	// Group General //
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_margin',
		'heading'		=> __( 'Row Margin', 'sobari_sc' ),
		'description'	=> __( 'Set the vertical margin', 'sobari_sc' ),
		'std'			=> 'uk-margin',
		'value'			=> dahz_shortcode_helper_get_field_option( 'margin_size' ),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_remove_top_margin',
		'heading'		=> __( 'Remove Top Margin', 'sobari_sc' ),
		'value'			=> 'uk-margin-remove-top',
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_remove_bottom_margin',
		'heading'		=> __( 'Remove Bottom Margin', 'sobari_sc' ),
		'value'			=> 'uk-margin-remove-bottom',
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_stretch',
		'heading'		=> __( 'Row Stretch', 'sobari_sc' ),
		'std'			=> '',
		'description'	=> __( 'Select stretching option for row and content ( Note: stretched may not work properly if parent container has "overflow:hidden" CSS property )', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'container_size' ),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_column_gap',
		'heading'		=> __( 'Column Gap (Gutter)', 'sobari_sc' ),
		'std'			=> '',
		'description'	=> __( 'Select gap between column in row', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_column_order',
		'heading'		=> __( 'Last Item Appear First', 'sobari_sc' ),
		'description'	=> __( 'Change the visual order for the last item of the grid. This only applies to the selected breakpoint. When stacked, items will appear in the same order as they do in the source code', 'sobari_sc' ),
		'value'			=> true,
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_column_order_breakpoint',
		'heading'		=> __( 'Last Item Apper First Breakpoint', 'sobari_sc' ),
		'description'	=> __( 'Select breakpoint for last item appear first', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'row_column_order',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_display_divider_between',
		'heading'		=> __( 'Display Divider Between Grid', 'sobari_sc' ),
		'value'			=> true,
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'row_divider_color',
		'heading'		=> __( 'Divider Color', 'sobari_sc' ),
		'value'			=> true,
		'dependency'	=> array(
			'element'	=> 'row_display_divider_between',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_enable_full_height',
		'heading'		=> __( 'Full Height Row', 'sobari_sc' ),
		'description'	=> __( 'If checked row will be set to full height', 'sobari_sc' ),
		'value'			=> true,
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_height',
		'heading'		=> __( 'Height', 'sobari_sc' ),
		'description'	=> __( 'Full height row will adjust row height based on header height', 'sobari_sc' ),
		'value'			=> array(
			__( 'Viewport (Full Height)', 'sobari_sc' )				=> '',
			__( 'Viewport (Adjust to Header)', 'sobari_sc' )		=> 'offset-top: true',
			__( 'Expand (Fill the Browser Window)', 'sobari_sc' )	=> 'expand: true'
		),
		'dependency'	=> array(
			'element'	=> 'row_enable_full_height',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_column_position',
		'heading'		=> __( 'Column Position', 'sobari_sc' ),
		'description'	=> __( 'Select column position within row', 'sobari_sc' ),
		'value'			=> array(
			__( 'Top', 'sobari_sc' )	=> 'uk-flex-top',
			__( 'Middle', 'sobari_sc' )	=> 'uk-flex-middle',
			__( 'Bottom', 'sobari_sc' )	=> 'uk-flex-bottom',
			__( 'Stretch', 'sobari_sc' )=> 'uk-flex-stretch'
		),
		'dependency'	=> array(
			'element'	=> 'row_enable_full_height',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_column_enable_equal_height',
		'heading'		=> __( 'Equal Height', 'sobari_sc' ),
		'description'	=> __( 'If checked column will be set to equal height', 'sobari_sc' ),
		'value'			=> true,
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_column_content_position',
		'heading'		=> __( 'Content Position', 'sobari_sc' ),
		'description'	=> __( 'Select content position within column', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'flex_content_alignment' ),
	),
	array(
		'type'			=> 'el_id',
		'param_name'	=> 'el_id',
		'heading'		=> __( 'Row ID', 'sobari_sc' ),
		'description'	=> sprintf( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>)', 'sobari_sc' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'el_class',
		'heading'		=> __( 'Extra Class Name', 'sobari_sc' ),
		'description'	=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'disable_element',
		'heading'		=> __( 'Disable Row', 'sobari_sc' ),
		// Inner param name.
		'description'	=> __( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time', 'sobari_sc' ),
		'value'			=> array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
	),

	// Group Design Options
	array(
		'type'			=> 'css_editor',
		'param_name'	=> 'css',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'CSS box', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-12 css-margin--hide-horizontal',
	),
	array(
		'type'			=> 'radio_image',
		'param_name'	=> 'row_custom_media_type',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Custom Media Type', 'sobari_sc' ),
		'value'			=> array(
			'none'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_design-none.svg",
			'image'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_design-image.svg",
			'video'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_design-video.svg",
		),
	),
	array(
		'type'			=> 'attach_image',
		'param_name'	=> 'row_background_image',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Image', 'sobari_sc' ),
		'description'	=> __( 'Select image from media library', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image',
		),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_background_width',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Width', 'sobari_sc' ),
		'description'	=> __( 'Set the width and height in pixels (e.g. 600)', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> array( 'image', 'video' ),
		),
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_background_height',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Height', 'sobari_sc' ),
		'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> array( 'image', 'video' ),
		),
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_background_image_size',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Image Size', 'sobari_sc' ),
		'description'	=> __( 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with background color', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_size' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image',
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_background_image_repeat',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Image Repeat', 'sobari_sc' ),
		'description'	=> __( 'Image repeat', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_repeat' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image',
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_background_image_position',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Image Position', 'sobari_sc' ),
		'description'	=> __( 'Set the inital background position, relative to section layer', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_position' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image',
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_background_image_effect',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Image Effect', 'sobari_sc' ),
		'description'	=> __( 'Add a parallax effect or fix the background with regard to the viewport while scrolling', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_effect' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image',
		),
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'row_background_image_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_background_image_effect',
			'value'		=> 'parallax',
		),
		'edit_field_class'	=> 'parallax-option--hide-advance',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_background_video_url',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Video URL', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'video',
		),
	),
	/* array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_background_video_enable_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Video Parallax', 'sobari_sc' ),
		'description'	=> __( 'If checked row will be set to full height', 'sobari_sc' ),
		'value'			=> true,
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'video',
		),
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'row_background_video_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_background_video_enable_parallax',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'parallax-option--hide-advance',
	), */
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_background_image_visibility',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Image Visibility', 'sobari_sc' ),
		'description'	=> __( 'Display the image only on this device width and larger', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image',
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_background_blend_mode',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> array( 'image' ),
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_video_blend_mode',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> array( 'video' ),
		),
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'row_color_overlay',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_enable_gradient',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'row_color_overlay_2',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Color Overlay 2', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_gradient',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_gradient_direction',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_gradient',
			'not_empty'	=> true,
		),
	),

	// Group Responsive //
	array(
		'type'			=> 'visibility',
		'param_name'	=> 'row_visibility',
		'group'			=> __( 'Responsive', 'sobari_sc' ),
		'heading'		=> __( 'Row Visibility', 'sobari_sc' ),
		'description'	=> __( 'Set row visibility on device', 'sobari_sc' ),
	),

	// Group Extra //
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_enable_sticky',
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Sticky', 'sobari_sc' ),
		'description'	=> __( 'Activate this to stick element when scrolling', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_sticky_breakpoint',
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Sticky', 'sobari_sc' ),
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_sticky',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'dropdown',
		'param_name'	=> 'row_general_row_color_scheme',
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'General Row Color', 'sobari_sc' ),
		'description'	=> __( 'Select dark or light. Note: This only applies if the scroll option active', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'color_scheme' ),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_section_name',
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Section Name', 'sobari_sc' ),
		'description'	=> __( 'Required for the onepage scroll. This gives the name to the section', 'sobari_sc' ),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_x',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_y',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Custom Responsive Translate Position?', 'sobari_sc' ),
		'param_name' => 'custom_responsive_translate_el',
		'value' => array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
		'group'				=> __( 'Extra', 'sobari_sc' ),
		'description' => __( 'Use custom Translate Position for responsive size', 'sobari_sc' ),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_x_xsmall',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Extra Small ( Phone Potrait )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_y_xsmall',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Extra Small ( Phone Potrait )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_x_small',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Small ( Phone Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_y_small',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Small ( Phone Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_x_med',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Medium ( Tablet Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_translate_y_med',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Medium ( Tablet Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_z_index',
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Z - Index', 'sobari_sc' ),
		'description'	=> __( 'If you want to set a custom stacking order on this row, enter it here. Can be useful when overlapping element from other row with negative margin/translate', 'sobari_sc' ),
	),
	// Group Shape Divider //
	array(
		'type'			=> 'radio_image',
		'param_name'	=> 'row_top_shape_divider',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Top Shape Divider', 'sobari_sc' ),
		'std'			=> '',
		'value'			=> dahz_shortcode_helper_get_field_option( 'divider_style' ),
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'row_top_shape_divider_color',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Top Divider Color', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_top_shape_divider',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'vc_col-sm-12 colorpicker--hide-alpha',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_top_shape_divider_height',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Top Divider Height', 'sobari_sc' ),
		'description'	=> __( 'Enter an optional custom height for your shape divider in pixels (e.g.100)', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_top_shape_divider',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_top_shape_divider_enable_bring_to_front',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bring To Front?', 'sobari_sc' ),
		'description'	=> __( 'This will bring the shape divider to the top layer, placing it on top of any content it intersect', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_top_shape_divider',
			'not_empty'	=> true,
		),
	),

	array(
		'type'			=> 'radio_image',
		'param_name'	=> 'row_bottom_shape_divider',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bottom Shape Divider', 'sobari_sc' ),
		'std'			=> '',
		'value'			=> dahz_shortcode_helper_get_field_option( 'divider_style' ),
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'row_bottom_shape_divider_color',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bottom Divider Color', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_bottom_shape_divider',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'vc_col-sm-12 colorpicker--hide-alpha',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_bottom_shape_divider_height',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bottom Divider Height', 'sobari_sc' ),
		'description'	=> __( 'Enter an optional custom height for your shape divider in pixels (e.g.100)', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_bottom_shape_divider',
			'not_empty'	=> true,
		),
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'row_bottom_shape_divider_enable_bring_to_front',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bring To Front?', 'sobari_sc' ),
		'description'	=> __( 'This will bring the shape divider to the top layer, placing it on top of any content it intersect', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_bottom_shape_divider',
			'not_empty'	=> true,
		),
	),
);