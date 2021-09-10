<?php
if( !class_exists( 'Sobari_Carousel_Item_Shortcodes' ) ){
	
	class Sobari_Carousel_Item_Shortcodes extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$settings = array(
				'name'						=> esc_attr__( 'Carousel Item', 'sobari_sc' ),
				'base'						=> 'carousel_item',
				'content_element'			=> true,
				'as_parent'					=> array( 'except'	=> 'carousel_container, carousel_item' ),
				'as_child'					=> array( 'only'	=> 'carousel_container' ),
				'show_settings_on_create'	=> false,
				'is_container'				=> true,
				'js_view'					=> 'VcColumnView',
				'description'				=> esc_attr__( 'Insert an item for carousel', 'sobari_sc' ),
				'params'					=> array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_attr__( 'Extra Class', 'sobari_sc' ),
						'param_name'	=> 'carousel_item_class',
						'description'	=> esc_attr__( 'Add extra class', 'sobari_sc' ),
					),
				)
			);

			parent::dahz_framework_shortcode_maps( $settings );

		}

	}

	new Sobari_Carousel_Item_Shortcodes();

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

		class WPBakeryShortCode_Carousel_Item extends WPBakeryShortCodesContainer {

		}

	}
	
}