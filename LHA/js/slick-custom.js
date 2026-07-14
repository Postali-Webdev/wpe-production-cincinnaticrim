/**
 * Theme scripting
 *
 * @package Posali_2019
 * @author Postali
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery(function($) {
    "use strict";

    // Slick customization
    $('.award-wrapper').slick({
        dots: false,
        arrows: false,
        buttons: false,
        infinite: true,
        speed: 500,
        slidesToShow: 5,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1201,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 425,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    // Slick customization
    $('#award-slider').slick({
        dots: false,
        arrows: true,
        buttons: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 425,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    $('.dui-slides').slick({
        dots: false,
        arrows: false,
        buttons: false,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        autoplay: false,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 920,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            },{
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 425,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    $('.prev-button-slick').click(function(){
        $('.dui-slides').slick("slickNext");
    });

    $('.next-button-slick').click(function(){
        $('.dui-slides').slick("slickPrev");
    });

});