<!-- Modal -->
<div class="modal fade" id="modalCorteFinal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cierre de caja</h5>

            </div>
            <input type="number" id="id_corte" name="id_corte" >
            <form action="" method="post">
                <div class="modal-body">

                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">

                                <div class="col-md">
                                    <label for="">Fondo de caja</label>
                                    <input type="text" name="fondo_caja" id="fondo_caja"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md">
                                    <label for="">Cantidad de cierre (menos fondo de caja)</label>
                                    <input type="text" name="cantidad_final" id="cantidad_final"
                                        class="form-control">
                                </div>
                                <div class="col-md">
                                    <label for="">total de venta </label>
                                    <input type="text" name="total_venta" id="total_venta"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md">
                                    <label for="">Diferencia</label>
                                    <input type="text" name="diferencia" id="diferencia"
                                        class="form-control" readonly>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="btnCerrarCorte">Proceder con el cierre de caja</button>
                </div>
            </form>
        </div>
    </div>
</div>
