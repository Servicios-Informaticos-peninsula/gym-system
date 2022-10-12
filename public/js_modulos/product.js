console.log("entrando");
$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });

    $("#product_form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});



