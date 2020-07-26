<?php
/*
 * Template for displaying a message that entry cannot be found.
 */
?>

<div class="area__content">

<section class="no-results not-found">

	<header class="page-header area__head">
		<h1 class="page-title"><?php esc_html_e( 'No entries...', 'bitjournal' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php
		if ( is_home() ) :

      printf( '<a href="%s">%s</a>', get_admin_url( null, 'post-new.php?post_type=entry' ), esc_html__( 'Ready to write your first entry?', 'bitjournal' ) );

		elseif ( is_search() ) :

      ?>
      <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bitjournal' ); ?></p>
      <?php

			get_search_form();

    else :

      printf( '<p><a href="%s">%s</a></p>', get_admin_url( null, 'post-new.php?post_type=entry' ), esc_html__( 'Create a new entry...', 'bitjournal' ) );

		endif;
    ?>
    
  </div><!-- .page-content -->
  
</section><!-- .no-results -->
</div>
