<div class="row">
  <div class="col-md-6">
    <h4>Home Devices</h4>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary float-right" id="btn_show_modal" data-toggle="modal" data-target="#modalHomeDevice">Add Device</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-sm table-hover tblDevices" style="white-space: nowrap; width: 100%;">
      <thead>
        <tr>
          <th>Action</th>
          <th>#</th>
          <th>Device Name</th>
          <th>Type</th>
          <th>Is Working</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


    
<div class="modal fade mb-4" id="modalHomeDevice">
    <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Device</h4>
          <button type="button" class="close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formDevices"></form>
          <input type="hidden" value="0" name="update_status" id="dev_update_status" form="formDevices">
          <input type="hidden" name="update_id" id="dev_update_id" form="formDevices">
              <div class="row">
                <div class="col-md-12">
                  <ul>
                    <li>
                      <p>Encode all devices you have at home that can aide your studies.</p>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="device_name">Device Name</label>
                    <input type="text" class="form-control form-control-sm" name="device_name" id="device_name" form="formDevices">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="device_type">Device Type</label>
                    <select class="form-control form-control-sm" name="device_type" id="device_type" form="formDevices">
                      <option value="">--select--</option>
                      <option value="Smart Phone">Smart Phone / Cellurar Phone</option>
                      <option value="Computer">Computer / Laptop / Desktop</option>
                      <option value="Internet Related">Internet Related / Router / ISP</option>
                      <option value="Non-Educational">Non-Educational / Gaming Console / Others</option>
                    </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="is_functioning">Is Functional</label>
                    <select class="form-control form-control-sm" name="is_functioning" id="is_functioning" form="formDevices">
                      <option value="">--select--</option>
                      <option value="1">Yes</option>
                      <option value="0">Not Anymore</option>
                    </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success full-size" form="formDevices" type="submit">Submit</button>
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
  $('#modalHomeDevice').modal('hide');
})

$('#modalHomeDevice').on('hidden.bs.modal', function(){
  $('body').addClass('modal-open');
})

$('#modalHomeDevice').on('show.bs.modal', function(){
    $(this).addClass('blur-bg');
  })
//  Focus the modal at the back after closing modal in front ------------------------


  $(document).ready(function(){
    getDevices();
      $('#municipality').prop('disabled', true);
     
  })

  $('#btn_show_modal').click(function(){
      $('#formDevices')[0].reset();
      $('#update_id').val('');
      $('#update_status').val(0);
  })

  function getDevices(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'getStudentDevices',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
          $('.tblDevices').off();
          $('.tblDevices').DataTable().clear().destroy();
          $('.tblDevices').DataTable({
            "data": data.dev,
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
                return  '<button type="button" name="en_id" value="'+data.dev_id+'" id="'+data.dev_id+'" class="fa fa-pencil-square-o btn btn-primary btn-sm edit-device" title="view details">&nbsp;Edit</button>';
               }
             },
              {
                  "data": null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              {"data": "dev_name"},
              {"data": "dev_type"},
              {"data": "is_functioning"},
              {
                "data": null,
                  render: function(data, type, row) {
                  return  '<button type="button" value="'+data.dev_id+'" id="'+data.dev_id+'" class="fa fa-trash btn btn-danger btn-sm delete-device" title="delete address">&nbsp;DEL</button>';
                }
              }

            ]
         });//end of datatable

         
         $('.edit-device').click(function(){
            let dev_id = $(this).prop('id');
            $('#dev_update_id').val($(this).prop('id'));
            $('#dev_update_status').val(1);
            $('#modalHomeDevice').modal('show');
            $.ajax({
              url: 'getDevices',
              method: 'get',
              dataType: 'json',
              data:{dev_id:dev_id},
              success: function(data){
                // console.log(data);
                $('#device_name').val(data.dev.dev_name);
                $('#device_type').val(data.dev.dev_type);
                $('#is_functioning').val(data.dev.is_functioning);
              }
            })
         })//edit-device click end

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $('.delete-device').click(function(){
            let dev_id = $(this).prop('id');
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
                  url: 'deleteDevice',
                  method: 'get',
                  dataType: 'json',
                  data:{dev_id:dev_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Data Deleted',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        getDevices();
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

         })//delete-device click end


        }
      })
  }




  $('#formDevices').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $en_id = $('.en_id').val();
    formData.append('en_id',$en_id);
    $.ajax({
        type: "post",
        url: 'setStudentDevice',
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
          $('#modalHomeDevice').modal('toggle');
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
              getDevices();
              $('#formDevices')[0].reset();
          }else if(res.status == 2){
            Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Update Successful',
                  text: 'Record has been updated',
                  showConfirmButton: true
              });
              getDevices();
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