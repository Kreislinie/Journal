<?php
/**
 * The template to display all tags.
 *
 * @package bitjournal
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="grid__main site-main">

    <?php
    /**
     * === Is that necessary/usefull? ==
     * 
     * Displays header with name of user if on first page.
     * (No header on paged sites.)

    $current_user = wp_get_current_user();

    if ( !is_paged() ) {
      printf( '<header class="entry-header area__head"><h1>%s</h1></header><!-- .entry-header -->', $current_user->user_firstname ); 
    }
    */
    ?>

      
    <div class="area__content taxonomy-content">
    
      <?php 
      if ( have_posts() ) :

        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', 'people' );

        endwhile;

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>

    </div><!-- .area__content -->
  
  </main><!-- #main -->
</div><!-- .content-area -->

<?php
get_footer();
