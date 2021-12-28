<?php

get_header(); 

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			the_post();

			get_template_part( 'template-parts/rows' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
