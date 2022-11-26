<?php


/**
 * Disallow file editing within WordPress.
 */
define( 'DISALLOW_FILE_EDIT', true );


/**
 * Allows access to bitjournal only when the user is logged in.
 */
function bj_make_private() {
  global $wp;

  if(!is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {
    wp_redirect(wp_login_url($wp -> request));
    exit;
  }
}
add_action('wp', 'bj_make_private');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function bj_setup() {
  add_theme_support( 'title-tag' );

  add_theme_support( 'html5', array(
    'search-form',
    'gallery',
    'caption',
  ) );
}
add_action( 'after_setup_theme', 'bj_setup' );


/**
 * Changes main query to show entry post type by default.
 */
function bj_entry_queries( $query ) {

  if ( $query->is_home() && $query->is_main_query() || is_archive() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 3 );
    $query->set( 'post_type', 'entry');
  }

}
add_action( 'pre_get_posts', 'bj_entry_queries' );


/**
 * Changes 'read more' string to '...'
 */
function bj_excerpt_more( $more ) {
  if ( ! is_single() ) {
    $more = ' ...';
  }

  return $more;
}
add_filter( 'excerpt_more', 'bj_excerpt_more' );


/**
 * Theme setup
 */
require get_template_directory() . '/inc/setup.php';

// Custom cmb2 fields and post types.
require get_template_directory() . '/inc/custom-fields.php';
require get_template_directory() . '/inc/custom-post-types.php';

// Custom template tags for bitjournal.
require get_template_directory() . '/inc/template-tags.php';

// bitjournal theme functions.
require get_template_directory() . '/inc/template-functions.php';

// Custom taxonomies for bitjournal.
require get_template_directory() . '/inc/custom-taxonomies.php';

// Load scripts, styles and fonts.
require get_template_directory() . '/inc/load-scripts-and-styles.php';

// Adujust admin bar and admin sidebar.
require get_template_directory() . '/inc/admin-bar.php';

// Add backend pages and menu.
require get_template_directory() . '/inc/backend-pages.php';


/**
 * Blocks access to all REST API endpoints unless the user is logged in.
 * 
 * https://paulund.co.uk/only-allow-access-to-rest-to-logged-in-users
 */
add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
      return $result;
  }
  if ( ! is_user_logged_in() ) {
      return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  return $result;
});


/**
 * Displays backend warning messages.
 */
function bj_backend_warning_messages() {

  $current_screen = get_current_screen();

	if ( $current_screen->id == 'edit-page' ) {
		$class = 'notice notice-error';
		$message = 'Everything here is managed by bitjournal. Changing things could break your journal.';
  	printf( '
      <div class="%1$s">
        <p><span class="dashicons dashicons-no"></span>
          %2$s
        <span class="dashicons dashicons-no"></span></p>
      </div>', 
    $class, $message ); 
	}

}

add_action( 'admin_notices', 'bj_backend_warning_messages' );


/**
 * Changes publish button text to 'Write entry'.
 */
function bj_change_publish_button_text() {
  if ( wp_script_is( 'wp-i18n' ) ) :
  ?>
    <script>
			wp.i18n.setLocaleData({
				'Publish': ['Write entry'], 
				'Publish…': ['Write entry']
			});
    </script>
  <?php
  endif;
}

add_action( 'admin_print_footer_scripts', 'bj_change_publish_button_text', 11 );
