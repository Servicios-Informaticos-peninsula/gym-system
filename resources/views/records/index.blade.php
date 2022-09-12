@extends('layouts.app')
@section('content')
    @include('mensajes.mensajes')
    <div class="container-fluid" id="capa_index_record">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h2">Expedientes Clientes</h3>
                {{-- <a href="{{ route('record.create') }}" type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Nuevo Expediente</span>
                </a> --}}
                <button type="button" class="btn btn-primary" id="nuevo_expediente">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Nuevo Expediente</span>
                </button>
            </div>

        </header>
        {{-- <div class="card px-2 mt-4 py-4">
            <div class="col-md-5">
                <label for="">Buscar (Codigo Usuario o Nombre)</label>
                <select id='search_user2' class="form-control">
                    <option value="">Seleccione una Opcion</option>
                    @foreach ($user as $row)
                        <option value="{{ $row->name}}">{{ $row->name }}</option>
                    @endforeach

                </select>
                <input type="text" id="usuario">
                <button type="submit" id="btnid"></button>
            </div>
        </div> --}}

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">

                <div class="container-fluid py-4">

                    <div class="row">

                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive">
                                        <table class="table table-striped align-items-center mb-0" id="gridExpediente">
                                        </table>
                                        <!--  <table class="table table-striped align-items-center mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Cliente</th>
                                                                            <th>N&uacute;mero Expediente</th>

                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    {{-- <tbody>
                                                @foreach ($proveedores as $row)
                                                <tr>

                                                    <td class="text-bold-500">{{$row->name}}</td>
                                                    <td>{{$row->number_phone}}</td>
                                                    <td class="text-bold-500">{{$row->rfc}}</td>
                                                    <td class="text-bold-500">  <div class="row">
                                                        <div class="col-md-6">
                                                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProveedor-{{$row->id}}" title="Editar Proveedor">


                                                                <i class="bi bi-pencil"></i></a>
                                                        </div>
                                                        @include('provider.modales.edit')
                                                        <div class="col-md-6">
                                                            <form action="{{route('provider.destroy',$row->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-icon btn-danger" title="Eliminar Proveedor"><i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div></td>


                                                </tr>
                                                @endforeach
                                            </tbody> --}}
                                                                </table>
                                                            </div>-->

                                    </div>

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
    @include('records.create')
    {{-- section modales --}}
    @include('provider.modales.create')
@endsection
@section('scripts')
    <script>

        let get_user = '{{ route('record.getuser') }}'
        let get_expediente = '{{ route('expediente.get') }}'
        let get_usuario = '{{ route('data.get') }}'
        let get_record = '{{ route('record.get') }}'

        //console.log(get_pdf);
    </script>
    <script src="{{ asset('js_modulos/expedientes.js') }}"></script>
@endsection
