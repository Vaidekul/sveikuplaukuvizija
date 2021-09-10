<?php

/**
 * carousel_item
 *
 * Template for carousel item shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

$carousel_item_class = !empty( $atts['carousel_item_class'] ) ? $atts['carousel_item_class'] : '';

?>

<div class="de-sc-carousel__item de-carousel__item <?php esc_attr_e( $carousel_item_class ); ?>">
	<?php echo do_shortcode( $content ); ?>
</div>