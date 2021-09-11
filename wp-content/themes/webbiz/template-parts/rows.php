<?php 

if( is_front_page()) {
	get_template_part( 'template-parts/rows/frontpage');
}

// if theres content in default editor
if ( get_the_content() ) {
  get_template_part( 'template-parts/rows/default-content' );
}

// layouts
get_template_part( 'template-parts/row-layouts' );


// single blog
if ( is_singular('post') ) {
  get_template_part( 'template-parts/rows/row-social-sharing' );
  get_template_part( 'template-parts/rows/row-author-box' );
  get_template_part( 'template-parts/rows/row-post-nav' );
}

