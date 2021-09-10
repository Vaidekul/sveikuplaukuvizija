!function($){
    var portfolioTabs = function( $target ){
		this.$target = $target;
		this.portfolioTabs();
	}
    portfolioTabs.prototype.portfolioTabs = function(){
        var _this = this;
        var element = $( '.ds-sc-portfolio-tabs__container', _this.$target );
        // var a = $( this ).parents('.de-shortcode__wrapper').data('dahz-shortcode-key');
        var $grid = $( element ).isotope({
            itemSelector: '.de-sc-portfolio-tabs__item',
            layoutMode: 'fitRows'
        });
        // filter items on button click
        $('.ds-sc-portfolio-tabs__filter-action', _this.$target ).on( 'click', function() {
          var filterValue = $( this ).attr('data-filter');
          $grid.isotope({ filter: filterValue });
          // alert();
          console.log(filterValue);
        });



    }

    $.fn.portfolioTabs = function(){
		new portfolioTabs( this );
		$( this ).addClass( 'initialized' );
		return this;
	}

	$( document ).ready( function(){
		$( '.de-sc-portfolio-tabs:not(.initialized)' ).each( function( index, el ) {
			$( el ).portfolioTabs();
		});

	})

}(window.jQuery);
