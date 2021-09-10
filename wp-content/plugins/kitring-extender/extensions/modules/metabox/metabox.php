<?php
/**
 * DahzExtender Metabox
 *
 * @package  DahzExtender
 * @since    1.0.0
 */
global $dahz_framework;

if( is_admin() && !is_customize_preview() ){
	
	include( dirname( __FILE__ ) . '/abstract-class-dahz-framework-metabox.php' );
			
	include( dirname( __FILE__ ) . '/abstract-class-dahz-framework-taxonomy-metabox.php' );

	include( dirname( __FILE__ ) . '/class-dahz-framework-metabox.php' );

	include( dirname( __FILE__ ) . '/class-dahz-framework-taxonomy-metabox.php' );

	$dahz_framework->metabox = include( dirname( __FILE__ ) . '/class-dahz-framework-metabox-extend.php' );

	include( dirname( __FILE__ ) . '/class-dahz-framework-metabox-core.php' );
	
}