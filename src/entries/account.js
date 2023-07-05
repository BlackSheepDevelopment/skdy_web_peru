import '../scss/account.scss';

import $ from 'jquery';


const title = $('.woocommerce-MyAccount-navigation .is-active a').text();

$('.woocommerce-MyAccount-content').prepend(`<h1>${title}</h1>`);
