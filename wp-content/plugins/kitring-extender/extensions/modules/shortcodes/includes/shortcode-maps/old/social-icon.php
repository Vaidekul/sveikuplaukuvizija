<?php
/**
*
*/
if( !class_exists( 'Sobari_Social_Icon_Shortcode' ) ){

	class Sobari_Social_Icon_Shortcode extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$param = array(
				'name'				=> esc_attr__( 'Social Icon', 'sobari_sc' ),
				'base'				=> 'social_icon',
				'description'		=> esc_attr__( 'Display social icon profile', 'sobari_sc' ),
				'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/Social-Icon.svg",
				'params'			=> array()
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Social Icon Style', 'sobari_sc' ),
				'param_name'	=> 'style',
				'value'			=> array(
					'Simple'			=> 'simple',
					'Square'			=> 'square',
					'Outlined Square'	=> 'outlined-square',
					'Circle'			=> 'circle',
					'Outlined Circle'	=> 'outlined-circle'
				),
				'description'	=> esc_attr__( 'Social Icon Style', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Social Icon Size', 'sobari_sc' ),
				'param_name'	=> 'icon_size',
				'description'	=> esc_attr__( 'Social Icon Size', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Social Icon Alignment', 'sobari_sc' ),
				'param_name'	=> 'icon_alignment',
				'value'			=> self::$helper['field_options']['alignment'],
				'description'	=> esc_attr__( 'Social Icon Alignment', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Icon Color', 'sobari_sc' ),
				'param_name'	=> 'icon_color',
				'description'	=> esc_attr__( 'Icon Color', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Icon Background Color', 'sobari_sc' ),
				'param_name'	=> 'icon_background_color',
				'description'	=> esc_attr__( 'Icon Background Color', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array( 'square', 'circle' ),
				),
			);

			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Outline Color', 'sobari_sc' ),
				'param_name'	=> 'outline_color',
				'description'	=> esc_attr__( 'Outline Color', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array( 'outlined-square', 'outlined-circle' ),
				),
			);

			// add_filter( "dahz_shortcode_build_css_social_icon", array( $this, 'dahz_framework_social_icon_style' ), 10, 4 );

			parent::dahz_framework_shortcode_maps( $param );

		}

		public function dahz_framework_social_icon_style( $vc_style, $attr_array, $key ) {

			$uniqid = $key;

			extract( $attr_array );

			$vc_style .= sprintf(
				'

				[data-dahz-shortcode-key="%1$s"]  .de-social-accounts__icon  {
					color: %2$s;
					font-size: %3$s;
				}

				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--outlined-square .de-social-accounts__icon,
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--outlined-circle .de-social-accounts__icon,
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--square .de-social-accounts__icon,
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--circle .de-social-accounts__icon {
					color: %2$s;
					font-size: %3$s;
				}
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--square .de-social-accounts__icon,
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--circle .de-social-accounts__icon {
					background: %4$s;
				}
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--outlined-square .de-social-accounts__icon,
				[data-dahz-shortcode-key="%1$s"] .de-social-accounts--outlined-circle .de-social-accounts__icon {
					border: 1px solid %5$s;
				}
				',
				$uniqid, // 1
				!empty( $icon_color ) ? esc_attr( $icon_color ) : 'inherit' , // 2
				is_numeric( $icon_size ) ? sprintf( '%spx', $icon_size ) : $icon_size, // 3
				!empty( $icon_background_color ) ? $icon_background_color : 'transparent', // 4
				$outline_color // 5
			);

			return $vc_style;

		}

	}

	new Sobari_Social_Icon_Shortcode();

}
