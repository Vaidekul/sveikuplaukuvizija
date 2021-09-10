(function ($) {

	window.DahzSCCategoryShowcase = function ($target) {
		this.$target = $target;

		this.init();
	}

	DahzSCCategoryShowcase.prototype.init = function () {
		if ($(this.$target).data('view') === 'masonry' && $(window).outerWidth() >= 1200) {
			this.setSize();
		} else {
			this.resetSize();
		}

		this.setTilt();
	}

	DahzSCCategoryShowcase.prototype.setSize = function () {
		var _self = this, count, gutter, gutterData, parentwidth, elementwidth, elementheight, width, height;

		gutterData = $(this.$target).data('gutter');

		count = $('.de-sc-product-categories__item', this.$target).length;

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

		$('.de-sc-product-categories__item', this.$target).each(function (index, element) {
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

			$(element).css({
				'height': '100%',
				'padding-bottom': '0'
			});

			if (index + 1 === count) _self.setIsotope(sizer);
		});
	}

	DahzSCCategoryShowcase.prototype.resetSize = function () {
		var _self = this, count;

		count = $('.de-sc-product-categories__item', this.$target).length;

		$('.de-sc-product-categories__item', this.$target).each(function (index, element) {
			$(element).parent().attr('style', '');

			$(element).attr('style', '');

			if (index + 1 === count) _self.resetIsotope();
		});
	}

	DahzSCCategoryShowcase.prototype.setIsotope = function (sizer) {
		$(this.$target).isotope({
			itemSelector: '.de-sc-category-showcase__item',
			masonry: {
				columnWidth: sizer,
				horizontalOrder: true,
				fitWidth: true
			}
		});
	}

	DahzSCCategoryShowcase.prototype.resetIsotope = function () {
		$(this.$target).isotope('destroy');
	}

	DahzSCCategoryShowcase.prototype.setTilt = function () {
		if ($(this.$target).data('hover-effect') === 'parallax-tilt' || $(this.$target).data('hover-effect') === 'parallax-tilt-glare') {
			$('.de-sc-category-showcase__item', this.$target).tilt({
				'perspective': '4000'
			});
		}
	}

	$.fn.dahzSCCategoryShowcase = function () {
		new DahzSCCategoryShowcase(this);

		return this;
	};

	$(document).ready(function () {
		$('.de-sc-category-showcase').each(function () {
			$(this).dahzSCCategoryShowcase();
		});
	});

	$(window).resize(function () {
		$('.de-sc-category-showcase').each(function () {
			$(this).dahzSCCategoryShowcase();
		});
	});

}(jQuery));