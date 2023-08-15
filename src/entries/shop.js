import "../scss/shop.scss";

import $ from "jquery";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(".filter-category").on("change", function (event) {
    let cat_val = event.target.value;
    let products = $(".product");
    // Filter products that also have the class "product-earbuds"
    let filteredProducts = $(`.product_cat-${cat_val}`);

    // Hide all products first
    products.hide();

    // Show only the filtered products
    filteredProducts.show();
});
