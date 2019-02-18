<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content', 'card__default' ) ); ?>>
<?php
    /** 
     * Display mood term meta of current post
    */ 

    $emotions = wp_get_post_terms(get_the_ID(), 'emotions'); 

    if ( ! empty( $emotions ) && ! is_wp_error( $emotions ) ) :

      foreach ( $emotions as $term ) {
        
        $emotion_link = get_term_link( $term );
        $emotion_icon = get_term_meta( $term->term_id, 'bj_emotions_cmb2_icon', true );
        $emotion_color = get_term_meta( $term->term_id, 'bj_emotions_cmb2_color', true ); 
        
        ?>

        <a href="<?php echo esc_url( $emotion_link ); ?>">
          <div class="emotion-flag" style="background-color: <?php echo $emotion_color ?>;">
          <i class="<?php echo $emotion_icon ?>"></i>
            <span><?php echo $term->name;?></span>
          </div> 
        </a>
        <?php
      }

    endif;
  ?>




<header class="entry-header">



		<?php 

    if ( is_singular() ) :

      the_title( '<h1 class="entry-title">', '</h1>' );



      
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
		the_content();

  /*
  * Display edit link if singular.
  */
  if ( is_singular() ) :

    edit_post_link( 'Edit Entry', '<div class="edit-entry-link"><i class="fas fa-pencil-alt"></i> ', '</div>');

  endif;





?>

    </div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->

<?php 
    /** 
     * Display people term meta of current post
    */ 

    $people = wp_get_post_terms(get_the_ID(), 'people'); 

    if ( ! empty( $people ) && ! is_wp_error( $people ) ) {
      ?>
      <div class="person-overview-container">
      <?php

      foreach ( $people as $term ) {
        
        $person_link = get_term_link($term);
        $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true )); ?>

          <div data-link="<?php echo esc_url( $person_link ); ?>" class="person-overview">
            <?php 
            // Display placeholder if no image
            if ($avatar) {
              echo $avatar; 
            } else { ?>
              <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-372-456324.png">
              <?php
            }
              ?>
            <div class="person-name-container">
            <p><?php echo $term->name;?></p>
            </div>
          </div> 

        <?php
      }

    } 



		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bitjournal' ),
			'after'  => '</div>',
		) );
		?>

  

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

