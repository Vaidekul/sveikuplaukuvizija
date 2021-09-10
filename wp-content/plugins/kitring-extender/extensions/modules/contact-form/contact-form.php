<?php

if ( !class_exists( 'Dahzextender_Contact_Form' ) ) {

	Class Dahzextender_Contact_Form {

		public function __construct() {

			add_action( 'wpcf7_init', array( $this, 'dahzextender_wpcf7_add_form_button' ) );

		}
		
		public function dahzextender_wpcf7_add_form_button() {
			
			wpcf7_add_form_tag( 'button', array( $this, 'dahzextender_wpcf7_button_form_tag_handler' ) );
		}
		
		public function dahzextender_wpcf7_button_form_tag_handler( $tag ) {
			
			$class = wpcf7_form_controls_class( $tag->type );

			$atts = array();

			$atts['class'] = $tag->get_class_option( $class );
			$atts['id'] = $tag->get_id_option();
			$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );

			$value = isset( $tag->values[0] ) ? $tag->values[0] : '';

			if ( empty( $value ) ) {
				$value = __( 'Send', 'contact-form-7' );
			}

			$atts = wpcf7_format_atts( $atts );

			$html = sprintf( '<button %1$s>%2$s</button>', $atts, $value );

			return $html;
		}
		
	}
	
	new Dahzextender_Contact_Form();

}