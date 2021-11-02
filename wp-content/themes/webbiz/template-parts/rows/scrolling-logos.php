<?php

?>

<div class="scrolling-logos">
	<div class="container">
		<?php if( have_rows('details') ) : ?>
			<?php while( have_rows('details') ) : the_row(); ?>
			<?php 
				$logo = get_sub_field('logo');
				$link = get_sub_field('link');
			?>
				<div class="logo-block">
					<a href="<?= $link; ?>">
						<img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>">
					</a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
