<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => values
[1] => units
[2] => css_animation
[3] => animation_parallax
[4] => delay_animation
[5] => repeat_animation
[6] => el_class
[7] => margin
[8] => remove_top_margin
[9] => remove_bottom_margin
[10] => visibility
[11] => enable_dahz_lazy_shortcode
[12] => border_radius
*/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

wp_enqueue_script( 'dahz-shortcode-progressbar' );
// dahz_framework_debug(array_keys($atts));
extract( $atts );

$values = (array) vc_param_group_parse_atts( $values );

$bars = '';

# setup container attribute
$container_attributes = array();

# setup container attribute class
$container_classes = array( $visibility, $this->getExtraClass( $el_class ), $margin, 'de-sc-progressbar' );

# remove margin top
if ( !empty( $remove_top_margin ) ) $container_classes[] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $container_classes[] = 'uk-margin-remove-bottom';

# setup container attribute style
$container_attributes['style'] = array();

# get container attribute class
$container_attributes['class'] = $container_classes;

foreach( $values as $value ){

	$bars .= sprintf(
		'
		<div class="de-progressbar-items uk-margin-medium-bottom" data-progressbar="%1$s" data-units="%4$s" data-radius="%6$s">
			<div class="uk-grid uk-child-width-1-2">
				<div><h6 style="%5$s">%2$s</h6></div>
				<div class="uk-text-right">
					<h6 class="percentCount" style="%5$s"></h6>
				</div>
			</div>
			<div class="progressbar uk-margin-small-top" style="height:6px;background-color:%3$s;">
				<div class="proggress" style="width:0;">
				</div>
			</div>
		</div>
		',
		htmlspecialchars( wp_json_encode( $value ) ),
		$value['label'],
		!empty( $value['background_color'] ) ? $value['background_color'] : 'grey',
		$units,
		!empty( $value['text_color'] ) ? 'color:' . $value['text_color'] . ';' : 'color:#000000;',
		$border_radius
	);
}
?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		$this->settings['base'] . '_container',
		$atts
	); ?>>
	<?php
	echo $bars;
	?>
</div>
