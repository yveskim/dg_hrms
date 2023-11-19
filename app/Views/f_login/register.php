<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Metro 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/pandora/vendors/metro4/css/metro-all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pandora/css/index.css') ?>">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">

    <script type="text/javascript" src="/assets/jquery.js"></script>

    <title>Regist Page</title>

    <style media="screen">
      .error{
        color: red;
      }

      .success{
        color: green;
      }
      body{
        background-color: lightgray;
      }

      .content-box{
        padding: 12%;
      }

      .logo{
        width: 35%;
        height: 35%;
      }

      .btn-dashboard{

      }

    </style>
</head>
<body class="m4-cloak h-vh-100 d-flex flex-justify-center flex-align-center">

<form class="" action="/register" method="post" enctype="multipart/form-data">

    <?= Config\Services::validation()->listErrors() ?>
    <?= csrf_field() ?>
    <div class="login-box">
      <div class="btn-dashboard">
        <a href="login_admin" type="button" class="button yellow " name="button"><span class="mif-arrow-left mif-lg"></span>&nbsp;&nbsp;Back to Dashboard</a>
      </div>
        <div class="bg-white p-3">
            <img src="<?= base_url('upload/system_file/sdo.png') ?>" class="logo place-right mt-0-minus mr-0-minus">
            <h1 class="mb-0">Register</h1><br>
            <div class="text-muted mb-4">
              <h6 class="<?php if ($process == "failed") {
                echo "error";
              }else if ($process == "success") {
                echo "success";
              } ?>">
                <?php if ($process == "failed") {
                    echo "Registration Failed, User already exist!...";
                  }else if ($process == "success") {
                    echo "Registration Successful...";
                  }else {
                    echo $process;
                  }
                ?>
              </h6>
            </div><hr>

            <div class="form-group">
              <button class="button info" type="button" id="showEmp"
                  onclick="Metro.dialog.open('#employeeList')">Select Employee</button>
            </div>
            <hr>

            <div class="form-group">
                <input type="text" name="emp_id" id="emp_id" data-role="input" placeholder="User ID" data-append="<span class='mif-user'>" readonly="true" >
            </div>



            <div class="form-group">
                <input type="text" name="email" id="email" data-role="input" readonly="true" placeholder="Email" data-append="<span class='mif-envelop'>" >
            </div>
            <div class="form-group">
                <input type="password" name="password" data-role="input" placeholder="Password" data-append="<span class='mif-key'>" >
                <span class="invalid_feedback">Please enter a password</span>
                <input class="mt-4" name="confirm_password" type="password" data-role="input" placeholder="Retype password" data-append="<span class='mif-key'>" data-validate="required equals=password">

            </div>

            <div class="form-group">
              <select data-role="select" name="user_type" placeholder="User Type" data-append="<span class='mif-finder'>">
                  <option value="">---User Type---</option>
                  <option value="Admin">Administrator</option>
                  <option value="HR">Human Resource</option>
                  <option value="Accounting">Accounting</option>
              </select>
            </div>

            <div class="form-group">
                <select data-role="select" name="restriction" data-role="input" placeholder="User Access"  data-append="<span class='mif-lock'>">
                  <option value="">---User Access---</option>
                  <option value="1">Full Access</option>
                  <option value="2">SDO Personnel</option>
                  <option value="3">Faculty / Field Personnel</option>
              </select>
            </div>

            <hr>
            <div class="form-group d-flex flex-align-center flex-justify-between">
                <button class="button primary" type="submit" style="width: 100%;">REGISTER</button>
            </div>

        </div>
</div>
</form>




    <div class="dialog success" data-actions-align="top" data-role="dialog" id="employeeList" data-width="1000" data-height="1000" data-overlay="true" data-close-button="true">
        <div class="dialog-title" ><strong>Employee List</strong></div>
        <div class="dialog-content" id="dialogData">

            <div class="container">
              <table  class="table-bordered empData compact" width="100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>No.</th>
                      <th>ID</th>
                      <th width="100%">Name</th>
                      <th>Gender</th>
                    </tr>
                  </thead>
              </table>

              <div class="row">
                  <div class="cell-md-8">
                      <div id="pagination"></div>
                      <div id="table-info"></div>
                  </div>
                  <div class="cell-md-4">
                      <div id="rows-count"></div>
                  </div>
              </div>
        <div class="dialog-actions">
            <button class="button js-dialog-close" id="btn-closeEmp">Cancel</button>
        </div>
    </div>

<script type="text/javascript" src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>


<script type="text/javascript">

      $(document).ready(function(){
          //loadEmpUsingDataTable();
          $('#showEmp').click(function(){
          //  $('.empData').DataTable().clear().destroy();//clear the content of table

          if ( ! $.fn.DataTable.isDataTable( '.empData' ) ) {//method to check if datatable is already loaded. if not load the ajax
             loadEmpUsingDataTable();
           }

          });

      });

    /*  function loadEmp(){
      //  var username = $(this).val();
      var i = "1";
        $.ajax({
         url: 'login/getEmpData',
         method: 'post',
         success: function(response){
            //console.log(response.emp);
            //console.log('test');
              $.each(response.emp, function(key, value){
                  $('.empData').append(
                    '<tr>\
                      <td>'+ '<button class="button js-dialog-close" value='+value['emp_id']+'>select</button>' +'</td>\
                      <td>'+ value['emp_id'] +'</td>\
                      <td>'+ value['emp_fname'] +' '+ value['emp_mname'] + ' ' + value['emp_lname'] +'</td>\
                      <td>'+ value['emp_gender'] +'</td>\
                    </tr>'
                  );
              });
           }
         });
      }
*/

      function loadEmpUsingDataTable(){
      //  var username = $(this).val();
        $.ajax({
         url: 'login/getEmpData',
         method: 'post',
         dataType: 'json',
         success: function(data){
              //console.log(data);
              var i = "1";

              $('.empData').DataTable({
                "data": data.emp,
                "responsive": true,
                "columns": [

                  {"render": function ( data, type, row, meta )
                    {
                      var a = `
                        <button Type="" value="${row.emp_id}" id="btnSelect" class="button primary mini outline  rounded shadowed emp_id js-dialog-close">select</button>
                      `;
                      return a;
                    }
                  },
                  {"render": function(){
                    return a = i++;
                  }},
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
                  $('#emp_id').val(data['emp_id']);
                  $('#email').val(data['emp_email']);
              });

              $('#btn-closeEmp').on('click', function(){

              });

           }
         });
      }



      function passEmp(){
          $('.empData').click(function(){
              var id = $(this).data();
              console.log(id);
              alert(id);
          });
      }

    </script>


    <script src="<?= base_url('assets/pandora/vendors/jquery/jquery-3.4.1.min.js')?>"></script>
    <script src="<?= base_url('assets/pandora/vendors/metro4/js/metro.js')?>"></script>

      <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</body>
</html>
