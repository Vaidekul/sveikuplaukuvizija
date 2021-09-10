<?php
/**
 * dahzextender functions
 *
 * @package  dahzextender
 * @since    1.0.0
 */
defined( 'ABSPATH' ) || exit;


/**
* 7. dahzextender_get_template_part
* -
* @param - $slug, $name
* @return -
*/
if( !function_exists( 'dahzextender_get_template_part' ) ){

	function dahzextender_get_template_part( $slug, $name = '' ){

		$dahzextender_template = '';

		if ( $name ) {
			$dahzextender_template = locate_template( array( "{$slug}-{$name}.php", DahzExtender()->template_path() . "{$slug}-{$name}.php" ) );
		}

		if( $name && !$dahzextender_template && file_exists( DahzExtender()->plugin_path() . "/templates/{$slug}-{$name}.php" ) ){
			$dahzextender_template = DahzExtender()->plugin_path() . "/templates/{$slug}-{$name}.php";
		}

		if ( !$dahzextender_template ) {
			$dahzextender_template = locate_template( array( "{$slug}.php", DahzExtender()->template_path() . "{$slug}.php" ) );
		}

		$dahzextender_template = apply_filters( 'dahzextender_get_template_part', $dahzextender_template, $slug, $name );

		if ( $dahzextender_template ) {
			load_template( $dahzextender_template, false );
		}

	}

}

/**
* 8. dahzextender_locate_template
* -
* @param - $template, $template_path, $default_path
* @return - apply_filters( 'dahzextender_locate_template', $dahz_locate_template, $template, $template_path, $default_path );
*/
if( !function_exists( 'dahzextender_locate_template' ) ){

	function dahzextender_locate_template( $template, $template_path = '', $default_path = '' ){

		global $dahzextender;

		$dahz_locate_template = '';

		if( empty( $template_path ) ){
			$template_path = DahzExtender()->template_path();
		}

		if( empty( $default_path ) ){
			$default_path = DahzExtender()->plugin_path() . '/templates/';
		}
		$dahz_locate_template = locate_template( array( trailingslashit( $template_path ) . $template, $template ) );

		if( !$dahz_locate_template ){
			$dahz_locate_template = $default_path . $template;
		}

		return apply_filters( 'dahzextender_locate_template', $dahz_locate_template, $template, $template_path, $default_path );

	}

}

/**
* 9. dahzextender_get_template
* -
* @param - $template, $params, $template_path, $default_path
* @return -
*/
if( !function_exists( 'dahzextender_get_template' ) ){

	function dahzextender_get_template( $template, $params = array(), $template_path = '', $default_path = '' ){

		$dahz_template = dahzextender_locate_template( $template, $template_path, $default_path );

		if ( ! empty( $params ) && is_array( $params ) ) {
			extract( $params );
		}

		if( file_exists( $dahz_template ) ){

			do_action( 'dahzextender_before_get_template', $dahz_template, $params, $template_path, $default_path );

			include( $dahz_template );

			do_action( 'dahzextender_after_get_template', $dahz_template, $params, $template_path, $default_path );

		}

	}

}

/**
* 10. dahzextender_get_template_html
* get html of builder element for render
* @param - $template, $params, $template_path, $default_path
* @return - ob_get_clean();
*/
if( !function_exists( 'dahzextender_get_template_html' ) ){

	function dahzextender_get_template_html( $template, $params = array(), $template_path = '', $default_path = '' ){

		ob_start();
		dahzextender_get_template( $template, $params, $template_path, $default_path );
		return ob_get_clean();

	}

}