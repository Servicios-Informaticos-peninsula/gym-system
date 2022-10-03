$(function($){
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


$("#btnBuscarProducto").on('click',function(){
    selectProducto();
});

$("#gridSale").bootstrapTable({
    url: window.url + "/RPP/gridInteresadosAviso",
    classes: "table-striped",
    uniqueId: "id",
    method: "post",
    contentType: "application/x-www-form-urlencoded",
    queryParams: function (p) {
        return {
        producto: $("#search_product").val(),
        };
    },
    pagination: true,
    pageSize: 10,
    columns: [{
        field: "id",
        title: "id",

        visible: false,
    },  {
        field: "name",
        title: "Producto",

        visible: true,
    }, {
        field: "existencia",
        title: "Existencia",

        visible: true,
    }, {
        field: "1",
        title: "Cantidad",

        visible: true,
    }, {
        field: "precio",
        title: "Precio",

        visible: true,
    }, {
        field: "cAccion",
        title: "",

        visible: true,
        formatter: "EditAAccionFormatter",
    }],
    onLoadSuccess: function (data) { },
});

});

function selectProducto(){
    var producto= $("#gridSale").bootstrapTable("getData").length;
    $("#gridSale").bootstrapTable("insertRow", {
        index: producto + 1,
        row: {
            id: producto + 1,
            name: name,
            existencia: existencia,
            cantidad: 1,
            precio: precio,

        },
    });
}
