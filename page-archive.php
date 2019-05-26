<?php
/**
 * The template for displaying archive overview
 *
 * @package bitjournal
 */

get_header();
?>

<div id="primary" class="page-archive content-area">
  <main id="main" class="grid__main site-main">

    <header class="entry-header area__head">
      <h1><?php echo esc_html__('Archive', 'bitjournal') ?></h1>
    </header><!-- .entry-header -->

    <div class="area__content auto-grid">

      <?php 
      /**
       * 
       */
      global $wpdb;
      $limit = 0;
      $year_prev = null;
      $archive = $wpdb->get_results(
        "SELECT DISTINCT MONTH( post_date ) AS month,
        YEAR( post_date ) AS year, 
        COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'entry' GROUP BY month,
        year ORDER BY post_date DESC"
      );

      /**
       * Generates an outputs archive overview structure.
       * 
       * Structure:
       * 'div.archive-overview' always contains one year with
       * the corresponding year date 'a.archive-overview__year-link' and 
       * every moth 'a.archive-overview__month-link' in which one or more entry was written.
       */

       /**
       * Opens first div.archive-overview.
       */
      echo '<div class="archive-overview">';

        foreach($archive as $date) :

          $year_current = $date->year;

          if ($year_current != $year_prev) :

            if ($year_prev != null) { 
              echo '</div><div class="archive-overview">';
            }

            /**
             * Prints year and link to year archive.
             */
            printf('<a class="archive-overview__year-link" href="%s/%s/?post_type=entry">%s</a>', get_bloginfo('url'), $date->year, $date->year);

          endif; 

          /**
           * Gets month archive URL.
           */
          $url_month = get_bloginfo('url') . '/' . $date->year . '/' . date("m", mktime(0, 0, 0, $date->month, 1, $date->year)) . '/?post_type=entry';
          ?>

          <a class="archive-overview__month-link" href="<?php echo $url_month ?>">
            <span class="archive-overview__month"><?php echo date_i18n("F", mktime(0, 0, 0, $date->month, 1, $date->year)); ?></span>
            <span class="archive-overview__count"><?php echo $date->post_count; ?></span>
          </a>

          <?php 

          $year_prev = $year_current;
        
        endforeach;

      /**
       * Closes last div.archive-overview.
       */
      echo '</div>';

      ?>


    </div><!-- .area__content -->
  
  </main><!-- #main -->
</div><!-- .content-area -->

<?php
get_footer();
