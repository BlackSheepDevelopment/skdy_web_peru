import '../scss/compare_family.scss';

import $ from 'jquery';

$('.flipper .front .more-specs').click(function () {
    $(this).parents('.flipper').css('transform', 'rotateY(180deg)');
});

$('.flipper .back .btn-back').click(function () {
    $(this).parents('.flipper').css('transform', 'unset');
});
