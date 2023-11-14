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

  .sg_logo{
    background-color: lightgray;
  }

</style>

<div class="row container">
  <div class="col-md-12">
    <input type="hidden" id="sg_id_details">
    <div class="row">
        <div class="col-md-12">
          <div class="portlet light bordered">

              <div class="portlet-body">
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation"><a href="#info" id="infoTab" class="nav-link active" aria-controls="info" role="tab" data-toggle="tab">Info</a></li>
                          <li role="presentation"><a href="#teacher" id="teacherTab"  class="nav-link" aria-controls="teacher" role="tab" data-toggle="tab">Teachers</a></li>
                          <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
                      </ul><hr class="hrTab">

                      <!-- Tab panes -->

                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="info">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="teacher">
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


<script type="text/javascript">
    $(document).ready(function(){
      // setTimeout(function() {
          $('#info').load('pages/subject_group/info/sg_info.php');
        // },100);
    });

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#infoTab").click(function(){
      $('#info').load('pages/subject_group/info/sg_info.php');
    })


    $("#teacherTab").click(function(){
      $('#teacher').load('pages/subject_group/teachers/sg_teacher.php');
    })

  

    // +++++++++++++++++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++++++++++++++++++++

</script>
