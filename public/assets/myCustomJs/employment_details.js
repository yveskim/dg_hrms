function getEmploymentDetails() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employmentDetails",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    success: function (data) {
      if (data.category === null) {
        $("#emp_category").text("n/a");
      } else {
        $("#emp_category").text(data.category.cat_title);
      }

      if (data.plantilla === null) {
        $("#plantilla").text("n/a");
      } else {
        $("#plantilla").text(data.plantilla.plantilla_title);
      }

      if (data.plantilla === null) {
        $("#_step").text("n/a");
      } else {
        $("#_step").text(data.plantilla.step);
      }

      if (data.department === null) {
        $("#_department").text("n/a");
      } else {
        $("#_department").text(data.department.dept_title);
      }

      if (data.category === null) {
        $("#job_desc").text("n/a");
      } else {
        if (data.category.job_description == 1) {
          $("#job_desc").text("Administrator");
        } else if (data.category.job_description == 2) {
          $("#job_desc").text("Faculty");
        } else if (data.category.job_description == 3) {
          $("#job_desc").text("Staff");
        } else if (data.category.job_description == 4) {
          $("#job_desc").text("Job Order");
        } else if (data.category.job_description == 5) {
          $("#job_desc").text("Contractor");
        } else {
          $("#job_desc").text("n/a");
        }
      }
    },
  });
}
