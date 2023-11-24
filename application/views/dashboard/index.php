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
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Hola, Admin!</h4>
                                                <p class="text-muted mb-0">Estas son las estadisticas del día.</p>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Balance del mes</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-2">
                                                    
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-<?= ($balance >= 0) ? "success" : "danger" ?>-subtle rounded fs-3">
                                                            <i class="mdi mdi-cash-register text-<?= ($balance >= 0) ? "success" : "danger" ?>"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 text-success text-rigth fs-6" style="text-align:right;">$<?= number_format(abs(floatval($incomes)), 0, ',', '.'); ?></p>
                                                        <p class="mb-0 text-danger" style="text-align:right;">$<?= number_format(abs(floatval($expenses)), 0, ',', '.'); ?></p>
                                                        <h4 class="fs-20 fw-semibold ff-secondary mb-0"><span class="" data-target="">$<?= number_format(abs(floatval($balance)), 0, ',', '.'); ?></span></h4>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> morosos</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="" data-target=""><?= count($slow_payer) ?></span></h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-danger"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Por cobrar</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-20 fw-semibold ff-secondary mb-4 text-danger">$<span class="text-danger" data-target=""><?= number_format(abs(floatval($debt)), 0, ',', '.'); ?></span></h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-secondary-subtle rounded fs-3">
                                                            <i class="bx bx-wallet text-secondary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Créditos Activos</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="" data-target=""><?= count($clients); ?></span></h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart text-primary"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div> <!-- end row-->
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Balance del mes</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myLineChart" class="chartjs-chart" data-colors='["--vz-primary-rgb, 0.2", "--vz-primary", "--vz-success-rgb, 0.2", "--vz-success"]'></canvas>
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- container-fluid -->
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

<!-- Chart JS -->
<script src="<?= base_url() ?>assets/libs/chart.js/chart.umd.js"></script>

<!-- chartjs init -->
<script src="<?= base_url() ?>assets/js/pages/chartjs.init.js"></script>

<script>
    $(document).ready(function(){
        let arrayOfNumbers = [];

        for (let i = 1; i <= 31; i++) {
            arrayOfNumbers.push(i.toString());
        }
        // Sample data for the line chart
        let data = {
            labels: arrayOfNumbers,
            datasets: [
                {
                    label: "Gastos",
                    fill: !0,
                    lineTension: 0.5,
                    backgroundColor: 'rgba(210, 87, 94, 0.1)',
                    borderColor: 'rgb(210, 87, 94)',
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0,
                    borderJoinStyle: "miter",
                    pointBorderColor: 'rgb(210, 87, 94)',
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 2,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: 'rgb(210, 87, 94)',
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [65, 59, 80, 81, 56, 55, 40, 55, 30, 80],
                },
                {
                    label: "Ingresos",
                    fill: !0,
                    lineTension: 0.5,
                    backgroundColor: 'rgb(60, 209, 136, 0.1)',
                    borderColor: 'rgba(60, 209, 136)',
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0,
                    borderJoinStyle: "miter",
                    pointBorderColor: 'rgb(60, 209, 136)',
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 2,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: 'rgb(60, 209, 136)',
                    pointHoverBorderColor: "#eef0f2",
                    pointHoverBorderWidth: 2,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [80, 23, 56, 65, 23, 35, 85, 25, 92, 36],
                },
            ],
        }

        let options = {
            scales: {
                x: {
                    ticks: {
                        font: {
                            family: "Poppins"
                        }
                    }
                },
                y: {
                    ticks: {
                        font: {
                            family: "Poppins"
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: "Poppins"
                        }
                    }
                }
            }
        };

        // Get the canvas element
        var ctx = document.getElementById('myLineChart').getContext('2d');

        // Create the line chart
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    });
</script>