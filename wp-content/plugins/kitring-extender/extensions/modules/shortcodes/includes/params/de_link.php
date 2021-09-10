<?php

vc_add_shortcode_param( 'de_link', 'dahz_framework_paramtype_link_vc_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_Paramtype_Link_vc_params( $settings, $value ) {
	$uid = substr(md5(uniqid(mt_rand(), true)), 0, 4);
	$output = sprintf(
		'
		<div class="uk-position-relative ds-paramtype-link__wrapper">
			<a id="de-link-%4$s" class="uk-form-icon uk-form-icon-flip ds-paramtype-link--open" href="#"><i class="dashicons dashicons-admin-links"></i></a>
			<input type="url" name="%1$s" class="%1$s %2$s_field wpb_vc_param_value uk-input" value="%3$s" />
		</div>
		',
		$settings['param_name'], # 1
		$settings['type'], # 2
		esc_attr( $value ), # 3
		esc_attr( $uid ) # 4
	);

	return $output;
}