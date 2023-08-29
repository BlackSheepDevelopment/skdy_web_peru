import "../scss/home.scss";

import $ from "jquery";
import "slick-carousel";

$("#home-grid")
    .find("section")
    .click(function () {
        window.location.href = jQuery(this).data("href");
    });

const gallery = $("#gallery");
const gallery_count = gallery.find(".media").length;

gallery.slick({
    slidesToShow: gallery_count,
    dots: false,
    arrows: false,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                dots: true,
            },
        },
    ],
});

const products_slider = $(".top-products-container");
products_slider.slick({
    centerMode: true,
    centerPadding: "150px",
    slidesToShow: 3,
    responsive: [
        {
            breakpoint: 9999,
            settings: "unslick",
        },
        {
            breakpoint: 1280,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: "20px",
                slidesToShow: 2,
                dots: true,
                settings: "slick",
            },
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: "20px",
                slidesToShow: 1,
                dots: true,
                settings: "slick",
            },
        },
    ],
});

const enterate_slider = $(".enterate__container");
enterate_slider.slick({
    slidesToShow: 3,
    responsive: [
        {
            breakpoint: 9999,
            settings: "unslick",
        },
        {
            breakpoint: 1280,
            settings: {
                centerPadding: "20px",
                slidesToShow: 1,
                dots: true,
                settings: "slick",
            },
        },
    ],
});
