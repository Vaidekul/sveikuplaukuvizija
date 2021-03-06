(function ($) {

	window.DahzSCImageGallery = function ($target) {
		this.$target = $target;
		this.init();
	}

	DahzSCImageGallery.prototype.init = function () {
		if ($(this.$target).data('view') === 'masonry' && $(window).outerWidth() >= 1200) {
			this.setSize();
		} else {
			this.resetSize();
		}

		this.setTilt();
	}

	DahzSCImageGallery.prototype.setSize = function () {
		var _self = this, count, gutter, gutterData, parentwidth, elementwidth, elementheight, width, height;

		gutterData = $(this.$target).data('gutter');

		count = $('.de-sc-image-gallery__item', this.$target).length;

		gutter = 20;
		if (typeof gutterData !== 'undefined') {
			switch (gutterData) {
				case 'uk-grid-small':
					gutter = 10;
					break;
				case 'uk-grid-medium':
					gutter = 30;
					break;
				case 'uk-grid-large':
					gutter = 40;
					break;
				case 'uk-grid-collapse':
					gutter = 0;
					break;
			}
		}

		$(this.$target).css({
			'margin-left': -gutter
		});

		parentwidth = $(this.$target).outerWidth();

		$('.de-sc-image-gallery__item', this.$target).each(function (index, element) {
			elementwidth = $(element).data('width');

			elementheight = $(element).data('height');

			sizer = parentwidth * 1 / 6;

			width = parentwidth * elementwidth / 6;

			height = parentwidth * elementheight / 6;

			$(element).parent().css({
				'width': width,
				'height': height - gutter,
				'padding-left': gutter,
				'margin-top': 0,
				'margin-bottom': gutter,
			});
console.log(gutter);
			$(element).css({
				'height': '100%',
				'padding-bottom': '0'
			});

			if (index + 1 === count) _self.setIsotope(sizer);
		});
	}

	DahzSCImageGallery.prototype.resetSize = function () {
		var _self = this, count;

		count = $('.de-sc-image-gallery__item', this.$target).length;

		$('.de-sc-image-gallery__item', this.$target).each(function (index, element) {
			$(element).parent().attr('style', '');

			$(element).attr('style', '');

			if (index + 1 === count) _self.resetIsotope();
		});
	}

	DahzSCImageGallery.prototype.setIsotope = function (sizer) {
		if( typeof $.fn.isotope !== 'function' ) return;
		$(this.$target).isotope({
			itemSelector: '.de-sc-image-gallery__item-outer',
			masonry: {
				columnWidth: sizer,
				horizontalOrder: true,
				fitWidth: true
			}
		});
	}

	DahzSCImageGallery.prototype.resetIsotope = function () {
		if( typeof $.fn.isotope !== 'function' ) return;
		$(this.$target).isotope('destroy');
	}

	DahzSCImageGallery.prototype.setTilt = function () {
		if ($(this.$target).data('hover-effect') === 'parallax-tilt' || $(this.$target).data('hover-effect') === 'parallax-tilt-glare') {
			$('.de-sc-image-gallery__item-outer', this.$target).tilt({
				'perspective': '4000'
			});
		}
	}

	$.fn.DahzSCImageGallery = function () {
		new DahzSCImageGallery(this);

		return this;
	};

	$(document).ready(function () {
		$('.de-sc-image-gallery').each(function () {
			$(this).DahzSCImageGallery();
		});
	});

	$(window).resize(function () {
		$('.de-sc-image-gallery').each(function () {
			$(this).DahzSCImageGallery();
		});
	});

}(jQuery));
