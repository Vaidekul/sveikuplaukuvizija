<?php
if( !class_exists( 'Sobari_Carousel_Container_Shortcode' ) ){
	
	class Sobari_Carousel_Container_Shortcode extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$settings = array(
				'name'				=> esc_attr__( 'Carousel Container', 'sobari_sc' ),
				'base'				=> 'carousel_container',
				'content_element'	=> 'true',
				'as_parent'			=> array( 'only' => 'carousel_item' ),
				'is_container'		=> 'true',
				'js_view'			=> 'VcColumnView',
				'description'		=> esc_attr__( 'Create a container for carousel', 'sobari_sc' ),
				'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/Carousel-Container.svg",
				'params'			=> array(
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_attr__( 'Desktop Column', 'sobari_sc' ),
						'param_name'	=> 'desktop_column',
						'value'			=> array(
											'1'	=> '1',
											'2'	=> '2',
											'3'	=> '3',
											'4'	=> '4',
											'5'	=> '5',
											'6'	=> '6'
										),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_attr__( 'Small Desktop Column', 'sobari_sc' ),
						'param_name'	=> 'small_desktop_column',
						'value'			=> array(
											'1'	=> '1',
											'2'	=> '2',
											'3'	=> '3',
											'4'	=> '4',
											'5'	=> '5',
											'6'	=> '6'
										),
						'save_always'	=> 'true',
						'description'	=> esc_attr__( 'Show on Small Desktop. ( Medium Desktop, Landscape Tablet )', 'sobari_sc' ),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_attr__( 'Mobile Column', 'sobari_sc' ),
						'param_name'	=> 'mobile_column',
						'value'			=> array(
											'1'	=> '1',
											'2'	=> '2',
											'3'	=> '3',
										),
					),
					array(
						'type'			=> 'checkbox',
						'heading'		=> esc_attr__( 'Show Navigation Arrows', 'sobari_sc' ),
						'param_name'	=> 'is_show_nav_arrows',
						'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_attr__( 'Carousel Arrow Position', 'sobari_sc' ),
						'param_name'	=> 'carousel_position_nav',
						'value'			=> array(
											'Inside'	=> 'inside',
											'Outside'	=> 'outside'
										),
						'dependency'	=> array(
							'element'	=> 'is_show_nav_arrows',
							'value'		=> 'true'
						),
					),
					array(
						'type'			=> 'checkbox',
						'heading'		=> esc_attr__( 'Show Navigation Dots', 'sobari_sc' ),
						'param_name'	=> 'is_show_navigation_dots',
						'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
					),
					array(
						'type'			=> 'checkbox',
						'heading'		=> esc_attr__( 'Enable Auto Play', 'sobari_sc' ),
						'param_name'	=> 'enable_auto_play',
						'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_attr__( 'Auto Play Duration', 'sobari_sc' ),
						'param_name'	=> 'auto_play_duration',
						'description'	=> esc_attr__( 'Set autoplay duration. Default is 2000', 'sobari_sc' ),
						'dependency'	=> array(
							'element'	=> 'enable_auto_play',
							'value'		=> 'true',
						),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_attr__( 'Extra Class', 'sobari_sc' ),
						'param_name'	=> 'carousel_item_class',
						'description'	=> esc_attr__( 'Add extra class', 'sobari_sc' ),
					),
				)
			);

			parent::dahz_framework_shortcode_maps(
				$settings,
				array(
					// General
					"desktop_column"			=> "4",
					"small_desktop_column"		=> "2",
					"mobile_column"				=> "1",
					"is_show_nav_arrows"		=> "true",
					"is_show_navigation_dots"	=> "true",
					"auto_play_duration"		=> "2000"
				)
			);

		}

	}

	new Sobari_Carousel_Container_Shortcode();

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

		class WPBakeryShortCode_Carousel_Container extends WPBakeryShortCodesContainer {

		}

	}
	
}