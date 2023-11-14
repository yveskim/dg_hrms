
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
    <h5>Advisery Information</h5>
    </div>
    <div class="col-3">
    <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalShsAdvisery">Add Advisery</button>
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
                <th>Co-Adviser</th>
                <th>S.Y.</th>
                <th>Semester</th>
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



    <div class="modal fade" id="modalShsAdvisery">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Advisery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="adviseryForm"></form>
              <div class="advisery-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Section</label>
                    <select name="shs_section" id="shs_section" class="form-control form-control-sm" form="adviseryForm" required>
                    
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Adviser</label>
                    <select name="adv_id_tag" id="adv_id_tag" class="form-control form-control-sm selectpicker" data-live-search="true" form="adviseryForm" required>
                    
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Co-Adviser</label>
                    <select name="co_adv" id="co_adv" class="form-control form-control-sm selectpicker" data-live-search="true" form="adviseryForm">
                    
                    </select>
                  </div>
                </div>
                <hr class="hrTab">
                <div class="row">
                  <div class="col-md-12" style="padding: 0 20% 0 20%;">
                    <input type="submit" value="SUBMIT" class="btn btn-success form-control full-size" style="height: 3rem; " form="adviseryForm">
                  </div>
                </div>
              </div>
           
            </div>
            <!-- end of modal body -->

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
          loadAdvisery();
          getAdviseryDetails();
          
    });
    
   function getAdviseryDetails(){
      let strand_id = $('#strand_id_details').val();
      let sy_id = $('#sy_ref').val();
      let sem_id = $('#sem_id').val();
      $.ajax({
        url: 'getStrandAdviseryDetails',
        method: 'get',
        dataType: 'json',
        data: {strand_id:strand_id, sem_id:sem_id, sy_id:sy_id},
        success: function(data){

          $("#shs_section").empty();
          $("#sy_id").empty();
          $('#adv_id_tag').append('<option value="">---select---</option>');
          $('#co_adv').append('<option value="">---select---</option>');
          $('#shs_section').append('<option value="">---select---</option>');
          $('#sy_id').append('<option value="">---select---</option>');
          $.each(data.fac, function(key, val){
            $('#adv_id_tag').append('<option value="'+val.emp_id+'">'+val.emp_lname+', '+val.emp_fname+' '+val.emp_mname+'</option>');
            $('#co_adv').append('<option value="'+val.emp_id+'">'+val.emp_lname+', '+val.emp_fname+' '+val.emp_mname+'</option>');
          })
          $('#adv_id_tag').selectize();
          $('#co_adv').selectize();
          
          $.each(data.sec, function(key, val){
            $('#shs_section').append('<option value="'+val.shs_sec_id+'"> '+val.grade_level+'-'+val.shs_sec_title+'</option>');
          })

        }
      })
   }


    function loadAdvisery(){
      let strand_id = $('#strand_id_details').val();
      let sy = $('#sy_ref').val();
      let sem_id = $('#sem_id').val();
      $.ajax({
        url: 'getStrandAdvisery',
        method: 'get',
        dataType: 'json',
        data: {strand_id:strand_id, sy:sy, sem_id:sem_id},
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
             {"data": "shs_sec_title"},
             {
               "data": null,
                render: function(data, type, row) {
                 return  '<p> Grade '+data.grade_level+'</p>';
                }
              },
             {
               "data": null,
               render: function(data, type, row) {
                 return  '<p>'+data.ad_lname+', '+data.ad_fname+' '+data.ad_mname+'</p>';
                }
              },
              {
               "data": null,
               render: function(data, type, row) {
                 return  '<p>'+data.co_ad_lname+', '+data.co_ad_fname+' '+data.co_ad_mname+'</p>';
                }
              },
              {"data": "school_year"},
              {"data": "sem_title"},
              // {
              //   "data": null,
              //     render: function(data, type, row) {
              //     return  '<button type="button" id="'+data.shs_adv_id+'" class="btn btn-primary btn-sm btn-xs details" title="edit details"><i class="fa fa-pencil-square-o"></i>&nbsp;EDIT</button>';
              //   }
              // }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      
        // $('.details').click(function(){
        //   let strand_id = $(this).prop('id');
        //   $('#advisery').load('pages/track_strand/strands/advisery/advisery_details.php', function(){
        //     alert(strand_id);
        //     $('#adv_id_details').val(adv_id);
        //   })
        // })

      }
    })
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++

$('#adviseryForm').submit(function(event){
        event.preventDefault();
        let strand_id = $('#strand_id_details').val();
        let sy_ref = $('#sy_ref').val();
        let sem_id = $('#sem_id').val();
        let formData = new FormData(this);
        formData.append('strand_id', strand_id);
        formData.append('sy_ref', sy_ref);
        formData.append('sem_id', sem_id);

        if($('#adv_id_tag').val() == $('#co_adv').val()){
          Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Action Failed',
            text: 'Teacher is selected twice, please select another one',
            showConfirmButton: true
          })
        }else{
          $.ajax({
            url: 'setAdviseryShs',
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
                  text: 'Advisery Added Successfully',
                  showConfirmButton: true
                })
                
              }else if(res.status == 2){
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: res.message,
                  showConfirmButton: true
                })
              }else if(res.status == 3){
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: res.message,
                  showConfirmButton: true
                })
              }else{
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: 'something went wrong, please contact the admin',
                  showConfirmButton: true
                })
              }
            },
            complete: function(){
              $('.modal').modal('toggle');
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              // $("#modalShsAdvisery").modal("hide"); 
              loadAdvisery();
              $('#advisery').load('pages/track_strand/strands/advisery/strand_advisery.php');
            }
          })
        }



    })


</script>