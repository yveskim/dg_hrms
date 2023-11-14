<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no”>
    <title>INHS Integrated</title>

   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="jquery_toast/src/jquery.toast.css">

    <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->


    <!-- Custom Theme Style -->

    <link href="jquery_lib/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="icons-1.6.0/icons-1.6.0/font/bootstrap-icons.css">
    <link rel="icon" href="upload/system_file/minerva.png" type="image/gif">
    <link rel="stylesheet" href="assets/bootstrap-footer-03/bootstrap-footer-03/css/style.css">


    <link rel="stylesheet" href="assets/bootstrap-footer-03/bootstrap-footer-03/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  
    <script type="text/javascript" src="jquery_lib/jquery3.6.js"></script>


  <style media="screen">

  /* Animation */
  /* Inspiration taken from Dicson https://codemyui.com/simple-hamburger-menu-x-mark-animation/ */

  .content-div{
    width: 100%;
    margin: 0;
    padding: 0;
  }

  body{
    margin: 0;

  }

  .logo img{
    width: 12vw;
    height: 12vw;
  }

  .minerva img{
    width: 20vw;
    height: 18vw;
  }

  .minerva-div{
    position: absolute;
    top: 0;
    z-index: 10000;
    left: 75%;
  }

  .logo-div{
    position: absolute;
    top: 3%;
    z-index: 10000;
    left: 10%;
  }

  .footer-59391{
    background-color: darkblue;
    color: white;
  }
  .site-footer-image{
    width: 35vw;
    height: 25vw;
  }

  .developer{
    color: white;
    text-decoration: none;
    background-color: transparent;
  }

  nav{
    /* margin-top: 5%; */
    width: 100%;
    left: 0;
    right: 0;
    font-size: 1.2rem;
  }

  nav a{
    /* font-weight: bold; */
    font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    color: darkblue !important;
    border-right: 2px solid gray;
  }

  .title-bar{
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 45%, rgba(9,9,121,1) 69%, rgba(0,212,255,1) 100%);
    color: white; 
    width:100%;
    padding-top: 5%;
  }

  .title-bar h1{
    font-family: sans-serif;
    font-weight: bold;
  }

  #page-title{
    font-size: 3vw;
    /* font-weight: bold; */
    font-family:fantasy;
    padding: 0;
    margin: 0;
  }
  #page-title-2{
    font-size: 2vw;
    /* font-weight: bold; */
    font-family: fantasy;
    padding: 0;
    margin: 0;
  }
  #page-title-3{
    font-size: 1.2vw;
    /* font-weight: bold; */
    padding: 0;
    margin: 0;
    font-family: fantasy;
  }

  .navbar-nav a:hover{
    background-color: darkblue;
    color: #fff !important;
  }

</style>
  </head>
  <body>
    <div class="minerva-div">
      <div class="minerva">
          <img src="upload/system_file/minerva.png" alt="logo">
      </div>
    </div>
    <div class="logo-div">
      <div class="logo">
          <img src="upload/system_file/logo.png" alt="logo">
      </div>
    </div>

    <div class="title-bar">
      <div class="row" >
        <div class="col-md-12">
          <center><p id="page-title">Welcome to Iloilo National High School</p></center>
          <center><p id="page-title-2">Secondary School</p></center>
          <center><p id="page-title-3">Luna St., La Paz, Iloilo City, Iloilo City, Philippines, 5000</p></center>
        </div>
      </div>

      <hr style="background-color: white; height: .2rem;">
     <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar"> 
        
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/" >
                      Home
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About
                  </a>
                  <div class="row dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="col-md-12">
                      <a class="dropdown-item" href="visionMission">Vision & Mission</a>
                      <a class="dropdown-item" href="history">History</a>
                      <a class="dropdown-item" href="loyalty_song">Loyalty Song</a>
                      <a class="dropdown-item" href="#">Awards and Citation</a> 
                      <a class="dropdown-item" href="data_privacy">Data Privacy Policy</a>
                      <a class="dropdown-item" href="contact_us">Contact Us</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" id="drp_administration" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administration
                  </a>
                  <div class="row dropdown-menu" aria-labelledby="drp_administration">
                    <div class="col-md-12">
                      <a class="dropdown-item" href="schoolHeads">School Heads</a>
                      <a class="dropdown-item" href="#">Program Heads</a>
                      <a class="dropdown-item" href="#">Department Heads</a>
                      <a class="dropdown-item" href="#">Faculty</a>
                      <a class="dropdown-item" href="#">Staff</a> 
                    </div>
                  </div>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="registrar">REGISTRAR & ADMISSION</a>
                </li> -->
                 <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Research & Publication</a>
                </li>  -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="drp_programs" role="button" data-toggle="dropdown">
                    Academics
                  </a>
                  <div class="row dropdown-menu" aria-labelledby="drp_programs">
                    <div class="col-md-12">
                      <a class="dropdown-item" href="jhs_program">JHS Programs</a>
                      <a class="dropdown-item" href="#">SHS Programs</a>
                      <a class="dropdown-item" href="#">Faculty</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login_student">LOGIN</a>
                </li>
              </ul>
       
        </div>
      </nav> 
    </div>
   
    <?= $this->renderSection('content-carousel') ?>

    <div class="link-area">

    </div>

    <!--//////////////////////////////////////////////-->

    <br><br>
    <section class="home">
      <div class="div-content">

        <?= $this->renderSection('content') ?>
      </div>
    </section>
    <br>


<!--Footer /////////////////////////////////////////////////////////-->
<footer class="footer-59391">

    <div class="container">

      <div class="row mb-1">

        <div class="col-md-12 text-md-right">
          <ul class="list-unstyled social-icons">
            <li><a href="https://www.facebook.com/Iloilonhs" class="fb"><span class="icon-facebook"></span></a></li>
            <!-- <li><a href="#" class="tw"><span class="icon-twitter"></span></a></li>
            <li><a href="#" class="in"><span class="icon-instagram"></span></a></li>
            <li><a href="#" class="yt"><span class="icon-play"></span></a></li> -->
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="">
            <img class="site-footer-image" src="upload/system_file/120th alumni.jpg" alt="alumni">
          </div>
        </div>

        <div class="col-md-6">
          <div class="">
            <img class="site-footer-image" src="upload/system_file/alumni.jpg" alt="foundation">
          </div>
        </div>
      </div><br>

      <div class="row">
        <div class="col-md-4">
          <p>Republic of the Philippines</p>
          <p>All content is in the public domain unless otherwise stated.</p>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          
          </div>
      </div>

      <div class="row">
        <div class="col ">
          <div class="copyright">
            <p><small>Copyright 2022. All Rights Reserved, Iloilo National High School.</small></p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-md-12 developer">
          <a href="#"><small>&copy; By: Yves Kim Cabanting</small></a>
        </div> -->
        <div class="col-md-12 ">
          <a href="#" class="developer"><small>ICT Team</small></a>
        </div>
      </div>

  </div>
</footer>

<!--end footer -->


  <!-- <script type="text/javascript" src="assets/bootstrap-4.3.1-dist/js/bootstrap.js"></script> -->
  <script type="text/javascript" src="assets/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script type="text/javascript" src="assets/bootstrap/dashboard/dashboard.js"></script> -->

  <script src="jquery_toast/src/jquery.toast.js"></script>
  <script src="jquery_lib/jquery-ui.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

  <!-- <script src="../vendors/fastclick/lib/fastclick.js"></script> -->
  <!-- NProgress -->
  <!-- <script src="../vendors/nprogress/nprogress.js"></script> -->
  <!-- bootstrap-progressbar -->
  <!-- <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
  <!-- iCheck -->
  <!-- <script src="../vendors/iCheck/icheck.min.js"></script> -->
  <!-- bootstrap-daterangepicker -->
  <!-- <script src="../vendors/moment/min/moment.min.js"></script> -->
  <!-- <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script> -->
  <!-- bootstrap-wysiwyg -->
  <!-- <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script> -->
  <!-- <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script> -->
  <!-- <script src="../vendors/google-code-prettify/src/prettify.js"></script> -->
  <!-- jQuery Tags Input -->
  <!-- <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script> -->
  <!-- Switchery -->
  <!-- <script src="../vendors/switchery/dist/switchery.min.js"></script> -->
  <!-- Select2 -->
  <!-- <script src="../vendors/select2/dist/js/select2.full.min.js"></script> -->
  <!-- Parsley -->
  <!-- <script src="../vendors/parsleyjs/dist/parsley.min.js"></script> -->
  <!-- Autosize -->
  <!-- <script src="../vendors/autosize/dist/autosize.min.js"></script> -->
  <!-- jQuery autocomplete -->
  <!-- <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script> -->
  <!-- starrr -->
  <!-- <script src="../vendors/starrr/dist/starrr.js"></script> -->
  <!-- Custom Theme Scripts -->
  <!-- <script src="../build/js/custom.min.js"></script> -->

  


  <script type="text/javascript">
      $('.navTrigger').click(function () {
          $(this).toggleClass('active');
          //console.log("Clicked menu");
          $("#mainListDiv").toggleClass("show_list");
          $("#mainListDiv").fadeIn();

      });

  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      // var lastScrollTop; // This Varibale will store the top position

      // navbar = document.getElementById('navbar'); // Get The NavBar

      // window.addEventListener('scroll',function(){
      //  //on every scroll this funtion will be called

      //   var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      //   //This line will get the location on scroll

      //   if(scrollTop > lastScrollTop){ //if it will be greater than the previous
      //     navbar.style.top='-80px';
      //     //set the value to the negetive of height of navbar
      //   }

      //   else{
      //     navbar.style.top='0';
      //   }

      //   lastScrollTop = scrollTop; //New Position Stored
      // });
    });

  $(document).ready(function(){
    $('.link-area').hover(
      () => { //hover
    	     $('.tooltip-title').removeClass('tooltip-hide');
    	},
    	() => { //out
      	  $('.tooltip-title').addClass('tooltip-hide');
    	}

    );

    $('#banner-image').click(function(){
      $('html, body').animate({
          scrollTop: $("#announcement_div").offset().top
      }, 1000);
    });


  });

</script>

<!-- Messenger Chat Plugin Code -->
    <!-- <div id="fb-root"></div>

    Your Chat Plugin code -->
    <!-- <div id="fb-customer-chat" class="fb-customerchat">
    </div> -->

    <!-- Messenger Chat Plugin Code -->
        <!-- <div id="fb-root"></div> -->

        <!-- Your Chat Plugin code -->
        <!-- <div id="fb-customer-chat" class="fb-customerchat">
        </div> --> 

        <!-- <script>
          var chatbox = document.getElementById('fb-customer-chat');
          chatbox.setAttribute("page_id", "110021715727073");
          chatbox.setAttribute("attribution", "biz_inbox");
        </script> -->

        <!-- Your SDK code -->
        <!-- <script>
          window.fbAsyncInit = function() {
            FB.init({
              xfbml            : true,
              version          : 'v13.0'
            });
          };

          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script> -->


  </body>


</html>
