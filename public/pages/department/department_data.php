

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


.tableDepartment td, .tableDepartment tr{
  line-height: 1;
}

.tableDepartment td, .tableDepartment tr{
  /* padding-top: .4rem; */
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
    <h1 class="title-text">Departments Data</h1>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover tableDepartment table-sm" id="datatable-button" style=" white-space:nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Location</th>
            <th>Cat.</th>
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
    
    loadDepartment();

    $('#modalDepartment').on('shown.bs.modal', function () {
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

  function loadDepartment(){
    $.ajax({
      url: 'getDepartments',
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
      $('.tableDepartment').off();
      $('.tableDepartment').DataTable().clear().destroy();
         $('.tableDepartment').DataTable({
           "data": data.dept,
           "responsive": false,
           "scrollX": true,
           "autoWidth": true,
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
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.dept_id+'" class="btn btn-info details full-size" title="view details">'+data.dept_title+'</button>';
               }
             },
             {"data": "dept_location"},
             {"data": "cat_title"}
   
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         
        $('.details').click(function(){
          let dept_id = $(this).prop('id');
          $('.content-div').load('pages/department/each_department.php', function(){
            // alert(dept_id);
            $('#dept_id_details').val(dept_id);
          })
        })



     }//end of success........
   });//end of ajax ................
}




</script>
