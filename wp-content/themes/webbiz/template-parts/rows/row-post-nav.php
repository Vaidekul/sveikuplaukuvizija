<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
$blog_url = get_field('blog_url', 'option');
?>

<div class="post-navigation">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center">

              <?php if (!empty( $prev_post )): ?>
								<a class="post-arrow" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
                  <i class="fas fa-arrow-left"></i> Previous Post
								</a>
              <?php endif ?>

              <?php if($blog_url) : ?>
                <a class="btn-cta btn-accent" href="<?= $blog_url ?>">See all posts</a>
              <?php endif; ?>

              <?php if (!empty( $next_post )): ?>
								<a class="post-arrow" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                Next Post <i class="fas fa-arrow-right"></i>
								</a>
              <?php endif; ?>
              
            </div>
        </div>
    </div>
  </div>
</div>
