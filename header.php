<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="site">

	    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bitjournal' ); ?></a>

	    <header id="masthead" class="site-header">
    
        <nav id="site-navigation" class="main-navigation">

          <!-- bitjournal Logo -->
          <a href="<?php echo home_url() ?>">
            <img src="<?php echo get_template_directory_uri() . '/img/bitjournal-logo_path_wide.svg'?>" alt="bitjournal Logo" >
          </a>

          <div class="entry-meta">

            <?php	
            /**
             * Displays post navigation and date
             */
            if( is_single() ) : 
              previous_post_link('%link', '<p><i class="fas fa-angle-left" title="' . esc_html__( 'Previous Entry', 'bitjournal' ) . '"></i>');
              bitjournal_posted_on(); 
              next_post_link('%link', '<i class="fas fa-angle-right" title="' . esc_html__( 'Next Entry', 'bitjournal' ) . '"></i></p>');
          
              elseif( is_tax() ) :
              the_archive_title( '<p>', '</p>' );

              elseif( is_archive() ) :
              the_archive_title( '<p>', '</p>' );

            endif; 
            ?>

          </div><!-- .entry-meta -->

          <div class="navbar-right">
            <a href="<?php echo home_url() . '/people' ?>">People</a>
            <a href="<?php echo home_url() . '/archive' ?>">Archive</a>
            <a href="<?php echo home_url() . '/archive' ?>">Health Records</a>
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