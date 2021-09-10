<?php

$css_animation = vc_map_add_css_animation( false );

$css_animation['group'] = __( 'Animation', 'sobari_sc' );

$animation = array();

$animation[__( 'None', 'sobari_sc' )] = 'none';

$animation = array_merge( $animation, dahz_shortcode_helper_get_field_option( 'animation' ) );

return array(
	// Group General //
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
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Card Style', 'sobari_sc' ),
		'param_name'	=> 'column_enable_card_style',
		'description'	=> __( 'Enable this to activate card effect on column', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Card Box Shadow', 'sobari_sc' ),
		'param_name'	=> 'column_card_box_shadow',
		'description'	=> __( 'Select card box shadow style', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'size_modifier_1' ),
		'dependency'	=> array(
			'element'	=> 'column_enable_card_style',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Add Extra Bottom Shadow', 'sobari_sc' ),
		'param_name'	=> 'column_card_enable_extra_bottom_shadow',
		'dependency'	=> array(
			'element'	=> 'column_enable_card_style',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Background Hover Color', 'sobari_sc' ),
		'param_name'	=> 'column_card_background_hover_color',
		'dependency'	=> array(
			'element'	=> 'column_enable_card_style',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Card Hover Box Shadow', 'sobari_sc' ),
		'param_name'	=> 'column_card_hover_box_shadow',
		'description'	=> __( 'Select card box hover shadow style', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'size_modifier_1' ),
		'dependency'	=> array(
			'element'	=> 'column_enable_card_style',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Padding', 'sobari_sc' ),
		'param_name'	=> 'column_padding',
		'description'	=> __( 'Set the padding', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'size_modifier_2' ),
	),
	array(
		'type'			=> 'el_id',
		'heading'		=> __( 'Column ID', 'sobari_sc' ),
		'param_name'	=> 'el_id',
		'description'	=> sprintf( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'sobari_sc' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Extra class name', 'sobari_sc' ),
		'param_name'	=> 'el_class',
		'description'	=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sobari_sc' ),
	),
	// Group Design Option //
	array(
		'type'			=> 'css_editor',
		'heading'		=> __( 'CSS box', 'sobari_sc' ),
		'param_name'	=> 'css',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-12 css-margin--hide'
	),
	array(
		'type'			=> 'radio_image',
		'heading'		=> __( 'Custom Media Type', 'sobari_sc' ),
		'param_name'	=> 'column_custom_media_type',
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
		'param_name'	=> 'column_background_image',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Width', 'sobari_sc' ),
		'param_name'	=> 'column_background_width',
		'description'	=> __( 'Set the width and height in pixels (e.g. 600)', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> array( 'image', 'video' )
		),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Height', 'sobari_sc' ),
		'param_name'	=> 'column_background_height',
		'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> array( 'image', 'video' )
		),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Size', 'sobari_sc' ),
		'param_name'	=> 'column_background_image_size',
		'description'	=> __( 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with background color', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_size' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Repeat', 'sobari_sc' ),
		'param_name'	=> 'column_background_image_repeat',
		'description'	=> __( 'Image repeat', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_repeat' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Position', 'sobari_sc' ),
		'param_name'	=> 'column_background_image_position',
		'description'	=> __( 'Set the inital background position, relative to section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_position' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Effect', 'sobari_sc' ),
		'param_name'	=> 'column_background_image_effect',
		'description'	=> __( 'Add a parallax effect or fix the background with regard to the viewport while scrolling', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_effect' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'column_background_image_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_background_image_effect',
			'value'		=> 'parallax'
		),
		'edit_field_class'	=> 'parallax-option--hide-advance'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Video URL', 'sobari_sc' ),
		'param_name'	=> 'column_background_video_url',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'video'
		)
	),
	/* array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Video Parallax', 'sobari_sc' ),
		'param_name'	=> 'column_background_video_enable_parallax',
		'description'	=> __( 'If checked row will be set to full height', 'sobari_sc' ),
		'value'			=> true,
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'video'
		)
	),
	array(
		'type'			=> 'parallax_options',
		'param_name'	=> 'column_background_video_parallax',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_background_video_enable_parallax',
			'not_empty'	=> true,
		),
		'edit_field_class'	=> 'parallax-option--hide-advance'
	), */
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Image Visibility', 'sobari_sc' ),
		'param_name'	=> 'column_background_image_visibility',
		'description'	=> __( 'Display the image only on this device width and larger', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'param_name'	=> 'column_background_blend_mode',
		'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'image_blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'image'
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Blend Mode', 'sobari_sc' ),
		'param_name'	=> 'column_video_blend_mode',
		'description'	=> __( 'Set the initial background position, relative to the section layer', 'sobari_sc' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'blend_mode' ),
		'dependency'	=> array(
			'element'	=> 'column_custom_media_type',
			'value'		=> 'video'
		)
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
		'param_name'	=> 'column_color_overlay',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
		'param_name'	=> 'column_enable_gradient',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
	),
	array(
		'type'			=> 'colorpicker',
		'heading'		=> __( 'Color Overlay 2', 'sobari_sc' ),
		'param_name'	=> 'column_color_overlay_2',
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_enable_gradient',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
		'param_name'	=> 'column_gradient_direction',
		'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
		'group'			=> __( 'Design Options', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'column_enable_gradient',
			'not_empty'	=> true,
		)
	),
	// Group Responsive //
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Width', 'sobari_sc' ),
		'param_name'	=> 'width',
		'description'	=> __( 'Select column width.', 'sobari_sc' ),
		'value'			=> array(
			__( '1 column - 1/12', 'sobari_sc' )	=> '1/12',
			__( '2 columns - 1/6', 'sobari_sc' )	=> '1/6',
			__( '3 columns - 1/4', 'sobari_sc' )	=> '1/4',
			__( '4 columns - 1/3', 'sobari_sc' )	=> '1/3',
			__( '5 columns - 5/12', 'sobari_sc' )	=> '5/12',
			__( '6 columns - 1/2', 'sobari_sc' )	=> '1/2',
			__( '7 columns - 7/12', 'sobari_sc' )	=> '7/12',
			__( '8 columns - 2/3', 'sobari_sc' )	=> '2/3',
			__( '9 columns - 3/4', 'sobari_sc' )	=> '3/4',
			__( '10 columns - 5/6', 'sobari_sc' )	=> '5/6',
			__( '11 columns - 11/12', 'sobari_sc' )	=> '11/12',
			__( '12 columns - 1/1', 'sobari_sc' )	=> '1/1',
		),
		'group'			=> __( 'Responsive', 'sobari_sc' ),
		'std'			=> '1/1',
	),
	array(
		'type'			=> 'column_offset_uikit',
		'heading'		=> __( 'Responsiveness', 'sobari_sc' ),
		'description'	=> __( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'sobari_sc' ),
		'param_name'	=> 'offset',
		'group'			=> __( 'Responsive', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Tablet Text Alignment', 'sobari_sc' ),
		'param_name'	=> 'column_tablet_alignment',
		'value'			=> array_merge( array( __( 'Default (Inherit)', 'sobari_sc' ) => '' ), dahz_shortcode_helper_get_field_option( 'alignment' ) ),
		'group'			=> __( 'Responsive', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Mobile Alignment', 'sobari_sc' ),
		'param_name'	=> 'column_mobile_alignment',
		'value'			=> array_merge( array( __( 'Default (Inherit)', 'sobari_sc' ) => '' ), dahz_shortcode_helper_get_field_option( 'alignment' ) ),
		'group'			=> __( 'Responsive', 'sobari_sc' ),
	),
	// Group Animation //
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'CSS Animation', 'sobari_sc' ),
		'param_name'	=> 'css_animation',
		'description'	=> __( 'Apply an animation to elements once they enter the viewport. Slide animation can come into effect with a fixed offset or at 100% of the element own size', 'sobari_sc' ),
		'value'			=> $animation,
		'group'			=> __( 'Animation', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Delay Element Animation', 'sobari_sc' ),
		'param_name'	=> 'column_delay_animation',
		'description'	=> __( 'Specify the entrance animation delay in miliseconds', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'delay_animation' ),
		'group'			=> __( 'Animation', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'css_animation',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Repeat Animation', 'sobari_sc' ),
		'param_name'	=> 'column_repeat_animation',
		'description'	=> __( 'Applies the animation class every time the element is in view', 'sobari_sc' ),
		'group'			=> __( 'Animation', 'sobari_sc' ),
		'dependency'	=> array(
			'element'	=> 'css_animation',
			'not_empty'	=> true,
		)
	),
	// Group Extra //
	array(
		'type'			=> 'checkbox',
		'heading'		=> __( 'Sticky', 'sobari_sc' ),
		'param_name'	=> 'column_enable_sticky',
		'description'	=> __( 'Activate this to stick element when scrolling', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> __( 'Sticky', 'sobari_sc' ),
		'param_name'	=> 'column_sticky_breakpoint',
		'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		'dependency'	=> array(
			'element'	=> 'column_enable_sticky',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'de_link',
		'heading'		=> __( 'Column Link', 'sobari_sc' ),
		'param_name'	=> 'column_link',
		'description'	=> __( 'If you wish for this column to link somewhere, enter the URL in here', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' )
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Translate X', 'sobari_sc' ),
		'param_name'	=> 'column_translate_x',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Translate Y', 'sobari_sc' ),
		'param_name'	=> 'column_translate_y',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6'
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Custom Responsive Translate Position?', 'sobari_sc' ),
		'param_name' => 'custom_responsive_translate_el_col',
		'value' => array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
		'group'				=> __( 'Extra', 'sobari_sc' ),
		'description' => __( 'Use custom Translate Position for responsive size', 'sobari_sc' ),
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'col_translate_x_xsmall',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Extra Small ( Phone Potrait )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_col',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'col_translate_y_xsmall',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Extra Small ( Phone Potrait )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_col',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'col_translate_x_small_col',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Small ( Phone Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_col',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'col_translate_y_small_col',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Small ( Phone Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_col',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'col_translate_x_med_col',
		'description'	=> __( 'Set how much the element has to translate in the X axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate X <br /> for Medium ( Tablet Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_col',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'col_translate_y_med_col',
		'description'	=> __( 'Set how much the element has to translate in the Y axis. Dont include "px" in your strings(ex: 40). Negative Values are also accepted', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'heading'		=> __( 'Translate Y <br /> for Medium ( Tablet Landscape )', 'sobari_sc' ),
		'edit_field_class'	=> 'vc_col-sm-6',
		'dependency'	=> array(
			'element'	=> 'custom_responsive_translate_el_col',
			'not_empty'	=> true,
		)
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Z - Index', 'sobari_sc' ),
		'param_name'	=> 'column_z_index',
		'description'	=> __( 'If you want to set a custom stacking order on this row, enter it here. Can be useful when overlapping element from other row with negative margin/translate', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
	),
);
