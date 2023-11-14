$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadWorkInv();
  submitAddWorkInvForm();
  resetEditForm();
});

function loadWorkInv() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadWorkInv",
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
      $(".table_work_inv").off();
      $(".table_work_inv").DataTable().clear().destroy();
      $(".table_work_inv").DataTable({
        data: data.inv,
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
                data.work_inv_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "work_inv_name_and_address" },
          { data: "work_inv_date_from" },
          { data: "work_inv_date_to" },
          { data: "work_inv_hours" },
          { data: "work_inv_position" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.work_inv_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $(".table_work_inv").on("click", "._edit", function () {
        $("#modalAddWorkInv").modal("toggle");
        // console.log($(this).prop("id"));
        let work_inv_id = $(this).prop("id");
        $.ajax({
          url: "employee/getWorkInvDetails",
          method: "get",
          dataType: "json",
          data: { work_inv_id: work_inv_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#work_inv_id").val(work_inv_id);
            $(".form-type").text("(EDIT)");
            $("#name_address").val(data.inv.work_inv_name_and_address);
            $("#date_from").val(data.inv.work_inv_date_from);
            $("#date_to").val(data.inv.work_inv_date_to);
            $("#total_hours").val(data.inv.work_inv_hours);
            $("#position").val(data.inv.work_inv_position);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_work_inv").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let work_inv_id = $(this).prop("id");

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
              url: "employee/deleteWorkInv",
              method: "get",
              dataType: "json",
              data: { work_inv_id: work_inv_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadWorkInv();
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
  $("#modalAddWorkInv").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#work_inv_id").val(null);
    $("#workInvForm")[0].reset();
  });

  $("#modalAddWorkInv").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddWorkInvForm() {
  $("#workInvForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateWorkInv",
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
          $("#modalAddWorkInv").modal("toggle");
          $("#workInvForm")[0].reset();
          loadWorkInv();
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
