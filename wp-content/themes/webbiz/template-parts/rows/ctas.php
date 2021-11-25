<?php 

// ctas
$ctas = get_sub_field('ctas');

if( $ctas ) :
// WP_Query arguments
$args = array(
	'post_type'              => array( 'cta' ),
  'posts_per_page'         => '-1',
  'post__in'               => $ctas
);

// The Query
$query = new WP_Query( $args );

?>

<?php if ( $query->have_posts() ) : ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    

  <?php get_template_part( 'template-parts/row-layouts' ); ?>
    
  <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
<?PHP endif; ?>
