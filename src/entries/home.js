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

// const products_slider = $(".top-products-container");
// const products_slider_count = products_slider.find(
//     ".top-products-container__item"
// ).length;

// products_slider.slick({
//     slidesToShow: products_slider_count,
//     dots: false,
//     arrows: false,
//     responsive: [
//         {
//             breakpoint: 768,
//             settings: {
//                 slidesToShow: 1,
//                 dots: true,
//             },
//         },
//     ],
// });

// const home_videos = $(".home-picture");
// home_videos.slick({
//     slidesToShow: 1,
//     arrows: true,
//     slidesToScroll: 1,
//     dots: false,
//     prevArrow: $(".home-grid__prev"),
//     nextArrow: $(".home-grid__next"),
// autoplay: true,
// autoplaySpeed: 3000,
// });

// $(document).ready(function () {
//     const products_slider = $(".top-products-container");
//     products_slider.slick({
//         centerMode: true,
//         centerPadding: "150px",
//         slidesToShow: 3,
//         responsive: [
//             {
//                 breakpoint: 9999,
//                 settings: "unslick",
//             },
//             {
//                 breakpoint: 1280,
//                 settings: {
//                     arrows: false,
//                     centerMode: true,
//                     centerPadding: "20px",
//                     slidesToShow: 2,
//                     dots: true,
//                     settings: "slick",
//                 },
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     arrows: false,
//                     centerMode: true,
//                     centerPadding: "20px",
//                     slidesToShow: 1,
//                     dots: true,
//                     settings: "slick",
//                 },
//             },
//         ],
//     });
// });

// $(".home-popup__header__close").click(function () {
//     $("#overlay").css("display", "none");
//     $(".home-popup-newsletter").css("display", "none");
//     $(".home-popup-image").css("display", "none");
// });

$(".home-popup-image__close").click(function () {
    $("#overlay").css("display", "none");
    $(".home-popup-image").css("display", "none");
});

// function reveal() {
//     var reveals = document.querySelectorAll(".reveal");
//     for (var i = 0; i < reveals.length; i++) {
//         var windowHeight = window.innerHeight;
//         var elementTop = reveals[i].getBoundingClientRect().top;
//         var elementVisible = 150;
//         if (elementTop < windowHeight - elementVisible) {
//             reveals[i].classList.add("active");
//         } else {
//             reveals[i].classList.remove("active");
//         }
//     }
// }

// window.addEventListener("scroll", reveal);

$(document).ready(function () {
    // create a countdown timer and create div containers inside a div container with id timer
    var countDownDate = new Date("Nov 27, 2023 00:00:00").getTime();
    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        function addLeadingZero(value) {
            return value < 10 ? "0" + value : value;
        }

        // Update the timer div container with id "timer"
        document.getElementById("timer").innerHTML =
            // Add days
            "<div class='timer__item'><div class='timer__item__number'>" +
            addLeadingZero(Math.floor(distance / (1000 * 60 * 60 * 24))) +
            "</div><div class='timer__item__text'>DÍAS</div></div>" +
            "<div class='timer__item'><div class='timer__item__number'>" +
            addLeadingZero(
                Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                )
            ) +
            "</div><div class='timer__item__text'>HORAS</div></div>" +
            "<div class='timer__item'><div class='timer__item__number'>" +
            addLeadingZero(
                Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
            ) +
            "</div><div class='timer__item__text'>MINUTOS</div></div>" +
            "<div class='timer__item'><div class='timer__item__number'>" +
            addLeadingZero(Math.floor((distance % (1000 * 60)) / 1000)) +
            "</div><div class='timer__item__text'>SEGUNDOS</div></div>";
    }, 1000);
}, false);
