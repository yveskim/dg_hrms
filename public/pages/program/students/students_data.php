
<form class="form"  id=""></form>
    <div class="row">
    <div class="col-8">
        <h4>Students List</h4>
    </div>
    <div class="col-3">
        <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalSudent">Add Student</button>
    </div>
    </div>

    <div class="row ">
    <div class="col-md-12 portlet light bordered">
        <div class="row advisery_list">
        <div class="col-md-12">
            <table class="table table-hover table-bordered tbl_students table-compact table-sm" style="white-space:nowrap;">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>Student ID</th>
                  <th>Status</th>
                  <th>GL</th>
                  <th>LRN</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Sex</th>
                  <th>Birthday</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        </div>
    </div>

    

    <div class="modal fade" id="modalSudent">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Select Student</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="studentForm"></form>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover tableStudent table-compact table-sm table-condensed tbl-text-sm" style="white-space: nowrap;">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>GL</th>
                        <th>Stud ID</th>
                        <!-- <th>LRN</th> -->
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Sex</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        getStudentInProgram();
    })

    $('#modalSudent').on('shown.bs.modal', function () {
        getEnrolleesNoProgram();
    })

    
    function getEnrolleesNoProgram(){
      let sy_id = $('#sy_ref').val();
      $.ajax({
        url: 'getEnrolledDataNoProgram',
        method: 'get',
        dataType: 'json',
        data:{sy_id:sy_id},
        success: function(data){
          $('.tableStudent').off();
            $('.tableStudent').DataTable().clear().destroy();
            $('.tableStudent').DataTable({
              "data": data.en,
              "scrollX": true,
              "responsive": false,
              "autoWidth": false,
              "destroy" : true,
              "columns": [
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "enrollment_status"},
                {"data": "grade_level"},
                {"data": "student_id"},
                {"data": "last_name"},
                {"data": "first_name"},
                {"data": "middle_name"},
                {"data": "sex"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.en_id+'" class="fa fa-check btn btn-success btn-sm add_student" title="add student"> ADD</button>';
                  }
                }
              ]
            });//end of datatable

            $('.tableStudent').on('click', '.add_student', function(){
              let prog_id = $('#prog_id_details').val();
              let en_id = $(this).prop('id');
              let sy_id = $('#sy_ref').val();
              let user_id = $('#user').val();
              $.ajax({
                  url: 'addStudentToProgram',
                  method: 'POST',
                  dataType: 'JSON',
                  data: {prog_id: prog_id, en_id: en_id,  sy_id: sy_id, user_id: user_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Save Success',
                        text: 'Student successfully added to program',
                        showConfirmButton: true
                      })
                      getEnrolleesNoProgram();
                      getStudentInProgram();
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

        }
        
      })//end of ajax
    }

    // $('#modalSudent').on('hidden.bs.modal', function () {
    //   getStudentInProgram();
    // })


      function getStudentInProgram(){
      let prog_id = $('#prog_id_details').val();
      let sy = $('#sy_ref').val();
      // console.log(prog_id);
      $.ajax({
        url: 'getStudentInProgram',
        method: 'get',
        dataType: 'json',
        data: {prog_id:prog_id, sy:sy},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
            $('.tbl_students').off();
            $('.tbl_students').DataTable().clear().destroy();
            $('.tbl_students').DataTable({
              "data": data.stud,
              //  "responsive": true,
              "scrollX": true,
              "autoWidth": false,
              "destroy" : true,
              "dom": 'lBfrtip',
              "buttons": [
                  'copy', 'csv', 'excel', 'pdf', 'print'
                ],
              "columns": [
               
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.en_id+'" class="btn btn-success btn-sm btn-xs view_student full-size" title="view details" style="width:100%">'+data.student_id+'</button>';
                    // '<button type="button" id="'+data.en_id+'" class="fa fa-print btn btn-primary btn-sm generate_rf" title="generate RF"></button>'+
                  }
                },
                {"data": "enrollment_status"},
                {"data": "grade_level"},
                // {"data": "student_id"},
                {"data": "student_lrn"},
                {"data": "last_name"},
                {"data": "first_name"},
                {"data": "middle_name"},
                // {"data": "ext"},
                {"data": "sex"},
                {"data": "birthdate"},
                {"data": "created_at"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.en_id+'" class="btn btn-danger btn-sm btn-xs remove_from_program full-size" title="remove"><i class="fa fa-trash"></i></button>';
                  }
                },
                
              ]
            });//end of datatable


            $('.tbl_students').on('click', '.view_student', function(){
            // $('.view_student').click(function(){
                let en_id = $(this).prop('id');
                $('#progStudent').load('pages/enrollment/each_student.php', function(){
                  $('.en_id').val(en_id);
                  $(".readme_div").hide();
                  $("#stud_strand_div").hide();
                  $(".user_guide").hide();
                  
                  $("#is_als_div").hide();
                  $("#is_pssn_div").hide();
                })
            })

            $('.tbl_students').on('click', '.remove_from_program', function(){
              let en_id = $(this).prop('id');

              Swal.fire({
              title: "Are you sure?",
              text: "All data connected to this student on the current program will also delete.",
              icon: "warning",
              showDenyButton: true,
              showCancelButton: false,
              confirmButtonText: 'Save',
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, remove student!",
              denyButtonText: "No, cancel please!",
              denyButtonColor: "#788397"
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                $.ajax({
                  url: 'removeStudentFromProgram',
                  method: 'get',
                  dataType: 'json',
                  data: {en_id:en_id},
                  success: function(res){
                    if(res.status == 1){
                        Swal.fire({
                          position: 'center',
                          icon: 'info',
                          title: 'Action Completed',
                          text: 'Student removed from program successfully',
                          showConfirmButton: true
                        })
                        getStudentInProgram();
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
                })//end of ajax
              } else if (result.isDenied) {
                Swal.fire('Action canceled.', '', 'info')
              }
            })

 
            })//end of remove_from_program
        }
        
      })//end of ajax

    }
</script>