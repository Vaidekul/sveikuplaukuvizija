<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
  $per_load = get_sub_field('per_load');
  if( !$per_load ) {
    $per_load = 4;
  }

  $args = [
    'post_type' => 'post',    
    'posts_per_page' => $per_load
  ];

  $query = new WP_Query($args);
  $found_posts = $query->found_posts;
?>

<?php if( $query->have_posts() ) : ?>
  <div data-per-page="<?= $per_load; ?>" class="blog-section <?= $padding . ' ' . $margin; ?>">
    <div class="container">
      <div class="row justify-content-center posts-container">

        <?php while( $query->have_posts() ) : $query->the_post(); ?>          
          <?php get_template_part( 'template-parts/components/card-blog' ); ?>
        <?php endwhile; ?>

      </div>

      <?php if( $found_posts > $per_load ) : ?>
        <div class="load-more-posts-container text-center pt-5 pb-5">
            <button class="btn-cta" data-page="2" id="load-more-posts">Load More</button>
        </div>
      <?php endif; ?>

    </div>
  </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>