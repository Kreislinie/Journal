<?php
/**
 * journal register custom taxonomies
 * 
 * @package journal
 * 
 */

/**
 * Create and register people taxonomy for posts
 */
function journal_people_taxonomy() {

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
  
  register_taxonomy( 'people', array( 'post' ), $args );
  
}

add_action( 'init', 'journal_people_taxonomy' );

/**
 * Create menu for people taxonomy
 * 
 * @link https://wp-kama.com/49/register-taxonomy-without-post-type
 * 
 */
function journal_add_people_menu() {

	$taxname = 'people';

	$is_people = isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] === $taxname;

	// cancel 'current' for posts (taxonomy attaches there by default, even if not set post_type when taxonomy is registered
	$is_people && add_filter( 'parent_file', function( $parent_file ) {
		return false;
	} );

	// add a taxonomy menu item
  $menu_title = 'People';
  
	add_menu_page( 'People', $menu_title, 'manage_options', "edit-tags.php?taxonomy=$taxname", null, 'dashicons-groups', 9 );
  
  // fix some parameters of the added menu item
  $menu_item = & $GLOBALS['menu'][ key( wp_list_filter( $GLOBALS['menu'], [$menu_title] ) ) ];
  
	foreach( $menu_item as & $val ) {
		// add 'current' class if need
		if( false !== strpos( $val, 'menu-top' ) )
			$val = 'menu-top'. ( $is_people ? ' current' : '' );

		$val = preg_replace( '~toplevel_page[^ ]+~', "toplevel_page_$taxname", $val );
  }
  
}

add_action( 'admin_menu', 'journal_add_people_menu' );
