<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

# setup section attributes
$section_attributes = array();

# setup section classes
$section_classes = array( 'de-section uk-section', $section_visibility );

$shape_top_divider = dahz_shortcode_get_shape_divider(
	$dahz_id,
	$section_top_shape_divider,
	$section_top_shape_divider_color,
	$section_top_shape_divider_height,
	$section_top_shape_divider_enable_bring_to_front,
	'top'
);

$shape_bottom_divider = dahz_shortcode_get_shape_divider(
	$dahz_id,
	$section_bottom_shape_divider,
	$section_bottom_shape_divider_color,
	$section_bottom_shape_divider_height,
	$section_bottom_shape_divider_enable_bring_to_front,
	'bottom'
);

$overlay_element = dahz_shortcode_get_builder_overlay(
	$section_color_overlay,
	$section_color_overlay_2,
	$section_enable_gradient,
	$section_gradient_direction
);

$section_classes[] = !empty( $shape_bottom_divider ) || !empty( $shape_top_divider ) || !empty( $overlay_element ) ? 'uk-position-relative' : '';


# setup section styles
$section_styles = array();

# setup section parallax
$section_parallax = array();

# GENERAL TAB
	# section padding
	if ( !empty( $section_padding ) ) {
		$section_classes[] = $section_padding;
	}

	# remove padding top
	if ( !empty( $section_remove_top_padding ) ) {
		$section_classes[] = 'uk-padding-remove-top';
	}

	# remove padding bottom
	if ( !empty( $section_remove_bottom_padding ) ) {
		$section_classes[] = 'uk-padding-remove-bottom';
	}

	# disable element
	if ( !empty( $disable_element ) ) {
		$section_classes[] = 'uk-hidden';
	}
# END OF GENERAL TAB

# DESIGN OPTION TAB
	# custom media
	if ( !empty( $section_custom_media_type ) ) {
		switch ( $section_custom_media_type ) {
			case 'image':
				# image source
				if ( !empty( $section_background_image ) ) {
					$image = '';

					if ( !empty( $section_background_width ) || !empty( $section_background_height ) ) {
						$image = wpb_resize( $section_background_image, null, $section_background_width, $section_background_height, true );

						$image = $image['url'];

						if ( empty( $image ) ) {
							$image = wp_get_attachment_image_url( $section_background_image, 'full' );
						}
					} else {
						$image = wp_get_attachment_image_url( $section_background_image, 'full' );
					}

					$section_styles[] = "background-image: url({$image});";
				}

				# image size
				if ( !empty( $section_background_image_size ) ) {
					$section_classes[] = $section_background_image_size;
				}

				# image repeat
				if ( !empty( $section_background_image_repeat ) ) {
					$section_classes[] = $section_background_image_repeat;
				}

				# image position
				if ( !empty( $section_background_image_position ) ) {
					$section_classes[] = $section_background_image_position;
				}

				# image effect
				if ( !empty( $section_background_image_effect ) ) {
					$section_classes[] = $section_background_image_effect;
				}

				# image visibility
				if ( !empty( $section_background_image_visibility ) ) {
					$section_classes[] = "uk-background-image{$section_background_image_visibility}";
				}

				# image blend
				if ( !empty( $section_background_blend_mode ) ) {
					$section_classes[] = $section_background_blend_mode;
				}

				# image effect parallax
				if ( $section_background_image_effect == 'parallax' ) {
					$section_parallax[] = dahz_shortcode_get_parallax_option( $section_background_image_parallax, true );
				}
				break;
			case 'video':
				#
				$section_classes[] = 'uk-cover-container';
				break;
		}
	}
# END OF DESIGN OPTION TAB

# SECTION
	# add column ID
	if ( !empty( $el_id ) ) {
		$section_attributes['id'] = $el_id;
	}

	# extra class
	if ( !empty( $el_class ) ) {
		$el_class = $this->getExtraClass( $el_class );

		$section_classes[] = $el_class;
	}

	# add css
	if ( !empty( $css ) ) {
		$section_styles[] = dahz_shortcode_parse_css( $css );
	}

	# add section class
	if ( !empty( $section_classes ) ) {
		$section_attributes['class'] = $section_classes;
	}

	# add section style
	if ( !empty( $section_styles ) ) {
		$section_attributes['style'] = $section_styles;
	}

	#
	if ( !empty( $section_parallax ) ) {
		$section_attributes['data-uk-parallax'] = $section_parallax;
	}
# END OF SECTION

?>
<div <?php
	dahz_shortcode_set_attributes(
		$section_attributes,
		$this->settings['base'] . '_section',
		$atts
	); ?>>
	<?php dahz_shortcode_get_builder_background_video(
		$section_custom_media_type,
		$section_background_video_url,
		// $section_background_video_enable_parallax,
		// $section_background_video_parallax,
		$section_background_width,
		$section_background_height,
		$section_video_blend_mode,
		true
	); ?>
	<?php echo $overlay_element;?>
	<?php echo $shape_top_divider;?>
	<?php echo $shape_bottom_divider;?>
	<?php echo wpb_js_remove_wpautop( $content ); ?>
</div>