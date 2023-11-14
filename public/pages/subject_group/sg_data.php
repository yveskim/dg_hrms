

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


/* ---------------------------------- */
</style>

<div class="row">
  <div class="col-12">
    <h3 class="title-text">Subject Group Data (SHS)</h3>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover tblSg table-sm nowrap" style="white-space: nowrap;">
        <thead>
          <tr>
            <th>#</th>
            <th>Action</th>
            <!-- <th>Subject</th> -->
            <th>Group</th>
            <th>SG Head</th>
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
    loadSg();
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

  function loadSg(){
    $.ajax({
      url: 'getSg',
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
      $('.tblSg').off();
      $('.tblSg').DataTable().clear().destroy();
         $('.tblSg').DataTable({
           "data": data.sg,
           "responsive": false,
           "scrollX": true,
           "autoWidth": true,
           "destroy" : true,
           "searching" : false,
           "paging" : false,
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
                return  '<button type="button" id="'+data.sg_id+'" class="btn btn-info btn-lg details sg-title" title="view details full-size" style="width: 100%;">'+data.sg_subject+'</button>';
               }
             },
            //  {
            //      "data": null,
            //      render: function (data, type, row, meta) {
            //          return '<p class="sg-title" id="'+data.sg_subject+'">'+data.sg_subject+'</p>';
            //      }
            //  },
             {"data": "sg_group"},
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                  if(data.sgh_emp_id === null){
                    return '<p style="color: orange;">not assigned</p>';
                  }else{
                    return '<p>'+data.emp_lname+', '+data.emp_fname+' '+data.emp_mname+'</p>';
                  }
                     
                 }
             },
          
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         
        $('.details').click(function(){
          let sg_id = $(this).prop('id');
          $('.content-div').load('pages/subject_group/each_sg.php', function(){
            // alert(sg_id);
            $('#sg_id_details').val(sg_id);
            
          })
        })



     }//end of success........
   });//end of ajax ................
}




</script>
