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
      <h2>HEDADHADHA</h2>
    </header><!-- .entry-header -->

      
      <?php 
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

  				 get_template_part( 'template-parts/content', 'people' );

        endwhile;
      endif;
      

      
			the_posts_navigation(
        array(
          'prev_text'          => __( 'Older entries' ),
          'next_text'          => __( 'Newer entries' ),
          'screen_reader_text' => __( 'Entries navigation' ),
        )
      );
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
