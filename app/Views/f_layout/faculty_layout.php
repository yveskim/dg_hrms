<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Faculty | <?= $title; ?></title>

    <link rel="icon" href="upload/system_file/minerva.png" type="image/gif">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE-master/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/fullcalendar/main.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/summernote/summernote-bs4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/AdminLTE-master/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/sweetalert2/package/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="assets/myCustomCss/universal.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>

<div class="wrapper">
  
 

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="upload/system_file/minerva.png" alt="INHS Logo" height="220" width="220">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="faculty" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="faculty_profile" class="nav-link" id="faculty_profile">Profile</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
       <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0)"><i class="fas fa-book"></i> &nbsp;user account</a>
              <a class="nav-link logout" href="javascript:void(0)" role="button">  
                <i class="fas fa-sign-out-alt"></i>&nbsp;Logout
              </a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="javascript:void(0)" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="faculty" class="brand-link">
      <img src="upload/system_file/logo.png" alt="Faculty Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Faculty Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- References +++++++++++++++++++++++++++++++ -->
      <input type="hidden" value="<?= $sem['sem_id'] ?>" id="sem_id">
      <input type="hidden" value="<?=session()->get('userRestriction')?>" id="user_restriction">
      <input type="hidden" name="user_id" id="user" value="<?= $user ?>"><!--reference for javascript user id-->
      <input type="hidden" name="sy_ref" id="sy_ref" value="<?= $sy_id['sy_id'] ?>"><!--reference for javascript user id-->
      <!-- References +++++++++++++++++++++++++++++++ -->
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= 'upload/user_files/' . $faculty['emp_image'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block" style="cursor:default;" id="faculty_name"><?= $faculty['emp_fname'] . ' ' . $faculty['emp_lname'] ?></a>
          <a class="d-block" style="cursor:default;">User ID: <?= $user ?> </a>
          <a class="d-block" style="cursor:default;">Emp ID: <?= $faculty['emp_id'] ?> </a> 
          <a class="d-block" style="cursor:default;">S.Y.  <?= $sy_id['school_year'] ?> </a> 
        </div>
        <input type="hidden" id="emp_id" value="<?= $faculty['emp_id'] ?>">
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="faculty" class="nav-link active" id="menu-dashboard">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    DASHBOARD
                    <!-- <i class="right fas fa-angle-left"></i> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="advisery_parent">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    ADVISERY
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="javascript:void(0)" id="manage_advisery" class="nav-link">
                      <i class="fa fa-solid fa-circle nav-icon"></i>
                      <p>Manage Advisery</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    EMPLOYMENT
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" id="employment_records">
                    <i class="fa fa-solid fa-circle nav-icon"></i>
                      <p>Employment Records</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                      <i class="fa fa-solid fa-circle nav-icon"></i>
                      <p>MOV's</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                  <i class="nav-icon fas fa-cogs "></i>
                  
                  <p>
                    TRANSACTIONS
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" id="leave_request">
                    <i class="fa fa-solid fa-circle nav-icon"></i>
                      <p>Leave Request</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                      <i class="fa fa-solid fa-circle nav-icon"></i>
                      <p>Service Request</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <section class="content">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h4 class="m-0 page-title-color" ><?= $title;?></h4>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
          <!-- /.content-header -->

        <!-- Main content -->
     
            <!-- page content -->
        <div class="right_col" role="main">
          <?php $this->renderSection('content') ?>
        </div>
      <!-- /page content -->
      <!-- /.content -->
    </div>
  </section>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023.</strong>
    All rights reserved - Yves Kim Cabanting. Email me @ <i>yveskim.cabanting@iloilonhs.edu.ph</i>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
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
<script src="assets/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/AdminLTE-master/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/AdminLTE-master/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/AdminLTE-master/plugins/moment/moment.min.js"></script>
<script src="assets/AdminLTE-master/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/AdminLTE-master/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE-master/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/AdminLTE-master/dist/js/demo.js"></script> -->
<script src="assets/AdminLTE-master/dist/js/dashboard_design.js"></script>


<!-- fullCalendar 2.2.5 -->
<script src="assets/AdminLTE-master/plugins/moment/moment.min.js"></script>
<script src="assets/AdminLTE-master/plugins/fullcalendar/main.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assets/AdminLTE-master/dist/js/pages/dashboard.js"></script> -->


<script src="assets/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
<script src="assets/jquery-validation-1.19.5/dist/additional-methods.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="assets/AdminLTE-master/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-master/plugins/jszip/jszip.min.js"></script>
<script src="assets/AdminLTE-master/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/AdminLTE-master/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/AdminLTE-master/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/sweetalert2/package/dist/sweetalert2.min.js"></script>


<script>

   $('.logout').click(function() {
      if (confirm('are you sure you want to log out?')) {
        $.ajax({
          url: 'signOutAdmin',
          method: 'get',
          success: function() {
            //  console.log(response.message);
            window.location.href = 'login_admin';
          }
        });
      }

    });
    $('#manage_advisery').click(function(){
        $('.content').load('pages/faculty/advisery/manage_avisery.php', function(){
          getAdvisory();
        })
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        $('#advisery_parent').addClass('active');
    })

    $('#employment_records').click(function(){
        $('.content').load('pages/faculty/employment/employment_records.php', function(){
          // getServiceRecord();
        });
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        $('#advisery_parent').addClass('active');
    })

</script>
<script src="assets/myCustomJs/manage_advisery.js"></script>
<script src="assets/myCustomJs/employment_records.js"></script>

</body>
</html>

