<?php

/*
 * Load scripts and styles.
 */
function bj_frontend_scripts() {

  wp_enqueue_style( 'bitjournal-style', get_stylesheet_directory_uri() . '/style.css' );

	wp_enqueue_script( 'bitjournal-script', get_template_directory_uri() . '/js/bj-script.js', array(), null, true );

  wp_enqueue_script( 'jquery' );

  // Fonts
  wp_enqueue_style( 'google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700' );
  //wp_enqueue_style( 'font-awesome-default', get_template_directory_uri() . '/vendors/font-awesome/css/fontawesome.min.css' );
  //wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/all.min.css' );
  
}

add_action( 'wp_enqueue_scripts', 'bj_frontend_scripts' );


function bj_backend_scripts() {

  //wp_enqueue_style( 'font-awesome-default', get_template_directory_uri() . '/vendors/font-awesome/css/fontawesome.min.css' );
  //wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/all.min.css' );
  wp_enqueue_style( 'bitjournal-backend-style', get_stylesheet_directory_uri() . '/style-backend.css' );

}

add_action( 'admin_enqueue_scripts', 'bj_backend_scripts' );
