<!-- Modal -->
<div class="modal fade" id="modalEfectivo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cobro en Efectivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <div class="col-md">
                                    <label for="">Total Compra</label>
                                    <input type="text" name="price_total" id="price_total" readonly class="form-control">
                                </div>
                                <div class="col-md">
                                    <label for="">Efectivo</label>
                                    <input type="text" name="cantidad_pagada" id="cantidad_pagada" class="form-control">

                                </div>
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Cambio</label>
                                    <input type="text" name="cambio" id="cambio" readonly class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btnCobrarE" type="button" class="btn btn-primary">Cobrar</button>
            </div>
        </div>
    </div>
</div>
