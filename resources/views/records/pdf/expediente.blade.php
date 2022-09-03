{{-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        * {
            box-sizing: border-box;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            font-size: 10px;
            font-style: normal;
            line-height: 1.5;
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 2cm;
            right: 0cm;
            height: 2cm;
            text-align: justify;
            line-height: 30px;
        }

        .space {
            margin: 0px;
            top: 0.25in;
            position: absolute;
        }

        .table {
            width: 100%;
            margin: 0px;
            color: #212529;
        }

        img {
            max-width: 100%;
            max-height: 100%;
        }

        .cat {
            height: 200px;
            width: 200px;
        }
    </style>

</head>


<body>

    <header>
        <img src="img/logo.jpeg" alt="logo">
    </header>
    <main>
        <div class="space" style="left: 0%">
            <table class="separado" border="1" style="position:absolute;font-family:Helvetica;margin:0px"
                width="1040px">
                <thead>
                    <tr bgcolor="#CCCCCC">
                        <th>CANT.</th>
                        <th>NO. INVENTARIO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>SERIE</th>
                        <th>FACTURA</th>
                        <th>RECIBIÓ</th>
                        <th>DOCUMENTO</th>
                        <th>ADQUISICIÓN</th>
                        <th>EDO. FISICO</th>
                        <th>MOT.</th>
                        <th>COMP.</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br><br><br><br><br><br><br><br><br><br>
            <table class="separado" border="1" style="top:20in;font-family:Helvetica">
                <thead>
                    <th>Total de Mobiliarios por Rubro:</th>
                    <th></th>
                </thead>
            </table>
        </div>

    </main>















</body>

</html> --}}

<!doctype html>

<head>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            font-size: 10px;
            font-style: normal;
            line-height: 1.5;
            font-family: Arial, Helvetica, sans-serif;
        }

        img {
            height: 10%;
            width: 20%;

            object-fit: contain;
        }

    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body style="background: white;">

    <div>

        <div style="position: center;">
            <header>
                <p style="text-align:center;"><img src="img/logo.jpeg" alt="logo"></p>
                <p style="text-align:center;color:magenta"><span>El Espacio que necesitas como mujer...</span></p>
                {{-- <hr style="text-align:center;color:magenta;" width="35%"> --}}

                <h2 style="text-align:center;">Ficha Inscripcion</h2>

            </header>
            <div id="main-content">
                <main>
                    <h3>I. Identificación</h3>
                    <table class="table table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th style="font-size: 85%">Fecha Entrevista: {{ $expediente->date_interview }}</th>
                                <th style="font-size: 85%">Profesión/ Ocupación: {{ $expediente->ocupation }} </th>
                            </tr>
                            <tr>
                                <th style="font-size: 85%">Nombre Completo: {{ $expediente->name }} </th>
                            </tr>
                            <tr>
                                <th style="font-size: 85%">Edad: {{ $expediente->age }}</th>
                                <th style="font-size: 85%">Número de celular: {{ $expediente->phone }}</th>
                            </tr>
                            <tr>
                                <th style="font-size: 85%">Correo electrónico: {{ $expediente->email }}</th>
                                <th style="font-size: 85%">Fecha de Nacimiento: {{ $expediente->born }}</th>
                            </tr>
                        </thead>
                    </table>
                    <br>
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
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->asma == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->epilepsia == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->ciatica == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->diabetes == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->lumbagia == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->arritmia == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
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
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->depresion == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->depre_postparto == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->estres_cronico == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->estres_postraumatico == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
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
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->herpes == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->sifilis == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->gonorrea == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->sida == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif
                            @if ($expediente->clamidia == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif




                        </tr>
                    </table>
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
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->mareos == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->perdida_conocimiento == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
                            @else
                                <td style="font-size: 85%;text-align:center;"></td>
                            @endif

                            @if ($expediente->hospitalizacion == 1)
                                <td style="font-size: 85%;text-align:center;">x</td>
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

                </main>
                {{-- @include('layouts.footer') --}}
            </div>

        </div>
    </div>

    </div>

</body>

</html>
