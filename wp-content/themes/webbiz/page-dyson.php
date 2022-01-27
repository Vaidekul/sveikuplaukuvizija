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
                            <div class="col-md-12"> </div>
                        </div>
                    </div>
                </div>
                <div class="py-5" >
                    <div class="container">
                        <div class="row index-pad-3">
                            <div class="col-md-12 index-nopad">
                                <div>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="active">
																				<?php 
																					$header = get_permalink( get_page_by_path( 'dyson-header' ) );
																				?>
                                            <a href="<?= $header; ?>">
                                                <img class="d-block img-fluid deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_25.jpg" >
                                                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_25m.jpg">
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
                
                <div class="py-5">
    <div class="container">
  <div class="row">
        <div class="col-md-12 index-pad-3">
          <h1 class="text-center pad-b"><b>Atraskite „Dyson“ plaukų priežiūros produktus</b></h1>
        </div>
      </div>
      
      
   </div>
      </div>
                
                <div class="container">
                    
                    <div class="row">
                         
                            <div class="col-md-4 index-pad"><a href="<?= $super; ?>">
                                <img class="center-block img-fluid d-block deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_14m.jpg">
                                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_14m.jpg">
                                <div class="txt-k-in glow">
                                    <p class="lead">Dyson Supersonic™</p>
                                    <p class="para">Greitas, kontroliuojamas džiovinimas. Padeda išsaugoti natūralų žvilgesį.</p>
                                    <span class="btn_sm btn-primary 10bottom">Susipažinkite su plaukų <br>džiovintuvu „Dyson Supersonic™“</span>
                                </div></a>
                                <a  class="fancybox-media" href="https://www.youtube.com/watch?v=ukTOJ-74BaI">
                                <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                            </div>
                        

                        
                            <div class="col-md-4 index-pad"><a href="<?= $air; ?>">
                                <img class="center-block img-fluid d-block deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_10m.jpg">
                                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_10m.jpg">
                                <div class="txt-k-in glow">
                                    <p class="lead">Dyson Airwrap™</p>
                                    <p class="para">Garbanos, bangos, tiesūs plaukai. Be perteklinio karščio.</p>
                                    <span class="btn_sm btn-primary 10bottom">Susipažinkite su „Dyson Airwrap™“ <br>plaukų formavimo prietaisas</span>
                                </div></a>
                                <a  class="fancybox-media" href="https://www.youtube.com/watch?v=LGWFqeT9UcQ">
                                <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                            </div>
                        
                       
                            <div class="col-md-4 index-pad"> <a href="<?= $corr; ?>">
                                <img class="center-block img-fluid d-block deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_13m.jpg">
                                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_13m.jpg">
                                <div class="txt-k-in glow">
                                    <p class="lead">Dyson Corrale™</p>
                                    <p class="para">Mažiau karščio. Pažangus formavimas. Naudokite su laidu ar be jo.</p>
                                    <span class="btn_sm btn-primary 10bottom">Susipažinkite su plaukų <br>tiesinimo žnyplėmis</span>
                                </div></a>
                                <a  class="fancybox-media" href="https://www.youtube.com/watch?v=D_0LhQD5WSQ">
                                <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                            </div>
                        
                       
                    </div>
                </div>
                
       
            
            
            
            
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <a href="#">
                            <div class="col-md-6 index-pad">
											
                                <img class="center-block img-fluid d-block deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_21.jpg">
                                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_21m.jpg">
                                <div class="txt-k-in white">
                                    <p class="lead">Pažangus formavimas</p>
                                    
                                    
                                </div>
                                <a  class="fancybox-media" href="https://www.youtube.com/watch?v=bEDLqqZ8zsQ">
                                <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-md-6 index-pad">
                                <img class="center-block img-fluid d-block deny" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_23.jpg">
                                <img class="center-block img-fluid d-block mob-fix allow" src="<?php echo get_template_directory_uri(); ?>/dyson-images/index/index_23m.jpg">
                                <div class="txt-k-in white">
                                    <p class="lead">Greitas, kontroliuojamas džiovinimas</p>
                                    
                                    
                                </div>
                                <a  class="fancybox-media" href="https://www.youtube.com/watch?v=eDZRcRMPzOk">
                                <img class="playbtn" src="<?php echo get_template_directory_uri(); ?>/dyson-images/playerButton.png"> </a>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="py-5 deny-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                            <p class="caveat"><sup></sup></p>
                       
                       

         
                </div>
            </div>
        </div>
        
        
        
        

        
        
        
    </div>
                
                
                
                
                
                
                
            </div>
        </body>
    </html>

		<?php
get_footer();
