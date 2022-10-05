$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


    $("#btnBuscarProducto").on('click', function () {
        selectProducto();
    });
    const $codigo = document.querySelector("#search_product");
    $codigo.addEventListener("keydown", evento => {
        if (evento.keyCode === 13) {
            // El lector ya terminó de leer
            const codigoDeBarras = $codigo.value;
            console.log(codigoDeBarras);
            selectProducto();

        }
    });
    $("#cancel_sale").hide();
    $("#cash").hide();
    $("#transfer").hide();
    $("#tipo_pago").hide();
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
        }, {
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
            formatter: "EditAAccionFormatter",
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

});

function selectProducto() {
    if ($("#search_product").val() == 0) {
        swal.fire({
            title: "Aviso",
            text: "Debe seleccionar el folio electrónico para poder consultar la información del folio catastral",
            type: "warning",
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
                onOpen: () => {
                    swal.showLoading();
                },
            });
        },
        success: function (r) {
            NProgress.done();
            swal.close();
            console.log(r);
            if (r.length > 0) {
                var num = $("#gridSale").bootstrapTable("getData").length;

                $("#gridSale").bootstrapTable("insertRow", {
                    index: num + 1,
                    row: {
                        id: num + 1,
                        name: r[0].name,
                        quantity: r[0].quantity,
                        cantidad: "1",
                        sales_price: r[0].sales_price,

                    },
                });
                let total = $("#gridSale").bootstrapTable("getData");
                let precioTotal = 0;
                total.forEach(function (lst) {


                    precioTotal = (lst.sales_price + precioTotal);
                });
                $("#price").val(precioTotal);
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
function reset() {
    $("#gridSale").bootstrapTable("removeAll");
    $("#gridSale").bootstrapTable("refresh");
    $("#search_product").val("");
    $("#price").val("");
    $("#sub_price").val("");
    $("#cancel_sale").hide();
}
