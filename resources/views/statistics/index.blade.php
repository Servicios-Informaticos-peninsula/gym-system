@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')

    <div class="row">
        <div class="col-md-6">

            <div class="container-fluid">
                <header class="card px-2 py-4">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <h3 class="h2">Estadisticas</h3>
                    </div>

                </header>

                <div class="card px-2 mt-4 py-4">
                    <div class="row gx-2 gy-4">
                        <div class="container-fluid py-4">
                            <div class="card mb-4">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select id="txtMes" name="txtMes" class="form-control" autocomplete="off"
                                                data-toggle="tooltip" data-placement="left" title="Ingresa Etapa">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group col-md-12">
                                                <input id="txtAnio" name="txtAnio" type="number" min="0"
                                                    class="form-control" placeholder="0000" value="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <button type="button" id="btnMasVendido" class="btn btn-primary btn-round btn-icon float-left" style="margin: 0px 0px !important;"><i class="bi bi-search"></i></button>
                                        </div>


                                        <div id="chart" class="p-6 m-20 bg-white rounded shadow">
                                            {{-- {!! $chart->container() !!} --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="d-flex justify-content-between align-items-center">
                        {{ $Membership->links('vendor.pagination.bootstrap-4') }}
                    </div> --}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <script src="{{ $chart->cdn() }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ asset('js_modulos/statistics.js') }}"></script>
    <script>
        let masVendidoChart = '{{ route('masVendido.charts') }}';


    </script>

    {{-- {{ $chart->script() }} --}}
    {{-- section modales --}}
    {{-- @include('Membership.modals.create') --}}
@endsection
