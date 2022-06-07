<?php if(is_front_page() || is_page('apie-mus')) : ?>
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
	
		<!-- <svg class="favourites-popup-toggle mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
			xmlns="http://www.w3.org/2000/svg" style="margin-top: -4px;">
			<path
				d="M20.1603 5.00017C19.1002 3.93737 17.6951 3.28871 16.1986 3.17134C14.7021 3.05397 13.213 3.47563 12.0003 4.36017C10.7279 3.4138 9.14427 2.98468 7.5682 3.1592C5.99212 3.33373 4.54072 4.09894 3.50625 5.30075C2.47178 6.50256 1.9311 8.05169 1.99308 9.63618C2.05506 11.2207 2.71509 12.7228 3.84028 13.8402L10.0503 20.0602C10.5703 20.5719 11.2707 20.8588 12.0003 20.8588C12.7299 20.8588 13.4303 20.5719 13.9503 20.0602L20.1603 13.8402C21.3279 12.6654 21.9832 11.0764 21.9832 9.42017C21.9832 7.76389 21.3279 6.1749 20.1603 5.00017V5.00017ZM18.7503 12.4602L12.5403 18.6702C12.4696 18.7415 12.3855 18.7982 12.2928 18.8368C12.2001 18.8755 12.1007 18.8954 12.0003 18.8954C11.8999 18.8954 11.8004 18.8755 11.7077 18.8368C11.615 18.7982 11.5309 18.7415 11.4603 18.6702L5.25028 12.4302C4.46603 11.6285 4.02689 10.5516 4.02689 9.43017C4.02689 8.3087 4.46603 7.23182 5.25028 6.43017C6.04943 5.64115 7.12725 5.19873 8.25028 5.19873C9.3733 5.19873 10.4511 5.64115 11.2503 6.43017C11.3432 6.52389 11.4538 6.59829 11.5757 6.64906C11.6976 6.69983 11.8283 6.72596 11.9603 6.72596C12.0923 6.72596 12.223 6.69983 12.3449 6.64906C12.4667 6.59829 12.5773 6.52389 12.6703 6.43017C13.4694 5.64115 14.5472 5.19873 15.6703 5.19873C16.7933 5.19873 17.8711 5.64115 18.6703 6.43017C19.4653 7.22132 19.9189 8.29236 19.9338 9.41385C19.9488 10.5353 19.5239 11.6181 18.7503 12.4302V12.4602Z"
				fill="white"></path>
		</svg>  -->
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
						<a class="mr-3" href="" style="margin-top: 5px;"><div class="open" style="width: 150px; color: white !important;"><?php echo do_shortcode('[smart_search id="1"]'); ?></div></a>
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
						<a class="mr-3" href="" style="margin-top: 5px;"><div class="open" style="width: 150px; color: white !important;"><?php echo do_shortcode('[smart_search id="1"]'); ?></div></a>
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
