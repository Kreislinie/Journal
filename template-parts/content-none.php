<?php
/*
 * Template for displaying a message that entry cannot be found.
 */
?>


<section class="no-results not-found">

		<h1 class="page-title aligntxtcenter"><?php esc_html_e( 'No entries', 'bitjournal' ); ?></h1>

	<div class="page-content">

		<?php
		if ( is_home() ) :

      printf( '<p class="aligntxtcenter"><a href="%s">%s</a></p>', get_admin_url( null, 'post-new.php?post_type=entry' ), esc_html__( 'Write your first entry', 'bitjournal' ) );

		elseif ( is_search() ) :

      ?>
      <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bitjournal' ); ?></p>
      <?php

			get_search_form();

    else :

			printf( '<p class="aligntxtcenter"><a href="%s">%s</a></p>', get_admin_url( null, 'post-new.php?post_type=entry' ), esc_html__( 'Create a new entry...', 'bitjournal' ) );

		endif;
    ?>
  
</section><!-- .no-results -->
</div>
