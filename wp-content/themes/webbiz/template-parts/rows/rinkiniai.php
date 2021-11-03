<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
	$title = get_sub_field('title');
	$subtitle = get_sub_field('subtitle');
	$bg = get_sub_field('background_image');
	$bg = $bg['url'];
?>

<!-- <div class="rinkiniai <?= $padding . ' ' . $margin; ?>" style="background-image:url(<?= $bg; ?>);"> -->
<div class="rinkiniai <?= $padding . ' ' . $margin; ?>">
	<div class="container">
		<div class="row position-relative ">
			<!-- <div class="col-lg-8"> -->
				<h2 class="title word" data-aos="fade-up"><?= $title; ?></h2>
				<!-- <div class="subtitle"></div> -->
			<!-- </div> -->
		</div>
		<div class="row ">
			<?php if( have_rows('blocks') ) : $i=0;  $j=200; ?>
				<!-- <div class="blocks d-flex justify-content-between"> -->
				<?php while( have_rows('blocks') ) : the_row(); $i++; $j+=400;
					$img = get_sub_field('image');
					$title = get_sub_field('title');
					$button_link = get_sub_field('button_link');
					$button_text = get_sub_field('button_text');
					if($i == 1 || $i == 4) {
						$size = 7;
					} else {
						$size = 5;
					}

					?>
					<div data-aos="fade-up" data-aos-easing="ease"  data-aos-delay="300" data-aos-duration="<?= $j; ?>" class="block pt-4 col-lg-<?= $size; ?> col-md-6">
						<div class="rinkinio-img">
							<img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
						</div>
						<div class="content">
							<h3><?= $title; ?></h3>
							<a href="<?= $button_link; ?>" class="custom-link link--arrowed white"><?= $button_text; ?>
								<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'>
								<g fill='none', stroke='#ffffff', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'>
									<circle class='arrow-icon--circle', cx='16', cy='16', r='15.12'></circle>
									<path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path>
								</g>
								</svg> 
							</a>
						</div>
					</div>
				<?php endwhile; ?>
				<!-- </div> -->
			<?php endif; ?>
		</div>
	</div>
</div>
