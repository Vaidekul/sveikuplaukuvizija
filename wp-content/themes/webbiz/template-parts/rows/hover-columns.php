<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');

?>

<div class="hover-columns <?= $padding . ' ' . $margin; ?>">
	<div class="container-fluid">
	<?php if( have_rows('columns') ) : $i=200;?>
		<div class="columns">
			<?php while( have_rows('columns') ) : the_row(); $i+=200;?>
			<?php 
				$bg = get_sub_field('background_image'); 
				$bg = $bg['url'];
				$content = get_sub_field('content');
			?>
			<div class="column" data-aos="fade-left" data-aos-duration="<?= $i; ?>" >
			<div class="img" style="background-image:url(<?= $bg; ?>); "></div>
				<div class="content" data-aos="fade-up">
					<?= $content; ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	</div>
</div>
