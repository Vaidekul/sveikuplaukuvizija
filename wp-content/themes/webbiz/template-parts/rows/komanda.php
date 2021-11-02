<?php
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');

  $args = [
    'post_type' => 'komanda',    
    'posts_per_page' => -1
  ];

  $query = new WP_Query($args);
?>

<?php if( $query->have_posts() ) : ?>
<div class="team-members <?= $padding . ' ' . $margin; ?>">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-lg-8" style="min-height:400px;">
				<div class="text">
					<h2>Susipažinkite su mūsų komanda</h2>
					<p>Mūsų meistrai nuolatos tobulinasi įvairiuose seminaruose, mokymuose. Nuolatos ieško individualaus geriausio sprendimo Jūsų plaukams.</p>
				</div>
			</div>
			<?php while( $query->have_posts() ) : $query->the_post(); ?>          
			<?php 
				$img = get_field('image');
			?>
			<div class="col-lg-4 col-md-6 member-block">
				<div class="flip-box">
					<div class="flip-box-inner">
						<div class="flip-box-front">
							<img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
						</div>
						<div class="flip-box-back">
							<div class="content">
								<h3><?= get_field('vardas_pavarde');?></h3>
								<div class="desc"><?= get_field('aprasymas'); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
