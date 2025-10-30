/**
 * Theme scripting
 *
 * @package Luftman_2018
 * @author Postali
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
  "use strict";

 // open modal
$('.modal-btn').click(function() {
  var modal = $(this).data('modal');
  $('#' + modal).addClass('active');
  $('body').addClass('modal-is-active');
  
  // init the fullpage
  if (modal == 'modal-one') {
    // run your modal one settings
    $('#' + modal + ' .sections').fullpage({
      menu: '#guilty-menu',
      anchors: ['guiltyOne', 'guiltyTwo', 'guiltyThree', 'guiltyFour', 'guiltyFive', 'guiltySix'],
      scrollingSpeed: 700
    });
    
  } else if (modal == 'modal-two') {
    // run your modal two settings
    $('#' + modal + ' .sections').fullpage({
      menu: '#innocent-menu',
    anchors: ['innocentOne', 'innocentTwo', 'innocentThree', 'innocentFour', 'innocentFive', 'innocentSix', 'innocentSeven'],
      scrollingSpeed: 700
    });
    
  }
});

// close modal
$('.overlay, .modal-close').click(function() {
  $('body').removeClass('modal-is-active');
  $('.modal').removeClass('active');

  // destroy the fullpage
  $.fn.fullpage.destroy('all');
});

  
});