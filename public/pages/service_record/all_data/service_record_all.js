$(document).ready(() => {
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadServiceRecord();
});

function loadServiceRecord() {
  $.ajax({
    url: "service/getServiceRecord",
    method: "get",
    dataType: "json",
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
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
          { data: "sr_date_started" },
          { data: "sr_date_end" },
          { data: "emp_agency_employee_no" },
          { data: "position_title" },
          { data: "sr_status" },
          { data: "st_title" },
          { data: "st_branch" },
          { data: "sr_is_seperated" },
          { data: "sr_seperation_date" },
          { data: "sr_seperation_cause" },
          { data: "nbc_no" },
          { data: "sr_remarks" },
        ],
      }); //end of datatable
    },
    complete: function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();
    },
  });
}

