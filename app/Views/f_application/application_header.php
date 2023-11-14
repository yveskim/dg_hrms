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

    <link rel="stylesheet" href="jquery_toast/src/jquery.toast.css">
    <!-- <link href="assets/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> -->

    <link href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/jquery.magnify.min.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/magnify-bezelless-theme.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/magnify-white-theme.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/snack.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/snack-helper.css">
    <link rel="stylesheet" href="assets/sweetalert2/package/dist/sweetalert2.css">
    <!-- Bootstrap -->

    <!-- <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- NProgress -->
    <!-- <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet"> -->
    <!-- Dropzone.js -->
    <!-- <link rel="stylesheet" href="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css"> -->
    <link rel="stylesheet" href="assets/vendor/enyo/dropzone/dist/dropzone.css">
    <!-- Dropzone.js -->

    <!-- jQuery -->
    <script type="text/javascript" src="jquery_lib/jquery3.6.js"></script>
    <!-- <script src="assets/gentelella-master/vendors/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap -->

    <script type="text/javascript" src="assets/vendor/enyo/dropzone/dist/dropzone.js"></script>
    <!-- Custom Theme Style -->

    <!-- <link href="assets/gentelella-master/build/css/custom.min.css" rel="stylesheet"> -->

    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script> -->

    <style media="screen">
        .username {
            margin-left: 40%;
            color: white;
            padding-top: 1.5%;
        }

        #logout {
            margin-left: 2%;
        }

        .content {
            margin: 0 10% 0 10%;
        }

        #profile {
            margin-left: 10%;
            padding: .1em;
            /* color: white; */
        }

        .custom-sidebar {
            width: 8em;
            border: 1px solid black;
        }

        .sidebar-div {
            border: 1px solid black;
            padding: 2rem;
            box-shadow: 5px 10px #888888;
            margin-bottom: 2rem;
        }

        .nav-bg {
            background-color: navy;
            background-image: url('upload/system_file/nasyo_cares_white.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

</head>

<body class="nav-md">
    <nav class="navbar navbar-expand-lg nav-bg">

        <button class="navbar-toggler navbar-dark bg-dark" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02" >


            <div class="col-md-1">
                <a class="navbar-brand" href="#">
                    <img src="upload/system_file/logo.png" alt="logo" style="max-width: 5.8em; max-height: 8em"></img>
                </a>
            </div>

            <div class="col-md-4">
                <h5 style="color: white; width: 100%; ">INHS ONLINE PRE-REGISTRATION</h5>
            </div>

            <div class="col-md-6">
                <p class="username">
                    <?php echo "WELCOME -- " . $applicants['firstname'] . $applicants['last_name']; ?>
                </p>
                <p class="username">
                    <?php echo "APPLICANT ID -- " . $applicants['applicant_id']; ?>
                </p>
            </div>

            <div class="col-md-2">
                <input type="hidden" name="user_id" value="<?= $user; ?>" form="form_app" id="user_id">
                <input type="hidden" name="applicant_id" value="<?= $applicants['applicant_id']; ?>" id="applicant_id">
                <!-- <a href="viewProfile" id="profile" class="" name="btnProfile">Profile</a> -->
                <button id="logout" type="button" class="btn btn-secondary btn-sm" name="button">Logout</button>
            </div>
        </div>

    </nav>



    <script type="text/javascript">
        $('#logout').click(function() {
            if (confirm('are you sure you want to log out?')) {
                $.ajax({
                    url: 'logout_user',
                    method: 'get',
                    success: function() {
                        //  console.log(response.message);
                        window.location.href = 'login';
                    }
                });
            }

        });
    </script>