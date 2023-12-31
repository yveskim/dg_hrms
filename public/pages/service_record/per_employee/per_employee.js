$(document).ready(function () {
  $(".sr-details-div").hide();
});

$("#modalChooseEmp").on("shown.bs.modal", function (e) {
  setInterval(function () {
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
  }, -10000);
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
                '<button type="button" id="' +
                data.emp_id +
                '" class="btn btn-success btn-sm btn-xs _select full-size" title="select employee"><i class="fa fa-check-square"></i>&nbsp;Select</button>'
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

      if (data.st == null) {
        $("#station").html("<span class='text-warning'>station not set</span>");
        // $("#spanSet").html(
        //   '<button class="btn btn-primary btn-sm" id="btnSet" data-toggle="modal" data-target="#modalSetStation">Set/Change</button>'
        // );
        // $("#emp_station_id").val('');
      } else {
        // console.log(data.st);
        $("#station").text(data.st.st_title);
        // $("#emp_station_id").val(data.st.emp_station_id);
        
        // $("#btnSet").hide();
      }

      if (data.pl == null) {
        $("#plantilla_item").html(
          "<span class='text-warning'>plantilla not set</span>"
        );
      } else {
        $("#plantilla_item").text(
          data.pl.plantilla_item_no + " - " + data.pl.position_title
        );
      }

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
                if (data.is_active == true && data.sr_is_seperated == false) {
                  return '<div class="bg-success text-light" style="text-align: center;">active</div>';
                }else if (data.is_active == true && data.sr_is_seperated == true) {
                  return '<div class="bg-danger text-light" style="text-align: center;">seperated</div>';
                }else {
                  return '<div class="bg-warning text-dark" style="text-align: center;">ended</div>';
                }
              },
            },
            { data: "sr_date_started" },
            { data: "sr_date_end" },
            { data: "position_title" },
            { data: "sr_step" },
            { data: "sr_status" },
            { data: "salary" },
            { data: "st_title" },
            { data: "st_branch" },
            { data: "loa_wo_pay_date_from" },
            { data: "loa_wo_pay_date_to" },
            { data: "total_deductions" },
            { data: "sr_seperation_cause" },
            { data: "sr_seperation_date" },
            { data: "nbc_no" },
            { data: "sr_remarks" },
            {
              data: null,
              render: function (data, type, row, meta) {
                return '<button type="button" id="' +
                  data.sr_id +
                  '" class="fs-small ml-1 btn btn-info btn-sm btn-xs _loa full-size" title="loa details"><i class="fa fa-calendar-plus-o"></i>&nbsp;LOA</button>';
              },
            },
            {
              data: null,
              render: function (data, type, row, meta) {
                return '<button type="button" id="' +
                  data.sr_id +
                  '" class="fs-small ml-1 btn btn-primary btn-xs btn-sm _edit full-size" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>';
              },
            },
          ],
        }); //end of datatable

        $(".table-service-record").on("click", "._loa", function () {
          $("#modalLoa").modal("toggle");
          let sr_id = $(this).prop("id");
          $('#sr_id').val(sr_id);
        });
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
// ++++++++++++++++++++++++++++++

$("#modalSetStation").on("shown.bs.modal", function () {
  $.ajax({
    url: "station/getStations",
    method: "get",
    dataType: "json",
    success: function (data) {
      $(".table-station").off();
      $(".table-station").DataTable().clear().destroy();
      $(".table-station").DataTable({
        data: data.st,
        responsive: false,
        scrollX: true,
        autoWidth: false,
        destroy: true,
        searching: true,
        paging: false,
        columns: [
          {
            data: null,
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            },
          },
          { data: "st_title" },
          { data: "st_office_id" },
          { data: "st_office_address" },
          { data: "st_branch" },
          {
            data: null,
            render: function (data, type, row, meta) {
              return (
                "<button type='button' class='btn btn-sm btn-success full-size _set' name='st_id' " +
                "id='" +
                data.station_id +
                "'>Set</button>"
              );
            },
          },
        ],
      }); //end of datatable
      $(".table-station").on("click", "._set", function () {
        $("#modalSubmitStation").modal("toggle");
        $("#modalSubmitStation").addClass("modal-backdrop-blur");

        let station_id = $(this).prop("id");
        $.ajax({
          url: "station/getStationDetails",
          method: "get",
          dataType: "json",
          data: { station_id: station_id },
          success: function (data) {
            $("#station_title").val(data.st.st_title);
            $("#station_id").val(data.st.station_id);
          },
        });
      });
    },
  });
});
// ++++++++++++++++++++++++++++++++++++++++++++++++

$("#setStationForm").submit(function (event) {
  event.preventDefault();
  let formData = new FormData(this);
  let emp_id_ref = $("#emp_id_ref").val();
  formData.append("user_id", $("#user").val());
  formData.append("emp_id", emp_id_ref);

  $.ajax({
    url: "station/setEmpStation",
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
          text: "Date Successfully Updated",
          showConfirmButton: true,
        });
        $("#modalSetStation").modal("toggle");
        $("#modalSubmitStation").modal("toggle");
        $("#setStationForm")[0].reset();
        loadeEmpServiceRecord($("#emp_id_ref").val());
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
// ++++++++++++++++++++++++++++++++++++++++++++

$("#modalUpdateServiceRecord").on("hidden.bs.modal", function (e) {
  $("#pantilla_no").empty();
  $("#nbc_ref").empty();
  $("#updateServiceRecordForm").empty();
  $("#transaction_type").val($("#transaction_type option:first").val());
});

$("#loaForm").submit(function (event) {
  event.preventDefault();
  let formData = new FormData(this);
  let emp_id_ref = $("#emp_id_ref").val();
  formData.append("user_id", $("#user").val());
  formData.append("emp_id", emp_id_ref);
  $.ajax({
    url: "service/setLoaWoPay",
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
          text: "Data Successfully Updated",
          showConfirmButton: true,
        });
        $("#modalLoa").modal("toggle");
        $("#loaForm")[0].reset();
        loadeEmpServiceRecord($("#emp_id_ref").val());
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
// ++++++++++++++++++++++++++++++++++++++++++++




$("#btnSetSr").click(function () {
  let emp_id = $("#emp_id_ref").val();
    if ($("#transaction_type").val() == 1) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            Swal.fire({
              position: "center",
              icon: "info",
              title: "Action Failed",
              text: "The employee has already an existing Service Record. Please select another transaction or contact your administrator to verify",
              showConfirmButton: true,
            });
          }else{
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/new_sr.php');
          }
        },
      });
      
    } else if ($("#transaction_type").val() == 2) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/transfer_station.php');
          }else{
            Swal.fire({
                position: "center",
                icon: "info",
                title: "Action Failed",
                text: "The employee has no existing Service Record. Add new Service Record or contanct your administrative officer to verify.",
                showConfirmButton: true,
            });
          }
        },
      });
    } else if ($("#transaction_type").val() == 3) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/employment_status_change.php');
          }else{
            Swal.fire({
                position: "center",
                icon: "info",
                title: "Action Failed",
                text: "The employee has no existing Service Record. Add new Service Record or contanct your administrative officer to verify.",
                showConfirmButton: true,
            });
          }
        },
      });
    } else if ($("#transaction_type").val() == 4) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/new_nbc.php');
          }else{
            Swal.fire({
                position: "center",
                icon: "info",
                title: "Action Failed",
                text: "The employee has no existing Service Record. Add new Service Record or contanct your administrative officer to verify.",
                showConfirmButton: true,
            });
          }
        },
      });
      
    } else if ($("#transaction_type").val() == 5) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/step_increment.php');
          }else{
            Swal.fire({
                position: "center",
                icon: "info",
                title: "Action Failed",
                text: "The employee has no existing Service Record. Add new Service Record or contanct your administrative officer to verify.",
                showConfirmButton: true,
            });
          }
        },
      });
      
    } else if ($("#transaction_type").val() == 6) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/promotion.php');
          }else{
            Swal.fire({
                position: "center",
                icon: "info",
                title: "Action Failed",
                text: "The employee has no existing Service Record. Add new Service Record or contanct your administrative officer to verify.",
                showConfirmButton: true,
            });
          }
        },
      });
      
    } else if ($("#transaction_type").val() == 7) {
      $.ajax({
        url: "service/checkSrHasData",
        method: "get",
        dataType: "json",
        data:{emp_id: emp_id},
        success: function (res) {
          if(res.count > 0){
            $("#modalNewServiceRecord").modal("toggle");
            $('#transaction-div').load('pages/service_record/per_employee/service_record/seperation.php');
          }else{
            Swal.fire({
                position: "center",
                icon: "info",
                title: "Action Failed",
                text: "The employee has no existing Service Record. Add new Service Record or contanct your administrative officer to verify.",
                showConfirmButton: true,
            });
          }
        },
      });
    }else{
      alert('Please select Transaction Type');
    }
  
});
