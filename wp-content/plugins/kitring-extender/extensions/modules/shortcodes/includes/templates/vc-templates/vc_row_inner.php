<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

# setup sticky row attribute
$sticky_row_attributes = array();

# setup sticky row class
$sticky_row_classes = array( 'uk-width-1-1' );

# setup sticky row style
$sticky_row_styles = array();

# setup sticky row option
$sticky_row_options = array();

# setup container attribute
$container_attributes = array();

# setup container class
$container_classes = array( 'de-row de-row--inner uk-container', $row_visibility );

$overlay_element = dahz_shortcode_get_builder_overlay(
	$row_color_overlay,
	$row_color_overlay_2,
	$row_enable_gradient,
	$row_gradient_direction
);

$container_classes[] = !empty( $overlay_element ) ? 'uk-position-relative' : '';


# setup container style
$container_styles = array();

# setup grid attribute
$grid_attributes = array();

# setup grid class
$grid_classes = array( 'uk-grid uk-flex-1 uk-c-position-z-index-0' );

# setup grid style
$grid_styles = array();

# GENERAL TAB
	# row margin
	if ( !empty( $row_margin ) ) {
		$sticky_row_classes[] = $row_margin;
	}

	# remove margin top
	if ( !empty( $row_remove_top_margin ) ) {
		$sticky_row_classes[] = 'uk-margin-remove-top';
	}

	# remove margin bottom
	if ( !empty( $row_remove_bottom_margin ) ) {
		$sticky_row_classes[] = 'uk-margin-remove-bottom';
	}

	# row stretch
	if ( !empty( $row_stretch ) ) {
		$container_classes[] = $row_stretch;
	}

	# column gutter
	if ( !empty( $row_column_gap ) ) {
		$grid_classes[] = $row_column_gap;
	}

	# display divider
	if ( !empty( $row_display_divider_between ) ) {
		$grid_classes[] = 'uk-grid-divider';

		# coloring divider
		if ( !empty( $row_divider_color ) ) {
			$grid_styles[] = "border-color: {$row_divider_color};";
		}
	}

	# equal height
	if ( !empty( $row_column_enable_equal_height ) ) {
		$grid_classes[] = 'uk-grid-match';
	}

	# content position
	if ( !empty( $row_column_content_position ) ) {
		$grid_classes[] = !empty( $row_column_enable_equal_height ) ? str_replace( 'uk-', 'uk-c-', $row_column_content_position ) : $row_column_content_position;
	}

	# disable element
	if ( !empty( $disable_element ) ) {
		$sticky_row_classes[] = 'uk-hidden';
	}
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

						if ( empty( $image ) ) {
							$image = wp_get_attachment_image_url( $section_background_image, 'full' );
						}
					} else {
						$image = wp_get_attachment_image_url( $row_background_image, 'full' );
					}

					$container_styles[] = "background-image: url({$image});";
				}

				# image size
				if ( !empty( $row_background_image_size ) ) {
					$container_classes[] = $row_background_image_size;
				}

				# image repeat
				if ( !empty( $row_background_image_repeat ) ) {
					$container_classes[] = $row_background_image_repeat;
				}

				# image position
				if ( !empty( $row_background_image_position ) ) {
					$container_classes[] = $row_background_image_position;
				}

				# image effect
				if ( !empty( $row_background_image_effect ) ) {
					$container_classes[] = $row_background_image_effect;
				}

				# image visibility
				if ( !empty( $row_background_image_visibility ) ) {
					$container_classes[] = "uk-background-image{$row_background_image_visibility}";
				}

				# image blend
				if ( !empty( $row_background_blend_mode ) ) {
					$container_classes[] = $row_background_blend_mode;
				}

				# image effect parallax
				if ( $row_background_image_effect == 'parallax' ) {
					$container_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $row_background_image_parallax, true );
				}
				break;
			case 'video':
				#
				$container_classes[] = 'uk-cover-container';
				break;
		}
	}

	#
	if ( strpos( dahz_shortcode_parse_css( $css ), 'background' ) !== false ) {
		$container_styles[] = 'box-sizing: border-box;';

		// $container_styles[] = 'padding: 0;';
	}
# END OF DESIGN OPTION TAB

# EXTRA TAB
	# media sticky
	if ( !empty( $row_sticky_breakpoint ) ) {
		# setup sticky row attribute class
		$sticky_row_classes[] = 'de-row-sticky';

		switch ($row_sticky_breakpoint) {
			case '@s':
				$sticky_row_options[] = 'media: (min-width: 640px);';
				break;
			case '@m':
				$sticky_row_options[] = 'media: (min-width: 960px);';
				break;
			case '@l':
				$sticky_row_options[] = 'media: (min-width: 1200px);';
				break;
			case '@xl':
				$sticky_row_options[] = 'media: (min-width: 1600px);';
				break;

			default:
				$sticky_row_options[] = '';
				break;
		}
	}

	# translate x
	if ( !empty( $row_translate_x ) ) {
		$container_styles[] = sprintf( 'left: %s !important;', dahz_shortcodes_check_param_value( $row_translate_x, '0' ) );
	}

	# translate y
	if ( !empty( $row_translate_y ) ) {
		$container_styles[] = strpos( $row_translate_y, '-' ) === false ? sprintf( 'top: %s !important;', $row_translate_y ) : sprintf( 'margin-top: %s !important;', dahz_shortcodes_check_param_value( $row_translate_y, '0' ) );
	}

	# z index
	$container_styles[] = !empty( $row_z_index ) ? "z-index: {$row_z_index} !important;" : "z-index: 0 !important;";

	# dark light row
	if ( !empty( $row_general_row_color_scheme ) ) {
		$container_classes[] = $row_general_row_color_scheme;
	}

	if( $custom_responsive_translate_el_row_inner == 'yes' ) {
		$row_inner_translate_responsive = sprintf(
			'
			<style>
				@media only screen and ( max-width: 414px ) {
					.de-row--inner[data-dahz-id="%1$s"] {
						left: %2$s;
						margin-top: %3$s;
					}
				}
	
				@media only screen and ( min-width: 960px ) and ( max-width: 1023px ) {
					.de-row--inner[data-dahz-id="%1$s"] {
						left: %4$s;
						margin-top: %5$s;
					}
				}
	
				@media only screen and ( min-width: 1024px ) and ( max-width: 1024px ) {
					.de-row--inner[data-dahz-id="%1$s"] {
						left: %6$s;
						margin-top: %7$s;
					}
				}
			</style>
			',
			$dahz_id,
			!empty( $row_inner_translate_x_xsmall ) ? esc_html( $row_inner_translate_x_xsmall ) . '!important' : 'inherit',
			!empty( $row_inner_translate_y_xsmall ) ? esc_html( $row_inner_translate_y_xsmall ) . '!important' : 'inherit',
			!empty( $row_inner_translate_x_small ) ? esc_html( $row_inner_translate_x_small ) . '!important' : 'inherit',
			!empty( $row_inner_translate_y_small ) ? esc_html( $row_inner_translate_y_small ) . '!important' : 'inherit',
			!empty( $row_inner_translate_x_med ) ? esc_html( $row_inner_translate_x_med ) . '!important' : 'inherit',
			!empty( $row_inner_translate_y_med ) ? esc_html( $row_inner_translate_y_med ) . '!important' : 'inherit'
			
		);
		echo( $row_inner_translate_responsive );
	}
# END OF EXTRA TAB

# STICKY ROW
	# add sticky row class
	if ( !empty( $sticky_row_classes ) ) {
		$sticky_row_attributes['class'] = $sticky_row_classes;
	}

	# add sticky row style
	if ( !empty( $sticky_row_styles ) ) {
		$sticky_row_attributes['style'] = $sticky_row_styles;
	}

	# sticky row
	if ( !empty( $row_enable_sticky ) ) {
		$sticky_row_attributes['data-uk-sticky'] = $sticky_row_options;
	}
# END OF STICKY ROW

# CONTAINER
	# add css
	if ( !empty( $css ) ) {
		$container_styles[] = dahz_shortcode_parse_css( $css );
	}

	# extra class
	$el_class = $this->getExtraClass( $el_class );

	$container_classes[] = $el_class;

	# add container ID
	if ( !empty( $el_id ) ) {
		$container_attributes['id'] = $el_id;
	}

	# add container class
	if ( !empty( $container_classes ) ) {
		$container_attributes['class'] = $container_classes;
	}

	# add container style
	if ( !empty( $container_styles ) ) {
		$container_attributes['style'] = $container_styles;
	}

	# section name
	if ( !empty( $row_section_name ) ) {
		$container_attributes['data-section-name'] = $row_section_name;
	}

	$container_attributes['data-dahz-id'] = $dahz_id;
# END OF CONTAINER

# GRID
	# set grid attribute
	$grid_attributes['data-uk-grid'] = '';

	# add grid class
	if ( !empty( $grid_classes ) ) {
		$grid_attributes['class'] = $grid_classes;
	}

	# add grid style
	if ( !empty( $grid_styles ) ) {
		$grid_attributes['style'] = $grid_styles;
	}
# END OF GRID

$enable_dahz_block = false;

$dahz_block = '';

if ( strpos( $content,'[dahz-block' ) !== false || strpos( $content,'[df_split_slider' ) !== false ) {

	$available_multiple = true;

	if ( strpos( $content,'[df_split_slider' ) !== false ) {

		$pattern = get_shortcode_regex( array( 'df_split_slider' ) );

		$regex = "/$pattern/";

		$available_multiple = false;

	} else {

		$regex = '/\[dahz-block(.*?)\](.*?)/';

		$available_multiple = true;

	}

	preg_match_all( $regex, $content, $matches, PREG_SET_ORDER );

	if ( count( $matches ) ) {

		foreach ( $matches as $key => $value ) {

			$enable_dahz_block = true;

			if ( isset( $value[1] ) ) {

				$dahz_block .= $value[0];

				if ( !$available_multiple ) break;

			}

		}

	}

	return wpb_js_remove_wpautop( $dahz_block );

}

?>
<div <?php
	dahz_shortcode_set_attributes(
		$sticky_row_attributes,
		$this->settings['base'] . '_stickyrow',
		$atts
	); ?>>
	<div <?php
		dahz_shortcode_set_attributes(
			$container_attributes,
			$this->settings['base'] . '_container',
			$atts
		); ?>>
		<?php dahz_shortcode_get_builder_background_video(
			$row_custom_media_type,
			$row_background_video_url,
			// $row_background_video_enable_parallax,
			// $row_background_video_parallax,
			$row_background_width,
			$row_background_height,
			$row_video_blend_mode,
			true
		);?>
		<?php echo $overlay_element;?>
		<div <?php
			dahz_shortcode_set_attributes(
				$grid_attributes,
				$this->settings['base'] . '_grid',
				$atts
			); ?>>
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>