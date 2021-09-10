<?php

/**
* 
*/
class Dahz_Framework_Shortcode_Autocomplete_Filter extends Dahz_Framework_Shortcode_Autocomplete_Query{
	
	public $shortcode_params = array(
		'product_ids'	=> array(
			'bases'		=> array(
				'dahz_product_page',
				'product_menu',
				//'product_info',
				'dahz_product_ids',
				'dahz_banner_info',
			),
			'callback'	=> 'dahz_product_ids_autocomplete_sugester',
			'render'	=> 'dahz_product_ids_autocomplete_render'
		),
		'product_ids1'	=> array(
			'bases'		=> array(
				'product_pair',
			),
			'callback'	=> 'dahz_product_ids_autocomplete_sugester',
			'render'	=> 'dahz_product_ids_autocomplete_render'
		),
		'product_ids2'	=> array(
			'bases'		=> array(
				'product_pair',
				
			),
			'callback'	=> 'dahz_product_ids_autocomplete_sugester',
			'render'	=> 'dahz_product_ids_autocomplete_render'
		),
		'product_cat_ids'=> array(
			'bases'		=> array(
				'dahz_product_top_rated',
				'dahz_product_sales',
				'dahz_product_newest',
				'product_menu',
				'dahz_product_featured',
				'dahz_product_category',
				'dahz_product_categories',
				//'dahz_product_brand',
				'dahz_product_best_sellings',
				//'dahz_product_badge_new',
				'dahz_product_attribute',
				'dahz_product_tab'
				
			),
			'callback'	=> 'dahz_product_cat_ids_autocomplete_sugester',
			'render'	=> 'dahz_product_cat_ids_autocomplete_render'
		),
		// 'product_brand_ids'=> array(
			// 'bases'		=> array(
				// 'product_menu',
				// 'dahz_product_brands_logo',
				// 'dahz_product_brands',
				// 'dahz_product_brand',
				
			// ),
			// 'callback'	=> 'dahz_product_brand_ids_autocomplete_sugester',
			// 'render'	=> 'dahz_product_brand_ids_autocomplete_render'
		// ),
		'post_ids'=> array(
			'bases'		=> array(
				'blog',
				'big_post',
				'post_slider',
				'post_grid',
				'post_list',
				'post_tabs',
			),
			'callback'	=> 'dahz_post_ids_autocomplete_sugester',
			'render'	=> 'dahz_post_ids_autocomplete_render'
		),
		'post_cat_ids'	=> array(
			'bases'		=> array(
				'blog',	
				'post_slider',
				'post_grid',
				'post_list',
				'post_tabs',
			),
			'callback'	=> 'dahz_post_cat_ids_autocomplete_sugester',
			'render'	=> 'dahz_post_cat_ids_autocomplete_render'
		),
		'post_portfolio_ids' => array(
			'bases'		=> array(
				'portfolio',
				'portfolio_slider',	
				'portfolio_list',
				'portfolio_tabs',
			),
			'callback'	=> 'dahz_post_portfolio_ids_autocomplete_sugester',
			'render'	=> 'dahz_post_portfolio_ids_autocomplete_render'
		),
		'post_categories' => array(
			'bases'		=> array(
				'category_showcase',				
			),
			'callback'	=> 'dahz_post_cat_ids_autocomplete_sugester',
			'render'	=> 'dahz_post_cat_ids_autocomplete_render'
		),
		'portfolio_cat_ids' => array(
			'bases'		=> array(
				'portfolio',
				'portfolio_slider',
				'portfolio_list',
				'portfolio_tabs',
			),
			'callback'	=> 'dahz_portfolio_cat_ids_autocomplete_sugester',
			'render'	=> 'dahz_portfolio_cat_ids_autocomplete_render'
		)
	);

	function __construct() {
		
		foreach( $this->shortcode_params as $param_name => $options ){
			
			foreach( $options['bases'] as $base ){
				
				// Get sugestion(find). Must return an array
				add_filter( "vc_autocomplete_{$base}_{$param_name}_callback", array( $this, $options['callback'] ), 10, 1 );
				// for param: ID default value filter
				add_filter( "vc_autocomplete_{$base}_{$param_name}_render", array( $this, $options['render'] ), 10, 1 );
				
			}
			
		}
		
	}

	/**
	* Suggester for autocomplete by id/name/title/sku
	* 
	* @since 1.0
	* @param $query
	* @return array | id's from products with title/sku.
	*/
	public function dahz_product_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'post', 'product', $query );
		
	}
	public function dahz_product_cat_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'taxonomy', 'product_cat', $query );
		
	}
	public function dahz_product_brand_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'taxonomy', 'brand', $query );
		
	}
	public function dahz_post_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'post', 'post', $query );
		
	}
	public function dahz_post_cat_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'taxonomy', 'category', $query );
		
	}
	public function dahz_post_portfolio_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'post', 'portfolio', $query );
		
	}
	public function dahz_portfolio_cat_ids_autocomplete_sugester( $query ) {

		return $this->dahz_autocomplete_sugester( 'taxonomy', 'portfolio_categories', $query );
		
	}

	/**
	* Find product by id
	* 
	* @since 1.0
	* @param $query
	* @return bool | array
	*/
	public function dahz_product_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'post', 'product', $query );
		
	}
	public function dahz_product_cat_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'taxonomy', 'product_cat', $query );
		
	}
	public function dahz_product_brand_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'taxonomy', 'brand', $query );
		
	}
	public function dahz_post_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'post', 'post', $query );
		
	}
	public function dahz_post_cat_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'taxonomy', 'category', $query );
		
	}
	public function dahz_post_portfolio_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'post', 'portfolio', $query );
		
	}
	public function dahz_portfolio_cat_ids_autocomplete_render( $query ) {

		return $this->dahz_autocomplete_render( 'taxonomy', 'portfolio_categories', $query );
		
	}

}
new Dahz_Framework_Shortcode_Autocomplete_Filter();
