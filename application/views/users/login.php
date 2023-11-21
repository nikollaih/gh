<!doctype html>
<html lang="en" data-layout="semibox" data-sidebar-visibility="show" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<?php $this->load->view("templates/head") ?>
<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="col-lg-12">
                                    <div class="text-center mb-4">
                                        <div>
                                            <a class="d-inline-block auth-logo">
                                                <img src="<?= base_url() ?>assets/images/logo-dark.png" alt="" height="80">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <h5 class="text-dark">Bienvenido!</h5>
                                    <p class="text-muted">Iniciar sesión en GH</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="<?= base_url() ?>Users/login" method="post">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Nombre de usuario</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese el nombre de usuario">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Contraseña</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="*********" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                        <?php
                                            if($this->session->flashdata('login')) { ?>
                                                <div class="mt-4 alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show mb-xl-0" role="alert">
                                                    <i class="ri-error-warning-line label-icon"></i><strong>Error</strong>
                                                    <?= $this->session->flashdata('login') ?>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php }
                                        ?>

                                        <div class="mt-4">
                                            <button class="btn btn-secondary w-100" type="submit">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Ceado con <i class="mdi mdi-heart text-danger"></i> by Nikollai
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="assets/js/pages/password-addon.init.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/corporate/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 19:54:55 GMT -->
</html>