<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => height
[1] => el_class
[2] => visibility
*/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
// dahz_framework_debug(array_keys($atts));
extract( $atts );

$height = dahz_shortcode_safe_css_units( $height );

$inline_css = ( (float) $height >= 0.0 ) ? 'height:' . esc_attr( $height ) . ';' : '';
# setup container attribute
$container_attributes = array();

# setup container attribute class
$container_classes = array( $visibility, $this->getExtraClass( $el_class ) );

# setup container attribute style
$container_attributes['style'] = array( $inline_css );

# get container attribute class
$container_attributes['class'] = $container_classes;

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		$this->settings['base'] . '_container',
		$atts
	); ?>>
</div>