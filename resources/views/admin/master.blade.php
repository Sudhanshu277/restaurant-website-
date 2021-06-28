<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('tittle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('/admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('/admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('/admin/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
      @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#a6a6a6;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{url('/admin/dist/img/FY.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: black;">FoodYard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!--  <img src="{{url('/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a  style="color: black;" href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

       <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbooard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="fas fa-bars"></i>
              <p style="color: black;">
                Category

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="color: black;">
              <li class="nav-item">
                <a href="{{ url('admin/add_category') }}" class="nav-link">
                  <i style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add Category</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>
          
          <!-- dilery boy -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="fas fa-truck"></i>
              <p style="color: black;">
                Delivery Boy

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/add_boy') }}" class="nav-link">
                  <i style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add Delivery Boy</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>

          <!-- coupon -->
         
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="far fa-credit-card"></i>
              <p style="color: black;">
                Coupon

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/add_coupon') }}" class="nav-link">
                  <i style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add Coupon</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>

          <!-- dish -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="fas fa-toolbox"></i>
              <p style="color: black;">
                Dish

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/add_dish') }}" class="nav-link">
                  <i style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add Dish</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>

          
          <!-- about -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i  style="color: black;" class="fas fa-address-card"></i>
              <p style="color: black;">
                About

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/add_about') }}" class="nav-link">
                  <i style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add About</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>

          <!-- banner -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="fas fa-sliders-h"></i>
              <p style="color: black;">
                Slider

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/add_slider') }}" class="nav-link">
                  <i  style="color: black;"class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add Slider</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>

          <!-- deal -->
          <!-- banner -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="nav-icon fas fa-copy"></i>
              <p style="color: black;">
                Deal

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/add_deal') }}" class="nav-link">
                  <i  style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">Add Deal</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>

          <!-- ordre -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: black;" class="fas fa-box-open"></i>
              <p style="color: black;">
                Order

                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/see_order') }}" class="nav-link">
                  <i style="color: black;" class="far fa-circle nav-icon"></i>
                  <p style="color: black;">See Order</p> 
                </a>
              </li> 
              <!--catageory----> 
            </ul>
          </li>
 
           

            <li class="nav-item ">
            <a href="{{ route('logout') }}" class="nav-link"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"
            >

              <i class="far fa-circle nav-icon"></i>
              <p>
               Logout
              <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>



         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

@yield('content')

 <footer class="main-footer bg-dark">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/admin/dist/js/pages/dashboard.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{url('/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
</script>
</body>
</html>

