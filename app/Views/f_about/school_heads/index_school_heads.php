



  <?= $this->extend('f_layout/home_layout') ?>

  <?= $this->section('content') ?>

  <style media="screen">

    .div-main{
      /* background-color: RGB(237, 226, 178, .8); */
      /* padding: 2%;
      margin: 0 5% 0 5%;
      min-height: 800px;
      overflow: hidden;
      border-radius: 4em; */
    }

    .btn-menu{
      height: 5em;
      width: 100%;
      padding: 5%;
    }

      .news-title{
        background-color: darkblue;
        color: white;
        padding: 2%;
      }


      #end-news{
        text-align: center;
        font-family: sans-serif ;
        font-weight: bold;
      }

      .no-news{
        text-align: center;
      }

      .btn-info{
        color: white;
      }

      .principal-img-div{
        text-align: center;
      }

      .circular--portrait {
        width: 200px; height: 200px;
        overflow: hidden; border-radius: 50%;
        position: relative;
        left: 50%; top: 30%;
        transform: translate(-50%, -50%);
        background-color: gray;
        box-shadow: 0px 0px 0 5px darkblue;
      }

      .circular--portrait img { width: 100%; height: auto; }



      .heads-container{
        padding: 2% 5% 5% 5%;
        border-radius: 6em;
        color: black;
      }

      .image-container{
        background-color: rgba(0,0,0,.5);
        position: relative;
        border-radius: 4em;
        padding: 5%;
        color: black;
        min-width: 60%;
        min-height: 60%;
        width: auto;
        height: auto;
        padding: 2em;
        margin-left: 15%;
      }

      .image-container img{
        /* object-fit:cover; */
        width: 100%;
        height: 100%;
      }

      .div-facade{
        margin: 0;
      }

      .div-facade img{
        object-fit: cover;
        width: 100%;
        height: 100%;

      }

      .page-header{
        font-family: sans-serif;
        font-weight: bold;
        color: white;
        background-color: navy;
        padding: 1%;
      }

      .heads-name{
        font-family: sans-serif;
        font-weight: bold;
        color: navy;
      }
  </style>

      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="page-header">INHS SCHOOL HEADS</h1>
        </div>
      </div>
      <hr>
<br>
   <div class="div-main">

          <div class="">
       
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="div-facade">
                <img src="upload/system_file/120th alumni.jpg" alt="facade">
              </div>
            </div> -->
          </div>
          <!-- <hr><br><br> -->

            <div class="row">
                <div class="col-12 principal-img-div">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="circular--portrait"> <img src="upload/system_file/maam f.jpg" /> </div>
                      <h5 class="heads-name">DELORAH CECILIA L. FANTILLO</h5>
                      <p>School Principal IV</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="btn btn-lg btn-warning" href="about_principal">Office of the Principal</a>
                    </div>
                  </div>
                </div>
            </div><hr><br><br><br>


            <!-- Three columns of text below the carousel -->
            <div class="row">
              <div class="col-lg-4 text-center">
                <div class="row">
                  <div class="col-md-12">
                    <div class="circular--portrait"> <img src="upload/system_file/MAAM GAS.jpg" alt="AP"/> </div>
                    <h5 class="heads-name">MARIA ALMEN G. GASALAO</h5>
                    <p>Asst. Princiap II for Academics, SHS</p>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-12">
                    <a class="btn btn-lg btn-warning" href="#">View details &raquo;</a>
                  </div>
                </div><br><br> -->
              </div><!-- /.col-lg-4 -->

              <div class="col-lg-4 text-center">
                <div class="row">
                  <div class="col-md-12">
                    <div class="circular--portrait"> <img src="upload/system_file/SIR MOSURA.jpg" style=""/> </div>
                    <h5 class="heads-name">EDWIN F. MOSURA</h5>
                    <p>Asst. Principal II for Learners Support and Governance</p>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-12">
                    <p><a class="btn btn-lg btn-warning" href="#">View details &raquo;</a></p>
                  </div>
                </div><br><br> -->
              </div><!-- /.col-lg-4 -->

              <div class="col-lg-4 text-center">
                <div class="row">
                  <div class="col-md-12">
                    <div class="circular--portrait"> <img src="upload/system_file/MAAM TAMPANI.JPG" style=""/> </div>
                    <h5 class="heads-name">SHERRY H. TAMPANI</h5>
                    <p>Asst. Principal II for Academics, JHS</p>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-12">
                    <a class="btn btn-lg btn-warning" href="#">View details &raquo;</a>
                  </div>
                </div> -->

              </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
          <hr><br><br>
        </div>
   </div>






  <?= $this->endSection() ?>
