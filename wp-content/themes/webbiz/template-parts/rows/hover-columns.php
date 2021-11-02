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
			<div class="column-txt">
				<a href="<?= $button_link; ?>" class="custom-link link--arrowed black">Visos paslaugos
					<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'>
					<g fill='none', stroke='#000000', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'>
						<circle class='arrow-icon--circle', cx='16', cy='16', r='15.12'></circle>
						<path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path>
					</g>
					</svg> 
				</a>
			</div>
		</div>
	<?php endif; ?>
	</div>
</div>
