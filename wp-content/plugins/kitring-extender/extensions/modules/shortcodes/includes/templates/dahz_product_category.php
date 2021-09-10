<?php

/**
[0] => shortcode_style
[1] => total_products
[2] => columns
[3] => row_column_gap
[4] => loop_product_layout
[5] => order_by
[6] => sort_by
[7] => product_cat_ids
[8] => cat_operator
[9] => advance_option
[10] => filter_by
[11] => product_visibility
[12] => product_color_scheme
[13] => phone_potrait_column
[14] => phone_landscape_column
[15] => tablet_landscape_column
[16] => show_slide_nav
[17] => slide_nav_position
[18] => show_slide_nav_when_hover
[19] => slide_nav_breakpoint
[20] => show_dot_nav
[21] => dot_nav_breakpoint
[22] => auto_play_interval
[23] => enable_infinite
[24] => enable_slide
[25] => enable_center_active
[26] => css_animation
[27] => animation_parallax
[28] => delay_animation
[29] => repeat_animation
[30] => el_class
[31] => margin
[32] => remove_top_margin
[33] => remove_bottom_margin
[34] => visibility
[35] => enable_dahz_lazy_shortcode
[36] => dahz_id
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
			'[products limit="%1$s" columns="%2$s" orderby="%5$s" order="%6$s" visibility="%3$s"%4$s%7$s]',
			$total_products,
			$columns,
			$product_visibility,
			!empty( $product_cats ) ? ' category="' . $product_cats . '" cat_operator="'. $cat_operator .'"' : '',
			$order_by,
			$sort_by,
			!empty( $filter_by ) ? ' ' . $filter_by . '="true"' : ''
		) 
	);
	dahz_shortcode_reset_loop_product_settings();
	?>
</div>

