@extends('auth.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="{{asset('img/logo.jpeg')}}" height="48" class='mb-4'>
                        <h3>Iniciar Sesión</h3>
                        <p>Porfavor ponga sus datos para acceder a Spacio Fem´s.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="position-relative">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <i class="bi bi-fingerprint"></i>
                                    <strong>{{ $message }}</strong>

                                </span>
                            @enderror
                                <div class="form-control-icon">
                                    <i class="bi bi-fingerprint"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">

                            <div class="position-relative">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-left">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Recuerdame</label>
                            </div>

                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-right">Acceder</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
