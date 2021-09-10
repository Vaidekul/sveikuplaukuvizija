<?php

/**
 * google_maps
 *
 * Template for google maps shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 * Parameters
[0] => api
[1] => height
[2] => type
[3] => lat
[4] => long
[5] => zoom
[6] => scrollwheel
[7] => streetviewcontrol
[8] => maptypecontrol
[9] => pancontrol
[10] => zoomcontrol
[11] => zoomcontrolsize
[12] => disabledragmobile
[13] => infowindow
[14] => style
[15] => marker
[16] => markericon
[17] => css_animation
[18] => animation_parallax
[19] => delay_animation
[20] => repeat_animation
[21] => el_class
[22] => margin
[23] => remove_top_margin
[24] => remove_bottom_margin
[25] => visibility
[26] => enable_dahz_lazy_shortcode
[27] => dahz_id
 */
//dahz_framework_debug( array_keys( $atts ) );


/* --- */

$atts['labels'] = $marker === 'custom' && !empty( $markericon ) ? wp_get_attachment_image_url( $markericon, 'medium', array(), true ) : '';

$atts['styles'] = !empty( $style ) ? rawurldecode( base64_decode( strip_tags( $style ) ) ) : NULL;

$height = dahz_shortcode_safe_css_units( $height );

?>
<div id="<?php esc_attr_e( $dahz_id ) ?>" class="<?php esc_attr_e( $el_class ) ?>" style="<?php echo esc_attr( sprintf( 'width: %1$s; height: %2$s;', '100%', !empty( $height ) ? $height : '400' ) );?>"></div>
<script>
	!function($) {
		var url = '<?php echo esc_url_raw( sprintf( 'https://maps.googleapis.com/maps/api/js?key=%s', $api ) ); ?>';
		$.getScript( url, function( data, textStatus, jqxhr ) {
			var options = <?php echo json_encode( $atts );?>,
				$container = document.getElementById( options.dahz_id );
			options.lat = !isNaN( parseFloat( options.lat ) ) ? parseFloat( options.lat ) : 0;
			options.long = !isNaN( parseFloat( options.lat ) ) ? parseFloat( options.long ) : 0;
			options.styles = $.parseJSON( options.styles );
			var map = new google.maps.Map(
				$container, {
					zoom              : parseInt( options.zoom ),
					center            : new google.maps.LatLng( options.lat, options.long ),
					mapTypeId         : google.maps.MapTypeId[options.type],
					styles            : options.styles,
					streetViewControl : options.streetviewcontrol,
					mapTypeControl    : options.maptypecontrol == 'true' ? true : false,
					panControl        : options.pancontrol == 'true' ? true : false,
					zoomControl       : options.zoomcontrol == 'true' ? true : false,
					scrollwheel       : options.scrollwheel == 'true' ? false : true,
					draggable         : options.disabledragmobile == 'true' && $(document).width() <= 641 ? false : true,
					zoomControlOptions	: {
						style: google.maps.ZoomControlStyle[options.zoomcontrolsize]
					},
				}
			),
			marker = new google.maps.Marker({
				position: {
					lat: options.lat,
					lng: options.long
				},
				icon	: options.labels
			});
			marker.setMap( map );
			var infowindow = new google.maps.InfoWindow({
				content: options.infowindow
			});

			marker.addListener( 'click', function() {
				infowindow.open( map, marker );
			});
			
		});
	}(window.jQuery);
</script>