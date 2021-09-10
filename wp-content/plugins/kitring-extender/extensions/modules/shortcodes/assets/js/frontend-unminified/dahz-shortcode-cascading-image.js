window.$			= jQuery;
$.fn.cascadingImage = function(){
	var element = this;
	$( this ).addClass( 'initialized' );

	var heights = $( this ).children().map(function ( index, el ) {

		return $( el ).outerHeight();
	}).get();
	maxHeight = Math.max.apply( null, heights );
	$( this ).height( maxHeight );



}

!function($) {
	$( document ).ready( function(){
		$( '.de-sc-cascading-image:not(.initialized)' ).each( function( index, el ) {
			if( $( el ).is(':visible') && $( el ).parent().not('[data-dahz-is-lazyload-shortcode="true"]')  ) {

				$( el ).cascadingImage();

			} else {
				setTimeout( function(){
					$( '.de-sc-cascading-image:not(.initialized)' ).each( function( index, el ) {

						$( el ).cascadingImage();

					});

				}, 8000);
			}
		});

	})

	$(document).on( 'shortcode_cascading_image_ready', function() {
		$( '.de-sc-cascading-image:not(.initialized)' ).each( function( index, el ) {
			$( el ).cascadingImage();
		});
	});

}(window.jQuery);
