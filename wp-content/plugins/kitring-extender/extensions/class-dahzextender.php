<?php
/**
 * DahzExtender setup
 *
 * @package  DahzExtender
 * @since    1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'DahzExtender' ) ) {

	class DahzExtender {

		protected static $_instance = null;

		public static $modules = array();

		public static $available_modules = array();

		public static $unavailable_modules = array();

		public function __construct() {
			$this->define_constants();
			$this->includes();
			$this->init_hooks();
			do_action( 'dahzextender_loaded' );
		}

		public static function instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;

		}

		/**
		 * Define WC Constants.
		 */
		private function define_constants() {
			$this->define( 'DAHZEXTENDER_ABSPATH', dirname( DAHZEXTENDER_PLUGIN_FILE ) . '/' );
			$this->define( 'DAHZEXTENDER_MODULES_ABSPATH', DAHZEXTENDER_ABSPATH . 'extensions/modules/' );
			$this->define( 'DAHZEXTENDER_ASSETS_ABSPATH', DAHZEXTENDER_ABSPATH . 'extensions/assets/' );
		}

		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}
		
		private function includes() {
			self::$modules = include_once DAHZEXTENDER_ABSPATH . 'extensions/data-dahzextender-modules.php';
			include_once DAHZEXTENDER_ABSPATH . 'extensions/dahzextender-functions.php';
		}

		private function init_hooks() {
			
			add_action( 'dahz_framework_module_init', array( $this, 'load_modules' ), 10 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		
		}
		
		public function load_modules() {

			do_action( 'dahzextender_module_init' );

			if ( !empty( self::$modules ) ) {

				foreach( self::$modules as $module_name => $module_option ) {

					$is_include = true;

					if ( is_array( $module_option ) && !empty( $module_option ) ) {
						
						if ( !empty( $module_option['class_dependencies'] ) ) {

							if ( !is_array( $module_option['class_dependencies'] ) && !empty( $module_option['class_dependencies'] ) ) {

								if ( !class_exists( $module_option['class_dependencies'] ) ) {

									$is_include = false;

								}

							} else {

								foreach( $module_option['class_dependencies'] as $class ) {

									if ( !class_exists( $class ) ) {

										$is_include = false;

										break;

									}

								}

							}

						}

					}

					if ( $is_include && $this->load_file( DAHZEXTENDER_MODULES_ABSPATH . $module_name . '/' . $module_name . '.php' ) ) {

						self::$available_modules[] = $module_name;

						do_action( "dahzextender_module_{$module_name}_init", DAHZEXTENDER_MODULES_ABSPATH . $module_name, $this->plugin_url() . $module_name );

					} else {

						self::$unavailable_modules[] = $module_name;

					}

				}

			}

		}
		
		public function enqueue_scripts() {

			$scripts = $this->get_frontend_scripts();

			$styles = $this->get_frontend_styles();

			foreach( $scripts as $key => $script ) {

				call_user_func_array( empty( $script['enqueue'] ) ? 'wp_register_script' : 'wp_enqueue_script', $script['settings'] );

			}

			foreach( $styles as $key => $style ) {

				call_user_func_array( empty( $style['enqueue'] ) ? 'wp_register_style' : 'wp_enqueue_style', $style['settings'] );

			}

		}
		
		public function load_textdomain() {

			load_plugin_textdomain( 'sobari_sc', false, DAHZEXTENDER_ABSPATH . '/languages/' );

		}
		
		public static function get_modules(){
			return self::$modules;
		}

		/**
		 * Get the plugin url.
		 *
		 * @return string
		 */
		public static function plugin_url() {
			return untrailingslashit( plugins_url( '/', DAHZEXTENDER_PLUGIN_FILE ) );
		}

		/**
		 * Get the plugin path.
		 *
		 * @return string
		 */
		public static function plugin_path() {
			return untrailingslashit( plugin_dir_path( DAHZEXTENDER_PLUGIN_FILE ) );
		}

		public static function template_path() {
			return apply_filters( 'dahzextender_template_path', 'dahz-extend-templates/' );
		}

		private function load_file( $path, $args = array() ) {
			if ( $path && is_readable( $path ) ) {
				include_once( $path );
				return true;
			}
			return false;
		}

		private function get_frontend_scripts() {

			return apply_filters(
				'dahzextender_frontend_scripts',
				array()
			);

		}

		private function get_frontend_styles() {

			return apply_filters(
				'dahzextender_frontend_styles',
				array()
			);

		}

	}

}
