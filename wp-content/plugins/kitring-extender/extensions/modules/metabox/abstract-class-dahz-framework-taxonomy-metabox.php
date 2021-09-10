<?php
if( !class_exists( 'Dahz_Framework_Taxonomy_Metabox_abstract' ) ){

	abstract Class Dahz_Framework_Taxonomy_Metabox_abstract extends Dahz_Framework_Metabox_abstract{


		public function dahz_framework_render_metabox(){

			wp_nonce_field( basename( __FILE__ ), 'dahz_nonce' );
			
			$html = '';

			foreach( $this->controls as $field_id => $field_options ){
				
				$html .= $this->dahz_framework_render_control( $field_id, $field_options );

			}

			echo( $html );

		}

		public function dahz_framework_render_control( $field_id, $field_options ){

			$type = $field_options['type'];

			$method = "dahz_framework_{$type}";

			$title  = $field_options['title'];

			$desc   = $field_options['description'];

			$html = '';

			if( method_exists( $this, $method ) ){

				$dependencies = '';

				if( !empty( $field_options['dependencies'] ) ){

					$dependencies = $this->dahz_framework_set_dependencies( $field_options['dependencies'], 'field' );

				}
				
				$tag_wrapper = $this->tag ? 'tr' : 'div';
								
				$tag_container = $this->tag ? 'td' : 'div';

				$html .= '
					<'.$tag_wrapper.' class="de-control__wrapper" ' . $dependencies . '>
						<'.$tag_container.' class="de-control__control">
							<div class="de-row-content__left-inner">
								<label for="dahz-framework-meta-text" class="de-row-title">'. esc_html( $title ) .'</label>
							</div>
						</'.$tag_container.'>
						<'.$tag_container.'>
				';
							$html .= $this->$method( $field_id, $field_options );

				$html .= '
							<p>'. esc_html( $desc ) .'</p>
						</'.$tag_container.'>
					</'.$tag_wrapper.'>
				';

			}

			return $html;

		}

		public function dahz_framework_get_value( $field_id, $field_options, $passed_value = false ){

			$value = '';

			if( isset( $this->post_value[$this->term_id][$field_id] ) ){

				$value = $this->post_value[$this->term_id][$field_id];

			} else {

				$value = $field_options['default'];

			}

			return $value;

		}

		public function dahz_framework_get_attribute( $field_id, $passed_value = false ){

			$attribute = '';

			$attribute .= sprintf('name="%1$s" id="%2$s"', esc_attr( $this->id . '[' . $field_id . ']' ), esc_attr( $this->id . '-' . $field_id ) );

			return $attribute;

		}
		
	}

}
