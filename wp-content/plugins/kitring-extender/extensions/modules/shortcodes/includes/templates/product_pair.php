<?php
    if ( !empty( $product_ids1 ) && !empty( $product_ids2 ) ) {
        // Get Shortcode Attribute value

        $product_1       = !empty( $product_ids1 ) ? $product_ids1 : '';
        $product_2       = !empty( $product_ids2 ) ? $product_ids2 : '';
        $size_display_1  = !empty( $display_size_1 ) ? $display_size_1 : '';
        $size_display_2  = !empty( $display_size_2 ) ? $display_size_2 : '';
        $hover_animation = !empty( $hover_animation ) ? $hover_animation : '';

        $gap             = !empty( $gap ) ? $gap : 'uk-grid';
        ?>
        <div id="<?php echo esc_attr( $key ) ?>" class="de-sc-product-pair de-sc-product-pair__container de-sc-product-pair__container--<?php echo $hover_animation ?> <?php echo esc_attr( $vertical_alignment ) ?> <?php echo esc_attr( $gap ) ?>">
            <?php
			$product_object_1 = wc_get_product( $product_1 );
			if( $product_object_1 ):
				$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $product_1 ), 'single-post-thumbnail' );
                $image_alt = get_post_meta(get_post_thumbnail_id( $product_1 ), '_wp_attachment_image_alt', true);
                switch ( $display_brand_or_category ) {
                    case 'brand':
                        $get_terms_1 = get_the_terms( $product_1, 'brand' );
                        break;
                    case 'category':
                        $get_terms_1 = get_the_terms( $product_1, 'product_cat' );
                        break;
                }
                $terms_1     = array();
				if( !empty( $display_brand_or_category ) && $get_terms_1 ) {
					foreach ($get_terms_1 as $value) {
                        array_push( $terms_1, $value->name);
					}
				}
				$product_1_type = $product_object_1->get_type();
				$product_1_anchor = '';
				switch ($product_1_type) {
					case 'variable':
					$product_1_anchor = '<a href="' . get_permalink( $product_1 ) . '">Select Options <i class="df-long-arrow-right"></i></a>';
					break;
					case 'grouped':
					$product_1_anchor = '<a href="' . get_permalink( $product_1 ) . '">Read More <i class="df-long-arrow-right"></i></a>';
					break;
					default:
					$product_1_anchor = do_shortcode( '[add_to_cart id=' . $product_1 . ']' );
					break;
				}
			?>
				<div class="de-sc-product-pair__item de-sc-product-pair__item--<?php echo $size_display_1 ?>">
					<div class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio_product_1 ) ?>  de-sc-product-pair__item__image">
						<?php if( isset( $image1[0] ) ):?>
							<img class="de-ratio-content" src="<?php  echo $image1[0]; ?>" data-id="<?php echo $product_1; ?>" alt="<?php echo esc_attr( $image_alt ) ?>">
						<?php endif;?>
					</div>
					<div class="de-sc-product-pair__item__details">
						<h6><?php echo $product_object_1->get_title(); ?></h6>
						<span class="de-sc-product-pair__item__details__price">
							<?php echo $product_object_1->get_price_html(); ?>
						</span>
						<div class="de-sc-product-pair__item__details__action">
							<?php echo $product_1_anchor; ?>
						</div>
						<span class="de-sc-product-pair__item__details__brand"><?php echo implode( ', ', $terms_1 ) ?></span>
					</div>
				</div>
			<?php  endif;?>
			<?php
			$product_object_2 = wc_get_product( $product_2 );
			if( $product_object_2 ) :
				$image2 = wp_get_attachment_image_src( get_post_thumbnail_id( $product_2 ), 'single-post-thumbnail' );
                $image_alt_2 = get_post_meta(get_post_thumbnail_id( $product_2 ), '_wp_attachment_image_alt', true);
                switch ( $display_brand_or_category ) {
                    case 'brand':
                        $get_terms_2 = get_the_terms( $product_2, 'brand' );
                        break;
                    case 'category':
                        $get_terms_2 = get_the_terms( $product_2, 'product_cat' );
                        break;
                }
				$terms_2     = array();
				if( !empty( $display_brand_or_category ) && $get_terms_2 ) {
					foreach ($get_terms_2 as $value) {
                        array_push( $terms_2, $value->name);
					}
				}
				$product_2_type = $product_object_2->get_type();
				$product_2_anchor = '';
				switch ($product_2_type) {
					case 'variable':
					$product_2_anchor = '<a href="' . get_permalink( $product_2 ) . '">Select Options <i class="df-long-arrow-right"></i></a>';
					break;
					case 'grouped':
					$product_2_anchor = '<a href="' . get_permalink( $product_2 ) . '">Read More <i class="df-long-arrow-right"></i></a>';
					break;
					default:
					$product_2_anchor = do_shortcode( '[add_to_cart id=' . $product_2 . ']' );
					break;
				}
			?>
				<div class="de-sc-product-pair__item de-sc-product-pair__item--<?php echo $size_display_2 ?>">
					<div class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio_product_2 ) ?> de-sc-product-pair__item__image">
						<?php if( isset( $image2[0] ) ):?>
							<img class="de-ratio-content" src="<?php  echo $image2[0]; ?>" data-id="<?php echo $product_2; ?>" alt="<?php echo esc_attr( $image_alt_2 ) ?>">
						<?php endif;?>
					</div>
					<div class="de-sc-product-pair__item__details">
						<h6><?php echo $product_object_2->get_title(); ?></h6>
						<span class="de-sc-product-pair__item__details__price">
							<?php echo $product_object_2->get_price_html(); ?>
						</span>
						<div class="de-sc-product-pair__item__details__action">
							<?php echo $product_2_anchor; ?>
						</div>
						<span class="de-sc-product-pair__item__details__brand"><?php echo implode( ', ', $terms_2 ) ?></span>
					</div>
				</div>
			<?php endif;?>
        </div>

    <?php
    }
