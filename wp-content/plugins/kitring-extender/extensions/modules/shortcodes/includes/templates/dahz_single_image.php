<?php
/**
 * Shortcode attributes
 * [0] => image_source
 * [1] => image_id
 * [2] => external_link
 * [3] => image_size
 * [4] => image_alt
 * [5] => image_alignment
 * [6] => image_link
 * [7] => link_target
 * [8] => image_style
 * [9] => image_box_shadow
 * [10] => enable_extra_bottom_shadow
 * [11] => image_hover_box_shadow
 * [12] => modal_width
 * [13] => modal_height
 * [14] => css_animation
 * [15] => animation_parallax
 * [16] => delay_animation
 * [17] => repeat_animation
 * [18] => el_class
 * [19] => margin
 * [20] => remove_top_margin
 * [21] => remove_bottom_margin
 * [22] => visibility
 * [23] => enable_dahz_lazy_shortcode
 * [24] => dahz_id
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Single_image
 */

# Shortcode attributes
$shortcode_attr = array();

# Shortcode attributes
$image_attr = array();

# Modal attributes
$modal_attr = array();

// # Image Output
// $image_render = '';

# Image Classes
$image_classes = '';

# SETTING SHORTCODE
# Link
switch ( $link_target ) {
	case 'modal':
		$shortcode_attr['href'] = "#de-{$dahz_id}";

		$shortcode_attr['data-uk-toggle'] = '';
		break;
	case 'scroll':
		if ( !empty( $image_link ) ) {
			$shortcode_attr['href'] = !empty( $image_link ) ? $image_link : '#';

			$shortcode_attr['data-uk-scroll'] = '';
		}
		break;

	default:
		if ( !empty( $image_link ) ) {
			$shortcode_attr['href'] = !empty( $image_link ) ? $image_link : '#';
		}
		break;
}

# Target
if ( $link_target !== 'modal' && !empty( $image_link ) ) {
	$shortcode_attr['target'] = $link_target;
}

# Image Border Style
$image_style .= $image_style !== 'none' ? ' ' . $image_style . ' ' : '';

# Image Predefined Class
$shortcode_attr['class'][] = 'de-single-image__wrapper uk-flex';

# Image Alignment
$shortcode_attr['class'][] = 'uk-flex-' . $image_alignment;

# Box shadow
if ( !empty( $image_box_shadow ) )
	$image_style .= ' ' . $image_box_shadow . ' ';

# Box shadow extra
if ( !empty( $enable_extra_bottom_shadow ) )
	$image_style .= ' uk-box-shadow-bottom ';

# Box shadow hover
if ( !empty( $image_hover_box_shadow ) )
	$image_style .= ' ' . $image_hover_box_shadow . ' ';

# Image Source
switch ( $image_source ) {
	case 'media_library':
		$image_render = wpb_getImageBySize( array(
			'attach_id'  => $image_id,
			'thumb_size' => !empty( $image_size ) ? $image_size : 'large',
			'class'      => $image_style,
		) );
		$image_render = $image_render['thumbnail'];
		break;
	case 'external_link':

		break;
	case 'featured_image':

		break;
}

# SETTING MODAL
	# Class
	$modal_attr['class'] = array( 'uk-modal-dialog uk-margin-auto-vertical' );

	# Width
	if ( !empty( $modal_width ) ) {
		$modal_attr['style'] = sprintf( 'width: %s;', dahz_shortcodes_check_param_value( $modal_width, 0 ) );
	}

	$iframe_w = dahz_shortcodes_check_param_value( $modal_width, 600 );

	$iframe_h = dahz_shortcodes_check_param_value( $modal_height, 337 );

	# Content
	$modal_content = '';

	if ( ( preg_match('/\.(jpg|png|jpeg)$/', $image_link) ) ) {
		$modal_content = sprintf( '<img src="%1$s" alt="%1$s" width="%2$s" height="%3$s" />', esc_url( $image_link ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} elseif ( ( preg_match('/\.(mp4|webm|ogg)$/', $image_link) ) ) {
		$modal_content = sprintf( '<video src="%1$s"  width="%2$s" height="%3$s"controls playsinline data-uk-video></video>', esc_url( $image_link ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} elseif ( strpos( $image_link, 'youtube' ) > 0 ) {
		$modal_content = sprintf( '<iframe src="%1$s"  width="%2$s" height="%3$s" data-uk-video></iframe>', esc_url( str_replace( "watch?v=", "embed/", $image_link ) ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} elseif ( strpos( $image_link, 'vimeo' ) > 0 ) {
		$modal_content = sprintf( '<iframe src="%1$s"  width="%2$s" height="%3$s" data-uk-video></iframe>', esc_url( str_replace( "vimeo.com", "player.vimeo.com/video", $image_link ) ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	} else {
		$modal_content = sprintf( '<iframe src="%1$s"  width="%2$s" height="%3$s"></iframe>', esc_url( $image_link ), esc_attr( $iframe_w ), esc_attr( $iframe_h ) );
	}
# END OF SETTING MODAL
?>
<a <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_single_image_shortcode' ); ?>>
	<div>
		<?php echo $image_render; ?>
	</div>
</a>
<?php if ( $link_target === 'modal' ) : ?>
	<div id="de-<?php esc_attr_e( $dahz_id ); ?>" data-uk-modal>
		<div <?php dahz_shortcode_set_attributes( $modal_attr, 'dahz_button_modal_shortcode' ); ?>>
			<?php echo $modal_content; ?>
		</div>
	</div>
<?php endif; ?>