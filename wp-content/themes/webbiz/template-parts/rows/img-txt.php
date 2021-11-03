<?php
	// options
	$padding = get_sub_field('section_padding');
	$margin = get_sub_field('section_margin');
	$txt = get_sub_field('content');
	$img = get_sub_field('image');
?>

<div class="img-txt <?= $padding . ' ' . $margin; ?>">
	<div class="container">
		<div class="row">
			<div data-aos="fade-up" data-aos-easing="ease"  data-aos-delay="300" data-aos-duration="200" class="col-lg-7 col-md-6 pt-4 column"><div class="content"><?= $txt; ?></div></div>
			<div data-aos="fade-up" data-aos-easing="ease"  data-aos-delay="300" data-aos-duration="400" class="col-lg-5 col-md-6 pt-4 column"><div class="img-container" style="background-image:url(<?= $img['url']; ?>);"></div></div>
		</div>
	</div>
</div>
