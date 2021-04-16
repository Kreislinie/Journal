<?php
/*
 * Template for displaying single entry. 
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="grid__main site-main">

		<header class="entry-header area__head">
		</header><!-- .entry-header -->

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
