<form class="form"  id=""></form>
<div class="row">
    <div class="col-9">
    <h4>Teachers</h4>
    </div>
    <div class="col-2">
    <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalTeacher">Add Teacher</button>
    </div>
</div>
<hr>
    <div class="row ">
    <div class="col-md-12 portlet light bordered">
        <div class="row advisery_list">
        <div class="col-md-12">
            <table class="table table-stripped table-bordered tbl_teachers table-compact table-sm">
            <thead>
                <tr>
                <th>No.</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Date Created</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalTeacher">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Teacher</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered table-hover tableTeacher table-sm" style="white-space: nowrap;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
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
        getSgTeachers();
    })
      

    $('#modalTeacher').on('shown.bs.modal', function () {
      getFaculty();
    })

    function getFaculty(){
      $.ajax({
        url: 'getFacultySg',
        method: 'get',
        dataType: 'json',
        success: function(data){
          $('.tableTeacher').off();
            $('.tableTeacher').DataTable().clear().destroy();
            $('.tableTeacher').DataTable({
              "data": data.fac,
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
                {"data": "emp_school_id"},
                {"data": "emp_fname"},
                {"data": "emp_mname"},
                {"data": "emp_fname"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.emp_id+'" class="fa fa-check btn btn-success btn-sm add_teacher" title="add teacher"> ADD</button>';
                  }
                }
              ]
            });//end of datatable


            $('.add_teacher').click(function(){
              let sg_id = $('#sg_id_details').val();
              let emp_id = $(this).prop('id');
              let sy_id = $('#sy_ref').val();
              let user_id = $('#user').val();
              $.ajax({
                  url: 'addTeacherToSg',
                  method: 'POST',
                  dataType: 'JSON',
                  data: {sg_id: sg_id, emp_id: emp_id,  sy_id: sy_id, user_id:user_id},
                  // contentType: false,
                  // cache: false,
                  // processData: false,
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Action Success',
                        text: 'Faculty successfully added to Subject Group',
                        showConfirmButton: true
                      })
                      getFaculty();
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

    $('#modalTeacher').on('hidden.bs.modal', function () {
        getSgTeachers();
    })

    
    function getSgTeachers(){
      let sg_id = $('#sg_id_details').val();
      // console.log(sg_id);
      $.ajax({
        url: 'getSgTeachers',
        method: 'get',
        dataType: 'json',
        data: {sg_id:sg_id},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
          $('.tbl_teachers').off();
            $('.tbl_teachers').DataTable().clear().destroy();
            $('.tbl_teachers').DataTable({
              "data": data.teacher,
              //  "responsive": true,
              "scrollX": true,
              "autoWidth": false,
              "destroy" : true,
              "paging" : false,
              // "dom": 'lBfrtip',
              // "buttons": [
              //     'copy', 'csv', 'excel', 'pdf', 'print'
              //   ],
              "columns": [
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "emp_lname"},
                {"data": "emp_fname"},
                {"data": "emp_mname"},
                {"data": "emp_gender"},
                {"data": "emp_birthdate"},
                {"data": "created_at"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" name="en_id" id="'+data.emp_sg_id+'" class="fa fa-eye btn btn-info btn-sm details" title="view details"></button>';
                  }
                }
              ]
            });//end of datatable
        }
        
      })//end of ajax

    }


</script>