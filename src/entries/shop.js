import "../scss/shop.scss";

import $ from "jquery";
import "slick-carousel";

$("#sidebar-shop .mobile-collapse").click(function (event) {
    event.preventDefault();
    $("#sidebar-shop .widget").slideToggle();
});

$(document).ready(function () {
    const url = new URL(window.location.href);
    const paths = url.pathname.split("/").slice(1);
    console.log(paths);
    var cat = null;
    if (paths[1] !== undefined) {
        cat = paths[1];
    }

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

    // let products = $(".product");
    // products.hide();
    // if (cat !== null) {
    //     let filteredProducts = $(`.product_cat-${cat}`);
    //     filteredProducts.show();
    // } else {
    //     products.show();
    // }
});

$(".filter__section__button").on("click", function (event) {
    let cat_val = event.target.id;
    let currentURL = window.location.href;
    // console.log(currentURL);
    // let url = new URL(currentURL);

    if (cat_val !== "") {
        window.location.href = `/shop/${cat_val}`;
    } else {
        window.location.href = `/shop/`;
    }
});

$(".filter-categories__options").slick({
    slidesToShow: 2,
    responsive: [
        {
            breakpoint: 1280,
            settings: {
                slidesToScroll: 2,
                infinite: true,
            },
        },
    ],
});

// filter-categories__options
