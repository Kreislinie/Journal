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
      <div class="area__content">
        
      <h1>index</h1>

      <a href="<?php echo admin_url('edit.php'); ?>">Manage all entries</a>
      
      <?php 
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

  				 get_template_part( 'template-parts/content', get_post_type() );

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
    </div><!-- .area__content -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
