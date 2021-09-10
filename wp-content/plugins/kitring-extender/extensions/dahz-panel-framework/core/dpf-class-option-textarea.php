<?php
if ( ! defined('ABSPATH') ) {
	exit;
}

if ( ! class_exists('DPF_Options_Textarea') ) {

	class DPF_Options_Textarea extends DPF_Options {
		
		/**
		 * Default settings specific for this option
		 * @var array
		 */
		public $defaultSecondarySettings = array(

			/**
			 * (Optional) The placeholder textarea shown when the input field is blank
			 *
			 * @since 1.0
			 * @var string
			 */
			'placeholder' => '', // show this when blank

			/**
			 * (Optional) if true, a more code-like font will be used
			 *
			 * @since 1.0
			 * @var string
			 */
			'is_code' => false,
			'sanitize_callbacks' => array(),
		);

		public function display() {

			$this->echoOptionHeader( true );

				printf("<textarea class='large-text %s' name=\"%s\" placeholder=\"%s\" id=\"%s\" rows='10' cols='50'>%s</textarea>",
					$this->settings['is_code'] ? 'code' : '',
					$this->getID(),
					$this->settings['placeholder'],
					$this->getID(),
					esc_textarea( stripslashes( $this->getValue() ) )
				);

			$this->echoOptionFooter( false );

		}

		public function cleanValueForSaving( $value ) {

			if ( ! empty( $this->settings['sanitize_callbacks'] ) ) {
				foreach ( $this->settings['sanitize_callbacks'] as $callback ) {
					$value = call_user_func_array( $callback, array( $value, $this ) );
				}
			}

			return $value;
		}

	}

}