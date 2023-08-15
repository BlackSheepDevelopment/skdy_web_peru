import "../scss/shop.scss";

import $ from "jquery";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(".filter-category").on("change", function (event) {
    let cat_val = event.target.value;
    let new_products = $(`.${cat_val}`);
    console.log(new_products);
    // console.log("heloo");
    // let filteredProducts = products.filter(`.${cat_val}`);
    // console.log(filteredProducts);
});
