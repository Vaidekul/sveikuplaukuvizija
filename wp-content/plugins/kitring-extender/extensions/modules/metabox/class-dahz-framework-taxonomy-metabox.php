<?php
if( !class_exists( 'Dahz_Framework_Taxonomy_Metabox' ) ){
	
	Class Dahz_Framework_Taxonomy_Metabox extends Dahz_Framework_Taxonomy_Metabox_abstract{
		
		public $taxonomy = '';
		
		public $id = '';
		
		public $term_id = '';
		
		public $tag = false;
		
		public $controls = array();
		
		public $term_value = array();

		public function __construct( $taxonomy, $term_id = false, $tag = false ){

			$this->taxonomy = $taxonomy;
			
			$this->term_id = $term_id;
			
			$this->tag = $tag;
			
			$this->id = $taxonomy;
			
			$this->post_value = get_option( "dahz_framework_taxonomy_{$taxonomy}" );
			
		}
		
		public function dahz_framework_metabox_add_field( $field = array() ){
			
			if( empty( $field ) || !isset( $field['id'] ) || !isset( $field['type'] ) ) return;
			
			$this->controls[$field['id']] = array(
				'type'			=> $field['type'],
				'title'			=> !empty( $field['title'] ) ? $field['title'] : '',
				'description'	=> !empty( $field['description'] ) ? $field['description'] : '',
				'default'		=> !empty( $field['default'] ) ? $field['default'] : '',
				'options'		=> !empty( $field['options'] ) && is_array( $field['options'] ) ? $field['options'] : array(),
				'dependencies'	=> !empty( $field['dependencies'] ) && is_array( $field['dependencies'] ) ? $field['dependencies'] : array()
			);
			
		}

		
	}
	
}