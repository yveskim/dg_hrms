
<style>
  table.dataTable td {
    padding: 0;
  }

  table.dataTable td .btn{
    padding: 0;
  }
</style>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
          <h5 class="col-md-8">Plantilla Positions</h5>
          <button class="col-md-3 btn btn-primary btn-sm full-size" data-toggle="modal" data-target="#modalAddPosition">ADD NEW</button>
      </div>
      <div class="card-body">
        <div class="data-div">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-hover tablePos table-sm nowrap full-size" style="white-space: nowrap;">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAddPosition">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Position</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
             
              <form id="positionForm"></form>
              <input type="hidden" id="is_edit" name="is_edit" form="positionForm">
              <input type="hidden" id="pos_id" name="pos_id" form="positionForm">
              <div class="section-div">
                <div class="row">
                  <div class="col-md-12">
                    <label for="pos_title">Title</label>
                    <input type="text" name="pos_title" id="pos_title" class="form-control form-control-sm" form="positionForm">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <label for="_category">Category</label>
                    <select name="_category" id="_category" class="form-control form-control-sm" form="positionForm">
                        <option value="">-</option>
                        <option value="Administrative">Administrative</option>
                        <option value="Supervisory">Supervisory</option>
                        <option value="Teaching">Teaching</option>
                        <option value="Non-Teaching">Non-Teaching</option>
                        <option value="Teaching Related">Teaching Related</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="SUBMIT" name="submit" class="btn btn-success form-control form-control-sm full-size" form="positionForm">
                  </div>
                </div>
              </div>
              <hr>

            </div>
            <!-- end of modal body -->

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
    loadPos();
  })

  function loadPos(){
    $.ajax({
      url: 'settings/getPositions',
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
      $('.tablePos').off();
      $('.tablePos').DataTable().clear().destroy();
      $('.tablePos').DataTable({
        data: data.pos,
        responsive: false,
        scrollX: true,
        autoWidth: false,
        destroy: true,
        searching: true,
        paging: true,
        pageLength: 25,
        columns: [
        {
              "data": null,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
          },
          {
            "data": null,
            render: function(data, type, row) {
            return  '<button type="button" id="'+data.emp_pos_id+'" class="btn btn-primary _edit full-size btn-sm" title="edit postion"><i class="fa fa-pencil-square-o"></i>Edit</button>';
            }
          },
          {"data": "pos_title"},
          {"data": "category"},
          {
            "data": null,
            render: function(data, type, row) {
            return  '<button type="button" id="'+data.emp_pos_id+'" class="btn btn-danger _delete full-size btn-sm" title="delete postion"><i class="fa fa-bin"></i>Delete</button>';
            }
          },
      
        ]
      });//end of datatable
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      $(".tablePos").on("click", "._edit", function () {
      let pos_id = $(this).prop('id');
      $("#modalAddPosition").modal("toggle");
      $('#is_edit').val(1);
      $('#pos_id').val(pos_id);
      $.ajax({
            url: 'settings/getPositionsDetails',
            method: 'get',
            dataType: 'json',
            data:{pos_id:pos_id},
            success: function(res){
              $('#pos_title').val(res.pos.pos_title);
              $('#_category').val(res.pos.category);
            }
      })
    })

    $(".tablePos").on("click", "._delete", function () {
      let pos_id = $(this).prop('id');

        Swal.fire({
          title: "Confirm Delete",
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: "Delete",
          denyButtonText: "Cancel",
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.ajax({
              url: "settings/deletePosition",
              method: "get",
              dataType: "json",
              data: { pos_id: pos_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadPos();
                } else {
                  Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Action Failed",
                    text: res.message,
                    showConfirmButton: true,
                  });
                } //end ifelse
              },
            });
          }
        });
      })
     }//end of success........
   });//end of ajax ................
}

$("#modalAddPosition").on("hidden.bs.modal", function(){
    $('#is_edit').val(0);
    $('#pos_id').val("");
});
      

$('#positionForm').submit(function(event){
  event.preventDefault();
  let formData = new FormData(this);
  $.ajax({
    url: "settings/setPosition",
    method: "post",
    dataType: "json",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (res) {
      if (res.status == 1) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Process Successfull",
          text: "Record added/changed successfuly",
          showConfirmButton: true,
        });
        $("#modalAddPosition").modal("toggle");
        $("#positionForm")[0].reset();
        loadPos();
      } else {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Action Failed",
          text: res.message,
          showConfirmButton: true,
        });
      } //end ifelse
    },
    complete: function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();
    },
  });
})


</script>
