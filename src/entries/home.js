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

const waveContainer = document.querySelector(".wave-container");
const numBars = 10; // Number of wave bars

function createWaveBars() {
    for (let i = 0; i < numBars; i++) {
        const frequency = Math.random() * 3 + 1; // Generate random frequency (adjust range as needed)
        const waveBar = document.createElement("div");
        waveBar.classList.add("wave-bar");
        waveBar.style.animationDuration = frequency + "s"; // Set animation duration based on frequency
        waveContainer.appendChild(waveBar);
    }
}

createWaveBars();
