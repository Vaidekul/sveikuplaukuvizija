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
        
        
        
        
        <a href="https://www.sveikuplaukuvizija.lt/produktas/dyson-corrale-plauku-tiesinimo-znyples/" target="blank"><div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_01.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_01_mob.jpg">
                <a class="fancybox-media" href="https://www.youtube.com/watch?v=bEDLqqZ8zsQ">
                <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
              </div>
            </div>
          </div>
        </div></a>
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_02.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_02_mob.jpg">
                
              </div>
            </div>
          </div>
        </div>
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_03.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_03_mob.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_04.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_04_mob.jpg">
              </div>
            </div>
          </div>
        </div>
        
        
        
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12 index-pad-3">
                <h1 class="text-center pad-b"><b>Svarbiausios savyb??s</b></h1>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/i1.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b"><b>OLED ekranas</b></p>
                  <p class="para-2">Parodo baterijos ??krovos lyg??, temperat??ros nustatym?? ir ??krovos b??kl?? naudojimo metu.</p>
                </div>
              </div>
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/i2.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b"><b>Tinkamas visiems plauk?? tipams</b></p>
                  <p class="para-2">Trys tiksl??s temperat??ros nustatymai (165??C, 185??C ir 210??C) pagal j??s?? plauk?? tip?? ir norim?? sukurti ??vaizd??.</p>
                </div>
              </div>
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/i3.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b"><b>Iki 30 minu??i?? bevielio veikimo??</b></p>
                  <p class="para-2">U??tikrina tokias pat ??ilumos charakteristikas, kaip ir su prijungtu laidu. ??nypl??s pilnai pasikrauna per 70 minu??i??.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/i4.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b"><b>Ilgesniam veikimo laikui pasiekti, naudokite su laidu.</b></p>
                  <p class="para-2">Nor??dami prailginti plauk?? formavimo laik??, prad??kite naudotis pilnai ??krautomis plauk?? tiesinimo ??nypl??mis ir su prijungtu laidu.</p>
                </div>
              </div>
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/i5.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b"><b>Automatinis i??jungimas ir apsauginio u??rakto funkcija</b></p>
                  <p class="para-2">D??l saugumo i??jungia prietais?? po 10 minu??i?? neveikimo. Apsauginis u??raktas greitam sud??jimui  po naudojimo.</p>
                </div>
              </div>
              <div class="col-md-4 matrix">
                <img class="center-block img-fluid d-block" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/i6.jpg">
                <div class="txt-c-in">
                  <p class="lead pad-b"><b>Pasiruo????s kelion??ms</b></p>
                  <p class="para-2">Universali ??tampa ir pasiruo??imo skryd??iui funkcija leid??ia keliaujant ?? u??sien?? kartu paimti ir j??s?? plauk?? tiesinimo ??nyples.??</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-5" style="margin-top:0px;background:black">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_05.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_05_mob.jpg">
                
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-5" style="margin-top:0px;background:black">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                
                <img class="center-block img-fluid d-block mob-fix deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_06.jpg">
                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/cr/cr_06_mob.jpg">
                
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        
        
        <div class="py-5" id="lp-dsn_s">
          <div class="container">
            <div class="row">
              <div class="col-md-12 index-pad-3">
                <h1 class="text-center pad-b"><b></b></h1><br>
                <div class="row"><a href="https://www.sveikuplaukuvizija.lt/produktas/dyson-corrale-plauku-tiesinimo-znyples/" class="btn btn-primary topup maxw">Pirkti</a></div>
              </div>
            </div>
            
          </div>
        </div>
        
        
        
        
        
        
        
        
        
        <div class="py-5" >
          <div class="container">
            
            <div class="py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 topup2">
                    <p class="caveat"><sup>1</sup>Tikslus plauk?? formavimo laikas priklauso nuo j??s?? plauk?? tipo ir formavimo ??pro??i??.</p>
                    
                    <p class="caveat"><sup>2</sup>Grie??tesni Japonijos reglamentai neleid??ia jums ??skristi ar i??skristi i?? bet kurio Japonijos oro uosto su plauk?? tiesinimo ??nypl??mis.</p>
                    <p class="caveat"><sup>3</sup>Tiesioginio vaizdo analiz?? prie?? nesuformuotus plaukus.</p>
                    
                    
                    
                  </div>
                </div>
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
