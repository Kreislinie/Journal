<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */
?>

<div class="area__content">

  <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content', 'card__default' ) ); ?>>

    <div class="entry-content">

      <?php 
      if ( is_singular() ) :

        /**
         * Display mood post meta and echo mood.
         */
        bj_display_mood();


        /** 
         * Display category names.
         */ 
        if ( has_category() ) {
      
          echo '<div class="category"><i class="fas fa-sitemap"></i>';
          the_category( '', 'multiple' );
          echo '</div>';

        }

        the_title( '<h1 class="entry-title">', '</h1>' );

      else : 
      
        // calendar icon
        echo '<i class="far fa-calendar-alt"></i>';

        /**
         * Display date and title.
         */
        bitjournal_posted_on();
        the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );

      endif; 

      if ( is_home() ) {
        the_excerpt();
      } else {
        the_content();
      }

      ?>

    </div><!-- .entry-content -->

  </article><!-- #post-<?php the_ID(); ?> -->

  <?php
  /** 
   * Display people term meta of current post
   */ 
  $people = wp_get_post_terms(get_the_ID(), 'people'); 

  if ( ! empty( $people ) && ! is_wp_error( $people ) ) :
  ?>

  <div class="sidebar-section">

    <?php
    /**
     * Display the post tags.
     */
    the_tags( '<div class="tags"><i class="fas fa-tags"></i>', '', '</div>' ); 

      foreach ( $people as $term ) {
          
        $person_link = get_term_link($term);
        $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true )); ?>

        <div data-url="<?php echo esc_url( $person_link ); ?>" class="person-overview">
          
          <?php 
          if ($avatar) {

            echo $avatar; 

          } else { 

              ?>
              <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-372-456324.png">
              <?php

            }
            ?>

            <p><?php echo $term->name;?></p>

          </div><!-- .person-overview -->

          

        <?php
        }
        ?>

      </div><!-- .sidebar-section -->

      
    
    <?php
    endif; 

    
 
    edit_post_link( 'Edit Entry', '<div class="edit-entry-link"><i class="fas fa-pencil-alt"></i> ', '</div>');

   
    ?>



</div><!-- .area__content -->



<footer class="entry-footer">
</footer><!-- .entry-footer -->

