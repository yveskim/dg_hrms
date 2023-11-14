<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="upload/system_file/minerva.png" type="image/gif">

    <link rel="stylesheet" href="assets/DataTables/datatables.css">
    <link rel="stylesheet" href="jquery_toast/src/jquery.toast.css">


    <link href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->

    <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link rel="stylesheet" href="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css">
    <!-- Dropzone.js -->

    <!-- jQuery -->
    <script type="text/javascript" src="jquery_lib/jquery3.6.js"></script>
    <script src="assets/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->

    <script type="text/javascript" src="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Custom Theme Style -->

    <link href="assets/gentelella-master/build/css/custom.min.css" rel="stylesheet">




    <style media="screen">
      .username{
        margin-left: 40%;
        color: white;
        padding-top: 1%;
      }

      .content{
        margin: 5% 20% 0 20%;
      }

      #changePass{
        margin-left: 10%;
      }

      .btn-link{
        background: none!important;
        border: none;
        /*optional*/
        font-family: arial, sans-serif;
        /*input has OS specific font-family*/
        color: white;
        cursor: pointer;
        margin-top: 10%;
      }
    </style>

  </head>

  <form class="" action="viewUploads" method="get" id="uploadForm"></form>
  <form class="" action="checkAppInfo" method="get" id="profileForm"></form>
  <body class="nav-md">
    <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="#">
        <img src="upload/system_file/minerva.png" alt="minerva" style="max-width: 2.8em; max-height: 4em"></img>
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <button type="submit" form="profileForm" name="admId" class="nav-link btn-link" aria-current="page" value="<?= $admission_id; ?>">Profile</button>
      </li>
      <li class="nav-item">
          <button type="submit" form="uploadForm" name="admId" class="nav-link btn-link" aria-current="page" value="<?= $admission_id; ?>">Uploads</button>
      </li>
    </ul>
  </div>
  <input type="text" name="admId" value="<?= $admission_id; ?>">
</nav>
