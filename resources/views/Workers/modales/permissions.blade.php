<div class="modal fade" id="editColaborator-{{ $worker->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Permisos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('workers.update', $worker->id) }}" method="POST" name="user-add" id="user-add">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label for=""><b>Nombre Colaborador *</b> </label>
                        <div class="row">
                            <div class="col-md">
                                <label for=""> Nombre(s) *</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="">Apellidos (*)</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" type="text" id="surnames" name="surnames"
                                            value="{{ old('surnames') }}">
                                    </div>
                                    @error('surnames')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">
                                <label for="">N&uacute;mero de Telefono *</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" type="number" name="phone" id="phone"
                                            maxlength="10"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            min="0" value="{{ old('phone') }}">
                                    </div>
                                    @error('phone')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="">N&uacute;mero de Emergencia *</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" type="number" name="contact_phone"
                                            id="contact_phone" maxlength="10"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            min="0" value="{{ old('contact_phone') }}">
                                    </div>
                                    @error('contact_phone')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">
                                <label for="">Ocupacion *</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" type="text" name="ocupation" id="ocupation"
                                            value="{{ old('ocupation') }}">
                                    </div>
                                    @error('ocupation')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="">Fecha Nacimiento*</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" type="date" name="born" id="born"
                                            value="{{ old('born') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Correo Electronico *</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ old('email') }}">

                            </div>
                            @error('email')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Cancelar</button>
                <button type="submit" class="btn btn-success"><strong>GUARDAR</strong></button>
            </div>
            </form>
        </div>
    </div>
</div>
