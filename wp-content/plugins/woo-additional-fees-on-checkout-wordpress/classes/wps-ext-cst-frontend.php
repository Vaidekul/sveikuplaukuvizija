<?php
class WPS_EXT_CST_Frontend
{
	public function __construct()
	{
		$ext_cst_status 	 = (get_option('ext_cst_status')) ? get_option('ext_cst_status') : 'enable';
		if($ext_cst_status == 'enable' && !is_admin()){
			add_action( 'woocommerce_after_order_notes', array($this,'add_option_to_checkout' ));
			add_action( 'wp_footer', array($this,'add_script_on_checkout' ));
			add_action( 'woocommerce_cart_calculate_fees', array($this,'calculate_cost' ));
		}
	}
	
	public static function get_condition( $cndtn ){
		switch ($cndtn) {
			case 'all':
				return true;
				break;
		
			default:
				return true;
				break;
		}
	}
	public static function add_option_to_checkout( $checkout ){
		global $woocommerce;
		$ext_cst_apply_cndtn = 'all';
		$get_cndtn = WPS_EXT_CST_Frontend::get_condition($ext_cst_apply_cndtn);
		if($get_cndtn){
			$ext_cst_label 	 	 = (get_option('ext_cst_label')) ? get_option('ext_cst_label') : 'Unlabelled Fees by WPSuperiors.com';
			echo '<div id="wp_ext_cst_field">';
		    woocommerce_form_field( 'wps_ext_cst_label', array(
		        'type'          => 'checkbox',
		        'class'         => array('wps_ext_cst_label form-row-wide'),
		        'label'         => $ext_cst_label,
		        'placeholder'   => __(''),
		        ), $checkout->get_value( 'wps_ext_cst_label' ));
		    echo '</div>';
		}
	   
	}

	public static function add_script_on_checkout(){
		if (is_checkout()) {
			$ext_cst_label_css   = (get_option('ext_cst_label_css')) ? get_option('ext_cst_label_css') : '';
			$ext_cst_auto_checked   = (get_option('ext_cst_auto_checked')) ? get_option('ext_cst_auto_checked') : 'disable';
    ?>
		    <script type="text/javascript">
		    jQuery( document ).ready(function( $ ) {
		        $('#wps_ext_cst_label').click(function(){
		            jQuery('body').trigger('update_checkout');
		        });
		    });
		    </script>
		    <style>
		    	<?php echo $ext_cst_label_css; ?>
		    </style>
	    <?php
	    }
	    if( $ext_cst_auto_checked == 'enable' ){
	    	?>
	    	<script type="text/javascript">jQuery('#wps_ext_cst_label').trigger('click');</script>
	    	<?php
	    }
	}

	public static function calculate_cost( $cart ){
        $ext_cst_label_billing 	= (get_option('ext_cst_label_billing')) ? get_option('ext_cst_label_billing') : 'Unlabelled Fees by WPSuperiors.com';
        $ext_cst_amount_type = (get_option('ext_cst_amount_type')) ? get_option('ext_cst_amount_type') : 'fixed';
        $ext_cst_amount 	 = (get_option('ext_cst_amount')) ? get_option('ext_cst_amount') : 1;

        if ( ! $_POST || ( is_admin() && ! is_ajax() ) ) {
        	return;
	    }

	    if ( isset( $_POST['post_data'] ) ) {
	        parse_str( $_POST['post_data'], $post_data );
	    } else {
	        $post_data = $_POST;
	    }

	    if (isset($post_data['wps_ext_cst_label'])) {
	    	global $woocommerce;
	    	switch ($ext_cst_amount_type) {
	    		case 'fixed':
	    			$extracost =  $ext_cst_amount;
	    			break;
	    		case 'percent':
	    		    $extracost = $woocommerce->cart->cart_contents_total * $ext_cst_amount;
	    			$extracost = $extracost/100;
	    			break;
	    		default:
	    			$extracost =  $ext_cst_amount;
	    			break;
	    	}
	        WC()->cart->add_fee( $ext_cst_label_billing, $extracost );
	    }
	}
	

}new WPS_EXT_CST_Frontend();

?>