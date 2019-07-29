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
      
      <h1 class="entry-title"><?php esc_html_e('Tags', 'bitjournal') ?></h1>
      
    </header><!-- .entry-header -->
      
    <div class="area__content entry-content">

      <?php

      $tags = get_tags(); 


      if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) :
        echo '<div class="tags">';

        foreach ( $tags as $tag ) :
          
          $tag_link = get_term_link( $tag );
          ?>

          <a class="tag-overview" href="<?php echo $tag_link ?>"><span><?php echo $tag->count; ?></span><?php echo $tag->name; ?></a>

        <?php
        endforeach;
        echo '</div><!-- .person-overview -->';
      endif; ?>

    </div><!-- .area__content -->
  
  </main><!-- #main -->
</div><!-- .content-area -->

<?php
get_footer();
