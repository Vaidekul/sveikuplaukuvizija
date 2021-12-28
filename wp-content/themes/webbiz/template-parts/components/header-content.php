<?php if(is_front_page() || is_page('474')) : ?>
<div class="side-nav d-none d-md-flex">
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
	
		<div class="bottom-nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-3',
				//'menu_id'        => 'primary-menu',
				'menu_class'		=> 'sidenav-menu',
				'container'		 => false
			) );
			?>
			<?php webbiz_social_function(); ?>
		</div>
	</div>
	<?php get_template_part('./template-parts/components/mobile-menu');  ?>
</div>
<header id="header" class="header navbar-light d-sm-block d-md-none">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="header-container">
					<?php $logo = get_field('logo', 'options') ?>
					<a class="logo" href="<?php echo home_url() ?>">
						<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
					</a>

					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-2',
						'menu_class'    => 'd-none d-lg-flex primary-menu',
						'container'     => false
					));
					?>
					<div class="shopping-tabs  d-lg-none">
						<?php $shop_cart = get_field('shopping_cart_url', 'options'); ?>
						<a href="<?= $shop_cart; ?>"><i class="fas fa-shopping-bag"></i></a>
						<button class="mobile-menu-toggle-2 hamburger hamburger--collapse" type="button">
							<img class="open" src="<?php echo get_template_directory_uri(); ?>/images/dist/menu-close.svg" />
							<img class="closed" src="<?php echo get_template_directory_uri(); ?>/images/dist/menu-open.svg" />
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php else: ?>
<header id="header" class="header navbar-light bg-black">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="header-container">
					<?php $logo = get_field('logo', 'options') ?>
					<a class="logo" href="<?php echo home_url() ?>">
						<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
					</a>

					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-2',
						'menu_class'    => 'd-none d-lg-flex primary-menu',
						'container'     => false
					));
					?>

					<div class="shopping-tabs d-lg-none">
						<?php $shop_cart = get_field('shopping_cart_url', 'options'); ?>
						<a href="<?= $shop_cart; ?>"><i class="fas fa-shopping-bag"></i></a>
						<button class="mobile-menu-toggle-2 hamburger hamburger--collapse " type="button">
							<img class="open" src="<?php echo get_template_directory_uri(); ?>/images/dist/menu-close.svg" />
							<img class="closed" src="<?php echo get_template_directory_uri(); ?>/images/dist/menu-open.svg" />
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php endif; ?>
