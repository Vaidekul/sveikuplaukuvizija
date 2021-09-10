<?php

/**
 * dahz_framework_shortcode_Woocommerce
 * render pagination on shortcodes
 * @since 1.0.0
 * @author Dahz - KW
 * @param -
 * @return -
 */
if( !class_exists( 'Dahz_Framework_Shortcode_Woocommerce' ) ){
	
	class Dahz_Framework_Shortcode_Woocommerce{
		
		public $woo_shortcodes = array(
			'top_rated_products',
			'products',
			'recent_products',
			'best_selling_products',
			'sale_products',
			'products',
			'featured_products'
		);
		
		public $customizer_column = '';//dahz_framework_get_option( 'woo_shop_desktop_column', '4' );
		
		public $customizer_layout = '';//dahz_framework_get_option( 'woo_shop_style', 'layout-1' );
		
		public function __construct(){
			
			add_filter( 'woocommerce_shortcode_products_query', array( $this, 'dahz_framework_shortcode_products_query' ), 10, 3 );
			
			//add_action( "woocommerce_shortcode_after_products_loop", array( $this, 'dahz_framework_shortcode_after_products_loop' ), 10, 1 );

		}
		
		public function dahz_framework_shortcode_products_query( $query_args, $atts, $type ){

			if( preg_match('#dahz_product_brand__#', $atts['class'], $matches, PREG_OFFSET_CAPTURE ) ){
				
				$brands = explode( '__', $atts['class'] );
				
				$brand_ids = '';
				
				if( isset( $brands[1] ) ){
						
					$brand_ids = str_replace( '|', ',', $brands[1] );
					
				}
				
				if( !isset( $query_args['tax_query'] ) ){
					
					$query_args['tax_query'] = array();
				
				}
				
				$query_args['tax_query'][] = array(
					'taxonomy' => 'brand',
					'terms'    => array_map( 'sanitize_title', explode( ',', $brand_ids ) ),
					'field'    => 'id',
					'operator' => 'IN',
				);
												
			}
			
			if( preg_match('#dahz_product_badge_new#', $atts['class'], $matches, PREG_OFFSET_CAPTURE ) ){
				
				if( !isset( $query_args['meta_query'] ) ){
					
					$query_args['meta_query'] = array();
				
				}
				
				$query_args['meta_query'][] = array(
					'key' 		=> 'dahz_is_custom_badge',
					'value' 	=> 'on',
					'compare' 	=> '='
				);
												
			}
			
			if( preg_match('#dahz-sc-enable-load-more#', $atts['class'], $matches, PREG_OFFSET_CAPTURE ) ){
				
				$query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
									
			}

			return $query_args;
			
		}
		
		public function dahz_framework_shortcode_after_products_loop( $atts ){

			if( preg_match('#dahz-sc-enable-load-more#', $atts['class'], $matches, PREG_OFFSET_CAPTURE ) ){
				
				$shortcode = new WC_Shortcode_Products( $atts, 'products' );

				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				
				$args = $shortcode->get_query_args();
								
				$args['paged'] = $paged;
				
				unset($args['no_found_rows']);

				$products = new WP_Query( $args );
				
				$max = intval( $products->max_num_pages );
				
				$next = next_posts( $max, false );
				
				if( !empty( $next ) ){
					
					printf(
						'
						<div class="de-sc-loadmore uk-text-center">
							<a href="%1$s" class="de-sc-pagination__nav-btn de-btn de-btn--boxed de-btn--slide-bottom de-btn--fill">%2$s</a>
							<div class="de-sc-loadmore--loader uk-hidden" data-uk-spinner></div>
						</div>
						',
						esc_url( $next ),
						__( 'Load More', 'sobari' ),
						__( 'LOADING', 'sobari' )
					);
					
				}
				
			}
			
		}
		
	}
	
	new Dahz_Framework_Shortcode_Woocommerce();
	
}