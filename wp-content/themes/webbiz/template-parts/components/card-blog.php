<div class="col-md-4">
  <div class="card-blog">	
    <?php 
      $terms = get_the_terms($post, 'category');
      
      if($terms) :
        echo "<div class='categories'>";
          foreach($terms as $term) : 
            $link = get_term_link($term->term_id);
            echo "<a href='". $link ."'><i class='fa fa-tag'></i> ". $term->name ."</a>";
          endforeach;
        echo "</div>";
      endif;
    ?>
    <a class="post-link" href="<?php the_permalink(); ?>">
      <div class="thumbnail">
        <?php 
          $bg = get_field('backup_img', 'option');
          $bg = $bg['url'];
          if( get_the_post_thumbnail_url() ) {
            $bg = get_the_post_thumbnail_url();
          }
        ?>

        <div class="bg" style="background-image: url(<?php echo $bg ?>)"></div>

        <div class="date"><i class="fa fa-calendar"></i> <?php the_time('d M Y') ?></div>
      </div>
      <div class="post-detail">
        <p class="title"><?php the_title(); ?></p>
      </div>
    </a>
  </div>
</div>
