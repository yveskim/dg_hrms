<?php $this->extend("f_layout/faculty_layout") ?>

<?php $this->Section('content') ?>
<style media="screen">
  .bg-image {
    background-repeat: no-repeat;
    background-size: contain;
    position: fixed;
    width: 100%;
    height: 100%;
  }


  .faded {
    opacity: .9;
  }

  .cam-icn:hover{
    transform:scale(1.2);
    text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
  }



  ._img{
      width: 7vw;
      height: 7vw;
  }

  @media only screen and (max-width: 985px) {
    ._img {
      width: 12vw;
      height: 12vw;
    }
  }

  @media only screen and (max-width: 600px) {
    ._img {
      width: 15vw;
      height: 15vw;
    }
  }

  .img-container { 
    transition: transform .1s;
    position: relative;  
    justify-content: center;
    align-items: center;
    display:flex;
    padding-top:20%;
  }
  
  .img-container img { display: block; }
  .img-container .cam-icn { position: absolute; bottom:0; left:60%; font-size: 1.8vw; color: gray;}


  .user_profile_pic{
    background-color: white;
    max-height: 10rem;
    min-width: 100%;
    object-fit: contain;
  }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/jquery/jquery3.5.1.js"></script> -->

<div class="content-div">
  <div class="row">
    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-blue"
                style="background: url('upload/system_file/facade.jpg') center center; 
                background-repeat: 
                no-repeat; background-size: cover;">
          </div>
          <div class="widget-user-image">
            <?php  if(file_exists('upload/user_files/' . $faculty['emp_image'])):   ?>
              <div class="img-container">
                <img class="img-circle _img user_profile_pic profile_pic" src="<?= 'upload/user_files/' . $faculty['emp_image'] ?>" alt="User Avatar"  title="change image">
                <i class="fas fa-camera cam-icn" type="button" title="change image" data-toggle="modal" id="user-image-icon" data-target="#modalChangeProfile"></i>
              </div>
            <?php else:?>
              <div class="img-container ">
                <img class="img-circle _img user_profile_pic profile_pic " src="upload/system_file/noimage.png" id="no-image-icon" alt="User Avatar">
                <i class="fas fa-camera cam-icn" type="button" title="change image" data-toggle="modal" data-target="#modalChangeProfile"></i>
              </div>
              
              <?php endif;?>
          </div>

          <div class="card-body">
            <div class="row">
              <h3 class=""><?= $faculty['emp_fname']." ".$faculty['emp_lname']?></h3>
            </div>
            <div class="row">
              <h5 class=""><?php if($faculty['job_description'] == 2){echo "Facutly";}?></h5>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
  </div>

  <div class="row">
    <div class="col-md-12">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

   
        <div class="row">
                    <!-- /.col -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-11">
                    <h4>Personal Data Sheet</h4>
                  </div>
                    <div class="col-md-1">
                    <button class="btn btn-secondary full-size">Print PDS</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#personal_info" id="personalInfoTab" data-toggle="tab">Personal Info</a></li>
                        <li class="nav-item"><a class="nav-link" href="#family" id="familyTab" data-toggle="tab">Family BG</a></li>
                        <li class="nav-item"><a class="nav-link" href="#education" id="educTab" data-toggle="tab">Educational BG</a></li>
                        <li class="nav-item"><a class="nav-link" href="#eligibility" id="eligibilityTab" data-toggle="tab">Eligibility</a></li>
                        <li class="nav-item"><a class="nav-link" href="#work_xp" id="workXpTab" data-toggle="tab">Work Experience</a></li>
                        <li class="nav-item"><a class="nav-link" href="#work_inv" id="workInvTab" data-toggle="tab">Work Involvement</a></li>
                        <li class="nav-item"><a class="nav-link" href="#learning_dev" id="learningDevTab" data-toggle="tab">Learning & Development</a></li>
                        <li class="nav-item"><a class="nav-link" href="#skills_hobbies" id="skillsHobbiesTab" data-toggle="tab">Skills/Hobbies</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reference" id="referenceTab" data-toggle="tab">Reference</a></li>
                        <li class="nav-item"><a class="nav-link" href="#others" id="othersTab" data-toggle="tab">Others</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body" style="min-height: 600px;">
                      <div class="tab-content">

                        <div class="active tab-pane" id="personal_info"></div>
                        <div class="tab-pane" id="family"></div>
                         <div class="tab-pane" id="eligibility"></div>
                        <div class="tab-pane" id="education"></div>
                        <div class="tab-pane" id="work_xp"></div>
                        <div class="tab-pane" id="work_inv"></div>
                        <div class="tab-pane" id="learning_dev"></div>
                        <div class="tab-pane" id="skills_hobbies"></div>
                        <div class="tab-pane" id="reference"></div>
                        <div class="tab-pane" id="others"></div>

                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
</div>


<!-- modal change pic -->


<div class="modal fade mb-4" id="modalChangeProfile">
    <div class="modal-dialog modal-sm  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Change Profile</h4>
          <button type="button" class="close" >&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formImage"></form>
          <div class="row">
            <div class="col-md-12">
              <div class="" style="text-align: center">
                  <img src="" class="img-responsive user_profile_pic img-thumbnail rounded mx-auto d-block imageViewer" alt=""> 
              </div>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-12">
              <label for="">Select Image</label>
              <input type="file" class="form-control btn btn-primary" name="emp_file" id="emp_file" form="formImage"  onchange="readURL(this)" >
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success full-size" form="formImage">Proceed</button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- end modal change pic -->
<script>
  $("#educTab").click(function () {
    $("#education").load("pages/faculty/profile/educational_bg.php");
  });

  $("#familyTab").click(function () {
    $("#family").load("pages/faculty/profile/family_bg.php");
  });

  $("#eligibilityTab").click(function () {
    $("#eligibility").load("pages/faculty/profile/eligibility.php");
  });

  $("#workXpTab").click(function () {
    $("#work_xp").load("pages/faculty/profile/work_xp.php");
  });

  $("#workInvTab").click(function () {
    $("#work_inv").load("pages/faculty/profile/work_inv.php");
  });

  $("#learningDevTab").click(function () {
    $("#learning_dev").load("pages/faculty/profile/learning_dev.php");
  });

  $("#skillsHobbiesTab").click(function () {
    $("#skills_hobbies").load("pages/faculty/profile/skills_hobbies.php");
  });

  $("#referenceTab").click(function () {
    $("#reference").load("pages/faculty/profile/reference.php");
  });

  $("#othersTab").click(function () {
    $("#others").load("pages/faculty/profile/others.php");
  });
</script>



<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.imageViewer').prop('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function(){
      $('#modalChangeProfile').on('show.bs.modal', function(){
        $('.imageViewer').prop('src', $('.profile_pic').prop('src'));
      })

      $('.close').click(function(){
        $('#modalChangeProfile').modal('hide');
      })

      $('#modalChangeProfile').on('hidden.bs.modal', function(){
        $('.imageViewer').prop('src', '');
        $('body').addClass('modal-open');
      })
    })

    $('#formImage').submit(function(event){
      event.preventDefault();
      $emp_id = $('#emp_id').val();
      let formData = new FormData(this);
      formData.append('emp_id', $emp_id);
        $.ajax({
          type: "post",
          url: 'employee/updateProfile',
          data: formData,
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function(){
            $('.spiner-div').show();
            $('.div-blur').show();
          },
          complete: function(){
            $('.spiner-div').hide();
            $('.div-blur').hide();
          },
          success: function(res){
            if (res.status == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Update Successfull',
                    text: 'Record has been updated',
                    showConfirmButton: true
                });
                $('#modalChangeProfile').modal('toggle');
                $('body').css({ overflow: 'visible'}); //enables scroll in the document after closing modal
                $('.profile_pic').prop('src', 'upload/user_files/'+res.randomFileName);
            }else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please Select A Picture',
                    text: res.message,
                    showConfirmButton: true
                });
                
            }//end ifelse
          }// end of success ...................
        });//end of ajax ..................
    })



</script>


<script type="text/javascript" src="assets/myCustomJs/faculty_profile.js"></script>







<?php $this->endSection(); ?>