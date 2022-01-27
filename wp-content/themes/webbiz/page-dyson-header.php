<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webbiz
 */

get_header(); ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dyson-css/main.css" type="text/css">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/jquery.fancybox.css" type="text/css" media="screen">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/jquery.fancybox.pack.js"></script>
    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/helpers/jquery.fancybox-media.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dyson-class/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript">
    beforeShow: function(){
    $("body").css({'overflow-y':'hidden'});
    },
    afterClose: function(){
    $("body").css({'overflow-y':'visible'});
    }
    </script>
    <script type="text/javascript">
    /*replacing <i> for robots to <a> for users*/
      $('.fancybox-media').fancybox({
          openEffect : 'none',
          closeEffect : 'none',
          helpers : {
          media : {}
          }
        });
        $(document).ready(function () {
          
      $("i.must_be_href[title]").each(function(){
      var title = $(this).attr("title");
      if (title.indexOf('/goods') == 0 || title.indexOf('/clickBanner') == 0) {
      $(this).replaceWith("<a href='" + title + "' target='_blank' class='"+$(this).attr("class")+"'>"+$(this).html()+"</a>");
      } else {
      $(this).replaceWith("<a href='" + title + "' class='"+$(this).attr("class")+"'>"+$(this).html()+"</a>");
      }
      });
      /*
      */
      
      });
      </script>
	</head>
    <body >
      <div id="lp-dsn" class="dsn-all dyson-header">
        <nav class="navbar navbar-inverse navbar-expand-md navbar-dark bg-primary">
                    <div class="container">
													<div class="nav-fix" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
															<?php 
																$index = get_permalink( get_page_by_path( 'dyson' ) );
																$air = get_permalink( get_page_by_path( 'dyson-airwrap' ) );
																$super = get_permalink( get_page_by_path( 'dyson-supersonic' ) );
																$corr = get_permalink( get_page_by_path( 'dyson-corrale' ) );
																?>

                                <!-- <a href="page-dyson.php"><img class="navbar-brand" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/logo.jpg"></a> -->
                                <a href="<?=  $index; ?>"><img class="navbar-brand" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/logo.jpg"></a>
                                
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="page-dyson-airwrap.php">Dyson Airwrap™</a> -->
                                    <a class="nav-link" href="<?= $air; ?>">Dyson Airwrap™</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $super; ?>">Dyson Supersonic™</a>
                                    <!-- <a class="nav-link" href="page-dyson-supersonic.php">Dyson Supersonic™</a> -->
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $corr; ?>">Dyson Corrale™</a>
                                    <!-- <a class="nav-link" href="page-dyson-corrale.php">Dyson Corrale™</a> -->
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
        
  
        
        
        
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="<?= $corr; ?>">
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/hc/hc_01.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/hc/hc_01_mob.jpg">
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="<?= $air; ?>">
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/hc/hc_02.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/hc/hc_02_mob.jpg">
                </a>
                
              </div>
            </div>
          </div>
        </div>
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="<?= $super; ?>">
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/hc/hc_03.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/hc/hc_03_mob.jpg">
                </a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      
    </body>
  </html>
	<?php
get_footer();
