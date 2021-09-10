<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

$html_tag_open  = !empty( $column_link ) ? sprintf( 'a href="%s"', esc_url( $column_link ) ) : 'div';

$html_tag_close = !empty( $column_link ) ? 'a' : 'div';

# setup column attribute
$column_attributes = array();

# setup column class
$column_classes = array( 'de-column de-column--inner uk-position-relative' );

# setup column style
$column_styles = array();

# setup column animation
$column_animation = array();

# setup sticky column attribute
$sticky_column_attributes = array();

# setup sticky column class
$sticky_column_classes = array( 'uk-flex uk-c-flex-stretch uk-width-1-1' );

# setup sticky column style
$sticky_column_styles = array();

# setup sticky column option
$sticky_column_options = array();

# setup content attribute
$content_attributes = array();

# setup content class
$content_classes = array( 'uk-width-1-1' );

$overlay_element = dahz_shortcode_get_builder_overlay(
	$column_color_overlay,
	$column_color_overlay_2,
	$column_enable_gradient,
	$column_gradient_direction
);

$content_classes[] = ! empty( $overlay_element ) ? 'uk-position-relative' : '';

# setup content style
$content_styles = array();

# setup content parallax
$content_parallax = array();

# GENERAL TAB
	# card style
	if ( !empty( $column_enable_card_style ) ) {
		$content_classes[] = 'uk-card uk-card-body uk-card-default';
	}

	# card box shadow
	if ( !empty( $column_card_box_shadow ) ) {
		$content_classes[] = "uk-box-shadow-{$column_card_box_shadow}";
	}

	# card extra box shadow
	if ( !empty( $column_card_enable_extra_bottom_shadow ) ) {
		$content_classes[] = 'uk-box-shadow-bottom';
	}

	# card background color hover
	// if ( !empty( $column_card_background_hover_color ) ) {
	// 	$content_styles[] = "--card-color-hover: {$column_card_background_hover_color};";
	// }

	# card box shadow hover
	if ( !empty( $column_card_hover_box_shadow ) ) {
		$content_classes[] = "uk-box-shadow-hover-{$column_card_hover_box_shadow}";
	}

	# column padding
	switch ( $column_padding ) {
		case 'default':
			$content_classes[] = 'uk-padding';
			break;
		case '':
			$content_classes[] = 'uk-padding-remove';
			break;

		default:
			$content_classes[] = "uk-padding-{$column_padding}";
			break;
	}
# END OF GENERAL TAB

# DESIGN OPTION TAB
	# custom media
	if ( !empty( $column_custom_media_type ) ) {
		switch ( $column_custom_media_type ) {
			case 'image':
				# image source
				if ( !empty( $column_background_image ) ) {
					$image = '';

					if ( !empty( $column_background_width ) || !empty( $column_background_height ) ) {
						$image = wpb_resize( $column_background_image, null, $column_background_width, $column_background_height, true );

						$image = $image['url'];

						if ( empty( $image ) ) {
							$image = wp_get_attachment_image_url( $column_background_image, 'full' );
						}
					} else {
						$image = wp_get_attachment_image_url( $column_background_image, 'full' );
					}

					$content_styles[] = "background-image: url({$image});";
				}

				# image size
				if ( !empty( $column_background_image_size ) ) {
					$content_classes[] = $column_background_image_size;
				}

				# image repeat
				if ( !empty( $column_background_image_repeat ) ) {
					$content_classes[] = $column_background_image_repeat;
				}

				# image position
				if ( !empty( $column_background_image_position ) ) {
					$content_classes[] = $column_background_image_position;
				}

				# image effect
				if ( !empty( $column_background_image_effect ) ) {
					$content_classes[] = $column_background_image_effect;
				}

				# image visibility
				if ( !empty( $column_background_image_visibility ) ) {
					$content_classes[] = "uk-background-image{$column_background_image_visibility}";
				}

				# image blend
				if ( !empty( $column_background_blend_mode ) ) {
					$content_classes[] = $column_background_blend_mode;
				}

				# image effect parallax
				if ( $column_background_image_effect == 'parallax' ) {
					$content_parallax[] = dahz_shortcode_get_parallax_option( $column_background_image_parallax, true );
				}
				break;
			case 'video':
				#
				$content_classes[] = 'uk-cover-container';
				break;
		}
	}
# END OF DESIGN OPTION TAB

# RESPONSIVE TAB
	# tablet alignment
	if ( !empty( $column_tablet_alignment ) ) {
		$column_classes[] = sprintf( 'de-text-%1$s@s de-text-%1$s@m', $column_tablet_alignment );
	}

	# mobile alignment
	if ( !empty( $column_mobile_alignment ) ) {
		$column_classes[] = sprintf( 'de-text-%s@xs', $column_mobile_alignment );
	}
# END OF RESPONSIVE TAB

# ANIMATION TAB
	#
	if ( !empty( $css_animation ) && $css_animation !== 'none' ) {

		$column_animation[] = "cls: {$css_animation};";

		#
		if ( !empty( $column_delay_animation ) ) {
			$column_animation[] = "delay: {$column_delay_animation};";
		}

		#
		if ( !empty( $column_repeat_animation ) ) {
			$column_animation[] = "repeat: {$column_repeat_animation};";
		}

	}
# END OF ANIMATION TAB

# EXTRA TAB
	# media sticky
	if ( !empty( $column_enable_sticky ) ) {
		# setup sticky column attribute class
		$sticky_column_classes[] = 'de-column-sticky';

		#
		$sticky_column_options[] = 'bottom: true;';

		# setup sticky column breakpoint
		switch ($column_sticky_breakpoint) {
			case '@s':
				$sticky_column_options[] = 'media: (min-width: 640px);';
				break;
			case '@m':
				$sticky_column_options[] = 'media: (min-width: 960px);';
				break;
			case '@l':
				$sticky_column_options[] = 'media: (min-width: 1200px);';
				break;
			case '@xl':
				$sticky_column_options[] = 'media: (min-width: 1600px);';
				break;

			default:
				$sticky_column_options[] = '';
				break;
		}
	}

	# translate x
	if ( !empty( $column_translate_x ) ) {
		$content_styles[] = sprintf( 'left: %s !important;', dahz_shortcodes_check_param_value( $column_translate_x, '0' ) );
	}

	# translate y
	if ( !empty( $column_translate_y ) ) {
		$content_styles[] = strpos( $column_translate_y, '-' ) === false ? sprintf( 'top: %s !important;', $column_translate_y ) : sprintf( 'margin-top: %s !important;', dahz_shortcodes_check_param_value( $column_translate_y, '0' ) );
	}

	# z index
	$column_styles[] = !empty( $column_z_index ) ? "z-index: {$column_z_index} !important;" : "z-index: 0 !important;";

	if( $custom_responsive_translate_el_col_inner == 'yes' ) {
		$col_inner_translate_responsive = sprintf(
			'
			<style>
				@media only screen and ( max-width: 414px ) {
					.de-column--inner[data-dahz-id="%1$s"] {
						left: %2$s;
						margin-top: %3$s;
					}
				}
	
				@media only screen and ( min-width: 960px ) and ( max-width: 1023px ) {
					.de-column--inner[data-dahz-id="%1$s"] {
						left: %4$s;
						margin-top: %5$s;
					}
				}
	
				@media only screen and ( min-width: 1024px ) and ( max-width: 1024px ) {
					.de-column--inner[data-dahz-id="%1$s"] {
						left: %6$s;
						margin-top: %7$s;
					}
				}
			</style>
			',
			$dahz_id,
			!empty( $col_inner_translate_x_xsmall ) ? esc_html( $col_inner_translate_x_xsmall ) . '!important' : 'inherit',
			!empty( $col_inner_translate_y_xsmall ) ? esc_html( $col_inner_translate_y_xsmall ) . '!important' : 'inherit',
			!empty( $col_inner_translate_x_small ) ? esc_html( $col_inner_translate_x_small ) . '!important' : 'inherit',
			!empty( $col_inner_translate_y_small ) ? esc_html( $col_inner_translate_y_small ) . '!important' : 'inherit',
			!empty( $col_inner_translate_x_med ) ? esc_html( $col_inner_translate_x_med ) . '!important' : 'inherit',
			!empty( $col_inner_translate_y_med ) ? esc_html( $col_inner_translate_y_med ) . '!important' : 'inherit'
			
		);
		echo( $col_inner_translate_responsive );
	}

# END OF EXTRA TAB

# COLUMN
	# add column ID
	if ( !empty( $el_id ) ) {
		$column_attributes['id'] = $el_id;
	}

	# add column width
	$column_classes[] = dahz_shortcode_translate_width( $width );

	# add column offset
	$column_classes[] = dahz_shortcode_translate_offset( $offset );

	# extra class
	if ( !empty( $el_class ) ) {
		$el_class = $this->getExtraClass( $el_class );

		$column_classes[] = $el_class;
	}

	# add column class
	if ( !empty( $column_classes ) ) {
		$column_attributes['class'] = $column_classes;
	}

	# add column style
	if ( !empty( $column_styles ) ) {
		$column_attributes['style'] = $column_styles;
	}

	# add column animation
	if ( !empty( $column_animation ) ) {
		$column_attributes['data-uk-scrollspy'] = $column_animation;
	}

	$column_attributes['data-dahz-id'] = $dahz_id;
# END OF COLUMN

# STICKY COLUMN
	# add sticky column class
	if ( !empty( $sticky_column_classes ) ) {
		$sticky_column_attributes['class'] = $sticky_column_classes;
	}

	# add sticky column style
	if ( !empty( $sticky_column_styles ) ) {
		$sticky_column_attributes['style'] = $sticky_column_styles;
	}

	# sticky column
	if ( !empty( $sticky_column_options ) ) {
		$sticky_column_attributes['data-uk-sticky'] = $sticky_column_options;
	}
# END OF STICKY COLUMN

# CONTENT
	# add css
	if ( !empty( $css ) ) {
		$content_styles[] = dahz_shortcode_parse_css( $css );
	}

	# add content class
	if ( !empty( $content_classes ) ) {
		$content_attributes['class'] = $content_classes;
	}

	# add content style
	if ( !empty( $content_styles ) ) {
		$content_attributes['style'] = $content_styles;
	}

	#
	if ( !empty( $content_parallax ) ) {
		$content_attributes['data-uk-parallax'] = $content_parallax;
	}
# END OF CONTENT

# CARD
	$card_attributes = array();
	# card background color hover
	if ( !empty( $column_card_background_hover_color ) ) {
		$content_attributes['class'][] = 'uk-visible-toggle uk-transition-toggle';

		$card_attributes['class'] = 'uk-position-top-left uk-width-1-1 uk-height-1-1 uk-hidden-hover uk-transition-fade';

		$card_attributes['style'] = "background-color: {$column_card_background_hover_color};";
	}
# END OF CARD

?>
<div <?php
	dahz_shortcode_set_attributes(
		$column_attributes,
		$this->settings['base'] . '_column',
		$atts
	); ?>>
	<div <?php
		dahz_shortcode_set_attributes(
			$sticky_column_attributes,
			$this->settings['base'] . '_stickycolumn',
			$atts
		); ?>>
		<<?php echo esc_attr( $html_tag_open ); ?> <?php
			dahz_shortcode_set_attributes(
				$content_attributes,
				$this->settings['base'] . '_contentwrap',
				$atts
			); ?>>
			<?php dahz_shortcode_get_builder_background_video(
				$column_custom_media_type,
				$column_background_video_url,
				// $column_background_video_enable_parallax,
				// $column_background_video_parallax,
				$column_background_width,
				$column_background_height,
				$column_video_blend_mode,
				true
			); ?>
			<div <?php dahz_shortcode_set_attributes( $card_attributes ); ?>></div>
			<?php echo $overlay_element;?>
			<div class="uk-flex-1">
				<?php echo wpb_js_remove_wpautop( $content ); ?>
			</div>
		</<?php echo esc_attr( $html_tag_close ); ?>>
	</div>
</div>