

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
    font-size: .7rem;
  }

  /* ----------------------------------------------------- */

/* radio button large */
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


.tableDepartment{
  overflow-x: scroll;
}

.full-size{
  width: 100%;
}
/* ---------------------------------- */
</style>

<div class="row">
  <div class="col-12">
    <h1 class="title-text">Departments Data</h1>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-10">
      <h5>Department Table</h5>
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary full-size" id="addDepartment" data-toggle="modal" data-target="#modalDepartment">Add Department</button>
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover table-striped tableDepartment compact table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Location</th>
            <th>Cat.</th>
            <th>Dept. Head</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
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
<div class="modal fade" id="modalDepartment">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Department</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="deptForm"></form>
              <div class="section-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="form-label">Department Title</label>
                    <input type="text" name="dept_title" class="form-control form-control-sm" form="deptForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control form-control-sm" form="deptForm">
                  </div>
                </div>
                <hr>
                <div class="row mb-6">
                  <div class="col-md-12">
                    <label for="">Category</label>
                    <select name="cat_id" id="cat_id" class="form-control form-control-sm" form="deptForm">
                    
                    </select>
                  </div>
                </div>
                <hr><br><br>
            
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success form-control form-control-sm" form="deptForm">
                  </div>
                </div>
              </div>

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>


<div class="modal fade" id="modalAssignDeptHead">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Department Head Assigning (<span id="selected-dept"></span>)</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              
              <div class="row sel-emp-div">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <center><h4 class="bg-primary" style="color: white; font-weight: bold; padding: 2% 0 2% 0;">Select Faculty</h4></center> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                    <table class="table table-stripped table-bordered table-compact compact table-hover tbl_faculty table-sm" style="width: 100%; white-space: nowrap;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Emp. ID</th>
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
              </div>



              <div class="dept-info-div">
                <form id="assigningDepartmentHeadForm"></form>
                <input type="text" id="dept_id_ref" name="dept_id_ref" class="form-control form-control-sm" form="assigningDepartmentHeadForm">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Department Head</label>
                      <input type="text" readOnly id="emp_school_id" class="form-control form-control-sm">
                      <input type="text" id="head_id" name="head_id" class="form-control form-control-sm" form="assigningDepartmentHeadForm">
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Title</label>
                      <select name="dept_head_title" id="dept_head_title" class="form-control form-control-sm" form="assigningDepartmentHeadForm">
                          <option value="">--select--</option>
                          <option value="Official">Official</option>
                          <option value="OIC">OIC</option>
                      </select>
                    </div>
                  </div>
                  <hr>

          
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Memo No.</label>
                      <input type="text" name="memo_no" class="form-control form-control-sm" form="assigningDepartmentHeadForm">
                    </div>
                  </div>
                  <hr>

                  <div class="row mb-6">
                    <div class="col-md-12">
                      <label for="">School Year</label>
                      <select name="sy_id" id="sy_id" class="form-control form-control-sm" form="assigningDepartmentHeadForm">
                      
                      </select>
                    </div>
                  </div>
                  <hr>
              
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success form-control form-control-sm" form="assigningDepartmentHeadForm">
                    </div>
                  </div>
              </div>

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>

  <script type="text/javascript">
  $(document).ready(function(){

    $('.spiner-div').hide();
    $('.div-blur').hide();
    
    loadDepartment();

    $('#modalDepartment').on('shown.bs.modal', function () {
        getCategory();
    })
  })

  function getCategory(){
    $.ajax({
      url: 'getCategory',
      method: 'get',
      dataType: 'json',
      success: function(data){
        $('#cat_id').empty();
        $('#cat_id').append('<option value="">---select---</option>');
        $.each(data.cat, function(key, val){
          $('#cat_id').append('<option value="'+val.cat_id+'">'+val.cat_title+'</option>');
        })
      }
    })
  }

  function loadDepartment(){
    $.ajax({
      url: 'getDepartments',
      method: 'get',
      dataType: 'json',
      beforeSend: function(){
        $('.spiner-div').show();
        $('.div-blur').show();
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();
     },

     success: function(data){
      // console.log(data);
      $('.tableDepartment').off();
      $('.tableDepartment').DataTable().clear().destroy();
         $('.tableDepartment').DataTable({
           "data": data.dept,
           "responsive": false,
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
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return '<p class="dept-title" id="'+data.dept_title+'">'+data.dept_title+'</p>';
                 }
             },
             {"data": "dept_location"},
             {"data": "cat_title"}, 
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                    if(data.emp_id == null){
                      return '<p style="color: orange;">No Department Head Selected!</p>';
                    }else{
                      return '<p>'+data.emp_lname+', '+data.emp_fname+' '+data.emp_mname+'</p>';
                    }
                 }
             },
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.dept_id+'" class="fa fa-eye btn btn-primary btn-sm details" title="view details"></button>'+
                        '<button type="button" id="'+data.dept_id+'" class="fa fa-user btn btn-success btn-sm assign_dh" title="assign department head" data-toggle="modal" data-target="#modalAssignDeptHead"></button>'+
                        '<button type="button" id="'+data.dept_id+'" class="fa fa-minus-square btn btn-warning btn-sm removeDeptHead" title="remove department head"></button>';
               }
             }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         $('.assign_dh').click(function(){
            let dept = $(this).closest('tr').find('.dept-title').prop('id');
            let dept_id = $(this).prop('id');
            // alert(dept_id);
            $('#selected-dept').text(dept);
            $('#dept_id_ref').val(dept_id);

        })

         $('.removeDeptHead').click(function(){
          // alert($(this).prop('id'));
          let dept_id = $(this).prop('id');
          $.ajax({
            url: 'removeDepartmentHead',
            method: 'get',
            dataType: 'json',
            data: {dept_id:dept_id},
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
                    title: 'Department Head Removed.',
                    text: data.message,
                    showConfirmButton: true
                })
                loadDepartmentData();
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
          let dept_id = $(this).prop('id');
          $('.content-div').load('pages/department/each_department.php', function(){
            // alert(dept_id);
            $('#dept_id_details').val(dept_id);
          })
        })

     }//end of success........
   });//end of ajax ................
}


$('#deptForm').submit(function(event){
  event.preventDefault();
  let formData = new FormData(this);
  $.ajax({
        url: 'setDepartment',
        type: "post",
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
          $('#modalDepartment').modal('toggle');
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        },
        success: function(res){
          console.log(res);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Action Successfull',
                  text: 'Department added successfuly',
                  showConfirmButton: true
              });
              loadDepartment();
          }
          else {
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
});



$('#modalAssignDeptHead').on('shown.bs.modal', function () {
  $('.sel-emp-div').show(function(){
    $('.dept-info-div').hide();
    loadFacultyNotPh();
  })
})

$('#modalAssignDeptHead').on('hidden.bs.modal', function () {
    $('.dept-info-div').hide();
    $('.sel-emp-div').hide();
})

function loadFacultyNotPh(){
    let sy_id = $('#sy_ref').val();
    $.ajax({
      url: 'getFacultyNotPh',
      method: 'get',
      dataType: 'json',
      data: {sy_id: sy_id},
      success: function(data){
        $('.tbl_faculty').off();
        $('.tbl_faculty').DataTable().clear().destroy();
         $('.tbl_faculty').DataTable({
           "data": data.faculty,
          //  "responsive": true,
           "scrollX": true,
           "scrollY": 300,
           "ordering": true,
           "select": false,
           "paging": false,
           "autoWidth": false,
           "destroy" : true,
           "language": {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            "dom": '<"wrapper"flipt>',
		      //  "dom": 'lBfrtip',
			    //  "buttons": [
				  //     'copy', 'csv', 'excel', 'pdf', 'print'
			    //   ],
           "columns": [
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;
                 }
             },
             {"data": "emp_school_id"},
             {"data": "emp_lname"},
             {"data": "emp_fname"},
             {"data": "emp_mname"},
             {
               "data": null,
                render: function(data, type, row) {
                return  '<input type="hidden" id="'+data.emp_school_id+' - '+data.emp_lname+', '+data.emp_fname+'" class="school_id" >'+
                        '<button type="button" id="'+data.emp_id+'" class="btn btn-success btn-sm select-faculty" title="select" style="height: 1.5rem; font-size: .8rem; padding:0.2rem;"><i class="fa fa-check">&nbsp;SELECT </i></button>';
               }
             }
           ]
         });//end of datatable
          $('.select-faculty').click(function(){
            let school_id = $(this).closest('tr').find('.school_id').prop('id');
            let dh_emp_id = $(this).prop('id');
            // alert(school_id);
            $('.dept-info-div').show(function(){
              $('#emp_school_id').val(school_id);
              $('#head_id').val(dh_emp_id);
              
              $.ajax({
                url: 'getSchoolYear',
                method: 'get',
                dataType: 'json',
                success: function(data){
                  console.log(data);
                  $('#sy_id').empty();
                  $('#sy_id').append('<option value="">---select---</option>');
                  $.each(data.sy, function(key, val){
                    $('#sy_id').append('<option value="'+val.sy_id+'">'+val.school_year+'</option>');
                  })
                }
              })

            })
            $('.sel-emp-div').hide();
          })
      }

    
    })
}


$('#assigningDepartmentHeadForm').submit(function(event){
  event.preventDefault();
  let sy_id_ref = $('#sy_ref').val();
  let formData = new FormData(this);
  formData.append('sy_id_ref', sy_id_ref);
  $.ajax({
        url: 'assignDepartmentHead',
        type: "post",
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
          $('#modalAssignDeptHead').modal('toggle');
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        },
        success: function(res){
          console.log(res);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Action Successfull',
                  text: 'Department added successfuly',
                  showConfirmButton: false,
                  timer: 1500
              });
              loadDepartment();
          }else if (res.status == 2) {
              Swal.fire({
                  position: 'center',
                  icon: 'warning',
                  title: 'Invalid Action',
                  text: 'The Department selected already has department head, choose another department or remove the current department head',
                  showConfirmButton: true
              });
              loadDepartment();
          }else {
              Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: res.message,
                  showConfirmButton: false,
                  timer: 21500
              });
              

          }//end ifelse
        }// end of success ...................
      });//end of ajax ..................
});




</script>
