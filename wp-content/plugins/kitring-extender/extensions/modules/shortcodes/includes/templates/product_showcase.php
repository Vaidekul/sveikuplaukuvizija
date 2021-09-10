<?php

// [11] => hover_bg_color
// [13] => hover_text_color

# Image
# Text
# Category
# Border
# Title
# Subtitle
# Description
# Button
# Prev
# Next

# Shortcode attributes
$shortcode_attr = array();

# Shortcode class
$shortcode_classes = array( 'de-sc-product-showcase' );

# Shortcode style
$shortcode_styles = array();

# Image attributes
$image_attr = array();

# Image class
$image_classes = array( 'de-ratio' );

# Image style
$image_styles = array();

# Text attributes
$text_attr = array();

# Text class
$text_classes = array( 'de-sc-product-showcase__text' );

# Text style
$text_styles = array();

# Category attributes
$cat_attr = array();

# Category class
$cat_classes = array( 'de-sc-product-showcase__cat' );

# Category style
$cat_styles = array();

# Border attributes
$border_attr = array();

# Border class
$border_classes = array( 'de-sc-product-showcase__border' );

# Border style
$border_styles = array();

# Title attributes
$title_attr = array();

# Title class
$title_classes = array( 'de-sc-product-showcase__title' );

# Title style
$title_styles = array();

# Subtitle attributes
$subtitle_attr = array();

# Subtitle class
$subtitle_classes = array( 'de-sc-product-showcase__subtitle' );

# Subtitle style
$subtitle_styles = array();

# Description attributes
$description_attr = array();

# Description class
$description_classes = array();

# Description style
$description_styles = array();

# Button attributes
$button_attr = array();

# Button class
$button_classes = array( 'uk-button', $button_type, $button_size );

# Button style
$button_styles = array();

# Prev attributes
$prev_attr = array();

# Prev class
$prev_classes = array( 'uk-position-small uk-position-center-left' );

# Prev style
$prev_styles = array();

# Next attributes
$next_attr = array();

# Next class
$next_classes = array( 'uk-position-small uk-position-center-right' );

# Next style
$next_styles = array();

# SETTING IMAGE
	# Default
	$image_styles[] = 'background-color: #eee;';

	# Ratio
	if ( empty( $height ) && !empty( $ratio ) )
		$image_classes[] = "de-ratio-{$ratio}";

	# Add class
	if ( !empty( $image_classes ) )
		$image_attr['class'] = $image_classes;

	# Add style
	if ( !empty( $image_styles ) )
		$image_attr['style'] = $image_styles;

	# Viewport height
	if ( !empty( $height ) )
		$image_attr['data-uk-height-viewport'] = array( $height );

	# Min height viewport
	if ( !empty( $height ) && !empty( $min_height ) )
		$image_attr['data-uk-height-viewport'][] = "min-height: {$min_height};";
# END OF SETTING IMAGE

# SETTING TEXT
	# Color scheme
	if ( !empty( $color_scheme ) )
		$text_classes[] = $color_scheme;

	# Add class
	if ( !empty( $text_classes ) )
		$text_attr['class'] = $text_classes;
# END OF SETTING TEXT

# SETTING CATEGORY
	# Uppercase
	if ( !empty( $is_cat_uppercase ) )
		$cat_classes[] = 'uk-text-uppercase';

	# Font size
	if ( !empty( $cat_font_size ) )
		$cat_styles[] = sprintf( 'font-size: %s;', dahz_shortcodes_check_param_value( $cat_font_size, 'inherit' ) );

	# Color
	if ( !empty( $cat_text_color ) )
		$cat_styles[] = "color: {$cat_text_color};";

	# Add class
	if ( !empty( $cat_classes ) )
		$cat_attr['class'] = $cat_classes;

	# Add style
	if ( !empty( $cat_styles ) )
		$cat_attr['style'] = $cat_styles;
# END OF SETTING CATEGORY

# SETTING BORDER
	# Color
	if ( !empty( $cat_border_color ) )
		$border_classes[] = "background-color: {$cat_border_color};";

	# Add class
	if ( !empty( $border_classes ) )
		$border_attr['class'] = $border_classes;

	# Add style
	if ( !empty( $border_styles ) )
		$border_attr['style'] = $border_styles;
# END OF SETTING BORDER

# SETTING TITLE
	# Uppercase
	if ( !empty( $is_title_uppercase ) )
		$title_classes[] = 'uk-text-uppercase';

	# Font size
	if ( !empty( $title_font_size ) )
		$title_styles[] = sprintf( 'font-size: %s;', dahz_shortcodes_check_param_value( $title_font_size, 'inherit' ) );

	# Line height
	if ( !empty( $title_line_height ) )
		$title_styles[] = "line-height: {$title_line_height};";

	# Color
	if ( !empty( $title_color ) )
		$title_styles[] = "color: {$title_color};";

	# Font
	if ( ! isset( $use_theme_fonts ) || 'yes' !== $use_theme_fonts ) {

		$google_fonts_obj = new Vc_Google_Fonts();

		$google_fonts_field_settings = isset( $google_fonts_field['settings'], $google_fonts_field['settings']['fields'] ) ? $google_fonts_field['settings']['fields'] : array();

		$google_fonts_data = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $google_fonts_field_settings, $google_fonts ) : '';

		# Font data subset extraction
		$settings = get_option( 'wpb_js_google_fonts_subsets' );

		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$google_fonts_subsets = '&subset=' . implode( ',', $settings );
		} else {
			$google_fonts_subsets = '';
		}

		# Enqueue google fonts
		if ( !empty( $google_fonts_data['values']['font_family'] ) ) {
			wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $google_fonts_subsets );
		}

		# Get Font Name
		$fonts       = explode( ':', $google_fonts_data['values']['font_family'] );
		$font_family = $fonts[0];

		$title_styles[] = "font-family: {$font_family};";

		# Get font style
		$font_style = explode( ':', $google_fonts_data['values']["font_style"] );
		$font_style = $font_style[0];
		$font_style = intval(preg_replace('/[^0-9]+/', '', $font_style), 10);

		$title_styles[] = "font-weight: {$font_style};";

	}

	# Add class
	if ( !empty( $title_classes ) )
		$title_attr['class'] = $title_classes;

	# Add style
	if ( !empty( $title_styles ) )
		$title_attr['style'] = $title_styles;
# END OF SETTING TITLE

# SETTING SUBTITLE
	# Uppercase
	if ( !empty( $is_subtitle_uppercase ) )
		$subtitle_classes[] = 'uk-text-uppercase';

	# Font size
	if ( !empty( $subtitle_font_size ) )
		$subtitle_styles[] = sprintf( 'font-size: %s;', dahz_shortcodes_check_param_value( $subtitle_font_size, 'inherit' ) );

	# Color
	if ( !empty( $subtitle_color ) )
		$subtitle_styles[] = "color: {$subtitle_color};";

	# Add class
	if ( !empty( $subtitle_classes ) )
		$subtitle_attr['class'] = $subtitle_classes;

	# Add style
	if ( !empty( $subtitle_styles ) )
		$subtitle_attr['style'] = $subtitle_styles;
# END OF SETTING SUBTITLE

# SETTING DESCRIPTION
	# Font size
	if ( !empty( $description_font_size ) )
		$description_styles[] = sprintf( 'font-size: %s;', dahz_shortcodes_check_param_value( $description_font_size, 'inherit' ) );

	# Color
	if ( !empty( $description_color ) )
		$description_styles[] = "color: {$description_color};";

	# Add class
	if ( !empty( $description_classes ) )
		$description_attr['class'] = $description_classes;

	# Add style
	if ( !empty( $description_styles ) )
		$description_attr['style'] = $description_styles;
# END OF SETTING DESCRIPTION

# SETTING BUTTON

	# Add class
	if ( !empty( $button_classes ) )
		$button_attr['class'] = $button_classes;

	# Add style
	if ( !empty( $button_styles ) )
		$button_attr['style'] = $button_styles;
# END OF SETTING BUTTON

# SETTING PREV ARROW
	# Position
	if ( !empty( $slide_nav_pos ) )
		$prev_classes[] = $slide_nav_pos;

	# Visible on hover
	if ( !empty( $is_nav_hover ) )
		$prev_classes[] = $is_nav_hover;

	# Breakpoint
	if ( !empty( $slide_nav_breakpoint ) )
		$next_classes[] = " uk-visible{$slide_nav_breakpoint}";

	# Add class
	if ( !empty( $prev_classes ) )
		$prev_attr['class'] = $prev_classes;

	$prev_attr['data-uk-slidenav-previous'] = '';

	$prev_attr['data-uk-slider-item'] = 'previous';

	$prev_attr['href'] = '#';
# END OF SETTING PREV ARROW

# SETTING NEXT ARROW
	# Position
	if ( !empty( $slide_nav_pos ) )
		$next_classes[] = $slide_nav_pos;

	# Visible on hover
	if ( !empty( $is_nav_hover ) )
		$next_classes[] = $is_nav_hover;

	# Breakpoint
	if ( !empty( $slide_nav_breakpoint ) )
		$next_classes[] = " uk-visible{$slide_nav_breakpoint}";

	# Add class
	if ( !empty( $next_classes ) )
		$next_attr['class'] = $next_classes;

	$next_attr['data-uk-slidenav-next'] = '';

	$next_attr['data-uk-slider-item'] = 'next';

	$next_attr['href'] = '#';
# END OF SETTING NEXT ARROW

# SETTING SLIDER
	$shortcode_classes[] = 'uk-visible-toggle';

	$shortcode_attr['data-uk-slider'] = array();

	# Autoplay enabled
	if ( !empty( $autoplay ) )
		$shortcode_attr['data-uk-slider'][] = "autoplay: true;autoplay-interval: {$autoplay};";

	# Infinite enabled
	if ( !empty( $is_disable_infinite ) )
		$shortcode_attr['data-uk-slider'][] = 'finite: false;';
# END OF SETTING SLIDER

# SETTING SHORTCODE
	# Add class
	if ( !empty( $shortcode_classes ) )
		$shortcode_attr['class'] = $shortcode_classes;

	# Layout
	if ( !empty( $layout ) )
		$shortcode_attr['data-layout'] = $layout;
# END OF SETTING SHORTCODE

# PARSE PRODUCT SHOWCASE
$parse_product_showcase = vc_param_group_parse_atts( $product_showcase_item );

# Exceprt length
$excerpt = !empty( $excerpt ) && $excerpt >= 5 ? $excerpt <= 50 ? $excerpt : 50 : 20;

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr ); ?>>
	<div class="uk-position-relative">
		<!-- RENDER SLIDER ITEM -->
		<div class="uk-slider-container">
			<div class="uk-slider-items">
				<?php foreach( $parse_product_showcase as $key => $product_item ) :
					# Prevent undefined variable
					$product_atts = array();

					if ( $product_item['type'] == 'woo' ) {
						$product_atts = array(
							'product_ids'		=> '',
							'is_custom_image'	=> false,
							'image'				=> '',
							'image_hover'		=> ''
						);
					} else {
						$product_atts = array(
							'cat_text'			=> 'Uncategorized',
							'title'				=> 'Title Here',
							'custom_image'		=> '',
							'custom_image_hover'=> '',
							'subtitle'			=> 'Price Here',
							'description'		=> 'Lorem ipsum dolor sit amet',
							'button_text'		=> 'Add to Cart',
							'button_url'		=> '#',
							'button_title'		=> '',
							'button_target'		=> '',
						);
					}

					$product_item = array_merge( $product_atts, $product_item );

					# Output
					$output_prm_id      = '';
					$output_scn_id      = '';
					$output_category    = '';
					$output_title       = '';
					$output_subtitle    = '';
					$output_description = '';
					$output_button_text = '';

					if ( $product_item['type'] == 'woo' && !empty( $product_item['product_ids'] ) ) {
						# GET PRODUCT
							$trm_url  = '';
							$trm_name = '';
							$product  = wc_get_product( $product_item['product_ids'] );

							# PRIMARY IMAGE
							$img_prm  = get_post_thumbnail_id( $product_item['product_ids'] );
							# SECONDARY IMAGE
							$img_scn  = $product->get_gallery_image_ids();
							$img_scn  = $img_scn[0];
							# CATEGORY
							$prd_trm  = get_the_terms( $product_item['product_ids'], 'product_cat' );

							if ( !empty( $prd_trm ) ) {
								$trm_url  = get_term_link( $prd_trm[0]->term_id );
								$trm_name = $prd_trm[0]->name;
							}
							# TITLE
							switch ( $product_item['target'] ) {
								case 'single':
									$prd_url = get_permalink( $product_item['product_ids'] );
									break;
								case 'quickview':
									$prd_url = '';

									$button_attr['class'][] = 'de-quickview__button';

									$button_attr['data-product-id'] = $product_item['product_ids'];
									break;

								default:
									if ( $product->is_type('simple') ) {
										$prd_url = sprintf( '?add-to-cart=%s', $product_item['product_ids'] );

										$button_attr['class'][] = 'product_type_simple add_to_cart_button ajax_add_to_cart';
									} else {
										$prd_url = get_permalink( $product_item['product_ids'] );
									}
									break;
							}
							$prd_name = $product->get_title();
							# PRICE
							$prd_prce = $product->get_price_html();
							# DESCRIPTION
							$prd_desc = $product->get_short_description();
							$prd_desc = strlen( $prd_desc ) >= 5 ? $prd_desc : '';
							$prd_desc = strlen( $prd_desc ) >= $excerpt ? substr( $prd_desc, 0, $excerpt ) : $prd_desc;
							# BUTTON
							$prd_btn  = $product_item['target'] === 'default' ? 'Add to Cart' : 'View Detail';

						# END OF GET PRODUCT

						# Output
						$output_prm_id      = $product_item['is_custom_image'] ? $product_item['image'] : $img_prm;
						$output_scn_id      = $product_item['is_custom_image'] ? $product_item['image_hover'] : $img_scn;
						$output_category    = $trm_name;
						$output_title       = $prd_name;
						$output_subtitle    = $prd_prce;
						$output_description = $prd_desc;
						$output_button_text = $prd_btn;

						if ( !empty( $prd_url ) ) $button_attr['href'] = $prd_url;

						if ( !empty( $prd_btn ) ) $button_attr['title'] = $prd_btn;

						if ( !empty( $product_item['button_target'] ) ) $button_attr['target'] = $product_item['button_target'];
					} else if( $product_item['type'] == 'custom' ){
						# Output
						$output_prm_id      = !empty( $product_item['custom_image'] ) ? $product_item['custom_image'] : '';
						$output_scn_id      = !empty( $product_item['custom_image_hover'] ) ? $product_item['custom_image_hover'] : '';
						$output_category    = !empty( $product_item['cat_text'] ) ? $product_item['cat_text'] : '';
						$output_title       = !empty( $product_item['title'] ) ? $product_item['title'] : '';
						$output_subtitle    = !empty( $product_item['subtitle'] ) ? $product_item['subtitle'] : '';
						$output_description = !empty( $product_item['description'] ) ? $product_item['description'] : '';
						$output_button_text = !empty( $product_item['button_text'] ) ? $product_item['button_text'] : '';

						if ( !empty( $product_item['button_url'] ) ) $button_attr['href'] = $product_item['button_url'];

						if ( !empty( $product_item['button_title'] ) ) $button_attr['title'] = $product_item['button_title'];

						if ( !empty( $product_item['button_target'] ) ) $button_attr['target'] = $product_item['button_target'];
					}

					# Tilt
					if ( $product_item['hover_effect'] === 'parallax-tilt' || $product_item['hover_effect'] === 'parallax-tilt-glare' ) {
						$image_attr['data-tilt'] = '';

						$image_attr['data-tilt-perspective'] = '4000';
					}
					?>
					<div class="uk-width-1-1 uk-position-relative" data-hover-effect="<?php echo !empty( $product_item['hover_effect'] ) ? $product_item['hover_effect'] : 'none'; ?>">
						<div class="de-sc-product-showcase__image">
							<div <?php dahz_shortcode_set_attributes( $image_attr ); ?>>
								<?php echo wp_get_attachment_image( $output_prm_id, 'full', false, array( 'class' => 'de-ratio-content' ) ); ?>
								<?php if ( !empty( $product_item['hover_effect'] ) ) : ?>
								<?php echo wp_get_attachment_image( $output_scn_id, 'full', false, array( 'class' => 'de-ratio-content' ) ); ?>
								<?php endif; ?>
							</div>
						</div>
						<div <?php dahz_shortcode_set_attributes( $text_attr ); ?>>
							<div>
								<?php if ( !empty( $output_category ) && empty( $is_hide_cat ) ) : ?>
								<<?php echo esc_attr( $cat_tag ); ?> <?php dahz_shortcode_set_attributes( $cat_attr ); ?>>
								<?php if ( $product_item['type'] === 'woo' && !empty( $trm_url ) ) : ?><a href="<?php echo esc_url( $trm_url ); ?>"><?php endif; ?>
								<?php echo esc_html( $output_category ); ?>
								<?php if ( $product_item['type'] === 'woo' && !empty( $trm_url ) ) : ?></a><?php endif; ?>
								</<?php echo esc_attr( $cat_tag ); ?>>
								<?php endif; ?>
								<?php if ( empty( $is_hide_border ) ) : ?>
								<span <?php dahz_shortcode_set_attributes( $border_attr ); ?>></span>
								<?php endif; ?>
								<?php if ( !empty( $output_title ) ) : ?>
								<<?php echo esc_attr( $title_tag ); ?> <?php dahz_shortcode_set_attributes( $title_attr ); ?>>
								<?php if ( $product_item['type'] === 'woo' ) : ?><a href="<?php echo esc_url( $prd_url ); ?>"><?php endif; ?>
								<?php echo esc_html( $output_title ); ?>
								<?php if ( $product_item['type'] === 'woo' ) : ?></a><?php endif; ?>
								</<?php echo esc_attr( $title_tag ); ?>>
								<?php endif; ?>
								<?php if ( !empty( $output_subtitle ) && empty( $is_hide_subtitle ) ) : ?>
								<<?php echo esc_attr( $subtitle_tag ); ?> <?php dahz_shortcode_set_attributes( $subtitle_attr ); ?>>
								<?php echo $output_subtitle; ?>
								</<?php echo esc_attr( $subtitle_tag ); ?>>
								<?php endif; ?>
								<?php if ( !empty( $output_description ) && empty( $is_hide_description ) ) : ?>
								<p <?php dahz_shortcode_set_attributes( $description_attr ); ?>>
								<?php echo esc_html( $output_description ); ?>
								</p>
								<?php endif; ?>
								<a <?php dahz_shortcode_set_attributes( $button_attr ); ?>>
								<?php echo esc_html__( $output_button_text, 'sobari_sc' ); ?>
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- RENDER ARROW -->
		<?php if ( !empty( $is_slide_nav ) ) : ?>
			<a <?php dahz_shortcode_set_attributes( $prev_attr ); ?>></a>
			<a <?php dahz_shortcode_set_attributes( $next_attr ); ?>></a>
		<?php endif; ?>
	</div>
	<!-- # RENDER DOTS -->
	<?php if ( !empty( $is_slide_dot ) ) : ?>
		<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin <?php echo !empty( $dot_nav_breakpoint ) ? esc_attr( "uk-visible{$slide_dot_breakpoint}" ) : ''; ?>"></ul>
	<?php endif; ?>
</div>
