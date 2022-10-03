<!doctype html>

<head>

    <style>
        .container_12 {
            margin-left: 25px;
            margin-right: 25px;

        }



        img {
            height: 7%;
            width: 17%;

            object-fit: contain;
        }
        #page tr {
   padding: 0;
   margin: 0;
}
        hr {
            page-break-after: always;
            border: 0;
            margin: 0;
            padding: 0;
            }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: inherit;
            text-align: -webkit-match-parent
        }

        td, {
            padding: 5px;
            font-size: 13px;
            font-style: normal;


            /* line-height: 1.5; */

        }


        th,
         {

            font-size: 15px;
            font-style: normal;
            line-height: 1.5;
            padding: 2px;
            width: 100px;

        }
        span,
         {

            font-size: 15px;


        }

        @page {
		margin-top: 0cm;

	    }

        #trh {
    margin:0;
    padding:0;

}


        #watermark {
            position: fixed;

            /**
                    Set a position in the page for your image
                    This should center it vertically
                **/
            top:12cm;
            left: 2.7cm;

            /** Change image dimensions**/
            width: 500%;
            height: 500%;

            /** Your watermark should be behind every content**/
            z-index: 1;
            opacity: 0.3;
        }
    </style>
    {{-- <link rel="stylesheet" href="assets/css/bootstrap.css"> --}}
</head>

<body style="background: white;">
    <div id="watermark">
        <img src="img/logo-remo.png" height="200%" width="200%" />
    </div>
    <div>
        <div style="position: center;">
            <header>
                <p style="text-align:center;"><img src="img/logo.jpeg" alt="logo"></p>
                <p style="text-align:center;color:magenta"><span>El Espacio que necesitas como mujer...</span></p>
                {{-- <hr style="text-align:center;color:magenta;" width="35%"> --}}
                <h3 style="text-align:center; font-family:Arial Narrow; "> Ficha de Inscripción</h3>
            </header>
        </div>
            <div id="main-content">
                <main>
                    <h3>I. Identificación</h3>
                    <table Width=100% class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <td>Fecha Entrevista:
                                    </b>{{ $expediente->date_interview }}</td>
                                <td >Profesión/ Ocupación: </b>
                                    {{ $expediente->ocupation }} </td>
                            </tr>
                            <tr>
                                <td >Nombre Completo: </b>
                                    {{ $expediente->name }} </td>
                                <td >Contacto de Emergencia: </b>
                                     </td>
                            </tr>
                            <tr>
                                <td >Edad: </b> {{ $expediente->age }}
                                </td>
                                <td >Número de celular: </b>
                                    {{ $expediente->phone }}</td>
                            </tr>
                            <tr>
                                <td >Correo electrónico: </b>
                                    {{ $expediente->email }}</td>
                                <td >Fecha de Nacimiento: </b>
                                    {{ $expediente->born }}</td>
                            </tr>
                        </thead>
                    </table>



                    <h3>II. Antecedentes personales en general</h3>
                    <label for=""></label>
                    <table Width=100% class="table table-striped align-items-center mb-0">



                        <tr>
                            <th rowspan="7">Enfermedades Crónicas</th>
                            <td >Hipertension Arterial</td>

                                @if ($expediente->hipertension == 1)
                                    <td style="width:15px"><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td style="width:15px"> </td>
                                @endif

                            <th rowspan="7">Enfermedades Mentales</th>
                            <td >Ansiedad</td>

                                @if ($expediente->ansiedad == 1)
                                    <td style="width:15px"><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td style="width:15px"> </td>
                                @endif

                            <th rowspan="7">Enfermedades de Transmisión Sexual (ETS)</th>
                            <td >Papiloma Humano</td>
                                @if ($expediente->papiloma_humano == 1)
                                    <td style="width:15px"><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td style="width:15px"> </td>
                                @endif

                        </tr>
                        <tr>

                            <td >Asma</td>

                                @if ($expediente->asma == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Depresión</td>

                                @if ($expediente->depresion == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Herpes</td>

                                @if ($expediente->herpes == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>
                        <tr>

                            <td >Epilepsia</td>

                                @if ($expediente->epilepsia == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Depresión Postparto</td>

                                @if ($expediente->depre_postparto == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Sifilis</td>

                                @if ($expediente->sifilis == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>
                        <tr>

                            <td >Inflamación de nervio ciático</td>

                                @if ($expediente->ciatica == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Estrés crónico</td>

                                @if ($expediente->estres_cronico == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Gonorrea</td>

                                @if ($expediente->gonorrea == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>

                        <tr>

                            <td >Diabetes</td>

                                @if ($expediente->diabetes == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td rowspan="3" >Estrés Postraumatico</td>

                                @if ($expediente->estres_postraumatico == 1)
                                    <td rowspan="3"  ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td rowspan="3" > </td>
                                @endif

                            <td >SIDA</td>

                                @if ($expediente->sida == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>

                        <tr>

                            <td >Lumbagia</td>

                                @if ($expediente->lumbagia == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif


                            <td rowspan="2" >Clamidia</td>

                                @if ($expediente->clamidia == 1)
                                    <td rowspan="2"><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td rowspan="2"> </td>
                                @endif

                        </tr>

                        <tr>

                            <td >Arritmias cardiacas</td>

                                @if ($expediente->arritmia == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif


                        </tr>

                    </table>
                    <br>

                    <table Width=100% class="table table-striped align-items-center mb-0">



                        <tr>
                            <th rowspan="10">Ha presentado o presenta alguna de las siguientes condiciones físicas:</th>
                            <td >Desmayos</td>

                                @if ($expediente->desmayos == 1)
                                    <td style="width:15px" ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td style="width:15px" > </td>
                                @endif

                            <th rowspan="10">Cirugías</th>
                            <td >Cesarea</td>

                                @if ($expediente->cesarea == 1)
                                    <td style="width:15px"><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td style="width:15px"> </td>
                                @endif

                            <th rowspan="10">Síntomas adicionales</th>
                            <td >Alergias</td>
                                @if ($expediente->alergias == 1)
                                    <td style="width:15px"><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td style="width:15px" > </td>
                                @endif

                        </tr>
                        <tr>

                            <td >Mareos</td>

                                @if ($expediente->mareos == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Abortos</td>

                                @if ($expediente->abortos == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Cefales(Dolores de cabeza intensos
                                (Migraña))</td>

                                @if ($expediente->cefaleas == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>
                        <tr>

                            <td >Pérdidas del conocimiento</td>

                                @if ($expediente->perdida_conocimiento == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Apéndice</td>

                                @if ($expediente->apendice == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Visión Borrosa</td>

                                @if ($expediente->vision_borrosa == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>
                        <tr>

                            <td rowspan="7" colspan = "2"><b>Hospitalizaciones:</b>

                                @if ($expediente->hospitalizacion == 1)
                                    Causa: {{ $expediente->causa }}<br>
                                        Fecha Hospitalizacion:
                                            {{ $expediente->fecha_hospitalizacion }} </td>
                                @else
                                     </td>
                                @endif

                            <td >Vesícula</td>

                                @if ($expediente->vesicula == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            <td >Cáncer</td>

                                @if ($expediente->cancer == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>

                        <tr>

                            <td colspan="2" rowspan="6"><b>Otro:</b><br>

                                @if ($expediente->otro == 1)
                                     @if ($expediente->fecha_cirugia != null)

                                        Fecha Cirugia: {{ $expediente->fecha_cirugia }}

                                     @endif
                                     @if ($expediente->causa_cirugia != null)

                                        <br>Causa Cirugia: {{ $expediente->causa_cirugia }}

                                    @endif

                                   </td>
                                @else
                                   </td>
                                @endif

                            <td  >Ausencia de Órganos</td>

                                @if ($expediente->ausencia_organos == 1)
                                    <td  ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                        </tr>

                        <tr>

                            <td >Embarazos</td>

                                @if ($expediente->embarazos == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif
                            </tr>
                            <tr>

                            <td >Abortos</td>

                                @if ($expediente->aborto == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif

                            </tr>
                            <tr>

                            <td >Método Anticonceptivo</td>

                                @if ($expediente->metodo_anticonceptivo == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif
                            </tr>
                            <tr>

                            <td >Traumatismos Craneocefálicos</td>

                                @if ($expediente->craneocefalico == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif
                            </tr>
                            <tr>

                            <td >Traumatismos Cervicales</td>

                                @if ($expediente->cervicales == 1)
                                    <td ><b style="font-size: 20px;">x</b></td>
                                @else
                                    <td > </td>
                                @endif
                            </tr>

                    </table>
                    <hr>
                    <p style="text-align:center;"><img src="img/logo.jpeg" alt="logo"></p>
                    <p style="text-align:center;color:magenta"><span>El Espacio que necesitas como mujer...</span></p>
                    <br>
                    <table Width=100% class="table table-striped align-items-center mb-0">

                            <tr>
                                <td style="font-size: 85%"><b>Medicamentos:<b> {{ $expediente->medicamentos }}</td>
                            </tr>

                    </table>

                    <h3>III. Hábitos psicobiológicos:</h3>
                    <label for=""></label>
                    <table Width=100% class="table table-striped align-items-center mb-0">



                        <tr>

                            <th >Alimentacion</th>
                            <td >Número de comidas: {{ $expediente->numero_comidas }}</b></td>


                            <th rowspan="12">Adicciones</th>
                            <td >Tabaco</td>
                            <td colspan="2">Consumo diario: {{ $expediente->tabaco }}</td>



                        </tr>
                        <tr>
                            <th >Sueño</th>
                            <td >Horas habituales de descanso:
                                {{ $expediente->horas_descanso }}</td>

                            <td >Alcohol</td>
                            <td  colspan="2" >Consumo diario: {{ $expediente->alcohol }}</td>

                        </tr>

                        <tr>
                            <th rowspan="5" >Micciones (Orinar)</th>
                            <td rowspan="5" >Veces al día: {{ $expediente->micciones_dia }}<br>
                                Veces en la noche: {{ $expediente->micciones_noche }}</td>

                            <td rowspan="10" >Drogas Psicoactivas</td>
                            <td>Marihuana</td>
                            @if ($expediente->marihuana == 1)
                                <td style="width:15px" ><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td style="width:15px"  ></td>
                            @endif

                        </tr>
                        <tr>



                            <td>Opiaceos</td>
                            @if ($expediente->opiaceos == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Cocaína</td>
                            @if ($expediente->cocaina == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Heroína</td>
                            @if ($expediente->heroina == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Pastillas</td>
                            @if ($expediente->pastillas == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <th rowspan="5" >Evacuaciones (Defecar)</th>
                            <td rowspan="5" >Veces durante el día: {{ $expediente->evacuaciones }}</td>

                            <td>Crack</td>
                            @if ($expediente->crack == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Resistol</td>
                            @if ($expediente->resistol == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Gasolina</td>
                            @if ($expediente->gasolina == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Thiner</td>
                            @if ($expediente->thiner == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        <tr>

                            <td>Cristal</td>
                            @if ($expediente->cristal == 1)
                                <td><b style="font-size: 20px;">x</b><</td>
                            @else
                                <td></td>
                            @endif

                        </tr>

                    </table>
                    <br>
                    <hr>
                    <p style="text-align:center;"><img src="img/logo.jpeg" alt="logo"></p>
                    <p style="text-align:center;color:magenta"><span>El Espacio que necesitas como mujer...</span></p>
                    <br>
                    <h3>IX. Control Peso:</h3>
                    <br>

                    <table class="table table-striped align-items-center mb-0">

                        <tr>
                            <td With = "6" ><b >Concepto:</td>
                            <td  With = 10px ><b style="font-size: 10px;" >Primera Cita:</td>
                            @if ($count > 1)
                                @for ($i = 1; $i <$count; $i++)
                                <td  With = "6" ><b >Mes
                                    {{ $i }} :</td>
                                @endfor

                            @endif


                        </tr>
                        <tr >

                            <td id="trh">
                                <div >

                            <table class="table table-striped align-items-center mb-0">

                            <tr>
                                <td height ="15"  ><b >Fecha</td>
                                                            </tr>
                            <tr>
                                <td height ="15" ><b >Peso</td>
                                                       </tr>
                            <tr>
                                <td height ="15" ><b >IMC</td>
                                                   </tr>
                            <tr>
                                <td height ="15" ><b >% Grasa</td>
                                                       </tr>
                            <tr>
                                <td height ="15" ><b >% Musculo</td>
                                                          </tr>
                            <tr>
                                <td height ="15" ><b >KCAL</td>
                                                    </tr>
                            <tr>
                                <td height ="15" ><b >Edad Blo</td>
                                                        </tr>
                            <tr>
                                <td height ="15" ><b >Visceral</td>
                                                           </tr>
                            <tr>
                                <td height ="15" ><b >Busto</td>
                                                        </tr>
                            <tr>
                                <td height ="15" ><b >Cintura</td>
                                                          </tr>
                            <tr>
                                <td height ="15" ><b >Cadera</td>
                                                         </tr>
                            <tr>
                                <td height ="15" ><b >Brazo Der.</td>
                                                            </tr>
                            <tr>
                                <td height ="15" ><b >Brazo Izq.</td>
                                                            </tr>
                            <tr>
                                <td height ="15" ><b >Pierna Der.</td>

                            </tr>
                            <tr>
                                <td height ="15" ><b >Pierna Izq.</td>

                            </tr>

                            </table>
                        </div>
                    </td>



                        @foreach ($peso as $data)

                        <td id="trh">
                            <div >

                        <table class="table table-striped align-items-center mb-0">

                            <tr>
                                        <td height ="15" >{{ $data->fecha_visita }}</td>
                            </tr>
                            <tr>
                                       <td height ="15">{{ $data->peso }} Kg</td>
                            </tr>
                            <tr>
                                      <td height ="15">{{ $data->IMC }}</td>
                            </tr>
                            <tr>
                                          <td height ="15">{{ $data->grasa }} %</td>
                            </tr>
                            <tr>
                                            <td height ="15">{{ $data->musculo }} Kg</td>
                            </tr>
                            <tr>
                                       <td height ="15">{{ $data->KCAL }}</td>
                            </tr>
                            <tr>
                                           <td height ="15">{{ $data->edad_blo }}</td>
                            </tr>
                            <tr>
                                           <td height ="15">{{ $data->visceral }} Kg</td>
                            </tr>
                            <tr>
                                        <td height ="15">{{ $data->busto }} cm</td>
                            </tr>
                            <tr>
                                          <td height ="15">{{ $data->cintura }} cm</td>
                            </tr>
                            <tr>
                                         <td height ="15">{{ $data->cadera }} cm</td>
                            </tr>
                            <tr>
                                             <td height ="15">{{ $data->brazo_der }} cm</td>
                            </tr>
                            <tr>
                                             <td height ="15">{{ $data->brazo_izq }} cm</td>
                            </tr>
                            <tr>
                                              <td height ="15">{{ $data->pierna_der }} cm</td>
                            </tr>
                            <tr>
                                              <td height ="15">{{ $data->pierna_izq }} cm</td>
                            </tr>

                        </table>
                    </div>
                </td>

                        @endforeach





                        </tr>
                    </table>
                <hr>
                <p style="text-align:center;"><img src="img/logo.jpeg" alt="logo"></p>
                <p style="text-align:center;color:magenta"><span>El Espacio que necesitas como mujer...</span></p>

                <div style="font-size: 20px; font-family:Arial Narrow;color:black; margin:10px 60px">
                    <p style="text-align:center;"><span><b>REGLAMENTO</b> </span></p>

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
                    <table  Width = 100% style="border: hidden" class="table align-items-center mb-0">
                        <tr style="border: hidden">
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black; text-align:center;">
                                "EL USUARIO"</td>
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black; text-align:center;">
                                "EL GIMNASIO"</td>
                        </tr>
                        <tr style="border: hidden">
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:blue; text-align:center;">
                                {{ $expediente->name }}</td>
                        </tr>
                        <tr style="border: hidden">
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                ____________________</td>
                            <td></td>
                        </tr>
                        <tr style="border: hidden">
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                Nombre Completo</td>
                            <td></td>
                        </tr>
                        <tr style="border: hidden">
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                            </td>
                            <td></td>
                        </tr>
                        <tr style="border: hidden">
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                            </td>
                            <td></td>
                        </tr>
                        <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                            ______________________________</td>
                        <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                            ______________________________</td>
                        <tr>
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                Firma</td>
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                PSIC. ABIGAIL CETINA BALAM</td>
                        <tr>
                            <td></td>
                            <td style="border: hidden; font-size: 20px; font-family:Arial Narrow;color:black;text-align:center;">
                                ADMINISTRACIÓN</td>
                        </tr>
                        </tr>
                    </table>




                </main>
                {{-- @include('layouts.footer') --}}
            </div>

        </div>



</body>


</html>

