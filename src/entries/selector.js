import '../scss/selector.scss';

import $ from 'jquery';
import md5 from 'blueimp-md5';


let answers = '';
const start = $('.start');

start.find('.btn').click(function (event) {
    event.preventDefault();
    start.hide();
    start.next().show();
});

$('.options').find('.btn').click(function (event) {
    event.preventDefault();
    const parent = $(this).parents('.question');
    answers += ($(this).text());
    parent.hide();

    if (parent.next().length > 0) {
        parent.next().show();
    } else {
        $('.questions').hide();
        $('.products').show();
        const _id = md5(answers);
        $('#' + _id).show();
    }
});
