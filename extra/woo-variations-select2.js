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
  console.log("Testing in woo variation");
});

jQuery("#select_location").on("change", function (event) {
  console.log("Testing select location");
  console.log(!$(".wcmlim_cart_valid_err"));
  console.log($(".wcmlim_cart_valid_err"));
  console.log($(".wcmlim_cart_valid_err").length);
  console.log("que pasaaa ");
  // if ($(".wcmlim_cart_valid_err").length === 0) {
  // $(".variations_form ").submit();
  // }
});
