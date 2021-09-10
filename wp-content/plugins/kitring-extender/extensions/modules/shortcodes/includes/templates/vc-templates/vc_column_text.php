<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => css
[1] => row_custom_media_type
[2] => row_background_image
[3] => row_background_width
[4] => row_background_height
[5] => row_background_image_size
[6] => row_background_image_repeat
[7] => row_background_image_position
[8] => row_background_image_effect
[9] => row_background_image_parallax
[10] => row_background_video_url
[11] => row_background_video_enable_parallax
[12] => row_background_video_parallax
[13] => row_background_image_visibility
[14] => row_background_blend_mode
[15] => row_color_overlay
[16] => row_enable_gradient
[17] => row_color_overlay_2
[18] => row_gradient_direction
[19] => row_overlay_strength
[20] => css_animation
[21] => animation_parallax
[22] => delay_animation
[23] => repeat_animation
[24] => el_class
[25] => margin
[26] => remove_top_margin
[27] => remove_bottom_margin
[28] => visibility
[29] => enable_dahz_lazy_shortcode
*/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

$background = '';

# setup container attribute
$container_attributes = array();
$wrapper_attributes = array( 'class' => array( 'de-textblock-wrapper' ) );
# setup container attribute class
$container_classes = array( $visibility );

$overlay_element = dahz_shortcode_get_builder_overlay(
	$row_color_overlay,
	$row_color_overlay_2,
	$row_enable_gradient,
	$row_gradient_direction,
	$row_overlay_strength
);

$container_classes[] = ! empty( $overlay_element ) ? 'uk-position-relative' : '';

if( !empty( $css_animation ) && $css_animation !== 'none' ){

	if( $css_animation == 'parallax'  ){
		$wrapper_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $animation_parallax );
		$wrapper_attributes['class'][] = dahz_shortcode_get_parallax_class( $animation_parallax );
	} else {
		$wrapper_attributes['data-uk-scrollspy'] = array( 'cls:' . $css_animation . ';' );
		if( !empty( $delay_animation ) ) $wrapper_attributes['data-uk-scrollspy'][] = 'delay:' . $delay_animation . ';';
		if( !empty( $repeat_animation ) ) $wrapper_attributes['data-uk-scrollspy'][] = 'repeat:true;';
	}
	
}

# setup container attribute style
$container_attributes['style'] = array( dahz_shortcode_parse_css( $css ) );

# setup sticky row attribute

# GENERAL TAB
	# row margin
	if ( !empty( $margin ) ) $container_classes[] = $margin;

	# remove margin top
	if ( !empty( $remove_top_margin ) ) $container_classes[] = 'uk-margin-remove-top';

	# remove margin bottom
	if ( !empty( $remove_bottom_margin ) ) $container_classes[] = 'uk-margin-remove-bottom';

# END OF GENERAL TAB

# DESIGN OPTION TAB
	# custom media
	if ( !empty( $row_custom_media_type ) ) {
		switch ( $row_custom_media_type ) {
			case 'image':
				# image source
				if ( !empty( $row_background_image ) ) {
					$image = '';

					if ( !empty( $row_background_width ) || !empty( $row_background_height ) ) {
						$image = wpb_resize( $row_background_image, null, $row_background_width, $row_background_height, true );

						$image = $image['url'];
					} else {
						$image = wp_get_attachment_image_url( $row_background_image, 'full' );
					}

					$container_attributes['style'][] = sprintf( 'background-image: url(%s);', $image );

					# image size
					$container_classes[] = $row_background_image_size;

					# image repeat
					$container_classes[] = $row_background_image_repeat;

					# image position
					$container_classes[] = $row_background_image_position;

					# image effect
					$container_classes[] = $row_background_image_effect;

					# image effect parallax
					if ( $row_background_image_effect == 'parallax' ) $container_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $row_background_image_parallax, true );

					# image visibility
					$container_classes[] = sprintf( 'uk-background-image%s', $row_background_image_visibility );

					# image blend
					$container_classes[] = $row_background_blend_mode;
				}
				break;
			case 'video':
				$container_classes[] = 'uk-cover-container';
				break;
		}
	}
# END OF DESIGN OPTION TAB

# extra class
$el_class = $this->getExtraClass( $el_class );

$container_classes[] = $el_class;

# get container attribute class
$container_attributes['class'] = $container_classes;

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		$this->settings['base'] . '_container'
	); ?>>
	<?php dahz_shortcode_get_builder_background_video(
		$row_custom_media_type,
		$row_background_video_url,
		$row_background_video_enable_parallax,
		$row_background_video_parallax,
		$row_background_width,
		$row_background_height,
		$row_video_blend_mode,
		true
	); ?>
	<?php echo $overlay_element;?>
	<div <?php
	dahz_shortcode_set_attributes(
		$wrapper_attributes,
		$this->settings['base'] . '_wrapper'
	); ?>>
		<?php echo wpb_js_remove_wpautop( $content, true );?>
	</div>
</div>