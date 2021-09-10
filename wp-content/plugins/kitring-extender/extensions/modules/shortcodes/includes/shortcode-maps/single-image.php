<?php
/**
*
*/

$param = array(
	'name'				=> esc_attr__( 'Single Image', 'sobari_sc' ),
	'base'				=> 'dahz_single_image',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Simple image with css animation', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-image.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Image Source', 'sobari_sc' ),
	'param_name' => 'image_source',
	'value'			=> array(
		'Media Library'	    => 'media_library',
		'External Link'     => 'external_link',
		'Featured Image' 	=> 'featured_image',
	),
	'description'	=> esc_attr__( 'Select image source', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image', 'upsob_sc' ),
	'param_name'	=> 'image_id',
	'description'	=> esc_attr__( 'Select image from media library', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'image_source',
		'value'		=> 'media_library'
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'External Link', 'sobari_sc' ),
	'param_name'	=> 'external_link',
	'description'	=> esc_attr__( 'Select external link', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'image_source',
		'value'		=> 'external_link'
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Image Size', 'sobari_sc' ),
	'param_name'	=> 'image_size',
	'description'	=> esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height))', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Image Alt', 'sobari_sc' ),
	'param_name'	=> 'image_alt',
	'description'	=> esc_attr__( "Enter the image's alt attribute", 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'image_source',
		'value'		=> 'external_link'
	),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Image Alignment', 'sobari_sc' ),
	'param_name' => 'image_alignment',
	'value'			=> array(
		'Left'		=> 'left',
		'Center' 	=> 'center',
		'Right' 	=> 'right',
	),
	'description'	=> esc_attr__( 'Select image alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'de_link',
	'heading'		=> esc_attr__( 'Image Link', 'upsob_sc' ),
	'param_name'	=> 'image_link',
	'description'	=> esc_attr__( 'Enter URL if you want this image to have a link', 'sobari_sc' ),
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Link Target', 'upsob_sc' ),
	'param_name' => 'link_target',
	'value'			=> array(
		'Same Window'	=> '_self',
		'New Window' 	=> '_blank',
		'Modal' 	    => 'modal',
		'Scroll' 	    => 'scroll'
	)
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Image Style', 'upsob_sc' ),
	'param_name' => 'image_style',
	'value'			=> array(
		'None'	    => '',
		'Circle' 	=> 'uk-border-circle',
		'Rounded' 	=> 'uk-border-rounded',
	),
	'group'      => esc_attr__( 'Setting', 'upsob_sc' )
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Image Box Shadow', 'upsob_sc' ),
	'param_name' => 'image_box_shadow',
	'value'			=> array(
		'None'	    => '',
		'Small' 	=> 'uk-box-shadow-small',
		'Medium' 	=> 'uk-box-shadow-medium',
		'Large' 	=> 'uk-box-shadow-large',
		'X-large' 	=> 'uk-box-shadow-xlarge',
	),
	'group'      => esc_attr__( 'Setting', 'upsob_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Add extra bottom shadow', 'upsob_sc' ),
	'param_name'	=> 'enable_extra_bottom_shadow',
	'group'      => esc_attr__( 'Setting', 'upsob_sc' )
);
$param['params'][] = array(
	'type' => 'dropdown',
	'heading' => esc_attr__( 'Image Hover Box Shadow', 'upsob_sc' ),
	'param_name' => 'image_hover_box_shadow',
	'value'			=> array(
		'None'	    => '',
		'Small' 	=> 'uk-box-shadow-hover-small',
		'Medium' 	=> 'uk-box-shadow-hover-medium',
		'Large' 	=> 'uk-box-shadow-hover-large',
		'X-large' 	=> 'uk-box-shadow-hover-xlarge',
	),
	'group'      => esc_attr__( 'Setting', 'upsob_sc' )
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Modal Width', 'upsob_sc' ),
	'param_name'	=> 'modal_width',
	"edit_field_class"	=> 'vc_col-sm-6',
	'group'         => esc_attr__( 'Setting', 'upsob_sc' )
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Modal Height', 'upsob_sc' ),
	'param_name'	=> 'modal_height',
	"edit_field_class"	=> 'vc_col-sm-6',
	'group'         => esc_attr__( 'Setting', 'upsob_sc' )
);
return $param;
