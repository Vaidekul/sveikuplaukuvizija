<?php
/**
*
*/
if( !class_exists( 'Sobari_Google_Maps_Shortcode' ) ){
	
	class Sobari_Google_Maps_Shortcode extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$param = array(
				'name'			=> esc_attr__( 'Google Maps', 'sobari_sc' ),
				'base'			=> 'google_maps',
				'description'	=> esc_attr__( 'Display maps', 'sobari_sc' ),
				'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/Google-Maps.svg",
				'params'		=> array(),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Height', 'sobari_sc' ),
				'param_name'	=> 'maps_height',
				'description'	=> __( 'Maps height can use any css units EXCEPT % (percent).', 'sobari_sc' ),
				'group'			=> 'General Settings',
				'std'			=> '400px'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __('Map Type', 'sobari_sc'),
				'param_name'	=> 'maps_type',
				'admin_label'	=> 'true',
				'value'			=> array(
									__( 'Roadmap', 'sobari_sc' )	=> 'ROADMAP',
									__( 'Satellite', 'sobari_sc' )	=> 'SATELLITE',
									__( 'Hybrid', 'sobari_sc' )		=> 'HYBRID',
									__( 'Terrain', 'sobari_sc' )	=> 'TERRAIN'
								),
				'group'			=> 'General Settings',
				'std'			=> 'ROADMAP'
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Latitude', 'sobari_sc' ),
				'param_name'	=> 'maps_lat',
				'description'	=> __( sprintf('To generate latitude & longitude click <a href="%s" target="%s">here</a>', esc_url( 'http://www.mapcoordinates.net/en' ), esc_attr( '_blank' ) ), 'sobari_sc' ),
				'group'			=> 'General Settings',
				'std'			=> '40.7143528'
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Longitude', 'sobari_sc' ),
				'param_name'	=> 'maps_long',
				'group'			=> 'General Settings',
				'std'			=> '-74.0059731'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> __('Map Zoom', 'sobari_sc'),
				'param_name'	=> 'maps_zoom',
				'value'			=> array(
									__('18 - Default', 'sobari_sc' ) => 12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20
								),
				'group'			=> 'General Settings',
				'std'			=> 18
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> '',
				'param_name'	=> 'scrollwheel',
				'value'			=> array(
									__( 'Disable map zoom on mouse wheel scroll', 'sobari_sc' ) => 'disable',
								),
				'group'			=> 'General Settings',
				'std'			=> 'true'
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> 'Extra Class',
				'param_name'	=> 'maps_extra_class',
				'group'			=> 'General Settings'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Street View Control', 'sobari_sc' ),
				'param_name'	=> 'streetviewcontrol',
				'value'			=> array(
									__( 'Disable', 'sobari_sc' )	=> 'false',
									__( 'Enable', 'sobari_sc' )		=> 'true'
								),
				'group'			=> 'Advanced',
				'std'			=> 'false'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Map Type Control', 'sobari_sc' ),
				'param_name'	=> 'maptypecontrol',
				'value'			=> array(
									__( 'Disable', 'sobari_sc' )	=> 'false',
									__( 'Enable', 'sobari_sc' )		=> 'true'
								),
				'group'			=> 'Advanced',
				'std'			=> 'false'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Map Pan Control', 'sobari_sc' ),
				'param_name'	=> 'pancontrol',
				'value'			=> array(
									__( 'Disable', 'sobari_sc' )	=> 'false',
									__( 'Enable', 'sobari_sc' )		=> 'true'
								),
				'group'			=> 'Advanced',
				'std'			=> 'false'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Zoom Control', 'sobari_sc' ),
				'param_name'	=> 'zoomcontrol',
				'value'			=> array(
									__( 'Disable', 'sobari_sc' )	=> 'false',
									__( 'Enable', 'sobari_sc' )		=> 'true'
								),
				'group'			=> 'Advanced',
				'std'			=> 'false'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Zoom Control Size', 'sobari_sc' ),
				'param_name'	=> 'zoomcontrolsize',
				'value'			=> array(
									__( 'Small', 'sobari_sc' )	=> 'SMALL',
									__( 'Large', 'sobari_sc' )	=> 'LARGE'
								),
				'dependency'	=> array(
									'element'	=> 'zoomcontrol',
									'value'		=> array( 'true' )
								),
				'group'			=> 'Advanced',
				'std'			=> 'SMALL'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Disable dragging on Mobile', 'sobari_sc' ),
				'param_name'	=> 'dragging',
				'value'			=> array(
									__( 'Disable', 'sobari_sc' )	=> 'false',
									__( 'Enable', 'sobari_sc' )		=> 'true'
								),
				'group'			=> 'Advanced',
				'std'			=> 'false'
			);
			$param['params'][] = array(
				'type'			=> 'textarea',
				'class'			=> '',
				'heading'		=> __( 'Info Window Text', 'sobari_sc' ),
				'param_name'	=> 'info_window',
				'value'			=> '',
				'group'			=> 'Info Window'
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> __( 'Marker/Point Icon', 'sobari_sc' ),
				'param_name'	=> 'maps_marker',
				'value'			=> array(
									__( 'Use Google Default', 'sobari_sc' )	=> 'default',
									__( 'Upload Custom', 'sobari_sc' )		=> 'custom'
								),
				'group'			=> 'Marker',
				'std'			=> 'default'
			);
			$param['params'][] = array(
				'type'			=> 'attach_image',
				'class'			=> '',
				'heading'		=> __( 'Upload Image Icon:', 'sobari_sc' ),
				'param_name'	=> 'icon_img',
				'admin_label'	=> 'true',
				'value'			=> '',
				'description'	=> __( 'Upload the custom image icon.', 'sobari_sc' ),
				'dependency'	=> array(
									'element'	=> 'maps_marker',
									'value'		=> array( 'custom' )
								),
				'group'			=> 'Marker'
			);
			$param['params'][] = array(
				'type'			=> 'textarea_raw_html',
				'heading'		=> __( 'Google Styled Map JSON', 'sobari_sc' ),
				'param_name'	=> 'maps_style',
				'description'	=> __( sprintf('To generate style click <a href="%s" target="%s">here</a>', esc_url( 'https://mapstyle.withgoogle.com/' ), esc_attr( '_blank' ) ), 'sobari_sc' ),
				'group'			=> 'Styling'
			);

			parent::dahz_framework_shortcode_maps( $param );

		}

	}

	new Sobari_Google_Maps_Shortcode();
	
}