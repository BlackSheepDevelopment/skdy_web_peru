import "../scss/shop.scss";

import $ from "jquery";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(".filter-category").on("change", function (event) {
    let cat_val = event.target.value;
    let products = $(".product");
    console.log(products);

    let filteredProducts = products.filter(cat_val);
    console.log(filteredProducts);
});
