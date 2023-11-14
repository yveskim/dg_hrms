

<style media="screen">
  .title-text{
    text-align: center;
  }

  #pending-text{
    color: orange;
    border-bottom: 1px solid black;
  }

  #validated-text{
    color: green;
    border-bottom: 1px solid black;
  }

  #declined-text{
	color: red;
	border-bottom: 1px solid black;
  }


  .btn-group-xs > .btn, .btn-xs {
    padding: .45rem .2rem;
    font-size: .675rem;
    line-height: .5;
    border-radius: .2rem;
  }

  .btn-active{
    border-bottom: 4px solid gray;
    margin-bottom: -1px;
    margin-top: -1px;
  }

  .faded{
    opacity: .9;
  }

  .form137-div{
    text-align: center;
  }

  .btn-option{
    width: 100%;
  }

  .filter-modal-body{
    padding: 2em;
  }

  .tbl-text-sm{
    font-size: .8rem;
  }

.rad-assessment {
   transform: scale(1.5);
}

.rad-div{
  border-radius: .5em;
  padding: .5em 1em .5em 1em;
  width: 100%;
  color: white;
}

.rad-div:not(:first-child){
  margin-left: 3em;
}

/* ---------------- */

/* checkbox color layout */
.assessment-modal-body{
  padding: 0 2.5em 0 2.5em;
}

.full-size{
  width: 100%;
}
/* ---------------------------------- */

.title-encode{
  background-color: darkblue;
  padding: .5rem;
  color: white;
}

.title-encode-user{
  background-color: gray;
  padding: .5rem;
  color: white;
}

.title-enrolled{
  background-color: #28a745; 
  padding: .5rem;
  color: white;
}

.title-new-student{
  background-color: brown; 
  padding: .5rem;
  color: white;
}

.title-jhs{
  background-color: skyblue; 
  padding: .5rem;
  color: white;
}

.title-shs{
  background-color: gold; 
  padding: .5rem;
  color: black;
}

.title-byUser{
  background-color: gray; 
  padding: .5rem;
  color: white;
}


.table td{
vertical-align: middle;
}

.submitted-documents{
  padding: 0;
  margin: 0;
  /* float: left; */
  text-align: center;
}

.table-data-div{
  border-right: 2px solid gray;
}

.height-zero{
  height: 0;
}

</style>
<div class="menu-category-div">
  <div class="row">
    <div class="col-md-2" >
          <button class="btn btn-primary full-size" style="background-color: brown;" id="encode_new_student">Encode <br/>(New Student)</button>
    </div>
  </div>
  <hr>

    <div class="row">
      <div class="col-md-2" >
      <button class="btn btn-primary full-size" id="forEnrollment">Enrollment <br/>(All Data)</button>
    </div>
    
    <div class="col-md-2">
      <button class="btn btn-secondary full-size" id="forEnrollmentByUser">Enrollment <br/>(By User)</button>
    </div>

    <div class="col-md-2" style="border-left: .5rem solid gray;">
      <button class="btn btn-info full-size" id="jhsEnrolledData">Enrolled in <br/>JHS Only</button>
    </div>
    
    <div class="col-md-2">
      <button class="btn btn-warning full-size" id="shsEnrolledData">Enrolled in <br/>SHS Only</button>
    </div>
    
    <div class="col-md-2">
      <button class="btn btn-success full-size" id="enrolledData">All Enrolled <br/>Student</button>
    </div>
    
    <div class="col-md-2">
      <button class="btn btn-secondary full-size" id="enrolledByUser">Enrolled by <br/>User</button>
    </div>
  </div>


</div>
<div class="row">
      <div class="col-md-12 ">
        <i class="fa fa-arrow-up float-right" type="button" id="menu-up" style="font-size: 2rem;"></i>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 ">
        <i class="fa fa-arrow-down float-right" type="button" id="menu-down" style="font-size: 2rem;"></i>
      </div>
    </div>
  </div><hr class="hrTab">

<div class="row">
    <div class="col-md-12">
      <center><h3 id="title"></h3></center>
    </div>
  </div>
<!-- <div class="data-div"> -->
  <div class="row">
    <div class="col-md-12 table-data-div">
      <table class="table table-bordered table-hover tableStudent display table-compact table-sm nowrap" style="width:100%; padding:0;">
        <i class="fa fa-arrow-right float-right" type="button" style="font-size: 2rem;" id="expand_table"></i>
        <thead>
          <tr>
            <th></th>
            <!-- <th>Action</th> -->
            <th>Stud ID</th>
            <th>Stat</th>
            <th>GL</th>
            <th>LRN</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Sex</th>
            <th>Birthdate</th>
            <th>LWD</th>
            <th>Phone</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Fb Name</th>
            <th>Created Date</th>
            <th>CB</th>
            <th>EB</th>
            <th>Remarks</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="col-md-8 data-div"></div>
  </div>
  <!-- </div> -->


<div class="modal fade" id="modalEnroll">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">ENROLL (<strong><span class="stud_name_en"></span></strong> )</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="enrollForm"></form>
              <input type="hidden" class="en_id" name="en_id" form="enrollForm">
              <input type="text" name="token" value="<?php echo $_SESSION['token']; ?>" form="enrollForm">
              <div class="enroll-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Submitted Documents</label>
                  </div>
                </div>
                <div class="row submitted-documents">
                  <div class="col-md-2 mb-0 p-0" style="border-right: 4px solid gray;">
                    <label for="">Check All</label>
                    <input type="checkbox" id="chkAll" value="1" class="form-control form-control-sm" form="enrollForm" >
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-2 mb-0 p-0" style="border-right: 1px solid gray;">
                    <label for="">SF9</label>
                    <input type="checkbox" name="sf9" id="sf9" value="1" class="form-control form-control-sm" form="enrollForm">
                  </div>
                  <div class="col-md-2 mb-0 p-0" style="border-right: 1px solid gray;">
                    <label for="">PSA</label>
                    <input type="checkbox" name="psa" id="psa" value="1" class="form-control form-control-sm" form="enrollForm">
                  </div>
                  <div class="col-md-2 mb-0 p-0" style="border-right: 1px solid gray;">
                    <label for="">COC</label>
                    <input type="checkbox" name="coc" id="coc" value="1" class="form-control form-control-sm" form="enrollForm">
                  </div>
                </div>
                <hr>
               
                <div class="row">
                  <div class="col-md-6">
                    <label>Is the Learner enrolled in ALS?</label>
                    <select name="is_als" id="is_als" class="form-control form-control-sm" form="enrollForm">
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Is the Learner enrolled in PSSN?</label>
                    <select name="is_pssn" id="is_pssn" class="form-control form-control-sm" form="enrollForm">
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Grade Level</label>
                    <select name="grade_level" id="grade_level" class="form-control form-control-sm" form="enrollForm" required>
                    
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="">Enrollment Status</label>
                    <select name="en_status" id="en_status" class="form-control form-control-sm" form="enrollForm" required>
                      <option value="">---select---</option>
                      <option value="Enroled">Officially Enrolled</option>
                      <option value="Declined">Declined</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Remarks</label>
                    <input type="text" name="remarks" id="remarks" class="form-control form-control-sm" form="enrollForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="ENROLL" class="btn btn-success form-control form-control-sm" form="enrollForm">
                  </div>
                </div>
              </div>
              </div>
            <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++ -->

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>
  <script type="text/javascript">

$(document).ready(function(){
    $('.spiner-div').hide();
    $('.div-blur').hide();
    $('.data-div').hide();
    $('.table-data-div').hide();
    $('#expand_table').hide();
    
    let loadTo = 0;

    getGradeLevel();

    menuControll();
  });

  function menuControll(){
    $('#menu-up').show();
    $('#menu-down').hide();

    $('#menu-down').click(function(){
      $('.menu-category-div').fadeIn(500, function(){
        $('#menu-down').hide();
        $('#menu-up').show();
      })
    })


    $('#menu-up').click(function(){
      $('.menu-category-div').fadeOut(500, function(){
        $('#menu-down').show();
        $('#menu-up').hide();
      })
    })


  }


  $('#expand_table').click(function(){
   
    $('.table-data-div').addClass('col-md-12').fadeIn(2000, function(){
      // $('.data-div').fadeOut(2000);
      $('.data-div').hide();
    })
    $(this).hide();
  })

  $('#modalEnroll').on('shown.bs.modal', function () {
    $('#remarks').val("");
    $('#en_status').prop('selectedIndex',0);
    getGradeLevel();
  
  })

  $('#modalEnroll').on('hidden.bs.modal', function () {
    $('#enrollForm')[0].reset();
  })
    // -----------------------------------------------------------------
    // -----------------------------------------------------------------
    // -----------------------------------------------------------------
    // -----------------------------------------------------------------


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

    $('#enrollForm').submit(function(event){
          event.preventDefault();
          let user_id = $('#user').val();
          let sy_id = $('#sy_ref').val();
          let sem_id = $('#sem_id').val();
          let formData = new FormData(this);
          formData.append('user_id', user_id);
          formData.append('sy_id', sy_id);
          formData.append('sem_id', sem_id);

          setTimeout(function() {
            $.ajax({
            url: 'enrollStudent',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
              if(res.status == 1){
                Swal.fire({
                  position: 'center',
                  icon: 'info',
                  title: 'Data Saved',
                  text: 'Student Enroled Successfully',
                  showConfirmButton: true
                })
                loadInfo();
                    // if(loadTo == 1){
                    //   loadForEnrollment();
                    // }else if(loadTo == 2){
                    //   loadForEnrollmentByUser();
                    // }else if(loadTo == 3){
                    //   loadJhs();
                    // }else if(loadTo == 4){
                    //   loadShs();
                    // }else if(loadTo == 5){
                    //   loadEnrolled();
                    // }else if(loadTo == 6){
                    //   loadEnrolledByUser();
                    // }else{
                    //   loadForEnrollment();
                    // }
                    
                $('#modalEnroll').modal('toggle');
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
          }, 2000);

      })

    $('#chkAll').click(function(){
      if($(this).prop('checked') == true){
        checkAll(true);
      }else{
        checkAll(false);
      }
    })

    function checkAll(stat){
      // $('#chkAll').prop('checked', stat);
      $('#sf9').prop('checked', stat);
      $('#coc').prop('checked', stat);
      $('#psa').prop('checked', stat);
    }

  $('#encode_new_student').click(function() {
    // alert('test');
      $('.table-data-div').load('pages/enrollment/encode_student.php', function(){
        $('.data-div').hide();
        $('#expand_table').hide();
        $('.table-data-div').show();
        $('.table-data-div').addClass('col-md-12');
        $('#title').text("Encode (New Student)");
        $('#title').removeClass();
        $('#title').addClass("title-new-student");

      });
  });

  $('#forEnrollment').click(function(){
      loadForEnrollment();
  })

  function loadForEnrollment(){
    $('.content-div').load('pages/enrollment/enrollment_data.php', function(){
      let sy = $("#sy_ref").val();
      $('#title').text("Enrollment (All Data)");
      $('#title').removeClass();
      $('#title').addClass("title-encode");
      $.ajax({
        url: 'getStudentData',
        method: 'get',
        dataType: 'json',
        data:{sy:sy},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
            $('.table-data-div').show();
            $('.tableStudent').off();
            $('.tableStudent').DataTable().clear().destroy();
            $('.tableStudent').DataTable({
              "data": data.en,
              "responsive": false,
              "scrollX": true,
              "autoWidth": true,
              "destroy" : true,
              "paging" : true,
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
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" name="en_id" value="'+data.en_id+'" id="'+data.en_id+'" class="btn btn-primary btn-sm btn-xs view_student" title="view details" style="width:100%">'+data.student_id+'</button>';
                  }
                },
                {
                  "data": "enrollment_status",
                  visible: false,
                  searchable: false
                },
                {
                  "data": "grade_level",
                  visible: false,
                  searchable: false
                },
                //  {"data": "student_id"},
                {"data": "student_lrn"},
                {"data": "last_name"},
                {"data": "first_name"},
                {"data": "middle_name"},
                {"data": "sex"},
                {"data": "birthdate"},
                {"data": "with_special_need"},
                {"data": "phone_no"},
                {"data": "tel_no"},
                {"data": "email_address"},
                {"data": "facebook_name"},
                {"data": "created_at"},
                {"data": "created_by"},
                //  {"data": "enrolled_by"},
                {
                  "data": "enrolled_by",
                    visible: false,
                    searchable: false
                },
                {
                  "data": "remarks",
                  visible: false,
                  searchable: false
                },
                {
                  "data": null,
                    render: function(data, type, row) {
                    return '<button type="button" id="'+data.en_id+'" class="btn btn-danger btn-sm btn-xs delete_student" title="delete student" style="vertical-align: middle; width:100%;">&nbsp;DEL </button>';
                  }
                }
              
              ]
            });//end of datatable
            //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

            $('.tableStudent').on('click', '.view_student', function(){
              loadTo = 1;
              let en_id = $(this).prop('id');

              // colored button when selected
              $('.view_student').removeClass('bg-warning');
              $(this).addClass('bg-warning');
              
              // highlight table row when clicked
              let table = $('.tableStudent').DataTable();
              $('.tableStudent tbody tr').removeClass('selected_row');
              table.row($(this).parents('tr').addClass('selected_row'));


              $(".data-div").stop();
              $('.data-div').hide().fadeOut(500);
              $('.data-div').load('pages/enrollment/each_student.php', function(){
                getGradeLevel();
                $('.table-data-div').removeClass('col-md-12');
                $('.table-data-div').addClass('col-md-4');
                $('.data-div').show();
                $('#expand_table').show();
                $('.en_id').val(en_id);
                $('.generate_pdf').hide();
                $(".readme_div").hide();
                $(".user_guide").hide();
              }).fadeIn(500);
            })

            $('.delete_student').click(function(){
              
              let en_id = $(this).prop('id');
                Swal.fire({
                  title: 'Confirm Delete',
                  text: "It will be moved to deleted bin!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, Delete It',
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      url: 'deleteStudentApplication',
                      method: 'get',
                      dataType: 'json',
                      data:{en_id:en_id},
                      success: function(res){
                        if(res.status == 1){
                          Swal.fire({
                                position: 'center',
                                icon: 'info',
                                title: 'Data Deleted',
                                text: 'Record has been deleted',
                                showConfirmButton: true
                            });
                           
                        }else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Action Failed',
                                text: res.message,
                                showConfirmButton: true
                            });
                            
                        }//end ifelse
                      }
                    })//ajax end
                  } 
                })

            })//end delete

    
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
      }//end of success........
    });//end of ajax ................
    })
 
  }

// ---------------------------------------------------------------
// ---------------------------------------------------------------
// ---------------------------------------------------------------
// ---------------------------------------------------------------

$('#forEnrollmentByUser').click(function(){
    loadForEnrollmentByUser();
})
  function loadForEnrollmentByUser(){
    $('.content-div').load('pages/enrollment/enrollment_data.php', function(){
      
      let user_id = $('#user').val();
      let sy = $("#sy_ref").val();
      $('#title').text("Enrollment (By User)");
      $('#title').removeClass();
      $('#title').addClass("title-encode-user");
      $.ajax({
        url: 'getStudentDataByUser',
        method: 'get',
        dataType: 'json',
        data: {user_id:user_id, sy:sy},
        beforeSend: function(){
          $('.spiner-div').show();
        $('.div-blur').show();
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
      },
      complete: function(){
        $('.spiner-div').hide();
        $('.div-blur').hide();
      },

      success: function(data){
        $('.table-data-div').show();
          $('.data-div').show();
          // $('#expand_table').show();
          $('.tableStudent').off();
          $('.tableStudent').DataTable().clear().destroy();
          $('.tableStudent').DataTable({
            "data": data.en,
            "responsive": false,
            "scrollX": true,
            "autoWidth": true,
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
              {
                "data": null,
                  render: function(data, type, row) {
                  return  '<button type="button" name="en_id" value="'+data.en_id+'" id="'+data.en_id+'" class="btn btn-primary btn-sm btn-xs view_student" title="view details" style="width:100%">'+data.student_id+'</button>';
                }
              },
              {
                "data": "enrollment_status",
                visible: false,
                searchable: false
              },
              {
                "data": "grade_level",
                visible: false,
                searchable: false
              },
              {"data": "student_lrn"},
              {"data": "last_name"},
              {"data": "first_name"},
              {"data": "middle_name"},
              {"data": "sex"},
              {"data": "birthdate"},
              {"data": "with_special_need"},
              {"data": "phone_no"},
              {"data": "tel_no"},
              {"data": "email_address"},
              {"data": "facebook_name"},
              {"data": "created_at"},
              {"data": "created_by"},
              {
                "data": "enrolled_by",
                  visible: false,
                  searchable: false
              },
              {
                "data": "remarks",
                visible: false,
                searchable: false
              },
              {
                "data": null,
                  render: function(data, type, row) {
                  return  '<button type="button" id="'+data.en_id+'" class="btn btn-danger btn-sm btn-xs delete_student" title="delete student" style="vertical-align: middle; width:100%;"> &nbsp;DEL </button>';
                }
              }
            

            ]
          });//end of datatable

          $('.tableStudent').on('click', '.view_student', function(){
              loadTo = 2;
              let en_id = $(this).prop('id');

              // colored button when selected
              $('.view_student').removeClass('bg-warning');
              $(this).addClass('bg-warning');

              // highlight table row when clicked
              let table = $('.tableStudent').DataTable();
              $('.tableStudent tbody tr').removeClass('selected_row');
              table.row($(this).parents('tr').addClass('selected_row'));

              $(".data-div").stop();
              $('.data-div').hide().fadeOut(500);
              $('.data-div').load('pages/enrollment/each_student.php', function(){
                getGradeLevel();
                $('.table-data-div').removeClass('col-md-12');
                $('.table-data-div').addClass('col-md-4');
                $('.data-div').show();
                $('#expand_table').show();
                $('.en_id').val(en_id);
                $('.generate_pdf').hide();
                $(".readme_div").hide();
                $(".user_guide").hide();
              }).fadeIn(500);
            })

          $('.delete_student').click(function(){
            let en_id = $(this).prop('id');
              Swal.fire({
                title: 'Confirm Delete',
                text: "It will be moved to deleted bin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete It',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: 'deleteStudentApplication',
                    method: 'get',
                    dataType: 'json',
                    data:{en_id:en_id},
                    success: function(res){
                      if(res.status == 1){
                        Swal.fire({
                              position: 'center',
                              icon: 'info',
                              title: 'Data Deleted',
                              text: 'Record has been deleted',
                              showConfirmButton: true
                          });
                          // console.log(res.message);
                          loadForEnrollmentByUser();
                      }else {
                          Swal.fire({
                              position: 'center',
                              icon: 'error',
                              title: 'Action Failed',
                              text: res.message,
                              showConfirmButton: true
                          });
                          
                      }//end ifelse
                    }
                  })//ajax end
                } 
              })

          })//end delete

    
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
      }//end of success........
    });//end of ajax ................
    })

}

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$('#jhsEnrolledData').click(function(){
    loadJhs();
  })
function loadJhs(){
  $('.content-div').load('pages/enrollment/enrollment_data.php', function(){
    let sy = $("#sy_ref").val();

    $('#title').removeClass();
    $('#title').text("Enrolled in Junior High School Only");
    $('#title').addClass("title-jhs");
    
    $.ajax({
      url: 'getEnrolledJhsData',
      method: 'get',
      dataType: 'json',
      data: {sy:sy},
      beforeSend: function(){
        $('.spiner-div').show();
       $('.div-blur').show();
       $('.modal-backdrop').remove();
       $('body').removeClass('modal-open');
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();
     },

     success: function(data){
      $('.table-data-div').show();
        $('.data-div').show();
        // $('#expand_table').show();
        $('.tableStudent').off();
        $('.tableStudent').DataTable().clear().destroy();
         $('.tableStudent').DataTable({
           "data": data.en,
          //  "responsive": true,
           "scrollX": true,
           "autoWidth": true,
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
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.en_id+'" class="btn btn-primary btn-sm btn-xs view_student" title="view details">'+data.student_id+'</button>';
               }
             },
            //  {"data": "student_id"},
             {"data": "enrollment_status"},
             {"data": "grade_level"},
             {"data": "student_lrn"},
             {"data": "last_name"},
             {"data": "first_name"},
             {"data": "middle_name"},
             {"data": "sex"},
             {"data": "birthdate"},
             {"data": "with_special_need"},
             {"data": "phone_no"},
             {"data": "tel_no"},
             {"data": "email_address"},
             {"data": "facebook_name"},
             {"data": "enrolled_at"},  
             {
              "data": "created_by",
                visible: false,
                searchable: false
             },
             {"data": "enrolled_by"},                                                     
             {"data": "remarks"},
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" name="en_id" value="'+data.en_id+'" id="'+data.en_id+'" class="btn btn-danger btn-sm btn-xs delete_student" title="delete student" style="vertical-align: middle;"><i class="fa fa-trash"></i> &nbsp;DEL</button>';
               }
             }

           ]
         });//end of datatable

        $('.tableStudent').on('click', '.view_student', function(){
            loadTo = 3;
            let en_id = $(this).prop('id');


            // colored button when selected
            $('.view_student').removeClass('bg-warning');
            $(this).addClass('bg-warning');

            // highlight table row when clicked
            let table = $('.tableStudent').DataTable();
            $('.tableStudent tbody tr').removeClass('selected_row');
            table.row($(this).parents('tr').addClass('selected_row'));



            $(".data-div").stop();
            $('.data-div').hide().fadeOut(500);
            $('.data-div').load('pages/enrollment/each_student.php', function(){
                $('.table-data-div').removeClass('col-md-12');
                $('.table-data-div').addClass('col-md-4');
                $('.data-div').show();
                $('#expand_table').show();
                $('.en_id').val(en_id);
                $(".user_guide").hide();
                // $('.generate_pdf').hide();
                $(".readme_div").hide();
            })
          })

   
       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
     }//end of success........
   });//end of ajax ................
  })

}

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

$('#shsEnrolledData').click(function(){
    loadShs();
})

function loadShs(){
  $('.content-div').load('pages/enrollment/enrollment_data.php', function(){
    let sy = $("#sy_ref").val();
    let sem = $("#sem_id").val();

    $('#title').removeClass();
    $('#title').text("Enrolled in Senior High School Only");
    $('#title').addClass("title-shs");
    
    $.ajax({
      url: 'getEnrolledShsData',
      method: 'get',
      dataType: 'json',
      data: {sy: sy, sem: sem},
      beforeSend: function(){
        $('.spiner-div').show();
       $('.div-blur').show();
       $('.modal-backdrop').remove();
       $('body').removeClass('modal-open');
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();
     },

     success: function(data){
      $('.table-data-div').show();
      $('.data-div').show();
        $('.tableStudent').off();
        $('.tableStudent').DataTable().clear().destroy();
         $('.tableStudent').DataTable({
           "data": data.en,
           "responsive": false,
           "scrollX": true,
           "autoWidth": true,
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
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.en_id+'" class="btn btn-primary btn-sm btn-xs view_student" title="view details">'+data.student_id+'</button>';
               }
             },
             {"data": "enrollment_status"},
             {"data": "grade_level"},
             {"data": "student_lrn"},
             {"data": "last_name"},
             {"data": "first_name"},
             {"data": "middle_name"},
             {"data": "sex"},
             {"data": "birthdate"},
             {"data": "with_special_need"},
             {"data": "phone_no"},
             {"data": "tel_no"},
             {"data": "email_address"},
             {"data": "facebook_name"},
             {"data": "enrolled_at"},
             {
              "data": "created_by",
                visible: false,
                searchable: false
             },
             {"data": "enrolled_by"},
             {"data": "remarks"},
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.en_stat_id+'" class="btn btn-danger btn-sm btn-xs full-size delete_student" title="delete student" style="vertical-align: middle;"><i class="fa fa-trash"></i> &nbsp;DEL</button>';
               }
             }

           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        $('.tableStudent').on('click', '.view_student', function(){
            loadTo = 4;
            let en_id = $(this).prop('id');

            // colored button when selected
            $('.view_student').removeClass('bg-warning');
            $(this).addClass('bg-warning');

            // highlight table row when clicked
            let table = $('.tableStudent').DataTable();
            $('.tableStudent tbody tr').removeClass('selected_row');
            table.row($(this).parents('tr').addClass('selected_row'));



            $(".data-div").stop();
            $('.data-div').hide().fadeOut(500);
            $('.data-div').load('pages/enrollment/each_student.php', function(){
              $('.table-data-div').removeClass('col-md-12');
              $('.table-data-div').addClass('col-md-4');
              $('.data-div').show();
              $('#expand_table').show();
              $('.en_id').val(en_id);
              $(".user_guide").hide();
              // $('.generate_pdf').hide();
              $(".readme_div").hide();
            })
          })

        $('.delete_student').click(function(){
          let en_stat_id = $(this).prop('id');
            Swal.fire({
              title: 'Confirm Delete',
              text: "It will be moved back to enrollment data",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, Remove It',
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: 'unenrollStudent',
                  method: 'get',
                  dataType: 'json',
                  data:{en_stat_id:en_stat_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Unenroled',
                            text: 'Student has been unenrolled',
                            showConfirmButton: true
                        });
                        loadShs();
                    }else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Action Failed',
                            text: res.message,
                            showConfirmButton: true
                        });
                        
                    }//end ifelse
                  }
                })//ajax end
              } 
            })

        })
   
       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
     }//end of success........
   });//end of ajax ................
  })
 
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$('#enrolledData').click(function(){
    loadEnrolled();
})

function loadEnrolled(){
  $('.content-div').load('pages/enrollment/enrollment_data.php', function(){
    let sy = $("#sy_ref").val();
    let sem = $("#sem_id").val();
    
    $('#title').removeClass();
    $('#title').text("Enrolled Data (ALL)");
    $('#title').addClass("title-enrolled");
    
      $.ajax({
      url: 'getEnrolledData',
      method: 'get',
      dataType: 'json',
      data: {sy: sy, sem: sem},
      beforeSend: function(){
        $('.spiner-div').show();
       $('.div-blur').show();
       $('.modal-backdrop').remove();
       $('body').removeClass('modal-open');
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();
     },

     success: function(data){
      $('.table-data-div').show();
        $('.data-div').show();
        // $('#expand_table').show();
        $('.tableStudent').off();
        $('.tableStudent').DataTable().clear().destroy();
         $('.tableStudent').DataTable({
           "data": data.en,
          //  "responsive": true,
           "scrollX": true,
           "autoWidth": true,
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
            //  {
            //   "data": "student_id",
            //   visible: false,
            //   searchable: false
            //  },
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.en_id+'" class="btn btn-primary btn-sm btn-xs view_student" title="view details">'+data.student_id+'</button>';
               }
             },
            //  {"data": "student_id"},
             {"data": "enrollment_status"},
             {"data": "grade_level"},
             {"data": "student_lrn"},
             {"data": "last_name"},
             {"data": "first_name"},
             {"data": "middle_name"},
             {"data": "sex"},
             {"data": "birthdate"},
             {"data": "with_special_need"},
             {"data": "phone_no"},
             {"data": "tel_no"},
             {"data": "email_address"},
             {"data": "facebook_name"},
             {"data": "enrolled_at"},
             {
              "data": "created_by",
                visible: false,
                searchable: false
             },
             {"data": "enrolled_by"},
             {"data": "remarks"},
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.en_id+'" class="fa fa-trash btn btn-danger btn-sm btn-xs delete_student" title="delete student" style="vertical-align: middle;"> &nbsp;DEL</button>';
               }
             }

           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        $('.tableStudent').on('click', '.view_student', function(){
            loadTo = 5;
            let en_id = $(this).prop('id');

            // colored button when selected
            $('.view_student').removeClass('bg-warning');
            $(this).addClass('bg-warning');

            // highlight table row when clicked
            let table = $('.tableStudent').DataTable();
            $('.tableStudent tbody tr').removeClass('selected_row');
            table.row($(this).parents('tr').addClass('selected_row'));

            $(".data-div").stop();
            $('.data-div').hide().fadeOut(500);
            $('.data-div').load('pages/enrollment/each_student.php', function(){
              $('.table-data-div').removeClass('col-md-12');
              $('.table-data-div').addClass('col-md-4');
              $('.data-div').show();
              $('#expand_table').show();
              $('.en_id').val(en_id);
              $(".user_guide").hide();
              // $('.generate_pdf').hide();
              $(".readme_div").hide();
            }).fadeIn(500);
          })

        $('.delete_student').click(function(){
          let en_id = $(this).prop('id');
          // console.log(en_id);
            Swal.fire({
              title: 'Confirm Delete',
              // showDenyButton: true,
              text: "It will be moved to deleted bin!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, Delete It',
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: 'deleteStudentApplication',
                  method: 'get',
                  dataType: 'json',
                  data:{en_id:en_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Deleted',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        loadEnrolled();
                    }else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Action Failed',
                            text: res.message,
                            showConfirmButton: true
                        });
                        
                    }//end ifelse
                  }
                })//ajax end
              } 
            })

        })//end delete

   
       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
     }//end of success........
   });//end of ajax ................
  })
 
}

  //  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


  $('#enrolledByUser').click(function(){
    loadEnrolledByUser();
  })
function loadEnrolledByUser(){
  $('.content-div').load('pages/enrollment/enrollment_data.php', function(){
        let user = $('#user').val();
        let sy = $("#sy_ref").val();
        let sem = $("#sem_id").val();

        $('#title').removeClass();
        $('#title').text("Enrolled by User");
        $('#title').addClass("title-byUser");
        
        $.ajax({
          url: 'getEnrolledByUser',
          method: 'get',
          dataType: 'json',
          data: {user:user, sy:sy, sem:sem},
          beforeSend: function(){
            $('.spiner-div').show();
          $('.div-blur').show();
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
          $('.table-data-div').show();
            $('.data-div').show();
            // $('#expand_table').show();
            $('.tableStudent').off();
            $('.tableStudent').DataTable().clear().destroy();
            $('.tableStudent').DataTable({
              "data": data.en,
              "responsive": false,
              "scrollX": true,
              "autoWidth": true,
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
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.en_id+'" class="btn btn-primary btn-sm btn-xs view_student" title="view details">'+data.student_id+'</button>';
                  }
                },
                //  {"data": "student_id"},
                {"data": "enrollment_status"},
                {"data": "grade_level"},
                {"data": "student_lrn"},
                {"data": "last_name"},
                {"data": "first_name"},
                {"data": "middle_name"},
                {"data": "sex"},
                {"data": "birthdate"},
                {"data": "with_special_need"},
                {"data": "phone_no"},
                {"data": "tel_no"},
                {"data": "email_address"},
                {"data": "facebook_name"},
                {"data": "enrolled_at"},
                {
                  "data": "created_by",
                    visible: false,
                    searchable: false
                },
                {"data": "enrolled_by"},
                {"data": "remarks"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.en_id+'" class="btn btn-danger btn-sm btn-xs delete_student" title="delete student" style="vertical-align: middle;"><i class="fa fa-trash"></i> &nbsp;DEL</button>';
                  }
                }

              ]
            });//end of datatable
            //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

            $('.tableStudent').on('click', '.view_student', function(){
            loadTo = 6;
            let en_id = $(this).prop('id');

            // colored button when selected
            $('.view_student').removeClass('bg-warning');
            $(this).addClass('bg-warning');

            // highlight table row when clicked
            let table = $('.tableStudent').DataTable();
            $('.tableStudent tbody tr').removeClass('selected_row');
            table.row($(this).parents('tr').addClass('selected_row'));



            $(".data-div").stop();
            $('.data-div').hide().fadeOut(500);
            $('.data-div').load('pages/enrollment/each_student.php', function(){
              $('.table-data-div').removeClass('col-md-12');
              $('.table-data-div').addClass('col-md-4');
              $('.data-div').show();
              $('#expand_table').show();
              $('.en_id').val(en_id);
              $(".user_guide").hide();
              // $('.generate_pdf').hide();
              $(".readme_div").hide();
            })
          })

            $('.delete_student').click(function(){
              let en_id = $(this).prop('id');
              // console.log(en_id);
                Swal.fire({
                  title: 'Confirm Delete',
                  // showDenyButton: true,
                  text: "It will be moved to deleted bin!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, Delete It',
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      url: 'deleteStudentApplication',
                      method: 'get',
                      dataType: 'json',
                      data:{en_id:en_id},
                      success: function(res){
                        if(res.status == 1){
                          Swal.fire({
                                position: 'center',
                                icon: 'info',
                                title: 'Data Deleted',
                                text: 'Record has been deleted',
                                showConfirmButton: true
                            });
                            loadEnrolledByUser();
                        }else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Action Failed',
                                text: res.message,
                                showConfirmButton: true
                            });
                            
                        }//end ifelse
                      }
                    })//ajax end
                  } 
                })

            })
          //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
        }//end of success........
      });//end of ajax ................
    })
}
</script>
