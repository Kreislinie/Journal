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

<div id="primary" class="content-area">
		<main id="main" class="grid__main site-main">
      <div class="area__content">
        
      <h1>index</h1>

      <a href="<?php echo admin_url('edit.php'); ?>">Manage all entries</a>
      
      <?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


      $custom_query = new WP_Query( array(
        'post_type' => 'entry',
        'posts_per_page' => 5,
        'paged' => $paged,
      ) );
      
      if ( $custom_query->have_posts() ) : 
        while ( $custom_query->have_posts() ) : $custom_query->the_post();
          
          if ( get_post_type() == 'entry' ) {
            get_template_part( 'template-parts/content', 'entry' );
          } else {
            get_template_part( 'template-parts/content', 'entry' );
          }

        endwhile;  

        $total_pages = $custom_query->max_num_pages;

        if ($total_pages > 1) :

          $current_page = max(1, get_query_var('paged'));
  
          echo paginate_links(array(
              'base' => get_pagenum_link(1) . '%_%',
              'format' => '?page=%#%',
              'current' => $current_page,
              'total' => $total_pages,
              'prev_text'    => __('« prev'),
              'next_text'    => __('next »'),
          ));



        endif;

      else :

        get_template_part( 'template-parts/content', 'none' );
        
      endif;

      wp_reset_postdata();

      ?>
    
    </div><!-- .area__content -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
