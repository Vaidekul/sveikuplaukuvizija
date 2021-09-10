<div class="header-container">
  <?php $logo = get_field('logo', 'options') ?>	
  <a class="logo" href="<?php echo home_url() ?>">
    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
  </a>

  <?php
    wp_nav_menu( array(
      'theme_location' => 'menu-1',
      //'menu_id'        => 'primary-menu',
      'menu_class'		=> 'd-none d-lg-flex primary-menu',
      'container'		 => false
    ) );
    ?>

  <button class="mobile-menu-toggle hamburger hamburger--collapse d-lg-none" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button> 
</div>