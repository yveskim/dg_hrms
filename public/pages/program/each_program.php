<style media="screen">
  .profile-info-left{
    padding: 1em;
  }

  .program_logo{
    /* background-color: lightgray; */
    object-fit: contain;
    width: 100%;
    height: 100%;
    background-size: cover;
  }



</style>

<div class="row container">
  <div class="col-md-12">
    <input type="hidden" id="prog_id_details">
    <div class="row">
      <div class="col-md-2">
        <div class="portlet light profile-sidebar-portlet bordered"  style="width:100%;">
              <div class="profile-userpic" style="text-align: center">
                  <img src="" class="img-responsive  program_logo img-thumbnail rounded mx-auto d-block" alt="no image available" > </div>
                  <div class="profile-userbuttons">
                    <button type="button" class="btn btn-primary btn-sm btn_edit_logo" data-toggle="modal" data-target="#modalChangeLogo" ><i class="fa fa-pencil-square"></i> Edit Logo</button>
                  </div>
                  <hr>
              <div class="profile-usertitle">
                  <div class="profile-usertitle-name"><p id="prog_title"></p></div>
                  <div class=""><h6 id="prog_description"></h6></div>
                  <hr>
                  <div class=""><h6 id="prog_cat"></h6></div>
                </div>
                <hr>
           
              <div class="profile-info-left">
                <div class="row">
                  <div class="col-md-12">
                    <p><strong> Program Head: </strong> <span id="prog_head"></span></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h6 id="prog_category"></h6>
                  </div>
                </div>
             

              </div>
          </div>
        </div>
        
          
        <div class="col-md-10">
          <div class="portlet light bordered">

              <div class="portlet-body">
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation"><a href="#advisery" id="adviseryTab" class="nav-link active" aria-controls="advisery" role="tab" data-toggle="tab">Advisery</a></li>
                          <li role="presentation"><a href="#section"  id="sectionTab" class="nav-link" aria-controls="section" role="tab" data-toggle="tab">Sections</a></li>
                          <li role="presentation"><a href="#teacher" id="teacherTab"  class="nav-link" aria-controls="teacher" role="tab" data-toggle="tab">Teachers</a></li>
                          <li role="presentation"><a href="#progStudent" id="studentTab" class="nav-link" aria-controls="progStudent" role="tab" data-toggle="tab">Students</a></li>
                          <li role="presentation"><a href="#subjects" id="subjectsTab" class="nav-link" aria-controls="subjects" role="tab" data-toggle="tab">Subjects</a></li>
                          <!-- <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li> -->
                      </ul><hr class="hrTab">

                      <!-- Tab panes -->

                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="advisery">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="section">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="teacher">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="progStudent">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="subjects">
                          </div>
<!-- 
                          <div role="tabpanel" class="tab-pane" id="others">
                          </div> -->
                      </div>

                  </div>
                </div>
            </div>
        </div>
      </div>
      

    </div>
  </div>
</div>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

   
<div class="modal fade mb-4" id="modalChangeLogo">
    <div class="modal-dialog modal-sm  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Logo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formLogo"></form>
          <div class="row">
            <div class="col-md-12">
              <div class="profile-userpic" style="text-align: center">
                  <img src="" class="img-responsive program_logo img-thumbnail rounded mx-auto d-block imageViewer" alt=""> 
              </div>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-12">
              <label for="">Select Image</label>
              <input type="file" class="form-control btn btn-primary" name="prog_logo_file" id="prog_logo_file" form="formLogo"  onchange="readURL(this)" >
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success full-size" form="formLogo">Proceed</button>
            </div>
          </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function() {
          loadProgram();
          $('#advisery').load('pages/program/advisery/program_advisery.php');
        },100);
    });



    function loadProgram(){
      let prog_id = $('#prog_id_details').val();
      // console.log(prog_id);
      $.ajax({
        url: 'getProgramDetails',
        method: 'get',
        dataType: 'json',
        data: {prog_id:prog_id},
        // beforeSend: function(){
        //   $('.spiner-div').show();
        //   $('.div-blur').show();
        // },
        // complete: function(){
        //   $('.spiner-div').hide();
        //   $('.div-blur').hide();
        // },
        success: function(data){
          $('.program_logo').prop('src', 'upload/program logo/program_profile/'+data.prog.program_logo);
          $('#prog_title').text(data.prog.program_title);
          $('#prog_description').text(data.prog.description);
          $('#prog_cat').text(data.prog.cat_title);
          
          if(data.prog.ph_id == null){
            $('#prog_head').text('N/A');
          }else{
            $('#prog_head').text(data.prog.emp_lname+', '+data.prog.emp_fname+' '+data.prog.emp_mname);
          }
        }
        
      })//end of ajax

    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#adviseryTab").click(function(){
      $('#advisery').load('pages/program/advisery/program_advisery.php');
    })


    $("#sectionTab").click(function(){
      $('#section').load('pages/program/sections/section_data.php');
    })

    $("#teacherTab").click(function(){
      $('#teacher').load('pages/program/teachers/teacher_data.php');
    })

    $("#studentTab").click(function(){
      $('#progStudent').load('pages/program/students/students_data.php');
    })
  

    // +++++++++++++++++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++++++++++++++++++++

  //  $('.btn_edit_logo')
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.imageViewer').prop('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

   $('#modalChangeLogo').on('hidden.bs.modal', function(){
      $('.imageViewer').prop('src', '');
    })




    $('#formLogo').submit(function(event){
      event.preventDefault();
      $prog_id = $('#prog_id_details').val();
      let formData = new FormData(this);
      formData.append('prog_id', $prog_id);
        $.ajax({
          type: "post",
          url: 'changeProgramLogo',
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
            $('#modalChangeLogo').modal('toggle');
          },
          success: function(res){
            if (res.status == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Update Successfull',
                    text: 'Logo has been updated',
                    showConfirmButton: true
                });
                $('#modalChangeLogo').modal('toggle');
                $('.program_logo').prop('src', 'upload/program logo/program_profile/'+res.randomFileName);
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

<link rel="stylesheet" href="assets/each_emp_css.css">
