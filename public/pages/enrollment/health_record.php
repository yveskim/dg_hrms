<div class="row">
  <div class="col-md-6">
    <h4>Health Record</h4>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary float-right" id="btn_show_modal" data-toggle="modal" data-target="#modalHealth">Add Health Record</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-sm table-hover tblHealth" style="white-space: nowrap; width: 100%;">
      <thead>
        <tr>
          <th>Action</th>
          <th>#</th>
          <th>Health Condition/Dissabilities</th>
          <th>Health Type</th>
          <th>Remarks</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


    
<div class="modal fade mb-4" id="modalHealth">
    <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Health Record</h4>
          <button type="button" class="close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formHealth"></form>
          <input type="hidden" value="0" name="update_status" id="health_update_status" form="formHealth">
          <input type="hidden" name="update_id" id="health_update_id" form="formHealth">
          <div class="row">
                <div class="col-md-12">
                  <ul>
                    <li>
                      <p>Encode the learner's health conditions including those that are not diagnosed by a physician but usually happen to the learner. (for example - Vertigo, High Blood Pressure, Asthma, Heart Problems, seizures, etc.)</p>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="health_condition">Condition/Disability</label>
                    <input type="text" class="form-control form-control-sm" name="health_condition" id="health_condition" form="formHealth">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="health_type">Health Type</label>
                    <select class="form-control form-control-sm" name="health_type" id="health_type" form="formHealth">
                      <option value="">--select--</option>
                      <option value="Undetermined">Undetermined</option>
                      <option value="Physical">Physical</option>
                      <option value="Emotional">Emotional</option>
                      <option value="Social">Social</option>
                    </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="remarks">Remarks/Symptoms</label>
                    <input type="text" class="form-control form-control-sm" name="remarks" id="remarks" form="formHealth">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success full-size" form="formHealth" type="submit">Submit</button>
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
  $('#modalHealth').modal('hide');
})

$('#modalHealth').on('hidden.bs.modal', function(){
  $('body').addClass('modal-open');
})

$('#modalHealth').on('show.bs.modal', function(){
    $(this).addClass('blur-bg');
  })
//  Focus the modal at the back after closing modal in front ------------------------

  $(document).ready(function(){
    getHealthRecords();
  })

  $('#btn_show_modal').click(function(){
      $('#formHealth')[0].reset();
      $('#update_id').val('');
      $('#update_status').val(0);
  })

  function getHealthRecords(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'getStudentHealth',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
          $('.tblHealth').off();
          $('.tblHealth').DataTable().clear().destroy();
          $('.tblHealth').DataTable({
            "data": data.health,
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
                return  '<button type="button" name="en_id" value="'+data.health_id+'" id="'+data.health_id+'" class="fa fa-pencil-square-o btn btn-primary btn-sm edit-health" title="view details">&nbsp;Edit</button>';
               }
             },
              {
                  "data": null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              {"data": "health_condition"},
              {"data": "health_type"},
              {"data": "remarks"},
              {
                "data": null,
                  render: function(data, type, row) {
                  return  '<button type="button" value="'+data.health_id+'" id="'+data.health_id+'" class="fa fa-trash btn btn-danger btn-sm delete-health" title="delete health">&nbsp;DEL</button>';
                }
              }

            ]
         });//end of datatable

         
         $('.edit-health').click(function(){
            let health_id = $(this).prop('id');
            $('#health_update_id').val($(this).prop('id'));
            $('#health_update_status').val(1);
            $('#modalHealth').modal('show');
            $.ajax({
              url: 'getHealth',
              method: 'get',
              dataType: 'json',
              data:{health_id:health_id},
              success: function(data){
                // console.log(data);
                $('#health_condition').val(data.health.health_condition);
                $('#health_type').val(data.health.health_type);
                $('#remarks').val(data.health.remarks);
              }
            })
         })//edit-health click end

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $('.delete-health').click(function(){
            let health_id = $(this).prop('id');
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
                  url: 'deleteHealth',
                  method: 'get',
                  dataType: 'json',
                  data:{health_id:health_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Deleted',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        getHealthRecords();
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

         })//delete-health click end


        }
      })
  }




  $('#formHealth').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $en_id = $('.en_id').val();
    formData.append('en_id',$en_id);
    $.ajax({
        type: "post",
        url: 'setStudentHealth',
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
          $('#modalHealth').modal('toggle');
        },
        success: function(res){
          // console.log(res);
          if (res.status == 1) {
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Save Successfull',
                  text: 'Record has been saved',
                  showConfirmButton: true
              });
              getHealthRecords();
              $('#formHealth')[0].reset();
          }else if(res.status == 2){
            Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Update Successful',
                  text: 'Record has been updated',
                  showConfirmButton: true
              });
              getHealthRecords();
              $('#formHealth')[0].reset();
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