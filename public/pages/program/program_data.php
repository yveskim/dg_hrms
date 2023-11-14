

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

.tableProgram tr td , .tableProgram p {
  /* border-collapse: collapse;
  border-spacing:0; 
  vertical-align: middle; */
  line-height: 1;
}

.tableProgram td, .tableProgram tr{
  padding-top: .4rem;
  padding-bottom: 0;
  border-spacing:0; 
}

.full-size{
  width: 100%;
}

/* ---------------------------------- */
</style>

<div class="row">
  <div class="col-12">
    <h3 class="title-text">Programs Data (JHS)</h3>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover tableProgram table-sm nowrap" style="white-space: nowrap;" cellspacing="0">
        <thead>
          <tr style="padding: 0;">
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Prog. Head</th>
            <!-- <th>Action</th> -->
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
    
    loadProgram();

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

  function loadProgram(){
    $.ajax({
      url: 'getPrograms',
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
      $('.tableProgram').off();
      $('.tableProgram').DataTable().clear().destroy();
         $('.tableProgram').DataTable({
           "data": data.prog,
           "responsive": false,
           "scrollX": true,
           "autoWidth": true,
           "searching": false,
           "paging": false,
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
                return  '<button type="button" id="'+data.prog_id+'" class="btn btn-info btn-md details" title="view details" style="width:100%;">&nbsp;'+data.program_title+'</button>';
               }
             },
            //  {
            //      "data": null,
            //      render: function (data, type, row, meta) {
            //          return '<p class="prog-title" id="'+data.program_title+'">'+data.program_title+'</p>';
            //      }
            //  },
            //  {"data": "program_title"},
            // {"data": "cat_title"}, 
             {"data": "description"},
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                  if(data.emp_id === null){
                    return '<p style="color: orange;">not assigned</p>';
                  }else{
                    return '<p>'+data.emp_lname+', '+data.emp_fname+' '+data.emp_mname+'</p>';
                  }
                     
                 }
             }
           
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         
        $('.details').click(function(){
          let prog_id = $(this).prop('id');
          $('.content-div').load('pages/program/each_program.php', function(){
            // alert(prog_id);
            $('#prog_id_details').val(prog_id);
          })
        })



     }//end of success........
   });//end of ajax ................
}




</script>
