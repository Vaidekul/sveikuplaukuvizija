<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => filter_post_by
[1] => portfolio_cat_ids
[2] => post_portfolio_ids
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
$shortcode_attr = array();

# Slider attributes
$slider_attr = array();

# Post Slider Style
# Classes

//$shortcode_attr['data-slider-style']     = $post_slider_style;

# Pre-defined Class

$shortcode_attr['class'][]               = 'de-sc-post-slider';

# Hover effect

if ( !empty( $media_hover_style ) )
	$shortcode_attr['data-hover-effect'] = $media_hover_style;

// Setup Query
$query_args  = array(
	'post_type'           => 'portfolio',
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'posts_per_page'      => $number_of_posts,
	'orderby'             => $order_by,
	'order'               => $sort_by,
    'offset'              => $post_offset
);

switch( $filter_post_by ){

	case 'recent_portfolio':
		$query_args['orderby'] = 'post_date';
		$query_args['order'] = 'DESC';
		break;

	case 'portfolio_categories':
		if( !empty( $portfolio_cat_ids ) ) $query_args['portfolio_categories'] = $portfolio_cat_ids;
		break;

	case 'portfolio_ids':
		$query_args['post__in'] = array_map( 'sanitize_title', explode( ',', $post_portfolio_ids ) );
		break;
}


$post_query = get_posts( $query_args );

$post_count = count( $post_query );
// End of Setup Query

$container_attributes = array(
	'class' 		=> array( "uk-slider-items {$column_gap}" ),
	'data-uk-grid' 	=> ''
);

$item_class = "uk-width-{$phone_potrait_columns} uk-width-{$phone_landscape_columns}@s uk-width-{$tablet_landscape_columns}@m uk-width-{$columns}@l";

// $container_attributes['class'][] = sprintf( 'uk-child-width-%s', $phone_potrait_columns );

// # Set phone landscape & tablet portrait column

// $container_attributes['class'][] = sprintf( 'uk-child-width-%s@s', $phone_landscape_columns );

// # Set tablet landscape column

// $container_attributes['class'][] = sprintf( 'uk-child-width-%s@m', $tablet_landscape_columns );

// # Set desktop column

// $container_attributes['class'][] = sprintf( 'uk-child-width-%s@l', $columns );

$slider_attr = array(
	'data-uk-slider' => array(),
	'class'			 => 'uk-visible-toggle uk-slider-container de-sc-post-slider uk-position-relative'
);

# Autoplay Attribute

if( !empty( $autoplay_interval ) )
	$slider_attr['data-uk-slider'][]     = 'autoplay: true;autoplay-interval:' . $autoplay_interval . ';';

# Disable Infinite Scroll

if( !empty( $is_disable_infinite_scroll ) )
	$slider_attr['data-uk-slider'][]     = 'finite: true;';

# Disable Infinite Scroll

if( !empty( $is_enable_in_sets ) )
	$slider_attr['data-uk-slider'][]     = 'sets: true;';

# Disable Infinite Scroll

if( !empty( $is_center_active_slide ) )
	$slider_attr['data-uk-slider'][]     = 'center: true;';
?>
<div <?php
	dahz_shortcode_set_attributes(
		$shortcode_attr,
		'post_slider_shortcode',
		$atts
	); ?>>
	<div <?php
		dahz_shortcode_set_attributes(
			$slider_attr,
			'post_slider_slider',
			$atts
		); ?>>
		<div class="uk-position-relative">
			<ul <?php
			dahz_shortcode_set_attributes(
				$container_attributes,
				'post_slider_container',
				$atts
			); ?>>
			<?php
				global $post;
								
				foreach( $post_query as $post ){
					
					setup_postdata( $post );
					
					dahz_framework_get_template(
						"{$post_slider_style}.php",
						array(
							'post_query'				=> $post_query,
							'media_ratio'				=> $media_ratio,
							'is_disable_feature_image'	=> $is_disable_feature_image,
							'title_element_tag'			=> $title_element_tag,
							'title_color'				=> $title_color,
							'is_hide_category'			=> $is_hide_category,
							'is_meta_uppercase'			=> $is_meta_uppercase,
							'post_meta_color'			=> $post_meta_color,
							'post_alignment'			=> $post_alignment,
							'bg_color'					=> $bg_color,
							'box_shadow'				=> $box_shadow,
							'hover_box_shadow'			=> $hover_box_shadow,
							'overlay_color'				=> $overlay_color,
							'item_class'				=> $item_class,
						),
						'includes/templates/layouts/portfolio-slider/',
						DAHZEXTENDER_SHORTCODE_PATH
					);
					
				}
				
				wp_reset_postdata();
				
			?>
			</ul>

		</div>
		<?php if ( !empty( $is_show_slide_nav ) ) : ?>
			<a <?php dahz_shortcode_set_attributes(
				array(
					'data-uk-slidenav-previous' => '',
					'data-uk-slider-item'       => 'previous',
					'href'                      => '#',
					'class'                     => sprintf(
						'
						uk-slidenav-large uk-position-small %4$s uk-position-center-left%1$s%2$s%3$s
						',
						$slide_nav_position,
						!empty( $is_hover_show_slide_nav ) ? ' uk-hidden-hover' : '',
						!empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : '',
						$slide_nav_color
					)
				)
			); ?>>
			</a>
			<a <?php dahz_shortcode_set_attributes(
					array(
					'data-uk-slidenav-next' => '',
					'data-uk-slider-item'   => 'next',
					'href'                  => '#',
					'class'                 => sprintf(
						'
						uk-slidenav-large uk-position-small %4$s uk-position-center-right%1$s%2$s%3$s
						',
						$slide_nav_position,
						!empty( $is_hover_show_slide_nav ) ? ' uk-hidden-hover' : '',
						!empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : '',
						!empty( $slide_nav_color ) ? $slide_nav_color : ''
					)
				)
			); ?>>
			</a>
				<?php endif; ?>
				<?php if ( !empty( $is_show_dot_nav ) ) : ?>
				<ul class="uk-dotnav uk-margin uk-flex uk-flex-center <?php echo esc_attr( $slide_nav_color ) ?> <?php echo !empty( $dot_nav_breakpoint ) ? esc_attr( "uk-visible{$dot_nav_breakpoint}" ) : ''; ?> ">
					<?php
						for ( $i=0; $i <= $post_count ; $i++ ) {
							?>
							<li data-uk-slider-item="<?php echo esc_attr( $i ) ?>">
								<a href="">
								</a>
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 16 16" preserveAspectRatio="none"><circle cx="8" cy="8" r="6.215"></circle></svg>

							</li>
							<?php

						}
					?>
				</ul>
			<?php endif; ?>
			<!-- RENDER ARROW -->
		</div>
</div>
