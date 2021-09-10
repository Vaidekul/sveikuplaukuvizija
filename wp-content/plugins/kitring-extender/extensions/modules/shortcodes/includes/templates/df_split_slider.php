<?php
/*
[0] => extra_class
[1] => nav_style
[2] => nav_visibility
[3] => css_animation
[4] => animation_parallax
[5] => delay_animation
[6] => repeat_animation
[7] => el_class
[8] => margin
[9] => remove_top_margin
[10] => remove_bottom_margin
[11] => visibility
[12] => enable_dahz_lazy_shortcode
[13] => dahz_id
$content
*/
$split_slider = array(
	'left' => array(
		'slider'			=> '',
		'slider_item'		=> '',
		'slider_item_count'	=> 0,
		'tag'				=> 'df_left_split_slider',
		'params'			=> ''
	),
	'right' => array(
		'slider'			=> '',
		'slider_item'		=> '',
		'slider_item_count'	=> 0,
		'tag'				=> 'df_right_split_slider',
		'params'			=> ''
	)
);

$pattern_item = get_shortcode_regex( array('df_item_split_slider') );

$regex_item = "/$pattern_item/";

//set left content
foreach ( $split_slider as $type => $options ) {

	$pattern = get_shortcode_regex( array( $options['tag'] ) );

	$regex = "/$pattern/";

	preg_match_all( $regex, $content, $matches, PREG_SET_ORDER );

	if ( count( $matches ) ) {

		foreach( $matches as $key => $value ) {

			if ( isset( $value[1] ) && !empty( $value[5] ) ) {

				$split_slider[$type]['slider_item'] = isset( $value[5] ) ? $value[5] : '';

				$split_slider['params'] = isset( $value[3] ) ? ' ' . $value[3] : '';

				preg_match_all( $regex_item, $split_slider[$type]['slider_item'], $matches_item, PREG_SET_ORDER );

				$split_slider[$type]['slider_item_count'] = count( $matches_item );

				$split_slider[$type]['slider'] .= '[' . $options['tag'] . $split_slider['params'] . ']';

				break;

			}

		}

	}

}

//end of set left content

if ( empty( $split_slider['left']['slider'] ) && empty( $split_slider['right']['slider'] ) ) return;

$split_slider['left']['slider'] = !empty( $split_slider['left']['slider'] ) ? $split_slider['left']['slider'] : '[df_left_split_slider dahz_id=""]';

$split_slider['right']['slider'] = !empty( $split_slider['right']['slider'] ) ? $split_slider['right']['slider'] : '[df_right_split_slider dahz_id=""]';

if ( $split_slider['left']['slider_item_count'] !== $split_slider['right']['slider_item_count'] ) {

	$gap = (int)$split_slider['right']['slider_item_count'] - (int)$split_slider['left']['slider_item_count'];

	$item_less = $gap < 0 ? 'right' : 'left';

	for ( $i = 0; $i < abs( $gap ); $i++ ) {

		$split_slider[$item_less]['slider_item'] .= '[df_item_split_slider dahz_id=""]';

	}

}

$anchor_menu = array();

$anchor_menu_list = '';

for ( $i = 1; $i <= $split_slider['left']['slider_item_count']; $i++ ) {

	$anchor_menu[] = "de-anchor-split-slider-{$i}";

	$anchor_menu_list .= sprintf(
		'<li data-menuanchor="%1$s"><a href="#%1$s">%2$s</a></li>',
		"de-anchor-split-slider-{$i}",
		$i
	);

}

echo sprintf(
	'
	<div class="de-split-slider-anchor__wrapper">
		<ul data-total="%3$s" id="de-split-slider-anchor" class="uk-dotnav uk-dotnav-vertical de-split-slider__anchor %4$s uk-list uk-position-medium uk-position-center-right uk-position-z-index uk-visible@m">
			%1$s
		</ul>
	</div>
	',
	$anchor_menu_list,
	'',
	$split_slider['left']['slider_item_count'],
	!empty( $nav_visibility ) ? "uk-visibility{$nav_visibility} " : ''
);

$content = sprintf(
	'
	%1$s[/df_left_split_slider]%2$s[/df_right_split_slider]
	',
	$split_slider['left']['slider'] . $split_slider['left']['slider_item'],
	$split_slider['right']['slider'] . $split_slider['right']['slider_item']
);
?>
<div id="de-split-slider" class="<?php echo esc_attr( $extra_class ); ?> ds-split-slider-container uk-grid-collapse uk-child-width-1-2@m" data-uk-grid data-uk-height-viewport>
	<?php echo wpb_js_remove_wpautop( $content ); ?>
</div>
<script>
(function($) {
	document.location.hash = '';
	window.dahzSC = window.dahzSC || {};
	dahzSC.splitSlider = {
		leftPosition:0,
		rightPosition:0,
		destroyed:false,
		init: function () {
			window.location.href.split('#')[0];
			$('#de-header-horizontal').css({
				'position': 'relative',
				'z-index': '9999'
			});
			$('.de-header__wrapper').css({
				'position': 'absolute',
				'top': '0',
				'left': '0',
				'width': '100%'
			});
			$('#de-split-slider').imagesLoaded({ background: true }, function() {
				$('#de-split-slider').multiscroll({
					//sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE'],
					anchors: <?php echo json_encode( $anchor_menu ); ?>,
					menu: '#de-split-slider-anchor',
					navigation: false,
					// navigationTooltips: ['One', 'Two', 'Three'],
					loopBottom: true,
					loopTop: true,
					// verticalCentered : false,
					scrollingSpeed: 700,
					easing: 'easeInQuart',
					navigationPosition: 'right',
					// navigationColor: '#000',
					// css3: false,
					// paddingTop: 100,
					// paddingBottom: 200,
					// normalScrollElements: null,
					// keyboardScrolling: true,
					// touchSensitivity: 5,
					// //responsive
					// responsiveWidth: 0,
					// responsiveHeight: 0,
					// responsiveExpand: true,
					// // Custom selectors
					// sectionSelector: '.ms-section',
					// leftSelector: '.ms-left',
					// rightSelector: '.ms-right',
					// //events
					afterLoad: function(anchorLink, index) {
						if ($('.ms-right .ms-section.active', $('#de-split-slider')).hasClass('light')) {
							$('.de-split-slider-anchor__wrapper').removeClass('uk-light').addClass('uk-dark');
						} else if ($('.ms-right .ms-section.active', $('#de-split-slider')).hasClass('dark')) {
							$('.de-split-slider-anchor__wrapper').removeClass('uk-dark').addClass('uk-light');
						}
						var anchor = $('.ms-right .ms-section.active', $('#de-split-slider') ).data( 'anchor' );
						$('#de-split-slider-anchor li').removeClass( 'uk-active' );
						$('#de-split-slider-anchor li[data-menuanchor="' + anchor + '"]').addClass( 'uk-active' );
					},
					afterRender: function() {
						$('.ms-right .ms-section', $('#de-split-slider')).attr('data-panel', 'right');
						$('.ms-left .ms-section', $('#de-split-slider')).attr('data-panel', 'left');
						$('.ms-left .ms-section', $('#de-split-slider')).each(function() {
							$(this).attr('data-position', dahzSC.splitSlider.leftPosition);
							dahzSC.splitSlider.leftPosition += 2;
						});
						dahzSC.splitSlider.rightPosition = dahzSC.splitSlider.leftPosition - 1;
						$('.ms-right .ms-section', $('#de-split-slider')).each(function() {
							$(this).attr('data-position', dahzSC.splitSlider.rightPosition);
							dahzSC.splitSlider.rightPosition -= 2;
						});
						if ($('.ms-right .ms-section.active', $('#de-split-slider')).hasClass('light')) {
							$('.de-split-slider-anchor__wrapper').removeClass('uk-light').addClass('uk-dark');
						} else if ($('.ms-right .ms-section.active', $('#de-split-slider')).hasClass('dark')) {
							$('.de-split-slider-anchor__wrapper').removeClass('uk-dark').addClass('uk-light');
						}
						var anchor = $('.ms-right .ms-section.active', $('#de-split-slider') ).data( 'anchor' );
						$('#de-split-slider-anchor li').removeClass( 'active uk-active' );
						$('#de-split-slider-anchor li[data-menuanchor="' + anchor + '"]').addClass( 'active uk-active' );
					},
				});
				dahzSC.splitSlider.onResize();
			});
		},
		onResize:function() {
			// $( window ).scrollTop(0);
			if ( $(window).width() < 960 ) {
				dahzSC.splitSlider.destroy();
				dahzSC.splitSlider.destroyed = true;
			} else {
				if ( dahzSC.splitSlider.destroyed ) {
					dahzSC.splitSlider.build();
					dahzSC.splitSlider.destroyed = false;
				}
			}
		},
		destroy:function() {
			var MS = $.fn.multiscroll;
			document.location.hash = '';
			$('html, body').css({
				'overflow': 'auto',
				'height': 'auto'
			});
			MS.setKeyboardScrolling(false);
			MS.setMouseWheelScrolling(false);
			if( ! dahzSC.splitSlider.destroyed ){
				$('.ms-right .ms-section', $('#de-split-slider')).each(function() {
					var position = $(this).data('position');
					$content = $(this).clone();
					$content.insertAfter( $('.ms-left .ms-section[data-position="' + ( parseInt( position ) - 1 ) + '"]', $('#de-split-slider')) );
				});
			}
			$('#de-split-slider').css({
				'height': 'auto'
			});
			$('.ms-left', $('#de-split-slider')).css({
				'position': 'relative',
				'width': '100%',
				'touch-action': 'auto'
			});
			$('.ms-right', $('#de-split-slider')).hide();
			$('.ms-section, .ms-tableCell', $('#de-split-slider')).css({
				'height': 'auto'
			});
		},
		build:function() {
			$('html, body').css({
				'overflow': 'hidden',
				'height': '100%'
			});
			$($('.ms-left .ms-section[data-panel="right"]', $('#de-split-slider') ).get().reverse()).each(function() {
				$(this).remove();
			});
			$('#de-split-slider').css({
				'height': '100vh'
			});
			$('.ms-left', $('#de-split-slider')).css({
				'position': 'absolute',
				'width': '50%',
				'touch-action': 'none'
			});
			$('.ms-right', $('#de-split-slider')).show();
			$.fn.multiscroll.build();
		}
	};
	$( window ).on( 'resize', dahzSC.splitSlider.onResize );
	$( document ).on( 'ready', dahzSC.splitSlider.init );

}(jQuery));
</script>