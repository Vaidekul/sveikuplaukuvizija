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
        <a href="https://www.sveikuplaukuvizija.lt/produktas/dyson-airwrap-complete-nickel-fuschia/" target="blank">
          <div class="py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_01.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_01_mob.jpg">
                  <a class="fancybox-media" href="https://www.youtube.com/watch?v=ukTOJ-74BaI">
                  <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                </div>
              </div>
            </div>
          </div></a>
          <div class="py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_02.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_02_mob.jpg">
                  
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          <div class="py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-12 index-pad-3">
                  <h1 class="text-center pad-b"><b>Antgaliai</b></h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 matrix">
                  <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/i1.jpg">
                  <div class="txt-c-in">
                    <p class="lead pad-b"><b>30 mm „Airwrap™“ cilindriniai antgaliai </b></p>
                    <p class="para-2">Formuoja ir sutvirtina didelės apimties garbanas. Skirtingų krypčių (pagal ir prieš laikrodžio rodyklę) cilindriniai antgaliai simetriškoms garbanoms formuoti. </p>
                  </div>
                </div>
                <div class="col-md-4 matrix">
                  <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/i2.jpg">
                  <div class="txt-c-in">
                    <p class="lead pad-b"><b>40 mm „Airwrap™“ cilindriniai antgaliai </b></p>
                    <p class="para-2">Formuoja ir sutvirtina lengvas garbanas ar bangas. Skirtingų krypčių (pagal ir prieš laikrodžio rodyklę) cilindriniai antgaliai simetriškoms garbanoms formuoti. </p>
                  </div>
                </div>
                <div class="col-md-4 matrix">
                  <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/i3.jpg">
                  <div class="txt-c-in">
                    <p class="lead pad-b"><b>Kietas tiesinimo šepetys </b></p>
                    <p class="para-2">Sukuria tiesių ir glotnių plaukų įvaizdį, gerai suvaldo garbanotas ir nepaklusnias sruogas. Kieti šepečio šereliai sukurti suvaldyti nepaklusnius, pūstis linkusius plaukus. </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 matrix">
                  <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/i4.jpg">
                  <div class="txt-c-in">
                    <p class="lead pad-b"><b>Minkštas tiesinimo šepetys </b></p>
                    <p class="para-2">Sukuria nepriekaištingą tiesių ir glotnių plaukų įvaizdį. Minkšti užapvalinti šerelių galiukai yra ypatingai švelnūs galvos odai.</p>
                  </div>
                </div>
                <div class="col-md-4 matrix">
                  <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/i5.jpg">
                  <div class="txt-c-in">
                    <p class="lead pad-b"><b>Apvalus apimtį suteikiantis šepetys </b></p>
                    <p class="para-2">Šis šepetys nukreipia orą į plaukus, taip sutankinant juos, o šereliai įtempia plaukus ir džiovinant juos formuoja. </p>
                  </div>
                </div>
                <div class="col-md-4 matrix">
                  <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/i6.jpg">
                  <div class="txt-c-in">
                    <p class="lead pad-b"><b>Džiovinimo antgalis </b></p>
                    <p class="para-2">Išdžiovina plaukus nuo šlapių iki drėgnų, paruošia formavimui. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="py-5" style="margin-top:0px;background:black;">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_05.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_05_mob.jpg">
                  <a class="fancybox-media" href="https://www.youtube.com/watch?v=X1kQFJcKEaM">
                  <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="py-5" style="margin-top:0px;background:black;">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_06.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_06_mob.jpg">
                  <a class="fancybox-media" href="https://www.youtube.com/watch?v=e8YAVTn96Qs">
                  <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="py-5" style="margin-top:0px;background:black;">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_07.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/aw/aw_07_mob.jpg">
                  <a class="fancybox-media" href="https://www.youtube.com/watch?v=mI6YB4VFu_4">
                  <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="py-5" id="lp-dsn_s">
            <div class="container">
              <div class="row">
                <div class="col-md-12 index-pad-3">
                  <h1 class="text-center pad-b"><b></b></h1><br>
                  <div class="row"><a href="https://www.sveikuplaukuvizija.lt/produktas/dyson-airwrap-complete-nickel-fuschia/" class="btn btn-primary topup maxw">Pirkti</a></div>
                </div>
              </div>
              
            </div>
          </div>
          
        </div>
        
        
        
        
        
        
        
        
      </div>
      
    </div>
  </div></div>
</body>
</html>
<?php
get_footer();
