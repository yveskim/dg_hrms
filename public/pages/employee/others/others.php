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
            <form class="" action="#" method="post" id="othersForm"></form>
              <div class="row">
                <div class="col-9">
                    <h4>OTHER INFORMATION</h4>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-info" id="btnOthers" type="button" name="button"
                    form="othersForm" data-toggle="modal" data-target="#othersModal">Add Other Info</button>
                  </div>
                </div>
            </div><hr>

            <div class="row">
              <div class="col-12">
                <table class="table table-bordered stripe tableOthers compact table-sm">
                  <thead>
                    <tr>
                      <th>Special Skills and Hobbies</th>
                      <th>Non-Academic Distinctions/Recognition</th>
                      <th>Membership in Association/Organization</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>


          <div class="modal fade" id="othersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Other Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <input type="hidden" name="otherId" id="otherId" value="" form="othersForm">
                        <div class="col-8">
                          <label>Special Skills and Hobbies</label>
                          <input class="form-control form-control-sm" name="special_skills" id="special_skills" type="text" form="othersForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-8">
                          <label>Non-Academic Distinctions/Recognition</label>
                          <input class="form-control form-control-sm" name="recognition" id="recognition" type="text" form="othersForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-8">
                          <label>Membership in Association/Organization</label>
                          <input class="form-control form-control-sm" name="organization" id="organization" type="text" form="othersForm">
                        </div>
                      </div>
                      <br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveOthers" form="othersForm">Save</button>
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
   saveOthers();
   loadOthers();

});

function loadOthers(){
  var empId = $('#othersId').val();
//  console.log(empId);
  $.ajax({
   url: 'admin/loadOthers',
   method: 'get',
   dataType: 'json',
   data: {empId: empId},
   success: function(data){
    // console.log(response);
     $('.tableOthers').DataTable({
       "data": data.others,
       "scrollX": true,
       "columns": [
         {"data": "others_special_skills_hobbies"},
         {"data": "others_non_academic_distinctions"},
         {"data": "others_organization"},
         {
           "data": null,
           render: function(data, type, row) {
           return '<i class="fa fa-edit btn btn-info btn-xs view" value='+data.others_id  +' type="button"></i>'+
                  '<i class="fa fa-trash btn btn-danger btn-xs view" value='+data.others_id  +' type="button"></i>';
           }
         }
       ]
     });
   }
 });

}

function saveOthers(){
  $('#othersForm').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'admin/insertOthers',
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

        $('#othersModal').modal('hide');
        $('.modal-backdrop').remove();
        $('#others').load('pages/employee/others/others.php');
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
