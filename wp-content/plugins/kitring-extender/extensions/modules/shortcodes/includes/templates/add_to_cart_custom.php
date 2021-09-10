<?php

$product = wc_get_product( $product_id );

$button_classes = "uk-button {$button_type} {$button_size}";

$is_show_price = $show_price === 'true' ? true : false;

if ( $css_animation == 'parallax'  ) {
	$animation_props = json_decode( urldecode( $animation_parallax ), true );

	$animation_attr  = sprintf( 'data-uk-parallax=x:%1$s,%2$s;y:%3$s,%4$s;',
		$animation_props['parallax-options-x-start-range'], // 1
		$animation_props['parallax-options-x-end-range'], // 2
		$animation_props['parallax-options-y-start-range'], // 3
		$animation_props['parallax-options-y-end-range'] // 4
		// $animation_props['parallax-options-breakpoint'] // 5 media:%5$s;
	);

	$animation_attr .= $animation_props['parallax-options-show-advance-settings'] ? sprintf( 'scale:%1$s,%2$s;rotate:%3$s,%4$s;opacity:%5$s,%6$s;easing:%7$s;viewport:%8$s;',
		$animation_props['parallax-options-scale-start-range'], // 1
		$animation_props['parallax-options-scale-end-range'], // 2
		$animation_props['parallax-options-rotate-start-range'], // 3
		$animation_props['parallax-options-rotate-end-range'], // 4
		$animation_props['parallax-options-opacity-start-range'], // 5
		$animation_props['parallax-options-opacity-end-range'], // 6
		$animation_props['parallax-options-easing-range'], // 7
		$animation_props['parallax-options-viewport-range'] // 8
	) : '';
} else {
	
	if( $css_animation !== 'none' )
		$animation_attr = sprintf( 'data-uk-scrollspy=cls:%s;delay:%s;repeat:%s;', $css_animation, $delay_animation, $repeat_animation );
}

if ( !empty( $product ) ) : ?>
	<div class="<?php esc_attr_e( sprintf( 'de-sc-add-to-cart-custom %s', $alignment ) ); ?>" <?php esc_attr_e( $animation_attr ); ?>>
		<?php if ( $is_show_price ) : ?>
			<p style="<?php esc_attr_e( sprintf( 'color: %s;', $price_color ) ); ?>"><?php echo $product->get_price_html(); ?></p>
		<?php endif; ?>
		<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="<?php esc_attr_e( $button_classes ); ?>"><?php _e( 'Add to Cart', 'upsob' ); ?></a>
	</div>
<?php endif; ?>