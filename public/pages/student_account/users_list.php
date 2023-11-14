
<div class="row">
  <div class="col-md-12"><center><h1>Student Users</h1></center></div>
</div>


<div class="">
  <!-- <a type="button" href="register" class="btn btn-info" id="add_user">Add New User</a> -->
</div><hr>
<table class="table table-bordered  tableUser table-hover table-sm">
  <thead>
    <tr>
      <th></th>
      <th>User ID</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Is New</th>
      <th>Is Disabled</th>
      <th>Type</th>
      <th>Action</th>
    </tr>
  </thead>

</table>


<script type="text/javascript">
  $(document).ready(function(){
    loadAccounts();

  });

  function loadAccounts(){
     $.ajax({
     url: 'admin/loadStudentAccount',
     method: 'get',
     dataType: 'json',
     beforeSend: function(){
        $('.spiner-div').show();
        $('.div-blur').show();
      },
      complete: function(){
        $('.spiner-div').hide();
        $('.div-blur').hide();
      },
     success: function(data){
      //  console.log(data);
      $('.tableUser').off();
      $('.tableUser').DataTable().clear().destroy();
       $('.tableUser').DataTable({
         "data": data.user,
         "responsive": false,
         "scrollX": true,
         "autoWidth": false,
         "destroy" : true,
         "columns": [
           {
              "data": null,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
           },
           {"data": "user_name"},
           {"data": "first_name"},
           {"data": "middle_name"},
           {"data": "last_name"},
           {"data": "is_new"},
           {"data": "is_dissabled"},
           {"data": "type"},
           {
             "data": null,
             render: function(data, type, row) {
             return '<button class="btn btn-warning btn-sm reset" id='+data.s_account_id+'>reset</button>'+
                    '<button class="btn btn-success btn-sm enable_account" id='+data.s_account_id+'>enable</button>'+
                    '<button class="btn btn-danger btn-sm disable_account" id='+data.s_account_id+'>disable</button>';
             }
           }
         ]
       });

       $('.tableUser').on('click', '.reset', function(){
          let account_id = $(this).prop('id');
          $.ajax({
            url: 'resetStudentAccount',
            method: 'get',
            dataType: 'json',
            data:{account_id:account_id},
            success: function(res){
              if(res.status == 1){
                Swal.fire({
                  position: 'center',
                  icon: 'info',
                  title: 'Account Reset',
                  text: 'Student Account Reset Successfully',
                  showConfirmButton: true
                })
                loadAccounts();
              }else{
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: res.message,
                  showConfirmButton: true
                })
              }
            }
          })
        })

        $('.tableUser').on('click', '.enable_account', function(){
          let account_id = $(this).prop('id');
          alert('under construction, contact admin');
          // $.ajax({
          //   url: 'resetStudentAccount',
          //   method: 'get',
          //   dataType: 'json',
          //   data:{account_id:account_id},
          //   success: function(res){
          //     if(res.status == 1){
          //       Swal.fire({
          //         position: 'center',
          //         icon: 'info',
          //         title: 'Account Reset',
          //         text: 'Student Account Reset Successfully',
          //         showConfirmButton: true
          //       })
          //       loadAccounts();
          //     }else{
          //       Swal.fire({
          //         position: 'center',
          //         icon: 'error',
          //         title: 'Action Failed',
          //         text: res.message,
          //         showConfirmButton: true
          //       })
          //     }
          //   }
          // })
        })

        $('.tableUser').on('click', '.disable_account', function(){
          let account_id = $(this).prop('id');
          alert('under construction, contact admin');
          // $.ajax({
          //   url: 'resetStudentAccount',
          //   method: 'get',
          //   dataType: 'json',
          //   data:{account_id:account_id},
          //   success: function(res){
          //     if(res.status == 1){
          //       Swal.fire({
          //         position: 'center',
          //         icon: 'info',
          //         title: 'Account Reset',
          //         text: 'Student Account Reset Successfully',
          //         showConfirmButton: true
          //       })
          //       loadAccounts();
          //     }else{
          //       Swal.fire({
          //         position: 'center',
          //         icon: 'error',
          //         title: 'Action Failed',
          //         text: res.message,
          //         showConfirmButton: true
          //       })
          //     }
          //   }
          // })
        })
       
     },//success end
 

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
</script>
