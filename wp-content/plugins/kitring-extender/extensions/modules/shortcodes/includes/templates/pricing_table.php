<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => title
[1] => subtitle
[2] => currency_symbol
[3] => price
[4] => recurring_fee
[5] => description
[6] => is_icon
[7] => icon_or_image
[8] => icon_type
[9] => icon_image
[10] => icon_fontawesome
[11] => icon_linecons
[12] => icon_openiconic
[13] => icon_typicons
[14] => icon_monosocial
[15] => icon_entypo
[16] => icon_size
[17] => icon_color
[18] => labels
[19] => button_text
[20] => button_link
[21] => button_title
[22] => button_target
[23] => button_style
[24] => bg_color
[25] => border_color
[26] => hover_bg_color
[27] => text_color
[28] => hover_text_color
[29] => hover_text_style
[30] => border_radius
[31] => size
[32] => title_tag
[33] => title_color
[34] => title_font_size
[35] => title_line_height
[36] => use_theme_fonts
[37] => google_fonts
[38] => subtitle_tag
[39] => subtitle_custom_font_size
[40] => subtitle_color
[41] => enable_badge
[42] => badge_text
[43] => badge_text_color
[44] => badge_text_bg_color
[45] => price_tag
[46] => price_color
[47] => price_font_size
[48] => price_line_height
[49] => price_use_theme_fonts
[50] => price_google_fonts
[51] => recurring_fee_font_size
[52] => recurring_fee_color
[53] => recurring_fee_border_color
[54] => description_font_size
[55] => description_color
[56] => content_font_size
[57] => content_color
[58] => disabled_content_color
[59] => css_animation
[60] => animation_parallax
[61] => delay_animation
[62] => repeat_animation
[63] => el_class
[64] => margin
[65] => remove_top_margin
[66] => remove_bottom_margin
[67] => visibility
[68] => enable_dahz_lazy_shortcode
[69] => dahz_id
*/

extract( $atts );

$values = (array) vc_param_group_parse_atts( $labels );
// dahz_framework_debug($values);
$label_output = '';

$title_styles = array();

$price_styles = array( 'margin-top:10px;' );

$subtitle_styles = array();

$description_styles = array();

$recurring_fee_styles = array();

$label_styles = array();

$icon = '';

$badge = '';

$button_attr = array( 'style' => array() );


if( !empty( $is_icon ) && $icon_or_image == 'icon' ){

	vc_icon_element_fonts_enqueue( $icon_type );

	$icon_styles = array();

	$icon_class = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';

	$icon_size = dahz_shortcode_safe_css_units( $icon_size );

	if( !empty( $icon_size ) ) $icon_styles[] = 'font-size:' . $icon_size . ';';

	$icon_styles[] = !empty( $icon_color ) ? 'color:' . $icon_color . ';' : 'color:#000000;';

	$icon = sprintf(
		'
		<span class="%1$s uk-margin"%2$s></span>
		',
		esc_attr( $icon_class ),
		!empty( $icon_styles ) ? ' style="'. implode( '', $icon_styles ) .'"' : ''
	);


} elseif( !empty( $is_icon ) && $icon_or_image == 'image' && !empty( $icon_image ) ){

	$icon = wp_get_attachment_image(
		$icon_image,
		'medium',
		false,
		array( 'class' => 'uk-margin' )
	);

}
// Setting Title Styles
if( !empty( $title_color ) ) $title_styles[] = "color:{$title_color};";

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
//End of Setting Title Styles

// Setting Subtitle Styles
if( (int)$subtitle_custom_font_size > 0 ){
	$subtitle_custom_font_size = dahz_shortcode_safe_css_units( $subtitle_custom_font_size );
	$subtitle_styles[] = "font-size:{$subtitle_custom_font_size};";
}
if( !empty( $subtitle_color ) ) $subtitle_styles[] = "color:{$subtitle_color};";
//End of Setting Subtitle Styles

// Setting Subtitle Styles
if( (int)$description_font_size > 0 ){
	$description_font_size = dahz_shortcode_safe_css_units( $description_font_size );
	$description_styles[] = "font-size:{$description_font_size};";
}
if( !empty( $description_color ) ) $description_styles[] = "color:{$description_color};";
//End of Setting Subtitle Styles

// Setting Recurring Fee Styles
if( (int)$recurring_fee_font_size > 0 ){
	$recurring_fee_font_size = dahz_shortcode_safe_css_units( $recurring_fee_font_size );
	$recurring_fee_styles[] = "font-size:{$recurring_fee_font_size};";
}
if( !empty( $recurring_fee_color ) ) $recurring_fee_styles[] = "color:{$recurring_fee_color};";

$recurring_fee_border_color = !empty( $recurring_fee_border_color ) ? $recurring_fee_border_color : '#e5e5e5';
$recurring_fee_styles[] = "padding:4px 1em;border-style:solid;border-width:1px;border-radius:100em;border-color:{$recurring_fee_border_color};";
//End of Setting Recurring Fee Styles

// Setting Price Styles
if( !empty( $price_color ) ) $price_styles[] = "color:{$price_color};";

if( (int)$price_font_size > 0 ) {
	$price_font_size = dahz_shortcode_safe_css_units( $price_font_size );
	$price_styles[] = "font-size:{$price_font_size};";
};

if( (int)$price_line_height > 0 ) {
	$price_line_height = dahz_shortcode_safe_css_units( $price_line_height );
	$price_styles[] = "line-height:{$price_line_height};";
};

$google_fonts_data = dahz_shortcode_get_google_fonts( $price_google_fonts );

$price_styles = empty( $price_use_theme_fonts ) ? array_merge( $google_fonts_data['styles'], $price_styles ) : $price_styles;

if( empty( $price_use_theme_fonts ) && isset( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] ) ){

	wp_enqueue_style( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] );

}
// End of Setting Price Styles

if( (int)$content_font_size > 0 ) {
	$content_font_size = dahz_shortcode_safe_css_units( $content_font_size );
	$label_styles[] = "font-size:{$content_font_size};";
};

$list_style = ' style="border-color:'. $divider_color .';"';

foreach( $values as $value ){

	$value = array_merge(
		array(
			'label' => ''
		),
		$value
	);

	$label_icon = '';

	$loop_label_styles = $label_styles;

	if( $value['disabled_label'] !== 'true' ){

		if( !empty( $disabled_content_color ) ) $loop_label_styles[] = "color:{$disabled_content_color};";

	} else {

		if( !empty( $content_color ) ) $loop_label_styles[] = "color:{$content_color};";

	}

	if( $value['type'] == 'icon' || $value['type'] == 'text_icon' ){

		$icon_type = $value['icon_type'];

		vc_icon_element_fonts_enqueue( $icon_type );

		$icon_class = isset( $value["icon_{$icon_type}"] ) ? esc_attr( $value["icon_{$icon_type}"] ) : 'fa fa-adjust';

		$label_icon = sprintf(
			'
			<span class="%1$s uk-margin-auto-vertical uk-margin-small-right"%2$s></span>
			',
			esc_attr( $icon_class ),
			!empty( $value["icon_color"] ) ? ' style="color:'. $value["icon_color"] .';"' : ''
		);

	} elseif( $value['type'] == 'check-mark' ){

		$label_icon = sprintf(
			'
			<span class="uk-margin-auto-vertical uk-margin-small-right"%1$s data-uk-icon="check"></span>
			',
			!empty( $value["icon_color"] ) ? ' style="color:'. $value["icon_color"] .';"' : ''
		);

	} elseif( $value['type'] == 'x-mark' ){

		$label_icon = sprintf(
			'
			<span class="uk-margin-auto-vertical uk-margin-small-right"%1$s data-uk-icon="close"></span>
			',
			!empty( $value["icon_color"] ) ? ' style="color:'. $value["icon_color"] .';"' : ''
		);

	}

	$label_output .= sprintf(
		'
		<li%3$s><p %2$s>%4$s%1$s</p></li>
		',
		$value['type'] == 'text_icon' || $value['type'] == 'text' ? $value['label'] : '',
		dahz_shortcode_set_attributes(
			array( 'style' => $loop_label_styles ),
			'pricing_table_label_style',
			array(),
			false
		),
		$list_style,
		$label_icon
	);

}

$container_attributes = array(
	'class'	=> array(
		'uk-text-center',
		'uk-padding',
		'de-sc-pricing-table',
		$box_shadow,
		$hover_box_shadow
	),
	'style'	=> array()
);

$outer_border_width = dahz_shortcode_safe_css_units( $outer_border_width );

if( !empty( $background_color ) ) $container_attributes['style'][] = "background-color:{$background_color};";

if( !empty( $outer_border_width ) ) $container_attributes['style'][] = "border-width:{$outer_border_width};border-style:solid;";

if( !empty( $table_border_color ) ) $container_attributes['style'][] = "border-color:{$table_border_color};";

if( !empty( $enable_badge ) ){

	$container_attributes['class'][] = 'uk-padding uk-position-relative';
	$badge = sprintf(
		'<span class="uk-padding-small uk-flex uk-flex-center uk-flex-middle" style="position:absolute;bottom:-50px;top:-80px;right:-1px;left:-1px;background:%2$s;height:50px;"><span class="uk-h5 uk-margin-remove-bottom" %4$s>%1$s</span></span>',
		esc_html( $badge_text ),
		$badge_text_bg_color,
		'',
		!empty( $badge_text_color ) ? " style='color:{$badge_text_color};'" : ''
	);

}

switch ( $button_target ) {
	case 'scroll':
		$button_attr['href'] = !empty( $button_link ) ? $button_link : '#';

		$button_attr['data-uk-scroll'] = '';
		break;

	default:
		$button_attr['href'] = !empty( $button_link ) ? $button_link : '#';
		break;
}

# Class
$button_attr['class'] = array( 'uk-width-1-1 uk-button ', $button_type, $button_size );

# Title
if ( !empty( $button_title ) )
	$button_attr['title'] = $button_title;
# Background fill color

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'pricing_label_container',
		$atts
	); ?>>
	<?php echo $badge;?>
	<ul class="uk-list uk-list-divider <?php if( !empty( $enable_badge ) ) { echo 'uk-margin-remove-top'; } ?>">
		<?php
			echo sprintf(
				'
				<li%4$s>
					%16$s
					<%1$s %3$s>%2$s</%1$s>
					<%5$s%7$s>%6$s</%5$s>
				</li>
				<li%4$s>
					<div class="uk-margin-auto-vertical">
						<%8$s %9$s><sup>%10$s</sup>%11$s</%1$s>
						<span%13$s>%12$s</span>
						<p%14$s>%15$s</p>
					</div>
				</li>
				',
				$title_tag, #1
				esc_html( $title ), #2
				dahz_shortcode_set_attributes(
					array( 'style' => $title_styles ),
					'pricing_table_title',
					array(),
					false
				), #3
				$list_style, #4
				$subtitle_tag, #5
				esc_html( $subtitle ), #6
				!empty( $subtitle_styles ) ? ' class="uk-margin-remove-top" style="'. implode( '', $subtitle_styles ) .'"' : '', #7
				$price_tag, #8
				dahz_shortcode_set_attributes(
					array( 'class' => 'uk-margin-remove-top', 'style' => $price_styles ),
					'pricing_table_price',
					array(),
					false
				), #9
				esc_html( $currency_symbol ), #10
				esc_html( $price ), #11
				esc_html( $recurring_fee ), #12
				!empty( $recurring_fee_styles ) ? ' style="'. implode( '', $recurring_fee_styles ) .'"' : '', #13
				!empty( $description_styles ) ? ' class="uk-margin-remove-bottom" style="'. implode( '', $description_styles ) .'"' : '', #14
				esc_html( $description ), #15
				$icon #16
			);
		?>
		<?php
		echo $label_output;
		?>
	</ul>
	<?php if( !empty( $button_text ) ):?>
	<a <?php dahz_shortcode_set_attributes( $button_attr, 'dahz_button_shortcode' ); ?>>
		<?php echo esc_html( $button_text ); ?>
	</a>
	<?php endif;?>
</div>
