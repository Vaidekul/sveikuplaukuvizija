<?php

$parent_tag = vc_post_param( 'parent_tag', '' );

$include_icon_params = ( 'vc_tta_pageable' !== $parent_tag );

if ( $include_icon_params ) {

	require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-icon-element.php' );

	$icon_params = array(
		array(
			'type' => 'checkbox',
			'param_name' => 'add_icon',
			'heading' => __( 'Add icon?', 'js_composer' ),
			'description' => __( 'Add icon next to section title.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'i_position',
			'value' => array(
				__( 'Left', 'js_composer' ) => 'left',
				__( 'Right', 'js_composer' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
			'heading' => __( 'Icon position', 'js_composer' ),
			'description' => __( 'Select icon position.', 'js_composer' ),
		),
	);
	$icon_params = array_merge( $icon_params, (array) vc_map_integrate_shortcode( vc_icon_element_params(), 'i_', '', array(
			// we need only type, icon_fontawesome, icon_.., NOT color and etc
			'include_only_regex' => '/^(type|icon_\w*)/',
		), array(
			'element' => 'add_icon',
			'value' => 'true',
		) ) );
} else {
	$icon_params = array();
}

$params = array_merge( $icon_params, array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		),
	)
);
//if( 'vc_tta_tabs' == $parent_tag ){

	$params = array_merge( array( array(
		'type'			=> 'attach_image',
		'heading'		=> esc_attr__( 'Image Thumbnav', 'sobari_sc' ),
		'param_name'	=> 'image_thumbnav',
		'description'	=> __( 'image thumbnav for tab thumbnav layout.', 'sobari_sc' )
	) ), $params );

//}

if( 'vc_tta_pageable' !== $parent_tag ){

	$params = array_merge( array( array(
		'type' => 'textfield',
		'param_name' => 'title',
		'heading' => __( 'Title', 'js_composer' ),
		'description' => __( 'Enter section title (Note: you can leave it empty).', 'js_composer' ),
	),
	array(
		'type' => 'el_id',
		'param_name' => 'tab_id',
		'settings' => array(
			'auto_generate' => true,
		),
		'heading' => __( 'Section ID', 'js_composer' ),
		'description' => __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
	) ), $params );

}

return $params;
