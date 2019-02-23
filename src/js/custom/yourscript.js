"use strict";

jQuery(document).ready( function ($) {

  /**
   * Make single entry person card clickable
   */
  $( '.person-overview' ).click( function () {
    window.location = $(this).data( 'url' );
    return false;
  });

  /**
   * Burger menu navbar right
   */
  $( '.navbar-right' ).on( 'click', function() {
    $(this).toggleClass( 'navbar-right__opened' );
    $(this).toggleClass( 'navbar-right__closed' );
  } );


});