<?php

/*
 * Hides specific menu-pages on admin sidebar.
 */
function bj_remove_menus() {  

  // remove_menu_page( 'edit.php?post_type=page' );    //Pages  
  remove_menu_page( 'edit-comments.php' );          //Comments  
  // remove_menu_page( 'themes.php' );                 //Appearance  
  // remove_menu_page( 'plugins.php' );                //Plugins  
  // remove_menu_page( 'users.php' );                  //Users  
  // remove_menu_page( 'tools.php' );                  //Tools  
  // remove_menu_page( 'options-general.php' );        //Settings  
  remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'edit.php' );                  //Post edit

}  
add_action( 'admin_menu', 'bj_remove_menus' ); 


/*
 * === CURRENTLY NOT IN USE ===
 * 
 * Adds bitjournal settings page and loads page content.
 */
function bj_add_settings_page() {

  add_menu_page(
    'bitjournal', 
    'bitjournal', 
    'manage_options', 
    'bitjournal', 
    'bj_settings_page_content', 
    'dashicons-book-alt', 
    2
  );

}

function bj_settings_page_content() {
  echo 'some settings';
}

// add_action( 'admin_menu', 'bj_add_settings_page' );


/*
 * Create menu for people taxonomy
 * https://wp-kama.com/49/register-taxonomy-without-post-type
 */
function bitjournal_add_people_menu() {

	$taxname = 'people';

	$is_people = isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] === $taxname;

	// Cancel 'current' for posts (taxonomy attaches there by default, even if not set post_type when taxonomy is registered.
	$is_people && add_filter( 'parent_file', function( $parent_file ) {
		return false;
	} );

	// Add a taxonomy menu item.
  $menu_title = 'People';
  
	add_menu_page( 'People', $menu_title, 'manage_options', "edit-tags.php?taxonomy=$taxname", null, 'dashicons-groups', 9 );
  
  // Fix some parameters of the added menu item.
  $menu_item = & $GLOBALS['menu'][ key( wp_list_filter( $GLOBALS['menu'], [$menu_title] ) ) ];
  
	foreach( $menu_item as & $val ) {
		// Add 'current' class if need.
		if( false !== strpos( $val, 'menu-top' ) )
			$val = 'menu-top'. ( $is_people ? ' current' : '' );

		$val = preg_replace( '~toplevel_page[^ ]+~', "toplevel_page_$taxname", $val );
  }
  
}

add_action( 'admin_menu', 'bitjournal_add_people_menu' );

