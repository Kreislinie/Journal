<?php
/*
 * The header template.
 */

// Redirects to login page if user not logged in.
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

        <!-- Mobile burger menu -->
        <a class="mobile-nav-wrap"><span class="mobile-nav"></span></a>

          <!-- Left/burger menu items -->
          <div class="navbar-left">
            <div>

              <!-- bitjournal Logo (Book) -->
              <a class="home-logo" href="<?php echo home_url() ?>">
                <img src="<?php echo get_template_directory_uri() . '/img/bitjournal-logo_book.svg' ?>" alt="bitjournal Logo" >
              </a>

              <a href="<?php echo home_url( '/archive' ) ?>"><?php esc_html_e( 'Archive', 'bitjournal' ) ?></a>
              <a href="<?php echo home_url( '/people' ) ?>"><?php esc_html_e( 'People', 'bitjournal' ) ?></a>
              <a href="<?php echo home_url( '/tag' ) ?>"><?php esc_html_e( 'Tags', 'bitjournal' ) ?></a>
              <a href="<?php echo home_url( '/categories' ) ?>"><?php esc_html_e( 'Categories', 'bitjournal' ) ?></a>
            
            </div>          
          </div>

          <div class="entry-meta">

            <?php	
            /*
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


              elseif ( is_home() || is_archive() || is_search() ) : 

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
            /*
             * TODO: There has to be a way more simpler and less hardcoded solution to this...
             * 
             * Creates "Edit mode" menu item.
             * Checks which page is displayed and links to corresponding backend page.
             */ 

            $edit_mode_link = admin_url();
            $edit_mode_text = esc_html__( 'Manage Entries', 'bitjournal' );

            // Checks if current page is single entry.
            if ( is_single() ) {

              $edit_mode_link = get_edit_post_link();
              $edit_mode_text = esc_html__( 'Edit Entry', 'bitjournal' );

            // Checks if current page is "Home" or "Archive".
            } elseif ( is_home() || is_page('archive') ) {

              $edit_mode_link = admin_url( 'edit.php?post_type=entry' );

            // Checks if current page is Category or Tag.
            } elseif ( is_tax() || is_tag() ) {

              $edit_mode_link = get_edit_term_link( get_queried_object()->term_id, get_queried_object()->taxonomy );
              $edit_mode_text = esc_html__( 'Edit Tag', 'bitjournal');

              if (is_tax( 'people' ) ) {
                $edit_mode_text = esc_html__( 'Edit Person', 'bitjournal');
              }

            // Checks if current page is a category page.
            } elseif ( is_category() ) {

              $edit_mode_link = get_edit_term_link( get_queried_object()->term_id, get_queried_object()->taxonomy );
              $edit_mode_text = esc_html__( 'Edit Category', 'bitjournal');

            // Checks if page is "people".
            } elseif ( is_page('people') ) {

              $edit_mode_link = admin_url( 'edit-tags.php?taxonomy=people&post_type=entry' );
              $edit_mode_text = esc_html__( 'Manage People', 'bitjournal');

            } elseif ( is_page('categories') ) {

              $edit_mode_link = admin_url( 'edit-tags.php?taxonomy=category&post_type=entry' );
              $edit_mode_text = esc_html__( 'Manage Categories', 'bitjournal');
            
            // Checks if page is "tags".
            } elseif ( is_page('tags') ) {

              $edit_mode_link = admin_url( 'edit-tags.php?taxonomy=post_tag&post_type=entry' );
              $edit_mode_text = esc_html__( 'Manage Tags', 'bitjournal');

            // Checks if page is "tags".
            } elseif ( is_archive() ) {

              $year     = get_query_var('year');
              $monthnum = get_query_var('monthnum');
              $day      = get_query_var('day');

              $edit_mode_link = admin_url() . $year;

            }

            // Adds page number if paged.
            if (is_paged()) {
              $edit_mode_link .= '&paged=' . get_query_var('paged');
            }

            printf( '<a href="%s" title="%s">Edit mode <i class="fas fa-toggle-off"></i></a>', $edit_mode_link,  $edit_mode_text );
            ?>

          </div>

        </nav><!-- .main-navigation -->

	    </header><!-- #masthead -->

	    <div id="content" class="site-content">
