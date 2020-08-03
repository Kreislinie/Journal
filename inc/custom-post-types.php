<?php 

/*
 * Custom Post-Types.
 */
function bj_custom_post_types() {
 
  $labels_entry = array(
    'name'                => __( 'Entries', 'bitjournal' ),
    'singular_name'       => __( 'Entry', 'bitjournal' ),
    'menu_name'           => __( 'Entries', 'bitjournal' ),
    'parent_item_colon'   => __( 'Parent Entry', 'bitjournal' ),
    'all_items'           => __( 'All Entries', 'bitjournal' ),
    'view_item'           => __( 'View Entry', 'bitjournal' ),
    'add_new_item'        => __( 'Add New Entry', 'bitjournal' ),
    'add_new'             => __( 'Add New', 'bitjournal' ),
    'edit_item'           => __( 'Edit Entry', 'bitjournal' ),
    'update_item'         => __( 'Update Entry', 'bitjournal' ),
    'search_items'        => __( 'Search Entries', 'bitjournal' ),
    'not_found'           => __( 'Not Found', 'bitjournal' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'bitjournal' ),
  );

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
    'taxonomies'          => array( 'category', 'post_tag' ),
    'supports'            => array( 'editor', 'title', 'category' ),
  );

  register_post_type( 'entry', $args_entry );
  
}
   
add_action( 'init', 'bj_custom_post_types', 0 );

