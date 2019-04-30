"use strict";

jQuery(document).ready( function ($) {

  /**
   * Makes elements clickable.
   * Html element needs "link" class. Use data-url html attribute to set url.
   */
  $( '.link' ).click( function () {
    window.location = $(this).data( 'url' );
    return false;
  });

  /**
   * Burger menu navbar right
   */
  $( '.navbar-right' ).on( 'click', function() {
    $(this).toggleClass( 'navbar-right__opened' );
    $(this).toggleClass( 'navbar-right__closed' );

    $( '.menu-overlay' ).toggleClass( 'menu-overlay__opened' );
    $( '.menu-overlay' ).toggleClass( 'menu-overlay__closed' );
  } );

});