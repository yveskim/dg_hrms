

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


.tableProgram{
  overflow-x: scroll;
}

.full-size{
  width: 100%;
}
/* ---------------------------------- */
</style>

<div class="row">
  <div class="col-12">
    <h1 class="title-text">Programs Data</h1>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-10">
      <h5>Program Table</h5>
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary full-size" id="addProgram" data-toggle="modal" data-target="#modalProgram">Add Program</button>
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover table-striped tableProgram compact table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Cat.</th>
            <th>Prog. Head</th>
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
<div class="modal fade" id="modalProgram">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Program</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="programForm"></form>
              <div class="section-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Program Title</label>
                    <input type="text" name="prog_title" class="form-control form-control-sm" form="programForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control form-control-sm" form="programForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Category</label>
                    <select name="cat_id" id="cat_id" class="form-control form-control-sm" form="programForm">
                    
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Program Logo</label>
                    <input type="file" name="prog_logo" class="form-control form-control-sm" form="programForm">
                  </div>
                </div>
                <hr>
            
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success form-control form-control-sm" form="programForm">
                  </div>
                </div>
              </div>
              <hr>

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>


<div class="modal fade" id="modalAssignPh">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Program Head Assigning (<span id="selected-prog"></span>)</h4>
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



              <div class="prog-info-div">
                <form id="assigningProgramHeadForm"></form>
                <input type="hidden" id="prog_id" name="prog_id" class="form-control form-control-sm" form="assigningProgramHeadForm">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Program Head</label>
                      <input type="text" readOnly id="emp_school_id" class="form-control form-control-sm">
                      <input type="hidden" id="ph_emp_id" name="ph_emp_id" class="form-control form-control-sm" form="assigningProgramHeadForm">
                    </div>
                  </div>
                  <hr>
          
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Memo No.</label>
                      <input type="text" name="memo_no" class="form-control form-control-sm" form="assigningProgramHeadForm">
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="">School Year</label>
                      <select name="sy_id" id="sy_id" class="form-control form-control-sm" form="assigningProgramHeadForm">
                      
                      </select>
                    </div>
                  </div>
                  <hr>
              
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success form-control form-control-sm" form="assigningProgramHeadForm">
                    </div>
                  </div>
              </div>
              <hr>

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>

  <script type="text/javascript">
  $(document).ready(function(){

    $('.spiner-div').hide();
    $('.div-blur').hide();
    
    loadProgram();

    $('#modalProgram').on('shown.bs.modal', function () {
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

  function loadProgram(){
    $.ajax({
      url: 'getPrograms',
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
      $('.tableProgram').off();
      $('.tableProgram').DataTable().clear().destroy();
         $('.tableProgram').DataTable({
           "data": data.prog,
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
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return '<p class="prog-title" id="'+data.program_title+'">'+data.program_title+'</p>';
                 }
             },
            //  {"data": "program_title"},
             {"data": "description"},
             {"data": "cat_title"}, 
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                  if(data.emp_id == null){
                    return '<p style="color: orange;">No Program Head Selected!</p>';
                  }else{
                    return '<p>'+data.emp_lname+', '+data.emp_fname+' '+data.emp_mname+'</p>';
                  }
                 }
             },
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.prog_id+'" class="fa fa-eye btn btn-primary btn-sm details" title="view details"></button>'+
                        '<button type="button" id="'+data.prog_id+'" class="fa fa-user btn btn-success btn-sm assign_ph" title="assign program head" data-toggle="modal" data-target="#modalAssignPh"></button>'+
                        '<button type="button" id="'+data.prog_id+'" class="fa fa-minus-square btn btn-warning btn-sm removeProgramHead" title="remove program head"></button>';
               }
             }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         $('.assign_ph').click(function(){
            let prog = $(this).closest('tr').find('.prog-title').prop('id');
            let prog_id = $(this).prop('id');

            $('#selected-prog').text(prog);
            $('#prog_id').val(prog_id);
        })

         $('.removeProgramHead').click(function(){
          // alert($(this).prop('id'));
          // TODO:
          let prog_id = $(this).prop('id');
          $.ajax({
            url: 'removeProgramHead',
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
              if(data.status === 1){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Deleted',
                    text: data.message,
                    showConfirmButton: true
                })
                loadProgramData();
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
          let prog_id = $(this).prop('id');
          $('.content-div').load('pages/program/each_program.php', function(){
            // alert(prog_id);
            $('#prog_id_details').val(prog_id);
          })
        })



     }//end of success........
   });//end of ajax ................
}


$('#programForm').submit(function(event){
  event.preventDefault();
  let formData = new FormData(this);
  $.ajax({
        url: 'setProgram',
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
          $('#modalProgram').modal('toggle');
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
                  text: 'Program added successfuly',
                  showConfirmButton: false,
                  timer: 1500
              });
              loadProgram();
          }
          else {
              Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: "Something went wrong!",
                  showConfirmButton: false,
                  timer: 1500
              });
              

          }//end ifelse
        }// end of success ...................
      });//end of ajax ..................
});



$('#modalAssignPh').on('shown.bs.modal', function () {
  $('.sel-emp-div').show(function(){
    $('.prog-info-div').hide();
    loadFacultyNotPh();
  })
})

$('#modalAssignPh').on('hidden.bs.modal', function () {
    $('.prog-info-div').hide();
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
                        '<button type="button" id="'+data.emp_id+'" class="btn btn-success btn-sm select-faculty" title="select" style="height: 1.5rem; font-size: .8rem; padding:0.2rem;"><i class="fa fa-check">&nbsp;SELECT</i></button>';
               }
             }
           ]
         });//end of datatable
          $('.select-faculty').click(function(){
            let school_id = $(this).closest('tr').find('.school_id').prop('id');
            let ph_emp_id = $(this).prop('id');
            // alert(school_id);
            $('.prog-info-div').show(function(){
              $('#emp_school_id').val(school_id);
              $('#ph_emp_id').val(ph_emp_id);
              
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


$('#assigningProgramHeadForm').submit(function(event){
  event.preventDefault();
  let sy_id_ref = $('#sy_ref').val();
  let prog_id = $('#prog_id').val();
  let formData = new FormData(this);
  formData.append('sy_id_ref', sy_id_ref);
  formData.append('prog_id', prog_id);
  $.ajax({
        url: 'assignProgramHead',
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
          $('#modalAssignPh').modal('toggle');
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
                  text: 'Program added successfuly',
                  showConfirmButton: false,
                  timer: 1500
              });
              loadProgram();
          }else if (res.status == 2) {
              Swal.fire({
                  position: 'center',
                  icon: 'warning',
                  title: 'Invalid Action',
                  text: 'The Program selected already has program head, choose another program or remove the current program head',
                  showConfirmButton: true
              });
              loadProgram();
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
