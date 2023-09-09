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
 * Loads cmb2.
 */
if ( file_exists( dirname( __FILE__ ) . '/vendors/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/vendors/cmb2/init.php';
}

/**
 * Loads plugin update checker.
 */
require_once dirname( __FILE__ ) . '/vendors/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$bjUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/Kreislinie/bitjournal',
	__FILE__,
	'bitjournal'
);

//Set the branch that contains the stable release.
$bjUpdateChecker->setBranch('main');

/**
 * Changes main query to show entry post type by default.
 */
function bj_entry_queries( $query ) {

  if ( $query->is_home() && $query->is_main_query() || is_archive() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 10 );
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

// Load gutenberg settings scripts.
require get_template_directory() . '/inc/gutenberg-settings.php';


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


// BACKEND


function bj_display_custom_logo() {
    
  printf( '<li id="aa-custom-logo"><a href="%s"><img src="%s"></a></li>', home_url(), esc_url( get_template_directory_uri() . '/img/bitjournal-logo_path_wide.svg' ) );

}

add_action('adminmenu', 'bj_display_custom_logo');


class Bj_Category_Walker extends Walker_Category {

  // Override the start_el method to add the SVG icon before each category item.
  function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {
      $output .= '<li class="categories-list-item">';
      $icon = file_get_contents( get_template_directory_uri() . '/img/icons/folder.svg' );
      $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . $icon . $category->name . '</a>';
  }

  // Override the end_el method to close the list item properly.
  function end_el(&$output, $page, $depth = 0, $args = array()) {
      $output .= '</li>';
  }
}
