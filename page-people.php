<?php
/**
 * The template to display all people.
 *
 * @package bitjournal
 */

get_header();
?>
<div id="primary" class="page-people content-area">
  <main id="main" class="grid__main site-main">

    <header class="entry-header area__head">

      <h1 class="entry-title"><?php esc_html_e('People', 'bitjournal') ?></h1>

    </header><!-- .entry-header -->
      
    <div class="area__content taxonomy-people">

      <?php
      /** 
       * Display people term meta
      */ 
      $terms = get_terms(['taxonomy' => 'people', 'hide_empty' => false]); 

      if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
        echo '<div class="people-container">';

        foreach ( $terms as $term ) :
          
          $person_link = get_term_link($term);
          $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true )); 
          ?>

          <div data-url="<?php echo esc_url( $person_link ); ?>" class="link person-overview">
            <?php 
          /**
           * Displays profile picture if person has one, otherwise placeholder.
           */
          if ($avatar) {

            echo $avatar; 

          } else { 

            echo '<img src="' . esc_url( get_template_directory_uri() . '/img/no-profile.png' ) .'" alt="Profile picture placeholder">';

          }
          ?>

          <p><?php echo $term->name; // Displays name of the person. ?></p>

          </div><!-- .person-overview -->

        <?php
        endforeach;

        echo '</div><!-- .people-container -->';

      endif; ?>

    </div><!-- .area__content -->
  
  </main><!-- #main -->
</div><!-- .content-area -->

<?php
get_footer();
