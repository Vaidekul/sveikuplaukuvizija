<?php

/**
 * animated_text
 *
 * Template for animated text shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 * Shortcode attributes
	[0] => style
	[1] => image
	[2] => inner_text_color
	[3] => outer_text_color
	[4] => text
	[5] => font_size
	[6] => use_theme_fonts
	[7] => google_fonts
	[8] => animation_duration
	[9] => css_animation
	[10] => animation_parallax
	[11] => delay_animation
	[12] => repeat_animation
	[13] => el_class
	[14] => margin
	[15] => remove_top_margin
	[16] => remove_bottom_margin
	[17] => visibility
	[18] => enable_dahz_lazy_shortcode
	[19] => dahz_id
	[20] => line_height
 */

$google_fonts_data = dahz_shortcode_get_google_fonts( $google_fonts );

$text_style = empty( $use_theme_fonts ) ? $google_fonts_data['styles']: array();

if( empty( $use_theme_fonts ) && isset( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] ) ){
	
	wp_enqueue_style( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] );
	
}

$font_size = dahz_shortcode_safe_css_units( $font_size );

if( !empty( $font_size ) ){ $text_style[] = "font-size:{$font_size};";}
// Set max width of inner text
$max_width = dahz_framework_get_option( 'general_layout_site_content_width', '1240px' );

$max_width = dahz_shortcode_safe_css_units( $max_width );
// Set animation speed
$animate_duration = strlen( $text ) * intval( $animation_duration );

$text_style[] = "animation-duration:{$animate_duration}s;";

if( !empty( $line_height ) ){
	$text_style[] = "line-height:{$line_height};";
}
// Set image to render
$rendered_image = '';

if ( !empty( $image ) ) {
	// Get image by size
	$og_img = wp_get_attachment_image_src( $image, 'full' );
	$og_w   = $og_img[1];
	$og_h   = $og_img[2];
	$w      = intval( $max_width );
	$h      = ( $w / $og_w ) * $og_h;

	// Set image with custom size
	$img = wpb_getImageBySize( array(
		'attach_id'  => $image,
		'thumb_size' => array( $w, $h ),
		'class'      => '',
	) );
	$rendered_image = isset( $img['thumbnail'] ) ? $img['thumbnail'] : '';
}

?>

<div class="uk-overflow-hidden de-sc-animated-text" data-animate-style="<?php echo esc_attr( $style ); ?>">
	<div class="de-sc-animated-text__box" style="<?php echo esc_attr( sprintf( 'max-width: %s;', $max_width ) ); ?>">
		<?php if ( '' != $text ) : ?>
			<span <?php dahz_shortcode_set_attributes(
				array(
					'class'	=> 'de-sc-animated-text__text inner',
					'style'	=> array_merge(
						$text_style, 
						array( 
							( !empty( $inner_text_color ) ? "color:{$inner_text_color};" : '' )
						) 
					)
				),
				'animated_text'
			);?>>
				<span><?php echo esc_html( sprintf( '%1$s %1$s %1$s %1$s ', $text ) ); ?></span>
				<span><?php echo esc_html( sprintf( '%1$s %1$s %1$s %1$s ', $text ) ); ?></span>
			</span>
		<?php endif; ?>
		<?php if ( 'image_background' == $style ) : ?>
			<?php echo( $rendered_image ); ?>
		<?php endif; ?>
	</div>
	<?php if ( '' != $image && '' != $text ) : ?>
		<span <?php dahz_shortcode_set_attributes(
			array(
				'class'	=> 'de-sc-animated-text__text outer',
				'style'	=> array_merge(
					$text_style, 
					array( 
						( !empty( $outer_text_color ) ? "color:{$outer_text_color};" : '' ),
						"left:calc((100% - {$max_width})/2);"
					) 
				)
			),
			'animated_text'
		);?>>
			<span><?php esc_html_e( sprintf( '%1$s %1$s %1$s %1$s ', $text ) ); ?></span>
			<span><?php esc_html_e( sprintf( '%1$s %1$s %1$s %1$s ', $text ) ); ?></span>
		</span>
	<?php endif; ?>
</div>
