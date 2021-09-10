!function($) {

	window.dahzSC = window.dahzSC || {};
	dahzSC.pie = {
		init: function(){
			
			$( '.de-sc-pie' ).each( dahzSC.pie.pie );
		},
		pie : function( i, $el ){
			UIkit.scrollspy( $( $el ), { cls:'',delay:10, hidden:false } );
			$( $el ).on( 'inview', dahzSC.pie.pieInview );
		},
		pieInview : function(){
			var barColor = $( '.de-pie-item', this ).data( 'barcolor' ),
				lineWidth = $( '.de-pie-item', this ).data( 'linewidth' ),
				isEmptyLabel = $( '.de-pie-item', this ).data( 'is-empty-label' ),
				trackColor = $( '.de-pie-item', this ).data( 'trackcolor' );
			$( '.de-pie-item', this ).pieChart({
				barColor: barColor,
				trackColor:trackColor,
				size:900,
                lineWidth: lineWidth,
                rotate: 0,
				onStep: function (from, to, percent) {
					if( !isEmptyLabel || percent >= to) return;				
                    $( this.element ).find( '.pie-value' ).text( Math.round( percent ) + '%' );
					return;
                }
			});
		},
	};
	dahzSC.pie.init();

}(jQuery);
