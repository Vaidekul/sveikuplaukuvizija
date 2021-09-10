// !function($) {
	// var DahzShortcodeLazy = function(){

	// };
	// DahzShortcodeLazy.prototype.init = function(){

		// var _that = this;

		// if(!$.lazyLoadXT.forceLoad) {

			// $('[data-dahz-is-lazyload-shortcode="true"]')
				// .on('lazyshow', function () {

					// var _this = this,
						// atts = $( _this ).data( 'dahz-shortcode-atts' ),
						// base = $( _this ).data( 'dahz-shortcode-base' );
					// $.ajax({
						// url: dahzFramework.ajaxURL,
						// type: 'POST',
						// data: {
							// action: 'dahz_framework_get_lazy_shortcodes',
							// atts: atts,
							// base: base
						// },
						// success: function success(data) {
							// _that.succesCallback( data, $( _this ), base )
						// }
					// });
				// })
				// .lazyLoadXT({visibleOnly: false});

		// }

	// }
	// DahzShortcodeLazy.prototype.succesCallback = function( html, $container, base ){

		// $container.html( html ).promise().done( function(){
			// $( document ).trigger( 'shortcode_'+ base + '_ready',[ $container ] );
		// });

	// }
	// $(document).ready(function(){

		// var dahzShortcodeLazy = new DahzShortcodeLazy();

		// dahzShortcodeLazy.init();

	// });


// }(window.jQuery);

!function($) {

	window.dahzSC = window.dahzSC || {};
	
	dahzSC.lazy = {
		init: function(){
			UIkit.scrollspy( $( '[data-dahz-is-lazyload-shortcode="true"]' ) );
			$( '[data-dahz-is-lazyload-shortcode="true"]' ).on( 'inview', dahzSC.lazy.load );
		},
		load : function(){
			var _this = this,
				atts = $( _this ).data( 'dahz-shortcode-atts' ),
				base = $( _this ).data( 'dahz-shortcode-base' );
			$.ajax({
				url: dahzFramework.ajaxURL,
				type: 'POST',
				data: {
					action: 'dahz_framework_get_lazy_shortcodes',
					atts: atts,
					base: base
				},
				success: function success(data) {
					dahzSC.lazy.succesCallback( data, $( _this ), base )
				}
			});
		},
		succesCallback : function( html, $container, base ){
			$container.html( html ).promise().done( function(){
				$( document ).trigger( 'shortcode_'+ base + '_ready',[ $container ] );
			});
		},
	};
	$(document).ready(function(){
		dahzSC.lazy.init();
	});

}(jQuery);
