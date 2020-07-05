<?php
/*
 * Register custom taxonomies.
 */

// People taxonomy
function bj_people_taxonomy() {

	$labels = array(
		'name'                           => 'People',
		'singular_name'                  => 'Person',
		'search_items'                   => 'Search Person',
		'all_items'                      => 'All People',
		'edit_item'                      => 'Edit Person',
		'update_item'                    => 'Update Person',
		'add_new_item'                   => 'Add New Person',
		'new_item_name'                  => 'New Person Name',
		'menu_name'                      => 'People',
		'view_item'                      => 'View Person',
		'popular_items'                  => 'Popular Person',
		'separate_items_with_commas'     => 'Separate People with commas',
		'add_or_remove_items'            => 'Add or remove People',
		'choose_from_most_used'          => 'Choose from the most used People',
		'not_found'                      => 'No people found'
	);

  $args = array(
    'hierarchical'                   => false,
    'show_ui'                        => true,
    'show_admin_column'              => true,
    'query_var'                      => true,
    'public'                         => true,
    'show_in_nav_menus'              => true,
    'query_var'                      => true,
    'show_in_menu'                   => false,
    'show_in_rest'                   => true,
    'rewrite'                        => array( 'slug' => 'people' ),
    'labels'                         => $labels
  );
  
  register_taxonomy( 'people', array( 'entry' ), $args );
  
}

add_action( 'init', 'bj_people_taxonomy' );

