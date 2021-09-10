<?php
/**
*
*/
if ( !class_exists( 'Dahz_Framework_Title_Responsive_Size_SC_Param' ) ) {

	class Dahz_Framework_Title_Responsive_Size_SC_Param {

		public $settings = array();

		public $value = '';

		public $values = array();

		public function __construct( $settings, $value ) {

			$this->settings( $settings );

			$this->value( $value );

			if ( !empty( $value ) ) {

				$this->values = json_decode( urldecode( $value ), true );

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
				<div class="dahz-title-responsive-size-vc-param">
					<input type="hidden" name="%1$s" class="%1$s %2$s_field wpb_vc_param_value" value="%3$s">
					<table class="uk-table uk-margin-remove-vertical">
						<tbody>
							<tr>
								<td class="uk-padding-remove-horizontal uk-padding-remove-vertical" colspan="2"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Extra Small ( Phone Potrait )</label></td>
							</tr>
							<tr>
								<td class="uk-padding-remove-left"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Font Size</label><input type="text" name="xs_font_size" value="%4$s"></td>
								<td class="uk-padding-remove-right"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Line Height</label><input type="text" name="xs_line_height" value="%5$s"></td>
							</tr>
							<tr>
								<td class="uk-padding-remove-horizontal uk-padding-remove-vertical" colspan="2"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Small ( Phone Landscape )</label></td>
							</tr>
							<tr>
								<td class="uk-padding-remove-left"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Font Size</label><input type="text" name="s_font_size" value="%6$s"></td>
								<td class="uk-padding-remove-right"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Line Height</label><input type="text" name="s_line_height" value="%7$s"></td>
							</tr>
							<tr>
								<td class="uk-padding-remove-horizontal uk-padding-remove-vertical" colspan="2"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Medium ( Tablet Landscape )</label></td>
							</tr>
							<tr>
								<td class="uk-padding-remove-left"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Font Size</label><input type="text" name="m_font_size" value="%8$s"></td>
								<td class="uk-padding-remove-right"><label style="font-weight: 600;margin-bottom: 5px;display: block;">Line Height</label><input type="text" name="m_line_height" value="%9$s"></td>
							</tr>
						</tbody>
					</table>
				</div>

				',
				$this->setting( 'param_name' ),
				$this->setting( 'type' ),
				esc_attr( $this->value() ),
				isset( $this->values['xs_font_size'] ) ? $this->values['xs_font_size'] : '',
				isset( $this->values['xs_line_height'] ) ? $this->values['xs_line_height'] : '',
				isset( $this->values['s_font_size'] ) ? $this->values['s_font_size'] : '',
				isset( $this->values['s_line_height'] ) ? $this->values['s_line_height'] : '',
				isset( $this->values['m_font_size'] ) ? $this->values['m_font_size'] : '',
				isset( $this->values['m_line_height'] ) ? $this->values['m_line_height'] : ''
			);
			return $output;
		}

	}

}

vc_add_shortcode_param( 'title_responsive_size', 'dahz_framework_title_responsive_size_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_title_responsive_size_vc_params( $settings, $value ) {

	$visibility = new Dahz_Framework_Title_Responsive_Size_SC_Param( $settings, $value );

	return $visibility->render();

}