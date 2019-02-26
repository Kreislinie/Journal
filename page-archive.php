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
      'post_type'     => 'entry',
      'show_post_count' => true,
    );

    $archive_monthly = array(
      'type'    =>  'monthly',
      'format'  =>  'custom',
      'before'  =>  '<div>',
      'after'   =>  '</div>',
      'post_type'     => 'entry',
      'show_post_count' => true,
    );
    wp_get_archives($archive_yearly);
    wp_get_archives($archive_monthly);    
    ?>






    </main><!-- #main -->
    
	</div><!-- #primary -->

<?php
get_footer();
