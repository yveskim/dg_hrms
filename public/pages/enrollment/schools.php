<div class="row">
  <div class="col-md-6">
    <h4>School Attended</h4>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary float-right" id="btn_show_modal" data-toggle="modal" data-target="#modalSchool">Add School Record</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-sm table-hover tblSchool" style="white-space: nowrap; width: 100%;">
      <thead>
        <tr>
          <th>Action</th>
          <th>#</th>
          <th>Grade Level</th>
          <th>School Year</th>
          <th>School Name</th>
          <th>School ID</th>
          <th>School Type</th>
          <th>School Address</th>
          <th>Adviser Name</th>
          <th>Is Returnee</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


    
<div class="modal fade mb-4" id="modalSchool">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add School Record</h4>
          <button type="button" class="close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formSchool"></form>
          <input type="hidden" value="0" name="update_status" id="school_update_status" form="formSchool">
          <input type="hidden" name="update_id" id="school_update_id" form="formSchool">
              <div class="row">
                <div class="col-md-12">
                  <ul>
                    <li>
                      <p>Encode schools that you have completed.</p>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                    <label class="form-label" for="grade_level">Grade Completed <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="grade_level" id="grade_level" form="formSchool" required>
                      <option value="">--select--</option>
                      <option value="Elementary">Elementary</option>
                      <option value="Junior High School">Junior High School</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="school_year">School Year Completed <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="school_year" id="school_year" form="formSchool" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=school_year]').show().prop('disabled', false).focus();$(this).val(null);}">
                      <option value="">--select--</option>
                      <option value="2010-2011">2010-2011</option>
                      <option value="2011-2012">2011-2012</option>
                      <option value="2012-2013">2012-2013</option>
                      <option value="2013-2014">2013-2014</option>
                      <option value="2014-2015">2014-2015</option>
                      <option value="2015-2016">2015-2016</option>
                      <option value="2016-2017">2016-2017</option>
                      <option value="2017-2018">2017-2018</option>
                      <option value="2018-2019">2018-2019</option>
                      <option value="2019-2020">2019-2020</option>
                      <option value="2020-2021">2020-2021</option>
                      <option value="2021-2022">2021-2022</option>
                      <option value="2022-2023">2022-2023</option>
                      <option value="other">other</option>
                    </select>
                    <input placeholder="please type" class="form-control form-control-sm school_year" name="school_year" form="formSchool" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=school_year]').show().prop('disabled', false).focus();}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="school_name">School Name <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="school_name" id="school_name" form="formSchool" required>
                </div>
              </div>
              <hr>
              <div class="row">
            
                <div class="col-md-3">
                    <label class="form-label" for="school_id">School ID</label>
                    <input type="text" class="form-control form-control-sm" name="school_id" id="school_id" form="formSchool">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="school_type">School Type <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="school_type" id="school_type" form="formSchool" required>
                      <option value="Public">Public</option>
                      <option value="Private">Private</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="school_address">School Address <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="school_address" id="school_address" form="formSchool" required>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-4">
                    <label class="form-label" for="adviser">Adviser's Name</label>
                    <input type="text" class="form-control form-control-sm" name="adviser" id="adviser" form="formSchool">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="is_returning">Returning/Balik-aral? <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="is_returning" id="is_returning" form="formSchool" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                  <button class="btn btn-success full-size" form="formSchool" type="submit">Submit</button>
                </div>
              </div>
                 
              <!-- +++++++++++++++++++++++++++++++++ -->
            </div>

        </div>
    </div>
</div>



    

<script>
  // Focus the modal at the back after closing modal in front ++++++++++++++++++++++++
    $('.close').click(function(){
    $('#modalSchool').modal('hide');
  })

  $('#modalSchool').on('hidden.bs.modal', function(){
    $('body').addClass('modal-open');
  })

  $('#modalSchool').on('show.bs.modal', function(){
    $(this).addClass('blur-bg');
  })
  //  Focus the modal at the back after closing modal in front ------------------------


  $(document).ready(function(){
    getSchoolRecords();
  })

  $('#btn_show_modal').click(function(){
      $('#formSchool')[0].reset();
      $('#update_id').val('');
      $('#update_status').val(0);
  })

  function getSchoolRecords(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'getStudentSchool',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
          $('.tblSchool').off();
          $('.tblSchool').DataTable().clear().destroy();
          $('.tblSchool').DataTable({
            "data": data.sch,
             "responsive": false,
            "scrollX": true,
            "autoWidth": true,
            "searching": false,
            "paging": false,
            "destroy" : true,
            // "dom": 'lBfrtip',
            // "buttons": [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            //   ],
            "columns": [
              {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" name="en_id" value="'+data.sch_id+'" id="'+data.sch_id+'" class="fa fa-pencil-square-o btn btn-primary btn-sm edit-school" title="view details">&nbsp;Edit</button>';
               }
             },
              {
                  "data": null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              {"data": "grade_level_completed"},
              {"data": "school_year"},
              {"data": "school_name"},
              {"data": "school_id"},
              {"data": "school_type"},
              {"data": "school_address"},
              {"data": "adviser_name"},
              {"data": "returning_student"},
              {
                "data": null,
                  render: function(data, type, row) {
                  return  '<button type="button" value="'+data.sch_id+'" id="'+data.sch_id+'" class="fa fa-trash btn btn-danger btn-sm delete-school" title="delete school">&nbsp;DEL</button>';
                }
              }

            ]
         });//end of datatable

         
         $('.edit-school').click(function(){
            let school_id = $(this).prop('id');
            $('#school_update_id').val($(this).prop('id'));
            $('#school_update_status').val(1);
            $('#modalSchool').modal('show');
            $.ajax({
              url: 'getSchool',
              method: 'get',
              dataType: 'json',
              data:{school_id:school_id},
              success: function(data){
                // console.log(data);
                $('#school_condition').val(data.school.school_condition);
                $('#school_type').val(data.school.school_type);
                $('#remarks').val(data.school.remarks);
              }
            })
         })//edit-school click end

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $('.delete-school').click(function(){
            let sch_id = $(this).prop('id');
            Swal.fire({
              title: 'Confirm Delete',
              // showDenyButton: true,
              text: "It will permanently deleted !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, Delete It',
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: 'deleteSchool',
                  method: 'get',
                  dataType: 'json',
                  data:{sch_id:sch_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Deleted',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        getSchoolRecords();
                    }else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Action Failed',
                            text: res.message,
                            showConfirmButton: true
                        });
                        
                    }//end ifelse
                  }
                })//ajax end
              } else if (result.isDenied) {
                Swal.fire('Action cancelled', '', 'info')
              }
            })

         })//delete-school click end


        }
      })
  }

  $('#formSchool').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $en_id = $('.en_id').val();
    formData.append('en_id',$en_id);
    $.ajax({
        type: "post",
        url: 'setStudentSchool',
        data: formData,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
          $('#modalSchool').modal('toggle');
        },
        success: function(res){
          // console.log(res);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Data Saved',
                  text: 'Record has been saved',
                  showConfirmButton: true
              });
              getSchoolRecords();
              $('#formSchool')[0].reset();
          }else if(res.status == 2){
            Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Update Successful',
                  text: 'Record has been updated',
                  showConfirmButton: true
              });
              getSchoolRecords();
          }else {
              Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: res.message,
                  showConfirmButton: true
              });
              
          }//end ifelse
        }// end of success ...................
      });//end of ajax ..................
  })

</script>