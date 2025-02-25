<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?= base_url('assets/img/kaiadmin/favicon.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <!-- Fonts and icons -->
    <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= base_url('assets/css/fonts.min.css') ?>"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/plugins.min.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/kaiadmin.min.css") ?>" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url("assets/css/demo.css") ?>" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                            height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Transaksi</h4>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">DataMaster</h4>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                <i class="fas fa-th-list"></i>
                                <p>Penumpang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#forms">
                                <i class="fas fa-pen-square"></i>
                                <p>Rute & Jadwal</p>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="<?= site_url('admin/transportasi') ?>">
                                <i class="fas fa-table"></i>
                                <p>Transportasi</p>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p> Petugas & Level</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="maps">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="maps/googlemaps.html">
                                            <span class="sub-item">Petugas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="maps/jsvectormap.html">
                                            <span class="sub-item">Level</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Laporan & Rekapitulasi</p>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a href="../../documentation/index.html">
                                <i class="fas fa-file"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>