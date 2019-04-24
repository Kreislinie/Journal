<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="grid__main site-main">

    <header class="entry-header area__head">
      <h1 style="text-align: center;">Simon Mettler</h1>
    </header><!-- .entry-header -->
      
    <div class="area__content taxonomy-content">
    
      <?php 
      if ( have_posts() ) :

        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', 'people' );

        endwhile;

        the_posts_navigation();

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif;
      
			the_posts_navigation(
        array(
          'prev_text'          => __( 'Older entries', 'bitjournal' ),
          'next_text'          => __( 'Newer entries', 'bitjournal' ),
          'screen_reader_text' => __( 'Entries navigation', 'bitjournal' ),
        )
      );
      ?>

    </div><!-- .area__content -->
  
  </main><!-- #main -->
</div><!-- .content-area -->

<?php
get_footer();
