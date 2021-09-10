<?php

/**
 * tagging
 *
 * Template for tagging shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

$tagging = json_decode( urldecode( $tagging_image ) );

$imageID = isset( $tagging->dotsImageID ) ? $tagging->dotsImageID : '';

$dots = isset( $tagging->dotsItem ) ? $tagging->dotsItem : array();

if ( !empty( $imageID ) ) : ?>
	<div class="de-sc-tagging">
		<?php echo wp_get_attachment_image( $imageID, 'full', false, array( 'class' => 'de-sc-tagging__image' ) ); ?>
		<?php foreach( $dots as $key => $dot ) : ?>
			<div class="de-sc-tagging__item" style="<?php echo sprintf( 'top: calc(%s%% - 15px);left: calc(%s%% - 15px);', esc_attr( $dot->dotsCoorY ), esc_attr( $dot->dotsCoorX ) ); ?>" data-type="<?php echo esc_attr( $dot->dotsType ); ?>" data-action="<?php echo esc_attr( $dot->dotsValue->dotsAction ); ?>">
				<?php if ( 'popup' == $dot->dotsValue->dotsAction && 'product' == $dot->dotsType && class_exists( 'Woocommerce' ) ) : ?>
					<a href="#" style="<?php echo sprintf( 'background-color: %s; color: %s;', esc_attr( $dot->dotsValue->dotsBgColor ), esc_attr( $dot->dotsValue->dotsIconColor ) ); ?>" class="de-sc-tagging__dot de-woo-shop__quickview-button" data-product-id="<?php echo esc_attr( $dot->dotsValue->productName ); ?>"><i class="df-plus-no-border"></i></a>
				<?php elseif ( 'image' == $dot->dotsType ) : ?>
					<a href="#" style="<?php echo sprintf( 'background-color: %s; color: %s;', esc_attr( $dot->dotsValue->dotsBgColor ), esc_attr( $dot->dotsValue->dotsIconColor ) ); ?>" class="de-sc-tagging__dot" data-images="<?php echo esc_js( json_encode( $dot->dotsValue->imagesList ) ); ?>"><i class="df-plus-no-border"></i></a>
				<?php else : ?>
					<a href="#" style="<?php echo sprintf( 'background-color: %s; color: %s;', esc_attr( $dot->dotsValue->dotsBgColor ), esc_attr( $dot->dotsValue->dotsIconColor ) ); ?>" class="de-sc-tagging__dot"><i class="df-plus-no-border"></i></a>
					<div class="de-sc-tagging__container">
						<?php
							switch( $dot->dotsType ) {
								case 'product':
									
									$product = wc_get_product( $dot->dotsValue->productName );
									
									if( $product ){
										
										echo sprintf(
											'
											<div class="de-sc-tagging__container-content product">
												%1$s
												<div>
													<h6><a href="%4$s">%2$s</a></h6>
													%3$s
												</div>
												<a href="%4$s" class="uk-button uk-button-default uk-width-1-1">%5$s</a>
											</div>
											',
											get_the_post_thumbnail( $dot->dotsValue->productName, 'simple' == $dot->dotsValue->dotsAction ? array(60, 60) : 'shop_catalog' ),
											esc_html( $product->get_name() ),
											$product->get_price_html(),
											esc_url( get_permalink( $dot->dotsValue->productName ) ),
											__( 'View Product', 'sobari' )
										);
										
									}
									
								break;
								case 'text':
									echo sprintf( '<div class="de-sc-tagging__container-content text">' );
									echo sprintf( '<div class="de-sc-tagging__container-text">' );
									echo do_shortcode( $dot->dotsValue->textContent );
									echo sprintf( '</div>' );
									echo sprintf( '</div>' );
								break;
								case 'video':
									$video_type = '';

									if ( strpos( $dot->dotsValue->videoUrl, 'youtube' ) || strpos( $dot->dotsValue->videoUrl, 'youtu.be' ) ) {
										$video_type = 'youtube';
									} else if ( strpos( $dot->dotsValue->videoUrl, 'vimeo' ) ) {
										$video_type = 'vimeo';
									} else {
										$video_type = 'html5';
									}

									echo sprintf(
										'
										<div class="de-sc-tagging__container-content video">
											<div id="%1$s" class="de-sc-tagging__container-video" data-video-url="%2$s" data-video-type="%3$s" data-autoplay="%4$s"></div>
										</div>
										<div class="de-sc-tagging__container-loader"></div>
										',
										esc_attr( uniqid() ),
										esc_url( $dot->dotsValue->videoUrl ),
										esc_attr( $video_type ),
										esc_attr( $dot->dotsValue->videoAutoplay )
									);
								break;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif;