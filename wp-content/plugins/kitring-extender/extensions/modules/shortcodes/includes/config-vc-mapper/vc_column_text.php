<?php

$text_block = array(

	// Group General //
	array(
		'type' => 'textarea_html',
		'holder' => 'div',
		'heading' => __( 'Text', 'js_composer' ),
		'param_name' => 'content',
		'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' ),
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
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Video Parallax', 'sobari_sc' ),
		'param_name'	=> 'row_background_video_enable_parallax',
		'description'	=> __( 'If checked row will be set to full height', 'sobari_sc' ),
		'value'			=> true,
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
	),
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
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Overlay Strength', 'sobari_sc' ),
		'param_name'	=> 'row_overlay_strength',
		'value'			=> dahz_shortcode_helper_get_field_option( 'strength' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'row_enable_gradient',
			'not_empty' => true,
		)
	),

);
$text_block = array_merge( $text_block, dahz_shortcode_get_group_animation(), dahz_shortcode_get_group_extra() );
return $text_block;
