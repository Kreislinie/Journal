<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */

get_header();
?>

	<div id="primary" class="main-grid content-area">
		<main id="main" class="content site-main">



<h1>index</h1>



  <a href="<?php echo admin_url('edit.php'); ?>">Manage all entries</a>
  <?php
$custom_query = new WP_Query( 
    array(
        'post_type' => array('health-record', 'entry' ),
        'posts_per_page' => 100
    ) 
);
if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post();

if ( get_post_type() == 'entry' ) {
  get_template_part( 'template-parts/content', 'entry' );
} else {
  get_template_part( 'template-parts/content', 'entry' );
}

   

endwhile;  wp_reset_query();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
    ?>
    


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
