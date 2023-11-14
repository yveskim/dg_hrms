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
            <form class="" action="#" method="post" id="learningAndDevelopmentForm"></form>
              <div class="row">
                <div class="col-9">
                    <h4>VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED</h4>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-info" id="btnLandD" type="button" name="button"
                    form="learningAndDevelopmentForm" data-toggle="modal" data-target="#learningAndDevelopmentModal">Add Learning and Development</button>
                  </div>
                </div>
            </div><hr>

            <div class="row">
              <div class="col-12">
                <table class="table table-bordered stripe tableLD compact table-sm">
                  <thead>
                    <tr>
                      <th>Title LD/Training Programs</th>
                      <th>Date From</th>
                      <th>Date To</th>
                      <th>Total Hours</th>
                      <th>Type of LD</th>
                      <th>Conducted/Sponsored By</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>


          <div class="modal fade" id="learningAndDevelopmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Learning And Development</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <input type="hidden" name="learningAndDevelopmentId" id="learningAndDevelopmentId" value="" form="learningAndDevelopmentForm">
                        <div class="col-10">
                          <label>Title LD/Training Programs</label>
                          <input class="form-control form-control-sm" name="title" id="title" type="text" form="learningAndDevelopmentForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-3">
                          <label>Date From</label>
                          <input class="form-control form-control-sm" name="date_from" id="date_from" type="date" form="learningAndDevelopmentForm">
                        </div>
                        <div class="col-3">
                          <label>Date To</label>
                          <input class="form-control form-control-sm" name="date_to" id="date_to" type="date" form="learningAndDevelopmentForm">
                        </div>
                        <div class="col-3">
                          <label>Total Hours</label>
                          <input class="form-control form-control-sm" name="total_hours" id="total_hours" type="text" form="learningAndDevelopmentForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-4">
                          <label>Type of LD</label>
                          <select class="form-control form-control-sm form-select" id="type" name="type" form="learningAndDevelopmentForm" >
                            <option value=""></option>
                            <option value="Technical">Technical</option>
                            <option value="Supervisory">Supervisory</option>
                            <option value="Managerial">Managerial</option>
                          </select>
                        </div>
                        <div class="col-6">
                          <label>Conducted/Sponsored By</label>
                          <input class="form-control form-control-sm" name="conducted" id="conducted" type="text" form="learningAndDevelopmentForm">
                        </div>
                      </div>
                      <br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveLD" form="learningAndDevelopmentForm">Save</button>
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
   saveLD();
   loadLD();

});

function loadLD(){
  var empId = $('#empLearningAndDevelopmentId').val();
//  console.log(empId);
  $.ajax({
   url: 'admin/loadLD',
   method: 'get',
   dataType: 'json',
   data: {empId: empId},
   success: function(data){
    // console.log(response);
     $('.tableLD').DataTable({
       "data": data.ld,
       "scrollX": true,
       "columns": [
         {"data": "ld_training_program"},
         {"data": "ld_date_from"},
         {"data": "ld_date_to"},
         {"data": "ld_total_hours"},
         {"data": "ld_type"},
         {"data": "ld_conducted_by"},
         {
           "data": null,
           render: function(data, type, row) {
           return '<i class="fa fa-edit btn btn-info btn-xs view" value='+data.ld_id  +' type="button"></i>'+
                  '<i class="fa fa-trash btn btn-danger btn-xs view" value='+data.ld_id  +' type="button"></i>';
           }
         }
       ]
     });
   }
 });

}

function saveLD(){
  $('#learningAndDevelopmentForm').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'admin/insertLD',
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

        $('#learningAndDevelopmentModal').modal('hide');
        $('.modal-backdrop').remove();
        $('#learningAndDevelopment').load('pages/employee/learningAndDevelopment/learning_and_development.php');
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
