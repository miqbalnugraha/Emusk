<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Musk</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" href="{{asset('templateLTE')}}/dist/img/favicon.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/toastr/toastr.min.css">
  <!-- DataTables 
  
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('templateLTE')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-footer-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  @include('sweetalert::alert')
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/logout" class="nav-link font-weight-bold" style="color: #dc3545"><i class="fas fa-power-off"></i> <i class=""> </i> SIGN OUT</a>
        </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('templateLTE')}}/dist/img/logo-icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text">E-Musk</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('templateLTE')}}/dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search Menu/Sub Menu" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                 <a href="/" class="nav-link {{ request()->is('/') ? 'active' : ''}}">
                   <i class="nav-icon fas fa-chart-bar"></i>
                   <p>
                     Dashboard
                   </p>
                 </a>
               </li>
               <li class="nav-item {{ request()->is('SaranaSudahDiuji','SaranaBelumDiuji','SaranaSudahDiuji/*','SaranaBelumDiuji/*') ? 'menu-open' : ''}}">
                 <a href="#" class="nav-link {{ request()->is('SaranaSudahDiuji', 'SaranaBelumDiuji','SaranaSudahDiuji/*','SaranaBelumDiuji/*') ? 'active' : ''}}">
                   <i class="nav-icon fas fa-desktop"></i>
                   <p>
                     Monitoring
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="/SaranaSudahDiuji" class="nav-link {{ request()->is('SaranaSudahDiuji','SaranaSudahDiuji/*') ? 'active' : ''}}">
                       <i class="fas fa-check nav-icon"></i>
                       <p>Sarana Sudah Diuji</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="/SaranaBelumDiuji" class="nav-link {{ request()->is('SaranaBelumDiuji','SaranaBelumDiuji/*') ? 'active' : ''}}">
                       <i class="fas fa-exclamation nav-icon"></i>
                       <p>Sarana Belum Diuji</p>
                     </a>
                   </li>
                   </li>
                 </ul>
               </li>
               <li class="nav-item">
                <a href="/Keterangan" class="nav-link {{ request()->is('Keterangan','Keterangan/*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-paperclip"></i>
                  <p>
                    Keterangan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Excel" class="nav-link {{ request()->is('Excel','Excel/*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-file-excel"></i>
                  <p>
                    Excel
                  </p>
                </a>
              </li>
               @if(Auth::user()->level!="User")
               <li class="nav-item">
                 <a href="/inputData" class="nav-link {{ request()->is('inputData','inputData/*') ? 'active' : ''}}">
                   <i class="nav-icon fas fa-file-import"></i>
                   <p>
                     Input / Edit Data
                   </p>
                 </a>
               </li>
               @endif
               @if(Auth::user()->level=="Master")
               <li class="nav-item {{ request()->is('masterData','userData','masterData/*','userData/*') ? 'menu-open' : ''}}">
                 <a href="#" class="nav-link {{ request()->is('masterData','userData','masterData/*','userData/*') ? 'active' : ''}}">
                   <i class="nav-icon fas fa-atom"></i>
                   <p>
                     Master Data
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="/masterData" class="nav-link {{ request()->is('masterData','masterData/') ? 'active' : ''}}">
                       <i class="fas fa-cogs nav-icon"></i>
                       <p>Master Data</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="/userData" class="nav-link {{ request()->is('userData','userData/*') ? 'active' : ''}}">
                       <i class="fas fa-users nav-icon"></i>
                       <p>Data User</p>
                     </a>
                   </li>
                   </li>
                 </ul>
               </li>
               @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('subTitle')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">@yield('subTitle1')</li>
              <li class="breadcrumb-item active">@yield('subTitle2')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 20{{ date('y') }} <a href="https://instagram.com/aji__" target="_blank">Aji Permana Putra</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('templateLTE')}}/plugins/jquery/jquery.js"></script>
<script src="{{asset('templateLTE')}}/plugins/moment/moment.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('templateLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins 
<script src="{{asset('templateLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
-->
<script src="{{asset('templateLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/handlebars.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{asset('templateLTE')}}/plugins/toastr/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>



<!-- date-range-picker -->
<script src="{{asset('templateLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('templateLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Select2 -->
<script src="{{asset('templateLTE')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('templateLTE')}}/plugins/chart.js/Chart.min.js"></script>

<script src="{{asset('templateLTE')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('templateLTE')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('templateLTE')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('templateLTE')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{asset('templateLTE')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('templateLTE')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('templateLTE')}}/dist/js/demo.js"></script>
@yield('js')
</body>
</html>
