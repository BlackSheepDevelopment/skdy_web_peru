import '../scss/main.scss';

import $ from 'jquery';

$(window).on('scroll', function () {
    if ($(this).width() > 768) {
        const width = $(window).scrollTop() > 50 ? 26 : 180;
        $('header .logo').css('width', width);
    }
});

$('*[data-menu]').mouseenter(function () {
    const menu = $(this).data('menu');
    const megamenu = $('#' + menu);

    $('.mega-menu-wrapper:not(#' + menu + ')').hide();

    if (!megamenu.is(':visible')) {
        megamenu.fadeIn(300, 'swing', function () {
                megamenu.find('.mega-menu').slideDown(300, 'swing', function () {
                        megamenu.find('article').animate({opacity: 1}, 500);
                    }
                );
            }
        );
    }
});

$('.mega-menu-wrapper').on('mouseover', function (event) {
    if (event.target === this) {
        $(this).fadeOut();
    }
});

const search = $('.search-wrapper');
$('.nav-search').click(function (event) {
    event.preventDefault();
    search.fadeIn(300, 'swing', function () {
        $('input[type=search]').focus();
    });
});

search.find('.close').click(function () {
    search.fadeOut();
});

const mini_cart = $('.cart-wrapper');
const nav_cart = $('.nav-cart');
nav_cart.click(function (event) {
    event.preventDefault();
    mini_cart.fadeIn(400, function () {
        mini_cart.find('.content').slideDown('slow', function () {
            mini_cart.find('.mini-cart').animate({
                opacity: 1
            });
        });
    });
});

mini_cart.find('.close').click(function () {
    mini_cart.find('.mini-cart').animate({
        opacity: 1
    }, {
        complete: function () {
            mini_cart.find('.content').slideUp(400, function () {
                mini_cart.fadeOut();
            });
        }
    });
});

window.show_mini_cart = function () {
    nav_cart.trigger('click');
}

const menu_mobile = $('#menu-mobile');

function toggle_mobile_menu() {
    menu_mobile.animate({
        width: 'toggle'
    }, {
        complete: function () {
            menu_mobile.find('.menu').fadeToggle();
        }
    });
}

$('.menu-toggle').click(function () {
    toggle_mobile_menu();
});

menu_mobile.on('click', function (event) {
    if (event.target === this) {
        toggle_mobile_menu();
    }
});

menu_mobile.find('.dropdown').click(function (event) {
    event.preventDefault();
    $(this).toggleClass('is-open');
    $(this).siblings('ul').slideToggle();
})

$('footer .info article').find('h4').click(function (event) {
    event.preventDefault();
    $(this).toggleClass('opened');
    $(this).siblings('ul').slideToggle();
});
