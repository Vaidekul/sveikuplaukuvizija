<?php 
// rows
while (have_rows('rows')) {
  the_row();

  if( get_row_layout() === 'columns' ) {
    get_template_part( 'template-parts/rows/columns' );
  } elseif( get_row_layout() === 'main_prod_cats' ) {
    get_template_part( 'template-parts/rows/main-prod-cats' );
	}
}
