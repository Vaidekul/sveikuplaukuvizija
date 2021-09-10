<?php

/**
*
*/
if( !class_exists( 'Dahz_Framework_Visibility_SC_Param' ) ){
	
	class Dahz_Framework_Visibility_SC_Param{
		
		public $settings = array();
		
		public $value = '';
		
		public $values = array();
		
		public function __construct( $settings, $value ){
			
			$this->settings( $settings );
			
			$this->value( $value );
			
			if( !empty( $value ) ){
				
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

			$output = sprintf(
				'
				<div class="dahz-visibility-vc-param">
					<input type="hidden" name="%1$s" class="%1$s %2$s_field wpb_vc_param_value" value="%3$s">
					<table class="uk-table uk-table-divider uk-table-hover">
						<thead>
							<tr>
								<th class="uk-table-expand">Device</th>
								<th class="uk-width-small">Hide on device?</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Large</td>
								<td><input type="checkbox" name="large" value="de-hidden@l" %4$s></td>
							</tr>
							<tr>
								<td>Medium</td>
								<td><input type="checkbox" name="medium" value="de-hidden@m" %5$s></td>
							</tr>
							<tr>
								<td>Small</td>
								<td><input type="checkbox" name="small" value="de-hidden@s" %6$s></td>
							</tr>
						</tbody>
					</table>
				</div>
				
				',
				$this->setting( 'param_name' ),
				$this->setting( 'type' ),
				esc_attr( $this->value() ),
				esc_attr( checked( true, in_array( 'de-hidden@l', $this->values ) , false ) ),
				esc_attr( checked( true, in_array( 'de-hidden@m', $this->values ), false ) ),
				esc_attr( checked( true, in_array( 'de-hidden@s', $this->values ), false ) )
			);
			return $output;
		}
		
	}
	
}

vc_add_shortcode_param( 'visibility', 'dahz_framework_visibility_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_visibility_vc_params( $settings, $value ) {

	$visibility = new Dahz_Framework_Visibility_SC_Param( $settings, $value );
	
	return $visibility->render();

}
