<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title ?></title>

  <!-- Bootstrap -->
  <link href="assets/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="assets/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="">
  <link rel="icon" href="upload/system_file/minerva.png" type="image/gif">

  <!-- Custom Theme Style -->
  <link href="assets/gentelella-master/build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="jquery_toast/src/jquery.toast.css">

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

 



  <style media="screen">
    .hrTab {
      height: 12px;
      border: 0;
      box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }

    .active-color {
      color: orange;
    }

    .content-div {
    margin-top: 2%;
    padding: 2%;
  }

  .spiner-div {
    position: fixed;
    top: 0;
    left: 0;
    padding-left: 45%;
    padding-top: 10%;
    width: 100%;
    height: 100%;
    background-color: rgb(10, 10, 10, .5);
    z-index: 1000;
  }

  .faded {
    opacity: .9;
  }

  .div-blur {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 0;
    background-color: gray;
    opacity: .4;
    z-index: 100; 
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
    font-weight: bolder;
  }


  </style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body class="nav-md">


<div class="div-blur"></div>

<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>


  <div class="container body">
      <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="admin" class="site_title"><i class="fa fa-user"></i> <span>Student</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix" >
                        <div class="profile_pic">
                            <?php if($student['student_image'] === null): ?>
                                <img src="upload/system_file/noimage.png" alt="no image" class="img-circle profile_img">
                            <?php else: ?>
                                <img src="upload/student_files/student_images/<?= $student['student_image'];?>" alt="no image" class="img-circle profile_img">
                            <?php endif; ?>
                        </div>
                        <div class="profile_info">
                            <span>Student Account</span>
                            <h2><?= $student['first_name'] . ' ' . $student['last_name'] ?></h2>
                            <h2><?= $student['student_id']?></h2>

                            <input type="hidden" name="is_student" id="is_student" value="<?= $is_student ?>">
                            <input type="hidden" name="is_enrolled" id="is_enrolled" value="<?= $is_enrolled ?>">
                            <input type="hidden" name="en_id" class="en_id" value="<?= $student['en_id'] ?>"><!--reference for javascript user id-->
                            <input type="hidden" name="user_id" id="user" value="<?= $user_id ?>"><!--reference for javascript user id-->
                            <input type="hidden" name="sy_ref" id="sy_ref" value="<?= $sy_id['sy_id'] ?>"><!--reference for javascript user id-->
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <div class="top_nav">
              <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                      <a href="javascript:;" class="user-profile" aria-haspopup="true" aria-expanded="false">
                        <button class="dropdown-item sign-out"><i class="fa fa-sign-out pull-right"></i> Log Out</button>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="content-div">
                  
                </div>
            </div>
            <!-- /page content -->

      </div>
  </div>


</body>


<!-- jQuery -->
<script src="assets/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="assets/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="assets/gentelella-master/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
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

<script src="assets/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="assets/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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



</html>


<script type="text/javascript">

  $(window).load(function() {
    $('.spiner-div').hide();
    $('.div-blur').hide();
  });


  $(document).ready(function() {

    $('.content-div').load('pages/enrollment/each_student.php', function(){
      $('#generateRF').hide();
      $('.btn-pic').hide();
      $('.en_stat_div').hide();
      $('.stud_sch_id').hide();
      $('#is_als_div').hide();
      $('#is_pssn_div').hide();

    })


    $(".g-menu").click(function() {
      //alert('ok');
      $(".nav .child_menu").find(".active").removeClass("active");
      $(this).parents().addClass('active');
      //$(this).addClass("active");
    });

    $('.sign-out').click(function() {
      if (confirm('are you sure you want to log out?')) {
        $.ajax({
          url: 'signOutStudent',
          method: 'get',
          success: function() {
            //  console.log(response.message);
            window.location.href = 'login_student';
          }
        });
      }
    });


    // $('#getPlantilla').click(function(){
    //     $('.content-div').load('pages/plantilla/view_plantilla.php');
    // })






  });
</script>