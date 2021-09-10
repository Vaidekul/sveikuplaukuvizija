<?php
/*
 Plugin Name: Dahz Shortcodes
 Plugin URI:
 Description: WordPress shortcodes plugin everywhere. Loaded with shortcodes, awesomeness and more.
 Version: 1.0.0
 Author: DAHZ
 Author URI: http://daffyhazan.com
 Text Domain: sobari_sc
 */

$current_theme = wp_get_theme();

if( $current_theme->name == 'Kitring' || $current_theme->parent_theme == 'Kitring' ){

	add_action( 'vc_before_init', 'dahz_extend_vc_init', 10 );

	add_action( 'vc_before_init', 'dahz_framework_locate_shortcodes_templates', 11 );

	add_shortcode( 'current_year', 'dahz_framework_current_year' );

}

if( !function_exists( 'dahz_framework_current_year' ) ){

	function dahz_framework_current_year(){

		return date("Y");

	}

}

if( !function_exists( 'dahz_framework_get_http_post' ) ){

	function dahz_framework_get_http_post(){

		$host = $_SERVER['HTTP_HOST'];
		//php < 5.4.7 returns null if host without scheme entered
		if(mb_substr($host, 0, 4) !== 'http'){

			$host = 'http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 's' : '').'://' . $host;

		}

		return parse_url( $host, PHP_URL_HOST );

	}

}

if( !function_exists( 'dahz_framework_get_document_root' ) ){

	function dahz_framework_get_document_root(){

		return $_SERVER["DOCUMENT_ROOT"];

	}

}

function dahz_framework_locate_shortcodes_templates() {

	// Link your VC elements's folder
	if( function_exists('vc_set_shortcodes_templates_dir') && class_exists( 'Dahz_Framework_Shortcode_Template' ) ){

		vc_set_shortcodes_templates_dir( DAHZEXTENDER_SHORTCODE_PATH . 'includes/templates/vc-templates' );

	}

}

if( !function_exists( 'dahz_extend_vc_init' ) ){

	function dahz_extend_vc_init(){

		if( class_exists( 'Dahz_Framework_Init' ) ) require( plugin_dir_path( __FILE__ ) . 'class-dahz-framework-shortcode-template.php' );

	}

}
