<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => alignment
[1] => title
[2] => labels
[3] => title_tag
[4] => title_color
[5] => title_font_size
[6] => title_line_height
[7] => use_theme_fonts
[8] => google_fonts
[9] => label_tag
[10] => label_custom_font_size
[11] => label_color
[12] => border_color
[13] => css_animation
[14] => animation_parallax
[15] => delay_animation
[16] => repeat_animation
[17] => el_class
[18] => margin
[19] => remove_top_margin
[20] => remove_bottom_margin
[21] => visibility
[22] => enable_dahz_lazy_shortcode
[23] => dahz_id
*/

extract( $atts );

$values = (array) vc_param_group_parse_atts( $labels );

$label_output = '';

$title_styles = array();

$label_styles = array();

if( !empty( $title_color ) ) $title_styles[] = "color:{$title_color};";

if( !empty( $label_color ) ) $label_styles[] = "color:{$label_color};";

if( (int)$label_custom_font_size > 0 ) {
	$label_custom_font_size = dahz_shortcode_safe_css_units( $label_custom_font_size );
	$label_styles[] = "font-size:{$label_custom_font_size};";
};

if( (int)$title_font_size > 0 ) {
	$title_font_size = dahz_shortcode_safe_css_units( $title_font_size );
	$title_styles[] = "font-size:{$title_font_size};";
};

if( (int)$title_line_height > 0 ) {
	$title_line_height = dahz_shortcode_safe_css_units( $title_line_height );
	$title_styles[] = "line-height:{$title_line_height};";
};

$google_fonts_data = dahz_shortcode_get_google_fonts( $google_fonts );

$title_styles = empty( $use_theme_fonts ) ? array_merge( $google_fonts_data['styles'], $title_styles ) : $title_styles;

if( empty( $use_theme_fonts ) && isset( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] ) ){

	wp_enqueue_style( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] );

}
$border_color = !empty( $border_color ) ? $border_color : '#e5e5e5';
$list_style = ' style="border-color:'. $border_color .';"';

foreach( $values as $value ){
	$value = array_merge(
		array(
			'label' => ''
		),
		$value
	);
	$label_output .= sprintf(
		'
		<li%4$s><%1$s %3$s>%2$s</%1$s></li>
		',
		$label_tag,
		esc_html( $value['label'] ),
		dahz_shortcode_set_attributes(
			array( 'style' => $label_styles ),
			'pricing_label_style',
			array(),
			false
		),
		$list_style
	);

}

$container_attributes = array(
	'class'	=> array(
		'de-sc-pricing-label',
		$alignment
	)
);

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'pricing_label_container',
		$atts
	); ?>>
	<ul class="uk-list uk-list-divider">
		<?php
		echo sprintf(
			'
			<li%4$s>
			<%1$s %3$s>%2$s</%1$s>
			</li>
			%5$s
			',
			$title_tag,
			esc_html( $title ),
			dahz_shortcode_set_attributes(
				array( 'style' => $title_styles ),
				'pricing_label_title',
				array(),
				false
			),
			$list_style,
			$label_output
		);
		?>
	</ul>
</div>
