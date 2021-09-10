<?php

/**
 * image_grid
 *
 * Template for image grid shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

// Setup Masonry
$enable_masonry = true == $enable_masonry ? 'true' : 'false';
$image_size = !empty( $image_size ) ? $image_size : '1024x1024';

// Setup Image
$images = vc_param_group_parse_atts( $images );
// Setup Gradient
$is_grad_opacity_1	= strpos( $gradient_color_1, 'rgba' );
$is_grad_opacity_2	= strpos( $gradient_color_2, 'rgba' );
$gradient_strength	= $is_grad_opacity_1 === false && $is_grad_opacity_2 === false ? $gradient_strength : 'none';

?>
<div class="de-sc-image-grid" data-layout="<?php esc_attr_e( $layout ); ?>" data-enable-masonry="<?php esc_attr_e( $enable_masonry ); ?>" data-hover-style="<?php esc_attr_e( $hover_style ); ?>" data-enable-gradient="<?php esc_attr_e( $enable_gradient ); ?>" data-gradient-strength="<?php esc_attr_e( $gradient_strength ); ?>">
	<div class="de-sc-image-grid__sizer"></div>
	<?php foreach( $images as $key => $value ) : ?>
		<?php
			$image = isset( $value['images_item'] ) ? $value['images_item'] : '';
			$size  = is_numeric( $value['images_item_size'] ) ? $value['images_item_size'] : '1';

			// Set image with custom size
			$img = wpb_getImageBySize( array(
				'attach_id'  => $image,
				'thumb_size' => $image_size,
				'class'      => sprintf( 'attachment-%1$s size-%1$s', esc_html( $image_size ) ),
			) );

			switch( $on_click ) :
				case 'lightbox':
					// If custom link is lightbox
					$_image  = wp_get_attachment_image_src( $image, 'full' );
					$url     = isset( $_image[0] ) ? $_image[0] : '';
					$width   = isset( $_image[1] ) ? $_image[1] : '';
					$height  = isset( $_image[2] ) ? $_image[2] : '';
					$title   = get_the_title( $image );
					$caption = wp_get_attachment_caption( $image );
					$data    = '';
					$data   .= !empty( $title ) ? sprintf( '<h3>%s</h3>', esc_html( $title ) ) : '';
					$data   .= !empty( $caption ) ? sprintf( '<p>%s</p>', esc_html( $caption ) ) : '';

					// Setup Content
					$content = 'magnifying' == $hover_style ? sprintf( '<i class="df-search-flip"></i>' ) : sprintf( '%s', $data );
					echo sprintf(
						'
						<div class="de-sc-image-grid__item" data-item-size="%s">
							<div class="de-sc-image-grid__item-inner">
								<a data-url="%s" data-w="%s" data-h="%s">
									<div class="de-sc-image-grid__image">
										%s
									</div>
									<div class="de-sc-image-grid__content">
										%s
									</div>
								</a>
							</div>
						</div>
						',
						esc_attr( $size ),
						esc_url( $url ),
						esc_attr( $width ),
						esc_attr( $height ),
						$img['thumbnail'],
						$content
					);
				break;

				case 'custom_link':
					// If custom link is external links
					$link    = str_replace( '<br />', '', $custom_link );
					$link    = preg_split( '/\r\n|[\r\n]/', $link );
					$title   = get_the_title( $image );
					$caption = wp_get_attachment_caption( $image );
					$data    = '';
					$data   .= !empty( $title ) ? sprintf( '<h3>%s</h3>', esc_html( $title ) ) : '';
					$data   .= !empty( $caption ) ? sprintf( '<p>%s</p>', esc_html( $caption ) ) : '';

					// Setup Content
					$content = 'magnifying' == $hover_style ? sprintf( '<i class="df-search-flip"></i>' ) : sprintf( '%s', $data );
					echo sprintf(
						'
						<div class="de-sc-image-grid__item" data-item-size="%s">
							<div class="de-sc-image-grid__item-inner">
								<a href="%s" target="%s">
									<div class="de-sc-image-grid__image">
										%s
									</div>
									<div class="de-sc-image-grid__content">
										%s
									</div>
								</a>
							</div>
						</div>
						',
						esc_attr( $size ),
						esc_url( $link[$key] ),
						esc_attr( $custom_link_target ),
						$img['thumbnail'],
						$content
					);
				break;

				default:
					// If custom link is none
					$title   = get_the_title( $image );
					$caption = wp_get_attachment_caption( $image );
					$data    = '';
					$data   .= !empty( $title ) ? sprintf( '<h3>%s</h3>', esc_html( $title ) ) : '';
					$data   .= !empty( $caption ) ? sprintf( '<p>%s</p>', esc_html( $caption ) ) : '';

					// Setup Content
					$content = 'magnifying' == $hover_style ? sprintf( '<i class="df-search-flip"></i>' ) : sprintf( '%s', $data );
					echo sprintf(
						'
						<div class="de-sc-image-grid__item" data-item-size="%s">
							<div class="de-sc-image-grid__item-inner">
								<div class="de-sc-image-grid__image">
									%s
								</div>
								<div class="de-sc-image-grid__content">
									%s
								</div>
							</div>
						</div>
						',
						esc_attr( $size ),
						$img['thumbnail'],
						$content
					);
				break;
			endswitch;
		?>
	<?php endforeach; ?>
</div>
