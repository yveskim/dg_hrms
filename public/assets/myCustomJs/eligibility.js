$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadEligibility();
  submitAddEligibilityForm();
  resetEditForm();
});

function loadEligibility() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadEligibility",
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
      $(".table_eligibility").off();
      $(".table_eligibility").DataTable().clear().destroy();
      $(".table_eligibility").DataTable({
        data: data.elig,
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
                data.elig_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "elig_board_bar" },
          { data: "elig_rating" },
          { data: "elig_exam_date" },
          { data: "elig_exam_place" },
          { data: "elig_license_no" },
          { data: "elig_license_date_valid" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.elig_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $(".table_eligibility").on("click", "._edit", function () {
        $("#modalAddEligibility").modal("toggle");
        // console.log($(this).prop("id"));
        let elig_id = $(this).prop("id");
        $.ajax({
          url: "employee/getEligibilityDetails",
          method: "get",
          dataType: "json",
          data: { elig_id: elig_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#elig_id").val(elig_id);
            $(".form-type").text("(EDIT)");
            $("#board_bar").val(data.elig.elig_board_bar);
            $("#_rating").val(data.elig.elig_rating);
            $("#date_exam").val(data.elig.elig_exam_date);
            $("#place_exam").val(data.elig.elig_exam_place);
            $("#license_no").val(data.elig.elig_license_no);
            $("#date_valid").val(data.elig.elig_license_date_valid);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_eligibility").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let elig_id = $(this).prop("id");

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
              url: "employee/deleteEligibility",
              method: "get",
              dataType: "json",
              data: { elig_id: elig_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadEligibility();
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
  $("#modalAddEligibility").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#elig_id").val(null);
    $("#eligibilityForm")[0].reset();
    $('body').removeClass('modal-open');
  });

  $("#modalAddEligibility").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddEligibilityForm() {
  $("#eligibilityForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateEligibility",
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
          $("#modalAddEligibility").modal("toggle");
          $("#eligibilityForm")[0].reset();
          loadEligibility();
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
