<?php

/**
*
*/
if( !class_exists( 'Dahz_Framework_Parallax_Option' ) ){

	class Dahz_Framework_Parallax_Option{

		public $settings = array();

		public $value = '';

		public $params = array();

		public function __construct( $settings, $value ){

			$this->settings( $settings );

			$this->value( $value );

			if( !empty( $value ) ){

				$values = json_decode( urldecode( $value ), true );

				$this->params( $values );

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

		function params( $values = null ) {

			if ( is_array( $values ) ) {

				$this->params = $values;

			}

			return $this->params;

		}

		function param( $key, $default = '' ) {

			return isset( $this->params[ $key ] ) ? $this->params[ $key ] : $default;

		}

		public function option_breakpoint( $value ) {

			$breakpoints = dahz_shortcode_helper_get_field_option( 'breakpoint' );

			$option = '';

			foreach( $breakpoints as $label => $option_value ){

				$option .= sprintf(
					'
					<option value="%1$s" %3$s>%2$s</option>
					',
					esc_attr( $option_value ),
					esc_html( $label ),
					selected( $option_value, $value, false )
				);

			}

			return $option;

		}

		function render() {

			$output = sprintf(
				'
				<div class="uk-grid-medium parallax-options-container" uk-grid>
					<div class="uk-width-1-1" style="display: none;">
						<textarea name="%1$s" class="%1$s %2$s_field wpb_vc_param_value">%3$s</textarea>
					</div>
					<div class="uk-width-1-2">
						<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
							<div class="uk-width-1-1">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Horizontal Start</label>
							</div>
							<div class="uk-width-expand uk-first-column">
								<input class="uk-range parallax-option" name="parallax-options-x-start-range" type="range" value="%4$s" min="-600" max="600" step="10">
							</div>
							<div class="uk-width-auto" style="max-width: 60px;">
								<input value="%4$s" class="uk-input uk-form-width-xsmall" type="text" name="parallax-options-x-start">
							</div>
						</div>
					</div>
					<div class="uk-width-1-2">
						<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
							<div class="uk-width-1-1">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Horizontal End</label>
							</div>
							<div class="uk-width-expand uk-first-column">
								<input class="uk-range parallax-option" name="parallax-options-x-end-range" type="range" value="%5$s" min="-600" max="600" step="10">
							</div>
							<div class="uk-width-auto" style="max-width: 60px;">
								<input value="%5$s" class="uk-input uk-form-width-xsmall" name="parallax-options-x-end" type="text" >
							</div>
						</div>
					</div>
					<div class="uk-width-1-2 uk-grid-margin-small">
						<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
							<div class="uk-width-1-1 uk-grid-margin-small">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Vertical Start</label>
							</div>
							<div class="uk-width-expand uk-first-column">
								<input class="uk-range parallax-option" name="parallax-options-y-start-range" type="range" value="%6$s" min="-600" max="600" step="10">
							</div>
							<div class="uk-width-auto" style="max-width: 60px;">
								<input value="%6$s" class="uk-input uk-form-width-xsmall" name="parallax-options-y-start" type="text" >
							</div>
						</div>
					</div>
					<div class="uk-width-1-2 uk-grid-margin-small">
						<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
							<div class="uk-width-1-1 uk-grid-margin-small">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Vertical End</label>
							</div>
							<div class="uk-width-expand uk-first-column">
								<input class="uk-range parallax-option" type="range" name="parallax-options-y-end-range" value="%7$s" min="-600" max="600" step="10">
							</div>
							<div class="uk-width-auto" style="max-width: 60px;">
								<input value="%7$s" class="uk-input uk-form-width-xsmall" name="parallax-options-y-end" type="text" >
							</div>
						</div>
					</div>
					<div class="uk-width-1-1 uk-grid-margin-small parallax-advance">
						<div class="uk-margin" uk-grid>
							<div class="uk-width-1-1">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Advance Settings</label>
							</div>
							<div class="uk-width-1-1">
								<input value="%8$s" %19$s type="checkbox" class="parallax-option parallax-options-show-advance-settings" name="parallax-options-show-advance-settings"> Yes
							</div>
						</div>
					</div>
					<div class="uk-width-1-1 uk-grid-margin-small parallax-advance parallax-options-advance-settings %22$s">
						<div class="uk-margin" uk-grid>
							<div class="uk-width-1-2">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Scale Start</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" name="parallax-options-scale-start-range" type="range" value="%9$s" min="0" max="2" step="0.1">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%9$s" name="parallax-options-scale-start" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-2">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Scale End</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" name="parallax-options-scale-end-range" type="range" value="%10$s" min="0" max="2" step="0.1">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%10$s" name="parallax-options-scale-end" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-2 uk-grid-margin-small">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1 uk-grid-margin-small">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Rotate Start</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" type="range" name="parallax-options-rotate-start-range" value="%11$s" min="0" max="360" step="10">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%11$s" name="parallax-options-rotate-start" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-2 uk-grid-margin-small">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1 uk-grid-margin-small">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Rotate End</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" type="range" name="parallax-options-rotate-end-range" value="%12$s" min="0" max="360" step="10">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%12$s" name="parallax-options-rotate-end" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-2 uk-grid-margin-small">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1 uk-grid-margin-small">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Opacity Start</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" name="parallax-options-opacity-start-range" type="range" value="%13$s" min="0" max="1" step="0.1">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%13$s" name="parallax-options-opacity-start" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-2 uk-grid-margin-small">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1 uk-grid-margin-small">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Opacity End</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" name="parallax-options-opacity-end-range" type="range" value="%14$s" min="0" max="1" step="0.1">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%14$s" name="parallax-options-opacity-end" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-1 uk-grid-margin-small">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1 uk-grid-margin-small">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Easing</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" name="parallax-options-easing-range" type="range" value="%15$s" min="0" max="2" step="0.1">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%15$s" name="parallax-options-easing" type="text" >
									</div>
								</div>
							</div>
							<div class="uk-width-1-1 uk-grid-margin-small">
								<div class="uk-flex-middle uk-grid-small parallax-options-range" uk-grid>
									<div class="uk-width-1-1 uk-grid-margin-small">
										<label style="font-weight: 600;margin-bottom: 5px;display: block;">Viewport</label>
									</div>
									<div class="uk-width-expand uk-first-column">
										<input class="uk-range parallax-option" name="parallax-options-viewport-range" type="range" value="%16$s" min="0" max="1" step="0.1">
									</div>
									<div class="uk-width-auto" style="max-width: 60px;">
										<input class="uk-input uk-form-width-xsmall" value="%16$s" name="parallax-options-viewport" type="text" >
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-1 uk-grid-margin-small parallax-advance">
						<div class="uk-margin" uk-grid>
							<div class="uk-width-1-1">
								<label style="color: #999;display: block;font-style: italic;line-height: 20px;margin-top: 8px;clear: both;">%24$s</label>
							</div>
						</div>
					</div>
					<div class="uk-width-1-1 uk-grid-margin-small parallax-advance">
						<div class="uk-margin" uk-grid>
							<div class="uk-width-1-1">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Z Index</label>
							</div>
							<div class="uk-width-1-1">
								<input value="%18$s" %21$s class="parallax-option" name="parallax-options-enable-z-index" type="checkbox">%25$s
							</div>
						</div>
					</div>
					<div class="uk-width-1-1 uk-grid-margin-small">
						<div class="uk-margin" uk-grid>
							<div class="uk-width-1-1">
								<label style="font-weight: 600;margin-bottom: 5px;display: block;">Parallax Breakpoint</label>
							</div>
							<div class="uk-width-1-1">
								<select class="parallax-option" name="parallax-options-breakpoint">
									%23$s
								</select>
							</div>
							<div class="uk-width-1-1">
								<label style="color: #999;display: block;font-style: italic;line-height: 20px;margin-top: 8px;clear: both;">%26$s</label>
							</div>
						</div>
					</div>
				</div>
				',
				$this->setting( 'param_name' ), // 1
				$this->setting( 'type' ), // 2
				esc_attr( $this->value() ), // 3
				esc_attr( $this->param( 'parallax-options-x-start-range', 0 ) ), // 4
				esc_attr( $this->param( 'parallax-options-x-end-range', 0 ) ), // 5
				esc_attr( $this->param( 'parallax-options-y-start-range', 0 ) ), // 6
				esc_attr( $this->param( 'parallax-options-y-end-range', 0 ) ), // 7
				esc_attr( $this->param( 'parallax-options-show-advance-settings', 'false' ) ), // 8
				esc_attr( $this->param( 'parallax-options-scale-start-range', 1 ) ), // 9
				esc_attr( $this->param( 'parallax-options-scale-end-range', 1 ) ), // 10
				esc_attr( $this->param( 'parallax-options-rotate-start-range', 0 ) ), // 11
				esc_attr( $this->param( 'parallax-options-rotate-end-range', 0 ) ), // 12
				esc_attr( $this->param( 'parallax-options-opacity-start-range', 1 ) ), // 13
				esc_attr( $this->param( 'parallax-options-opacity-end-range', 1 ) ), // 14
				esc_attr( $this->param( 'parallax-options-easing-range', 0 ) ), // 15
				esc_attr( $this->param( 'parallax-options-viewport-range', 0 ) ), // 16
				esc_attr( $this->param( 'parallax-options-enable-repeat', 'false' ) ), // 17
				esc_attr( $this->param( 'parallax-options-enable-z-index', 'false' ) ), // 18
				esc_attr( checked( 'true', $this->param( 'parallax-options-show-advance-settings', 'false' ), false ) ), // 19
				esc_attr( checked( 'true', $this->param( 'parallax-options-enable-repeat', 'false' ), false ) ), // 20
				esc_attr( checked( 'true', $this->param( 'parallax-options-enable-z-index', 'false' ), false ) ), // 21
				$this->param( 'parallax-options-show-advance-settings', 'false' ) !== 'true' ? 'uk-hidden' : '', // 22
				$this->option_breakpoint( $this->param( 'parallax-options-breakpoint', 'false' ) ), // 23
				__( ' Animate the element as long as the section is visible', 'upsob' ), // 24
				__( ' Set a higher stacking order', 'upsob' ), // 25
				__( ' Display the parallax effect only on this device width and larger', 'upsob' ) // 26
			);
			return $output;
		}

	}

}

vc_add_shortcode_param( 'parallax_options', 'dahz_framework_parallax_option_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_parallax_option_vc_params( $settings, $value ) {

	$parallax_options = new Dahz_Framework_Parallax_Option( $settings, $value );

	return $parallax_options->render();

}
