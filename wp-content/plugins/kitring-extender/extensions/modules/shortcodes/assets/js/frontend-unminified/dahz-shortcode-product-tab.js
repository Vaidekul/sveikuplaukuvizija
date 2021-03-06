(function ($) {

	window.dahzSC = window.dahzSC || {};

	dahzSC.productTab = {
		init: function ( target ) {
			$( '.de-sc-product-tab' ).each( function () {
				new dahzSC.productTab({
					target: this
				});
			});
		},
		filterFns : {
		  // show if number is greater than 50
		  best_selling: function() {
			var number = $( this ).data( 'sold' );
			return parseInt( number ) >= 0;
		  },
		  // show if name ends with -ium
		  top_rated: function() {
			var number = $( this ).data( 'rating' );
			return parseInt( number ) > 0;
		  }
		},
	};
	dahzSC.productTab = _.extend( function ( options ) {
		_.extend( this, _.pick( options || {}, 'target' ) );
		var _this = this;
		_this.$target = $( _this.target );
		_this.$target.imagesLoaded( function(){
			_this.$grid = $( '.de-product', _this.$target ).isotope({
				itemSelector: '.de-product__item',
				layoutMode: 'fitRows',
				getSortData: {
					best_selling: '[data-sold]',
					top_rated: '[data-rating]'
				}
			});
			_this.filter();
			_this.pagination();
		});
	}, dahzSC.productTab );
	_.extend( dahzSC.productTab.prototype, {
		filter: function () {
			var _this = this;
			$( '.ds-product-tab-filter', _this.$target ).on( 'click', 'a', function() {
			  var filterValue = $( this ).data('filter');
			  var sortByValue = typeof $(this).data('sort-by') !== 'undefined' ? $(this).data('sort-by') : '';
			  filterValue = dahzSC.productTab.filterFns[ filterValue ] || filterValue;
			  _this.$grid.isotope({ filter: filterValue, sortBy: sortByValue, sortAscending: false });
			});
		},
		pagination:function(){
			var _this = this;
			$( '.de-sc-loadmore-btn', _this.$target ).click( { _this : _this }, _this.ajaxPagination );
		},
		ajaxPagination: function(e){
			e.preventDefault();
			var _this = e.data._this, _that = this;
			$.ajax({
				url        : $( this ).attr( 'href' ),
				type       : 'GET',
				dataType   : 'html',
				beforeSend : function() {
					$( _that ).addClass('uk-hidden');
					$( '.de-sc-loadmore--loader', $( _that ).parents( '.de-sc-loadmore' ) ).removeClass( 'uk-hidden' ).addClass('loading');
				},
				success    : function( response ) {
					
					var shortcodeID = $( _that ).parents( '.de-shortcode__wrapper' ).data( 'dahz-shortcode-key' );
					$content = $( '.de-shortcode__wrapper[data-dahz-shortcode-key="' + shortcodeID + '"]', $( response ) );
					
					$( '.de-product__item', $content ).each( function( i, $el ){
						_this.$grid.isotope( 'insert', $( $el ) );
					});
					
					_this.$target.imagesLoaded().progress(function(){
						_this.$grid.isotope( 'layout' );
					});
					
					if( $( '.de-sc-loadmore', $content ).length ){
						$( _that ).removeClass('uk-hidden');
						$( '.de-sc-loadmore--loader', $( _that ).parents( '.de-sc-loadmore' ) ).addClass( 'uk-hidden' ).removeClass('loading');
						$( _that ).attr( 'href', $( '.de-sc-loadmore-btn', $content ).attr( 'href' ) );
					} else {
						$( _that ).parents( '.de-sc-loadmore' ).remove();
					}
					
				}

			});
		}
	});

	dahzSC.productTab.init();

})(jQuery);