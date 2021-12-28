jQuery(document).ready(function($) {
    $('.paysera-delivery-terminal-city-selection').select2();
    $('.paysera-delivery-terminal-country-selection').select2();
    $('.paysera-delivery-terminal-location-selection').select2();

    $(document).on('updated_checkout cfw_updated_checkout', function () {
        let paysera_terminal_country = $('.paysera-delivery-terminal-country');
        let paysera_terminal_country_selection = $('.paysera-delivery-terminal-country-selection');

        let shipping_methods = {};
        $('select.shipping_method, input[name^="shipping_method"][type="radio"]:checked, input[name^="shipping_method"][type="hidden"]').each(function () {
            shipping_methods[$(this).data('index')] = $(this).val();
        });

        if (Object.keys(shipping_methods).length > 0) {
            let shipping_methods_keys = Object.keys(shipping_methods);
            let shipping_method = $.trim(shipping_methods[shipping_methods_keys[0]]);
            let paysera_delivery_method = 'paysera_delivery';

            if (shipping_method.indexOf(paysera_delivery_method) !== -1) {
                paysera_terminal_country_selection.val('default');
                paysera_terminal_country_selection.trigger('change');

                let paysera_delivery_terminal_method = 'terminal';

                if (shipping_method.indexOf(paysera_delivery_terminal_method) !== -1) {
                    paysera_terminal_country_selection.empty();

                    $.ajax({
                        type: 'POST',
                        url: ajax_object.ajaxurl,
                        data: {
                            action: 'change_paysera_method',
                            shipping_method: shipping_method
                        },
                        success:function(response) {
                            let countries = JSON.parse(response);

                            let newOption = new Option(countries['default'], 'default', true, true);
                            paysera_terminal_country_selection.append(newOption).trigger('change');

                            $.each(countries, function(index, item) {
                                if (index === 'default') {
                                    return;
                                }
                                let newOption = new Option(item, index, false, false);
                                paysera_terminal_country_selection.append(newOption).trigger('change');
                            });
                        },
                        error:function() {
                            alert('There was an error while fetching the data.');
                        }
                    });

                    paysera_terminal_country.show();
                } else {
                    paysera_terminal_country.hide();
                }
            } else {
                paysera_terminal_country.hide();
            }

            $('.paysera-delivery-terminal-city').hide();
            $('.paysera-delivery-terminal-location').hide();
            $('.paysera-delivery-terminal-city-selection').empty();
            $('.paysera-delivery-terminal-location-selection').empty();
        }
    });
});
