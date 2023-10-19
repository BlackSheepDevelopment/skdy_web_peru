import "../scss/landing_product.scss";
import $ from "jquery";

$(document).ready(function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const type = urlParams.get("type");

    if (type === "mayorist") {
        $(".mayorista_header").css("display", "block");
    }
});
