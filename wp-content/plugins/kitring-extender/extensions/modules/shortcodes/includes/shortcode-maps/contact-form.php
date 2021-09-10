<?php
/**
*
*/
if( !class_exists( 'Sobari_Contact_Form_Shortcodes' ) ){

	class Sobari_Contact_Form_Shortcodes extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$param = array(
				'name'				=> esc_attr__( 'Contact Form', 'sobari_sc' ),
				'base'				=> 'contact_form',
				'category'	=> array( 'Content' ),
				'description'		=> esc_attr__( 'Place contact form 7', 'sobari_sc' ),
				'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-contact-form-7.svg",
				'params'			=> array(),
				'dahz_animated_on'	=> true
			);

			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[ $cform->post_title ] = $cform->ID;
				}
			} else {
				$contact_forms[ esc_attr__( 'No contact forms found', 'sobari_sc' ) ] = 0;
			}

			$param['params'][] = array(
				'type' => 'dropdown',
				'heading' => esc_attr__( 'Select contact form', 'sobari_sc' ),
				'param_name' => 'id',
				'value' => $contact_forms,
				'save_always' => true,
				'description' => esc_attr__( 'Choose previously created contact form from the drop down list.', 'sobari_sc' ),
			);

			$param['params'][] = array(
				'type' => 'textfield',
				'heading' => esc_attr__( 'Search title', 'sobari_sc' ),
				'param_name' => 'title',
				'admin_label' => true,
				'description' => esc_attr__( 'Enter optional title to search if no ID selected or cannot find by ID.', 'sobari_sc' ),
			);

			$param['params'][] = array(
				'type' 			=> 'radio_image',
				'heading' 		=> esc_attr__( 'Form Style', 'sobari_sc' ),
				'param_name' 	=> 'style',
				'description' 	=> esc_attr__( 'Form Style', 'sobari_sc' ),
				'value'			=> array(
					'default'		=> DAHZEXTENDER_SHORTCODE_URI . 'assets/images/contact-form-01.png',
					'boxed'			=> DAHZEXTENDER_SHORTCODE_URI . 'assets/images/contact-form-01.png',
					'line'			=> DAHZEXTENDER_SHORTCODE_URI . 'assets/images/contact-form-01.png',
				)
			);


			$param['params'][] = array(
				'type' 			=> 'colorpicker',
				'heading' 		=> esc_attr__( 'Inner Background Color', 'sobari_sc' ),
				'param_name' 	=> 'inner_background_color',
				'description' 	=> esc_attr__( 'Inner Background Color', 'sobari_sc' ),
				'group'			=> 'Content Style'
			);
			$param['params'][] = array(
				'type' 			=> 'colorpicker',
				'heading' 		=> esc_attr__( 'Border Color', 'sobari_sc' ),
				'param_name' 	=> 'border_color',
				'description' 	=> esc_attr__( 'Border Color', 'sobari_sc' ),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_attr__( 'Border Style', 'sobari_sc' ),
				'param_name' 	=> 'border_style',
				'description' 	=> esc_attr__( 'Border Style', 'sobari_sc' ),
				'value'			=> array(
					'Solid'		=> 'solid',
					'Dashed' 	=> 'dashed',
					'Dotted' 	=> 'dotted',
				),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_attr__( 'Border Width', 'sobari_sc' ),
				'param_name' 	=> 'border_width',
				'description' 	=> esc_attr__( 'Border Width', 'sobari_sc' ),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_attr__( 'Border Radius', 'sobari_sc' ),
				'param_name' 	=> 'border_radius',
				'description' 	=> esc_attr__( 'Border Radius', 'sobari_sc' ),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_attr__( 'Style on Focus', 'sobari_sc' ),
				'param_name' 	=> 'focus_style',
				'description' 	=> esc_attr__( 'Style on Focus', 'sobari_sc' ),
				'value'			=> array(
					'Simple'	=> 'simple',
					'Shadow' 	=> 'shadow',
					'Underline' => 'underline',
				),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'colorpicker',
				'heading' 		=> esc_attr__( 'Simple Border Color', 'sobari_sc' ),
				'param_name' 	=> 'simple_border_color',
				'description' 	=> esc_attr__( 'Simple Border Color', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'focus_style',
					'value'		=> 'simple'
				),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'colorpicker',
				'heading' 		=> esc_attr__( 'Underline Color', 'sobari_sc' ),
				'param_name' 	=> 'underline_color',
				'description' 	=> esc_attr__( 'Underline Color', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'focus_style',
					'value'		=> 'underline'
				),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type' 			=> 'colorpicker',
				'heading' 		=> esc_attr__( 'Text Color', 'sobari_sc' ),
				'param_name' 	=> 'text_color',
				'description' 	=> esc_attr__( 'Text Color', 'sobari_sc' ),
				'group'			=> esc_attr__( 'Content Style', 'sobari_sc' )
			);
			dahz_shortcode_add_package( $param, 'button' );
			$param['params'][] = array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_attr__( 'Button Alignment', 'sobari_sc' ),
				'param_name' 	=> 'button_alignment',
				'description' 	=> esc_attr__( 'Button Alignment', 'sobari_sc' ),
				'group'			=> esc_attr__( 'Button Options', 'sobari_sc' ),
				'value'			=> self::$helper['field_options']['alignment']
			);

			// add_filter( "dahz_shortcode_build_css_contact_form", array( $this, 'dahz_framework_contact_form_style' ), 10, 4 );

			parent::dahz_framework_shortcode_maps(
				$param,
				array(
					"id" 						=> "",
					"title" 					=> "",
					"style" 					=> "default",
					"inner_background_color" 	=> "#ffffff",
					"border_color" 				=> "#aaaaaa",
					"border_style" 				=> "solid",
					"border_width" 				=> "1px",
					"border_radius" 			=> "",
					"focus_style" 				=> "simple",
					"simple_border_color" 		=> "#aaaaaa",
					"underline_color" 			=> "",
					"text_color" 				=> "#cccccc",
					"button_label" 				=> "Button",
					"button_style" 				=> "fill",
					"button_color" 				=> "#aaaaaa",
					"button_hover_color" 		=> "#0a0a0a",
					"button_outline_color" 		=> "",
					"button_outline_hover_color"=> "",
					"button_label_color" 		=> "#ffffff",
					"button_label_hover_color" 	=> "#ffffff",
					"button_size" 				=> "14px",
					"button_border_radius" 		=> "0px",
					"button_is_fullwidth" 		=> "",
					"button_alignment" 			=> "left",
					"button_is_use_icon" 		=> "",
					"button_icon_type" 			=> "",
					"button_icon_fontawesome" 	=> "",
					"button_icon_openiconic" 	=> "",
					"button_icon_typicons" 		=> "",
					"button_icon_entypo" 		=> "",
					"button_icon_linecons" 		=> "",
					"button_icon_pixelicons" 	=> "",
					"button_icon_monosocial" 	=> "",
					"button_icon_dahzicon" 		=> "",
					"button_icon_position" 		=> "",
					"enable_captcha" 			=> "",
					"public_key" 				=> "",
					"private_key" 				=> "",
					"css_animation" 			=> "",
				)
			);


		}

		public function dahz_framework_contact_form_style( $vc_style, $attr_array, $key ){

			$uniqid = $key;

			extract( $attr_array );

			$vc_style .= sprintf(
				'
				div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--default form [class^="row-"] > span,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--default form > p,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--boxed form [class^="row-"] > span,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--boxed form > p {
                    color: %2$s;
                    background: %3$s;
                    border-width: %4$s;
                    border-color: %5$s;
                    border-radius: %6$s;
                    border-style: %7$s;
                }

                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="text"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form textarea:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="email"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="url"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="tel"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="number"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="date"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form .de-select:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form input[type="file"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--focus-style-simple form textarea:focus{
                    border-color: %8$s;
                }

                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="text"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form textarea,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="email"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="url"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="tel"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="number"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="date"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form .de-select,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="file"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form textarea {
                    border: none;
                    border-bottom-width: %4$s;
                    border-bottom-color: %5$s;
                    border-bottom-style: %7$s;
                }

                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="text"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form textarea:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="email"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="url"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="tel"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="number"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="date"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form .de-select:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form input[type="file"]:focus,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--line form textarea:focus {
                    border-bottom-color: %9$s;
                }

                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--button-outline button[type="submit"],
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--button-fill button[type="submit"] {
                    font-size: %10$s;
                    color: %11$s;
                    border-radius: %12$s;
                }
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--button-fill button[type="submit"] {
                    background: %13$s;
                }
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--button-fill button[type="submit"]:hover {
                    background: %14$s;
                }
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--button-outline button[type="submit"]:hover,
                div[data-dahz-shortcode-key=%1$s] .de-sc-contact-form--button-fill button[type="submit"]:hover {
                    color: %15$s;
                }
				',
				$uniqid, // 1
				!empty( $text_color ) ? esc_attr( $text_color ) : 'inherit', // 2
				!empty( $inner_background_color ) ? esc_attr( $inner_background_color ) : 'transparent', // 3
				!empty( $border_width ) ? esc_attr( $border_width ) : '0', // 4
				!empty( $border_color ) ? esc_attr( $border_color ) : 'transparent', // 5
				!empty( $border_radius ) ? esc_attr( $border_radius ) : '0', // 6
				!empty( $border_style ) ? esc_attr( $border_style ) : 'inherit', // 7
				!empty( $simple_border_color ) ? esc_attr( $simple_border_color ) : 'inherit', // 8
				!empty( $underline_color ) ? esc_attr( $underline_color ) : 'transparent', // 9
				!empty( $button_size ) ? esc_attr( $button_size ) : 'inherit', // 10
				!empty( $button_label_color ) ? esc_attr( $button_label_color ) : 'rgba(255,255,255,0)', // 11
				!empty( $button_border_radius ) ? esc_attr( $button_border_radius ) : '0', // 12
				!empty( $button_color ) ? esc_attr( $button_color ) : 'rgba(255,255,255,0)', // 13
				!empty( $button_hover_color ) ? esc_attr( $button_hover_color ) : 'rgba(255,255,255,0)', // 14
				!empty( $button_label_hover_color ) ? esc_attr( $button_label_hover_color ) : 'rgba(255,255,255,0)', // 15
				$key2
			);
			return $vc_style;
		}
	}

	new Sobari_Contact_Form_Shortcodes();

}
