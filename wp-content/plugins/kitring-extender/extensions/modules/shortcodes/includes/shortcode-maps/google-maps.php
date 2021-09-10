<?php

$param = array(
	'name'			=> esc_attr__( 'Google Maps', 'upsob_sc' ),
	'base'			=> 'google_maps',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Show google maps in styles', 'sobari_sc' ),
	'icon'      => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-google-map.svg",
	'params'		=> array(),
);

$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Google Maps API', 'upsob_sc' ),
	'param_name'	=> 'api',
	'description'	=> __( sprintf( 'Your API key. <a href="%s" target="%s">Get here</a>', esc_url( 'https://developers.google.com/maps/documentation/embed/' ), esc_attr( '_blank' ) ), 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Map Height', 'upsob_sc' ),
	'param_name'	=> 'height',
	'std'			=> '50vh',
	'description'	=> esc_attr__( 'Map height can use any css units EXCEPT % (percent)', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__('Map Type', 'upsob_sc'),
	'param_name'	=> 'type',
	'description'	=> esc_attr__( 'Define map style', 'upsob_sc' ),
	'std'			=> 'ROADMAP',
	'value'			=> array(
		esc_attr__( 'Roadmap', 'upsob_sc' )		=> 'ROADMAP',
		esc_attr__( 'Satellite', 'upsob_sc' )	=> 'SATELLITE',
		esc_attr__( 'Hybrid', 'upsob_sc' )		=> 'HYBRID',
		esc_attr__( 'Terrain', 'upsob_sc' )		=> 'TERRAIN'
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Latitude', 'upsob_sc' ),
	'param_name'	=> 'lat',
	'std'			=> '40.7143528',
	'description'	=> __( sprintf( 'To generate latitude & longitude <a href="%s" target="%s">click here</a>', esc_url( 'http://www.mapcoordinates.net/en' ), esc_attr( '_blank' ) ), 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Longitude', 'upsob_sc' ),
	'std'			=> '-74.0059731',
	'param_name'	=> 'long',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__('Map Zoom', 'upsob_sc'),
	'param_name'	=> 'zoom',
	'value'			=> array(
		esc_attr__( '18 - Default', 'upsob_sc' ) => 18, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__('Disable Map Zoom on Mousewheel Scroll', 'upsob_sc' ),
	'param_name'	=> 'scrollwheel',
	'value'			=> array(
		esc_attr__( 'Yes', 'upsob_sc' ) => 'true',
	),
);
# End of general tab.
# Start advance tab.
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Street View Control', 'upsob_sc' ),
	'param_name'	=> 'streetviewcontrol',
	'std'			=> 'false',
	'value'			=> array(
		esc_attr__( 'Disable', 'upsob_sc' )	=> 'false',
		esc_attr__( 'Enable', 'upsob_sc' )	=> 'true',
	),
	'group'			=> 'Advanced',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Map Type Control', 'upsob_sc' ),
	'param_name'	=> 'maptypecontrol',
	'std'			=> 'false',
	'value'			=> array(
		esc_attr__( 'Disable', 'upsob_sc' )	=> 'false',
		esc_attr__( 'Enable', 'upsob_sc' )	=> 'true',
	),
	'group'			=> 'Advanced',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Map Pan Control', 'upsob_sc' ),
	'param_name'	=> 'pancontrol',
	'std'			=> 'false',
	'value'			=> array(
		esc_attr__( 'Disable', 'upsob_sc' )	=> 'false',
		esc_attr__( 'Enable', 'upsob_sc' )	=> 'true',
	),
	'group'			=> 'Advanced',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Zoom Control', 'upsob_sc' ),
	'param_name'	=> 'zoomcontrol',
	'std'			=> 'false',
	'value'			=> array(
		esc_attr__( 'Disable', 'upsob_sc' )	=> 'false',
		esc_attr__( 'Enable', 'upsob_sc' )	=> 'true',
	),
	'group'			=> 'Advanced',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Zoom Control Size', 'upsob_sc' ),
	'param_name'	=> 'zoomcontrolsize',
	'value'			=> array(
		esc_attr__( 'Small', 'upsob_sc' )	=> 'SMALL',
		esc_attr__( 'Large', 'upsob_sc' )	=> 'LARGE',
	),
	'dependency'	=> array(
		'element'	=> 'zoomcontrol',
		'value'		=> 'true',
	),
	'group'			=> 'Advanced',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Disable Dragging on Mobile', 'upsob_sc' ),
	'param_name'	=> 'disabledragmobile',
	'std'			=> 'false',
	'value'			=> array(
		esc_attr__( 'Disable', 'upsob_sc' )	=> 'false',
		esc_attr__( 'Enable', 'upsob_sc' )	=> 'true',
	),
	'group'			=> 'Advanced',
);
# End of advance tab.
# Start styling tab.
$param['params'][] = array(
	'type'			=> 'textarea',
	'heading'		=> esc_attr__( 'Info Window Text', 'upsob_sc' ),
	'param_name'	=> 'infowindow',
	'description'	=> esc_attr__( 'Define map description', 'upsob_sc' ),
	'group'			=> 'Design',
);
$param['params'][] = array(
	'type'			=> 'textarea_raw_html',
	'heading'		=> esc_attr__( 'Google Styled Map JSON', 'upsob_sc' ),
	'param_name'	=> 'style',
	'description'	=> __( sprintf( 'To generate style <a href="%s" target="%s">click here</a>', esc_url( 'https://mapstyle.withgoogle.com/' ), esc_attr( '_blank' ) ), 'upsob_sc' ),
	'group'			=> 'Design',
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Marker/Point Icon', 'upsob_sc' ),
	'param_name'	=> 'marker',
	'description'	=> esc_attr__( 'Select marker type', 'upsob_sc' ),
	'std'			=> 'default',
	'value'			=> array(
		esc_attr__( 'Use Google Default', 'upsob_sc' )	=> 'default',
		esc_attr__( 'Upload Custom', 'upsob_sc' )		=> 'custom',
	),
	'group'			=> 'Design',
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Upload Marker', 'upsob_sc' ),
	'param_name'	=> 'markericon',
	'description'	=> esc_attr__( 'Select image from media library ( Recommend size of marker is 80x80 )', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'marker',
		'value'		=> 'custom',
	),
	'group'			=> 'Design',
);
return $param;
