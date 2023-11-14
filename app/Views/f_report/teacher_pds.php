<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee List></title>

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


    <style media="screen">
    .hrTab{
      height: 12px;
      border: 0;
      box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }
    </style>

      <style media="screen">
        .title-text{
          text-align: center;
        }
      </style>

      <style media="screen">
        .btn-group-xs > .btn, .btn-xs {
          padding: .45rem .2rem;
          font-size: .675rem;
          line-height: .5;
          border-radius: .2rem;
        }
      </style>

  </head>


    <body>





  <div class="x_content">
  <table class="table table-bordered stripe tableEmp compact table-sm">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($emp as $emp): ?>
      <tr>
        <td><?= $emp['emp_id']; ?></td>
        <td><?= $emp['emp_fname']; ?></td>
        <td><?= $emp['emp_mname']; ?></td>
        <td><?= $emp['emp_lname']; ?></td>
        <td><?= $emp['emp_gender']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
  </div>




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
                    <script src="assets/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
                    <script src="assets/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
                    <script src="assets/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>
                    <script src="assets/gentelella-master/build/js/custom.min.js"></script>
                </body>

</html>
