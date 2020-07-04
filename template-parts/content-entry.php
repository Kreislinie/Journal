<?php
/*
 * Template part for displaying posts
 */
?>

<div class="area__content">

  <div class="entry-content">

    <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content', 'card__default' ) ); ?>>

      <div class="entry-header-container">

        <?php 
				// Displays mood and category.
        bj_display_mood();
        if ( has_category() ) {
          bj_display_category_bar();
        }
        ?>

      </div><!-- .entry-header-container -->

      <?php 
      // Displays post title with edit icon.
      $edit_icon = '<a class="edit-entry-link" href="' . get_edit_post_link() . '"><i class="fas fa-pencil-alt"></i></a>';
      the_title( '<h1 class="entry-title">', $edit_icon . '</h1>' );
			the_content();
      ?>

    </article><!-- #post-<?php the_ID(); ?> -->

  </div><!-- .entry-content -->

  <?php
  $people = wp_get_post_terms(get_the_ID(), 'people'); 

	// Displays post meta.
  if( $people || has_tag() ) {
    echo '<hr class="post-meta-seperator">';
  }

  the_tags( '<div class="tags"><i class="fas fa-tags"></i>', '', '</div>' ); 
	
	// Displays people cards.
	if ( ! is_wp_error( $people ) && $people ) :

    echo '<div class="people-container">';

    foreach ( $people as $term ) :
      
      $person_link = get_term_link($term);
      $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true )); ?>

      <div data-url="<?php echo esc_url( $person_link ); ?>" class="link person-overview">
          
        <?php 
        if ($avatar) {

          echo $avatar; 

        } else { 

          echo '<img src="' . esc_url( get_template_directory_uri() . '/img/no-profile.png' ) .'" alt="profile picture placeholder">';

        }
        ?>
        
        <p><?php echo $term->name; ?></p>

      </div><!-- .person-overview -->
     
    <?php
    endforeach;
  
  endif; 
  
  echo '</div><!-- .people-container -->';
  ?>

</div><!-- .area__content -->

