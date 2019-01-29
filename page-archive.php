<?php
/**
 * The template for displaying archive overview
 *
 * @package bitjournal
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


    
    <h1>archive-overview</h1>

    <?php 
    $archive_yearly = array(
      'type'    =>  'yearly',
      'format'  =>  'custom',
      'before'  =>  '<div>',
      'after'   =>  '</div>',
      'post_type'     => 'post',
      'show_post_count' => true,
      
    );
    wp_get_archives($archive_yearly);
    wp_get_archives('type=monthly'); 
    wp_get_archives('type=daily'); 
    
    ?>
    </main><!-- #main -->
    
	</div><!-- #primary -->

<?php
get_footer();
