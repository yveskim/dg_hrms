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
</style>

<div class="row container">
  <div class="col-md-12">
    <input type="hidden" id="dept_id_details">
    <div class="row">
      <div class="col-md-12">
        <center><h3 id="dept_title">DEPARTMENT</h3></center>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="portlet light bordered">
              <div class="portlet-body">
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation"><a href="#info" id="infoTab" class="nav-link active" aria-controls="info" role="tab" data-toggle="tab">Info</a></li>
                          <li role="presentation"><a href="#teacher" id="teacherTab"  class="nav-link" aria-controls="teacher" role="tab" data-toggle="tab">Teachers</a></li>
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

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function() {
          loadDepartment();
          $('#info').load('pages/department/info/department_info.php');
        },100);
    });

    function loadDepartment(){
      let dept_id = $('#dept_id_details').val();
      // console.log(dept_id);
      $.ajax({
        url: 'getDepartmentDetails',
        method: 'get',
        dataType: 'json',
        data: {dept_id:dept_id},
        // beforeSend: function(){
        //   $('.spiner-div').show();
        //   $('.div-blur').show();
        // },
        // complete: function(){
        //   $('.spiner-div').hide();
        //   $('.div-blur').hide();
        // },
        success: function(data){
          $('#dept_title').text(data.dept.dept_title +'-'+data.dept.cat_title);
        
          if(data.dept.dept_head == null){
            $('#dept_head').text('N/A');
          }else{
            $('#dept_head').text(data.dept.emp_lname+', '+data.dept.emp_fname+' '+data.dept.emp_mname);
          }
        }
        
      })//end of ajax

    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#adviseryTab").click(function(){
      $('#advisery').load('pages/department/advisery/department_advisery.php');
    })

    $("#teacherTab").click(function(){
      $('#teacher').load('pages/department/teachers/department_teachers.php');
    })

    // +++++++++++++++++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++++++++++++++++++++

   
</script>

<link rel="stylesheet" href="assets/each_emp_css.css">
