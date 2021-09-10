/*global
  $:true
*/

// ajax cart counter funcitonality
function ajax_cart_count() {
	// check if woocommerce is active
	if($('body').hasClass('woocommerce-active')) {
		$('.cart-counter a').prepend('<div class="header-cart-count"></div>');		
	}
}
ajax_cart_count();

// fix compatibility issue with bootstrap 4
function wc_compat() {
	$('#customer_details').addClass('row');
	$('#customer_details .col-1').removeClass('col-1').addClass('col-md-6').css({'display': 'inline-block', 'vertical-align': 'top'});
	$('#customer_details .col-2').removeClass('col-2').addClass('col-md-6').css('display','inline-block');
	$('.woocommerce-MyAccount-content .col-1').removeClass('col-1').addClass('col-12');
	$('.woocommerce-MyAccount-content .col-2').removeClass('col-2').addClass('col-12');  
	$('.woocommerce-form-login p').removeClass('form-row-first form-row-last');
}
wc_compat();


// add icons to my acc
function wc_icons_to_my_acc() {
	$('.woocommerce-MyAccount-navigation-link--dashboard > a').append('<i class="fa fa-tachometer" aria-hidden="true"></i>');
	$('.woocommerce-MyAccount-navigation-link--orders > a').append('<i class="fa fa-shopping-basket" aria-hidden="true"></i>');
	$('.woocommerce-MyAccount-navigation-link--downloads > a').append('<i class="fa fa-file-archive-o" aria-hidden="true"></i>');
	$('.woocommerce-MyAccount-navigation-link--edit-address > a').append('<i class="fa fa-home" aria-hidden="true"></i>');
	$('.woocommerce-MyAccount-navigation-link--edit-account > a').append('<i class="fa fa-user" aria-hidden="true"></i>');
	$('.woocommerce-MyAccount-navigation-link--customer-logout > a').append('<i class="fa fa-sign-out" aria-hidden="true"></i>');
}
wc_icons_to_my_acc();


function wc_checkout_coupon() {
	$('form.checkout_coupon p.form-row').removeClass('form-row form-row-first form-row-last');
}
wc_checkout_coupon();	