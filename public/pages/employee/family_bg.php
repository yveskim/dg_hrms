      <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="personalInfo">
            <form class="" action="" method="post" id="famBg"></form>
              <div class="row">
                <div class="col-10">
                    <h4>Family Background</h4>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-info" id="btnFamBgEdit" type="button" name="button" form="famBg">Edit</button>
                    <button class="btn btn-warning" id="btnFamBgUpdate" type="submit" name="btn-submit" form="famBg">Update</button>
                  </div>
                </div>
            </div><hr>

          <div class="row">
            <input type="hidden" name="famId" id="famId" value="" form="famBg">
            <div class="col-4">
              <label>Spouse Surname</label>
              <input class="form-control form-control-sm" name="spouseSurname" id="spouseSurname" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>First Name</label>
              <input class="form-control form-control-sm" name="spouseFirstname" id="spouseFirstname" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>Middle Name</label>
              <input class="form-control form-control-sm" name="spouseMiddlename" id="spouseMiddlename" type="text" form="famBg">
            </div>
          </div><br>
          <div class="row">
            <div class="col-4">
              <label>Occupation</label>
              <input class="form-control form-control-sm" name="spouseOccupation" id="spouseOccupation" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>Employer/Business Name</label>
              <input class="form-control form-control-sm" name="spouseEmployerBusiness" id="spouseEmployerBusiness" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>Business Address</label>
              <input class="form-control form-control-sm" name="spouseBusinessAddress" id="spouseBusinessAddress" type="text" form="famBg">
            </div>
          </div><br>
          <div class="row">
            <div class="col-4">
              <label>Telephone No./Contact No.</label>
              <input class="form-control form-control-sm" name="spouseTelephone" id="spouseTelephone" type="text" form="famBg">
            </div>
          </div><hr><br>


          <div class="row">
            <form class="form" id="famBgChildren" method="post"></form>
            <div class="col-12">
              <button type="button" class="btn btn-info"  id="btnAddChildren" data-toggle="modal" data-target="#addChildrenModal">
                Add Children
              </button>
            </div>
          </div><br>


          <div class="row">
            <div class="col-12">
              <h5>Children List</h5>
            </div>
          </div><br>

          <div class="row table-children-div children-content">
            <!--content is link to children directory-->
          </div>
          <hr><br><br>


          <div class="modal fade" id="addChildrenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Children</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <div class="col-6">
                          <label>Child Name <i>(write in full)</i></label>
                          <input class="form-control form-control-sm" id="childName" name="childName" type="text" form="famBgChildren">
                        </div>
                        <div class="col-6">
                          <label>Child's Birthdate</label>
                          <input class="form-control form-control-sm" id="childBirthdate" name="childBirthdate" type="date" form="famBgChildren">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-success" id="saveChild" form="famBgChildren">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
          </div>



          <div class="row">

            <div class="col-4">
              <label>Father's Surname</label>
              <input class="form-control form-control-sm" name="fatherSurname" id="fatherSurname" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>First Name</label>
              <input class="form-control form-control-sm" name="fatherFirstname" id="fatherFirstname" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>Middle Name</label>
              <input class="form-control form-control-sm" name="fatherMiddlename" id="fatherMiddlename" type="text" form="famBg">

            </div>
          </div><br><hr><hr>

          <div class="row">
            <div class="col">
              <label><h5>Mother's Maiden Name</h5></label>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label>Surname</label>
              <input class="form-control form-control-sm" name="motherSurname" id="motherSurname" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>First Name</label>
              <input class="form-control form-control-sm" name="motherFirstname" id="motherFirstname" type="text" form="famBg">
            </div>
            <div class="col-4">
              <label>Middle Name</label>
              <input class="form-control form-control-sm" name="motherMiddlename" id="motherMiddlename" type="text" form="famBg">
            </div>
          </div>
    <hr>
      <!--end of Fam Bg Content-->


      <!--end Save button fambackground-->

    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
//    $('#familyBgTab').click(function(){
//  $('#btnFamBgEdit').hide();
  getFamBg();
  addFamBg();
  $('#btnFamBgUpdate').hide();
  $('.children-content').load('pages/employee/children/children_list.php');
  addChild();
  disableInputs();

  $('#btnFamBgEdit').click(function(){
    $('#spouseSurname').attr('disabled', false);
    $('#spouseFirstname').attr('disabled', false);
    $('#spouseMiddlename').attr('disabled', false);
    $('#spouseOccupation').attr('disabled', false);
    $('#spouseEmployerBusiness').attr('disabled', false);
    $('#spouseBusinessAddress').attr('disabled', false);
    $('#spouseTelephone').attr('disabled', false);
    $('#btnAddChildren').attr('disabled', false);
    $('#fatherSurname').attr('disabled', false);
    $('#fatherFirstname').attr('disabled', false);
    $('#fatherMiddlename').attr('disabled', false);
    $('#motherSurname').attr('disabled', false);
    $('#motherFirstname').attr('disabled', false);
    $('#motherMiddlename').attr('disabled', false);
    $(this).hide();
    $('#btnFamBgUpdate').show();
  });
//  });
});

function disableInputs(){
  $('#spouseSurname').attr('disabled', true);
  $('#spouseFirstname').attr('disabled', true);
  $('#spouseMiddlename').attr('disabled', true);
  $('#spouseOccupation').attr('disabled', true);
  $('#spouseEmployerBusiness').attr('disabled', true);
  $('#spouseBusinessAddress').attr('disabled', true);
  $('#spouseTelephone').attr('disabled', true);
  $('#btnAddChildren').attr('disabled', true);
  $('#fatherSurname').attr('disabled', true);
  $('#fatherFirstname').attr('disabled', true);
  $('#fatherMiddlename').attr('disabled', true);
  $('#motherSurname').attr('disabled', true);
  $('#motherFirstname').attr('disabled', true);
  $('#motherMiddlename').attr('disabled', true);
}

function getFamBg(){

    var empId = $('#empIdFamBg').val()
    $.ajax({
      url: 'admin/getFamBg',
      method: 'get',
      dataType: 'json',
      data: {empId:empId},
      success: function(data){
        $.each(data.fam, function(key, value) {
          $('#spouseSurname').val(value.spouse_surname);
          $('#famId').val(value.fam_id);
          $('#spouseFirstname').val(value.spouse_first_name);
          $('#spouseMiddlename').val(value.spouse_middle_name);
          $('#spouseOccupation').val(value.spouse_occupation);
          $('#spouseEmployerBusiness').val(value.spouse_employer_business);
          $('#spouseBusinessAddress').val(value.spouse_business_address);
          $('#spouseTelephone').val(value.spouse_telephone);
          $('#fatherSurname').val(value.father_surname);
          $('#fatherFirstname').val(value.father_firstname);
          $('#fatherMiddlename').val(value.father_middlename);
          $('#motherSurname').val(value.mother_surname);
          $('#motherFirstname').val(value.mother_firstname);
          $('#motherMiddlename').val(value.mother_middlename);
        });

      }
    });

}

function addChild(){
  $('#famBgChildren').submit(function(event){
    event.preventDefault();
    //console.log('ok');
    var empId = $('#empIdFamBgChildren').val();
  //  console.log(empId);
      $.ajax({
        url: 'admin/insertChild',
        method: 'post',
        dataType: 'json',
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
          //$('#famBgChildren')[0].reset();
          $('#childName').val('');
          $('#childBirthdate').val('');
          $('.children-content').load('pages/employee/children/children_list.php');
          $('#addChildrenModal').modal('hide');
          $('.modal-backdrop').remove();
        }
      });
  });

}


function addFamBg(){
  $('#famBg').submit(function(event){
    event.preventDefault();
    //console.log('ok');
    //  var empId = $('#empIdFamBg').val();
    //  console.log(empId);
      $.ajax({
        url: 'admin/insertEmpFamilyBg',
        method: 'post',
        dataType: 'json',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response){
          if (response.status == 0) {
            errorToast(response.message);
          }else {
            succToast(response.message);
            disableInputs();
            $('#btnFamBgUpdate').hide();
            $('#btnFamBgEdit').show();
          }

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
