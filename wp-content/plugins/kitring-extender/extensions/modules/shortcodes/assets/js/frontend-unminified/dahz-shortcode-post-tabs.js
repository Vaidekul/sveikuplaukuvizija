!function($){
    var postTabs = function( $target ){
		this.$target = $target;
		this.postTabs();
	}
    postTabs.prototype.postTabs = function(){
        var _this = this;
        var element = $( '.ds-sc-post-tabs__container', _this.$target );
        // var a = $( this ).parents('.de-shortcode__wrapper').data('dahz-shortcode-key');
        var $grid = $( element ).isotope({
            itemSelector: '.de-sc-post-tabs__item',
            layoutMode: 'fitRows'
        });
        // filter items on button click
        $('.ds-sc-post-tabs__filter-action', _this.$target ).on( 'click', function() {
          var filterValue = $( this ).attr('data-filter');
          $grid.isotope({ filter: filterValue });
          // alert();
          console.log(filterValue);
        });



    }

    $.fn.postTabs = function(){
		new postTabs( this );
		$( this ).addClass( 'initialized' );
		return this;
	}

	$( document ).ready( function(){
		$( '.de-sc-post-tabs:not(.initialized)' ).each( function( index, el ) {
			$( el ).postTabs();
		});

	})

}(window.jQuery);
