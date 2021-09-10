<?php
class WPS_EXT_CST_Admin
{
	public static function init(){
		add_action( 'admin_menu', array( 'WPS_EXT_CST_Admin', 'add_menu_extra_fee_option' ) );
		add_action( "admin_init", array('WPS_EXT_CST_Admin_Settings',"register_admin_settings"));
		add_action( 'wp_ajax_wps_generate_new_fees', array('WPS_EXT_CST_Admin','wps_generate_new_fees' ));
		add_action( 'admin_enqueue_scripts', array('WPS_EXT_CST_Admin','selectively_enqueue_admin_script' ));
	}
	public static function add_menu_extra_fee_option() {
		$setting_menu_create = add_submenu_page( 'woocommerce' , __( 'Additional Fees'), __( 'Additional Fees' ), 'manage_options', 'wps-ext-cst-option', array(
				'WPS_EXT_CST_Admin_Settings','admin_settings'));
	}
	public static function selectively_enqueue_admin_script(){
		wp_register_style( 'WPS_EXT_CST_ADMIN_CSS', WPS_EXT_CST_CSS . '/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'WPS_EXT_CST_ADMIN_CSS' );
	}
	public static function wps_generate_new_fees(){
		?>

		<div class="wps-ext-cst-fees" id="fees<?php echo $_POST['number'];?>">
    		<h3>
    			<span class="fees-title">Unlabelled Fees</span>

    			<span style="float:right; color:red; cursor: pointer;" class="dashicons dashicons-trash" onclick="remove_fees(<?php echo $_POST['number'];?>)"></span>
    		</h3>
    		<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
    		<table class="form-table" style="width: 60%;margin-left: auto;margin-right: auto;">
            	<tbody>
					<tr>
						<th scope="row"><label><?php _e( 'Status'); ?><label></th>
						<td>
							<select id="ext_cst_status_extra">
								<option value="enable">Enable</option>
								<option value="disable">Disable</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Label'); ?></labe></td>
						<td>
							<input type="text" class="regular-text code" id="ext_cst_label_extra" value="<?php echo 'Unlabelled Fees #'.$_POST['number'];?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Label for Billing'); ?></labe></td>
						<td>
							<input type="text" class="regular-text code" id="ext_cst_label_billing_extra" value="Unlabelled Fees #<?php echo $_POST['number'];?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Type'); ?><label></th>
						<td>
							<select id="ext_cst_amount_type_extra">
								<option value="fixed">Fixed</option>
								<option value="percent">Percentage</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Auto-checked / Auto-applied the fees'); ?><label></th>
						<td>
							<select id="ext_cst_auto_checked_extra">
								<option value="enable">Enable</option>
								<option value="disable">Disable</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Amount'); ?></labe></td>
						<td>
							<input type="number" name="ext_cst_extra" class="fees_amount regular-text code" id="ext_cst_amount_extra" value="10"/>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Apply Condition'); ?></label></th>
						<td>
							<select data-id="1" class="ext_cst_cndtn_dropdown" name="ext_cst_apply_type" id="ext_cst_apply_type">
								<option value="one_time">One Time Only</option>
								<option value="multiply">Multiplied By Product Quantity</option>
							</select>
							<p>If you want to charge additional fees for each product quantity into cart then choose <b>Multiplied By Product Quantity.</b> otherwise choose One Time Only.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Condition'); ?><label></th>
						<td>
							<select data-id="<?php echo $_POST['number'];?>" id="ext_cst_apply_cndtn_extra<?php echo $_POST['number'];?>" class="ext_cst_cndtn_dropdown" onchange="show_hide_cndtn_extra(<?php echo $_POST['number'];?>)">
								<option value="all">All</option>
								<option value="cart_total_amount">Cart Total Amount</option>
								<option value="cart_no_product">Number of Product on Cart</option>
								<option value="selected_product">Selected Product</option>
							</select>
						</td>
					</tr>
					<tr id="cart_total_amount<?php echo $_POST['number'];?>" class="cndtn_mode_extra<?php echo $_POST['number'];?>" style="display: none;">
						<th scope="row"><label><?php _e( 'Cart Amount'); ?></labe></td>
						<td>
							<label>Minimum</label>
							<input type="number" class="small-text" id="cart_total_amount_min_extra" value=""/>

							<label>Maximum</label>
							<input type="number" class="small-text" id="cart_total_amount_max_extra" value=""/>
						</td>
					</tr>
					<tr id="cart_no_product<?php echo $_POST['number'];?>" class="cndtn_mode_extra<?php echo $_POST['number'];?>" style="display: none;">
						<th scope="row"><label><?php _e( 'No. Of Product on Cart'); ?></labe></td>
						<td>
							<label>Minimum</label>
							<input type="number" class="small-text" id="cart_no_product_min_extra" value=""/>

							<label>Maximum</label>
							<input type="number" class="small-text" id="cart_no_product_max_extra" value=""/>
						</td>
					</tr>
					<tr id="selected_product<?php echo $_POST['number'];?>" class="cndtn_mode_extra<?php echo $_POST['number'];?>" style="display: none;">
						<th scope="row"><label><?php _e( 'Selected Product'); ?><label></th>
						<td>
							<select id="selected_product_id_extra">
								<option value="selected_product">Selected Product</option>
								<?php
									$args = array(
										'post_type' => 'product',
										'posts_per_page' => -1
										);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) {
										while ( $loop->have_posts() ) : $loop->the_post();?>
											<option value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
											<?php
										endwhile;
									} else {
										echo '<option>No products found</option>';
									}
									wp_reset_postdata();
								?>
							</select>
						</td>
					</tr>
					<tr>
							<th scope="row"><label><?php _e( 'Required Field'); ?></labe></td>
							<td>
								<select name="ext_cst_is_required" id="ext_cst_is_required">
									<option value="no" <?php if($ext_cst_is_required=='no'){ echo 'selected';} ?>>No</option>
									<option value="yes" <?php if($ext_cst_is_required=='yes'){ echo 'selected';} ?>>Yes</option>
								</select>
							</td>

					</tr>
					<tr>
						<th scope="row"><label><?php _e( 'Hide Option At Checkout'); ?></label></th>
						<td>
							<select name="ext_cst_hide_option" id="ext_cst_hide_option">
								<option value="no">No</option>
								<option value="yes">Yes</option>
							</select>
						</td>
					</tr>
				</tbody>
            </table>
    	</div>
		<?php
		die;
	}
}new WPS_EXT_CST_Admin();

?>