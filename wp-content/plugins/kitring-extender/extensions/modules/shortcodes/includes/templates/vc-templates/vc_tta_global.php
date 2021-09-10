<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $el_class
 * @var $el_id
 * @var $this WPBakeryShortCode_VC_Tta_Accordion|WPBakeryShortCode_VC_Tta_Tabs|WPBakeryShortCode_VC_Tta_Tour|WPBakeryShortCode_VC_Tta_Pageable
 */
$el_class = $css = $css_animation = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$this->resetVariables( $atts, $content );

$this->setGlobalTtaInfo();

$prepareContent = $this->getTemplateVariable( 'content' );

$output .= dahz_framework_get_template_html(
	dahz_shortcode_get_tta_template_name( $this->shortcode ),
	array(
		'_this'				=> $this,
		'prepareContent'	=> $prepareContent,
		'atts'				=> $atts
	),
	'includes/templates/',
	DAHZEXTENDER_SHORTCODE_PATH
);

echo $output;
