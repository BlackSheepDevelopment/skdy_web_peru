import '../scss/claims_book.scss';

import $ from 'jquery';


$('input[name=menor]').change(function () {
    if ($(this).val() === "Sí") {
        $('.parent').fadeIn();
    } else {
        $('.parent').fadeOut();
    }
});
