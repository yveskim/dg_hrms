<style media="screen">
  .full-size{
    width: 100%;
  }

  .position-div, .department-div, .program-div{
    padding: 2%;
    border-bottom: 5px solid gray;
    border-right: 5px solid gray;
  }



  .emp_profile_pic{
    min-height: 10rem;
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .align-left p{
    text-align: left;
    margin: 0;
    padding: 0;
    font-size: 1rem;
    /* padding-left: 25%; */
  }


</style>



<link rel="stylesheet" href="assets/each_emp_css.css">
<input type="hidden" id="emp_id">
<div class="container">
  <div class="row">
    <div class="col-md-3">
        <div class="portlet light profile-sidebar-portlet bordered">
            <div class="row">
              <div class="col-md-12">
                <div class="profile-userpic">
                    <img class="img-responsive profile_pic emp_profile_pic img-thumbnail rounded mx-auto d-block"  alt="no image available"> 
                </div>
                <div class="profile-usertitle" style="padding: 0 4%  0 4%;">
                  <div class=""><strong><h5 id="fullname"></h5></strong></div>
                  <div class=""><h6 id="">ID: <span id="emp_school_id"> </span></h6></div>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalChangeProfile"><i class="fa fa-pencil"></i> Edit Pic</button>
                </div>
              </div>
            </div>
        </div>   
    </div>
    <div class="col-md-9 portlet light">
      <div class="row" style="padding-top: 2rem;">
        <div class="col-md-5">
          <ul>
            <li class="mb-1">
              <div class="row align-left">
                <div class="col-md-6">
                  <p>Plantilla:</p>
                </div>
                <div class="col-md-6">
                <strong><p id="emp_position"></p></strong>
                </div>
              </div>
            </li>
            <li class="mb-1">
              <div class="row align-left">
                <div class="col-md-6">
                  <p>Category:</p>
                </div>
                <div class="col-md-6">
                <strong><p id="emp_category"></p></strong>
                </div>
              </div>
            </li>
            <li class="mb-1">
              <div class="row align-left">
                <div class="col-md-6">
                  <p>Department:</p>
                </div>
                <div class="col-md-6">
                <strong><p id="emp_department"></p></strong>
                </div>
              </div>
            </li>
            <li class="mb-1">
              <div class="row align-left">
                <div class="col-md-6">
                  <p>Program:</p>
                </div>
                <div class="col-md-6">
                <strong><p id="emp_program"></p></strong>
                </div>
              </div>
            </li>
            <li class="mb-1">
              <div class="row align-left">
                <div class="col-md-6">
                  <p>Designation:</p>
                </div>
                <div class="col-md-6">
                <strong><p id="emp_designation"></p></strong>
                </div>
              </div>
            </li>
            <li class="mb-1">
              <div class="row align-left">
                <div class="col-md-6">
                  <p>Coordinatorship:</p>
                </div>
                <div class="col-md-6">
                <strong><p id="emp_coordinatorship"></p></strong>
                </div>
              </div>
            </li>
          </ul>
        </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-2">
        <button class="btn btn-primary btn-sm full-size">Send Email</button>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary btn-sm full-size">Check FB</button>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary btn-sm full-size">Send SMS</button>
      </div>

    </div>
  </div>
<div class="row ">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Employee Information</span>
                </div>

            </div>

            <div class="portlet-body" style="box-shadow: 0px 3px 5px #888888; padding: 1rem;">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs bg-warning" role="tablist">
                        <li role="presentation"><a href="#personalInfo" id="personalInfoTab" class="nav-link active" aria-controls="personalInfo" role="tab" data-toggle="tab">Personal Info</a></li>
                        <li role="presentation"><a href="#familyBg" id="familyBgTab" class="nav-link" aria-controls="familyBg" role="tab" data-toggle="tab">Family Background</a></li>
                        <li role="presentation"><a href="#educationalBg" id="educationalBgTab" class="nav-link" aria-controls="educationalBg" role="tab" data-toggle="tab">Educational Background</a></li>
                        <li role="presentation"><a href="#eligibility" id="eligibilityTab" class="nav-link" aria-controls="eligibility" role="tab" data-toggle="tab">Eligibility</a></li>
                        <li role="presentation"><a href="#workExperience" id="workExperienceTab" class="nav-link" aria-controls="workExperience" role="tab" data-toggle="tab">Work Experience</a></li>
                        <li role="presentation"><a href="#workInvolvement" id="workInvolvementTab" class="nav-link" aria-controls="workInvolvement" role="tab" data-toggle="tab">Work Involvement</a></li>
                        <li role="presentation"><a href="#learningAndDevelopment" id="learningAndDevelopmentTab" class="nav-link" aria-controls="learningAndDevelopment" role="tab" data-toggle="tab">Learning and Development</a></li>
                        <li role="presentation"><a href="#skills" id="skillsTab" class="nav-link" aria-controls="skills" role="tab" data-toggle="tab">Skills/Hobbies</a></li>
                        <li role="presentation"><a href="#reference" id="referenceTab" class="nav-link" aria-controls="reference" role="tab" data-toggle="tab">Reference</a></li>
                        <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
                    </ul>
                    <br>

                    <!-- Tab panes -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="personalInfo"></div>
                        <div role="tabpanel" class="tab-pane" id="familyBg"></div>
                        <div role="tabpanel" class="tab-pane" id="educationalBg"></div>
                        <div role="tabpanel" class="tab-pane" id="eligibility"></div>
                        <div role="tabpanel" class="tab-pane" id="workExperience"></div>
                        <div role="tabpanel" class="tab-pane" id="workInvolvement"></div>
                        <div role="tabpanel" class="tab-pane" id="learningAndDevelopment"></div>
                        <div role="tabpanel" class="tab-pane" id="reference"></div>
                        <div role="tabpanel" class="tab-pane" id="skills"></div>
                        <div role="tabpanel" class="tab-pane" id="others"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
<hr>





<div class="modal fade mb-4" id="modalChangeProfile">
    <div class="modal-dialog modal-sm  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h5 class="modal-title">Change Profile</h5>
          <button type="button" class="close" >&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formImage"></form>
          <div class="row">
            <div class="col-md-12">
              <div class="" style="text-align: center">
                  <img  class="img-responsive user_profile_pic img-thumbnail rounded mx-auto d-block imageViewer" alt=""> 
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

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


<script type="text/javascript">
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
  
    $('#personalInfo').load('pages/employee/personal_info/personal_info.php');
    
      $('#personalInfoTab').click(function(){
        $('#personalInfo').load('pages/employee/personal_info/personal_info.php');
      });

      $('#familyBgTab').click(function(){
        $('#familyBg').load('pages/faculty/profile/family_bg.php');
      });


      $('#educationalBgTab').click(function(){
        $('#educationalBg').load('pages/faculty/profile/educational_bg.php');
      });

      $('#eligibilityTab').click(function(){
        $('#eligibility').load('pages/faculty/profile/eligibility.php');
      });

      $('#workExperienceTab').click(function(){
        $('#workExperience').load('pages/faculty/profile/work_xp.php');
      });

      $('#workInvolvementTab').click(function(){
        $('#workInvolvement').load('pages/faculty/profile/work_inv.php');
      });

      $('#learningAndDevelopmentTab').click(function(){
        $('#learningAndDevelopment').load('pages/faculty/profile/learning_dev.php');
      });

      $('#skillsTab').click(function(){
        $('#skills').load('pages/faculty/profile/skills_hobbies.php');
      });

      $('#referenceTab').click(function(){
        $('#reference').load('pages/faculty/profile/reference.php');
      });

      $('#othersTab').click(function(){
        $('#others').load('pages/faculty/profile/others.php');
      });
    //   +++++++++++++++++++++++++++++++++++++++++++

    $('#modalChangeProfile').on('show.bs.modal', function(){
        $('.imageViewer').attr('src', $('.profile_pic').attr('src'));
    })

    $('.close').click(function(){
        $('#modalChangeProfile').modal('hide');
        $('body').removeClass('modal-open');
    })

    $('#modalChangeProfile').on('hidden.bs.modal', function(){
        $('.imageViewer').prop('src', '');
        // $('body').addClass('modal-open');
        $('body').removeClass('modal-open');
    })
});


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
            $('.profile_pic').prop('src', 'upload/user_files/'+res.randomFileName);
        }else {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Action Failed',
                text: res.message,
                showConfirmButton: true
            });
            
        }//end ifelse
        }// end of success ...................
    });//end of ajax ..................
})



</script>
