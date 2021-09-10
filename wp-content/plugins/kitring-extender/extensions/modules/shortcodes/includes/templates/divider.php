<?php
/*
	Shortcode Attributes
	[0] => line_type
    [1] => line_alignment
    [2] => line_thickness
    [3] => custom_line_width
    [4] => line_color
    [5] => enable_gradient
    [6] => line_color_2
    [7] => gradient_direction
    [8] => enable_animate
    [9] => delay_line_animation
    [10] => css_animation
    [11] => animation_parallax
    [12] => delay_animation
    [13] => repeat_animation
    [14] => el_class
    [15] => margin
    [16] => remove_top_margin
    [17] => remove_bottom_margin
    [18] => visibility
    [19] => enable_dahz_lazy_shortcode
    [20] => dahz_id
*/
?>

 <div class="de-divider__wrapper uk-flex-<?php echo esc_attr( $line_alignment ) ?>">
     <div <?php dahz_shortcode_set_attributes(
		array(
			'class' 	=> array( 
				'de-divider', 
				( $line_type == 'fullwidth' ? 'uk-width-1-1' : '' )
			)
		),
		'dahz_divider'
	 );?>></div>
 </div>
