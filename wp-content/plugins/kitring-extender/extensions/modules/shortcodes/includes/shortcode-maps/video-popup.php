<?php

$param = array(
	'name'			=> esc_attr__( 'Video Popup', 'sobari_sc' ),
	'base'			=> 'dahz_video_popup',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Add video pop up link', 'sobari_sc' ),
	'icon'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-video-pop-up.svg",
	'params'		=> array()
);

$param['params'][] = array(
	'type'			=> 'radio_image',
	'heading'		=> esc_attr__( 'Video Popup Style', 'sobari_sc' ),
	'param_name'	=> 'video_popup_style',
	'std'			=> 'layout-1',
	'value'			=> array(
		'layout-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_video-popup-style-1.svg",
		'layout-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_video-popup-style-2.svg",
		'layout-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_video-popup-style-3.svg"
	)
);
$param['params'][] = array(
	'type'			=> 'de_link',
	'heading'		=> esc_attr__( 'Video URL', 'sobari_sc' ),
	'param_name'	=> 'video_url',
	'description'	=> esc_attr__( 'Add popup video url. Youtube or Vimeo', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon & Outline Color', 'sobari_sc' ),
	'param_name'	=> 'icon_outline_color',
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-1' )
	)
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
	'param_name'	=> 'icon_color',
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-2', 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'icon_bg_color',
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-2', 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image', 'sobari_sc' ),
	'param_name'	=> 'image',
	'description'	=> esc_attr__( 'Select image from media library', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Image', 'sobari_sc' ),
	'param_name'	=> 'image_size',
	'description'	=> esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or any size defined by theme). Alternatively enter size in pixel (Example: 200x100 (Width x Height))', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Image Alignment', 'sobari_sc' ),
	'param_name'	=> 'image_alignment',
	'description'	=> esc_attr__( 'Select image alignment', 'sobari_sc' ),
	'value'			=> array(
		__( 'Center', 'sobari_sc' )	=> 'uk-text-center',
		__( 'Left', 'sobari_sc' )		=> 'uk-text-left',
		__( 'Right', 'sobari_sc' )	=> 'uk-text-right',
	),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Image Style', 'sobari_sc' ),
	'param_name'	=> 'image_style',
	'description'	=> esc_attr__( 'Select image display style', 'sobari_sc' ),
	'value'			=> array(
		__( 'None', 'sobari_sc' )		=> '',
		__( 'Circle', 'sobari_sc' )		=> 'uk-border-circle',
		__( 'Rounded', 'sobari_sc' )	=> 'uk-border-rounded',
	),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Image Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_box_shadow',
	'description'	=> esc_attr__( 'Select image box shadow style', 'sobari_sc' ),
	'value'			=> array(
		__( 'None', 'sobari_sc' )			=> '',
		__( 'Small', 'sobari_sc' )			=> 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )			=> 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )			=> 'uk-box-shadow-large',
		__( 'Extra Large', 'sobari_sc' )	=> 'uk-box-shadow-xlarge',
	),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Add Extra Bottom Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_bottom_shadow',
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Image Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_hover_box_shadow',
	'description'	=> esc_attr__( 'Select image box shadow hover style', 'sobari_sc' ),
	'value'			=> array(
		__( 'None', 'sobari_sc' )			=> '',
		__( 'Small', 'sobari_sc' )			=> 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )			=> 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )			=> 'uk-box-shadow-hover-large',
		__( 'Extra Large', 'sobari_sc' )	=> 'uk-box-shadow-hover-xlarge',
	),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-3' )
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Icon Alignment', 'sobari_sc' ),
	'param_name'	=> 'icon_alignment',
	'description'	=> esc_attr__( 'Select button play alignment', 'sobari_sc' ),
	'value'			=> array(
		__( 'Center', 'sobari_sc' )	=> 'uk-text-center',
		__( 'Left', 'sobari_sc' )	=> 'uk-text-left',
		__( 'Right', 'sobari_sc' )	=> 'uk-text-right',
	),
	'dependency'	=> array(
		'element'	=> 'video_popup_style',
		'value'		=> array( 'layout-1', 'layout-2' )
	)
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Text', 'sobari_sc' ),
	'param_name'	=> 'enable_text',
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Link Text', 'sobari_sc' ),
	'param_name'	=> 'link_text',
	'description'	=> esc_attr__( 'Text display for your link', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_text',
		'not_empty'	=> true,
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Text Position', 'sobari_sc' ),
	'param_name'	=> 'text_position',
	'description'	=> esc_attr__( 'Select text location', 'sobari_sc' ),
	'value'			=> array(
		__( 'After', 'sobari_sc' )	=> 'after',
		__( 'Before', 'sobari_sc' )	=> 'before',
		__( 'Under', 'sobari_sc' )	=> 'under',
		__( 'Above', 'sobari_sc' )	=> 'above',
	),
	'dependency'	=> array(
		'element'	=> 'enable_text',
		'not_empty'	=> true,
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Element Tag', 'sobari_sc' ),
	'param_name'	=> 'tag',
	'description'	=> esc_attr__( 'Select element Tag', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'tag' ),
	'dependency'	=> array(
		'element'	=> 'enable_text',
		'not_empty'	=> true,
	)
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
	'param_name'	=> 'text_color',
	'dependency'	=> array(
		'element'	=> 'enable_text',
		'not_empty'	=> true,
	)
);
return $param;
