
$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


    /**bootstrap table del grid de expediente */
    $("#gridCancelacion").bootstrapTable({
        url: get_bitacora,
        classes: "table-striped",
        method: "post",
        contentType: "application/x-www-form-urlencoded",
locale:"es-MX",
        pagination: true,
        pageSize: 10,
       // detailView: true,
        columns: [{
            field: "id",
            title: "ID",
            visible: false,
        }, {
            field: "name",
            title: "Creador",
            visible: true,
        },{
            field: "cSistema",
            title: "Sistema",
            visible: true,
        }, {
            field: "cSistema",
            title: "No Venta",
            visible: true,
        },
        {
            field: "motivo",
            title: "Motivo",
            visible: true,
        },{
            field: "cedicion",
            title: "Acciones",
            formatter: "accionesFormatter",
            visible: false
        }],
        onLoadSuccess: function (data) { },

    });







});

