$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
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
            document.getElementById("especifique_text").val='';


             $('input[type=checkbox]').prop('checked', false);//

         }
     });
});
