<?php

/**
 * carousel_container
 *
 * Template for carousel container shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

?>
<div class="de-sc-carousel de-carousel" data-desktop-col="<?php esc_attr_e( $desktop_column ); ?>" data-small-desktop-col="<?php esc_attr_e( $small_desktop_column ); ?>" data-mobile-col="<?php esc_attr_e( $mobile_column ); ?>" data-nav-arrow="<?php esc_attr_e( $is_show_nav_arrows ); ?>" data-nav-dots="<?php esc_attr_e( $is_show_navigation_dots ); ?>" data-arrow-position="<?php esc_attr_e( $carousel_position_nav ); ?>">
	<a class="slick-arrow de-carousel__arrow left"><i class="df-arrow-backward"></i></a>
	<a class="slick-arrow de-carousel__arrow right"><i class="df-arrow-forward"></i></a>
	<div class="de-sc-carousel__item-container de-carousel__container">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>