jQuery(document).ready(function ($) {
  let changedShipment_bool = false;

  if (window.product_layout === "layout-1") {
  }
  switch (window.product_layout) {
    case "layout-1":
      function formatResult(state) {
        if (!state.id) return state.text;

        return $(
          '<img src="' +
            window.swatches_images[state.element.index] +
            '" alt="' +
            state.text +
            '" />' +
            "<span>" +
            state.text +
            "</span>"
        );
      }

      break;
  }

  function formatSelected(state) {
    if (!state.id) return state.text;

    switch (window.product_layout) {
      case "layout-1":
        $("#product-header .background source").attr(
          "srcset",
          window.gallery_images[state.element.index]["desktop"]
        );
        $("#product-header .background img").attr(
          "src",
          window.gallery_images[state.element.index]["mobile"]
        );

        return $(
          '<img src="' +
            window.swatches_images[state.element.index] +
            '" alt="' +
            state.text +
            '" />' +
            "<span>" +
            state.text +
            "</span>"
        );
      case "layout-2":
        $('.list-swatches .swatch[data-color="' + state.text + '"]').addClass(
          "selected"
        );
    }

    return $("<span>" + state.text + "</span>");
  }

  $("#color option").first().remove();
  $("#color").select2({
    minimumResultsForSearch: -1,
    dropdownParent: $(".summary.entry-summary"),
    templateResult: formatResult,
    templateSelection: formatSelected,
  });

  function locationFormatResult(state) {
    if (state.text === " - Select Location - ") {
      return " - Tipo de envío - ";
    }
    return state.text.replace("Out of Stock", "Agotado");
  }

  function locationFormatSelected(state) {
    if (state.text === " - Select Location - ") {
      return " - Tipo de envío - ";
    }
    return state.text.replace("Out of Stock", "Agotado");
  }

  $("#select_location").select2({
    minimumResultsForSearch: Infinity,
    templateResult: locationFormatResult,
    templateSelection: locationFormatSelected,
  });

  $("#select_location").on("change", function (e) {
    changeShipment(e);
  });

  $(".swatch").on("click", function (e) {
    changedShipment_bool = false;
    changeShipment(e);
  });

  $("#color").on("change", function (e) {
    changedShipment_bool = false;
    changeShipment(e);
  });

  $(".single_add_to_cart_button").prop("disabled", true);

  setTimeout(triggerShipping, 2500);

  function triggerShipping() {
    $("#select_location").val("-1");
    $("#select_location").trigger("change");
  }

  function changeShipment(event) {
    if (!changedShipment_bool) {
      console.log("Changing...");
      const selectElement = $("#select_location")[0];
      const selectOptions = selectElement.options;
      let desiredShipment = "0";
      let savarData = selectOptions[1];
      let primeData = selectOptions[2];

      if (
        savarData.className == "wclimloc_savar24" &&
        savarData.dataset.lcQty &&
        parseInt(savarData.dataset.lcQty) > 0
      ) {
        if ($(".no-stock__container").length > 0) {
          $(".no-stock__container").css("display", "none");
        }
        desiredShipment = "0";
      } else if (
        primeData.className == "wclimloc_almacen" &&
        primeData.dataset.lcQty &&
        parseInt(primeData.dataset.lcQty) > 0
      ) {
        if ($(".no-stock__container").length > 0) {
          $(".no-stock__container").css("display", "none");
        }
        desiredShipment = "1";
      } else {
        desiredShipment = "0";
        if ($(".no-stock__container").length > 0) {
          $(".no-stock__container").css("display", "block");
        } else {
          $(".Wcmlim_container").append(
            `<div class="no-stock__container">El producto se encuentra agotado.</div>`
          );
        }

        $(".single_add_to_cart_button").css("display", "none");
        $(".single_add_to_cart_button").prop("disabled", true);
        $(".quantity").css("display", "none");
        event.preventDefault();
        return;
      }

      changedShipment_bool = true;
      $("#select_location").val(desiredShipment);
      $("#select_location").trigger("change");
      $(".single_add_to_cart_button").css("display", "block");
      $(".single_add_to_cart_button").prop("disabled", false);
      $(".quantity").css("display", "block");
    }
  }
});
