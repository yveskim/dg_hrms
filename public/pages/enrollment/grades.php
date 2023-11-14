<div class="row">
  <div class="col-md-6">
    <h4>Grade Records</h4>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary float-right" id="btn_show_modal" data-toggle="modal" data-target="#modalGrades">Add Grades Record</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-sm table-hover tblGrades" style="white-space: nowrap; width: 100%;">
      <thead>
        <tr>
          <th>Action</th>
          <th>#</th>
          <th>Grade Level</th>
          <th>School Year</th>
          <th>Semester</th>
          <th>General Average</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


    
<div class="modal fade mb-4" id="modalGrades">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Grade Record</h4>
          <button type="button" class="close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formGrades"></form>
          <input type="hidden" value="0" name="update_status" id="school_update_status" form="formGrades">
          <input type="hidden" name="grade_update_id" id="grade_update_id" form="formGrades">
              <div class="row">
                <div class="col-md-12">
                  <ul>
                    <li>
                      <p>
                        For incoming Grades 7, 8, 9, 10, and 11 learners, encode your general average from previous grade level.</p>
                    </li>
                    <li>
                      <p>
                       For incoming Grade 12 learners, encode your general average from previous two semesters (Sem 1 and 2).
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                    <label class="form-label" for="grade_level">Grade Level<span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="grade_level" id="grade_level" form="formGrades" required>
                      <option value="">--select--</option>
                      <option value="Grade 6">Grade 6</option>
                      <option value="Grade 7">Grade 7</option>
                      <option value="Grade 8">Grade 8</option>
                      <option value="Grade 9">Grade 9</option>
                      <option value="Grade 10">Grade 10</option>
                      <option value="Grade 11">Grade 11</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="school_year">School Year <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="school_year" id="school_year" form="formGrades" onchange="if($(this).val()=='other'){$(this).hide().prop('disabled',true);$('input[name=school_year]').show().prop('disabled', false).focus();$(this).val(null);}">
                      <option value="">--select--</option>
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
                    <input placeholder="please type" class="form-control form-control-sm school_year" name="school_year" form="formGrades" style="display:none;" disabled="disabled" onblur="if($(this).val()==''){$(this).hide().prop('disabled',true);$('select[name=school_year]').show().prop('disabled', false).focus();}">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="semester">Semester<span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="semester" id="semester" form="formGrades">
                      <option value="">Not available</option>
                      <option value="1st Semester">1st Semester</option>
                      <option value="2nd Semester">2nd Semester</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="stud_average">Gen. Average <span class="required_field">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="stud_average" id="stud_average" form="formGrades" required>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                  <button class="btn btn-success full-size" form="formGrades" type="submit">Submit</button>
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
    $('#modalGrades').modal('hide');
  })

  $('#modalGrades').on('hidden.bs.modal', function(){
    $('body').addClass('modal-open');
  })

  $('#modalGrades').on('show.bs.modal', function(){
    $(this).addClass('blur-bg');
  })
  //  Focus the modal at the back after closing modal in front ------------------------




  $(document).ready(function(){
    getGradeRecords();

   
    if($('#is_student').val() == true){
      $('#btn_show_modal').prop('disabled', true);
    }else{
      $('#btn_show_modal').prop('disabled', false);
    }

  })

  $('#btn_show_modal').click(function(){
      $('#formGrades')[0].reset();
      $('#update_id').val('');
      $('#update_status').val(0);
  })

  function getGradeRecords(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'getAverageRecord',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
          $('.tblGrades').off();
          $('.tblGrades').DataTable().clear().destroy();
          $('.tblGrades').DataTable({
            "data": data.ave,
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
                  if($('#is_student').val() == true){
                    return  '<button type="button" name="en_id" id="'+data.ave_id+'" class="fa fa-pencil-square-o btn btn-primary btn-sm no-edit-average" title="view details">&nbsp;Edit</button>';
                  }else{
                    return  '<button type="button" name="en_id" id="'+data.ave_id+'" class="fa fa-pencil-square-o btn btn-primary btn-sm edit-average" title="view details">&nbsp;Edit</button>';
                  }
               
               }
             },
              {
                  "data": null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              {"data": "ave_grade_level"},
              {"data": "ave_sy"},
              {"data": "ave_semester"},
              {"data": "average"},
              {
                "data": null,
                  render: function(data, type, row) {
                    if($('#is_student').val() == true){
                      return  '<button type="button" id="'+data.ave_id+'" class="fa fa-trash btn btn-danger btn-sm no-delete-grade" title="delete school">&nbsp;DEL</button>';
                    }else{
                      return  '<button type="button" id="'+data.ave_id+'" class="fa fa-trash btn btn-danger btn-sm delete-grade" title="delete school">&nbsp;DEL</button>';
                    }
                    
                  }
              }

            ]
         });//end of datatable
         
         $('.no-edit-average').click(function(){
            alert('edit not available for student account');
          })

          $('.no-delete-grade').click(function(){
            alert('delete not available for student account');
          })
         
         $('.edit-average').click(function(){
            let ave_id = $(this).prop('id');
            $('#grade_update_id').val($(this).prop('id'));
            $('#school_update_status').val(1);
            $('#modalGrades').modal('show');
            $.ajax({
              url: 'getStudentGrade',
              method: 'get',
              dataType: 'json',
              data:{ave_id:ave_id},
              success: function(data){
                $('#grade_level').val(data.ave.ave_grade_level);
                $('#semester').val(data.ave.ave_semester);
                $('#school_year').val(data.ave.ave_sy);
                $('#stud_average').val(data.ave.average);
              }
            })
         })//edit-average click end

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $('.delete-grade').click(function(){
            let ave_id = $(this).prop('id');
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
                  url: 'deleteGrade',
                  method: 'get',
                  dataType: 'json',
                  data:{ave_id:ave_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Deleted',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        getGradeRecords();
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

  $('#formGrades').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $en_id = $('.en_id').val();
    formData.append('en_id',$en_id);
    $.ajax({
        type: "post",
        url: 'setAverageRecord',
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
          $('#modalGrades').modal('toggle');
        },
        success: function(res){
          // console.log(res);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Data Saved',
                  text: 'Data Saved Successfully',
                  showConfirmButton: true
              });
              getGradeRecords();
              $('#formGrades')[0].reset();
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