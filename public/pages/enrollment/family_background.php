<form class="form" action="#" method="post" id="famBg_edit_form"></form>
    <div class="row">
    <div class="col-9">
        <h4>Family Background</h4>
    </div>
    <div class="col-3">
        <button class="btn btn-info full-size" id="fbg-edit-info" type="button" name="button">Edit</button>
        <button class="btn btn-warning full-size" id="fbg-update-info" type="submit" name="btn-submit" form="famBg_edit_form">Update</button>
    </div>
    </div><hr>
    
    <div class="row">
        <div class="col-md-4" style="border-right: 2px solid lightgray;">
            <div class="row">
                <div class="col-md-12"><h5><strong>Father</strong></h5></div>
            </div>
            <hr>
            <input type="hidden" id="new_entry" name="new_entry" form="famBg_edit_form">
            <input type="hidden" id="parent_id" name="parent_id" form="famBg_edit_form">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Father is Deceased</label>
                    <select name="f_is_deceased" id="f_is_deceased" class="form-control form-control-sm" form="famBg_edit_form" >
                        <option value="">-</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="f_first_name" form="famBg_edit_form" id="f_first_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control form-control-sm" name="f_middle_name" form="famBg_edit_form" id="f_middle_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control form-control-sm" name="f_last_name" form="famBg_edit_form" id="f_last_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Highest Educational Attainment</label>
                    <select name="f_education" form="famBg_edit_form" id="f_education" class="form-control form-control-sm">
                        <option value="">--select--</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="College">College</option>
                        <option value="Masters">Masters</option>
                        <option value="Doctoral">Doctoral</option>
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Phone No.</label>
                    <input type="text" class="form-control form-control-sm" name="f_phone" form="famBg_edit_form" id="f_phone">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control form-control-sm" name="f_email" form="famBg_edit_form" id="f_email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Facebook Name/Link</label>
                    <input type="text" class="form-control form-control-sm" name="f_facebook" form="famBg_edit_form" id="f_facebook">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Has Occupation/Work</label>
                    <select name="f_is_working" class="form-control form-control-sm" form="famBg_edit_form" id="f_is_working">
                        <option value="">-</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Father's Employer</label>
                    <select name="f_employer" class="form-control form-control-sm" form="famBg_edit_form" id="f_employer">
                        <option value="">-</option>
                        <option value="Government">Government</option>
                        <option value="Non-Government">Non-Government</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Company Name</label>
                    <input type="text" class="form-control form-control-sm" name="f_company" form="famBg_edit_form" id="f_company">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Father's Monthly Income</label>
                    <select name="f_salary" class="form-control form-control-sm" form="famBg_edit_form" id="f_salary">
                        <option value="">-</option>
                        <option value="0-5000">P0-5,000</option>
                        <option value="5000-10000">P5,000 - 10,000</option>
                        <option value="10000-15000">P10,000 - 15,000</option>
                        <option value="15000-20000">P15,000 - 20,000</option>
                        <option value="20000-30000">P20,000 - 30,000</option>
                        <option value="30000-40000">P30,000 - 40,000</option>
                        <option value="40000-50000">P40,000 - 50,000</option>
                        <option value="50000-60000">P50,000 - 60,000</option>
                        <option value="60000-70000">P60,000 - 70,000</option>
                        <option value="70000-80000">P70,000 - 80,000</option>
                        <option value="80000-90000">P80,000 - 90,000</option>
                        <option value="90000-100000">P90,000 - 100,000</option>
                        <option value="100000 above">Above P100,000</option>
                    </select>
                </div>
            </div>
            <br>
        </div>
        <!-- end father info -->
        <div class="col-md-4" style="border-right: 2px solid lightgray;">
            <div class="row">
                <div class="col-md-12"><h5><strong>Mother</strong></h5></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Mother is Deceased</label>
                    <select name="m_is_deceased" id="m_is_deceased" class="form-control form-control-sm" form="famBg_edit_form" >
                        <option value="">-</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="m_first_name" form="famBg_edit_form" id="m_first_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control form-control-sm" name="m_middle_name" form="famBg_edit_form" id="m_middle_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control form-control-sm" name="m_last_name" form="famBg_edit_form" id="m_last_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Highest Educational Attainment</label>
                    <select name="m_education" form="famBg_edit_form" id="m_education"   class="form-control form-control-sm">
                        <option value="">--select--</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="College">College</option>
                        <option value="Masters">Masters</option>
                        <option value="Doctoral">Doctoral</option>
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Phone No.</label>
                    <input type="text" class="form-control form-control-sm" name="m_phone" form="famBg_edit_form" id="m_phone">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control form-control-sm" name="m_email" form="famBg_edit_form" id="m_email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Facebook Name/Link</label>
                    <input type="text" class="form-control form-control-sm" name="m_facebook" form="famBg_edit_form" id="m_facebook">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">has Occupation/Work</label>
                    <select name="m_is_working" class="form-control form-control-sm" form="famBg_edit_form" id="m_is_working">
                        <option value="">-</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Mother's Employer</label>
                    <select name="m_employer" class="form-control form-control-sm" form="famBg_edit_form" id="m_employer">
                        <option value="">-</option>
                        <option value="Government">Government</option>
                        <option value="Non-Government">Non-Government</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Company Name</label>
                    <input type="text" class="form-control form-control-sm" name="m_company" form="famBg_edit_form" id="m_company">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Mother's Monthly Income</label>
                    <select name="m_salary" class="form-control form-control-sm" form="famBg_edit_form" id="m_salary">
                        <option value="">-</option>
                        <option value="0-5000">P0-5,000</option>
                        <option value="5000-10000">P5,000 - 10,000</option>
                        <option value="10000-15000">P10,000 - 15,000</option>
                        <option value="15000-20000">P15,000 - 20,000</option>
                        <option value="20000-30000">P20,000 - 30,000</option>
                        <option value="30000-40000">P30,000 - 40,000</option>
                        <option value="40000-50000">P40,000 - 50,000</option>
                        <option value="50000-60000">P50,000 - 60,000</option>
                        <option value="60000-70000">P60,000 - 70,000</option>
                        <option value="70000-80000">P70,000 - 80,000</option>
                        <option value="80000-90000">P80,000 - 90,000</option>
                        <option value="90000-100000">P90,000 - 100,000</option>
                        <option value="100000 above">Above P100,000</option>
                    </select>
                </div>
            </div>
            <br>

        </div>
        <!-- end mother info -->

        <div class="col-md-4" >
            <div class="row">
                <div class="col-md-12"><h5><strong>Guardian</strong></h5></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for="">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="g_first_name" form="famBg_edit_form" id="g_first_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control form-control-sm" name="g_middle_name" form="famBg_edit_form" id="g_middle_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control form-control-sm" name="g_last_name" form="famBg_edit_form" id="g_last_name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Highest Educational Attainment</label>
                    <select name="g_education" form="famBg_edit_form" id="g_education" class="form-control form-control-sm">
                        <option value="">--select--</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="College">College</option>
                        <option value="Masters">Masters</option>
                        <option value="Doctoral">Doctoral</option>
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Phone No.</label>
                    <input type="text" class="form-control form-control-sm" name="g_phone" form="famBg_edit_form" id="g_phone">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control form-control-sm" name="g_email" form="famBg_edit_form" id="g_email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Facebook Name/Link</label>
                    <input type="text" class="form-control form-control-sm" name="g_facebook" form="famBg_edit_form" id="g_facebook">
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
  
    <div class="row" style="border-top: .5rem solid lightgray; padding-top: 1rem;">
        <div class="col-md-4">
            <label for="is_4ps">Belong to 4P's?</label>
            <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="Is your family a member of 4P's Program of the Government?"></i></span>
            <select name="is_4ps" id="is_4ps" class="form-control form-control-sm" form="famBg_edit_form">
                <option value="0">no</option>
                <option value="1">yes</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="household_no">If Yes, enter your 4P's Household No.</label>
            <input type="text" name="household_no" id="household_no" class="form-control form-control-sm" form="famBg_edit_form">
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <label for="is_ip">Are you an (IP)</label>
            <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="Are you belonging to Indigenious Peoples (IP) Community / Indigenous Cultural Community?"></i></span>
            <select name="is_ip" id="is_ip" class="form-control form-control-sm" form="famBg_edit_form">
                <option value="0">no</option>
                <option value="1">yes</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="ip_community">If Yes, Select IP Community.</label>
            <select class="form-control form-control-sm ip_community" name="ip_community" id="ip_community" form="famBg_edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=ip_community]').show().prop('disabled', false).focus();$(this).val(null);}">
                <option value="">--select--</option>
                <option value="Waray">Waray</option>
                <option value="Lumad">Lumad</option>
                <option value="Aklanon">Aklanon</option>
                <option value="Kinaray-a">Kinaray-a</option>
                <option value="Surigaonon">Surigaonon</option>
                <option value="Capiznon">Capiznon</option>
                <option value="Tboli">Tboli</option>
                <option value="Masbateno">Masbateno</option>
                <option value="Cebuanon">Cebuanon</option>
                <option value="Mangyan">Mangyan</option>
                <option value="Mamamwa">Mamamwa</option>
                <option value="other">Other</option>
            </select>
            <input placeholder="please specify" class="form-control form-control-sm ip_community2" name="ip_community" form="famBg_edit_form" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=ip_community]').show().prop('disabled', false).focus();}">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <label for="financial_provider">Financial Provider</label>
            <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="Choose the financial provider of your studies"></i></span>
            <select class="form-control form-control-sm financial_provider" name="financial_provider" id="financial_provider" form="famBg_edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=financial_provider]').show().prop('disabled', false).focus();$(this).val(null);}">
                <option value="">--select--</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Both Parents">Both Parents</option>
                <option value="Grand Parents">Grand Parents</option>
                <option value="other">Other</option>
            </select>
            <input placeholder="please specify" class="form-control form-control-sm financial_provider2" name="financial_provider" form="famBg_edit_form" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=financial_provider]').show().prop('disabled', false).focus();}">

        </div>
        <div class="col-md-5">
            <label for="instructional_provider">Instructional Provider</label>
            <span><i class="fa fa-exclamation-circle" type="button" data-toggle="popover"  title="Info" data-content="Choose the instructional provider of your studies"></i></span>
            <select class="form-control form-control-sm instructional_provider" name="instructional_provider" id="instructional_provider" form="famBg_edit_form" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=instructional_provider]').show().prop('disabled', false).focus();$(this).val(null);}">
                <option value="">--select--</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Both Parents">Both Parents</option>
                <option value="Grand Parents">Grand Parents</option>
                <option value="other">Other</option>
            </select>
            <input placeholder="please specify" class="form-control form-control-sm instructional_provider2" name="instructional_provider" form="famBg_edit_form" style="display:none;" disabled="true" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=instructional_provider]').show().prop('disabled', false).focus();}">

        </div>
  
    </div>

    <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="">Family Business (Write the nature of the business. Leave blank if none )</label>
                <input type="text" name="family_business" id="family_business" class="form-control form-control-sm" form="famBg_edit_form">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label for="">Distance of school from home (in kilometers)</label>
                <input type="text" name="home_distance" id="home_distance" class="form-control form-control-sm" form="famBg_edit_form">
            </div>
            <div class="col-md-6">
                <label for="">Daily Means of Transportation</label>
                <select name="transportation" id="transportation" class="form-control form-control-sm" form="famBg_edit_form">
                    <option value=""></option>
                    <option value="PUV">PUV (Buss/Jeepney/Van)</option>
                    <option value="Family Owned Vehicle">Family Owned Vehicle</option>
                    <option value="Personal Vehicle">Personal Vehicle (Car/Motorbike/Tricycle)</option>
                    <option value="Taxi">Taxi</option>
                    <option value="Bike">Bike/E-Bike/Scooter/Skateboards/etc.</option>
                    <option value="Walking">Walking</option>
                </select>
            </div>
        </div>





    <br><br><br><br><br><br><br>

    <script>

$(function () {
  $('[data-toggle="popover"]').popover()
})


    $(document).ready(function(){
        loadFamilyBackground();
        $('#fbg-update-info').hide();
        disableForm(true);

        $('#fbg-edit-info').click(function(){
            $('#fbg-edit-info').hide();
            $('#fbg-update-info').show();
            disableForm(false);
            $('.ip_community2').hide();
            $('.ip_community').show();
            $('.financial_provider2').hide();
            $('.financial_provider').show();
            $('.instructional_provider2').hide();
            $('.instructional_provider').show();
        });

        if($('#is_student').val() == true){
            $('#fbg-edit-info').prop('disabled', true);
        }else{
            $('#fbg-edit-info').prop('disabled', false);
        }
    })
        
    $('#famBg_edit_form').submit(function(event){
        event.preventDefault();
        let en_id = $('.en_id').val();
        let formData = new FormData(this);
        formData.append('en_id', en_id);
        $.ajax({
            url: 'updateFamilyBg',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
              $('#btn-edit-info').show();
              $('#btn-update-info').hide();
              disableForm(true);
                if (res.status == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Save Successfull',
                    text: 'Record has been saved',
                    showConfirmButton: true
                });
                loadFamilyBackground();
                $('#fbg-edit-info').show();
                $('#fbg-update-info').hide();
                }else if(res.status == 2){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update Successful',
                        text: 'Record has been updated',
                        showConfirmButton: true
                    });
                    loadFamilyBackground();
                    $('#fbg-edit-info').show();
                    $('#fbg-update-info').hide();
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Action Failed',
                        text: res.message,
                        showConfirmButton: true
                    });
                }//end ifelse
            },
            complete: function(){
                $('.ip_community2').prop("disabled", true);
                $('.financial_provider2').prop("disabled", true);
                $('.instructional_provider2').prop("disabled", true);
                
            }
        });
    })

    function disableForm(status){
      $('#f_is_deceased').prop("disabled", status);
      $('#f_first_name').prop("disabled", status);
      $('#f_middle_name').prop("disabled", status);
      $('#f_last_name').prop("disabled", status);
      $('#f_education').prop("disabled", status);
      $('#f_phone').prop("disabled", status);
      $('#f_email').prop("disabled", status);
      $('#f_facebook').prop("disabled", status);
      $('#f_is_working').prop("disabled", status);
      $('#f_employer').prop("disabled", status);
      $('#f_company').prop("disabled", status);
      $('#f_salary').prop("disabled", status);

      
      $('#m_is_deceased').prop("disabled", status);
      $('#m_first_name').prop("disabled", status);
      $('#m_middle_name').prop("disabled", status);
      $('#m_last_name').prop("disabled", status);
      $('#m_education').prop("disabled", status);
      $('#m_phone').prop("disabled", status);
      $('#m_email').prop("disabled", status);
      $('#m_facebook').prop("disabled", status);
      $('#m_is_working').prop("disabled", status);
      $('#m_employer').prop("disabled", status);
      $('#m_company').prop("disabled", status);
      $('#m_salary').prop("disabled", status);

      $('#g_first_name').prop("disabled", status);
      $('#g_middle_name').prop("disabled", status);
      $('#g_last_name').prop("disabled", status);
      $('#g_education').prop("disabled", status);
      $('#g_phone').prop("disabled", status);
      $('#g_email').prop("disabled", status);
      $('#g_facebook').prop("disabled", status);

      $('#is_4ps').prop("disabled", status);
      $('#household_no').prop("disabled", status);
      $('#is_ip').prop("disabled", status);
      $('.ip_community').prop("disabled", status);
      $('.financial_provider').prop("disabled", status);
      $('.instructional_provider').prop("disabled", status);
      
      $('#family_business').prop("disabled", status);
      $('#home_distance').prop("disabled", status);
      $('#transportation').prop("disabled", status);
    }

  function loadFamilyBackground(){
    let en_id = $('.en_id').val();
    $.ajax({
      url: 'loadFamilyBg',
      method: 'get',
      dataType: 'json',
      data:{en_id:en_id},
      success: function(data){
        // console.log(data);
        if(data.bg == null){
            $('#new_entry').val(1);
        }else{
            $('#new_entry').val(0);
            $("#parent_id").val(data.bg.parent_id);
            $("#f_is_deceased").val(data.bg.f_is_deceased);
            $("#f_first_name").val(data.bg.f_fname);
            $("#f_middle_name").val(data.bg.f_mname);
            $("#f_last_name").val(data.bg.f_lname);
            $("#f_education").val(data.bg.f_highest_education);
            $("#f_phone").val(data.bg.f_contact);
            $("#f_email").val(data.bg.f_email);
            $("#f_facebook").val(data.bg.f_facebook);
            $('#f_is_working').val(data.bg.f_is_working);
            $('#f_employer').val(data.bg.f_employer);
            $('#f_company').val(data.bg.f_company);
            $('#f_salary').val(data.bg.f_salary);

            $("#m_is_deceased").val(data.bg.m_is_deceased);
            $("#m_first_name").val(data.bg.m_fname);
            $("#m_middle_name").val(data.bg.m_mname);
            $("#m_last_name").val(data.bg.m_lname);
            $("#m_education").val(data.bg.m_highest_education);
            $("#m_phone").val(data.bg.m_contact);
            $("#m_email").val(data.bg.m_email);
            $("#m_facebook").val(data.bg.m_facebook);
            $('#m_is_working').val(data.bg.m_is_working);
            $('#m_employer').val(data.bg.m_employer);
            $('#m_company').val(data.bg.m_company);
            $('#m_salary').val(data.bg.m_salary);

            $("#g_first_name").val(data.bg.g_fname);
            $("#g_middle_name").val(data.bg.g_mname);
            $("#g_last_name").val(data.bg.g_lname);
            $("#g_education").val(data.bg.g_highest_education);
            $("#g_phone").val(data.bg.g_contact);
            $("#g_email").val(data.bg.g_email);
            $("#g_facebook").val(data.bg.g_facebook);

            $('#is_4ps').val(data.bg.is_4ps);
            $('#household_no').val(data.bg.household_no);
            $('#is_ip').val(data.bg.is_ip);

            $('#family_business').val(data.bg.family_business);
            $('#home_distance').val(data.bg.home_distance);
            $('#transportation').val(data.bg.transportation);

            // $('#ip_community').val(data.bg.ip_community);
            if( $('.ip_community option[value="'+data.bg.ip_community+'"]').length > 0){
            $('.ip_community').val(data.bg.ip_community);
            }else{
                let otherVal = new Option(data.bg.ip_community, data.bg.ip_community);
                $(otherVal).html(data.bg.ip_community);
                $(".ip_community").append(otherVal);
                $('.ip_community').val(data.bg.ip_community);
            }

            // $('#financial_provider').val(data.bg.financial_provider);
            if( $('.financial_provider option[value="'+data.bg.financial_provider+'"]').length > 0){
            $('.financial_provider').val(data.bg.financial_provider);
            }else{
                let otherVal = new Option(data.bg.financial_provider, data.bg.financial_provider);
                $(otherVal).html(data.bg.financial_provider);
                $(".financial_provider").append(otherVal);
                $('.financial_provider').val(data.bg.financial_provider);
            }

            // $('#instructional_provider').val(data.bg.instructional_provider);
            if( $('.instructional_provider option[value="'+data.bg.instructional_provider+'"]').length > 0){
            $('.instructional_provider').val(data.bg.instructional_provider);
            }else{
                let otherVal = new Option(data.bg.instructional_provider, data.bg.instructional_provider);
                $(otherVal).html(data.bg.instructional_provider);
                $(".instructional_provider").append(otherVal);
                $('.instructional_provider').val(data.bg.instructional_provider);
            }

        }

      
      }
    })
  }
    </script>