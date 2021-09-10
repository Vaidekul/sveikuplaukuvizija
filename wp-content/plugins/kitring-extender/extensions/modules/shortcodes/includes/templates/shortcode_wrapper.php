<?php
/*
 * atts
 * is_lazyload
 * view
 * key
 */

$shortcode_name = str_replace( '.php', '', $view );

$shortcode_attributes = array( 
	'class'	=> array(
		'uk-position-relative',
		'de-shortcode__wrapper',
		"de-shortcode__wrapper--{$shortcode_name}",
		$atts['visibility'],
		$atts['margin'],
		$atts['remove_top_margin'] ? 'uk-margin-remove-top' : '',
		$atts['remove_bottom_margin'] ? 'uk-margin-remove-bottom' : '',
		$atts['el_class'],
	) 
);

$scrollspy_attr = array();

# ANIMATION TABS SETTING
if( !empty( $atts['css_animation'] ) && $atts['css_animation'] !== 'none' ){
	
	if ( $atts['css_animation'] == 'parallax' ) {
		
		if ( !empty( $atts['animation_parallax'] ) ){ 
			$shortcode_attributes['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $atts['animation_parallax'] );
			$shortcode_attributes['class'][] = dahz_shortcode_get_parallax_class( $atts['animation_parallax'] );
		}	
	
	} else {
		
		if ( !empty( $atts['css_animation'] ) ){ $scrollspy_attr[] = sprintf( 'cls: %s;', $atts['css_animation'] ); }
			
		if ( !empty( $atts['repeat_animation'] ) ){ $scrollspy_attr[] = sprintf( 'repeat: %s;', $atts['repeat_animation'] ); }
			
		if ( !empty( $atts['delay_animation'] ) ){ $scrollspy_attr[] = sprintf( 'delay: %s;', $atts['delay_animation'] ); }

		if ( !empty( $scrollspy_attr ) ){ $shortcode_attributes['data-uk-scrollspy'] = $scrollspy_attr; }
			
	}
	
}

# EXTRA TABS SETTING
$atts['atts'] = $atts;

$shortcode_attributes['data-dahz-shortcode-key'] = $key;

$shortcode_attributes['style'] = array();
if ( $shortcode_name === 'button' || $shortcode_name === 'modal_popup' ) {

	$shortcode_attributes['class'][] = $atts['alignment'];

	if ( !empty( $atts['is_fullwidth'] ) )
		$shortcode_attributes['class'][] = 'uk-width-1-1';

	if ( $atts['alignment'] === 'uk-inline' && !empty( $atts['gutter'] ) )
		$shortcode_attributes['class'][] = $atts['gutter'];
		// dahz_framework_debug($atts);

	if ( !empty( $atts['margin_top'] ) )
		$shortcode_attributes['style'][] = sprintf( 'margin-top: %s;', dahz_shortcodes_check_param_value( $atts['margin_top'], 0 ) );

	if ( !empty( $atts['margin_right'] ) )
		$shortcode_attributes['style'][] = sprintf( 'margin-right: %s;', dahz_shortcodes_check_param_value( $atts['margin_right'], 0 ) );

	if ( !empty( $atts['margin_bottom'] ) )
		$shortcode_attributes['style'][] = sprintf( 'margin-bottom: %s;', dahz_shortcodes_check_param_value( $atts['margin_bottom'], 0 ) );

	if ( !empty( $atts['margin_left'] ) )
		$shortcode_attributes['style'][] = sprintf( 'margin-left: %s;', dahz_shortcodes_check_param_value( $atts['margin_left'], 0 ) );
}

$shortcode_attributes = array_merge( $attribute, $shortcode_attributes );

if( $disabled_wrapper ){

	$atts['key'] = $key;
	$atts['content'] = $content;
	dahz_framework_get_template(
		$view,
		$atts,
		'includes/templates/',
		DAHZEXTENDER_SHORTCODE_PATH
	);
	return;
}
?>
<div <?php
	dahz_shortcode_set_attributes(
		$shortcode_attributes,
		'dahz_shortcode_wrapper',
		$atts
	); ?>>
	<?php
		if ( !$is_lazyload ) {
			$atts['key'] = $key;
			$atts['content'] = $content;
			dahz_framework_get_template(
				$view,
				$atts,
				'includes/templates/',
				DAHZEXTENDER_SHORTCODE_PATH
			);
		}
	?>
</div>
