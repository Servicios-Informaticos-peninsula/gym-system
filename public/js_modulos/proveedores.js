$(function($){
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


    $('#form-provider').validate({
        submitHandler: function (form) {
            let quantity = $("#quantity").val();
            let products_id = $("#products_id").val();
            let purchase_price = $('#purchase_price').val();
            let sale_price = $('#sale_price').val();
            $.ajax({
                type: 'POST',
                url: ruta_inventario,
                data: {
                    quantity: quantity,
                    products_id: products_id,
                    purchase_price: purchase_price,
                    sale_price: sale_price,
                },

                success: function (data) {
                    console.log(data,"entrando al success");








                },
                error: function (err) {
                    swal.close();
                    alert(err);

                    alert("Problemas con procedimiento.");
                },
            })
        }

    })
});

