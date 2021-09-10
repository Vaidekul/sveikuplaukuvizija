<?php
if( !function_exists( 'dahz_shortcode_add_package' ) ){
	
	function dahz_shortcode_add_package( &$param, $package, $dependency = false, $default = array(), $add_element = array(), $remove_element = array() ) {

		if( !is_array( $package ) ){

			$packaged = isset( dahz_shortcodes_helper()->field_group[$package] ) ? dahz_shortcodes_helper()->field_group[$package] : array();

		} else {

			$packaged = $package;

		}

		if( $dependency ){

			foreach( $packaged as $key => $params ){

				if( !isset( $packaged[$key]['dependency'] ) ){

					$packaged[$key]['dependency'] = $dependency;

				}

			}

		}

		$param['params'] = array_merge( $param['params'], $packaged );

	}
	
}

if( !function_exists( 'dahz_shortcodes_helper' ) ){
	
	function dahz_shortcodes_helper() {
		
		return Dahz_Shortcodes_Helper::instance();
		
	}
	
}

if( !function_exists( 'dahz_shortcode_helper_get_field_option' ) ){

	function dahz_shortcode_helper_get_field_option( $option ){

		return isset( dahz_shortcodes_helper()->field_options[$option] ) ? dahz_shortcodes_helper()->field_options[$option] : array();
	}

}

if ( !function_exists( 'dahz_shortcode_get_group_animation' ) ) {
	
	function dahz_shortcode_get_group_animation() {
		
		$animation = array();

		$animation[__( 'None', 'sobari_sc' )] = '';

		$animation[__( 'Inherit', 'sobari_sc' )] = 'inherit';

		$animation = array_merge( $animation, dahz_shortcode_helper_get_field_option( 'animation' ) );

		$animation[__( 'Parallax', 'sobari_sc' )] = 'parallax';

		return array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'CSS Animation', 'sobari_sc' ),
				'param_name'	=> 'css_animation',
				'value'			=> $animation,
				'group'			=> __( 'Animation', 'sobari_sc' ),
				'description'	=> __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'sobari_sc' ),
			),
			array(
				'type'			=> 'parallax_options',
				'heading'		=> __( 'Parallax Options', 'sobari_sc' ),
				'param_name'	=> 'animation_parallax',
				'group'			=> __( 'Animation', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'css_animation',
					'value'		=> 'parallax'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Delay Element Animation', 'sobari_sc' ),
				'param_name'	=> 'delay_animation',
				'value'			=> dahz_shortcode_helper_get_field_option( 'delay_animation' ),
				'group'			=> __( 'Animation', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'css_animation',
					'not_empty'	=> true,
				)
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Repeat Animation', 'sobari_sc' ),
				'param_name'	=> 'repeat_animation',
				'group'			=> __( 'Animation', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'css_animation',
					'not_empty'	=> true,
				)
			)
		);
	}
}

if ( !function_exists( 'dahz_shortcode_get_group_extra' ) ) {
	
	function dahz_shortcode_get_group_extra() {
		
		return array(
			array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Extra class name', 'sobari_sc' ),
				'param_name'	=> 'el_class',
				'group'			=> __( 'Extra', 'sobari_sc' ),
				'description'	=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sobari_sc' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Margin', 'sobari_sc' ),
				'param_name'	=> 'margin',
				'std'			=> 'uk-margin',
				'value'			=> dahz_shortcode_helper_get_field_option( 'margin_size' ),
				'group'			=> __( 'Extra', 'sobari_sc' ),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Remove Top Margin', 'sobari_sc' ),
				'param_name'	=> 'remove_top_margin',
				'group'			=> __( 'Extra', 'sobari_sc' ),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Remove Bottom Margin', 'sobari_sc' ),
				'param_name'	=> 'remove_bottom_margin',
				'group'			=> __( 'Extra', 'sobari_sc' ),
			),
			array(
				'type'			=> 'visibility',
				'heading'		=> __( 'Shortcode Visibility', 'sobari_sc' ),
				'param_name'	=> 'visibility',
				'group'			=> __( 'Extra', 'sobari_sc' ),
				'description'	=> __( 'Set shortcode visibility on device.', 'sobari_sc' ),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Enable Lazyload', 'sobari_sc' ),
				'param_name'	=> 'enable_dahz_lazy_shortcode',
				'value'			=> array( 'Yes'	=> 'true' ),
				'group'			=> __( 'Extra', 'sobari_sc' ),
				'description'	=> esc_attr__( 'enable lazyload for better performance', 'sobari_sc' ),
			)
		);
	}
}

if ( !function_exists( 'dahz_shortcode_get_group_button' ) ) {
	
	function dahz_shortcode_get_group_button( $prefix = 'button', $group = '' ) {
		
		return array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Button Type', 'upsob_sc' ),
				'param_name'	=> "{$prefix}_type",
				'description'	=> esc_attr__( 'Select button Type', 'upsob_sc' ),
				'group'			=> $group,
				'value'			=> array(
					esc_attr__( 'Default', 'upsob_sc' )		=> 'uk-button-default',
					esc_attr__( 'Primary', 'upsob_sc' )		=> 'uk-button-primary',
					esc_attr__( 'Secondary', 'upsob_sc' )	=> 'uk-button-secondary',
					esc_attr__( 'Danger', 'upsob_sc' )		=> 'uk-button-danger',
					esc_attr__( 'Text', 'upsob_sc' )		=> 'uk-button-text',
					esc_attr__( 'Link', 'upsob_sc' )		=> 'uk-button-link',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Button Size', 'upsob_sc' ),
				'param_name'	=> "{$prefix}_size",
				'group'			=> $group,
				'description'	=> esc_attr__( 'Select button size', 'upsob_sc' ),
				'value'			=> array(
					esc_attr__( 'Default', 'upsob_sc' )		=> '',
					esc_attr__( 'Small', 'upsob_sc' )		=> 'uk-button-small',
					esc_attr__( 'Large', 'upsob_sc' )		=> 'uk-button-large',
				),
			),
		);
	}
}

if ( !function_exists( 'dahz_shortcode_get_group_product_settings' ) ) {
	
	function dahz_shortcode_get_group_product_settings( $color_scheme = true ) {
		
		$column = dahz_shortcode_helper_get_field_option( 'columns' );

		$params = array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Phone Potrait Column', 'sobari_sc' ),
				'param_name'	=> 'phone_potrait_column',
				'value'			=> $column,
				'save_always'	=> true,
				'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Phone Landscape Column', 'sobari_sc' ),
				'param_name'	=> 'phone_landscape_column',
				'value'			=> $column,
				'save_always'	=> true,
				'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Tablet Landscape Column', 'sobari_sc' ),
				'param_name'	=> 'tablet_landscape_column',
				'value'			=> $column,
				'save_always'	=> true,
				'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Show Slide Nav', 'sobari_sc' ),
				'param_name'	=> 'show_slide_nav',
				'save_always'	=> true,
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'shortcode_style',
					'value'		=> 'carousel'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Slide Nav Position', 'sobari_sc' ),
				'param_name'	=> 'slide_nav_position',
				'value'			=> array(
					__( 'Outside', 'sobari_sc' ) => 'outside',
					__( 'Inside', 'sobari_sc' ) => 'inside',
				),
				'save_always'	=> true,
				'description'	=> __( 'Set slide nav position', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'show_slide_nav',
					'not_empty'	=> true,
				),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Show Slide Nav When Hover', 'sobari_sc' ),
				'param_name'	=> 'show_slide_nav_when_hover',
				'save_always'	=> true,
				'dependency'	=> array(
					'element'	=> 'show_slide_nav',
					'not_empty'	=> true,
				),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Slide Nav Breakpoint', 'sobari_sc' ),
				'param_name'	=> 'slide_nav_breakpoint',
				'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
				'save_always'	=> true,
				'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'show_slide_nav',
					'not_empty'	=> true,
				),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Show Dot Nav', 'sobari_sc' ),
				'param_name'	=> 'show_dot_nav',
				'save_always'	=> true,
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'shortcode_style',
					'value'		=> 'carousel'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Dot Nav Breakpoint', 'sobari_sc' ),
				'param_name'	=> 'dot_nav_breakpoint',
				'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
				'save_always'	=> true,
				'description'	=> __( 'Only affect device width of selected and larger', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'show_dot_nav',
					'not_empty'	=> true,
				),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Auto Play Interval', 'sobari_sc' ),
				'param_name'	=> 'auto_play_interval',
				'value'			=> dahz_shortcode_helper_get_field_option( 'autoplay_interval' ),
				'save_always'	=> true,
				'description'	=> __( 'The delay between switching slides in autoplay mode', 'sobari_sc' ),
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'shortcode_style',
					'value'		=> 'carousel'
				)
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Infinite Scroll', 'sobari_sc' ),
				'param_name'	=> 'enable_infinite',
				'save_always'	=> true,
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'shortcode_style',
					'value'		=> 'carousel'
				)
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Enable Slide in Sets', 'sobari_sc' ),
				'param_name'	=> 'enable_slide',
				'save_always'	=> true,
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'shortcode_style',
					'value'		=> 'carousel'
				)
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> __( 'Center the Active Slide', 'sobari_sc' ),
				'param_name'	=> 'enable_center_active',
				'save_always'	=> true,
				'group'			=> __( 'Product Settings', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'shortcode_style',
					'value'		=> 'carousel'
				)
			),
		);

		if ( $color_scheme ) {
			$param_color_scheme = array(
				array(
					'type'			=> 'dropdown',
					'heading'		=> __( 'Product Color Scheme', 'sobari_sc' ),
					'param_name'	=> 'product_color_scheme',
					'value'			=> dahz_shortcode_helper_get_field_option( 'color_scheme' ),
					'save_always'	=> true,
					'description'	=> __( 'Product Color Scheme', 'sobari_sc' ),
					'group'			=> __( 'Product Settings', 'sobari_sc' ),
				),
			);

			$params = array_merge( $param_color_scheme, $params );
		}

		return $params;
	}
}

if ( !function_exists( 'dahz_shortcodes_get_group_dahz_id' ) ) {

	function dahz_shortcodes_get_group_dahz_id() {
		return array(
			array(
				'type' 			=> 'el_id',
				'param_name' 	=> 'dahz_id',
				'settings' 		=> array(
					'auto_generate' => true,
				),
				'save_always'	=> true,
				'edit_field_class'=> 'hidden',
				'heading' 		=> __( 'Section ID', 'js_composer' ),
				'description' 	=> __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
			)
		);
	}
}

if ( !function_exists( 'dahz_shortcode_vc_extract_youtube' ) ) {
	
	function dahz_shortcode_vc_extract_youtube( $url ) {
		parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );

		if ( ! isset( $vars['v'] ) ) {
			return '';
		}

		return $vars['v'];
	}
}

if ( !function_exists( 'dahz_shortcode_set_attributes' ) ) {
	
	function dahz_shortcode_set_attributes( $attributes = array(), $key = '', $atts = array(), $is_echo = true ) {
		if ( !is_array( $attributes ) ) return;

		$attribute_output = array();

		foreach( $attributes as $attribute => $attribute_value ) {
			$attribute_output[] = sprintf(
				'%1$s="%2$s"',
				$attribute,
				is_array( $attribute_value ) ? esc_attr( trim( preg_replace( '!\s+!', ' ', implode( ' ', $attribute_value ) ) ) ) : esc_attr( trim( preg_replace( '!\s+!', ' ', $attribute_value ) ) )
			);
		}

		if ( $is_echo ) {
			echo apply_filters( 'dahz_shortcode_attributes', implode( ' ', $attribute_output ), $key, $atts );
		} else {
			return apply_filters( 'dahz_shortcode_attributes', implode( ' ', $attribute_output ), $key, $atts );
		}
	}
	
}

if ( !function_exists( 'dahz_shortcodes_check_param_value' ) ) {
	
	function dahz_shortcodes_check_param_value( $value = '', $default_value = '', $numeric_units = 'px' ) {
		$value = !empty( $value ) ? is_numeric( $value ) ? sprintf( '%s%s', $value, $numeric_units ) : $value : $default_value;

		return $value;
	}
	
}

if ( !function_exists( 'dahz_shortcode_get_parallax_option' ) ) {
	function dahz_shortcode_get_parallax_option( $param_value = '', $is_bg = false ) {
		if ( empty( $param_value ) ) return '';

		$option = '';

		$param_value_decode = json_decode( urldecode( $param_value ), true );
		$viewport = $param_value_decode['parallax-options-breakpoint'];

		switch ($viewport) {
			case '@s':
				$param_viewport = 'media: (min-width: 640px);';
				break;
			case '@m':
				$param_viewport = 'media: (min-width: 960px);';
				break;
			case '@l':
				$param_viewport = 'media: (min-width: 1200px);';
				break;
			case '@xl':
				$param_viewport = 'media: (min-width: 1600px);';
				break;

			default:
				$param_viewport = '';
				break;
		}

		$option = sprintf( '%1$s:%3$s,%4$s;%2$s:%5$s,%6$s;%7$s',
			$is_bg ? 'bgx' : 'x', # 1
			$is_bg ? 'bgy' : 'y', # 2
			$param_value_decode['parallax-options-x-start-range'], # 3
			$param_value_decode['parallax-options-x-end-range'], # 4
			$param_value_decode['parallax-options-y-start-range'], # 5
			$param_value_decode['parallax-options-y-end-range'], # 6
			$param_viewport # 7
		);

		if ( $param_value_decode['parallax-options-show-advance-settings'] == 'true' && !$is_bg ) {
			$option .= sprintf( 'scale:%1$s,%2$s;rotate:%3$s,%4$s;opacity:%5$s,%6$s;easing:%7$s;viewport:%8$s;',
				$param_value_decode['parallax-options-scale-start-range'], # 1
				$param_value_decode['parallax-options-scale-end-range'], # 2
				$param_value_decode['parallax-options-rotate-start-range'], # 3
				$param_value_decode['parallax-options-rotate-end-range'], # 4
				$param_value_decode['parallax-options-opacity-start-range'], # 5
				$param_value_decode['parallax-options-opacity-end-range'], # 6
				$param_value_decode['parallax-options-easing-range'], # 7
				$param_value_decode['parallax-options-viewport-range'] # 8
			);
		}
		return $option;
	}
}
if ( !function_exists( 'dahz_shortcode_get_parallax_class' ) ) {
	function dahz_shortcode_get_parallax_class( $param_value = '' ) {
		if ( empty( $param_value ) ) return '';

		$class = '';

		$param_value_decode = json_decode( urldecode( $param_value ), true );
		
		if( is_array( $param_value_decode ) && isset( $param_value_decode['parallax-options-enable-z-index'] ) && $param_value_decode['parallax-options-enable-z-index'] == 'true' ){
			$class = 'uk-position-z-index';
		}
		
		return $class;
	}
}

if ( !function_exists( 'dahz_shortcode_get_custom_font_size' ) ) {

	function dahz_shortcode_get_custom_font_size( $param_value = '', $selector = '' ) {

		if ( empty( $param_value ) ) return '';

		$style = '';

		$param_value_decode = json_decode( urldecode( $param_value ), true );

		if( !empty( $param_value_decode['xs_font_size'] ) ){
			$style .= sprintf( '%1$s{font-size:%2$s;}', $selector, dahz_shortcode_safe_css_units( $param_value_decode['xs_font_size'] ) );
		}
		if( !empty( $param_value_decode['xs_line_height'] ) ){
			$style .= sprintf( '%1$s{line-height:%2$s;}', $selector, $param_value_decode['xs_line_height'] );
		}

		if( !empty( $param_value_decode['s_font_size'] ) ){
			$style .= sprintf( '@media(min-width: 640px){%1$s{font-size:%2$s;}}', $selector, dahz_shortcode_safe_css_units( $param_value_decode['s_font_size'] ) );
		}
		if( !empty( $param_value_decode['s_line_height'] ) ){
			$style .= sprintf( '@media(min-width: 640px){%1$s{line-height:%2$s;}}', $selector, $param_value_decode['s_line_height'] );
		}

		if( !empty( $param_value_decode['m_font_size'] ) ){
			$style .= sprintf( '@media(min-width: 960px){%1$s{font-size:%2$s;}}', $selector, dahz_shortcode_safe_css_units( $param_value_decode['m_font_size'] ) );
		}
		if( !empty( $param_value_decode['m_line_height'] ) ){
			$style .= sprintf( '@media(min-width: 960px){%1$s{line-height:%2$s;}}', $selector, $param_value_decode['m_line_height'] );
		}

		return $style;
	}

}

if ( !function_exists( 'dahz_shortcode_translate_width' ) ) {
	function dahz_shortcode_translate_width( $width ) {

		return 'uk-width-' . str_replace( '/', "-", $width ) . '@m';

	}
}

if ( !function_exists( 'dahz_shortcode_translate_offset' ) ) {
	function dahz_shortcode_translate_offset( $offset ) {
		$offsets = explode( ' ', $offset );

		$offsets_result = array();

		foreach( $offsets as $offset_class ) {
			if ( strpos( $offset_class, 'vc_col' ) !== false && strpos( $offset_class, 'offset' ) !== false ) {

			} elseif ( strpos( $offset_class, 'vc_col' ) !== false ) {
				$col = explode( '-', $offset_class );

				$offsets_result[] = 'uk-width-' . dahz_shortcode_translate_width_offset( $col[2] ) . dahz_shortcode_translate_size_modifiers( $col[1] );
			} elseif ( strpos( $offset_class, 'vc_hidden' ) !== false ) {
				$visibility = explode( '-', $offset_class );

				$offsets_result[] = 'de-hidden' . dahz_shortcode_translate_size_modifiers( $visibility[1] );
			}
		}

		return implode( ' ', $offsets_result );
	}
}

if ( !function_exists( 'dahz_shortcode_translate_size_modifiers' ) ) {
	function dahz_shortcode_translate_size_modifiers( $size ) {
		$size_modifiers = '@m';

		switch ( $size ) {
			case 'sm':
				$size_modifiers = '@s';
				break;
			case 'md':
				$size_modifiers = '@m';
				break;
			case 'lg':
				$size_modifiers = '@l';
				break;
		}

		return $size_modifiers;
	}
}

if ( !function_exists( 'dahz_shortcode_translate_width_offset' ) ) {
	function dahz_shortcode_translate_width_offset( $width ) {
		$width_translated = 'm';

		switch ( $width ) {
			case '12':
				$width_translated = '1-1';
				break;
			case '6':
				$width_translated = '1-2';
				break;
			case '4':
				$width_translated = '1-3';
				break;
			case '3':
				$width_translated = '1-4';
				break;
			case '5':
				$width_translated = '1-5';
				break;
			case '2':
				$width_translated = '1-6';
				break;
			case '8':
				$width_translated = '2-3';
				break;
			case '7':
				$width_translated = '2-5';
				break;
			case '9':
				$width_translated = '3-4';
				break;
			case '5':
				$width_translated = '3-5';
				break;
			case '10':
				$width_translated = '4-5';
				break;
			case '10':
				$width_translated = '5-6';
				break;
		}

		return $width_translated;
	}
}

if ( !function_exists( 'dahz_shortcode_parse_css' ) ) {
	function dahz_shortcode_parse_css( $css ) {
		preg_match_all( '/(.+?)\s?\{\s?(.+?)\s?\}/', $css, $matches );

		return str_replace( ' ;', ';', preg_replace( '/\s+/', ' ', isset( $matches[2][0] ) ? $matches[2][0] : '' ) );
	}
}

if ( !function_exists( 'dahz_shortcode_get_shape_divider' ) ) {
	function dahz_shortcode_get_shape_divider( $dahz_id, $section_shape_divider = '', $section_shape_divider_color = '', $section_shape_divider_height = 100, $section_shape_divider_enable_bring_to_front = false, $section_shape_position = 'bottom', $is_echo = false ) {
		
		if ( empty( $section_shape_divider ) ) return '';
		
		$output = '';
		
		$svg = '';

		switch ( $section_shape_divider ) {
			case 'curve' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z"></path></svg>';
				break;
			case 'curve_asym' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0 100 C 20 0 50 0 100 100 Z"></path></svg>';
				break;
			case 'curve_asym_2' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0 100 C 50 0 80 0 100 100 Z"></path></svg>';
				break;
			case 'tilt' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="104 10 0 0 0 10"></polygon></svg>';
				break;
			case 'tilt_alt' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 10 100 0 -4 10"></polygon></svg>';
				break;
			case 'triangle' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><polygon points="501 53.27 0.5 0.56 0.5 100 1000.5 100 1000.5 0.66 501 53.27"/></svg>';
				break;
			case 'fan' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1003.92 91" preserveAspectRatio="none"><polygon points="502.46 46.31 1 85.67 1 91.89 1002.91 91.89 1002.91 85.78 502.46 46.31"/><polygon class="de-opacity-2" points="502.46 45.8 1 0 1 91.38 1002.91 91.38 1002.91 0.1 502.46 45.8"/><rect class="de-opacity-3" y="45.81" width="1003.92" height="46.09"/></svg>';
				break;
			case 'waves' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"><path d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path></svg>';
				break;
			case 'speech' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M 0 45.86 h 458 c 29 0 42 19.27 42 19.27 s 13 -19.27 42.74 -19.27 h 457.26 v 54.14 h -1000 z"></path></svg>';
				break;
			case 'clouds' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M 983.71 4.47 a 56.19 56.19 0 0 0 -37.61 14.38 a 15.24 15.24 0 0 0 -25.55 -0.55 a 40.65 40.65 0 0 0 -55.45 13 a 15.63 15.63 0 0 0 -22.69 1.52 a 73.82 73.82 0 0 0 -98.57 27.91 a 14.72 14.72 0 0 0 -9.31 0.55 a 26.13 26.13 0 0 0 -42.63 1.92 a 39.08 39.08 0 0 0 -47 10.08 a 18.45 18.45 0 0 0 -34.18 -0.45 a 12.21 12.21 0 0 0 -14.23 0.9 a 11.47 11.47 0 0 0 -16.59 -6 a 47.2 47.2 0 0 0 -66.12 -4.07 a 21.32 21.32 0 0 0 -26.48 -4.91 a 15 15 0 0 0 -29 -7.79 a 10.47 10.47 0 0 0 -14 5.13 a 31.55 31.55 0 0 0 -50.68 12.32 a 23 23 0 0 0 -28.69 -5.34 a 54.54 54.54 0 0 0 -89.93 5.71 a 16.3 16.3 0 0 0 -22.71 2.3 a 33.41 33.41 0 0 0 -44.93 9.65 a 17.72 17.72 0 0 0 -9.79 -2.94 h -0.22 a 29 29 0 0 0 -39.66 -12.26 a 75.24 75.24 0 0 0 -94 -12.19 a 22.91 22.91 0 0 0 -14.78 -5.34 h -0.69 a 33 33 0 1 0 -52.53 31.55 h -29.69 v 143.45 h 79.5 v -57.21 a 75.26 75.26 0 0 0 132.93 -46.7 a 28.88 28.88 0 0 0 12.78 -6.86 a 17.61 17.61 0 0 0 12.79 0 a 33.41 33.41 0 0 0 63.93 -7.44 a 54.56 54.56 0 0 0 101.57 18.56 v 7.65 h 140.21 a 47.23 47.23 0 0 0 79.55 -15.88 l 51.25 1.95 a 39.07 39.07 0 0 0 67.12 2.55 l 29.76 1.13 a 73.8 73.8 0 0 0 143.76 -16.75 h 66.17 a 56.4 56.4 0 1 0 36.39 -99.53 z"></path></svg>';
				break;
			case 'waves_opacity' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"><path class="de-opacity-6" d="M 850.23 235.79 a 1.83 1.83 0 0 0 -0.8 -3.24 c -10.23 -2 -53.38 -23.41 -97.44 -43.55 c -244.99 -112 -337.79 97.38 -432.99 104 c -115 8 -217 -87 -330 -37 c 0 0 9 15 9 42 v -1 h 849 l 2 -55 s -2.87 -3 1.23 -6.21 z"></path><path class="de-opacity-10" d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path></svg>';
				break;
			case 'waves_opacity_alt' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"><path class="de-opacity-3" d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path><path class="de-opacity-6" d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path><path class="de-opacity-10" d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path></svg>';
				break;
			case 'curve_opacity' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path class="de-opacity-3" d="M 0 14 s 88.64 3.48 300 36 c 260 40 514 27 703 -10 l 12 28 l 3 36 h -1018 z"></path><path class="de-opacity-6" d="M 0 45 s 271 45.13 500 32 c 157 -9 330 -47 515 -63 v 86 h -1015 z"></path><path class="de-opacity-10" d="M 0 58 s 188.29 32 508 32 c 290 0 494 -35 494 -35 v 45 h -1002 z"></path></svg>';
				break;
			case 'mountains' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"><path class="de-opacity-1" d="M 1014 264 v 122 h -808 l -172 -86 s 310.42 -22.84 402 -79 c 106 -65 154 -61 268 -12 c 107 46 195.11 5.94 275 137 z"></path><path class="de-opacity-2" d="M -302 55 s 235.27 208.25 352 159 c 128 -54 233 -98 303 -73 c 92.68 33.1 181.28 115.19 235 108 c 104.9 -14 176.52 -173.06 267 -118 c 85.61 52.09 145 123 145 123 v 74 l -1306 10 z"></path><path class="de-opacity-3" d="M -286 255 s 214 -103 338 -129 s 203 29 384 101 c 145.57 57.91 178.7 50.79 272 0 c 79 -43 301 -224 385 -63 c 53 101.63 -62 129 -62 129 l -107 84 l -1212 12 z"></path><path class="de-opacity-4" d="M -24 69 s 299.68 301.66 413 245 c 8 -4 233 2 284 42 c 17.47 13.7 172 -132 217 -174 c 54.8 -51.15 128 -90 188 -39 c 76.12 64.7 118 99 118 99 l -12 132 l -1212 12 z"></path><path class="de-opacity-10" d="M -12 201 s 70 83 194 57 s 160.29 -36.77 274 6 c 109 41 184.82 24.36 265 -15 c 55 -27 116.5 -57.69 214 4 c 49 31 95 26 95 26 l -6 151 l -1036 10 z"></path></svg>';
				break;
			case 'double_curve' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M1000 100H0V20C0 20 89.6 0 272.9 0 500 0 500 40 727.1 40 910.4 40 1000 20 1000 20V100z"/></svg>';
				break;
			case 'gradient' :
				$svg .= '<svg fill="url(#SVGID_1_'.$section_shape_position.'_'.$dahz_id.')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200" preserveAspectRatio="none"><linearGradient id="SVGID_1_'.$section_shape_position.'_'.$dahz_id.'" gradientUnits="userSpaceOnUse" x1="500" y1="-98.4186" x2="500" y2="94.3336" gradientTransform="matrix(-1 0 0 1 1000 98)"><stop offset="0" stop-color="'.$section_shape_divider_color.'" stop-opacity="0"/><stop offset="1" stop-color="'.$section_shape_divider_color.'"/></linearGradient><rect width="1000" height="200"/></svg>';
				break;
			case 'triangle_opacity' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200" preserveAspectRatio="none"><polygon points="1000,200 500,100 0,200 "/><polygon class="de-opacity-7" points="1000,200 1000,0 500,100 "/></svg>';
				break;
			case 'triangle_opacity_2' :
				$svg .= '<svg fill="'.$section_shape_divider_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200" preserveAspectRatio="none"><polygon points="1000,200 500,100 0,200 "/><polygon class="de-opacity-7" points="500,100 0,0 0,200 "/></svg>';
				break;
		}
		
		if( ! empty( $svg ) ){
			
			$output .= sprintf( 
				'
				<div class="de-shape-divider uk-position-%1$s %2$s" style="height: %3$s;%4$s">
					%5$s
				</div>
				',
				esc_attr( $section_shape_position ), // 1
				!empty( $section_shape_divider_enable_bring_to_front ) ? 'uk-position-z-index' : '', // 2
				dahz_shortcodes_check_param_value( $section_shape_divider_height, '100px' ), // 3
				$section_shape_position == 'top' ? 'transform: rotate(180deg);' : '', // 4
				$svg // 5
			);

		}
		
		if ( $is_echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
}

if ( !function_exists( 'dahz_shortcode_get_builder_background_video' ) ) {

	// function dahz_shortcode_get_builder_background_video( $custom_media_type = '', $background_video_url = '', $background_video_enable_parallax = '', $background_video_parallax = '', $background_width = '', $background_height = '', $background_blend_mode = '', $is_echo = false ) {
	function dahz_shortcode_get_builder_background_video( $custom_media_type = '', $background_video_url = '', $background_width = '', $background_height = '', $background_blend_mode = '', $is_echo = false ) {

		if ( empty( $custom_media_type ) ) return;

		$output = '';

		if ( $custom_media_type == 'video' ) {
			# video source
			if ( !empty( $background_video_url ) && vc_extract_youtube_id( $background_video_url ) ) {

				$video = wp_oembed_get( $background_video_url );

				$video = str_replace( 'iframe', 'iframe data-uk-cover', $video );

				if ( !empty( $background_width ) ) {
					$video = str_replace( 'width="640"', sprintf( 'width="%s"', esc_attr( (int)$background_width ) ), $video );
				}

				if ( !empty( $background_height ) ) {
					$video = str_replace( 'height="360"', sprintf( 'height="%s"', esc_attr( (int)$background_height ) ), $video );
				}

				$output .= sprintf(
					'
					<div class="uk-position-cover uk-cover-container%3$s" %2$s>
						%1$s
					</div>
					',
					$video, // 1
					!empty( $background_video_enable_parallax ) ? sprintf( 'data-uk-parallax="%s"', esc_attr( dahz_shortcode_get_parallax_option( $background_video_parallax ) ) ) : '', // 2
					!empty( $background_blend_mode ) ? " {$background_blend_mode}" : ''
				);

			}

		}

		if ( $is_echo ) {

			echo $output;

		} else {

			return $output;

		}

	}

}

if ( !function_exists( 'dahz_shortcode_get_builder_overlay' ) ) {
	
	function dahz_shortcode_get_builder_overlay( $section_color_overlay = '', $section_color_overlay_2 = '', $section_enable_gradient = '', $section_gradient_direction = '', $is_echo = false ) {
		
		if ( empty( $section_color_overlay ) ) return;

		$output = '';

		# color overlay
		$overlay_attributes = sprintf( 'background-color: %s', $section_color_overlay );

		# color gradient
		if ( !empty( $section_enable_gradient ) ) $overlay_attributes = sprintf( 'background: linear-gradient(%s, %s, %s)', $section_gradient_direction, $section_color_overlay, $section_color_overlay_2 );

		$output .= sprintf( '<div class="uk-position-cover uk-overlay" style="%s"></div>', esc_attr( $overlay_attributes ) );

		if ( $is_echo ) {
			echo $output;
		} else {
			return $output;
		}
	
	}
	
}

if ( !function_exists( 'dahz_shortcode_get_term_slugs_by_ids' ) ) {
	function dahz_shortcode_get_term_slugs_by_ids( $ids, $taxonomy = 'category', $type = 'slug' ) {

		if ( empty( $ids ) ){
			if( $type == 'all' ){
				return array( 'slugs' => '', 'terms' => array() );
			} else {
				return '';
			}
		}

		$slugs = array();

		$terms = array();

		foreach( explode( ',', str_replace( ' ', '', $ids ) ) as $id ) {
			if ( $id !== '' ) {
				$get_term = get_term_by( 'id', $id, $taxonomy );

				if ( $get_term ) {
					$slugs[] = $get_term->slug;
					if( $type == 'all' ) $terms[] = $get_term;
				}
			}
		}

		if ( empty( $slugs ) ) {

			if( $type == 'all' ){
				return array( 'slugs' => '', 'terms' => array() );
			} else {
				return '';
			}

		} else {

			if( $type == 'all' ){
				return array( 'slugs' => implode( ',', $slugs ), 'terms' => $terms );
			} else {
				return implode( ',', $slugs );
			}

		}
	}
}

if ( !function_exists( 'dahz_shortcode_set_loop_product_settings' ) ) {

	function dahz_shortcode_set_loop_product_settings( $atts ) {

		//global $overriden_customizer_layout;

		$atts = array_merge( array(
			'shortcode_style'			=> false,
			'columns'					=> 'inherit',
			'tablet_landscape_column'	=> 'inherit',
			'phone_potrait_column'		=> 'inherit',
			'phone_landscape_column'	=> 'inherit',
			'show_slide_nav'			=> false,
			'slide_nav_position'		=> '',
			'show_slide_nav_when_hover'	=> false,
			'slide_nav_breakpoint'		=> '@s',
			'show_dot_nav'				=> false,
			'dot_nav_breakpoint'		=> '@s',
			'auto_play_interval'		=> false,
			'enable_infinite'			=> false,
			'enable_slide'				=> false,
			'enable_center_active'		=> false,
			'product_color_scheme'		=> '',
			'row_column_gap'			=> '',
			'loop_product_layout'		=> 'elaina',
			'show_data_unit_sold'		=> false
		), $atts );

		// if( empty( $overriden_customizer_layout ) ){

			// $overriden_customizer_layout = array();

		// }

		// $overriden_customizer_layout['woo_shop_style'] = dahz_framework_get_option( 'woo_shop_style', 'elaina' );

		// dahz_framework_override_theme_mods( array(
			// 'shop_woo_layout'	=> $atts['loop_product_layout']
		// ) );

		dahz_framework_override_static_option(
			array(
				'is_loop_product_shortcode'						=> true,
				'enable_loop_product_slider'					=> $atts['shortcode_style'] == 'carousel' ? true : false,
				'loop_product_desktop_column'					=> $atts['columns'] == 'inherit' ? dahz_framework_get_option( 'shop_woo_desktop_column', '3' ) : $atts['columns'],
				'loop_product_tablet_landscape_column'			=> $atts['tablet_landscape_column'] == 'inherit' ? dahz_framework_get_option( 'shop_woo_tablet_column', '2' ) : $atts['tablet_landscape_column'],
				'loop_product_phone_potrait_column'				=> $atts['phone_potrait_column'] == 'inherit' ? dahz_framework_get_option( 'shop_woo_mobile_column', '1' ) : $atts['phone_potrait_column'],
				'loop_product_phone_landscape_column'			=> $atts['phone_landscape_column'] == 'inherit' ? dahz_framework_get_option( 'shop_woo_mobile_landscape_column', '2' ) : $atts['phone_landscape_column'],
				'loop_product_slider_show_slide_nav'			=> $atts['show_slide_nav'],
				'loop_product_slider_slide_nav_position'		=> $atts['slide_nav_position'],
				'loop_product_slider_show_slide_nav_when_hover' => $atts['show_slide_nav_when_hover'],
				'loop_product_slider_slide_nav_breakpoint'		=> $atts['slide_nav_breakpoint'],
				'loop_product_slider_show_dot_nav'				=> $atts['show_dot_nav'],
				'loop_product_slider_dot_nav_breakpoint'		=> $atts['dot_nav_breakpoint'],
				'loop_product_slider_auto_play_interval'		=> $atts['auto_play_interval'],
				'loop_product_slider_enable_infinite'			=> $atts['enable_infinite'],
				'loop_product_slider_enable_slide'				=> $atts['enable_slide'],
				'loop_product_slider_enable_center_active'		=> $atts['enable_center_active'],
				'loop_product_color_scheme'						=> $atts['product_color_scheme'],
				'loop_product_gutter'							=> $atts['row_column_gap'],
				'loop_product_show_data_unit_sold'				=> $atts['show_data_unit_sold']
			)
		);

	}

}

if ( !function_exists( 'dahz_shortcode_reset_loop_product_settings' ) ) {

	function dahz_shortcode_reset_loop_product_settings() {

		// global $overriden_customizer_layout;

		// dahz_framework_override_theme_mods( array(
			// 'woo_shop_style'	=> isset( $overriden_customizer_layout['woo_shop_style'] ) ? $overriden_customizer_layout['woo_shop_style'] : 'elaina'
		// ) );

		dahz_framework_override_static_option(
			array(
				'is_loop_product_shortcode'						=> false,
				'enable_loop_product_slider'					=> false,
				'loop_product_desktop_column'					=> 3,
				'loop_product_tablet_landscape_column'			=> 2,
				'loop_product_phone_potrait_column'				=> 1,
				'loop_product_phone_landscape_column'			=> 2,
				'loop_product_slider_show_slide_nav'			=> true,
				'loop_product_slider_slide_nav_position'		=> 'inside',
				'loop_product_slider_show_slide_nav_when_hover' => true,
				'loop_product_slider_slide_nav_breakpoint'		=> '',
				'loop_product_slider_show_dot_nav'				=> false,
				'loop_product_slider_dot_nav_breakpoint'		=> '',
				'loop_product_slider_auto_play_interval'		=> '',
				'loop_product_slider_enable_infinite'			=> true,
				'loop_product_slider_enable_slide'				=> true,
				'loop_product_slider_enable_center_active'		=> false,
				'loop_product_color_scheme'						=> '',
				'loop_product_gutter'							=> '',
				'loop_product_show_data_unit_sold'				=> false
			)
		);

	}

}

if( !function_exists( 'dahz_shortcode_get_tta_template_name' ) ){

	function dahz_shortcode_get_tta_template_name( $shortcode ){

		$template_name = '';

		switch( $shortcode ){
			case 'vc_tta_tabs':
				$template_name = 'tabs.php';
				break;
			case 'vc_tta_tour':
				$template_name = 'tour.php';
				break;
			case 'vc_tta_pageable':
				$template_name = 'slider.php';
				break;
			case 'vc_tta_accordion':
				$template_name = 'accordion.php';
				break;

		}

		return $template_name;

	}

}

if( !function_exists( 'dahz_shortcode_get_google_fonts' ) ){

	function dahz_shortcode_get_google_fonts( $google_fonts ){

		$google_fonts_data = '';

		$styles = array();

		$enqueue = array();

		$google_fonts_obj = new Vc_Google_Fonts();

		$google_fonts_data = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $google_fonts ) : '';

		if ( ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ){

			$settings = get_option( 'wpb_js_google_fonts_subsets' );

			if ( is_array( $settings ) && ! empty( $settings ) ) {

				$subsets = '&subset=' . implode( ',', $settings );

			} else {

				$subsets = '';

			}

			$enqueue['key'] = 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] );

			$enqueue['link'] = '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets;

			$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );

			$styles[] = !empty( $google_fonts_family[0] ) ? 'font-family:' . $google_fonts_family[0] . ';' : '';

			$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );

			$styles[] = !empty( $google_fonts_styles[1] ) ? 'font-weight:' . $google_fonts_styles[1] . ';' : '';

			$styles[] = !empty( $google_fonts_styles[2] ) ? 'font-style:' . $google_fonts_styles[2] . ';' : '';

		}

		return array(
			'google_fonts_data'	=> $google_fonts_data,
			'styles'			=> $styles,
			'enqueue'			=> $enqueue
		);

	}

}

if( !function_exists( 'dahz_shortcode_get_font_container' ) ){

	function dahz_shortcode_get_font_container( $font_container ){

		$font_container_obj = new Vc_Font_Container();

		$font_container_data = $font_container_obj->_vc_font_container_parse_attributes( array(), $font_container );

		$styles = array();

		if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {

			foreach ( $font_container_data['values'] as $key => $value ) {

				if ( 'tag' !== $key && strlen( $value ) ) {

					if ( preg_match( '/description/', $key ) ) {
						continue;
					}
					if ( 'font_size' === $key || 'line_height' === $key ) {
						$value = preg_replace( '/\s+/', '', $value );
					}
					if ( 'font_size' === $key ) {
						$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
						// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
						$regexr = preg_match( $pattern, $value, $matches );
						$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
						$unit = isset( $matches[2] ) ? $matches[2] : 'px';
						$value = $value . $unit;
					}
					if ( strlen( $value ) > 0 ) {
						$styles[] = str_replace( '_', '-', $key ) . ': ' . $value . ';';
					}
				}
			}
		}

		return array(
			'styles'				=> $styles,
			'font_container_data'	=> $font_container_data
		);

	}

}

if( !function_exists( 'dahz_shortcode_safe_css_units' ) ){

	function dahz_shortcode_safe_css_units( $value = '' ){

		if( !strlen( $value ) ) return $value;

		$value = preg_replace( '/\s+/', '', $value );

		$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
		// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
		$regexr = preg_match( $pattern, $value, $matches );

		$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;

		$unit = isset( $matches[2] ) ? $matches[2] : 'px';

		return $value . $unit;

	}

}

if( !function_exists( 'dahz_shortcode_build_link' ) ){

	function dahz_shortcode_build_link( $link = '', $target = 'modal', $title = '', $text = '' ){

		$link_attributes = array( 'href' => $link );

		if( $target == 'modal' ){

			$youtube_pattern = '~
			  ^(?:https?://)?                           # Optional protocol
			   (?:www[.])?                              # Optional sub-domain
			   (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
			   ([^&]{11})                               # Video id of 11 characters as capture group 1
				~x';

			$vimeo_pattern = '~
			  ^(?:https?://)?                           # Optional protocol
			   (?:www[.])?                              # Optional sub-domain
			   (?:vimeo[.]com/) # Mandatory domain name (w/ query string in .com)
			   ([^&]{11})                               # Video id of 11 characters as capture group 1
				~x';

			$image_pattern = '/\.(jpg|png|jpeg|bmp|gif)$/';

			$video_pattern = '/\.(mp4|webm|ogg)$/';

			if(
				!preg_match( $youtube_pattern, $link ) &&
				!preg_match( $vimeo_pattern, $link ) &&
				!preg_match( $image_pattern, $link ) &&
				!preg_match( $video_pattern, $link )
			){
				$link_attributes['data-type'] = 'iframe';
			}

			$pattern = '<div data-uk-lightbox><a %1$s>%2$s</a></div>';

		} else {

			if( $target == '_self' || $target == '_blank' ) $link_attributes['target'] = $target;

			$pattern = '<a %1$s>%2$s</a>';

		}

		return sprintf(
			$pattern,
			dahz_shortcode_set_attributes(
				$link_attributes,
				'dahz_shortcode_link',
				array(),
				false
			),
			$text
		);

	}

}

if ( !function_exists( 'dahz_shortcode_render_pagination' ) ) {

	function dahz_shortcode_render_pagination( $params ) {

		if ( $params['query']->max_num_pages <= 1 ) return;

		$max = intval( $params['query']->max_num_pages );

		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		switch ( $params['type'] ) {

			case 'infinite_scroll':
				printf(
					'
					<div class="de-sc-pagination" data-shortcode="%s" data-container="%s" data-item="%s" data-pagination-type="%s" data-layout-masonry="%s" data-paged="%s" data-max_num_pages="%s">
						<div class="de-sc-pagination__nav">
							<a href="%s" class="de-sc-pagination__nav-btn de-btn de-btn--boxed de-btn--slide-bottom de-btn--fill">%s</a>
						</div>
						<div class="de-sc-pagination__loader">
							<div class="de-sc-pagination__loader-text">
								<span></span>
								<h5>%s</h5>
							</div>
						</div>
					</div>
					',
					esc_attr( $params['shortcode'] ),
					esc_attr( $params['container'] ),
					esc_attr( $params['item'] ),
					esc_attr( $params['type'] ),
					esc_attr( $params['is_masonry'] ),
					esc_attr( $paged ),
					esc_attr( $max ),
					esc_url( next_posts( $max, false ) ),
					__( 'To Infinity and Beyond', 'sobari' ),
					__( 'LOADING', 'sobari' )
				);

			break;

			case 'load_more':
				printf(
					'
					<div class="de-sc-pagination" data-shortcode="%s" data-container="%s" data-item="%s" data-pagination-type="%s" data-layout-masonry="%s" data-paged="%s" data-max_num_pages="%s">
						<div class="de-sc-pagination__nav">
							<a href="%s" class="de-sc-pagination__nav-btn de-btn de-btn--boxed de-btn--slide-bottom de-btn--fill">%s</a>
						</div>

					</div>
					',
					esc_attr( $params['shortcode'] ),
					esc_attr( $params['container'] ),
					esc_attr( $params['item'] ),
					esc_attr( $params['type'] ),
					esc_attr( $params['is_masonry'] ),
					esc_attr( $paged ),
					esc_attr( $max ),
					esc_url( next_posts( $max, false ) ),
					__( 'Load More', 'sobari' ),
					__( 'LOADING', 'sobari' )
				);

			break;

			case 'number':

				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

				// Add current page to the array
				if ( $paged >= 1  ) {
					$links[] = $paged;
				}

				// Add the pages around the current page to the array
				if ( $paged >= 3 ) {
					$links[] = $paged - 1;
					$links[] = $paged - 2;
				}

				if ( ( $paged + 2 ) <= $max ) {
					$links[] = $paged + 2;
					$links[] = $paged + 1;
				}

				printf(
					'
					<div class="de-sc-pagination" data-shortcode="%s" data-container="%s" data-item="%s" data-pagination-type="%s" data-layout-masonry="%s" data-paged="%s" data-max_num_pages="%s">
						<div class="de-sc-pagination__nav">
							<ul>
					',
					esc_attr( $params['shortcode'] ),
					esc_attr( $params['container'] ),
					esc_attr( $params['item'] ),
					esc_attr( $params['type'] ),
					esc_attr( $params['is_masonry'] ),
					esc_attr( $paged ),
					esc_attr( $max )
				);

				echo '<li><h5>';

				/**	Previous Post Link */
				printf( '%s', get_previous_posts_link('<i class="df-long-arrow-left"></i>', $params['query']->max_num_pages ) );

				echo '</h5></li>';

				echo '<li><ul>';
				// Link to first page, plus ellipses if necessary
				if ( ! in_array( 1, $links ) ) {
					$class = 1 == $paged ? ' class="active"' : '';

					printf( '<li%s><h5><a href="%s">%s</a></h5></li>', $class, esc_url( get_pagenum_link( 1 ) ), '1' );

					if ( ! in_array( 2, $links ) ) echo '<li><h5>...</h5></li>';
				}

				// Link to current page, plus 2 pages in either direction if necessary
				sort( $links );
				foreach ( (array) $links as $link ) {
					$class = $paged == $link ? ' class="active"' : '';
					printf( '<li%s><h5><a href="%s">%s</a></h5></li>', $class, esc_url( get_pagenum_link( $link ) ), $link );
				}

				// Link to last page, plus ellipses if necessary
				if ( ! in_array( $max, $links ) ) {
					if ( ! in_array( $max - 1, $links ) )
						echo '<li><h5>...</h5></li>';

					$class = $paged == $max ? ' class="active"' : '';
					printf( '<li%s><h5><a href="%s">%s</a></h5></li>', $class, esc_url( get_pagenum_link( $max ) ), $max );
				}
				echo '</ul></li>';

				echo '<li><h5>';

				/**	Next Post Link */
				printf( '%s', get_next_posts_link('<i class="df-long-arrow-right"></i>', $params['query']->max_num_pages ) );

				echo '</h5></li>';

				echo '</ul></div></div>';

			break;

			default:

				return;

			break;

		}

	}

}

if ( !function_exists( 'dahz_shortcode_oembed_dataparse' ) ) {
	
	function dahz_shortcode_oembed_dataparse( $iframe, $args, $url ){

		if( false === strpos( $iframe,'youtube.com' ) ){ return $iframe; }

		$id = explode( 'watch?v=', $url );

		preg_match( '/src="([^"]+)"/', $iframe, $match );

		if( isset( $match[1] ) && isset( $id[1] ) ){

			$iframe = str_replace(
				$match[1],
				add_query_arg(
					array(
						'loop'		=> '1',
						'playlist'	=> $id[1]
					),
					$match[1]
				), $iframe
			);

		}

		return $iframe;

	}
	
}

add_filter( 'oembed_dataparse', 'dahz_shortcode_oembed_dataparse', 10, 3 );

if ( !function_exists( 'dahz_shortcodes_enqueue_font_icon_element' ) ) {
	
	function dahz_shortcodes_enqueue_font_icon_element( $font ){
	
		switch( $font ){
			case 'beautysalon':
				wp_enqueue_style( 'dahz-font-beauty-salon' );
				break;
			case 'salon':
				wp_enqueue_style( 'dahz-font-salon' );
				break;
			case 'grooming':
				wp_enqueue_style( 'dahz-font-grooming' );
				break;
			case 'tattoostudio':
				wp_enqueue_style( 'dahz-font-tattoo-studio' );
				break;
			case 'barbershop':
				wp_enqueue_style( 'dahz-font-barbershop' );
				break;
		}
		
	}
	
}

add_action( 'vc_enqueue_font_icon_element', 'dahz_shortcodes_enqueue_font_icon_element' );