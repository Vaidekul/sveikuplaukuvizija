<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kitring
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/json/manifest.json' );?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Roboto+Slab:wght@100;200;300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="preload">
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Roboto+Slab:wght@100;200;300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<script>
	jQuery(document).ready(function($){
		$('.de-social-accounts__icon').attr('target','_blank')
	})
	</script>
</head>

<body <?php body_class();?>>
<div class="uk-offcanvas-content">
	<div <?php 

		dahz_framework_set_attributes( 
			array( 
				'class' => array( 'de-page-container ' . dahz_classes() .'' ),
				'id'	=> 'page',
			),
			'page_container'
	);?>>
		<div <?php dahz_framework_set_attributes( 
			array( 
				'class' => array( 'page-wrapper' ),
			), 
			'page' 
		);?>>
			<?php do_action( 'dahz_framework_before_header' ); ?>
			<div id="de-site-header" class="de-site-header <?php echo dahz_classes('ds-site-header') ?>">
				<?php do_action( 'dahz_framework_header' ); ?>
			</div>
			<?php
				
				$enable_breadcrumb = dahz_framework_get_option( 'general_breadcrumbs_on_post', false );
				if ( is_singular( 'post' ) && $enable_breadcrumb ) {

			?>
				<div class="ds-site-content__header uk-first-column">
					<div class="ds-site-content__header ds-site-content__header--wrapper">
						<div class="ds-site-content__header ds-site-content__header--wrapper-inner">
							<?php 
								$breadcrumbsArgs = array(
									'show_browse'     => false,
								);

								breadcrumb_trail($breadcrumbsArgs);
							?>
						</div>
					</div>
				</div>
				<?php
				}
			?>
			<?php do_action( 'dahz_framework_before_content' ); ?>
			<div <?php dahz_framework_set_attributes( 
				array( 
					'class' 					=> array( 'main de-content__wrapper', ( ( class_exists('WooCommerce') && is_product() ) ? '' : 'uk-section' ), dahz_classes('ds-site-content') ),
					'id'						=> 'de-content-wrapper',
					'data-uk-height-viewport'	=> array( 'expand:true;' )
				),
				'main'
			);?>>
			