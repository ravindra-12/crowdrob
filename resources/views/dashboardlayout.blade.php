<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crowdrob | Dashboard</title>
  
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/contact" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
    
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <img src="{{asset('images/crowdrob-logo.png')}}" height="80px" width="80px" alt="Crodrob Logo"  >
      <!--<h3>Crowdrob</h3>-->
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="data:image/jpeg;base64,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" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $username }} </a>
        </div>
         {{-- <div class="info">
          <a href="#" class="d-block">{{$username}}</a>
        </div> --}}
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a> --}}
            <ul class="nav">
              <li class="nav-item">
                <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/allvendor" class="nav-link {{ request()->is('allvendor') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All vendor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/allproducts" class="nav-link {{ request()->is('allproducts') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Allproducts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/allusers" class="nav-link {{ request()->is('allusers') ? 'active' : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/allstore" class="nav-link {{request()->is('allstore') ? 'active' : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All store</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/updatemrp" class="nav-link {{request()->is('updatemrp') ? 'active' : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Product MRP </p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="/updatemrpbycat" class="nav-link {{request()->is('updatemrpbycat') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update MRP By Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/category" class="nav-link {{request()->is('category') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/subcategory" class="nav-link {{request()->is('subcategory') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SubCategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/productinapproval" class="nav-link {{ request()->is('productinapproval') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Product</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="/enquirydetails" class="nav-link {{ request()->is('enquirydetails') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiry Details</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="launch-setting" class="nav-link {{request()->is('launch-setting') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li> --}}

              {{-- <li class="nav-item">
                <a href="/caraousel" class="nav-link {{ request()->is('caraousel') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Caraosel</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="/launch-setting" class="nav-link {{ request()->is('launch-setting') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ads-setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/updateproductdiscount" class="nav-link {{ request()->is('updateproductdiscount') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>updateproductdiscount</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/UpdateAllProductDeals" class="nav-link {{ request()->is('UpdateAllProductDeals') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>UpdateAllProductDeals</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="/enquirydetails" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiry Details</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="/admincareerpage" class="nav-link  {{ request()->is('admincareerpage') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>careerpage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/getallorder" class="nav-link  {{ request()->is('getallorder') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Getallorder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/orderprofitloss" class="nav-link  {{ request()->is('orderprofitloss') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ordercalculation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/allvendororder" class="nav-link  {{ request()->is('allvendororder') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>allvendororder</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="/deliverycities" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>deliverycities</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="/cities" class="nav-link {{ request()->is('cities') ? "active" : ""}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ActiveDeliveryCities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/getallvendororder" class="nav-link  {{ request()->is('getallvendororder') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VendorOrder</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/getallcolor" class="nav-link  {{ request()->is('getallcolor') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Getallcolor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/getallsize" class="nav-link  {{ request()->is('getallsize') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Getallsize</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/getallcoupon" class="nav-link  {{ request()->is('getallcoupon') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>GetallCoupon</p>
                </a>
              </li>


            
              <li class="nav-item">
                <a href="/homeads" class="nav-link  {{ request()->is('homeads') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>homeads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/getallaccountsetup" class="nav-link  {{ request()->is('getallaccountsetup') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Getallaccountsetup</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="/getallpaymentwithdrawal" class="nav-link  {{ request()->is('getallpaymentwithdrawal') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Getallpaymentwithdrawal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="/homeads" class="nav-link  {{ request()->is('homeads') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>homeads</p>
                </a>
              </li>
             
              {{-- <li class="nav-item">
                <a href="/getallorder" class="nav-link  {{ request()->is('getallorder') ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Getallorder</p>
                </a>
              </li> --}}
               </ul>
         </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
        @yield('content')
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="">crowdrob.com</a>.</strong>
    All rights reserved.
   
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
{{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
