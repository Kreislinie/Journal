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
function bj_emotions_taxonomy() {

	$labels = array(
		'name'                           => 'Emotions',
		'singular_name'                  => 'Emotion',
		'search_items'                   => 'Search Emotions',
		'all_items'                      => 'All Emotions',
		'edit_item'                      => 'Edit Emotion',
		'update_item'                    => 'Update Emotion',
		'add_new_item'                   => 'Add New Emotion',
		'new_item_name'                  => 'New Emotion Name',
		'menu_name'                      => 'Emotions',
		'view_item'                      => 'View Emotion',
		'popular_items'                  => 'Popular Emotions',
		'separate_items_with_commas'     => 'Separate Emotions with commas',
		'add_or_remove_items'            => 'Add or remove Emotions',
		'choose_from_most_used'          => 'Choose from the most used Emotions',
		'not_found'                      => 'No Emotion found'
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
    'rewrite'                        => array( 'slug' => 'emotion' ),
    'labels'                         => $labels
  );
  
  register_taxonomy( 'emotions', array( 'entry' ), $args );
  
}

add_action( 'init', 'bj_emotions_taxonomy' );