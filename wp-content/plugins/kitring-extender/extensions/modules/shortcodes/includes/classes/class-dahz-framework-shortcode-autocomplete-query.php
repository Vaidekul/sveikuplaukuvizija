<?php

/**
* 
*/
class Dahz_Framework_Shortcode_Autocomplete_Query {
	
	/**
	* Suggester for autocomplete by id/name/title/sku
	* 
	* @since 1.0
	* @param $query
	* @return array | id's from products with title/sku.
	*/
	
	public function dahz_autocomplete_sugester( $query_type, $query_value, $query ){
		
		switch( $query_type ){
			
			case 'post':
			
				switch( $query_value ){
					
					case 'product':
						return $this->dahz_product_autocomplete_sugester( $query );
						break;
					default:
						return $this->dahz_post_autocomplete_sugester( $query, $query_value );
						break;
					
				}
			
				break;
			
			case 'taxonomy':
				return $this->dahz_taxonomy_autocomplete_sugester( $query, false, $query_value );
				break;
			
		}
		
	}
	
	public function dahz_autocomplete_render( $query_type, $query_value, $query ){
		
		switch( $query_type ){
			
			case 'post':
				switch( $query_value ){
					
					case 'product':
						return $this->dahz_product_autocomplete_render( $query );
						break;
					default:
						return $this->dahz_post_autocomplete_render( $query );
						break;
					
				}
				break;
			
			case 'taxonomy':
				return $this->dahz_taxonomy_autocomplete_render( $query, $query_value );
				break;
			
		}
		
	}
	
	public function dahz_product_autocomplete_sugester( $query ) {
		global $wpdb;
		$product_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
					FROM {$wpdb->posts} AS a
					LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
					WHERE a.post_type = 'product' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )", $product_id > 0 ? $product_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_attr__( 'Id', 'js_composer' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_attr__( 'Title', 'js_composer' ) . ': ' . $value['title'] : '' ) . ( ( strlen( $value['sku'] ) > 0 ) ? ' - ' . esc_attr__( 'Sku', 'js_composer' ) . ': ' . $value['sku'] : '' );
				$results[] = $data;
			}
		}

		return $results;
	}
	
	public function dahz_post_autocomplete_sugester( $query, $query_value ) {
		global $wpdb;
		$product_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title 
					FROM {$wpdb->posts} AS a
					WHERE a.post_type = '{$query_value}' AND ( a.ID = '%d' OR a.post_title LIKE '%%%s%%' )", $product_id > 0 ? $product_id : - 1, stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_attr__( 'Id', 'js_composer' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_attr__( 'Title', 'js_composer' ) . ': ' . $value['title'] : '' );
				$results[] = $data;
			}
		}

		return $results;
	}


	/**
	* Find product by id
	* 
	* @since 1.0
	* @param $query
	* @return bool | array
	*/
	public function dahz_product_autocomplete_render( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get product
			$product_object = wc_get_product( (int) $query );
			if ( is_object( $product_object ) ) {
				$product_sku = $product_object->get_sku();
				$product_title = $product_object->get_title();
				$product_id = $product_object->get_id();

				$product_sku_display = '';
				if ( ! empty( $product_sku ) ) {
					$product_sku_display = ' - ' . esc_attr__( 'Sku', 'js_composer' ) . ': ' . $product_sku;
				}

				$product_title_display = '';
				if ( ! empty( $product_title ) ) {
					$product_title_display = ' - ' . esc_attr__( 'Title', 'js_composer' ) . ': ' . $product_title;
				}

				$product_id_display = esc_attr__( 'Id', 'js_composer' ) . ': ' . $product_id;

				$data = array();
				$data['value'] = $product_id;
				$data['label'] = $product_id_display . $product_title_display . $product_sku_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
	
	public function dahz_post_autocomplete_render( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get product
			$product_object = get_post( (int) $query );
			
			if ( is_object( $product_object ) ) {

				$product_title = $product_object->post_title;
				$product_id = $product_object->ID;
				$product_title_display = '';
				if ( ! empty( $product_title ) ) {
					$product_title_display = ' - ' . esc_attr__( 'Title', 'js_composer' ) . ': ' . $product_title;
				}

				$product_id_display = esc_attr__( 'Id', 'js_composer' ) . ': ' . $product_id;

				$data = array();
				$data['value'] = $product_id;
				$data['label'] = $product_id_display . $product_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
	
	public function dahz_taxonomy_autocomplete_sugester( $query, $slug = false, $query_value ) {
		global $wpdb;
		$cat_id = (int) $query;
		$query 	= trim($query);
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.term_id AS id, b.name AS name, b.slug AS slug 
						FROM {$wpdb->term_taxonomy} AS a 
						INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
						WHERE a.taxonomy = '{$query_value}' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )", $cat_id > 0 ? $cat_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );
		
		$result = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data 			= array();
				$data['value'] 	= $slug ? $value['slug'] : $value['id'];
				$data['label'] 	= esc_attr__( 'Id', 'js_composer' ) . ': ' . $value['id'] . ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . esc_attr__( 'Title', 'js_composer' ) . ': ' . $value['name'] : '' ) . ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . esc_attr__( 'Slug', 'js_composer' ) . ': ' . $value['slug'] : '' );
				$result[] 		= $data;
			}
		}

		return $result;
	}

	public function dahz_taxonomy_autocomplete_render( $query, $query_value ) {
		$query 	= $query['value'];
		$cat_id = (int) $query;
		$term 	= get_term( $cat_id, $query_value );
		return $this->dahz_taxonomy_term_output( $term );
	}

	public function dahz_taxonomy_term_output( $term ) {
		$term_slug 	= $term->slug;
		$term_title = $term->name;
		$term_id 	= $term->term_id;

		$term_slug_display = '';
		if ( ! empty( $term_slug ) ) {
			$term_slug_display = ' - ' . esc_attr__( 'Slug', 'js_composer' ) . ': ' . $term_slug ;
		}

		$term_title_display = '';
		if ( ! empty( $term_title ) ) {
			$term_title_display = ' - ' . esc_attr__( 'Title', 'js_composer' ) . ': ' . $term_title;
		}

		$term_id_display = esc_attr__( 'Id', 'js_composer' ) . ': ' . $term_id;

		$data 			= array();
		$data['value'] 	= $term_id;
		$data['label']	= $term_id_display . $term_title_display . $term_slug_display;

		return ! empty( $data ) ? $data : false;

	}


}
