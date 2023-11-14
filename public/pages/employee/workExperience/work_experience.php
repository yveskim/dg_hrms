<style media="screen">
  .btn-group-xs > .btn, .btn-xs {
    padding: .45rem .2rem;
    font-size: .675rem;
    line-height: .5;
    border-radius: .2rem;
  }
</style>

      <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="personalInfo">
            <form class="" action="#" method="post" id="workExpForm"></form>
              <div class="row">
                <div class="col-9">
                    <h4>Work Experience</h4>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-info" id="btnWorkExp" type="button" name="button"
                    form="workExpForm" data-toggle="modal" data-target="#workExpModal">Add Work Exp</button>
                  </div>
                </div>
            </div><hr>

            <div class="row">
              <div class="col-12">
                <table class="table table-bordered stripe tableWorkExperience compact table-sm">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Date From</th>
                      <th>Date To</th>
                      <th>Position Title</th>
                      <th>Agency/Company</th>
                      <th>Monthly Salary</th>
                      <th>Salary Grade</th>
                      <th>Appointment status</th>
                      <th>Gov't Service</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>


          <div class="modal fade" id="workExpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Work Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <input type="hidden" name="work_exp_id" id="work_exp_id" value="" form="workExpForm">
                        <!--
                        added input edit to check if the submition is edit or insert
                        -->
                        <input type="hidden" name="edit-workExp" id="edit-workExp" value="" form="workExpForm">
                        <div class="col-3">
                          <label>Date From</label>
                          <input class="form-control form-control-sm" name="date_from" id="date_from" type="date" form="workExpForm">
                        </div>
                        <div class="col-3">
                          <label>Date To</label>
                          <input class="form-control form-control-sm" name="date_to" id="date_to" type="date" form="workExpForm">
                        </div>
                        <div class="col-6">
                          <label>Position Title</label>
                          <input class="form-control form-control-sm" name="position" id="position" type="text" form="workExpForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-6">
                          <label>Agency/Company</label>
                          <input class="form-control form-control-sm" name="company" id="company" type="text" form="workExpForm">
                        </div>
                        <div class="col-3">
                          <label>Monthly Salary</label>
                          <input class="form-control form-control-sm" name="salary" id="salary" type="text" form="workExpForm">
                        </div>
                        <div class="col-3">
                          <label>Salary Grade</label>
                          <input class="form-control form-control-sm" name="salaryGrade" id="salaryGrade" type="text" form="workExpForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-4">
                          <label>Appointment Status</label>
                          <select class="form-control form-control-sm form-select" id="appointmentStatus" name="appointmentStatus" form="workExpForm" >
                            <option value=""></option>
                            <option value="Permanent">Permanent</option>
                            <option value="Probationary">Probationary</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Job Order">Job Order</option>
                            <option value="Temporary Replacement">Temporary Replacement</option>
                            <option value="OJT">OJT</option>
                          </select>
                        </div>
                        <div class="col-3">
                          <label>Government Service</label>
                          <select  class="form-control form-control-sm form-select" id="govService" name="govService" form="workExpForm" >
                            <option value=""></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveWorkExp" form="workExpForm">Save</button>
                        <button type="button" class="btn btn-secondary btn-close-modal" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>


<script type="text/javascript">
$(document).ready(function(){

    saveWorkExperience();
   loadWorkExperience();

   $('#edit-workExp').val("false");
   $('.btn-close-modal').click(function(){
     $('#edit-elig').val("false");
     $('body').removeClass('modal-open');
     $('.modal-backdrop').remove();
     $('#workExperience').load('pages/employee/workExperience/work_experience.php');
   });

});

function loadWorkExperience(){
  var empId = $('#empWorkExpId').val();
//  console.log(empId);
  $.ajax({
   url: 'admin/loadWorkExperience',
   method: 'get',
   dataType: 'json',
   data: {empId: empId},
   success: function(data){
     $('.tableWorkExperience').DataTable({
       "data": data.work,
       "scrollX": true,
       "columns": [
         {"data": "work_exp_id"},
         {"data": "work_exp_date_from"},
         {"data": "work_exp_date_to"},
         {"data": "work_exp_position"},
         {"data": "work_exp_company"},
         {"data": "work_exp_monthly_sal"},
         {"data": "work_exp_salary_grade"},
         {"data": "work_exp_appointment_status"},
         //----->>>>display the boolean result as string
         {
          "data": null,
          render: function ( data, type, row, meta ) {
             if (data.work_exp_gov_service == 1) {
               return 'Yes' ;
             }else {
               return 'No' ;
             }
           }
         },
        //<<<<--------

         {
           "data": null,
           render: function(data, type, row) {
           return '<i class="fa fa-edit btn btn-info btn-xs edit" value='+data.work_exp_id+' type="button"></i>'+
                  '<i class="fa fa-trash btn btn-danger btn-xs delete" value='+data.work_exp_id+' type="button"></i>';
           }
         }
       ]
     });

     var table = $('.tableWorkExperience').DataTable();
     $('.edit').click(function(){
       $('.tableWorkExperience').on('click', 'tr',  function(){
         var data = table.row( this ).data();
           var workId = data['work_exp_id'];
        //   console.log( eligId );
            $.ajax({
              url: 'admin/editWorkExp',
              type: 'get',
              dataType: 'json',
              data: {workId: workId},
              success: function(response){
                $('#workExpModal').modal('show');
                $('#edit-workExp').val("true");
                $.each(response.work, function(key, value) {
                  $('#work_exp_id').val(value.work_exp_id );
                  $('#date_from').val(value.work_exp_date_from);
                  $('#date_to').val(value.work_exp_date_to);
                  $('#position').val(value.work_exp_position);
                  $('#company').val(value.work_exp_company);
                  $('#salary').val(value.work_exp_monthly_sal);
                  $('#salaryGrade').val(value.work_exp_salary_grade);
                  $("#appointmentStatus option[value='" + value.work_exp_appointment_status + "']").attr("selected","selected");
                  $("#govService option[value='" + value.work_exp_gov_service + "']").attr("selected","selected");
                });
              }
            });//ajax end
       });//table click end
     });
   },
   complete: function(){
     $('.delete').click(function(){
       var table = $('.tableWorkExperience').DataTable();
          $('.tableWorkExperience').on('click', 'tr',  function(){
              var data = table.row( this ).data();
              //console.log( data['emp_id'] );
              var workId = data['work_exp_id'];
              if (confirm('Are you sure you want to delete id '+data['work_exp_id']+' ?')) {
                $.ajax({
                  url: 'admin/deleteWorkExp',
                  method: 'post',
                  dataType: 'json',
                  data: {workId: workId},
                  success: function(response){
                      if (response.status == 0) {
                        alert("can't delete the row");
                        errorToast(response.message);
                      }else {
                        deleteToast(response.message);
                        $('#workExperience').load('pages/employee/workExperience/work_experience.php');
                      }
                  }
                });
              }else {
                   $('#workExperience').load('pages/employee/workExperience/work_experience.php');
              }
          });
     });
   }

 });

}

function saveWorkExperience(){
  $('#workExpForm').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'admin/insertWorkExperience',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){

        if (response.status == 0) {
          errorToast(response.message);
        }else {
          succToast(response.message);
        }

        $('#workExpModal').modal('hide');
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
        $('#edit-workExp').val("false");
        $('#workExperience').load('pages/employee/workExperience/work_experience.php');
      }
    });
  });
}



function succToast(msg){
  //resetToastPosition();
  $.toast({
    heading: 'Data Saved Successfully',
    text: msg,
    showHideTransition: 'slide',
    icon: 'success',
    loderBg: '#f96868',
    position: 'top-right',
    hideAfter: 5000
  });
}

function errorToast(msg){
//  resetToastPosition();
  $.toast({
    heading: 'Action Failed',
    text: msg,
    showHideTransition: 'slide',
    icon: 'error',
    loderBg: '#f2a654',
    position: 'top-right'
  });
}


function deleteToast(msg){
//  resetToastPosition();
  $.toast({
    heading: 'Action Successfull',
    text: msg,
    showHideTransition: 'slide',
    icon: 'error',
    loderBg: '#f2a654',
    position: 'top-right'
  });
}

function dataExistToast(msg){
//  resetToastPosition();
  $.toast({
    heading: 'Update Successfull',
    text: msg,
    showHideTransition: 'slide',
    icon: 'info',
    loderBg: '#f2a654',
    position: 'top-right'
  });
}
</script>
