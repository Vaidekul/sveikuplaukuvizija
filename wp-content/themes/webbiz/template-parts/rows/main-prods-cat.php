<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
	$title = get_sub_field('title');
	$subtitle = get_sub_field('subtitle');
	$products = get_sub_field('products');

	$args = [
    'post_type' => 'product',    
		'posts_per_page' => -1,
		'post__in' => $products,
  ];

	$query = new WP_Query($args);
?>

<div class="main-prod-cat <?= $padding . ' ' . $margin; ?>">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-lg-3">
				<h2 class="title"><?= $title; ?></h2>
				<div class="subtitle"><?= $subtitle; ?></div>
			</div>
			<?php if( $query->have_posts() ) : ?>
			<div class="col-lg-9">
				<div class="slider">
					<?php while( $query->have_posts() ) : $query->the_post(); ?>          
						<?php get_template_part( 'template-parts/components/card-product' ); ?>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php wp_reset_postdata(); ?>
