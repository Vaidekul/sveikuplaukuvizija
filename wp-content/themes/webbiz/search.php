<?php
/**
 * Search result template 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webbiz
 */

get_header(); ?>

	<div id="primary" class="content-area search-page">
		<main id="main" class="site-main">

		<div class="container padding-med">

			<div class="row justify-content-center">
				
				<div class="col-sm-12 col-md-10">
					
					<h1 class="page-title text-center pt-5 pb-5">
						<?php printf( esc_html__( 'Jūsų paieškos rezultatai: %s', 'webbiz' ), '</br><span class="uppercase"">' . get_search_query() . '</span>' ); ?>
					</h1>
						

					<?php
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post(); ?>
 
	
							<?php $bg = get_the_post_thumbnail_url(); $price = $product->get_price(); 
								if($price) {
								$show = 'd-block';
								} else {
								$show = 'd-none';
								}?>
							
							<?php echo "<div class='search-pr-block d-flex'><img src='" . $bg . "' alt='product'><div class='text'><h2><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h2><div class='price" . " " . $show . "'>". $price ."€</div><div>" . wb_excerpt_limit(30) . "</div></div></div>";
								
							}
							the_posts_navigation();
						} else {
							echo "<h4 class='text-center'>Sorry, no content to show...</h4>";
						}
					?>
				</div>

			</div>

			
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
