$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadEducBg();
  submitAddEducBgForm();
  resetEditForm();
});

function loadEducBg() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadEducBg",
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
      $(".table_educ_bg").off();
      $(".table_educ_bg").DataTable().clear().destroy();
      $(".table_educ_bg").DataTable({
        data: data.educ,
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
                data.educ_bg_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "educ_bg_level" },
          { data: "educ_bg_school" },
          { data: "educ_bg_degree" },
          { data: "educ_bg_from" },
          { data: "educ_bg_to" },
          { data: "educ_bg_year_graduated" },
          { data: "educ_bg_units" },
          { data: "educ_bg_scholarship_honors" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.educ_bg_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $(".table_educ_bg").on("click", "._edit", function () {
        $("#modalAddEducBg").modal("toggle");
        // console.log($(this).prop("id"));
        let educ_bg_id = $(this).prop("id");
        $.ajax({
          url: "employee/getEducBgDetails",
          method: "get",
          dataType: "json",
          data: { educ_bg_id: educ_bg_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#educ_bg_id").val(educ_bg_id);
            $(".form-type").text("(EDIT)");
            $("#educ_level").val(data.educ.educ_bg_level);
            $("#school_name").val(data.educ.educ_bg_school);
            $("#_degree").val(data.educ.educ_bg_degree);
            $("#year_from").val(data.educ.educ_bg_from);
            $("#year_to").val(data.educ.educ_bg_to);
            $("#highest_unit").val(data.educ.educ_bg_units);
            $("#year_graduated").val(data.educ.educ_bg_year_graduated);
            $("#academic_honors").val(data.educ.educ_bg_scholarship_honors);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_educ_bg").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let educ_bg_id = $(this).prop("id");

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
              url: "employee/deleteEducBg",
              method: "get",
              dataType: "json",
              data: { educ_bg_id: educ_bg_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadEducBg();
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
  $("#modalAddEducBg").on("hidden.bs.modal", function () {
    $('body').removeClass('modal-open');
    $("#is_edit").val(0);
    $("#educ_bg_id").val(null);
    $("#addEducBgForm")[0].reset();
  });

  $("#modalAddEducBg").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddEducBgForm() {
  $("#addEducBgForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateEducBg",
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
          $("#modalAddEducBg").modal("toggle");
          $("#addEducBgForm")[0].reset();
          loadEducBg();
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
