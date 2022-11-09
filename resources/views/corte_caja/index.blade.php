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
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($products as $product)
                                            <tr>
                                                <td class="text-bold-500">
                                                    {{ $product->name }}<br>
                                                    <span>Código Barras: <strong>{{ $product->bar_code }}</strong></span>
                                                </td>

                                                <td class="text-bold-500">{{ $product->productUnit->name }}</td>

                                                <td class="text-bold-500">{{ $product->productProvider->name }}</td>

                                                <td class="text-bold-500">{{ $product->productCategory->name }}</td>

                                                <td>{{ $product->created_at }}</td>

                                                <td class="text-bold-500" style="width: 150px;">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="pe-1">
                                                            <button type="button" class="btn btn-icon btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editProduct"
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
                                        @endforeach --}}
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
