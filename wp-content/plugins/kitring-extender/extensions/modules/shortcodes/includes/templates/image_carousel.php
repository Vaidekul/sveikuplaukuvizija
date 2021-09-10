<?php

/**
 * image_carousel
 *
 * Template for image carousel shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

$center_padding		= !empty( $center_padding )		? $center_padding		: '0';
$auto_play_duration	= !empty( $auto_play_duration)	? $auto_play_duration	: '2000';
$arrow_position		= !empty( $arrow_position )		? $arrow_position		: '';

// Handle Centered Center Mode
if ( 'single-centered' === $center_padding ) {
	$site_width     = dahz_framework_get_option( 'layout_site_width', '1240px' );
	$single_center  = 'true';
	$center_padding = sprintf( 'calc( ( 100vw - ( %s + 40px ) ) / 2 ) ', esc_attr( $site_width ) );
} else {
	$single_center  = 'false';
	$center_padding = is_numeric( $center_padding ) ? sprintf( '%spx', $center_padding ) : $center_padding;
}

$is_active_lightbox = $on_click === 'lightbox' ? 'data-uk-lightbox' : '';

?>
<div class="de-sc-image-carousel de-carousel" data-desktop-col="<?php esc_attr_e( $desktop_column ); ?>" data-small-desktop-col="<?php esc_attr_e( $small_desktop_column ); ?>" data-mobile-col="<?php esc_attr_e( $mobile_column ); ?>" data-slide-scroll="<?php esc_attr_e( $slide_to_scroll ); ?>" data-center-mode="<?php esc_attr_e( $enable_center_mode ); ?>" data-single-center="<?php esc_attr_e( $single_center ); ?>" data-center-padding="<?php esc_attr_e( $center_padding ); ?>" data-free-scroll="<?php esc_attr_e( $enable_free_scroll ); ?>" data-autoplay="<?php esc_attr_e( $enable_auto_play ); ?>" data-autoplay-time="<?php esc_attr_e( $auto_play_duration ); ?>" data-nav-arrow="<?php esc_attr_e( $nav_arrow ); ?>" data-nav-dots="<?php esc_attr_e( $nav_dots ); ?>" data-arrow-position="<?php esc_attr_e( $arrow_position ); ?>" data-box-shadow="<?php esc_attr_e( $box_shadow ); ?>">
	<a class="slick-arrow de-carousel__arrow left" data-uk-slidenav-previous></a>
	<a class="slick-arrow de-carousel__arrow right" data-uk-slidenav-next></a>
	<div class="de-sc-image-carousel__item-container de-carousel__container" <?php echo $is_active_lightbox ?>>
		<?php foreach( explode(',', $images) as $key => $image ) : ?>
			<div class="de-sc-image-carousel__item de-carousel__item">
				<?php
					if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full', ) ) ) {
						// Set image with wp size and lazyload to false
						$img['thumbnail'] = wp_get_attachment_image( $image, $image_size, false, array( 'data-ignore-lazy-image' => 'true' ) );
					} else {
						// Set image with custom size
						$img = wpb_getImageBySize( array(
							'attach_id'  => $image,
							'thumb_size' => $image_size,
						) );
					}
					switch( $on_click ) :
						case 'lightbox':
							// If custom link is lightbox
							$_image  = wp_get_attachment_image_src( $image, 'full' );
							$_url    = $_image[0];
							$_width  = $_image[1];
							$_height = $_image[2];
							echo sprintf( '<a href="%s" data-w="%s" data-h="%s">%s</a>',
								esc_url( $_url ),
								esc_attr( $_width ),
								esc_attr( $_height ),
								$img['thumbnail']
							);
						break;

						case 'custom_link':
							// If custom link is external links
							$link = str_replace( '<br />', '', $custom_link );
							$link = preg_split( '/\r\n|[\r\n]/', $link );
							echo sprintf( '<a href="%s" target="%s">%s</a>',
								esc_url( $link[$key] ),
								esc_attr( $custom_link_target ),
								$img['thumbnail']
							);
						break;

						default:
							// If custom link is none
							echo sprintf( '%s', $img['thumbnail'] );
						break;
					endswitch;
				?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
