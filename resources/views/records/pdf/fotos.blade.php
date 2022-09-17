<!doctype html>

<head>

    <style>
        .container_12 {
            margin-left: 25px;
            margin-right: 25px;

        }

        img {
            height: 10%;
            width: 20%;

            object-fit: contain;
        }

        img.redimension {
            width: 50%;
            height: 50%;
        }

        /* img.redimension {
            max-width: 50%;
            max-height: 50%;
        } */

        #watermark {
            position: fixed;

            /**
                    Set a position in the page for your image
                    This should center it vertically
                **/
            bottom: -18cm;
            left: 5cm;

            /** Change image dimensions**/
            width: 300%;
            height: 150%;

            /** Your watermark should be behind every content**/
            z-index: 1;
            opacity: 0.10;
        }
    </style>

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
                <h2 style="text-align:center; font-family:Arial Narrow; "> Fotos de Evidencia</h2>
            </header>
            <div id="main-content">
                <main>





                    @foreach ($fotos as $foto)

                        <img class="redimension" src="{{ $foto->path }}" alt="">
                        <br> <br/>
                    @endforeach







                    {{-- <label for=""></label> --}}
                </main>
                {{-- @include('layouts.footer') --}}
            </div>

        </div>
    </div>

    </div>

</body>

</html>
