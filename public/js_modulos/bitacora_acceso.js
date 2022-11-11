
$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


    /**bootstrap table del grid de expediente */

    $("#gridAcceso").bootstrapTable({
        url: bitacora_acceso,
        classes: "table-striped",
        method: "post",
        contentType: "application/x-www-form-urlencoded",
        locale: "es-MX",
        pagination: true,
        pageSize: 10,
        // detailView: true,
        columns: [{
            field: "id",
            title: "ID",
            visible: false,
        }, {
            field: "name",
            title: "Usuario",
            visible: true,
        }, {
            field: "user_agent",
            title: "Sistema",
            visible: true,
        }, {
            field: "ip_address",
            title: "I.P",
            visible: true,
        },
        {
            field: "payload",
            title: "Tipo Session",
            visible: true,
        }, {
            field: "last_activity",
            title: "id_activity",

            visible: false
        }],
        onLoadSuccess: function (data) { },

    });





});

