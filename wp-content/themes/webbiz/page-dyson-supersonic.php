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
                                    <!-- <a class="nav-link" href="page-dyson-airwrap.php">Dyson Airwrap???</a> -->
                                    <a class="nav-link" href="<?= $air; ?>">Dyson Airwrap???</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $super; ?>">Dyson Supersonic???</a>
                                    <!-- <a class="nav-link" href="page-dyson-supersonic.php">Dyson Supersonic???</a> -->
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $corr; ?>">Dyson Corrale???</a>
                                    <!-- <a class="nav-link" href="page-dyson-corrale.php">Dyson Corrale???</a> -->
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
        <a href="https://www.sveikuplaukuvizija.lt/parduotuve/?min_price=390&max_price=400&filter_gamintojas=dyson" target="blank">
          <div class="py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  
                  <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_01.jpg">
                  <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_01_mob.jpg">
                  <a class="fancybox-media" href="https://www.youtube.com/watch?v=zd7UjZ1SUk8">
                  <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                </div>
              </div>
            </div>
          </div>
        </a>
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_02.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_02_mob.jpg">
                
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="text-center pad-b">Magnetiniai plauk?? formavimo antgaliai</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_13.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b">???Flyaway??? antgalis</p>
                  <p class="para-2">Tobulas antgalis glotni?? ir tiesi?? plauk?? ??ukuosenoms arba bangoms formuoti. Paslepia nepaklusnias sruogas po ilgesn??mis sruogomis, taip gaunama lygi??, ??vilgan??i?? plauk?? i??vaizda1. Tiesiog su oru.</p>
                </div>
              </div>  <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_17.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b">Plauk?? formavimo koncentratorius</p>
                <p class="para-2">Platesnis, plonesnis optimizuoto plauk?? formavimo koncentratoriaus dizainas sukuria didelio grei??io oro sraut??, kuris idealiai tinka plauk?? modeliavimui. Kadangi oro srautas yra sufokusuotas, galite formuoti plauk?? sruogas viena po kitos ??? nepaveikdami kit??.</p>
              </div>
            </div>
            <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_15.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b">Difuzeris</p>
                <p class="para-2">Optimizuotas dar tolygesniam oro i??sklaidymui aplink j??s?? garbanas, difuzeris imituoja nat??ral?? d??iovinim??, padedamas sutramdyti garbanas ir suformuoti bangas. Ilgesni ??uk?? dantukai leid??ia jums formuoti daugiau plauk??, kartu i??laikyti didesn?? kontrol??, ir pasiekti gyliau ?? plaukus.</p>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_18.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b">??velnaus oro priedas</p>
                <p class="para-2">Sukurtas plonesniems plaukams ir jautriai galvos odai, naujasis ??velnaus oro priedas i??sklaido or??, sukurdamas ??velnesn?? ir v??sesn?? oro sraut??, bet kartu greitai i??d??iovindamas plaukus.</p>
              </div>
            </div>
            <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_19.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b">Pla??iadant??s ??ukos</p>
                <p class="para-2">Garbanotiems plaukams skirtas naujasis pla??iadan??i?? ??uk?? priedas yra su tvirtais dantimis, kurie d??iovinant plaukus pailgina, suteikia jiems apimt?? ir form??.</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
      <div class="py-5" style="background:black;">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_03.jpg">
              <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_03_mob.jpg">
              
            </div>
          </div>
        </div>
      </div>
      <div class="py-5" style="background:black;">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_04.jpg">
              <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_04_mob.jpg">
              
            </div>
          </div>
        </div>
      </div>
      
      <div class="py-5" style="background:black;">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_05.jpg">
              <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_05_mob.jpg">
              
            </div>
          </div>
        </div>
      </div>
      
      <div class="py-5" style="background:black;">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_06.jpg">
              <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/ss_06_mob.jpg">
              
            </div>
          </div>
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 index-pad-3">
              <h1 class="text-center pad-b"><b>Ypatumai</b></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/i1.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b"><b>3 tiksl??s grei??io nustatymai</b></p>
                <p class="para-2">
                  Auk??tas ??? greitam plauk?? d??iovinimui ir formavimui<br>
                  Vidutinis ??? ??prastam d??iovinimui<br>
                ??emas ??? oro paskirstymui</p>
              </div>
            </div>
            <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/i2.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b"><b>4 tiksl??s kar????io nustatymai</b></p>
                <p class="para-2">100??C greitas d??iovinimas ir formavimas<br>
                  80??C ??prastas d??iovinimas<br>
                  60??C ??velnus d??iovinimas<br>
                28??C nuolatinis ??altas oras</p>
              </div>
            </div>
            <div class="col-md-4 matrix">
              <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/ss/i3.jpg">
              <div class="txt-c-in">
                <p class="lead pad-b"><b>??altas</b></p>
                <p class="para-2">28??C ??altas, plauk?? sutvirtinimui po formavimo</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      
      
      
      <div class="py-5" id="lp-dsn_s">
        <div class="container">
          <div class="row">
            <div class="col-md-12 index-pad-3">
              <h1 class="text-center pad-b"><b></b></h1><br>
              <div class="row"><a href="https://www.sveikuplaukuvizija.lt/parduotuve/?min_price=390&max_price=400&filter_gamintojas=dyson" class="btn btn-primary topup maxw">Pirkti</a></div>
            </div>
          </div>
          
        </div>
      </div>
      
    </div></div>
  </body>
</html>
<?php
get_footer();
