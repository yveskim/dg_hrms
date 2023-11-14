<style media="screen">
  .form-content{
    margin-left: 10%;
  }
</style>


<form class="form-content" action="/register" method="post" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md-12">
          <h3 class="title">Registration</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <button class="btn btn-info" id="showEmp" type="button" name="button" form="" data-toggle="modal" data-target="#employeeList">Select Employee</button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
            <input type="text" class="form-control" name="emp_id" id="emp_id" data-role="input" placeholder="User ID" readonly="true" >
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
            <input type="text" class="form-control" name="email" id="email" data-role="input" readonly="true" placeholder="Email"  >
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <input type="password"  class="form-control" name="password" data-role="input" placeholder="Password"  name="password">
        </div>
      </div>

      <div class="row">
          <div class="col-md-6 mb-4">
            <input class="form-control" name="confirm_password" type="password" data-role="input" placeholder="Retype password">
          </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <select data-role="select" class="form-control" name="user_type" placeholder="User Type" data-append="<span class='mif-finder'>">
              <option value="">User Type</option>
              <option value="Admin">Admin</option>
              <option value="Teacher">Teacher</option>
              <option value="Student">Student</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <input type="text" class="form-control" name="restriction" data-role="input" placeholder="Restriction"  >
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <button class="btn btn-primary" type="submit">Register</button>
        </div>
      </div>

</form>

    <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Education</h5>
            <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <table  class="table table-bordered empData compact" width="100%">
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
                  <div class="cell-md-6">
                      <div id="rows-count"></div>
                  </div>
              </div>
        <div class="dialog-actions">
            <button class="button js-dialog-close" id="btn-closeEmp">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>


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
                        <button Type="" value="${row.emp_id}" id="btnSelect" class="btn btn-primary">select</button>
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
              });

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
