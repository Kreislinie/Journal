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

  <div class="entry-content">

    <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content', 'card__default' ) ); ?>>

      <div class="entry-header-container">

        <?php 
        /**
         * Displays mood post meta.
         */
        bj_display_mood();

        /** 
         * Displays categories.
         */ 
        if ( has_category() ) {
          bj_display_category();
        }
        ?>

      </div><!-- .entry-header-container -->

      <?php 
      the_title( '<h1 class="entry-title">', '</h1>' );

      /**
       * Display the excerpt if page is home, otherwise display entire content.
       */
      if ( is_home() ) {
        the_excerpt();
      } else {
        the_content();
      }
      ?>

    </article><!-- #post-<?php the_ID(); ?> -->

  </div><!-- .entry-content -->

  <?php
  /**
   * Gets people term meta.
   */
  $people = wp_get_post_terms(get_the_ID(), 'people'); 

  /**
   * Checks if entry has meta information, displays post/post-meta seperator.
   */
  if( $people || has_tag() ) {
    echo '<hr class="post-meta-seperator">';
  }

  /**
   * Displays the post tags and FA icon.
   */
  the_tags( '<div class="tags"><i class="fas fa-tags"></i>', '', '</div>' ); 


  /** 
   * Displays people term meta of current post.
   */ 
  if ( ! is_wp_error( $people ) && $people ) :

    echo '<div class="people-container">';

    foreach ( $people as $term ) :
      
      /**
       * Gets link and profile picture.
       */
      $person_link = get_term_link($term);
      $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true )); ?>

      <div data-url="<?php echo esc_url( $person_link ); ?>" class="link person-overview">
          
        <?php 
        /**
         * Displays profile picture if person has one, otherwise placeholder.
         */
        if ($avatar) {

          echo $avatar; 

        } else { 

          echo '<img src="' . esc_url( get_template_directory_uri() . '/img/no-profile.png' ) .'" alt="Profile picture placeholder">';

        }
        ?>
        
        <p><?php echo $term->name; // Displays name of the person. ?></p>

      </div><!-- .person-overview -->
     
    <?php
    endforeach;
  
  endif; 
  
  echo '</div><!-- .people-container -->';
  ?>

</div><!-- .area__content -->


<footer class="entry-footer">
</footer><!-- .entry-footer -->

