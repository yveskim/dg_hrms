<style media="screen">
  .title-text{
    text-align: center;
  }

  #pending-text{
    color: red;
  }

  #status-text{
    color: green;
  }

  .btn-group-xs > .btn, .btn-xs {
    padding: .45rem .2rem;
    font-size: .675rem;
    line-height: .5;
    border-radius: .2rem;
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

  .faded{
    opacity: .9;
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
</style>

<div class="div-blur"></div>

<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>


<div class="row">
  <div class="col-12">
    <h1 class="title-text">Admission Data</h1>
  </div>
</div><br><br>

<hr>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover table-striped tableAdmission  table-sm" id="datatable-button" style="">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Brith Date</th>
            <th>Gender</th>
            <th>Phone</th>
            <th width="10%">Email</th>
            <th>City</th>
            <th>Province</th>
            <th>Date Submitted</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="modalProcess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Admission Request</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post" id="procesAdmissionForm"></form>
        <div class="row">
          <div class="col-2">
            <h6>Name: </h6>
          </div>
          <div class="col-10">
            <h5 id="requestName"></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-4">
            <label for="admission_remarks">Remarks</label>
            <textarea class="form-control form-control-sm" id="admission_remarks" rows="4" name="admission_remarks" form="procesAdmissionForm"></textarea>
          </div>
        </div>

        <input type="hidden" name="admission_id" id="admission_id" form="procesAdmissionForm">

        <div class="row">
          <div class="col-7"></div>
          <div class="col-4 mb-4">
            <input class="btn btn-success" type="submit" value="Approve Request" form="procesAdmissionForm">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUserInfo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Student User Info</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 2em 4em 2em 4em;">
          <div class="row">
            <div class="col-md-12 mb-4">
              <h6>User Name: <span id="user_name"></span></h6>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-4">
              <h6>User Password: <span id="user_password"></span></h6>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
  $(document).ready(function(){
    // $('.spiner-div').hide();
    //$('.div-blur').hide();

    $('#allAdmission').addClass('btn-active');
    var route_query = "loadAdmission";
    loadPage();


    $('#allAdmission').click(function(){
      removeBtnClass();
      $('#allAdmission').addClass('btn-active');
      $('.tableAdmission').DataTable().destroy();
      route_query = "loadAdmission";
      loadPage(route_query);


    });

    $('#pending').click(function(){
      removeBtnClass();
      $('#pending').addClass('btn-active');
      $('.tableAdmission').DataTable().destroy();
      route_query = "loadPendingAdmission";
      loadPage(route_query);

    });

    $('#verified').click(function(){
      removeBtnClass();
      $('#verified').addClass('btn-active');
      $('.tableAdmission').DataTable().destroy();
      route_query = "loadVerifiedAdmission";
      loadPage(route_query);
    });

    $('#declined').click(function(){
      removeBtnClass();
      $('#declined').addClass('btn-active');
      $('.tableAdmission').DataTable().destroy();
      route_query = "loadDeclinedAdmission";
      loadPage(route_query);
    });


  });

  function removeBtnClass(){
    $('#allAdmission').removeClass('btn-active');
    $('#pending').removeClass('btn-active');
    $('#verified').removeClass('btn-active');
    $('#declined').removeClass('btn-active');
  }

  function loadPage(){
  //  var username = $(this).val();
    $.ajax({
     url: 'getAdmission',
     method: 'get',
     dataType: 'json',
     beforeSend: function(){
       $('.spiner-div').show();
       $('.div-blur').show();
     },
     success: function(data){
      // console.log(data);
       $('.tableAdmission').DataTable({
         "data": data.admission,
         "responsive": true,
         "scrollX": true,
          "autoWidth": false,
         "columns": [
           {"data": "admission_id"},
           {"data": "stud_firstname"},
           {"data": "stud_mname"},
           {"data": "stud_lname"},
           {"data": "stud_birthdate"},
           {"data": "stud_gender"},
           {"data": "stud_phone"},
           {"data": "stud_email"},
           {"data": "per_stud_city"},
           {"data": "per_stud_province"},
           {"data": "stud_date_submitted"},
        //   {"data": "stud_reference_id"},
           {
             "data": null,
             render: function(data, type, row) {
               return '<i class="fa fa-eye btn btn-primary btn-xs view" title="view admission info" data-toggle="tooltip" data-placement="top"  value="'+data.admission_id+'" type="button"></i>'+
                    '<button class="fa fa-key btn btn-warning btn-xs user_details" title="check student user details" data-placement="top"  value="'+data.admission_id+'" type="button" data-toggle="modal" data-target="#modalUserInfo"></button>';

             }
           }
         ]
       });
       //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
       var table = $('.tableAdmission').DataTable();
       $('.process').click(function(){
         $('.tableAdmission').on('click', 'tr',  function(){
           var data = table.row( this ).data();
            // console.log( data['stud_firstname'] );
            // var educId = data['educ_bg_id'];

            $('#requestName').text(data['stud_firstname']+' '+data['stud_mname']+' '+data['stud_lname']);
            $('#admission_id').val(data['admission_id']);

         });//table click end
       });

       $('.tableAdmission').on('click', '.user_details',  function(){

         var currentRow = $(this).closest("tr");
         var admId = currentRow.find('.user_details').val();

         $.ajax({
           type: "get",
           url: 'getStudentUserInfo',
           data: {admId:admId},
           dataType: "json",
           cache: false,
           beforeSend: function(){
             $('.spiner-div').show();
             $('.div-blur').show();
           },
           complete: function(){
             $('.spiner-div').hide();
             $('.div-blur').hide();
           },
           success: function(data){
             // console.log(data.user);
             $.each(data.user, function(index, value){
               $('#user_name').html(value.adm_username);
               $('#user_password').html(value.adm_user_password);
             });

           }// end of success ...................
         });//end of ajax ..................

       });//table click end

       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();

     }

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

    function requestDenied(msg){
    //  resetToastPosition();
      $.toast({
        heading: 'Process Denied',
        text: msg,
        showHideTransition: 'slide',
        icon: 'warning',
        loderBg: '#f2a654',
        position: 'top-right'
      });
    }
</script>
