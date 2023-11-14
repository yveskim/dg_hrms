

<style media="screen">

  .main-content{
    font-family: sans-serif;
  }

  .title-text{
    text-align: center;
    font-weight: bold;
  }

  .btn-active{
    border-bottom: 4px solid gray;
    margin-bottom: -1px;
    margin-top: -1px;
  }

  .spiner-div{
    position: fixed;
    top: 0;
    left: 0;
    padding-left: 45%;
    padding-top: 10%;
    width: 100%;
    height: 100%;
    background-color: rgb(10, 10, 10, .5);
    z-index: 1000;
  }

  .div-blur{
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 0;
    background-color: black;
    opacity: .5;
    z-index: 100;
  }

  .full-size{
    width: 100%;
  }



</style>
<div class="div-blur"></div>

<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>

<div class="main-content">
    <div class="row">
      <!-- left page -->
      <div class="col-md-2">
          <button class="btn btn-primary full-size" style="background-color: brown;" id="btnEnrollNew">ADD NEW<br/> STUDENT </button>
      </div>
      <div class="col-md-10" style="border-right: 2px solid lightgray; border-bottom: 2px solid lightgray;">
        <strong><h1 class="title-text">LEARNERS DATA ENTRY</h1></strong>
      </div>
    </div>
    <br>
<!-- 
      <div class="row">
     
          <div class="col-md-2">
              <button class="btn btn-info full-size" id="search_student" data-toggle="modal" data-target="#modalSearch">Search Student</button>
          </div>
      </div> -->
  

      <form id="enrollmentForm">
      <div class="row mb-2">
        <div class="col-md-12">
          <h5>Personal Information</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <div class="row">
              <div class="col-md-12">
                <img src="upload/system_file/noimage.png"
                    id="student_pic" alt="student pic" 
                    class="img-thumbnail img-fluid rounded mx-auto d-block float-left"
                    style="width: 10rem; height: 10rem; border: 2px solid gray; border-radius: .5rem;  object-fit: cover;">
                  <input type="file" class="form-control form-control-sm" accept="image/png, image/jpeg" name="student_pic" id="set_image" form="enrollmentForm">
              </div>
          </div>
        </div>
        <div class="col-md-10" style="border-left: 2px solid lightgray; border-top: 2px solid lightgray; padding-top: .5rem;">
          <div class="row">
            <div class="col-md-3">
              <label for="">Learner's Ref. No.(LRN)</label>
              <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="LRN should be unique and no equivalent in other learners. If there is an error on your LRN, leave it blank and verify it to the program head of the program you applied. Bring your SF10."></i></span>
              <input type="text" class="form-control form-control-sm" name="lrn" pattern=".{12,12}" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
            </div>
            <div class="col-md-2">
                <label for="">First Name</label>
                <input type="text" class="form-control form-control-sm" name="first_name" form="enrollmentForm" required>
            </div>
            <div class="col-md-2">
                <label for="">Middle Name</label>
                <input type="text" class="form-control form-control-sm" name="middle_name" form="enrollmentForm">
            </div>
            <div class="col-md-2">
                <label for="">Last Name</label>
                <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="For name extensions, please follow the format in your PSA. If your name extension resides after your first name, encode it after your first name, same goes if it resides after your last name. "></i></span>
                <input type="text" class="form-control form-control-sm" name="last_name" form="enrollmentForm" required>
            </div>
            <div class="col-md-2">
                <label for="">Sex</label>
                <select name="sex" id="" class="form-control form-control-sm" form="enrollmentForm" required>
                  <option value="">--select--</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col-md-2">
                <label for="">Birth Date</label>
                <input type="date" class="form-control form-control-sm" name="birthdate" id="birthdate" form="enrollmentForm">
            </div>
            <div class="col-md-1">
                <label for="">Age</label>
                <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="This data is autogenerated base on the date you input."></i></span>
                <input type="text" readOnly class="form-control form-control-sm" id="age">
            </div>

            <div class="col-md-3">
                <label for="birth_place">Birth Place</label>
                <input type="text" class="form-control form-control-sm" name="birth_place" form="enrollmentForm" id="birth_place">
            </div>

            <div class="col-md-3">
                <label for="">PSA Birth Cert. No.</label>
                <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="You can find it in your PSA birth certificate in the bottom middle part labeled (BReN)"></i></span>
                <input type="text" class="form-control form-control-sm" name="psa_birth_no" form="enrollmentForm">
            </div>
        </div>
        <hr>

        <div class="row mb-4">
        <div class="col-md-2">
                <label for="">Citizenship</label>
                <!-- <input type="text" class="form-control form-control-sm" name="citizenship" form="enrollmentForm"> -->
                <select class="form-control form-control-sm" name="citizenship" form="enrollmentForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=citizenship]').show().prop('disabled', false).focus();$(this).val(null);}">
                  <option value="">--select--</option>
                  <option value="Filipino">Filipino</option>
                  <option value="American">American</option>
                  <option value="Korean">Korean</option>
                  <option value="Chinese">Chinese</option>
                  <option value="African">African</option>
                  <option value="Australian">Australian</option>
                  <option value="French">French</option>
                  <option value="Indian">Indian</option>
                  <option value="Japanese">Japanese</option>
                  <option value="Taiwanese">Taiwanese</option>
                  <option value="Malaysian">Malaysian</option>
                  <option value="other">Other</option>
                </select>
                <input placeholder="please type" class="form-control form-control-sm" name="citizenship" form="enrollmentForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=citizenship]').show().prop('disabled', false).focus();}">
            </div>
            <div class="col-md-2">
                <label for="">Religion</label>
                <!-- <input type="text" list="rel" class="form-control form-control-sm" name="religion" form="enrollmentForm"> -->
                <select class="form-control form-control-sm" name="religion" form="enrollmentForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=religion]').show().prop('disabled', false).focus();$(this).val(null);}">
                  <option value="">--select--</option>
                  <option value="Christianity">Christianity</option>
                  <option value="Indigenous">Indigenous</option>
                  <option value="Islam">Islam</option>
                  <option value="No Religion">No Religion</option>
                  <option value="other">Other</option>
                </select>
                <input placeholder="please type" class="form-control form-control-sm" name="religion" form="enrollmentForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=religion]').show().prop('disabled', false).focus();}">
            </div>

            <div class="col-md-2">
                <label for="">Mother Tongue</label>
                <select class="form-control form-control-sm" name="mother_tongue" form="enrollmentForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=mother_tongue]').show().prop('disabled', false).focus();$(this).val(null);}">
                  <option value="">--select--</option>
                  <option value="Hiligaynon">Hiligaynon</option>
                  <option value="English">English</option>
                  <option value="Tagalog">Tagalog</option>
                  <option value="Bisaya">Bisaya</option>
                  <option value="Kinaray-a">Kinaray-a</option>
                  <option value="Bicolano">Bicolano</option>
                  <option value="other">other</option>
                </select>
                <input placeholder="please type" class="form-control form-control-sm" name="mother_tongue" form="enrollmentForm" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=mother_tongue]').show().prop('disabled', false).focus();}">
            </div>

            <div class="col-md-2">
                <label for="blood_type">Blood Type</label>
                <input type="text" class="form-control form-control-sm" name="blood_type" form="enrollmentForm">
            </div>

            <div class="col-md-2">
                <label for="height">Height</label>
                <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="Input data in centimeter. Write the number only."></i></span>
                <input type="text" class="form-control form-control-sm" name="height" form="enrollmentForm">
            </div>

            <div class="col-md-2">
                <label for="weight">Weight</label>
                <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="Input data in kilograms. Write the number only."></i></span>
                <input type="text" class="form-control form-control-sm" name="weight" form="enrollmentForm">
            </div>

        </div>
        <hr>

        <div class="row">
          <div class="col-md-2">
                  <label for="">Cell No.</label>
                  <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="You can input a maximum of two mobile numbers seperated by a (/) symbol. ex. 090123456789/090987654321"></i></span>
                  <input type="text" class="form-control form-control-sm" name="cell_no" form="enrollmentForm">
              </div>
              <div class="col-md-2">
                  <label for="">Tel No</label>
                  <input type="text" class="form-control form-control-sm" name="tel_no" form="enrollmentForm">
              </div>
              <div class="col-md-3">
                  <label for="">Email Address</label>
                  <input type="email" class="form-control form-control-sm" name="email" form="enrollmentForm">
              </div>
              <div class="col-md-3">
                  <label for="">Facebook Name/Link</label>
                  <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="You can copy a link from your facebook page and paste it here, or write the complete name of your facebook profile."></i></span>
                  <input type="text" class="form-control form-control-sm" name="facebook" form="enrollmentForm">
              </div>
          </div>
        <hr>

        <div class="row mb-4">
            <div class="col-md-2">
                <label for="">Is LWD?</label>
                <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" 
                data-content="(Learner With Disability). Does the learner have special education needs? (i.e. physical, mental, social disability,
                               mental condition, giftedness, among others)"></i></span>
                <select name="with_special_need" id="" class="form-control form-control-sm" form="enrollmentForm">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Type of Disability</label>
                <select class="form-control form-control-sm specialNeeds" name="special_need" id="specialNeeds" form="enrollmentForm" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=special_need]').show().prop('disabled', false).focus();$(this).val(null);}">
                    <option value="">--select--</option>
                    <option value="Intellectual Dissability">Intellectual Dissability</option>
                    <option value="Multiple Dissability">Multiple Dissability</option>
                    <option value="Orthopedic Physical-Handicap">Orthopedic Physical-Handicap</option>
                    <option value="Speech / Language Disorder">Speech / Language Disorder</option>
                    <option value="Speech Health Problem / Chronic Disease">Speech Health Problem / Chronic Disease</option>
                    <option value="Visual Impairment">Visual Impairment</option>
                    <option value="other">other</option>
                </select>
                <input placeholder="please type" class="form-control form-control-sm specialNeeds2"  name="special_need" form="enrollmentForm" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=special_need]').show().prop('disabled', false).focus();}">
            </div>
      
        </div>
        </div>
      </div>
      <hr>
      <br>

      <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-2">
            <button class="btn btn-secondary full-size" id="btnReset" style="height: 4rem;">Clear</button>
        </div>
        <div class="col-md-2">
        <button class="btn btn-success full-size" type="submit" style="height: 4rem;" form="enrollmentForm">Submit</button>
        </div>
      </div>
      </form>

    </div>
    <!-- right page -->
    <div class="col-md-4">

    </div>
  </div>


</div>





    
<div class="modal fade mb-4" id="modalSearch">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Search Student</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
                <!-- <form action="" id="searchForm"></form> -->
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Search By:</label>
                        <select name="" id="searchCategory" class="form-control form-control-sm">
                          <option value="0" selected>Student ID</option>
                          <option value="1">Student Name</option>
                        </select>
                    </div>
                </div><hr>

                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" class="form-control form-control-lg" name="searchVal" id="searchVal" >
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-lg" type="button" id="searchBtn">Search</button>
                        </div>
                      </div>
                    </div>
                </div>
                
                <hr>

                <div class="row">
                  <div class="col-md-12 searchResultDiv">

                  </div>
                </div>
                <br><br><br>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">

$(function () {
  $('[data-toggle="popover"]').popover()
})

  $(document).ready(function(){
      $("#modalSearch").on('shown.bs.modal', function() {
        $('#searchVal').focus();
      });

    $('.spiner-div').hide();
    $('.div-blur').hide();
    $('#enrollmentForm').hide();
    $('#updateForm').hide();

    getSchoolYear();
    search_student();

});

$('#btnReset').click(function(){
  $('#enrollmentForm')[0].reset();
})

$('#btnEnrollNew').click(function(){
  $('#enrollmentForm').show();
  $('#updateForm').hide();
  $('#enrollmentForm')[0].reset();
  $('#student_pic').prop('src', 'upload/system_file/noimage.png');
  Swal.fire({
      position: 'center',
      icon: 'info',
      title: 'Encode New Student',
      text: 'New Entry',
      showConfirmButton: false,
      timer: 1000
  })

})

$('#set_image').change(function(event){
  let tmppath = URL.createObjectURL(event.target.files[0]);
  $('#student_pic').fadeIn("fast").attr('src',tmppath); 
})


$('#enrollmentForm').submit(function(event){
  event.preventDefault();
  let user_id = $("#user").val();
  let sy_id = $("#sy_ref").val();
  let formData = new FormData(this);
  formData.append('user_id', user_id);
  formData.append('sy_id', sy_id);
  $.ajax({
        type: "post",
        url: 'encode_student',
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
        },
        success: function(res){
          // console.log(user_id);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Data Saved',
                  text: 'Encode successful',
                  showConfirmButton: true
              });
              $('#enrollmentForm').hide();
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

function getSchoolYear(){
  $.ajax({
        type: "get",
        url: 'getSchoolYear',
        dataType: "json",
        success: function(res){
          // console.log(res.sy);
          $.each(res.sy, function(key, val){
            $('#sy').append('<option value="'+val.sy_id+'">'+val.school_year+'</option>');
          })
        }// end of success ...................
      });//end of ajax ..........
}

$("#birthdate").change(function(){
  var today = new Date();
  var birthDate = new Date($('#birthdate').val());
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
  }
  return $('#age').val(age);
});


  function search_student(){

    $('#searchBtn').click(function(){
      let search = $('#searchVal').val();

      if($('#searchCategory').val() == 0){
        if(search == ""){
          $('.searchResultDiv').html("input value to search");
        }else{
          $.ajax({
            type: "get",
            url: 'getSearchId',
            data:{search:search},
            dataType: "json",
            success: function(data){
              $('.searchResultDiv').html("");//clear the search result
              if(data.res.length > 0){
                $.each(data.res, function(key, val){
                  $('.searchResultDiv').append('<strong><p type="button" id="'+val.en_id+'" class="resultData">'+val.student_id+' - '+val.last_name+' '+val.first_name+' '+val.middle_name+ ' -'+val.student_lrn+'</p></strong><hr>');
                })

                $('.resultData').click(function(){
                  // alert($(this).prop('id'));
                  $('#updateForm')[0].reset();
                  $('#modalSearch').modal('toggle');
                  $('#searchVal').val('');
                  $('.searchResultDiv').html("");
                  let en_id = $(this).prop('id');

                  $.ajax({
                    type: "get",
                    url: 'getSearchData',
                    data:{en_id:en_id},
                    dataType: "json",
                    success: function(data){
                      // console.log(data);
                      $('#updateForm').show(function(){
                        $('#enrollmentForm').hide();
                        $('#updateForm input').attr('readonly', 'readonly');
                        $('#updateForm select').attr('readonly', 'readonly');
                        $('#edit_lrn').val(data.stud.student_lrn);
                        $('#edit_first_name').val(data.stud.first_name);
                        $('#edit_middle_name').val(data.stud.middle_name);
                        $('#edit_last_name').val(data.stud.last_name);
                        $('#edit_ext').val(data.stud.ext);
                        $('#edit_sex option[value="'+data.stud.sex+'"]').attr("selected", "selected");
                        $('#edit_birthdate').val(data.stud.birthdate);
                        $('#edit_citizenship option[value="'+data.stud.citizenship+'"]').attr("selected", "selected");
                        $('#edit_religion option[value="'+data.stud.religion+'"]').attr("selected", "selected");
                        $('#edit_cell_no').val(data.stud.phone_no);
                        $('#edit_tel_no').val(data.stud.tel_no);
                        $('#edit_email').val(data.stud.email_address);
                        $('#edit_facebook').val(data.stud.facebook_name);
                        $('#edit_religion option[value="'+data.stud.religion+'"]').attr("selected", "selected");
                        $('#edit_with_special_need').val(data.stud.with_special_need);
                        $('#edit_special_need').val(data.stud.special_need);
                        $('#edit_is_4ps option[value="'+data.stud.is_4ps_beneficiary+'"]').attr("selected", "selected");
                        $('#edit_household_no').val(data.stud.household_no);
                        $('#edit_p_province option[value="'+data.stud.p_province+'"]').attr("selected", "selected");
                        $('#edit_p_municipality option[value="'+data.stud.p_municipality+'"]').attr("selected", "selected");
                        $('#edit_p_barangay').val(data.stud.p_baranggay);
                        $('#edit_p_blk_lot_st').val(data.stud.p_blk_lot_st);
                        $('#edit_p_zip_code').val(data.stud.p_zip_code);
                        $('#edit_c_province option[value="'+data.stud.c_province+'"]').attr("selected", "selected");
                        $('#edit_c_municipality option[value="'+data.stud.c_municipality+'"]').attr("selected", "selected");
                        $('#edit_c_barangay').val(data.stud.c_baranggay);
                        $('#edit_c_blk_lot_st').val(data.stud.c_blk_lot_st);
                        $('#edit_c_zip_code').val(data.stud.c_zip_code);
                      })
                    }
                  })


                })
      
              }else{
                $('.searchResultDiv').append('<p> no data found</p>');
              }


        
            },
            complete: function(){
            
            }// end of success ...................
          });//end of ajax ..........
        }
      }else{
        if(search == ""){
        $('.searchResultDiv').html("input value to search");
        }else{
          $.ajax({
            type: "get",
            url: 'getSearchName',
            data:{search:search},
            dataType: "json",
            success: function(data){
              $('.searchResultDiv').html("");//clear the search result
              if(data.res.length > 0){
                $.each(data.res, function(key, val){
                  $('.searchResultDiv').append('<strong><p type="button" id="'+val.en_id+'" class="resultData">'+val.student_id+' - '+val.last_name+' '+val.first_name+' '+val.middle_name+ ' -'+val.student_lrn+'</p></strong><hr>');
                })
              }else{
                $('.searchResultDiv').append('<p> no data found</p>');
              }

              $('.resultData').click(function(){
                // alert($(this).prop('id'));
              })
        
            }// end of success ...................
          });//end of ajax ..........
        }
        
      }




   
    })
  }

</script>
