<?php

/**
[0] => shortcode_style
[1] => total_products
[2] => columns
[3] => row_column_gap
[4] => loop_product_layout
[5] => advance_option
[6] => product_cat_ids
[7] => cat_operator
[8] => filter_by
[9] => product_visibility
[10] => product_color_scheme
[11] => phone_potrait_column
[12] => phone_landscape_column
[13] => tablet_landscape_column
[14] => show_slide_nav
[15] => slide_nav_position
[16] => show_slide_nav_when_hover
[17] => slide_nav_breakpoint
[18] => show_dot_nav
[19] => dot_nav_breakpoint
[20] => auto_play_interval
[21] => enable_infinite
[22] => enable_slide
[23] => enable_center_active
[24] => css_animation
[25] => animation_parallax
[26] => delay_animation
[27] => repeat_animation
[28] => el_class
[29] => margin
[30] => remove_top_margin
[31] => remove_bottom_margin
[32] => visibility
[33] => enable_dahz_lazy_shortcode
[34] => dahz_id
 */
// Retrieve value from customizer
$attributes = array(
	'class'							=> 'de-sc-product-display'
);
dahz_shortcode_set_loop_product_settings( $atts );
// Setup catalog mode
?>
<div <?php
	dahz_shortcode_set_attributes(
		$attributes,
		'dahz_product_newest'
	);?>>
	<?php
	
	$product_cats = dahz_shortcode_get_term_slugs_by_ids( $product_cat_ids, 'product_cat' );
	
	echo do_shortcode( 
		sprintf( 
			'[products limit="%1$s" columns="%4$s" orderby="id" order="DESC" visibility="%3$s"%5$s%6$s]',
			$total_products,
			$columns,
			$product_visibility,
			$columns,
			!empty( $product_cats ) ? ' category="' . $product_cats . '" cat_operator="'. $cat_operator .'"' : '',
			!empty( $filter_by ) ? ' ' . $filter_by . '="true"' : ''
		) 
	);
	dahz_shortcode_reset_loop_product_settings();
	?>
</div>

