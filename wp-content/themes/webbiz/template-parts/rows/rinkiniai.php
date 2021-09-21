<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
	$title = get_sub_field('title');
	$subtitle = get_sub_field('subtitle');
	$bg = get_sub_field('background_image');
	$bg = $bg['url'];
?>

<div class="rinkiniai <?= $padding . ' ' . $margin; ?>" style="background-image:url(<?= $bg; ?>);">
	<div class="container">
		<div class="content">
			<h2 class="title"><?= $title; ?></h2>
			<div class="subtitle"><?= $subtitle; ?></div>
				<?php if( have_rows('blocks') ) : ?>
					<div class="blocks d-flex justify-content-between">
					<?php while( have_rows('blocks') ) : the_row(); 
						$img = get_sub_field('image');
						$title = get_sub_field('title');
						$button_link = get_sub_field('button_link');
						$button_text = get_sub_field('button_text');
						?>
						<div class="block ">
							<div class="rinkinio-img">
								<img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
							</div>
							<h3><?= $title; ?></h3>
							<a href="<?= $button_link; ?>" class="custom-link link--arrowed black"><?= $button_text; ?>
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
				<?php endif; ?>
		</div>
	</div>
</div>
