<?php

# Shortcode attributes
$shortcode_attr = array();

# Shortcode class
$shortcode_classes = array( 'de-sc-banner-info' );

# Image attributes
$image_attr = array();

# Image class
$image_classes = array( 'de-sc-banner-info__inner' );

# Text attributes
$text_attr = array();

# Text class
$text_classes = array( 'de-sc-banner-info__text' );

# Title attributes
$title_attr = array();

# Title style
$title_style = array();

# Description attributes
$description_attr = array();

# Description style
$description_style = array();

# Button attributes
$button_attr = array();

# Button class
$button_classes = array( 'uk-button uk-button-text' );

# Button style
$button_style = array();

# SETTING IMAGE
	# Image position
	if ( !empty( $image_position ) )
		$image_attr['data-image-position'] = $image_position;

	# Remove padding top
	if ( !empty( $remove_top_padding ) )
		$image_attr['data-remove-ptop'] = '';

	# Remove padding right
	if ( !empty( $remove_right_padding ) )
		$image_attr['data-remove-pright'] = '';

	# Remove padding bottom
	if ( !empty( $remove_bottom_padding ) )
		$image_attr['data-remove-pbottom'] = '';

	# Remove padding left
	if ( !empty( $remove_left_padding ) )
		$image_attr['data-remove-pleft'] = '';

	# Add class
	if ( !empty( $image_classes ) )
		$image_attr['class'] = $image_classes;
# END OF SETTING IMAGE

# SETTING TEXT
	# Text position
	if ( !empty( $text_position ) )
		$text_classes[] = "uk-{$text_position}";

	# Add class
	if ( !empty( $text_classes ) )
		$text_attr['class'] = $text_classes;
# END OF SETTING TEXT

# SETTING TITLE
	# Color
	if ( !empty( $title_color ) )
		$title_style[] = "color: {$title_color};";

	# Add style
	if ( !empty( $title_style ) )
		$title_attr['style'] = $title_style;
# END OF SETTING TITLE

# SETTING DESCRIPTION
	# Color
	if ( !empty( $description_color ) )
		$description_style[] = "color: {$description_color};";

	# Add style
	if ( !empty( $description_style ) )
		$description_attr['style'] = $description_style;
# END OF SETTING DESCRIPTION

# SETTING BUTTON
	# Url
	if ( !empty( $button_link ) )
		$button_attr['href'] = $button_link;

	# Title
	if ( !empty( $button_title ) )
		$button_attr['title'] = $button_title;

	# Target
	if ( !empty( $banner_button_target ) )
		$button_attr['target'] = $banner_button_target;

	# Add class
	if ( !empty( $button_classes ) )
		$button_attr['class'] = $button_classes;

	# Add class
	if ( !empty( $button_style ) )
		$button_attr['style'] = $button_style;
# END OF SETTING BUTTON

# SETTING SHORTCODE
	# Add class
	if ( !empty( $shortcode_classes ) )
		$shortcode_attr['class'] = $shortcode_classes;

	# Hover effect
	if ( !empty( $hover_effect ) )
		$shortcode_attr['data-hover-effect'] = $hover_effect;

	# Mobile
	if ( !empty( $banner_style ) )
		$shortcode_attr['data-mobile-style'] = $banner_style;
# END OF SETTING SHORTCODE

# GET PRODUCT
if ( $info == 'info-product' && !empty( $product_ids ) ) {
	$product = wc_get_product( $product_ids );

	$img_prm = get_post_thumbnail_id( $product_ids );

	$img_scn = $product->get_gallery_image_ids();

	$prd_url = get_permalink( $product_ids );

	$button_attr['href'] = $prd_url;
}

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_banner_info_shortcode' ); ?>>
	<div <?php dahz_shortcode_set_attributes( $image_attr, 'dahz_banner_info_image_shortcode' ); ?>>
		<div class="de-sc-banner-info__image">
			<?php if ( $info == 'info-image' ) : ?>
				<?php echo wp_get_attachment_image( $image, 'full' ); ?>
				<?php echo wp_get_attachment_image( $hover_image, 'full' ); ?>
			<?php else : ?>
				<?php if ( !empty( $product_ids ) ) : ?>
					<?php echo wp_get_attachment_image( $img_prm, 'full' ); ?>
					<?php if ( empty( $disable_secondary ) && !empty( $img_scn ) ) : ?>
						<?php echo wp_get_attachment_image( $img_scn[0], 'full' ); ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<div <?php dahz_shortcode_set_attributes( $text_attr, 'dahz_banner_info_text_shortcode' ); ?>>
		<?php if ( $info == 'info-image' ) : ?>
			<?php if ( !empty( $info_title ) ) : ?>
				<<?php echo esc_attr( $tag ); ?> <?php dahz_shortcode_set_attributes( $title_attr, 'dahz_banner_info_title_shortcode' ); ?>><?php echo esc_html( $info_title ); ?></<?php echo esc_attr( $tag ); ?>>
			<?php endif; ?>
			<?php if ( !empty( $content ) ) : ?>
				<p <?php dahz_shortcode_set_attributes( $description_attr, 'dahz_banner_info_description_shortcode' ); ?>>
					<?php echo wpb_js_remove_wpautop( $content, false );?>
				</p>
			<?php endif; ?>
		<?php else : ?>
			<?php if ( !empty( $product_ids ) ) : ?>
				<?php if ( !empty( $product->get_title() ) ) : ?>
					<<?php echo esc_attr( $tag ); ?> <?php dahz_shortcode_set_attributes( $title_attr, 'dahz_banner_info_ptitle_shortcode' ); ?>><a href="<?php echo esc_url( $prd_url ); ?>"><?php echo esc_html( $product->get_title() ); ?></a></<?php echo esc_attr( $tag ); ?>>
				<?php endif; ?>
				<?php if ( !empty( $product->get_price_html() ) ) : ?>
					<p <?php dahz_shortcode_set_attributes( $description_attr, 'dahz_banner_info_pdescription_shortcode' ); ?>><?php echo $product->get_price_html(); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( !empty( $button_text ) ) : ?>
			<a <?php dahz_shortcode_set_attributes( $button_attr, 'dahz_banner_info_button_shortcode' ); ?>><?php echo esc_html( $button_text ); ?></a>
		<?php endif; ?>
	</div>
</div>