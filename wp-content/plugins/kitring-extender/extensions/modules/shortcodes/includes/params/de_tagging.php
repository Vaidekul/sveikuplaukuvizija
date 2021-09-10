<?php

/**
 * add new param type on shortcodes
 * 
 * @since 1.0.0
 * @author Dahz - KW
 * @param -
 * @return -
 */

vc_add_shortcode_param( 'de_tagging', 'tagging_settings_field', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function tagging_settings_field( $settings, $value ) {
	return sprintf(
		'
		<div class="ds-tagging__container" data-control="%4$s">
			<div class="ds-tagging__input-title">%5$s</div>
			<div class="ds-tagging__action">
				<a class="ds-tagging--btn-remove"><span>+</span></a>
				<a class="ds-tagging--btn-upload"><span>+</span></a>
			</div>
			<div class="ds-tagging__input-subtitle">%6$s</div>
			<div class="ds-tagging__input-title">%7$s</div>
			<div class="ds-tagging__action">
				<input type="text" class="ds-tagging--img-alt" />
			</div>
			<div class="ds-tagging__input-subtitle">%8$s</div>
			<div class="ds-tagging__input-title">%9$s</div>
			<div class="ds-tagging__dots-container">
				<img src="#" class="ds-tagging__dots-media" />
			</div>
			<div class="ds-tagging__form-container"></div>
			<div class="ds-tagging__dots-value-wrapper">
				<textarea class="wpb_vc_param_value wpb-textinput %2$s %3$s_field" name="%2$s">%1$s</textarea>
			</div>
		</div>
		',
		$value, # 1
		esc_attr( $settings['param_name'] ), # 2
		esc_attr( $settings['type'] ), # 3
		esc_attr( $settings['settings']['control'] ), # 4
		__( 'Image', 'sobari_sc' ), # 5
		__( 'Select image from media library', 'sobari_sc' ), # 6
		__( 'Image Alt', 'sobari_sc' ), # 7
		__( 'Enter the image alt attribute', 'sobari_sc' ), # 8
		__( 'Preview', 'sobari_sc' ) # 9
	);
}