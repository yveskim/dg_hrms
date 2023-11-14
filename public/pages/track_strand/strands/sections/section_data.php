<form class="form" action="#" method="post" id=""></form>
    <div class="row">
        <div class="col-8">
        <h5>Sections List</h5>
        </div>
        <div class="col-3">
        <button class="btn btn-info full-size" id="btn-edit-info" type="button" name="button" data-toggle="modal" data-target="#modalSection">Add Section</button>
        </div>
    </div>

        <div class="row ">
        <div class="col-md-12 portlet light bordered">
            <div class="row advisery_list">
            <div class="col-md-12">
                <table class="table table-hover table-bordered tbl_section table-compact table-sm" style="white-space:nowrap;">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Section</th>
                    <th>Description</th>
                    <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>


  <div class="modal fade" id="modalSection">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="sectionForm"></form>
              <div class="section-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Section</label>
                    <input type="text" name="sec_title" class="form-control form-control-sm" form="sectionForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Descrition</label>
                    <input type="text" name="sec_description" class="form-control form-control-sm" form="sectionForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Grade Level</label>
                    <select name="grade_level" id="grade_level" class="form-control form-control-sm" form="sectionForm">
                    
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success form-control form-control-sm" form="sectionForm">
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
        loadSection();
    })


    $('#modalSection').on('shown.bs.modal', function () {
        getGradeLevel();
    })

    function getGradeLevel(){

        $.ajax({
            url: 'getGradeLevelShs',
            method: 'get',
            dataType: 'json',
            success: function(data){
                $('#grade_level').empty();
                $('#grade_level').append('<option value="">---select---</option>');
                $.each(data.gr_lvl, function(key, val){
                $('#grade_level').append('<option value="'+val.grade_level_id+'"> Grade '+val.grade_level+'</option>');
                })
            }
        })
   }


   $('#sectionForm').submit(function(event){
        event.preventDefault();
        let strand_id = $('#strand_id_details').val();
        let formData = new FormData(this);
        formData.append('strand_id', strand_id);
        $.ajax({
            url: 'addSectionStrand',
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
                  text: 'section added successfully',
                  showConfirmButton: true
                })
                loadSection();
                $('#modalSection').modal('toggle');
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

    
    function loadSection(){
      let strand_id = $('#strand_id_details').val();
      $.ajax({
        url: 'getStrandSections',
        method: 'get',
        dataType: 'json',
        data: {strand_id:strand_id},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
            // console.log(data.fac);
            $('.tbl_section').off();
            $('.tbl_section').DataTable().clear().destroy();
            $('.tbl_section').DataTable({
              "data": data.sec,
              "responsive": false,
              "scrollX": true,
              "autoWidth": true,
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
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.shs_sec_id+'" class="btn btn-primary btn-sm section_details full-size" title="view details">'+data.shs_sec_title+'</button>';
                  }
                },
                {"data": "shs_sec_description"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<p>Grade '+data.grade_level+'</p>';
                  }
                },
              ]
            });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

         $('.section_details').click(function(){
          let sec_id = $(this).prop('id');
            $('#section').load('pages/track_strand/strands/sections/section_details.php', function(){
              $('#section_id').val(sec_id);
            })
         })

         $('.delete_section').click(function(){
          // alert($(this).prop('id'));
          let sec_id = $(this).prop('id');
          $.ajax({
            url: 'deleteSection',
            method: 'get',
            dataType: 'json',
            data: {sec_id:sec_id},
            beforeSend: function(){
              $('.spiner-div').show();
              $('.div-blur').show();
            },
            complete: function(){
              $('.spiner-div').hide();
              $('.div-blur').hide();
            },
            success: function(data){
              if(data.status === 1){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Deleted',
                    text: data.message,
                    showConfirmButton: true
                })
                loadEnrollmentData();
              }else{
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: data.message,
                  showConfirmButton: true
                })
              }
                
            }
          })

         })

      }
    })
}
</script>