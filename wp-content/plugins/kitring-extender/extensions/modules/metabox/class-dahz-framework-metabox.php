<?php
if( !class_exists( 'Dahz_Framework_Metabox' ) ){

	Class Dahz_Framework_Metabox extends Dahz_Framework_Metabox_abstract{

		public $id = '';

		public $post_value = '';

		public $panels = array();

		public $sections = array();

		public $sections_no_panel = array();

		public $controls = array();

		public function __construct( $id, $post ){

			$this->id = $id;

			$this->post_value = get_post_meta( $post->ID, $id, true );

		}

		public function dahz_framework_metabox_add_panel( $id, $title, $dependencies = array() ){

			$this->panels[$id] = array(
				'title'			=> $title,
				'sections'		=> array(),
				'has_child'		=> true,
				'dependencies'	=> $dependencies
			);

		}

		public function dahz_framework_metabox_add_section( $id, $title, $panel = '', $dependencies = array() ){

			if( !empty( $panel ) && isset( $this->panels[$panel] ) ){
				$this->panels[$panel]['sections'][$id] = array(
					'title'			=> $title,
					'href'			=> $id,
					'dependencies'	=> $$dependencies
				);
				$this->sections[$id] = array();

			} else {

				$this->panels[$id] = array(
					'title'			=> $title,
					'has_child'		=> false,
					'href'			=> $id,
					'dependencies' 	=> $dependencies
				);
				$this->sections[$id] = array();

			}

		}

		public function dahz_framework_metabox_add_field( $section = '', $field = array() ){

			if( empty( $section ) || empty( $field ) || !isset( $field['id'] ) || !isset( $field['type'] ) ) return;

			$this->sections[$section][$field['id']] = array(
				'type'			=> $field['type'],
				'title'			=> !empty( $field['title'] ) ? $field['title'] : '',
				'description'	=> !empty( $field['description'] ) ? $field['description'] : '',
				'default'		=> !empty( $field['default'] ) ? $field['default'] : '',
				'options'		=> !empty( $field['options'] ) && is_array( $field['options'] ) ? $field['options'] : array(),
				'groups'		=> array(),
				'dependencies'	=> !empty( $field['dependencies'] ) && is_array( $field['dependencies'] ) ? $field['dependencies'] : array()
			);

		}

		public function dahz_framework_metabox_add_group_field( $section = '', $field_id = '', $field = array() ){

			if( empty( $section ) || empty( $field_id ) || empty( $field ) || !isset( $field['id'] ) || !isset( $field['type'] ) || !isset( $this->sections[$section][$field_id] ) )
				return;

			$this->sections[$section][$field_id]['groups'][$field['id']] = array(
				'type'			=> $field['type'],
				'title'			=> !empty( $field['title'] ) ? $field['title'] : '',
				'description'	=> !empty( $field['description'] ) ? $field['description'] : '',
				'default'		=> !empty( $field['default'] ) ? $field['default'] : '',
				'options'		=> !empty( $field['options'] ) && is_array( $field['options'] ) ? $field['options'] : array(),
				'dependencies'	=> !empty( $field['dependencies'] ) && is_array( $field['dependencies'] ) ? $field['dependencies'] : array()
			);

		}

		public function dahz_framework_metabox_add_repeater_field( $section = '', $field_id = '', $field = array() ){

			if( empty( $section ) || empty( $field_id ) || empty( $field ) )
				return;

			foreach ($field as $key => $value) {

				$this->sections[$section][$field_id['id']][$value['id']] = array(
					'type'			=> $field[$key]['type'],
					'title'			=> !empty( $field[$key]['title'] ) ? $field[$key]['title'] : '',
					'description'	=> !empty( $field[$key]['description'] ) ? $field[$key]['description'] : '',
					'default'		=> !empty( $field[$key]['default'] ) ? $field[$key]['default'] : '',
					'options'		=> !empty( $field[$key]['options'] ) && is_array( $field[$key]['options'] ) ? $field[$key]['options'] : array(),
					'dependencies'	=> !empty( $field[$key]['dependencies'] ) && is_array( $field[$key]['dependencies'] ) ? $field[$key]['dependencies'] : array()
				);

			}

		}

	}

}
