
<div class="row">
  <div class="col-md-12"><center><h1>Users</h1></center></div>
</div>

<div class="">
  <a type="button" href="register" class="btn btn-info" id="add_user">Add New User</a>
</div><hr>
<table class="table table-hover table-bordered table-striped tableUser table-sm">
  <thead>
    <tr>
      <th>User ID</th>
      <th>Email</th>
      <th>User Type</th>
      <th>Restriction</th>
      <th>Action</th>
    </tr>
  </thead>

</table>


<div class="modal fade" id="modalResetPass">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
                <div class="row">
                  <div class="col-md-12">
                    <form id="resetPassForm">
                      <input type="hidden" id="user_id_ref" name="user_id_ref">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="" class="form-label">New Password</label>
                          <input type="text" class="form-control" name="new_pass" id="new_pass">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-success full-size">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    loadUsers();

  });

  function loadUsers(){
  //  var username = $(this).val();

    $.ajax({
     url: 'admin/loadUser',
     method: 'get',
     dataType: 'json',
     beforeSend: function(){
        $('.spiner-div').show();
        $('.div-blur').show();
      },
     success: function(data){
      //  console.log(data);
       $('.tableUser').DataTable({
         "data": data.user,
         "responsive": true,
         "columns": [
           {"data": "user_id"},
           {"data": "user_email"},
           {"data": "user_type"},
           {"data": "user_restriction"},
           {
             "data": null,
             render: function(data, type, row) {
             return '<button class="btn btn-info btn-sm reset" value='+data.user_id+'>reset</button>'+
                     '<button class="btn btn-primary btn-sm edit" value='+data.user_id+'>disable</button>'+
                    '<button class="btn btn-danger btn-sm delete" value='+data.user_id+'>delete</button>';
             }
           }
         ]
       }); 
       
       $('.tableUser').on('click', '.reset',  function(){
          let user_id = $(this).val();
          $('#user_id_ref').val(user_id);
          $('#modalResetPass').modal('toggle');
      })

      $('#resetPassForm').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        
          $.ajax({
              url: 'reset_password_info',
              method: 'post',
              dataType: 'json',
              data: formData,
              contentType: false,
              cache: false,
              processData: false,
              success: function(res){
                console.log(res.message);
                if (res.status == 1) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update Successfull',
                        text: 'Password has been updated',
                        showConfirmButton: true
                    })
                    $('#resetPassForm')[0].reset();
                    $('#modalResetPass').modal('toggle');
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Action Failed',
                        text: res.message,
                        showConfirmButton: true
                    })
                    
                }//end ifelse
              }
          })
      })

      var table = $('.tableUser').DataTable();

      $('.view').click(function(){
         $('.tableUser').on('click', 'tr',  function(){
           var data = table.row( this ).data();
             //console.log( data['emp_id'] );
             var userId = data['user_id'];
              $.ajax({
                url: 'admin/eachEmp',
                method: 'post',
                dataType: 'json',
                data: {emp_id: emp_id},
                success: function(response){
                  var pic = '';
                  var empId = '';
                  var fname = '';
                  var mname = '';
                  var lname = '';
                  var age = '';
                  var gender = '';
                  var email = '';
                  $('.content-div').load('pages/each_employee.php', function(){
                    $.each(response.each_emp, function(key, value) {
                          pic = value['emp_image'];
                          empId = value['emp_id'];
                          fname = value['emp_fname'];
                          mname = value['emp_mname'];
                          lname = value['emp_lname'];
                          age = value['emp_age'];
                          gender = value['emp_gender'];
                          email = value['emp_email'];
                        //  console.log(pic);
                    });
                    $("#fullname").text(fname);
                    $("#inputEmpId").val(empId);
                    $(".profile_pic").attr("src", 'upload/'+pic);
                    $("#inputName").val(fname);
                    $("#inputMiddleName").val(mname);
                    $("#inputLastName").val(lname);
                    $("#inputEmail").val(email);
                    $("#inputGender").val(gender);

                    $('#btnEmpInfo').click(function(){

                      //ajax here
                    });
                  });

                }
              });
         });
       });//ajax end
     },//success end
     complete: function(){
      $('.spiner-div').hide();
      $('.div-blur').hide();
      $('.delete').click(function(){
      var table = $('.tableUser').DataTable();
      $('.tableUser').on('click', 'tr',  function(){
          var data = table.row( this ).data();
          //console.log( data['emp_id'] );
          var emp_id = data['emp_id'];
          var empImage = data['emp_image'];
          var tr = $(this).closest('tr');  // **add this
          if (confirm('Are you sure you want to delete employee id '+data['emp_id']+' ?')) {
            $.ajax({
              url: 'admin/deleteEmp',
              method: 'post',
              dataType: 'json',
              data: {emp_id: emp_id,
                      emp_image: empImage
                    },
              success: function(response){

                  if (response.status == 0) {
                    alert("can't delete the row");
                    //errorToast(response.message);
                  }
              }
            });

          } else {
            // Do nothing!
            $('.content-div').load('pages/employee_master_data.php');
          }
        })



      })
    }

  })

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
</script>
