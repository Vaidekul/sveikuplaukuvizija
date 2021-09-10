<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Before And After', 'sobari_sc' ),
	'base'				=> 'before_after',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Show before & after pirctures', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-before-after.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image Before', 'sobari_sc' ),
	'param_name'	=> 'image_before',
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Image After', 'sobari_sc' ),
	'param_name'	=> 'image_after',
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Divider Color', 'upsob_sc' ),
	'std'			=> 'rgba(206,206,206,0.34)',
	'param_name'	=> 'divider_color',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'slider',
	'param_name'	=> 'divider_width',
	'heading'		=> __( 'Divider Width', 'sobari_sc' ),
	'description'	=> __( 'Setting for divider width', 'sobari_sc' ),
	'std'			=> '1',
	'settings'		=> array(
		'min'		=> 1,
		'max'		=> 6,
		'step'		=> 1,
	),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Marker Color', 'upsob_sc' ),
	'param_name'	=> 'marker_color',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Active Marker Color', 'upsob_sc' ),
	'param_name'	=> 'active_marker_color',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Icon Color', 'upsob_sc' ),
	'param_name'	=> 'icon_color',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Active Icon Color', 'upsob_sc' ),
	'param_name'	=> 'active_icon_color',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Original Text', 'upsob_sc' ),
	'param_name'	=> 'original_text',
	'std'			=> 'Original',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Modified Text', 'upsob_sc' ),
	'param_name'	=> 'modified_text',
	'std'			=> 'Modified',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Original Text Color', 'upsob_sc' ),
	'param_name'	=> 'original_text_color',
	'std'			=> '#000000',
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Modified Text Color', 'upsob_sc' ),
	'param_name'	=> 'modified_text_color',
	'std'			=> '#000000',
	'edit_field_class'	=> 'vc_col-sm-6'
);


return $param;
