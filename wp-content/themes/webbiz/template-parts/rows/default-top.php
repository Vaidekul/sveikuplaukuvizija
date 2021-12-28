<?php
	$bg_img = get_field('background_image');
	$bg_img = $bg_img['url'];
	$heading = get_field('heading');
	$subheading = get_field('subheading');
	$disable = get_field('disable');
	$small = get_field('small');
	$small ? $small = 'small' : '';
	$small ? $container = 'container' : '';
	$paslaugos = get_field('paslaugos');
	if($paslaugos) {
  $args = [
    'post_type' => 'paslauga',
    'posts_per_page' => -1,
  ];
	}
  $query = new WP_Query($args);
	
?>
<?php if(!$disable) : ?>
<div class="default-top <?= $small; ?>" style="background-image:url(<?= $bg_img; ?>);">
	<div class="content <?= $container; ?>">
		<h1><?= $heading; ?></h1>
		<div class="subheading">
			<?= $subheading; ?>
			<?php if( $query->have_posts() ) : ?>
				<div class="sub-filters ">
					<?php while( $query->have_posts() ) : $query->the_post(); ?>          
						<?php $title = get_the_title();
						$id = strtolower($title);
						$id = str_replace(' ', '', $id);
						?>
					<div class="filter">
						<a class="" href="#<?= $id; ?>"><?= $title ?></a>
					</div>
					<?php endwhile; ?>
				</div>
			<?php endif;?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php else : ?>
	<div class="top pt-5 mt-5"></div>
<?php endif; ?>
