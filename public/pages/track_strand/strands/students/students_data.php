


<form class="form"  id=""></form>
    <div class="row">
    <div class="col-8">
        <h5>Students List</h5>
    </div>
    <div class="col-3">
        <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalSudent">Add Student</button>
    </div>
    </div>

    <div class="row ">
    <div class="col-md-12 portlet light bordered">
        <div class="row advisery_list">
        <div class="col-md-12">
            <table class="table table-hover table-bordered tblStudents table-compact table-sm" style="white-space:nowrap;">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>Student ID</th>
                  <th>Stat</th>
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
        getStudentInStrand();
    })

    $('#modalSudent').on('shown.bs.modal', function () {
        getEnrolleesNoStrand();
    })

    
    function getEnrolleesNoStrand(){
      let sy = $('#sy_ref').val();
      let sem_id = $('#sem_id').val();
      $.ajax({
        url: 'getEnrolledDataNoStrand',
        method: 'get',
        dataType: 'json',
        data:{sy:sy, sem_id:sem_id},
        success: function(data){
          $('.tableStudent').off();
            $('.tableStudent').DataTable().clear().destroy();
            $('.tableStudent').DataTable({
              "data": data.en,
              "scrollX": true,
              "responsive": false,
              "autoWidth": false,
              "paging": false,
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
              let strand_id = $('#strand_id_details').val();
              let en_id = $(this).prop('id');
              let sy_id = $('#sy_ref').val();
              let sem_id = $('#sem_id').val();
              let user_id = $('#user').val();
           
              $.ajax({
                  url: 'addStudentToStrand',
                  method: 'POST',
                  dataType: 'JSON',
                  data: {strand_id: strand_id, en_id: en_id,  sy_id: sy_id, user_id:user_id, sem_id: sem_id},
                  // contentType: false,
                  // cache: false,
                  // processData: false,
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Save Success',
                        text: 'Student successfully added to program',
                        showConfirmButton: true
                      })
                      // getStudentInStrand();
                      getEnrolleesNoStrand();
                      // $('#modalSection').modal('toggle');
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


            // $('.add_student').click(function(){
            //   let strand_id = $('#strand_id_details').val();
            //   let en_id = $(this).prop('id');
            //   let sy_id = $('#sy_ref').val();
            //   let sem_id = $('#sem_id').val();
            //   let user_id = $('#user').val();
            //   $.ajax({
            //       url: 'addStudentToStrand',
            //       method: 'POST',
            //       dataType: 'JSON',
            //       data: {strand_id: strand_id, en_id: en_id,  sy_id: sy_id, user_id:user_id, sem_id: sem_id},
            //       // contentType: false,
            //       // cache: false,
            //       // processData: false,
            //       success: function(res){
            //         if(res.status == 1){
            //           Swal.fire({
            //             position: 'center',
            //             icon: 'info',
            //             title: 'Save Success',
            //             text: 'Student successfully added to program',
            //             showConfirmButton: true
            //           })
            //           // getStudentInStrand();
            //           getEnrolleesNoStrand();
            //           // $('#modalSection').modal('toggle');
            //         }else{
            //           Swal.fire({
            //             position: 'center',
            //             icon: 'error',
            //             title: 'Action Failed',
            //             text: res.message,
            //             showConfirmButton: true
            //           })
            //         }
            //       }
            //   })
            // })
        }
        
      })//end of ajax
    }

    $('#modalSudent').on('hidden.bs.modal', function () {
        getStudentInStrand();
    })

      function getStudentInStrand(){
      let strand_id = $('#strand_id_details').val();
      let sy = $('#sy_ref').val();
      let sem_id = $('#sem_id').val();
      // console.log(prog_id);
      $.ajax({
        url: 'getStudentInStrand',
        method: 'get',
        dataType: 'json',
        data: {strand_id:strand_id, sy:sy, sem_id:sem_id},
        // beforeSend: function(){
        //   $('.spiner-div').show();
        //   $('.div-blur').show();
        // },
        // complete: function(){
        //   $('.spiner-div').hide();
        //   $('.div-blur').hide();
        // },
        success: function(data){
            $('.tblStudents').off();
            $('.tblStudents').DataTable().clear().destroy();
            $('.tblStudents').DataTable({
              "data": data.stud,
               "responsive": false,
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
                    return  '<button type="button" id="'+data.en_id+'" class="btn btn-info btn-sm btn-xs view_student" title="view details" style="width:100%"> '+data.student_id+'</button>';
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
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<p>'+new Date(data.created_at.split(' ')[0]).toDateString();+' </p>';
                  }
                },
                // {"data": "created_at"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<center><button type="button" id="'+data.en_id+'" class="fa fa-trash btn btn-warning btn-sm remove_from_strand full-size" title="remove from strand"></button></center>';
                  }
                },
                
              ]
            });//end of datatable
            $('.tblStudents').on('click', '.view_student', function(){
              let en_id = $(this).prop('id');
              $('#strandStudent').load('pages/enrollment/each_student.php', function(){
                $('.en_id').val(en_id);
                $('.readme_div').hide();
                $('#stud_program_div').hide();
                $('#is_als_div').hide();
                $('#is_pssn_div').hide();
                $(".user_guide").hide();
              })
             
            })

            $('.tblStudents').on('click', '.remove_from_strand', function(){
              let en_id = $(this).prop('id');

                Swal.fire({
                  title: "Are you sure?",
                  text: "All data connected to this student on the current strand will also delete.",
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
                      url: 'removeStudentFromStrand',
                      method: 'get',
                      dataType: 'json',
                      data: {en_id:en_id},
                      success: function(res){
                        if(res.status == 1){
                            Swal.fire({
                              position: 'center',
                              icon: 'info',
                              title: 'Action Completed',
                              text: 'Student removed from strand successfully',
                              showConfirmButton: true
                            })
                            getStudentInStrand();
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
             
            })


            // $('.remove_from_strand').click(function(){
            //   let en_id = $(this).prop('id');

            //   Swal.fire({
            //   title: "Are you sure?",
            //   text: "All data connected to this student on the current strand will also delete.",
            //   icon: "warning",
            //   showDenyButton: true,
            //   showCancelButton: false,
            //   confirmButtonText: 'Save',
            //   confirmButtonColor: "#DD6B55",
            //   confirmButtonText: "Yes, remove student!",
            //   denyButtonText: "No, cancel please!",
            //   denyButtonColor: "#788397"
            // }).then((result) => {
            //   /* Read more about isConfirmed, isDenied below */
            //   if (result.isConfirmed) {
            //     $.ajax({
            //       url: 'removeStudentFromStrand',
            //       method: 'get',
            //       dataType: 'json',
            //       data: {en_id:en_id},
            //       success: function(res){
            //         if(res.status == 1){
            //             Swal.fire({
            //               position: 'center',
            //               icon: 'info',
            //               title: 'Action Completed',
            //               text: 'Student removed from strand successfully',
            //               showConfirmButton: true
            //             })
            //             getStudentInStrand();
            //           }else{
            //             Swal.fire({
            //               position: 'center',
            //               icon: 'error',
            //               title: 'Action Failed',
            //               text: res.message,
            //               showConfirmButton: true
            //             })
            //           }
            //       }
            //     })//end of ajax
            //   } else if (result.isDenied) {
            //     Swal.fire('Action canceled.', '', 'info')
            //   }
            // })

 
            // })//end of remove_from_strand
        }
        
      })//end of ajax

    }
</script>