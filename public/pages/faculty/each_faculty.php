<style media="screen">
  .profile-info-left{
    padding: 1em;
  }

  .full-size{
    width: 100%;
  }

  .search-div{
    background-color: white;
    border: 1px solid lightgray;
  }
</style>

<div class="row container">
  <div class="col-md-12">
    <input type="text" id="emp_id_details">
    <input type="text" id="adv_id_ref">
    <div class="row">

      <div class="col-md-3">
        <div class="portlet light profile-sidebar-portlet bordered">
              <div class="profile-userpic" style="text-align: center">
                  <img src="" class="img-responsive profile_pic" alt="no image available"> </div>
              <div class="profile-usertitle">
                  <div class="profile-usertitle-name"><p id="fullname"></p></div>
                  
                </div>
                <!-- <div class="profile-userbuttons">
                  <button type="button" class="btn btn-info btn-sm">change profile</button>
                  <button type="button" class="btn btn-info btn-sm">Message</button>
                  <a href="report/pds_pdf" target="_blank" type="button" class="btn btn-info btn-sm">Generate PDF</a>
              </div> -->
              <div class="profile-info-left">
                <div class="row">
                  <div class="col-md-12">
                    <h6> <strong> Employee ID: </strong> <span id="emp_school_id"></span></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h6 id="emp_name"></h6>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h6 id="job_description"></h6>
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Gender: <span id="gender"></span></label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label for="">Birthday: <span id="bday"></span></label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label for="">Phone: <span id="phone"></span></label>
                  </div>
               </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Email: <span id="email"></span></label>
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Department: <span id="department"></span></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Position: <span id="position"></span></label>
                  </div>
                </div>

              </div>
          </div>
        </div>
        
          
        <div class="col-md-9">
          <div class="portlet light bordered">
              <div class="portlet-title tabbable-line">
                  <div class="caption caption-md">
                      <i class="icon-globe theme-font hide"></i>
                      <span class="caption-subject font-blue-madison bold uppercase">Faculty Information</span>
                  </div>

              </div>

              <div class="portlet-body">
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation"><a href="#personalInfo" class="nav-link active" aria-controls="personalInfo" role="tab" data-toggle="tab">Advisery</a></li>
                          <li role="presentation"><a href="#familyBg" id="familyBgTab" class="nav-link" aria-controls="familyBg" role="tab" data-toggle="tab">Designation</a></li>
                          <li role="presentation"><a href="#educationalBg" id="educationalBgTab" class="nav-link" aria-controls="educationalBg" role="tab" data-toggle="tab">Department</a></li>
                          <li role="presentation"><a href="#eligibility" id="eligibilityTab" class="nav-link" aria-controls="eligibility" role="tab" data-toggle="tab">Memos</a></li>
                          <li role="presentation"><a href="#workExperience" id="workExperienceTab" class="nav-link" aria-controls="workExperience" role="tab" data-toggle="tab">Special Assignment</a></li>
                          <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
                      </ul><hr class="hrTab">

                      <!-- Tab panes -->

                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="personalInfo">
                            <form class="form" action="#" method="post" id="edit-form"></form>
                            <div class="row">
                              <div class="col-8">
                                <h4>Advisery Information</h4>
                              </div>
                              <div class="col-3">
                                <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" form="edit-form">Add Advisery</button>
                              </div>
                            </div><hr>

                              <div class="row basic-info-div">
                                <div class="col-md-4 search-div">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <label for="">School Year</label>
                                      <select class="form-control full-size"  name="" id="school_year">
                                        
                                      </select>
                                    </div>
                                    <div class="col-md-4 ">
                                      <label for="">Search</label>
                                      <button class="btn btn-primary full-size">Go</button>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                      <label for="">Program</label>
                                      <input type="text" readonly class="form-control full-size" id="adv_prog">
                                    </div>
                                    <div class="col-md-2">
                                      <label for="">Section</label>
                                      <input type="text" readonly class="form-control full-size" id="adv_section">
                                    </div>
                                    <div class="col-md-2">
                                      <label for="">Grade Level</label>
                                      <input type="text" readonly class="form-control full-size" id="adv_grade">
                                    </div>
                                <div class="col-md-7">

                                </div>
                              </div>

                              <div class="row ">
                                <div class="col-md-12 portlet light bordered">
                                  <div class="row">
                                    <div class="caption caption-md">
                                      <i class="icon-globe theme-font hide"></i>
                                      <h5><span class="caption-subject font-blue-madison bold uppercase">Advisery List</span></h5>
                                    </div>
                                  </div>
                                  <div class="row advisery_list">
                                    <div class="col-md-12">
                                      <table class="table table-stripped table-bordered tbl_advisery table-compact table-sm">
                                        <thead>
                                          <tr>
                                            <th>No.</th>
                                            <th>School ID</th>
                                            <th>LRN</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Ext</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </div>
                          

                          <div role="tabpanel" class="tab-pane" id="familyBg"></div>
                          <div role="tabpanel" class="tab-pane" id="educationalBg"></div>
                          <div role="tabpanel" class="tab-pane" id="eligibility"></div>
                          <div role="tabpanel" class="tab-pane" id="workExperience"></div>
                          <div role="tabpanel" class="tab-pane" id="others"></div>
                      </div>

                  </div>
                </div>
            </div>
        </div>
      </div>
      

    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function() {
          loadDetails();



        },200);
  
    });

    function loadDetails(){
      let emp_id = $('#emp_id_details').val();
      // console.log(emp_id);
      $.ajax({
        url: 'getFacultyDetails',
        method: 'get',
        dataType: 'json',
        data: {emp_id:emp_id},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
            // console.log(data.adv_details);
            $('#adv_id_ref').val(data.adv_details.adv_id);
            $('#adv_prog').val(data.adv_details.program_title);
            $('#adv_section').val(data.adv_details.sec_title);
            $('#adv_grade').val(data.adv_details.grade_level);
           
            $.each(data.sy, function(key, val){
              $('#school_year').append('<option value="'+val.sy_id+'">'+val.school_year+'</option>');
            })
            $('#emp_name').html(data.faculty.emp_lname+', '+ data.faculty.emp_fname + ' '+ data.faculty.emp_mname);
            $('#emp_school_id').html(data.faculty.emp_school_id);
            if(data.faculty.job_description == 1){
              $('#job_description').html("Administrator");
            }else if(data.faculty.job_description == 2){
              $('#job_description').html("Faculty");
            }else if(data.faculty.job_description == 3){
              $('#job_description').html("Staff");
            }else if(data.faculty.job_description == 4){
              $('#job_description').html("Job Order");
            }else if(data.faculty.job_description == 5){
              $('#job_description').html("Contractor");
            }else{
              $('#job_description').html("N/A");
            }

            // $('#job_description').append(' '+ data.adv.cat_title);
            
            $('.profile_pic').prop('src', 'upload/user_files/'+data.faculty.emp_image);
            $('#gender').html(data.faculty.emp_gender);
            $('#bday').html(data.faculty.emp_birthdate);
            $('#phone').html(data.faculty.emp_mobile_no);
            $('#email').html(data.faculty.emp_email);
            $('#advisery').html(data.adv.grade_level+' '+data.adv.sec_title);

            // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $('.tbl_advisery').off();
            $('.tbl_advisery').DataTable().clear().destroy();
            $('.tbl_advisery').DataTable({
            "data": data.adv,
            //  "responsive": true,
            "scrollX": true,
            "autoWidth": false,
            "destroy" : true,
            "dom": 'lBfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
              ],
            "columns": [
 
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;
                 }
             },
             {"data": "student_id"},
             {"data": "student_lrn"},
             {"data": "last_name"},
             {"data": "middle_name"},
             {"data": "first_name"},
             {"data": "ext"},
             {"data": "gender"},
             {"data": "phone_no"},
             {"data": "email_address"},
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" name="en_id" id="'+data.en_id+'" class="fa fa-eye btn btn-primary btn-sm details" title="view details"></button>';
               }
             }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         let table = $('.tableFaculty').DataTable();

         $('.delete_emp').click(function(){
          // alert($(this).prop('id'));
          let emp_id = $(this).prop('id');
          $.ajax({
            url: 'deleteFaculty',
            method: 'get',
            dataType: 'json',
            data: {emp_id:emp_id},
            beforeSend: function(){
              $('.spiner-div').show();
              $('.div-blur').show();
            },
            complete: function(){
              $('.spiner-div').hide();
              $('.div-blur').hide();
            },
            success: function(data){
              if(data.status === 1){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Deleted',
                    text: data.message,
                    showConfirmButton: true
                })
                loadEnrollmentData();
              }else{
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: data.message,
                  showConfirmButton: true
                })
              }
                
            }
          })

         })


         
        $('.details').click(function(){
          let emp_id = $(this).prop('id');
          $('.content-div').load('pages/faculty/each_faculty.php', function(){
            // alert(emp_id);
            $('#emp_id_details').val(emp_id);
          })
        })

          }
        })
    }

   

  
   
</script>

<link rel="stylesheet" href="assets/each_emp_css.css">
