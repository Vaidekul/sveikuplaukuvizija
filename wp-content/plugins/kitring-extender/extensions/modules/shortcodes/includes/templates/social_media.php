<?php

/*
	style
	icon_size
	icon_alignment
	icon_color
	icon_background_color
	outline_color
*/

# SHORTCOODE ARRAY
$shortcode_attr = array();

# SOCIAL MEDIA CLASS

    # PRE-DEFINED CLASS
    $shortcode_attr['class'][] = 'de-sc-social-media uk-flex';

    # STYLE
    $shortcode_attr['class'][] = 'de-sc-social-media--' . $style;

    # ALIGNMENT
    $shortcode_attr['class'][] = $icon_alignment;

    # ICON SIZE
    $shortcode_attr['class'][] = 'de-sc-social-media--' . $icon_size;

$social_account 	    = dahz_framework_get_option( 'social_account_social_media', array() );
$social_account_decode 	= is_string( $social_account ) && !is_array( json_decode( $social_account, true ) ) ? urldecode( $social_account ) : false;
$social_account_decode 	= !is_array( $social_account ) && $social_account_decode ? json_decode( $social_account_decode, true ) : array();
$social_account 		= is_array( $social_account ) ? $social_account : $social_account_decode;

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_social_media_shortcode' ); ?>>

<?php Dahz_Framework_Social_Account::dahz_framework_social_element( 'header' );?>
</div>
<?php
