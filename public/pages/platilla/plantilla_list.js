$(document).ready(() => {
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadPlantilla();
});

function loadPlantilla() {
  $.ajax({
    url: "plantilla/getPlantilla",
    method: "get",
    dataType: "json",
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      $(".table-plantilla").off();
      $(".table-plantilla").DataTable().clear().destroy();
      $(".table-plantilla").DataTable({
        data: data.plant,
        responsive: false,
        scrollX: true,
        autoWidth: false,
        destroy: true,
        searching: true,
        paging: true,
        columns: [
          {
            data: null,
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            },
          },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<div class="display-block"><button type="button" id="' +
                data.plantilla_id +
                '" class="mb-1 mr-1 col-md-6 btn btn-primary btn-sm btn-xs btn-edit _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'+
                '<button type="button" id="' +
                data.plantilla_id +
                '" class="col-md-6 btn btn-info btn-sm btn-xs btn-view _view" title="view entry"><i class="fa fa-folder-open"></i>&nbsp;Open</button></div>'
              );
            },
          },
          { data: "plantilla_item_no" },
          { data: "position_title" },
          { data: "salary_grade" },
          { data: "date_recieved" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<center><button type="button" id="' +
                data.plantilla_id +
                '" class="btn btn-danger btn-sm btn-xs btn-delete _delete" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button></center>'
              );
            },
          },
        ],
      }); //end of datatable
      // edit plantilla +++++++++++++++++++
      $(".table-plantilla").on("click", "._edit", function () {
        $("#modalAddPlantilla").modal("toggle");
        let plantilla_id = $(this).prop("id");
        $.ajax({
          url: "plantilla/getplantillaDetails",
          method: "get",
          dataType: "json",
          data: { plantilla_id: plantilla_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#plantilla_id").val(plantilla_id);
            $(".form-type").text("(EDIT)");
            $("#plantilla_no").val(data.plantilla.plantilla_no);
            $("#plantilla_title").val(data.plantilla.plantilla_title);
            $("#tranche").val(data.plantilla.tranche);
            $("#effectivity_date").val(data.plantilla.effectivity_date);
          },
        });
      });

       // open plantilla +++++++++++++++++++
       $(".table-plantilla").on("click", "._view", function () {
        let plantilla_id = $(this).prop("id");
        $('.plantilla-content-div').load('pages/plantilla/tranche_table/tranche_table.php', function(){
            $('#plantilla_id').val(plantilla_id);
        })
      });

      // delete plantilla ++++++++++++++++++++++++
      $(".table-plantilla").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let plantilla_id = $(this).prop("id");

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
              url: "plantilla/deleteplantilla",
              method: "get",
              dataType: "json",
              data: { plantilla_id: plantilla_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadPlantilla();
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
      });
      // end delete child =====================
    },
    complete: function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();
    },
  });
}

$("#modalAddPlantilla").on("hidden.bs.modal", function () {
  $("#is_edit").val(0);
  $("#plantilla_id").val(null);
  $("#plantillaForm")[0].reset();
});

$("#modalAddPlantilla").on("show.bs.modal", function () {
  $(".form-type").text("(ADD)");
});

$("#plantillaForm").submit(function (event) {
  event.preventDefault();
  let formData = new FormData(this);
  let user_id = $('#user').val();
  formData.append('user_id', user_id);
  
  $.ajax({
    url: "plantilla/updatePlantilla",
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
        $("#modalAddPlantilla").modal("toggle");
        $("#plantillaForm")[0].reset();
        loadPlantilla();
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
});
