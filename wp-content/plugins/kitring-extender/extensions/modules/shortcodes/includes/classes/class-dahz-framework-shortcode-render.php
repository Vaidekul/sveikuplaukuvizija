<?php

/**
 * Class: Dahz_Framework_Shortcode_Template
 * Description: class for manage shortocode based on theme
 * Author : Dahz/egi
 */

if ( !class_exists('Dahz_Framework_Shortcode_Render') ) {

	Class Dahz_Framework_Shortcode_Render {

		public $shortcode_view_template	= '';

		public $shortcode_counter = 1;

		public $is_lazyload = false;

		public $need_params = false;

		public $js = false;
		
		public $disabled_wrapper = false;

		function __construct( $shortcode_view_template, $is_lazyload = false, $need_params = false, $js = false, $disabled_wrapper = false ) {

			$this->shortcode_view_template = $shortcode_view_template;

			$this->is_lazyload = defined( 'DOING_AJAX' ) && DOING_AJAX ? false : $is_lazyload;

			$this->need_params = $need_params;

			$this->js = $js;
			
			$this->disabled_wrapper = $disabled_wrapper;

		}

		public function dahz_framework_shortcode_views_render( $atts, $content = null ) {
			
			$shortcode_view = is_array( $this->shortcode_view_template ) ? $this->shortcode_view_template['view'] : $this->shortcode_view_template;
			
			$atts = empty( $atts ) ? array() : $atts;

			$atts = vc_map_get_attributes( $shortcode_view, $atts );//Dahz_Framework_Shortcode_Template::dahz_framework_get_default_values( $shortcode_view, $atts );

			$key = isset( $atts['dahz_id'] ) ? $atts['dahz_id'] : uniqid();

			$is_lazyload = isset( $atts['enable_dahz_lazy_shortcode'] ) ? $atts['enable_dahz_lazy_shortcode'] : false;

			$is_lazyload = defined( 'DOING_AJAX' ) && DOING_AJAX ? false : $is_lazyload;

			$attribute = array();

			if( $is_lazyload ){

				wp_enqueue_script( 'dahz-lazy-shortcode' );

				$attribute['data-dahz-is-lazyload-shortcode'] = 'true';
				
				$atts['key'] = $key;
				
				$atts['content'] = $content;

				$attribute['data-dahz-shortcode-atts'] = json_encode( $atts );

				$attribute['data-dahz-shortcode-base'] = esc_attr( $this->shortcode_view_template );

			} elseif ( $this->need_params ) {

				$attribute['data-dahz-shortcode-atts'] = json_encode( $atts );

			}

			$dahz_shortcode_styles = array('animate-css');

			if( $this->js && !empty( $this->js ) ){

				$dahz_shortcode_scripts = array('waypoints');

				if( is_array( $this->js ) ){

					foreach( $this->js as $js ){

						wp_enqueue_script( $js );

						if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

							$dahz_shortcode_scripts[] = $js;

						}

					}

				} else {

					wp_enqueue_script( $this->js );

					if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

						$dahz_shortcode_scripts[] = $this->js;

					}

				}

				if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

					$attribute['data-dahz-shortcode-ajax-script'] = json_encode( $dahz_shortcode_scripts );
					
					$attribute['data-dahz-shortcode-ajax-style'] =json_encode( $dahz_shortcode_styles );

				}

			}
		
			$output = dahz_framework_get_template_html(
				"shortcode_wrapper.php",
				array(
					'atts' 				=> $atts,
					'is_lazyload'		=> $is_lazyload,
					'view'				=> $this->shortcode_view_template . '.php',
					'key'				=> $key,
					'js'				=> $this->js,
					'disabled_wrapper'	=> $this->disabled_wrapper,
					'content'			=> $content,
					'attribute'			=> $attribute
				),
				'includes/templates/',
				DAHZEXTENDER_SHORTCODE_PATH
			);

			$this->shortcode_counter++;

			return $output;

		}


	}

}