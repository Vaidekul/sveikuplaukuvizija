
<?php
get_header('blank');
if( have_posts() ) :
    while( have_posts() ) : the_post();
        $content = get_the_content();
        echo '<div id="lazy_content_block">' . do_shortcode( $content ) . '</div>';
    endwhile;
endif;
get_footer('blank');