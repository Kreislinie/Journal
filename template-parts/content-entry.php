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
         * Display mood post meta.
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
        ?>

      </div><!-- .entry-header-container -->

      <?php 
      /**
       * Get edit post icon and link.
       * Display post title with edit icon.
       */
      $edit_icon = '<a class="edit-entry-link" href="' . get_edit_post_link() . '"><i class="fas fa-pencil-alt"></i></a>';
      the_title( '<h1 class="entry-title">', $edit_icon . '</h1>' );

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
   * Get people term meta.
   */
  $people = wp_get_post_terms(get_the_ID(), 'people'); 

  /**
   * If entry has meta information, display post/post-meta seperator.
   */
  if( $people || has_tag() ) {
    echo '<hr class="post-meta-seperator">';
  }

  /**
   * Display the post tags and FA icon.
   */
  the_tags( '<div class="tags"><i class="fas fa-tags"></i>', '', '</div>' ); 


  /** 
   * Display people term meta of current post
   */ 
  if ( ! is_wp_error( $people ) && $people ) :

    echo '<div class="people-container">';

    foreach ( $people as $term ) :
          
      $person_link = get_term_link($term);
      $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true )); ?>

      <div data-url="<?php echo esc_url( $person_link ); ?>" class="person-overview">
          
        <?php 
        /**
         * If person has image display it, otherwise display placeholder.
         */
        if ($avatar) {

          echo $avatar; 

        } else { 

          echo '<img src="' . get_template_directory_uri() . '/img/no-profile.png' .'" alt="no profile picture">';

        }
        ?>
        
        <p><?php echo $term->name; // Name of the person. ?></p>

      </div><!-- .person-overview -->
     
    <?php
    endforeach;
  
  endif; 
  
  echo '</div><!-- .people-container -->';
  ?>

</div><!-- .area__content -->


<footer class="entry-footer">
</footer><!-- .entry-footer -->

