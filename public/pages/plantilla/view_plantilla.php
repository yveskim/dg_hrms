

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


.tableVacantPlantilla{
  overflow-x: scroll;
}

.full-size{
  width: 100%;
}
/* ---------------------------------- */
</style>

<div class="row">
  <div class="col-12">
    <h1 class="title-text">Plantilla Module</h1>
  </div>
</div>
<hr>


<div class="data-div">

  <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#vacant_plantilla" class="nav-link active" aria-controls="vacant_plantilla" role="tab" data-toggle="tab">Vacant Plantilla</a></li>
                        <li role="presentation"><a href="#assigned_plantilla" id="assigned_plantillaTab" class="nav-link" aria-controls="assigned_plantilla" role="tab" data-toggle="tab">Assigned Plantilla</a></li>
                        <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
                    </ul><hr class="hrTab">

                    <!-- Tab panes -->

                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="vacant_plantilla">
                          <form class="form" action="#" method="post" id="edit-form"></form>
                          <div class="row">
                            <div class="col-10">
                              <h4>Vacant Plantilla</h4>
                            </div>
                            <div class="col-2">
                            <button class="btn btn-primary full-size" id="addProgram" data-toggle="modal" data-target="#modalPlantilla">Add Plantilla</button>
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover tableVacantPlantilla compact table-sm" style="white-space: nowrap;">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Plantilla Item No.</th>
                                      <th>Salary Grade</th>
                                      <th>Monthly Salary</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                </table>
                            </div>
                        </div>
                      </div>
                        
                      <div role="tabpanel" class="tab-pane" id="assigned_plantilla">

                      </div>

                      <div role="tabpanel" class="tab-pane" id="others">

                      </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- _____________________________________________________________________________________ -->




<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<div class="modal fade" id="modalPlantilla">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Plantilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="plantillaForm"></form>
              <div class="section-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Plantilla Title</label>
                    <input type="text" name="plantilla_title" class="form-control form-control-sm" form="plantillaForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Plantilla item no.</label>
                    <input type="text" name="plantill_item_no" class="form-control form-control-sm" form="plantillaForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Salary Grade</label>
                    <input type="text" name="salary_grade" class="form-control form-control-sm" form="plantillaForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Monthly Salary</label>
                    <input type="text" name="monthly_salary" class="form-control form-control-sm" form="plantillaForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success full-size" form="plantillaForm">
                  </div>
                </div>
            </div>
            <!-- end of modal body -->

          </div>
      </div>
  </div>
</div>



<div class="modal fade" id="modalAssign">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Assign Plantilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
              <input type="hidden" id="plant_id_ref">
                <div class="row emp_div">
                  <div class="col-md-12">
                    <table class="table table-hover table-bordered table-sm tableEmp" style="width: 100%; white-space:nowrap;">
                      <thead>
                        <tr>
                          <td>#</td>
                          <td>School ID</td>
                          <td>Last Name</td>
                          <td>First Name</td>
                          <td>Middle Int.</td>
                          <td>Gender</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>

                <div class="form-status">
                  <form id="empStatForm"></form>
                  <input type="hidden" id="emp_id_ref" name="emp_id_ref" form="empStatForm">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Employment Status</label>
                      <select class="form-control form-control-sm" name="e_status" form="empStatForm">
                        <option value="">---status---</option>
                        <option value="Permanent">Permanent</option>
                        <option value="Job Order">Job Order</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Probationary">Probationary</option>
                        <option value="Special Order">Special Order</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label for="">Step</label>
                      <select class="form-control form-control-sm" name="step" form="empStatForm">
                        <option value="">---step---</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Category</label>
                      <select class="form-control form-control-sm" name="cat_id" id="cat_id" form="empStatForm">

                      </select>
                    </div>

                    <div class="col-md-6">
                      <label for="">Date Assigned</label>
                      <input type="date" class="form-control form-control-sm" name="date_assigned" form="empStatForm">
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                      <input type="submit" name="submit" class="btn btn-success full-size" form="empStatForm">
                    </div>
                  </div>
                </div>


            


            </div>
            <!-- end of modal body -->

          </div>
      </div>
  </div>
</div>





  <script type="text/javascript">
  $(document).ready(function(){

    $('.spiner-div').hide();
    $('.div-blur').hide();
    
    loadAllPlantilla();

    $('#modalPlantilla').on('shown.bs.modal', function () {
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

  function loadAllPlantilla(){
    $.ajax({
      url: 'getAllPlantilla',
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
      $('.tableVacantPlantilla').off();
      $('.tableVacantPlantilla').DataTable().clear().destroy();
         $('.tableVacantPlantilla').DataTable({
           "data": data.plant,
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
             {"data": "plantilla_title"},
             {"data": "plantilla_item_no"},
             {"data": "salary_grade"}, 
             {"data": "monthly_salary"}, 
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" data-toggle="modal" data-target="#modalAssign" id="'+data.plant_id+'" class="fa fa-user btn btn-success btn-sm assign_to_emp" title="assign to employee" style="padding-bottom: 0.2rem; padding-top: 0.2rem;" >ASSIGN</button>';
               }
             }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         $('.assign_to_emp').click(function(){
            let plant_id = $(this).prop('id');
            $('#plant_id_ref').val(plant_id);
         })

   
     }//end of success........
   });//end of ajax ................
}


$('#plantillaForm').submit(function(event){
  event.preventDefault();
  let formData = new FormData(this);
  $.ajax({
        url: 'addPlantilla',
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
          $('#modalPlantilla').modal('toggle');
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        },
        success: function(res){
          // console.log(res);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Action Successfull',
                  text: 'Plantilla added successfuly',
                  showConfirmButton: true
              });
              loadAllPlantilla();
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

$('#modalAssign').on('shown.bs.modal', function () {
    $('.form-status').hide();
    $('.emp_div').show(function(){
      loadAllEmp();
    })
})

$('#modalAssign').on('hidden.bs.modal', function () {
    $('.form-status').hide();
    $('.emp_div').hide();
})

function loadAllEmp(){
    // let sy_id = $('#sy_ref').val();
    $.ajax({
      url: 'getAllActiveEmpNoPlantilla',
      method: 'get',
      dataType: 'json',
      // data: {sy_id: sy_id},
      success: function(data){
        $('.tableEmp').off();
        $('.tableEmp').DataTable().clear().destroy();
         $('.tableEmp').DataTable({
           "data": data.emp,
          //  "responsive": true,
           "scrollX": true,
           "scrollY": true,
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
             {"data": "emp_gender"},
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.emp_id+'" class="btn btn-success btn-sm select-emp" title="select" style="height: 1.5rem; font-size: .8rem; padding:0.2rem;"><i class="fa fa-check">&nbsp;SELECT</i></button>';
               }
             }
           ]
         });//end of datatable
          $('.select-emp').click(function(){
            let emp_id = $(this).prop('id');
            // alert(emp_id);
            $('#emp_id_ref').val(emp_id);
            // let school_id = $(this).closest('tr').find('.school_id').prop('id');
            $('.form-status').show(function(){
              getCategory();
            })
            $('.emp_div').hide();
            $('.prog-info-div').show(function(){
              // $('#emp_id_ref').val(emp_id);
            })
            $('.sel-emp-div').hide();
          })
      }

    
    })
}


$('#empStatForm').submit(function(event){
  event.preventDefault();
    let plant_id = $('#plant_id_ref').val();
    let formData = new FormData(this);
    formData.append('plant_id', plant_id);
    $.ajax({
      url: 'setEmpStatus',
      method: 'post',
      dataType: 'json',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      complete: function(){
        $('#modalAssign').modal('toggle');
      },
      success: function(res){
        // console.log(res);
        if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Action Successfull',
                  text: 'Employment Status Added Successfully',
                  showConfirmButton: true
              });
              loadAllPlantilla();
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
      }
    })
})



</script>
