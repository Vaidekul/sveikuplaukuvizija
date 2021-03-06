<?php
// File Security Check
if (!defined('ABSPATH')) { exit; }
/**
 * DahzExtender_Widget_Social_Icon
 * Add Dahz Widget Social Icon
 * 
 * @package Dahz Extender - Widget
 * @since 1.0
 * @author Dahz | Rama
 * @return void
 */
class DahzExtender_Widget_Social_Icon extends WP_Widget {

	function __construct() {

        /* Widget settings. */
        $widget_ops = array(
            'classname'   => 'social-widget',
            'description' => esc_html__( 'Add Social widget to your sidebar or frontpage.', 'df_textdomain' )
        );

        /* Widget control settings. */
        $control_ops = array(
            'width'   => 250,
            'height'  => 350,
            'id_base' => 'social-widget'
        );

        /* Create the widget. */
        WP_Widget::__construct(
            'social-widget',
            esc_html__( 'Dahz Extender - Social Widget', 'df_textdomain' ),
            $widget_ops,
            $control_ops
        );

    } // End Constructor

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array( 'title' => esc_html__( 'Social Media', 'df_textdomain' ) );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title:', 'df_textdomain' ); ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" />
        </p>
        <?php
    } // End form()

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;

    }

	function widget( $args, $instance ) {

        extract( $args, EXTR_SKIP );

        /* Our variables from the widget settings. */
        $title 	= isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) : esc_html__( 'Sosial Media', 'df_textdomain' );

        /* Before widget (defined by themes). */
        print $before_widget;

        /* Display the widget title if one was input (before and after defined by themes). */
        if ( $title )
            print $before_title . esc_attr( $title ) . $after_title;

        $html = print ( do_shortcode( '[social_account]' ) );

        /* After widget (defined by themes). */
        print $after_widget;

    } // End widget()

}
