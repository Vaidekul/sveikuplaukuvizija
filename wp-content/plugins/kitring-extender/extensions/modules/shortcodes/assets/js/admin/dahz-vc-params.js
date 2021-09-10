! function ($) {

	window.dahzSC = window.dahzSC || {};

	var DahzRadioImage = function () {

	}

	DahzRadioImage.prototype.init = function () {
		$('.dahz-vc-params__radio-image ul').each(function () {
			var val = $('input[type="hidden"]', $(this).parents('.dahz-vc-params__radio-image')).val();
			$('img[data-value="' + val + '"]', this).parents('li').addClass('selected');
		});

		this.clickListener();
	}

	DahzRadioImage.prototype.clickListener = function () {
		$('.dahz-vc-params__radio-image ul li img').unbind('click');

		$('.dahz-vc-params__radio-image ul li img').click(function () {
			$('li', $(this).parents('.dahz-vc-params__radio-image')).removeClass('selected');
			$(this).parents('li').addClass('selected');
			$('input[type="hidden"]', $(this).parents('.dahz-vc-params__radio-image')).val($(this).attr('data-value')).trigger('change');
		});
	}

	var DahzRadioButton = function () {

	}

	DahzRadioButton.prototype.init = function () {
		$('.dahz-vc-params__radio-button ul').each(function () {
			var val = $('input[type="hidden"]', $(this).parents('.dahz-vc-params__radio-button')).val();
			$('div[data-value="' + val + '"]', this).parents('li').addClass('selected');
		});

		this.clickListener();
	}

	DahzRadioButton.prototype.clickListener = function () {
		$('.dahz-vc-params__radio-button ul li div').unbind('click');

		$('.dahz-vc-params__radio-button ul li div').click(function () {
			$('li', $(this).parents('.dahz-vc-params__radio-button')).removeClass('selected');
			$(this).parents('li').addClass('selected');
			$('input[type="hidden"]', $(this).parents('.dahz-vc-params__radio-button')).val($(this).attr('data-value')).trigger('change');
		});
	}

	var DahzParamtypeLink = function () {
		this.$target = '';
		this.isDeLinkOpen = false;
	}

	DahzParamtypeLink.prototype.init = function () {
		var _self = this;

		$('.ds-paramtype-link__wrapper').each(function (eq, target) {
			_self.listener(target);
		});

		$(document).on('wplink-open', function () {
			if (!_self.isDeLinkOpen) return;

			var url = $('#wp-link-url', $('form#wp-link')),
				submitButton = $('#wp-link-submit', $('form#wp-link')),
				linkText = $('.wp-link-text-field', $('form#wp-link')),
				linkTarget = $('.link-target', $('form#wp-link'));

			url.val($('.wpb_vc_param_value', _self.$target.parents('.ds-paramtype-link__wrapper')).val());

			linkText.hide();

			linkTarget.hide();

			submitButton.unbind('click').click(function (e) {
				e.preventDefault();

				e.stopImmediatePropagation();

				$('.wpb_vc_param_value', _self.$target.parents('.ds-paramtype-link__wrapper')).val(url.val()).change();

				wpLink.close();
			});
		});

		$(document).on('wplink-close', function () {
			if (_self.isDeLinkOpen) {
				_self.isDeLinkOpen = false;
			}
		});
	}

	DahzParamtypeLink.prototype.listener = function (target) {
		$('.ds-paramtype-link--open', target).click({
			_self: this
		}, this.openWPLink);
	}

	DahzParamtypeLink.prototype.openWPLink = function (e) {
		e.data._self.$target = $(this);
		e.data._self.isDeLinkOpen = true;

		wpLink.open();
	}

	dahzSC.parallaxOption = {
		init: function () {
			$('input[type="range"]', $('.parallax-options-range')).on('input', function () {
				$('input[type="text"]', $(this).parents('.parallax-options-range')).val(this.value)
			});

			$('input[type="text"]', $('.parallax-options-range')).change(function () {
				if (!isNaN(this.value)) {
					$('input[type="range"]', $(this).parents('.parallax-options-range')).val(this.value).change();
				} else {
					$(this).val(0);

					$('input[type="range"]', $(this).parents('.parallax-options-range')).val(0).change();
				}
			});

			$('input[type="checkbox"]', $('.parallax-options-container')).change(function () {
				alert()
				if (this.checked) {
					$(this).val('true');
				} else {
					$(this).val('false');
				}
			});

			$('.parallax-options-show-advance-settings').change(function () {
				if (this.checked) {
					$('.parallax-options-advance-settings', $(this).parents('.parallax-options-container')).removeClass('uk-hidden');
				} else {
					$('.parallax-options-advance-settings', $(this).parents('.parallax-options-container')).addClass('uk-hidden');
				}
			});

			$('.parallax-options-container').each(dahzSC.parallaxOption.createObject);

		},
		createObject: function (i, $el) {
			return new dahzSC.parallaxOption({
				target: this,
				$target: $el
			});
		},
	};

	dahzSC.parallaxOption = _.extend(function (options) {
		_.extend(this, _.pick(options || {}, 'target', '$target'));

		this.inputTarget = $('textarea.parallax_options_field', this.$target);

		this.value = {};

		var _this = this;

		$('.parallax-option', _this.$target).each(function () {
			var value = {};
			value[$(this).attr('name')] = $(this).val();
			_.extend(_this.value, value);
		});

		this.bindValue();
	}, dahzSC.parallaxOption);

	_.extend(dahzSC.parallaxOption.prototype, {
		bindValue: function () {
			var _this = this;

			$('.parallax-option', _this.$target).on('change', function () {
				var value = {};
				value[$(this).attr('name')] = $(this).val();
				_.extend(_this.value, value);
				_this.inputTarget.val(encodeURIComponent(JSON.stringify(_this.value)));
			});
		}
	});

	dahzSC.visibility = {
		init: function () {
			$('.dahz-visibility-vc-param').each(dahzSC.visibility.createObject);
		},
		createObject: function (i, $el) {
			return new dahzSC.visibility({
				target: this,
				$target: $el
			});
		},
	};

	dahzSC.visibility = _.extend(function (options) {
		_.extend(this, _.pick(options || {}, 'target', '$target'));

		this.inputTarget = $('input.visibility_field', this.$target);

		this.value = [];

		this.bindValue();
	}, dahzSC.visibility);

	_.extend(dahzSC.visibility.prototype, {
		bindValue: function () {
			var _this = this;

			$('input[type="checkbox"]', _this.$target).on('change', function () {
				if (this.checked) {
					_this.value.push(this.value);

					_.uniq(_this.value);
				} else {
					var pos = $.inArray(this.value, _this.value);

					if (pos !== -1) {
						_this.value.splice(pos, 1);
					}
				}

				if (_this.value.length) {
					_this.inputTarget.val(_this.value.join(" "));
				} else {
					_this.inputTarget.val('');
				}
			});
		}
	});

	dahzSC.columnOffset = {
		init: function () {
			$('.dahz-column-offset-uikit-vc-param').each(dahzSC.columnOffset.createObject);
		},
		createObject: function (i, $el) {
			return new dahzSC.columnOffset({
				target: this,
				$target: $el
			});
		},
	};

	dahzSC.columnOffset = _.extend(function (options) {
		_.extend(this, _.pick(options || {}, 'target', '$target'));

		this.inputTarget = $('input.column_offset_uikit_field', this.$target);

		this.value = [];

		this.bindValue();
	}, dahzSC.columnOffset);

	_.extend(dahzSC.columnOffset.prototype, {
		bindValue: function () {
			var _this = this,
				value;

			$('.column-offset-uikit-field', _this.$target).on('change', function () {
				_this.value = [];
				$('.column-offset-uikit-field', _this.$target).each(function () {
					value = '';

					prefix = $(this).data('value');

					if (prefix == 'vc_col' && $(this).val() !== '') {
						value = prefix + '-' + $(this).data('size-modifier') + '-' + $(this).val();
					} else if (prefix == 'vc_hidden' && this.checked) {
						value = prefix + '-' + $(this).data('size-modifier');
					}

					if (value !== '') {
						_this.value.push(value);
					}
				});

				if (_this.value.length) {
					_this.inputTarget.val(_this.value.join(" "));
				} else {
					_this.inputTarget.val('');
				}
			});
		}
	});

	dahzSC.slider = {
		init: function () {
			$('.dahz-slider-vc-param').each(dahzSC.slider.connect);
		},
		connect: function (i, $el) {
			$('input[type="range"]', $el).on('input', function () {
				$('input[type="text"]', $el).val(this.value)
			});

			$('input[type="text"]', $el).change(function () {
				if (!isNaN(this.value)) {
					$('input[type="range"]', $el).val(this.value).change();
				} else {
					$(this).val(0);

					$('input[type="range"]', $el).val(0).change();
				}
			});
		}
	};

	dahzSC.titleResponsiveSize = {
		init: function () {
			$('.dahz-title-responsive-size-vc-param').each(dahzSC.titleResponsiveSize.createObject);
		},
		createObject: function (i, $el) {
			return new dahzSC.titleResponsiveSize({
				target: this,
				$target: $el
			});
		},
	};

	dahzSC.titleResponsiveSize = _.extend(function (options) {
		_.extend(this, _.pick(options || {}, 'target', '$target'));

		this.inputTarget = $('input.title_responsive_size_field', this.$target);

		this.value = {};

		this.bindValue();
	}, dahzSC.titleResponsiveSize);

	_.extend(dahzSC.titleResponsiveSize.prototype, {
		bindValue: function () {
			var _this = this;

			$('input[type="text"]', _this.$target).each(function () {
				var value = {};

				value[$(this).attr('name')] = $(this).val();

				_.extend(_this.value, value);
			});

			$('input[type="text"]', _this.$target).on('change', function () {
				var value = {};

				value[$(this).attr('name')] = $(this).val();

				_.extend(_this.value, value);

				_this.inputTarget.val(encodeURIComponent(JSON.stringify(_this.value)));
			});
		}
	});

	var dahzRadioButton = new DahzRadioButton();

	var dahzRadioImage = new DahzRadioImage();

	var dahzParamtypeLink = new DahzParamtypeLink();

	dahzSC.parallaxOption.init();

	dahzSC.visibility.init();

	dahzSC.slider.init();

	dahzSC.columnOffset.init();

	dahzSC.titleResponsiveSize.init();

	dahzRadioImage.init();

	dahzRadioButton.init();

	dahzParamtypeLink.init();

	vc.events.on("vc-param-group-add-new", function () {
		var dahzRadioButton = new DahzRadioButton();

		var dahzRadioImage = new DahzRadioImage();

		dahzRadioImage.init();

		dahzRadioButton.init();

		dahzSC.slider.init();
	});

}(window.jQuery);

/* 
 * PARAM TYPE TAGGING
 * CREATED BY DAHZ - KW
 * v 1.1.0
 */
! function ($) {
	function initiate() {
		var dotsStorage;

		if ('' == $('.ds-tagging__container .wpb_vc_param_value').val().trim()) {
			dotsStorage = {};
			dotsStorage.dotsImage = '';
			dotsStorage.dotsImageID = '';
			dotsStorage.dotsItem = [];
		} else {
			dotsStorage = $('.ds-tagging__container .wpb_vc_param_value').val();
			dotsStorage = decodeURIComponent(dotsStorage);
			dotsStorage = JSON.parse(dotsStorage);

			var imageTarget = $('.ds-tagging__dots-media');

			initialRender(imageTarget, dotsStorage);
		}

		uploadImage(dotsStorage);

		removeImage(dotsStorage);

		colorPicker();
	}

	var getDotsCoordinate = function (event) {
		var imageWidth = event.target.clientWidth,
			imageHeight = event.target.clientHeight,
			getCoorX = event.offsetX,
			getCoorY = event.offsetY,
			dotsCoorX = getCoorX / imageWidth * 100,
			dotsCoorY = getCoorY / imageHeight * 100;

		return {
			dotsCoorX: dotsCoorX,
			dotsCoorY: dotsCoorY
		};
	};

	function uploadImage(dotsStorage) {
		$('.ds-tagging--btn-upload').click(function () {
			var imageTarget = $('.ds-tagging__dots-media', $(this).parents('.ds-tagging__container')),
				galleryWindow = wp.media({
					title: 'Insert Image Tagged',
					library: {
						type: 'image'
					},
					multiple: false,
					button: {
						text: 'Insert'
					}
				});

			galleryWindow.on('select', function () {
				var userSelection = galleryWindow.state().get('selection').first().toJSON();

				imageTarget.attr('src', userSelection.url);

				dotsStorage.dotsImage = userSelection.url;

				dotsStorage.dotsImageID = userSelection.id;

				bindSave(imageTarget, dotsStorage);
			});

			galleryWindow.open();

			dotsListener(dotsStorage);
		});
	}

	function removeImage(dotsStorage) {
		$('.ds-tagging--btn-remove').click(function () {
			var imageTarget = $('.ds-tagging__dots-media', $(this).parents('.ds-tagging__container')),
				inputTarget = $('.wpb_vc_param_value', $(this).parents('.ds-tagging__container'));

			$('.ds-tagging__dots', $(imageTarget).parents('.ds-tagging__container')).remove();

			$('.ds-tagging__form', $(imageTarget).parents('.ds-tagging__container')).remove();

			imageTarget.attr('src', '#');

			inputTarget.val('');

			dotsStorage.dotsImage = '';

			dotsStorage.dotsImageID = '';

			dotsStorage.dotsItem = [];

			$('.ds-tagging__container .ds-tagging__dots-media').unbind('click');
		});
	}

	function colorPicker() {
		$('.color-picker').wpColorPicker();
	}

	function dotsListener(dotsStorage) {
		$('.ds-tagging__container .ds-tagging__dots-media').unbind('click');

		$('.ds-tagging__container .ds-tagging__dots-media').click(function (event) {

			event.preventDefault();

			var coordinate = new getDotsCoordinate(event);

			var imageTarget = event.target;

			dotsStorage.dotsItem.push(coordinate);

			dotsRender(imageTarget, dotsStorage);

			formRender(imageTarget, dotsStorage);

			bindSave(imageTarget, dotsStorage);

			colorPicker();
		});
	}

	function dotsRender(imageTarget, dotsStorage) {
		$('.ds-tagging__dots', $(imageTarget).parents('.ds-tagging__container')).remove();

		$.each(dotsStorage.dotsItem, function (index, value) {
			dotsRenderTemplate(imageTarget, dotsStorage, value.dotsCoorX, value.dotsCoorY, index);
		});
	}

	function dotsRenderTemplate(imageTarget, dotsStorage, dotsCoorX, dotsCoorY, dotsNumber) {
		$(imageTarget).parents('.ds-tagging__dots-container')
			.append(
				'<div class="ds-tagging__dots" data-dots-number="' + dotsNumber + '"' +
				' style="top: calc(' + dotsCoorY + '% - 10px);left: calc(' + dotsCoorX + '% - 10px);">' +
					'<span>' + ( dotsNumber + 1 ) + '</span>' +
				'</div>'
			);

		$('.ds-tagging__dots[data-dots-number="' + dotsNumber + '"]').draggable({
			stop: function (event, ui) {
				var imageWidth = $('.ds-tagging__dots-container img').outerWidth();
				var imageHeight = $('.ds-tagging__dots-container img').outerHeight();

				dotsStorage.dotsItem[dotsNumber]['dotsCoorX'] = (ui.position.left + 10) / imageWidth * 100;
				dotsStorage.dotsItem[dotsNumber]['dotsCoorY'] = (ui.position.top + 10) / imageHeight * 100;

				bindSave(imageTarget, dotsStorage);
			}
		});
	}

	function dotsRemove(imageTarget, dotsStorage) {
		$('.ds-tagging--dots-remove').click(function (event) {
			event.preventDefault();

			var dotsNumber = $(this).parents('.ds-tagging__form').data('dots-number');

			dotsRemoveAlert(dotsNumber, dotsStorage);

			dotsRender(imageTarget, dotsStorage);

			formRender(imageTarget, dotsStorage);

			bindSave(imageTarget, dotsStorage);

			colorPicker();
		});
	}

	function dotsRemoveAlert(dotsNumber, dotsStorage) {
		if (confirm('Are you sure want to remove Area ' + (dotsNumber + 1) + '?!!!')) {
			dotsStorage.dotsItem.splice(dotsNumber, 1);
		} else {
			return;
		}
	}

	function formRender(imageTarget, dotsStorage) {
		$('.ds-tagging__form', $(imageTarget).parents('.ds-tagging__container')).remove();

		$.each(dotsStorage.dotsItem, function (index, value) {
			formRenderTemplate(imageTarget, dotsStorage, index, true);
		});

		dotsRemove(imageTarget, dotsStorage);

		formTypeChange(imageTarget, dotsStorage);

		formToggle();
	}

	function formRenderTemplate(imageTarget, dotsStorage, dotsNumber, isFormSetValue) {
		$('.ds-tagging__form-container', $(imageTarget).parents('.ds-tagging__container'))
			.append(
				'<div class="ds-tagging__form" data-dots-number="' + dotsNumber + '">' + 
					'<div class="ds-tagging__form-header">' + 
						'<div>' + 
							'<h4>Area ' + ( dotsNumber + 1 ) + '</h4>' + 
							'<a class="ds-tagging--dots-remove">Remove</a>' + 
						'</div>' + 
						'<i class="df-plus-no-border">toggle</i>' + 
					'</div>' + 
					'<div class="vc_edit_form_elements">' + 
						'<div class="ds-tagging__form-body">' + 
							'<div class="vc_column">' + 
								'<div class="wpb_element_label">Tagging Type</div>' + 
								'<div class="edit_form_line">' + 
									'<select class="ds-tagging--form-type">' + 
										//'<option value="product">Product</option>' + 
										'<option value="text">Custom Text</option>' + 
										'<option value="video">Video Pop Up</option>' + 
										'<option value="image">Lightbox Image</option>' + 
									'</select>' + 
								'</div>' + 
							'</div>' + 
							'<div class="ds-tagging__form-content"></div>' + 
						'</div>' + 
					'</div>' + 
				'</div>'
		).promise().done(function (target) {
				var formTarget = $('.ds-tagging__form', target),
					formType = typeof dotsStorage.dotsItem[dotsNumber]['dotsType'] !== 'undefined' ? dotsStorage.dotsItem[dotsNumber]['dotsType'] : 'product';

				if (isFormSetValue) {
					dotsStorage.dotsItem[dotsNumber]['dotsType'] = formType;

					formTypeObjectSet(imageTarget, dotsStorage, formType, dotsNumber, false);
				}

				formTypeInputSet(imageTarget, dotsStorage, formType, dotsNumber);

				formBindData(imageTarget, dotsStorage, formType, dotsNumber);
			});
	}

	function formTypeChange(imageTarget, dotsStorage) {
		var formType, formTarget = $('.ds-tagging__form', $(imageTarget).parents('.ds-tagging__container'));

		formTarget.each(function (counter, target) {
			$('.ds-tagging--form-type', this).change(function () {
				formType = $(this).val();

				dotsStorage.dotsItem[counter]['dotsType'] = formType;

				formTypeObjectSet(imageTarget, dotsStorage, formType, counter, true);

				formTypeInputSet(imageTarget, dotsStorage, formType, counter);

				formBindData(imageTarget, dotsStorage, formType, counter);

				formGetUploadImage(dotsStorage, counter);

				colorPicker();
			});
		});
	}

	function formTypeObjectSet(imageTarget, dotsStorage, formType, dotsNumber, isFormChangeType) {
		if ('undefined' !== typeof dotsStorage.dotsItem[dotsNumber]['dotsValue'] && !isFormChangeType) return;

		switch (formType) {
			// case 'product':
				// dotsStorage.dotsItem[dotsNumber]['dotsValue'] = {
					// dotsBgColor: '#f49602',
					// dotsIconColor: '#fff',
					// productName: ''
				// };
				// break;
			case 'text':
				dotsStorage.dotsItem[dotsNumber]['dotsValue'] = {
					dotsBgColor: '#f49602',
					dotsIconColor: '#fff',
					textContent: ''
				};
				break;
			case 'video':
				dotsStorage.dotsItem[dotsNumber]['dotsValue'] = {
					dotsBgColor: '#f49602',
					dotsIconColor: '#fff',
					videoUrl: '',
					videoAutoplay: ''
				};
				break;
			case 'image':
				dotsStorage.dotsItem[dotsNumber]['dotsValue'] = {
					dotsBgColor: '#f49602',
					dotsIconColor: '#fff',
					imagesList: {}
				};
				break;
			default:
				dotsStorage.dotsItem[dotsNumber]['dotsValue'] = {
					dotsBgColor: '#f49602',
					dotsIconColor: '#fff',
					textContent: ''
				};
				break;
		}
	}

	function formTypeInputSet(imageTarget, dotsStorage, formType, dotsNumber) {
		switch (formType) {
			// case 'product':
				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).html('');

				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).append(
					// '<div class="vc_column-with-padding">' +
						// '<div class="wpb_element_label">Product</div>' +
						// '<div class="edit_form_line">' +
							// '<input type="text" class="ds-tagging__form-product-name" />' +
							// '<span class="vc_description vc_clearfix">Insert product name</span>' +
						// '</div>' +
					// '</div>' +
					// '<div class="vc_column-with-padding">' +
						// '<div class="wpb_element_label">Icon Color</div>' +
						// '<div class="edit_form_line">' +
							// '<input type="text" class="color-picker ds-tagging__form-product-icon-color" data-alpha="true" />' +
						// '</div>' +
					// '</div>' +
					// '<div class="vc_column-with-padding">' +
						// '<div class="wpb_element_label">Background Color</div>' +
						// '<div class="edit_form_line">' +
							// '<input type="text" class="color-picker ds-tagging__form-product-bg-color" data-alpha="true" />' +
						// '</div>' +
					// '</div>'
				// ).promise().done(function () {
					// formSetData(imageTarget, dotsStorage, formType, dotsNumber);
				// });
				// break;
			case 'text':
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).html('');

				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).append(
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Text</div>' +
						'<div class="edit_form_line">' +
							'<textarea class="ds-tagging__form-text-content"></textarea>' +
							'<span class="vc_description vc_clearfix">Insert your custom text</span>' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Icon Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-text-icon-color" data-alpha="true" />' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Background Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-text-bg-color" data-alpha="true" />' +
						'</div>' +
					'</div>'
				).promise().done(function () {
					formSetData(imageTarget, dotsStorage, formType, dotsNumber);
				});
				break;
			case 'video':
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).html('');

				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).append(
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Video URL</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="ds-tagging__form-video-url" />' +
							'<span class="vc_description vc_clearfix">Insert your video URL</span>' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Icon Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-video-icon-color" data-alpha="true" />' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Background Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-video-bg-color" data-alpha="true" />' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Enable Autoplay</div>' +
						'<div class="edit_form_line">' +
							'<input type="checkbox" class="ds-tagging__form-video-autoplay" name="video_autoplay" /> Yes, Please' +
						'</div>' +
					'</div>'
				).promise().done(function () {
					formSetData(imageTarget, dotsStorage, formType, dotsNumber);
				});
				break;
			case 'image':
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).html('');

				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).append(
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Image</div>' +
						'<div class="edit_form_line">' +
							'<ul class="ds-tagging__form-image-uploaded">' +
							'</ul>' +
							'<a class="ds-tagging--form-image-upload">+</a>' +
							'<span class="vc_description vc_clearfix">Select images from media library</span>' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Icon Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-image-icon-color" data-alpha="true" />' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Background Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-image-bg-color" data-alpha="true" />' +
						'</div>' +
					'</div>'
				).promise().done(function () {
					formSetData(imageTarget, dotsStorage, formType, dotsNumber);
				});
				break;
			default:
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).html('');

				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-content', $(imageTarget).parents('.ds-tagging__container')).append(
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Text</div>' +
						'<div class="edit_form_line">' +
							'<textarea class="ds-tagging__form-text-content"></textarea>' +
							'<span class="vc_description vc_clearfix">Insert your custom text</span>' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Icon Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-text-icon-color" data-alpha="true" />' +
						'</div>' +
					'</div>' +
					'<div class="vc_column-with-padding">' +
						'<div class="wpb_element_label">Background Color</div>' +
						'<div class="edit_form_line">' +
							'<input type="text" class="color-picker ds-tagging__form-text-bg-color" data-alpha="true" />' +
						'</div>' +
					'</div>'
				).promise().done(function () {
					formSetData(imageTarget, dotsStorage, formType, dotsNumber);
				});
				break;
		}
	}

	function formGetUploadImage(dotsStorage, dotsNumber) {
		$('.ds-tagging--form-image-upload').click(function () {
			var imageTarget = $('.ds-tagging__dots-media', $(this).parents('.ds-tagging__container')),
				galleryWindow = wp.media({
					title: 'Insert Image to Display',
					library: {
						type: 'image'
					},
					multiple: true,
					button: {
						text: 'Insert'
					}
				});

			galleryWindow.on('select', function () {
				var imageCounter, userSelection = galleryWindow.state().get('selection').toJSON();

				$.each(userSelection, function (index, value) {
					var now = new Date(),
						timestamp = now.getTime();

					dotsStorage.dotsItem[dotsNumber]['dotsValue']['imagesList'][timestamp + '-' + value.id] = {
						turl: value.sizes.thumbnail.url,
						url: value.url,
						width: value.width,
						height: value.height
					};

					$('.ds-tagging__form-image-uploaded').append(
						'<li>' +
							'<a class="ds-tagging--form-image-remove"><span>+</span></a>' +
							'<img src="' + value.sizes.thumbnail.url + '" alt="' + value.id + '" data-timestamp="' + timestamp + '-' + value.id + '" />' +
						'</li>'
					).promise().done(function () {
						formRemoveUploadImage(imageTarget, dotsStorage, dotsNumber);
					});
				});

				bindSave(imageTarget, dotsStorage);
			});

			galleryWindow.open();
		});
	}

	function formSetUploadImage(dotsStorage, dotsNumber) {
		if ('image' != dotsStorage.dotsItem[dotsNumber]['dotsType']) return;

		var id;

		$.each(dotsStorage.dotsItem[dotsNumber]['dotsValue'].imagesList, function (index, value) {
			id = index.split('-');

			$('.ds-tagging__form-image-uploaded').append(
				'<li>' +
					'<a class="ds-tagging--form-image-remove"><span>+</span></a>' +
					'<img src="' + value.turl + '" alt="' + id['1'] + '" data-timestamp="' + index + '" />' +
				'</li>'
			);
		});
	}

	function formRemoveUploadImage(imageTarget, dotsStorage, dotsNumber) {
		$('.ds-tagging--form-image-remove').click(function () {
			var timestamp = $(this).next('img').data('timestamp');

			$(this).parents('li').remove();

			delete dotsStorage.dotsItem[dotsNumber]['dotsValue']['imagesList'][timestamp];

			bindSave(imageTarget, dotsStorage);
		});
	}

	function formBindData(imageTarget, dotsStorage, formType, dotsNumber) {
		switch (formType) {
			case 'text':
				$('.ds-tagging__form-text-content', $(imageTarget).parents('.ds-tagging__container')).change(function (event) {
					var value = event.currentTarget.value;

					dotsStorage.dotsItem[dotsNumber]['dotsValue']['textContent'] = value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-text-icon-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-text-bg-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});
				break;
			case 'video':
				$('.ds-tagging__form-video-url', $(imageTarget).parents('.ds-tagging__container')).change(function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['videoUrl'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-video-autoplay', $(imageTarget).parents('.ds-tagging__container')).change(function (event) {
					if ($(this).prop('checked')) {
						dotsStorage.dotsItem[dotsNumber]['dotsValue']['videoAutoplay'] = true;
					} else {
						dotsStorage.dotsItem[dotsNumber]['dotsValue']['videoAutoplay'] = false;
					}

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-video-icon-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-video-bg-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});
				break;
			case 'image':
				$('.ds-tagging__form-image-icon-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-image-bg-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});
				break;
			default:
				$('.ds-tagging__form-text-content', $(imageTarget).parents('.ds-tagging__container')).change(function (event) {
					var value = event.currentTarget.value;

					dotsStorage.dotsItem[dotsNumber]['dotsValue']['textContent'] = value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-text-icon-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});

				$('.ds-tagging__form-text-bg-color', $(imageTarget).parents('.ds-tagging__container')).on('change, irischange', function (event) {
					dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor'] = event.currentTarget.value;

					bindSave(imageTarget, dotsStorage);
				});
				break;
		}
	}

	function formSetData(imageTarget, dotsStorage, formType, dotsNumber) {
		$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging--form-type option[value="' + formType + '"]', $(imageTarget).parents('.ds-tagging__container')).attr('selected', 'selected');

		switch (formType) {
			// case 'product':
				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-product-name', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['productName']);
				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-product-icon-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-product-bg-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-product-icon-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				// $('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-product-bg-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				// break;
			case 'text':
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-content', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['textContent']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-icon-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-bg-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-icon-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-bg-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				break;
			case 'video':
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-video-url', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['videoUrl']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-video-autoplay', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['videoAutoplay']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-video-icon-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-video-bg-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-video-icon-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-video-bg-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				break;
			case 'image':
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-image-icon-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-image-bg-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-image-icon-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-image-bg-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				break;
			default:
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-content', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['textContent']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-icon-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-bg-color', $(imageTarget).parents('.ds-tagging__container')).val(dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-icon-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsIconColor']);
				$('.ds-tagging__form[data-dots-number="' + dotsNumber + '"] .ds-tagging__form-text-bg-color', $(imageTarget).parents('.ds-tagging__container')).parent().prev().children().css('background-color', dotsStorage.dotsItem[dotsNumber]['dotsValue']['dotsBgColor']);
				break;
		}
	}

	function formToggle() {
		$('.ds-tagging__form-header').on('click', 'i', function (event) {
			$(this).parent().toggleClass('active').next('.vc_edit_form_elements').slideToggle();
		});
	}

	function bindSave(imageTarget, dotsStorage) {
		if (typeof dotsStorage !== 'undefined') {
			var value = JSON.stringify(dotsStorage);

			value = $.trim(value.replace(/[\t\n]+/g, ' '));

			$('.wpb_vc_param_value', $(imageTarget).parents('.ds-tagging__container')).val(encodeURIComponent(value));
		}
	}

	function productAutocomplete(target) {
		var optionsAutoComplete = {
			minLength: 2,
			url: ajaxurl,
			params: {
				'source': 'product',
				'action': 'dahz_framework_autocomplete'
			},
			searchIn: ['id', 'text'],
			textProperty: 'id: {id}, name: {text}',
			valueProperty: 'id',
			visibleProperties: ['text'],
			cache: false,
			chainedRelatives: true,
			focusFirstResult: true,
			searchContain: true,
			selectionRequired: true,
			toggleSelected: false
		}

		$(target).flexdatalist(optionsAutoComplete);
	}

	function initialRender(imageTarget, dotsStorage) {
		imageTarget.attr('src', dotsStorage.dotsImage);

		$.each(dotsStorage.dotsItem, function (index, value) {
			dotsRenderTemplate(imageTarget, dotsStorage, value.dotsCoorX, value.dotsCoorY, index);

			formRenderTemplate(imageTarget, dotsStorage, index, false);

			formGetUploadImage(dotsStorage, index);

			formSetUploadImage(dotsStorage, index);

			formRemoveUploadImage(imageTarget, dotsStorage, index);
		});

		dotsListener(dotsStorage);

		dotsRemove(imageTarget, dotsStorage);

		formTypeChange(imageTarget, dotsStorage);

		formToggle();
	}

	$(document).ready(function () {
		if ($('.ds-tagging__container').length) initiate();
	});

}(jQuery);