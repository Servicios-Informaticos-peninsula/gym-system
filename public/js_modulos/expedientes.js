
let countPhotos = 0;
$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });
    $("#camera_area").hide();

    $("#path").change(function () {

        showImgs("path", "dataImagenes");
        let filesize = $('path')[0].files[0].size;

    let sizekiloByte = parseInt(filesize / 1024);
    if (sizekiloByte > 2018) {
        swal({
            title: "Error",
            text: "El archivo es mayor a 2MB",
            type: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        document.getElementById("path").value = "";
        $("#btnRemoverImg").hide();
    } else {
        //  var hayArchivos = document.getElementById("fPDF").files.length > 0;
        $("#btnRemoverImg").show();
    }
        });
    // console.log("hola 23234");
    // $('#capa_create_record').hide();
    // $('#nuevo_expediente').on('click', function () {
    //     $('#capa_index_record').fadeOut(1000, function () {

    //         $("#capa_create_record").fadeIn(1000, function () {
    //             $(window).on('resize');
    //         });
    //     });

    // });
    /**Select de busqueda de usuarios */
    // $("#volver_index").on('click', function () {
    //     location.reload();
    // });
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

    //camara
    document.getElementById("startbutton").addEventListener("click", function() {
        var video = document.getElementById('video');
        var canvas = document.getElementById('canvas');
        canvas.getContext('2d').drawImage(video, 100, 0, 480, video.videoHeight, 0, 0, 120, 160);
        var data = canvas.toDataURL('image/png');
        document.getElementById('fotocamara').setAttribute('value', data);  });

    // /**Ocultar otro cirugias */
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

    $('#search_user').on('select2:select', function () {
        getdatos_select();
    });
    $('#search_user2').select2({

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

    $('#search_user2').on('select2:select', function () {

        $("#gridExpediente").bootstrapTable("removeAll");
        $("#gridExpediente").bootstrapTable("refresh");

    });

    /**Ocultar Collapse */
    $("#identificacion").on('click', function () {
        $("#collapseAntecedentes").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapsePeso").collapse("hide");
        $("#collapseFoto").collapse("hide");

    });
    $("#antecedentes").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapsePeso").collapse("hide");
        $("#collapseFoto").collapse("hide");
    });
    $("#habitos").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapseAntecedentes").collapse("hide");
        $("#collapsePeso").collapse("hide");
        $("#collapseFoto").collapse("hide");
    });
    $("#peso").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapseAntecedentes").collapse("hide");
        $("#collapseFoto").collapse("hide");
    });
    $("#foto").on('click', function () {
        $("#collapseIdentificacion").collapse("hide");
        $("#collapsePsico").collapse("hide");
        $("#collapseAntecedentes").collapse("hide");
        $("#collapsePeso").collapse("hide");
    });
    /**validar inputs que no se necesiten */
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
          //  $('input[type=checkbox]').prop('checked', false);//

        }
    });

    /**Ocultar otro cirugias */
    var otro = $("#otro");
    var especifique = $("#especifique");
    var especifique_text = document.querySelector('#especifique_text');
    especifique.hide();
    otro.change(function () {
        if (otro.is(':checked')) {
            especifique.fadeIn("200");

        } else {
            especifique.fadeOut("200");
            especifique_text.value = '';


            //$('input[name=checkbox]').prop('checked', false);//

        }
    });


    var alergias = $("#alergias");
    var alergias_descripcion = $("#alergias_descripcion");
    var alergias_text = document.querySelector('#alergias_text');
    alergias_descripcion.hide();
    alergias.change(function () {
        if (alergias.is(':checked')) {
            alergias_descripcion.fadeIn("200");

        } else {
            alergias_descripcion.fadeOut("200");
            alergias_text.value = '';
            //$('input[type=checkbox]').prop('checked', false);//

        }
    });

    /**bootstrap table del grid de expediente */
    $("#gridExpediente").bootstrapTable({
        url: get_expediente,
        classes: "table-striped",
        method: "post",
        contentType: "application/x-www-form-urlencoded",

        pagination: true,
        pageSize: 10,
        detailView: true,
        columns: [{
            field: "id",
            title: "ID",
            visible: false,
        }, {
            field: "code_user",
            title: "Codigo Usuario",
            visible: true,
        }, {
            field: "numero_control",
            title: "Numero Expediente",
            visible: true,
        }, {
            field: "name",
            title: "Cliente",
            visible: true,
        },{
            field: "cedicion",
            title: "Acciones",
            formatter: "accionesFormatter",
        }],
        onLoadSuccess: function (data) { },
        onExpandRow: function (index, row, $detail) {
            indexp = index;
            expandTable(row, $detail.html("<table class='table table-striped table-bordered' cellspacing='0'></table>").find("table"));
        },
    });





});


function getdatos_select(e) {
    let a = document.getElementById("search_user").value;
    $("#users_id").val(a);
    let user_id = $("#users_id").val();
    console.log(user_id, "..", a);

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
console.table(data);
            if (data) {
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#phone").val(data.phone);
                $("#ocupation").val(data.ocupation);
                $("#born").val(data.born);
                $("#age").val(data.age);
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
    let date_now = $("#date_now").val();
    let date_born = $("#born").val();
    let a = Math.abs(date_now.getTime() - date_born.getTime());



    console.log(a);
}

function open_Camera(){

    $("#camera_area").show();

    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );
}

function take_snapshot() {

    let nameI = "path";

    var archivos = document.getElementById(nameI).files;
    console.log(archivos);

    Webcam.snap( function(data_uri) {
        let container = new DataTransfer();
        $.each(archivos, function (index, archivo) {
            $("#" + 'path').empty();
            var reader = new FileReader();
            if (archivo) {

                    setTimeout(function () {
                            reader.readAsDataURL(archivo);
                            container.items.add(dataURLtoFile(reader.result, "captura.jpeg"));
                    }, 100);
                }


        });
        var fileC = dataURLtoFile(data_uri, "captura.jpeg");
        container.items.add(fileC);
        // container.items.add(document.getElementById('path').files );
        document.querySelector('#path').files =  container.files;

         showImgs("path", "dataImagenes");

        // $('path')[0].files[0].val(data_uri);



    } );
}
function dataURLtoFile(dataurl, filename) {

    var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, { type: mime });
}



function showImgs(IDfImagenes, divDataImagenes) {
    // alert("fotos"+IDfImagenes);
    var archivos = document.getElementById(IDfImagenes).files;

    $.each(archivos, function (index, archivo) {
        $("#" + divDataImagenes).empty();
        var reader = new FileReader();
        if (archivo) {
                var html = "";
                setTimeout(function () {
                    reader.readAsDataURL(archivo);
                    reader.onloadend = function () {
                        html =
                            '<div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6 contenedorImagenes">' +
                            '<div class="font-icon-detail-img">' +
                            '<img class="zoom img-file-input" id="img' +
                            index +
                            '" " src="' +
                            reader.result +
                            '" height="100%" width="100%" />' +
                            '<p class="p-without-m-b-t"><span class="span-name-img">' +
                            archivo.name +
                            "</span></p>" +
                            "</div>" +
                            "</div>";
                        $("#" + divDataImagenes).append(html);
                    };
                }, 100);
            }


    });

    //'<img class="zoom img-file-input" id="img' + index + '" onclick="showFancyBox($(this))" src="' + reader.result + '"/>' +
}




function verExpediente(id) {
    console.log(id, window.url);
    $.fancybox.open({
        src: "/pdf/expediente/" + id + "/",
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
function verFotos(id) {
    console.log(id, window.url);
    $.fancybox.open({

        src: "/fotos/pdf/expediente/" + id + "/",
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

function editarVista(id) {
    console.log(id)
    window.open('vista/modificar/' + id, "_self");
}
function expandTable(row, $detail) {
    console.log(row, "--", $detail);
    $detail.bootstrapTable({
        url: get_record,
        method: "post",
        contentType: "application/x-www-form-urlencoded",
        queryParams: function (p) {
            return {
                user_id: row.id,
                code_user: row.code_user
            };
        },
        detailView: true,
        icons: {
            detailOpen: "fas fa-plus",
            detailClose: "fas fa-minus",
        },
        pagination: true,
        pageSize: 10,
        columns: [{
            field: "id",
            title: "id",

            visible: false,
        }, {
            field: "numero_control",
            title: "Numero Expediente",

        }, {
            field: "cedicion",
            title: "Acciones",
            formatter: "editFormatter",
        }],
        onLoadSuccess: function (data) {
            $detail.bootstrapTable("hideLoading");
        },
        // onExpandRow: function(index, row, $detail) {
        //     indexp = index;
        //     expandSubTable(row, $detail.html("<table class='table table-striped table-bordered' cellspacing='0'></table>").find("table"));
        // },
    });
    $detail.bootstrapTable("showLoading");
    $detail.bootstrapTable("refresh");
}
function editFormatter(value, row) {
    console.log(row);
    let html = "";

    html += '<a rel="tooltip" title="Ver Expediente" class="btn btn-link btn-primary table-action view" href="javascript:void(0)" onclick="verExpediente(' + row.id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/></svg></a>&nbsp;';
    html += '<a rel="tooltip" title="Ver Expediente" class="btn btn-link btn-primary table-action view" href="javascript:void(0)" onclick="verFotos(' + row.id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-image-fill" viewBox="0 0 16 16"><path d="M4 0h8a2 2 0 0 1 2 2v8.293l-2.73-2.73a1 1 0 0 0-1.52.127l-1.889 2.644-1.769-1.062a1 1 0 0 0-1.222.15L2 12.292V2a2 2 0 0 1 2-2zm4.002 5.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/><path d="M10.564 8.27 14 11.708V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-.293l3.578-3.577 2.56 1.536 2.426-3.395z"/></svg></a>&nbsp;';
    return html;
}
function accionesFormatter(value,row){
    let html = "";
    console.log(row);
    html += '<a rel="tooltip" title="Nuevo Expediente" class="btn btn-link btn-primary table-action view" href="javascript:void(0)" onclick="editarVista(' + row.id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16"><path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg></a>&nbsp;';
    return html;
}
// function take_snapshot() {
//     Webcam.snap( function(data_uri) {
//         $(".image-tag").val(data_uri);
//         document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
//     } );
// }
