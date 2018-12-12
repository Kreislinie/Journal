<?php
function journal_person_cpt() {

	$labels = array(
		'name' => __( 'People', 'Post Type General Name', 'journal' ),
		'singular_name' => __( 'Person', 'Post Type Singular Name', 'journal' ),
		'menu_name' => __( 'People', 'journal' ),
		'name_admin_bar' => __( 'Person', 'journal' ),
		'archives' => __( 'People', 'journal' ),
		'attributes' => __( 'People Attributes', 'journal' ),
		'parent_item_colon' => __( 'Parent Person:', 'journal' ),
		'all_items' => __( 'All People', 'journal' ),
		'add_new_item' => __( 'Add New Person', 'journal' ),
		'add_new' => __( 'Add New', 'journal' ),
		'new_item' => __( 'New Person', 'journal' ),
		'edit_item' => __( 'Edit Person', 'journal' ),
		'update_item' => __( 'Update Person', 'journal' ),
		'view_item' => __( 'View Person', 'journal' ),
		'view_items' => __( 'View People', 'journal' ),
		'search_items' => __( 'Search Person', 'journal' ),
		'not_found' => __( 'Not found', 'journal' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'journal' ),
		'featured_image' => __( 'Featured Image', 'journal' ),
		'set_featured_image' => __( 'Set featured image', 'journal' ),
		'remove_featured_image' => __( 'Remove featured image', 'journal' ),
		'use_featured_image' => __( 'Use as featured image', 'journal' ),
		'insert_into_item' => __( 'Insert into Person', 'journal' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Person', 'journal' ),
		'items_list' => __( 'Persons list', 'journal' ),
		'items_list_navigation' => __( 'Persons list navigation', 'journal' ),
		'filter_items_list' => __( 'Filter Persons list', 'journal' ),
	);
	$args = array(
		'label' => __( 'Person', 'journal' ),
		'description' => __( '', 'journal' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'taxonomies' => array('Privat', 'Work'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'person', $args );

}
add_action( 'init', 'journal_person_cpt', 0 );