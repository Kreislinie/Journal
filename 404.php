<?php
/*
 * Template for displaying 404 pages.
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="grid__main site-main page-error">


				<header class="area__head page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bitjournal' ); ?></h1>
				</header><!-- .page-header -->

				<div class="area__content page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'bitjournal' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
