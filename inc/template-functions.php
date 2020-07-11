<?php
/*
 * Functions which enhance the theme...
 */

/** 
 * Displays archive post count as <span> element.
 */
function bj_archive_post_count( $link_html ) {
  $link_html = str_replace( '</a>&nbsp;(', '</a> <span class="archiveCount">', $link_html );
  $link_html = str_replace( ')', '</span>', $link_html );
  return $link_html;
}

add_filter( 'get_archives_link', 'bj_archive_post_count' );

/* 
 * Hides default WP post type.
 */
function bj_remove_default_post_type() {
  remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'bj_remove_default_post_type' );

/*
 * Hide the prefix displayed at the start of archive titles.
 * Author: Ben Gillbanks
 *
 * Add a span around the title prefix so that the prefix can be hidden with CSS
 * if desired.
 * Note that this will only work with LTR languages.
 *
 * @param string $title Archive title.
 * @return string Archive title with inserted span around prefix.
 */
function bj_hide_the_archive_title( $title ) {

	// Skip if the site isn't LTR, this is visual, not functional.
	// Should try to work out an elegant solution that works for both directions.
	if ( is_rtl() ) {
		return $title;
	}

	// Split the title into parts so we can wrap them with spans.
	$title_parts = explode( ': ', $title, 2 );

	// Glue it back together again.
	if ( ! empty( $title_parts[1] ) ) {
		$title = wp_kses(
			$title_parts[1],
			array(
				'span' => array(
					'class' => array(),
				),
			)
		);
		$title = '<span class="screen-reader-text">' . esc_html( $title_parts[0] ) . ': </span>' . $title;
	}

	return $title;

}

add_filter( 'get_the_archive_title', 'bj_hide_the_archive_title' );

/*
 * Displays mood post meta.
 */
function bj_display_mood() {

  $mood = get_post_meta( get_the_ID(), 'bj_mood_cmb2_mood', true );

  echo '<div class="mood">';

  switch( $mood ) {

    case 'excellent': 
      echo '<span id="excellent">' . esc_html__( 'Excellent', 'bitjournal' ) . '</span>';
    break;

    case 'very-good':
      echo '<span id="very-good">' . esc_html__( 'Very good', 'bitjournal' ) . '</span>';
    break;

    case 'good':
      echo '<span id="good">' . esc_html__( 'Good', 'bitjournal' ) . '</span>';
    break;

    case 'neutral':
      echo '<span id="neutral">' . esc_html__( 'Neutral', 'bitjournal' ) . '</span>';
    break;
    
    case 'bad':
      echo '<span id="bad">' . esc_html__( 'Bad', 'bitjournal' ) . '</span>';
    break;

    case 'very-bad':
      echo '<span id="very-bad">' . esc_html__( 'Very bad',  'bitjournal' ) . '</span>';
    break;

    case 'horrible':
      echo '<span id="horrible">' . esc_html__( 'Horrible',  'bitjournal' ) . '</span>';
    break;
  } 

  echo '</div>';
  
}

/*
 * Displays category.
 */
function bj_display_category_bar() {

  echo '<div class="category-bar"><i class="fas fa-sitemap"></i>';
  the_category( '', 'multiple' ) ;
  echo '</div>';

}

function my_manage_columns( $columns ) {
  unset($columns['slugs']);
  return $columns;
}

function my_column_init() {
  add_filter( 'manage_posts_columns' , 'my_manage_columns' );
}
add_action( 'admin_init' , 'my_column_init' );

