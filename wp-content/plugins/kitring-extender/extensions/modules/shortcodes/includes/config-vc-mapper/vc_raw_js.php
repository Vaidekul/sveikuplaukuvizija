<?php

$raw_js = array(
	array(
		'type' => 'textarea_raw_html',
		'holder' => 'div',
		'heading' => __( 'JavaScript Code', 'js_composer' ),
		'param_name' => 'content',
		'value' => __( base64_encode( '<script type="text/javascript"> alert("Enter your js here!" ); </script>' ), 'js_composer' ),
		'description' => __( 'Enter your JavaScript code.', 'js_composer' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'js_composer' ),
		'param_name' => 'el_class',
		'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
	),
);

return $raw_js;