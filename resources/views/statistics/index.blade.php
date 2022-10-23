@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')

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
                            <div class="p-6 m-20 bg-white rounded shadow">
                                {!! $chart->container() !!}
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
    <script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
    {{-- section modales --}}
    {{-- @include('Membership.modals.create') --}}
@endsection
