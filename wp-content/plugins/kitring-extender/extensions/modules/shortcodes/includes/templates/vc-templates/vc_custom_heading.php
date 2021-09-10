<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/* Shortcode attributes
[0] => source
[1] => text
[2] => button_link
[3] => button_title
[4] => button_target
[5] => font_container
[6] => enable_gradient
[7] => text_color_2
[8] => gradient_direction
[9] => use_theme_fonts
[10] => google_fonts
[11] => lightbox_width
[12] => lightbox_height
[13] => margin_top
[14] => margin_right
[15] => margin_bottom
[16] => margin_left
[17] => custom_responsive_size
[18] => custom_font_size
[19] => css_animation
[20] => animation_parallax
[21] => delay_animation
[22] => repeat_animation
[23] => el_class
[24] => margin
[25] => remove_top_margin
[26] => remove_bottom_margin
[27] => visibility
[28] => enable_dahz_lazy_shortcode
*/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

$margin_top = dahz_shortcode_safe_css_units( $margin_top );

$margin_right = dahz_shortcode_safe_css_units( $margin_right );

$margin_bottom = dahz_shortcode_safe_css_units( $margin_bottom );

$margin_left = dahz_shortcode_safe_css_units( $margin_left );

$font_container_data = dahz_shortcode_get_font_container( $font_container );

$google_fonts_data = dahz_shortcode_get_google_fonts( $google_fonts );

$styles = empty( $use_theme_fonts ) ? array_merge( $font_container_data['styles'], $google_fonts_data['styles'] ) : $font_container_data['styles'];

if( empty( $use_theme_fonts ) && isset( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] ) ){
	
	wp_enqueue_style( $google_fonts_data['enqueue']['key'], $google_fonts_data['enqueue']['link'] );
	
}

// var_dump($custom_responsive_size);
if ($custom_responsive_size == 'yes' ) {
	$decodeJsonFontSize = json_decode( urldecode( $custom_font_size ), true );
	$xs_font_size = $decodeJsonFontSize['xs_font_size'];

	$textStyleResponsive = sprintf(
		'
		<style>
			@media only screen and ( max-width: 414px ) {
				%1$s[data-dahz-shortcode-key="%2$s"] {
					font-size: %3$s;
					line-height: %4$s;
				}
			}

			@media only screen and ( min-width: 960px ) and ( max-width: 1023px ) {
				%1$s[data-dahz-shortcode-key="%2$s"] {
					font-size: %5$s;
					line-height: %6$s;
				}
			}

			@media only screen and ( min-width: 1024px ) and ( max-width: 1024px ) {
				%1$s[data-dahz-shortcode-key="%2$s"] {
					font-size: %7$s;
					line-height: %8$s;
				}
			}
		</style>
		',
		isset( $font_container_data['font_container_data']['values']['tag'] ) ? $font_container_data['font_container_data']['values']['tag'] : 'h4', #1
		$dahz_id,
		$decodeJsonFontSize['xs_font_size']  != '' ? $decodeJsonFontSize['xs_font_size'] . '!important': 'inherit',
		$decodeJsonFontSize['xs_line_height'] != '' ? $decodeJsonFontSize['xs_line_height'] . '!important': 'inherit',
		$decodeJsonFontSize['s_font_size'] != '' ? $decodeJsonFontSize['s_font_size'] . '!important': 'inherit',
		$decodeJsonFontSize['s_line_height'] != '' ? $decodeJsonFontSize['s_line_height'] . '!important': 'inherit',
		$decodeJsonFontSize['m_font_size'] != '' ? $decodeJsonFontSize['m_font_size'] . '!important': 'inherit',
		$decodeJsonFontSize['m_line_height'] != '' ? $decodeJsonFontSize['m_line_height'] . '!important': 'inherit'
	);
	echo( $textStyleResponsive );
}
# setup container attribute
$container_attributes = array();

$text_attributes = array();

# setup container attribute class
$container_classes = array( $visibility, $this->getExtraClass( $el_class ), $margin, 'de-sc-heading' );

# remove margin top
if ( !empty( $remove_top_margin ) ) $container_classes[] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $container_classes[] = 'uk-margin-remove-bottom';

if( !empty( $css_animation ) && $css_animation !== 'none' ){

	if( $css_animation == 'parallax' ){
		$text_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $animation_parallax );
		$container_classes[]= dahz_shortcode_get_parallax_class( $animation_parallax );
	} else {
		$text_attributes['data-uk-scrollspy'] = array( 'cls:' . $css_animation . ';' );
		if( !empty( $delay_animation ) ) $text_attributes['data-uk-scrollspy'][] = 'delay:' . $delay_animation . ';';
		if( !empty( $repeat_animation ) ) $text_attributes['data-uk-scrollspy'][] = 'repeat:true;';
	}
	
}

# setup container attribute style
if( !empty( $margin_top ) ){ $styles[] = "margin-top:{$margin_top};"; }
if( !empty( $margin_right ) ){ $styles[] = "margin-right:{$margin_right};"; }
if( !empty( $margin_bottom ) ){ $styles[] = "margin-bottom:{$margin_bottom};"; }
if( !empty( $margin_left ) ){ $styles[] = "margin-left:{$margin_left};"; }

$text_attributes['style'] = $styles;

if( !empty( $enable_gradient ) ){
	
	$text_attributes['style'][] = sprintf(
		'
		background: linear-gradient(%1$s, %2$s, %3$s);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		',
		$gradient_direction,
		isset( $font_container_data['font_container_data']['values']['color'] ) ? $font_container_data['font_container_data']['values']['color'] : '#000000',
		!empty( $text_color_2 ) ? $text_color_2 : '#ffffff'
	);
	
}

# get container attribute class
$text_attributes['class'] = $container_classes;

$text_attributes['data-dahz-shortcode-key'] = $dahz_id;
// dahz_framework_debug($font_container_data);

$text = sprintf(
	'
	<%1$s %3$s>
		%2$s
	</%1$s>
	',
	isset( $font_container_data['font_container_data']['values']['tag'] ) ? $font_container_data['font_container_data']['values']['tag'] : 'h4',
	$source !== 'post_title' ? $text : get_the_title( get_the_ID() ),
	dahz_shortcode_set_attributes(
		$text_attributes,
		$this->settings['base'] . '_text',
		array(),
		false
	)
);

if( !empty( $button_link ) ){
	
	$link_attributes = array();
	
	$link_attributes['href'] = $button_link;
	
	if( !empty( $button_title ) ) $link_attributes['title'] = $button_title;
	
	if( $button_target == '_self' || $button_target == '_blank' ) $link_attributes['target'] = $button_target;
	
	$text = dahz_shortcode_build_link( $button_link, $button_target, $button_title, $text );
	
}

?>

<?php echo $text;?>