<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/jquery.magnify.min.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/snack.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/snack-helper.css">
    <link rel="stylesheet" href="assets/jquery-image-viewer-magnify/css/docs.css">


    <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery_lib/jquery3.6.js"></script>
    <style>
      .thumbnail-div{
        /* background-color: rgb(30, 30, 30, .8); */
        padding: 5rem 15rem 15rem 15rem;
        border-radius: 2em;
        min-height: 40em;
      }

      .thumbnail-div img{
        display: flex;
        flex-wrap: wrap;
        height: 25rem;
        width: 100%;
        object-fit: cover;
      }

      .title-div{
        text-align: center;
        padding: 1rem;
        color: white;
        top: 0;
      }

      .btn-xs{
        padding: .2em;
        width: 40%;
        margin-top: .2em;
        margin-left: .4em;
        font-size: 1vw;
      }


      .file-title{
        line-height: 1.5em;
        height: 3em;
        text-overflow: ellipsis;
        overflow: hidden;
        width: 100%;
        padding-left: 2em;
      }

      .file-title:hover{
        position: relative;
        overflow-y: scroll;
      }

      .img-div{
        background-color: white;
        padding: .2em;
        border-radius: 1em;

      }

      hr{
        padding: 0;
        margin: 0;
        top: 0;
      }

      .prev_image{
        height: 100%;
        width: 100%;
        object-fit: contain;
      }


      .info-div{
        background-color: lightgray;
        border-radius: 2em;
        padding: 2em;
      }

      .rotate {
        transform: rotate(90deg);
         overflow: auto;
      }

      .modal .modal-dialog{
          width: fit-content;
          max-width: 1332px;
      }

      .image-container{
        border: 2px solid gray;
        box-shadow: -2px 2px 5px 1px #888888;
      }

      body{
        background-color: lightgray;
      }
    </style>
  </head>
  <body>
  
    <br>
    <div class="content">

      <div class="row title-div bg-primary">
        <div class="col-md-12">
          <h1> <?= $name['firstname']." ". $name['middle_name']. " ". $name['last_name'] ?></h1>
        </div>
      </div>
      <hr>
      <br>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <button class="btn btn-primary btn-lg">VALIDATE DOCUMENTS</button>
        </div>
      </div>
      <br>
      <hr>

      <div class="row">
          <div class="col-md-12 mb-5">
            <div class="row thumbnail-div">
              <?php foreach ($files as $file): ?>
                <div class="col-md-4">
                  <a data-magnify="gallery" data-src="" data-caption="<?= $file['filename'] ?>" data-group="a" href="upload/applicants_files/<?= $file['random_filename'] ?>">
                    <img src="upload/applicants_files/<?= $file['random_filename'] ?>" alt="" class="image-container">
                  </a>
                  <div class="desc"><p><?= $file['filename']; ?></p></div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
      
 

  



    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $('.btn-preview').click(function(){
            var filename = $(this).val();
            $(".prev_image").attr("src", "upload/applicants_files/"+filename);
        });
      });
    </script> -->

    <script type="text/javascript" src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/jquery-image-viewer-magnify/js/jquery.magnify.js"></script>

  </body>
</html>



<!--**************************************************************************************************-->
