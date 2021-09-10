<?php

$param = array(
	'name'			=> esc_attr__( 'Team Member', 'upsob_sc' ),
	'base'			=> 'team_member',
	'category'	=> array( 'Content' ),
	'description'	=> esc_attr__( 'Add a team member element', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-team-member.svg",
	'params'		=> array(),
);

$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Member Picture', 'upsob_sc' ),
	'param_name'	=> 'member_picture',
	'description'	=> esc_attr__( 'Select image from media library', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Member Name', 'upsob_sc' ),
	'param_name'	=> 'member_name',
	'std'			=> 'John Doe',
	'description'	=> esc_attr__( 'Insert member name', 'upsob_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Item Name Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'name_tag',
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'h6',
	'value'			=> array(
		__( 'H2', 'upsob_sc' )	=> 'h2',
		__( 'H3', 'upsob_sc' )	=> 'h3',
		__( 'H4', 'upsob_sc' )	=> 'h4',
		__( 'H5', 'upsob_sc' )	=> 'h5',
		__( 'H6', 'upsob_sc' )	=> 'h6',
		__( 'p', 'upsob_sc' )	=> 'p',
	)
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Member Role', 'upsob_sc' ),
	'param_name'	=> 'member_role',
	'std'			=> 'CEO',
	'description'	=> esc_attr__( 'Insert member role', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textarea',
	'heading'		=> esc_attr__( 'About Member', 'upsob_sc' ),
	'param_name'	=> 'about_member',
	'std'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in leo vitae mauris feugiat condimentum et ut augue',
	'description'	=> esc_attr__( 'Insert member bio', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'vc_link',
	'heading'		=> esc_attr__( 'Team Member Link URL', 'upsob_sc' ),
	'param_name'	=> 'member_link',
	'description'	=> esc_attr__( 'Please enter the URL for your team member link', 'upsob_sc' ),
);
# Start Social Link
$socials = array(
	array('Facebook', '#'),
	array('Twitter', '#'),
	array('Google Plus', '#'),
	array('Pinterest', ''),
	array('LinkedIn', ''),
	array('Instagram', ''),
	array('Youtube', ''),
	array('Snapchat', ''),
	array('Dribbble', ''),
	array('Tumblr', ''),
	array('Email Address', '')
);

foreach ($socials as $key => $value) {
	$param['params'][] = array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( sprintf( '%s Link', $value[0] ), 'upsob_sc' ),
		'param_name'	=> 'social_'. str_replace( ' ', '_', strtolower( $value[0] ) ),
		'description'	=> esc_attr__( sprintf( 'Insert member %s url', strtolower( $value[0] ) ), 'upsob_sc' ),
		'std'			=> $value[1],
		'group'			=> __( 'Social Link', 'upsob_sc' )
	);
}
$param['params'][] = array(
	'type'			=> 'radio_image',
	'heading'		=> esc_attr__( 'Team Member Style', 'upsob_sc' ),
	'param_name'	=> 'team_member_style',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'std'			=> 'simple',
	'description'	=> esc_attr__( 'choose team member style', 'upsob_sc' ),
	'value'			=> array(
		'simple'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_team-member-style-1.svg",
		'hover_centered_text'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_team-member-style-2.svg",
		'hover_slide_in_text'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_team-member-style-3.svg"
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Team Member Text alignment', 'upsob_sc' ),
	'param_name'	=> 'text_alignment',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'description'	=> esc_attr__( 'choose team member text alignment', 'upsob_sc' ),
	'std'			=> 'uk-text-left',
	'value'			=> array(
		__( 'Left', 'upsob_sc' ) 	=> 'uk-text-left',
		__( 'Right', 'upsob_sc' ) 	=> 'uk-text-right',
		__( 'Center', 'upsob_sc' ) 	=> 'uk-text-center',
	),
	'dependency'	=> array(
		'element'	=> 'team_member_style',
		'value'		=> 'simple'
	),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Custom Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_1',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'team_member_style',
		'value'		=> 'simple'
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Custom Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_2',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'team_member_style',
		'value'		=> 'hover_centered_text'
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Custom Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_3',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'team_member_style',
		'value'		=> 'hover_slide_in_text'
	),
);
//style 1
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Name Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_1_name_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_1',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Role & Bio Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_1_role_bio_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_1',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Social Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_1_social_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_1',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Link Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_1_hover_link_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_1',
		'not_empty'	=> true
	),
);
//style 2
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Text Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_2_hover_text_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_2',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Color Overlay 1', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_2_hover_color_overlay_1',
	'std'			=> 'rgba(0,0,0,.4)',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_2',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Color Overlay 2', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_2_hover_color_overlay_2',
	'std'			=> 'rgba(0,0,0,.2)',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_2',
		'not_empty'	=> true
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
	'param_name'	=> 'custom_color_style_2_gradient_direction',
	'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
	'std'			=> 'to top',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_2',
		'not_empty'	=> true
	),
);

//style 3
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Name Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_3_name_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_3',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Role & Bio Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_3_role_bio_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_3',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Text Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_3_hover_text_color',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color_style_3',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Color Overlay 1', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_3_hover_color_overlay_1',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'std'			=> 'rgba(0,0,0,.4)',
	'dependency'	=> array(
		'element'	=> 'custom_color_style_3',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Hover Color Overlay 2', 'upsob_sc' ),
	'param_name'	=> 'custom_color_style_3_hover_color_overlay_2',
	'group'			=> __( 'Style', 'sobari_sc' ),
	'std'			=> 'rgba(0,0,0,.2)',
	'dependency'	=> array(
		'element'	=> 'custom_color_style_3',
		'not_empty'	=> true
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
	'param_name'	=> 'custom_color_style_3_gradient_direction',
	'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
	'group'			=> __( 'Style', 'sobari_sc' ),
	'std'			=> 'to top',
	'dependency'	=> array(
		'element'	=> 'custom_color_style_3',
		'not_empty'	=> true
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Image Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-xlarge',
	),
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'team_member_style',
		'value'		=> 'hover_centered_text'
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Image Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_hover_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-hover-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-hover-xlarge',
	),
	'group'			=> __( 'Style', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'team_member_style',
		'value'		=> 'hover_centered_text'
	),
);

# End of Social Link
return $param;
