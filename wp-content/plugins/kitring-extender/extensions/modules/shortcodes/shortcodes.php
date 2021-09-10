<?php

if( !class_exists('DahzExtender_Shortcodes') ) {
	
    Class DahzExtender_Shortcodes {
		
		public $shortcodes = array();
		
		static $shortcodes_custom_css = '';
		
        function __construct(){

			$this->defined_constants();
			$this->initialize();
			$this->includes();
			$this->add_shortcodes();
			$this->hooks();
						
        }
		
		public function defined_constants(){
			
			define( 'DAHZEXTENDER_SHORTCODE_PATH', DAHZEXTENDER_MODULES_ABSPATH . 'shortcodes/' );
			define( 'DAHZEXTENDER_SHORTCODE_MAP_PATH', DAHZEXTENDER_SHORTCODE_PATH . 'includes/shortcode-maps/' );
			define( 'DAHZEXTENDER_SHORTCODE_VIEW_PATH', DAHZEXTENDER_SHORTCODE_PATH . 'includes/templates/' );
			define( 'DAHZEXTENDER_SHORTCODE_PARAMS_PATH', DAHZEXTENDER_SHORTCODE_PATH . 'includes/params/' );
			define( 'DAHZEXTENDER_SHORTCODE_CLASSES_PATH', DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/' );
			define( 'DAHZEXTENDER_SHORTCODE_URI', DahzExtender::plugin_url() . '/extensions/modules/shortcodes/' );

		}
		
		public function initialize(){
			
			$this->shortcodes = include_once( DAHZEXTENDER_SHORTCODE_PATH . 'data-shortcodes.php' );
			
		}
		
		public function includes(){
			
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-shortcodes-helper.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/shortcodes-functions.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-framework-shortcode-admin.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-framework-shortcode-render.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-framework-shortcode-autocomplete-query.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-framework-shortcode-autocomplete-filter.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-framework-shortcode-vc-mapper.php' );
			include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/classes/class-dahz-framework-shortcode-woocommerce.php' );
			
		}
		
		public function add_shortcodes(){

			foreach( $this->shortcodes as $file => $shortcode ) {

				$shortcode_render = new Dahz_Framework_Shortcode_Render(
					$shortcode['view'],
					isset( $shortcode['is_lazyload'] ) ? $shortcode['is_lazyload'] : false,
					isset( $shortcode['need_params'] ) ? $shortcode['need_params'] : false,
					isset( $shortcode['js'] ) ? $shortcode['js'] : false,
					!empty( $shortcode['disabled_wrapper'] ) ? true : false
				);
				
				if( $shortcode['view'] !== 'dahz-block' ){
					
					add_shortcode( $shortcode['view'], array( $shortcode_render, 'dahz_framework_shortcode_views_render' ) );
				
				}
				
			}

		}
		
		public function hooks(){
			
			add_action( 'vc_before_init', array( $this, 'locate_shortcodes_templates' ), 11 );
			
			add_action( 'vc_before_init', array( $this, 'shortcode_initialize' ), 11 );
			
			add_action( 'vc_base_register_front_css', array( $this, 'dahz_shortcode_register_js_css' ) );

			add_action( 'vc_base_register_admin_css', array( $this, 'dahz_shortcode_register_js_css' ) );
			
			add_action( 'vc_backend_editor_enqueue_js_css', array( $this, 'dahz_shortcode_editor_enqueue_js_css' ) );

			add_action( 'vc_frontend_editor_enqueue_js_css', array( $this, 'dahz_shortcode_editor_enqueue_js_css' ) );
			
			add_action( 'save_post', array( $this, 'shortcode_save_post' ) );
						
			add_action( 'init', array( $this, 'shotcode_params' ) );
			
			add_action( 'init', array( $this, 'shortcode_img_size' ) );
			
			add_action( 'wp_enqueue_scripts', array( $this, 'dahz_shortcode_enqueue_js_css' ), 11 );
			
			add_action( 'wp_ajax_dahz_framework_get_lazy_shortcodes', array( $this, 'get_lazy_shortcodes' ) );
			
			add_action( 'wp_ajax_nopriv_dahz_framework_get_lazy_shortcodes', array( $this, 'get_lazy_shortcodes' ) );
						
			add_action( 'wp_head', array( $this, 'shortcode_set_preview' ) );
			
			add_filter( 'dahz_framework_default_styles', array( $this, 'dahz_shortcode_style' ), 10, 1 );
			
		}
				
		private function get_frontend_scripts() {

			return apply_filters(
				'dahz_shortcodes_scripts',
				array(
					array(
						'settings'		=> array( 'dahz-lazy-shortcode', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-lazy-shortcode.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-post-tabs', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-post-tabs.min.js', array( 'dahz-framework-script', 'isotope' ), null, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-pricing-label', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-pricing-label.min.js', array( 'dahz-framework-script' ), null, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-portfolio-tabs', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-portfolio-tabs.min.js', array( 'dahz-framework-script', 'isotope' ), null, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-image-gallery', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-image-gallery.min.js', array( 'dahz-framework-script', 'tilt', 'isotope', 'imagesloaded' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-milestone', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-milestone.min.js', array( 'dahz-framework-script', 'countup' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-category-showcase', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-category-showcase.min.js', array( 'dahz-framework-script', 'isotope', 'tilt' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-cascading-image', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-cascading-image.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-progressbar', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-progressbar.min.js', array( 'dahz-framework-script', 'lineProgressbar' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-pie', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-pie.min.js', array( 'dahz-framework-script', 'pie-chart' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-product-tab', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-product-tab.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-before-after', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/frontend/dahz-shortcode-before-after.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'tilt', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/tilt.jquery.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'lineProgressbar', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/jquery.lineProgressbar.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'pie-chart', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/pie-chart.min.js', array( 'dahz-framework-script' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'countup', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/countUp.min.js', array( 'jquery' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-vc-extend', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-extend.min.js', array( 'jquery' ), null, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'bootstrap-datetimepicker', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/bootstrap-datetimepicker.min.js', array( 'jquery' ), '1.0.0', true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'easing', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/jquery.easings.min.js', array( 'jquery' ), false, true ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'multiscroll', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/plugins/jquery.multiscroll.min.js', array( 'easing', 'imagesloaded' ), false, true ),
						'enqueue'		=> false
					),
				)
			);

		}

		private function get_frontend_styles() {

			return apply_filters(
				'dahz_shortcodes_frontend_styles',
				array(
					array(
						'settings'		=> array( 'dahz-font-beauty-salon', DAHZEXTENDER_SHORTCODE_URI . 'assets/fonts/beauty-salon/beauty-salon.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-font-grooming', DAHZEXTENDER_SHORTCODE_URI . 'assets/fonts/grooming/grooming.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-font-salon', DAHZEXTENDER_SHORTCODE_URI . 'assets/fonts/salon/salon.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-font-tattoo-studio', DAHZEXTENDER_SHORTCODE_URI . 'assets/fonts/tattoo-studio/tattoo-studio.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-font-barbershop', DAHZEXTENDER_SHORTCODE_URI . 'assets/fonts/barbershop/barbershop.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcodes', DAHZEXTENDER_SHORTCODE_URI . 'assets/css/dahz-shortcodes.min.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'dahz-shortcode-admin', DAHZEXTENDER_SHORTCODE_URI . 'assets/css/admin/dahz-shortcode-admin.min.css' ),
						'enqueue'		=> false
					),
					array(
						'settings'		=> array( 'multiscroll', DAHZEXTENDER_SHORTCODE_URI . 'assets/css/extension/jquery.multiscroll.css' ),
						'enqueue'		=> false
					),
				)
			);

		}

		public function dahz_shortcode_register_js_css() {

			$scripts = $this->get_frontend_scripts();

			$styles = $this->get_frontend_styles();

			foreach( $scripts as $key => $script ) {

				call_user_func_array( empty( $script['enqueue'] ) ? 'wp_register_script' : 'wp_enqueue_script', $script['settings'] );

			}

			foreach( $styles as $key => $style ) {

				call_user_func_array( empty( $style['enqueue'] ) ? 'wp_register_style' : 'wp_enqueue_style', $style['settings'] );

			}

		}
		
		public function dahz_shortcode_enqueue_js_css() {
			
			wp_dequeue_style( 'js_composer_front' );

			wp_dequeue_script( 'wpb_composer_front_js' );

			wp_dequeue_script( 'vc_woocommerce-add-to-cart-js' );
			// dahz_shortcodes_helper()->get_font_json( 'tattoo-studio' );
			$id = false;
			
			if ( is_front_page() || is_home() ) {
				
				$id = get_queried_object_id();
				
			} else if ( is_singular() ) {
				
				if ( ! $id ) {
					
					$id = get_the_ID();
				
				}
				
			}
	
			if ( $id ) {
				
				global $post;

				if( isset( $post->post_content ) && strpos( $post->post_content, '[df_split_slider' ) !== false ){
					
					wp_enqueue_script( 'multiscroll' );
					
					dahz_framework_override_theme_mods( array(
						'general_transition_enable_transitions'	=> true
					) );

				}
				
			}

			wp_enqueue_style( 'dahz-shortcodes' );

		}
		
		public function dahz_shortcode_editor_enqueue_js_css(){
			
			// Enqueue js and theme css files
			wp_enqueue_script( 'bootstrap-datetimepicker' );
			wp_enqueue_style( 'dahz-shortcode-admin' );
			wp_enqueue_style( 'dahz-font-beauty-salon' );
			wp_enqueue_style( 'dahz-font-grooming' );
			wp_enqueue_style( 'dahz-font-salon' );
			wp_enqueue_style( 'dahz-font-tattoo-studio' );
			wp_enqueue_style( 'dahz-font-barbershop' );
			
		}
		
		public function locate_shortcodes_templates() {

			// Link your VC elements's folder
			if( function_exists('vc_set_shortcodes_templates_dir') ){

				vc_set_shortcodes_templates_dir( DAHZEXTENDER_SHORTCODE_PATH . 'includes/templates/vc-templates' );

			}

		}
		
		public function shotcode_params() {

			foreach ( glob( DAHZEXTENDER_SHORTCODE_PARAMS_PATH."/*.php" ) as $param ) {

				include_once( $param );

			}

		}
		
		public function shortcode_initialize() {

			foreach( $this->shortcodes as $file => $shortcode ) {

				$params = require_once DAHZEXTENDER_SHORTCODE_MAP_PATH . "{$file}.php";

				$this->shortcode_maps( $params );

			}

		}
		
		public function shortcode_maps( $params = array() ) {

			$params["category"] = !isset( $params["category"] ) ? array( "Dahz", "Content" ) : $params["category"];

			if( $params['base'] !== 'dahz_rev_slider' ){

				dahz_shortcode_add_package( $params, dahz_shortcode_get_group_animation() );

			}

			dahz_shortcode_add_package( $params, dahz_shortcode_get_group_extra() );

			dahz_shortcode_add_package( $params, dahz_shortcodes_get_group_dahz_id() );

			vc_map( $params );

		}

		
		public function shortcode_img_size() {

			add_image_size( 'de_sc_menu_thumb', 100, 100, array( 'center', 'center' ) );

		}
		
		public function get_lazy_shortcodes(){

			if( empty( $_POST[ 'base' ] ) ) exit;

			$atts = isset( $_POST[ 'atts' ] ) && is_array( $_POST[ 'atts' ] ) ? $_POST[ 'atts' ] : array();

			$base = $_POST[ 'base' ];

			$attributes = array_merge( $atts, array( 'atts' => $atts ) );

			dahz_framework_get_template(

				"{$base}.php",
				$atts,
				'includes/templates/',
				DAHZEXTENDER_SHORTCODE_PATH

			);

			exit;

		}
		
		public static function shortcode_save_post( $post_id ){

			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			if ( ! wp_is_post_revision( $post_id ) ){
				$post = get_post( $post_id );

				if( !$post ) return;
				
				self::$shortcodes_custom_css = '';
				
				self::parse_shortcodes_css( $post->post_content, $post );

				$css = self::$shortcodes_custom_css;
				
				if ( empty( $css ) ) {
					delete_post_meta( $post_id, 'dahz_shortcode_css' );
				} else {
					update_post_meta( $post_id, 'dahz_shortcode_css', $css );
				}

			}

		}
		
		public static function parse_shortcodes_css( $content, &$post, $start_offset = 0 ){

			if( empty( $content ) ) return;

			$css = '';

			WPBMap::addAllMappedShortcodes();

			preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes, PREG_OFFSET_CAPTURE );

			foreach ( $shortcodes[2] as $index => $tag ) {

				$attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ][0] ) );

				$attr_array = vc_map_get_attributes( $tag[0],  $attr_array );

				$key = isset( $attr_array['dahz_id'] ) ? $attr_array['dahz_id'] : uniqid();

				do_action( "dahz_shortcode_build_css_" . $tag[0], $css, $attr_array, $key );

			}

			foreach ( $shortcodes[5] as $shortcode_content ) {
				self::parse_shortcodes_css( $shortcode_content[0], $post, ( $shortcode_content[1] + $start_offset ) );
			}

		}
		
		public function shortcode_set_preview(){

			if( is_singular() && is_preview() ){

				global $post;
				
				self::$shortcodes_custom_css = '';

				self::parse_shortcodes_css( $post->post_content, $post );

				echo sprintf(
					'
					<style>
						%1$s
					</style>
					',
					self::$shortcodes_custom_css
				);

			}

		}
		
		public function dahz_shortcode_style( $default_styles ){

			if ( !is_singular() ) {
				return $default_styles;
			}

			$id = get_the_ID();

			if ( $id ) {

				$shortcodes_custom_css = get_post_meta( $id, 'dahz_shortcode_css', true );
				// dahz_framework_debug( $shortcodes_custom_css );
				if ( ! empty( $shortcodes_custom_css ) ) {

					$default_styles .= $shortcodes_custom_css;
				}
			}

			return $default_styles;

		}

    }

	new DahzExtender_Shortcodes;

}