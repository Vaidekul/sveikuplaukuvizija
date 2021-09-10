<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => image_before
[1] => image_after
[2] => marker_color
[3] => active_marker_color
[4] => icon_color
[5] => active_icon_color
[6] => css_animation
[7] => animation_parallax
[8] => delay_animation
[9] => repeat_animation
[10] => el_class
[11] => margin
[12] => remove_top_margin
[13] => remove_bottom_margin
[14] => visibility
[15] => enable_dahz_lazy_shortcode
[16] => dahz_id
*/

# setup container attribute
$container_attributes = array( 'class'	=> array( 'de-before-after uk-inline' ) );

$_image_before = wp_get_attachment_image( $image_before, 'full' );

$_image_after =  wp_get_attachment_image( $image_after, 'full' );

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'before_after_container',
		$atts
	); ?>>
	<figure class="cd-image-container">
		<?php echo $_image_before;?>
		<span class="cd-image-label" data-type="original" style="color:<?php echo $original_text_color;?>;"><?php echo esc_attr( $original_text ) ?></span>

		<div class="cd-resize-img" style="border-right:<?php echo $divider_width;?>px solid <?php echo $divider_color;?>;"> <!-- the resizable image on top -->
			<?php echo $_image_after;?>
			<span class="cd-image-label" data-type="modified" style="color:<?php echo $modified_text_color;?>;"><?php echo esc_attr( $modified_text ) ?></span>
		</div>

		<span class="cd-handle"><span style="color:<?php echo esc_attr( $icon_color );?>;" class="uk-position-center-left" data-uk-icon="icon: chevron-left"></span><span class="uk-position-center-right" style="color:<?php echo esc_attr( $icon_color );?>;" data-uk-icon="icon: chevron-right"></span></span>
	</figure>

</div>
