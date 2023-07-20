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

  console.log("New testing");

  $(".single_add_to_cart_button").on("click", function (e) {
    e.preventDefault();

    const selectElement = $("#select_location")[0];
    const selectOptions = selectElement.options;
    let desiredShipment = "0";

    for (let i = 0; i < selectOptions.length; i++) {
      console.log(i);
      console.log("hello inside for");
      let option = selectOptions[i];
      console.log(option);
      let className = option.attr("class");
      let dataLcQty = option.attr("data-lc-qty");
      console.log(dataLcQty);
      if (
        className === "wclimloc_savar24" &&
        dataLcQty &&
        parseInt(dataLcQty) >= 0
      ) {
        desiredShipment = "0";
      } else if (
        className === "wclimloc_almacen" &&
        dataLcQty &&
        parseInt(dataLcQty) >= 0
      ) {
        desiredShipment = "1";
      } else {
        desiredShipment = "0";
      }
    }

    console.log("desiredShipment: ");
    console.log(desiredShipment);
    $(this).trigger(e.type);
  });
});
