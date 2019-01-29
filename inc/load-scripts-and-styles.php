<?php

/* ------------------------------------------
  LOAD SCRIPTS AND STYLES
------------------------------------------- */

function bj_frontend_scripts() {
  
  // wp_enqueue_style( 'dashicons' );

  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/solid.min.css' );

  wp_enqueue_style( 'bitjournal-style', get_stylesheet_directory_uri() . '/style.min.css' );

  wp_enqueue_script( 'bitjournal-custom', get_template_directory_uri() . '/js/custom.min.js', array(), null, true );

	wp_enqueue_script( 'bitjournal-skip-link-focus-fix', get_template_directory_uri() . '/js/vendors.min.js', array(), null, true );
  
}

add_action( 'wp_enqueue_scripts', 'bj_frontend_scripts' );


function bj_backend_scripts() {

  wp_enqueue_style( 'font-awesome-default', get_template_directory_uri() . '/vendors/font-awesome/css/fontawesome.min.css' );
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/all.min.css' );
  // wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/solid.min.css' );
  // wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/regular.min.css' );
}

add_action( 'admin_enqueue_scripts', 'bj_backend_scripts' );