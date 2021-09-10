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
		'heading'		=> __( 'Row Margin', 'sobari_sc' ),
		'param_name'	=> 'row_margin',
		'value'			=> dahz_shortcode_helper_get_field_option( 'margin_size' ),
		'description'	=> __( 'Set the vertical margin', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Remove Top Margin', 'sobari_sc' ),
		'param_name'	=> 'row_remove_top_margin',
		'value'			=> 'uk-margin-remove-top',
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Remove Bottom Margin', 'sobari_sc' ),
		'param_name'	=> 'row_remove_bottom_margin',
		'value'			=> 'uk-margin-remove-bottom',
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Column Gap (Gutter)', 'sobari_sc' ),
		'param_name'	=> 'row_column_gap',
		'description'	=> __( 'Select gap between column in row', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Display Divider Between Grid', 'sobari_sc' ),
		'param_name'	=> 'row_display_divider_between',
		'value'			=> true,
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Divider Color', 'sobari_sc' ),
		'param_name'	=> 'row_divider_color',
		'value'			=> true,
		'dependency'	=> array(
			'element'	=> 'row_display_divider_between',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Equal Height', 'sobari_sc' ),
		'param_name'	=> 'row_column_enable_equal_height',
		'value'			=> true,
		'description'	=> __( 'If checked column will be set to equal height', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Content Position', 'sobari_sc' ),
		'param_name'	=> 'row_column_content_position',
		'value'			=> dahz_shortcode_helper_get_field_option( 'flex_content_alignment' ),
		'description'	=> __( 'Select content position within column', 'sobari_sc' ),
	),
	array(
		'type'			=> 'el_id',
		'heading'		=> __( 'Row ID', 'sobari_sc' ),
		'param_name'	=> 'el_id',
		'description'	=> sprintf( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>)', 'sobari_sc' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Extra Class Name', 'sobari_sc' ),
		'param_name'	=> 'el_class',
		'description'	=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'sobari_sc' ),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> __( 'Disable Row', 'js_composer' ),
		'param_name' 	=> 'disable_element',
		'description'	=> __( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time', 'sobari_sc' ),
		'value' 		=> array( __( 'Yes', 'js_composer' ) => 'yes' ),
	),
	// Group Design Options
	array(
		'type'			=> 'css_editor',
		'heading'		=> __( 'CSS box', 'sobari_sc' ),
		'param_name'	=> 'css',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-12 css-margin--hide-horizontal'
	),
	array(
		'type'			=> 'radio_image',
		'heading'		=> __( 'Custom Media Type', 'sobari_sc' ),
		'param_name'	=> 'row_custom_media_type',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> array(
			'none'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_design-none.svg",
			'image'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_design-image.svg",
			'video'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_design-video.svg"
		)
	),
	array(
		'type'			=> 'attach_image',
		'heading'		=> __( 'Image', 'sobari_sc' ),
		'param_name'	=> 'row_background_image',
		'description'	=> __( 'Select image from media library', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Width', 'sobari_sc' ),
		'param_name'	=> 'row_background_width',
		'description'	=> __( 'Set the width and height in pixels (e.g. 600)', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> array( 'image', 'video' )
		),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Height', 'sobari_sc' ),
		'param_name'	=> 'row_background_height',
		'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> array( 'image', 'video' )
		),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Size', 'sobari_sc' ),
		'param_name'	=> 'row_background_image_size',
		'description'	=> __( 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with background color', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_size' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Repeat', 'sobari_sc' ),
		'param_name'	=> 'row_background_image_repeat',
		'description'	=> __( 'Image repeat', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_repeat' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Position', 'sobari_sc' ),
		'param_name'	=> 'row_background_image_position',
		'description'	=> __( 'Set the inital background position, relative to section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_position' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Effect', 'sobari_sc' ),
		'param_name'	=> 'row_background_image_effect',
		'description'	=> __( 'Add a parallax effect or fix the background with regard to the viewport while scrolling', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_effect' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'row_background_image_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_background_image_effect',
			'value'		=> 'parallax'
		),
		'edit_field_class'	=> 'parallax-option--hide-advance'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Video URL', 'sobari_sc' ),
		'param_name'	=> 'row_background_video_url',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'video'
		)
	),
	/* array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Video Parallax', 'sobari_sc' ),
		'param_name'	=> 'row_background_video_enable_parallax',
		'value'			=> true,
		'description'	=> __( 'If checked row will be set to full height', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'video'
		)
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'row_background_video_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_background_video_enable_parallax',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'parallax-option--hide-advance'
	), */
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Visibility', 'sobari_sc' ),
		'param_name'	=> 'row_background_image_visibility',
		'description'	=> __( 'Display the image only on this device width and larger', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'param_name'	=> 'row_background_blend_mode',
		'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'param_name'	=> 'row_video_blend_mode',
		'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'row_custom_media_type',
			'value'		=> 'video'
		)
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
		'param_name'	=> 'row_color_overlay',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
		'param_name'	=> 'row_enable_gradient',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Color Overlay 2', 'sobari_sc' ),
		'param_name'	=> 'row_color_overlay_2',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_gradient',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
		'param_name'	=> 'row_gradient_direction',
		'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_gradient',
			'not_empty'	=> true,
		)
	),

	// Group Responsive //
	array(
		'type'			=> 'visibility',
		'heading'		=> __( 'Row Visibility', 'js_composer' ),
		'param_name'	=> 'row_visibility',
		'description'	=> __( 'Set row visibility on device', 'sobari_sc' ),
		'group'			=> __( 'Responsive', 'js_composer' ),
	),

	// Group Extra //
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Sticky', 'js_composer' ),
		'param_name'	=> 'row_enable_sticky',
		'description'	=> __( 'Activate this to stick element when scrolling', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Sticky', 'js_composer' ),
		'param_name'	=> 'row_sticky_breakpoint',
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_sticky',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'General Row Color', 'js_composer' ),
		'param_name'	=> 'row_general_row_color_scheme',
		'description'	=> __( 'Select dark or light. Note: This only applies if the scroll option active', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'color_scheme' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Section Name', 'js_composer' ),
		'param_name'	=> 'row_section_name',
		'description'	=> __( 'Required for the onepage scroll. This gives the name to the section', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Translate X', 'js_composer' ),
		'param_name'	=> 'row_translate_x',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Translate Y', 'js_composer' ),
		'param_name'	=> 'row_translate_y',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Custom Responsive Translate Position?', 'sobari_sc' ),
		'param_name' => 'custom_responsive_translate_el_row_inner',
		'value' => array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
		'group'				=> __( 'Extra', 'sobari_sc' ),
		'description' => __( 'Use custom Translate Position for responsive size', 'sobari_sc' ),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_inner_translate_x_xsmall',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Extra Small ( Phone Potrait )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_row_inner',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_inner_translate_y_xsmall',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Extra Small ( Phone Potrait )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_row_inner',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_inner_translate_x_small',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Small ( Phone Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_row_inner',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_inner_translate_y_small',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Small ( Phone Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_row_inner',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_inner_translate_x_med',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Medium ( Tablet Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_row_inner',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'row_inner_translate_y_med',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Medium ( Tablet Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_row_inner',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Z - Index', 'js_composer' ),
		'param_name'	=> 'row_z_index',
		'description'	=> __( 'If you want to set a custom stacking order on this row, enter it here. Can be useful when overlapping element from other row with negative margin/translate', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'js_composer' ),
	),
);
