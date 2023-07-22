<?php
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="grid__main site-main">

    <header class="entry-header area__head tags-header">
      <?php 
      echo '<h1 class="entry-title">' . single_tag_title( file_get_contents( get_template_directory_uri() . '/img/icons/tag.svg' ), false) . '</h1>';
      echo tag_description();
      ?>
    </header><!-- .entry-header -->

    <?php



    ?>

      
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
