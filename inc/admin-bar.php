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
  // remove_menu_page( 'themes.php' );                 //Appearance  
  // remove_menu_page( 'plugins.php' );                //Plugins  
  remove_menu_page( 'users.php' );                  //Users  
  remove_menu_page( 'tools.php' );                  //Tools  
  remove_menu_page( 'options-general.php' );        //Settings  

}  
add_action( 'admin_menu', 'remove_menus' );  