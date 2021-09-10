<?php

/**
[0] => filter_product
[1] => product_cat_ids
[2] => loop_product_layout
[3] => total_products
[4] => columns
[5] => row_column_gap
[6] => enable_load_more
[7] => order_by
[8] => sort_by
[9] => features
[10] => product_color_scheme
[11] => phone_potrait_column
[12] => phone_landscape_column
[13] => tablet_landscape_column
[14] => alignment
[15] => active_color
[16] => inactive_color
[17] => active_border_color
[18] => button_style
[19] => bg_color
[20] => border_color
[21] => hover_bg_color
[22] => text_color
[23] => hover_text_color
[24] => hover_text_style
[25] => border_radius
[26] => size
[27] => css_animation
[28] => animation_parallax
[29] => delay_animation
[30] => repeat_animation
[31] => el_class
[32] => margin
[33] => remove_top_margin
[34] => remove_bottom_margin
[35] => visibility
[36] => enable_dahz_lazy_shortcode
[37] => dahz_id
 */
$attributes = array(
	'class'				=> 'de-sc-product-tab',
	'data-uk-filter'	=> 'target: .js-filter .products;',
);

$product_categories = array();

$product_loop = '';

$load_more_button = '';

$tabs = '';

$product_cats = array();

$atts['show_data_unit_sold'] = true;

dahz_shortcode_set_loop_product_settings( $atts );
// setup query arguments
$args = array(
	'limit'       	=> $total_products,
	'columns'      	=> $columns,
	'order'        	=> $sort_by,
	'orderby'      	=> $order_by,
	'cat_operator' 	=> 'IN',
	'class'			=> 'js-filter',
);
// End of setup query arguments

// Setup Tabs
if( $filter_product == 'category' ){
		
	$product_cats = dahz_shortcode_get_term_slugs_by_ids( $product_cat_ids, 'product_cat', 'all' );
	
	$product_categories = !empty( $product_cats['terms'] ) ? $product_cats['terms'] : get_terms( 'product_cat', array( 'hide_empty' => true ) );
	
	if( !is_wp_error( $product_categories ) && !empty( $product_categories ) ){
		
					
		foreach( $product_categories as $category_term ){
			
			$tabs .= sprintf(
				'
				<li>
					<a class="uk-position-relative" href="#" data-uk-filter-control=".product_cat-%2$s">%1$s</a>
				</li>
				',
				esc_html( $category_term->name ),
				esc_attr( $category_term->slug )
			);
			
		}
					
	}
	
} else {
	
	if( empty( $features ) ) return;
	
	$features = explode( ',', $features );
	
	$features_detail = array(
		'.sale' 		=> array(
			'filter'	=> '.sale',
			'title'		=> __( 'Sale', 'upsob_sc' ),
		),
		'best_selling' 	=> array(
			'filter'	=> '',
			'title'		=> __( 'Best Selling', 'upsob_sc' ),
			'sort'		=> 'data-sold',
			'order'		=> 'desc',
		),
		'top_rated'		=> array(
			'filter'	=> '',
			'title'		=> __( 'Top Rated', 'upsob_sc' ),
			'sort'		=> 'data-rating',
			'order'		=> 'desc',
		),
		'.featured'		=> array(
			'filter'	=> '.featured',
			'title'		=> __( 'Featured', 'upsob_sc' ),
		)
	);
	
	foreach( $features as $feature ){
		
		$sort = '';
		
		if( !empty( $features_detail[$feature]['sort'] ) ){
			$sort = 'filter:*;sort:' . $features_detail[$feature]['sort'] . ';';
			$sort .= !empty( $features_detail[$feature]['order'] ) ? 'order:' . $features_detail[$feature]['order'] . ';' : '';
		}
		
		$tabs .= sprintf(
			'
			<li>
				<a class="uk-position-relative" href="#" data-uk-filter-control="%1$s%3$s">%2$s</a>
			</li>
			',
			esc_attr( $features_detail[$feature]['filter'] ),
			esc_html( $features_detail[$feature]['title'] ),
			$sort
		);
		
	}
	
}

$tabs = sprintf(
	'
	<ul class="%2$s uk-margin-large uk-text-center uk-tab ds-product-tab-filter" data-uk-tab>
		<li><a class="uk-position-relative" href="#" data-uk-filter-control>%3$s</a></li>
		%1$s
	</ul>
	',
	$tabs,
	$alignment,
	__( 'All', 'upsob_sc' )
);
// End of Setup Tabs

// Setup Product Content
if( !empty( $product_cats['slugs'] ) ) $args['category'] = $product_cats['slugs'];

if( !empty( $enable_load_more ) ) $args['class'] .= ' dahz-sc-enable-load-more';

$shortcode = new WC_Shortcode_Products( $args, 'products' );

$product_loop =  $shortcode->get_content();
// End of Setup Product Content

//Setup loadmore button
if( !empty( $enable_load_more ) ) {
		
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				
	$args = $shortcode->get_query_args();
					
	$args['paged'] = $paged;
	
	unset($args['no_found_rows']);

	$products = new WP_Query( $args );
	
	$max = intval( $products->max_num_pages );
	
	$next = next_posts( $max, false );
	
	wp_reset_postdata();
	
	if( !empty( $next ) ){
				
		$button_attr = array( 'style' => array() );
		
		$button_attr['href'] = esc_url( $next );
		# Class
		$button_attr['class'] = array( 'uk-button uk-margin de-sc-loadmore-btn', $button_type, $button_size );

		# Title
		$button_attr['title'] = __( 'load more', 'upsob_sc' );
		# Background fill color

		# Border outline color
		
		$load_more_button = sprintf(
			'
			<div class="de-sc-loadmore uk-text-center">
				<a %1$s>
					%2$s
				</a>
				<div class="de-sc-loadmore--loader uk-hidden" data-uk-spinner></div>
			</div>
			',
			dahz_shortcode_set_attributes( $button_attr, 'dahz_button_shortcode', array(), false ),
			__( 'Load More', 'sobari' ),
			__( 'LOADING', 'sobari' )
		);
		
	}
	
}
//end of Setup loadmore button
?>
<div <?php
	dahz_shortcode_set_attributes(
		$attributes,
		'dahz_product_tab'
	);?>>
	<?php	
	echo sprintf(
		'
		%1$s
		%2$s
		%3$s
		',
		$tabs,
		$product_loop,
		$load_more_button
	);
	dahz_shortcode_reset_loop_product_settings();
	?>
</div>