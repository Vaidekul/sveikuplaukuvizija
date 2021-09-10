<?php 

// Register Custom Post Type
function cpt_cta() {
    
  $labels = array(
    'name'                  => _x( 'CTAs', 'Post Type General Name', 'tribe' ),
    'singular_name'         => _x( 'CTA', 'Post Type Singular Name', 'tribe' ),
    'menu_name'             => __( 'CTAs', 'tribe' ),
    'name_admin_bar'        => __( 'CTA', 'tribe' ),
    'archives'              => __( 'CTA Archives', 'tribe' ),
    'attributes'            => __( 'CTA Attributes', 'tribe' ),
    'parent_item_colon'     => __( 'Parent CTA:', 'tribe' ),
    'all_items'             => __( 'All CTAs', 'tribe' ),
    'add_new_item'          => __( 'Add New CTA', 'tribe' ),
    'add_new'               => __( 'Add New', 'tribe' ),
    'new_item'              => __( 'New CTA', 'tribe' ),
    'edit_item'             => __( 'Edit CTA', 'tribe' ),
    'update_item'           => __( 'Update CTA', 'tribe' ),
    'view_item'             => __( 'View CTA', 'tribe' ),
    'view_items'            => __( 'View CTAs', 'tribe' ),
    'search_items'          => __( 'Search CTA', 'tribe' ),
    'not_found'             => __( 'Not found', 'tribe' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'tribe' ),
    'featured_image'        => __( 'Featured Image', 'tribe' ),
    'set_featured_image'    => __( 'Set featured image', 'tribe' ),
    'remove_featured_image' => __( 'Remove featured image', 'tribe' ),
    'use_featured_image'    => __( 'Use as featured image', 'tribe' ),
    'insert_into_item'      => __( 'Insert into item', 'tribe' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'tribe' ),
    'items_list'            => __( 'CTAs list', 'tribe' ),
    'items_list_navigation' => __( 'CTAs list navigation', 'tribe' ),
    'filter_items_list'     => __( 'Filter items list', 'tribe' ),
  );
  $args = array(
    'label'                 => __( 'CTA', 'tribe' ),
    'description'           => __( 'Post Type Description', 'tribe' ),
    'labels'                => $labels,
    'supports'              => array( 'title'),
    'hierarchical'          => false,
    'public'                => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-editor-contract',
    'show_in_admin_bar'     => false,
    'show_in_nav_menus'     => false,
    'can_export'            => true,
    'has_archive'           => true,		
    'exclude_from_search'   => false,
    'publicly_queryable'    => false,
    'capability_type'       => 'page',
    'show_in_rest'          => false,
  );
  register_post_type( 'cta', $args );
}
add_action( 'init', 'cpt_cta', 0 );