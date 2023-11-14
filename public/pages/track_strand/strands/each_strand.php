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
    font-size: 2vw;
    font-weight: bold;
  }


</style>

<div class="row container">
  <div class="col-md-12">
    <input type="hidden" id="strand_id_details">
    <div class="row">
        <div class="col-md-12">
          <div class="portlet light bordered">

              <div class="portlet-body">
              <div class="col-md-2">
                <center><h2 id="strand_title"></h2></center>
              </div>
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs mb-4" role="tablist">
                          <li role="presentation"><a href="#advisery" id="adviseryTab" class="nav-link active" aria-controls="advisery" role="tab" data-toggle="tab">Advisery</a></li>
                          <li role="presentation"><a href="#section" id="sectionTab" class="nav-link" aria-controls="section" role="tab" data-toggle="tab">Section</a></li>
                          <li role="presentation"><a href="#strandStudent" id="strandStudentTab" class="nav-link" aria-controls="strandStudent" role="tab" data-toggle="tab">Student</a></li>
                          <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
                      </ul>
                      <br>
                      <!-- <hr class="hrTab"> -->

                      <!-- Tab panes -->

                      <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="advisery">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="section">
                          </div>

                          <div role="tabpanel" class="tab-pane" id="strandStudent">
                          </div>


                          <div role="tabpanel" class="tab-pane" id="others">
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
            loadStrand();
            $('#advisery').load('pages/track_strand/strands/advisery/strand_advisery.php');
        },100);
    });

    function loadStrand(){
      let strand_id = $('#strand_id_details').val();
      // console.log(strand_id);
      $.ajax({
        url: 'getStrandDetails',
        method: 'get',
        dataType: 'json',
        data: {strand_id:strand_id},
        // beforeSend: function(){
        //   $('.spiner-div').show();
        //   $('.div-blur').show();
        // },
        // complete: function(){
        //   $('.spiner-div').hide();
        //   $('.div-blur').hide();
        // },
        success: function(data){
          $('#strand_title').text(data.strand.strand_title);
        }
        
      })//end of ajax

    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#adviseryTab").click(function(){
      $('#advisery').load('pages/track_strand/strands/advisery/strand_advisery.php');
    })


    $("#sectionTab").click(function(){
      $('#section').load('pages/track_strand/strands/sections/section_data.php');
    })

    $("#teacherTab").click(function(){
      $('#teacher').load('pages/track_strand/strands/teachers/teacher_data.php');
    })

    $("#strandStudentTab").click(function(){
      $('#strandStudent').load('pages/track_strand/strands/students/students_data.php');
    })

    $("#othersTab").click(function(){

    })
  

    // +++++++++++++++++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++++++++++++++++++++





</script>

<link rel="stylesheet" href="assets/each_emp_css.css">
