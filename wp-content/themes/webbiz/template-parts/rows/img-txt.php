<?php
	// options
	$padding = get_sub_field('section_padding');
	$margin = get_sub_field('section_margin');
	$txt = get_sub_field('content');
	$img = get_sub_field('image');
?>

<div class="img-txt">
	<div class="container">
		<div class="row">
			<div class="col-lg-7"><div class="content"><?= $txt; ?></div></div>
			<div class="col-lg-5"><div class="img-contai"><img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>"></div></div>
		</div>
	</div>
</div>
