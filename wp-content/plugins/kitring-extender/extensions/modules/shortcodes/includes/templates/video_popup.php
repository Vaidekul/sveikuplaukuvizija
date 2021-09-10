<?php
/**
 * Video Pop Up Shortcode Template Output
 *
 * @since 1.0
 * @package Dahz-sobari-shortcode
 * @author Dahz - Rama
 */

/*
min_height
background_color
background_image
color_overlay
video_url
button_type
content_padding
content_title
content_title_tag_name
content_title_size
content
content_margin_bottom
content_color
enable_border
border_size
border_color
show_hover_text
*/
$background_image = ( isset( $background_image ) ? $background_image : '' );
$bg_img  = wp_get_attachment_url( $background_image );
$hover   = ( true == $show_hover_text ) ? 'de-sc-video-popup__text--hover' : '';
$icon_html = '';
$video_source = '';
$buttonIcon = '';
$content_title = ( isset( $content_title ) ? $content_title : '' );
$video_url = ( isset( $video_url ) ? $video_url : '' );

if ( strpos( $video_url, 'youtube' ) !== false ) {
	wp_register_script( 'youtube-api', 'https://www.youtube.com/iframe_api', array('jquery'), '', true);
	wp_enqueue_script('youtube-api');
}

if( $is_use_icon ){
	vc_icon_element_fonts_enqueue( $icon_type );

	$icon_wrapper = false;

	$button_html = '';

	if ( isset( ${'icon_' . $icon_type} ) ) {
		if ( 'pixelicons' === $icon_type ) {
			$icon_wrapper = true;
		}
		$icon_class = ${'icon_' . $icon_type};
	} else {
		$icon_class = 'fa fa-adjust';
	}

	if ( $icon_wrapper ) {
		$icon_html = '<i class="vc_btn3-icon"><span class="vc_btn3-icon-inner ' . esc_attr( $icon_class ) . '"></span></i>';
	} else {
		$icon_html = '<i class="vc_btn3-icon ' . esc_attr( $icon_class ) . '"></i>';
	}

}

switch ( $button_type ) {
	case 'image':
		$image = wp_get_attachment_url( $image_icon );
		$buttonIcon = sprintf('
				<img src="%1$s" alt="image">
			',
			$image
		);
		break;
	case 'icon':
		$buttonIcon = $icon_html;
		break;
}

$unique_id = uniqid();

if ( strpos( $video_url, 'vimeo' ) !== false ) {
	$video_source = 'vimeo';
} else if ( strpos( $video_url, 'youtube' ) !== false ) {
	$video_source = 'youtube';
}

if ( $enable_autoplay == 'true' ) {
	$dataAutoplay = 'true';
} else {
	$dataAutoplay = 'false';
}

$content = preg_replace('~</?p[^>]*>~', '', $content);

$output  = '';
$output .= sprintf(
	'
	<div id="de-vd-popup-%2$s" class="de-sc-video-popup" >
		<div class="de-sc-video-popup__container">
			<div class="de-sc-video-popup-bg-image de-sc-overlay"></div>
			<div class="de-sc-video-popup-bg-color de-sc-overlay"></div>
			<div class="de-sc-video-popup__content"  video-autoplay="%3$s" data-uk-lightbox>
				<div class="de-sc-video-popup__content-text %1$s">
	',
	$hover,
	$key,
	esc_attr( $dataAutoplay )
);
$output .= sprintf(
	'
				<%1$s class="de-sc-video-popup__title">%2$s</%1$s>
				<p class="de-sc-video-popup__caption">%3$s</p>
	',
	$content_title_tag_name,
	$content_title,
	$content
);
$output .= sprintf('
							<a class="de-sc-video-popup__btn" href="%3$s" data-open="de-sc-video-popup__%1$s">%2$s</a>
						</div>
					</div>
				</div>
				<div id="de-sc-video-popup__%1$s" class="de-sc-video-popup__modal reveal full" data-reveal data-options="closeOnClick:false;" >
					<div class="de-sc-video-popup__modal-container">
						<div class="de-sc-video-popup__modal-item">
							<div class="de-sc-video-popup__modal-media">
								<a class="de-sc-video-popup__modal-close" data-close><span class="df-delete-x"></span></a>
								<div id="%1$s" class="de-sc-video-popup__video de-aspect-ratio__content" data-url="%3$s" data-type="%4$s"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		',
		$unique_id,
		$buttonIcon,
		esc_url( $video_url ),
		$video_source,
		__('Fullscreen', 'sobari')
);

if ( strpos( $video_url, 'vimeo' ) !== false ) {
	$output = str_replace( '" width="640" height="360" ', '?autoplay=1&loop=1&controls=0" width="640" height="360"', $output );
} else if ( strpos( $video_url, 'youtube' ) !== false ) {
	$output = str_replace( '?feature=oembed" ', '?featured=oembed&autoplay=0"', $output );
}
echo $output;
