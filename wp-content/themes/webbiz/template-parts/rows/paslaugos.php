<?php
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
	$paslauga = get_sub_field('paslauga');

  $args = [
    'post_type' => 'paslauga',
    'posts_per_page' => -1,
  ];

  $query = new WP_Query($args);
?>

<?php if( $query->have_posts() ) : ?>
<div class="section-services <?= $padding . ' ' . $margin; ?>">
	<div class="container">
	<?php while( $query->have_posts() ) : $query->the_post(); ?>          
	<?php $title = get_the_title();
		$id = strtolower($title);
		$id = str_replace(' ', '', $id);
		$img = get_field('image');
		?>
		
		<h2 class="pt-5" id="<?= $id; ?>"><?= $title; ?></h2>
		<div class="price-list pt-5">
		<img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>" class="position-right">
			<?php if( have_rows('kainos') ) : ?>
				<?php while( have_rows('kainos') ) : the_row(); ?>
					<div class="price-row d-flex">
						<div class="left">
							<div class="title"><?= get_sub_field('pavadinimas'); ?></div>
							<div class="time"><?= get_sub_field('laikas'); ?></div>
						</div>
						<div class="decoration"></div>
						<div class="price"><?= get_sub_field('kaina'); ?></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
