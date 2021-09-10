<?php

/**
*
*/
vc_add_shortcode_param( 'radio_button', 'dahz_framework_radio_button_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_radio_button_vc_params( $settings, $value ) {
	
	$value = is_array( $value ) ? '' : $value;

	$option = sprintf(
		'
		<input name="%1$s" type="hidden"  class="wpb_vc_param_value wpb-textinput %2$s" value="%3$s">
		',
		esc_attr( $settings['param_name'] ),
		esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field',
		esc_attr( $value )
	);
	
	$option .= '<ul class="dahz-vc-params__radio-button-wrapper">';
	
	if( is_array( $settings['value'] ) ){
		
		foreach( $settings['value'] as $option_value => $image ){
			
			$option .= sprintf(
				'
				<li>
					<div data-value="%1$s">
						%2$s
					</div>
				</li>
				',
				esc_attr( $option_value ),
				$image
			);
			
		}

	}
	
	$option .= '</ul>';
	
	return sprintf(
		'
		<div class="dahz-vc-params__radio-button">
			%1$s
		</div>
		',
		$option
	);

}