<?php

$scroll_id = str_replace( '<br />', '', $scroll_to_id );
$scroll_id = preg_split( '/\r\n|[\r\n]/', $scroll_id );

$scroll_title = str_replace( '<br />', '', $scroll_to_title );
$scroll_title = preg_split( '/\r\n|[\r\n]/', $scroll_title );

$scroll_id_count = count( $scroll_id );

$scroll_hide_bullets = $scroll_hide_bullets ? $scroll_hide_bullets : 'false';

?>
<ul class="<?php esc_attr_e( sprintf( 'de-sc-scroll-to %s uk-dotnav uk-dotnav-vertical', $extra_class ) ); ?>" data-bullets="<?php esc_attr_e( $scroll_hide_bullets ); ?>" data-uk-scrollspy-nav="cls:uk-active;closest: li; scroll: true; overflow: false">
	<?php for ( $i=0; $i < $scroll_id_count; $i++ ):?>
		<li>
			<a href="<?php echo esc_url( $scroll_id[$i] ); ?>">
				<?php if( isset( $scroll_title[$i] ) ):?>
					<span><?php esc_html_e( $scroll_title[$i] ); ?></span>
				<?php endif;?>
			</a>
		</li>
	<?php endfor;?>
</ul>