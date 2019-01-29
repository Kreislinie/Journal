<?php
/**
 * Create needed pages on theme activation
 *
 * @package bitjournal
 */

if ( isset( $_GET['activated'] ) && is_admin() ) :

  $people_title = __('People', 'bitjournal');
  $people_page_template = 'page-people.php';
  $people_check = get_page_by_title( $people_title );

  $archive_title = __('Archive', 'bitjournal');
  $archive_page_template = 'page-archive.php';
  $archive_check = get_page_by_title( $archive_title );

  /**
   * Array for wp_insert_post 
   * 
   * @link https://developer.wordpress.org/reference/functions/wp_insert_post
   */   
  $people_page = array(
    'post_type' => 'page',
    'post_title' => $people_title,
    'post_status' => 'publish'
  );

  $archive_page = array(
    'post_type' => 'page',
    'post_title' => $archive_title,
    'post_status' => 'publish'
  );

  // check if page does not exist
  if( !isset( $people_check->ID ) ) {

      $people_page_id = wp_insert_post( $people_page );

      if( !empty( $people_page_template ) ) {
        update_post_meta( $people_page_id, '_wp_page_template', $people_page_template );
      }

  } elseif ( !isset( $archive_check->ID ) ) {

    $archive_page_id = wp_insert_post( $archive_page );

    if( !empty( $archive_page_template ) ) {
      update_post_meta( $archive_page_id, '_wp_page_template', $archive_page_template );
    }
  }

  /*
   * Set permalink structure 
   */   
  global $wp_rewrite; 

  $wp_rewrite->set_permalink_structure('/%year%/%monthnum%/%day%/%postname%/'); 

  //Set the option
  update_option( "rewrite_rules", FALSE ); 

  //Flush the rules and tell it to write htaccess
  $wp_rewrite->flush_rules( true );

endif;