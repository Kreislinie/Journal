<?php
/**
 * bitjournal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bitjournal
 */

if ( ! function_exists( 'bitjournal_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bitjournal_setup() {

		/*
		 * TODO: Make theme available for translation
		 * Translations can be filed in the /languages/ directory.
		 */
		// load_theme_textdomain( 'bitjournal', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );
		
  }
  
endif;
add_action( 'after_setup_theme', 'bitjournal_setup' );


define( 'DISALLOW_FILE_EDIT', true );

/**
 * Change main query with pre_get_posts in order to show entry CPT
 */
add_action( 'pre_get_posts', function ( $q ) {

  if ( $q->is_home() && $q->is_main_query() ) {
    $q->set( 'posts_per_page', 3 );
    $q->set( 'post_type', 'entry');
  }

});

/**
 * Change main query / tag query with pre_get_posts in order to show entry CPT
 */
function bj_entry_queries( $query ) {

  if ( ( $query->is_tag() && $query->is_main_query() ) || ( $query->is_home() && $query->is_main_query() ) ) {
      $query->set( 'post_type', 'entry' );
  }

}
add_action( 'pre_get_posts', 'bj_entry_queries' );


/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string Modified "read more" excerpt string.
 */
function bj_excerpt_more( $more ) {
  
  if ( ! is_single() ) {

    $more = ' ...';
      
  }

  return $more;

}
add_filter( 'excerpt_more', 'bj_excerpt_more' );

/**
 * Setup pages if template activated.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Custom cmb2 fields and post types.
 */
require get_template_directory() . '/inc/custom-fields.php';
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom taxonomies for bitjournal.
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Load scripts, styles and fonts.
 */
require get_template_directory() . '/inc/load-scripts-and-styles.php';

/**
 * Adujust admin bar and admin sidebar.
 */
require get_template_directory() . '/inc/admin-bar.php';

/**
 * Add backend pages and menu.
 */
require get_template_directory() . '/inc/backend-pages.php';

/**
 * Add backend pages and menu.
 */
require get_template_directory() . '/inc/vendors/cmb2-icon-picker/cmb2-icon-picker.php';


add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
      return $result;
  }
  if ( ! is_user_logged_in() ) {
      return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  return $result;
});

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