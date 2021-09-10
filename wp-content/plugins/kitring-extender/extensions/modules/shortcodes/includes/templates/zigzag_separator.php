<?php
    echo do_shortcode(
        sprintf(
            '[vc_zigzag color="custom" custom_color="%1$s" align="%2$s" el_width="%3$s" el_border_width="%4$s"]',
            !empty( $zigzag_color ) ? esc_attr( $zigzag_color ) : '',
            !empty( $line_alignment ) ? esc_attr( $line_alignment ) : '',
            $zigzag_type === 'small' ? esc_attr( $custom_line_width ) : esc_attr( $zigzag_type ),
            !empty( $border_width ) ? esc_attr( $border_width ) : ''
        )
    );

?>
