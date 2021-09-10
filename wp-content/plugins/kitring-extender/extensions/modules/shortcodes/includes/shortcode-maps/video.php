<?php
/**
* KW
*/

$param = array(
	'name'				=> esc_attr__( 'Video', 'sobari_sc' ),
	'base'				=> 'video',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Embed Youtube or Vimeo player', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-video.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Video Link', 'sobari_sc' ),
	'param_name'	=> 'video_link',
	'description'	=> esc_attr__( 'Select a video file or enter a link from YouTube or Vimeo', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			    => 'textfield',
	'heading'		    => esc_attr__( 'Video Width', 'sobari_sc' ),
	'param_name'	    => 'video_width',
	"edit_field_class"	=> 'vc_col-sm-6',
	'description'	    => esc_attr__( 'Set the video dimension', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			    => 'textfield',
	'heading'		    => esc_attr__( 'Video Height', 'sobari_sc' ),
	'param_name'	    => 'video_height',
	"edit_field_class"	=> 'vc_col-sm-6',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Video Alignment', 'sobari_sc' ),
	'param_name'	=> 'video_alignment',
	'value'			=> array(
		'Left'      => 'left',
		'Center'    => 'center',
		'Right'     => 'right'
	),
	'description'	=> esc_attr__( 'Select video alignment', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Show Controls', 'sobari_sc' ),
	'param_name'	=> 'show_controls',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Autoplay', 'sobari_sc' ),
	'param_name'	=> 'enable_autoplay',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Loop Video', 'sobari_sc' ),
	'param_name'	=> 'loop_video',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Mute Video', 'sobari_sc' ),
	'param_name'	=> 'mute_video',
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Play inline on mobile devices', 'sobari_sc' ),
	'param_name'	=> 'mobile_play_inline',
	'description'	=> esc_attr__( 'Allow video autoplay in mobile', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Cover Video', 'sobari_sc' ),
	'param_name'	=> 'cover_video',
);
$param['params'][] = array(
	'type'			=> 'attach_images',
	'heading'		=> esc_attr__( 'Video Image Fallback', 'sobari_sc' ),
	'param_name'	=> 'video_image_fallback',
	'description'	=> esc_attr__( 'Select an optional image which shows up until the video plays. If not selected the first video frame is shown as the poster frame.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Video Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'video_box_shadow',
	'value'			=> array(
		'None'      => 'uk-box-shadow-none',
		'Small'     => 'uk-box-shadow-small',
		'Medium'    => 'uk-box-shadow-medium',
		'Large'     => 'uk-box-shadow-large',
		'X-large'   => 'uk-box-shadow-xlarge'
	),
	'description'	=> esc_attr__( 'Select image box shadow style', 'sobari_sc' ),
	'group'         => __( 'Styling', 'sobari_sc' )
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Add extra bottom shadow', 'sobari_sc' ),
	'param_name'	=> 'enable_extra_shadow',
	'group'         => __( 'Styling', 'sobari_sc' )
);
return $param;
