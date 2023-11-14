<form class="form"  id=""></form>
<div class="row">
    <div class="col-8">
    <h4>Teachers</h4>
    </div>
    <div class="col-3">
    <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalTeacher">Add Teacher</button>
    </div>
</div>

    <div class="row data-div">
    <div class="col-md-12 portlet light bordered">
        <div class="row advisery_list">
        <div class="col-md-12">
            <table class="table table-hover table-bordered tbl_teachers table-sm" style="width: 100%; white-space:nowrap;">
            <thead>
                <tr>
                <th>No.</th>
                <th>Emp ID.</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Date Created</th>
                <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalTeacher">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Teacher</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered table-hover tableTeacher table-compact table-sm table-condensed tbl-text-sm" style="white-space: nowrap;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>

            </div>
            <!-- end of modal body -->

          </div>
      </div>
  </div>





<script>

    $(document).ready(function(){
        getTeachers();
    })
      

    $('#modalTeacher').on('shown.bs.modal', function () {
      getTeacherNoProgram();
    })

    function getTeacherNoProgram(){
      $.ajax({
        url: 'getTeacherNoProgram',
        method: 'get',
        dataType: 'json',
        success: function(data){
          $('.tableTeacher').off();
            $('.tableTeacher').DataTable().clear().destroy();
            $('.tableTeacher').DataTable({
              "data": data.emp,
              "scrollX": true,
              "autoWidth": false,
              "destroy" : true,
              "columns": [
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "emp_school_id"},
                {"data": "emp_fname"},
                {"data": "emp_mname"},
                {"data": "emp_fname"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.emp_id+'" class="fa fa-check btn btn-success btn-sm add_teacher" title="add teacher"> ADD</button>';
                  }
                }
              ]
            });//end of datatable


            $('.add_teacher').click(function(){
              let prog_id = $('#prog_id_details').val();
              let emp_id = $(this).prop('id');
              let sy_id = $('#sy_ref').val();
              $.ajax({
                  url: 'addTeacherToProgram',
                  method: 'POST',
                  dataType: 'JSON',
                  data: {prog_id: prog_id, emp_id: emp_id,  sy_id: sy_id},
                  // contentType: false,
                  // cache: false,
                  // processData: false,
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Action Success',
                        text: 'Faculty successfully added to program',
                        showConfirmButton: true
                      })
                      getTeacherNoProgram();
                    }else{
                      Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Action Failed',
                        text: res.message,
                        showConfirmButton: true
                      })
                    }
                  }
                })
            })
        }
        
      })//end of ajax
    }

    $('#modalTeacher').on('hidden.bs.modal', function () {
      getTeachers();
    })

    
    function getTeachers(){
      let prog_id = $('#prog_id_details').val();
      // console.log(prog_id);
      $.ajax({
        url: 'getProgramTeachers',
        method: 'get',
        dataType: 'json',
        data: {prog_id:prog_id},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
          $('.tbl_teachers').off();
            $('.tbl_teachers').DataTable().clear().destroy();
            $('.tbl_teachers').DataTable({
              "data": data.teacher,
               "responsive": false,
              "scrollX": true,
              "autoWidth": false,
              "destroy" : true,
              "paging" : false,
              // "dom": 'lBfrtip',
              // "buttons": [
              //     'copy', 'csv', 'excel', 'pdf', 'print'
              //   ],
              "columns": [
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" name="en_id" id="'+data.emp_id+'" class="btn btn-success btn-sm btn-xs details" title="view details" style="width: 100%">'+data.emp_school_id+'</button>';
                  }
                },
                {"data": "emp_lname"},
                {"data": "emp_fname"},
                {"data": "emp_mname"},
                {"data": "emp_gender"},
                {"data": "emp_birthdate"},
                {"data": "created_at"},
             
              ]


            });//end of datatable
            $('.details').click(function(){
              let emp_id = $(this).prop('id');
                
                $.ajax({
                  url: 'admin/eachEmp',
                  method: 'get',
                  dataType: 'json',
                  data: {emp_id: emp_id},
                  success: function(res){
                    // console.log(res);
                  
                    $('.data-div').load('pages/employee/each_employee.php', function(){
        
                      $("#fullname").text(res.emp.emp_fname+" "+ res.emp.emp_mname +" "+ res.emp.emp_lname);
                      if(res.stat != null){
                        $("#emp_position").text(res.stat.plantilla_title);
                      }else{
                        $("#emp_position").text("N/A");
                      }

                      if(res.cat != null){
                        $("#emp_category").text(res.cat.cat_title);
                      }else{
                        $("#emp_category").text("N/A");
                      }

                      if(res.dept != null){
                        $("#emp_department").text(res.dept.dept_title);
                      }else{
                        $("#emp_department").text("N/A");
                      }

                      if(res.prog != null){
                        $("#emp_program").text(res.prog.program_title);
                      }else{
                        $("#emp_program").text("N/A");
                      }

                      if(res.des != null){
                        $("#emp_designation").text();
                      }else{
                        $("#emp_designation").text("N/A");
                      }
                      

                      $("#emp_school_id").text(res.emp.emp_school_id);

                      $("#inputEmpId").val(res.emp.emp_id);
                      $("#job_description").val(res.emp.job_description);
                      $("#inputEmpSchoolId").val(res.emp.emp_school_id);
                      $("#emp_id").val(res.emp.emp_id);
                      $("#empIdFamBg").val(res.emp.emp_id);
                      $("#empIdFamBgChildren").val(res.emp.emp_id);
                      $("#empEducId").val(res.emp.emp_id);
                      $("#empEligId").val(res.emp.emp_id);
                      $("#empWorkExpId").val(res.emp.emp_id);
                      $("#empWorkInvolvementId").val(res.emp.emp_id);
                      $("#empLearningAndDevelopmentId").val(res.emp.emp_id);
                      $("#othersId").val(res.emp.emp_id);
                      $(".profile_pic").attr("src", 'upload/user_files/'+res.emp.emp_image);
                      $("#inputFirstName").val(res.emp.emp_fname);
                      $("#inputMiddleName").val(res.emp.emp_mname);
                      $("#inputLastName").val(res.emp.emp_lname);
                      $("#inputGender").val(res.emp.emp_gender);
                      $("#inputMaritalStatus").val(res.emp.emp_marital_status);
                      $("#inputCitizenship").val(res.emp.emp_citizenship);
                      $("#inputCitizenBy").val(res.emp.emp_citizen_by);
                      $("#inputCountry").val(res.emp.emp_country);
                      $("#inputBirthdate").val(res.emp.emp_birthdate);
                      $("#inputBirthplace").val(res.emp.emp_place_of_birth);
                      $("#inputReligion").val(res.emp.emp_religion);
                      $("#inputBloodType").val(res.emp.emp_blood_type);
                      $("#inputHeight").val(res.emp.emp_height);
                      $("#inputWeight").val(res.emp.emp_weight);
                      $("#inputTin").val(res.emp.emp_tin);
                      $("#inputSss").val(res.emp.emp_sss);
                      $("#inputGsis").val(res.emp.emp_gsis);
                      $("#inputPagibig").val(res.emp.emp_pagibig);
                      $("#inputPhilhealth").val(res.emp.emp_philhealth);
                      $("#inputAgency").val(res.emp.emp_agency_employee_no);
                      $("#inputEmail").val(res.emp.emp_email);
                      $("#inputPerHouse").val(res.emp.emp_p_add_house);
                      $("#inputPerStreet").val(res.emp.emp_p_add_street);
                      $("#inputPerSubdivision").val(res.emp.emp_p_add_subdivision);
                      $("#inputPerBarangay").val(res.emp.emp_p_add_barangay);
                      $("#inputPerMunicipality").val(res.emp.emp_p_add_municipality);
                      $("#inputPerCity").val(res.emp.emp_p_add_city);
                      $("#inputPerProvince").val(res.emp.emp_p_add_province);
                      $("#inputPerZip").val(res.emp.emp_p_add_zip);
                      $("#inputCurHouse").val(res.emp.emp_r_add_house);
                      $("#inputCurStreet").val(res.emp.emp_r_add_street);
                      $("#inputCurSubdivision").val(res.emp.emp_r_add_subdivision);
                      $("#inputCurBarangay").val(res.emp.emp_r_add_barangay);
                      $("#inputCurMunicipality").val(res.emp.emp_r_add_municipality);
                      $("#inputCurCity").val(res.emp.emp_r_add_city);
                      $("#inputCurProvince").val(res.emp.emp_r_add_province);
                      $("#inputCurZip").val(res.emp.emp_r_add_zip);

                      $('#btn-update-image').click(function(){
                          alert('under construction');
                        //ajax here
                      });
                    });

                  }
                });
          
              });//ajax end
          }
        
      })//end of ajax

    }


</script>