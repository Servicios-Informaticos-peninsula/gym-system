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
    <div class="container-fluid" id="capa_index_record">
        <header class="card px-2 py-4">
            <div class="border-bottom px-3">
                <div class="row">
                    <div class="col-md">
                        <label>Fecha</label>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span class="input-group-text "><i class="bi bi-calendar-event-fill"></i></span>
                                <input class="form-control" type="date-local" name="" id=""
                                    value="<?php echo date('Y-m-d'); ?>">

                            </div>

                        </div>
                    </div>
                    <div class="col-md">
                        <label>Hora</label>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span class="input-group-text "><i class="bi bi-calendar-event-fill"></i></span>
                                <input class="form-control" type="time-local" name="" id=""
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

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">

                <div class="container-fluid py-4">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    {{-- <span class="input-group-text"><i class="bi bi-search"></i></span> --}}
                                    <input class="form-control" type="text" id="search_product" name="search_product"
                                        placeholder="Escanea o busca el producto">
                                    <button type="button" class="btn btn-primary" title="Buscar Producto"
                                        id="btnBuscarProducto"><i class="bi bi-search"></i> </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">

                                    <button type="button" class="btn btn-primary" style="background:red;"
                                        title="Buscar Producto" id="search_product"><i class="bi bi-x-octagon"></i> Cancelar
                                        Venta </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter" id="gridSale">
                                        </table>


                                    </div>

                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- {{$proveedores->links('vendor.pagination.bootstrap-4')}} --}}
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive">
                                        <table class="table table-striped align-items-center mb-0" id="gridSale">
                                        </table>

                                        <table class="table table-striped align-items-center mb-0" style="width:100%">
                                            <tr>
                                                <th>SubTotal:</th>
                                                <td>Bill Gates</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>555 77 854</td>
                                            </tr>

                                        </table>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js_modulos/sale.js') }}"></script>
@endsection
