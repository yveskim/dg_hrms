$(document).ready(function () {
  $(".sr-details-div").hide();
});

$("#modalChooseEmp").on("shown.bs.modal", function (e) {
  $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
});

$("#modalChooseEmp").on("show.bs.modal", function () {
  $.ajax({
    url: "service/selectEmployeeSr",
    method: "get",
    dataType: "json",
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    complete: function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();
    },
    success: function (data) {
      $(".table-choose-emp").off();
      $(".table-choose-emp").DataTable().clear().destroy();
      $(".table-choose-emp").DataTable({
        data: data.emp,
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
          { data: "emp_agency_employee_no" },
          { data: "emp_lname" },
          { data: "emp_fname" },
          { data: "emp_mname" },
          { data: "emp_gender" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<div class="display-block"><button type="button" id="' +
                data.emp_id +
                '" class="btn btn-success btn-sm btn-xs _select" title="select employee"><i class="fa fa-check-square"></i>&nbsp;Select</button>'
              );
            },
          },
        ],
      }); //end of datatable

      $(".table-choose-emp").on("click", "._select", function () {
        $("#modalChooseEmp").modal("toggle");
        let emp_id = $(this).prop("id");
        loadeEmpServiceRecord(emp_id);
      });
    },
  });
});

function loadeEmpServiceRecord(emp_id) {
  $.ajax({
    url: "service/getEmpServiceRecord",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    complete: function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();
    },
    success: function (data) {
      // console.log(data);
      let house = data.emp.emp_p_add_house;
      if (house == null || house == "") {
        house = "";
      } else {
        house = data.emp.emp_p_add_house + ", ";
      }
      let street = data.emp.emp_p_add_street;
      if (street == null || street == "") {
        street = "";
      } else {
        street = data.emp.emp_p_add_street + ", ";
      }
      let subdivision = data.emp.emp_p_add_subdivision;
      if (subdivision == null || subdivision == "") {
        subdivision = "";
      } else {
        subdivision = data.emp.emp_p_add_subdivision + ", ";
      }
      let barangay = data.emp.emp_p_add_barangay;
      if (barangay == null || barangay == "") {
        barangay = "";
      } else {
        barangay = data.emp.emp_p_add_barangay + ", ";
      }
      let municipality = data.emp.emp_p_add_municipality;
      if (municipality == null || municipality == "") {
        municipality = "";
      } else {
        municipality = data.emp.emp_p_add_municipality + ", ";
      }
      let city = data.emp.emp_p_add_city;
      if (city == null || city == "") {
        city = "";
      } else {
        city = data.emp.emp_p_add_city + ", ";
      }
      let province = data.emp.emp_p_add_province;
      if (province == null || province == "") {
        province = "";
      } else {
        province = data.emp.emp_p_add_province + ", ";
      }
      let zip = data.emp.emp_p_add_zip;
      if (zip == null || zip == "") {
        zip = "";
      }

      $("#emp_id_det").text(data.emp.emp_agency_employee_no);
      $("#emp_id_ref").val(data.emp.emp_id);
      $("#surname").text(data.emp.emp_lname);
      $("#given_name").text(data.emp.emp_fname);
      $("#middle_name").text(data.emp.emp_mname);
      $("#birth").text(data.emp.emp_birthdate);
      $("#address").text(
        house +
          street +
          subdivision +
          barangay +
          municipality +
          city +
          province +
          zip
      );

      $(".sr-details-div").show(function () {
        $(".table-service-record").off();
        $(".table-service-record").DataTable().clear().destroy();
        $(".table-service-record").DataTable({
          data: data.sr,
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
              render: function (data, type, row, meta) {
                if (data.is_active == true) {
                  return '<div class="bg-success text-light" style="text-align: center;">active</div>';
                } else {
                  return '<div class="bg-danger text-light" style="text-align: center;">ended</div>';
                }
              },
            },
            { data: "sr_date_started" },
            { data: "sr_date_end" },
            { data: "position_title" },
            { data: "sr_status" },
            { data: "salary" },
            { data: "st_title" },
            { data: "st_branch" },
            { data: "loa_wo_pay_date_from" },
            { data: "loa_wo_pay_date_to" },
            { data: "total_deductions" },
            { data: "sr_is_seperated" },
            { data: "sr_seperation_cause" },
            { data: "sr_seperation_date" },
            { data: "nbc_no" },
            { data: "sr_remarks" },
          ],
        }); //end of datatable
      });

      $("html, body").animate(
        {
          scrollTop: $(".table-service-record").offset().top,
        },
        500
      );
    },
  });
}

$("#modalUpdateServiceRecord").on("shown.bs.modal", function (e) {});

$("#modalUpdateServiceRecord").on("hidden.bs.modal", function (e) {
  $("#pantilla_no").empty();
  $("#nbc_ref").empty();
  $("#updateServiceRecordForm").empty();
  $("#transaction_type").val($("#transaction_type option:first").val());
});

$("#transaction_type").change(function () {
  if ($(this).val() == 1) {
    $("#updateServiceRecordForm").load(
      "pages/service_record/per_employee/service_record/new_sr.php"
    );
  } else if ($(this).val() == 2) {
  } else if ($(this).val() == 3) {
  } else if ($(this).val() == 4) {
  } else if ($(this).val() == 5) {
  } else if ($(this).val() == 6) {
  } else if ($(this).val() == 7) {
  } else if ($(this).val() == 8) {
  } else if ($(this).val() == 9) {
  }
});
