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

    <?php echo '<a href="' . admin_url('edit-tags.php?taxonomy=people') . '">Manage all entries</a>'; 
    
    /** 
     * Display people term meta
    */ 
    $terms = get_terms(['taxonomy' => 'people', 'hide_empty' => false]); 

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

      foreach ( $terms as $term ) {
  
        $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true ), 'medium' ); ?>

        <div class="person-overview-container">
          <?php echo $avatar; ?>
          <h3><?php echo $term->name;?></h3>
          <p><?php echo $term->description;?></p>
        </div> 
        
        <?php
      }

    } ?>

    </main><!-- #main -->
    
	</div><!-- #primary -->

<?php
get_footer();
