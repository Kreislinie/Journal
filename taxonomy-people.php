<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */

get_header();
?>

	<div id="primary" class="main-grid content-area">
		<main id="main" class="content site-main">
<h1>taxonomy people</h1>
    <?php if ( have_posts() ) : ?>
      
      <header class="page-header">
        <?php
      $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
echo $term->description; 
$avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true ), array('70') ); 
echo $avatar; 


?>


        

			</header><!-- .page-header -->

      <?php
      
      
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
