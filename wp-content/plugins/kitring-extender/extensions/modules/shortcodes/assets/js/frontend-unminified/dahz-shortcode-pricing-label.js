window.$			= jQuery;
$.fn.pricingLabel = function(){
	var element = this;
	$( this ).addClass( 'initialized' );

	if( $(this).closest('.de-column').next().find('.de-sc-pricing-table').length !== 0 ) {

		var liArray = $(this).closest('.de-column').next().find('.de-sc-pricing-table').find('li');

		var getHeight = $( liArray[0] ).outerHeight() + $( liArray[1] ).outerHeight() + 40 - $(this).find('li').first().outerHeight() + 10;

		$(this).css('margin-top', getHeight);
	}

}

!function($) {
	$( document ).ready( function(){
		$( '.de-sc-pricing-label:not(.initialized)' ).each( function( index, el ) {
			$(el).pricingLabel();
		});

	})

	$(document).on( 'shortcode_pricing-label_ready', function() {
        $( '.de-sc-pricing-label:not(.initialized)' ).each( function( index, el ) {
			$(el).pricingLabel();
		});
	});

}(window.jQuery);
