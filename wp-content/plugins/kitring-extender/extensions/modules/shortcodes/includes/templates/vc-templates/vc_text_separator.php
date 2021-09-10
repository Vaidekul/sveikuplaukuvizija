<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => title
[1] => title_align
[2] => layout
[3] => tag
[4] => accent_color
[5] => enable_custom_font_size
[6] => custom_font_size
[7] => text_color
[8] => align
[9] => style
[10] => border_width
[11] => el_width
[12] => css_animation
[13] => animation_parallax
[14] => delay_animation
[15] => repeat_animation
[16] => el_class
[17] => margin
[18] => remove_top_margin
[19] => remove_bottom_margin
[20] => visibility
[21] => enable_dahz_lazy_shortcode
*/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

$enable_title = ( empty( $title ) || $layout == 'separator_no_text' ) ? false : true;

$left_separator_visibility = '';


# setup container attribute
$container_attributes = array();

$inner_align 		  = '';

$text_attributes = array( 'class' => array( 'uk-width-auto', 'uk-padding-small' ) );

$center_handle = '';

# setup container attribute class
$container_classes = array( $visibility, $this->getExtraClass( $el_class ), $margin, 'de-sc-separator' );

# remove margin top
if ( !empty( $remove_top_margin ) ) $container_classes[] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $container_classes[] = 'uk-margin-remove-bottom';

# setup container attribute style

switch( $align ){
	case 'align_center':
		$container_classes[] = 'uk-flex uk-flex-center';
		$inner_align = 'uk-flex-center';
		break;
	case 'align_right':
		$container_classes[] = 'uk-flex uk-flex-right';
		$inner_align = 'uk-flex-right';
		break;
}



# get container attribute class
$container_attributes['class'] = $container_classes;

if( $enable_title ){

	switch( $title_align ){
		case 'separator_align_left':
			$text_attributes['class'][] = 'uk-flex-first';
			$text_attributes['class'][] = 'uk-padding-remove-left';
			$container_attributes['class'][] = 'de-sc-text-separator--left';
			$left_separator_visibility = 'uk-hidden';
			$center_handle = 'uk-width-expand';
			break;
		case 'separator_align_right':
			$text_attributes['class'][] = 'uk-flex-last';
			$text_attributes['class'][] = 'uk-padding-remove-right';
			$container_attributes['class'][] = 'de-sc-text-separator--right';
			$left_separator_visibility = 'uk-hidden';
			$center_handle = 'uk-width-expand';
			break;
		case 'separator_align_center':
		$center_handle = 'uk-width-expand uk-width-auto@m';

			break;
	}

}

$separator = sprintf(
	'
	<div class="uk-width-1-1" style="border-bottom-style:%1$s;border-bottom-width:%2$spx;border-bottom-color:%3$s;"></div>
	',
	empty( $style ) ? 'solid' : $style,
	empty( $border_width ) ? 1 : $border_width,
	!empty( $accent_color ) ? $accent_color : '#000000'
);

?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		$this->settings['base'] . '_container',
		$atts
	); ?>>
	<div class="uk-grid-collapse uk-grid de-sc-text-separator <?php echo esc_attr( $inner_align ); ?>" data-uk-grid>
		<div class="uk-inline <?php echo $center_handle ?> <?php echo esc_attr( $left_separator_visibility );?>" style="max-width: <?php echo esc_attr( empty( $el_width ) ? '100' : $el_width );?>%">
			<?php echo $separator;?>
		</div>
		<?php
		if( $enable_title ){
			echo sprintf(
				'
				<div %3$s>
					<%1$s style="%4$s">
						%2$s
					</%1$s>
				</div>
				',
				$tag,
				$title,
				dahz_shortcode_set_attributes(
					$text_attributes,
					$this->settings['base'] . '_text',
					array(),
					false
				),
				sprintf(
					'color:%1$s;%2$s',
					!empty( $text_color ) ? $text_color : '#000000',
					!empty( $enable_custom_font_size ) && !empty( $custom_font_size ) ? 'font-size:'. $custom_font_size .';' : ''
				)
			);
		}
		?>
		<div class="uk-inline <?php echo $center_handle ?>" style="max-width: <?php echo esc_attr( empty( $el_width ) ? '100' : $el_width );?>%">
			<?php echo $separator;?>
		</div>
	</div>
</div>
