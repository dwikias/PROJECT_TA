<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />


  <meta name="robots" content="noindex,nofollow" />
  <title> DES | Forecasting </title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/assets/images/favicon.png" />

  <script src="https://kit.fontawesome.com/054d273cfb.js" crossorigin="anonymous"></script>

  <!-- Custom CSS -->
  <link href="<?php echo base_url() ?>assets/assets/libs/flot/css/float-chart.css" rel="stylesheet" />

  <script src="<?php echo base_url() ?>assets/dist/js/jquery-3.6.0.min.js"></script>

  <!-- Custom CSS -->
  <link href="<?php echo base_url() ?>assets/dist/css/style.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets/dist/css/style.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/dist/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/dist/css/jquery.dataTables.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/dist/css/dataTables.bootstrap4.css' ?>">

  <style>
    .left-sidebar .scroll-sidebar nav ul li a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body>

  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="<?php echo base_url() ?>assets/assets/images/icon-logo.png" alt="homepage" class="light-logo" width="35" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
              <!-- dark Logo text -->
              <img src="<?php echo base_url() ?>assets/assets/images/text_logo2.png" alt="homepage" class="light-logo" />
            </span>
          </a>
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>