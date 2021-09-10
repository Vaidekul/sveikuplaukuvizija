<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_DF_Item_Split_Slider extends WPBakeryShortCodesContainer {
	}
}
$param = array(
	"name"				=> __( "Split Slider Item", "js_composer" ),
	"base"				=> "df_item_split_slider",
	"description"		=> esc_attr__( 'Add item shortcode here', 'sobari_sc' ),
	"icon"				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-split-slider-item.svg",
	"content_element"	=> true,
	"as_parent"			=> array(),
	"as_child"			=> array( 'only' => 'df_split_slider_left, df_split_slider_right' ),
	"params"			=> array(
		array(
			"type"			=> "textfield",
			"heading"		=> __( "Extra Class", "js_composer" ),
			"param_name"	=> "extra_class",
			"description"	=> __( "Extra Class for Split Slider", "upscale" )
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> __( "General Split Slider Background Color", "upscale" ),
			"param_name"	=> "background_color",
			'value'			=> array(
				__( 'None', 'upsob_sc' )			=> '',
				__( 'Overlay Light', 'upsob_sc' )	=> 'light',
				__( 'Overlay Dark', 'upsob_sc' )	=> 'dark',
			),
		),
		array(
			'type'			=> 'css_editor',
			'heading'		=> __( 'CSS box', 'sobari_sc' ),
			'param_name'	=> 'css',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'edit_field_class'	=> 'vc_col-sm-12 css-margin--hide-horizontal'
		),
		array(
			'type'			=> 'radio_button',
			'heading'		=> __( 'Custom Media Type', 'sobari_sc' ),
			'param_name'	=> 'custom_media_type',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> array(
				'none'		=> __( 'None', 'sobari_sc' ),
				'image'		=> __( 'Image', 'sobari_sc' ),
				'video'		=> __( 'Video', 'sobari_sc' )
			)
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> __( 'Image', 'sobari_sc' ),
			'param_name'	=> 'background_image',
			'description'	=> __( 'Select image from media library', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> __( 'Width', 'sobari_sc' ),
			'param_name'	=> 'background_width',
			'description'	=> __( 'Set the width and height in pixels (e.g. 600)', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> array( 'image', 'video' )
			),
			'edit_field_class'	=> 'vc_col-sm-6'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> __( 'Height', 'sobari_sc' ),
			'param_name'	=> 'background_height',
			'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> array( 'image', 'video' )
			),
			'edit_field_class'	=> 'vc_col-sm-6'
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Image Size', 'sobari_sc' ),
			'param_name'	=> 'background_image_size',
			'description'	=> __( 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with background color', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'image_size' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Image Repeat', 'sobari_sc' ),
			'param_name'	=> 'background_image_repeat',
			'description'	=> __( 'Image repeat', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'image_repeat' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Image Position', 'sobari_sc' ),
			'param_name'	=> 'background_image_position',
			'description'	=> __( 'Set the inital background position, relative to section layer', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'image_position' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Image Effect', 'sobari_sc' ),
			'param_name'	=> 'background_image_effect',
			'description'	=> __( 'Add a parallax effect or fix the background with regard to the viewport while scrolling', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'image_effect' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'parallax_options',
			'param_name'	=> 'background_image_parallax',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'background_image_effect',
				'value'		=> 'parallax'
			),
			'edit_field_class'	=> 'parallax-option--hide-advance'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> __( 'Video URL', 'sobari_sc' ),
			'param_name'	=> 'background_video_url',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'video'
			)
		),
		/* array(
			'type'			=> 'checkbox',
			'heading'		=> __( 'Video Parallax', 'sobari_sc' ),
			'param_name'	=> 'background_video_enable_parallax',
			'description'	=> __( 'If checked row will be set to full height', 'sobari_sc' ),
			'value'			=> true,
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'video'
			)
		),
		array(
			'type'			=> 'parallax_options',
			'param_name'	=> 'background_video_parallax',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'background_video_enable_parallax',
				'not_empty'	=> true,
			),
			'edit_field_class'	=> 'parallax-option--hide-advance'
		), */
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Image Visibility', 'sobari_sc' ),
			'param_name'	=> 'background_image_visibility',
			'description'	=> __( 'Display the image only on this device width and larger', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
			'param_name'	=> 'background_blend_mode',
			'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'image_blend_mode' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'image'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
			'param_name'	=> 'video_blend_mode',
			'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'blend_mode' ),
			'dependency'	=> array(
				'element'	=> 'custom_media_type',
				'value'		=> 'video'
			)
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
			'param_name'	=> 'color_overlay',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
			'param_name'	=> 'enable_gradient',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> __( 'Color Overlay 2', 'sobari_sc' ),
			'param_name'	=> 'color_overlay_2',
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'enable_gradient',
				'not_empty'	=> true,
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
			'param_name'	=> 'gradient_direction',
			'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
			'group'			=> __( 'Design Options', 'sobari_sc' ),
			'dependency'	=> array(
				'element'	=> 'enable_gradient',
				'not_empty'	=> true,
			)
		),
	),
	"is_container"				=> true,
	"show_settings_on_create"	=> true,
	"js_view"					=> 'VcColumnView'
);

return $param;