<?php
// Register Custom Post Type
function function_spv_paslauga() {

	$labels = array(
		'name'                  => _x( 'Paslaugos', 'Post Type General Name', 'spv' ),
		'singular_name'         => _x( 'Paslauga', 'Post Type Singular Name', 'spv' ),
		'menu_name'             => __( 'Paslaugos', 'spv' ),
		'name_admin_bar'        => __( 'Paslaugos', 'spv' ),
		'archives'              => __( 'Paslaugos Archives', 'spv' ),
		'attributes'            => __( 'Paslauga Attributes', 'spv' ),
		'parent_item_colon'     => __( 'Parent Paslauga:', 'spv' ),
		'all_items'             => __( 'Paslaugos', 'spv' ),
		'add_new_item'          => __( 'Prideti Paslauga', 'spv' ),
		'add_new'               => __( 'Add New', 'spv' ),
		'new_item'              => __( 'New Paslauga', 'spv' ),
		'edit_item'             => __( 'Edit Paslauga', 'spv' ),
		'update_item'           => __( 'Update Paslauga', 'spv' ),
		'view_item'             => __( 'View Paslauga', 'spv' ),
		'view_items'            => __( 'View Komandos', 'spv' ),
		'search_items'          => __( 'Search Paslauga', 'spv' ),
		'not_found'             => __( 'Not found', 'spv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'spv' ),
		'featured_image'        => __( 'Featured Image', 'spv' ),
		'set_featured_image'    => __( 'Set featured image', 'spv' ),
		'remove_featured_image' => __( 'Remove featured image', 'spv' ),
		'use_featured_image'    => __( 'Use as featured image', 'spv' ),
		'insert_into_item'      => __( 'Insert into item', 'spv' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'spv' ),
		'items_list'            => __( 'Paslaugos list', 'spv' ),
		'items_list_navigation' => __( 'Pasluagos list navigation', 'spv' ),
		'filter_items_list'     => __( 'Filter items list', 'spv' ),
	);
	$args = array(
		'label'                 => __( 'Paslauga', 'spv' ),
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
	register_post_type( 'paslauga', $args );

}
add_action( 'init', 'function_spv_paslauga', 0 );
