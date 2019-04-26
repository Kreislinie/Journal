<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */
?>

<div class="entry-content">

  <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content', 'card__default' ) ); ?>>

    <div class="entry-header-container">

      <?php 
      /**
       * Display mood post meta.
       */
      bj_display_mood();

      /**
       * Display date.
       */
      echo '<span class="date"><i class="far fa-calendar-alt"></i>' . get_the_date() . '</span>';

      /** 
       * Display category names.
       */ 
      if ( has_category() ) {
        echo '<div class="category"><i class="fas fa-sitemap"></i>';
        the_category( '', 'multiple' );
        echo '</div>';
      }
      


      ?>
    
    </div><!-- .entry-header-container -->

    <?php
    /**
     * Display date, title and excerpt.
     */
    $edit_icon = '<a class="edit-entry-link" href="' . get_edit_post_link() . '"><i class="fas fa-pencil-alt"></i></a>';

    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', $edit_icon . '</a></h2>' );
    the_excerpt();
    ?>

  </article><!-- #post-<?php the_ID(); ?> -->
  
</div><!-- .entry-content -->

  <?php

/** 
     * Display people term meta of current post
    */ 



    $people = wp_get_post_terms(get_the_ID(), 'people'); 

    

    
 

   
    ?>






<footer class="entry-footer">
</footer><!-- .entry-footer -->

