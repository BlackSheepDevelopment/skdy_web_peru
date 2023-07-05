import '../scss/shop.scss';

import $ from 'jquery';

$('#sidebar-shop .mobile-collapse').click(function (event) {
    event.preventDefault();
    $('#sidebar-shop .widget').slideToggle();
});
