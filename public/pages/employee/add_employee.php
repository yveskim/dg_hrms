


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
      min-height: 8rem;
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
                  <label class="col-form-label col-md-4" for="deped_id">DepEd Employee ID</label>
                  <div class="col-md-8">
                      <input class="form-control form-control-sm" type="text" name="deped_id" id="deped_id" form="addEmpForm" required>
                  </div>
                </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="job_description">Job Description</label>
                    <div class="col-md-8">
                      <select  class="form-control form-control-sm" name="job_description" id="job_description" form="addEmpForm" required>
                        <option value="">-</option>
                        <option value="1">HRMO / Administrator</option>
                        <option value="2">Division / Field Personnel</option>
                        <option value="3">Staff</option>
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
                    <label for="sex" class="col-form-label col-md-4">Sex</label>
                    <div class="col-md-8 ">
                      <select class="form-control form-control-sm" name="sex" id="sex" form="addEmpForm" required>
                        <option value="">-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-4" for="birthDate">Date Of Birth <span class="required">*</span></label>
                    <div class="col-md-6 ">
                      <input class="date-picker form-control form-control-sm" id="birthDate" name="birthDate" type="date" form="addEmpForm" required>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control form-control-sm" id="age" name="age" placeholder="Age" type="text" form="addEmpForm" readonly="true">
                    </div>
                  </div>

                   <div class="item form-group">
                  <label class="col-form-label col-md-4">Phone No.</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-sm" name="mobile_no" type="text" form="addEmpForm">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-4">Email Address</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-sm" name="emailAddress" type="email" form="addEmpForm" required>
                  </div>
                </div>
                
              </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-3">
                  <button class="btn btn-secondary full-size" id="clearForm" type="button">CLEAR</button>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-success full-size" type="submit" form="addEmpForm">SUBMIT</button>
                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
  </div>



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

  $('#clearForm').click(function(){
    $('#addEmpForm')[0].reset();
  })

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
      success: function(res){
        //console.log(response);
        if (res.status == 1) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Save Successfull",
            text: "Record has been added",
            showConfirmButton: true,
          });
          $('#addEmpForm')[0].reset();
          let img = $('#img-container');
          img.attr('src', 'upload/system_file/noimage.png');
          window.scrollTo(0, 0);
          succToast(response.message);
        } else {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Action Failed",
            text: res.message,
            showConfirmButton: true,
          });
        } //end ifelse

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
