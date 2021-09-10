<?php

/**
[0] => shortcode_style
[1] => total_products
[2] => columns
[3] => row_column_gap
[4] => loop_product_layout
[5] => order_by
[6] => sort_by
[7] => attribute
[8] => filter
[9] => terms_operator
[10] => advance_option
[11] => product_cat_ids
[12] => filter_by
[13] => product_visibility
[14] => product_color_scheme
[15] => phone_potrait_column
[16] => phone_landscape_column
[17] => tablet_landscape_column
[18] => show_slide_nav
[19] => slide_nav_position
[20] => show_slide_nav_when_hover
[21] => slide_nav_breakpoint
[22] => show_dot_nav
[23] => dot_nav_breakpoint
[24] => auto_play_interval
[25] => enable_infinite
[26] => enable_slide
[27] => enable_center_active
[28] => css_animation
[29] => animation_parallax
[30] => delay_animation
[31] => repeat_animation
[32] => el_class
[33] => margin
[34] => remove_top_margin
[35] => remove_bottom_margin
[36] => visibility
[37] => enable_dahz_lazy_shortcode
[38] => dahz_id
 */
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
			'[products limit="%1$s" columns="%2$s" orderby="%5$s" order="%6$s" visibility="%3$s"%4$s%7$s%8$s]',
			$total_products,
			$columns,
			$product_visibility,
			!empty( $product_cats ) ? ' category="' . $product_cats . '" cat_operator="'. $cat_operator .'"' : '',
			$order_by,
			$sort_by,
			!empty( $filter_by ) ? ' ' . $filter_by . '="true"' : '',
			!empty( $attribute ) ? ' attribute="' . $attribute . '" terms="'. $filter .'" terms_operator="'. $terms_operator .'"' : ''
		) 
	);
	dahz_shortcode_reset_loop_product_settings();
	?>
</div>