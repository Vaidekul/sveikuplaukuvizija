<?php
/**
*
*/
if ( !class_exists( 'Dahz_Framework_Slider_SC_Param' ) ) {

	class Dahz_Framework_Slider_SC_Param{

		public $settings = array();

		public $value = '';

		public $values = array();

		public function __construct( $settings, $value ) {

			$this->settings( $settings );

			$this->value( $value );

			if ( !empty( $value ) ) {

				$this->values = explode( ' ', $value );

			}

		}

		function settings( $settings = null ) {
			if ( is_array( $settings ) ) {
				$this->settings = $settings;
			}

			return $this->settings;
		}

		function setting( $key ) {
			return isset( $this->settings[ $key ] ) ? $this->settings[ $key ] : '';
		}

		function value( $value = null ) {

			if ( is_string( $value ) ) {
				$this->value = $value;
			}

			return $this->value;

		}

		function render() {
			$settings = $this->setting( 'settings' );
			$output = sprintf(
				'
				<div class="dahz-slider-vc-param">
					<div data-uk-grid class="uk-flex-middle uk-grid-small">
						<div class="uk-width-expand uk-first-column">
							<input class="uk-range %1$s %2$s_field wpb_vc_param_value" name="%1$s" type="range" value="%3$s" min="%4$s" max="%5$s" step="%6$s">
						</div>
						<div class="uk-width-auto" style="max-width: 60px;">
							<input class="uk-input uk-form-width-xsmall" value="%3$s" type="text" >
						</div>
					</div>
				</div>
				',
				$this->setting( 'param_name' ),
				$this->setting( 'type' ),
				esc_attr( $this->value() ),
				esc_attr( isset( $settings['min'] ) && is_numeric( $settings['min'] ) ? $settings['min'] : 0 ),
				esc_attr( isset( $settings['max'] ) && is_numeric( $settings['max'] ) ? $settings['max'] : 100 ),
				esc_attr( isset( $settings['step'] ) && is_numeric( $settings['step'] ) ? $settings['step'] : 1 )
			);
			return $output;
		}

	}

}

vc_add_shortcode_param( 'slider', 'dahz_framework_slider_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_slider_vc_params( $settings, $value ) {

	$slider = new Dahz_Framework_Slider_SC_Param( $settings, $value );

	return $slider->render();

}
