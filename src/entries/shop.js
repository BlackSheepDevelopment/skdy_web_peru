import "../scss/shop.scss";

import $ from "jquery";
import "slick-carousel";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const cat = urlParams.get("cat");

    $(".filter__section__button").each(function (index, element) {
        if (element.id === cat) {
            if (cat === "ofertas") {
                element.className +=
                    " filter__section__button--ofertas--active";
            } else {
                element.className += " filter__section__button--active";
            }
        } else if (element.id === "" && cat === null) {
            element.className += " filter__section__button--active";
        }
    });

    let products = $(".product");
    products.hide();
    if (cat !== null) {
        let filteredProducts = $(`.product_cat-${cat}`);
        filteredProducts.show();
    } else {
        products.show();
    }
});

$(".filter__section__button").on("click", function (event) {
    let cat_val = event.target.id;
    const urlParams = new URLSearchParams(window.location.search);

    if (cat_val !== "") {
        urlParams.set("cat", cat_val);
        window.location.search = urlParams;
    } else {
        window.location.search = "";
    }
});
