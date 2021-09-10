<style>
.QUIZ-slides {
	display:none;
	width: 100%;
	text-align: center;
}
.QUIZ-Answers{
	text-align: center;
}
.QUIZ-Answers > div{ 
	display: inline-block;
	width: 100%;
	text-align: left;
}
@media (min-width: 480px){
	.QUIZ-Answers > div{
		width: 49%;
	}
}
@media (min-width: 768px ){
	.QUIZ-Answers > div{
		width: 32%;
	}
}
@media (min-width: 960px  ){
	.QUIZ-Answers > div{
		width: 24%;
	}
}
.QUIZ-Answers label{
	cursor: pointer;
	padding: 5px;
	font-size: 16px;
}
.QUIZ-navigator{
	display: block;
	margin-top: 25px;
	width: calc(100% + 30px) !important;
	text-align: center !important;
	margin-left: -15px;
}
.QUIZ-title{
	font-size: 30px;
	line-height: 35px;
}
@media (min-width: 480px){
	.QUIZ-Answers > div{
		font-size: 45px;
		line-height: 50px;
	}
}
@media (min-width: 768px ){
	.QUIZ-Answers > div{
		font-size: 60px;
		line-height: 65px;
	}
}
@media (min-width: 960px  ){
	.QUIZ-Answers > div{
		font-size: 72px;
		line-height: 72px;
	}
}
.QUIZ-RESULTS .de-product-thumbnail__action--add-to-cart{
	
}
input[type="checkbox"], input[type="radio"]{
	display: none
}
input[type="checkbox"] + span, input[type="radio"] + span{
	padding: 15px;
	border: 1px solid #aaa;
	width: calc(100% - 30px) !important;
	display: inline-block;
}
input[type="checkbox"]:checked + span, input[type="radio"]:checked + span{
	background: #eee
}
</style>
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
		$("#QUIZ-RESULTS").html('Kraunama...').css('display', 'block');
		
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
									<label><input type="radio" name="a" value="1"> <span>Tiesūs</span></label>
									</div>
									<div>
									<label><input type="radio" name="a" value="2"> <span>Banguoti</span></label>
									</div>
									<div>
									<label><input type="radio" name="a" value="3"> <span>Garbanoti</span></label>
									</div>
									<div>
									<label><input type="radio" name="a" value="4"> <span>Stipriai garbanoti</span></label>
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
									<label><input type="radio" name="b" value="1"> <span>Plona</span></label>
									</div>
									<div>
									<label><input type="radio" name="b" value="2"> <span>Vidutinio storumo</span></label>
									</div>
									<div>
									<label><input type="radio" name="b" value="3"> <span>Stori</span></label>
									</div>
									<div>
									<label><input type="radio" name="b" value="4"> <span>Stori porėti</span></label>
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
									<label><input type="radio" name="c" value="1"> <span>Riebi</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="2"> <span>Sausa</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="3"> <span>Normali</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="4"> <span>Linkus pleiskanoti</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="5"> <span>Linkus riebaluotis</span></label>
									</div>
									<div>
									<label><input type="radio" name="c" value="6"> <span>Jautri</span></label>
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
									<label><input type="radio" name="d" value="1"> <span>Dažyti viena spalva (tamsinti)</span></label>
									</div>
									<div>
									<label><input type="radio" name="d" value="2"> <span>Ne, jie naturalūs</span></label>
									</div>
									<div>
									<label><input type="radio" name="d" value="3"> <span>Šviesinti</span></label>
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
								<h3 class="QUIZ-title">Noriu kad mano plaukai būtų:</h3>
								<div class="QUIZ-Answers">
									<div>
									<label><input type="checkbox" name="e" value="1"> <span>Tiesesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="2"> <span>Turėtų daugiau drėgmės</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="3"> <span>Būtų švelnesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="4"> <span>Apsaugoti nuo karščio (mechaninio poveikio)</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="5"> <span>Apsaugoti nuo UV spindulių</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="6"> <span>Stilingiau banguotūsi</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="7"> <span>Būtų minkštesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="8"> <span>Būtų ilgesni</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="9"> <span>Neskiltų plaukų galiukai</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="10"> <span>Labiau blizgėtų</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="11"> <span>Turėtų daugiau apimties</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="12"> <span>Nesielektrintu</span></label>
									</div>
									<div>
									<label><input type="checkbox" name="e" value="13"> <span>Būtų lengviau kontroliuojami</span></label>
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

<div style="padding-bottom: 70px; padding-top: 40px; clear: both; display: none" id="QUIZ-RESULTS" class="woocommerce-page woocommerce">
</div>
