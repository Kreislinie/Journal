<?php
/*
 * Custom template tags
 */

// Prints HTML with meta information for the current post-date/time.
function bitjournal_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<a class="bj-posted-on">' . $time_string . '</a>'
	);

	echo $posted_on;

}

