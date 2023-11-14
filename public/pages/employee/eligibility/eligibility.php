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
            <form class="" action="#" method="post" id="eligForm"></form>
              <div class="row">
                <div class="col-9">
                    <h4>Civil Service Eligibility</h4>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-info" id="btnEligAdd" type="button" name="button"
                    form="EligibilityForm" data-toggle="modal" data-target="#addEligModal">Add Eligibility</button>
                  </div>
                </div>
            </div><hr>

            <div class="row">
              <div class="col-12">
                <table class="table table-bordered stripe tableEligibility compact table-sm">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th width="40%">Board(Bar)/CES/CSEE</th>
                      <th>Rating</th>
                      <th>Exam Date</th>
                      <th>Exam Place</th>
                      <th>License No.</th>
                      <th>Date Valid</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>


          <div class="modal fade" id="addEligModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Eligibility</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <input type="hidden" name="elig_id" id="elig_id" value="" form="eligForm">
                          <!--
                          added input edit to check if the submition is edit or insert
                          -->
                          <input type="hidden" name="edit-elig" id="edit-elig" value="" form="eligForm">
                        <div class="col-10">
                          <label>RA1080(Board/Bar)/CES/CSEE</label>
                          <input class="form-control form-control-sm" name="board" id="board" type="text" form="eligForm">
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-3">
                          <label>Rating</label>
                          <input class="form-control form-control-sm" name="rating" id="rating" type="text" form="eligForm">
                        </div>
                        <div class="col-3">
                          <label>Date of Exam</label>
                          <input class="form-control form-control-sm" name="exam_date" id="exam_date" type="date" form="eligForm">
                        </div>
                        <div class="col-6">
                          <label>Place of Exam</label>
                          <input class="form-control form-control-sm" name="exam_place" id="exam_place" type="text" form="eligForm">
                        </div>
                      </div><hr>

                      <div class="row">
                        <div class="col-4">
                          <label>License #</label>
                          <input class="form-control form-control-sm" name="license_no" id="license_no" type="text" form="eligForm">
                        </div>
                        <div class="col-4">
                          <label>Validity Date</label>
                          <input class="form-control form-control-sm" name="date_valid" id="date_valid" type="date" form="eligForm">
                        </div>
                      </div>
                      <br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveElig" form="eligForm">Save</button>
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

   loadEligibility();
   saveEligibility();


    //set value of input that is hidden in form to false everytime you click
    //a modal button
   $('#edit-elig').val("false");
   $('.btn-close-modal').click(function(){
     $('#edit-elig').val("false");
     $('body').removeClass('modal-open');
     $('.modal-backdrop').remove();
     $('#eligibility').load('pages/employee/eligibility/eligibility.php');
   });

});

function loadEligibility(){
  var empId = $('#empEligId').val();
  //console.log(empId);
  $.ajax({
   url: 'admin/loadEligibility',
   method: 'get',
   dataType: 'json',
   data: {empId: empId},
   success: function(data){
    // console.log(response);
     $('.tableEligibility').DataTable({
       "data": data.elig,
       "scrollX": true,
       "columns": [
         {"data": "elig_id"},
         {"data": "elig_board_bar"},
         {"data": "elig_rating"},
         {"data": "elig_exam_date"},
         {"data": "elig_exam_place"},
         {"data": "elig_license_no"},
         {"data": "elig_license_date_valid"},
         {
           "data": null,
           render: function(data, type, row) {
           return '<i class="fa fa-edit btn btn-info btn-xs edit" value='+ data.elig_id+' type="button"></i>'+
                  '<i class="fa fa-trash btn btn-danger btn-xs delete" value='+ data.elig_id+' type="button"></i>';
           }
         }
       ]
     });

     var table = $('.tableEligibility').DataTable();
     $('.edit').click(function(){
       $('.tableEligibility').on('click', 'tr',  function(){
         var data = table.row( this ).data();
           var eligId = data['elig_id'];
        //   console.log( eligId );
            $.ajax({
              url: 'admin/editElig',
              type: 'get',
              dataType: 'json',
              data: {eligId: eligId},
              success: function(response){
                $('#addEligModal').modal('show');
                $('#edit-elig').val("true");
                $.each(response.elig, function(key, value) {
                  $('#elig_id').val(value.elig_id );
                  $('#board').val(value.elig_board_bar);
                  $('#rating').val(value.elig_rating);
                  $('#exam_date').val(value.elig_exam_date);
                  $('#exam_place').val(value.elig_exam_place);
                  $('#license_no').val(value.elig_license_no);
                  $('#date_valid').val(value.elig_license_date_valid);
                });
              }
            });//ajax end
       });//table click end
     });
   },

   complete: function(){
     $('.delete').click(function(){
       var table = $('.tableEligibility').DataTable();
          $('.tableEligibility').on('click', 'tr',  function(){
              var data = table.row( this ).data();
              //console.log( data['emp_id'] );
              var elig_id = data['elig_id'];
              if (confirm('Are you sure you want to delete id '+data['elig_id']+' ?')) {
                $.ajax({
                  url: 'admin/deleteEligibility',
                  method: 'post',
                  dataType: 'json',
                  data: {elig_id: elig_id},
                  success: function(response){
                      if (response.status == 0) {
                        alert("can't delete the row");
                        errorToast(response.message);
                      }else {
                        deleteToast(response.message);
                        $('#eligibility').load('pages/employee/eligibility/eligibility.php');
                      }
                  }
                });
              }else {
                  $('#eligibility').load('pages/employee/eligibility/eligibility.php');
              }
          });
     });
   }
 });

}

function saveEligibility(){
  $('#eligForm').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'admin/insertEligibility',
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

        $('#addEligModal').modal('hide');
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
        $('#edit-elig').val("false");
        $('#eligibility').load('pages/employee/eligibility/eligibility.php');
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
