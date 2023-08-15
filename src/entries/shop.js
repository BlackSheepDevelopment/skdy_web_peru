import "../scss/shop.scss";

import $ from "jquery";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(".filter__section__button").on("click", function (event) {
    let products = $(".product");
    let cat_val = event.target.id;
    products.hide();
    if (cat_val !== "") {
        let filteredProducts = $(`.product_cat-${cat_val}`);
        filteredProducts.show();
    } else {
        products.show();
    }
});
