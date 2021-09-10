<?php
    $video_source     = '';

    $show_controls         = !empty( $show_controls ) ? 1 : 0;
    $enable_autoplay       = !empty( $enable_autoplay ) ? 1 : 0;
    $loop_video            = !empty( $loop_video ) ? 1 : 0;
    $mute_video            = !empty( $mute_video ) ? $mute_video : 'false';
    $mobile_play_inline    = !empty( $mobile_play_inline ) ? 1 : 0;
    $cover_video           = !empty( $cover_video ) ? 'uk-cover' : '';
    $enable_extra_shadow   = !empty( $enable_extra_shadow ) ? ' uk-box-shadow-bottom' : '';
    $video_image_fallback  = !empty( $video_image_fallback ) ? wp_get_attachment_url( $video_image_fallback ) : '';
    $container_box_shadow  = $cover_video === 'uk-cover' ? $video_box_shadow  : '';
    $iframe_box_shadow     = $cover_video !== 'uk-cover' ? $video_box_shadow  : '';

    if ( strpos( $video_link, 'vimeo' ) !== false ) {
        $regex = '~
    		# Match Vimeo link and embed code
    		(?:<iframe [^>]*src=")?         # If iframe match up to first quote of src
    		(?:                             # Group vimeo url
    				https?:\/\/             # Either http or https
    				(?:[\w]+\.)*            # Optional subdomains
    				vimeo\.com              # Match vimeo.com
    				(?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
    				\/                      # Slash before Id
    				([0-9]+)                # $1: VIDEO_ID is numeric
    				[^\s]*                  # Not a space
    		)                               # End group
    		"?                              # Match end quote if part of src
    		(?:[^>]*></iframe>)?            # Match the end of the iframe
    		(?:<p>.*</p>)?                  # Match any title information stuff
    		~ix';

    	preg_match( $regex, $video_link, $matches );

    	$id = $matches[1];

        $width = '';
        $height = '';
        $autoplay_attr = '';
        $width     = $cover_video !== 'uk-cover' ? 'width="' . esc_attr( $video_width ) . '"' : '';
        $height     = $cover_video !== 'uk-cover' ? 'height="' . esc_attr( $video_height ) . '"' : '';

        if( empty( $enable_autoplay ) )
            $autoplay_attr = 'false';

        $embed_code = '<iframe class="' . esc_attr( $video_box_shadow ) . esc_attr( $enable_extra_shadow ) . '" src="//player.vimeo.com/video/' . esc_attr( $id ) . '?controls=' . esc_attr( $show_controls ) . '&amp;autoplay=' . esc_attr( $enable_autoplay ) . '&amp;loop=' . esc_attr( $loop_video ) . '&amp;background='
        . esc_attr( $mobile_play_inline ) . $width . $height . '" allowfullscreen uk-video="automute:' . esc_attr( $mute_video ) . ';autoplay: ' . esc_attr( $autoplay_attr ) .  ' " ' . $cover_video . ' uk-responsive></iframe>';

    } else if ( strpos( $video_link, 'youtu' ) !== false ) {

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_link, $match);
        $id = $match[1];
        $width = '';
        $height = '';
        $autoplay_attr = '';
        $width     = $cover_video !== 'uk-cover' ? 'width="' . esc_attr( $video_width ) . '"' : '';
        $height     = $cover_video !== 'uk-cover' ? 'height="' . esc_attr( $video_height ) . '"' : '';
        if( empty( $enable_autoplay ) )
            $autoplay_attr = 'false';

        $embed_code = '<iframe class="' . esc_attr( $iframe_box_shadow ) . '" src="//www.youtube.com/embed/' . esc_attr( $id ) . '?controls=' . esc_attr( $show_controls ) . '&amp;autoplay=' . esc_attr( $enable_autoplay ) . '&amp;loop=' . esc_attr( $loop_video ) . '&amp;playsinline='
        . esc_attr( $mobile_play_inline ) . '" ' . $width . $height . ' allowfullscreen uk-video="automute:' . esc_attr( $mute_video ) . ';autoplay:' . esc_attr( $autoplay_attr ) . '" ' . $cover_video . '></iframe>';

    } else {

        $show_controls         = !empty( $show_controls ) ? ' controls' : '';
        $enable_autoplay       = !empty( $enable_autoplay ) ? ' autoplay' : '';
        $loop_video            = !empty( $loop_video ) ? ' loop' : '';
        $mute_video            = !empty( $mute_video ) ? $mute_video : 'false';
        $mobile_play_inline    = !empty( $mobile_play_inline ) ? ' playsinline' : '';

        $width     = $cover_video !== 'uk-cover' ? 'width="' . esc_attr( $video_width ) . '"' : '';
        $height     = $cover_video !== 'uk-cover' ? 'height="' . esc_attr( $video_height ) . '"' : '';

        $embed_code = '<video class="' . esc_attr( $video_box_shadow ) . '" ' . esc_attr( $show_controls ) . esc_attr( $enable_autoplay ) . esc_attr( $loop_video ) .  esc_attr( $mobile_play_inline ) .' uk-video="automute: true" ' . esc_attr( $cover_video ) .  ' poster="'
        . esc_url( $video_image_fallback ) . $width . $height . '" data-uk-cover><source src="' . esc_url( $video_link ) . '" type="video/mp4"><source src="' . esc_url( $video_link ) . '" type="video/ogg"></video>';


    }


    ?>
    <div class="uk-position-relative de-sc-video uk-flex uk-flex-center">
        <?php if ( $enable_extra_shadow === ' uk-box-shadow-bottom' ): ?>
            <div class="uk-box-shadow-bottom">
        <?php endif; ?>
        <?php if ( $cover_video === 'uk-cover' ): ?>
        <div class="uk-cover-container <?php echo esc_attr( $container_box_shadow ) ?>">
            <canvas width="<?php echo esc_attr( $video_width ) ?>" height="<?php echo esc_attr( $video_height ) ?>"></canvas>
        <?php endif; ?>
        <?php if ( $cover_video !== 'uk-cover' ): ?>
        <div class="uk-cover-container">
        <?php endif; ?>
            <?php if ( !empty( $video_image_fallback ) ): ?>
            <img onclick="this.style.display='none'" src="<?php echo esc_url( $video_image_fallback ) ?>" data-uk-cover alt="">
            <?php endif; ?>
            <?php echo $embed_code ?>
            <?php if ( $cover_video === 'uk-cover' ): ?>
        <?php if ( $cover_video === 'uk-cover' ): ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        </div>
        <?php if ( $enable_extra_shadow === ' uk-box-shadow-bottom' ): ?>
            </div>
        <?php endif; ?>
    </div>
