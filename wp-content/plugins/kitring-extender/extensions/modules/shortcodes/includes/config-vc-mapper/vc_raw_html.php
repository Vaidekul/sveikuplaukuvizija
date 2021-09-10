<?php

$raw_html = array(
	array(
		'type' => 'textarea_raw_html',
		'holder' => 'div',
		'heading' => __( 'Raw HTML', 'js_composer' ),
		'param_name' => 'content',
		'value' => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
		'description' => __( 'Enter your HTML content.', 'js_composer' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'js_composer' ),
		'param_name' => 'el_class',
		'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
	),
);

return $raw_html;