
<style>

.tbl_advisery tr td , .tbl_advisery p {
  /* border-collapse: collapse;
  border-spacing:0; 
  vertical-align: middle; */
  line-height: 1;
}

.tbl_advisery td, .tbl_advisery tr{
  /* padding-top: .4rem; */
  padding-bottom: 0;
  border-spacing:0; 
}
</style>


<form class="form" action="#" method="post" id=""></form>
<div class="row">
    <div class="col-8">
    <h4>Advisery Information</h4>
    </div>
    <div class="col-3">
    <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalAdvisery">Add Advisery</button>
    </div>
</div>
    <div class="row ">
    <div class="col-md-12 portlet light bordered">
        <div class="row advisery_list">
        <div class="col-md-12">
            <table class="table table-hover table-bordered tbl_advisery table-sm" style="white-space: nowrap; width:100%;">
            <thead>
                <tr>
                <th>No.</th>
                <th>Section</th>
                <th>Grade</th>
                <th>Adviser</th>
                <th>S.Y.</th>
                <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>



    <div class="modal fade" id="modalAdvisery">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Advisery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="adviseryForm"></form>
              <div class="advisery-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Section</label>
                    <select name="sec_det_id" id="sec_det_id" class="form-control form-control-sm" form="adviseryForm" required>
                    
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Adviser</label>
                    <select name="adv_id_tag" id="adv_id_tag" class="form-control form-control-sm" form="adviseryForm" required>
                    
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success form-control form-control-sm" form="adviseryForm">
                  </div>
                </div>
              </div>
              <hr>

            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
          loadAdvisery();
    });


    $('#modalAdvisery').on('shown.bs.modal', function () {
      getAdviseryDetails();
    })

    
   function getAdviseryDetails(){
      let prog_id = $('#prog_id_details').val();
      // console.log(prog_id);
      $.ajax({
        url: 'getAdviseryDetails',
        method: 'get',
        dataType: 'json',
        data: {prog_id:prog_id},
        success: function(data){
          // console.log(data.fac);
          $('#adv_id_tag').empty();
          $('#adv_id_tag').append('<option value="">---select---</option>');
          $('#sec_det_id').empty();
          $('#sec_det_id').append('<option value="">---select---</option>');
          $('#sy_id').empty();
          $('#sy_id').append('<option value="">---select---</option>');

          $.each(data.fac, function(key, val){
            $('#adv_id_tag').append('<option value="'+val.emp_id+'">'+val.emp_lname+', '+val.emp_fname+' '+val.emp_mname+'</option>');
          })
          $.each(data.sec, function(key, val){
            $('#sec_det_id').append('<option value="'+val.sec_det_id+'">'+val.sec_title+'</option>');
          })

          $.each(data.sy, function(key, val){
            $('#sy_id').append('<option value="'+val.sy_id+'">'+val.school_year+'</option>');
          })
        }
      })
   }


    function loadAdvisery(){
      let prog_id = $('#prog_id_details').val();
      let sy = $('#sy_ref').val();
      $.ajax({
        url: 'getProgramAdvisery',
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
            $('.tbl_advisery').off();
            $('.tbl_advisery').DataTable().clear().destroy();
            $('.tbl_advisery').DataTable({
            "data": data.adv,
             "responsive": false,
            "scrollX": true,
            "autoWidth": false,
            "destroy" : true,
            "paging" : false,
            "searching" : false,
            "columns": [
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;
                 }
             },
             {"data": "sec_title"},
             {"data": "grade_level"},
             {
               "data": null,
               render: function(data, type, row) {
                 return  '<p>'+data.emp_lname+', '+data.emp_fname+' '+data.emp_mname+'</p>';
                }
              },
              {"data": "school_year"},
            //  {
            //    "data": null,
            //     render: function(data, type, row) {
            //     return  '<button type="button" id="'+data.adv_id+'" class="btn btn-primary btn-sm details full-size" title="view details">VIEW</button>';
            //    }
            //  }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      
        $('.details').click(function(){
          let prog_id = $(this).prop('id');
          $('#advisery').load('pages/program/advisery/advisery_details.php', function(){
            // alert(prog_id);
            // $('#adv_id_details').val(adv_id);
          })
        })

      }
    })
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++

$('#adviseryForm').submit(function(event){
        event.preventDefault();
        let prog_id = $('#prog_id_details').val();
        let sy = $('#sy_ref').val();
        let formData = new FormData(this);
        formData.append('prog_id', prog_id);
        formData.append('sy', sy);
        $.ajax({
            url: 'addAdvisery',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
              if(res.status == 1){
                Swal.fire({
                  position: 'center',
                  icon: 'info',
                  title: 'Save Success',
                  text: 'adviser added successfully',
                  showConfirmButton: false
                })
                loadAdvisery();
                $('#modalAdvisery').modal('toggle');
              }else if(res.status == 2){
                Swal.fire({
                  position: 'center',
                  icon: 'info',
                  title: 'Action Failed',
                  text: 'Section already exist',
                  // text: 'Section already exist',
                  showConfirmButton: true
                })
              }else if(res.status == 3){
                Swal.fire({
                  position: 'center',
                  icon: 'info',
                  title: 'Action Failed',
                  text: 'Adviser already exist',
                  showConfirmButton: true
                })
              }else{
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: 'something went wrong',
                  showConfirmButton: true
                })
              }
            }
          })
    })


</script>