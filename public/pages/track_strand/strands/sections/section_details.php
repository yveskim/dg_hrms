<style media="screen">
  .profile-info-left{
    padding: 1em;
  }

  .full-size{
    width: 100%;
  }

  .search-div{
    background-color: white;
    border: 1px solid lightgray;
  }

  .prog_logo{
    background-color: lightgray;
  }

  #strand_title{
    font-size: 1.5rem;
    font-weight: bold;
  }


</style>
<input type="hidden" id="sec_grade_level_ref">
<div class="row container">
  <div class="col-md-12">
    <input type="hidden" id="section_id">
      <div class="row">
        <div class="col-md-12 bg-warning" style="padding-top: .5rem; color: black;">
            <strong><h4> <span id="sec_grade"></span>&nbsp;&nbsp;<span id="shs_sec_title"></span></h4></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="portlet light bordered">

              <div class="portlet-body">
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs mb-4" role="tablist">
                          <li role="presentation"><a href="#section_students" id="section_studentsTab" class="nav-link active" aria-controls="section_students" role="tab" data-toggle="tab">Students</a></li>
                          <li role="presentation"><a href="#subjects" id="subjectsTab" class="nav-link" aria-controls="subjects" role="tab" data-toggle="tab">Subjects</a></li>
                          <li role="presentation"><a href="#schedule" id="scheduleTab" class="nav-link" aria-controls="schedule" role="tab" data-toggle="tab">Schedule</a></li>
                      </ul>
                      <br>
                      <!-- <hr class="hrTab"> -->

                      <!-- Tab panes -->

                      <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="section_students">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="subjects">
                          </div>
                          
                          <div role="tabpanel" class="tab-pane" id="schedule">
                          </div>

                          </div>
                      </div>

                  </div>
                </div>
            </div>
        </div>
      </div>
      

    </div>
  </div>
</div>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function() {
            loadSection();
            $('#section_students').load('pages/track_strand/strands/sections/section_students/section_student.php');
        },100);
    });

    function loadSection(){
        let section_id = $('#section_id').val();
          $.ajax({
            url: 'getEachSectionStrand',
            method: 'get',
            dataType: 'json',
            data: {section_id:section_id},
            // beforeSend: function(){
            //   $('.spiner-div').show();
            //   $('.div-blur').show();
            // },
            // complete: function(){
            //   $('.spiner-div').hide();
            //   $('.div-blur').hide();
            // },
            success: function(data){
                // console.log(data);
                $('#shs_sec_title').text(data.sec.shs_sec_title);
                $('#sec_grade').text("Grade " + data.sec.grade_level);
                $('#sec_grade_level_ref').val(data.sec.grade_level);
            }
          })
    }


    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#section_studentsTab").click(function(){
      $('#section_students').load('pages/track_strand/strands/sections/section_students/section_student.php');
    })


    $("#subjectsTab").click(function(){
      $('#subjects').load('pages/track_strand/strands/sections/subjects/section_subjects.php');
    })

  

    // +++++++++++++++++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++++++++++++++++++++



</script>

















<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
