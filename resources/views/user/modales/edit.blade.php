<div class="modal fade" id="editUser-{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Datos Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $row->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="">Codigo Usuario</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control" type="text" id="code_user" name="code_user"
                                    value="{{ $row->code_user }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Nombre Cliente</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $row->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">N&uacute;mero de Tel&eacute;fono (Opcional)</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control" type="number" name="phone" id="phone" maxlength="10"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    min="0" value="{{ $row->phone }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">email (Opcional)</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $row->email }}">
                            </div>
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
