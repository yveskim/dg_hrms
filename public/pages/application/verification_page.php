
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
  top: 50%;
  left: 50%;
}

.page-body{
  padding-left: 20%;
  padding-right: 20%;

}

.btn-submit{
  width: 100%;
}

.verify-info-div{
  padding: 2%;
  background-color: skyblue;
  border: 2px solid black;
  border-radius: 2em;
}
</style>

<link rel="stylesheet" href="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css">
<link rel="stylesheet" href="assets/gentelella-master/build/css/custom.min.css">


 <div class="row page-body">
   <div class="row">
     <div class="col-12">
       <h1>Verification Form</h1>
     </div>
   </div> <hr><br>
   <div class="row">
     <div class="col-12">
       <p>Please Verify the Information below if correct and check your email for a verification code</p>
     </div>
   </div><hr><br>

   <form class="" role="form" action="" method="" id="verification-form">

   <div class="row">
     <div class="col-7 verify-info-div">
       <div class="row">
         <div class="col-md-6">
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="fname" class="form-label">First Name</label>
               <input class="form-control form-control-xs" type="text" name="fname" id="fname" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="mname" class="form-label">Middle Name</label>
               <input class="form-control form-control-xs" type="text" name="mname" id="mname" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="lname" class="form-label">Last Name</label>
               <input class="form-control form-control-xs" type="text" name="lname" id="lname" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="bday" class="form-label">Birthday</label>
               <input class="form-control form-control-xs" type="text" name="bday" id="bday" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="gender" class="form-label">Gender</label>
               <input class="form-control form-control-xs" type="text" name="gender" id="gender" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="phone" class="form-label">Phone</label>
               <input class="form-control form-control-xs" type="text" name="phone" id="phone" value="" readonly="true">
             </div>
           </div>

           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="email" class="form-label">Email Address</label>
               <input class="form-control form-control-xs" type="text" name="email" id="email" value="" readonly="true">
             </div>
           </div>

         </div><!--end of 1st row left side-->

         <!--first row right side-->
         <div class="col-md-6">


           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="street" class="form-label">Street</label>
               <input class="form-control form-control-xs" type="text" name="street" id="street" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="subdivision" class="form-label">Subdivision/Village</label>
               <input class="form-control form-control-xs" type="text" name="subdivision" id="subdivision" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="barangay" class="form-label">Barangay</label>
               <input class="form-control form-control-xs" type="text" name="barangay" id="barangay" value="" readonly="true">
             </div>
           </div>

           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="municipality" class="form-label">Municipality</label>
               <input class="form-control form-control-xs" type="text" name="municipality" id="municipality" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="city" class="form-label">City</label>
               <input class="form-control form-control-xs" type="text" name="city" id="city" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="province" class="form-label">Province</label>
               <input class="form-control form-control-xs" type="text" name="province" id="province" value="" readonly="true">
             </div>
           </div>

           <!--
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="acadYear" class="form-label">Academic Year</label>
               <input class="form-control form-control-xs" type="text" name="acadYear" id="acadYear" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="stud_type" class="form-label">Student Type</label>
               <input class="form-control form-control-xs" type="text" name="stud_type" id="stud_type" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="program" class="form-label">Academic Program</label>
               <input class="form-control form-control-xs" type="text" name="program" id="program" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="schoolName" class="form-label">Last School Name Attended</label>
               <input class="form-control form-control-xs" type="text" name="schoolName" id="schoolName" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="schoolAttended" class="form-label">Last School Year Attended</label>
               <input class="form-control form-control-xs" type="text" name="schoolAttended" id="schoolAttended" value="" readonly="true">
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
               <label for="schoolAddress" class="form-label">Last School Address</label>
               <input class="form-control form-control-xs" type="text" name="schoolAddress" id="schoolAddress" value="" readonly="true">
             </div>
           </div>
         -->
         </div><!--end of right side col-->
       </div><!--end of row of 1st 12-->

     </div>
     <!--end of first 12-->

     <!--second row-->
     <div class="col-5">
        <input type="hidden" name="refId" id="refId" value="">
        <input type="hidden" name="dateSubmitted" id="dateSubmitted" value="">
        <div class="row">
          <div class="col-12 mb-0">
            <p>An email has been sent to your email address with a corresponding code, please copy the code and past it here:</p>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-4">
              <label class="form-label" for="verify_code">Verification Code</label>
              <input type="text" id="verify_code" name="verify_code" class="form-control form-control-lg">
          </div>
        </div>

       <div class="row">
         <div class="col-6"></div>
         <div class="col-5 mb-4">
             <input type="submit" class="btn btn-success btn-lg btn-submit" name="btn-verify" value="Verify" >
         </div>
       </div>


     </div>

   </div><!--outermost div-->






 </div><!--end of page body-->
</form>

<!--end div main-->



<div class="spiner-div">
  <div class="spinner-grow text-primary" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-secondary" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-success" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-danger" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-warning" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-info" role="status">
    <span class="sr-only">Loading...</span>
  </div>

</div>

<script type="text/javascript" src="assets/gentelella-master/vendors/dropzone/dist/min/dropzone.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

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
