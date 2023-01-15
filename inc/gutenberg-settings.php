<?php

/**
 * Updates gutenberg editor settings.
 */
function bj_gutenberg_editor_settings() {
  wp_add_inline_script('wp-data', "window.onload = function() {
    wp.data.dispatch('core/editor').disablePublishSidebar(); // Disables pre publish check.
  }" );
}
add_action( 'enqueue_block_editor_assets', 'bj_gutenberg_editor_settings', 20 );
