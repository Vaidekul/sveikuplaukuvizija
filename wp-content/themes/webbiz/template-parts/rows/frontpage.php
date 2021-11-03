<?php

?>

<div class="frontpage-slider">
	
	<div class="slider">
	<?php if( have_rows('slides') ) : ?>
		<?php while( have_rows('slides') ) : the_row(); ?>
			<?php
				$img = get_sub_field('image');
				$img = $img['url'];
				$heading = get_sub_field('heading');
				$subheading = get_sub_field('subheading'); 
				$color = get_sub_field('color');
			?>
			<div class="img-slide">
				<div class="content <?php echo esc_attr($color['value']); ?>" style="background-image:url(<?= $img; ?>)">
					<?php if($heading) : ?>
						<h1 class="heading"><?= $heading; ?></h1>
					<?php endif; ?>
					<?php if($subheading) : ?>
						<div class="subheading"><?= $subheading; ?></div>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>
