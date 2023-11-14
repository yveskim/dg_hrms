

<style media="screen">
  .title-text{
    text-align: center;
  }

  #pending-text{
    color: orange;
    border-bottom: 1px solid black;
  }

  #validated-text{
    color: green;
    border-bottom: 1px solid black;
  }

  #declined-text{
	color: red;
	border-bottom: 1px solid black;
  }

  .btn-group-xs > .btn, .btn-xs {
    padding: .45rem .2rem;
    font-size: .675rem;
    line-height: .5;
    border-radius: .2rem;
  }

  .btn-active{
    border-bottom: 4px solid gray;
    margin-bottom: -1px;
    margin-top: -1px;
  }


  .faded{
    opacity: .9;
  }

  .form137-div{
    text-align: center;
  }

  .btn-option{
    width: 100%;
  }

  .filter-modal-body{
    padding: 2em;
  }

  .tbl-text-sm{
    font-size: .7rem;
  }

  /* ----------------------------------------------------- */

/* radio button large */
.rad-assessment {
   transform: scale(1.5);
}

.rad-div{
  border-radius: .5em;
  padding: .5em 1em .5em 1em;
  width: 100%;
  color: white;
}

.rad-div:not(:first-child){
  margin-left: 3em;
}


.full-size{
  width: 100%;
}

/* ---------------------------------- */
</style>

<div class="row">
  <div class="col-12">
    <h3 class="title-text">Track Data (SHS)</h3>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover tblTrack table-sm nowrap">
        <thead>
          <tr style="padding: 0;">
            <th>#</th>
            <th width="40%">Action</th>
            <th>Description</th>
            <!-- <th>Title</th>
            <th>Description</th> -->
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

  <script type="text/javascript">
  $(document).ready(function(){

    $('.spiner-div').hide();
    $('.div-blur').hide();
    
    loadTrack();

    $('#modalProgram').on('shown.bs.modal', function () {
        getCategory();
    })    
  })



  function getCategory(){
    $.ajax({
      url: 'getCategory',
      method: 'get',
      dataType: 'json',
      success: function(data){
        $('#cat_id').empty();
        $('#cat_id').append('<option value="">---select---</option>');
        $.each(data.cat, function(key, val){
          $('#cat_id').append('<option value="'+val.cat_id+'">'+val.cat_title+'</option>');
        })
      }
    })
  }

  function loadTrack(){
    $.ajax({
      url: 'getTrack',
      method: 'get',
      dataType: 'json',
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
      $('.tblTrack').off();
      $('.tblTrack').DataTable().clear().destroy();
         $('.tblTrack').DataTable({
           "data": data.track,
           "responsive": false,
           "scrollX": true,
           "autoWidth": true,
           "searching": false,
           "paging": false,
           "info": false,
           "destroy" : true,
		      //  "dom": "<'col-sm-12 col-md-6'Blr>ftip",
			    //  "buttons": [
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
                return  '<button type="button" id="'+data.track_id+'" class="btn btn-info details btn-lg full-size" title="view details" style="width:100%;">&nbsp;'+data.track_title+'</button>';
               }
             },
             {"data":"track_description"}
 
            //  {
            //      "data": null,
            //      render: function (data, type, row, meta) {
            //          return '<p class="track_title" id="'+data.track_title+'">'+data.track_title+'</p>';
            //      }
            //  },
            // //  {"data": "track_description"},
            //  {
            //    "data": null,
            //     render: function(data, type, row) {
            //     return  '  <div class="text-wrap width-200">' + data.track_description +' </div>';
            //    }
            //  },
           
           
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         
        $('.details').click(function(){
          let track_id = $(this).prop('id');
          $('.content-div').load('pages/track_strand/each_track.php', function(){
            // alert(track_id);
            $('#track_id_details').val(track_id);
          })
        })



     }//end of success........
   });//end of ajax ................
}




</script>
