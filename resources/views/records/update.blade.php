 @extends('layouts.app')

 @section('content')
     @include('mensajes.mensajes')

     <div class="container-fluid" id="capa_create_record">

         <header class="card px-2 py-4">
             <div class="d-flex justify-content-between align-items-center">
                 <h3 class="h2">Creacion Expediente Cliente</h3>

             </div>

         </header>
         <div class="card-body">
             <div class="card py-3">

                 <form action="{{ route('record.update',$record->id) }}" method="POST">
                     @csrf
                     @method('put')
                     <div aria-multiselectable="false" class="card-collapse" id="listaAcordion" role="tablist">
                         <div class="border-bottom px-3">
                             <div class="row">

                                 <div class="col-md-2">
                                     <strong>Nombre Cliente:</strong>
                                     <span> {{ $record->name }}</span>

                                 </div>



                             </div>

                         </div>
                         <input type="text" id="users_id" name="users_id" value="{{$record->users_id}}" readonly hidden>
                         <input type="text" id="numero_control" name="numero_control" value="{{$record->numero_control}}" readonly hidden>
                         <hr>
                         {{-- identificacion --}}
                         <div class="border-bottom px-3">
                             <a data-bs-toggle="collapse" href="#collapseIdentificacion" role="button"
                                 aria-expanded="false" aria-controls="collapseIdentificacion" id="identificacion">

                                 <h5 class="h5 mb-2"><i class="bi bi-person-badge-fill"></i> Identificacion <i
                                         class="bi bi-chevron-compact-down"></i></h5>
                             </a>

                         </div>
                         <div class="collapse modal-body" id="collapseIdentificacion" data-parent="#listaAcordion">
                             <div class="row">
                                 <div class="col-md">
                                     <label>Fecha Entrevista</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" type="datetime-local" name="date_interview"
                                                 id="date_interview" value="{{ $record->date_interview }}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Profesión/Ocupación</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text" name="ocupation"
                                                 id="ocupation" value="{{ $record->ocupation }}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Fecha de Nacimiento</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="date" name="born"
                                                 id="born" value="{{ $record->born }}">
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
                                                 id="age" min="1" onclick="calcular_edad()"
                                                 value="{{ $record->age }}">
                                         </div>

                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-md">
                                     <div class="d-flex justify-content-between">
                                         <label>Nombre Completo</label>

                                     </div>

                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span
                                                 class="input-group-text @error('room.type') border border-danger text-danger @enderror"><i
                                                     class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" name="name" id="name" type="text"
                                                 autocomplete="off" value="{{ $record->name }}">
                                         </div>

                                     </div>
                                 </div>
                                 <div class="col-md">
                                     <label>Número de Celular</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" name="phone" id="phone" type="number"
                                                 autocomplete="off" value="{{ $record->phone }}">
                                         </div>

                                     </div>
                                 </div>
                                 <div class="col-md">
                                     <label>correo electronico</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" name="email" id="email" type="text"
                                                 autocomplete="off" value="{{ $record->email }}">
                                         </div>

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
                                                             @if ($record->hipertension == 1)
                                                                 <td><input type="checkbox" name="hipertension"
                                                                         id="hipertension" checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="hipertension"
                                                                         id="hipertension"></td>
                                                             @endif
                                                             @if ($record->asma == 1)
                                                                 <td><input type="checkbox" name="asma" id="asma"
                                                                         checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="asma"
                                                                         id="asma"></td>
                                                             @endif
                                                             @if ($record->epilepsia == 1)
                                                                 <td><input type="checkbox" name="epilepsia"
                                                                         id="epilepsia"></td>
                                                             @else
                                                                 <td><input type="checkbox" name="epilepsia"
                                                                         id="epilepsia" checked></td>
                                                             @endif
                                                             @if ($record->ciatica == 1)
                                                                 <td><input type="checkbox" name="ciatica"
                                                                         id="ciatica"></td>
                                                             @else
                                                                 <td><input type="checkbox" name="ciatica"
                                                                         id="ciatica"></td>
                                                             @endif
                                                             @if ($record->diabetes == 1)
                                                                 <td><input type="checkbox" name="diabetes"
                                                                         id="diabetes" checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="diabetes"
                                                                         id="diabetes"></td>
                                                             @endif
                                                             @if ($record->lumbagia == 1)
                                                                 <td><input type="checkbox" name="lumbagia"
                                                                         id="lumbagia" checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="lumbagia"
                                                                         id="lumbagia"></td>
                                                             @endif
                                                             @if ($record->arritmia == 1)
                                                                 <td><input type="checkbox" name="arritmia"
                                                                         id="arritmia" checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="arritmia"
                                                                         id="arritmia"></td>
                                                             @endif
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
                                                             @if ($record->ansiedad == 1)
                                                                 <td><input type="checkbox" name="ansiedad"
                                                                         id="ansiedad" checked>
                                                                 </td>
                                                             @else
                                                                 <td><input type="checkbox" name="ansiedad"
                                                                         id="ansiedad">
                                                                 </td>
                                                             @endif

                                                             @if ($record->depresion == 1)
                                                                 <td><input type="checkbox" name="depresion"
                                                                         id="depresion" checked>
                                                                 </td>
                                                             @else
                                                                 <td><input type="checkbox" name="depresion"
                                                                         id="depresion">
                                                                 </td>
                                                             @endif

                                                             @if ($record->depre_postparto == 1)
                                                                 <td><input type="checkbox" name="depre_postparto"
                                                                         id="depre_postparto" checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="depre_postparto"
                                                                         id="depre_postparto"></td>
                                                             @endif

                                                             @if ($record->estres_cronico == 1)
                                                                 <td><input type="checkbox" name="estres_cronico"
                                                                         id="estres_cronico" checked></td>
                                                             @else
                                                                 <td><input type="checkbox" name="estres_cronico"
                                                                         id="estres_cronico"></td>
                                                             @endif

                                                             @if ($record->estres_postraumatico == 1)
                                                                 <td><input type="checkbox" name="estres_postraumatico"
                                                                         id="estres_postraumatico"></td>
                                                             @else
                                                                 <td><input type="checkbox" name="estres_postraumatico"
                                                                         id="estres_postraumatico"></td>
                                                             @endif


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
                                                            @if ($record->papiloma_humano == 1)
                                                            <td><input type="checkbox" name="papiloma_humano"
                                                                id="papiloma_humano" checked></td>
                                                            @else
                                                            <td><input type="checkbox" name="papiloma_humano"
                                                                id="papiloma_humano"></td>
                                                            @endif

                                                                     @if ($record->herpes == 1)
                                                                     <td><input type="checkbox" name="herpes" id="herpes" checked>
                                                                     </td>
                                                                     @else
                                                                     <td><input type="checkbox" name="herpes" id="herpes">
                                                                     </td>
                                                                     @endif

                                                             @if ($record->sifilis)
                                                             <td><input type="checkbox" name="sifilis" id="sifilis" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="sifilis" id="sifilis">
                                                             </td>
                                                             @endif

                                                             @if ($record->gonorrea)
                                                             <td><input type="checkbox" name="gonorrea" id="gonorrea" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="gonorrea" id="gonorrea">
                                                             </td>
                                                             @endif

                                                             @if ($record->sida == 1)
                                                             <td><input type="checkbox" name="sida" id="sida" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="sida" id="sida">
                                                             </td>
                                                             @endif

                                                             @if ($record->clamidia == 1)
                                                             <td><input type="checkbox" name="clamidia" id="clamidia" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="clamidia" id="clamidia">
                                                             </td>
                                                             @endif


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
                                                            @if ($record->desmayos == 1)
                                                            <td><input type="checkbox" name="desmayos" id="desmayos" checked>
                                                            </td>
                                                            @else
                                                            <td><input type="checkbox" name="desmayos" id="desmayos">
                                                            </td>
                                                            @endif

                                                            @if ($record->mareos)
                                                            <td><input type="checkbox" name="mareos" id="mareos" checked>
                                                            </td>
                                                                @else
                                                                <td><input type="checkbox" name="mareos" id="mareos">
                                                                </td>
                                                            @endif

                                                            @if ($record->perdida_conocimiento)
                                                            <td><input type="checkbox" name="perdida_conocimiento"
                                                                id="perdida_conocimiento" checked></td>
                                                            @else
                                                            <td><input type="checkbox" name="perdida_conocimiento"
                                                                id="perdida_conocimiento"></td>
                                                            @endif

                                                            @if ($record->hospitalizacion)
                                                            <td><input type="checkbox" name="hospitalizacion"
                                                                id="hospitalizacion" checked></td>
                                                            @else
                                                            <td><input type="checkbox" name="hospitalizacion"
                                                                id="hospitalizacion"></td>
                                                            @endif


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
                                                             name="fecha_hospitalizacion" id="fecha_hospitalizacion" value="{{$record->fecha_hospitalizacion}}">
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
                                                             name="causa" id="causa" value="{{$record->causa}}">
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>



                                     </div>
                                 </div>
                                 <div class="border-bottom px-3">
                                     <label for="">Cirugias: </label>
                                     <div class="modal-body">
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
                                                            @if ($record->cesarea == 1)
                                                            <td><input type="checkbox" name="cesarea" id="cesarea" checked>
                                                            </td>
                                                            @else
                                                            <td><input type="checkbox" name="cesarea" id="cesarea">
                                                            </td>
                                                            @endif

                                                             @if ($record->abortos == 1)
                                                             <td><input type="checkbox" name="abortos" id="abortos" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="abortos" id="abortos">
                                                             </td>
                                                             @endif

                                                             @if ($record->apendice == 1)
                                                             <td><input type="checkbox" name="apendice" id="apendice" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="apendice" id="apendice">
                                                             </td>
                                                             @endif

                                                             @if ($record->vesicula == 1)
                                                             <td><input type="checkbox" name="vesicula" id="vesicula" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="vesicula" id="vesicula">
                                                             </td>
                                                             @endif

                                                             @if ($record->otro == 1)
                                                             <td><input type="checkbox" name="otro" id="otro" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="otro" id="otro">
                                                             </td>
                                                             @endif


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
                                                             <input class="form-control" autocomplete="off"
                                                                 type="date" name="fecha_hospitalizacion"
                                                                 id="fecha_hospitalizacion" value="{{$record->fecha_hospitalizacion}}">
                                                         </div>

                                                     </div>
                                                 </div>
                                                 <div class="col-md">
                                                     <label>Causa</label>
                                                     <div class="form-group mb-4">
                                                         <div class="input-group">
                                                             <span class="input-group-text "><i
                                                                     class="ni ni-zoom-split-in"></i></span>
                                                             <input class="form-control" autocomplete="off"
                                                                 type="text" name="causa_cirugia" id="causa_cirugia" value="{{$record->causa_cirugia}}">
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
                                                         <textarea class="form-control" autocomplete="off" value="{{$record->especifique_text}}" name="especifique_text" id="especifique_text"></textarea>
                                                     </div>

                                                 </div>
                                             </div>

                                         </div>

                                     </div>
                                 </div>
                                 {{-- <div class="border-bottom px-3">
                                    <label for="">Ha presentado o presenta alguna de las siguientes condiciones
                                        físicas: </label>
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
                                                            <td><input type="checkbox" name="hipertension"></td>
                                                            <td><input type="checkbox" name="asma"></td>
                                                            <td><input type="checkbox" name="epilepsia"></td>
                                                            <td><input type="checkbox" name="ciatica"></td>
                                                            <td><input type="checkbox" name="diabetes"></td>
                                                            <td><input type="checkbox" name="lumbagia"></td>
                                                            <td><input type="checkbox" name="arritmia"></td>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div> --}}
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
                                                    @if ($record->alergias == 1)
                                                    <td><input type="checkbox" name="alergias" id="alergias" checked>
                                                    </td>
                                                    @else
                                                    <td><input type="checkbox" name="alergias" id="alergias">
                                                    </td>
                                                    @endif

                                                             @if ($record->cefaleas == 1)
                                                             <td><input type="checkbox" name="cefaleas" id="cefaleas" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="cefaleas" id="cefaleas">
                                                             </td>
                                                             @endif

                                                             @if ($record->vision_borrosa == 1)
                                                             <td><input type="checkbox" name="vision_borrosa"
                                                                id="vision_borrosa" checked></td>
                                                             @else
                                                             <td><input type="checkbox" name="vision_borrosa"
                                                                id="vision_borrosa"></td>
                                                             @endif

                                                                     @if ($record->cancer == 1)
                                                                     <td><input type="checkbox" name="cancer" id="cancer" checked>
                                                                     </td>
                                                                     @else
                                                                     <td><input type="checkbox" name="cancer" id="cancer">
                                                                     </td>
                                                                     @endif

                                                             @if ($record->ausencia_organos == 1)
                                                             <td><input type="checkbox" name="ausencia_organos"
                                                                id="ausencia_organos" checked></td>
                                                             @else
                                                             <td><input type="checkbox" name="ausencia_organos"
                                                                id="ausencia_organos"></td>
                                                             @endif

                                                                     @if ($record->embarazos == 1)
                                                                     <td><input type="checkbox" name="embarazos" id="embarazos" checked>
                                                                     </td>
                                                                     @else
                                                                     <td><input type="checkbox" name="embarazos" id="embarazos">
                                                                     </td>
                                                                     @endif

                                                             @if ($record->aborto == 1)
                                                             <td><input type="checkbox" name="aborto" id="aborto" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="aborto" id="aborto">
                                                             </td>
                                                             @endif

                                                             @if ($record->metodo_anticonceptivo == 1)
                                                             <td><input type="checkbox" name="metodo_anticonceptivo"
                                                                id="metodo_anticonceptivo" checked></td>
                                                             @else
                                                             <td><input type="checkbox" name="metodo_anticonceptivo"
                                                                id="metodo_anticonceptivo"></td>
                                                             @endif

                                                                     @if ($record->craneocefalico == 1)
                                                                     <td><input type="checkbox" name="craneocefalicos"
                                                                        id="craneocefalicos" checked></td>
                                                                     @else
                                                                     <td><input type="checkbox" name="craneocefalicos"
                                                                        id="craneocefalicos"></td>
                                                                     @endif

                                                                     @if ($record->cervicales == 1)
                                                                     <td><input type="checkbox" name="cervicales"
                                                                        id="cervicales" checked>
                                                                </td>
                                                                     @else
                                                                     <td><input type="checkbox" name="cervicales"
                                                                        id="cervicales">
                                                                </td>
                                                                     @endif

                                                         </tbody>
                                                     </table>
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
                                                     <textarea name="medicamentos" id="medicamentos" value="{{$record->medicamentos}}" placeholder="{{$record->medicamentos}}" class="form-control" cols="30" rows="10"></textarea>
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
                                             <input class="form-control" type="text" name="numero_comidas"
                                                 id="numero_comidas" value="{{$record->numero_comidas}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Sueño (Horas Habituales de descanso)</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="horas_descanso" id="horas_descanso" value="{{$record->horas_descanso}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Evacuaciones (Defecar): Veces durante el día: </label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="evacuaciones" id="evacuaciones" value="{{$record->evacuaciones}}">
                                         </div>
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
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="micciones_dia" id="micciones_dia" value="{{$record->micciones_dia}}">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md">
                                     <label>Veces en la noche:</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="micciones_noche" id="micciones_noche" value="{{$record->micciones_noche}}">
                                         </div>
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
                                                 autocomplete="off" value="{{$record->tabaco}}">
                                         </div>

                                     </div>
                                 </div>
                                 <div class="col-md">
                                     <label>Alcohol (Consumo diario)</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" name="alcohol" type="text" id="alcohol"
                                                 autocomplete="off" value="{{$record->alcohol}}">
                                         </div>

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
                                                            @if ($record->marihuana == 1)
                                                            <td><input type="checkbox" name="marihuana" id="marihuana" checked>
                                                            </td>
                                                            @else
                                                            <td><input type="checkbox" name="marihuana" id="marihuana">
                                                            </td>
                                                            @endif

                                                             @if ($record->opiaceos == 1)
                                                             <td><input type="checkbox" name="opiaceos" id="opiaceos" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="opiaceos" id="opiaceos">
                                                             </td>
                                                             @endif

                                                             @if ($record->cocaina == 1)
                                                             <td><input type="checkbox" name="cocaina" id="cocaina" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="cocaina" id="cocaina">
                                                             </td>
                                                             @endif

                                                             @if ($record->heroina == 1)
                                                             <td><input type="checkbox" name="heroina" id="heroina" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="heroina" id="heroina">
                                                             </td>
                                                             @endif

                                                             @if ($record->pastillas == 1)
                                                             <td><input type="checkbox" name="pastillas" id="pastillas" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="pastillas" id="pastillas">
                                                             </td>
                                                             @endif

                                                             @if ($record->crack == 1)
                                                             <td><input type="checkbox" name="crack" id="crack" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="crack" id="crack">
                                                             </td>
                                                             @endif

                                                             @if ($record->cristal == 1)
                                                             <td><input type="checkbox" name="cristal" id="cristal" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="cristal" id="cristal">
                                                             </td>
                                                             @endif

                                                             @if ($record->resistol == 1)
                                                             <td><input type="checkbox" name="resistol" id="resistol" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="resistol" id="resistol">
                                                             </td>
                                                             @endif

                                                             @if ($record->gasolina == 1)
                                                             <td><input type="checkbox" name="gasolina" id="gasolina" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="gasolina" id="gasolina">
                                                             </td>
                                                             @endif

                                                             @if ($record->cristal == 1)
                                                             <td><input type="checkbox" name="cristal" id="cristal" checked>
                                                             </td>
                                                             @else
                                                             <td><input type="checkbox" name="cristal" id="cristal">
                                                             </td>
                                                             @endif


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
                                     </svg> Control Peso <i class="bi bi-chevron-compact-down"></i></h5>
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
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="peso" id="peso" value="{{$record->peso}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>IMC</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="IMC" id="IMC" value="{{$record->IMC}}">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>% Grasa</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" name="grasa"
                                                 type="text" id="grasa" value="{{$record->grasa}}">
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md">
                                     <label>Musculo</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" type="text" name="musculo" id="musculo" value="{{$record->musculo}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>KCLA</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="KCAL" id="KCAL" value="{{$record->KCAL}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Edad Blo</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="edad_blo" id="edad_blo" value="{{$record->edad_blo}}">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Visceral</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" name="visceral"
                                                 type="text" id="visceral" value="{{$record->visceral}}">
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md">
                                     <label>Busto</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" type="text" name="busto" id="busto" value="{{$record->busto}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Cintura</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="cintura" id="cintura" value="{{$record->cintura}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Cadera</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="cadera" id="cadera" value="{{$record->cadera}}">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Brazo derecho</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text  "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" name="brazo_der"
                                                 type="text" id="brazo_der" value="{{$record->brazo_der}}">
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md">
                                     <label>Brazo Izquierdo</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" type="text" name="brazo_izq" id="brazo_izq" value="{{$record->brazo_izq}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Pierna Derecha</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="pierna_der" id="pierna_der" value="{{$record->pierna_der}}">
                                         </div>

                                     </div>
                                 </div>

                                 <div class="col-md">
                                     <label>Pierna Izquierda</label>
                                     <div class="form-group mb-4">
                                         <div class="input-group">
                                             <span class="input-group-text "><i class="ni ni-zoom-split-in"></i></span>
                                             <input class="form-control" autocomplete="off" type="text"
                                                 name="pierna_izq" id="pierna_izq" value="{{$record->pierna_izq}}">
                                         </div>
                                     </div>
                                 </div>


                             </div>
                         </div>
                         <div class="modal-footer">

                             <button type="submit" class="btn btn-success"><strong>GUARDAR</strong></button>
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

    //console.log(get_pdf);
</script>
<script src="{{ asset('js_modulos/expedientes_update.js') }}"></script>
@endsection
