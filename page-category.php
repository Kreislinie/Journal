<?php
/*
 * The template to display all categories.
 */

get_header();
?>
<div id="primary" class="page-people content-area">
  <main id="main" class="grid__main site-main">

    <header class="entry-header area__head">
      
      <h1 class="entry-title"><?php esc_html_e('Categories', 'bitjournal') ?></h1>
      
    </header><!-- .entry-header -->
      
    <div class="area__content cat-list">
			<div>

				<?php
				$categories = get_categories();

				if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :

					$args = array(
						'echo'                => true,
						'hide_empty'          => 0,
						'walker' => new Bj_Category_Walker(),
						'hierarchical'        => true,
						'order'               => 'ASC',
						'orderby'             => 'name',
						//'separator'           => '',
						'show_count'          => true,
						'show_option_all'     => '',
						//'style'               => 'list',
						'taxonomy'            => 'category',
						'title_li'            => '',
						//'use_desc_for_title'  => 1,
					);
				
					wp_list_categories( $args );

				endif; 
				?>

			</div>

    </div><!-- .area__content -->
  
  </main><!-- #main -->

</div><!-- .content-area -->

<?php
get_footer();
