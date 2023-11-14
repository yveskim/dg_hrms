<div class="row">
  <div class="col-md-6">
    <h4>Household Members</h4>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary float-right" id="btn_show_modal" data-toggle="modal" data-target="#modalHm">Add Household Member</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-sm table-hover tblHm" style="white-space: nowrap; width: 100%;">
      <thead>
        <tr>
          <th>Action</th>
          <th>#</th>
          <th>SY</th>
          <th>Grade Level</th>
          <th>Name</th>
          <th>Relationship</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


    
<div class="modal fade mb-4" id="modalHm">
    <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Household Member</h4>
          <button type="button" class="close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formHm"></form>
          <input type="hidden" value="0" name="update_status" id="hm_update_status" form="formHm">
          <input type="hidden" name="update_id" id="hm_update_id" form="formHm">
              <div class="row">
                <div class="col-md-12">
                  <ul>
                    <li>
                      <p>Encode each members of the family who are currently schooling or studying in Iloilo National High School only.</p>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <label class="form-label" for="grade_level">Grade Level</label>
                    <select class="form-control form-control-sm" name="grade_level" id="grade_level" form="formHm">
                      <option value="">--select--</option>
                      <option value="7">Grade 7</option>
                      <option value="8">Grade 8</option>
                      <option value="9">Grade 9</option>
                      <option value="10">Grade 10</option>
                      <option value="11">Grade 11</option>
                      <option value="12">Grade 12</option>
                    </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="complete_name">Complete Name (<i>First name Middle initial Last name</i>)</label>
                    <input type="text" class="form-control form-control-sm" name="complete_name" id="complete_name" form="formHm">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-10">
                    <label class="form-label" for="relationship">Relationship</label>
                    <select class="form-control form-control-sm" name="relationship" id="relationship" form="formHm">
                      <option value="">--select--</option>
                      <option value="Parent">Parent</option>
                      <option value="Sibling">Sibling</option>
                      <option value="Relative">Relative</option>
                    </select>
                </div>
              </div>
              <hr>
          
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success full-size" form="formHm" type="submit">Submit</button>
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
  $('#modalHm').modal('hide');
})

$('#modalHm').on('hidden.bs.modal', function(){
  $('body').addClass('modal-open');
})


$('#modalHm').on('show.bs.modal', function(){
    $(this).addClass('blur-bg');
  })
//  Focus the modal at the back after closing modal in front ------------------------


  $(document).ready(function(){
    getHmRecord();
  })

  $('#btn_show_modal').click(function(){
      $('#formHm')[0].reset();
      $('#update_id').val('');
      $('#update_status').val(0);
  })

  function getHmRecord(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'getStudentHm',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
          $('.tblHm').off();
          $('.tblHm').DataTable().clear().destroy();
          $('.tblHm').DataTable({
            "data": data.hm,
             "responsive": false,
            "scrollX": true,
            "autoWidth": true,
            "destroy" : true,
            "searching": false,
            "paging": false,
            // "dom": 'lBfrtip',
            // "buttons": [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            //   ],
            "columns": [
              {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" name="en_id" value="'+data.hm_id+'" id="'+data.hm_id+'" class="fa fa-pencil-square-o btn btn-primary btn-sm edit-hm" title="view details">&nbsp;Edit</button>';
               }
             },
              {
                  "data": null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              {"data": "school_year"},
              {"data": "grade"},
              {"data": "complete_name"},
              {"data": "hm_relationship"},
              {
                "data": null,
                  render: function(data, type, row) {
                  return  '<button type="button" value="'+data.hm_id+'" id="'+data.hm_id+'" class="fa fa-trash btn btn-danger btn-sm delete-hm" title="delete data">&nbsp;DEL</button>';
                }
              }

            ]
         });//end of datatable

         
         $('.edit-hm').click(function(){
            let hm_id = $(this).prop('id');
            $('#hm_update_id').val($(this).prop('id'));
            $('#hm_update_status').val(1);
            $('#modalHm').modal('show');
            $.ajax({
              url: 'getHm',
              method: 'get',
              dataType: 'json',
              data:{hm_id:hm_id},
              success: function(data){
                // console.log(data);
                $('#grade_level').val(data.hm.grade);
                $('#complete_name').val(data.hm.complete_name);
                $('#relationship').val(data.hm.hm_relationship);
              }
            })
         })//edit-hm click end

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $('.delete-hm').click(function(){
            let hm_id = $(this).prop('id');
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
                  url: 'deleteHm',
                  method: 'get',
                  dataType: 'json',
                  data:{hm_id:hm_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Deleted',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        getHmRecord();
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

         })//delete-hm click end


        }
      })
  }


  $('#formHm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $en_id = $('.en_id').val();
    $sy_id = $('#sy_ref').val();
    formData.append('en_id',$en_id);
    formData.append('sy_id',$sy_id);
    $.ajax({
        type: "post",
        url: 'setStudentHm',
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
          $('#modalHm').modal('toggle');
        },
        success: function(res){
          console.log(res.message);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Data Saved',
                  text: 'Record has been saved',
                  showConfirmButton: true
              });
              getHmRecord();
              $('#formHm')[0].reset();
          }else if(res.status == 2){
            Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Update Successful',
                  text: 'Record has been updated',
                  showConfirmButton: true
              });
              getHmRecord();
              $('#formHm')[0].reset();
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