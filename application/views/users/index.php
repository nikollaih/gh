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
                                <h4 class="mb-sm-0">Clientes</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                                        <li class="breadcrumb-item active">Clientes</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-sm-4">
                                    <div class="search-box">
                                        <input type="text" class="form-control" id="search" placeholder="Buscar...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-sm-auto ms-auto">
                                    <div class="list-grid-nav hstack gap-1">
                                        <button type="button" id="grid-view-button" class="btn btn-soft-info nav-link btn-icon fs-14 active filter-button"><i class="ri-grid-fill"></i></button>
                                        <button type="button" id="list-view-button" class="btn btn-soft-info nav-link  btn-icon fs-14 filter-button"><i class="ri-list-unordered"></i></button>
                                        <button class="btn btn-secondary addMembers-modal" data-bs-toggle="modal" data-bs-target="#addmemberModal"><i class="ri-add-fill me-1 align-bottom"></i> Agregar Cliente</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="teamlist">
                                <div class="team-list grid-view-filter row" id="team-member-list">
                                    <?php
                                        foreach ($clients as $client) { ?>
                                            <div class="col client-item" id="client-<?= $client["id_user"] ?>">
                                                <div class="card team-box">
                                                    <div class="team-cover">                    
                                                        <img src="assets/images/small/img-12.webp" alt="" class="img-fluid">                
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                            <div class="row">
                                                                <div class="col">
                                                                    
                                                                </div>
                                                                <div class="col text-end dropdown">
                                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">                                        
                                                                        <i class="ri-more-fill fs-17"></i>                                    
                                                                    </a>                                    
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li class="btn-add-movement pointer buy" data-user-id="<?= $client["id_user"] ?>">
                                                                            <a class="dropdown-item">
                                                                                <i class="ri-shopping-cart-line me-2 align-bottom text-muted"></i>Agregar Compra
                                                                            </a>
                                                                        </li>
                                                                        <li class="btn-add-movement pointer pay" data-user-id="<?= $client["id_user"] ?>">
                                                                            <a class="dropdown-item text-success">
                                                                                <i class="mdi mdi-cash-plus me-2 align-bottom text-success"></i>Abono
                                                                            </a>
                                                                        </li>
                                                                        <li class="btn-edit-user pointer" data-edit-id="<?= $client["id_user"] ?>">
                                                                            <a class="dropdown-item">
                                                                                <i class="ri-pencil-line me-2 align-bottom text-muted"></i>Modificar
                                                                            </a>
                                                                        </li>
                                                                        <li class="pointer btn-delete-user" data-edit-id="<?= $client["id_user"] ?>">
                                                                            <a class="dropdown-item remove-list text-danger" data-remove-id="11">
                                                                                <i class="ri-delete-bin-5-line me-2 align-bottom text-danger"></i>Eliminar
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                            <div class="team-profile-img">
                                                                <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                    <?php
                                                                    $url = base_url().'uploads/users/profile/'.$client["profile_image"];
                                                                    
                                                                    // Check if the URL is valid
                                                                    $headers = get_headers($url);
                                                                    if ($headers && strpos($headers[0], '200')) { ?>
                                                                            <img src="<?= $url ?>" alt="" class="member-img img-fluid d-block rounded-circle">
                                                                        <?php } else { ?>
                                                                            <div class="avatar-title border bg-light text-primary rounded-circle text-uppercase"><?= getInitials($client["fullname"]) ?></div>
                                                                        <?php }
                                                                    ?>  
                                                                </div>
                                                                <div class="team-content">
                                                                    <a class="member-name" data-bs-toggle="offcanvas" href="#member-overview" aria-controls="member-overview">
                                                                        <h5 class="fs-16 mb-1 client-name"><?= $client["fullname"] ?></h5>
                                                                    </a>
                                                                    <p class="<?= ($client["balance"] < 0) ? "text-danger" : (($client["balance"] > 0) ? "text-success" : "text-muted") ?> member-designation mb-0">$<?= number_format($client["balance"], 0, ',', '.') ?></p>
                                                                    <p class="text-muted client-notes mb-0"><?= $client["notes"] ?></p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">                                
                                                                    <a href="<?= base_url() ?>Users/movements/<?= $client["id_user"] ?>" class="btn btn-light view-btn">Ver movimientos</a>                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } 
                                    ?>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!--end row-->
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