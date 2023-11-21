<div class="modal fade" id="addmemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body">
                <form  action="<?= base_url() ?>Users/create" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="id-user" class="form-control" name="id_user" value="">
                            <input type="hidden" id="id-user-type" class="form-control" name="id_user_type" value="2">
                            <div class="px-1 pt-1">
                                <div class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                    <img src="<?= base_url() ?>assets/images/small/img-12.webp" alt="" id="cover-img" class="img-fluid">

                                    <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                        <div class="flex-grow-1">
                                            <h5 class="modal-title text-white" id="createMemberLabel">Nuevo Cliente</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex gap-3 align-items-center">
                                                <button type="button" class="btn-close btn-close-white" id="createMemberBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-4 mt-n5 pt-2">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute bottom-0 end-0">
                                        <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Member Image" data-bs-original-title="Select Member Image">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="member-image-input" name="profile-image" type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="<?= base_url() ?>assets/images/users/user-dummy-img.jpg" id="member-img" class="avatar-md rounded-circle h-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="teammembersName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Nombre Completo" required="" name="fullname">
                                <div class="invalid-feedback">Por favor ingrese un nombre.</div>
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">Balance inicial</label>
                                <input type="number" class="form-control" id="balance" placeholder="$0" name="balance" required>
                                <div class="invalid-feedback">Por favor ingrese un número</div>
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="phone" placeholder="3112233444" name="phone_number">
                            </div>

                            <div class="mb-4">
                                <label for="teammembersName" class="form-label">Notas</label>
                                <textarea class="form-control" name="notes" id="notes" cols="30" rows="3"></textarea>
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