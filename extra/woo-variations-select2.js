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

  const chooseShipment = () => {
    const selectElement = $("#select_location")[0];
    const selectOptions = selectElement.options;
    console.log(selectOptions);
    console.log("Checking options");

    for (let option of selectOptions) {
      console.log(option);
      console.log(option.className); // "Option 1" and "Option 2"
      console.log(option.value); // "Option 1" and "Option 2"
    }

    // for (let i = 0; i < 3; i++) {
    //   console.log(i);
    //   console.log("hello inside for");
    //   let option = selectOptions[i];
    //   console.log(option);
    //   let classvalue = option.className;
    //   let dataLcQty = option.dataset.lcQty;
    //   console.log(className);
    //   console.log(dataLcQty);
    //   if (
    //     classvalue === "wclimloc_savar24" &&
    //     dataLcQty &&
    //     parseInt(dataLcQty) >= 0
    //   ) {
    //     return "0";
    //   } else if (
    //     classvalue === "wclimloc_almacen" &&
    //     dataLcQty &&
    //     parseInt(dataLcQty) >= 0
    //   ) {
    //     return "1";
    //   } else {
    //     return "0";
    //   }
    // }
  };
  const shipment_selected = chooseShipment();
  console.log(shipment_selected);

  $("#select_location").val(shipment_selected);
  $("#select_location").trigger("change");
});
