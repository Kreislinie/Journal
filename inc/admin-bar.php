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
 * Hide frontend adminbar.
 */
add_filter('show_admin_bar', '__return_false');
