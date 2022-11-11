@extends('layouts.app')
@section('content')
    @include('mensajes.mensajes')
    <div class="container-fluid" id="capa_index_record">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h2">Bitacora Accesos</h3>


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
                                        <table class="table table-striped align-items-center mb-0" id="gridAcceso">
                                        </table>


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


@endsection
@section('scripts')
<script>
 let bitacora_acceso = '{{route('bitacora.acceso')}}'
</script>
<script src="{{asset('js_modulos/bitacora_acceso.js')}}"></script>
@endsection
