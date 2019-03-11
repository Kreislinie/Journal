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

<div id="primary" class="content-area">
		<main id="main" class="grid__main site-main">
      <div class="area__content">

    <?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );




				?>
      </header><!-- .page-header -->
      


      <?php
      

            if( is_year() ) :
              echo '<h1>This is a year archive</h1>';


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



            endif;


			while ( have_posts() ) :
				the_post();


				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation(
        array(
          'prev_text'          => __( 'Older entries', 'bitjournal' ),
          'next_text'          => __( 'Newer entries', 'bitjournal' ),
          'screen_reader_text' => __( 'Entries navigation', 'bitjournal' ),
        )
      );

		else :

			get_template_part( 'template-parts/content', 'none' );

    endif;
    


		?>

</div><!-- .area__content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
