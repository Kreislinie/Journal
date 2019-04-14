<?php
/**
 * The template for displaying archive overview
 *
 * @package bitjournal
 */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" class="grid__main site-main">
      <div class="area__content">
      <h1>bitjournal index</h1>

<div class="auto-row-grid">
    



<?php 
global $wpdb;
$limit = 0;
$year_prev = null;
$months = $wpdb->get_results(
  "SELECT DISTINCT MONTH( post_date ) AS month,
  YEAR( post_date ) AS year, 
  COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'entry' GROUP BY month , 
  year ORDER BY post_date DESC"
);
?>

<div class="archive-overview">

<?php
foreach($months as $month) :

  $year_current = $month->year;

  if ($year_current != $year_prev) :

    if ($year_prev != null) : 
    ?>

      </div>
      <div class="archive-overview">
    
    <?php 
    endif; 
    ?>
      
    <a class="archive-overview__year-link" href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/?post_type=entry"><?php echo $month->year; ?></a>
     
  <?php
  endif; 
  ?>

  <a class="archive-overview__month-link" href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>/?post_type=entry">
  <span class="archive-overview__month"><?php echo date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)); ?></span><span class="archive-overview__count"><?php echo $month->post_count; ?></span></a>

  <?php $year_prev = $year_current; ?>

  <?php
  if(++$limit >= 10000000) { break; }
  
endforeach;
?>

</div><!-- last .archive-overview -->
</div><!-- .auto-row-grid -->
</div><!-- .area__content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
