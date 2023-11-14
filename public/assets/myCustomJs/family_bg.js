$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadFamBg();
  submitAddChildrenForm();
  resetEditForm();
  editFamBg();
  submitUpdateFamBg();
  editParentsInfo();
  submitUpdateParentsInfo();
  cancelParentsInfo();
  cancelFamBg();
});

function editFamBg() {
  $(".card-fam-bg").addClass("bg-disabled");
  $("#btn-update-fam-bg").hide();

  // enable select and input in the basic info
  $("#btn-edit-fam-bg").click(() => {
    $(".card-fam-bg").find("select").prop("disabled", false);
    $(".card-fam-bg").find("input").prop("readonly", false);
    $(".card-fam-bg").find("input").addClass("input-minimal-enabled");
    $(".card-fam-bg").find("select").addClass("input-minimal-enabled");
    $(".card-fam-bg").removeClass("bg-disabled");
    $(".card-fam-bg").addClass("bg-enabled");
    $("#btn-edit-fam-bg").hide();
    $("#btn-update-fam-bg").show();
    $("#btn-cancel-famBg").show();
  });
}

function cancelFamBg() {
  $("#btn-cancel-famBg").hide();
  $("#btn-cancel-famBg").click(function () {
    disableFamBg();
    $("#btn-cancel-famBg").hide();
  });
}

function disableFamBg() {
  $(".card-fam-bg").find("select").prop("disabled", true);
  $(".card-fam-bg").find("input").prop("readonly", true);
  $(".card-fam-bg").find("input").removeClass("input-minimal-enabled");
  $(".card-fam-bg").find("select").removeClass("input-minimal-enabled");
  $(".card-fam-bg").removeClass("bg-enabled");
  $(".card-fam-bg").addClass("bg-disabled");
  $("#btn-edit-fam-bg").show();
  $("#btn-update-fam-bg").hide();
}

function submitUpdateFamBg() {
  $("#edit-fam-bg-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateFamBg",
      type: "post",
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      beforeSend: function () {
        $(".spiner-div").show();
        $(".div-blur").show();
      },
      success: function (res) {
        console.log(res);
        if (res.status == 1) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Update Successfull",
            text: "Record has been updated",
            showConfirmButton: true,
          });
          disableFamBg();
          cancelFamBg();
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

function loadFamBg() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadFamBg",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    success: function (data) {
      // console.log(data);
      if (data.fam !== null) {
        $("#sp_surname").val(data.fam.spouse_surname);
        $("#sp_fname").val(data.fam.spouse_first_name);
        $("#sp_mname").val(data.fam.spouse_middle_name);
        $("#_occupation").val(data.fam.spouse_occupation);
        $("#employer_business").val(data.fam.spouse_employer_business);
        $("#business_address").val(data.fam.spouse_business_address);
        $("#contact_no").val(data.fam.spouse_telephone);
        $("#father_surname").val(data.fam.father_surname);
        $("#father_firstname").val(data.fam.father_firstname);
        $("#father_middlename").val(data.fam.father_middlename);
        $("#mother_maiden_name").val(data.fam.mother_surname);
        $("#mother_firstname").val(data.fam.mother_firstname);
        $("#mother_middlename").val(data.fam.mother_middlename);
      }

      // if (data.child !== null) {
      $("._table_children").off();
      $("._table_children").DataTable().clear().destroy();
      $("._table_children").DataTable({
        data: data.child,
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
                data.child_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "child_name" },
          { data: "child_birthdate" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.child_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $("._table_children").on("click", "._edit", function () {
        $("#modalAddChildren").modal("toggle");
        // console.log($(this).prop("id"));
        let child_id = $(this).prop("id");
        $.ajax({
          url: "employee/getChildDetails",
          method: "get",
          dataType: "json",
          data: { child_id: child_id },
          success: function (data) {
            $("#is_edit").val(1);
            $(".form-type").text("(EDIT)");
            $("#child_id").val(data.child.child_id);
            $("#child_name").val(data.child.child_name);
            $("#_birthday").val(data.child.child_birthdate);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $("._table_children").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let child_id = $(this).prop("id");

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
              url: "employee/deleteChild",
              method: "get",
              dataType: "json",
              data: { child_id: child_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadFamBg();
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
  });
}

function resetEditForm() {
  $("#modalAddChildren").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#child_id").val(null);
    $("#addChildrenForm")[0].reset();
  });

  $("#modalAddChildren").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddChildrenForm() {
  $("#addChildrenForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/addChild",
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
          loadFamBg();
          $("#modalAddChildren").modal("toggle");
          $("#addChildrenForm")[0].reset();
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

function editParentsInfo() {
  $(".card-parents-info").addClass("bg-disabled");
  $("#btn-update-parents-info").hide();

  // enable select and input in the basic info
  $("#btn-edit-parents-info").click(() => {
    $(".card-parents-info").find("select").prop("disabled", false);
    $(".card-parents-info").find("input").prop("readonly", false);
    $(".card-parents-info").find("input").addClass("input-minimal-enabled");
    $(".card-parents-info").find("select").addClass("input-minimal-enabled");
    $(".card-parents-info").removeClass("bg-disabled");
    $(".card-parents-info").addClass("bg-enabled");
    $("#btn-edit-parents-info").hide();
    $("#btn-update-parents-info").show();
    $("#btn-cancel-parent").show();
  });
}

function cancelParentsInfo() {
  $("#btn-cancel-parent").hide();
  $("#btn-cancel-parent").click(function () {
    disableParentsInfo();
    $("#btn-cancel-parent").hide();
  });
}

function disableParentsInfo() {
  $(".card-parents-info").find("select").prop("disabled", true);
  $(".card-parents-info").find("input").prop("readonly", true);
  $(".card-parents-info").find("input").removeClass("input-minimal-enabled");
  $(".card-parents-info").find("select").removeClass("input-minimal-enabled");
  $(".card-parents-info").removeClass("bg-enabled");
  $(".card-parents-info").addClass("bg-disabled");
  $("#btn-edit-parents-info").show();
  $("#btn-update-parents-info").hide();
}

function submitUpdateParentsInfo() {
  $("#parents-info-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateParentsInfo",
      type: "post",
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      beforeSend: function () {
        $(".spiner-div").show();
        $(".div-blur").show();
      },
      success: function (res) {
        if (res.status == 1) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Update Successfull",
            text: "Record has been updated",
            showConfirmButton: true,
          });
          disableParentsInfo();
          cancelParentsInfo();
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
