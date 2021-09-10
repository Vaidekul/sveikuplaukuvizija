jQuery(document).ready(function($) {

    $('#woocommerce_opay_test_mode').change(function(){
        handleTestMode(this);
    });

    $('#woocommerce_opay_signature_type').change(function(){
        handleSignatureType(this)
    });

    handleTestMode();
    handleSignatureType();
});

    function handleTestMode(what)
    {
        var $ = jQuery;
        if (what === undefined) {
            var what = $('#woocommerce_opay_test_mode');
        }
        if ($('option:selected', what).val() == 'enabled') {
            $('#woocommerce_opay_user_id').prop('required',true).closest('tr').show();
        } else {
            $('#woocommerce_opay_user_id').removeAttr('required').closest('tr').hide();
        }
    }

    function handleSignatureType(what)
    {
        var $ = jQuery;
        if (what === undefined) {
            var what = $('#woocommerce_opay_signature_type');
        }

        if ($('option:selected', what).val() == 'rsa_private_key') {
            $('#woocommerce_opay_private_key').prop('required',true).closest('tr').show();
            $('#woocommerce_opay_opay_certificate').prop('required',true).closest('tr').show();
            $('#woocommerce_opay_signature_password').removeAttr('required').closest('tr').hide();
        } else {
            $('#woocommerce_opay_private_key').removeAttr('required').closest('tr').hide();
            $('#woocommerce_opay_opay_certificate').removeAttr('required').closest('tr').hide();
            $('#woocommerce_opay_signature_password').prop('required',true).closest('tr').show();
        }
    }


