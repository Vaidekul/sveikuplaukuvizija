<?php
global $post;

foreach( $query as $post ){
	$item_attr = array(
		'class' => array(
			"uk-text-{$post_alignment}",
			$box_shadow,
			$hover_box_shadow,
			'entry-wrapper'
		),
		'style' => array()
	);

	// if( !empty( $box_shadow ) || !empty( $hover_box_shadow ) ) $wrapper_attributes['style'][] = 'transform:scale(0.9);';
	if( !empty( $bg_color ) ) $item_attr['style'][] = "background:{$bg_color};";
	setup_postdata( $post );
	$item_category = get_the_category( get_the_ID() );
	?>
	<li class="de-sc-post-tabs__item <?php foreach ($item_category as $key => $value) { echo esc_attr( $value->category_nicename ) . ' '; } ?>">
		<div <?php dahz_shortcode_set_attributes( $item_attr, 'dahz_post_tabs_item' ); ?>>
			<?php if ( has_post_thumbnail() && empty( $is_disable_feature_image ) ) : ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio ) ?>">
					<?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), '', '', array( "class" => 'de-ratio-content') ); ?>
				</a>
			<?php endif; ?>
			<div <?php dahz_shortcode_set_attributes( $content_attr, 'dahz_post_tabs_content' ); ?>>
				<<?php echo $title_element_tag ?> >
				<a href="<?php echo esc_url( get_permalink() ); ?>" <?php dahz_shortcode_set_attributes( $title_attr, 'dahz_post_tabs_title' ); ?>><?php echo !empty( get_the_title() ) ? get_the_title() : get_permalink(); ?></a>
				</<?php echo $title_element_tag ?>>
				<?php
				dahz_framework_post_meta();

				if ( !$is_hide_excerpt ) :
					$excerpt_content     = wp_trim_excerpt();

					# Excerpt Length Setting
					if ( empty( $excerpt_length ))
					$excerpt_length = 20;

					if ( str_word_count( $excerpt_content, 0 ) > $excerpt_length ) {

						$words = str_word_count( $excerpt_content, 2 );
						$pos = array_keys( $words );
						$excerpt_content = substr( $excerpt_content, 0, $pos[$excerpt_length]) . '...';
					}

					?>
					<p><?php echo $excerpt_content; ?></p>
				<?php endif; ?>
			</div>
		</div>
	</li>
	<?php
}
