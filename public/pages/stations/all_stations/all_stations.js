$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadAllStations();
  submitStationForm();
  resetEditForm();
});

function loadAllStations() {
  $.ajax({
    url: "station/loadAllStations",
    method: "get",
    dataType: "json",
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      $(".table-stations").off();
      $(".table-stations").DataTable().clear().destroy();
      $(".table-stations").DataTable({
        data: data.st,
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
                '<button type="button" id="' +
                data.station_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i></button>'
              );
            },
          },
          { data: "st_title" },
          { data: "st_office_id" },
          { data: "st_office_address" },
          { data: "st_branch" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.station_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i></button>'
              );
            },
          },
        ],
      }); //end of datatable
      // edit child +++++++++++++++++++
      $(".table-stations").on("click", "._edit", function () {
        $("#modalStation").modal("toggle");
        let station_id = $(this).prop("id");
        $.ajax({
          url: "station/getStationDetails",
          method: "get",
          dataType: "json",
          data: { station_id: station_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#station_id").val(station_id);
            $(".form-type").text("(EDIT)");
            $("#st_title").val(data.st.st_title);
            $("#st_id").val(data.st.st_office_id);
            $("#st_address").val(data.st.st_office_address);
            $("#st_branch").val(data.st.st_branch);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table-stations").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let station_id = $(this).prop("id");

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
              url: "station/deleteStation",
              method: "get",
              dataType: "json",
              data: { station_id: station_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadAllStations();
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

function resetEditForm() {
  $("#modalStation").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#station_id").val(null);
    $("#stationForm")[0].reset();
  });

  $("#modalStation").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitStationForm() {
  $("#stationForm").submit(function (event) {
    event.preventDefault();
    let formData = new FormData(this);
    formData.append("user_id", $("#user").val());
    $.ajax({
      url: "station/updateStation",
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
            text: "Record changes is successfuly made",
            showConfirmButton: true,
          });
          $("#modalStation").modal("toggle");
          $("#stationForm")[0].reset();
          loadAllStations();
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
}
