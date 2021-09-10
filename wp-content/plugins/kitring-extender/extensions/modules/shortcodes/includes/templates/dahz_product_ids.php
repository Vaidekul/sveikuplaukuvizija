<?php

/**
[0] => shortcode_style
[1] => total_products
[2] => columns
[3] => row_column_gap
[4] => loop_product_layout
[5] => order_by
[6] => sort_by
[7] => product_ids
[8] => product_visibility
[9] => product_color_scheme
[10] => phone_potrait_column
[11] => phone_landscape_column
[12] => tablet_landscape_column
[13] => show_slide_nav
[14] => slide_nav_position
[15] => show_slide_nav_when_hover
[16] => slide_nav_breakpoint
[17] => show_dot_nav
[18] => dot_nav_breakpoint
[19] => auto_play_interval
[20] => enable_infinite
[21] => enable_slide
[22] => enable_center_active
[23] => css_animation
[24] => animation_parallax
[25] => delay_animation
[26] => repeat_animation
[27] => el_class
[28] => margin
[29] => remove_top_margin
[30] => remove_bottom_margin
[31] => visibility
[32] => enable_dahz_lazy_shortcode
[33] => dahz_id
 */
 if( empty( $product_ids ) ) return;
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
		
	echo do_shortcode( 
		sprintf( 
			'[products limit="%1$s" columns="%2$s" orderby="%5$s" order="%6$s" visibility="%3$s"%4$s]',
			$total_products,
			$columns,
			$product_visibility,
			!empty( $product_ids ) ? ' ids="' . $product_ids . '"' : '',
			$order_by,
			$sort_by
		) 
	);
	dahz_shortcode_reset_loop_product_settings();
	?>
</div>

