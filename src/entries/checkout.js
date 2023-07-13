import "../scss/checkout.scss";

import $ from "jquery";
import "select2";

let current_step = "billing-step";
const prev_step = $("#prev-step");
const next_step = $("#next-step");
const steps = $(".list-steps");
const images = $(".list-images");

function scrollToNav() {
  if ($(window).width() < 800) {
    $([document.documentElement, document.body]).animate(
      {
        scrollTop: images.offset().top,
      },
      1500
    );
  }
}

next_step.click(function (event) {
  event.preventDefault();
  const billing = $(".billing-step");
  const shipping = $(".shipping-step");

  switch (current_step) {
    case "billing-step":
      shipping.fadeIn();
      billing.hide();
      current_step = "shipping-step";

      steps.find("li").removeClass("active");

      steps.find(".shipping").addClass("active");

      images.find(".active").removeClass("active");
      images.find(".payment").addClass("active");

      next_step.css("visibility", "visible");
      prev_step.css("visibility", "visible");

      scrollToNav();
      break;

    case "shipping-step":
      const billing_district = $("#billing_district2");
      if (billing_district.val() === "") {
        window.alert(
          "Por favor, termine de indicar la dirección de su pedido."
        );
        break;
      } else {
        shipping.hide();
        billing.fadeIn();
        $("#payment").fadeIn();

        current_step = "payment-step";
        steps.find("li").removeClass("active");
        steps.find(".billing").addClass("active");
        images.find(".active").removeClass("active");
        images.find(".billing").addClass("active");
        prev_step.css("visibility", "visible");
        scrollToNav();
        break;
      }
  }
});

prev_step.click(function (event) {
  event.preventDefault();
  const billing = $(".billing-step");
  const shipping = $(".shipping-step");

  switch (current_step) {
    case "shipping-step":
      billing.fadeIn();
      shipping.hide();
      // messages.hide();
      current_step = "billing-step";
      steps.find("li").removeClass("active");
      steps.find(".shipping").addClass("active");
      images.find(".active").removeClass("active");
      images.find(".shipping").addClass("active");

      prev_step.css("visibility", "hidden");

      scrollToNav();
      break;

    case "payment-step":
      shipping.hide();
      billing.fadeIn();
      // messages.hide();
      $("#payment").hide();
      current_step = "billing-step";
      steps.find("li").removeClass("active");
      steps.find(".billing").addClass("active");
      images.find(".active").removeClass("active");
      images.find(".billing").addClass("active");
      next_step.css("visibility", "visible");
      scrollToNav();
      break;
  }
});

window.province_selector_init = function () {
  const selector = jQuery("#billing_city");
  selector.after(function () {
    return (
      '<p class="form-row shipping-step validate-required form-row-wide" id="billing_province_field">' +
      '<label for="billing_province">Provincia&nbsp;<abbr class="required" title="obligatorio">*</abbr></label>' +
      '<span class="woocommerce-input-wrapper">' +
      '<select name="billing_province" id="billing_province">' +
      '<option value="">Elige una opción…</option>' +
      "</select>" +
      "</p>" +
      '<p class="form-row shipping-step validate-required form-row-wide" id="billing_district2_field">' +
      '<label for="billing_district2">Distrito&nbsp;<abbr class="required" title="obligatorio">*</abbr></label>' +
      '<span class="woocommerce-input-wrapper">' +
      '<select name="billing_district2" id="billing_district2">' +
      '<option value="">Elige una opción…</option>' +
      "</select>" +
      "</p>"
    );
  });

  const billing_province = $("#billing_province");
  billing_province.on("change", function () {
    window.update_district_selector();
  });
  billing_province.select2();

  const billing_district = $("#billing_district2");
  billing_district.select2();
  billing_district.on("change", function () {
    const city = $("#billing_city");
    city
      .val(billing_province.val() + " - " + billing_district.val())
      .trigger("change");
  });

  window.update_province_selector();
};

window.update_province_selector = function () {
  const selector = $("#billing_city");
  const province = $("#billing_province");
  const district = $("#billing_district2");
  const options = selector.find("option");
  const data = {};

  options.each(function (i) {
    let value = jQuery(options[i]).attr("value");
    value = value.split(" - ");

    if (value[0] !== "") {
      if (data[value[0]]) {
        data[value[0]].push(value[1]);
      } else {
        data[value[0]] = [value[1]];
      }
    }
  });

  const provinces = Object.keys(data);
  province.empty();
  province.append('<option value="">Elige una opción…</option>');
  for (let i = 0; i < provinces.length; i++) {
    province.append(
      '<option value="' + provinces[i] + '">' + provinces[i] + "</option>"
    );
  }
  district.empty();
  district.append('<option value="">Elige una opción…</option>');

  window.provinces_data = data;
};

window.update_district_selector = function () {
  const province = $("#billing_province");
  const district = $("#billing_district2");
  const districts = window.provinces_data[province.val()];

  district.empty();
  district.append('<option value="">Elige una opción…</option>');
  for (let i = 0; i < districts.length; i++) {
    district.append(
      '<option value="' + districts[i] + '">' + districts[i] + "</option>"
    );
  }
};
