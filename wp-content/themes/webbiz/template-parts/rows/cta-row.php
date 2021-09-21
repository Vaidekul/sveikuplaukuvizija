<?php
	$bg = get_sub_field('background_image');
	$heading = get_sub_field('heading');
	$subheading = get_sub_field('subheading');
	$form = get_sub_field('form');
?>

<div class="cta-subscribe" style="background-image:url(<?= $bg['url']; ?>);">
	<div class="container">
		<div class="cta">
			<div class="content">
				<h2 class="heading"><?= $heading; ?></h2>
				<div class="subheading"><?= $subheading; ?></div>
				<div class="form">
					<?= $form; ?>
				</div>
			</div>
		</div>
	</div>
</div>
