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

    const slickTesting = $("#slick-testing");
    const slickTestingCount = $("#slick-testing div").length;

    slickTesting.slick({
        slidesToShow: slickTestingCount,
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

// filter-categories__options
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> Add countdown timer and hide element if distance
=======
>>>>>>> Add countdown timer and hide element if distance

// post-171520
// 173942
// $(document).ready(function () {
//     // create a countdown timer and create div containers inside a div container with id timer
//     var countDownDate = new Date("Nov 25, 2023 05:00:00").getTime();
//     // If the current hour more than 5, hide an element with class post-171520 and post-173942
//     var now = new Date().getTime();
//     var distance = countDownDate - now;
//     if (distance < 0) {
//         $(".post-171520").hide();
//         $(".post-173942").hide();
//     }
// }, false);
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> Add countdown timer and hide element if distance
=======
>>>>>>> Add countdown timer and hide element if distance
=======
>>>>>>> Add countdown timer and hide element if distance
$(document).ready(function () {
    // create a countdown timer and create div containers inside a div container with id timer
    var countDownDate = new Date("Nov 24, 2023 23:00:00").getTime();
    // If the current hour more than 5, hide an element with class post-171520 and post-173942
    var now = new Date().getTime();
    var distance = countDownDate - now;
    if (distance < 0) {
        $(".post-162068").hide();
    }
}, false);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> Add countdown timer and hide element if distance
=======
=======
>>>>>>> Add countdown timer and hide element if distance
=======
>>>>>>> Add countdown timer and hide element if distance
>>>>>>> Add countdown timer and hide element if distance
