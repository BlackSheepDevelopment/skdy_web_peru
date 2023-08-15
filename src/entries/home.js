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
                arrows: true,
            },
        },
    ],
});
