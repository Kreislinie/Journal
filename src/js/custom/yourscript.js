"use strict";

jQuery(document).ready( function ($) {

  /**
   * Makes elements clickable.
   * Html element needs "link" class. Use data-url html attribute to set url.
   */
  $( '.link' ).click( function () {
    window.location = $( this ).data( 'url' );
    return false;
  });

  /**
   * Burger menu navbar left
   */
  $( '.mobile-nav-wrap' ).on( 'click', function() {
    $( '.mobile-nav' ).toggleClass( 'active' );

    $( '.navbar-left' ).toggleClass( 'open' );

  } );

});