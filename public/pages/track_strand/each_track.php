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

  #track_title{
    font-size: 2.5vw;
    font-weight: bold;
  }



</style>

<div class="row container">
  <div class="col-md-12">
    <input type="hidden" id="track_id_details">
   

    <div class="row">
          
        <div class="col-md-12">
          <div class="portlet light bordered">
       
              <div class="portlet-body ">
                <div class="col-md-2">
                    <center><h1 id="track_title"></h1></center>
                </div>
                  <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation"><a href="#strands" id="strandsTab" class="nav-link active" aria-controls="strands" role="tab" data-toggle="tab">Strands</a></li>
                          <!-- <li role="presentation"><a href="#others" id="othersTab" class="nav-link" aria-controls="others" role="tab" data-toggle="tab">Others</a></li> -->
                      </ul>
                      <hr class="hrTab">

                      <!-- Tab panes -->

                      <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="strands">
                          </div>

                          <!-- <div role="tabpanel" class="tab-pane" id="others">
                          </div> -->
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
          loadTrack();
          $('#strands').load('pages/track_strand/strands/strands_data.php');
        },100);
    });



    function loadTrack(){
      let track_id = $('#track_id_details').val();
      // console.log(track_id);
      $.ajax({
        url: 'getTrackDetails',
        method: 'get',
        dataType: 'json',
        data: {track_id:track_id},
        success: function(data){
          $('#track_title').text(data.track.track_title);
        }
        
      })//end of ajax

    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    $("#strandsTab").click(function(){
      $('#strands').load('pages/track_strand/strands/strands_data.php');
    })




</script>

<link rel="stylesheet" href="assets/each_emp_css.css">
