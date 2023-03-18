@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')

    <div class="container-fluid">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h2">Lista de Colaboradores</h3>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addColaborator">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Agregar Colaborador</span>
                </button>
            </div>
        </header>

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive">
                                        <table class="table table-striped align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Codigo de Colaborador</th>
                                                    <th>Nombre (s)</th>
                                                    <th>Apellidos</th>
                                                    <th>Usuario</th>
                                                    <th>N&uacute;mero</th>
                                                    <th>Correo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($workers as $worker)
                                                    <tr>
                                                        <td class="text-bold-500">{{ $worker->code_user }}</td>
                                                        <td class="text-bold-500">{{ $worker->name }}</td>
                                                        <td class="text-bold-500">{{ $worker->surnames }}</td>
                                                        <td class="text-bold-500">{{ $worker->username }}</td>
                                                        <td class="text-bold-500">{{ $worker->phone }}</td>
                                                        <td class="text-bold-500">{{ $worker->email }}</td>
                                                        <td class="text-bold-500">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editColaborator-{{ $worker->id }}"
                                                                        title="Editar Colaborador">

                                                                        <i class="bi bi-pencil"></i></a>
                                                                        @include('Workers.modales.edit')
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <button type="button" class="btn btn-warning"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editPermisisons-{{ $worker->id }}"
                                                                        title="Editar Permissions">

                                                                        <i class="bi bi-pencil"></i></a>
                                                                        @include('Workers.modales.permissions')
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <form
                                                                        action="{{ route('workers.destroy', $worker->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-icon btn-danger"
                                                                            title="Eliminar Colaborador"><i
                                                                                class="bi bi-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
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
                                {{ $workers->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- section modales --}}
    @include('Workers.modales.create')
@endsection
