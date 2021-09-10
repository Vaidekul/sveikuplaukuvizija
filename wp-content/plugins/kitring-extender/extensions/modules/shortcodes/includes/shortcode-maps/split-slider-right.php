<?php
/**
* KW
*/

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_DF_Right_Split_Slider extends WPBakeryShortCodesContainer {
    }
}
$param = array(
	"name" 						=> __("Split Slider Right", "js_composer"),
	"base" 						=> "df_right_split_slider",
  'description'		=> esc_attr__( 'Split slider right container', 'sobari_sc' ),
	"icon"						=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-split-slider-right.svg",
	"content_element" 			=> true,
	"as_parent" 				=> array( 'only' => 'df_item_split_slider' ),
	"is_container" 				=> true,
	"show_settings_on_create" 	=> false,
	"js_view" 					=> 'VcColumnView',
	"params"					=> array(
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( "Extra Class", "js_composer" ),
			"param_name" 	=> "extra_class",
			"description" 	=> __( "Extra Class for Split Slider", "upscale" )
		)
	)
);

return $param;
