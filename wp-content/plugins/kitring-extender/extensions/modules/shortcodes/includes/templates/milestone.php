<?php

$milestone_symbol = $milestone_symbol_alignment === 'superscript' ? '<sup>' . $milestone_symbol . '</sup>': $milestone_symbol;
switch ( $milestone_alignment ) {
    case 'top':
        $alignment = 'uk-text-left';
        break;
    case 'middle':
        $alignment = 'uk-text-center';
        break;
    case 'bottom':
        $alignment = 'uk-text-right';
        break;
}
?>
<div class="de-sc-milestone uk-flex uk-flex-column uk-flex-<?php echo esc_attr( $milestone_alignment ) ?> <?php echo esc_attr( $alignment ) ?>">
    <div class="de-sc-milestone__count" id="<?php echo esc_attr( $dahz_id ) ?>" data-start-counter="<?php echo esc_attr( $milestone_counter ) ?>" data-symbol="<span class='de-sc-milestone__symbol'><?php echo esc_attr( $milestone_symbol ) ?></span>" data-symbol-position="<?php echo esc_attr( $milestone_symbol_position ) ?>"></div>
    <div class="de-sc-milestone__title">
        <?php echo esc_html( $milestone_title ) ?>
    </div>
    <div class="de-sc-milestone__subtitle">
        <?php echo esc_html( $milestone_subtitle ) ?>
    </div>
</div>
