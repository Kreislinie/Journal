<?php

/**
 * Hide comment icon on admin bar.
 */
function my_admin_bar_render() {
  global $wp_admin_bar;

  $wp_admin_bar -> remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

/**
 * Hide menu-pages on admin sidebar.
 */
function remove_menus(){  

  remove_menu_page( 'edit.php?post_type=page' );    //Pages  
  remove_menu_page( 'edit-comments.php' );          //Comments  
  remove_menu_page( 'themes.php' );                 //Appearance  
  remove_menu_page( 'plugins.php' );                //Plugins  
  remove_menu_page( 'users.php' );                  //Users  
  remove_menu_page( 'tools.php' );                  //Tools  
  remove_menu_page( 'options-general.php' );        //Settings  
  remove_menu_page( 'index.php' );                  //Dashboard

}  
add_action( 'admin_menu', 'remove_menus' );  

/**
 * Hide frontend adminbar.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Change dashboard Posts to Entries.
 */
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
      $labels->name = __('Entries');
      $labels->singular_name = __('Entry');
      $labels->add_new = __('Add Entry');
      $labels->add_new_item = __('Add Entry');
      $labels->edit_item = __('Edit Entry');
      $labels->new_item = __('News');
      $labels->view_item = __('View Entries');
      $labels->search_items = __('Search Entries');
      $labels->not_found = __('No Entries found');
      $labels->not_found_in_trash = __('No Entries found in Trash');
      $labels->all_items = __('All Entries');
      $labels->menu_name = __('Entries');
      $labels->name_admin_bar = __('Entry');
}
add_action( 'init', 'cp_change_post_object' );

// change icon for entries
function ccd_menu_news_icon() {
  global $menu;
  foreach ( $menu as $key => $val ) {
    if ( __( 'Entries') == $val[0] ) {
      $menu[$key][6] = 'dashicons-edit';
    }
  }
}
add_action( 'admin_menu', 'ccd_menu_news_icon' );