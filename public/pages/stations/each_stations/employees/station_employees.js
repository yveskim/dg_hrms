$(document).ready(function () {
  let station_id = $("#station_id").val();
  loadAllEmpStations(station_id);
});

let station_id = $("#station_id").val();

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
          // {
          //   data: null,
          //   render: function (data, type, row) {
          //     return (
          //       '<button type="button" id="' +
          //       data.emp_station_id +
          //       '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit date"><i class="fa fa-edit"></i></button>'
          //     );
          //   },
          // },
          { data: "emp_agency_employee_no" },
          { data: "emp_lname" },
          { data: "emp_fname" },
          { data: "emp_mname" },
          { data: "emp_gender" },
          { data: "sr_date_started" },
          { data: "sr_date_end" },
          {
            data: null,
            render: function (data, type, row) {
              if(data.sr_is_seperated == true){
                return '<span class="col-md-12 bg-danger full-size text-light text-center">Seperated</span>';
              }else{
                return '<span class="col-md-12 bg-success full-size text-light text-center">Active</span>';
              }
            },
          },
          { data: "sr_processed_by" },
          // {
          //   data: null,
          //   render: function (data, type, row) {
          //     return (
          //       '<button type="button" id="' +
          //       data.emp_station_id +
          //       '" class="btn btn-danger btn-sm btn-xs _delete full-size"  title="delete entry"><i class="fa fa-trash"></i></button>'
          //     );
          //   },
          // },
        ],
      }); //end of datatable
      // edit child +++++++++++++++++++
      $(".table-emp-station").on("click", "._edit", function () {
        $("#modalEditDate").modal("toggle");
        let emp_station_id = $(this).prop("id");
        $.ajax({
          url: "station/getEmpStationDetails",
          method: "get",
          dataType: "json",
          data: { emp_station_id: emp_station_id },
          success: function (data) {
            console.log(data);
            $("#emp_name").text(
              data.emp_st.emp_lname +
                ", " +
                data.emp_st.emp_fname +
                " " +
                data.emp_st.emp_mname
            );
            $("#edit_date_started").val(data.emp_st.date_started);
            $("#edit_date_ended").val(data.emp_st.date_end);
            $("#emp_station_id").val(data.emp_st.emp_station_id);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table-emp-station").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let emp_station_id = $(this).prop("id");

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
              url: "station/deleteEmpStation",
              method: "get",
              dataType: "json",
              data: { emp_station_id: emp_station_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadAllEmpStations(station_id);
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

      $(".table-select-employee").on("change", ".select-emp", function () {
        $("tr .select-emp").each(function () {
          if (this.checked) {
            $(this).closest("tr").addClass("bg-warning");
          } else {
            $(this).closest("tr").removeClass("bg-warning");
          }
        });
      });
    },
  });
});

$("#selectEmpForm").submit(function (event) {
  event.preventDefault();
  let formData = new FormData(this);
  formData.append("user_id", $("#user").val());
  formData.append("station_id", $("#station_id").val());

  let employee = new Array();
  $("input[name='emp_id[]']:checked").each(function () {
    employee.push($(this).prop("id"));
  });

  formData.append("employee", employee);

  $.ajax({
    url: "station/setEmployeeStation",
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
      // console.log(res);
      if (res.status == 1) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Process Successfull",
          text: "employees are successfuly added to station",
          showConfirmButton: true,
        });
        $("#modalSelectEmployee").modal("toggle");
        $("#selectEmpForm")[0].reset();
        loadAllEmpStations(station_id);
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

// update emp form

$("#updateDateForm").submit(function (event) {
  event.preventDefault();
  let formData = new FormData(this);
  formData.append("user_id", $("#user").val());

  $.ajax({
    url: "station/updateEmployeeStationDate",
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
          text: "Date Successfully Updated",
          showConfirmButton: true,
        });
        $("#modalEditDate").modal("toggle");
        $("#updateDateForm")[0].reset();
        loadAllEmpStations(station_id);
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
