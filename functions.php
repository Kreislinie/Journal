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
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'bitjournal', get_template_directory() . '/languages' );

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
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
  }
  
endif;
add_action( 'after_setup_theme', 'bitjournal_setup' );


define( 'DISALLOW_FILE_EDIT', true );



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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

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

/**
 * Load update checker by Yahnis Elsts.
 * 
 * @link https://github.com/YahnisElsts/plugin-update-checker
 */
require 'inc/vendors/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Kreislinie/bitjournal',
	__FILE__,
	'bitjournal'
);

$myUpdateChecker->getVcsApi()->enableReleaseAssets();

add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
      return $result;
  }
  if ( ! is_user_logged_in() ) {
      return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  return $result;
});

function itsme_disable_feed() {
  wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);