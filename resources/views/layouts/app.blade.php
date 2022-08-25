<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}">
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}


</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebar')
        </div>
        <div id="main" class="layout-navbar">
            <header class="mb-3">
                @include('layouts.navbar')
            </header>
            <div id="main-content">
                <main>
                    @yield('content')
                </main>
                @include('layouts.footer')
            </div>

        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
    </div>
    @yield('scripts')
</body>

</html>
