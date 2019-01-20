<?php
/**
 * The template for displaying all people
 *
 * @package bitjournal
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

    <p>ToDo: display all people</p>
    <?php var_dump(get_terms(['taxonomy' => 'people', 'hide_empty' => false])); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
