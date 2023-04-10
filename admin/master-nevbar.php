<?php
include_once('../log-reg/conn.php');

ob_start();
session_start();

if(!(isset($_SESSION['email'])) && !(isset($_SESSION['password'])))
{
  header("location:../log-reg/login.php");
}
$femail = $_SESSION['email'];
$fpassword = $_SESSION['password'];

$fatch_data="SELECT * FROM register_master WHERE email='$femail' AND  password='$fpassword'";
// echo $q;

$res=mysqli_query($con,$fatch_data);
//  $count=mysqli_num_rows($res);
 $r=mysqli_fetch_row($res);   



 function active($currect_page){
   $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
   $url = end($url_array);  
   if($currect_page == $url){
       echo 'active'; //class name in css 
   } 
 }


?>

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        
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

     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- <div class="container">
    <h1>hello</h1>
  </div> -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <?php
          if($r[6] == 2)
          {

         ?>
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Penal</span>
    <?php 
          }
          else if($r[6] == 3)
          {
            ?>
      <img src="dist/img/food-stall.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
 
            <?php

            echo "<span class='brand-text font-weight-light'>Vendor Penal</span>";
          }
          else if($r[6] == 4)
          {
          ?>
            <img src="dist/img/food-delivery.avif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
 
          <?php

            echo "<span class='brand-text font-weight-light'>Delivery Penal</span>";
            
          }
          ?>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

        <?php
          if($r[6] == 2)
          {
              
         ?>
          <a href="#" class="d-block">Zinzuvadiya Raj</a>
    <?php 
          }
          else
          {
            echo "<a href='#' class='d-block'>";
            echo $r[2];
            echo "</a>";
          }
    ?>
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php
          if($r[6] == 2 || $r[6] == 3 || $r[6] == 4)
          {
          ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php active('index.php');?>">
            <i class="nav-icon bi bi-speedometer2"></i>
              <p>
                &nbsp;Dashboard
              </p>
            </a>
          </li>
          <?php
          }
          ?> 
          <?php
          if($r[6] == 2 || $r[6] == 3)
          {
          ?>
          <li class="nav-item ">
            <a href="category.php" class="nav-link <?php active('category.php');?>">
            <i class="nav-icon bi bi-basket"></i>
              <p>
                &nbsp;Category
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3)
          {
          ?>
          <li class="nav-item">
            <a href="subcategory.php" class="nav-link <?php active('subcategory.php');?>">
            <i class="nav-icon bi bi-basket3"></i>
              <p>
                &nbsp;Sub Category
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3 || $r[6] == 4)
          {
          ?>
          <li class="nav-item">
            <a href="order_details.php" class="nav-link <?php active('order_details.php');?> ">
            <i class="nav-icon bi bi-clipboard-data"></i>
              <p>
               &nbsp;Order details
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2)
          {
          ?>
          <li class="nav-item">
            <a href="blog_details.php" class="nav-link <?php active('blog_details.php');?> ">
            <i class="bi bi-credit-card-2-front" style="font-size: 20px;"></i>
              <p>
               &nbsp;Blog details
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3)
          {
          ?>

          <li class="nav-item">
            <a href="contact_details.php" class="nav-link <?php active('contact_details.php');?> ">
            <i class="bi bi-chat-left-text" style="font-size: 20px;"></i>
              <p>
               &nbsp;Contact details
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2)
          {
          ?>
          <li class="nav-item">
            <a href="slider.php" class="nav-link <?php active('slider.php');?> ">
            <i class="nav-icon bi bi-images"></i>
              <p>
               &nbsp;Sliders Management
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3)
          {
          ?>
          <li class="nav-item">
            <a href="products.php" class="nav-link <?php active('products.php');?>">
            <i class="nav-icon bi bi-cart-check"></i>
              <p>
                &nbsp;Product Management
              </p>
            </a>
          </li>
          <?php 
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3)
          {
          ?>
          <li class="nav-item">
            <a href="deals_details.php" class="nav-link <?php active('deals_details.php');?>">
            <i class="nav-icon bi bi-percent"></i>
              <p>
                &nbsp;Manage deals
              </p>
            </a>
          </li>
          <?php 
          }
          ?>
          <?php
          if($r[6] == 2)
          {
          ?>
          <li class="nav-item">
            <a href="user-manage.php" class="nav-link <?php active('user-manage.php');?>">
            <i class="nav-icon bi bi-people"></i>
              <p>
                &nbsp;User Management
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2)
          {
          ?>
          <li class="nav-item">
            <a href="vendor.php" class="nav-link <?php active('vendor.php');?>">
            <i class="nav-icon bi bi-shop"></i>
              <p>
               &nbsp;Vendor management
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3)
          {
          ?>
          <li class="nav-item">
            <a href="delivery_details.php" class="nav-link <?php active('delivery_form.php');?>">
            <i class="bi bi-truck" style="font-size: 20px;"></i>
              <p>
               &nbsp;Delivery management
              </p>
            </a>
          </li>
          <?php
          }
          ?>

          <?php
          if($r[6] == 2)
          {
          ?>
          <li class="nav-item">
            <a href="coupon.php" class="nav-link <?php active('coupon.php');?>">
            <i class="nav-icon bi bi-tags"></i>
              <p>
               Coupon Management 
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($r[6] == 2 || $r[6] == 3 || $r[6] == 4)
          {
          ?>
          <li class="nav-item">
          <a href="master-nevbar.php?logout" class="nav-link"><i class="bi bi-box-arrow-left"></i><p>
               &nbsp;Logout
              </p></a>
          <?php
            if(isset($_GET['logout']))
            {
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                session_destroy();
                header("location:../log-reg/login.php");
            }
          ?>
          </li>
          <?php
          }
          ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->

</body>
<!-- ./wrapper -->




