$(document).ready(() => {
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadNbc();
});

function loadNbc() {
  $.ajax({
    url: "nbc/getNbc",
    method: "get",
    dataType: "json",
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      $(".table-nbc").off();
      $(".table-nbc").DataTable().clear().destroy();
      $(".table-nbc").DataTable({
        data: data.nbc,
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
            render: function (data, type, row) {
              return '<button type="button" id="' +
                data.nbc_id +
                '" class="btn btn-info btn-sm btn-xs _view full-size" title="open nbc"><i class="fa fa-folder-open"></i>&nbsp;Open</button>';
            },
          },
          {
            data: null,
            render: function (data, type, row) {
              return '<button type="button" id="' +
                data.nbc_id +
                '" class="btn btn-primary btn-sm btn-xs _edit full-size" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>';
            },
          },
          { data: "nbc_no" },
          { data: "nbc_title" },
          { data: "tranche" },
          { data: "effectivity_date" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.nbc_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // edit nbc +++++++++++++++++++
      $(".table-nbc").on("click", "._edit", function () {
        $("#modalAddNbc").modal("toggle");
        let nbc_id = $(this).prop("id");
        $.ajax({
          url: "nbc/getNbcDetails",
          method: "get",
          dataType: "json",
          data: { nbc_id: nbc_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#nbc_id").val(nbc_id);
            $(".form-type").text("(EDIT)");
            $("#nbc_no").val(data.nbc.nbc_no);
            $("#nbc_title").val(data.nbc.nbc_title);
            $("#tranche").val(data.nbc.tranche);
            $("#effectivity_date").val(data.nbc.effectivity_date);
          },
        });
      });

       // open nbc +++++++++++++++++++
       $(".table-nbc").on("click", "._view", function () {
        let nbc_id = $(this).prop("id");
        $('.nbc-content-div').load('pages/nbc/tranche_table/tranche_table.php', function(){
            $('#nbc_id').val(nbc_id);
        })
      });

      // delete nbc ++++++++++++++++++++++++
      $(".table-nbc").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let nbc_id = $(this).prop("id");

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
              url: "nbc/deleteNbc",
              method: "get",
              dataType: "json",
              data: { nbc_id: nbc_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadNbc();
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

$("#modalAddNbc").on("hidden.bs.modal", function () {
  $("#is_edit").val(0);
  $("#nbc_id").val(null);
  $("#nbcForm")[0].reset();
});

$("#modalAddNbc").on("show.bs.modal", function () {
  $(".form-type").text("(ADD)");
});

$("#nbcForm").submit(function (event) {
  event.preventDefault();
  let formData = new FormData(this);
  let user_id = $('#user').val();
  formData.append('user_id', user_id);
  
  $.ajax({
    url: "nbc/updateNbc",
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
          text: "Record added/changed successfuly",
          showConfirmButton: true,
        });
        $("#modalAddNbc").modal("toggle");
        $("#nbcForm")[0].reset();
        loadNbc();
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
