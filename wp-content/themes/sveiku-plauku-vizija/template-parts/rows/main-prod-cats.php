<style>
.bg-rusva {
	background: #c69a68;

}
.bg-rusva * {
	color: white !important;
}
.prod-box {
	display: flex;
  flex-direction: column;
}
.prod-box img {
	height: 300px;
  object-fit: cover;
}
.prod-box {

}
.main-prod-cats h2 {
	/* text-transform: uppercase; */
	letter-spacing: -2.5px;
}
.main-prod-cats h6 {
	width: 50%;
	text-align: center;
}

.main-prod-cats .subtitle {
	margin-top: 50px;
	text-transform: uppercase;
	font-size: 18px;
}
</style>

<?php
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
  $section_title = get_sub_field('section_title');
	$classes = $padding . ' ' . $margin;
?>

<div class="main-prod-cats bg-rusva <?= $classes; ?>">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-lg-8">
				<div class="content d-flex justify-contentr-center flex-column align-items-center">
					<h2 class="text-center" ><?= get_sub_field('title'); ?></h2>
					<div class="subtitle"><?= get_sub_field('subtitle'); ?></div>
				</div>
			</div>
		</div>
	</div>
		<?php if( have_rows('blocks') ) : ?>
			<div class="container-fluid blocks mt-5 pt-5">
				<div class="row d-flex">
				<?php while( have_rows('blocks') ) : the_row(); ?>
					<?php 
						$img = get_sub_field('image'); 
						$btn_link = get_sub_field('button_link'); 
						$btn_text = get_sub_field('button_text'); 
					?>
					<div class="col-lg-4">
						<div class="prod-box">
							<img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
							<h3><?= get_sub_field('heading'); ?></h3>
							<a href="<?= $btn_link; ?>" class="btn-cta"><?= $btn_text; ?></a>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
</div>
