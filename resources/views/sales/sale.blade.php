@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')
    <div class="page-heading">
        <h3>Punto de Venta</h3>
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
                </div>
                <div class="row">
                    <div class="col-md">
                        <label>Vendedor</label>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span class="input-group-text "><i class="bi bi-calendar-event-fill"></i></span>
                                <input class="form-control" type="text" name="" id=""
                                    value="{{Auth::user()->name}}" readonly>

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


                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
