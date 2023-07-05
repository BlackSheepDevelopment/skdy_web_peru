import '../scss/inside.scss';

import $ from 'jquery';
import 'slick-carousel';

$('.layout-slider .slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                dots: true
            }
        }
    ]
});

$('.layout-slider .navbar').slick({
    'slidesToShow': 4,
    'slidesToScroll': 1,
    'arrows': false,
    'asNavFor': '.layout-slider .slider',
    'centerMode': true,
    'focusOnSelect': true
});
