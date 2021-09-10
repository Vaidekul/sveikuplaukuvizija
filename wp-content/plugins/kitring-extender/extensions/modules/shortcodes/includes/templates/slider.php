<?php
/*
[0] => dahz_id
[1] => columns
[2] => tablet_landscape_column
[3] => phone_landscape_column
[4] => phone_potrait_column
[5] => row_column_gap
[6] => row_display_divider_between
[7] => row_divider_color
[8] => height
[9] => min_height
[10] => nav_color_scheme
[11] => show_slide_nav
[12] => slide_nav_position
[13] => show_slide_nav_when_hover
[14] => slide_nav_breakpoint
[15] => show_dot_nav
[16] => dot_nav_breakpoint
[17] => auto_play_interval
[18] => enable_infinite
[19] => enable_slide
[20] => enable_center_active
[21] => css_animation
[22] => animation_parallax
[23] => delay_animation
[24] => repeat_animation
[25] => el_class
[26] => margin
[27] => remove_top_margin
[28] => remove_bottom_margin
[29] => visibility
[30] => enable_dahz_lazy_shortcode
*/
extract( $atts );
# Shortcode attributes
$shortcode_attr = array( 'class' => array( 'de-sc-slider', $visibility, $margin, $el_class ), 'data-dahz-shortcode-key' => $dahz_id );
# Slider attributes
$slider_attr = array();

# Loop attribute
$loop_attr = array();

# Item attribute
$item_attr = array();

# Content attribute
$content_attr = array();

# SETTING SHORTCODE
	# Class

# END OF SETTING SHORTCODE

# SETTING LOOP
# Class
$loop_classes = array( 'uk-grid' );

# Grid
$loop_attr['data-uk-grid'] = '';
# END OF SETTING LOOP
if( !empty( $height ) ){
	switch( $height ){
		case 'viewport':
			$loop_attr['data-uk-height-viewport'] = 'expand:true;';
			break;
		case 'viewport-20':
			$loop_attr['data-uk-height-viewport'] = 'bottom:20;';
			break;
		case 'viewport-bottom':
			$loop_attr['data-uk-height-viewport'] = 'bottom:true;';
			break;
	}
	if( !empty( $min_height ) ) $loop_attr['data-uk-height-viewport'] .= 'min-height:' . $min_height . ';';
}
if( !empty( $css_animation ) && $css_animation !== 'none' ){

	if( $css_animation == 'parallax' ){
		$shortcode_attr['data-uk-parallax'] = dahz_shortcode_get_parallax_option( $animation_parallax, false );
		$shortcode_attr['class'][] = dahz_shortcode_get_parallax_class( $animation_parallax );
	} else {
		$shortcode_attr['data-uk-scrollspy'] = array( 'cls:' . $css_animation . ';' );
		if( !empty( $delay_animation ) ) $shortcode_attr['data-uk-scrollspy'][] = 'delay:' . $delay_animation . ';';
		if( !empty( $repeat_animation ) ) $shortcode_attr['data-uk-scrollspy'][] = 'repeat:true;';
	}

}
if ( !empty( $margin ) ) $shortcode_attr['class'][] = $margin;

# remove margin top
if ( !empty( $remove_top_margin ) ) $shortcode_attr['class'][] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $shortcode_attr['class'][] = 'uk-margin-remove-bottom';
# SETTING COLUMN ON ALL DEVICES
# Set column gap
if ( !empty( $row_column_gap ) )
	$loop_attr['class'] = $row_column_gap;

// # Set product color scheme
// if ( !empty( $nav_color_scheme ) )
// 	$loop_attr[] = $nav_color_scheme;

# Set column per row
# Check value from customizer


# Set phone portrait column


if( !empty( $row_display_divider_between ) ) $loop_classes[] = 'uk-grid-divider';
# END OF SETTING COLUMN ON ALL DEVICES

# SETTING SLIDER

$slider_attr = array(
	'data-uk-slider' => array(),
	'class' => 'uk-visible-toggle'
);

$loop_classes[] = 'uk-slider-items';
# Autoplay enabled
if ( !empty( $auto_play_interval ) )
	$slider_attr['data-uk-slider'][] = "autoplay: true;autoplay-interval: {$auto_play_interval};";

# Infinite enabled
if ( empty( $enable_infinite ) )
	$slider_attr['data-uk-slider'][] = 'finite: true;';

# Slider sets enabled
if ( !empty( $enable_slide ) )
	$slider_attr['data-uk-slider'][] = 'sets: true;';

# Center enabled
if ( !empty( $enable_center_active ) )
	$slider_attr['data-uk-slider'][] = 'center: true;';

# END OF SETTING SLIDER


# SETTING ANIMATION TABS
	# Animation delay multiplier
	$delay_multiplier = 1;

	# Animation attribute
	$scrollspy_attr = array();
# END OF SETTING ANIMATION TABS

$loop_attr['class'] = $loop_classes;

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_product_categories_shortcode' ); ?>>
	<div <?php dahz_shortcode_set_attributes( $slider_attr, 'dahz_product_categories_slider' ); ?>>
		<div class="uk-position-relative">
			<!-- RENDER SLIDER ITEM -->
			<div class="uk-slider-container">
			<?php
				echo sprintf(
					'
					<ul %2$s>
						%1$s
					</ul>
					',
					$prepareContent,
					dahz_shortcode_set_attributes( $loop_attr, 'dahz_product_categories_loop', array(), false )
				);
			?>
			</div>
			<!-- RENDER ARROW -->
			<?php if ( !empty( $show_slide_nav ) ) : ?>
				<a <?php dahz_shortcode_set_attributes(
					array(
						'data-uk-slidenav-previous' => '',
						'data-uk-slider-item'       => 'previous',
						'href'                      => '#',
						'class'                     => sprintf(
							'uk-position-small uk-position-center-left%1$s%2$s%3$s%4$s',
							$slide_nav_position === 'outside' ? '-out' : '',
							!empty( $show_slide_nav_when_hover ) ? ' uk-hidden-hover' : '',
							!empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : '',
							!empty( $nav_color_scheme ) ? " {$nav_color_scheme}" : ''
						)
					)
				); ?>></a>
				<a <?php dahz_shortcode_set_attributes(
					array(
						'data-uk-slidenav-next' => '',
						'data-uk-slider-item'   => 'next',
						'href'                  => '#',
						'class'                 => sprintf(
							'uk-position-small uk-position-center-right%1$s%2$s%3$s%4$s',
							$slide_nav_position === 'outside' ? '-out' : '',
							!empty( $show_slide_nav_when_hover ) ? ' uk-hidden-hover' : '',
							!empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : '',
							!empty( $nav_color_scheme ) ? " {$nav_color_scheme}" : ''
						)
					)
				); ?>></a>
			<?php endif; ?>
		</div>
		<!-- # RENDER DOTS -->
		<?php if ( !empty( $show_dot_nav ) ) : ?>
			<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin<?php echo !empty( $dot_nav_breakpoint ) ? esc_attr( " uk-visible{$dot_nav_breakpoint}" ) : ''; ?><?php echo !empty( $nav_color_scheme ) ? esc_attr( " {$nav_color_scheme}" ) : ''; ?>"></ul>
		<?php endif; ?>
	</div>
</div>
