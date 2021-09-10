<?php
/*
[0] => icon
[1] => icon_ratio
[2] => enable_multiple_open
[3] => enable_close_all
[4] => tag
[5] => custom_font_size
[6] => font_size
[7] => active_section
[8] => active_color
[9] => inactive_color
[10] => border_color
[11] => css_animation
[12] => animation_parallax
[13] => delay_animation
[14] => repeat_animation
[15] => el_class
[16] => margin
[17] => remove_top_margin
[18] => remove_bottom_margin
[19] => visibility
[20] => enable_dahz_lazy_shortcode
*/
extract( $atts );

$tab_wrapper_attributes = array( 
	'class' 					=> array( 'uk-accordion de-sc-accordion', $margin, $visibility, $el_class ), 
	'data-uk-accordion' 		=> array(), 
	'data-dahz-shortcode-key' 	=> $dahz_id 
);

# remove margin top
if ( !empty( $remove_top_margin ) ) $tab_wrapper_attributes['class'][] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $tab_wrapper_attributes['class'][] = 'uk-margin-remove-bottom';

if( !empty( $enable_multiple_open ) ) $tab_wrapper_attributes['data-uk-accordion'] = 'multiple : true;';

if( empty( $enable_close_all ) ) $tab_wrapper_attributes['data-uk-accordion'] = 'collapsible : false;';
?>
<ul <?php dahz_shortcode_set_attributes(
		$tab_wrapper_attributes,
		'vc_accordion_wrapper'
	);?>>
    <?php echo $prepareContent?>
</ul>
