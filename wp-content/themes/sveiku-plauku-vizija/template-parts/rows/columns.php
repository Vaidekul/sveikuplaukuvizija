<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
  $section_title = get_sub_field('section_title');
	$icons = get_sub_field('icons');
  $vert_align = get_sub_field('vertical_align');
  if( $vert_align ) {
    $vert_align = 'align-items-center';
  } else {
    $vert_align = '';
  }
  $classes = $padding . ' ' . $margin;
?>

<?php if( have_rows('columns') ) : ?>
  <div class="column-section <?= $classes; ?>">
    <div class="container">
			<?php if($section_title) : ?>
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<h2 class="section-title clm-title"><?= $section_title; ?></h2>
					</div>
				</div>
			<?php endif; ?>
      <div class="row justify-content-center <?= $vert_align; ?>">
        <?php while( have_rows('columns') ) : the_row(); ?>

          <?php
            $icon = get_sub_field('icon');
            $col_width = get_sub_field('column_width');
          ?>

          <div class="mt-5 col-lg-<?php echo $col_width; ?>">
						<?php if($icons) : ?>
							<img class="icon" src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
						<?php endif; ?>
            <?php the_sub_field('content'); ?>
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  </div>
<?php endif; ?>

