@extends('layouts.app')

@section('content')
    @include('mensajes.mensajes')
<style>
    p {
    color: red;
}
</style>



{{-- {{dd($errors->all())}} --}}
    <div class="container-fluid" id="capa_create_record">

        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h2">Creacion Expediente Cliente</h3>
                <a type="button" class="btn btn-warning" id="volver_index" href="{{route('record.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Volver</span>
                </a>
            </div>

        </header>
        <div class="card-body">
            <div class="card py-3">
                {{-- {{dd($user)}} --}}
                <form action="{{ route('record.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div aria-multiselectable="false" class="card-collapse" id="listaAcordion" role="tablist">
                        <div class="border-bottom px-3">
                            <div class="row">

                                <div class="col-md-2">
                                    <strong>Nombre Cliente:</strong>
                                </div>
                                <div class="col-md-5">
                                    <select id='search_user' name="search_user" class="form-control">
                                        <option value="">Seleccione una Opcion</option>

                                        @foreach ($user as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }} / {{ $row->code_user }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md">
                                   <a href="#" tabindex="-1"
                                        data-toggle="tooltip"
                                        title="Debe Seleccionar la opcion Nombre cliente"><i class="bi bi-patch-question"></i></a>
                                </div>
                                <input type="text" id="users_id" name="users_id" value ="" hidden >
                                @error('users_id')
                                <p class="error-message">{{ $message }}</p>
                            @enderror

                            </div>

                        </div>

                        <hr>
                        {{-- identificacion --}}

                        <div class="border-bottom px-3">

                            <a data-bs-toggle="collapse" href="#collapseIdentificacion" role="button" aria-expanded="false"
                                aria-controls="collapseIdentificacion" id="identificacion">

                                <h5 class="h5 mb-2"><i class="bi bi-person-badge-fill"></i> Identificacion   <i
                                        class="bi bi-chevron-compact-down"></i> </h5>

                            </a>

                        </div>
                        <div class="collapse modal-body" id="collapseIdentificacion" data-parent="#listaAcordion">
                            <div class="row">
                                <div class="col-md">
                                    <label>Fecha Entrevista</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            {{-- <input class="form-control" type="datetime-local" name="date_interview"
                                                id="date_interview" value="<?php echo date('d/m/Y HH:mm'); ?>" hidden> --}}
                                                <input  class="form-control" type="datetime-local" name="date_interview" id="date_interview"   value="<?php echo date("Y-m-d H:m");?>" >
                                            @error('date_interview')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Profesión/Ocupación</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text" name="ocupation"
                                                id="ocupation" value="{{old('ocupation')}}">
                                                @error('ocupation')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Fecha de Nacimiento</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="date" name="born"
                                                id="born" value="{{old('born')}}">
                                                @error('born')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <input type="text" id="date_now" name="date_now" value="<?php echo date('Y-m-d'); ?>" hidden
                                    readonly>
                                <div class="col-md">
                                    <label>Edad</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" name="age" type="number"
                                                id="age" min="0" onclick="calcular_edad()"  value="{{old('age')}}">
                                                @error('age')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                            </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">

                                        <label>Nombre Completo</label>



                                    <div class="form-group mb-4">
                                        <div class="input-group">

                                            <span
                                                class="input-group-text @error('name') border border-danger text-danger @enderror"><i
                                                    class="ni ni-zoom-split-in"></i></span>

                                            <input class="form-control" name="name" id="name" type="text"
                                                autocomplete="off" value="{{old('name')}}">

                                        </div>
                                        @error('name')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Número de Celular</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" name="phone" id="phone" type="number"
                                                autocomplete="off" value="{{old('phone')}}">

                                        </div>
                                        @error('phone')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Correo Electrónico</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" name="email" id="email" type="text"
                                                autocomplete="off" value="{{old('email')}}">

                                        </div>
                                        @error('email')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                            </div>


                        </div>
                        <hr>
                        {{-- antecedentes --}}
                        <div class="border-bottom px-3">
                            <a id="antecedentes" data-bs-toggle="collapse" href="#collapseAntecedentes" role="button"
                                aria-expanded="false" aria-controls="collapseAntecedentes">
                                <h5 class="h5 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                                    </svg> Antecedentes Personales en General <i class="bi bi-chevron-compact-down"></i>
                                </h5>
                            </a>


                        </div>
                        <div class="collapse" id="collapseAntecedentes" data-parent="#listaAcordion">
                            <div class="card card-body">
                                <div class="border-bottom px-3">
                                    <label for="">Enfermedades crónicas </label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group mb-4">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>Hipertension Arterial</th>
                                                            <th>Asma</th>
                                                            <th>Epilepsia</th>
                                                            <th>Inflamacion Nervio Ciático</th>
                                                            <th>Diabetes</th>
                                                            <th>Lumbagia</th>
                                                            <th>Arritmias Cardiacas</th>
                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="hipertension"
                                                                    id="hipertension" value="on"    {{ old('hipertension') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="asma" id="asma" value="on" {{ old('asma') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="epilepsia" id="epilepsia" value="on" {{ old('epilepsia') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="ciatica" id="ciatica" value="on" {{ old('ciatica') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="diabetes" id="diabetes" value="on" {{ old('diabetes') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="lumbagia" id="lumbagia" value="on" {{ old('lumbagia') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="arritmia" id="arritmia" value="on"{{ old('arritmia') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-bottom px-3">

                                    <label for="">Enfermedades mentales </label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group mb-4">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>Ansiedad</th>
                                                            <th>Depresión</th>
                                                            <th>Depresión Postparto</th>
                                                            <th>Estrés crónico</th>
                                                            <th>Estrés postraumático</th>

                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="ansiedad" id="ansiedad" value="on" {{ old('ansiedad') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="depresion" id="depresion" value="on" {{ old('depresion') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="depre_postparto"
                                                                    id="depre_postparto" value="on" {{ old('depre_postparto') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="estres_cronico"
                                                                    id="estres_cronico" value="on" {{ old('estres_cronico') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="estres_postraumatico"
                                                                    id="estres_postraumatico" value="on" {{ old('estres_postraumatico') == 'on' ? 'checked' : '' }}></td>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-bottom px-3">

                                    <label for="">Enfermedades de transmisión sexual (ETS):</label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group mb-4">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>VPH (Virus de Papiloma Humano)</th>
                                                            <th>Herpes</th>
                                                            <th>Sifilis</th>
                                                            <th>Gonorrea</th>
                                                            <th>SIDA</th>
                                                            <th>Clamidia</th>

                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="papiloma_humano"
                                                                    id="papiloma_humano" value="on" {{ old('papiloma_humano') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="herpes" id="herpes" value="on" {{ old('herpes') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="sifilis" id="sifilis" value="on" {{ old('sifilis') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="gonorrea" id="gonorrea" value="on" {{ old('gonorrea') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="sida" id="sida" value="on" {{ old('sida') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="clamidia" id="clamidia" value="on" {{ old('clamidia') == 'on' ? 'checked' : '' }}>
                                                            </td>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-bottom px-3">
                                    <label for="">Ha presentado o presenta alguna de las siguientes condiciones
                                        físicas: </label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group mb-4">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>Desmayos</th>
                                                            <th>Mareos</th>
                                                            <th>Pérdidas del conocimientos</th>
                                                            <th>Hospitalizacion</th>

                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="desmayos" id="desmayos" value="on" {{ old('desmayos') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="mareos" id="mareos" value="on" {{ old('mareos') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="perdida_conocimiento"
                                                                    id="perdida_conocimiento" value="on" {{ old('perdida_conocimiento') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="hospitalizacion"
                                                                    id="hospitalizacion" value="on" {{ old('hospitalizacion') == 'on' ? 'checked' : '' }}></td>

                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="row" id="hospitalizacion_fisica">
                                            <div class="col-md">
                                                <label>Fecha Hospitalizacion</label>
                                                <div class="form-group mb-4">
                                                    <div class="input-group">
                                                        <span class="input-group-text "><i
                                                                class="ni ni-zoom-split-in"></i></span>
                                                        <input class="form-control" autocomplete="off" type="date"
                                                            name="fecha_hospitalizacion" id="fecha_hospitalizacion" value="{{old('fecha_hospitalizacion')}}">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <label>Causa</label>
                                                <div class="form-group mb-4">
                                                    <div class="input-group">
                                                        <span class="input-group-text "><i
                                                                class="ni ni-zoom-split-in"></i></span>
                                                        <input class="form-control" autocomplete="off" type="text"
                                                            name="causa" id="causa" value="{{old('causa')}}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="border-bottom px-3">
                                    <label for="">Cirugias:  </label>

                                    <div class="modal-body" id="sugeries">
                                        <div class="col-md">

                                            <div class="form-group mb-4">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>Cesarea</th>
                                                            <th>Abortos</th>
                                                            <th>Apéndice</th>
                                                            <th>Vesícula</th>
                                                            <th>Otro</th>

                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="cesarea" id="cesarea" value="on" {{ old('cesarea') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="abortos" id="abortos" value="on" {{ old('abortos') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="apendice" id="apendice" value="on" {{ old('apendice') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="vesicula" id="vesicula" value="on" {{ old('vesicula') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="otro" id="otro" value="on" {{ old('otro') == 'on' ? 'checked' : '' }}>
                                                            </td>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label>Fecha Hospitalizacion</label>
                                                    <div class="form-group mb-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text "><i
                                                                    class="ni ni-zoom-split-in"></i></span>
                                                            <input class="form-control" autocomplete="off" type="date"
                                                                name="fecha_hospitalizacion" id="ocupation" value="{{old('fecha_hospitalizacion')}}">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <label>Causa</label>
                                                    <div class="form-group mb-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text "><i
                                                                    class="ni ni-zoom-split-in"></i></span>
                                                            <input class="form-control" autocomplete="off" type="text"
                                                                name="causa_cirugia" id="causa_cirugia" value="{{old('causa_cirugia')}}">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md" id="especifique">
                                                <label>Especifique</label>
                                                <div class="form-group mb-4">
                                                    <div class="input-group">
                                                        <span class="input-group-text "><i
                                                                class="ni ni-zoom-split-in"></i></span>
                                                        <textarea class="form-control" autocomplete="off" name="especifique_text" id="especifique_text" autofocus="{{old('especifique_text')}}" value="{{old('especifique_text')}}"></textarea>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="border-bottom px-3">
                                    <label for="">Síntomas Adicionales </label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>Alergias</th>
                                                            <th>Cefaleas/Dolores de cabeza intensos(Migraña)</th>
                                                            <th>Vision Borrosa</th>
                                                            <th>Cáncer</th>
                                                            <th>Ausencia de Órganos</th>
                                                            <th>Embarazos</th>
                                                            <th>Abortos</th>
                                                            <th>Método Anticonceptivo</th>
                                                            <th>Traumatismos craneoencefálicos</th>
                                                            <th>Traumatismos cervicales</th>
                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="alergias" id="alergias" value="on" {{ old('alergias') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="cefaleas" id="cefaleas" value="on" {{ old('cefaleas') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="vision_borrosa"
                                                                    id="vision_borrosa" value="on" {{ old('vision_borrosa') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="cancer" id="cancer">
                                                            </td>
                                                            <td><input type="checkbox" name="ausencia_organos"
                                                                    id="ausencia_organos" value="on" {{ old('ausencia_organos') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="embarazos" id="embarazos" value="on" {{ old('embarazos') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="aborto" id="aborto" value="on" {{ old('aborto') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="metodo_anticonceptivo"
                                                                    id="metodo_anticonceptivo" value="on" {{ old('metodo_anticonceptivo') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="craneocefalicos"
                                                                    id="craneocefalicos" value="on" {{ old('craneocefalicos') == 'on' ? 'checked' : '' }}></td>
                                                            <td><input type="checkbox" name="cervicales" id="cervicales" value="on" {{ old('cervicales') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md" id="alergias_descripcion">
                                                    <label>Especifique Alergias</label>
                                                    <div class="form-group mb-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text "><i
                                                                    class="ni ni-zoom-split-in"></i></span>
                                                            <textarea class="form-control" autocomplete="off" name="alergias_text" id="alergias_text" autofocus="{{old('alergias_text')}}" value="{{old('alergias_text')}}"></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-bottom px-3">
                                    <label for="">Medicamentos </label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <textarea name="medicamentos" id="medicamentos" class="form-control" cols="30" rows="10">{{old('medicamentos')}}</textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- habitos --}}
                        <div class="border-bottom px-3">
                            <a id="habitos" data-bs-toggle="collapse" href="#collapsePsico" role="button"
                                aria-expanded="false" aria-controls="collapsePsico">
                                <h5 class="h5 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-bar-chart-steps"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                                    </svg> Habitos PsicoBiologicos <i class="bi bi-chevron-compact-down"></i></h5>
                            </a>

                        </div>
                        <div class="collapse modal-body" id="collapsePsico" data-parent="#listaAcordion">
                            <div class="row">
                                <div class="col-md">
                                    <label>Alimentación (N&uacute;mero de comidas)</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" type="number" name="numero_comidas"
                                                id="numero_comidas" min="0" value="{{old('numero_comidas')}}">
                                                @error('numero_comidas')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Sueño (Horas Habituales de descanso)</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="number"
                                                name="horas_descanso" id="horas_descanso" min="0" value="{{old('horas_descanso')}}">

                                        </div>
                                        @error('horas_descanso')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Evacuaciones (Defecar): Veces durante el día: </label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="number"
                                                name="evacuaciones" id="evacuaciones" min="0" value="{{old('evacuaciones')}}">

                                        </div>
                                        @error('evacuaciones')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <label>Micciones (orinar): </label>

                                <div class="col-md">
                                    <label>Veces al día: </label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="number"
                                                name="micciones_dia" id="micciones_dia" min="0" value="{{old('micciones_dia')}}">

                                        </div>
                                        @error('micciones_dia')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Veces en la noche:</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="number"
                                                name="micciones_noche" id="micciones_noche" min="0" value="{{old('micciones_noche')}}">

                                        </div>
                                        @error('micciones_noche')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="d-flex justify-content-between">
                                        <label>Tabaco (Consumo diario)</label>

                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error('room.type') border border-danger text-danger @enderror"><i
                                                    class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" name="tabaco" id="tabaco" type="text"
                                                autocomplete="off" value="{{old('tabaco')}}">

                                        </div>
                                        @error('tabaco')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Alcohol (Consumo diario)</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" name="alcohol" type="number" id="alcohol"
                                                autocomplete="off" min="0" value="{{old('alcohol')}}">

                                        </div>
                                        @error('alcohol')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="border-bottom px-3">

                                    <label for="">Drogas Psicoactivas </label>
                                    <div class="modal-body">
                                        <div class="col-md">

                                            <div class="form-group mb-4">
                                                <div class="input-group">
                                                    <table class="table  text-center">
                                                        <thead>
                                                            <th>Marihuana</th>
                                                            <th>Opiaceos</th>
                                                            <th>Cocaína</th>
                                                            <th>Heroína</th>
                                                            <th>Pastillas</th>
                                                            <th>Crack</th>
                                                            <th>Cristal</th>
                                                            <th>Resistol 5000</th>
                                                            <th>Gasolina</th>
                                                            <th>Thiner</th>

                                                        </thead>
                                                        <tbody>
                                                            <td><input type="checkbox" name="marihuana" id="marihuana" value="on" {{ old('marihuana') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="opiaceos" id="opiaceos" value="on" {{ old('opiaceos') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="cocaina" id="cocaina" value="on" {{ old('cocaina') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="heroina" id="heroina"  value="on" {{old('heroina') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="pastillas" id="pastillas" value="on" {{ old('pastillas') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="crack" id="crack" value="on" {{ old('crack') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="cristal" id="cristal" value="on" {{ old('cristal') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="resistol" id="resistol" value="on" {{ old('resistol') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="gasolina" id="gasolina" value="on" {{ old('gasolina') == 'on' ? 'checked' : '' }}>
                                                            </td>
                                                            <td><input type="checkbox" name="thiner" id="thiner" value="on" {{ old('thiner') == 'on' ? 'checked' : '' }}>
                                                            </td>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        {{-- peso --}}
                        <div class="border-bottom px-3">
                            <a id="peso" data-bs-toggle="collapse" href="#collapsePeso" role="button"
                                aria-expanded="false" aria-controls="collapsePsico">
                                <h5 class="h5 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-clipboard-pulse"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Zm6.979 3.856a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.895-.133L4.232 10H3.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .416-.223l1.41-2.115 1.195 3.982a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h1.5a.5.5 0 0 0 0-1h-1.128L9.979 5.356Z" />
                                    </svg> Control de Peso <i class="bi bi-chevron-compact-down"></i>  </h5>
                            </a>

                        </div>
                        <div class="collapse modal-body" id="collapsePeso" data-parent="#listaAcordion">
                            <div class="row">
                                {{-- fecha entrevista --}}
                                {{-- <div class="col-md">
                                    <label>Fecha Entrevista</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" type="date" name="fecha_visita"
                                                id="fecha_visita" value="<?php echo date('Y-m-d HH:mm'); ?>">
                                        </div>

                                    </div>
                                </div> --}}

                                <div class="col-md">
                                    <label>Peso</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text" name="peso"
                                                id="peso" value="{{old('peso')}}">
                                                @error('peso')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>IMC</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text" name="IMC"
                                                id="IMC" value="{{old('IMC')}}">
                                                @error('IMC')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>% Grasa</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" name="grasa" type="text"
                                                id="grasa" value="{{old('grasa')}}">
                                        </div>
                                        @error('grasa')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Musculo</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" type="text" name="musculo" id="musculo" value="{{old('musculo')}}">
                                        </div>
                                        @error('musculo')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md">
                                    <label>KCAL</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text" name="KCAL"
                                                id="KCAL" value="{{old('KCAL')}}">
                                        </div>
                                        @error('KCAL')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Edad Blo</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text"
                                                name="edad_blo" id="edad_blo" value="{{old('edad_blo')}}">
                                        </div>
                                        @error('edad_blo')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Visceral</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" name="visceral"
                                                type="text" id="visceral" value="{{old('visceral')}}">
                                        </div>
                                        @error('visceral')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Busto</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" type="text" name="busto" id="busto" value="{{old('busto')}}">
                                        </div>
                                        @error('busto')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md">
                                    <label>Cintura</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text" name="cintura"
                                                id="cintura" value="{{old('cintura')}}">
                                        </div>
                                        @error('cintura')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Cadera</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text" name="cadera"
                                                id="cadera">
                                        </div>
                                        @error('cadera')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Brazo derecho</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" name="brazo_der"
                                                type="text" id="brazo_der" value="{{old('brazo_der')}}">
                                        </div>
                                        @error('brazo_der')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Brazo Izquierdo</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" type="text" name="brazo_izq" id="brazo_izq" value="{{old('brazo_izq')}}">
                                        </div>
                                        @error('brazo_izq')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md">
                                    <label>Pierna Derecha</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text"
                                                name="pierna_der" id="pierna_der" value="{{old('pierna_der')}}">
                                        </div>
                                        @error('pierna_der')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <label>Pierna Izquierda</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                            <input class="form-control" autocomplete="off" type="text"
                                                name="pierna_izq" id="pierna_izq" value="{{old('pierna_izq')}}">
                                        </div>
                                        @error('pierna_izq')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                        <hr>
                        {{-- fotos --}}
                        <div class="border-bottom px-3">
                            <a id="foto" data-bs-toggle="collapse" href="#collapseFoto" role="button"
                                aria-expanded="false" aria-controls="collapsePsico">
                                <h5 class="h5 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                        <path
                                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                        <path
                                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                    </svg> Fotos <i class="bi bi-chevron-compact-down"></i> </h5>
                            </a>

                        </div>
                        <div class="collapse modal-body" id="collapseFoto" data-parent="#listaAcordion">


                            <div class="row">
                                <div class="col-md">
                                    <label>Cargar Foto</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <input type="file" id="path" name="path[]" class="form-control"
                                                multiple accept="image/*">
                                            <br>

                                        </div>
                                        @error('path')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                        <div class="description">
                                            Un número ilimitado de archivos pueden ser cargados en este campo.
                                            <br>
                                            Limite de 2018 MB por imagen.
                                            <br>
                                            Tipos Permitidos: jpeg, png, jpg
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label>Tomar Foto</label>
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <button  type="button" class="btn btn-primary"  value="open Camera" onClick="open_Camera()" >
                                                Usar Camara
                                            </button>
                                        </div>
                                        <br>
                                        <div  id = "camera_area" class="col-md-6">
                                            <div id="my_camera"></div>
                                            <br>
                                            <button  type="button" class="btn btn-primary" onClick="take_snapshot()">
                                                Capturar Foto
                                            </button>
                                            <button  type="button" class="btn btn-primary" onClick="stopCamera()">
                                                Cerrar
                                            </button>

                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row" id="dataImagenes">
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                            <div class="font-icon-detail-img">
                                                <img class="img-file-input" id="" src="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">


                            <button type="submit" class="btn btn-success" id="formRecord"><strong>GUARDAR</strong></button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>


    </div>
@endsection
@section('scripts')
    <script>
        let get_user = '{{ route('record.getuser') }}'
        let get_expediente = '{{ route('expediente.get') }}'
        let get_usuario = '{{ route('data.get') }}'
        let get_record = '{{ route('record.get') }}'
        let store='{{route('record.store')}}'

        //console.log(get_pdf);
    </script>
    <script src="{{ asset('js_modulos/expedientes.js') }}"></script>

    @endsection
