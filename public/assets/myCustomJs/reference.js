

$(document).ready(function(){
    $(".btn-update").hide();
    $(".spiner-div").hide();
    $(".div-blur").hide();
    loadReference();
    submitAddrefForm();
    resetEditForm();
})

function loadReference() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadReference",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      $(".table_reference").off();
      $(".table_reference").DataTable().clear().destroy();
      $(".table_reference").DataTable({
        data: data.ref,
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
                data.ref_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "ref_name" },
          { data: "ref_address" },
          { data: "ref_contact" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.ref_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // edit child +++++++++++++++++++
      $(".table_reference").on("click", "._edit", function () {
        $("#modalAddReference").modal("toggle");
        let ref_id = $(this).prop("id");
        $.ajax({
          url: "employee/getReferenceDetails",
          method: "get",
          dataType: "json",
          data: { ref_id: ref_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#ref_id").val(ref_id);
            $(".form-type").text("(EDIT)");
            $("#ref_name").val(data.ref.ref_name);
            $("#ref_address").val(data.ref.ref_address);
            $("#ref_contact").val(data.ref.ref_contact);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_reference").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let ref_id = $(this).prop("id");

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
              url: "employee/deleteReference",
              method: "get",
              dataType: "json",
              data: { ref_id: ref_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadReference();
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
  $("#modalAddReference").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#ref_id").val(null);
    $("#refForm")[0].reset();
  });

  $("#modalAddReference").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddrefForm() {
  $("#refForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateReference",
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
          $("#modalAddReference").modal("toggle");
          $("#refForm")[0].reset();
          loadReference();  
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
