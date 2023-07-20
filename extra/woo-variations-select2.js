let doneShipment = false;

jQuery(document).ready(function ($) {
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
});

$(".single_add_to_cart_button").on("click", function (e) {
  console.log("New testing 2");
  if (!doneShipment) {
    e.preventDefault();

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
    doneShipment = true;
  }

  $(this).trigger("click");
});
