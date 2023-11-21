<!doctype html>
<html lang="en" data-layout="semibox" data-sidebar-visibility="show" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<?php $this->load->view("templates/head") ?>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
    <!-- HEADER -->
    <?php $this->load->view("templates/header") ?>

    <!-- ========== App Menu ========== -->
    <?php $this->load->view("templates/sidebar") ?>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Movimientos</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>Users">Clientes</a></li>
                                        <li class="breadcrumb-item active"><?= $client["fullname"] ?></li>
                                        <li class="breadcrumb-item active">Movimientos</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                        <div class="row text-sm-center text-md-left">
                            <div class="col-xs-12 col-md-2">
                                <div class="avatar-lg mx-auto">
                                <?php
                                    $url = base_url().'uploads/users/profile/'.$client["profile_image"];
                                    
                                    // Check if the URL is valid
                                    $headers = get_headers($url);
                                    if ($headers && strpos($headers[0], '200')) { ?>
                                            <img src="<?= $url ?>" alt="user-img" class="img-thumbnail rounded-circle">
                                        <?php } else { ?>
                                            <div class="avatar-title border bg-light text-primary rounded-circle text-uppercase"><h1 class="m-0 text-primary"><?= getInitials($client["fullname"]) ?></h1></div>
                                        <?php }
                                    ?>  
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xs-12 col-md-8">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?= $client["fullname"] ?></h3>
                                    <p class="text-white"><?= $client["notes"] ?></p>
                                    <div class="text-white">
                                        <p>
                                            <i class="ri-phone-line me-1 text-white fs-16 align-middle"></i><?= $client["phone_number"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <div class="row text text-white text-center">
                                    <div class="col-lg-12 col-12">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1">$<?= number_format($client["balance"], 0, ',', '.') ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="ticketsList">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Movimientos</h5>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex flex-wrap gap-2">
                                                <button class="btn btn-success add-btn btn-add-movement pointer pay" data-user-id="<?= $client["id_user"] ?>"><i class="mdi mdi-cash-plus align-bottom me-1"></i> Abonar</button>
                                                <button class="btn btn-danger add-btn btn-add-movement pointer buy" data-user-id="<?= $client["id_user"] ?>"><i class="ri-shopping-cart-line align-bottom me-1"></i> Comprar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-dashed border-end-0 border-start-0">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-xxl-5 col-sm-12">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search bg-light border-light" placeholder="Buscar...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-xxl-3 col-sm-4">
                                                <div class="input-light">
                                                    <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                                                        <select class="form-control choices__input" data-choices="" data-choices-search-false="" name="choices-single-default" id="idStatus" tabindex="-1" data-choice="active">
                                                            <option value="all" data-custom-properties="">Todos</option>    
                                                            <option value="Compra" data-custom-properties="">Compras</option>
                                                            <option value="Abono" data-custom-properties="">Abonos</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-2 col-sm-4">
                                                <button type="button" class="btn btn-secondary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                    Filtrar
                                                </button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="table-responsive table-card mb-4">
                                        <table class="table align-middle table-nowrap mb-0" id="Table">
                                            <thead>
                                                <tr>
                                                    <th class="sort desc" data-sort="id">ID</th>
                                                    <th class="sort" data-sort="tasks_name">Fecha</th>
                                                    <th class="sort" data-sort="status">Tipo</th>
                                                    <th class="sort" data-sort="client_name">Precio</th>
                                                    <th class="sort" data-sort="assignedto">Notas</th>
                                                    <th class="sort" data-sort="create_date">Fecha de creación</th>
                                                    <th class="sort" data-sort="action">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all" id="ticket-list-data">
                                                <?php
                                                    foreach ($movements as $movement) { ?>
                                                        <tr id="movement-<?= $movement["id_movement"] ?>">
                                                            <td class="id"><?= $movement["id_movement"] ?></td>
                                                            <td class="tasks_name"><?= date("Y-m-d", strtotime($movement["date"])) ?><span style="opacity:0;font-size:1px;"><?= date("Ymd", strtotime($movement["date"])) ?></span></td>
                                                            <td class="status">
                                                                <span class="badge bg-<?= ($movement["type"] == 0) ? "danger" : "success" ?>-subtle text-<?= ($movement["type"] == 0) ? "danger" : "success" ?> text-uppercase"><?= ($movement["type"] == 0) ? "Compra" : "Abono" ?></span>
                                                            </td>
                                                            <td class="client_name"><b>$<?= number_format($movement["price"], 0, ',', '.') ?></b><span style="opacity:0;font-size:1px;"><?= $movement["price"] ?></span></td>
                                                            <td class="assignedto"><?= $movement["notes"] ?></td>
                                                            <td class="create_date"><?= date("Y-m-d h:i a", strtotime($movement["created_at"])) ?></td>
                                                            <td>
                                                                <ul class="list-inline hstack gap-2 mb-0">
                                                                    <li class="pointer list-inline-item edit btn-edit-movement <?= ($movement["type"] == 0) ? "buy" : "pay" ?>" data-movement-id="<?= $movement["id_movement"] ?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                        <a class="text-primary d-inline-block edit-item-btn">
                                                                            <i class="ri-pencil-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="pointer list-inline-item btn-delete-movement" data-edit-id="<?= $movement["id_movement"] ?>" title="Remove">
                                                                        <a class="text-danger d-inline-block remove-item-btn">
                                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">No hay resultados</h5>
                                                <p class="text-muted mb-0">Buscamos en <?= count($movements) ?> movimientos pero no encontramos lo que buscas!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="pagination-wrap hstack gap-2" style="display: flex;">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"><li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li><li><a class="page" href="#" data-i="2" data-page="8">2</a></li></ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                </div><!-- container-fluid -->
            </div>
            <?php $this->load->view("templates/footer") ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</body>
</html>

 <!-- profile init js -->
 <script src="<?= base_url() ?>assets/js/pages/profile.init.js"></script>

 <!-- list.js min js -->
 <script src="<?= base_url() ?>assets/libs/list.js/list.min.js"></script>

<!--list pagination js-->
<script src="<?= base_url() ?>assets/libs/list.pagination.js/list.pagination.min.js"></script>

<!--list pagination js-->
<script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- titcket init js -->
<script src="<?= base_url() ?>assets/js/pages/ticketlist.init.js"></script>