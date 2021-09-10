<?php

/*  */

# setup container attribute
$container_attributes = array();

# setup container class
$container_classes = array( $extra_class, 'ms-section', $background_color );

$overlay_element = dahz_shortcode_get_builder_overlay(
	$color_overlay,
	$color_overlay_2,
	$enable_gradient,
	$gradient_direction
);

$container_classes[] = ! empty( $overlay_element ) ? 'uk-position-relative' : '';

# setup container style
$container_styles = array();

# DESIGN OPTION
	if ( !empty( $custom_media_type ) ) {
		switch ( $custom_media_type ) {
			case 'image':
				# image source
				if ( !empty( $background_image ) ) {
					$image = '';

					if ( !empty( $background_width ) || !empty( $background_height ) ) {
						$image = wpb_resize( $background_image, null, $background_width, $background_height, true );

						$image = $image['url'];
					} else {
						$image = wp_get_attachment_image_url( $background_image, 'full' );
					}

					$container_styles[] = "background-image: url({$image});";
				}

				# image size
				if ( !empty( $background_image_size ) ) {
					$container_classes[] = $background_image_size;
				}

				# image repeat
				if ( !empty( $background_image_repeat ) ) {
					$container_classes[] = $background_image_repeat;
				}

				# image position
				if ( !empty( $background_image_position ) ) {
					$container_classes[] = $background_image_position;
				}

				# image effect
				if ( !empty( $background_image_effect ) ) {
					$container_classes[] = $background_image_effect;
				}

				# image visibility
				if ( !empty( $background_image_visibility ) ) {
					$container_classes[] = "uk-background-image{$background_image_visibility}";
				}

				# image blend
				if ( !empty( $background_blend_mode ) ) {
					$container_classes[] = $background_blend_mode;
				}

				# image effect parallax
				if ( $background_image_effect == 'parallax' ) {
					$container_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $background_image_parallax, true );
				}
				break;
			case 'video':
				#
				$container_classes[] = 'uk-cover-container';
				break;
		}
	}
# END OF DESIGN OPTION

# CONTAINER
	$css = dahz_shortcode_parse_css( $css );

	# handle background if there is no background props
	$css .= strpos( $css, 'background-color' ) === false ? 'background-color:#ffffff;' : '';

	$container_styles[] = $css;

	# add container class
	if ( !empty( $container_classes ) ) {
		$container_attributes['class'] = $container_classes;
	}

	# add container style
	if ( !empty( $container_styles ) ) {
		$container_attributes['style'] = $container_styles;
	}

	# add midnight data
	$container_attributes['data-midnight'] = !empty( $background_color ) ? $background_color : 'default' ;
# END OF CONTAINER

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'split_slider_item_container'
	); ?>>
	<?php dahz_shortcode_get_builder_background_video(
		$custom_media_type,
		$background_video_url,
		// $background_video_enable_parallax,
		// $background_video_parallax,
		$background_width,
		$background_height,
		$video_blend_mode,
		true
	); ?>
	<?php echo $overlay_element;?>
	<div class="uk-position-relative uk-position-z-index uk-flex uk-flex-middle uk-flex-center uk-height-1-1">
		<div class="uk-width-1-1">
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>