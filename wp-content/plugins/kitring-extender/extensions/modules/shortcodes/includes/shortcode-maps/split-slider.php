<?php
/**
* KW
*/
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_DF_Split_Slider extends WPBakeryShortCodesContainer {
    }
}

$param = array(
	"name"		 				=> __( "Split Slider", "js_composer" ),
	"base" 						=> "df_split_slider",
	"icon"						=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-split-slider.svg",
	"is_container" 				=> true,
	"js_view"					=> 'VcColumnView',
	"as_parent" 				=> array( 'only' => 'df_left_split_slider, df_right_split_slider' ),
	"content_element" 			=> true,
	"show_settings_on_create" 	=> true,
  'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Create multi scrolling row with two vertical scrolling panels', 'sobari_sc' ),
	'params'			=> array(
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( "Extra Class", "js_composer" ),
			"param_name" 	=> "extra_class",
			"description" 	=> __( "Extra Class for Split Slider", "upscale" )
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Nav Visibility', 'sobari_sc' ),
			'param_name'	=> 'nav_visibility',
			'description'	=> __( 'Display the image only on this device width and larger', 'sobari_sc' ),
			'value'			=> dahz_shortcode_helper_get_field_option( 'breakpoint' ),
		)
	),
);

return $param;
