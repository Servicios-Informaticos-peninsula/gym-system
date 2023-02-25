@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')

    <div class="container-fluid">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center px-2">
                <h3 class="h2">Inventario Productos</h3>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInventory">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Agregar Inventario</span>
                </button>
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
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Alerta Minima</th>
                                            <th>Alerta Maxima</th>
                                            <th>Precio Compra</th>
                                            <th>Precio Venta</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventories as $inventory)
                                            <tr>
                                                <td class="text-bold-500">{{ $inventory->product->name }}</td>

                                                <td class="text-bold-500">{{ $inventory->quantity }}</td>

                                                <td class="text-bold-500">{{ $inventory->minimum_alert }}</td>

                                                <td class="text-bold-500">{{ $inventory->maximun_alert }}</td>

                                                <td class="text-bold-500">{{ $inventory->purchase_price }}</td>

                                                <td class="text-bold-500">{{ $inventory->sales_price }}</td>

                                                <td class="text-bold-500">{{ $inventory->status }}</td>

                                                <td>{{ $inventory->created_at->toDateString() }}</td>

                                                <td class="text-bold-500" style="width: 150px;">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="pe-1">
                                                            <button type="button" class="btn btn-icon btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#editInventory"
                                                                title="Editar producto">

                                                                <i class="bi bi-pencil"></i></button>

                                                            @include('Inventory.modals.edit')
                                                        </div>

                                                        <div class="pe-1">
                                                            <button type="button" class="btn btn-icon btn-secondary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#updateInventoryStatus"
                                                                title="Editar Estado Inventario">

                                                                <i class="bi bi-pencil"></i></button>
                                                            </button>

                                                            @include('Inventory.modals.status')
                                                        </div>

                                                        <div>
                                                            <form action="{{ route('inventario.destroy', $inventory->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-icon btn-danger"
                                                                    title="Eliminar producto">
                                                                    <i class="bi bi-trash"></i>
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
                        {{ $inventories->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- section modales --}}
    @include('Inventory.modals.create')
@endsection
