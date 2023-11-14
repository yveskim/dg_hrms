
<style media="screen">
  .agreement{
  float: right;
  }

  .agreement-content{
    text-align: justify;
  }

  .btn-menu{
    height: 5em;
    width: 100%;
    padding: 5%;
  }

  .verification-div{
    background-color: rgb(82, 116, 255);
    border-radius: 2em;
    color: white;
    padding: 2rem;
  }



@media (prefers-reduced-motion: reduce) {
    .fade {
        transition: none;
    }
}

.faded{
  opacity: .5;
}

.btn-wide{
  height: 6em;
}

#btn-proceed{
  font-size: 2.5em;
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
}

.page-body{
  padding-left: 20%;
  padding-right: 20%;
  padding-bottom: 10%;
}

.btn-submit{
  width: 100%;
}

.btn-edit{
  width: 100%;
  height: 2.5em;
}

.btn-warning{
  color: white;
}

.verify-info-div{
  padding: 2%;
  background-color: gray;
  color: white;
  border: 2px solid black;
  border-radius: 2em;
}

.bg-color-white{
  background-color: lightblue;
  color: black;
}

.done-edit{
  background-color: gray;
  color: white;
}

.btn-done{
  width: 100%;
  height: 2.5em;
}

h1, h2, h3, h4, h5, h6, p{
  color: white;
  font-family: sans-serif;
}

.step2-div{
  color: white;
}

input:not(#email){
  text-transform: uppercase;
}
</style>

<link rel="stylesheet" href="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css">

 <div class="row page-body">
   <div class="row">
     <div class="col-12">
       <h1>Account Verification</h1>
     </div>
   </div> <hr>
   <form class="" role="form" action="" method="" id="verification-form">
   <div class="row verify-info-div">
     <div class="col-12 ">
       <div class="row">
         <div class="col-md-4">
           <div class="row">
             <div class="col-md-12 mb-3">
               <h4>Personal Information</h4>
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="stud_lrn" class="form-label">LRN</label>
               <input class="form-control form-control-xs" type="text" name="stud_lrn" id="stud_lrn" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="fname" class="form-label">First Name</label>
               <input class="form-control form-control-xs" type="text" name="fname" id="fname" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="mname" class="form-label">Middle Name</label>
               <input class="form-control form-control-xs" type="text" name="mname" id="mname" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="lname" class="form-label">Last Name</label>
               <input class="form-control form-control-xs" type="text" name="lname" id="lname" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="bday" class="form-label">Birthday</label>
               <input class="form-control form-control-xs" type="date" name="bday" id="bday"  readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="gender" class="form-label">Gender</label>
               <select class="form-control form-control-xs" type="text" name="gender" id="gender" readonly="true">
                 <option value=""></option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
               </select>
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="phone" class="form-label">Phone</label>
               <input class="form-control form-control-xs" type="text" name="phone" id="phone" value="" readonly="true">
             </div>
           </div>

           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="email" class="form-label">Email Address</label>
               <input class="form-control form-control-xs" type="text" name="email" id="email" value="" readonly="true">
             </div>
           </div>

         </div><!--end of 1st row left side-->

         <!--center div -->
         <div class="col-md-4">
           <div class="row">
             <div class="col-md-12 mb-3">
               <h4>Permanent Address</h4>
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="per_street" class="form-label">Street</label>
               <input class="form-control form-control-xs" type="text" name="per_street" id="per_street" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="per_subdivision" class="form-label">Compund/Subdivision/Village</label>
               <input class="form-control form-control-xs" type="text" name="per_subdivision" id="per_subdivision" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="per_barangay" class="form-label">Barangay/District</label>
               <input class="form-control form-control-xs" type="text" name="per_barangay" id="per_barangay" value="" readonly="true">
             </div>
           </div>

           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="per_city" class="form-label">Municipality/City</label>
               <input class="form-control form-control-xs" type="text" name="per_city" id="per_city" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="per_province" class="form-label">Province</label>
               <input class="form-control form-control-xs" type="text" name="per_province" id="per_province" value="" readonly="true">
             </div>
           </div>

         </div><!--end of center col-->

         <div class="col-md-4"><!--right side div-->
           <div class="row">
             <div class="col-md-12 mb-3">
               <h4>Current Address</h4>
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="cur_street" class="form-label">Street</label>
               <input class="form-control form-control-xs" type="text" name="cur_street" id="cur_street" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="cur_subdivision" class="form-label">Compund/Subdivision/Village</label>
               <input class="form-control form-control-xs" type="text" name="cur_subdivision" id="cur_subdivision" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="cur_barangay" class="form-label">Barangay/District</label>
               <input class="form-control form-control-xs" type="text" name="cur_barangay" id="cur_barangay" value="" readonly="true">
             </div>
           </div>

           <div class="row">
             <div class="col-md-12 mb-3">
               <label for="cur_city" class="form-label">Municipality/City</label>
               <input class="form-control form-control-xs" type="text" name="cur_city" id="cur_city" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-8">
               <label for="cur_province" class="form-label">Province</label>
               <input class="form-control form-control-xs" type="text" name="cur_province" id="cur_province" value="" readonly="true">
             </div>
           </div>

           <br><br>
           <div class="row">
             <div class="col-md-10">
               <label for="">Click here if there's changes in the data</label>
               <button type="button" class="btn btn-info btn-edit" name="button">Edit Data</button>
               <button type="button" class="btn btn-success btn-done" name="button">Done</button>
             </div>
           </div>
         </div><!--end of right side div-->
       </div><!--end of row of 1st 12-->

      </div>
    </div><br>
     <!--end of first 12-->

     <!--second row-->

     <div class="row">
        <div class="col-12 mb-0">
          <hr>
          <!-- <p><h4><strong>Step 3.</strong></h4> An email has been sent to your email address with a corresponding <strong>verification code</strong> and instructions, please copy the code and paste below then click verify.</p> -->
          <!-- <p>Check your email for instructions to complete the final step (step 4) for the application.</p> -->
          <p>The <strong> verification code</strong> has been sent to your email, copy it and paste in the input box below then press verify.</p>
          <p><i>Note:</i> in case of unrecieved email, an invalid account, or inablity to recover the email password, <strong>REPEAT</strong> the first step with a valid email address.</p>
          <hr>
        </div>
      </div>

     <div class="row verification-div">
       <div class="col-12">
          <input type="hidden" name="refId" id="refId" value="">
          

          <div class="row">
            <div class="col-12 mb-3">
                <label class="form-label" for="verify_code">Verification Code</label>
                <input type="text" id="verify_code" name="verify_code" class="form-control form-control-lg">
            </div>
          </div>

         <div class="row">
           <div class="col-md-7"></div>
           <div class="col-5 mb-3">
               <input type="submit" class="btn btn-warning btn-lg btn-submit" name="btn-verify" value="Verify" >
           </div>
         </div>
       </div>
     </div>

  </div><!--end of page body-->
  </form>

<!--end div main-->



<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>

<script type="text/javascript" src="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("html, body").animate({ scrollTop: 0 }, "slow");

      $('.verify-info-div').hide();

      editData();
      $('.spiner-div').hide();

      $('#verification-form').submit(function(event){
        event.preventDefault();
        var formData = new FormData(this);
        //  console.log(formData);
        $.ajax({
          type: 'post',
          dataType: 'json',
          url: 'admission/saveAdmission',
          data: formData,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
          //  console.log(data.data);

            if (data.status == 0) {
              errorToast(data.message);
            }else if(data.status == 1) {
              $('.div-main').load('pages/admission/admission_success_page.php', function(){
                  $('#student_name').html(data.fname+' '+ data.lname);
              });
              succToast(data.message);
               $('#verification-form')[0].reset();
            }else if (data.status == 3) {
            //  $('#admission_form')[0].reset();
              captchaError(data.message);
            }else if (data.status == 4) {
              agreementError(data.message);
            }
          }
        });
      });
    });

    function editData(){
      $('.btn-done').hide();
      $('.btn-edit').click(function(){
        $('#fname').prop('readonly', false );
        $('#mname').prop('readonly', false );
        $('#lname').prop('readonly', false );
        $('#bday').prop('readonly', false );
        $('#gender').prop('disabled', false );
        $('#phone').prop('readonly', false );
        $('#refId').prop('readonly', false );
        $('#dateSubmitted').prop('readonly', false );

        $('.verify-info-div').addClass('bg-color-white');
        $(this).hide();
        $('.btn-done').show();
      });

      $('.btn-done').click(function(){
        $(this).hide();
        $('.btn-edit').show();

        $('#fname').prop('readonly', true );
        $('#mname').prop('readonly', true );
        $('#lname').prop('readonly', true );
        $('#bday').prop('readonly', true );
        $('#gender').prop('disabled', true );
        $('#phone').prop('readonly', true );
        $('#email').prop('readonly', true );
        $('#refId').prop('readonly', true );
        $('#dateSubmitted').prop('readonly', true );

        $('.verify-info-div').removeClass('bg-color-white');
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

    function updateToast(msg){
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

    function captchaError(msg){
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

    function agreementError(msg){
    //  resetToastPosition();
      $.toast({
        heading: 'Check Agreement',
        text: msg,
        showHideTransition: 'slide',
        icon: 'info',
        loderBg: '#f96868',
        position: 'top-right'
      });
    }
</script>
