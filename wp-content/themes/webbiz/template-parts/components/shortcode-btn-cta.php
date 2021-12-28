<?php 

// CTA Buttons
function btn_cta_shortcode($atts) {
    $a = shortcode_atts( array(
        "class" => "",
        "text" => "Click Me",
        "link" => "#"
    ), $atts );

    return "<a href='" . $a['link'] . "' class='btn-cta" . " " . $a['class'] . "'>" . $a['text'] . "<i class='ml-3 fas fa-arrow-right'></i></a>";
}   

add_shortcode( 'btn-cta', 'btn_cta_shortcode' );

// CTA Custom Link
function custom_link($atts) {
	$a = shortcode_atts( array(
			"class" => "",
			"text" => "Click Me",
			"link" => "#"
	), $atts );

	return "<a href='" . $a['link'] . "' class='custom-link link--arrowed" . " " . $a['class'] . "'>" . $a['text'] . "
	<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'>
	<g fill='none', stroke='#FFFFFF', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'>
		<circle class='arrow-icon--circle', cx='16', cy='16', r='15.12'></circle>
		<path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path>
	</g>
</svg> </a>";
}   

add_shortcode( 'custom-link', 'custom_link' );

function custom_link_black($atts) {
	$a = shortcode_atts( array(
			"class" => "",
			"text" => "Click Me",
			"link" => "#"
	), $atts );

	return "<a href='" . $a['link'] . "' class='custom-link link--arrowed" . " " . $a['class'] . "'>" . $a['text'] . "
	<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'>
	<g fill='none', stroke='#000000', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'>
		<circle class='arrow-icon--circle', cx='16', cy='16', r='15.12'></circle>
		<path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path>
	</g>
</svg> </a>";
}   

add_shortcode( 'custom-link-black', 'custom_link_black' );


// function that runs when shortcode is called
function wpb_demo_shortcode() { 
 
	// Things that you want to do. 
	
	$message = '<a class="active-filters-container d-flex align-items-center d-block d-lg-none" href="">Filtrai<i class="ml-3 fas fa-chevron-down"></i></a>';
	
	 
	// Output needs to be return
	return $message;
	} 
	// register shortcode
	add_shortcode('greeting', 'wpb_demo_shortcode'); 
	