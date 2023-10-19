import "../scss/product.scss";

import $ from "jquery";
import "slick-carousel";

$(".layout-video")
    .find(".btn-play")
    .click(function (event) {
        event.preventDefault();
        $(this).hide();
        const iframe = $(this).siblings("iframe");
        iframe.attr("src", iframe.attr("src") + "&autoplay=1");
        iframe.show();
    });

$(".box-info, .more-tech-specs")
    .find(".title")
    .click(function (event) {
        event.preventDefault();
        $(this).siblings(".text").slideToggle();
        $(this).toggleClass("opened");
    });

$("#add-review").click(function (event) {
    event.preventDefault();
    $(this).hide();
    $("#commentform").fadeIn();
});

const testimonies = $(".list-testimonies");
if (testimonies.length > 0) {
    testimonies.slick({
        slidesToShow: 1,
        dots: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                },
            },
        ],
    });
}

function renderSlider() {
    $(".background-slider").slick("slickRemove", null, null, true);
    $("#color")
        .find("option")
        .map(function (i, e) {
            if ($(e).is(":selected")) {
                let gallery = window.galleries[i];

                if (gallery === undefined) {
                    gallery = window.galleries[0];
                }

                $("#product-header, #product-header .container").css(
                    "background-color",
                    gallery.background
                );
                gallery.images.map(function (e) {
                    $(".background-slider").slick(
                        "slickAdd",
                        "" +
                            "<article>" +
                            "  <div>" +
                            "    <picture>" +
                            '      <source srcset="' +
                            e["desktop"] +
                            '" media="(min-width: 551px)" />' +
                            '      <img src="' +
                            e["mobile"] +
                            '">' +
                            "    </picture>" +
                            "  </div>" +
                            "</article>"
                    );
                });
            }
        });
}

$(".list-swatches .swatch").click(function () {
    if (!$(this).hasClass("selected")) {
        $(".swatch.selected").removeClass("selected");
        $(this).addClass("selected");
        $("#color").val($(this).data("color")).trigger("change");
        renderSlider();
    }
});

$(document).ready(function () {
    if (window.galleries.length > 0) {
        $(".background-slider").slick({
            slidesToShow: 1,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                    },
                },
            ],
        });

        renderSlider();
    }
});

$(document).ready(function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const type = urlParams.get("type");
    console.log(type);

    if (type === "mayorist") {
        $(".mayorista_header").css("display", "block");
    }
});
