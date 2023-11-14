

<style media="screen">
  .title-text{
    text-align: center;
  }


</style>

<div class="row">
  <div class="col-12">
    <h3 class="title-text">Semester</h3>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover tableSemester table-sm nowrap" style="white-space: nowrap;">
        <thead>
          <tr>
            <th>#</th>
            <th>Semester</th>
            <th>Active</th>
            <th>Action</th>
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
    loadSemester();
  })



  function loadSemester(){
    $.ajax({
      url: 'getSemester',
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
      $('.tableSemester').off();
      $('.tableSemester').DataTable().clear().destroy();
         $('.tableSemester').DataTable({
           "data": data.sem,
           "responsive": false,
           "scrollX": true,
           "autoWidth": true,
           "destroy" : true,
           "searching" : false,
           "paging" : false,
           "columns": [
            {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;
                 }
             },
             {"data": "sem_title"},
             {"data": "is_active"},
             {
                "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.sem_id+'" class="btn btn-warning set_active full-size" title="set active" >Set Active</button>';
               }
             },
          
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         
        $('.set_active').click(function(){
          let sem_id = $(this).prop('id');
            $.ajax({
                url: 'setActiveSemester',
                method: 'post',
                dataType: 'json',
                data:{sem_id:sem_id},
                success: function(res){
                    if(res.status == 1){
                        Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Update Success',
                        text: 'School Year Updated.',
                        showConfirmButton: true
                        })
                        loadSemester();
                    }else{
                        Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Action Failed',
                        text: 'something went wrong',
                        showConfirmButton: true
                        })
                    }
                }
            })
        })



     }//end of success........
   });//end of ajax ................
}




</script>
