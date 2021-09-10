<?php

$widget_sidebar = array(
	array(
		'type'			=> 'textfield',
		'param_name'	=> 'title',
		'heading'		=> __( 'Widget Title', 'js_composer' ),
		'description'	=> __( 'Enter text used as widget title (Note: located above content element).', 'js_composer' ),
		'admin_label'	=> true,
	),
	array(
		'type'			=> 'widgetised_sidebars',
		'param_name'	=> 'sidebar_id',
		'heading'		=> __( 'Sidebar', 'js_composer' ),
		'description'	=> __( 'Select widget area to display.', 'js_composer' ),
	),
);

return $widget_sidebar;