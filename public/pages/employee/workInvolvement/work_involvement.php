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
            <form class="" action="#" method="post" id="workInvolvementForm"></form>
              <div class="row">
                <div class="col-9">
                    <h4>VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</h4>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-info" id="btnWorkInvolvement" type="button" name="button"
                    form="workInvolvementForm" data-toggle="modal" data-target="#workInvolvementModal">Add Work Involvement</button>
                  </div>
                </div>
            </div><hr>

            <div class="row">
              <div class="col-12">
                <table class="table table-bordered stripe tableWorkInvolvement compact table-sm">
                  <thead>
                    <tr>
                      <th width="40%">Name and Address of Org.</th>
                      <th>Date From</th>
                      <th>Date To</th>
                      <th>Total Hours</th>
                      <th>Position/Nature of Work</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>


          <div class="modal fade" id="workInvolvementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Work Involvement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <input type="hidden" name="empWorkInvolvementId" id="empWorkInvolvementId" value="" form="workInvolvementForm">
                        <div class="col-10">
                          <label>Name and Address of Org.</label>
                          <input class="form-control form-control-sm" name="organization" id="organization" type="text" form="workInvolvementForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-3">
                          <label>Date From</label>
                          <input class="form-control form-control-sm" name="date_from" id="date_from" type="date" form="workInvolvementForm">
                        </div>
                        <div class="col-3">
                          <label>Date To</label>
                          <input class="form-control form-control-sm" name="date_to" id="date_to" type="date" form="workInvolvementForm">
                        </div>
                        <div class="col-3">
                          <label>Total Hours</label>
                          <input class="form-control form-control-sm" name="total_hours" id="total_hours" type="text" form="workInvolvementForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-8">
                          <label>Position/Nature of Work</label>
                          <input class="form-control form-control-sm" name="position" id="position" type="text" form="workInvolvementForm">
                        </div>
                      </div>
                      <br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveWorkInvolvement" form="workInvolvementForm">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>


<script type="text/javascript">
$(document).ready(function(){
  saveWorkInvolvement();
   loadWorkInvolvement();

});

function loadWorkInvolvement(){
  var empId = $('#empWorkInvolvementId').val();
//  console.log(empId);
  $.ajax({
   url: 'admin/loadWorkInvolvement',
   method: 'get',
   dataType: 'json',
   data: {empId: empId},
   success: function(data){
    // console.log(response);
     $('.tableWorkInvolvement').DataTable({
       "data": data.involvement,
       "scrollX": true,
       "columns": [
         {"data": "work_inv_name_and_address"},
         {"data": "work_inv_date_from"},
         {"data": "work_inv_date_to"},
         {"data": "work_inv_hours"},
         {"data": "work_inv_position"},
         {
           "data": null,
           render: function(data, type, row) {
           return '<i class="fa fa-edit btn btn-info btn-xs view" value='+data.work_inv_id +' type="button"></i>'+
                  '<i class="fa fa-trash btn btn-danger btn-xs view" value='+data.work_inv_id +' type="button"></i>';
           }
         }
       ]
     });
   }
 });

}

function saveWorkInvolvement(){
  $('#workInvolvementForm').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'admin/insertWorkInvolvement',
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

        $('#workInvolvementModal').modal('hide');
        $('.modal-backdrop').remove();
        $('#workInvolvement').load('pages/employee/workInvolvement/work_involvement.php');
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
