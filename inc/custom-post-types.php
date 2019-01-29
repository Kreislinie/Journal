<?php 

/**
 * Custom Post-Types
 *
 * @package bitjournal
 */

function bj_custom_post_types() {
 
  // Set UI labels for Custom Post Type

  $labels_entry = array(
    'name'                => __( 'Entries', 'bitjournal' ),
    'singular_name'       => __( 'Entry', 'bitjournal' ),
    'menu_name'           => __( 'Entries', 'bitjournal' ),
    'parent_item_colon'   => __( 'Parent Entry', 'bitjournal' ),
    'all_items'           => __( 'All Entries', 'bitjournal' ),
    'view_item'           => __( 'View Entry', 'bitjournal' ),
    'add_new_item'        => __( 'Add New Entry', 'bitjournal' ),
    'add_new'             => __( 'Add Entry', 'bitjournal' ),
    'edit_item'           => __( 'Edit Entry', 'bitjournal' ),
    'update_item'         => __( 'Update Entry', 'bitjournal' ),
    'search_items'        => __( 'Search Entries', 'bitjournal' ),
    'not_found'           => __( 'Not Found', 'bitjournal' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'bitjournal' ),
  );

  $labels_health_record = array(
    'name'                => __( 'Health Record', 'bitjournal' ),
    'singular_name'       => __( 'Healt Record', 'bitjournal' ),
    'menu_name'           => __( 'Health Records', 'bitjournal' ),
    'parent_item_colon'   => __( 'Parent Health Record', 'bitjournal' ),
    'all_items'           => __( 'All Health Records', 'bitjournal' ),
    'view_item'           => __( 'View Health Record', 'bitjournal' ),
    'add_new_item'        => __( 'Add New Health Record', 'bitjournal' ),
    'add_new'             => __( 'Add New', 'bitjournal' ),
    'edit_item'           => __( 'Edit Health Record', 'bitjournal' ),
    'update_item'         => __( 'Update Health Record', 'bitjournal' ),
    'search_items'        => __( 'Search Health Records', 'bitjournal' ),
    'not_found'           => __( 'Not Found', 'bitjournal' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'bitjournal' ),
  );

  // Set other options for Custom Post Type
    
  $args_entry = array(
    'labels'              => $labels_entry,
    'menu_icon'           => 'dashicons-edit',
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'show_in_rest'        => true, // Gutenberg needs this...
    'capability_type'     => 'post',
    'supports'            => array( 'editor', 'title' ),
  );

  $args_healt_record = array(
    'labels'              => $labels_health_record,
    'menu_icon'           => 'dashicons-plus-alt',
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'show_in_rest'        => true, // Gutenberg needs this...
    'capability_type'     => 'post',
    'supports'            => array( 'editor', 'title' ),
  );
    
  // Registering Entry and Health Record post types
  register_post_type( 'entry', $args_entry );
  register_post_type( 'health-record', $args_healt_record );

}
   
  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
   
  add_action( 'init', 'bj_custom_post_types', 0 );
