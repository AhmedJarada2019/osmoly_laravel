
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <style>
    /* .dataTables_paginate,.dataTables_info{
      display: none;
    } */

    .btn-tool{
        margin: 0.25rem 20px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-right: 0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item ">
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value=" تسجيل الخروج" class="nav-link" style="border: none ; background-color: white">
    </form>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> --}}
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal00">
          <p>
            اضافة مدينة جديدة
          </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('city.index')}}" class="nav-link" >
          <p>
           عرض المدن
          </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('index')}}" class="nav-link">الرئيسية</a>
      </li>
</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('index')}}" class="d-block">مرحبا بك</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="padding: 0;">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('index')}}" class="nav-link">
              <p>
                الرئيسية
                <i class="right fas fa-angle-left"></i>
              </p>
              <i class="nav-icon fas fa-tachometer-alt"></i>

            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal00">
              <p>
                اضافة مدينة جديدة
              </p>
              <i class="nav-icon far fa-plus-square"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('city.index')}}" class="nav-link" >
              <p>
               عرض المدن
              </p>
              <i class="nav-icon far fa-image"></i>
            </a>
        </li>
          <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value=" تسجيل الخروج" class="bg-gradient-danger nav-link" style="color: white">
                </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside> --}}
  <div class="modal fade" id="exampleModal00" tabindex="-1" role="dialog" aria-labelledby="exampleModal00Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModal00Label">اضافة فاتورة شراء</h5>
        </div>
        <div class="modal-body">
          <form action="{{route('city.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="exampleInputtext1">اسم المدينة</label>
              <input type="text" required name="city_name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="اسم المدينة ">
            </div>
            <button type="submit" class="btn btn-success btn-block">إضافة</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @yield('content')


  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="https://adminlte.io">Ahmed Jarada</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>OSMOLY</b> V 1.0
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $('#ss').click(function () {
    window.print();
  });

function printpart () {
  var printwin = window.open("");
  printwin.document.write(document.getElementById("toprint").innerHTML);
  printwin.stop();
  printwin.print();
  printwin.close();
}

$(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });
</script>

</body>
</html>
