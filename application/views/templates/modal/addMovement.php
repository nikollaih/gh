<div class="modal fade" id="addMovementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body">
                <form  action="<?= base_url() ?>Movements/create" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="id-movement" class="form-control" name="id_movement" value="">
                            <input type="hidden" id="type-movement" class="form-control" name="type" value="1">
                            <input type="hidden" id="user-movement" class="form-control" name="id_user" value="1">
                            <div class="px-1 pt-1">
                                <div class="position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                    <div class="d-flex start-0 end-0 top-0 p-3">
                                        <div class="flex-grow-1">
                                            <h5 class="modal-title text-center" id="createMovementLabel">Agregar Compra</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notes-movement" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="date-movement" required="" name="date" value="<?= date("Y-m-d") ?>">
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price-movement" placeholder="$0" name="price" required>
                            </div>

                            <div class="mb-4">
                                <label for="notes-movement" class="form-label">Notas</label>
                                <textarea class="form-control" name="notes" id="notes-movement" cols="30" rows="3"></textarea>
                            </div>

                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success" id="">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>