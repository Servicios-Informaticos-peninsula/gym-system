console.log("entrando");
$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });

    // $("#product_form").keypress(function (e) {
    //     if (e.which == 13) {
    //         return false;
    //     }
    // });

    let inventario_check = $("#requireInventory");
    let inventario_div = $("#inventory");
    var select = document.getElementById("status");

    inventario_div.show();
    inventario_check.change(function () {
        if (inventario_check.is(':checked')) {
            inventario_div.fadeOut("200");
            $("#sales_price").val("");
            select.remove(select.selectedIndex);
        } else {
            inventario_div.fadeIn("200");

           //$("#status").empty();


            //$('input[name=checkbox]').prop('checked', false);//

        }
    });
});



