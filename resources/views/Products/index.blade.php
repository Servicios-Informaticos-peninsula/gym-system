@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')

    <div class="container-fluid">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center px-2">
                <h3 class="h2">Lista Productos</h3>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Agregar Productos</span>
                </button>
            </div>

        </header>

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">
                <div class="container-fluid py-4">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive">
                                <table
                                    class="table table-responsive table-bordered table-striped align-items-center mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Unidad de Medida</th>
                                            <th>Proveedor</th>
                                            <th>Categoria</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="text-bold-500">
                                                    {{ $product->name }}<br>
                                                    <span>Código Barras: <strong>{{ $product->bar_code }}</strong></span>
                                                </td>

                                                <td class="text-bold-500">{{ $product->productUnit->name }}</td>

                                                <td class="text-bold-500">
                                                    @if ($product->productProvider != null)
                                                        <span>{{ $product->productProvider->name }}</span>
                                                    @else
                                                        <span class="text-danger">N/A</span>
                                                    @endif
                                                </td>

                                                <td class="text-bold-500">
                                                    @if ($product->productCategory != null)
                                                        <span>{{ $product->productCategory->name }}</span>
                                                    @else
                                                        <span class="text-danger">N/A</span>
                                                    @endif
                                                </td>

                                                <td>{{ $product->created_at->toDateString() }}</td>

                                                <td class="text-bold-500" style="width: 150px;">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="pe-1">
                                                            <button type="button" class="btn btn-icon btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#editProduct"
                                                                title="Editar producto">

                                                                <i class="bi bi-pencil"></i></button>

                                                            @include('Products.modals.edit')
                                                        </div>

                                                        <div>
                                                            <form action="{{ route('products.destroy', $product->id) }}"
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
                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- section modales --}}
    @include('Products.modals.create')
@endsection
@section('scripts')
    <script src="{{ asset('js_modulos/product.js') }}"></script>
@endsection
