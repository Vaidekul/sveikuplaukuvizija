<?php

if( $enable_button ) {
	# Shortcode attributes
	$shortcode_button_attr = array();

	# Shortcode style
	$shortcode_style = array();

	# Icon attributes
	$icon_attr = array();

	$shortcode_button_attr['href'] = !empty( $button_link_url ) ? $button_link_url : '#';

	# Class
	$shortcode_button_attr['class'] = array( 'uk-button', 'uk-margin-top', $button_type, $button_size );
	# Title
	if ( !empty( $button_text ) )
		$shortcode_button_attr['title'] = $button_text;

	# Add style
	if ( !empty( $shortcode_style ) )
		$shortcode_button_attr['style'] = $shortcode_style;
}

$fb_bg_image             = !empty( $fb_bg_image ) ? $fb_bg_image : '';
$bb_bg_image             = !empty( $bb_bg_image ) ? $bb_bg_image : '';
$min_height 			 = !empty( $min_height ) ? $min_height : '300px';
$fb_content 			 = !empty( $fb_content ) ? $fb_content : '';

$front_image_element     = wp_get_attachment_image_src( $fb_bg_image, 1920 );
$back_image_element      = wp_get_attachment_image_src( $bb_bg_image, 1920 );

$icon_html = '';

$is_gradient_icon_class = !empty( $enable_gradient_icon ) ? 'icon-gradiented' : '';

$content = preg_replace('~</?p[^>]*>~', '', $content);
if ( $icon_source == 'icon' ) {
	if( $fb_is_use_icon ){
		vc_icon_element_fonts_enqueue( $fb_icon_type );

		$icon_wrapper = false;

		$button_html = '';

		if ( isset( $fb_icon_type ) ) {
			if ( 'pixelicons' === $fb_icon_type ) {
				$icon_wrapper = true;
			}
			$icon_class = ${'fb_icon_' . $fb_icon_type};
		} else {
			$icon_class = 'fa fa-adjust';
		}

		if ( $icon_wrapper ) {
			$icon_html = '<i class="vc_btn3-icon ' . esc_attr( $is_gradient_icon_class ) . '"><span class="vc_btn3-icon-inner ' . esc_attr( $icon_class ) . '"></span></i>';
		} else {
			$icon_html = '<i class="vc_btn3-icon '. esc_attr( $is_gradient_icon_class ) . ' ' . esc_attr( $icon_class ) . '"></i>';
		}
	}
} else {

	$icon_html = wp_get_attachment_image(
		$icon_image,
		'full',
		false
	);

}

$content = preg_replace('~</?p[^>]*>~', '', $content);
$fb_content = preg_replace('~</?p[^>]*>~', '', $fb_content);
?>

<div class="de-sc-flip-box" data-flip-direction="<?php esc_attr_e( $flip_direction ) ?>" data-horizontal-align="<?php esc_attr_e( $horizontal_alignment ) ?>" data-vertical-align="<?php esc_attr_e( $vertical_alignment ) ?>">
    <div class="de-sc-flip-box__front-side" data-is-bg-overlay="<?php esc_attr_e( $fb_is_bg_overlay ) ?>" style="background-image:url(<?php echo esc_url( $front_image_element[0] ) ?>)">
		<div class="de-sc-flip-box__content">
			<?php echo( $icon_html ); echo( $fb_content ); ?>
		</div>

    </div>
    <div class="de-sc-flip-box__back-side" data-is-bg-overlay="<?php esc_attr_e( $bb_is_bg_overlay ) ?>" style="background-image:url(<?php echo esc_url( $back_image_element[0] ) ?>);">
		<div class="de-sc-flip-box__content">
			<?php echo do_shortcode( $content ); ?>
			<?php if ( $enable_button ): ?>

				<a <?php dahz_shortcode_set_attributes( $shortcode_button_attr, 'dahz_button_shortcode' ); ?>>
					<?php esc_html_e( $button_text ); ?>
				</a>

			<?php endif; ?>
		</div>

    </div>
</div>

<?php
