<?php

?>

<div class="scrolling-logos">
	<div class="container">
		<?php
			$args = [
				'post_type' => 'prekiuzenklai',    
				'posts_per_page' => -1
			];

			$query = new WP_Query($args);
		?>
		<?php if( $query->have_posts() ) : ?>
			<?php while( $query->have_posts() ) : $query->the_post(); ?>          
				<div class="logo-block">
					<a href="<?php the_permalink(); ?>">
					<?php 
						if( get_the_post_thumbnail_url() ) {
							$logo = get_the_post_thumbnail_url();
						}
					?>
						<img src="<?= $logo; ?>" alt="prekiu-zenklai-logo">
					</a>
				</div>
      <?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php wp_reset_postdata(); ?>
