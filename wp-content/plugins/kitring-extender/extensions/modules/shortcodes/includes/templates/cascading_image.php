<?php

$atts = vc_param_group_parse_atts( $values );
?>
<div id="<?php echo $key ?>" class="de-sc-cascading-image de-sc-cascading-image--<?php echo esc_attr( $image_alignment ) ?>">


<?php
$transform_arr = array(0);

foreach ( $atts as $index => $value ) {
    if( !empty( $value['offset_x'] ) && $value['offset_x'] != 0 ) $transform_arr[] = intval($value['offset_x']);
    if( !empty( $value['offset_y'] ) && $value['offset_y'] != 0 ) $transform_arr[] = intval($value['offset_y']);

}
$transform_arr = max($transform_arr);

switch($transform_arr) {
    case $transform_arr <= 10:
        $divider = 1.15;
        break;
    case $transform_arr <= 20:
        $divider = 1.35;
        break;
    case $transform_arr <= 30:
        $divider = 1.55;
        break;
    case $transform_arr <= 40:
        $divider = 1.75;
        break;
    case $transform_arr <= 50:
        $divider = 2;
        break;
    case $transform_arr <= 60:
        $divider = 2.25;
        break;
    case $transform_arr <= 70:
        $divider = 2.45;
        break;
    case $transform_arr <= 80:
        $divider = 2.7;
        break;
    case $transform_arr <= 90:
        $divider = 2.85;
        break;
    case $transform_arr < 100:
        $divider = 3;
        break;
    default:
        $divider = 3;

}

$transform_arr = floor($transform_arr/$divider);
$count                      = 0;
foreach ( $atts as $index => $value ) {

    $image                      = !empty( $value['image'] ) ? wp_get_attachment_image( $value['image'], 'full', false, array( 'data-is-ignore-lazyload' => true,'class' => $box_shadow   ) ) : '';
    $animation                  = isset( $value['animation'] ) ? $value['animation'] : '';
    $animation_classes          = $animation !== 'none' ? $animation : '';
	$delay						= isset( $value['delay_line_animation'] ) ? $value['delay_line_animation'] : '0';
    $count++;

    $image_element = '';

    if( empty( $value['image'] ) ) {
        $image_element = sprintf(
            '<div class="de-sc-cascading-image__img-wrap">
                <img src="%1$s" alt="" />
            </div>',
            esc_url( 'https://source.unsplash.com/daily' )
        );
    } else {
        $image_element = sprintf(
            '<div class="de-sc-cascading-image__img-wrap">
                %1$s
            </div>',
            $image
        );
    }
    ?>

        <div id="<?php echo 'cscd-item-' . $key . '--' . $count ?>" class="de-sc-cascading-image__item" data-uk-scrollspy="cls:<?php echo esc_attr( $animation_classes )?>;delay:<?php echo esc_attr( $delay )?>;">
            <div class="de-sc-cascading-image__inner" style="transform: translateX(0px) translateY(0px) scale(1, 1) translateZ(0px);">
                <?php echo( $image_element ) ?>
            </div>
        </div>

    <?php

}
?>

</div>
