<?php


    // wp_enqueue_script( 'dahz-framework-captcha', 'https://www.google.com/recaptcha/api.js', array( 'jquery' ), '1.0.0', true );

    // Generate contact content
    $contact_content = do_shortcode( '[contact-form-7 id="' . $id . '" title="Contact form 1"]' );

    // Fullwidth button style
    $button_is_fullwidth = $button_is_fullwidth ? 'is-fullwidth' : '';

    // Get css animation classes
    $animation_classes = $css_animation !== 'none' ? Dahz_Framework_Shortcode_Template::dahz_framework_getCSSAnimation($css_animation) : '';

?>

<div class="de-sc-contact-form de-sc-contact-form--<?php esc_attr_e( $style ) ?> de-sc-contact-form--focus-style-<?php esc_attr_e( $focus_style ) ?> de-sc-contact-form--button-<?php esc_attr_e( $button_style ) ?> de-sc-contact-form--button-<?php esc_attr_e( $button_is_fullwidth ) ?> de-sc-contact-form--button-align-<?php esc_attr_e( $button_alignment ) ?> <?php esc_attr_e( $animation_classes ) ?>  ">
    <?php
        echo( $contact_content );
    ?>
</div>
