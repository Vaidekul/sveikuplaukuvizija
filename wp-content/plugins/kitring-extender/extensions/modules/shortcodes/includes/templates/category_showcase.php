<?php

# Shortcode attr
$shortcode_attr = array();

# Shortcode class
$shortcode_classes = array( 'de-sc-category-showcase de-sc-product-categories uk-grid' );

# Item attr
$item_attr = array();

# Item class
$item_classes = array( 'de-sc-product-categories__item' );

# Content attr
$content_attr = array();

# Content class
$content_classes = array( 'de-sc-product-categories__item-detail' );

# Content style
$content_styles = array();

# SETTING ITEM
	# Ratio grid
	if ( !empty( $ratio ) && $style === 'grid' )
		$item_classes[] = "de-ratio de-ratio-{$ratio}";

	# Ratio masonry
	if ( !empty( $media_ratio ) && $style === 'masonry' )
		$item_classes[] = "de-ratio de-ratio-{$media_ratio}";

	# Box shadow
	if ( !empty( $box_shadow ) )
		$item_classes[] = $box_shadow;

	# Box shadow hover
	if ( !empty( $hover_box_shadow ) )
		$item_classes[] = $hover_box_shadow;

	# Extra box shadow
	if ( !empty( $is_extra_boxshadow ) )
		$item_classes[] = 'uk-box-shadow-bottom';

	# Add class
	if ( !empty( $item_classes ) )
		$item_attr['class'] = $item_classes;
# END OF SETTING ITEM

# SETTING CONTENT
	# Text color
	if ( !empty( $text_color ) )
		$content_styles[] = "color: {$text_color};";

	# Overlay color
	if ( !empty( $color_overlay ) )
		$content_styles[] = "background-color: {$color_overlay};";

	# Border color
	if ( !empty( $hover_border_color ) )
		$content_styles[] = "border-color: {$hover_border_color};";

	# Add class
	if ( !empty( $content_classes ) )
		$content_attr['class'] = $content_classes;

	# Add style
	if ( !empty( $content_styles ) )
		$content_attr['style'] = $content_styles;
# END OF SETTING CONTENT

# SETTING COLUMN ON ALL DEVICES GRID
	# Set phone portrait column
	if ( !empty( $phone_potrait_column_grid ) && $style === 'grid' )
		$shortcode_classes[] = "uk-child-width-1-{$phone_potrait_column_grid}";

	# Set phone landscape & tablet portrait column
	if ( !empty( $phone_landscape_column_grid ) && $style === 'grid' )
		$shortcode_classes[] = "uk-child-width-1-{$phone_landscape_column_grid}@s";

	# Set tablet landscape column
	if ( !empty( $tablet_landscape_column_grid ) && $style === 'grid' )
		$shortcode_classes[] = "uk-child-width-1-{$tablet_landscape_column_grid}@m";

	# Set desktop column
	if ( !empty( $grid_column ) && $style === 'grid' )
		$shortcode_classes[] = "uk-child-width-1-{$grid_column}@l";
# END OF SETTING COLUMN ON ALL DEVICES GRID

# SETTING COLUMN ON ALL DEVICES MASONRY
	# Set phone portrait column
	if ( !empty( $phone_potrait_column_masonry ) && $style === 'masonry' )
		$shortcode_classes[] = "uk-child-width-1-{$phone_potrait_column_masonry}";

	# Set phone landscape & tablet portrait column
	if ( !empty( $phone_landscape_column_masonry ) && $style === 'masonry' )
		$shortcode_classes[] = "uk-child-width-1-{$phone_landscape_column_masonry}@s";

	# Set tablet landscape column
	if ( !empty( $tablet_landscape_column_masonry ) && $style === 'masonry' )
		$shortcode_classes[] = "uk-child-width-1-{$tablet_landscape_column_masonry}@m";
# END OF SETTING COLUMN ON ALL DEVICES MASONRY

# SETTING SHORTCODE
	# Grid
	if ( !empty( $style ) )
		$shortcode_attr['data-uk-grid'] = '';

	# Style
	if ( !empty( $style ) )
		$shortcode_attr['data-view'] = $style;

	# Gutter
	if ( !empty( $item_spacing_grid ) )
		$shortcode_classes[] = $item_spacing_grid;

	# Gutter masonry
	if ( !empty( $item_spacing_grid ) && $style === 'masonry' )
		$shortcode_attr['data-gutter'] = $item_spacing_grid;

	# Layout
	if ( !empty( $product_tax_style ) )
		$shortcode_attr['data-layout'] = $product_tax_style;

	# Hover
	if ( !empty( $hover_effect ) )
		$shortcode_attr['data-hover-effect'] = $hover_effect;

	# Show total number when hover
	if ( !empty( $show_total_number_when_hover ) )
		$shortcode_attr['data-hover-number'] = $show_total_number_when_hover;

	# Always show on mobile
	if ( !empty( $always_show_on_mobile ) )
		$shortcode_attr['data-show-mobile'] = $always_show_on_mobile;

	# Add class
	if ( !empty( $shortcode_classes ) )
		$shortcode_attr['class'] = $shortcode_classes;
# END OF SETTING SHORTCODE

$taxonomy = '';

$include = array();

# Get taxonomy
switch ($post_type) {
	case 'portfolio':
		$taxonomy = 'portfolio_categories';

		$parse_item = vc_param_group_parse_atts( $portfolio_categories );

		$item_type = 'portfolio_categories_item';
		break;
	case 'product':
		$taxonomy = 'product_cat';

		$parse_item = vc_param_group_parse_atts( 'product_categories' );

		$item_type = "product_categories_item";
		break;

	default:
		$taxonomy = 'category';

		$parse_item = vc_param_group_parse_atts( $post_categories );

		$item_type = 'post_categories_item';
		break;
}
# Get categories included
foreach( $parse_item as $key => $item ) {
	
	$include[] = $item[$item_type];
	
}

# Get categories
$categories = get_categories(
	array(
		'taxonomy'   => $taxonomy, # empty string(''), false, 0 don't work, and return empty array
		'hide_empty' => !empty( $hide_empty ) ? true : false, # can be 1, '1' too
		'include'    => implode( ',', $include ), # empty string(''), false, 0 don't work, and return empty array
		'fields'     => 'all',
	)
);

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr ); ?>>
	<?php foreach ($categories as $key => $category) : ?>
		<?php
			# Get image id
			switch ( $post_type ) :
				case 'portfolio':
					$category_image_id = dahz_framework_get_term_meta( $category->taxonomy, $category->term_id, 'image_upload', '' );
					break;
				case 'product':
					$category_image_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
					break;

				default:
					$category_image_id = dahz_framework_get_term_meta( $category->taxonomy, $category->term_id, 'image_upload', '' );
					break;
			endswitch;

			# Set masonry props
			if ( $style === 'masonry' ) {
				
				$item_attr['data-width'] = $parse_item[$key]['media_width'];

				$item_attr['data-height'] = $parse_item[$key]['media_height'];
				
			}
		?>
		<div class="de-sc-category-showcase__item">
			<div <?php dahz_shortcode_set_attributes( $item_attr ); ?>>
				<div class="de-sc-product-categories__item-category uk-transition-toggle">
					<a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>">
						<?php echo wp_get_attachment_image( $category_image_id, 'full', false, array( 'alt' => get_post_field( 'post_title', $category_image_id ) ) ); ?>
						<div class="uk-overlay uk-position-top-left uk-width-1-1 uk-height-1-1 uk-transition-fade"></div>
						<div <?php dahz_shortcode_set_attributes( $content_attr ); ?>>
							<div>
								<h3><?php echo esc_html( $category->name ); ?></h3>
								<?php if ( !empty( $show_total_number ) ) : ?>
									<p><?php echo esc_html( sprintf( '%s %s', $category->category_count, $post_type ) ); ?></p>
								<?php endif;?>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>