<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => label
[1] => value
[2] => units
[3] => circle_thickness
[4] => pie_color
[16] => pie_track_color
[5] => text_color
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
*/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

wp_enqueue_script( 'dahz-shortcode-pie' );
// dahz_framework_debug(array_keys($atts));
extract( $atts );

# setup container attribute
$container_attributes = array();

# setup container attribute class
$container_classes = array( $visibility, $this->getExtraClass( $el_class ), $margin, 'de-sc-pie', 'uk-text-center' );

# remove margin top
if ( !empty( $remove_top_margin ) ) $container_classes[] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $container_classes[] = 'uk-margin-remove-bottom';

# setup container attribute style
$container_attributes['style'] = array();

# get container attribute class
$container_attributes['class'] = $container_classes;

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		$this->settings['base'] . '_container',
		$atts
	); ?>>
	<div class="de-pie-item uk-inline" data-linewidth="<?php echo esc_attr( $circle_thickness );?>" data-percent="<?php echo esc_attr( $value );?>" data-trackcolor="<?php echo esc_attr( !empty( $pie_track_color ) ? $pie_track_color : 'rgba(0,0,0,0.15)' );?>" data-barcolor="<?php echo esc_attr( !empty( $pie_color ) ? $pie_color : 'red' );?>" data-is-empty-label="<?php echo empty( $label ) ? 'true' : 'false';?>">
		<h4 style="color:<?php echo esc_attr( !empty( $text_color ) ? $text_color : '#000000' );?>;" class="pie-value uk-position-center"><?php echo $label;?></h4>
	</div>
</div>