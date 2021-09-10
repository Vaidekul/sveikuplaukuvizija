!function($) {

	window.dahzSC = window.dahzSC || {};
	dahzSC.progressBar = {
		init: function(){
			$( '.de-sc-progressbar' ).each( dahzSC.progressBar.progressbar );
		},
		progressbar : function( i, $el ){
			UIkit.scrollspy( $( $el ), { cls:'',delay:10, hidden:false } );
			$( $el ).on( 'inview', dahzSC.progressBar.progressbarInview );
		},
		progressbarInview : function(){
			$( '.de-progressbar-items', this ).each( dahzSC.progressBar.progressbarItems );
		},
		progressbarItems : function( i, $el ){
			var dataBars = $( $el ).data( 'progressbar' ), 
				units = $( $el ).data( 'units' ),
				radius = $( $el ).data( 'radius' );
			$($el).LineProgressbar({
				percentage: !isNaN( parseFloat( dataBars.value ) ) ? parseFloat( dataBars.value ) : 0,
				fillBackgroundColor: dataBars.bar_color,
				backgroundColor: dataBars.background_color,
				radius: !isNaN( parseFloat( radius ) ) ? parseFloat( radius ) + 'px' : '0px',
				height: '6px',
				width: '100%',
				units:units
			}); 
		}
	};
	dahzSC.progressBar.init();

}(jQuery);
