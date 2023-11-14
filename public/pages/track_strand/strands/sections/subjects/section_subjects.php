<style>



</style>


<div class="row">
    <div class="col-md-8">
        <h5>Subjects</h5>
    </div>
    <div class="col-md-3">
        <button class="btn btn-info full-size" data-toggle="modal" data-target="#modalSubjectStudent">Add Subjects</button>
    </div>
</div>
<hr>

<div class="container-fluid dataDiv">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover table-sm tblSubjects" style="white-space:nowrap;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>S.Y</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalSubjectStudent">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Subject</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >

            <div class="row">
              <div class="col-md-3">
                <label for="">Category</label>
                <select name="category" id="category" class="form-control form-control-sm">
                  <option value=""></option>
                  <option value="Core">Core</option>
                  <option value="Applied">Applied</option>
                  <option value="Specialized">Specialized</option>
                </select>
              </div>

              <div class="col-md-3">
                  <label for="">Specialized in</label>
                  <select name="specialized" id="specialized" class="form-control form-control-sm">
                    <option value=""></option>
                    <option value="stem">STEM</option>
                    <option value="gas">GAS</option>
                    <option value="abm">ABM</option>
                    <option value="humss">HUMSS</option>
                    <option value="tvl-ict">TVL-ICT</option>
                    <option value="tvl-he">TVL-HE</option>
                  </select>
              </div>

              
              <div class="col-md-3">
                  <label for="">Semester</label>
                  <select name="semester" id="semester" class="form-control form-control-sm">
                  </select>
              </div>

              
              <div class="col-md-3">
                  <label for="">Grade Level</label>
                  <select name="grade_level" id="grade_level" class="form-control form-control-sm">
                  </select>
              </div>

            </div>
            <br>

            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-md-3">
                  <label for="">Search</label>
                  <button class="btn btn-success full-size" id="btnSearchSubject">Go</button>
              </div>
            </div>
            <hr>


              <div class="row">
                    <div class="col-md-12">
                          <table class="table table-bordered table-hover table-sm tblSelectSubject" style="width: 100%; white-space: nowrap;" >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Subject</th>
                                    <th>Description</th>
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
        loadSectionSubjects();
      })
      
      
    $('#category').change(function(){
      if($(this).val() == "Specialized"){
        $('#specialized').prop('disabled', false);
      }else{
        $('#specialized').prop('disabled', true);
        $('#specialized').val('');
      }

    })
    
 
    function loadSectionSubjects(){
        let sec_id = $('#section_id').val();
        let sy_id = $('#sy_ref').val();
        let sem_id = $('#sem_id').val();
          $.ajax({
            url: 'getSectionSubjects',
            method: 'get',
            dataType: 'json',
            data: {sec_id:sec_id, sy_id:sy_id, sem_id:sem_id},
            beforeSend: function(){
              $('.spiner-div').show();
              $('.div-blur').show();
            },
            complete: function(){
              $('.spiner-div').hide();
              $('.div-blur').hide();
            },
            success: function(data){
              // console.log(data);
                $('.tblSubjects').off();
                $('.tblSubjects').DataTable().clear().destroy();
                $('.tblSubjects').DataTable({
                    "data": data.sub,
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
                        {"data": "subject_title"},
                        {"data": "subject_description"},
                        {"data": "subject_category"},
                        {"data": "school_year"},
                        {"data": "sem_title"},
                        {
                            "data": null,
                                render: function(data, type, row) {
                                return  '<button type="button" id="'+data.sec_sub_id+'" class="btn btn-danger btn-sm btn-xs delete_subject full-size" title="remove subject"><i class="fa fa-trash"></i>&nbsp;DEL</button>';
                            }
                        }
                    ]
                });//end of datatable

                // $('.tblSubjects').on('click', '.student_details', function(){
                //     let en_id = $(this).prop('id');
                //     $('#students').load('pages/enrollment/each_student.php', function(){
                //         $('.en_id').val(en_id);
                //         $('.readme_div').hide();
                //     })
                // })

                let table = $('.tblSubjects').DataTable();
                table.buttons().container().appendTo($('#printbar'));
            }   
        })
    }

    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________
    // _________________________________________________________________________________________


    $('#modalSubjectStudent').on('shown.bs.modal', function () {
        // getShsSubject();
        $('#specialized').prop('disabled', true);
        getSemester();
        getGradeLevel();
    })


    $('#btnSearchSubject').click(function(){
        getShsSubject();
    })

    
    function getShsSubject(){
        let category = $('#category').val();
        let specialized = $('#specialized').val();
        let semester = $('#semester').val();
        let grade_level = $('#grade_level').val();
        
      $.ajax({
        url: 'getShsSubjects',
        method: 'get',
        dataType: 'json',
        data: {category:category, specialized: specialized, semester:semester, grade_level:grade_level},
        success: function(data){
            $('.tblSelectSubject').off();
            $('.tblSelectSubject').DataTable().clear().destroy();
            $('.tblSelectSubject').DataTable({
              "data": data.sub,
              "responsive": false,
              "scrollX": true,
              "autoWidth": false,
              "paging": false,
              "searching": false,
              "destroy" : true,
              "columns": [
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "subject_title"},
                {"data": "subject_description"},
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.shs_sub_id+'" class="btn btn-success btn-sm addSubject" title="add subject"><i class="fa fa-check"></i>&nbsp; ADD</button>';
                  }
                }
              ]
            });//end of datatable

            $('.tblSelectSubject').on('click', '.addSubject', function(){
              let sec_id_ref = $('#section_id').val();
              let sy_id = $('#sy_ref').val();
              let sem_id = $('#sem_id').val();
              let subject_id = $(this).prop('id');
              $.ajax({
                  url: 'addSubjectToSection',
                  method: 'POST',
                  dataType: 'JSON',
                  data: {sec_id_ref: sec_id_ref, sy_id: sy_id, sem_id:sem_id, subject_id:subject_id},
                  // contentType: false,
                  // cache: false,
                  // processData: false,
                  success: function(res){
                    if(res.status == 1){
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Save Success',
                        text: 'Subject successfully added',
                        showConfirmButton: true
                      })
                      loadSectionSubjects();
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

    $('#modalSubjectStudent').on('hidden.bs.modal', function () {
        // loadSectionSubjects();
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

    function getSemester(){
      $.ajax({
          url: 'getSemester',
          method: 'get',
          dataType: 'json',
          success: function(data){
              $('#semester').empty();
              $('#semester').append('<option value="">---select---</option>');
              $.each(data.sem, function(key, val){
              $('#semester').append('<option value="'+val.sem_id+'"> '+val.sem_title+'</option>');
              })
          }
      })
    }

</script>
