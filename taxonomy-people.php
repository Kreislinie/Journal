<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */

get_header();

/**
 * TODO: 
 * edit_term_link( 'Edit ' . $term->name, '<i class="fas fa-pencil-alt"></i> ' ); 
 */
?>

<div id="primary" class="content-area">
  <main id="main" class="grid__main site-main">
    <div class="people-background"></div>
      
    <header class="entry-header area__head">
      <div class="people-info-box">

        <?php
        /**
         * Get people term meta.
         */
        $term       = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
        $avatar     = wp_get_attachment_image_url( get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true ), array('400') ); 
        $sex        = get_term_meta( $term->term_id, 'bj_people_cmb2_sex', true );
        $birth      = get_term_meta( $term->term_id, 'bj_people_cmb2_birth', true );
        $death      = get_term_meta( $term->term_id, 'bj_people_cmb2_death', true );
        $relation   = get_term_meta( $term->term_id, 'bj_people_cmb2_relation', true);
        
        if ( $avatar ) {
          echo '<div class="people-profile-large" style="background-image: url(' . $avatar . ')"></div>'; 
        }
        
        ?> 

        <div class="people-meta">
        
          <?php

          echo '<h2>' . $term->name . ' <i class="' . $sex . '"></i></h2>';

          if ( $term->description ) {
          echo '<p>' . $term->description . '</p>';
          }

          if ( $term->count ) {
            echo '<span><i class="far fa-bookmark"></i> ' . $term->count . '</span>';
          }
          
          if ( $birth ) {
            echo '<span><i class="fas fa-star-of-life"></i> ' . date( 'd.m.Y', $birth ) . '</span>';
          }

          if ( $death ) {
            echo '<span><i class="fas fa-cross"></i> ' . date( 'd.m.Y', $death ) . '</span>';
          }

          if ( $relation ) {
            echo '<span><i class="fas fa-user-friends"></i> ' . $relation . '</span>';
          }

          ?>

        </div><!-- .people-meta -->

      </div><!-- .people-info-box -->
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
      ?>

    </div><!-- .area__content -->

  </main><!-- #main -->
</div><!-- .content-area -->

<?php
get_footer();
