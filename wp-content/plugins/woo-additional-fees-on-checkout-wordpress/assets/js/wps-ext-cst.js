var $=jQuery.noConflict();function show_hide_cndtn(){$(".cndtn_mode").hide();var e=$("#ext_cst_apply_cndtn").val();$("#"+e).show()}function showHideTaxShipping(e,n){"percent"==e.value?(jQuery("#incTax-"+n).show(),jQuery("#incShipCosts-"+n).show()):(jQuery("#incTax-"+n).hide(),jQuery("#incShipCosts-"+n).hide())}function show_hide_cndtn_extra(e){$(".cndtn_mode_extra"+e).hide();var n=$("#ext_cst_apply_cndtn_extra"+e).val();$("#"+n+e).show()}function remove_fees(e){var n=$("#current_number_fees").val();1==confirm("Are you want to delete?")&&$.when($("#fees"+e).fadeOut("slow")).done(function(){$("#fees"+e).remove(),n=parseInt(n)-1,$("#current_number_fees").val(n);$("#current_number_fees").val(n),alert("Successfully deleted.")})}$(document).ready(function(){show_hide_cndtn()}),jQuery(document).ready(function(){"percent"==jQuery("#ext_cst_amount_type").val()?(jQuery("#incTax-1").show(),jQuery("#incShipCosts-1").show()):(jQuery("#incTax-1").hide(),jQuery("#incShipCosts-1").hide()),jQuery("#submit").on("click",function(){var e=jQuery("#ext_cst_label").val(),n=jQuery("#ext_cst_label_billing").val(),t="by WPSuperiors.com";-1!=e.indexOf(t)?jQuery("#ext_cst_label").val(e):jQuery("#ext_cst_label").val(e+" "+t),-1!=n.indexOf(t)?jQuery("#ext_cst_label_billing").val(n):jQuery("#ext_cst_label_billing").val(n+" "+t)})}),jQuery(".wafoc-bottom-line-add-new a").click(function(){var e=$("#current_number_fees").val(),n={action:"wps_generate_new_fees",dataType:"html",number:e};$(".wafoc-bottom-line-add-new a").html("Generating..."),jQuery.post(ajaxurl,n,function(n){$("#wps_custom_fees_add_more").append(n),$(".wafoc-bottom-line-add-new a").html("Add More New Fees"),e=parseInt(e)+1,$("#current_number_fees").val(e),show_hide_cndtn_extra(e)})});