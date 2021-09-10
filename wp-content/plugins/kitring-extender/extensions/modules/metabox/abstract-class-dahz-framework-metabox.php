<?php
if( !class_exists( 'Dahz_Framework_Metabox_abstract' ) ){

	abstract Class Dahz_Framework_Metabox_abstract{

		public function dahz_framework_set_dependencies( $dependencies, $type ){

			$dependency = '';

			$operator = '&&';

			if( isset( $dependencies['operator'] ) ){

				$operator = $dependencies['operator'];

				unset( $dependencies['operator'] );

			}

			$dependency = htmlspecialchars( json_encode( $dependencies ) );

			$dependency = 'dependencies="' . $dependency . '" data-dependencies-type="' . $type . '" data-dependencies-operator="' . $operator . '"';

			return $dependency;

		}

		private function dahz_framework_set_default_field_args( &$field ){

			$field = array(
				'id'			=> $field['id'],
				'type'			=> $field['type'],
				'title'			=> !empty( $field['title'] ) ? $field['title'] : '',
				'description'	=> !empty( $field['description'] ) ? $field['description'] : '',
				'default'		=> !empty( $field['default'] ) ? $field['default'] : '',
				'options'		=> !empty( $field['options'] ) && is_array( $field['options'] ) ? $field['options'] : array(),
				'groups'		=> array(),
				'dependencies'	=> !empty( $field['dependencies'] ) && is_array( $field['dependencies'] ) ? $field['dependencies'] : array()
			);
		}

		public function dahz_framework_render_metabox(){

			wp_nonce_field( basename( __FILE__ ), 'dahz_nonce' );

			$html = '<div class="de-metabox">';

			$html .= '<ul class="de-metabox-menu">';

			foreach( $this->panels as $menu => $parent ){

				if( !empty( $parent['sections'] ) && $parent['has_child'] ){

					$dependencies = '';

					if( !empty( $parent['dependencies'] ) ){

						$dependencies = $this->dahz_framework_set_dependencies( $parent['dependencies'], 'panel' );

					}

					$html .= '<li class="menu-item has-child" '.$dependencies.'>';

						$html .= '<a href="#">'. $parent['title'] .'</a>';

							$html .= '<ul class="de-metabox-menu__inner">';

								$html .= '<li class="de-metabox-menu__inside--item close"><a href="#">close</a></li>';

									foreach( $parent['sections'] as $menus => $menuitem ){

										$dependencies = '';

										if( !empty( $parent['dependencies'] ) ){

											$dependencies = $this->dahz_framework_set_dependencies( $parent['dependencies'], 'section' );

										}
										$html .= '
													<li class="de-metabox-menu__inside--item" ' . $dependencies . '>
														<a href="#'. $menuitem['href'] .'">'. $menuitem['title'] .'</a>
													</li>';

									}

							$html .= '</ul>';

						$html .= '</a>';

					$html .= '</li>';

				}

				if( !$parent['has_child'] ){

					$dependencies = '';

					if( !empty( $parent['dependencies'] ) ){

						$dependencies = $this->dahz_framework_set_dependencies( $parent['dependencies'], 'section' );

					}

					$html .= '<li class="de-metabox-menu__inside--item" ' . $dependencies . '>';

						$html .= '<a href="#'.$parent['href'].'">'. $parent['title'] .'</a>';

					$html .= '</li>';

				}

			}
			$html .= '</ul>';

			$html .= '<div class="de-metabox-content">';

			$html .= $this->dahz_framework_render_section_content();

			$html .= '</div>';

			$html .= '</div>';

			echo( $html );

		}

		public function dahz_framework_render_section_content(){

			$html = '';

			foreach( $this->sections as $id_section => $section ){

				$html .= '<div id="'.$id_section.'" class="de-metabox-inner">';

				foreach( $section as $field_id => $field_options ){

					$html .= $this->dahz_framework_render_control( $field_id, $field_options );

				}

				$html .= '</div>';

			}

			return $html;

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

				$html .= '
					<div class="de-row-content" ' . $dependencies . '>
						<div class="de-row-content__left">
							<div class="de-row-content__left-inner">
								<label for="dahz-framework-meta-text" class="de-row-title">'. esc_html( $title ) .'</label>';

				$html .= $this->$method( $field_id, $field_options );

				$html .=	'</div>
						</div>
						<div class="de-row-content__right">
				';

				$html .= '<p>'. esc_html( $desc ) .'</p>
						</div>
					</div>
				';

			}

			return $html;

		}

		public function dahz_framework_get_value( $field_id, $field_options, $passed_value = false ){

			$value = '';

			if( $passed_value !== false ){

				$value = empty( $passed_value ) ? isset( $field_options['default'] ) ? $field_options['default'] : '' : $passed_value;

			} else{

				$value = !isset( $this->post_value[$field_id] ) ? isset( $field_options['default'] ) ? $field_options['default'] : '' : $this->post_value[$field_id];

			}

			return $value;

		}

		public function dahz_framework_get_attribute( $field_id, $passed_value = false ){

			$attribute = '';

			$name = $passed_value === false ? $this->id . '[' . $field_id . ']' : $field_id;

			$id = $passed_value === false ? $this->id . '-' . $field_id : $field_id;

			$attribute .= sprintf('name="%1$s" id="%2$s"', esc_attr( $name ), esc_attr( $id ) );

			return $attribute;

		}

		public function dahz_framework_textfield( $field_id, $field_options, $passed_value = false ){

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$html = '';

			$html .= '<input class="de-metabox-value" data-field-id="'.$field_id.'" type="text" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .'value="'. esc_attr( $value ) .'" />';

			return $html;

		}

		public function dahz_framework_range( $field_id, $field_options, $passed_value = false ){

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$html = '';

			$html .= '<input class="de-metabox-value uk-range" data-field-id="'.$field_id.'" type="range" min="1" max="6" step="1" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .'value="'. esc_attr( $value ) .'" />';

			return $html;

		}

		public function dahz_framework_oembed( $field_id, $field_options, $passed_value = false ){

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$html = '';

			$html .= '<input data-is-oembed="true" class="de-metabox-value" data-field-id="'.$field_id.'" type="text" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .'value="'. esc_attr( $value ) .'" />';

			$html .= '<div class="oembed-container"></div>';

			return $html;

		}

		public function dahz_framework_select( $field_id, $field_options, $passed_value = false ){

			$html = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			if( !empty( $field_options['options'] ) && is_array( $field_options['options'] ) ){

				$html .= '<div class="select-wrapper">';

				$html .= '<select data-field-id="'.$field_id.'" class="de-metabox-value de-select" ' . $this->dahz_framework_get_attribute( $field_id, $passed_value ) . '>';

				foreach( $field_options['options'] as $option_id => $option_title ){

					$html .= sprintf('
						<option value="%1$s" %3$s>%2$s</option>
						',
						$option_id,
						esc_html( $option_title ),
						selected( $value, $option_id, false )
					);

				}

				$html .= '</select>';

				$html .= '</div>';

			}

			return $html;

		}

		public function dahz_framework_textarea( $field_id, $field_options, $passed_value = false ){

			$html = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$desc  = $field_options['description'];

			$html  = '';

			$html .= '<textarea class="de-metabox-value" data-field-id="'.$field_id.'" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .'>'. stripslashes( $value ).'</textarea>';

			return $html;

		}

		public function dahz_framework_color_picker( $field_id, $field_options, $passed_value = false ){

			$html = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$desc  = $field_options['description'];

			$html .= '';

			$html .= '<input data-alpha="true" data-field-id="'.$field_id.'"'. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .' type="text" value="'. esc_attr( $value ) .'" class="ds-meta-color color-picker de-metabox-value" />';

			return $html;

		}

		public function dahz_framework_image_uploader( $field_id, $field_options, $passed_value = false ){

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$image_src = empty( $value ) ? DAHZ_FRAMEWORK_URI . 'admin/assets/img/none.png': wp_get_attachment_image_src( $value, 'thumbnail' );

			$image_src = is_array( $image_src ) && isset( $image_src[0] ) ? $image_src[0] : $image_src;

			$enable_delete = empty( $value ) ? 'hide' : '';

			$desc  = $field_options['description'];

			$html  = '';

			$html  .= '
				<div class="de-image-wrap">
					<a href="#" class="de-image-wrap__delete ' . $enable_delete . '">-</a>
					<img src="'.$image_src.'" />
					<input data-field-id="'.$field_id.'" class="ds-meta-image-input de-metabox-value" type="hidden" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .' value="'. esc_attr( $value ) .'" />
					<a href="#" class="ds-meta-upload-button de-btn__admin">'. esc_html__( 'Upload', 'kitring' ) .'</a>
				</div>
			';

			return $html;

		}

		public function dahz_framework_multiple_image_uploader( $field_id, $field_options, $passed_value = false ){

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$images = explode( ',', $value );

			$images_container = '';

			foreach( $images as $image ){

				$image_src = wp_get_attachment_image_src( $image, 'thumbnail' );
				if ( isset( $image_src[0] ) ) {
					$images_container .= sprintf(
						'<div class="de-multiple-image-item" data-id="%1$s">
						<a href="#" class="de-multiple-image-item__delete">-</a>
						<img src="%2$s">
						</div>',
						$image,
						$image_src[0]
					);
				}

			}

			$desc  = $field_options['description'];

			$html  = '';

			$html .= '<div class="de-multiple-image">
						<div class="de-multiple-image-wrap">
							' . $images_container . '
							<input data-field-id="'.$field_id.'" class="de-metabox-value ds-meta-image-input" type="hidden" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .' value="'. esc_attr( $value ) .'" />
						</div>
						<a href="#" class="ds-meta-multiple-upload-button de-btn__admin">'. esc_html__( 'Upload', 'kitring' ) .'</a></div>
			';

			return $html;

		}

		public function dahz_framework_switcher( $field_id, $field_options, $passed_value = false ){

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$value = empty( $value ) ? 'off' : $value;

			$desc  = $field_options['description'];

			$html  = '';

			$html  .= '
						<div class="de-switcher">
							<span class="active"></span>
							<span class="off">OFF</span>
							<span class="on">ON</span>
							<input data-field-id="'.$field_id.'" type="hidden" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .' class="ds-switcher de-metabox-value" value="'. esc_attr( $value ) .'" data-default="no" />
						</div>
			';

			return $html;
		}

		public function dahz_framework_group( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';
			if( !empty( $field_options['groups'] ) && is_array( $field_options['groups'] ) ){

				foreach( $field_options['groups'] as $field_group_id => $field ){

					$type = $field['type'];

					$method = "dahz_framework_{$type}";

					if( method_exists( $this, $method ) ){

						$html .= '<label for="dahz-framework-meta-text" class="de-row-title">'. esc_html( $field['title'] ) .'</label>';

						$html .= $this->$method( $field_group_id, $field );

					}

				}

			}
			return $html;

		}

		public function dahz_framework_checkbox( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';

			$html .= '<ul class="de-checkbox">';

			$name = $passed_value === false ? $this->id . '[' . $field_id . ']' : $field_id;

			$id = $passed_value === false ? $this->id . '-' . $field_id : $field_id;

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$html .= sprintf('
				<li>
					<label for="%1$s">
						<input data-field-id="'.$field_id.'" class="styled-checkbox de-metabox-value" id="%1$s" type="checkbox" %3$s name="%2$s" value="1">
						%4$s
					</label>
				</li>
				',
				$id,
				$name,
				checked( $value, 1, false ),
				esc_html( $field_options['title'] )
			);

			$html .= '</ul>';

			return $html;

		}

		public function dahz_framework_multiple_checkbox( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';

			$values = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			if( !empty( $field_options['options'] ) && is_array( $field_options['options'] ) ){

				$html .= '<ul class="de-checkbox">';

				foreach( $field_options['options'] as $option_id => $option_title ){

					$name = $this->id . '[' . $field_id . ']' . '[' . $option_id . ']';

					$id = $this->id . '-' . $field_id . '-' . $option_id ;

					$value = $values[(int)$option_id] ? $values[(int)$option_id] : '';

					$html .= sprintf('
						<li>
							<label for="%1$s">
								<input data-field-id="'.$field_id.'" class="de-metabox-value styled-checkbox" id="%1$s" type="checkbox" %3$s name="%2$s" value="1">
								%4$s
							</label>
						</li>
					',
					$id,
					$name,
					checked( $value, 1, false ),
					$option_title);

				}

				$html .= '</ul>';
			}

			return $html;

		}

		public function dahz_framework_radio( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			if( !empty( $field_options['options'] ) && is_array( $field_options['options'] ) ){

				$html .= '<ul class="de-radio-button">';

				$name = $passed_value === false ? $this->id . '[' . $field_id . ']' : $field_id;

				foreach( $field_options['options'] as $option_id => $option_title ){

					$id = $passed_value === false ? $this->id . '-' . $field_id . '-' . $option_id : $field_id . '-' . $option_id;

					$html .= sprintf('
						<li>
							<input data-field-id="'.$field_id.'" class="styled-radio de-metabox-value" id="%1$s" type="radio" %3$s name="%2$s" value="%5$s">
							<label for="%1$s">%4$s</label>
							<div class="check"></div>
						</li>
					',
					$id,
					$name,
					checked( $value, $option_id, false ),
					$option_title,
					$option_id
					);

				}

				$html .= '</ul>';
			}
			return $html;

		}

		public function dahz_framework_radio_buttonset( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			if( !empty( $field_options['options'] ) && is_array( $field_options['options'] ) ){

				$html .= '<ul class="de-radio-button-set">';

				$name = $passed_value === false ? $this->id . '[' . $field_id . ']' : $field_id;

				foreach( $field_options['options'] as $option_id => $option_title ){

					$id = $passed_value === false ? $this->id . '-' . $field_id . '-' . $option_id : $field_id . '-' . $option_id;

					$html .= sprintf('
						<li>
							<input data-field-id="'.$field_id.'" class="de-metabox-value styled-radio" id="%1$s" type="radio" %3$s name="%2$s" value="%5$s">
							<label for="%1$s">%4$s</label>
						</li>
					',
					$id,
					$name,
					checked( $value, $option_id, false ),
					$option_title,
					$option_id
					);

				}

				$html .= '</ul>';
			}
			return $html;

		}

		public function dahz_framework_radio_image( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			if( !empty( $field_options['options'] ) && is_array( $field_options['options'] ) ){

				$html .= '<ul class="de-radio-image-button">';

				$name = $passed_value === false ? $this->id . '[' . $field_id . ']' : $field_id;

				foreach( $field_options['options'] as $option_id => $option_image ){

					$id = $passed_value === false ? $this->id . '-' . $field_id . '-' . $option_id : $field_id . '-' . $option_id;

					$html .= sprintf('
						<li>
							<label for="'.$field_id.'_%5$s">
								<input data-field-id="'.$field_id.'" type="radio" id="%1$s" name="%2$s" class="de-metabox-value" value="%5$s" %3$s>
								<img title="' . $field_id . '_%5$s" src="%4$s"/>
							</label>
						</li>
					',
					$id,
					$name,
					checked( $value, $option_id, false ),
					$option_image,
					$option_id
					);

				}

				$html .= '</ul>';
			}
			return $html;

		}

		public function dahz_framework_repeater( $field_id, $field_options, $passed_value = false ){

			$type = '';

			$html = '';

			$fields = '';

			$value = $this->dahz_framework_get_value( $field_id, $field_options, $passed_value );

			$values = !empty( $value ) ? dahz_framework_get_metabox_repeater_values( $value ) : array();

			if( !empty( $field_options['options'] ) && is_array( $field_options['options'] ) ){

				$default_values = array();
				
				foreach( $field_options['options'] as $option ){

					$this->dahz_framework_set_default_field_args( $option );

					$default_values[ $option['id'] ] = $option['default'];

					$fields .= sprintf(
						'<div class="de-repeater-field__item">
						%1$s
						%2$s
						%3$s
						</div>
						',
						'<label for="dahz-framework-meta-text" class="de-row-title">' . $option['title'] . '</label>',
						call_user_func( array( $this, 'dahz_framework_' . $option['type'] ), $option['id'], $option, $option['default'] ),
						'<p class="description">' . $option['description'] . '</p>'
					);

				}

				$html .= '<div class="de-repeater-container" data-default-values="' . esc_attr( json_encode( $default_values ) ) . '">';

				$html .= '<textarea data-field-id="'.$field_id.'" class="de-repeater-value" type="text" '. $this->dahz_framework_get_attribute( $field_id, $passed_value ) .'>' . esc_textarea( $value ) . '</textarea>';

				$name = $this->id . '[' . $field_id . ']';

				$html .= '<ul class="de-repeater">';

				if( !empty( $values ) && is_array( $values ) ){

					foreach( $values as $item_id => $items ){
						
						if( !isset( $items['id'] ) ){continue;}
						
						$html .= '
							<li class="de-repeater-item" data-item-id="' . esc_attr( $items['id'] ) . '">
							<a href="#" class="de-repeater-sort"><i class="icon-dragger"></i></a>
							<a href="#" class="de-repeater-edit"><i class="icon-edit"></i></a>
							<a href="#" class="de-repeater-delete"><i class="icon-close"></i></a>
							<a href="#" class="de-repeater-clone"><i class="icon-duplicate"></i></a>
								<div class="de-repeater-fields">
						';

						foreach( $field_options['options'] as $option ){

							$this->dahz_framework_set_default_field_args( $option );
							$html .= sprintf(
								'<div class="de-repeater-field__item">
									%1$s
									%2$s
									%3$s
								</div>
								',
								'<label for="dahz-framework-meta-text" class="de-row-title">' . $option['title'] . '</label>',
								call_user_func(
									array( $this, 'dahz_framework_' . $option['type'] ),
									$option['id'],
									$option,
									isset( $items['values'][ $option['id'] ] ) ? $items['values'][ $option['id'] ] : false
								),
								'<p class="description">' . $option['description'] . '</p>'
							);

						}

						$html .= '</div>';
						$html .= '</li>';

					}

				}

				$html .= '</ul>';

				$html .= sprintf(
					'
					<script type="text/html" class="de-repeater-template">
						<a href="#" class="de-repeater-sort" title="Drag to sort items"><i class="icon-dragger"></i></a>
						<a href="#" class="de-repeater-delete" title="Delete this item"><i class="icon-close"></i></a>
						<a href="#" class="de-repeater-clone" title="Clone this item"><i class="icon-duplicate"></i></a>
						<div class="de-repeater-fields">
						%1$s
						</div>
					</script>
					',
					$fields
				);

				$html .= '
					<button class="de-repeater-add"><span class="dashicons dashicons-plus"></span></button>
					</div>
				';
			}
			return $html;

		}

	}

}
