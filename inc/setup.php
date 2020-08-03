<?php

if ( isset( $_GET['activated'] ) && is_admin() ) :

	/*
	 * Create needed pages on theme activation.
	 */
	function createPage($page_title, $page_template) {

		$page_settings  = array(
			'post_type' => 'page',
			'post_title' => $page_title,
			'post_status' => 'publish'
		);

		if( !isset( get_page_by_title( $page_title )->ID ) ) {

			$page = wp_insert_post( $page_settings );

			if( !empty( $page_template ) ) {
				update_post_meta( $page, '_wp_page_template', $page_template );
			}

		} 

	}

	createPage('People', 'page-people.php');
	createPage('Archive', 'page-archive.php');
	createPage('Tags', 'page-tag.php');
	createPage('Categories', 'page-category.php');

  /*
   * Set permalink structure.
   */  
  global $wp_rewrite; 

  $wp_rewrite->set_permalink_structure('/%year%/%monthnum%/%day%/%postname%/'); 

  update_option( "rewrite_rules", FALSE ); 

  // Flush the rules and tell it to write htaccess.
  $wp_rewrite->flush_rules( true );

endif;

