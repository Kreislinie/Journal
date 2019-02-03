<?php
/**
 * bitjournal register custom taxonomies
 * 
 * @package bitjournal
 * 
 */

/**
 * Create and register people taxonomy
 */
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


/**
 * Create and register mood taxonomy
 */
function bj_moods_taxonomy() {

	$labels = array(
		'name'                           => 'Mood',
		'singular_name'                  => 'Mood',
		'search_items'                   => 'Search Mood',
		'all_items'                      => 'All Moods',
		'edit_item'                      => 'Edit Mood',
		'update_item'                    => 'Update Mood',
		'add_new_item'                   => 'Add New Mood',
		'new_item_name'                  => 'New Mood Name',
		'menu_name'                      => 'Moods',
		'view_item'                      => 'View Mood',
		'popular_items'                  => 'Popular Moods',
		'separate_items_with_commas'     => 'Separate Moods with commas',
		'add_or_remove_items'            => 'Add or remove Moods',
		'choose_from_most_used'          => 'Choose from the most used Moods',
		'not_found'                      => 'No Mood found'
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
    'rewrite'                        => array( 'slug' => 'mood' ),
    'labels'                         => $labels
  );
  
  register_taxonomy( 'moods', array( 'entry' ), $args );
  
}

add_action( 'init', 'bj_moods_taxonomy' );