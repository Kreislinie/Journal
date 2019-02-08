<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitjournal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<header class="entry-header">
    <?php
    
    // edit link
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bitjournal' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
    );

    if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				bitjournal_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif;

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>
	</header><!-- .entry-header -->

	<?php bitjournal_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bitjournal' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
    ) );
    

    /** 
     * Display people term meta of current post
    */ 

    $people = wp_get_post_terms(get_the_ID(), 'people'); 

    if ( ! empty( $people ) && ! is_wp_error( $people ) ) {

      foreach ( $people as $term ) {
        
        $person_link = get_term_link($term);
        $avatar = wp_get_attachment_image(get_term_meta( $term->term_id, 'bj_people_cmb2_picture_id', true ), array('70') ); ?>

        <a href="<?php echo esc_url( $person_link ); ?>">
          <div class="person-overview-container">
            <?php echo $avatar; ?>
            <h3><?php echo $term->name;?></h3>
          </div> 
        </a>
        <?php
      }

    } 



		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bitjournal' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->



	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
