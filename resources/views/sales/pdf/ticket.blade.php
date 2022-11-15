<!DOCTYPE html>



<html>


<div id="imprimir">
<body>
    <style>
        .hr {
            height: 2px;
            width: 400px;
            border: 0px solid #006666;
            background-color: #006666;
            color: #006666;
        }
    </style>

    <div>

        <div class="row" style="position:center;">
            <div class="col-md" style="text-align:center;">
                <span style="text-align:center;">Ticket # {{ $data->carts_id }}</span>
            </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">Folio venta # {{ $data->numero_venta }}</span> </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;"><h2>Spacio Fem's</h2> </span> </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">Ticket de venta</span> </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">C. 84 97297 Mérida, Yuc.</span> </div>
        </div>
        <hr>


        <div style="text-align:center;">
            <table style="margin: 0 auto;">
                <thead>
                    <tr class="centrado">
                        <th style="margin: 0 auto;">CANTIDAD</th>
                        <th style="margin: 0 auto;">PRODUCTO</th>
                        <th style="margin: 0 auto;">PRECIO</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cart as $lst)
                        <tr>
                            <td class="cantidad">{{ $lst->quantity }}</td>
                            <td class="producto">
                                {{ $lst->name }}
                            </td>
                            <td class="precio">
                                ${{ $lst->quantity * $lst->sales_price }}.00
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <br>
                <tr>

                    <td></td>

                    <td class="cantidad"><b>TOTAL</b> </td>

                    <td><b> ${{ $data->price_total }}.00</b></td>


                </tr>


            </table>

            <h2>TIPO DE PAGO</h2>
            <span>{{ $data->tipo_pago }}</span>
            <br>
            <span>Total ${{ $data->price_total }}.00 </span>
            <br>
            <table style="margin: 0 auto;">
                <tbody>
                    <thead></thead>
                    <tr class="centrado">
                        <th style="margin: 0 auto;"><span><b>Pago ${{ $data->cantidad_pagada }}.00</b> </span></th>
                        <th style="margin: 0 auto;"><span><b>--------</b> </span></th>
                        <th style="margin: 0 auto;"><span><b>Cambio ${{ $data->cambio }}.00</b> </span></th>

                    </tr>



                </tbody>
            </table>

            @if ($data->tipo_pago != 'EFECTIVO')
                <p>Folio Transferencia {{ $data->folio_transferencia }}</p>
                <p>Clave Rastreo {{ $data->clave_rastreo }}</p>
            @endif

        </div>
        <hr>
        <div class="row" style="position:center;">
            <div class="col-md" style="text-align:center;">
                <span style="text-align:center;">MUCHAS GRACIAS POR SU COMPRA</span>
            </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">PAGO EN UNA SOLA
                    EXHIBICION</span> </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">LUGAR DE EXHIBICION: MERIDA,
                    YUCATÁN</span> </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">EMAIL:
                    abi_vid@hotmail.com</span> </div>
            <div class="col-md" style="text-align:center;"><span style="text-align:center;">TELÉFONO: 999 242
                    5792</span> </div>
        </div>
    </div>
</body>
</div>

</html>



