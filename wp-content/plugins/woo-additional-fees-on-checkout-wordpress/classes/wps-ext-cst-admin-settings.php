<?php
class WPS_EXT_CST_Admin_Settings
{
	public static function register_admin_settings(){
		add_settings_section("wps-ext-cst-option-section", "Additionnal Fees Settings", null, "wps-ext-cst-options");

		register_setting("wps-ext-cst-option-section", "ext_cst_status");
		register_setting("wps-ext-cst-option-section", "ext_cst_label");
		register_setting("wps-ext-cst-option-section", "ext_cst_label_billing");
		register_setting("wps-ext-cst-option-section", "ext_cst_amount_type");
		register_setting("wps-ext-cst-option-section", "ext_cst_amount");
		register_setting("wps-ext-cst-option-section", "ext_cst_label_css");
		register_setting("wps-ext-cst-option-section", "ext_cst_auto_checked");
	}
	public static function admin_settings(){
		?>
			<div class="wps-afoc-mainwraper">
				<div class="wps-afoc-main-wrap">
					<form method="post" action="options.php">
						<?php
						settings_fields("wps-ext-cst-option-section");
			            do_settings_sections("wps-ext-cst-options");
			            $ext_cst_status 	 = (get_option('ext_cst_status')) ? get_option('ext_cst_status') : 'enable';
			            $ext_cst_label 	 	 = (get_option('ext_cst_label')) ? get_option('ext_cst_label') : 'Unlabelled Fees by WPSuperiors.com';
			            $ext_cst_label_billing 	 	 = (get_option('ext_cst_label_billing')) ? get_option('ext_cst_label_billing') : 'Unlabelled Fees by WPSuperiors.com';
			            $ext_cst_amount_type = (get_option('ext_cst_amount_type')) ? get_option('ext_cst_amount_type') : 'fixed';
			            $ext_cst_amount 	 = (get_option('ext_cst_amount')) ? get_option('ext_cst_amount') : 1;
			            $ext_cst_label_css   = (get_option('ext_cst_label_css')) ? get_option('ext_cst_label_css') : '';
			            $ext_cst_auto_checked   = (get_option('ext_cst_auto_checked')) ? get_option('ext_cst_auto_checked') : 'disable';

			            ?>
			            <p>Before start, let's take a look at <a href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/" target="_blank"> The Documentation Page.</a></p>
			            <?php settings_errors(); ?>
			            <table class="form-table" style="width: 60%;margin-left: auto;margin-right: auto;">
			            	<tbody>
								<tr>
									<th scope="row"><label><?php _e( 'Status'); ?><label></th>
									<td>
										<select name="ext_cst_status" id="ext_cst_status">
											<option value="enable" <?php if($ext_cst_status=='enable'){echo 'selected';} ?>>Enable</option>
											<option value="disable" <?php if($ext_cst_status=='disable'){echo 'selected';} ?>>Disable</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Label'); ?></label></th>
									<td>
										<input type="text" class="regular-text code" id="ext_cst_label" value="<?php echo $ext_cst_label; ?>" />
										<p class="error">Remove our branding with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Label for Billing'); ?></label></th>
									<td>
										<input type="text" class="regular-text code" id="ext_cst_label_billing" value="<?php echo $ext_cst_label_billing; ?>"/>
										<p class="error">Remove our branding with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Type'); ?></label></th>
									<td>
										<select name="ext_cst_amount_type" id="ext_cst_amount_type" onchange="showHideTaxShipping(this,1)">
											<option value="fixed" <?php if($ext_cst_amount_type=='fixed'){echo 'selected';} ?>>Fixed</option>
											<option value="percent" <?php if($ext_cst_amount_type=='percent'){echo 'selected';} ?>>Percentage</option>
										</select>
									</td>
								</tr>
								<tr id="incTax-1" class="incTax">
									<th scope="row"><label><?php _e( 'Calculate fees including TAX'); ?></label></th>
									<td>
										<select name="ext_cst_inc_tax" id="ext_cst_inc_tax">
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr id="incShipCosts-1" class="incShipCosts">
									<th scope="row"><label><?php _e( 'Calculate fees including Shipping Costs'); ?></label></th>
									<td>
										<select name="ext_cst_inc_ship_costs" id="ext_cst_inc_ship_costs">
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Amount'); ?></label></th>
									<td>
										<input type="number" step="any" name="ext_cst_amount" class="regular-text code" id="ext_cst_amount" value="<?php echo $ext_cst_amount; ?>"/>
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
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Auto-checked / Auto-applied the fees'); ?></label></th>
									<td>
										<select name="ext_cst_auto_checked" id="ext_cst_auto_checked">
											<option value="enable" <?php if($ext_cst_auto_checked=='enable'){echo 'selected';} ?>>Enable</option>
											<option value="disable" <?php if($ext_cst_auto_checked=='disable'){echo 'selected';} ?>>Disable</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Condition'); ?></label></th>
									<td>
										<select name="ext_cst_apply_cndtn" id="ext_cst_apply_cndtn" onchange="show_hide_cndtn()">
											<option value="all" selected>All</option>
											<option value="cart_total_amount">Cart Total Amount</option>
											<option value="cart_no_product">Number of Product on Cart</option>
											<option value="selected_product">Selected Product</option>
										</select>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr id="cart_total_amount" class="cndtn_mode">
									<th scope="row"><label><?php _e( 'Cart Amount'); ?></label></th>
									<td>
										<label>Minimum</label>
										<input type="number" name="cart_total_amount_min" class="small-text" id="cart_total_amount_min" value="10"/>

										<label>Maximum</label>
										<input type="number" name="cart_total_amount_max" class="small-text" id="cart_total_amount_max" value="100"/>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr id="cart_no_product" class="cndtn_mode">
									<th scope="row"><label><?php _e( 'No. Of Product on Cart'); ?></label></th>
									<td>
										<label>Minimum</label>
										<input type="number" name="cart_no_product_min" class="small-text" id="cart_no_product_min" value="2"/>

										<label>Maximum</label>
										<input type="number" name="cart_no_product_max" class="small-text" id="cart_no_product_max" value="5"/>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr id="selected_product" class="cndtn_mode">
									<th scope="row"><label><?php _e( 'Selected Product'); ?></label></th>
									<td>
										<select name="selected_product_id" id="selected_product_id">
											<option value="selected_product" selected>Selected Product</option>
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
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Required Field'); ?></label></th>
									<td>
										<select name="ext_cst_is_required" id="ext_cst_is_required">
											<option value="no">No</option>
											<option value="yes">Yes</option>
										</select>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Hide Option At Checkout'); ?></label></th>
									<td>
										<select name="ext_cst_hide_option" id="ext_cst_hide_option">
											<option value="no">No</option>
											<option value="yes">Yes</option>
										</select>
										<p class="error">Available with <a target="_blank;" href="https://www.wpsuperiors.com/woo-additional-fees-on-checkout/">premium version</a>.</p>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Custom CSS'); ?></label></th>
									<td>
										<textarea class="large-text code" name="ext_cst_label_css" id="ext_cst_label_css" placeholder=""></textarea>
										
									</td>
								</tr>
							</tbody>
			            </table>
			            <div id="wps_custom_fees_add_more">
			            	<input type="hidden" id="current_number_fees" value="1" />
			            </div>
			            <div class="wafoc-bottom-line" style="width: 100%; height: 50px;">
			            	<div class="wafoc-bottom-line-button" style="float: left;">
			            		<?php 
									submit_button();
								?>
			            	</div>
			            	<div class="wafoc-bottom-line-add-new" style="float: right; margin-top: 30px; margin-right: 20px;">
			            		<a href="javascript:void(0);" class="button button-secondary" style="font-family: raleway;">Add More New Fees</a>
			            	</div>
			            </div>	
					</form>
				</div>

			</div>
			<p style="margin-top:30px; font-size:12px; text-align: center; width: 100%;">Confused? Need our help? Feel free to write on us at <a style="text-decoration:none;" href="mailto:support@wpsuperiors.com">support@wpsuperiors.com</a> OR submit your query through <a style="text-decoration:none;" href="http://www.wpsuperiors.com/contact-us/" target="_blank">Contact Us</a></p>
		    <p style="text-align: center; width: 100%;">Like this plugin? Leave a
	  			<span style="font-size:200%;color:yellow;">&starf;</span>
	  			<span style="font-size:200%;color:yellow;">&starf;</span>
	  			<span style="font-size:200%;color:yellow;">&starf;</span>
	  			<span style="font-size:200%;color:yellow;">&starf;</span>
	  			<span style="font-size:200%;color:yellow;">&starf;</span> rating at <a style=" font-style: italic; text-decoration: none;" href="https://wordpress.org/support/plugin/woo-additional-fees-on-checkout-wordpress/reviews/#new-post" target="_blank;">WordPress</a>
	  		</p>
	  		<div class="wps-buy-notice"> 
				<p><span>Are you looking for WooCommerce Checkout Additional Fess based on <strong style="letter-spacing: 1px;"> PaymentGateway,Shipping,ProductType(Simple,Variable,Subscription),Category</strong> ? </span><a class="gradient-button gradient-button-4" href="https://www.wpsuperiors.com/extra-amount-on-checkout-premium/" target="_click;">Click Here</a></p>
			</div>
			
	  		

		<?php
	}

}new WPS_EXT_CST_Admin_Settings();

?>