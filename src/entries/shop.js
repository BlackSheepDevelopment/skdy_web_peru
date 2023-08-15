import "../scss/shop.scss";

import $ from "jquery";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(".filter-category").on("change", function (event) {
    let cat_val = event.target.value;
    let products = $(".product");

    products.hide();
    if (cat_val !== "") {
        let filteredProducts = $(`.product_cat-${cat_val}`);
        filteredProducts.show();
    } else {
        products.show();
    }
});
