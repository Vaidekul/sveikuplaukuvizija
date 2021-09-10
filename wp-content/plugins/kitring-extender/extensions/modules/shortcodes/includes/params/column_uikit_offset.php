<?php

/**
*
*/
if( !class_exists( 'Dahz_Shortcode_Column_Offset_param' ) ){
	
	class Dahz_Shortcode_Column_Offset_param{
		
		public $settings = array();
		
		public $value = '';
		
		public $values = array();
		
		public $column_width_list = array();
		
		public $column_width_values = array();
		
		public $visibility_values = array();
		
		public function __construct( $settings, $value ){
			
			$this->settings( $settings );
			
			$this->column_width_list = array(
				__( '1 - one column', 'js_composer' ) 				=> '12',
				__( '1/2 - one half column', 'js_composer' ) 		=> '6',
				__( '1/3 - one third column', 'js_composer' ) 		=> '4',
				__( '1/4 - one quarter column', 'js_composer' ) 	=> '3',
				__( '1/5 - one fifth column', 'js_composer' ) 		=> '5',
				__( '1/6 - one sixth column', 'js_composer' ) 		=> '2',
				__( '2/3 - two third column', 'js_composer' ) 		=> '8',
				__( '2/5 - two fifth column', 'js_composer' ) 		=> '7',
				__( '3/4 - three quarter column', 'js_composer' ) 	=> '9',
				__( '3/5 - three fifth column', 'js_composer' ) 	=> '5',
				__( '4/5 - four fifth column', 'js_composer' ) 		=> '10',
				__( '5/6 - five sixth column', 'js_composer' ) 		=> '10',
			);
			
			$this->size_modifiers = array(
				'lg' => 'Large',
				'md' => 'Medium',
				'sm' => 'Small'
			);
			
			$this->value( $value );
			
			if( !empty( $value ) ){
				
				$this->values = explode( ' ', $value );

				foreach( $this->values as $values ){
					
					if( strpos( $values, 'vc_col' ) !== false ){
				
						$col = explode( '-', $values );

						$this->column_width_values[] = $col[1] . $col[2];
						
					} else if( strpos( $values, 'vc_hidden' ) !== false ){
						
						$col = explode( '-', $values );
						
						$this->visibility_values[] = $col[1];
						
					}
					
				}
				
			}
			
		}
		
		function settings( $settings = null ) {
			if ( is_array( $settings ) ) {
				$this->settings = $settings;
			}

			return $this->settings;
		}

		function setting( $key ) {
			return isset( $this->settings[ $key ] ) ? $this->settings[ $key ] : '';
		}

		function value( $value = null ) {
			
			if ( is_string( $value ) ) {
				$this->value = $value;
			}
			
			return $this->value;
			
		}
		
		function render() {

			$output = sprintf(
				'
				<div class="dahz-column-offset-uikit-vc-param">
					<input type="hidden" name="%1$s" class="%1$s %2$s_field wpb_vc_param_value" value="%3$s">
					<table class="uk-table uk-table-divider uk-table-hover">
						<thead>
							<tr>
								<th class="uk-table-small">Device</th>
								<th class="uk-table-expand">Column Width</th>
								<th class="uk-width-small">Hide on device?</th>
							</tr>
						</thead>
						<tbody>
							%4$s
						</tbody>
					</table>
				</div>
				
				',
				$this->setting( 'param_name' ),
				$this->setting( 'type' ),
				esc_attr( $this->value() ),
				$this->dahz_responsive_table()
			);
			return $output;
		}
		
		function dahz_column_width_options( $size ){
			
			$option = '<option value="">Inherit From Medium</option>';
			
			foreach( $this->column_width_list as $label => $value ){
				
				$option .= sprintf(
					'
					<option value="%2$s" %3$s>%1$s</option>
					',
					$label,
					$value,
					selected( true, in_array( $size . $value, $this->column_width_values ) , false )
				);
				
			}
			
			return $option;
			
		}
		
		function dahz_responsive_table(){
			
			$table = '';

			foreach( $this->size_modifiers as $size => $label ){
				
				$table .= sprintf(
					'
					<tr>
						<td>%1$s</td>
						<td>%3$s</td>
						<td><input class="column-offset-uikit-field column-offset-uikit-visible" data-size-modifier="%2$s" type="checkbox" data-value="vc_hidden" %4$s></td>
					</tr>
					',
					esc_html( $label ),
					esc_attr( $size ),
					$size !== 'md' ? sprintf( 
						'
						<select class="column-offset-uikit-field column-offset-uikit-width" data-size-modifier="%1$s" data-value="vc_col">%2$s</select>
						',
						$size,
						$this->dahz_column_width_options( $size )
					) : 'Inherit',
					esc_attr( checked( true, in_array( $size, $this->visibility_values ) , false ) )
				);
				
			}
			
			return $table;
			
		}
		
	}
	
}

vc_add_shortcode_param( 'column_offset_uikit', 'dahz_framework_column_offset_uikit_params', DAHZEXTENDER_SHORTCODE_URI . 'assets/js/admin/dahz-vc-params.min.js' );

function dahz_framework_column_offset_uikit_params( $settings, $value ) {

	$visibility = new Dahz_Shortcode_Column_Offset_param( $settings, $value );
	
	return $visibility->render();

}
