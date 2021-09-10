<?php
/*
[0] => tab_navigation
[1] => thumbnav_width
[2] => thumbnav_height
[3] => position
[4] => alignment
[5] => margin
[6] => width
[7] => breakpoint
[8] => enable_center_vertical
[9] => content_css_animation
[10] => active_section
[11] => tag
[12] => custom_font_size
[13] => font_size
[14] => active_color
[15] => inactive_color
[16] => active_border_color
[17] => inactive_border_color
[18] => active_bg_color
[19] => inactive_hover_color
[20] => inactive_hover_bg_color
[21] => css_animation
[22] => animation_parallax
[23] => delay_animation
[24] => repeat_animation
[25] => el_class
[26] => remove_top_margin
[27] => remove_bottom_margin
[28] => visibility
[29] => enable_dahz_lazy_shortcode
*/
extract( $atts );

$tab_heading_attributes = array( 'data-uk-tab' => 'active:' . $active_section . ';connect:[data-dahz-shortcode-key="' . $dahz_id . '"] .uk-switcher' );

$tab_content_wrapper_attributes = array( 'class' => array( 'uk-width-1', 'uk-width-expand' ) );

$tab_tab_wrapper_attributes = array( 'class' => array() );

$tab_content_attributes = array( 'class' => array( 'uk-switcher' ) );

$tab_wrapper_attributes = array( 
	'class' 					=> array( 
		'uk-grid', 
		$margin,
		$el_class,
		$visibility,
		'de-sc-tabs' 
	), 
	'data-uk-grid' 				=> '', 
	'data-dahz-shortcode-key' 	=> $dahz_id  
);

# remove margin top
if ( !empty( $remove_top_margin ) ) $tab_wrapper_attributes['class'][] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $tab_wrapper_attributes['class'][] = 'uk-margin-remove-bottom';

$tab_heading_attributes['class'] = array( 'uk-tab uk-margin', $position );

if( $position == 'uk-tab-left' || $position == 'uk-tab-right' ){

	$tab_content_wrapper_attributes['class'][] = $position == 'uk-tab-right' ? 'uk-flex-first' : '';
	$tab_tab_wrapper_attributes['class'][] = $width . $breakpoint;
	$tab_heading_attributes['class'][] = $position == 'uk-tab-right' ? 'uk-tab-right' : '';
	// $tab_content_attributes['class'][] = 'uk-width-expand' . $breakpoint;
	$tab_wrapper_attributes['class'][] = !empty( $enable_center_vertical ) ? 'uk-flex-middle' : '';
	$tab_wrapper_attributes['class'][] = $tab_grid_gutter;

} else {
	$tab_content_wrapper_attributes['class'][] = $tab_margin;
	$tab_tab_wrapper_attributes = array( 'class' => array( 'uk-width-1' ) );

	if( $position === 'uk-tab-bottom' ) {
		$tab_tab_wrapper_attributes['class'][] = 'uk-flex-last uk-margin-remove';
	}
	$tab_heading_attributes['class'][] = $alignment;

}

$tab_heading_styles = array();

$tab_list_info = WPBakeryShortCode_VC_Tta_Section::$section_info;

$tab_list_output = '';

foreach( $tab_list_info as $index => $tab ){

	$title = esc_html( $tab['title'] );

	if( !empty( $tab['add_icon'] ) ){

		$icon = $_this->constructIcon( $tab );

		if( $tab['i_position'] == 'left' ){

			$title = $icon . $title;

		} else {

			$title = $title . $icon ;

		}

	}

	if( $tab_navigation == 'thumbnav' ){

		$tab_tab_wrapper_attributes['data-uk-margin'] = '';

		$thumbnav_image = wp_get_attachment_image_url( $tab['image_thumbnav'], 'medium', false, array( 'alt' => get_post_field( 'post_title', $tab['image_thumbnav'] )  ) );

		$thumbnav_width = !empty( $thumbnav_width ) && is_numeric( $thumbnav_width ) ? $thumbnav_width : '100';

		$thumbnav_height = !empty( $thumbnav_height ) && is_numeric( $thumbnav_height ) ? $thumbnav_height : '100';

		$title = $thumbnav_image ? '<img src="'. $thumbnav_image .'" alt="'. get_post_field( 'post_title', $tab['image_thumbnav'] ) .'" width="'. $thumbnav_width .'" height="'. $thumbnav_height .'">' : esc_html( $tab['title'] );

	}

	$tab_list_output .= sprintf(
		'
		<li%3$s>
			<a href="#"%5$s style="">
				%2$s%1$s%4$s
			</a>
		</li>
		',
		$title,
		empty( $thumbnav_image ) ? '<' . esc_attr( $atts['tag'] ) . '>' : '', // 1
		$index === $active_section ? ' class="uk-active"' : '', // 2
		empty( $thumbnav_image ) ? '</' . esc_attr( $atts['tag'] ) . '>' : '', // 3
		$position == 'uk-tab-right' ? ' class="uk-text-right"' : '' // 4

	);

}
switch( $tab_navigation ){

	case 'subnav':
		$tab_heading_attributes['class'][] = 'uk-subnav';
		break;
	case 'subnavpill':
		$tab_heading_attributes['class'][] = 'uk-subnav uk-subnav-pill';
		break;
	case 'thumbnav':
		$tab_heading_attributes['class'][] = 'uk-thumbnav';
		break;
	default:
		break;

}

echo sprintf(
	'
	<div %5$s>
		<div %7$s>
			<ul %1$s>
				%2$s
			</ul>
		</div>
		<div %6$s>
			<ul %3$s>
				%4$s
			</ul>
		</div>
	</div>
	',
	dahz_shortcode_set_attributes(
		$tab_heading_attributes,
		'vc_tab_heading',
		array(),
		false
	),								//#1
	$tab_list_output,				//#2
	dahz_shortcode_set_attributes(
		$tab_content_attributes,
		'vc_tab_content',
		array(),
		false
	),								//#3
	$prepareContent,				//#4
	dahz_shortcode_set_attributes(
		$tab_wrapper_attributes,
		'vc_tab_wrapper',
		array(),
		false
	),								//#5
	dahz_shortcode_set_attributes(
		$tab_content_wrapper_attributes,
		'vc_tab_wrapper',
		array(),
		false
	),								//#6
	dahz_shortcode_set_attributes(
		$tab_tab_wrapper_attributes,
		'vc_tab_wrapper',
		array(),
		false
	)								//#7
);
?>
