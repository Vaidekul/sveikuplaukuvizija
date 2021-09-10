<?php

/**

 */
?>
<div>
	<?php

	echo do_shortcode(
        sprintf(
            '[woocommerce_my_account order_count="15"]',
            !empty( $order_count ) ? esc_attr( $order_count ) : ''
            )
        );

	?>
</div>
