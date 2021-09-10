<?php

return array(
	array(
		'type'			=> 'el_id',
		'param_name'	=> 'dahz_id',
		'heading'		=> __( 'Section ID', 'js_composer' ),
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
		'heading'		=> __( 'Section Padding', 'sobari_sc' ),
		'param_name'	=> 'section_padding',
		'std'			=> 'uk-padding-remove-vertical',
		'description'	=> __( 'Set the vertical padding', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'section_padding' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Remove Top Padding', 'sobari_sc' ),
		'param_name'	=> 'section_remove_top_padding',
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Remove Bottom Padding', 'sobari_sc' ),
		'param_name'	=> 'section_remove_bottom_padding',
	),
	array(
		'type'			=> 'el_id',
		'heading'		=> __( 'Section ID', 'sobari_sc' ),
		'param_name'	=> 'el_id',
		'description'	=> sprintf( __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'sobari_sc' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Extra Class Name', 'sobari_sc' ),
		'param_name'	=> 'el_class',
		'description'	=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Disable Section', 'sobari_sc' ),
		'param_name'	=> 'disable_element',
		// Inner param name.
		'description'	=> __( 'If checked the section won\'t be visible on the public side of your website. You can switch it back any time.', 'sobari_sc' ),
		'value'			=> array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
	),

	// Group Design Options //
	array(
		'type'			=> 'css_editor',
		'heading'		=> __( 'CSS Box', 'sobari_sc' ),
		'param_name'	=> 'css',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'radio_image',
		'heading'		=> __( 'Custom Media Type', 'sobari_sc' ),
		'param_name'	=> 'section_custom_media_type',
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
		'param_name'	=> 'section_background_image',
		'description'	=> __( 'Select image from media library', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Width', 'sobari_sc' ),
		'param_name'	=> 'section_background_width',
		'description'	=> __( 'Set the width and height in pixels (e.g. 600).', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> array( 'image', 'video' )
		),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Height', 'sobari_sc' ),
		'param_name'	=> 'section_background_height',
		'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> array( 'image', 'video' )
		),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Size', 'sobari_sc' ),
		'param_name'	=> 'section_background_image_size',
		'description'	=> __( 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with background color', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_size' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Repeat', 'sobari_sc' ),
		'param_name'	=> 'section_background_image_repeat',
		'description'	=> __( 'image Repeat', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_repeat' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Position', 'sobari_sc' ),
		'param_name'	=> 'section_background_image_position',
		'description'	=> __( 'Set the inital background position, relative to section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_position' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Effect', 'sobari_sc' ),
		'param_name'	=> 'section_background_image_effect',
		'description'	=> __( 'Add a parallax effect or fix the background with regard to the viewport while scrolling', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_effect' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'section_background_image_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_background_image_effect',
			'value'		=> 'parallax'
		),
		'edit_field_class'	=> 'parallax-option--hide-advance'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Video URL', 'sobari_sc' ),
		'param_name'	=> 'section_background_video_url',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'video'
		)
	),
	/* array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Video Parallax', 'sobari_sc' ),
		'param_name'	=> 'section_background_video_enable_parallax',
		'value'			=> true,
		'description'	=> __( 'if checked section will be set to full height', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'video'
		)
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'section_background_video_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_background_video_enable_parallax',
			'not_empty' => true,
		),
		'edit_field_class'	=> 'parallax-option--hide-advance'
	), */
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Visibility', 'sobari_sc' ),
		'param_name'	=> 'section_background_image_visibility',
		'description'	=> __( 'Display the image only on device width and larger', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'param_name'	=> 'section_background_blend_mode',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'param_name'	=> 'section_video_blend_mode',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'section_custom_media_type',
			'value'		=> 'video'
		)
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
		'param_name'	=> 'section_color_overlay',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
		'param_name'	=> 'section_enable_gradient',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Color Overlay 2', 'sobari_sc' ),
		'param_name'	=> 'section_color_overlay_2',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_enable_gradient',
			'not_empty' => true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
		'param_name'	=> 'section_gradient_direction',
		'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_enable_gradient',
			'not_empty' => true,
		)
	),

	// Group Responsive //
	array(
		'type'			=> 'visibility',
		'heading'		=> __( 'Section Visibility', 'sobari_sc' ),
		'param_name'	=> 'section_visibility',
		'description'	=> __( 'Choose the visibility of the element', 'sobari_sc' ),
		'group'			=> __( 'Responsive', 'sobari_sc' ),
	),

	// Group Shape Divider //
	array(
		'type'			=> 'radio_image',
		'param_name'	=> 'section_top_shape_divider',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Top Shape Divider', 'sobari_sc' ),
		'std'			=> '',
		'value'			=> dahz_shortcode_helper_get_field_option( 'divider_style' ),
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'section_top_shape_divider_color',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Top Divider Color', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_top_shape_divider',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'vc_col-sm-12 colorpicker--hide-alpha',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'section_top_shape_divider_height',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Top Divider Height', 'sobari_sc' ),
		'description'	=> __( 'Enter an optional custom height for your shape divider in pixels (e.g.100)', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_top_shape_divider',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'section_top_shape_divider_enable_bring_to_front',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bring To Front?', 'sobari_sc' ),
		'description'	=> __( 'This will bring the shape divider to the top layer, placing it on top of any content it intersect', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_top_shape_divider',
			'not_empty'	=> true,
		)
	),

	array(
		'type'			=> 'radio_image',
		'param_name'	=> 'section_bottom_shape_divider',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bottom Shape Divider', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'divider_style' ),
	),
	array(
		'type'			=> 'colorpicker',
		'param_name'	=> 'section_bottom_shape_divider_color',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bottom Divider Color', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_bottom_shape_divider',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'vc_col-sm-12 colorpicker--hide-alpha',
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'section_bottom_shape_divider_height',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bottom Divider Height', 'sobari_sc' ),
		'description'	=> __( 'Enter an optional custom height for your shape divider in pixels (e.g.100)', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_bottom_shape_divider',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'checkbox',
		'param_name'	=> 'section_bottom_shape_divider_enable_bring_to_front',
		'group'			=> __( 'Shape Divider', 'sobari_sc' ),
		'heading'		=> __( 'Bring To Front?', 'sobari_sc' ),
		'description'	=> __( 'This will bring the shape divider to the top layer, placing it on top of any content it intersect', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'section_bottom_shape_divider',
			'not_empty'	=> true,
		)
	),
);
