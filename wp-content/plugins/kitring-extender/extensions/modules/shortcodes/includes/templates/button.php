<?php

# Shortcode attributes
$shortcode_attr = array();

# Shortcode style
$shortcode_style = array();

# Icon attributes
$icon_attr = array();

# Modal attributes
$modal_attr = array();

# SETTING SHORTCODE
	# Link
	switch ($button_target) {
		case 'lightbox':
			$shortcode_attr['href'] = "#de-sc-btn-{$dahz_id}";

			$shortcode_attr['data-uk-toggle'] = '';
			break;
		case 'scroll':
			$shortcode_attr['href'] = !empty( $button_link ) ? $button_link : '#';

			$shortcode_attr['data-uk-scroll'] = '';
			break;

		default:
			$shortcode_attr['href'] = !empty( $button_link ) ? $button_link : '#';
			break;
	}

	# Class
	$shortcode_attr['class'] = array( 'uk-button', $button_type, $button_size );

	# Title
	if ( !empty( $button_title ) ){$shortcode_attr['title'] = $button_title;}
	# Target
	if ( $button_target !== 'lightbox' ){$shortcode_attr['target'] = $button_target;}

	# Enable fullwidth
	if ( !empty( $is_fullwidth ) ){$shortcode_attr['class'][] = 'de-btn--full';}
	# Add icon
	if ( $is_icon && !empty( ${'icon_'. $icon_type} ) ){$shortcode_attr['class'][] = 'de-btn--with-icon';}
	# Box shadow
	if ( !empty( $box_shadow ) ){$shortcode_attr['class'][] = $box_shadow;}
	# Box shadow extra
	if ( !empty( $is_extra_boxshadow ) ){$shortcode_attr['class'][] = 'uk-box-shadow-bottom';}
	# Box shadow hover
	if ( !empty( $hover_box_shadow ) ){$shortcode_attr['class'][] = $hover_box_shadow;}
	# Add style
	if ( !empty( $shortcode_style ) ){$shortcode_attr['style'] = $shortcode_style;}
# END OF SETTING SHORTCODE
# SETTING ICON
	# Icon
	$icon_attr['class'] = array( ${'icon_'. $icon_type} );
	# Icon position
	if ( !empty( $icon_alignment ) ){
		$icon_attr['class'][] = $icon_alignment;
		$icon_attr['class'][] = 'uk-margin-small-right';
	} else {
		$icon_attr['class'][] = 'uk-margin-small-left';
	}
	# Icon size
	$icon_attr['style'] = sprintf( 'font-size: %s;', dahz_shortcode_safe_css_units( $icon_size ) );
# END OF SETTING ICON

# SETTING MODAL
	# Class
	$modal_attr['class'] = array( 'uk-modal-dialog uk-margin-auto-vertical' );

	# Width
	if ( !empty( $lightbox_width ) )
		$modal_attr['style'] = sprintf( 'width: %s;', dahz_shortcodes_check_param_value( $lightbox_width, 0 ) );

	$iframe_w = dahz_shortcodes_check_param_value( $lightbox_width, 600 );

	$iframe_h = dahz_shortcodes_check_param_value( $lightbox_height, 337 );

	# Content
	$modal_content = '';

	if ( ( preg_match('/\.(jpg|png|jpeg)$/', $button_link) ) ) {
		$modal_content = sprintf( '<img src="%1$s" alt="%1$s" width="%2$s" height="%3$s" />', esc_url( $button_link ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} elseif ( ( preg_match('/\.(mp4|webm|ogg)$/', $button_link) ) ) {
		$modal_content = sprintf( '<video src="%1$s"  width="%2$s" height="%3$s"controls playsinline data-uk-video></video>', esc_url( $button_link ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} elseif ( strpos( $button_link, 'youtube' ) > 0 ) {
		$modal_content = sprintf( '<iframe src="%1$s"  width="%2$s" height="%3$s" data-uk-video></iframe>', esc_url( str_replace( "watch?v=", "embed/", $button_link ) ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} elseif ( strpos( $button_link, 'vimeo' ) > 0 ) {
		$modal_content = sprintf( '<iframe src="%1$s"  width="%2$s" height="%3$s" data-uk-video></iframe>', esc_url( str_replace( "vimeo.com", "player.vimeo.com/video", $button_link ) ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} else {
		$modal_content = sprintf( '<iframe src="%1$s"  width="%2$s" height="%3$s"></iframe>', esc_url( $button_link ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
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
if ( !empty( $is_extra_boxshadow ) ) { echo '<div class="uk-box-shadow-bottom">'; }
?>
<a <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_button_shortcode' ); ?>>
	<span class="uk-flex uk-flex-middle">
		<?php if ( !empty( $button_text ) ) : ?>
			<span><?php esc_html_e( $button_text ); ?></span>
		<?php endif; ?>
		<?php if ( $is_icon && !empty( ${'icon_'. $icon_type} ) ) : ?>
			<?php vc_icon_element_fonts_enqueue( $icon_type ); ?>
			<i <?php dahz_shortcode_set_attributes( $icon_attr, 'dahz_button_icon_shortcode' ); ?>></i>
		<?php endif; ?>
	</span>
</a>
<?php if ( !empty( $is_extra_boxshadow ) ) { echo '</div>'; }
if ( $button_target === 'lightbox' ) : ?>
	<div id="<?php esc_attr_e( sprintf( 'de-sc-btn-%s', $dahz_id ) ); ?>" data-uk-modal>
		<div <?php dahz_shortcode_set_attributes( $modal_attr, 'dahz_button_modal_shortcode' ); ?>>
			<?php echo $modal_content; ?>
		</div>
	</div>
<?php endif; ?>
