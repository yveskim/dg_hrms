$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadWorkXp();
  submitAddWorkXpForm();
  resetEditForm();
});

function loadWorkXp() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadWorkXp",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      // console.log(data);

      // if (data.child !== null) {
      $(".table_work_xp").off();
      $(".table_work_xp").DataTable().clear().destroy();
      $(".table_work_xp").DataTable({
        data: data.exp,
        responsive: false,
        scrollX: true,
        autoWidth: false,
        destroy: true,
        searching: false,
        paging: false,
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
                data.work_exp_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "work_exp_company" },
          { data: "work_exp_position" },
          { data: "work_exp_date_from" },
          { data: "work_exp_date_to" },
          { data: "work_exp_monthly_sal" },
          { data: "work_exp_salary_grade" },
          { data: "work_exp_gov_service" },
          { data: "work_exp_appointment_status" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.work_exp_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $(".table_work_xp").on("click", "._edit", function () {
        $("#modalAddWorkXp").modal("toggle");
        // console.log($(this).prop("id"));
        let work_exp_id = $(this).prop("id");
        $.ajax({
          url: "employee/getWorkXpDetails",
          method: "get",
          dataType: "json",
          data: { work_exp_id: work_exp_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#work_exp_id").val(work_exp_id);
            $(".form-type").text("(EDIT)");
            $("#agency_company").val(data.exp.work_exp_company);
            $("#position_title").val(data.exp.work_exp_position);
            $("#date_from").val(data.exp.work_exp_date_from);
            $("#date_to").val(data.exp.work_exp_date_to);
            $("#monthly_salary").val(data.exp.work_exp_monthly_sal);
            $("#salary_grade").val(data.exp.work_exp_salary_grade);
            $("#gov_service").val(data.exp.work_exp_gov_service);
            $("#appointment_status").val(data.exp.work_exp_appointment_status);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_work_xp").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let work_exp_id = $(this).prop("id");

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
              url: "employee/deleteWorkXp",
              method: "get",
              dataType: "json",
              data: { work_exp_id: work_exp_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadWorkXp();
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
  $("#modalAddWorkXp").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#work_exp_id").val(null);
    $("#workXpForm")[0].reset();
  });

  $("#modalAddWorkXp").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddWorkXpForm() {
  $("#workXpForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateWorkXp",
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
          $("#modalAddWorkXp").modal("toggle");
          $("#workXpForm")[0].reset();
          loadWorkXp();
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
