@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')

    <div class="container-fluid">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center px-2">
                <h3 class="h2">Lista de Cortes de caja</h3>

            </div>

        </header>

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">
                <div class="container-fluid py-4">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped align-items-center mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Corte inicial</th>
                                            <th>corte final</th>
                                            <th>Hora Corte inicial</th>
                                            <th>Hora Corte final</th>
                                            <th>Total Ventas</th>
                                            <th>Diferencia</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($corte_caja as $row)
                                            <tr>

                                                <td class="text-bold-500">{{$row->name}}</td>
                                                <td class="text-bold-500">$ {{$row->cantidad_inicial }}</td>

                                                <td class="text-bold-500">$ {{$row->cantidad_final }}</td>

                                                <td class="text-bold-500">{{ $row->fecha_inicio }} {{ $row->hora_inicio}}</td>

                                                <td>{{ $row->fecha_final }} {{ $row->hora_final}}</td>
                                                <td>{{ $row->total_venta }} </td>
                                                <td>{{ $row->diferencia}} </td>
                                                @if ( $row->lActivo == 1)

                                                <td>Activo </td>
                                                @else
                                                <td>Inactivo</td>
                                                @endif




                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">

                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- section modales --}}

@endsection
@section('scripts')
<script src="{{asset('js_modulos/product.js')}}">

</script>
@endsection
