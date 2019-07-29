<?php
/**
 * Template part for displaying entry excerpt
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
         * Displays categories.
         */ 
        if ( has_category() ) {
          bj_display_category_bar();
        }
      ?>
    
    </div><!-- .entry-header-container -->

    <?php
    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    
    printf('<div class="link" data-url="%s"><p>%s</p></div>', get_permalink(), get_the_excerpt() );
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

