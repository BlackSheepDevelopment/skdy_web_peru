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

  function removeOptionsAndSetSelected() {
    // Step 1: Remove options with class name attribute and data-lc-qty equal to 0
    $("#select_location option").each(function () {
      const className = $(this).attr("class");
      const dataLcQty = $(this).attr("data-lc-qty");

      if (className && dataLcQty && parseInt(dataLcQty) === 0) {
        $(this).remove();
      }
    });

    // Step 2: Set the active (selected) option to the one with a class name attribute
    const selectedOption = $("#select_location option[class]").first();
    if (selectedOption.length > 0) {
      selectedOption.prop("selected", true);
    }
  }

  // Call the function to apply the changes
  removeOptionsAndSetSelected();

  // console.log($("#select_location"));

  // $("#select_location").on("select2:select", function (e) {
  //   console.log("hello");
  //   var data = e.params.data;
  //   console.log(data);
  // });
  // console.log("hello");
});
