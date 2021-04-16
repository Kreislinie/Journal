<?php
/*
 * The template for displaying search results pages.
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="grid__main site-main">

		<?php if ( have_posts() ) : ?>

			<header class="area__head page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'bitjournal' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

    <div class="area__content taxonomy-content">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'entry_excerpt' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

			</div><!-- .area__content -->

		</main><!-- #main -->
	</div><!-- .content-area -->

<?php
get_footer();
