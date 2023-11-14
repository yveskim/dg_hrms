$(document).ready(() => {
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadSkills();
  submitAddSkillsForm();
  resetEditForm();
});
function loadSkills() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadSkills",
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
      $(".table_skills").off();
      $(".table_skills").DataTable().clear().destroy();
      $(".table_skills").DataTable({
        data: data.skills,
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
                data.skills_id +
                '" class="btn btn-primary btn-sm btn-xs full-size _edit" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
              );
            },
          },
          { data: "special_skills_hobbies" },
          { data: "non_academic_distinctions" },
          { data: "skills_organization" },
          {
            data: null,
            render: function (data, type, row) {
              return (
                '<button type="button" id="' +
                data.skills_id +
                '" class="btn btn-danger btn-sm btn-xs _delete full-size" title="delete entry"><i class="fa fa-trash"></i>&nbsp;Delete</button>'
              );
            },
          },
        ],
      }); //end of datatable
      // }
      // edit child +++++++++++++++++++
      $(".table_skills").on("click", "._edit", function () {
        $("#modalAddSkillsHobbies").modal("toggle");
        // console.log($(this).prop("id"));
        let skills_id = $(this).prop("id");
        $.ajax({
          url: "employee/getSkillsDetails",
          method: "get",
          dataType: "json",
          data: { skills_id: skills_id },
          success: function (data) {
            $("#is_edit").val(1);
            $("#skills_id").val(data.skills.skills_id);
            $(".form-type").text("(EDIT)");
            $("#special_skills").val(data.skills.special_skills_hobbies);
            $("#non_acad_distinctions").val(
              data.skills.non_academic_distinctions
            );
            $("#organization").val(data.skills.skills_organization);
          },
        });
      });
      //end edit child ===================

      // delete child ++++++++++++++++++++++++
      $(".table_skills").on("click", "._delete", function () {
        // console.log($(this).prop("id"));
        let skills_id = $(this).prop("id");

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
              url: "employee/deleteSkills",
              method: "get",
              dataType: "json",
              data: { skills_id: skills_id },
              success: function (res) {
                if (res.status == 1) {
                  Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete Successfull",
                    text: "Record has been deleted",
                    showConfirmButton: true,
                  });
                  loadSkills();
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
  $("#modalAddSkillsHobbies").on("hidden.bs.modal", function () {
    $("#is_edit").val(0);
    $("#skills_id").val(null);
    $("#skillsForm")[0].reset();
  });

  $("#modalAddSkillsHobbies").on("show.bs.modal", function () {
    $(".form-type").text("(ADD)");
  });
}

function submitAddSkillsForm() {
  $("#skillsForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateSkills",
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
          $("#modalAddSkillsHobbies").modal("toggle");
          $("#skillsForm")[0].reset();
          loadSkills();
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
