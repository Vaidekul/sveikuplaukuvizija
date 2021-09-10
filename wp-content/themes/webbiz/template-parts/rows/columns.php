<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');

  $vert_align = get_sub_field('vertical_align');
  if( $vert_align ) {
    $vert_align = 'align-items-center';
  } else {
    $vert_align = '';
  }
  
  $classes = $padding . ' ' . $margin;
?>


  <div class="column-section <?= $classes; ?>">
    <div class="container">
			<h2><?= get_sub_field('sec_title'); ?></h2>
			<?php if( have_rows('columns') ) : ?>
      <div class="row justify-content-center <?= $vert_align; ?>">

        <?php while( have_rows('columns') ) : the_row(); ?>

          <?php
            // options
            $col_width = get_sub_field('column_width');
          ?>

          <div class="col-lg-<?php echo $col_width ?>">
            <?php the_sub_field('content'); ?>
          </div>

        <?php endwhile; ?>

      </div>
			<?php endif; ?>
    </div>
  </div>

