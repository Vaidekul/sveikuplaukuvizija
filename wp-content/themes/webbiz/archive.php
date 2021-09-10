<?php
/**
 * Archive template 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webbiz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="container padding-med">
			<div class="row row-posts">
				<?php
					if( have_posts() ) {
						while( have_posts() ) {
							the_post();

							get_template_part( '/template-parts/components/card-blog' );
						}
					} else {
						echo "<div class='col-12'><h4 class='text-center'>Sorry, no content to show...</h4></div>";
					}
				?>
			</div> <!-- row -->

			<?php 
				$count = wp_count_posts();
				$count = $count->publish;
			?>

			<?php if( $count > get_option('posts_per_page') ) : ?>
			<div class="row padding-min load-more-button-container">
				<div class="col-12 text-center">
				<button 
						class="btn-cta orange load-more-content"
						data-posts-per-page="<?php echo get_option('posts_per_page') ?>"
						data-content-type="posts"
						data-offset="<?php echo get_option('posts_per_page') ?>"
						data-container-class="row-posts">
						Load More</button>
				</div>
			</div>
			<?php endif; ?>
		
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
