<?php
/*
 * Template part for displaying entry excerpt.
 */
?>

<div class="entry-content">

  <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content', 'card__default' ) ); ?>>

    <div class="entry-header-container">

      <?php 
			bj_display_mood();

			echo '<span class="date-bar">'. file_get_contents( get_template_directory_uri() . '/img/icons/calendar-days.svg' ) . get_the_date() . '</span>';

			if ( has_category() ) {
				bj_display_category_bar();
			}
      ?>
    
    </div><!-- .entry-header-container -->

    <?php
		// Displays entry title, excerpt and edit icon.
		$edit_icon = '<a class="edit-entry-link" href="' . get_edit_post_link() . '">' . file_get_contents( get_template_directory_uri() . '/img/icons/pencil.svg') . '</a>';

		the_title( '<h1 class="entry-title"><a href="' . get_permalink() . '">', '</a>' . $edit_icon . '</h1>' );

		printf('<div class="link" data-url="%s"><p>%s</p></div>', get_permalink(), get_the_excerpt() );
    ?>

  </article><!-- #post-<?php the_ID(); ?> -->
  
</div><!-- .entry-content -->


<footer class="entry-footer"></footer><!-- .entry-footer -->

