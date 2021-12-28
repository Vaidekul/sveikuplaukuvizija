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

<?php if( $query->have_posts() ) : $i;?>
<div class="section-services <?= $padding . ' ' . $margin; ?>">
	<div class="container">
	<?php while( $query->have_posts() ) : $query->the_post(); $i++;?>          
	<?php $title = get_the_title();
		$id = strtolower($title);
		$id = str_replace(' ', '', $id);
		$img = get_field('image');
		if(!($i===1)) {
			$top_spacing = 'top-spacing';
		} else {
			$top_spacing = '';
		}
		if($i % 2 === 0) {
			$right = 'right-positioning';
		} else {
			$right = '';
		}
		?>
		

		<div class="price-list mt-5 <?= $top_spacing . ' ' . $right; ?>">
		<h2 class="pt-5" id="<?= $id; ?>"><?= $title; ?></h2>
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
			<a href="<?= get_field('registracijos_url'); ?>" target="_blank" class="mt-4 custom-link link--arrowed black">Registruotis
				<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'>
				<g fill='none', stroke='#000000', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'>
					<circle class='arrow-icon--circle', cx='16', cy='16', r='15.12'></circle>
					<path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path>
				</g>
				</svg> 
			</a>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
