<?php

/**
 * google_maps
 *
 * Template for google maps shortcodes
 *
 * @since 1.0.0
 * @author Dahz - KW
 *
 */

$maps_api_key = dahz_framework_get_option( 'google_maps_google_maps', '' );
$maps_height  = is_numeric( $maps_height ) ? sprintf( '%spx', esc_attr( $maps_height ) ) : $maps_height;

$id = 'map_'.uniqid();

if ( $scrollwheel == 'disable' ) {
	$scrollwheel = 'false';
} else {
	$scrollwheel = 'true';
}

if ( $maps_marker == 'custom' && !empty( $icon_img ) ) {
	$labels = wp_get_attachment_url( $icon_img );
} else {
	$labels = 'null';
}

if ( $maps_marker == 'default' ) {
	$labels = 'null';
}

if ( empty( $maps_style ) ) {
	$maps_style = 'null';
} else {
	$maps_style = rawurldecode( base64_decode( strip_tags( $maps_style ) ) );
}

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $maps_extra_class ); ?>" style="<?php echo esc_attr( sprintf( 'width: 100%%; height: %s;', esc_attr( $maps_height ) ) ); ?>"></div>
<script>
	!function($) {
		$(document).ready(function(){
			var isDraggable									= $(document).width() > 641 ? true : <?php echo esc_attr( $dragging ); ?>;
			var stylesArray_<?php echo esc_attr( $id ); ?>	= <?php echo $maps_style; ?>;
			var mapsLatLng_<?php echo esc_attr( $id ); ?>	= new google.maps.LatLng(<?php echo esc_attr( $maps_lat .','. $maps_long ); ?>);
			var zoomMaps									= <?php echo esc_attr( $maps_zoom ); ?>;
			var mapOptions_<?php echo esc_attr( $id ); ?>	= {
				zoom				: zoomMaps,
				center				: mapsLatLng_<?php echo esc_attr( $id ); ?>,
				mapTypeId			: google.maps.MapTypeId.<?php echo esc_attr( $maps_type ); ?>,
				styles				: stylesArray_<?php echo esc_attr( $id ); ?>,
				zoomControl			: false,
				streetViewControl	: <?php echo esc_attr( $streetviewcontrol ); ?>,
				mapTypeControl		: <?php echo esc_attr( $maptypecontrol ); ?>,
				panControl			: <?php echo esc_attr( $pancontrol ); ?>,
				zoomControl			: <?php echo esc_attr( $zoomcontrol ); ?>,
				scrollwheel			: <?php echo esc_attr( $scrollwheel ); ?>,
				draggable			: isDraggable,
				<?php if ( $zoomcontrol == false ) : ?>
				zoomControlOptions	: {
					style: google.maps.ZoomControlStyle.<?php echo esc_attr( $zoomcontrolsize ); ?>
				}
				<?php endif; ?>
			}
			var map_<?php echo esc_attr( $id ); ?> = new google.maps.Map(document.getElementById('<?php echo esc_attr( $id ); ?>'), mapOptions_<?php echo esc_attr( $id ); ?>);
			var label = '<?php echo esc_attr( $labels ); ?>';

			if ( label == 'null' ) {
				var labels = null;
			} else {
				var labels = '<?php echo esc_attr( $labels ); ?>';
			}

			var marker_<?php echo esc_attr( $id ); ?> = new google.maps.Marker({
				position: mapsLatLng_<?php echo esc_attr( $id ); ?>,
				icon	: labels
			});

			var <?php echo esc_attr( $id ); ?>_content = '<?php echo esc_attr( $info_window ); ?>';

			marker_<?php echo esc_attr( $id ); ?>.setMap( map_<?php echo esc_attr( $id ); ?> );

			var infowindow_<?php echo esc_attr( $id ); ?> = new google.maps.InfoWindow({
				content: <?php echo esc_attr( $id ); ?>_content
			});

			marker_<?php echo esc_attr( $id ); ?>.addListener( 'click', function() {
				infowindow_<?php echo esc_attr( $id ); ?>.open( map_<?php echo esc_attr( $id ); ?>, marker_<?php echo esc_attr( $id ); ?> );
			});

		});
	}(window.jQuery);
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( $maps_api_key ); ?>"></script>