<!doctype html>

<head>

    <style>
        .container_12 {
            margin-left: 25px;
            margin-right: 25px;

        }

        img {
            position: fixed;
            height: 10%;
            width: 20%;

            object-fit: contain;
        }

        #watermark {
                position: fixed;

                /**
                    Set a position in the page for your image
                    This should center it vertically
                **/
                bottom:  -18cm;
                left:    5cm;

                /** Change image dimensions**/
                width:  300%;
                height:   150%;

                /** Your watermark should be behind every content**/
                z-index:  1;
                opacity:0.5;
            }
    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body style="background: white;">
    <div id="watermark">
        <img src="img/logo-remo.png" height="100%" width="100%" />
    </div>
    <div>
        <div style="position: center;">
            <header>
                <p style="text-align:center;"><img src="img/logo.jpeg" alt="logo"></p>
                <p style="text-align:center;color:magenta"><span>El Espacio que necesitas como mujer...</span></p>
                {{-- <hr style="text-align:center;color:magenta;" width="35%"> --}}
                <h2 style="text-align:center; font-family:Arial Narrow; "> Ficha Inscripción</h2>
            </header>
            <div id="main-content">
                <main>
                    <h3>I. Identificación</h3>
                    <table class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th style="font-size: 85%"><b style="color: black;">Fecha Entrevista:
                                    </b>{{ $expediente->date_interview }}</th>
                                <th style="font-size: 85%"><b style="color: black;">Profesión/ Ocupación: </b>
                                    {{ $expediente->ocupation }} </th>
                            </tr>
                            <tr>
                                <th style="font-size: 85%"><b style="color: black;">Nombre Completo: </b>
                                    {{ $expediente->name }} </th>
                            </tr>
                            <tr>
                                <th style="font-size: 85%"><b style="color: black;">Edad: </b> {{ $expediente->age }}
                                </th>
                                <th style="font-size: 85%"><b style="color: black;">Número de celular: </b>
                                    {{ $expediente->phone }}</th>
                            </tr>
                            <tr>
                                <th style="font-size: 85%"><b style="color: black;">Correo electrónico: </b>
                                    {{ $expediente->email }}</th>
                                <th style="font-size: 85%"><b style="color: black;">Fecha de Nacimiento: </b>
                                    {{ $expediente->born }}</th>
                            </tr>
                        </thead>
                    </table>
                    <br>

                    <h3>II. Antecedentes personales en general</h3>
                    <label for="">Enfermedades Crónicas</label>
                    <table class="table table-striped align-items-center mb-0">

                        <thead>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Hipertension Arterial</th>
                                <th style="font-size: 85%;text-align:center;">Asma</th>
                                <th style="font-size: 85%;text-align:center;">Epilepsia</th>
                                <th style="font-size: 85%;text-align:center;">Inflamación de nervio ciático</th>
                                <th style="font-size: 85%;text-align:center;">Diabetes</th>
                                <th style="font-size: 85%;text-align:center;">Lumbagia</th>
                                <th style="font-size: 85%;text-align:center;">Arritmias cardiacas</th>
                            </tr>



                        </thead>
                        <tr>
                            @if ($expediente->hipertension == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->asma == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->epilepsia == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->ciatica == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->diabetes == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->lumbagia == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->arritmia == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                        </tr>
                    </table>
                    <label for="">Enfermedades Mentales</label>
                    <table class="table table-striped align-items-center mb-0">

                        <thead>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Ansiedad</th>
                                <th style="font-size: 85%;text-align:center;">Depresión</th>
                                <th style="font-size: 85%;text-align:center;">Depresión Postparto</th>
                                <th style="font-size: 85%;text-align:center;">Estrés crónico</th>
                                <th style="font-size: 85%;text-align:center;">Estrés Postraumatico</th>
                            </tr>



                        </thead>
                        <tr>
                            @if ($expediente->ansiedad == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->depresion == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->depre_postparto == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->estres_cronico == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->estres_postraumatico == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif





                        </tr>
                    </table>
                    <label for="">Enfermedades de Transmisión Sexual (ETS):</label>
                    <table class="table table-striped align-items-center mb-0">

                        <thead>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Papiloma Humano</th>
                                <th style="font-size: 85%;text-align:center;">Herpes</th>
                                <th style="font-size: 85%;text-align:center;">Sifilis</th>
                                <th style="font-size: 85%;text-align:center;">Gonorrea</th>
                                <th style="font-size: 85%;text-align:center;">SIDA</th>
                                <th style="font-size: 85%;text-align:center;">Clamidia</th>

                            </tr>



                        </thead>
                        <tr>
                            @if ($expediente->papiloma_humano == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->herpes == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->sifilis == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->gonorrea == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->sida == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->clamidia == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                        </tr>
                    </table>
                    <br>
                    <label for="">Ha presentado o presenta alguna de las siguientes condiciones físicas:</label>
                    <table class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Desmayos</th>
                                <th style="font-size: 85%;text-align:center;">Mareos</th>
                                <th style="font-size: 85%;text-align:center;">Pérdidas del conocimiento</th>
                                <th style="font-size: 85%;text-align:center;">Hospitalizaciones</th>
                            </tr>
                        </thead>
                        <tr>
                            @if ($expediente->desmayos == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->mareos == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->perdida_conocimiento == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->hospitalizacion == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                        </tr>
                    </table>
                    @if ($expediente->hospitalizacion == 1)
                        <table class="table table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="font-size: 85%">causa: {{ $expediente->causa }}</th>
                                    <th style="font-size: 85%">Fecha Hospitalizacion:
                                        {{ $expediente->fecha_hospitalizacion }} </th>
                                </tr>
                            </thead>
                        </table>
                    @endif
                    <label for="">Cirugias:</label>
                    <table class="table table-striped align-items-center mb-0">

                        <thead>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Cesarea</th>
                                <th style="font-size: 85%;text-align:center;">Abortos</th>
                                <th style="font-size: 85%;text-align:center;">Apéndice</th>
                                <th style="font-size: 85%;text-align:center;">Vesícula</th>
                                <th style="font-size: 85%;text-align:center;">Otro</th>
                            </tr>



                        </thead>
                        <tr>
                            @if ($expediente->cesarea == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->abortos == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->apendice == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->vesicula == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->otro == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                        </tr>
                    </table>
                    @if ($expediente->fecha_cirugia != null)
                        <table class="table table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="font-size: 85%">Fecha Cirugia: {{ $expediente->fecha_cirugia }}</th>
                                </tr>
                            </thead>
                        </table>
                    @endif
                    @if ($expediente->causa_cirugia != null)
                        <table class="table table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="font-size: 85%">Causa Cirugia: {{ $expediente->causa_cirugia }}</th>
                                </tr>
                            </thead>
                        </table>
                    @endif
                    @if ($expediente->otro != 0)
                        <table class="table table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="font-size: 85%">Especificacion Cirugia:
                                        {{ $expediente->especifique_text }}</th>
                                </tr>
                            </thead>
                        </table>
                    @endif
                    <br>
                    <label for="">Síntomas adicionales:</label>
                    <table class="table table-striped align-items-center">
                        <thead>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Alergias</th>
                                <th style="font-size: 85%;text-align:center;">Cefales(Dolores de cabeza intensos
                                    (Migraña))</th>
                                <th style="font-size: 85%;text-align:center;">Visión Borrosa</th>
                                <th style="font-size: 85%;text-align:center;">Cáncer</th>
                                <th style="font-size: 85%;text-align:center;">Ausencia de Órganos</th>
                                <th style="font-size: 85%;text-align:center;">Embarazos</th>
                                <th style="font-size: 85%;text-align:center;">Abortos</th>
                                <th style="font-size: 85%;text-align:center;">Método Anticonceptivo</th>
                                <th style="font-size: 85%;text-align:center;">Traumatismos Craneocefálicos</th>
                                <th style="font-size: 85%;text-align:center;">Traumatismos Cervicales</th>

                            </tr>
                        </thead>
                        <tr>
                            @if ($expediente->alergias == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->cefaleas == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->vision_borrosa == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->cancer == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->ausencia_organos == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->embarazos == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->aborto == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->metodo_anticonceptivo == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->craneocefalico == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->cervicales == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                        </tr>
                    </table>
                    <table class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th style="font-size: 85%">Medicamentos: {{ $expediente->medicamentos }}</th>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <h3>III. Hábitos psicobiológicos:</h3>
                    <br>
                    <table class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <label for=""><b style="color: black;">Alimentacion</b> </label>
                                <th style="font-size: 85%">Número de comidas: {{ $expediente->numero_comidas }}</th>


                            </tr>
                            <tr>
                                <label for=""><b style="color: black;">Sueño</b> </label>
                                <th style="font-size: 85%">Horas habituales de descanso:
                                    {{ $expediente->horas_descanso }}</th>
                            </tr>
                            <tr>
                                <label for=""><b style="color: black;">Micciones (Orinar)</b> </label>
                                <th style="font-size: 85%">Veces al día: {{ $expediente->micciones_dia }}</th>
                                <th style="font-size: 85%">Veces en la noche: {{ $expediente->micciones_noche }}</th>

                            </tr>
                            <tr>
                                <label for=""><b style="color: black;">Evacuaciones (Defecar)</b> </label>
                                <th style="font-size: 85%">Veces durante el día: {{ $expediente->evacuaciones }}</th>

                            </tr>

                        </thead>
                    </table>
                    <label for="">Adicciones</label>
                    <table class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <label for=""><b style="color: black;">Tabaco </b> </label>
                                <th style="font-size: 85%">Consumo diario: {{ $expediente->tabaco }}</th>
                                <label for=""><b style="color: black;">Alcohol</b> </label>
                                <th style="font-size: 85%">Consumo diario: {{ $expediente->alcohol }}</th>

                            </tr>
                            <span><b style="color: black;"> Drogas Psicoactivas </b></span>
                            <tr>
                                <th style="font-size: 85%;text-align:center;">Marihuana</th>
                                <th style="font-size: 85%;text-align:center;">Opiaceos</th>
                                <th style="font-size: 85%;text-align:center;">Cocaína</th>
                                <th style="font-size: 85%;text-align:center;">Heroína</th>
                                <th style="font-size: 85%;text-align:center;">Pastillas</th>
                                <th style="font-size: 85%;text-align:center;">Crack</th>
                                <th style="font-size: 85%;text-align:center;">Resistol</th>
                                <th style="font-size: 85%;text-align:center;">Gasolina</th>
                                <th style="font-size: 85%;text-align:center;">Thiner</th>
                                <th style="font-size: 85%;text-align:center;">Cristal</th>

                            </tr>

                        </thead>
                        <tr>
                            @if ($expediente->marihuana == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->opiaceos == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->cocaina == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->heroina == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->pastillas == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->crack == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->resistol == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->gasolina == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->thiner == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->cristal == 1)
                                <td style="font-size: 85%;text-align:center;color:black;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                        </tr>
                    </table>
                    <br>
                    <div style="page-break-after:always;"></div>
                    <h3>IX. Control Peso:</h3>
                    <br>
                    <table class="table table-striped align-items-center mb-0">

                        <tr>
                            <td style="font-size: 85%"><b style="color: black;">Concepto:</td>
                            <td style="font-size: 85%"><b style="color: black;">Primera Visita:</td>
                            @if ($count > 1)
                                <td style="font-size: 85%"><b style="color: black;">Mes
                                        {{ $expediente->numero_control }} :</td>
                            @endif


                        </tr>
                        @foreach ($peso as $data)
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Fecha</td>
                                <td>{{ $data->fecha_visita }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Peso</td>
                                <td>{{ $data->peso }} Kg</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">IMC</td>
                                <td>{{ $data->IMC }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">% Grasa</td>
                                <td>{{ $data->grasa }} %</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">% Musculo</td>
                                <td>{{ $data->musculo }} Kg</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">KCAL</td>
                                <td>{{ $data->KCAL }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Edad Blo</td>
                                <td>{{ $data->edad_blo }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Visceral</td>
                                <td>{{ $data->visceral }} Kg</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Busto</td>
                                <td>{{ $data->busto }} cm</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Cintura</td>
                                <td>{{ $data->cintura }} cm</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Cadera</td>
                                <td>{{ $data->cadera }} cm</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Brazo Der.</td>
                                <td>{{ $data->brazo_der }} cm</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Brazo Izq.</td>
                                <td>{{ $data->brazo_izq }} cm</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Pierna Der.</td>
                                <td>{{ $data->pierna_der }} cm</td>
                            </tr>
                            <tr>
                                <td style="font-size: 85%"><b style="color: black;">Pierna Izq.</td>
                                <td>{{ $data->pierna_izq }} cm</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <div style="page-break-after:always;"></div>
                    <div style="font-size: 20px; font-family:Arial Narrow;color:black; margin:50px 60px">
                        <p style="text-align:center;"><span><b>Reglamento</b> </span></p>
                        <br>
                        <span>1. El usuario autoriza el uso de datos para su expediente, informacion que será de uso
                            confidencial conforme a la Ley General de Protección de Datos Personales.</span>
                        <br>
                        <span>2. En caso de destrucción accidental de artículos deportivos, el gimnasio “Spacio Fems”
                            hará una valoración para tomar las medidas necesarias para la reposición.</span>
                        <br>
                        <span>3. No se hacen reembolsos por pagos de visita, semana, mes o anualidad, aún cuando se
                            trate de una terminación anticipada.</span>
                        <br>
                        <span>4. El gimnasio “Spacio Fems” se compromete a informar a tiempo sobre reparaciones
                            preventivas o correctivas, razones por las cuales se inhabilite las salas para
                            entrenar.</span>
                        <br>
                        <span>5. El gimnasio “Spacio Fems” no se hace responsable por objetos perdidos ni extraviados,
                            así como de las pérdidas o daños en las pertenencias del usuario.</span>
                        <br>
                        <span>6. El usuario autoriza que se le envien comunicados vía telefono celular de las
                            promociones, modificaciones o circunstancias relacionadas al gimnasio.</span>
                        <br>
                        <span>7. El gimnasio “ Spacio Fems” no se hace responsable por accidentes o lesiones dentro y/o
                            fuera de las instalaciones.</span>
                    </div>
                    <div style="page-break-after:always;"></div>
                    <div style="font-size: 20px; font-family:Arial Narrow;color:black;">
                        <span>Leído el presente reglamento y enteradas las partes del contenido y alcances de todas y
                            cada una de las reglas que en el mismo se precisan, acepto las condiciones para realizar los
                            ejercicios y engrenamientos.</span>
                        <br>
                        <br>
                        <span>Este informe es realizado en Mérida Yucatán, el día {{ date('Y-m-d H:i:s') }}, en las
                            instalaciones ubicadas en la Calle 84 número 815 entre 129 y 131 de la Colonia San Antonio
                            Xluch, C.P. 97297</span>
                    </div>
                    <br>
                    <div style="font-size: 20px; font-family:Arial Narrow;color:black;">
                        <table class="table align-items-center mb-0">
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black; text-align:center;">
                                    "EL USUARIO"</td>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black; text-align:center;">
                                    "EL GIMNASIO"</td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:blue; text-align:center;">
                                    {{ $expediente->name }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                    ____________________</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                    Nombre Completo</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                </td>
                                <td></td>
                            </tr>
                            <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                ______________________________</td>
                            <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                ______________________________</td>
                            <tr>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                    Firma</td>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                    PSIC. ABIGAIL CETINA BALAM</td>
                            <tr>
                                <td></td>
                                <td style="font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                    ADMINISTRACIÓN</td>
                            </tr>
                            </tr>
                        </table>
                    </div>

                    {{-- <label for=""></label> --}}
                </main>
                {{-- @include('layouts.footer') --}}
            </div>

        </div>
    </div>

    </div>

</body>

</html>
