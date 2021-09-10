<?php
  // options
  $padding = get_field('section_padding');
  $margin = get_field('section_margin');
?>

<section class="<?= $padding . ' ' . $margin; ?>">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>