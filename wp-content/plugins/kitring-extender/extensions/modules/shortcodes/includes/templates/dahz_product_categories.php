<?php

# Shortcode attributes
$shortcode_attr = array();

# Slider attributes
$slider_attr = array();

# Loop attribute
$loop_attr = array();

# Item attribute
$item_attr = array();

# Content attribute
$content_attr = array();

# SETTING SHORTCODE
	# Class
	$shortcode_attr['class'] = 'de-sc-product-categories';

	# Layout
	if ( !empty( $product_tax_style ) )
		$shortcode_attr['data-layout'] = $product_tax_style;

	# Hover effect
	if ( !empty( $hover_effect ) )
		$shortcode_attr['data-hover-effect'] = $hover_effect;

	# Show total number when hover
	if ( !empty( $show_total_number_when_hover ) )
		$shortcode_attr['data-hover-number'] = $show_total_number_when_hover;

	# Always show on mobile
	if ( !empty( $always_show_on_mobile ) )
		$shortcode_attr['data-show-mobile'] = $always_show_on_mobile;
# END OF SETTING SHORTCODE

# SETTING LOOP
	# Class
	$loop_classes = array( 'uk-grid' );

	# Grid
	$loop_attr['data-uk-grid'] = '';
# END OF SETTING LOOP

# SETTING COLUMN ON ALL DEVICES
	# Set column gap
	if ( !empty( $row_column_gap ) )
		$loop_classes[] = $row_column_gap;

	# Set product color scheme
	if ( !empty( $product_color_scheme ) )
		$loop_classes[] = $product_color_scheme;

	# Set column per row
	# Check value from customizer
	$lg_column = $columns === 'inherit' ? dahz_framework_get_option( 'shop_woo_desktop_column', '4' ) : $columns;

	# Set phone portrait column
	$base_column = $phone_potrait_column === 'inherit' ? $lg_column : $phone_potrait_column;

	$loop_classes[] = sprintf( 'uk-child-width-1-%s', $base_column );

	# Set phone landscape & tablet portrait column
	$sm_column = $phone_landscape_column === 'inherit' ? $lg_column : $phone_landscape_column;

	$loop_classes[] = sprintf( 'uk-child-width-1-%s@s', $sm_column );

	# Set tablet landscape column
	$md_column = $tablet_landscape_column === 'inherit' ? $lg_column : $tablet_landscape_column;

	$loop_classes[] = sprintf( 'uk-child-width-1-%s@m', $md_column );

	# Set desktop column
	$loop_classes[] = sprintf( 'uk-child-width-1-%s@l', $lg_column );
# END OF SETTING COLUMN ON ALL DEVICES

# SETTING SLIDER
	if ( $shortcode_style === 'carousel' ) {
		$slider_attr = array(
			'data-uk-slider' => array(),
			'class' => 'uk-visible-toggle uk-transition-toggle'
		);

		$loop_classes[] = 'uk-slider-items';
		# Autoplay enabled
		if ( !empty( $auto_play_interval ) )
			$slider_attr['data-uk-slider'][] = "autoplay: true;autoplay-interval: {$auto_play_interval};";

		# Infinite enabled
		if ( empty( $enable_infinite ) )
			$slider_attr['data-uk-slider'][] = 'finite: true;';

		# Slider sets enabled
		if ( !empty( $enable_slide ) )
			$slider_attr['data-uk-slider'][] = 'sets: true';

		# Center enabled
		if ( !empty( $enable_center_active ) )
			$slider_attr['data-uk-slider'][] = 'center: true';
	}
# END OF SETTING SLIDER

# SETTING ITEM
	# Class
	$item_attr['class'] = 'de-sc-product-categories__item de-ratio de-ratio-1-1';

	# Hover effect
	if ( $hover_effect === 'parallax-tilt' || $hover_effect === 'parallax-tilt-glare' ) {
		$item_attr['data-tilt'] = '';

		$item_attr['data-tilt-perspective'] = '4000';

		if ( $shortcode_style === 'carousel' ) {
			$item_attr['data-tilt-scale'] = '0.96';
		} else {
			$item_attr['data-tilt-scale'] = '1.04';
		}
	}
# END OF SETTING ITEM

# SETTING CONTENT
	# Class
	$content_attr['class'] = 'de-sc-product-categories__item-detail';

	# Style
	$content_attr['style'] = array();

	# Text color
	if ( !empty( $text_color ) && empty( $product_color_scheme ) )
		$content_attr['style'][] = sprintf( 'color: %s;', $text_color );

	# Overlay color
	if ( !empty( $color_overlay ) )
		$content_attr['style'][] = sprintf( 'background-color: %s;', $color_overlay );

	# Border color
	if ( !empty( $hover_border_color ) && empty( $product_color_scheme ) )
		$content_attr['style'][] = sprintf( 'border-color: %s;', $hover_border_color );
# END OF SETTING CONTENT

# SETTING ANIMATION TABS
	# Animation delay multiplier
	$delay_multiplier = 1;

	# Animation attribute
	$scrollspy_attr = array();
# END OF SETTING ANIMATION TABS

$loop_attr['class'] = $loop_classes;

$categories = get_categories(
	array(
		'taxonomy'   => 'product_cat', # empty string(''), false, 0 don't work, and return empty array
		'orderby'    => $order_by,
		'order'      => $sort_by,
		'hide_empty' => !empty( $hide_empty ) ? true : false, # can be 1, '1' too
		'include'    => $product_cat_ids, # empty string(''), false, 0 don't work, and return empty array
		'number'     => $total_products, # can be 0, '0', '' too
		'fields'     => 'all',
	)
);

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_product_categories_shortcode' ); ?>>
	<div <?php dahz_shortcode_set_attributes( $slider_attr, 'dahz_product_categories_slider' ); ?>>
		<div class="uk-position-relative">
			<!-- RENDER SLIDER ITEM -->
			<div class="uk-slider-container">
				<div <?php dahz_shortcode_set_attributes( $loop_attr, 'dahz_product_categories_loop' ); ?>>
					<?php foreach( $categories as $key => $category ) :
						$category_image_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

						# SETTING RATIO
							$category_image_crop = get_option( 'woocommerce_thumbnail_cropping' );

							$category_image_crop_w = '1';

							$category_image_crop_h = '1';

							switch( $category_image_crop ) {
								case 'custom':
									$category_image_crop_w = get_option( 'woocommerce_thumbnail_cropping_custom_width' );

									$category_image_crop_h = get_option( 'woocommerce_thumbnail_cropping_custom_height' );
									break;
								case 'uncropped':
									$category_image_src = wp_get_attachment_image_src( $category_image_id, 'full' );

									if ( $category_image_src ) {
										$category_image_crop_w = get_option( 'woocommerce_thumbnail_image_width' );

										$category_image_crop_h = ( $category_image_src['2'] / $category_image_src['1'] ) * $category_image_crop_w;
									}
									break;
							}

							$item_ratio = 'padding-bottom: calc(('. $category_image_crop_h .'/'. $category_image_crop_w .') * 100%)';

							$item_attr['style'] = $item_ratio;
						# END OF SETTING RATIO

						# SETTING ANIMATION TABS
							if ( $css_animation != 'parallax' && $css_animation !== 'none' ) {
								if ( !empty( $css_animation )  )
									$scrollspy_attr[] = sprintf( 'cls: %s;', $css_animation );

								if ( !empty( $repeat_animation ) )
									$scrollspy_attr[] = sprintf( 'repeat: %s;', $repeat_animation );

								if ( !empty( $delay_animation ) )
									$scrollspy_attr[] = sprintf( 'delay: %s;', $delay_multiplier * $delay_animation );

								if ( !empty( $scrollspy_attr ) )
									$item_attr['data-uk-scrollspy'] = $scrollspy_attr;
							}
						# END OF SETTING ANIMATION TABS
						?>
						<div>
							<div <?php dahz_shortcode_set_attributes( $item_attr, 'dahz_product_categories_item' ); ?>>
								<div class="de-sc-product-categories__item-category uk-transition-toggle">
									<a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>">
										<?php echo wp_get_attachment_image( $category_image_id, 'shop_catalog', false, array( 'alt' => get_post_field( 'post_title', $category_image_id ) ) ); ?>
										<div class="uk-overlay uk-position-top-left uk-width-1-1 uk-height-1-1 uk-transition-fade"></div>
										<div <?php dahz_shortcode_set_attributes( $content_attr, 'dahz_product_categories_content' ); ?>>
											<div>
												<h3><?php esc_html_e( $category->name ); ?></h3>
												<?php if ( !empty( $show_total_number ) ):?>
													<p><?php esc_html_e( sprintf( '%s Products', $category->category_count ) ); ?></p>
												<?php endif;?>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					<?php $delay_multiplier++; endforeach; ?>
				</div>
			</div>
			<!-- RENDER ARROW -->
			<?php if ( !empty( $show_slide_nav ) ) : ?>
				<a <?php dahz_shortcode_set_attributes(
					array(
						'data-uk-slidenav-previous' => '',
						'data-uk-slider-item'       => 'previous',
						'href'                      => '#',
						'class'                     => sprintf(
							'uk-position-small uk-position-center-left%1$s%2$s%3$s',
							$slide_nav_position === 'outside' ? '-out' : '',
							!empty( $show_slide_nav_when_hover ) ? ' uk-hidden-hover uk-transition-fade' : '',
							!empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : ''
						)
					)
				); ?>></a>
				<a <?php dahz_shortcode_set_attributes(
					array(
						'data-uk-slidenav-next' => '',
						'data-uk-slider-item'   => 'next',
						'href'                  => '#',
						'class'                 => sprintf(
							'uk-position-small uk-position-center-right%1$s%2$s%3$s',
							$slide_nav_position === 'outside' ? '-out' : '',
							!empty( $show_slide_nav_when_hover ) ? ' uk-hidden-hover uk-transition-fade' : '',
							!empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : ''
						)
					)
				); ?>></a>
			<?php endif; ?>
		</div>
		<!-- # RENDER DOTS -->
		<?php if ( !empty( $show_dot_nav ) ) : ?>
			<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin <?php echo !empty( $dot_nav_breakpoint ) ? esc_attr( "uk-visible{$dot_nav_breakpoint}" ) : ''; ?>"></ul>
		<?php endif; ?>
	</div>
</div>