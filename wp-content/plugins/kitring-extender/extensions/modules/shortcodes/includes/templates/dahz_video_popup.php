<?php

$defined_image_size = array(
	'full',
	'thumbnail',
	'medium',
	'large'
);

# Shortcode attributes
$shortcode_attr = array();

# Shortcode classes
$shortcode_classes = array( 'de-sc-video-popup' );

# Button attributes
$button_attr = array();

# Icon attributes
$icon_attr = array();

# Icon classes
$icon_classes = array( 'de-sc-video-popup__icon' );

# Icon style
$icon_style = array();

# Text attributes
$text_attr = array();

# Text classes
$text_classes = array( 'de-sc-video-popup__text uk-position-medium' );

# Modal attributes
$modal_attr = array();

# SETTING SHORTCODE
	# Alignment
	if ( $video_popup_style === 'layout-3' ) {
		$shortcode_classes[] = $image_alignment;
	} else {
		$shortcode_classes[] = $icon_alignment;
	}

	# Add class
	$shortcode_attr['class'] = $shortcode_classes;
# END OF SETTING SHORTCODE

# SETTING BUTTON
	$button_attr['href'] = "#de-sc-vp-{$dahz_id}";

	$button_attr['data-uk-toggle'] = '';

	# Button classes
	$button_attr['class'] = 'de-sc-video-popup__button';
# END OF SETTING BUTTON

# SETTING ICON
	if ( $video_popup_style === 'layout-1' ) {
		# Icon
		$icon_attr['data-uk-icon'] = "icon: play-circle;ratio: 3.5;";

		# Class
		$icon_classes[] = 'de-sc-video-popup__icon--outline';

		# Color
		if ( !empty( $icon_outline_color ) )
			$icon_style[] = "color: {$icon_outline_color};";
	} else {
		# Icon
		$icon_attr['data-uk-icon'] = "icon: play;ratio: 2;";

		# Class animation
		$icon_classes[] = 'de-sc-video-popup__icon--fill';

		# Color
		if ( !empty( $icon_color ) )
			$icon_style[] = "color: {$icon_color};";

		# Background color
		if ( !empty( $icon_bg_color ) )
			$icon_style[] = "border-color: {$icon_bg_color};";
	}

	# Centering icon
	if ( $video_popup_style === 'layout-3' )
		$icon_classes[] = 'uk-position-center';

	# Add class
	if ( !empty( $icon_classes ) )
		$icon_attr['class'] = $icon_classes;

	# Add style
	if ( !empty( $icon_style ) )
		$icon_attr['style'] = $icon_style;
# END OF SETTING ICON

# SETTING TEXT
	# Text position
	switch ($text_position) {
		case 'above':
			$text_classes[] = 'uk-position-top-center-out';
			break;
		case 'before':
			$text_classes[] = 'uk-position-center-left-out';
			break;
		case 'after':
			$text_classes[] = 'uk-position-center-right-out';
			break;
		
		default:
			$text_classes[] = 'uk-position-bottom-center-out';
			break;
	}

	# Add class
	if ( !empty( $text_classes ) )
		$text_attr['class'] = $text_classes;

	# Add style
	if ( !empty( $text_color ) )
		$text_attr['style'] = "color: {$text_color}";
# END OF SETTING TEXT

# SETTING IMAGE
	# Box shadow bottom
	$image_box_shadow_bottom = '';

	if ( !empty( $image_bottom_shadow ) )
		$image_box_shadow_bottom = 'uk-box-shadow-bottom';

	# Get image
	if ( !empty( $image_size ) || !in_array( $image_size, $defined_image_size ) ) {
		$img = wpb_getImageBySize( array(
			'attach_id'  => $image,
			'thumb_size' => $image_size,
			'class'      => sprintf( '%1$s %2$s %3$s %4$s', $image_style, $image_box_shadow, $image_box_shadow_bottom, $image_hover_box_shadow ),
		));

		$video_image = $img['thumbnail'];
	} else {
		$video_image = wp_get_attachment_image( $image, 'full', false, array() );
	}
# END OF SETTING IMAGE

# SETTING MODAL
	# Class
	$modal_attr['class'] = array( 'uk-modal-dialog uk-margin-auto-vertical' );

	# Content
	$modal_content = '';

	if ( !empty( $video_url ) ) {
		if ( strpos( $video_url, 'youtube' ) > 0 ) {
			$modal_content = sprintf( '<iframe src="%1$s" width="600" height="337" data-uk-video></iframe>', esc_url( str_replace( "watch?v=", "embed/", $video_url ) ) );
		} elseif ( strpos( $video_url, 'vimeo' ) > 0 ) {
			$modal_content = sprintf( '<iframe src="%1$s" width="600" height="337" data-uk-video></iframe>', esc_url( str_replace( "vimeo.com", "player.vimeo.com/video", $video_url ) ) );
		} else {
			$modal_content = sprintf( '<video src="%1$s" width="600" height="337" controls playsinline data-uk-video></video>', esc_url( $video_url ) );
		}
	}
# END OF SETTING MODAL

# SETTING ANIMATION TABS
	# Animation attribute
	$scrollspy_attr = array();

	if ( $css_animation != 'parallax' && $css_animation !== 'none' ) {
		if ( !empty( $css_animation ) )
			$scrollspy_attr[] = sprintf( 'cls: %s;', $css_animation );

		if ( !empty( $repeat_animation ) )
			$scrollspy_attr[] = sprintf( 'repeat: %s;', $repeat_animation );

		if ( !empty( $delay_animation ) )
			$scrollspy_attr[] = sprintf( 'delay: %s;', $delay_animation );

		if ( !empty( $scrollspy_attr ) )
			$shortcode_attr['data-uk-scrollspy'] = $scrollspy_attr;
	}
# END OF SETTING ANIMATION TABS

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_video_popup_shortcode' ); ?>>
	<a <?php dahz_shortcode_set_attributes( $button_attr, 'dahz_video_popup_button_shortcode' ); ?>>
		<div class="uk-inline uk-position-relative">
			<?php if ( $video_popup_style === 'layout-3' && !empty( $image ) ) : ?>
				<?php echo $video_image; ?>
			<?php endif; ?>
			<span <?php dahz_shortcode_set_attributes( $icon_attr, 'dahz_video_popup_icon_shortcode' ); ?>>
				<?php if ( $enable_text && !empty( $link_text ) ) : ?>
					<<?php echo esc_html( $tag ); ?> <?php dahz_shortcode_set_attributes( $text_attr, 'dahz_video_popup_text_shortcode' ); ?>><?php esc_html_e( $link_text ); ?></<?php echo esc_html( $tag ); ?>>
				<?php endif; ?>
			</span>
		</div>
	</a>
</div>
<div id="<?php esc_attr_e( "de-sc-vp-{$dahz_id}" ); ?>" data-uk-modal>
	<div <?php dahz_shortcode_set_attributes( $modal_attr, 'dahz_video_popup_modal_shortcode' ); ?>>
		<?php echo $modal_content; ?>
	</div>
</div>