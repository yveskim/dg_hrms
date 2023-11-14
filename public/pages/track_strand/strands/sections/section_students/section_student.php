<style>



</style>


<div class="row">
    <div class="col-md-8">
        <h5>Students</h5>
    </div>
    <div class="col-md-3">
        <button class="btn btn-info full-size" data-toggle="modal" data-target="#modalSectionStudent">Add Student</button>
    </div>
</div>
<hr>

<div class="container-fluid dataDiv">
    <div class="row">
        <div class="col-md-12">
            <table class="display compact table table-bordered table-hover table-sm table-compact tblSection" style="width: 100%; white-space:nowrap;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Grade</th>
                        <th>Student ID</th>
                        <th>LRN</th>
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


<div class="modal fade" id="modalSectionStudent">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Student</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table-sm tblStudent" style="white-space: nowrap;" >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Stat</th>
                                    <th>GL</th>
                                    <th>ID</th>
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
        loadSectionStudents();
    })

 
    function loadSectionStudents(){
        let section_id = $('#section_id').val();
        let sy_id = $('#sy_ref').val();
        let sem_id = $('#sem_id').val();
          $.ajax({
            url: 'getSectionStudentStrand',
            method: 'get',
            dataType: 'json',
            data: {section_id:section_id, sy_id:sy_id, sem_id:sem_id},
            beforeSend: function(){
              $('.spiner-div').show();
              $('.div-blur').show();
            },
            complete: function(){
              $('.spiner-div').hide();
              $('.div-blur').hide();
            },
            success: function(data){
                $('.tblSection').off();
                $('.tblSection').DataTable().clear().destroy();
                $('.tblSection').DataTable({
                    "data": data.stud,
                    "responsive": false,
                    "scrollX": true,
                    "autoWidth": true,
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
                        {"data": "grade_level"},
                        {"data": "student_id"},
                        {"data": "student_lrn"},
                        {"data": "last_name"},
                        {"data": "first_name"},
                        {"data": "middle_name"},
                        {"data": "sex"},
                        {
                            "data": null,
                                render: function(data, type, row) {
                                return  '<button type="button" id="'+data.shs_stud_sec_id+'" class="btn btn-danger btn-sm full-size btn-xs remove_student" title="remove student">REM</button>';
                            }
                        }
                    ]
                });//end of datatable

                $('.tblSection').on('click', '.remove_student', function(){
                let shs_stud_sec_id = $(this).prop('id');

                    Swal.fire({
                    title: "Are you sure?",
                    text: "All data connected to this student on the current section will also delete.",
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
                            url: 'removeFromSectionShs',
                            method: 'get',
                            dataType: 'json',
                            data: {shs_stud_sec_id:shs_stud_sec_id},
                            success: function(res){
                                if(res.status == 1){
                                    Swal.fire({
                                    position: 'center',
                                    icon: 'info',
                                    title: 'Data Removed From Section',
                                    text: 'Student removed from section successfully',
                                    showConfirmButton: true
                                    })
                                    loadSectionStudents();
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


            }   
        })
    }

    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    $('#modalSectionStudent').on('shown.bs.modal', function () {
        getStudentInStrandNoSection();
    })
    

    
    function getStudentInStrandNoSection(){
        let strand_id = $('#strand_id_details').val();
        let grade_level = $('#sec_grade_level_ref').val();
        let sy_id = $('#sy_ref').val();
        let sem_id = $('#sem_id').val();
        
      $.ajax({
        url: 'getStudentInStrandNoSection',
        method: 'get',
        dataType: 'json',
        data: {strand_id:strand_id, grade_level: grade_level, sem_id:sem_id, sy_id:sy_id},
        success: function(data){
            $('.tblStudent').off();
            $('.tblStudent').DataTable().clear().destroy();
            $('.tblStudent').DataTable({
              "data": data.stud,
              "responsive": false,
              "scrollX": true,
              "autoWidth": true,
              "paging": false,
              "searching": true,
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


            $('.tblStudent').on('click', '.add_student', function(){
              let sec_id_ref = $('#section_id').val();
              let en_id = $(this).prop('id');
              let sy_id = $('#sy_ref').val();
              let sem_id = $('#sem_id').val();
              let user = $('#user').val();
              $.ajax({
                  url: 'addStudentToStrandSection',
                  method: 'POST',
                  dataType: 'JSON',
                  data: {sec_id_ref: sec_id_ref, en_id: en_id,  sy_id: sy_id, user: user, sem_id:sem_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Save Success',
                        text: 'Student successfully added to program',
                        showConfirmButton: true
                      })
                      getStudentInStrandNoSection();
                      loadSectionStudents();
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

    // $('#modalSectionStudent').on('hidden.bs.modal', function () {
    //     loadSectionStudents();
    // })


</script>
