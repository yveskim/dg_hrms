

<style media="screen">
  .title-text{
    text-align: center;
  }


</style>

<div class="row">
  <div class="col-12">
    <h3 class="title-text">School Year</h3>
  </div>
</div>
<hr>


<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover tableSy table-sm nowrap" style="white-space: nowrap;">
        <thead>
          <tr>
            <th>#</th>
            <th>School Year</th>
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
    loadSy();
  })



  function loadSy(){
    $.ajax({
      url: 'getSchoolYear',
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
      $('.tableSy').off();
      $('.tableSy').DataTable().clear().destroy();
         $('.tableSy').DataTable({
           "data": data.sy,
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
             {"data": "school_year"},
             {"data": "is_active"},
             {
                "data": null,
                render: function(data, type, row) {
                return  '<button type="button" id="'+data.sy_id+'" class="btn btn-warning set_active full-size" title="set active" >Set Active</button>';
               }
             },
          
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         
        $('.set_active').click(function(){
          let sy_id = $(this).prop('id');
            $.ajax({
                url: 'setActiveSy',
                method: 'post',
                dataType: 'json',
                data:{sy_id:sy_id},
                success: function(res){
                    if(res.status == 1){
                        Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Update Success',
                        text: 'School Year Updated.',
                        showConfirmButton: true
                        })
                        loadSy();
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
