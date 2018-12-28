<?php

/* ------------------------------------------
  LOAD SCRIPTS AND STYLES
------------------------------------------- */

function journal_scripts() {
  
  wp_enqueue_style( 'journal-style', get_stylesheet_directory_uri() . '/style.min.css' );

  wp_enqueue_script( 'journal-custom', get_template_directory_uri() . '/js/custom.min.js', array(), null, true );

	wp_enqueue_script( 'journal-skip-link-focus-fix', get_template_directory_uri() . '/js/vendors.min.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
  }
  
}

add_action( 'wp_enqueue_scripts', 'journal_scripts' );