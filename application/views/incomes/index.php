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
                                <h4 class="mb-sm-0">Ingresos</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                                        <li class="breadcrumb-item active">Ingresos</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="ticketsList">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Listado de ingresos</h5>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex flex-wrap gap-2">
                                                <button class="btn btn-success add-btn btn-add-income pointer"><i class="mdi mdi-cash-plus align-bottom me-1"></i> Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-dashed border-end-0 border-start-0">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-xxl-12 col-sm-12">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search bg-light border-light" placeholder="Buscar...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <!-- <div class="col-xxl-3 col-sm-4">
                                                <div class="input-light">
                                                    <input type="month" id="idStatus" name="start" min="2018-03" value="2018-05" class="form-control" />
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <!-- <div class="col-xxl-2 col-sm-4">
                                                <button type="button" class="btn btn-secondary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                    Filtrar
                                                </button>
                                            </div> -->
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
                                                    <th class="sort" data-sort="category">Categoria</th>
                                                    <th class="sort" data-sort="client_name">Precio</th>
                                                    <th class="sort" data-sort="assignedto">Descripción</th>
                                                    <th class="sort" data-sort="create_date">Fecha de creación</th>
                                                    <th class="sort" data-sort="action">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all" id="ticket-list-data">
                                                <?php
                                                    foreach ($incomes as $income) { ?>
                                                        <tr id="income-<?= $income["id_income"] ?>">
                                                            <td class="id"><?= $income["id_income"] ?></td>
                                                            <td class="tasks_name"><?= date("Y-m-d", strtotime($income["date"])) ?><span style="opacity:0;font-size:1px;"><?= date("Ymd", strtotime($income["date"])) ?></span></td>
                                                            <td class="category"><?= $income["category"] ?></td>
                                                            <td class="client_name"><b>$<?= number_format($income["price"], 0, ',', '.') ?></b><span style="opacity:0;font-size:1px;"><?= $income["price"] ?></span></td>
                                                            <td class="assignedto"><?= $income["description"] ?></td>
                                                            <td class="create_date"><?= date("Y-m-d h:i a", strtotime($income["created_at"])) ?></td>
                                                            <td>
                                                                <ul class="list-inline hstack gap-2 mb-0">
                                                                    <li class="pointer list-inline-item edit btn-edit-income" data-income-id="<?= $income["id_income"] ?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                        <a class="text-primary d-inline-block edit-item-btn">
                                                                            <i class="ri-pencil-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="pointer list-inline-item btn-delete-income" data-edit-id="<?= $income["id_income"] ?>" title="Remove">
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
                                                <p class="text-muted mb-0">Buscamos en <?= count($incomes) ?> movimientos pero no encontramos lo que buscas!</p>
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