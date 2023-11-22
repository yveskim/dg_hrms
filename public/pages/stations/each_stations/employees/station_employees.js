$(document).ready(function () {
  let station_id = $("#station_id").val();
  loadAllEmpStations(station_id);
  submitStationForm();
});

$("#station_employees").click(function () {
  $("#stationEmpTab").load(
    "pages/stations/each_stations/employees/station_employees.php",
    function () {
      loadAllEmpStations(station_id);
    }
  );
});

function loadAllEmpStations(station_id) {
  $.ajax({
    url: "station/loadEmpInStation",
    method: "get",
    dataType: "json",
    data: { station_id: station_id },
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      $("#station_title").text(data.title.st_title);
      $("#_office_id").text(data.office_id.st_office_id);
      $("#station_address").text(data.address.st_office_address);
      $("#station_branch").text(data.branch.st_branch);

      $(".station-div").show();
      $(".table-emp-station").off();
      $(".table-emp-station").DataTable().clear().destroy();
      $(".table-emp-station").DataTable({
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
                data.emp_station_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i></button>'
              );
            },
          },
          { data: "emp_agency_employee_no" },
          { data: "emp_lname" },
          { data: "emp_fname" },
          { data: "emp_mname" },
          { data: "emp_gender" },
          { data: "date_started" },
          { data: "date_end" },
          { data: "assigned_by" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.emp_station_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size"  title="delete entry"><i class="fa fa-trash"></i></button>'
              );
            },
          },
        ],
      }); //end of datatable
      // edit child +++++++++++++++++++
      $(".table-emp-station").on("click", "._edit", function () {
        $("#modalSelectEmployee").modal("toggle");
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
      $(".table-emp-station").on("click", "._delete", function () {
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
                  loadAllEmpStations();
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
  $("#modalSelectEmployee").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#station_id").val(null);
    $("#stationForm")[0].reset();
  });

  $("#modalSelectEmployee").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

$("#modalSelectEmployee").on("shown.bs.modal", function (e) {
  $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust(); //align table header
});



$(".btn-add-emp").click(function () {
  $.ajax({
    url: "station/getEmpNoStation",
    method: "get",
    dataType: "json",
    success: function (data) {
      $(".table-select-employee").show();
      $(".table-select-employee").off();
      $(".table-select-employee").DataTable().clear().destroy();
      $(".table-select-employee").DataTable({
        data: data.emp,
        responsive: false,
        scrollX: true,
        autoWidth: false,
        destroy: true,
        searching: true,
        paging: true,
        ordering: true,
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
                '<input type="checkbox" id="' +
                data.emp_id +
                '" class="select-emp" name="emp_id[]" style="transform: scale(1.5);" form="selectEmpForm">'
              );
            },
          },
          { data: "emp_agency_employee_no" },
          { data: "emp_lname" },
          { data: "emp_fname" },
          { data: "emp_mname" },
        ],
        
      }); //end of datatable
       
    },
  
  });
});

function submitStationForm() {
  $("#selectEmpForm").submit(function (event) {
    event.preventDefault();
    let formData = new FormData(this);
    formData.append("user_id", $("#user").val());
    
    var selectedIds = $(".table-emp-station").columns().checkboxes.selected()[0];
    console.log(selectedIds)
 
    selectedIds.forEach(function(selectedId) {
        alert(selectedId);
    });


    // $.ajax({
    //   url: "station/updateStation",
    //   method: "post",
    //   dataType: "json",
    //   data: formData,
    //   contentType: false,
    //   cache: false,
    //   processData: false,
    //   beforeSend: function () {
    //     $(".spiner-div").show();
    //     $(".div-blur").show();
    //   },
    //   success: function (res) {
    //     if (res.status == 1) {
    //       Swal.fire({
    //         position: "center",
    //         icon: "success",
    //         title: "Process Successfull",
    //         text: "Record changes is successfuly made",
    //         showConfirmButton: true,
    //       });
    //       $("#modalSelectEmployee").modal("toggle");
    //       $("#stationForm")[0].reset();
    //       loadAllEmpStations();
    //     } else {
    //       Swal.fire({
    //         position: "center",
    //         icon: "error",
    //         title: "Action Failed",
    //         text: res.message,
    //         showConfirmButton: true,
    //       });
    //     } //end ifelse
    //   },
    //   complete: function () {
    //     $(".spiner-div").hide();
    //     $(".div-blur").hide();
    //   },
    // });
  });
}
