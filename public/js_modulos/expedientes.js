$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });

    /**Select de busqueda de usuarios */

    $('#search_user').select2({
        width: '100%',
        placeholder: "Seleccione una Opcion",
        allowClear: true,
        language: {
            noResults: function () {
                return "No hay resultado";
            },
            searching: function () {
                return "Buscando..";
            },
        },

    });

    $('#search_user').on('select2:select', function () {
        getdatos_select();
    });

    /**Ocultar Collapse */
    $("#identificacion").on('click', function () {
        $("#collapseAntecedentes").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapsePeso").collapse("hide");
    });
    $("#antecedentes").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapsePeso").collapse("hide");
    });
    $("#habitos").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapseAntecedentes").collapse("hide");
        $("#collapsePeso").collapse("hide");
    });
    $("#peso").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapseAntecedentes").collapse("hide");
    });
    /**Ocultar inputs hostpitalizacion */
    var hospitalizacion = $("#hospitalizacion");
    var hospitalizacion_fisica = $("#hospitalizacion_fisica");
    hospitalizacion_fisica.hide();
    hospitalizacion.change(function () {
        if (hospitalizacion.is(':checked')) {
            hospitalizacion_fisica.fadeIn("200");

        } else {
            hospitalizacion_fisica.fadeOut("200");
            $("#fecha_hospitalizacion").val("");
            $("#causa").val("");
            $('input[type=checkbox]').prop('checked', false);//

        }
    });

    /**Ocultar otro cirugias */
    var otro = $("#otro");
    var especifique = $("#especifique");
    especifique.hide();
    otro.change(function () {
        if (otro.is(':checked')) {
            especifique.fadeIn("200");

        } else {
            especifique.fadeOut("200");
            document.getElementById("especifique_text").val = '';


            $('input[type=checkbox]').prop('checked', false);//

        }
    });

    /**Restar fechas */
    $("#date_now").datetimepicker({
        format: "DD/MM/YYYY",
        locale: "es",
        icons: {
            time: "far fa-clock",
            date: "far fa-calendar-alt",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-screenshot",
            clear: "fa fa-trash",
            close: "fa fa-remove",
        },
    });
    $("#date_now").val(moment().format("DD/MM/YYYY"));
});


function getdatos_select(e) {
    let a = document.getElementById("search_user").value;
    $("#user_id").val(a);
    let user_id = $("#user_id").val();


    $.ajax({
        url: get_user,
        type: "post",
        dataType: "json",
        data: {
            user_id: user_id
        },
        async: true,
        cache: false,
        beforeSend: function () {

            swal.fire({
                icon: "success",
                title: "Datos del cliente",
                text: "Obteniendo la información, Espere Por Favor...",

            });
        },
        success: function (data) {

            if (data) {
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#phone").val(data.phone);
                $("#collapseIdentificacion").collapse("show");
                NProgress.done();
                swal.fire({
                    icon: "success",
                    title: "Clientes",
                    text: "Se encontraron los datos de manera exitosa",

                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-primary btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
            } else {
                NProgress.done();
                swal.fire({
                    icon: "info",
                    title: "Clientes",
                    text: "Lo siento no pude obtener los datos de ese cliente",

                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-primary btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
            }
        }
    });

}

function calcular_edad() {
    let date_now = new Date();
    let date_born = $("#born").val();
    let a =Date.parse(date_born);

    let calculo = date_now-a;
    console.log(calculo, date_now, a);
}

