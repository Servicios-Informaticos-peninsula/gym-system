@extends('layouts.app')

@section('content')
@include('mensajes.mensajes')
    <div class="container">
        <div class="row">
            <div class="col-md col-sm-12 mx-auto">
                <div class="card pt-4">
                    <div class="card-body">

                        <form method="POST" action="{{ route('perfil.update') }}">
@method('patch')
                            @csrf



                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Actualizar Datos Generales</h3>
                                            <span>En esta sección sera para actualizar los datos generales del
                                                usuario</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="" >Nombre</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Apellidos</label>
                                                    <input type="text" class="form-control" id="surnames" name="surnames" value="{{Auth::user()->surnames}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Telefono</label>
                                                    <input class="form-control" id="phone" type="number" min="0" maxlength="10" value="{{Auth::user()->phone}}" name="phone">
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Actualizar Datos Personales</h3>
                                            <span>En esta sección sera para actualizar los datos Personales del
                                                usuario</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Telefono de Contacto</label>
                                                    <input type="number" min="0" maxlength="10" class="form-control" id="contact_phone" name="contact_phone" value="{{Auth::user()->contact_phone}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Ocupacion</label>
                                                    <input type="text" class="form-control" id="ocupation" name="ocupation" value="{{Auth::user()->ocupation}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="age">Edad</label>
                                                    <input type="text" class="form-control" id="age" name="age" value="{{Auth::user()->age}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" id="born" name="born" value="{{Auth::user()->born}}">
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Actualizar Datos Acceso</h3>
                                            <span>En esta sección sera para actualizar los datos de acceso del
                                                usuario</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">codigo de Usuario (Este no es editable)</label>
                                                    <input type="text" class="form-control" id="code_user" name="code_user" value="{{Auth::user()->code_user}}" readonly>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Nombre de Usuario (Este no es editable)</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{Auth::user()->username}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="">Contraseña</label>
                                                    <input type="text" class="form-control" id="password" name="password">
                                                </div>

                                            </div>
                                        </div>

                                    </div>





                                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
