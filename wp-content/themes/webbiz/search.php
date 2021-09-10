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

			<div class="row">
				
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
					<?php
						if( have_posts() ) {
							while( have_posts() ) {
								the_post();

								echo "<p><a href='". get_the_permalink() ."'>". get_the_title() ."</a></p>";
							}
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
