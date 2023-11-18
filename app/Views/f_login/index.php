
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Admin</title>
  <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/login_page/login.css">
  <link rel="stylesheet" href="jquery_lib/jquery-ui.min.css">
  <link rel="icon" href="upload/system_file/sdo.png" type="image/gif">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


  <script type="text/javascript" src="jquery_lib/jquery-ui.min.js"></script>
  <script type="text/javascript" src="jquery_lib/jquery3.6.js"></script>

  <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">

</head>
<body>
    <?= csrf_field(); ?>

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <img src="upload/system_file/facade.jpg" alt="login" class="login-card-img">
        <div class="row no-gutters">
          
          <div class="col-md-7">

            <div class="row home-btn">
              <div class="col-4">
                <span class="mif mif-home"></span>
                <a href="/" type="button" class="btn btn-inhs" name="button"><span class="fa fa-home fa-lg"></span>&nbsp;&nbsp;&nbsp;Home</a>
              </div>
            </div>
          </div>

          <div class="col-md-5" style="border-left: 4px solid white; background-color: rgb(255,255,255,.9)">

            <div class="card-body">
              <?php if ( !empty(session()->getFlashData('failed')) ):?>
                <div class="error-div" style="color: red"><?= session()->getFlashData('failed'); ?></div>
              <?php endif ?>
              <div class="validation-div" style="color:red">
                  <?= \Config\Services::validation()->listErrors() ?>
              </div>
              <div class="brand-wrapper">
                <div class="row">
                  <div class="col-8">
                    <br>
                    <h2 class="header_title"><strong>ADMINISTRATOR</strong></h2>
                  </div>
                  <div class="col-4">
                      <img src="upload/system_file/deped_logo.png" alt="logo" class="logo" style="width: 60%; height: 100%;">
                  </div>
                </div>
              </div><br>
              <h5>Administrator Login Form</h5>
              <hr>
              <form action="<?php echo base_url('validate'); ?>" enctype="multipart/form-data" method="post">

                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                      <label class="form-check-label" for="flexCheckDefault">
                        Show Password
                      </label>
                    </div>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
                <!-- <p class="login-card-footer-text">Don't have an account? read <a href="<?= 'see_info'?>" class="">Information</a></p> -->
                <!-- <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<script>
    function invalidForm(){
        var form  = $(this);
        form.addClass("ani-ring");
        setTimeout(function(){
            form.removeClass("ani-ring");
        }, 1000);
    }

  $(document).ready(function(){
    // $('#email').prop('disabled', true);
    // $('#password').prop('disabled', true);
    // $('.login-type').prop('checked', false);

    // $('.login-type').click(function(){
    //   $('#email').prop('disabled', false);
    //   $('#password').prop('disabled', false);
    // });
  });
  
  function myFunction() { //method to show password in text
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
