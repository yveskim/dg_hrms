$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadLearningDev();
  submitAddLearningDevForm();
  resetEditForm();
});
function loadLearningDev() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadLearningDevelopment",
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
      $(".table_learning_dev").off();
      $(".table_learning_dev").DataTable().clear().destroy();
      $(".table_learning_dev").DataTable({
        data: data.ld,
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
                data.ld_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "ld_training_program" },
          { data: "ld_date_from" },
          { data: "ld_date_to" },
          { data: "ld_total_hours" },
          { data: "ld_type" },
          { data: "ld_conducted_by" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.ld_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $(".table_learning_dev").on("click", "._edit", function () {
        $("#modalAddLearningDev").modal("toggle");
        // console.log($(this).prop("id"));
        let ld_id = $(this).prop("id");
        $.ajax({
          url: "employee/getLearningDevDetails",
          method: "get",
          dataType: "json",
          data: { ld_id: ld_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#ld_id").val(ld_id);
            $(".form-type").text("(EDIT)");
            $("#training_program").val(data.ld.ld_training_program);
            $("#date_from").val(data.ld.ld_date_from);
            $("#date_to").val(data.ld.ld_date_to);
            $("#total_hours").val(data.ld.ld_total_hours);
            $("#type").val(data.ld.ld_type);
            $("#conducted_by").val(data.ld.ld_conducted_by);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_learning_dev").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let ld_id = $(this).prop("id");

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
              url: "employee/deleteLearningDev",
              method: "get",
              dataType: "json",
              data: { ld_id: ld_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadLearningDev();
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
  $("#modalAddLearningDev").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#ld_id").val(null);
    $("#learningDevForm")[0].reset();
  });

  $("#modalAddLearningDev").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddLearningDevForm() {
  $("#learningDevForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateLearningDev",
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
          $("#modalAddLearningDev").modal("toggle");
          $("#learningDevForm")[0].reset();
          loadLearningDev();
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
