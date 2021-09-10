<?php
/*

*/

$output = '';

$output .= sprintf('
	<div class="de-sc-countdown-%8$s uk-child-width-auto %9$s %10$s uk-grid" data-uk-grid data-uk-countdown="date:%1$s">
		<div>
			<div class="uk-countdown-number uk-countdown-days"></div>
			<div class="uk-countdown-label %11$s uk-text-center" %7$s>%3$s</div>
		</div>
		<div class="uk-countdown-separator">%2$s</div>
		<div>
			<div class="uk-countdown-number uk-countdown-hours"></div>
			<div class="uk-countdown-label %11$s uk-text-center" %7$s>%4$s</div>
		</div>
		<div class="uk-countdown-separator">%2$s</div>
		<div>
			<div class="uk-countdown-number uk-countdown-minutes"></div>
			<div class="uk-countdown-label %11$s uk-text-center" %7$s>%5$s</div>
		</div>
		<div class="uk-countdown-separator">%2$s</div>
		<div>
			<div class="uk-countdown-number uk-countdown-seconds"></div>
			<div class="uk-countdown-label %11$s uk-text-center" %7$s>%6$s</div>
		</div>
	</div>',
	!empty( $date_time ) ? esc_attr( $date_time ) : '', // 1
	!empty( $delimiter_value ) ? esc_attr( $delimiter_value ) : '', // 2
	!empty( $days_label ) ? esc_attr( $days_label ) : '', // 3
	!empty( $hours_label ) ? esc_attr( $hours_label ) : '', // 4
	!empty( $minutes_label ) ? esc_attr( $minutes_label ) : '', // 5
	!empty( $seconds_label ) ? esc_attr( $seconds_label ) : '', // 6
	empty( $show_label ) ? 'hidden' : '', // 7
	!empty( $countdown_style ) ? esc_attr( $countdown_style ) : '', // 8
	$countdown_alignment =  $countdown_alignment !== 'left' ? 'uk-flex-' . esc_attr( $countdown_alignment ) : '', // 9
	!empty( $countdown_gutter ) && $countdown_style === 'style-1' ? esc_attr( $countdown_gutter ) : '', // 10
	!empty( $label_margin ) && $countdown_style === 'style-1' ? esc_attr( $label_margin ) : '' // 11
);

printf('%s', $output);
