<?php

return array(

	// Group General //
	array(
		'type' 			=> 'textfield',
		'heading' 		=> __( 'Height', 'js_composer' ),
		'param_name' 	=> 'height',
		'value' 		=> '40px',
		'admin_label' 	=> true,
		'description' 	=> __( 'Enter empty space height (Note: CSS measurement units allowed).', 'js_composer' ),
	),
	// Group Responsive //
	array(
		'type'			=> 'textfield',
		'heading'		=> __( 'Extra Class Name', 'sobari_sc' ),
		'param_name'	=> 'el_class',
		'group'			=> __( 'Extra', 'sobari_sc' ),
		'description'	=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'sobari_sc' ),
	),
	array(
		'type'			=> 'visibility',
		'heading'		=> __( 'Visibility', 'sobari_sc' ),
		'param_name'	=> 'visibility',
		'description'	=> __( 'Set visibility on device', 'sobari_sc' ),
		'group'			=> __( 'Extra', 'sobari_sc' ),
	),
);