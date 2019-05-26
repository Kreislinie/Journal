<?php
/**
 * The header gile.
 *
 * @package bitjournal
 */

?>

<?php  
  if( ! is_user_logged_in() ) :
    wp_safe_redirect( get_dashboard_url() );
    exit; 
  endif;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() . '/img/bitjournal-favicon.png' ?>"/>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="site">

	    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bitjournal' ); ?></a>

	    <header id="masthead" class="site-header">
    
        <nav id="site-navigation" class="main-navigation">
          <div class="navbar-left">

            <!-- bitjournal Logo -->
            <a href="<?php echo home_url() ?>">
              <img src="<?php echo get_template_directory_uri() . '/img/bitjournal-logo_book.svg' ?>" alt="bitjournal Logo" >
            </a>

            <a href="<?php echo home_url( '/people' ) ?>"><?php esc_html_e( 'People', 'bitjournal' ) ?></a>
            <a href="<?php echo home_url( '/tags' ) ?>"><?php esc_html_e( 'Tags', 'bitjournal' ) ?></a>
            <a href="<?php echo home_url( '/archive' ) ?>"><?php esc_html_e( 'Archive', 'bitjournal' ) ?></a>
          </div>
          
          <div class="entry-meta">

            <?php	
            /**
             * Displays centered top bar navigation.
             * 
             * Checks if page is single post, taxonomy, archive or home.
             */
            if( is_single() ) : 
              echo '<p>';
              previous_post_link('%link', '<i class="fas fa-angle-left" title="' . esc_html__( 'Previous Entry', 'bitjournal' ) . '"></i>');
              bitjournal_posted_on(); 
              next_post_link('%link', '<i class="fas fa-angle-right" title="' . esc_html__( 'Next Entry', 'bitjournal' ) . '"></i>');
              echo '</p>';
              
              elseif ( is_tax() ) :
              the_archive_title( '<p>', '</p>' );

              elseif ( is_archive() ) :
              the_archive_title( '<p>', '</p>' );

              elseif ( is_home() ) : 
              the_posts_navigation(
                array(
                  'prev_text'          => esc_html__( 'Older entries', 'bitjournal' ),
                  'next_text'          => esc_html__( 'Newer entries', 'bitjournal' ),
                  'screen_reader_text' => esc_html__( 'Entries navigation', 'bitjournal' ),
                )
              );

            endif; 
            ?>

          </div><!-- .entry-meta -->

          <div class="navbar-right">

            <?php
            /**
             * Creates "Edit mode" menu item.
             * Checks which page is displayed and links to corresponding backend page.
             */ 
            $edit_mode_link = admin_url('admin.php?page=bitjournal');

            // Checks if current page is single entry.
            if ( is_single() ) {

              $edit_mode_link = get_edit_post_link();

            // Checks if current page is "Home" or "Archive".
            } elseif ( is_home() || is_page('archive') ) {

              $edit_mode_link = admin_url( 'edit.php?post_type=entry' );

            } elseif ( is_tax() ) {

              $edit_mode_link = get_edit_term_link( get_queried_object()->term_id, get_queried_object()->taxonomy );

            // Checks if current page is a category page.
            } elseif ( is_category() ) {

              $edit_mode_link = admin_url( 'edit.php?post_type=entry&category_name=' . get_queried_object()->slug );

            // Checks if current page is a tag page.
            } elseif ( is_tag() ) {

              $edit_mode_link = admin_url( 'edit.php?post_type=entry&tag=' . get_queried_object()->slug );

            // Checks if page is "people".
            } elseif ( is_page('people') ) {

              $edit_mode_link = admin_url('edit-tags.php?taxonomy=people');

            }

            // Adds page number if paged.
            if (is_paged()) {
              $edit_mode_link .= '&paged=' . get_query_var('paged');
            }
            ?>

            <a href="<?php echo $edit_mode_link ?>">Edit mode <i class="fas fa-toggle-on"></i></a>

          </div>

        </nav><!-- .main-navigation -->

        <!-- OVERLAY MENU
        <div class="navbar-right navbar-right__closed">
            <span></span>
            <span></span>
            <span></span>
          </div>      
              
        <div class="menu-overlay menu-overlay__closed">
          <p>menu overlay</p>
        </div>
        -->
	    </header><!-- #masthead -->

	    <div id="content" class="site-content">