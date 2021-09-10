<?php

/**
[0] => shortcode_style
[1] => total_products
[2] => columns
[3] => row_column_gap
[4] => loop_product_layout
[5] => order_by
[6] => sort_by
[7] => advance_option
[8] => product_cat_ids
[9] => cat_operator
[10] => product_visibility
[11] => product_color_scheme
[12] => phone_potrait_column
[13] => phone_landscape_column
[14] => tablet_landscape_column
[15] => show_slide_nav
[16] => slide_nav_position
[17] => show_slide_nav_when_hover
[18] => slide_nav_breakpoint
[19] => show_dot_nav
[20] => dot_nav_breakpoint
[21] => auto_play_interval
[22] => enable_infinite
[23] => enable_slide
[24] => enable_center_active
[25] => css_animation
[26] => animation_parallax
[27] => delay_animation
[28] => repeat_animation
[29] => el_class
[30] => margin
[31] => remove_top_margin
[32] => remove_bottom_margin
[33] => visibility
[34] => enable_dahz_lazy_shortcode
[35] => dahz_id
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
			'[products limit="%1$s" columns="%2$s" orderby="%5$s" order="%6$s" visibility="%3$s"%4$s top_rated="true"]',
			$total_products,
			$columns,
			$product_visibility,
			!empty( $product_cats ) ? ' category="' . $product_cats . '" cat_operator="'. $cat_operator .'"' : '',
			$order_by,
			$sort_by
		) 
	);
	dahz_shortcode_reset_loop_product_settings();
	?>
</div>

