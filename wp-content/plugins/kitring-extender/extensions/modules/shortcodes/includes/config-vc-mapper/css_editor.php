<?php
/**
*
*/
class Dahz_Framework_CSS_Editor_Mapper extends WPBakeryVisualComposerCssEditor {

	function __construct() {

		add_filter( 'vc_css_editor', array( $this, 'dahz_framework_vc_css_editor' ) );

		add_filter( 'vc_css_editor_background_image_control', array( $this, 'dahz_framework_shortcode_css_editor_background_control' ) );

	}

	public function dahz_framework_vc_css_editor( $output ){

		return str_replace( 'class="vc_background-style"', 'class="vc_background-style" style="display:none;"', $output );

	}

	public function dahz_framework_shortcode_css_editor_background_control( $output ){

		return '<ul class="vc_image">'
				. '</ul>'
			. '<a href="#" class="vc_add-image" style="display:none;"><i class="vc-composer-icon vc-c-icon-add"></i>' . __( 'Add image', 'js_composer' ) . '</a>';

	}

}

new Dahz_Framework_CSS_Editor_Mapper();
