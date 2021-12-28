<?php
// Register Custom Post Type
function cpt_prekiuzenklai() {

	$labels = array(
		'name'                  => _x( 'Prekiu Zenklai', 'Post Type General Name', 'spv' ),
		'singular_name'         => _x( 'Prekiu Zenklas', 'Post Type Singular Name', 'spv' ),
		'menu_name'             => __( 'Prekiu Zenklai', 'spv' ),
		'name_admin_bar'        => __( 'Prekiu Zenklas', 'spv' ),
		'archives'              => __( 'Prekiu Zenklas Archives', 'spv' ),
		'attributes'            => __( 'Prekiu Zenklas Attributes', 'spv' ),
		'parent_item_colon'     => __( 'Parent Prekiu Zenklas:', 'spv' ),
		'all_items'             => __( 'All Prekiu Zenklai', 'spv' ),
		'add_new_item'          => __( 'Add New Prekiu Zenklas', 'spv' ),
		'add_new'               => __( 'Add New', 'spv' ),
		'new_item'              => __( 'New Prekiu Zenklas', 'spv' ),
		'edit_item'             => __( 'Edit Prekiu Zenklas', 'spv' ),
		'update_item'           => __( 'Update Prekiu Zenklas', 'spv' ),
		'view_item'             => __( 'View Prekiu Zenklas', 'spv' ),
		'view_items'            => __( 'View Prekiu Zenklai', 'spv' ),
		'search_items'          => __( 'Search Prekiu Zenklas', 'spv' ),
		'not_found'             => __( 'Not found', 'spv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'spv' ),
		'featured_image'        => __( 'Featured Image', 'spv' ),
		'set_featured_image'    => __( 'Set featured image', 'spv' ),
		'remove_featured_image' => __( 'Remove featured image', 'spv' ),
		'use_featured_image'    => __( 'Use as featured image', 'spv' ),
		'insert_into_item'      => __( 'Insert into item', 'spv' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'spv' ),
		'items_list'            => __( 'Prekiu Zenklai list', 'spv' ),
		'items_list_navigation' => __( 'Prekiu Zenklai list navigation', 'spv' ),
		'filter_items_list'     => __( 'Filter items list', 'spv' ),
	);
	$args = array(
		'label'                 => __( 'Prekiu Zenklas', 'spv' ),
		'description'           => __( 'Post Type Description', 'spv' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
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
		'show_in_rest'          => true,
	);
	register_post_type( 'prekiuzenklai', $args );

}
add_action( 'init', 'cpt_prekiuzenklai', 0 );
