<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webbiz
 */

 $img = get_field('logo_footer', 'options');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<?= get_field('footer_script', 'options'); ?>
		<div class="footer-container pb-3">
			<div class="container">
				<div class="row d-fex mb-5">
					<div class="col-lg-5 col-m4-6 mb-3 d-flex flex-column">
						<h4 class="footer-title">Kontaktai</h4>
							<a class="mr-4 phone-link" href="tel:<?= get_field('phone', 'option'); ?>"> <?= get_field('phone_decorated', 'option'); ?></a>
							<a class="mr-4 email-link" href="mailto:<?= get_field('email', 'option'); ?>"> <?= get_field('email', 'option'); ?></a>
							<a class="address"><?= get_field('address', 'option'); ?></a>
							<?php webbiz_social_function(); ?>
							<div class="copy-right mt-5">&copy; SPV - Sveikų Plaukų Vizija 2014 - <?php echo date('Y'); ?> </div>
					</div>
					<div class="col-lg-3 col-md-6 mb-3 mt-3">
						<h4 class="footer-title">Sveikų Plaukų Vizija</h4>
							<?php 
								wp_nav_menu( array(
									'theme_location' => 'menu-4',
									'menu_class'		=> 'footer-menu',
									'container'		 => false
								) );
							?>
					</div>
					<div class="col-lg-2 col-md-6 mb-3 mt-3">
						<h4 class="footer-title">Darbo Laikas</h4>
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'menu-5',
								'menu_class'		=> 'footer-menu',
								'container'		 => false
							) );
						?>
					</div>
					<div class="col-lg-2 col-md-6 mb-3 mt-3">
						<h4 class="footer-title">Informacija</h4>
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'menu-6',
								'menu_class'		=> 'footer-menu',
								'container'		 => false
							) );
						?>
					</div>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
