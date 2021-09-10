<?php

$defined_image_size = array(
	'full',
	'thumbnail',
	'medium',
	'large'
);

# Shortcode attr
$shortcode_attr = array();

# Shortcode class
$shortcode_classes = array( 'de-sc-banner-button' );

# Shortcode style
$shortcode_style = array();

# Main attr
$main_attr = array();

# Main class
$main_classes = array( 'de-sc-banner-button__image' );

# Main style
$main_style = array();

# Overlay attr
$overlay_attr = array();

# Overlay class
$overlay_classes = array( 'de-sc-banner-button__overlay' );

# Overlay style
$overlay_style = array();

# Title attr
$title_attr = array();

# Title style
$title_style = array();

# Description attr
$description_attr = array();

# Description style
$description_style = array();

# SETTING MAIN IMAGE
	# Get image
	if ( !empty( $image ) ) {
		$bg_url = '';

		$bg_height = '';

		if ( !empty( $image_size ) && !in_array( $image_size, $defined_image_size ) ) {
			$size = explode( 'x', $image_size );

			$image_src = wpb_resize( $image, null, $size[0], $size[1], true );

			$bg_url = $image_src['url'];

			$bg_height = ( $image_src['height'] / $image_src['width'] ) * 100;
		} else {
			$image_src = wp_get_attachment_image_src( $image, $image_size, false );

			$bg_url = $image_src[0];

			$bg_height = ( $image_src[2] / $image_src[1] ) * 100;
		}
		# Bg color
		if ( !empty( $bg_color ) )
			$main_style[] = "background-color: {$bg_color};";

		# Bg img
		$main_style[] = sprintf( 'background-image: url(%s);', $bg_url );

		# Height
		$shortcode_style[] = "padding-bottom: {$bg_height}%;";
	}

	# Blend mode
	if ( !empty( $blend_mode ) )
		$main_classes[] = $blend_mode;

	# Add class
	if ( !empty( $main_classes ) )
		$main_attr['class'] = $main_classes;

	# Add style
	if ( !empty( $main_style ) )
		$main_attr['style'] = $main_style;
# END OF SETTING MAIN IMAGE

# SETTING OVERLAY
	if ( !empty( $color_overlay ) )
		$overlay_style[] = "background-color: {$color_overlay}";

	# Add class
	if ( !empty( $overlay_classes ) )
		$overlay_attr['class'] = $overlay_classes;

	# Add style
	if ( !empty( $overlay_style ) )
		$overlay_attr['style'] = $overlay_style;
# END OF SETTING OVERLAY

# SETTING TITLE
	# Color
	if ( !empty( $title_color ) )
		$title_style[] = "color: {$title_color};";

	# Bg color
	if ( !empty( $title_background_color ) )
		$title_style[] = "background-color: {$title_background_color};padding: 8px 20px;";

	# Typo
	if ( !empty( $font_container ) ) {

		$font_container_obj = new Vc_Font_Container();

		$font_container_field_settings = isset( $font_container_field['settings'], $font_container_field['settings']['fields'] ) ? $font_container_field['settings']['fields'] : array();

		$font_container_data = $font_container_obj->_vc_font_container_parse_attributes( $font_container_field_settings, $font_container );

		$fs = dahz_shortcodes_check_param_value( $font_container_data['values']['font_size'], 'inherit' );

		$lh = dahz_shortcodes_check_param_value( $font_container_data['values']['line_height'], 'inherit', '' );

		$title_style[] = "font-size: {$fs};";

		$title_style[] = "line-height: {$lh};";
	}

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

		$title_style[] = "font-family: {$font_family};";

		# Get font style
		$font_style = explode( ':', $google_fonts_data['values']["font_style"] );
		$font_style = $font_style[0];
		$font_style = intval(preg_replace('/[^0-9]+/', '', $font_style), 10);

		$title_style[] = "font-weight: {$font_style};";

	}

	# Add class
	$title_attr['class'] = 'de-sc-banner-button__title';

	# Add style
	if ( !empty( $title_style ) )
		$title_attr['style'] = $title_style;
# END OF SETTING TITLE

# SETTING DESCRIPTION
	# Color
	if ( !empty( $description_color ) )
		$description_style[] = "color: {$description_color};";

	# Bg color
	if ( !empty( $description_background_color ) )
		$description_style[] = "background-color: {$description_background_color};padding: 8px 20px;";

	# Add style
	if ( !empty( $description_style ) )
		$description_attr['style'] = $description_style;

	# Description location
	if ( !empty( $description_position ) )
		$description_attr['class'] = $description_position;
# END OF SETTING DESCRIPTION

# SETTING SHORTCODE
	# Bg color
	if ( !empty( $bg_color ) )
		$shortcode_style[] = "background-color: {$bg_color};";

	# Hover
	if ( !empty( $hover_effect ) ) {
		$shortcode_attr['data-hover-effect'] = $hover_effect;

		# Tilt
		if ( $hover_effect === 'parallax-tilt' || $hover_effect === 'parallax-tilt-glare' ) {
			$shortcode_attr['data-tilt'] = '';

			$shortcode_attr['data-tilt-perspective'] = '4000';
		}
	}

	# Box shadow
	if ( !empty( $box_shadow ) )
		$shortcode_classes[] = $box_shadow;

	# Box shadow extra
	if ( !empty( $is_extra_boxshadow ) )
		$shortcode_classes[] = $is_extra_boxshadow;

	# Box shadow hover
	if ( !empty( $hover_box_shadow ) )
		$shortcode_classes[] = $hover_box_shadow;

	# Add class
	if ( !empty( $shortcode_classes ) )
		$shortcode_attr['class'] = $shortcode_classes;

	# Add style
	if ( !empty( $shortcode_style ) )
		$shortcode_attr['style'] = $shortcode_style;
# END OF SETTING SHORTCODE

# DECODE BUTTON
$buttons_decode = (array)vc_param_group_parse_atts( $buttons );

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_banner_image_shortcode' ); ?>>
	<?php if ( $image ) : ?>
		<div <?php dahz_shortcode_set_attributes( $main_attr, 'dahz_banner_image_main_shortcode' ); ?>></div>
	<?php endif; ?>
	<?php if ( !empty( $buttons_decode ) ) : ?>
		<?php foreach ($buttons_decode as $key => $value) {
			# Hover attr
			$hover_attr = array();

			# Hover class
			$hover_classes = array( 'de-sc-banner-button__image' );

			# Hover style
			$hover_style = array();


			# SETTING HOVER IMAGE
				# Get image
				if ( !empty( $value['hover_bg_image'] ) ) {
					$hover_bg_image = $value['hover_bg_image'];
					$bg_url = '';

					$bg_height = '';

					if ( !empty( $image_size ) && !in_array( $image_size, $defined_image_size ) ) {
						$size = explode( 'x', $image_size );

						$image_src = wpb_resize( $hover_bg_image, null, $size[0], $size[1], true );

						$bg_url = $image_src['url'];

						$bg_height = ( $image_src['height'] / $image_src['width'] ) * 100;
					} else {
						$image_src = wp_get_attachment_image_src( $hover_bg_image, $image_size, false );

						$bg_url = $image_src[0];

						$bg_height = ( $image_src[2] / $image_src[1] ) * 100;
					}
					# Bg color
					if ( !empty( $bg_color ) )
						$hover_style[] = "background-color: {$bg_color};";

					# Bg img
					$hover_style[] = sprintf( 'background-image: url(%s);', $bg_url );
				}

				# Blend mode
				if ( !empty( $blend_mode ) )
					$hover_classes[] = $blend_mode;

				# Add id
				if ( !empty( $hover_classes ) )
					$hover_attr['id'] = "de-sc-bnr-{$dahz_id}-{$key}";

				# Add class
				if ( !empty( $hover_classes ) )
					$hover_attr['class'] = $hover_classes;

				# Add style
				if ( !empty( $hover_style ) )
					$hover_attr['style'] = $hover_style;
			# END OF SETTING HOVER IMAGE
			?>
			<div <?php dahz_shortcode_set_attributes( $hover_attr, 'dahz_banner_image_hover_shortcode' ); ?>></div>
		<?php } ?>
	<?php endif; ?>
	<div <?php dahz_shortcode_set_attributes( $overlay_attr, 'dahz_banner_image_overlay_shortcode' ); ?>></div>
	<div class="<?php echo esc_attr( sprintf( 'de-sc-banner-button__content-wrap uk-visible-toggle %s', $text_position ) ); ?>">
		<?php if ( !empty( $info_title ) ) : ?>
			<<?php echo esc_html( $tag ); ?> <?php dahz_shortcode_set_attributes( $title_attr, 'dahz_banner_image_title_shortcode' ); ?>><?php echo esc_html( $info_title ); ?></<?php echo esc_html( $tag ); ?>>
		<?php endif; ?>
		<?php if ( !empty( $content ) ) : ?>
			<p <?php dahz_shortcode_set_attributes( $description_attr, 'dahz_banner_image_description_shortcode' ); ?>>
				<?php echo wpb_js_remove_wpautop( $content, false );?>
			</p>
		<?php endif; ?>
		<?php if ( !empty( $buttons_decode ) ) : ?>
			<div class="de-sc-banner-button__button-wrap">
				<?php foreach ($buttons_decode as $key => $value) {
					
					$value = wp_parse_args( 
						$value, 
						array( 
							'use_icon' 		=> false,
							'button_size'	=> '',
							'buttton_type'	=> 'uk-button-default',
						) 
					);
					# Button attr
					$button_attr = array(
						'id'				=> "de-sc-btn-{$dahz_id}-{$key}",
						'data-uk-toggle'	=> "target: #de-sc-bnr-{$dahz_id}-{$key}; mode: hover;cls: de-sc-banner-button__image--visible",
					);

					# Button style
					$button_style = array();

					# Button class
					$button_classes = array( 'uk-button', $value['buttton_type'], $value['button_size'] );

					# Icon attributes
					$icon_attr = array();

					# Icon class
					$icon_classes = array();

					# SETTING BUTTON
						# Button attr
						if ( !empty( $value['button_link'] ) )
							$button_attr['href'] = $value['button_link'];

						# Button class
						if ( !empty( $button_classes ) )
							$button_attr['class'] = $button_classes;

						# Button title
						if ( !empty( $value['button_title'] ) )
							$button_attr['title'] = $value['button_title'];

						# Button target
						if ( !empty( $value['banner_button_target'] ) )
							$button_attr['target'] = $value['banner_button_target'];

						# Button style
						if ( !empty( $button_style ) )
							$button_attr['style'] = $button_style;

					# END OF SETTING BUTTON

					# SETTING ICON
						if ( $value['use_icon'] && !empty( $value['icon_'. $value['type']] ) ){
							# Icon
							$icon_classes[] = $value['icon_'. $value['type']];
							$icon_classes[] = !empty( $value['icon_alignment'] ) ? 'uk-margin-small-right' : 'uk-margin-small-left';
							# Icon alignment
							if ( !empty( $value['icon_alignment'] ) )
								$icon_classes[] = $value['icon_alignment'];

							# Add style
							if ( !empty( $icon_classes ) )
								$icon_attr['class'] = $icon_classes;
						}

					# END OF SETTING ICON
					?>
					<a <?php dahz_shortcode_set_attributes( $button_attr, 'dahz_banner_image_button_shortcode' ); ?>>
						<span class="uk-flex uk-flex-middle">
						
							<?php if( !empty( $value['button_text'] ) ):?>
								<?php echo esc_html( $value['button_text'] );?>
							<?php endif; ?>
							
							<?php if ( $value['use_icon'] && !empty( $value['icon_'. $value['type']] ) ) : vc_icon_element_fonts_enqueue( $value['type'] );?>
								<i <?php dahz_shortcode_set_attributes( $icon_attr, 'dahz_banner_image_icon_shortcode' ); ?>></i>
							<?php endif; ?>
						
						</span>
					</a>
				<?php } ?>
			</div>
		<?php endif; ?>
	</div>
</div>
