<?php
/*
 * Template Functions.
 */

// Displays archive post count as <span> element.
function bj_archive_post_count( $link_html ) {
  $link_html = str_replace( '</a>&nbsp;(', '</a> <span class="archiveCount">', $link_html );
  $link_html = str_replace( ')', '</span>', $link_html );
  return $link_html;
}

add_filter( 'get_archives_link', 'bj_archive_post_count' );

// Hides default WP post type.
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
		$title = '<span class="screen-reader-text">' . esc_html( $title_parts[0] ) . ': </span>' . wp_kses( $title_parts[1], array( 'span' => array( 'class' => array() ) ) );
	}

	return $title;

}

add_filter( 'get_the_archive_title', 'bj_hide_the_archive_title' );

// Displays mood post meta.
function bj_display_mood() {

  $mood = get_post_meta( get_the_ID(), 'bj_mood_cmb2_mood', true );

  $mood_labels = [
    'excellent' => 'Excellent',
    'very-good' => 'Very good',
    'good' => 'Good',
    'neutral' => 'Neutral',
    'bad' => 'Bad',
    'very-bad' => 'Very bad',
    'horrible' => 'Horrible',
  ];

  echo '<div class="mood"><span id="' . esc_attr($mood) . '">' . esc_html($mood_labels[$mood]) . '</span></div>';
  
}

// Displays category.
function bj_display_category_bar() {

  $category_icon = file_get_contents( get_template_directory_uri() . '/img/icons/folder-tree.svg' );
  $categories = get_the_category();
  $category_names = array_map(function ($category) {
    return $category->name;
  }, $categories);

  echo '<div class="category-bar">' . $category_icon . implode(', ', $category_names) . '</div>';

}

