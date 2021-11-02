<?php
// Register Custom Post Type
function function_spv() {

	$labels = array(
		'name'                  => _x( 'Komanda', 'Post Type General Name', 'spv' ),
		'singular_name'         => _x( 'Komanda', 'Post Type Singular Name', 'spv' ),
		'menu_name'             => __( 'Komanda', 'spv' ),
		'name_admin_bar'        => __( 'Komanda', 'spv' ),
		'archives'              => __( 'Komanda Archives', 'spv' ),
		'attributes'            => __( 'Komanda Attributes', 'spv' ),
		'parent_item_colon'     => __( 'Parent Komanda:', 'spv' ),
		'all_items'             => __( 'Komanda', 'spv' ),
		'add_new_item'          => __( 'Add New Komanda', 'spv' ),
		'add_new'               => __( 'Add New', 'spv' ),
		'new_item'              => __( 'New Komanda', 'spv' ),
		'edit_item'             => __( 'Edit Komanda', 'spv' ),
		'update_item'           => __( 'Update Komanda', 'spv' ),
		'view_item'             => __( 'View Komanda', 'spv' ),
		'view_items'            => __( 'View Komandos', 'spv' ),
		'search_items'          => __( 'Search Komanda', 'spv' ),
		'not_found'             => __( 'Not found', 'spv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'spv' ),
		'featured_image'        => __( 'Featured Image', 'spv' ),
		'set_featured_image'    => __( 'Set featured image', 'spv' ),
		'remove_featured_image' => __( 'Remove featured image', 'spv' ),
		'use_featured_image'    => __( 'Use as featured image', 'spv' ),
		'insert_into_item'      => __( 'Insert into item', 'spv' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'spv' ),
		'items_list'            => __( 'Komandos list', 'spv' ),
		'items_list_navigation' => __( 'Komandos list navigation', 'spv' ),
		'filter_items_list'     => __( 'Filter items list', 'spv' ),
	);
	$args = array(
		'label'                 => __( 'Komanda', 'spv' ),
		'description'           => __( 'Post Type Description', 'spv' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'komanda', $args );

}
add_action( 'init', 'function_spv', 0 );
