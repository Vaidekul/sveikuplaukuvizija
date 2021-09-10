window.$			= jQuery;
$.fn.milestone = function(){
	var element = this;
	$( this ).addClass( 'initialized' );
    var element           = $( this ).find('.de-sc-milestone__count');
    var getID           = $( element ).attr('id');
    var getCounter      = $( element ).data('start-counter');
    var symbolContent   = $( element ).data('symbol');
    var symbolPosition  = $( element ).data('symbol-position');
    var options;

    if( symbolContent.length !== 0 ) {
        switch (symbolPosition) {
            case 'prefix':
                options = {
                    prefix: symbolContent
                };
                break;
            case 'suffix':
                options = {
                    suffix: symbolContent
                };
                break;

        }
    }
	UIkit.scrollspy( element, {});
	
	$(element).on( 'inview', function(){

		var numAnim = new CountUp( getID , 0, getCounter, 0, 0, options);
		if (!numAnim.error) {
			numAnim.start();
		} else {
			console.error(numAnim.error);
		}

	} );


}

!function($) {
	$( document ).ready( function(){
		$( '.de-sc-milestone:not(.initialized)' ).each( function( index, el ) {
			$(el).milestone();
		});

	})

	$(document).on( 'shortcode_milestone_ready', function() {
        $( '.de-sc-milestone:not(.initialized)' ).each( function( index, el ) {
			$(el).milestone();
		});
	});

}(window.jQuery);
