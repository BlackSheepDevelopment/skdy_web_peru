import "../scss/checkout.scss";

import $ from "jquery";
import "select2";

let current_step = "billing-step";
const prev_step = $("#prev-step");
const next_step = $("#next-step");
const steps = $(".list-steps");
const images = $(".list-images");

const order_review = $("#see-more");

let hide_status = true;

function scrollToNav() {
  $([document.documentElement, document.body]).animate(
    { scrollTop: 0 },
    "slow"
  );
}

order_review.click(function (event) {
  event.preventDefault();

  $(".order-review--hidable").each(function () {
    if (hide_status) {
      $(this).fadeIn();
      $(this).css("display", "block");
    } else {
      $(this).hide();
      $(this).css("display", "none");
    }
  });

  if (hide_status) {
    $(".order-review__toggle__btn").css("transform", "rotate(45deg)");
    hide_status = false;
  } else {
    $(".order-review__toggle__btn").css("transform", "rotate(0deg)");
    hide_status = true;
  }
});

next_step.click(function (event) {
  event.preventDefault();
  const billing = $(".billing-step");
  const shipping = $(".shipping-step");

  switch (current_step) {
    case "billing-step":
      const billing_name = $("#billing_first_name");
      const billing_lastName = $("#billing_last_name");
      const billing_mail = $("#billing_email");
      const billing_id = $("#billing_id");

      if (
        !validateName(billing_name.val()) ||
        !validateLastName(billing_lastName.val())
      ) {
        window.alert("Por favor, indique correctamente su nombre y apellido.");
        break;
      }

      if (!validateEmail(billing_mail.val())) {
        window.alert("Por favor, indique correctamente su correo electrónico.");
        break;
      }

      if (!validateNumber(billing_id.val())) {
        window.alert("Por favor, indique correctamente su DNI o Factura.");
        break;
      }

      shipping.fadeIn();
      shipping.attr("style", "display:block!important");

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
      const billing_address = $("#billing_address_1");
      const billing_phone = $("#billing_phone");

      if (billing_district.val() === "") {
        window.alert(
          "Por favor, indique correctamente el distrito de su pedido."
        );
        break;
      }

      if (billing_address.val() === "") {
        window.alert("Por favor, indique correctamente su dirección.");
        break;
      }

      if (!validateNumber(billing_phone.val())) {
        window.alert("Por favor, indique correctamente su número telefónico.");
        break;
      }

      shipping.hide();
      billing.hide();
      $("#payment").attr("style", "display:block!important");
      $("#payment").fadeIn();

      current_step = "payment-step";

      steps.find("li").removeClass("active");
      steps.find(".payment").addClass("active");
      images.find(".active").removeClass("active");
      images.find(".payment").addClass("active");
      prev_step.css("visibility", "visible");
      next_step.css("visibility", "hidden ");

      scrollToNav();
      break;
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
      current_step = "billing-step";
      steps.find("li").removeClass("active");
      steps.find(".billing").addClass("active");
      images.find(".active").removeClass("active");
      images.find(".shipping").addClass("active");

      prev_step.css("visibility", "hidden");

      scrollToNav();
      break;

    case "payment-step":
      shipping.fadeIn();
      shipping.attr("style", "display:block!important");
      billing.hide();
      $("#payment").hide();
      current_step = "shipping-step";

      steps.find("li").removeClass("active");
      steps.find(".shipping").addClass("active");
      images.find(".active").removeClass("active");
      images.find(".shipping").addClass("active");
      next_step.css("visibility", "visible");
      scrollToNav();
      break;
  }
});

window.province_selector_init = function () {
  const selector = $("#billing_city");
  selector.after(function () {
    return (
      '<p class="form-row shipping-step validate-required form-row-first" id="billing_province_field">' +
      '<label for="billing_province">Provincia&nbsp;<abbr class="required" title="obligatorio">*</abbr></label>' +
      '<span class="woocommerce-input-wrapper">' +
      '<select name="billing_province" id="billing_province">' +
      '<option value="">Elige una opción…</option>' +
      "</select>" +
      "</p>" +
      '<p class="form-row shipping-step validate-required form-row-last" id="billing_district2_field">' +
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

const validateName = (name) => {
  if (name.trim() === "") {
    return false; // Empty string is invalid
  }

  const pattern = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$/;

  return pattern.test(name);
};

const validateLastName = (lastName) => {
  if (lastName.trim() === "") {
    return false; // Empty string is invalid
  }

  // Regular expression pattern for validating Spanish last names
  const pattern = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$/;

  return pattern.test(lastName);
};

const validateEmail = (email) => {
  if (email.trim() === "") {
    return false; // Empty string is invalid
  }

  // Regular expression pattern for validating email addresses
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  return pattern.test(email);
};

const validateNumber = (number) => {
  if (number.trim() === "") {
    return false; // Empty string is invalid
  }

  // Regular expression pattern for validating ID (only numbers)
  const pattern = /^\d+$/;

  return pattern.test(number);
};

$(document).ready(function () {
  const billing_invoice = $("#billing_invoice_field").children();
  const span_billing = billing_invoice[1];
  const detail_span = span_billing.children[1];
  const more_detail = detail_span.children[0];
  const even_more_detail = more_detail.children[0];
  const further_more_detail = even_more_detail.children[0];

  further_more_detail.addEventListener("DOMSubtreeModified", () => {
    if (further_more_detail.lastChild !== null) {
      if (further_more_detail.lastChild.textContent.trim() === "Factura") {
        $(".hide-factura").css("display", "block");
      } else {
        $(".hide-factura").css("display", "none");
      }
    }
  });
});
