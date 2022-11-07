<!-- Modal -->
<div class="modal fade" id="modalCorte" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Corte de Caja Inicial</h5>

            </div>
            <form action="{{route('corte.inicial')}}" method="post">
                <div class="modal-body">

                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <div class="col-md">
                                    <label for="">Dinero Inicial (Base)</label>
                                    <input type="text" name="cantidad_inicial" id="cantidad_inicial"
                                        class="form-control">
                                </div>

                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Empezar</button>
                </div>
            </form>
        </div>
    </div>
</div>
