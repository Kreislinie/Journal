<?php

/*
 * Register custom taxonomies.
 */
function bj_taxonomy() {

	$labels = array(
		'name'                           => __('People'),
		'singular_name'                  => __('Person'),
		'search_items'                   => __('Search Person'),
		'all_items'                      => __('All People'),
		'edit_item'                      => __('Edit Person'),
		'update_item'                    => __('Update Person'),
		'add_new_item'                   => __('Add New Person'),
		'new_item_name'                  => __('New Person Name'),
		'menu_name'                      => __('People'),
		'view_item'                      => __('View Person'),
		'popular_items'                  => __('Popular Person'),
		'separate_items_with_commas'     => __('Separate People with commas'),
		'add_or_remove_items'            => __('Add or remove People'),
		'choose_from_most_used'          => __('Choose from the most used People'),
		'not_found'                      => __('No people found')
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

add_action( 'init', 'bj_taxonomy' );

