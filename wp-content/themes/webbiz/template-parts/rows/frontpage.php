<?php

?>

<div class="frontpage-slider">
	<div class="side-nav">
		<div class="inner-container">
			<?php $logo = get_field('logo', 'options') ?>	
			<a class="logo" href="<?php echo home_url() ?>">
				<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
			</a>
			<button class="mobile-menu-toggle hamburger hamburger--collapse" type="button">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button> 
			<?php get_template_part('./template-parts/components/mobile-menu');  ?>
			<div class="bottom-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-3',
					//'menu_id'        => 'primary-menu',
					'menu_class'		=> 'sidenav-menu',
					'container'		 => false
				) );
				?>
			</div>
		</div>
	</div>
	<div class="slider">
	<?php if( have_rows('slides') ) : ?>
		<?php while( have_rows('slides') ) : the_row(); ?>
			<?php
				$img = get_sub_field('image');
				$img = $img['url'];
				$heading = get_sub_field('heading');
				$subheading = get_sub_field('subheading'); 
				$color = get_sub_field('color');
				$color = $color['choices']['value'];
			?>
			<div class="img-slide">
				<div class="content <?= $color; ?>" style="background-image:url(<?= $img; ?>)">
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
