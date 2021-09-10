<?php
/**
* KW
*/
$param = array(
	'name'				=> esc_attr__( 'Image Carousel', 'sobari_sc' ),
	'base'				=> 'image_carousel',
	'description'		=> esc_attr__( 'Displaying image as carousel', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/Image-Carousel.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'attach_images',
	'heading'		=> esc_attr__( 'Images', 'sobari_sc' ),
	'param_name'	=> 'images',
	'description'	=> esc_attr__( 'Images', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Image Size', 'sobari_sc' ),
	'param_name'	=> 'image_size',
	'description'	=> esc_attr__( 'Image Size', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Show Navigation Arrow', 'sobari_sc' ),
	'param_name'	=> 'nav_arrow',
	'description'	=> esc_attr__( 'Show Navigation Arrow', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Arrow Position', 'sobari_sc' ),
	'param_name'	=> 'arrow_position',
	'value'			=> array(
		'Inside'	=> 'inside',
		'Outside'	=> 'outside',
	),
	'description'	=> esc_attr__( 'Arrow Position', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'nav_arrow',
		'value'		=> 'true',
	),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Show Navigation Dots', 'sobari_sc' ),
	'param_name'	=> 'nav_dots',
	'description'	=> esc_attr__( 'Show Navigation Dots', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$column = array(
	'1' => '1',
	'2' => '2',
	'3' => '3',
	'4' => '4',
	'5' => '5',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Desktop Column', 'sobari_sc' ),
	'param_name'	=> 'desktop_column',
	'value'			=> $column,
	'description'	=> esc_attr__( 'Desktop Column', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Small Desktop Column', 'sobari_sc' ),
	'param_name'	=> 'small_desktop_column',
	'value'			=> $column,
	'description'	=> esc_attr__( 'Small Desktop Column', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Mobile Column', 'sobari_sc' ),
	'param_name'	=> 'mobile_column',
	'value'			=> $column,
	'description'	=> esc_attr__( 'Mobile Column', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Slide To Scroll', 'sobari_sc' ),
	'param_name'	=> 'slide_to_scroll',
	'value'			=> $column,
	'description'	=> esc_attr__( 'Slide To Scroll', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Center Mode', 'sobari_sc' ),
	'param_name'	=> 'enable_center_mode',
	'description'	=> esc_attr__( 'Enable Center Mode', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Center Padding', 'sobari_sc' ),
	'param_name'	=> 'center_padding',
	'description'	=> esc_attr__( 'Center Padding', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_center_mode',
		'value'		=> 'true',
	),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Free Scroll', 'sobari_sc' ),
	'param_name'	=> 'enable_free_scroll',
	'description'	=> esc_attr__( 'Free Scroll', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Auto Play', 'sobari_sc' ),
	'param_name'	=> 'enable_auto_play',
	'description'	=> esc_attr__( 'Enable Auto Play', 'sobari_sc' ),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Auto Play Duration', 'sobari_sc' ),
	'param_name'	=> 'auto_play_duration',
	'description'	=> esc_attr__( 'Auto Play Duration', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_auto_play',
		'value'		=> 'true',
	),
	'group'			=> esc_attr__( 'Carousel Options', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'value'			=> array(
		'None' 				=> 'none',
		'Small Depth' 		=> 'small_depth',
		'Medium Depth' 		=> 'medium_depth',
		'Large Depth' 		=> 'large_depth',
		'Very Large Depth' 	=> 'very_large_depth',
	),
	'description'	=> esc_attr__( 'Box Shadow', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'On Click', 'sobari_sc' ),
	'param_name'	=> 'on_click',
	'value'			=> array(
		'Do Nothing' 		=> 'none',
		'Open Lightbox' 	=> 'lightbox',
		'Open Custom Link' 	=> 'custom_link',
	),
	'description'	=> esc_attr__( 'On Click', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textarea',
	'heading'		=> esc_attr__( 'Custom Link', 'sobari_sc' ),
	'param_name'	=> 'custom_link',
	'description'	=> esc_attr__( 'Custom Link', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'on_click',
		'value'		=> 'custom_link'
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Custom Link Target', 'sobari_sc' ),
	'param_name'	=> 'custom_link_target',
	'description'	=> esc_attr__( 'Custom Link Target', 'sobari_sc' ),
	'value'			=> array(
		'Same Window'	=> '_self',
		'New Window'	=> '_blank'
	),
	'dependency'	=> array(
		'element'	=> 'on_click',
		'value'		=> 'custom_link'
	)
);

return $param;