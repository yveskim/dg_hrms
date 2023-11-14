
    <style media="screen">

      .btn-group-xs > .btn, .btn-xs {
        padding: .45rem .2rem;
        font-size: .675rem;
        line-height: .5;
        border-radius: .2rem;
      }

      .fa-trash{
        text-align:center;
        margin-left: 5%;
      }
    </style>

<div class="col-12">
  <div class="children-container">
    <table class="table table-bordered stripe tableChildren compact table-sm">
      <thead>
        <tr>
          <th width="60%">Name</th>
          <th width="30%">Birthdate</th>
          <th align="center">Action</th>
        </tr>
      </thead>
    </table>

  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  if ( ! $.fn.DataTable.isDataTable( '.tableChildren' ) ) {//method to check if datatable is already loaded. if not load the ajax
    loadChildren();
  }



});
function loadChildren(){
  var empId = $('#empIdFamBgChildren').val();
  $.ajax({
    url: 'admin/getChildren',
    method: 'get',
    dataType: 'JSON',
    data: {empId:empId},
    success: function(data){
      $('.tableChildren').DataTable({
        "searching": false,
        "paging": false,
        "data": data.child,
        "responsive": true,
        "columns": [
          {"data": "child_name"},
          {"data": "child_birthdate"},
          {
            "data": null,
            render: function(data, type, row) {
            return '<i class="fa fa-trash btn btn-danger btn-xs" type="button" id="btn-delete-child" value='+data.child_id+'></i>';
            }
          }
        ]
      });
      deleteChild();
    }

  });
}
function deleteChild(){
             var tablechild = $('.tableChildren').DataTable();
             $('.tableChildren').on('click', 'tr',  function(){
             var data = tablechild.row( this ).data();
             //console.log( data['child_id'] );
             var c_id = data['child_id'];
             var tr = $(this).closest('tr');  // **add this

             if (confirm('Are you sure you want to delete '+data['child_name']+' ?')) {
               $.ajax({
                 url: 'admin/deleteChild',
                 method: 'post',
                 dataType: 'json',
                 data: {c_id: c_id},
                 success: function(response){
                     if (response.status == 0) {
                       alert("can't delete the row");
                       errorToast(response.message);
                     }else {
                       deleteToast(response.message);
                      // $('#familyBg').load('pages/employee/family_bg.php');
                      $('.children-content').load('pages/employee/children/children_list.php');
                    //  $('.tableChildren').DataTable().ajax.reload();
                     }
                 }
               });
             }else {
            //   tablechild.ajax.reload();
             }

         });

}
</script>
