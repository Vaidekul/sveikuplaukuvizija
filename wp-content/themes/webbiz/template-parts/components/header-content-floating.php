<header id="header" class="header navbar-light masthead-floating">	
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
