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
            <form class="" action="" method="post" id="educForm"></form>
              <div class="row">
                <div class="col-9">
                    <h4>Educational Background</h4>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-info" id="btnEducEdit" type="button" name="button" form="educForm" data-toggle="modal" data-target="#addEducationModal">Add Education</button>
                  </div>
                </div>
            </div><hr>

            <div class="row">
              <div class="col-12">
                <table class="table table-bordered stripe tableEducation compact table-sm">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Level</th>
                      <th>School</th>
                      <th>Degree/Course</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Level/Units</th>
                      <th>Year Graduated</th>
                      <th>Cholarship/Honors</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>


          <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Education</h5>
                    <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">

                      <div class="row">
                        <input type="hidden" name="educ_id" id="educ_id" value="" form="educForm">
                        <!--
                        added input edit to check if the submition is edit or insert
                        -->
                        <input type="hidden" name="edit-educ" id="edit-educ" value="" form="educForm">
                        <div class="col-4">
                          <label>Level</label>
                          <select class="form-control form-control-sm form-select form-select-sm" name="educ_level" form="educForm" id="educ_level">
                            <option></option>
                            <option value="Elementary">Elementary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Vocational/Trade Course">Vocational/Trade Course</option>
                            <option value="College">College</option>
                            <option value="Graduate Studies">Graduate Studies</option>
                          </select>
                        </div>
                        <div class="col-4">
                          <label>Name of School</label>
                          <input class="form-control form-control-sm" name="educ_school" id="educ_school" type="text" form="educForm">
                        </div>
                        <div class="col-4">
                          <label>Basic Education/Degree/Course</label>
                          <input class="form-control form-control-sm" name="educ_degree" id="educ_degree" type="text" form="educForm">
                        </div>
                      </div><hr>

                      <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <label>Period of Attendance</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>From</label>
                          <input class="form-control form-control-sm" id="educ_date_from" name="educ_date_from" type="date" placeholder="" form="educForm">
                        </div>
                        <div class="col-4">
                          <label>To</label>
                          <input class="form-control form-control-sm" id="educ_date_to" name="educ_date_to" type="date" placeholder="" form="educForm">
                        </div>
                        <div class="col-4">
                          <label>Highest Level/Units Earned</label>
                          <input class="form-control form-control-sm" name="educ_units" id="educ_units" type="text" form="educForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-4">
                          <label>Year Graduated</label>
                          <input class="form-control form-control-sm" name="educ_year_graduated" id="educ_year_graduated" type="text" form="educForm">
                        </div>
                        <div class="col-6">
                          <label>Scholarship/Academic Honors Recieved</label>
                          <input class="form-control form-control-sm" name="educ_scholarship" id="educ_scholarship" type="text" form="educForm">
                        </div>
                      </div><br><br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveEduc" form="educForm">Save</button>
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
  saveEducation();
  loadEducation();


  //set value of input that is hidden in form to false everytime you click
  //a modal button
  $('#edit-educ').val("false");
  $('.btn-close-modal').click(function(){
    $('#edit-educ').val("false");
    $('.modal-backdrop').remove();
     $('body').removeClass('modal-open');
    $('#educationalBg').load('pages/employee/education/educational_bg.php');
  });
});

function loadEducation(){
  var empId = $('#empEducId').val();
  //console.log(empId);
  $.ajax({
   url: 'admin/loadEducation',
   method: 'get',
   dataType: 'json',
   data: {empId: empId},
   success: function(data){
    // console.log(response);
     $('.tableEducation').DataTable({
       "data": data.educ,
       "scrollX": true,
       "columns": [
         {"data": "educ_bg_id"},
         {"data": "educ_bg_level"},
         {"data": "educ_bg_school"},
         {"data": "educ_bg_degree"},
         {"data": "educ_bg_from"},
         {"data": "educ_bg_to"},
         {"data": "educ_bg_units"},
         {"data": "educ_bg_year_graduated"},
         {"data": "educ_bg_scholarship_honors"},
         {
           "data": null,
           render: function(data, type, row) {
           return '<i class="fa fa-edit btn btn-info btn-xs edit" value='+data.educ_bg_id+' type="button"></i>'+
                  '<i class="fa fa-trash btn btn-danger btn-xs delete" value='+data.educ_bg_id+' type="button"></i>';
           }
         }
       ]
     });


       var table = $('.tableEducation').DataTable();
       $('.edit').click(function(){
         $('.tableEducation').on('click', 'tr',  function(){
           var data = table.row( this ).data();
             //console.log( data['educ_bg_id'] );
             var educId = data['educ_bg_id'];
              $.ajax({
                url: 'admin/editEduc',
                type: 'get',
                dataType: 'json',
                data: {educId: educId},
                success: function(response){
                  $('#addEducationModal').modal('show');
                  $('#edit-educ').val("true");
                  $.each(response.educ, function(key, value) {
                    $('#educ_id').val(value.educ_bg_id);
                    $("#educ_level option[value='" + value.educ_bg_level + "']").attr("selected","selected");
                    $('#educ_school').val(value.educ_bg_school);
                    $('#educ_degree').val(value.educ_bg_degree);
                    $('#educ_date_from').val(value.educ_bg_from);
                    $('#educ_date_to').val(value.educ_bg_to);
                    $('#educ_units').val(value.educ_bg_units);
                    $('#educ_year_graduated').val(value.educ_bg_year_graduated);
                    $('#educ_scholarship').val(value.educ_bg_scholarship_honors);
                  });
                }
              });//ajax end
         });//table click end
       });
     },//success end
     complete: function(){
       $('.delete').click(function(){
         var table = $('.tableEducation').DataTable();
            $('.tableEducation').on('click', 'tr',  function(){
                var data = table.row( this ).data();
                //console.log( data['emp_id'] );
                var educ_id = data['educ_bg_id'];
                if (confirm('Are you sure you want to delete id '+data['educ_bg_id']+' ?')) {
                  $.ajax({
                    url: 'admin/deleteEducation',
                    method: 'post',
                    dataType: 'json',
                    data: {educ_id: educ_id},
                    success: function(response){

                        if (response.status == 0) {
                          alert("can't delete the row");
                          errorToast(response.message);
                        }else {
                          deleteToast(response.message);
                          $('#educationalBg').load('pages/employee/education/educational_bg.php');


                        }
                    }
                  });

                }else {
                    $('#educationalBg').load('pages/employee/education/educational_bg.php');
                }




            });
       });

     }

 });

}

function saveEducation(){

  $('#educForm').submit(function(event){
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: 'admin/insertEducation',
      type: 'post',
      dataType: 'json',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){

        if (response.status == 0) {
          errorToast(response.message);
        }else {
          succToast(response.message);
        }
        //$('#educForm')[0].reset();
        $('#addEducationModal').modal('hide');
        $('.modal-backdrop').remove();
         $('body').removeClass('modal-open');
        $('#edit').val("false");//>>>>>>>>>>>>>>>>
        //loadEducation();
        $('#educationalBg').load('pages/employee/education/educational_bg.php');
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
    loderBg: '#f96868',
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
