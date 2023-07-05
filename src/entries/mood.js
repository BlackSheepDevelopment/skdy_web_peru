import '../scss/mood.scss';
import $ from 'jquery';

const mood_header = $('.mood-header');

$(document).ready(function () {
    $('.storytelling').css('margin-top', mood_header.height() + 'px');
});

$(window).on('resize', function () {
    $('.storytelling').css('margin-top', mood_header.height() + 'px');
});

window.addEventListener('wheel', function () {
    const translate = $(document).scrollTop() * 0.15;
    mood_header.css('transform', 'translateY(-' + translate + 'px)');
}, {
    capture: true,
    passive: true
})

$('.layout-video').find('.btn-play').click(function (event) {
    event.preventDefault();
    $(this).hide();
    const iframe = $(this).siblings('iframe');
    iframe.attr('src', iframe.attr('src') + '&autoplay=1');
    iframe.show();
});
