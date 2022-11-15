let tipoPago = 0;
let motivo = "";
$(function ($) {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


    $("#txtAnio").val(moment().format("YYYY"));
    $("#txtMes").val(moment().format("MM"));
    graficaMasVendido();
    $("#btnMasVendido").click(function () {
        graficaMasVendido();
    });



        // });





});

function graficaMasVendido(){

    $.ajax({
        url: masVendidoChart,
        type: "post",
        dataType: "json",
        data: {
            mes: $("#txtMes").val(),
            anio: $("#txtAnio").val(),


        },
        beforeSend: function () {
            swal.fire({
                title: "Procesando",
                text: "",

                icon:'warning',
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
            console.log(r.data.length);

            if (r.lSuccess) {
                $('#chart').empty();

                var sel = document.getElementById("txtMes");
                var mestext= sel.options[sel.selectedIndex].text;

                var options = {

                series: [{
                        name: r.data.length>0?r.data[0]['name']:"",
                        data: r.data.length>0?[r.data[0]['total']]:[0],
                  }, {
                    name: r.data.length>1?r.data[1]['name']:"",
                    data: r.data.length>1?[r.data[1]['total']]:[0],
                  }, {
                    name: r.data.length>2?r.data[2]['name']:"",
                    data: r.data.length>2?[r.data[2]['total']]:[0],
                  }],
                    chart: {
                    type: 'bar',
                    height: 350
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: '55%',
                      endingShape: 'rounded'
                    },
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                  },
                  xaxis: {
                    categories: [mestext],
                  },
                  yaxis: {
                    title: {
                      text: '(Cantidad)'
                    }
                  },
                  fill: {
                    opacity: 1
                  },
                  tooltip: {
                    y: {
                      formatter: function (val) {
                        return " " + val + " Vendidos"
                      }
                    }
                  }
                  };

                  var chart = new ApexCharts(document.querySelector("#chart"), options);
                  chart.render();




            }




        },
        error: function (err) {
            NProgress.done();
            swal.close();
            alert("Problemas con procedimiento.");
        },
    });


}
