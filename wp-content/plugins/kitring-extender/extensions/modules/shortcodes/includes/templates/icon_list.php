<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => style
[1] => icon_type
[2] => icon_fontawesome
[3] => icon_linecons
[4] => icon_openiconic
[5] => icon_typicons
[6] => icon_monosocial
[7] => icon_entypo
[8] => icon_size
[9] => icon_color
[10] => icon_hover_color
[11] => icon_bg_hover_color
[12] => icon_border_color
[13] => icon_border_radius
[14] => icon_border_width
[15] => alignment
[16] => enable_inline_icon_title
[17] => title
[18] => title_tag
[19] => title_color
[20] => description
[21] => description_color
[22] => button_text
[23] => button_link
[24] => button_title
[25] => button_target
[26] => button_text_color
[27] => button_hover_text_color
[28] => button_text_style
[29] => css_animation
[30] => animation_parallax
[31] => delay_animation
[32] => repeat_animation
[33] => el_class
[34] => margin
[35] => remove_top_margin
[36] => remove_bottom_margin
[37] => visibility
[38] => enable_dahz_lazy_shortcode
[39] => dahz_id
*/

$atts = vc_map_get_attributes( 'icon_list', $atts );

extract( $atts );

//### Declaration attributes array
$container_attributes = array( 'data-uk-grid' => '' );

$icon_attributes = array( 'class' => array( 'uk-margin de-sc-iconlist--icon' ), 'style' => array( 'display:inline-block;' ) );

//### End of Declaration attributes array

//### Setting Container Attributes
$container_classes = array( $el_class, 'de-sc-iconlist', 'uk-grid', $alignment );

if( !empty( $css_animation ) && $css_animation !== 'none' ){

	if( $css_animation == 'parallax' ){
		$container_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $animation_parallax, false );
		$container_classes[] = dahz_shortcode_get_parallax_class( $animation_parallax );
	} else {
		$container_attributes['data-uk-scrollspy'] = array( 'cls:' . $css_animation . ';' );
		if( !empty( $delay_animation ) ) $container_attributes['data-uk-scrollspy'][] = 'delay:' . $delay_animation . ';';
		if( !empty( $repeat_animation ) ) $container_attributes['data-uk-scrollspy'][] = 'repeat:true;';
	}

}

$container_attributes['class'] = $container_classes;
//### End of Setting Container Attributes

//### Setting Icon Attributes
vc_icon_element_fonts_enqueue( $icon_type );

if( $style == 'style-2' || $style == 'style-3' ){

	$icon_border_width = dahz_shortcode_safe_css_units( $icon_border_width );

	$icon_attributes['class'][] = 'uk-padding-small';

	if( $icon_source == 'icon' ) {

		$icon_attributes['style'][] = 'border-style:solid;display:inline-flex;align-items:center;justify-content:center;width:2em;height:2em;';
		
	} else {

		$icon_attributes['style'][] = 'border-style:solid;display:inline-flex;align-items:center;justify-content:center;width:auto;height:auto;';

	}

	if( !empty( $icon_border_color ) ) $icon_attributes['style'][] = "border-color:{$icon_border_color};";

	if( !empty( $icon_border_width ) ) $icon_attributes['style'][] = "border-width:{$icon_border_width};";

}

switch( $style ){
	case 'style-2':
		$icon_border_radius = dahz_shortcode_safe_css_units( $icon_border_radius );
		if( !empty( $icon_border_radius ) ) $icon_attributes['style'][] = "border-radius:{$icon_border_radius};";
		break;
	case 'style-3':
		$icon_attributes['class'][] = 'uk-border-circle';
		break;
}

$icon_size = dahz_shortcode_safe_css_units( $icon_size );

if( !empty( $icon_size ) ) $icon_attributes['style'][] = 'font-size:' . $icon_size . ';line-height:1;';

$icon_attributes['style'][] = !empty( $icon_color ) ? 'color:' . $icon_color . ';' : 'color:#000000;';

if ( $icon_source == 'icon' ) {

	$icon_class = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';

} else {

	$padding 	= $style !== 'style-1' ? 'uk-padding' : '';

	$icon_image = wp_get_attachment_image(
		$icon_image,
		'full',
		false,
		array( 'class' => $padding )
	);

}

//### End of Setting Icon Attributes

//### Setting Button
$button = '';

if( !empty( $button_text ) ){

	$button = sprintf(
		'
		<a%2$s%3$s%4$s%6$s class="%5$s">%1$s</a>
		',
		esc_html( $button_text ),
		!empty( $button_link ) ? ' href="' . $button_link . '"' : '',
		!empty( $button_title ) ? ' title="' . $button_title . '"' : '',
		$button_target !== 'scroll' ? ' target="' . $button_target . '"' : '',
		$button_text_style,
		!empty( $button_text_color ) ? ' style="color:' . $button_text_color . ';"' : ''
	);

}


//### End of Setting Button
?>

<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'icon_box_container',
		$atts
	); ?>>
	<?php
	if( $icon_source == 'icon' ){
		echo sprintf(
			empty( $enable_inline_icon_title )
				?
			'
			<div class="uk-width-auto%9$s">
				<span %1$s><i style="line-height:1;" class="%8$s"></i></span>
			</div>
			<div class="uk-width-expand">
				<%2$s style="color:%3$s;">%4$s</%2$s>
				<p style="color:%5$s;">%6$s</p>
				%7$s
			</div>
			'
				:
			'
			<div class="uk-width-1">
				<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
					<div class="uk-width-auto%9$s">
						<span %1$s><i style="line-height:1;" class="%8$s"></i></span>
					</div>
					<div class="uk-width-expand">
						<%2$s style="color:%3$s;">%4$s</%2$s>
					</div>
				</div>
			</div>
			<div class="uk-width-1">
				<p style="color:%5$s;">%6$s</p>
				%7$s
			</div>
			'
			,
			dahz_shortcode_set_attributes(
				$icon_attributes,
				'icon_list_icon',
				array(),
				false
			),
			$title_tag,
			!empty( $title_color ) ? $title_color : '#000000',
			esc_html( $title ),
			!empty( $description_color ) ? $description_color : '#000000',
			esc_html( $description ),
			$button,
			$icon_class,
			$alignment == 'uk-text-right' ? ' uk-flex-last' : ''
		);
	} else {

		echo sprintf(
			empty( $enable_inline_icon_title )
				?
			'
			<div class="uk-width-auto%9$s">
				<span %1$s>%8$s</span>
			</div>
			<div class="uk-width-expand">
				<%2$s style="color:%3$s;">%4$s</%2$s>
				<p style="color:%5$s;">%6$s</p>
				%7$s
			</div>
			'
				:
			'
			<div class="uk-width-1">
				<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
					<div class="uk-width-auto%9$s">
						<span %1$s><i style="line-height:1;" class="%8$s"></i></span>
					</div>
					<div class="uk-width-expand">
						<%2$s style="color:%3$s;">%4$s</%2$s>
					</div>
				</div>
			</div>
			<div class="uk-width-1">
				<p style="color:%5$s;">%6$s</p>
				%7$s
			</div>
			'
			,
			dahz_shortcode_set_attributes(
				$icon_attributes,
				'icon_list_icon',
				array(),
				false
			),
			$title_tag,
			!empty( $title_color ) ? $title_color : '#000000',
			esc_html( $title ),
			!empty( $description_color ) ? $description_color : '#000000',
			esc_html( $description ),
			$button,
			$icon_image,
			$alignment == 'uk-text-right' ? ' uk-flex-last' : ''
		);

	}
	?>
</div>
