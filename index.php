<?php
/*
 * The main template file.
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="grid__main site-main">

    <header class="entry-header area__head tags-header">

      <?php
      if( is_archive() ) {
        the_archive_title( '<h1 class="page-title">', '</h1>' );
      }
      ?>

    </header><!-- .entry-header -->

    <div class="area__content taxonomy-content">
      
      <?php 
      if ( have_posts() ) :
    
        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', 'entry_excerpt' );

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
