<?php
/**
 * Dahz_Shortcodes_Helper setup
 *
 * @package  Dahz_Shortcodes_Helper
 * @since    1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Dahz_Shortcodes_Helper' ) ) {

	class Dahz_Shortcodes_Helper {

		static $_instance = false;

		public $field_options = array();

		public $field_group = array();
		
		static $fonts = array();

		public function __construct() {
			
			$this->field_options = include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/helper/dahz-shortcodes-helper-field-options.php' );
			
			$this->field_group = include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/helper/dahz-shortcodes-helper-field-group.php' );

			$this->get_fonts();
			
		}

		public static function instance() {
			
			if ( empty( self::$_instance ) ) {
				
				self::$_instance = new self();
				
			}

			return self::$_instance;

		}
		
		public function get_fonts() {

			foreach ( glob( DAHZEXTENDER_SHORTCODE_PATH."/includes/fonts/*.php" ) as $param ) {

				self::$fonts[ basename( $param, ".php" ) ] = json_decode( include( $param ), true );
				
			}
			
		}
		
		public function get_font( $font_name ) {
			
			return isset( self::$fonts[ $font_name ] ) ? self::$fonts[ $font_name ] : array();
			
		}
		
		public function get_font_json( $font_name ){
			
			$file = DAHZEXTENDER_SHORTCODE_PATH . "assets/fonts/{$font_name}/{$font_name}.json";
			
			if ( is_file( $file ) ) {
				
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				
				WP_Filesystem();
				
				global $wp_filesystem;

				if ( file_exists( $file ) ) {
					
					$fonts = json_decode( $wp_filesystem->get_contents( $file ), true );

					$prefix = $fonts['preferences']['fontPref']['prefix'];
					
					$fonts_array = array();
					
					foreach( $fonts['icons'] as $font ){
												
						$_fonts = array();
						
						$_fonts[ $prefix . $font['properties']['name'] ] = $font['properties']['name'];
						
						$fonts_array[] = $_fonts;
						
					}
					$wp_filesystem->put_contents(
						DAHZEXTENDER_SHORTCODE_PATH . "includes/fonts/{$font_name}.php", 
						sprintf(
							'<?php return %1$s%2$s%1$s;',
							"'",
							json_encode( $fonts_array )
						) 
					);
					
					
				}
				
			}
			
		}


	}

}
