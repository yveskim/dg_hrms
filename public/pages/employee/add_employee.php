


<style media="screen">
    input[type="file"] {
      display: none;
    }
    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
    }

    #img-container{
      float: none;
      margin: 0 auto;
      border: 4px solid gray;
      max-width: 100%;
      height: auto;
    }

    .emp_profile_pic{
      min-height: 10rem;
      width: 100%;
      height: 100%;
      object-fit: contain;
  }



</style>
<form class="form" id="addEmpForm" method="post"> </form>
<div class="row">
    <!-- left-->
    <!-- left-->
    <!-- left-->
    <!-- left-->
    <div class="col-md-6 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Personal Information</h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-12 mb-3">
                    <div class="mx-auto">
                      <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                        <img class="img-responsive img-portfolio emp_profile_pic img-hover" src="upload/system_file/noimage.png" alt="" id="img-container" form="addEmpForm">
                      </div>
                    </div>
                  </div>
                  <div class="col-12 d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                      <div class="mb-2">
                        <label for="file-upload" class="custom-file-upload btn btn-primary">
                          <span class="fa fa-camera"></span>
                              Upload Image
                        </label>
                        <input id="file-upload" type="file" name="empImage" onchange="readURL(this);" form="addEmpForm"/>
                      </div>
                    </div>
                    </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="item form-group">
                  <label class="col-form-label col-md-4" for="emp_school_id">Employee ID</label>
                  <div class="col-md-8">
                      <input class="form-control form-control-sm" type="text" name="emp_school_id" id="emp_school_id" form="addEmpForm" required>
                  </div>
                </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="job_description">Job Description</label>
                    <div class="col-md-8">
                      <select  class="form-control form-control-sm" name="job_description" id="job_description" form="addEmpForm" required>
                        <option value="">-</option>
                        <option value="1">Administrator</option>
                        <option value="2">Faculty</option>
                        <option value="3">Staff</option>
                        <option value="4">Job Order</option>
                        <option value="5">Contractor</option>
                      </select>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="firstName">First Name</label>
                    <div class="col-md-8 ">
                      <input type="text" id="firstName" name="firstName" class="form-control form-control-sm " required form="addEmpForm">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="lastName">Last Name</label>
                    <div class="col-md-8 ">
                      <input type="text" id="lastName" name="lastName" form="addEmpForm" class="form-control form-control-sm" required>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="middleName" class="col-form-label col-md-4">Middle Name</label>
                    <div class="col-md-8 ">
                      <input class="form-control form-control-sm" type="text" id="middleName" form="addEmpForm" name="middleName" required>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="gender" class="col-form-label col-md-4">Sex</label>
                    <div class="col-md-8 ">
                      <select class="form-control form-control-sm" name="gender" id="gender" form="addEmpForm" required>
                        <option value="">-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="birthDate">Date Of Birth <span class="required">*</span></label>
                    <div class="col-md-6 ">
                      <input class="date-picker form-control form-control-sm" id="birthDate" name="birthDate" type="date" required>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control form-control-sm" id="age" name="age" placeholder="Age" type="text" form="addEmpForm" readonly="true">
                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="placeOfBirth">Place of Birth</label>
                    <div class="col-md-8">
                      <input class="form-control form-control-sm" id="placeOfBirth" placeholder="ex. Jaro, Iloilo City" name="placeOfBirth" type="text" placeholder="" form="addEmpForm">
                    </div>
                  </div>

                  <div class="item form-group">
                      <label class="col-form-label col-md-4" for="maritalStatus">Marital Status</label>
                      <div class="col-md-8">
                        <select class="form-control form-control-sm form-select form-select-sm" name="maritalStatus" form="addEmpForm">
                          <option>-</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Separated">Separated</option>
                          <option value="Divorced">Divorced</option>
                        </select>
                      </div>

                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4">Height</label>
                      <div class="col-md-8">
                        <select class="form-control form-control-sm" id="height" name="height" form="addEmpForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=height]').show().prop('disabled', false).focus();$(this).val(null);}">
                          <option value="">-</option>
                        </select>
                      <input placeholder="please type" class="form-control form-control-sm" name="height" form="addEmpForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=height]').show().prop('disabled', false).focus();}">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4">Weight</label>
                      <div class="col-md-8">
                          <select class="form-control form-control-sm" id="weight" name="weight" form="addEmpForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=weight]').show().prop('disabled', false).focus();$(this).val(null);}">
                            <option value="">-</option>
                          </select>
                          <input placeholder="please type" class="form-control form-control-sm" name="weight" form="addEmpForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=weight]').show().prop('disabled', false).focus();}">
                      </div>
                    </div>

                  <div class="item form-group">
                  <label class="col-form-label col-md-4" for="bloodType">Blood Type</label>
                  <div class="col-md-8">
                          <select class="form-control form-control-sm" name="bloodType" form="addEmpForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=bloodType]').show().prop('disabled', false).focus();$(this).val(null);}">
                          <option value="">-</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="other">Other</option>
                      </select>
                      <input placeholder="please type" class="form-control form-control-sm" name="bloodType" form="addEmpForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=bloodType]').show().prop('disabled', false).focus();}">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-4" for="religion">Religion</label>
                  <div class="col-md-8">
                      <select class="form-control form-control-sm" name="religion" form="addEmpForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=religion]').show().prop('disabled', false).focus();$(this).val(null);}">
                          <option value="">-</option>
                          <option value="Christianity">Christianity</option>
                          <option value="Indigenous">Indigenous</option>
                          <option value="Islam">Islam</option>
                          <option value="No Religion">No Religion</option>
                          <option value="other">Other</option>
                      </select>
                      <input placeholder="please type" class="form-control form-control-sm" name="religion" form="addEmpForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=religion]').show().prop('disabled', false).focus();}">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-form-label col-md-5">Citizenship</label>
                  <div class="col-md-7 form-check filipino-chk-div">
                    <input class="form-check-input" checked type="checkbox" value="Filipino" id="filipino-chk" name="citizenship_fil" form="addEmpForm">
                    <label class="form-check-label" for="filipino-chk">Filipino</label>
                  </div>
                  <div class=" col-md-7 form-check dual-citizenship-div">
                    <input class="form-check-input" type="checkbox" value="" id="dual-citizenship-chk" name="dual_citizenship" form="addEmpForm">
                    <label class="form-check-label" for="dual-citizenship-chk">Dual Citizenship</label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5"></div>
                  <div class="col-md-7 form-group dual-option">
                    <div class="form-check birth-chk-div">
                      <input class="form-check-input" type="checkbox" value="By Birth" id="by-birth" name="citizen_by[]" form="addEmpForm">
                      <label class="form-check-label" for="by-birth">By Birth</label>
                    </div>

                    <div class="col-md-12 form-check naturalization-div">
                      <input class="form-check-input" type="checkbox" value="By Naturalization" id="by-naturalization" name="citizen_by[]" form="addEmpForm">
                      <label class="form-check-label" for="by-naturalization">By Naturalization</label>
                    </div>
                  </div>

                  <div class="form-group country">
                    <label class="col-form-label col-md-4">Indicate Country</label>
                    <div class="col-md-8">
                      <select class="form-control form-control-sm form-select form-select-sm" name="country" id="emp_country" form="addEmpForm">
                        <option></option>
                      </select>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </div>
    </div>


    <!-- Right -->
    <!-- Right -->
    <!-- Right -->
    <!-- Right -->

    <div class="col-md-6 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Other Information</h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />

            <div class="col-md-12">

                <div class="item form-group">
                    <label class="col-form-label col-md-3">TIN #</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="tin" type="text" placeholder="" form="addEmpForm">
                    </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">GSIS/UMID</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="gsis" type="text" placeholder="" form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3">SSS ID #</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="sss" type="text" placeholder="" form="addEmpForm">
                    </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">Pag-ibig #</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="pagibig" type="text" placeholder="" form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3">Philhealth ID</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="philhealth" type="text" placeholder="" form="addEmpForm">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">Agcy. Emp. #</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="agency_employee_no" type="text" placeholder="Deped ID No." form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3">Tel. No.</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="telephone_no" type="text" form="addEmpForm">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">Phone No.</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="mobile_no" type="text" form="addEmpForm">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">Email Address</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="emailAddress" type="text" form="addEmpForm" required>
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </div>

<!-- Permanent Address +++++++++++++++++++++ -->
<!-- Permanent Address +++++++++++++++++++++ -->
    <div class="col-md-6 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Permanent Address</h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />

            <div class="col-md-12">

                <div class="item form-group">
                  <label class="col-form-label col-md-3">House/Block/Lot</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="perAddressHouse" type="text" form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3">Street</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="perAddressStreet" type="text" form="addEmpForm">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">Subd./Village</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="perAddressSubdivision" type="text" form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3">Barangay</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="perAddressBarangay" type="text" form="addEmpForm" >
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3">Municipality</label>
                   <div class="col-md-7">
                      <input class="form-control form-control-sm" name="perAddressMunicipality" type="text" form="addEmpForm" >
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3">City</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="perAddressCity" type="text" form="addEmpForm" >
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3">Province</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="perAddressProvince" type="text" form="addEmpForm">
                    </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3">Zip Code</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="perAddressZip" type="text" form="addEmpForm">
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Current Address ++++++++++++++++++++ -->
    <!-- Current Address ++++++++++++++++++++ -->

    <div class="col-md-6 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Current Address</h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />

            <div class="col-md-12">

                <div class="item form-group">
                  <label class="col-form-label col-md-3">House/Block/Lot</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="resAddressHouse" type="text" form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3">Street</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="resAddressStreet" type="text" form="addEmpForm">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3">Subd./Village</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="resAddressSubdivision" type="text" form="addEmpForm">
                  </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3">Barangay</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="resAddressBarangay" type="text" form="addEmpForm" >
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3">Municipality</label>
                   <div class="col-md-7">
                      <input class="form-control form-control-sm" name="resAddressMunicipality" type="text" form="addEmpForm" >
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3">City</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="resAddressCity" type="text" form="addEmpForm" >
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3">Province</label>
                    <div class="col-md-7">
                      <input class="form-control form-control-sm" name="resAddressProvince" type="text" form="addEmpForm">
                    </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3">Zip Code</label>
                  <div class="col-md-7">
                    <input class="form-control form-control-sm" name="resAddressZip" type="text" form="addEmpForm">
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </div>

          <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
          <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

      </div>
      <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-3 d-flex justify-content-end">
          <button class="btn btn-success full-size" type="submit" form="addEmpForm">SUBMIT</button>
        </div>
      </div>
    </div>
    <br><br><br><br>




<script type="text/javascript">
  function readURL(input) {
       if (input.files && input.files[0]) {//check if input file has content
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#img-container')
                   .attr('src', e.target.result)
                   .width(140)
                   .height(140);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }

  $(document).ready(function(){
    $('#personalDataSheetNext').click(function(){
      $('#familyBackgroundTab').addClass('active');
        $('#personalInformation').removeClass('active');
      });

    savePersonalInfo();
    saveFamilyBackground();
    setHeight();
    setWeight();

    $('.dual-option').hide();
    $('.country').hide();
    getCountries();
    citizenAlgo();

  });

  function citizenAlgo(){
    $('#filipino-chk').change(function(){
      if ($(this).prop('checked')){
        $('#dual-citizenship-chk').prop('checked', false);
        $('#filipino-chk').prop('disabled', false);
        $('#by-birth').prop('checked', false);
        $('#by-naturalization').prop('checked', false);
        $('.dual-option').hide();
        $('.country').hide();
      }
    });

    $('#dual-citizenship-chk').change(function(){
      if ($(this).prop('checked')){
        $('#filipino-chk').prop('checked', false);
        $('.dual-option').show();
          $('#by-birth').show();
        $('#by-naturalization').show();
      }else{
        $('#by-birth').prop('checked', false);
        $('#by-naturalization').prop('checked', false);
        $('#by-birth').hide();
        $('#by-naturalization').hide();
        $('.dual-option').hide();
        $('.country').hide();
      }
    });

    $('#by-birth').change(function(){
      if($(this).prop('checked', true))
      $('.country').show();
      $('#by-naturalization').prop('checked', false);
    });
    $('#by-naturalization').change(function(){
      $('.country').show();
      $('#by-birth').prop('checked', false);
    });
  }

  function getCountries() {
    let html_code = '<option value="">--select--</option>';
    $('#emp_country').html(html_code);
    $.getJSON('JSON_FILES/countries.json', function(data) {
      $.each(data, function(key, value) {
        html_code += '<option value="' + value.name + '">' + value.name + '</option>';
      });
      $('#emp_country').html(html_code);
    });
  }

  function setHeight(){
    for (i=50;i<=200;i++){
        $("#height").append($('<option></option>').val(i).html(i +' '+ 'cm.'))
    }
    $("#height").append('<option value="other">Other</option>')
  }

  function setWeight(){
    for (i=20;i<=150;i++){
        $("#weight").append($('<option></option>').val(i).html(i +' '+ 'kg.'))
    }
    $("#weight").append('<option value="other">Other</option>')
  }

function savePersonalInfo(){
  $('#addEmpForm').submit(function(event){
    event.preventDefault();
  //  alert('check');
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: 'admin/insertEmpPersonalInfo',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){
        //console.log(response);
        if (response.status == 0) {
          errorToast(response.message);
        }else {
          $('#addEmpForm')[0].reset();
          let img = $('#img-container');
          img.attr('src', 'upload/system_file/noimage.png');
          window.scrollTo(0, 0);
          succToast(response.message);
        }
      }
    });
  });
}

function saveFamilyBackground(){
  $('#addEmpFamBg').submit(function(event){
    event.preventDefault();
  //  alert('check');
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: 'admin/insertEmpFamilyBg',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){
        //console.log(response);
        if (response.status == 0) {
          errorToast(response.message);
        }else {
          $('#addEmpFamBg')[0].reset();//reset the content of form
          succToast(response.message);
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
  $.toast({
    heading: 'Action Failed',
    text: msg,
    showHideTransition: 'slide',
    icon: 'error',
    loderBg: '#f2a654',
    position: 'top-right'
  });
}

</script>



<script type="text/javascript">
      $(document).ready(function(){
          $('#saveEB').hide();
          $('#saveFamBg').hide();

          $('#btnSelectEmp').click(function(){
            if ( ! $.fn.DataTable.isDataTable( '.empData' ) ) {//method to check if datatable is already loaded. if not load the ajax
             loadEmpUsingDataTable();
           }
          });

          $('#btnSelectEmpEB').click(function(){
            if ( ! $.fn.DataTable.isDataTable( '.empDataEB' ) ) {//method to check if datatable is already loaded. if not load the ajax
             loadEmpUsingDataTable();
             loadEmpUsingDataTableEB();
           }
          });
      });

      function loadEmpUsingDataTable(){
        $.ajax({
         url: 'employee/getEmpData',
         method: 'post',
         dataType: 'json',
         success: function(data){
              //console.log(data);
              var i = "1"; //add counter in table
              $('.empData').DataTable({
                "data": data.emp,
                "responsive": true,
                "columns": [
                  {
                     "data": null,
                    "render": function ( data, type, row, meta )
                    {
                      var a = `
                        <button type="button" value="${row.emp_id}" id="btnSelect" data-dismiss="modal" class="btn btn-primary btn-sm">select</button>
                      `;
                      return a;
                    }
                  },
                  {
                     "data": null,
                    "render": function(){
                      return a = i++;
                    }
                  },
                  {"data": "emp_id"},
                  {
                     "data": null,
                     render: function (data, type, row) {
                                 var details = row.emp_fname + " " + row.emp_mname + " " + row.emp_lname;
                                 return details;
                             }
                  },
                  {"data": "emp_gender"}
                ]
              })

              var table = $('.empData').DataTable();
              $('.empData').on('click', 'tr',  function(){
                var data = table.row( this ).data();
                  //console.log( data['emp_id'] );
                  $('#empNameFamBg').html(data['emp_fname'] + ' '+data['emp_mname'] + ' ' + data['emp_lname']);
                  $('#empIdFamBg').val(data['emp_id']);
                  $('#saveFamBg').show();
              });
           }
         });
      }

      function loadEmpUsingDataTableEB(){
        $.ajax({
         url: 'employee/getEmpData',
         method: 'post',
         dataType: 'json',
         success: function(data){
              //console.log(data);
              var i = "1"; //add counter in table
              $('.empDataEB').DataTable({
                "data": data.emp,
                "responsive": true,
                "columns": [
                  {
                     "data": null,
                    "render": function ( data, type, row, meta )
                    {
                      var a = `
                        <button type="button" value="${row.emp_id}" id="btnSelectEB" data-dismiss="modal" class="btn btn-primary btn-sm">select</button>
                      `;
                      return a;
                    }
                  },
                  {
                     "data": null,
                    "render": function(){
                      return a = i++;
                    }
                  },
                  {"data": "emp_id"},
                  {
                     "data": null,
                     render: function (data, type, row) {
                                 var details = row.emp_fname + " " + row.emp_mname + " " + row.emp_lname;
                                 return details;
                             }
                  },
                  {"data": "emp_gender"}
                ]
              })

              var table = $('.empDataEB').DataTable();
              $('.empDataEB').on('click', 'tr',  function(){
                var data = table.row( this ).data();
                  //console.log( data['emp_id'] );
                  $('#empNameEB').html(data['emp_fname'] + ' '+data['emp_mname'] + ' ' + data['emp_lname']);
                  $('#empIdEB').val(data['emp_id']);
                  $('#saveEB').show();
              });

           }
         });
      }


      $('#birthDate').change(function(){
        let dob = new Date($(this).val());
        let age = getAge(dob);
        $('#age').val(age);
      });

      function passEmp(){
          $('.empData').click(function(){
              var id = $(this).data();
              console.log(id);
              alert(id);
          });
      }

      function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
      }

    </script>
