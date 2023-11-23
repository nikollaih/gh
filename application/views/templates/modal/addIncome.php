<?php $categories = categories_income_expense(1); ?>
<div class="modal fade" id="addIncomeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body">
                <form  action="<?= base_url() ?>Incomes/create" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="id-income" class="form-control" name="id_income" value="">
                            <div class="px-1 pt-1">
                                <div class="position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                    <div class="d-flex start-0 end-0 top-0 p-3">
                                        <div class="flex-grow-1">
                                            <h5 class="modal-title text-center" id="createIncomeLabel">Agregar Ingreso</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notes-income" class="form-label">Fecha <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date-income" required="" name="date" value="<?= date("Y-m-d") ?>">
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="price-income" placeholder="$0" name="price" required>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label">Categoría <span class="text-danger">*</span></label>
                                <select name="id_category" id="category-income" class="form-control">
                                    <option value="">- Seleccionar</option>
                                    <?php 
                                        foreach ($categories as $category) {
                                            echo '<option value="'.$category["id_category"].'">'.$category["category"].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="notes-income" class="form-label">Descripción <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description-income" cols="30" rows="3" required></textarea>
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