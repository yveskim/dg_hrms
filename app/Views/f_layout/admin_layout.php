
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta http-equiv="refresh" content="1200"> -->

  <title><?= $title ?></title>
  
  <link rel="icon" href="upload/system_file/sdo.png" type="image/gif">
  <!-- <link rel="stylesheet" href="assets/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css"> -->
  <!-- Bootstrap -->
  <link href="assets/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
  
 
  <link href="assets/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->



  <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="assets/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->

  
  <link href="assets/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom Theme Style -->
  <link href="assets/gentelella-master/build/css/custom.min.css" rel="stylesheet">
  <link href="jquery_lib/jquery-ui.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons-1.6.0/icons-1.6.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/sweetalert2/package/dist/sweetalert2.css">
  
  <link rel="stylesheet" href="node_modules/@selectize/selectize/dist/css/selectize.bootstrap4.css">
  <link rel="stylesheet" href="assets/myCustomCss/universal.css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <style media="screen">
    .hrTab {
      height: 5px;
      border: 0;
      box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }

    .active-color {
      color: orange;
    }



  .selected_row{
    background-color: lightgray;
    opacity: .8;
    font-weight: bold;
  }
  
  .dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: center;
    display: inline;
}

.p-info{
  padding: 0;
  margin: 0;
  display: inline;
}


.profile_img{
    /* background-color: lightgray; */
    max-height: 5rem;
    min-width: 100%;
    object-fit: cover;
  }

  .profile_info{
    padding-left: 2rem;
  }

  .required_field{
    color: red;
  }



  </style>


</head>

<body class="nav-md">



<div class="div-blur"></div>

<div class="spiner-div">
  <img src="upload/system_file/sdo.png" alt="logo_gif">
</div>



  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="admin" class="site_title"><i class="fa fa-user"></i> <span>Administrator</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix" style="border-top: 1px solid white; border-bottom: 1px solid white;">
            <div class="profile_pic">
              <img src="<?= 'upload/user_files/' . $admin['emp_image'] ?>" alt="no image" class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <h5>Welcome!</h5>
              <h6><?= $admin['emp_fname'] . ' ' . $admin['emp_lname'] ?></h6>
              
              <br> 
              <input type="hidden" value="<?=session()->get('userRestriction')?>" id="user_restriction">
              <input type="hidden" name="user_id" id="user" value="<?= $user ?>"><!--reference for javascript user id-->
              <input type="hidden" name="fy_id" id="fy_id" value="<?= $year_id['fiscal_year'] ?>"><!--reference for javascript user id-->

              
            </div>
            

              <div>
                  <ul>
                      <li>
                        <p class="p-info">FY: <span ><?= $year_id['fiscal_year'] ?></span> </p>
                      </li>
                      <li> <p class="p-info">User ID: <span ><?= $user ?></span> </p></li>
                      <li>
                         <span>
                            <?php if (session()->get('userRestriction') == 1) {
                                  echo session()->get('userType').'-'.session()->get('userRestriction').'-'.session()->get('userCategory');
                            } else if (session()->get('userRestriction') == 2) {
                              echo "Admin";
                            } ?>
                          </span>
                      </li>
                  </ul>
              </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Administrator <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <?php if (session()->get('userType') == "Admin" && session()->get('userRestriction') == "1") : ?>
                      <li><a class="g-menu" href="javascript:void(0)" id="usersList">Emp Users</a></li>
                      <?php endif; ?>
                      <?php if (session()->get('userType') == "Admin") : ?>
                        <li><a class="g-menu" href="javascript:void(0)" id="getDepartments">Departments</a></li>
                        <li><a class="g-menu" href="javascript:void(0)" id="getDepartments">Programs</a></li>
                        <li><a class="g-menu" href="javascript:void(0)" id="btnGetNews">News</a></li>
                      <?php endif; ?>
                  </ul>
                </li>

                <?php if (session()->get('userType') == "Admin") : ?>
                <li><a><i class="fa fa-group"></i> Human Resource <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a class="g-menu" href="javascript:void(0)" id="empMaster">Employee Master Data</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="serviceRecords">Service Record</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getPlantilla">Plantilla</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getIpcrf">IPCRF</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="leaveCredits">Leave Credits</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getTrainings">Trainings</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getAwards">Awards & Recognition</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getDocuments">E201 Files</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getStations">Stations</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getSeparation">Separation/Retirement</a></li>
                    <li><a class="g-menu" href="javascript:void(0)" id="getNbc">Salary Schedule</a></li>
                  </ul>
                </li>
                <?php endif; ?>


              </ul>


            </div>

          </div>
 
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= 'upload/user_files/' . $admin['emp_image'] ?>" alt="no image">
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <!-- <a class="dropdown-item" href="javascript:;"> Profile</a> -->
                  <a class="dropdown-item" href="settings">
                    <span>Settings</span>
                  </a>
                  <button class="dropdown-item sign-out"><i class="fa fa-sign-out pull-right"></i> Log Out</button>

                </div>
              </li>
      
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->

  
      <div class="right_col" role="main">
        <?php $this->renderSection('content') ?>
      </div>
      <!-- /page content -->

    </div>
  </div>
	<script src="assets/gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="assets/gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<!-- jQuery Tags Input -->
	<script src="assets/gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="assets/gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="assets/gentelella-master/vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="assets/gentelella-master/vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="assets/gentelella-master/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="assets/gentelella-master/vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->


  
  <!-- jQuery -->
  <script src="assets/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="assets/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="assets/gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- jQuery Sparklines -->
  <script src="assets/gentelella-master/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- morris.js -->
  <script src="assets/gentelella-master/vendors/raphael/raphael.min.js"></script>
  <script src="assets/gentelella-master/vendors/morris.js/morris.min.js"></script>
  <!-- gauge.js -->
<script src="assets/gentelella-master/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="assets/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Skycons -->
<script src="assets/gentelella-master/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="assets/gentelella-master/vendors/Flot/jquery.flot.js"></script>
<script src="assets/gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
<script src="assets/gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
<script src="assets/gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
<script src="assets/gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="assets/gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="assets/gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="assets/gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="assets/gentelella-master/vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="assets/gentelella-master/vendors/moment/min/moment.min.js"></script>
<script src="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="jquery_toast/src/jquery.toast.js"></script>
<script src="jquery_lib/jquery-ui.min.js"></script>

<!-- Custom Theme Scripts -->
<script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

<script src="assets/gentelella-master/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="assets/gentelella-master/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->

<script src="assets/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="assets/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

<script src="assets/gentelella-master/build/js/custom.min.js"></script>
<script src="assets/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
<script src="assets/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/sweetalert2/package/dist/sweetalert2.js"></script>
<!-- <script src="assets/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script> -->
<script src="node_modules/@selectize/selectize/dist/js/selectize.min.js"></script>


</body>

</html>


<script type="text/javascript">

    $(document).ready(function() {
 
    $(".g-menu").click(function() {
      //alert('ok');
      $(".nav .child_menu").find(".active").removeClass("active");
      $(this).parents().addClass('active');
      //$(this).addClass("active");
    });

    $('#menu-plantilla').click(function() {
      $('.content-div').load('pages/dashboard/dashboard_view.php');
    });

    $('#menu-salary-grade').click(function() {
      $('.content-div').load('pages/dashboard/dashboard_view.php');
    });

    $('.sign-out').click(function() {
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

    $('#empMaster').click(function() {
        $('.content-div').load('pages/employee/employee_master_data.php');
    });

    $('#serviceRecords').click(function() {
        $('.content-div').load('pages/human_resource/service_record.php');
    });

    

    $('#usersList').click(function() {
        $('.content-div').load('pages/users/users_list.php');
    });

    $('#studentUsers').click(function() {
        $('.content-div').load('pages/student_account/users_list.php');
    });

    

    $('#pre_registration_data').click(function() {
      // if (!$.fn.DataTable.isDataTable('.tableApplication')) { //method to check if datatable is already loaded. if not load the ajax
        //  $('.tableApplication').clear.destroy();
        $('.content-div').load('pages/pre_registration/pre_registration_data.php');
      // }
    });
    
    $('#validated_data').click(function() {
      // if (!$.fn.DataTable.isDataTable('.tableApplication')) { //method to check if datatable is already loaded. if not load the ajax
        $('.content-div').load('pages/pre_registration/validated_pre_registration.php');
   
    });

    $('#admission_data').click(function() {
      if (!$.fn.DataTable.isDataTable('.tableAdmission')) { //method to check if datatable is already loaded. if not load the ajax
        $('.content-div').load('pages/admission/admission_data.php');
      }
    });

    $('#encode_student').click(function() {
      $('.content-div').load('pages/enrollment/encode_student.php');
    });

    $('#enrollment_data').click(function() {
      $('.content-div').load('pages/enrollment/enrollment_data.php');
    });

    $('#faculty').click(function() {
      $('.content-div').load('pages/faculty/faculty_data.php');
    });

    $('#school_program').click(function() {
      $('.content-div').load('pages/program/program_data.php');
    });

    $('#school_department').click(function() {
      $('.content-div').load('pages/department/department_data.php');
    });

    $('#getPrograms').click(function(){
        $('.content-div').load('pages/program/view_program.php');
    })

    $('#getDepartments').click(function(){
        $('.content-div').load('pages/department/view_department.php');
    })

    

    $('#getPlantilla').click(function(){
        $('.content-div').load('pages/plantilla/view_plantilla.php');
    })

    

    $('#homePage').click(function() {
      $('.content-div').load('pages/home/homepage.php');
    })

    $('#subject_group').click(function() {
      $('.content-div').load('pages/subject_group/sg_data.php');
    })

    $('#track_strand').click(function() {
      $('.content-div').load('pages/track_strand/track_data.php');
    })
    

    
    $('#btnGetNews').click(function() {
      if (!$.fn.DataTable.isDataTable('.tableNews')) { //method to check if datatable is already loaded. if not load the ajax
        $('.content-div').load('pages/news/news_list.php');
      }
    });

  })

</script>