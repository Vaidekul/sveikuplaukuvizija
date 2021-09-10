<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function cpt_template() {

    $singular = "Name";
    $plural = "Names";
    $template_strings = "theme_name";
    $slug = str_replace( ' ', '_', strtolower( $singular ) );
    $type = 'page';

    $labels = array(
        'name'                => __( ''. $plural.'', $template_strings ),
        'singular_name'       => __( ''.$singular.'', $template_strings ),
        'add_new'             => _x( 'Add New '.$singular.'', $template_strings),
        'add_new_item'        => __( 'Add New '.$singular.'', $template_strings ),
        'edit_item'           => __( 'Edit '.$singular.'', $template_strings ),
        'new_item'            => __( 'New '.$singular.'', $template_strings ),
        'view_item'           => __( 'View '.$singular.'', $template_strings ),
        'search_items'        => __( 'Search '. $plural.'', $template_strings ),
        'not_found'           => __( 'No '. $plural.' found', $template_strings ),
        'not_found_in_trash'  => __( 'No '. $plural.' found in Trash', $template_strings ),
        'parent_item_colon'   => __( 'Parent '.$singular.':', $template_strings ),
        'menu_name'           => __( ''. $plural.'', $template_strings ),
    );

    $args = array(
        'labels'                   => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-store',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => $type,
        'map_meta_cap'        => true,
        'capabilities'        => array(),
        'supports'            => array('title', 'editor', 'thumbnail', 'author'),
//        'taxonomies'          => array(  ),
        'show_in_rest'        => true,
        'rest_base'           => $slug
    );

    register_post_type( 'cpt_template', $args );
}

add_action( 'init', 'cpt_template' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function taxonomy_template() {

    $singular = 'Type';
    $plural = 'Types';
    $slug = str_replace( ' ', '_', strtolower( $singular ) );
    
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'search_items' => 'Search ' . $plural,
        'popular_items' => 'Popular ' . $plural,
        'all_items' => 'All ' . $plural,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Edit ' . $singular,
        'update_item' => 'Update ' . $singular,
        'add_new_item' => 'Add New ' . $singular,
        'new_item_name' => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items' => 'Add or remove ' . $plural,
        'choose_from_most_used' => 'Choose from the most used ' . $plural,
        'not_found' => 'No ' . $plural . ' found.',
        'menu_name' => $plural,
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'capabilities' => array(
          'assign_terms' => 'manage_categories'
        ),
        'rewrite'               => array( 'slug' => $slug ),
        'show_in_rest'          => true,
        'rest_base'             => $slug,
        'rest_controller_class' => 'WP_REST_Terms_Controller'
    );
    
    register_taxonomy( 'taxonomy_template', 'cpt_template', $args);

}

add_action( 'init', 'taxonomy_template');