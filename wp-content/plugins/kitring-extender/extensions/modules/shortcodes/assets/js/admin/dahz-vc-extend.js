jQuery(document).ready( function($) {

	window.ContentBlockView = vc.shortcode_view.extend({
		changeShortcodeParams: function ( model ) {
			window.ContentBlockView.__super__.changeShortcodeParams.call( this, model );
			var wrap = this.$el.closest('.wpb_element_wrapper'),
				container = this.$el.find('.wpb_element_wrapper');
				row = this.$el.closest('.wpb_vc_row');
			if (this.model.getParam('inside_column') != 'yes') {
				wrap.css('padding','0');
				container.css('backgroundColor','#F1FDFF');
				row.find('.vc_row_layouts').hide();
				row.find('.vc_column-edit').hide();
				row.find('.vc_control-column').hide();
			} else {
				wrap.removeAttr('style');
				container.removeAttr('style');
				row.find('.vc_row_layouts').show();
				row.find('.vc_column-edit').show();
				row.find('.vc_control-column').show();
			}
		}
	});
});
