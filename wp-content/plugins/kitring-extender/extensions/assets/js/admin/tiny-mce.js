/*
Dahz Extender Tiny MCE
*/

(function() {
	'use strict';

	tinymce.PluginManager.add('DahzExtenderShortcode', function( editor, url ) {
		editor.addButton('DahzExtenderShortcode', {
			title: 'Insert Shortcode',
			icon: false,
			type: 'menubutton',
			menu: [
				{
					text: 'Shortcode Blog',
					onclick: function() {
						editor.windowManager.open({
							title: 'Shorcode Blog',
							style: 'overflow-y:auto;overflow-x:hidden;max-height:60%;',
							body: [
								{
									type: 'listbox',
									name: 'blogLayout',
									label: 'Blog Layout',
									'values' : [
										{text: 'List', value: 'list'},
										{text: 'Grid', value: 'grid'}
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent('[blog blog_layout="'+ e.data.blogLayout +'"]');
							}
						});
					}
				}
			],
		});
	});

})(jQuery);