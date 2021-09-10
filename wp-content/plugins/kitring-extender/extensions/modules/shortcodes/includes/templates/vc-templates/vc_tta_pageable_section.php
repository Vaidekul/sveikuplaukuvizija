<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Section
 */

$base_atts = WPBakeryShortCode_VC_Tta_Section::$tta_base_shortcode->atts;

$layout = WPBakeryShortCode_VC_Tta_Section::$tta_base_shortcode->layout;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$this->resetVariables( $atts, $content );

WPBakeryShortCode_VC_Tta_Section::$self_count ++;

WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;

$tab_content_attributes = array( 
	'class' 			=> array(
		$this->getElementClasses()
	),
	'id'				=> $this->getTemplateVariable( 'tab_id' ),
	'data-vc-content'	=> '.vc_tta-panel-body',
);

$tab_content_attributes['class'][] = !empty( $atts['el_class'] ) ? $atts['el_class'] : '';

$tab_content_attributes['class'][] = sprintf( 'uk-width-%s', $base_atts['phone_potrait_column'] );

$tab_content_attributes['class'][] = sprintf( 'uk-width-%s@l', $base_atts['columns'] );

$tab_content_attributes['class'][] = sprintf( 'uk-width-%s@s', $base_atts['phone_landscape_column'] );

$tab_content_attributes['class'][] = sprintf( 'uk-width-%s@m', $base_atts['tablet_landscape_column'] );

$isPageEditable = vc_is_page_editable();

$output = '';

$output .= sprintf(
	'
	<li %2$s>
		<div class="vc_tta-panel-body">
			%3$s
			%1$s
			%4$s
		</div>
	</li>
	',
	$this->getTemplateVariable( 'content' ),//1
	dahz_shortcode_set_attributes(
		$tab_content_attributes,
		'vc_section_wrapper',
		array(),
		false
	),//2
	$isPageEditable ? '<div data-js-panel-body>' : '',
	$isPageEditable ? '</div>' : ''
);

echo $output;
