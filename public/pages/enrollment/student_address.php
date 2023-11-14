<div class="row">
  <div class="col-md-6">
    <h4>Address Informantion</h4>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary float-right" id="btn_show_modal" data-toggle="modal" data-target="#modalAddress">Add Address</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-sm table-hover tblAddress" style="white-space: nowrap; width: 100%;">
      <thead>
        <tr>
          <th>Action</th>
          <th>#</th>
          <th>Type</th>
          <th>Bldg./Blok/Lot/Phase</th>
          <th>Street</th>
          <th>Subdivision/Village</th>
          <th>Barangay</th>
          <th>Municipality</th>
          <th>Province</th>
          <th>Zip Code</th>
          <th>Region</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


    
<div class="modal fade mb-4" id="modalAddress">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Address</h4>
          <button type="button" class="close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="formAddress"></form>
          <input type="hidden" value="0" name="update_status" id="update_status" form="formAddress">
          <input type="hidden" name="update_id" id="update_id" form="formAddress">
              <div class="row">
                <div class="col-md-12">
                  <p>Guidelines for encoding your address.</p>
                  <ul>
                    <li>
                      <p>Permanent/Current Address - is where your parents home is located and the address you mostly used in your ID's</p>
                    </li>
                    <li>
                      <p>Rented/Temporary Address - is the address that you stay here near the school in case your permanent address is far away from school. (example: Boarding house, apartment, condo, etc.)</p>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                    <label class="form-label" for="province">Address Type <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="address_type" id="address_type" form="formAddress" required>
                      <option value="">--select--</option>
                      <option value="Permanent/Current">Permanent/Current</option>
                      <option value="Rented">Rented/Temporary</option>
                    </select>
                </div>
              </div>
              <hr>
                <div class="row">
                  <div class="col-md-3">
                    <label for="region">Region <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="region" id="region" form="formAddress" required>
        
                    </select>
                  </div>
                  <hr>

                  <div class="col-md-3">
                    <label class="form-label" for="province">Province <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="province" id="province" form="formAddress" required>
                    </select>
                  </div>
                  <hr>

                  <div class="col-md-3">
                    <label class="form-label" for="municipality">Municipality/City <span class="required_field">*</span></label>
                    <select class="form-control form-control-sm" name="municipality" id="municipality" form="formAddress" required>
                    </select>
                  </div>
                  <hr>

                  <div class="col-md-3">
                    <label class="form-label" for="barangay">Barangay <span class="required_field">*</span></label>
                    <input type="text" id="barangay" name="barangay" class="form-control form-control-sm" form="formAddress" required>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label" for="blok_lot">Bldg., Blk.Lot, Phase</label>
                    <input type="text" id="blok_lot" name="blok_lot" class="form-control form-control-sm" form="formAddress">
                  </div>

                  <div class="col-md-3">
                    <label class="form-label" for="street">Street</label>
                    <input type="text" id="street" name="street" class="form-control form-control-sm" form="formAddress">
                  </div>

                  <div class="col-md-3">
                    <label class="form-label" for="subdivision">Subdivision/Village</label>
                    <input type="text" id="subdivision" name="subdivision" class="form-control form-control-sm" form="formAddress">
                  </div>
                  
                  <div class="col-md-3">
                    <label for="zip_code">Zipcode</label>
                    <input type="text" class="form-control form-control-sm" name="zip_code" id="zip_code" form="formAddress">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                      <button class="btn btn-secondary full-size" data-dismiss="modal">Cancel</button>
                  </div>
                  <div class="col-md-4">
                      <button class="btn btn-success full-size" type="submit" form="formAddress">Submit</button>
                  </div>
                </div>
                <br><br>
              <!-- +++++++++++++++++++++++++++++++++ -->
            </div>

        </div>
    </div>
</div>



    

<script>



// Focus the modal at the back after closing modal in front ++++++++++++++++++++++++
$('.close').click(function(){
  $('#modalAddress').modal('hide');
})

$('#modalAddress').on('hidden.bs.modal', function(){
  $('body').addClass('modal-open');
})

$('#modalAddress').on('show.bs.modal', function(){
    $(this).addClass('blur-bg');
  })
//  Focus the modal at the back after closing modal in front ------------------------


  $(document).ready(function(){
            
      $('#municipality').prop('disabled', true);
      getProvince();
      getAddress();
      getRegion();
      
    // copyAddress(); //function to copy permanent address to current address

      AddressDisabled(true);
      $('#region').prop('disabled', true);
      $('#province').prop('disabled', true);
    
     
  })
  
  $('#address_type').change(function() {
      $('#region').prop('disabled', false);
  });

  $('#region').change(function() {
      $('#province').prop('disabled', false);
  });

  $('#municipality').change(function() {
      AddressDisabled(false);
  });

  $('#province').change(function() {
    let html_code = '<option value="">--select--</option>';
    
    let prov = $(this).val();
    $.getJSON('JSON_FILES/cities.json', function(data) {
      $.each(data, function(key, value) {
        if (value.province == prov) {
          html_code += '<option value="' + value.name + '">' + value.name + '</option>';
        }
      });
      $('#municipality').html(html_code);
      $('#municipality').prop('disabled', false);
    });
  });

  $('#btn_show_modal').click(function(){
      $('#formAddress')[0].reset();
      $('#update_id').val('');
      $('#update_status').val(0);
      AddressDisabled(true);
      $('#province').prop('disabled', true);
      $('#region').prop('disabled', true);
  })

  // $('#modalAddress').on('hidden.bs.modal', function(){
  //   $('#formAddress')[0].reset();
  // })

  function getAddress(){
      let en_id = $('.en_id').val();
      $.ajax({
        url: 'getStudentAddress',
        method: 'get',
        dataType: 'json',
        data:{en_id:en_id},
        success: function(data){
          // console.log(data);
          $('.tblAddress').off();
          $('.tblAddress').DataTable().clear().destroy();
          $('.tblAddress').DataTable({
            "data": data.add,
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
                  if($('#is_student').val() == true){
                    return  '<button type="button" name="en_id" value="'+data.address_id+'" id="'+data.address_id+'" class="btn btn-primary btn-sm btn-xs full-size no-edit" title="view details"><i class="fa fa-pencil-square "></i>&nbsp;Edit</button>';
                  }else{
                    return  '<button type="button" name="en_id" value="'+data.address_id+'" id="'+data.address_id+'" class="btn btn-primary btn-sm btn-xs full-size edit-address" title="view details"><i class="fa fa-pencil-square "></i>&nbsp;Edit</button>';
                  }
                
              
               }
             },
              {
                  "data": null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              {"data": "address_type"},
              {"data": "blok_lot_phase_bldg"},
              {"data": "street"},
              {"data": "subdivision_village"},
              {"data": "barangay"},
              {"data": "municipality_city"},
              {"data": "province"},
              {"data": "zip_code"},
              {"data": "region"},
              {
                "data": null,
                  render: function(data, type, row) {
                    if($('#is_student').val() == true){
                      return  '<button type="button" value="'+data.address_id+'" id="'+data.address_id+'" class="btn btn-danger btn-sm btn-xs full-size no-delete" title="delete address"><i class="fa fa-trash "></i>&nbsp;DEL</button>';
                    }else{
                      return  '<button type="button" value="'+data.address_id+'" id="'+data.address_id+'" class="btn btn-danger btn-sm btn-xs full-size delete-address" title="delete address"><i class="fa fa-trash "></i>&nbsp;DEL</button>';
                    }
                }
              }

            ]
         });//end of datatable

          $('.no-edit').click(function(){
            alert('edit not available for student account');
          })

          $('.no-delete').click(function(){
            alert('delete not available for student account');
          })
         
         $('.edit-address').click(function(){
            AddressDisabled(false);
            // editMunicipality();
            // $('#municipality').val("Jamindan");
            let add_id = $(this).prop('id');
            $('#update_id').val($(this).prop('id'));
            $('#update_status').val(1);
            $('#modalAddress').modal('show');
            $.ajax({
              url: 'getAddress',
              method: 'get',
              dataType: 'json',
              data:{add_id:add_id},
              success: function(data){
                // console.log(data);
                $('#address_type').val(data.add.address_type);
                $('#region').val(data.add.region);
                $('#province').val(data.add.province);
                editMunicipality(data.add.municipality_city);
                // $('#municipality').val(data.add.municipality_city);
                $('#barangay').val(data.add.barangay);
                $('#blok_lot').val(data.add.blok_lot_phase_bldg);
                $('#street').val(data.add.street);
                $('#subdivision').val(data.add.subdivision_village);
                $('#zip_code').val(data.add.zip_code);
              }
            })
         })//edit-address click end

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $('.delete-address').click(function(){
            let add_id = $(this).prop('id');


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
                  url: 'deleteAddress',
                  method: 'get',
                  dataType: 'json',
                  data:{add_id:add_id},
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Delete Successfull',
                            text: 'Record has been deleted',
                            showConfirmButton: true
                        });
                        getAddress();
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

         })//delete-address click end


        }
      })
  }


  function getRegion() {
    let html_code = '<option value="">--select--</option>';
    $('#region').html(html_code);
    $.getJSON('JSON_FILES/regions.json', function(data) {
      $.each(data, function(key, value) {
        html_code += '<option value="' + value.key + '">' + value.name + '</option>';
      });
      $('#region').html(html_code);
    });
  }

  function getProvince() {
    let html_code = '<option value="">--select--</option>';
    $('#province').html(html_code);
    $.getJSON('JSON_FILES/provinces.json', function(data) {
      $.each(data, function(key, value) {
        html_code += '<option value="' + value.key + '">' + value.name + '</option>';
      });
      $('#province').html(html_code);
    });
  }



 
  function editMunicipality(mun) {
    let html_code = '<option value="">--select--</option>';
    $('#municipality').html(html_code);
    let prov = $('#province').val()
    $.getJSON('JSON_FILES/cities.json', function(data) {
      $.each(data, function(key, value) {
        if (value.province == prov) {
          html_code += '<option value="' + value.name + '">' + value.name + '</option>';
        }
      });
      $('#municipality').html(html_code);
      $('#municipality').val(mun);
      $('#municipality').prop('disabled', false);
    });
  }


  function AddressDisabled(status) {
    $('#barangay').prop('disabled', status);
    $('#subdivision').prop('disabled', status);
    $('#blok_lot').prop('disabled', status);
    $('#street').prop('disabled', status);
    $('#zip_code').prop('disabled', status);
    $('#municipality').prop('disabled', status);
  }

  $('#formAddress').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $en_id = $('.en_id').val();
    formData.append('en_id',$en_id);
    $.ajax({
        type: "post",
        url: 'setStudentAddress',
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
          $('#modalAddress').modal('toggle');
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
              getAddress();
              $('#formAddress')[0].reset();
          }else if(res.status == 2){
            Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Update Successful',
                  text: 'Record has been updated',
                  showConfirmButton: true
              });
              getAddress();
              $('#formAddress')[0].reset();
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

  // function copyAddress() {
  //   $('#btnCopyAddress').click(function() {
  //     curAddressDisabled(false);

  //     $('#c_municipality').prop('disabled', false);


  //     let html = '<option  value="' + $('#municipality').val() + '">' + $('#municipality').val() + '</option>';
  //     $('#c_municipality').html(html);
  //     $('#c_province').val($('#province').val());
  //     $('#c_barangay').val($('#barangay').val());
  //     $('#cur_subdivision').val($('#per_subdivision').val());
  //     $('#blk_lot_st').val($('#p_blk_lot_st').val());
  //     $('#c_zip_code').val($('#zipcode').val());
      
  //   });
  // }
</script>