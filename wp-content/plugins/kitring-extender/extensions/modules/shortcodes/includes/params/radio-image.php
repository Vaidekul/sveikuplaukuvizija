<?php

/**
*
*/
vc_add_shortcode_param( 'radio_image', 'dahz_framework_radio_image_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_radio_image_vc_params( $settings, $value ) {

	$value = is_array( $value ) ? '' : $value;

	$option = sprintf(
		'
		<input name="%1$s" type="hidden"  class="wpb_vc_param_value wpb-textinput %2$s" value="%3$s">
		',
		esc_attr( $settings['param_name'] ),
		esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field',
		esc_attr( $value )
	);

	$option .= '<ul class="dahz-vc-params__radio-image-wrapper">';

	if( is_array( $settings['value'] ) ){

		foreach( $settings['value'] as $option_value => $image ){

			$option .= sprintf(
				'
				<li title="%1$s">
					<img alt="image" data-value="%1$s" src="%2$s" />
				</li>
				',
				esc_attr( $option_value ),
				esc_url( $image )
			);

		}

	}

	$option .= '</ul>';

	return sprintf(
		'
		<div class="dahz-vc-params__radio-image">
			%1$s
		</div>
		',
		$option
	);

}
