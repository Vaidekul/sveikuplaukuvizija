<?php

/**
 * blog
 *
 * Template for blog shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

// Handle Value Empty
$nav_arrow          = !empty( $nav_arrow )          ? 'true'              : 'false';
$nav_dots           = !empty( $nav_dots )           ? 'true'              : 'false';
$arrow_position     = !empty( $arrow_position )     ? $arrow_position     : 'false';
$enable_auto_play   = !empty( $enable_auto_play )   ? $enable_auto_play   : 'false';
$auto_play_duration = !empty( $auto_play_duration ) ? $auto_play_duration : '2000';

// Setup Args Params
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args  = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'posts_per_page'      => $total_posts,
	'orderby'             => $order_by,
	'order'               => $sort_by,
	'paged'               => $paged,
);

// Additional Params
switch( $filter_by ) {

	case 'categories':

		$args['category__in'] = array_map( 'sanitize_title', explode( ',', $post_cat_ids ) );

		break;

	case 'post_ids':

		$args['post__in'] = array_map( 'sanitize_title', explode( ',', $post_ids ) );

		break;

}

// Setup Image
$image_size = '';
$image_attr = 'carousel' == $posts_display ? array( 'data-ignore-lazy-image' => 'true' ) : '';

switch( $columns ) {
	case '1':
		$image_size = 'full';
	break;

	case '2':
		$image_size = 'large';
	break;

	default:
		$image_size = 'medium_large';
	break;
}

// Setup Query
$query = new WP_Query( $args );

// Setup Pagination
$is_masonry = 'masonry' == $posts_display ? 'true' : 'false';

$pagination = array(
	'shortcode'  => '.de-sc-blog',
	'container'  => '.de-sc-blog__entry-container',
	'item'       => 'de-sc-blog__entry',
	'query'      => $query,
	'type'       => $pagination_type,
	'is_masonry' => $is_masonry
);

if ( $query->have_posts() ) : ?>
<div class="de-sc-blog" data-post-display="<?php esc_attr_e( $posts_display ); ?>" data-column="<?php esc_attr_e( $columns ); ?>" data-post-style="<?php esc_attr_e( $post_style ); ?>" data-nav-arrow="<?php esc_attr_e( $nav_arrow ); ?>" data-nav-dots="<?php esc_attr_e( $nav_dots ); ?>" data-arrow-position="<?php esc_attr_e( $arrow_position ); ?>" data-autoplay="<?php esc_attr_e( $enable_auto_play ); ?>" data-autoplay-time="<?php esc_attr_e( $auto_play_duration ); ?>">
	<div class="de-sc-blog__entry-container small-up-1 medium-up-2 large-up-<?php esc_attr_e( $columns ); ?>">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="de-sc-blog__entry column">
			<div class="de-sc-blog__entry-image">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), $image_size, false, $image_attr ); ?>
				<?php endif; ?>
			</div>
			<div class="de-sc-blog__entry-content">
				<?php if ( $is_display_categories ) : dahz_framework_render_archive_categories(); endif; ?>
				<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo !empty( get_the_title() ) ? get_the_title() : get_permalink(); ?></a></h3>
				<?php dahz_framework_post_meta();?>
				<?php if ( $is_display_excerpt ) : ?>
					<p><?php the_excerpt(); ?></p>
					<a class="de-sc-blog__entry-morelink" href="<?php esc_attr_e( get_permalink() ); ?>"><?php esc_html_e( 'Continue Reading', 'sobari_sc' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php dahz_shortcode_render_pagination( $pagination ); ?>
</div>
<?php wp_reset_postdata();
endif;