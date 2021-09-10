<?php 

// CTA Buttons
function btn_cta_shortcode($atts) {
    $a = shortcode_atts( array(
        "class" => "",
        "text" => "Click Me",
        "link" => "#"
    ), $atts );

    return "<a href='" . $a['link'] . "' class='btn-cta" . " " . $a['class'] . "'>" . $a['text'] . "</a>";
}   

add_shortcode( 'btn-cta', 'btn_cta_shortcode' );