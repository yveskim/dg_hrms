<style media="screen">
  .agreement {
    float: right;
    width: 2rem;
    height: 2rem;
  }

  .error {
    color: red;
  }

  .agreement-content {
    text-align: justify;
  }

  .btn-menu {
    height: 5em;
    width: 100%;
    padding: 5%;
  }


  .div-content {
    margin-left: 10%;
    margin-top: 5%;
  }

  @media (prefers-reduced-motion: reduce) {
    .fade {
      transition: none;
    }
  }

  .faded {
    opacity: .9;
  }

  .btn-wide {
    height: 6em;
  }

  #btn-proceed {
    font-size: 2.5em;
  }

  .spiner-div {
    position: fixed;
    top: 0;
    left: 0;
    padding-left: 45%;
    padding-top: 10%;
    width: 100%;
    height: 100%;
    background-color: rgb(10, 10, 10, .5);
  }

  .btn-submit {
    width: 100%;
    height: 6em;
  }

  .jhs_prog,
  .shs_prog {
    padding-left: 10%;
  }

  .btn-gray {
    background-color: gray;
    color: white;
    border-radius: 1em;
  }

  .basic-info {
    background-color: gray;
    color: white;
    padding: .5em;
    border-radius: .5em;
    text-align: center;
  }

  .form-section,
  h1,
  p,
  h2,
  h3,
  h4,
  h5 {
    font-family: sans-serif;
  }

  .form-section,
  label,
  p {
    font-size: 1rem;
  }

  /*hides the carousel*/
  .carousel {
    display: none;
    visibility: hidden;
  }

  input:not(#email) {
    text-transform: uppercase;
  }
</style>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!--start-->





<section class="form-section">

  <div class="card">
    <div class="card-body p-4 p-md-5 div-content">
      <form class="" action="" method="" id="admission_form">
        <div class="row">
          <div class="col-md-12">
            <h3><strong> Create Account for Pre-registration</strong></h3>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-12">
            <h5><strong>Step 1.</strong></h5>
            <p> Fill in your basic information. Complete the details, read the agreement, check recaptcha and submit the form. </p>
          </div>
          <hr>
        </div><br>

        <div class="row">
          <div class="col-12 mb-4 basic-info">
            <h4>Basic Information</h4>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-4">
            <label class="form-label" for="stud_lrn">Learners Identification Number (LRN)</label>
            <input type="text" id="stud_lrn" name="stud_lrn" class="form-control form-control-lg" required>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-4">
            <label class="form-label" for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" required>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-4">
            <label class="form-label" for="middlename">Middle Name <i>(Write na if not applicable)</i> </label>
            <input type="text" id="middlename" name="middlename" class="form-control form-control-lg" required>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-4">
            <label class="form-label" for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" class="form-control form-control-lg" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <label class="form-label" for="birthdate">Birthday</label>
            <input type="date" id="birthdate" name="birthdate" class="form-control form-control-lg" required>
          </div>

          <div class="col-md-6 mb-4">
            <label class="form-label" for="gender">Gender: </label>
            <div class="row" style="border: 1px solid gray; padding: .2rem; background-color: lightgray; border-radius: 1rem;">
              <div class="col-md-6" style="text-align: center;">
                <input class="gender form-control" type="radio" name="gender" id="femaleGender" value="Female">
                <label class="form-check-label" for="femaleGender">Female</label>
              </div>
              <div class="col-md-6" style="text-align: center;">
                <input class="gender form-control" type="radio" name="gender" id="maleGender" value="Male">
                <label class="form-check-label" for="maleGender">Male</label>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-4 ">
            <label class="form-label" for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control form-control-lg" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-4 ">
            <label class="form-label email-label" for="email">Email Address <i>(Note: Make sure that the email is valid and accessible.)</i> </label><br>
            <input type="email" id="email" name="email" class="form-control form-control-lg" required>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-12">
            <h4>Permanent Address</h4>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-4 mb-4">
            <label class="form-label" for="per_province">Province</label>
            <select class="form-control form-control-lg" name="per_province" id="per_province" required>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <label class="form-label" for="per_city">Municipality/City</label>
            <select class="form-control form-control-lg" name="per_city" id="per_city" required>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <label class="form-label" for="per_barangay">Barangay/District</label>
            <input type="text" id="per_barangay" name="per_barangay" class="form-control form-control-lg">
          </div>

        </div>

        <div class="row">

          <div class="col-md-6 mb-4">
            <label class="form-label" for="per_subdivision">Compound/Subdivision/Village</label>
            <input type="text" id="per_subdivision" name="per_subdivision" class="form-control form-control-lg">
          </div>
          <div class="col-md-6 mb-4">
            <label class="form-label" for="per_street">Bldg No./Blk. lot/Street</label>
            <input type="text" id="per_street" name="per_street" class="form-control form-control-lg">
          </div>
        </div>

        <hr>


        <div class="row">
          <div class="col-md-12">
            <h4>Present Address <i>
                <h6>(If you are boarding/renting or living outside your permanent address)</h6>
              </i> </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-4-md mb-4">
            <button class="btn-gray" type="button" name="button" id="btnCopyAddress">Copy Above</button>&nbsp;<span><i>Click here if address is the same as above </i></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <label class="form-label" for="cur_province">Province</label>
            <select class="form-control form-control-lg" name="cur_province" id="cur_province" required>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <label class="form-label" for="cur_city">Municipality/City</label>
            <select class="form-control form-control-lg" name="cur_city" id="cur_city" required>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <label class="form-label" for="cur_barangay">Barangay/District</label>
            <input type="text" id="cur_barangay" name="cur_barangay" class="form-control form-control-lg">
          </div>

        </div>

        <div class="row">

          <div class="col-md-6 mb-4">
            <label class="form-label" for="cur_subdivision">Compound/Subdivision/Village</label>
            <input type="text" id="cur_subdivision" name="cur_subdivision" class="form-control form-control-lg">
          </div>
          <div class="col-md-6 mb-4">
            <label class="form-label" for="cur_street">Bldg No./Blk. lot/Street</label>
            <input type="text" id="cur_street" name="cur_street" class="form-control form-control-lg">
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-12">
            <label for="">Data Privacy Agreement</label>
          </div>
        </div>
        <div class="row" style="background-color: rgb(255, 205, 69); padding: 1rem; border-radius: 1rem;">
          <div class="col-1">
            <input type="checkbox" class="form-check-input form-check-lg agreement" name="agreement" value="1">
          </div>
          <div class="col-10">
            <p for="" class="agreement-content">
              I/We hereby authorize Iloilo National High School to retain, process, disseminate and record all
              my personal data in any way the School deems necessary. Further, I state my consent to
              and understanding that this information may be used by the school to communicate, either
              by post, telephone, mobile text, email or any other way, with me regarding any services,
              offers and notifications at a later date. In the event that I do not wish to be contacted
              further, I shall inform the school accordingly.
            </p>
          </div>
        </div>
        <hr>
        <center>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-12 mb-4">
              <div class="g-recaptcha" data-sitekey="6LdXJeUdAAAAAB31pu78FLfYT5yTQRE9PvsUXn10" data-callback="recaptchaCallback"></div>
            </div>
          </div>
        </center>
       
        <hr>

        <div class="row">
          <div class="col-3"></div>
          <div class="col-md-6 col-sm-4 col-xs-4">
            <div class="mt-4 pt-2">
              <input class="btn btn-secondary btn-lg btn-submit" type="submit" value="Create Account">
            </div>
          </div>
        </div>


    </div>
  </div>

  </div>
  </div>

</section>
<!--end-->
<!-- MDB -->
</form>

<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>



<div class="modal fade" id="modalNotice" tabindex="-1" role="dialog" aria-labelledby="modalNotice" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNoticeTitle">Important!...</h5>
      </div>
      <div class="modal-body">
        <div class="row mb-4">
          <div class="col-md-12">
            <h1> Important To read</h1>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="noticeClose" style="width: 20%;">OK</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="assets/MDB5-STANDARD-UI-KIT-Free-3.9.0/js/mdb.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#modalNotice').modal('toggle');
    $('#noticeClose').click(function() {
      $('#modalNotice').modal('hide');
      // $('.modal-backdrop').remove();
    })

    $("html, body").animate({
      scrollTop: 0
    }, "slow");
    //>>>>>>>> set the city and province selection >>>>>>>>>>
    $('#per_city').prop('disabled', true);
    $('#cur_city').prop('disabled', true);
    getPerProvince();
    getPerMunicipality();
    getCurProvince();
    getCurMunicipality();

    copyAddress(); //function to copy permanent address to current address

    perAddressDisabled(true);
    $('#per_city').change(function() {
      perAddressDisabled(false);
    });

    curAddressDisabled(true);
    $('#cur_city').change(function() {
      curAddressDisabled(false);
    });

    //>>>>>>>> set the city and province selection >>>>>>>>>>


    $('#error-email').hide();
    $('.btn-submit').prop('disabled', true);
    $('.spiner-div').hide();
    // $('.jhs_prog').hide();
    // $('.shs_prog').hide();

    // $('#stud_type').change(function(){
    //   if ($(this).val() == 'JHS') {
    //       $('.jhs_prog').show();
    //       $('.shs_prog').hide();

    //   }else if($(this).val() == 'SHS') {
    //       $('.shs_prog').show();
    //       $('.jhs_prog').hide();
    //   }
    // });

    $('#admission_form').submit(function(event) {
      event.preventDefault();
      var stud_lrn = $('#stud_lrn').val();
      var firstname = $('#firstname').val();
      var middlename = $('#middlename').val();
      var lastname = $('#lastname').val();
      var birthdate = $('#birthdate').val();
      var gender = $("input[name='gender']:checked").val()
      var phoneNumber = $('#phoneNumber').val();
      var email = $('#email').val();
      var per_province = $('#per_province').val();
      var per_city = $('#per_city').val();
      var per_barangay = $('#per_barangay').val();
      var cur_province = $('#cur_province').val();
      var cur_city = $('#cur_city').val();
      var cur_barangay = $('#cur_barangay').val();


      if ($('.agreement').is(':checked')) {
        if (!validateEmail($('#email').val())) {
          scrollElement($('#email'));
          $("#email").after('<span class="error">Enter a valid email address.</span>');
        } else if ($('#email').val() == "") {
          scrollElement($('#email'));
          emailError("please enter an email");
        } else {
          $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'admission/verify_captcha',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
              $('.spiner-div').show();
              $('.div-main').addClass('faded');
            },
            complete: function() {
              $('.spiner-div').hide();
              $('.div-main').removeClass('faded');
            },
            success: function(response) {
              if (response.status == 0) {
                errorToast(response.message);
              } else if (response.status == 1) {
                $('.div-main').load('pages/admission/verification_page.php', function() {
                  //console.log(response);
                  $('#stud_lrn').val(response.stud_lrn);
                  $('#fname').val(response.fname);
                  $('#mname').val(response.mname);
                  $('#lname').val(response.lname);
                  $('#bday').val(response.birthdate);
                  $('#gender option[value=' + response.gender_val + ']').prop('selected', true);
                  $('#phone').val(response.phone);
                  $('#email').val(response.email);
                  $('#cur_street').val(response.cur_street);
                  $('#cur_subdivision').val(response.cur_subdivision);
                  $('#cur_barangay').val(response.cur_barangay);
                  $('#cur_city').val(response.cur_city);
                  $('#cur_province').val(response.cur_province);
                  $('#per_street').val(response.per_street);
                  $('#per_subdivision').val(response.per_subdivision);
                  $('#per_barangay').val(response.per_barangay);
                  $('#per_city').val(response.per_city);
                  $('#per_province').val(response.per_province);
                  $('#refId').val(response.verification_code);

                });
                succToast(response.message);
                $('#admission_form')[0].reset();
              } else if (response.status == 3) {
                //  $('#admission_form')[0].reset();
                captchaError(response.message);
              } else if (response.status == 4) {
                agreementError(response.message);
              } else if (response.status == 5) {
                dataExist(response.message);
                scrollElement($('#email'));
              }


            }
          });
        }
      } else {
        errorToast('please read and accept the data privacy agreement');
      }

    });
  });

  function recaptchaCallback() { //if recaptcha is success it will send a callback and will enable the submit button
    $('.btn-submit').prop('disabled', false);
    $('.btn-submit').removeClass('btn-secondary');
    $('.btn-submit').addClass('btn-success');
  }

  function scrollElement(elem) {
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    var el = elem;
    var elOffset = el.offset().top;
    var elHeight = el.height();
    var windowHeight = $(window).height();
    var offset;

    if (elHeight < windowHeight) {
      offset = elOffset - ((windowHeight / 2) - (elHeight / 2));
    } else {
      offset = elOffset;
    }
    var speed = 700;
    $('html, body').animate({
      scrollTop: offset
    }, speed);
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  }


  function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
  }

  function succToast(msg) {
    //resetToastPosition();
    $.toast({
      heading: 'Action Successful',
      text: msg,
      showHideTransition: 'slide',
      icon: 'success',
      loderBg: '#f96868',
      position: 'top-right',
      hideAfter: 8000
    });
  }

  function updateToast(msg) {
    //resetToastPosition();
    $.toast({
      heading: 'Data Updated Successfully',
      text: msg,
      showHideTransition: 'slide',
      icon: 'success',
      loderBg: '#f96868',
      position: 'top-right',
      hideAfter: 5000
    });
  }

  function errorToast(msg) {
    $.toast({
      heading: 'Action Failed',
      text: msg,
      showHideTransition: 'slide',
      icon: 'error',
      loderBg: '#f2a654',
      position: 'top-right'
    });
  }

  function captchaError(msg) {
    $.toast({
      heading: 'Captcha Failed',
      text: msg,
      showHideTransition: 'slide',
      icon: 'info',
      loderBg: '#f2a654',
      position: 'top-right'
    });
  }

  function agreementError(msg) {
    $.toast({
      heading: 'Check Agreement',
      text: msg,
      showHideTransition: 'slide',
      icon: 'info',
      loderBg: '#f96868',
      position: 'top-right'
    });
  }

  function dataExist(msg) {
    $.toast({
      heading: 'Data Exist',
      text: msg,
      showHideTransition: 'slide',
      icon: 'info',
      loderBg: '#f96868',
      position: 'top-right'
    });
  }

  function emailError(msg) {
    $.toast({
      heading: 'Email not Valid',
      text: msg,
      showHideTransition: 'slide',
      icon: 'info',
      loderBg: '#f96868',
      position: 'top-right'
    });
  }

  //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



  function getPerProvince() {
    var html_code = '<option value="">----</option>';
    $('#per_province').html(html_code);
    $.getJSON('JSON_FILES/provinces.json', function(data) {
      $.each(data, function(key, value) {
        html_code += '<option value="' + value.key + '">' + value.name + '</option>';
      });
      $('#per_province').html(html_code);
    });
  }

  function getPerMunicipality() {
    var html_code = '<option value="">----</option>';
    $('#per_city').html(html_code);
    $('#per_province').change(function() {

      html_code = '<option value="">----</option>';
      var prov = $(this).val();
      $.getJSON('JSON_FILES/cities.json', function(data) {
        $.each(data, function(key, value) {
          if (value.province == prov) {
            html_code += '<option value="' + value.name + '">' + value.name + '</option>';
          }
        });
        $('#per_city').html(html_code);
        $('#per_city').prop('disabled', false);
      });
    });
  }


  function getCurProvince() {
    var html_code = '<option value="">----</option>';
    $('#cur_province').html(html_code);
    $.getJSON('JSON_FILES/provinces.json', function(data) {
      $.each(data, function(key, value) {
        html_code += '<option value="' + value.key + '">' + value.name + '</option>';
      });
      $('#cur_province').html(html_code);
    });
  }

  function getCurMunicipality() {
    var html_code = '<option value="">----</option>';
    $('#cur_city').html(html_code);
    $('#cur_province').change(function() {

      html_code = '<option value="">----</option>';
      var prov = $(this).val();
      $.getJSON('JSON_FILES/cities.json', function(data) {
        $.each(data, function(key, value) {
          if (value.province == prov) {
            html_code += '<option value="' + value.name + '">' + value.name + '</option>';
          }
        });
        $('#cur_city').html(html_code);
        $('#cur_city').prop('disabled', false);
      });
    });
  }

  function perAddressDisabled(status) {
    $('#per_barangay').prop('disabled', status);
    $('#per_subdivision').prop('disabled', status);
    $('#per_street').prop('disabled', status);
  }

  function curAddressDisabled(status) {
    $('#cur_barangay').prop('disabled', status);
    $('#cur_subdivision').prop('disabled', status);
    $('#cur_street').prop('disabled', status);
  }


  function copyAddress() {
    $('#btnCopyAddress').click(function() {
      curAddressDisabled(false);

      $('#cur_city').prop('disabled', false);


      var html = '<option  value="' + $('#per_city').val() + '">' + $('#per_city').val() + '</option>';
      $('#cur_city').html(html);
      $('#cur_province').val($('#per_province').val());
      $('#cur_barangay').val($('#per_barangay').val());
      $('#cur_subdivision').val($('#per_subdivision').val());
      $('#cur_street').val($('#per_street').val());
    });
  }
</script>