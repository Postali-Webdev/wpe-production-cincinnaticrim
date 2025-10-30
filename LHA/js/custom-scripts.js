// These are the scripts that make the Homepage work
	var $j = jQuery.noConflict();
(function($) {
 	$(function() {
		var $width = $(document).outerWidth();
    $(document).ready(function() {		
      // Mobile menu script
      $('#menu-icon').click(function(e){
        e.preventDefault();
        $('#mobile-nav').slideToggle(400);
        // Change this boolean number to adjust animation speed
        $(this).toggleClass('open');
      });

    // Mobile menu sub menu
      $('#mobile-nav .menu-item-has-children').click(function(e){
		if( $width < 1025 ) {
			$(this).toggleClass("open-sub-menu");
			if ($(this).find('ul').hasClass("open")) {
				$('.sub-menu').removeClass('open');
			} else {
				$('.sub-menu').removeClass('open');
				$(this).find('ul').slideToggle(400);
			}
		}
      });

	  // Sidebar nav
	  $('aside .menu-item-has-children').click(function(e){
		$(this).toggleClass("open-sub-menu");
		if ($(this).find('ul').hasClass("open")) {
			$('.sub-menu').removeClass('open');
		} else {
			$('.sub-menu').removeClass('open');
			$(this).find('ul').slideToggle(400);
		}
      });

    });

	});

    // Accordions
    // Clicking on the accordion header title
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    }); 

  	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	$(document).ready(function() {
		function tabableMenu() {
			var screenSize = $(document).outerWidth();
			if( screenSize > 1024 ) {
				var focusActive = false;
				var navMenu = '.menu-item-has-children';

				//do functions below while user is focused on sub menu
				$(navMenu).on('focusin', function(e) {
					var subMenu = $(this).find('.sub-menu');
					//adding active menu state while user is focused on sub menu
					subMenu.addClass('focus-active');
					focusActive = true;

					//remove menu when user tabs away from menus last child item
					$(this).find('.sub-menu li:last-child').on('focusout', function(e) {
						subMenu.removeClass('focus-active');
						focusActive = false;
					});

					//remove active sub menu when user reverse tabs away 
					$(this).on('focusout keydown', function(e) { 
						if (e.type === "focusout" || e.type === "keydown" ) {
							var parentElId = $(e.relatedTarget).parent()[0] !== undefined ? $(e.relatedTarget).parent()[0].id : '';

							if( navMenu.includes(parentElId) && e.shiftKey && e.keyCode == 9 ) {
								subMenu.removeClass('focus-active');
								focusActive = false;
							}
						}
					});

				})

				//remove active sub menu when user clicks anywhere on page outside of the menu
				$('html').on('click', function(e) {
					var target = e.target;
					if( $(target).closest('.sub-menu').length ) {
						return;
					} else {
						if ( focusActive ) {
							$('.sub-menu').removeClass('focus-active');
							focusActive = false;
						}
					}
				});
			} 
		}
		tabableMenu();
		$(window).resize(function() {
			tabableMenu();
		});
	});

	$(document).ready(function() {
		var width = $(window).outerWidth();

		if( width > 768 ) {
			$('.nav-title').on('click', function() {
				$('.in-page-nav-dropdown').slideToggle('medium');
			});

			$('.nav-link').on('click', function() {
				$('.in-page-nav-dropdown').slideToggle('medium');
			});

			$(document).on('scroll', function () {
				if( $('#practice_area_lower_content').length > 0 ) {
					var scrollPos = $(this).scrollTop();
					var startPoint = $('#practice_area_lower_content').offset().top;
		
					if (scrollPos >= startPoint) {
						$('.in-page-nav-container').addClass('active');
					}
		
					if (scrollPos < startPoint) {
						$('.in-page-nav-container').removeClass('active');
					}	
				}
			});
		}
	});

	$(document).ready(function() {
		$('#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children').on('mouseover mouseleave', function(e) {
			if( e.type === "mouseover" ) {
				$(this).find('.sub-menu').slideDown('medium')
			}
			if( e.type === "mouseleave" ) {
				$(this).find('.sub-menu').slideUp('fast')
			}
		});
	});

    	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#menu-main-navigation li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-navigation li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-navigation li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

})(jQuery);