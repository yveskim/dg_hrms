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
    <input type="hidden" id="sec_det_ref">
      <div class="row">
        <div class="col-md-8">
            <strong><h4> <span id="sec_grade"></span>-<span id="sec_title"></span></h4></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="portlet light bordered">

              <div class="portlet-body">
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs mb-4" role="tablist">
                          <li role="presentation"><a href="#tabStudents" id="studentsTab" class="nav-link active" aria-controls="tabStudents" role="tab" data-toggle="tab">Students</a></li>
                          <li role="presentation"><a href="#schedule" id="scheduleTab" class="nav-link" aria-controls="schedule" role="tab" data-toggle="tab">Schedule</a></li>
                      </ul>
                      <br>
                      <!-- <hr class="hrTab"> -->

                      <!-- Tab panes -->

                      <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="tabStudents">
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
            $('#tabStudents').load('pages/program/sections/section_students/students_data.php');
        },100);
    });

    function loadSection(){
        let sec_det_ref = $('#sec_det_ref').val();
        
          $.ajax({
            url: 'getEachSection',
            method: 'get',
            dataType: 'json',
            data: {sec_det_ref:sec_det_ref},
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
                $('#sec_title').text(data.sec.sec_title);
                $('#sec_grade').text(data.sec.grade_level);
                $('#sec_grade_level_ref').val(data.sec.grade_level);
            }
          })
    }


    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#studentsTab").click(function(){
      $('#tabStudents').load('pages/program/sections/section_students/students_data.php');
    })


    $("#scheduleTab").click(function(){
      // $('#schedule').load('pages/track_strand/strands/schedules/schedule_data.php');
    })

  

    // +++++++++++++++++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++++++++++++++++++++



</script>

















<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
