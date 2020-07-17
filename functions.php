<?php
/*
 * bitjournal's functions.php
 */

if ( ! function_exists( 'bitjournal_setup' ) ) :

	// Sets up theme defaults and registers support for various WordPress features.
	function bitjournal_setup() {

		add_theme_support( 'title-tag' );

		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );
		
  }
  
endif;
add_action( 'after_setup_theme', 'bitjournal_setup' );


define( 'DISALLOW_FILE_EDIT', true );

/*
 * Changes main query with pre_get_posts if page is home, tag or archive in order to show entry post type.
 * Sets posts per page.
 */
function bj_entry_queries( $query ) {

  if ( $query->is_home() && $query->is_main_query() || is_archive() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 3 );
    $query->set( 'post_type', 'entry');
  }

}

add_action( 'pre_get_posts', 'bj_entry_queries' );


// Changes "read more" string to ...
function bj_excerpt_more( $more ) {
  
  if ( ! is_single() ) {
    $more = ' ...';
  }

  return $more;

}
add_filter( 'excerpt_more', 'bj_excerpt_more' );

// Theme setup.
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

// Disables REST API. 
add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
      return $result;
  }
  if ( ! is_user_logged_in() ) {
      return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  return $result;
});

// Disables feeds.
function bitjournal_disable_feed() {
  wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'bitjournal_disable_feed', 1);
add_action('do_feed_rdf', 'bitjournal_disable_feed', 1);
add_action('do_feed_rss', 'bitjournal_disable_feed', 1);
add_action('do_feed_rss2', 'bitjournal_disable_feed', 1);
add_action('do_feed_atom', 'bitjournal_disable_feed', 1);
add_action('do_feed_rss2_comments', 'bitjournal_disable_feed', 1);
add_action('do_feed_atom_comments', 'bitjournal_disable_feed', 1);

function bj_backend_error_messages() {

  $current_screen = get_current_screen();

	if ( $current_screen->id == 'edit-page' ) {
		$class = 'notice notice-error';
		$message = '<p><span class="dashicons dashicons-no"></span> 
			Everything here is managed by bitjournal. Changing things could break your journal. <span class="dashicons dashicons-no"></span></p>';

  	printf( '<div class="%1$s"><div class="">%2$s</div></div>', $class, $message ); 
	}

}

add_action( 'admin_notices', 'bj_backend_error_messages' );

