<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');

	$products = get_sub_field('products');

	$args = [
    'post_type' => 'product',    
		'posts_per_page' => -1,
		'post__in' => $products,
  ];

	$query = new WP_Query($args);

  $vert_align = get_sub_field('vertical_align');
  if( $vert_align ) {
    $vert_align = 'align-items-center';
  } else {
    $vert_align = '';
  }
  
  $classes = $padding . ' ' . $margin;
?>


  <div class="products-section-row <?= $classes; ?>">
    <div class="container">
			<h2><?= get_sub_field('sec_title'); ?></h2>
			<div class="subheading"><?= get_sub_field('subheading'); ?></div>
			<div class="row">
				<?php if( $query->have_posts() ) : ?>
					<?php while( $query->have_posts() ) : $query->the_post(); ?>          
						<?php get_template_part( 'template-parts/components/card-product-rinkiniai' ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
    </div>
  </div>


	<?php wp_reset_postdata(); ?>
