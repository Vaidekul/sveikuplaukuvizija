<?php
if ( !defined('ABSPATH') ) {
	exit;
}

if ( !class_exists('DPF_Options_Save') ) {

	/**
	 * 
	 */
	class DPF_Options_Save extends DPF_Options {
		
		
		/**
		 * Default settings specific for this option
		 * @var array
		 */
		public $defaultSecondarySettings = array(

			/**
			 * ( Optional ) The label for the save button. Defaults to Save
			 *
			 * @since 1.0
			 * @var string
			 */
			'save' => '',

			/**
			 * ( Optional ) The label for the reset button. Defaults to Reset
			 *
			 * @since 1.0
			 * @var string
			 */
			'reset' => '',

			/**
			 * (Optional) If false, the reset button will not be shown. Defaults to true
			 *
			 * @since 1.0
			 * @var bool
			 */
			'use_reset' => true,

			/**
			 * ( Optional ) Alert Message for reset action
			 *
			 * @since 1.0
			 * @var string
			 */
			'reset_question' => '',
			'action' => 'save',
		);

		public function display() {
			if ( ! empty( $this->owner->postID ) ) {
				return;
			}

			if ( empty( $this->settings['save'] ) ) {
				$this->settings['save'] = esc_html__( 'Save Changes', 'dpf_textdomain' );
			}
			if ( empty( $this->settings['reset'] ) ) {
				$this->settings['reset'] = esc_html__( 'Reset to Defaults', 'dpf_textdomain' );
			}
			if ( empty( $this->settings['reset_question'] ) ) {
				$this->settings['reset_question'] = esc_html__( 'Are you sure you want to reset ALL options to their default values?', 'dpf_textdomain' );
			}

			?>
				</tbody>
				</table>

					<p class='submit'>
						<button name="action" value="<?php echo $this->settings['action'] ?>" class="button button-primary">
							<?php echo $this->settings['save'] ?>
						</button>

						<?php
						if ( $this->settings['use_reset'] ) :
						?>
						<button name="action" class="button button-secondary"
							onclick="javascript: if ( confirm( '<?php echo htmlentities( esc_attr( $this->settings['reset_question'] ) ) ?>' ) ) { jQuery( '#dpf-reset-form' ).submit(); } jQuery(this).blur(); return false;">
							<?php echo $this->settings['reset'] ?>
						</button>
						<?php
						endif;
						?>
					</p>

				<table class='form-table'>
					<tbody>
			<?php


		}

	}

}