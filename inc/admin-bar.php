<?php

// Hide frontend adminbar.
add_filter( 'show_admin_bar', '__return_false' );

// Hide admin bar menu items.
function bj_remove_admin_bar_items( $wp_admin_bar ) {

  $wp_admin_bar->remove_node( 'updates' );        // Update notification
  $wp_admin_bar->remove_node( 'comments' );       // Comment icon
  $wp_admin_bar->remove_node( 'new-content' );    // New content item
  $wp_admin_bar->remove_node( 'wp-logo' );        // WordPress logo
  $wp_admin_bar->remove_node( 'site-name' );      // Visit your site item
  $wp_admin_bar->remove_node( 'archive' );        // View posts item
  $wp_admin_bar->remove_node( 'my-account' );     // Personal account item
  $wp_admin_bar->remove_node( 'search' );         // Search icon
  $wp_admin_bar->remove_node( 'customize' );      // Customize item
  $wp_admin_bar->remove_node( 'view' );           // View post,taxonomy,...item

}
add_action( 'admin_bar_menu', 'bj_remove_admin_bar_items', 999 );

/*
 * Creates "Exit edit mode" menu item.
 * Checks which backend page is displayed and links to corresponding frontend page.
 */ 
function bj_add_admin_bar_items( $admin_bar ) {

  global $taxnow, $pagenow, $post;
  $current_screen = get_current_screen();

	// var_dump($current_screen);

  // Gets id of term currently beeing edited.
  $term_id = isset( $_GET['tag_ID']) ? $_GET['tag_ID'] : '' ;
  
  // Gets full term.
  $term = get_term($term_id, $taxnow );

  // Sets default link to home url.
  $exit_edit_mode_url = home_url();

  // Checks if current page is people overview.
  if ( $current_screen->id == 'edit-people' ) {

    $exit_edit_mode_url = home_url( '/people/' );

    // Checks if current page is single person.
    if ( $current_screen->base == 'term' ) {
      $exit_edit_mode_url .= $term->slug;
    }
    
  // Checks if current page is tag overview.
  } elseif ( $current_screen->id == 'edit-post_tag' ) {

    $exit_edit_mode_url = home_url( '/tag/' );

    // Checks if current page is single tag.
    if ( $current_screen->base == 'term' ) {
      $exit_edit_mode_url .= $term->slug;
    }

  } elseif ( $pagenow == 'post.php' && $post->post_type == 'entry') {

    $exit_edit_mode_url = home_url( '/' . $post->post_type . '/' . $post->post_name );

  } elseif ( wp_get_referer() == get_home_url('', '/archive/') ) {

    $exit_edit_mode_url = get_home_url('', '/archive/');

  } elseif ( is_category() ) {
    $exit_edit_mode_url = get_category_link( get_queried_object()->term_id );
  }

  // Adds page number if paged.
  if ( is_paged() ) {
    $exit_edit_mode_url .= '/page/' . get_query_var('paged');
  }
  
  // Adds view menu item.
  $admin_bar->add_menu( array(
    'id'    => 'view-mode',
    //'title' => '<span class="screen-reader-text">View</span>' . file_get_contents( get_template_directory_uri() . '/img/icons/eye.svg' ) . esc_html__( 'View', 'bitjournal' ) ,
    'title' => '<span class="screen-reader-text">View</span>' . file_get_contents( get_template_directory_uri() . '/img/icons/eye.svg' ),
    'href'  => $exit_edit_mode_url,
    'meta'  => array(
      'title' => esc_html__( 'Switch to view mode', 'bitjournal' ),            
    ),
  ));

	// Adds add entry menu item.
	$admin_bar->add_menu( array(
		'id'    => 'add-entry',
    'title' => '<span class="screen-reader-text">Add a new entry</span>' . file_get_contents( get_template_directory_uri() . '/img/icons/plus-circle.svg' ) . esc_html__( 'Add entry', 'bitjournal' ),
		'href'  => admin_url( 'post-new.php?post_type=entry' ),
		'meta'  => array(
			'title' => esc_html__( 'Add Entry', 'bitjournal' ),            
		),
	));

	// Adds Log Out menu item.
	$admin_bar->add_menu( array(
		'id'    => 'bj-logout',
    'title' => '<span class="screen-reader-text">Log Out</span>' . file_get_contents( get_template_directory_uri() . '/img/icons/log-out.svg' ) . esc_html__( 'Log Out', 'bitjournal' ),
		'href'  => wp_logout_url(),
		'meta'  => array(
			'title' => esc_html__( 'Log Out', 'bitjournal' ),            
		),
	));


}

add_action('admin_bar_menu', 'bj_add_admin_bar_items', 100);

