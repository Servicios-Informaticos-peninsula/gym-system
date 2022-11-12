
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
            title: "Creador",
            visible: true,
        }, {
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
        }, {
            field: "cedicion",
            title: "Acciones",
            formatter: "accionesFormatter",
            visible: false
        }],
        onLoadSuccess: function (data) { },

    });



    $("#gridVentas").bootstrapTable({
        url: get_ventas,
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
            title: "Creador",
            visible: true,
        }, {
            field: "cantidad_pagada",
            title: "Total",
            visible: true,
        }, {
            field: "tipo_pago",
            title: "Tipo Pago",
            visible: true,
        },
        {
            field: "carts_id",
            title: "No Carrito",
            visible: true,
        }, {
            field: "cedicion",
            title: "Acciones",
            formatter: "accionesFormatter",
            visible: true
        }],
        onLoadSuccess: function (data) { },

    });



});

function accionesFormatter(value,row){
    let html = "";
    console.log(row);
    html += '<a rel="tooltip" title="Nuevo Expediente" class="btn btn-link btn-primary table-action view" href="javascript:void(0)" onclick="verTicket(' + row.carts_id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16"><path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg></a>&nbsp;';
    return html;
}
function verTicket(id){
let ruta = "/ver/tickets/" + id + "/";
        console.log(id, ruta);
        $.fancybox.open({
            src: ruta,
            type: 'iframe',
            iframe: {
                css: {
                    height: '100%',
                    width: '90%'
                }
            },
            //baseClass: "fancybox-custom-layout",
            infobar: true,
            touch: {
                vertical: false
            },
            buttons: ["close"],
            animationEffect: "fade",
            transitionEffect: "fade",
            preventCaptionOverlap: false,
            idleTime: false,
            gutter: 0,
            // Customize caption area
            caption: function (instance) {
                return '';
            }
        });

}
