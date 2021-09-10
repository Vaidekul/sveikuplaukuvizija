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
	'id' 				=> $this->getTemplateVariable( 'tab_id' ),
	'data-vc-content' 	=> '.vc_tta-panel-body',
);

if( !empty( $base_atts['content_css_animation'] ) )
		$tab_content_attributes['class'][] = $base_atts['content_css_animation'];

$isPageEditable = vc_is_page_editable();

$icon = '';

if( $layout === 'accordion' ){

	if( $base_atts['active_section'] == WPBakeryShortCode_VC_Tta_Section::$self_count )
			$tab_content_attributes['class'][] = 'uk-open';

}

if( $layout === 'tabs' ){

	$image_thumbnav = isset( $atts['image_thumbnav'] ) ? $atts['image_thumbnav'] : '';

}


$output = '';

$output .= sprintf(
	'
	<li %2$s>
		%3$s
		%6$s
		%4$s
		%1$s
		%5$s
		%7$s
	</li>
	',
	$this->getTemplateVariable( 'content' ),//1
	dahz_shortcode_set_attributes(
		$tab_content_attributes,
		'vc_section_wrapper',
		array(),
		false
	),//2
	$layout == 'accordion'
		?
		sprintf(
			'
			<a class="uk-accordion-title vc_tta-panel-heading" href="#">
				<%1$s>
					%2$s
				</%1$s>
			</a>
			',
			$base_atts['tag'],
			esc_html( $atts['title'] ),
			$icon
		)
		:
		'', //3
	$layout == 'accordion' ? ' <div class="uk-accordion-content vc_tta-panel-body">' : '',
	$layout == 'accordion' ? ' </div>' : '',
	$isPageEditable ? '<div data-js-panel-body>' : '',
	$isPageEditable ? '</div>' : ''
);

echo $output;
