<?php
/*
	style
alignment
border_color
background_color
enable_gradient
text_color
overlay_color
member_picture
member_name
member_job_position
member_about
facebook_link
twitter_link
snapchat_link
pinteres_link
linkedin_link
google_plus_link
youtube_link
instagram_link
dribble_link
tumblr_link
email_address
*/

# ANCHOR ATTRIBUTE

$anchor_attr = array();

$link_array = '';
    # SET ANCHOR ATTRIBUTE IF FILLED

    if( !empty( $member_link ) ) {

        $anchor_attr['href'][] = vc_build_link( $member_link )['url'];
        $anchor_attr['title'][] = vc_build_link( $member_link )['title'];
        $anchor_attr['target'][] = vc_build_link( $member_link )['target'];
        $anchor_attr['rel'][] = vc_build_link( $member_link )['rel'];

    }



# STYLING

    # STYLE 1

    if ( $team_member_style === 'simple' ) {

        # NAME
		//$anchor_attr['style'] = !empty( $custom_color_style_1_name_color ) ? 'color:' . esc_attr( $custom_color_style_1_name_color ) . ';' : '' ;
        		
        $custom_color_style_1_name_color = !empty( $custom_color_style_1_name_color ) ? 'style="color:' . esc_attr( $custom_color_style_1_name_color ) . '"' : '' ;
		
		# ROLE

        $custom_color_style_1_role_bio_color = !empty( $custom_color_style_1_role_bio_color ) ? 'style="color:' . esc_attr( $custom_color_style_1_role_bio_color ) . '"' : '';

        # SOCIAL

        $custom_color_style_1_social_color = !empty( $custom_color_style_1_social_color ) ? 'style="color:' . esc_attr( $custom_color_style_1_social_color ) . '"' : '';
    }

// If value empty
$text_color         = !empty( $text_color ) ? $text_color : '' ;
$enable_gradient    = !empty( $enable_gradient ) ? $enable_gradient : '' ;
$border_color       = !empty( $border_color ) ? $border_color : '' ;
$background_color   = !empty( $background_color ) ? $background_color : '' ;
$overlay_color      = !empty( $overlay_color ) ? $overlay_color : '' ;
$overlay_color_2    = !empty( $overlay_color_2 ) ? $overlay_color_2 : '' ;

if ( $team_member_style !== 'simple' ) {

    $text_alignment = '';

}
$gradient_direction = !empty( $gradient_direction ) ? $gradient_direction : '0deg';
$color_strength     = !empty( $color_strength ) ? $color_strength : '';

// Create image element
$image_element   = wp_get_attachment_image( $member_picture, 'single-post-thumbnail' );

// Generate gradient class if enabled
$enable_gradient = $enable_gradient ? 'with-gradient' : '';

// Create icon array
$social_elements = sprintf(
    '
    %s
    %s
    %s
    %s
    %s
    %s
    %s
    %s
    %s
    %s
    %s
    ',
    $social_facebook = !empty( $social_facebook ) ? '<a href="' . esc_url( $social_facebook ) . '" class="uk-icon-link" aria-label="Facebook" data-uk-icon="facebook"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_twitter = !empty( $social_twitter ) ? '<a href="' . esc_url( $social_twitter ) . '" class="uk-icon-link" aria-label="Twitter" data-uk-icon="twitter"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_google_plus = !empty( $social_google_plus ) ? '<a href="' . esc_url( $social_google_plus ) . '" class="uk-icon-link" aria-label="Google Plus" data-uk-icon="google-plus"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_pinterest = !empty( $social_pinterest ) ? '<a href="' . esc_url( $social_pinterest ) . '" class="uk-icon-link" aria-label="Pinterest" data-uk-icon="pinterest"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_linkedin = !empty( $social_linkedin ) ? '<a href="' . esc_url( $social_linkedin ) . '" class="uk-icon-link" aria-label="Linkedin" data-uk-icon="linkedin"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_instagram = !empty( $social_instagram ) ? '<a href="' . esc_url( $social_instagram ) . '" class="uk-icon-link" aria-label="Instagram" data-uk-icon="instagram"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_youtube = !empty( $social_youtube ) ? '<a href="' . esc_url( $social_youtube ) . '" class="uk-icon-link" aria-label="Youtube" data-uk-icon="youtube"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_snapchat = !empty( $social_snapchat ) ? '<a href="' . esc_url( $social_snapchat ) . '" class="uk-icon-link" aria-label="Snapchat" data-uk-icon="snapchat"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_dribble = !empty( $social_dribble ) ? '<a href="' . esc_url( $social_dribble ) . '" class="uk-icon-link" aria-label="Dribble" data-uk-icon="dribbble"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_tumblr = !empty( $social_tumblr ) ? '<a href="' . esc_url( $social_tumblr ) . '" class="uk-icon-link" aria-label="Tumblr" data-uk-icon="tumblr"' . $custom_color_style_1_social_color .  '></a>' : '',
    $social_email_address = !empty( $social_email_address ) ? '<a href="mailto:' . $social_email_address . '" class="uk-icon-link" aria-label="Mail" data-uk-icon="mail"' . $custom_color_style_1_social_color .  '></a>' : ''

);
?>


<div class="de-sc-team-member de-sc-team-member--<?php echo( $team_member_style ) ?> <?php echo( $js_selector = $team_member_style === 'hover_slide_in_text' ? 'ds-sc-team-member--' . $team_member_style : '') ?>">
    <div class="de-sc-team-member__image">
        <?php echo( $image_element ) ?>
        <?php if ( $team_member_style == 'hover_slide_in_text' ): ?>
            <div class="de-sc-team-member__image__content__overlay"></div>
            <div class="de-sc-team-member__image__content uk-margin uk-margin-remove-bottom">
                <<?php echo $name_tag ?> class="uk-margin-small-bottom uk-padding-remove de-sc-team-member__image__content--name">
                    <?php
                        if ( $member_link ) {
                            ?>

                            <a <?php dahz_shortcode_set_attributes( $anchor_attr, 'dahz_team_member_anchor' ); ?>>

                                <?php echo esc_html( $member_name, 'sobari_sc' ); ?>


                            </a>


                            <?php
                        } else {
                            esc_html_e( $member_name, 'sobari_sc' );

                        }

                    ?>
                </<?php echo $name_tag ?>>
                <p class="de-sc-team-member__content__description__job-position uk-margin-remove-top">
                    <?php esc_html_e( $member_role, 'sobari_sc' ) ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <div class="de-sc-team-member__content <?php echo __( $text_alignment ) ?>">
        <div class="de-sc-team-member__content__description uk-margin uk-margin-remove-bottom">
            <?php if ( $team_member_style !== 'hover_slide_in_text' ): ?>
                <<?php echo $name_tag ?> class="uk-margin-small-bottom uk-padding-remove de-sc-team-member__image__content--name" <?php echo $custom_color_style_1_name_color ?>>
                    <?php
                        if ( $member_link ) {
                            ?>

                            <a <?php dahz_shortcode_set_attributes( $anchor_attr, 'dahz_team_member_anchor' ); ?>>

                                <?php echo esc_html( $member_name, 'sobari_sc' ); ?>


                            </a>


                            <?php
                        } else {
                            esc_html_e( $member_name, 'sobari_sc' );

                        }
                     ?>
                </<?php echo $name_tag ?>>
                <p class="de-sc-team-member__content__description__job-position uk-margin-remove-top" <?php echo $custom_color_style_1_role_bio_color ?>>
                    <?php esc_html_e( $member_role, 'sobari_sc' ) ?>
                </p>
            <?php endif; ?>
            <p class="de-sc-team-member__content__description__about" <?php echo $custom_color_style_1_role_bio_color ?>>
                <?php esc_html_e( $about_member, 'sobari_sc' ) ?>
            </p>
            <span class="de-sc-team-member__content__socials">
                <?php echo( $social_elements ) ?>
            </span>
        </div>
    </div>
</div>
