$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });

    $("#btnBuscarProducto").on('click', function () {
        selectProducto();
    });
    $("#modEfectivo").click(function () {

        $("#cantidad_pagada").val("");
        $("#cambio").val("");

    });
    $("#btnCobrarE").click(function () {

       cobrarEfectivo();

    });

    const $codigo = document.querySelector("#search_product");
    $codigo.addEventListener("keydown", evento => {
        if (evento.keyCode === 13) {
            // El lector ya terminó de leer
            const codigoDeBarras = $codigo.value;
            // console.log(codigoDeBarras);
            selectProducto();

        }
    });
    $("#cancel_sale").hide();
    $("#cash").hide();
    $("#transfer").hide();
    $("#tipo_pago").hide();

    $("#cantidad_pagada").change(function () {

        calcularCambio();


    });




    $("#gridSale").bootstrapTable({

        classes: "table-striped",
        uniqueId: "id",
        method: "post",
        contentType: "application/x-www-form-urlencoded",
        locale: "es",
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
        },{
            field: "id_product",
            title: "IDProducto",

            visible: false,
        }, {
            field: "lineReference",
            title: "reference",

            visible: false,
        },{
            field: "name",
            title: "Producto",

            visible: true,
        }, {
            field: "quantity",
            title: "Existencia",

            visible: true,
        }, {
            field: "cantidad",
            title: "Cantidad",

            visible: true,
        }, {
            field: "sales_price",
            title: "Precio",

            visible: true,
        }, {
            field: "cAccion",
            title: "",

            visible: true,
            formatter: "EditAccionFormatter",
        }],
        onLoadSuccess: function (data) { },
    });
    $("#search_product").focus();

    $("#cancel_sale").on('click', function () {

        swal.fire({
            title: '¿Esta Seguro de Cancelar la Compra?',

            icon: 'warning',
            showDenyButton: true,
            confirmButtonColor: '#3085d6',
            denyButtonColor: "#FF8400",
            confirmButtonText: '¡Si!',
            denyButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                reset();
                Swal.fire('Venta Cancelada!', '', 'success');

            } else if (result.isDenied) {
                Swal.fire('Continue con el proceso de venta', '', 'info')
            }

        });

    });
    // $("#form_sale").validate({
    //     rules: {

    //     }
    // });

});

function selectProducto() {
    if ($("#search_product").val() == 0) {
        swal.fire({
            title: "Aviso",
            text: "Ingrese  Producto",
            icon: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        return false;
    }
    $.ajax({
        url: search,
        type: "post",
        dataType: "json",
        data: {
            producto: $("#search_product").val()
        },
        beforeSend: function () {
            swal.fire({
                title: "Información de Producto",
                text: "Consultando la base de informacion.",
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    swal.showLoading();
                },
            });
        },
        success: function (r) {
            NProgress.done();
            swal.close();
            // console.log(r);
            if (r.length > 0) {
                // console.log("encontrado");
                let table = $("#gridSale").bootstrapTable("getData");
                // console.log(table);
                if (table.length == 0) {
                    var num = $("#gridSale").bootstrapTable("getData").length;
                    r.forEach(function (product) {
                        $("#gridSale").bootstrapTable("insertRow", {
                            index: num + 1,
                            row: {
                                id: num + 1,
                                name: product.name,
                                id_product:product.id_product,
                                cantidad: product.cantidad,
                                quantity:product.lmembresia == true? product.quantity:product.quantity-1,
                                lineReference:product.lineReference,
                                lmembresia:product.lmembresia,

                                sales_price: product.sales_price,

                            },
                        });

                    });

                } else {
                    // console.log("lista",table, "producto,",r[0].id_product);

                    if(r[0].lmembresia == false){


                    let i = 0;
                    let cambio;

                    table.forEach(function (lst) {

                        if (lst.id_product == r[0].id_product && lst.lmembresia == r[0].lmembresia) {
                                    cambio = true;
                                    let cantidad = lst.quantity;
                                    if(cantidad== 0){
                                        swal.fire({
                                            icon: "info",
                                            title: "Producto ya no disponible",
                                            text: "",

                                            showConfirmButton: true,
                                            confirmButtonClass: "btn btn-primary btn-round",
                                            confirmButtonText: "Aceptar",
                                            buttonsStyling: false,
                                        });

                                    }else{
                                    $("#gridSale").bootstrapTable('updateRow', {

                                        index: i,
                                        row: {
                                            id_product:lst.id_product,
                                            cantidad: lst.cantidad+1,
                                            lineReference:lst.lineReference,
                                            sales_price: ((lst.cantidad + 1) * r[0].sales_price),
                                            quantity: cantidad-1,
                                            lmembresia:lst.lmembresia
                                        }
                                    });
                                }

                                }
                                i++;
                    });



                    if(!cambio){
                        var num = $("#gridSale").bootstrapTable("getData").length;
                        $("#gridSale").bootstrapTable("insertRow", {
                            index: num + 1,
                            row: {
                                id: num + 1,
                                id_product:r[0].id_product,
                                name: r[0].name,
                                cantidad: r[0].cantidad,
                                quantity: r[0].quantity,
                                lineReference:r[0].lineReference,
                                lmembresia:r[0].lmembresia,


                                sales_price: r[0].sales_price,

                            },
                        });

                    }



                }else{



                    var num = $("#gridSale").bootstrapTable("getData").length;
                    let incluido= false;
                    r.forEach(function (product) {
                        table.forEach(function (lst) {


                            if(product.lineReference == lst.lineReference ){
                                // console.log(product.lineReference,lst.lineReference);
                                // console.log(product.lineReference == lst.lineReference);
                                incluido = true;
                                swal.fire({
                                    icon: "info",
                                    title: "Membresia ya en la lista",
                                    text: "",

                                    showConfirmButton: true,
                                    confirmButtonClass: "btn btn-primary btn-round",
                                    confirmButtonText: "Aceptar",
                                    buttonsStyling: false,
                                });



                            }else{

                                if(!incluido){
                                    $("#gridSale").bootstrapTable("insertRow", {
                                        index: num + 1,
                                        row: {
                                            id: num + 1,
                                            name: product.name,
                                            id_product:product.id_product,
                                            cantidad: product.cantidad,
                                            quantity:product.quantity,
                                            lineReference:product.lineReference,
                                            lmembresia:product.lmembresia,

                                            sales_price: product.sales_price,

                                        },
                                    });

                                }
                            }
                        });

                    });

                }




                }

                let total = $("#gridSale").bootstrapTable("getData");
                let precioTotal = 0;
                total.forEach(function (lst) {


                    precioTotal = (lst.sales_price + precioTotal);
                });
                $("#price").val(precioTotal);
                $("#price_total").val(precioTotal);
                $("#sub_price").val(precioTotal);

                $("#search_product").val("");
                $("#cancel_sale").show();
                $("#cash").show();
                $("#transfer").show();
                $("#tipo_pago").show();
            } else {
                swal.fire({
                    icon: "info",
                    title: "Busqueda fallida",
                    text: "No existe ese producto o no esta en existencia",

                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-primary btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
                $("#search_product").val("");
            }




        },
        error: function (err) {
            NProgress.done();
            swal.close();
            alert("Problemas con procedimiento.");
        },
    });

}
function calcularCambio() {
    let cambio = "0";

    if ($("#cantidad_pagada").val().length > 0) {

            cambio = Number($("#cantidad_pagada").val()) - Number($("#price_total").val());

            if(cambio<0){
                swal.fire({
                    title: "Aviso",
                    text: "Ingrese  pago valido",
                    icon: "warning",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-success btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });

                $("#cantidad_pagada").val("");
                $("#cambio").val("");

            }else{
                $("#cambio").val(Number(cambio).toFixed(2));
            }

}}
function reset() {
    $("#gridSale").bootstrapTable("removeAll");
    $("#gridSale").bootstrapTable("refresh");
    $("#search_product").val("");
    $("#price").val("");
    $("#sub_price").val("");
    $("#cancel_sale").hide();
}
function EditAccionFormatter(value, row) {
    // console.log(row);
    var html = "";
    html = '<a href="javascript:void(0);" onclick="eliminarProducto(' + row.id + ')" class="btn btn-round btn-danger btn-icon btn-sm" rel="tooltip" data-toggle="tooltip" title="Eliminar"><i class="bi bi-x-circle"></i></a>&nbsp;' + "<script>$('[data-toggle=" + '"' + "tooltip" + '"' + "]').tooltip() </script>";
    return html;
}
function eliminarProducto(id) {
    console.log(id);
    $(".tooltip").hide();
    $("#gridSale").bootstrapTable("removeByUniqueId", id);
}

function cobrarEfectivo(){
    let total = $("#gridSale").bootstrapTable("getData");
    let precioTotal = 0;
    let totalproductos = 0;
    total.forEach(function (lst) {


        precioTotal = (lst.sales_price + precioTotal);
        totalproductos =   (lst.cantidad + totalproductos);
    });

    $.ajax({
        url: cashPayment,
        type: "post",
        dataType: "json",
        data: {
            cambio: $("#cambio").val(),
            pago: $("#cantidad_pagada").val(),
            productos: total,
            precioTotal: precioTotal,
            totalproductos: totalproductos,
        },
        beforeSend: function () {
            swal.fire({
                title: "Procesando",
                text: "Pago en Efectivo",

                icon:'warning',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    swal.showLoading();
                },
            });
        },
        success: function (r) {
            console.log(r.voucher.id);
let id = r.voucher.id;
            NProgress.done();
            swal.close();

            if(r.lSuccess){
                swal.fire({
                    title: "Listo",
                    text: "cobro realizado",
                    icon: "success",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-success btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                }).then((result) => {
window.location.reload();
                })
                $("#cantidad_pagada").val("");
                $("#cambio").val("");
                $("#modalEfectivo").hide();
                if ($('.modal-backdrop').is(':visible')) {
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                  };

                  window.open("/sales/tickets/" + id + "/", '_blank');

                reset();


            }




        },
        error: function (err) {
            NProgress.done();
            swal.close();
            alert("Problemas con procedimiento.");
        },
    });


}

function ticket(id) {

    $.fancybox.open({

        src: "/sales/tickets/" + id + "/",
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
            window.print("/sales/tickets/" + id + "/");
        }
    });
}
