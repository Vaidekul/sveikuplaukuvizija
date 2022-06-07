<?php
/**
 * Search result template 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webbiz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="container padding-med">

			<div class="row justify-content-center">
				
				<div class="col-sm-12 col-md-10">
					
				<?php	if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title text-center pt-5 pb-5"><?php printf( esc_html__( 'Jūsų paieškos rezultatai: %s', 'webbiz' ), '</br><span class="uppercase"">' . get_search_query() . '</span>' ); ?></h1>
					</header>

					<?php while ( have_posts() ) : the_post(); ?>

					post

						<article id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header d-flex">
								<?php 
									if( get_the_post_thumbnail_url() ) {
										$bg = get_the_post_thumbnail_url();
									}
								?>
								<?php if($bg) : ?>
							<div class="thumbnail">
								<img src="<?= $bg; ?>" alt="product">
							</div>
							<?php endif; ?>
							<div class="text">
								<?php $price = $product->get_price(); ?>
								<div class="entry-summary">
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									<?php if($price) : ?>
									<div class="price pt-2 pb-2"><?= $price; ?>€</div>
									<?php else : ?>
									<a class="d-block pt-2 pb-2 price" href="<?= esc_url( get_permalink() ); ?>" class="btn-to-page">Plačiau</a>
									<?php endif; ?>
									<?php echo wb_excerpt_limit(30); ?>
								</div>
							</div>
							

							</header>
						
						</article><!-- #post-## -->

					<?php endwhile;

					the_posts_navigation();

					else :

					echo "Nerasta";

				endif; ?>

				</div>

			</div>

			
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();


