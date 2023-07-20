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
          console.log(e);
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

function changeShipment() {
  const selectElement = $("#select_location")[0];
  const selectOptions = selectElement.options;
  let desiredShipment = "0";
  let savarData = selectOptions[1];
  let primeData = selectOptions[2];

  console.log(savarData.className);
  console.log(primeData.className);

  console.log(savarData.dataset.lcQty);
  console.log(primeData.dataset.lcQty);

  if (
    savarData.className == "wclimloc_savar24" &&
    savarData.dataset.lcQty &&
    parseInt(savarData.dataset.lcQty) > 0
  ) {
    desiredShipment = "0";
  } else if (
    primeData.className == "wclimloc_almacen" &&
    primeData.dataset.lcQty &&
    parseInt(primeData.dataset.lcQty) > 0
  ) {
    desiredShipment = "1";
  } else {
    desiredShipment = "0";
  }

  console.log("desiredShipment: ");
  console.log(desiredShipment);
  $("#select_location").val(desiredShipment);
  $("#select_location").trigger("change");
}

$(".single_add_to_cart_button").on("click", function (event) {
  if (!event.defaultPrevented) {
    // Check if the event has not been prevented already
    event.preventDefault(); // Prevent default behavior of the click event
    console.log("Default behavior prevented!");

    // Some other operations or code can be added here...
    changeShipment();
    // Set a flag to indicate that the event has been triggered once
    event.target.dataset.triggered = "true";

    // Re-trigger the click event after a short delay (you can adjust the delay as needed)
    setTimeout(function () {
      // Check the flag before re-triggering the event
      if (event.target.dataset.triggered === "true") {
        const newEvent = new Event("click");
        event.target.dispatchEvent(newEvent);
      }
    }, 100);
  } else {
    // If the event has already been prevented, reset the flag for future clicks
    event.target.dataset.triggered = "false";
  }
});
