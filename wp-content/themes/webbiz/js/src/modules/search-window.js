/*global
	$:true
*/

// search 
function search_window() {
	const $search_window = $('.search-window');
	const $trigger = $('.search-trigger');
	const $body = $('body');

	$trigger.click(function(e){
		e.preventDefault();
		$search_window.toggleClass('active');
		// lock scroll when search window is showing
		$body.toggleClass('locked-search');
	});
}

search_window();