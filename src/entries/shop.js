import "../scss/shop.scss";

import $ from "jquery";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(".filter__section__button").on("click", function (event) {
    let products = $(".product");
    let cat_val = event.target.id;
    event.target.className += " filter__section__button--active";

    $(".filter__section__button").each(function (index, element) {
        if (element.id !== cat_val) {
            element.className = "filter__section__button";
        }
    });

    products.hide();
    if (cat_val !== "") {
        let filteredProducts = $(`.product_cat-${cat_val}`);
        filteredProducts.show();
    } else {
        products.show();
    }
});
