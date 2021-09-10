<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => filter_post_by
[1] => post_cat_ids
[2] => post_ids
[3] => order_by
[4] => sort_by
[5] => number_of_posts
[6] => columns
[7] => column_gap
[8] => post_offset
[9] => post_slider_style
[10] => title_element_tag
[11] => title_color
[12] => is_title_uppercase
[13] => is_hide_category
[14] => is_category_uppercase
[15] => is_hide_meta_category
[16] => category_color
[17] => is_hide_author
[18] => is_hide_date
[19] => is_meta_uppercase
[20] => is_hide_avatar
[21] => post_meta_color
[22] => is_hide_excerpt
[23] => excerpt_length
[24] => excerpt_color
[25] => is_hide_share
[26] => share_color
[27] => post_alignment
[28] => is_disable_feature_image
[29] => media_ratio
[30] => media_hover_style
[31] => bg_color
[32] => box_shadow
[33] => hover_box_shadow
[34] => hover_border_color
[35] => is_hide_button
[37] => phone_potrait_columns
[38] => phone_landscape_columns
[39] => tablet_landscape_columns
[40] => slide_nav_color
[41] => is_show_slide_nav
[42] => slide_nav_position
[43] => is_hover_show_slide_nav
[44] => slide_nav_breakpoint
[45] => is_show_dot_nav
[46] => dot_nav_breakpoint
[47] => autoplay_interval
[48] => is_disable_infinite_scroll
[49] => is_enable_in_sets
[50] => is_center_active_slide
[51] => css_animation
[52] => animation_parallax
[53] => delay_animation
[54] => repeat_animation
[55] => el_class
[56] => margin
[57] => remove_top_margin
[58] => remove_bottom_margin
[59] => visibility
[60] => enable_dahz_lazy_shortcode
[61] => dahz_id
*/

# Shortcode attributes
$shortcode_attr = array( 'data-uk-filter' => 'target: div > .de-sc-post-tabs__container;' );

# Post Slider Style
# Classes

//$shortcode_attr['data-slider-style']     = $post_slider_style;

# Pre-defined Class

$shortcode_attr['class'][] = 'de-sc-post-slider uk-flex uk-flex-column';

# Hover effect

if ( !empty( $media_hover_style ) )
	$shortcode_attr['data-hover-effect'] = $media_hover_style;

// Setup Query
$query_args  = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'posts_per_page'      => $number_of_posts,
	'orderby'             => $order_by,
	'order'               => $sort_by,
    'offset'              => $post_offset
);

switch( $filter_post_by ){

	case 'recent_post':
		$query_args['orderby'] = 'post_date';
		$query_args['order'] = 'DESC';
		break;

	case 'categories':
		if( !empty( $post_cat_ids ) ) $query_args['category'] = $post_cat_ids;
		break;

	case 'post_ids':
		$query_args['post__in'] = array_map( 'sanitize_title', explode( ',', $post_ids ) );
		break;
}


$post_query = get_posts( $query_args );

$post_count = count( $post_query );
// End of Setup Query

$container_attributes = array(
	'class' 		=> array( "{$column_gap} de-sc-post-tabs__container" ),
	'data-uk-grid' 	=> array(),
);

if( !empty( $enable_masonry ) ) $container_attributes['data-uk-grid'][] = 'masonry:true;';

if( !empty( $enable_parallax ) ) $container_attributes['data-uk-grid'][] = "parallax:{$parallax_speed};";

# Set phone portrait column

$container_attributes['class'][] = sprintf( 'uk-child-width-%s', $phone_potrait_columns );

# Set phone landscape & tablet portrait column

$container_attributes['class'][] = sprintf( 'uk-child-width-%s@s', $phone_landscape_columns );

# Set tablet landscape column

$container_attributes['class'][] = sprintf( 'uk-child-width-%s@m', $tablet_landscape_columns );

# Set desktop column

$container_attributes['class'][] = sprintf( 'uk-child-width-%s@l', $columns );

?>
<div <?php
	dahz_shortcode_set_attributes(
		$shortcode_attr,
		'post_slider_shortcode',
		$atts
	); ?>>
	
	<ul <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'post_slider_container',
		$atts
	); ?>>
	<?php
		global $post;
		
		$collected_categories = array();
		
		foreach( $post_query as $post ){
			
			setup_postdata( $post );
			
			$categories = get_the_terms( get_the_ID(), 'category' );
					
			$collected_categories = dahz_framework_collect_terms( $categories, $collected_categories );
			
			dahz_framework_get_template(
				"{$post_slider_style}.php",
				array(
					'post_query'				=> $post_query,
					'media_ratio'				=> $media_ratio,
					'is_disable_feature_image'	=> $is_disable_feature_image,
					'title_element_tag'			=> $title_element_tag,
					'title_color'				=> $title_color,
					'is_hide_category'			=> $is_hide_category,
					'is_hide_author'			=> $is_hide_author,
					'is_hide_date'				=> $is_hide_date,
					'is_meta_uppercase'			=> $is_meta_uppercase,
					'post_meta_color'			=> $post_meta_color,
					'is_hide_excerpt'			=> $is_hide_excerpt,
					'excerpt_length'			=> (int)$excerpt_length <= 0 ? 40 : (int)$excerpt_length,
					'excerpt_color'				=> $excerpt_color,
					'post_alignment'			=> $post_alignment,
					'bg_color'					=> $bg_color,
					'box_shadow'				=> $box_shadow,
					'hover_box_shadow'			=> $hover_box_shadow,
					'is_hide_button_readmore'	=> $is_hide_button_readmore,
					'overlay_color'				=> $overlay_color,
					'button_type'				=> $button_type,
					'button_size'				=> $button_size,
				),
				'includes/templates/layouts/post-slider/',
				DAHZEXTENDER_SHORTCODE_PATH
			);
			
		}
		
		wp_reset_postdata();
		
	?>
	</ul>
	<?php if( ! empty( $collected_categories ) ):?>
		<div class="uk-flex-first uk-width-1-1 uk-margin uk-margin-remove-top">
			<ul <?php dahz_shortcode_set_attributes( 
				array( 
					'class' 		=> array( 
						$category_filter_alignment,
						'de-sc-post-tabs__filter',
					),
					'data-uk-tab'	=> '',
				)
			);?>>
				
				<li class="uk-active" data-uk-filter-control>
					<a href="#"><?php _e( 'All', 'kitring' )?></a>
				</li>
				<?php foreach( $collected_categories as $category ): ?>
				
					<li data-uk-filter-control=".category-<?php echo esc_attr( $category->slug );?>">
						<a href="#"><?php echo esc_html( $category->name );?></a>
					</li>
					
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif;?>
</div>
