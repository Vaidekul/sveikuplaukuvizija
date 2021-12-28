<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webbiz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<!-- <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> -->
	<!-- <script src="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Roboto+Slab:wght@100;200;300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet"> -->
	
	<?php wp_head(); ?>
	<?= get_field('scripts_content' , 'options'); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'webbiz' ); ?></a>
	
	<!-- Absolute header -->
	<header id="masthead" class="site-header masthead">

		<div class="header-cart-count counter"></div>
		
		<?php get_template_part('./template-parts/components/header-content'); ?>

	</header>

	<!-- Floating header -->
	<header id="masthead-floating" class="site-header masthead">

		<?php get_template_part('./template-parts/components/header-content-floating'); ?>

	</header>

	<?php 
	// Mobile meenu
	get_template_part('./template-parts/components/mobile-menu-real'); 
	// search window
	//get_template_part('./template-parts/components/search-window') 
	// get_template_part('./template-parts/components/header-content');
	?>

	<div id="content" class="site-content">

