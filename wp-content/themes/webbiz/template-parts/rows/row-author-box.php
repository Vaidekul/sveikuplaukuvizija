<?php 
  $avatar_url = get_avatar_url($post);
?>


<div class="row-author-box">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div class="d-flex content">

          <div class="author-box">
            <div class="photo" style="background-image: url(<?= $avatar_url; ?>)">
            </div>
          </div>

          <div class="info">
            <h3 class="name"><?= get_the_author_meta('display_name'); ?></h3>
            <p class="desc"><?= get_the_author_meta('user_description'); ?></p>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>