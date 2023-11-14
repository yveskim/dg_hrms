
<style>
    .top_line{
        border-bottom: 2px solid lightgray;
        /* padding-top: 15px; */
    }

    .profile_pic{
        min-height: 5rem;
    }

</style>

<form class="form" action="#" method="post" id="edit_form"></form>
    <div class="row">
    <div class="col-9">
        <h4>Personal Information</h4>
    </div>
    <div class="col-3">
        <button class="btn btn-info full-size" id="btnEditInfo" type="button" name="button">Edit</button>
        <button class="btn btn-warning full-size" id="btn-update-info" type="submit" name="btn-submit" form="edit_form">Update</button>
    </div>
    </div><hr>

    <div class="row basic-info-div">
        <div class="col-md-12">
            <div class="row top_line">
                <div class="col-md-3 mb-4">
                    <label for="student_id">School ID</label>
                    <input type="text" readonly class="form-control form-control-sm" id="student_id" name="student_id"  form="edit_form">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="student_lrn">Student LRN (<i>12 digits</i>) </label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="LRN should be unique and no equivalent in other learners. If there is an error on your LRN, leave it blank and verify it to the program head of the program you applied. Bring your SF10."></i></span><span class="required_field">*</span>
                    <input type="text" class="form-control form-control-sm" id="student_lrn" name="student_lrn"  form="edit_form"  pattern=".{12,12}" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                </div>
            </div>
            <div class="row top_line">
        
                <div class="col-md-4 mb-4">
                    <label for="firstName">First Name <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="firstName" name="firstName"  form="edit_form">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="middleName">Middle Name</label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="If middle name is not available, leave it blank"></i></span>
                    <input type="text" class="form-control form-control-sm" id="middleName" name="middleName"  form="edit_form">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="lastName">Last Name </label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="For name extensions, please follow the format in your PSA. If your name extension resides after your first name, encode it after your first name, same goes if it resides after your last name. "></i></span><span class="required_field">*</span>
                    <input type="text" class="form-control form-control-sm" id="lastName" name="lastName"  form="edit_form">
                </div>
            </div>

            <div class="row top_line">
                
                <div class="col-md-3 mb-4">
                    <label for="sex">Sex <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm form-select" id="sex" name="sex" form="edit_form">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="birthDate">Birth Date <span class="required_field">*</span></label>
                    <input type="date" class="form-control form-control-sm" id="birthDate" name="birthDate"  form="edit_form">
                </div>

                <div class="col-md-6 mb-4">
                    <label for="birthPlace">Birth Place <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="birthPlace" name="birthPlace"  form="edit_form">
                </div>

            </div>
            
        </div>
        <!-- end of col -->
        <!-- end of col -->
        <!-- end of col -->
        <div class="col-md-12">
            <div class="row top_line">

                <div class="col-md-4 mb-4">
                    <label for="psaBirthNo">PSA Birth Cert. No. </label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="You can find it in your PSA birth certificate in the bottom middle part labeled (BReN). If it's not there, leave it blank"></i></span><span class="required_field">*</span>
                    <input type="text" class="form-control form-control-sm" id="psaBirthNo" name="psaBirthNo"  form="edit_form">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="citizenship">Citizenship <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm citizenship" name="citizenship" id="citizenship" form="edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=citizenship]').show().prop('disabled', false).focus();$(this).val(null);}">
                        <option value=""></option>
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
                    <input placeholder="please type" class="form-control form-control-sm citizenship2" name="citizenship" form="edit_form" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=citizenship]').show().prop('disabled', false).focus();}">
                </div>
          
                <div class="col-md-4 mb-4">
                    <label for="religion">Religion</label>
                    <select class="form-control form-control-sm religion" name="religion" id="religion"  form="edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=religion]').show().prop('disabled', false).focus();$(this).val(null);}">
                        <option value=""></option>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Evangelical">Evangelical</option>
                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                        <option value="Aglipayan">Aglipayan</option>
                        <option value="Baptist">Baptist</option>
                        <option value="Protestant">Protestant</option>
                        <option value="Pentecostal">Pentecostal</option>
                        <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                        <option value="Islam">Islam</option>
                        <option value="other">Other</option>
                    </select>
                    <input placeholder="please type" class="form-control form-control-sm religion2"  name="religion" form="edit_form" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=religion]').show().prop('disabled', false).focus();}">
                </div>
            </div>
            <div class="row top_line">

                <div class="col-md-4 mb-4">
                    <label for="mother_tongue">Mother Tongue</label>
                    <select class="form-control form-control-sm mother_tongue" name="mother_tongue" id="mother_tongue" form="edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=mother_tongue]').show().prop('disabled', false).focus();$(this).val(null);}">
                    <option value=""></option>
                    <option value="Hiligaynon">Hiligaynon</option>
                    <option value="English">English</option>
                    <option value="Tagalog">Tagalog</option>
                    <option value="Bisaya">Bisaya</option>
                    <option value="Kinaray-a">Kinaray-a</option>
                    <option value="Bicolano">Bicolano</option>
                    <option value="other">other</option>
                    </select>
                    <input placeholder="please type" class="form-control form-control-sm mother_tongue2" name="mother_tongue" form="edit_form" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=mother_tongue]').show().prop('disabled', false).focus();}">
                </div>

                <div class="col-md-2 mb-4">
                    <label for="bloodType">Blood Type</label>
                    <input type="text" class="form-control form-control-sm" id="bloodType" name="bloodType"  form="edit_form">
                </div>

                <div class="col-md-2 mb-4">
                    <label for="height">Height</label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="Input data in centimeter. Write the number only."></i></span>
                    <input type="text" class="form-control form-control-sm" id="height" name="height"  form="edit_form">
                </div>

                <div class="col-md-2 mb-4">
                    <label for="weight">Weight</label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="Input data in kilograms. Write the number only."></i></span>
                    <input type="text" class="form-control form-control-sm" id="weight" name="weight"  form="edit_form">
                </div>
            </div>

            <div class="row top_line">
                
                <div class="col-md-3 mb-4">
                    <label for="phoneNo">Phone No.</label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="You can input a maximum of two mobile numbers seperated by a (/) symbol. ex. 090123456789/090987654321"></i></span><span class="required_field">*</span>
                    <input type="text" class="form-control form-control-sm" id="phoneNo" name="phoneNo"  form="edit_form">
                </div>

                <div class="col-md-3 mb-4">
                    <label for="telNo">Tel No. <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="telNo" name="telNo"  form="edit_form">
                </div>

                <div class="col-md-6 mb-4">
                    <label for="emailAdd">Email Address <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="emailAdd" name="emailAdd"  form="edit_form">
                </div>
                
            
            </div>

            <div class="row top_line">
                <div class="col-md-5 mb-4">
                    <label for="fbName">Facebook Name / Link</label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="You can copy a link from your facebook page and paste it here, or write the complete name of your facebook profile."></i></span>
                    <input type="text" class="form-control form-control-sm" id="fbName" name="fbName"  form="edit_form">
                </div>

                <div class="col-md-3 mb-4">
                    <label for="lwd">Is LWD? <span class="required_field">*</span></label>
                    <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover" title="Info" data-content="LWD means Learners With Disability. ex. blind, deaf, mute, immobility(can't walk), amputation(can't use the arms), or similar physical and mental disabilities."></i></span>
                    <select class="form-control form-control-sm" name="lwd" id="lwd" form="edit_form">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label for="specialNeeds">If Yes, Select Disability</label>
                    <select class="form-control form-control-sm specialNeeds" name="specialNeeds" id="specialNeeds" form="edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=specialNeeds]').show().prop('disabled', false).focus();$(this).val(null);}">
                        <option value="">--select--</option>
                        <option value="Intellectual Dissability">Intellectual Dissability</option>
                        <option value="Multiple Dissability">Multiple Dissability</option>
                        <option value="Orthopedic Physical-Handicap">Orthopedic Physical-Handicap</option>
                        <option value="Speech / Language Disorder">Speech / Language Disorder</option>
                        <option value="Speech Health Problem / Chronic Disease">Speech Health Problem / Chronic Disease</option>
                        <option value="Visual Impairment">Visual Impairment</option>
                        <option value="other">other</option>
                    </select>
                    <input placeholder="please type" class="form-control form-control-sm specialNeeds2"  name="specialNeeds" form="edit_form" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=specialNeeds]').show().prop('disabled', false).focus();}">
                </div>
            </div>
        </div>
    </div>
 

</div>



<script>
 

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $(document).ready(function(){
        loadStudentProfile();
        $('#btn-update-info').hide();
        disableForm(true);
        if($('#is_student').val() == true){
            $('#downloadImage').hide();
        }


        $('#btnEditInfo').click(function(){
            $('#btnEditInfo').hide();
            $('#btn-update-info').show();
            disableForm(false);
            $('.specialNeeds2').hide();
            $('.specialNeeds').show();
            $('.citizenship2').hide();
            $('.citizenship').show();
            $('.religion2').hide();
            $('.religion').show();
            $('.mother_tongue2').hide();
            $('.mother_tongue').show();
        });
    })

    function checkIfEnrolled(){
        let en_id = $('.en_id').val();
        $.ajax({
            url: 'checkIfEnrolled',
            method: 'get',
            dataType: 'json',
            data:{en_id:en_id},
            success: function(data){
        

            }
        })
    }
        
    $('#edit_form').submit(function(event){
        event.preventDefault();
        let en_id = $('.en_id').val();
        let formData = new FormData(this);
        formData.append('en_id', en_id);
        $.ajax({
            url: 'updateStudentInfo',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
              $('#btnEditInfo').show();
              $('#btn-update-info').hide();
              disableForm(true);
              if (res.status == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'Update Successful',
                    text: 'Record has been updated successfully',
                    showConfirmButton: true
                });
                loadStudentProfile();
              }else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Update Failed',
                    text: res.message,
                    showConfirmButton: true
                });
                loadStudentProfile();
              }
            },
            complete: function(){
                $('.specialNeeds2').prop("disabled", true);
                $('.citizenship2').prop("disabled", true);
                $('.religion2').prop("disabled", true);
                $('.mother_tongue2').prop("disabled", true);
                
            }
        });
    })

    function disableForm(status){
      $('#student_id').prop("disabled", status);
      $('#student_lrn').prop("disabled", status);
      
     
        if($('#is_student').val() == true){
            $('#firstName').prop("readOnly", true);
            $('#middleName').prop("readOnly", true);
            $('#lastName').prop("readOnly", true);
            
            $('#sex').css('pointer-events','none');
            $('#sex').css('background-color','#eaeaea');
        }else{
            $('#firstName').prop("disabled", status);
            $('#middleName').prop("disabled", status);
            $('#lastName').prop("disabled", status);
            $('#sex').prop("disabled", status);
        }
      
      $('#birthDate').prop("disabled", status);
      $('#birthPlace').prop("disabled", status);
      $('#psaBirthNo').prop("disabled", status);

      $('.citizenship').prop("disabled", status);
      $('.religion').prop("disabled", status);
      $('.mother_tongue').prop("disabled", status);
      $('#bloodType').prop("disabled", status);
      $('#height').prop("disabled", status);

      $('#weight').prop("disabled", status);
      $('#phoneNo').prop("disabled", status);
      $('#telNo').prop("disabled", status);
      $('#emailAdd').prop("disabled", status);

      $('#fbName').prop("disabled", status);
      $('#lwd').prop("disabled", status);
      $('.specialNeeds').prop("disabled", status);
    }

  function loadStudentProfile(){
    let en_id = $('.en_id').val();
    $.ajax({
      url: 'loadEnrolleeProfile',
      method: 'get',
      dataType: 'json',
      data:{en_id:en_id},
      success: function(data){
        // console.log(data);
        $('#stud_sch_id').text(data.stud.student_id);
        $('#downloadImage').prop({'href':'upload/student_files/student_images/'+data.stud.student_image, 'download':data.stud.last_name+','+ data.stud.first_name+'.jpg'} );
        if(data.stud.student_image == null || data.stud.student_image == ""){
            $(".profile_pic").prop('src', 'upload/system_file/noimage.png');
        }else{
            $(".profile_pic").prop('src', 'upload/student_files/student_images/'+data.stud.student_image);
        }
        $("#student_id").val(data.stud.student_id);
        $("#student_lrn").val(data.stud.student_lrn);
        $('#firstName').val(data.stud.first_name);
        $('#middleName').val(data.stud.middle_name);
        $('#lastName').val(data.stud.last_name);
      
        $('#sex').val(data.stud.sex);
        $('#birthDate').val(data.stud.birthdate);
        $('#birthPlace').val(data.stud.birth_place);
        $('#psaBirthNo').val(data.stud.psa_birth_certificate_no);

        // $('.citizenship').val(data.stud.citizenship);
        if( $('.citizenship option[value="'+data.stud.citizenship+'"]').length > 0){
            $('.citizenship').val(data.stud.citizenship);
        }else{
            let otherVal = new Option(data.stud.citizenship, data.stud.citizenship);
            $(otherVal).html(data.stud.citizenship);
            $(".citizenship").append(otherVal);
            $('.citizenship').val(data.stud.citizenship);
        }

        // $('.religion').val(data.stud.religion);
        $('.religion').val(data.stud.religion);
        if( $('.religion option[value="'+data.stud.religion+'"]').length > 0){
            $('.religion').val(data.stud.religion);
        }else{
            let otherVal = new Option(data.stud.religion, data.stud.religion);
            $(otherVal).html(data.stud.religion);
            $(".religion").append(otherVal);
            $('.religion').val(data.stud.religion);
        }


        // $('.mother_tongue').val(data.stud.mother_tongue);
        if( $('.mother_tongue option[value="'+data.stud.mother_tongue+'"]').length > 0){
            $('.mother_tongue').val(data.stud.mother_tongue);
        }else{
            let otherVal = new Option(data.stud.mother_tongue, data.stud.mother_tongue);
            $(otherVal).html(data.stud.mother_tongue);
            $(".mother_tongue").append(otherVal);
            $('.mother_tongue').val(data.stud.mother_tongue);
        }

        $('#bloodType').val(data.stud.blood_type);
        $('#height').val(data.stud.height);

        $('#weight').val(data.stud.weight);
        $('#phoneNo').val(data.stud.phone_no);
        $('#telNo').val(data.stud.tel_no);
        $('#emailAdd').val(data.stud.email_address);

        $('#fbName').val(data.stud.facebook_name);
        $('#lwd').val(data.stud.with_special_need);
        
        if( $('.specialNeeds option[value="'+data.stud.special_need+'"]').length > 0){
            $('.specialNeeds').val(data.stud.special_need);
        }else{
            let otherVal = new Option(data.stud.special_need, data.stud.special_need);
            $(otherVal).html(data.stud.special_need);
            $(".specialNeeds").append(otherVal);
            $('.specialNeeds').val(data.stud.special_need);
        }

      }
    })
  }
    </script>