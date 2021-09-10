<?php 
// rows
while (have_rows('rows')) {
  the_row();

  if( get_row_layout() === 'columns' ) {
    get_template_part( 'template-parts/rows/columns' );
  } elseif( get_row_layout() === 'cta' ) {
    get_template_part( 'template-parts/rows/ctas' );
  } elseif( get_row_layout() === 'blog' ) {
    get_template_part( 'template-parts/rows/blog' );
  }
}