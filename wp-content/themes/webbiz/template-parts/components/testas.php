
<script>
var slideIndex = 1;
function plusDivs() {
  showDivs(slideIndex += 1);
	console.log(jQuery);
}

function minusDivs() {
  showDivs(slideIndex -= 1);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("QUIZ-slides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}

jQuery(document).ready(function($) {
	var form = $('#QUIZ-FORM');
	form.on('submit', function(e){
		e.preventDefault();
		
		$("#QUIZ-FORM").parent().remove();
		$("#QUIZ-RESULTS").html('Kraunama...')
		.css({
      "display": "block",
      "margin-top": "3rem"
    });
		
		$([document.documentElement, document.body]).animate({
			scrollTop: $("#QUIZ-RESULTS").offset().top
		}, 2000); 
	
		$.ajax({
			url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
			data: {
				'action': 'quiz_results',
				'data' : form.serializeArray()
			},
			success:function(data) {
				$("#QUIZ-RESULTS").html(data).css('display', 'block');
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});  
	});
	
	var limit = 2;
	$('.QUIZ-Answers input[type=checkbox]').on('change', function(evt) {
	   if($('.QUIZ-Answers input[type=checkbox]:checked').length > limit) {
		   this.checked = false;
	   }
	});
});
</script>
<div class="uk-grid">
<div class="uk-width-1-1 uk-margin-large">
    <div class="de-row uk-container" style="z-index: 0 !important; padding-top: 70px;">
        <div data-uk-grid="" class="uk-grid uk-flex-1 uk-c-position-z-index-0 uk-grid-large uk-c-flex-first@l">
            <div class="de-column uk-position-relative uk-width-1-1" style="z-index: 0 !important;">
                <div class="uk-flex uk-c-flex-stretch uk-width-1-1">
                    <div class="uk-width-1-1 uk-padding-remove">
                        <div></div>
						<!-- -->
						<div class="uk-flex uk-c-flex-stretch uk-width-1-1" style="min-height: 200px; padding: 30px 0; align-items: center; justify-content: center;">
							<form id="QUIZ-FORM" style="width: 100%">
							<!-- Klausimas NR1 -->
							<div class="QUIZ-slides" style="display: block">
								<h3 class="QUIZ-title">Koks yra Jūsų plaukų tipas?</h3>
								<div class="QUIZ-Answers">
									<div>
										<label>
											<input type="radio" name="a" value="1">
											<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/tiesus big.svg" alt="">
									 		<span>Tiesūs</span>
										</label>   
									</div>
									<div>
										<label>
											<input type="radio" name="a" value="2">   
											<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/banguoti big.png" alt="">
											<span>Banguoti</span>
										</label>
									</div>
									<div>
										<label>
											<input type="radio" name="a" value="3"> 
											<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/garbanoti2.png" alt="">
											<span>Garbanoti</span>
										</label>
									</div>
									<div>
										<label>
											<input type="radio" name="a" value="4"> 
											<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/lgarbanoti.png" alt="">
											<span>Stipriai garbanoti</span>
										</label>
									</div>
									<div class="QUIZ-navigator">
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="plusDivs()">Kitas</button>
									</div>
								</div>
							</div>
							<!-- Klausimas NR1 -->

							<!-- Klausimas NR2 -->
							<div class="QUIZ-slides">
								<h3 class="QUIZ-title">Kokia yra Jūsų plaukų struktūra?</h3>
								<div class="QUIZ-Answers">
									<div>
										<label>
											<input type="radio" name="b" value="1">
											<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/ploni.png" alt="">
											<span>Plona</span>
										</label>
									</div>
									<div>
										<label>
											<input type="radio" name="b" value="2"> 
											<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/vidutinio storumo.png" alt="">
											<span>Vidutinio storumo</span>
											</label>
									</div>
									<div>
									<label><input type="radio" name="b" value="3">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/stori.png" alt="">
									<span>Stori</span></label>
									</div>
									<div>
									<label><input type="radio" name="b" value="4">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/poreti.png" alt="">
									<span>Stori porėti</span></label>
									</div>
									<div class="QUIZ-navigator">
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="minusDivs()">Atgal</button>
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="plusDivs()">Kitas</button>
									</div>
								</div>
							</div>
							<!-- Klausimas NR2 -->

							<!-- Klausimas NR3 -->
							<div class="QUIZ-slides">
								<h3 class="QUIZ-title">Kokio tipo yra Jūsų galvos oda?</h3>
								<div class="QUIZ-Answers">
									<div>
									<label><input type="radio" name="c" value="1">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/riebi.png" alt="">
									<span>Riebi</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="2">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/sausa.png" alt=""><span>Sausa</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="3">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/normali.svg" alt=""><span>Normali</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="4">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/pleiskanota.png" alt="">
									<span>Linkus pleiskanoti</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="5">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/linkusriebaluotis.png" alt=""><span>Linkus riebaluotis</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="6">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/jautri.png" alt="">
									<span>Jautri</span></label>
									</div>
									<div class="QUIZ-navigator">
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="minusDivs()">Atgal</button>
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="plusDivs()">Kitas</button>
									</div>
								</div>
							</div>
							<!-- Klausimas NR3 -->

							<!-- Klausimas NR4 -->
							<div class="QUIZ-slides">
								<h3 class="QUIZ-title">Ar Jūsų plaukai dažyti?</h3>
								<div class="QUIZ-Answers">
									<div>
									<label><input type="radio" name="d" value="1">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/tamsinti.png" alt="">
									<span>Dažyti viena spalva (tamsinti)</span></label>
									</div>
									<div>
									<label><input type="radio" name="d" value="2">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/normali.png" alt="">
									<span>Ne, jie naturalūs</span></label>
									</div>
									<div>
									<label><input type="radio" name="d" value="3"> 
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/sviesinti.png" alt="">
									<span>Šviesinti</span></label>
									</div>
									<div class="QUIZ-navigator">
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="minusDivs()">Atgal</button>
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="plusDivs()">Kitas</button>
									</div>
								</div>
							</div>
							<!-- Klausimas NR4 -->

							<!-- Klausimas NR5 -->
							<div class="QUIZ-slides">
								<h3 class="QUIZ-title">Norite kad Jūsų plaukai būtų:</h3>
								<p>(galimi 2 variantai)</p>
								<div class="QUIZ-Answers">
									<div>
									<label><input type="checkbox" name="e" value="1">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/tiesesni.png" alt="">
									<span>Tiesesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="2">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/dregmes.png" alt="">
									<span>Turėtų daugiau drėgmės</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="3">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/svelnus.png" alt="">
									<span>Būtų švelnesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="4">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/karstis.png" alt="">
									<span>Apsaugoti nuo karščio</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="5">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/uv.png" alt="">
									<span>Apsaugoti nuo UV spindulių</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="6">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/stilingai.png" alt="">
									<span>Stilingiau banguotu</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="7">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/svelnesni.png" alt="">
									<span>Būtų minkštesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="8">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/ilgesni.png" alt="">
									<span>Būtų ilgesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="9">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/galiukai.png" alt="">
									<span>Neskiltų plaukų galiukai</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="10">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/zvilga.png" alt="">
									<span>Labiau blizgėtų</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="11">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/tankumas.png" alt="">
									<span>Turėtų daugiau apimties</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="12">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/elektrinti.png" alt="">
									<span>Nesielektrintu</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="13">
									<img class="test-class" src="<?php echo get_template_directory_uri(); ?>/images/dist/testas/control.png" alt="">
									<span>Būtų lengviau kontroliuojami</span></label>
									</div>
									<div class="QUIZ-navigator">
										<button type="button" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary" onclick="minusDivs()">Atgal</button>
										<button type="submit" class="wpcf7-form-control wpcf7-submit uk-button uk-button-primary">Paieška</button>
									</div>
								</div>
							</div>
							<!-- Klausimas NR5 -->
							</form>
						</div>
						<!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
</div>
</div>
<div class="row justify-content-center">
<div class="container">
<div style="padding-bottom: 70px; padding-top: 40px; clear: both; display: none" id="QUIZ-RESULTS" class="woocommerce-page woocommerce">
</div>
<?php 
$cta_bg = get_field('cta_background', 'options');
$text = get_field('cta_text', 'options');
?>
<div class="cta-newsletter">
	<div class="bg-cta" style="background-image:url(<?= $cta_bg['url'];?>);">

	</div>
	<div class="text">
		<?= $text ?>
	</div>
</div>
</div>
</div>
