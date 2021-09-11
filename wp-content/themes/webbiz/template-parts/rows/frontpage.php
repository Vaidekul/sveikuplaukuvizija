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

	</div>
</div>
