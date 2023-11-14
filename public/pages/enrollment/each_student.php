<style media="screen">
  .full-size{
    width: 100%;
  }



  .position-div, .department-div, .program-div{
    padding: 2%;
    border-bottom: 5px solid gray;
    border-right: 5px solid gray;
    margin-right: 50%;
  }

  .align-left{
    text-align: left;
    margin: 0;
    padding: 0;
    border-bottom: 1px solid lightgray;
  }
  
  .stud_profile_pic{
    /* background-color: lightgray; */
    max-height: 10rem;
    min-width: 100%;
    object-fit: contain;
  }

  .tab-container{
    margin-bottom: 2rem;
  }

  .backToTop{
      z-index: 9999;
      cursor: pointer;
      text-decoration: none;
      transition: opacity 0.2s ease-out;
      float:right;
  }

  .backToTop:hover{
    opacity: 0.7;
  }


</style>

<div class="container">
  <input type="hidden" class="en_id" form="generateRF" name="en_id">
 
  <div class="row ">
    <div class="col-md-3">
        <div class="portlet light profile-sidebar-portlet bordered">
            <div class="" style="text-align: center; ">
                <img src="" class="img-responsive profile_pic stud_profile_pic img-thumbnail rounded mx-auto d-block" alt=""> 
            </div>
            <div class="profile-usertitle" style="padding: 0 4%  0 4%;">
                <div class=""><strong><h5 id="fullname"></h5></strong></div>
                <div class="stud_sch_id mb-2"><h6 id="">ID: <span id="stud_sch_id"> </span></h6></div>
                <button type="button" class="btn btn-primary btn-sm btn-pic full-size" data-toggle="modal" data-target="#modalChangePic"><i class="fa fa-pencil-square-o">&nbsp;</i> Change Image</button>
                <a id="downloadImage" class="btn btn-info btn-sm full-size">Download</a>
                <hr>
                
         
                <div class="row en_info">
                  <div class="col-md-12">
                      <div class="row align-left">
                        <div class="col-md-12 en_stat_div" >
                          <div class="row">
                            <label for="">Enrollment Status</label>
                            <div class="col-md-12"><h6 style="font-weight: bold; color: green;" id="en_stat"></h6></div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 "><button class="btn btn-success btn-sm full-size" id="btn_enrol"><i class="fa fa-plus"></i>&nbsp;ENROLL</button></div>
                          </div>
                        </div>
                      </div>
                      <hr>

                      <div class="row align-left" id="stud_program_div">
                        <div class="col-md-12">
                          <label for="">Program</label>
                          <h6 style="font-weight: bold;" id="stud_program"></h6>
                        </div>
                      </div>
                     
                      <div class="row align-left" id="stud_strand_div">
                        <div class="col-md-12">
                          <label for="">Track/Strand</label>
                          <h6 style="font-weight: bold;" id="stud_strand"><span></span></h6>
                        </div>
                      </div>
                     
                      <div class="row align-left">
                        <div class="col-md-12">
                          <label for="">Grade Level</label>
                          <h6 style="font-weight: bold;" id="stud_grade_level"></h6>
                        </div>
                      </div>
                     
                      <div class="row align-left">
                        <div class="col-md-12">
                          <label for="">Section</label>
                          <h6 style="font-weight: bold;" id="stud_section"></h6>
                        </div>
                      </div>

                      <div class="row align-left" id="adviser_div">
                        <div class="col-md-12">
                          <label for="">Adviser</label>
                          <h6 style="font-weight: bold;" id="adviser"></h6>
                        </div>
                      </div>

                      <div class="row align-left" id="is_als_div">
                        <div class="col-md-12">
                          <label for="">ALS</label>
                          <h6 style="font-weight: bold;" id="is_als"></h6>
                        </div>
                      </div>

                      <div class="row align-left" id="is_pssn_div">
                        <div class="col-md-12">
                          <label for="">PSSN</label>
                          <h6 style="font-weight: bold;" id="is_pssn"></h6>
                        </div>
                      </div>
                  </div>
                </div>

            </div>
            <hr>


      

            <div class="profile-usermenu"  style="padding: 0 4%  0 4%;">

              <div class="row">
                <!-- <div class="col-md-6">
                  <button type="button" class="btn btn-primary btn-sm full-size">Preliminary Form</button>
                </div> -->
                <div class="col-md-12">
                  <form action="generateEF" id="generateRF" method="get" target="_blank">
                    <button type="submit" class="btn btn-info btn-sm full-size generate_pdf">Generate <br/> RF</button>
                  </form>
                </div>
              </div>
            
            </div>

            
        </div>
        <div class="row readme_div">
          <div class="col-md-12">
            <button class="btn btn-primary full-size" data-toggle="modal" data-target="#modalReadMe">Read Me</button>
          </div>
        </div>

        <div class="row user_guide">
          <div class="col-md-12">
            <a href="assets/user_guide/user guide.pdf" class="btn btn-primary full-size" target="_blank">User Guide</a>
          </div>
        </div>
    </div>

    <div class="col-md-9 tab-container">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase" style="font-size: 2rem; font-weight: bold;">Learners Information</span>
                </div>

            </div>

            <div class="portlet-body">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#personalInfo" id="personalInfoTab" class="nav-link active" aria-controls="personalInfo" role="tab" data-toggle="tab">Personal Info</a></li>
                        <li role="presentation"><a href="#address" id="addressTab" class="nav-link" aria-controls="address" role="tab" data-toggle="tab">Address</a></li>
                        <li role="presentation"><a href="#familyBackground" id="familyBackgroundTab" class="nav-link" aria-controls="familyBackground" role="tab" data-toggle="tab">Family Background</a></li>
                        <li role="presentation"><a href="#household" id="householdTab" class="nav-link" aria-controls="household" role="tab" data-toggle="tab">Household Members</a></li>
                        <li role="presentation"><a href="#homeDevices" id="homeDevicesTab" class="nav-link" aria-controls="homeDevices" role="tab" data-toggle="tab">Home Devices</a></li>
                        <li role="presentation"><a href="#healthStatus" id="healthStatusTab" class="nav-link" aria-controls="healthStatus" role="tab" data-toggle="tab">Health Status</a></li>
                        <li role="presentation"><a href="#schools" id="schoolsTab" class="nav-link" aria-controls="schools" role="tab" data-toggle="tab">School Records</a></li>
                        <li role="presentation"><a href="#grades" id="gradesTab" class="nav-link" aria-controls="grades" role="tab" data-toggle="tab">Grade Records</a></li>
                    </ul><hr class="hrTab">

                    <!-- Tab panes -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="personalInfo"></div>
                        <div role="tabpanel" class="tab-pane" id="address"></div>
                        <div role="tabpanel" class="tab-pane" id="familyBackground"></div>
                        <div role="tabpanel" class="tab-pane" id="household"></div>
                        <div role="tabpanel" class="tab-pane" id="homeDevices"></div>
                        <div role="tabpanel" class="tab-pane" id="healthStatus"></div>
                        <div role="tabpanel" class="tab-pane" id="schools"></div>
                        <div role="tabpanel" class="tab-pane" id="grades"></div>
                    </div>

                </div>
            </div>
        </div>

                
    <!-- scroll to top when the docuemnt is open in a window or in a modal -->
    </div class="row ">
      <div class="col-md-12 float-right">  
          <div class="backToTop"
              onclick="$('html, body').animate({scrollTop : 0},800);
                       $('.modal').animate({scrollTop : 0},800);
                        return false;"><i class="fa fa-arrow-circle-up" style="font-size: 4rem;"></i>
          </div>
      </div>
       
</div>

</div>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


<div class="modal fade mb-4" id="modalChangePic">
    <div class="modal-dialog modal-sm  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Image</h4>
          <button type="button" class="close" >&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formImage"></form>
          <div class="row">
            <div class="col-md-12">
              <div class="" style="text-align: center">
                  <img src="" class="img-responsive stud_profile_pic img-thumbnail rounded mx-auto d-block imageViewer" alt=""> 
              </div>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-12">
              <label for="">Select Image</label>
              <input type="file" class="form-control btn btn-primary" name="stud_image" id="stud_image" form="formImage"  onchange="readURL(this)" >
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


<div class="modal fade mb-4" id="modalReadMe">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Enrollment Guidelines</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <div class="row">
            <div class="col-md-12">
              
              <h6 style="text-align: justify;">
                In preparation for the opening of School Year (SY) 2023-2024, and consideration of a faster flow of enrollment transactions, the Iloilo National High School (INHS) has provided an online platform for learners to process their enrollment applications. 
              </h6>
              <h6 style="text-align: justify;">
                Note: This account is not a proof that you are already enrolled. This is a platform for learners to enable them to encode all the needed details of enrollment process online to lessen the time to process the enrollment in school premise. The learner needs to complete all the required details in this module before proceeding to school for final processing of enrollment and claiming of Registration Form (RF).
              </h6>
              <h6 style="text-align: justify;">
                Please do not leave any important details to avoid delay in the process of enrollment.<br/> After you have encoded all the details, you can now proceed to the office of the program you applied for verification of your information. Bring the documents needed for verification (SF9 (Card), SF10, PSA Birth Cert., Cert. of Good Moral Character).
              </h6>
             
              
            </div>
          </div>
        
        </div>
    </div>
  </div>
</div>




<script type="text/javascript">

    $(window).scroll(function(){

      // Show button after 100px
      let showAfter = 100;
      if ( $(this).scrollTop() > showAfter ) { 
          $('.back-to-top').fadeIn();
      } else { 
          $('.back-to-top').fadeOut();
      }
    });

    function loadInfo(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'loadEnrolleeInfo',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
       
          if(data.stat === null){
            $('#en_stat').text("N/A");
            $('#btn_enrol').show();
            $('#btn_update_stat').hide();
          }else if(data.stat.enrollment_status == "Enroled"){
            $('#en_stat').text("Enrolled");
            $('#btn_enrol').hide();
            $('#btn_update_stat').hide();
          }

          if(data.stat === null){
            $('#stud_grade_level').text("N/A");
          }else{
            $('#stud_grade_level').text('Grade '+data.stat.grade_level);
          }

          if(data.sec === null && data.shsSec === null){
            $('#stud_section').text("TBA");
          }else if(data.stat.grade_level < 10){
            $('#stud_section').text(data.sec.sec_title);
          }else if(data.stat.grade_level > 10){
            $('#stud_section').text(data.shsSec.shs_sec_title);
          }
          

          if(data.strand === null){
            $('#stud_strand').text('TBA');
            $('#stud_strand_div').hide();
          }else{
            $('#stud_strand').text(data.strand.track_title +'-'+ data.strand.strand_title);
          }

          if(data.prog === null){
            $('#stud_program').text('TBA');
            $('#stud_program_div').hide();
          }else{
            $('#stud_program_div').show();
            $('#stud_program').text(data.prog.program_title);
          }

          if(data.stat === null){
            $('#is_als').text("N/A");
          }else{
            if(data.stat.is_als == 0){
              $('#is_als').text('No');
            }else{
              $('#is_als').text('Yes');
            }
          }

          if(data.stat === null){
            $('#is_pssn').text("N/A");
          }else{
            if(data.stat.is_pssn == 0){
              $('#is_pssn').text('No');
            }else{
              $('#is_pssn').text('Yes');
            }
          }

          if(data.adviser === null){
            $('#adviser').text("TBA");
          }else{
            $('#adviser').text(data.adviser.emp_fname +' '+ data.adviser.emp_lname );
          }

          

        }
      })
    }

    $('#btn_enrol').click(function(){
      // alert('test');
        $('#jhs_form').hide();
        $('#shs_form').hide();
        $('#modalEnroll').modal('toggle');
        $('#enrollForm')[0].reset();

        let en_id = $('.en_id').val();
        let stud_name = $('#lastName').val() + ", " + $('#firstName').val() + " " + $('#middleName').val();
        $('.stud_name_en').text(stud_name);
        $('.en_id').val(en_id);
    })

    $('#modalUpdateStat').on('show.bs.modal', function(){
        let stud_name = $('#lastName').val() + ", " + $('#firstName').val() + " " + $('#middleName').val();
        $('#stud_name_update').text(stud_name);
    })

    $(document).ready(function(){

      setTimeout(function(){
        loadInfo();
      }, 100)

      $('#personalInfo').load('pages/enrollment/personal_info.php');

      $('#personalInfoTab').click(function(){
        $('#personalInfo').load('pages/enrollment/personal_info.php');
      });

      $('#addressTab').click(function(){
        $('#address').load('pages/enrollment/student_address.php');
      });

      $('#familyBackgroundTab').click(function(){
        $('#familyBackground').load('pages/enrollment/family_background.php');
      });

      $('#homeDevicesTab').click(function(){
        $('#homeDevices').load('pages/enrollment/home_devices.php');
      });

      $('#healthStatusTab').click(function(){
        $('#healthStatus').load('pages/enrollment/health_record.php');
      });

      $('#schoolsTab').click(function(){
        $('#schools').load('pages/enrollment/schools.php');
      });

      $('#gradesTab').click(function(){
        $('#grades').load('pages/enrollment/grades.php');
      });


      $('#documentsTab').click(function(){
        $('#documents').load('pages/enrollment/documents/work_involvement.php');
      });

      $('#householdTab').click(function(){
        $('#household').load('pages/enrollment/household_members.php');
      });

      $('#othersTab').click(function(){
        $('#others').load('pages/enrollment/others/others.php');
      });


    });


    $('#modalUpdateStat').on('show.bs.modal', function(){
        let en_id = $('.en_id').val();
    })

    $('#updateEnrollmentForm').submit(function(event){
      event.preventDefault();
      $en_id = $('.en_id').val();
      let formData = new FormData(this);
      formData.append('en_id', $en_id);
        $.ajax({
          type: "post",
          url: 'updateEnStat',
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
            $('#modalUpdateStat').modal('toggle');
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
              loadInfo();
            
    
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



    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.imageViewer').prop('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    $('.close').click(function(){
      $('#modalChangePic').modal('hide');
    })

    $('#modalChangePic').on('hidden.bs.modal', function(){
      $('.imageViewer').prop('src', '');
      $('body').addClass('modal-open');
    })

    $('#modalChangePic').on('show.bs.modal', function(){
      $('.imageViewer').prop('src', $('.profile_pic').prop('src'));
      $(this).addClass('blur-bg');
    })

    
    $('#formImage').submit(function(event){
      event.preventDefault();
      $en_id = $('.en_id').val();
      let formData = new FormData(this);
      formData.append('en_id', $en_id);
        $.ajax({
          type: "post",
          url: 'updateStudImage',
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
            // $('#modalChangePic').modal('toggle');
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
                $('#modalChangePic').modal('toggle');
                $('.profile_pic').prop('src', 'upload/student_files/student_images/'+res.randomFileName);
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


    // $('.generate_rf').click(function(){
    //     let en_id = $('.en_id').val();  

    //     $.ajax({
    //         url: 'generateRF',
    //         method: 'get',
    //         dataType: 'json',
    //         data: {en_id: en_id},

    //         success: function(data){

    //         }

    //     })
    // })


 

    // $('#modalEnrollStudent').on('shown.bs.modal', function () {
    //   $('.semester_div').hide();
    //   $('#remarks').val("");
    //   $('#en_status').prop('selectedIndex',0);
    //   getGradeLevel();
 
  

    //   $('#grade_level').change(function(){
    //     //  alert($(this).val());
    //     //  let gl = $("#grade_level option:selected").text();
    //     if( $(this).val() >= 5){
    //       $('.semester_div').show();
    //       // getSemester();
    //     }else{
    //       $('.semester_div').hide();
    //     }
    //   })
    // })



// $('#modalEnrollStudent').on('hidden.bs.modal', function () {
  
//   $('#enrollForm')[0].reset();
// })


function getGradeLevel(){
  $.ajax({
      url: 'getGradeLevel',
      method: 'get',
      dataType: 'json',
      success: function(res){
          $('#grade_level').empty();
          $('#grade_level').append('<option value="">---select---</option>');
          $.each(res.gr_lvl, function(key, val){
            $('#grade_level').append('<option value="'+val.grade_level_id+'">'+'Grade '+val.grade_level+'</option>');
          })
      }
    })
}




</script>

<link rel="stylesheet" href="assets/each_emp_css.css">
