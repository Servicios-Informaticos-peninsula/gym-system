@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')
    <style>
        .table-vcenter {

            td,
            th {
                vertical-align: middle;
            }
        }
    </style>
    <div class="page-heading">
        <h5>Punto de Venta</h5>
    </div>
@if ($ip != "195.179.238.34")
<div class="container-fluid" id="capa_index_record">
    <header class="card px-2 py-4">
        <div class="border-bottom px-3">
            <div class="row">
                <div class="col-md">
                    <input type="number" value="{{ $cConsulta }}" id="countCorte" name="countCorte" hidden>
                    <input type="number" value="{{ $corteCount }}" id="countVoucher" name="countVoucher" hidden>
                    <input type="text" value="{{ $excedido }}" id="excedido" name="excedido" hidden>
                    <label>Fecha</label>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text "><i class="bi bi-calendar-event-fill"></i></span>
                            <input class="form-control" type="date-local" name="" readonly id=""
                                value="<?php echo date('Y-m-d'); ?>">




                        </div>

                    </div>
                </div>
                <input class="form-control" type="date-local" name="origenMembresias" readonly id="origenMembresias"
                    value="{{ $origenMembresias }}" hidden>
                <input class="form-control" type="date-local" name="referenciaMembresia" readonly
                    id="referenciaMembresia" value="{{ $referenciaMembresia }}" hidden>
                <div class="col-md">
                    <label>Hora</label>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text "><i class="bi bi-calendar-event-fill"></i></span>
                            <input class="form-control" type="time-local" name="" readonly id=""
                                value="<?php echo date('h:i', time()); ?>">

                        </div>

                    </div>
                </div>
                <div class="col-md">
                    <label>Vendedor</label>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text "><i class="bi bi-calendar-event-fill"></i></span>
                            <input class="form-control" type="text" name="" id=""
                                value="{{ Auth::user()->name }}" readonly>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </header>
    <div class="row">
        <div class="col-md-8">
            <div class="card px-4 mt-4 py-4">
                <div class="row gx-4 gy-2">

                    <div class="container-fluid py">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        {{-- <span class="input-group-text"><i class="bi bi-search"></i></span> --}}
                                        <input class="form-control" type="text" id="search_product"
                                            name="search_product" placeholder="Escanea o busca el producto"
                                            autocomplete="off">
                                        <button type="button" class="btn btn-primary" title="Buscar Producto"
                                            id="btnBuscarProducto"><i class="bi bi-search"></i> </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">

                                        <button type="button" class="btn btn-primary" style="background:red;"
                                            title="Buscar Producto" id="cancel_sale" name="cancel_sale"><i
                                                class="bi bi-x-octagon"></i>
                                            Cancelar
                                            Venta </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card px-4 mt-4 py-4">
                <div class="row gx-4 gy-4">

                    <div class="container-fluid py-4">
                        <div class="row">

                            <div class="col-md">
                                <div class="card mb">
                                    <h4>Productos</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="gridSale"
                                            data-locale="es-MX">

                                        </table>


                                    </div>


                                    <div class="d-flex justify-content-between align-items-center">
                                        {{-- {{$proveedores->links('vendor.pagination.bootstrap-4')}} --}}
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">


                        <table class="table table-striped table-hover" style="width:100%" id="total">
                            <tr>
                                <th>SubTotal:</th>
                                <td><input type="text" class="form-control" id="sub_price" name="sub_price"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><input type="text" class="form-control" id="price" name="price"
                                        readonly></td>
                            </tr>
                            <tr>
                                <th style="background:white;" id="tipo_pago">Tipo Pago</th>


                            </tr>
                            <tr id="cash">
                                <th>Efectivo</th>
                                <td> <button id="modEfectivo" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalEfectivo">
                                        <i class="bi bi-cash"></i>
                                    </button></td>
                                @include('sales.modales.efectivo')

                            </tr>
                            {{-- <tr id="transfer">
                                <th style="background:white;">Transferencia</th>
                                <td style="background:white;">
                                    <button id="modTransferencia" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalTransferencia">
                                        <i class="bi bi-credit-card"></i>
                                    </button>
                                 </td>
                            </tr> --}}
                            @include('sales.modales.transferencia')
                            @include('sales.modales.corte')
                            @include('sales.modales.corte_final')
                            @include('sales.modales.impresion')
                            @include('sales.modales.membresia')
                        </table>

                    </div>

                </div>


            </div>
            <div class="row">
                <div class="col-md">
                    <button id="btnCorteFinal" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalCorteFinal">
                        <i class="bi bi-x-circle-fill">Corte Final</i>
                </div>
                <div class="col-md">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalMembresia">
                        <i class="bi bi-person-square">Validar Membresia Usuario</i>
                </div>
            </div>

            </button>
        </div>

    </div>


</div>
@else
<script>
    swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "No se puede hacer ventas en produccion",
        confirmButtonText: 'Cerrar'
    })
    console.log("{{ Session::get('code') }}");
</script>
@endif

@endsection

@section('scripts')
    <script>
        let search = '{{ route('search.products') }}';
        let cashPayment = '{{ route('cash.payment') }}';
        let dataCorte = '{{ route('corte.data') }}';
        let cerrarCaja = '{{ route('cerrar.caja') }}';
        let user = '{{ Auth::id() }}';
        let pdfTicket = '{{ route('enviar.ticket') }}'
        let validar = '{{ route('validacion.memnbresia') }}';
    </script>
    <script src="{{ asset('js_modulos/sale.js') }}"></script>
@endsection
