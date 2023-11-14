
$(document).ready(function(){
  $(".btn-update").hide();
  $(".spiner-div").hide();
  $(".div-blur").hide();
  loadOthers();
  submitAddOthersForm();
})


function loadOthers() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/loadOthers",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    beforeSend: function () {
      $(".spiner-div").show();
      $(".div-blur").show();
    },
    success: function (data) {
      if(data.others != null){
        $('#_consanguinity_3rd').val(data.others.consanguinity_3rd_degree);
        $('#_consanguinity_3rd_details').val(data.others.consanguinity_3rd_degree_details);
        $('#_consanguinity_4th').val(data.others.consanguinity_4th_degree);
        $('#_consanguinity_4th_details').val(data.others.consanguinity_4th_degree_details);
        $('#admin_offense').val(data.others.admin_offence);
        $('#admin_offense_details').val(data.others.admin_offence_details);
        $('#criminal_charge').val(data.others.criminal_charge);
        $('#criminal_charge_date').val(data.others.criminal_charge_date);
        $('#criminal_charge_details').val(data.others.criminal_charge_details);
        $('#_convicted').val(data.others.is_convicted);
        $('#_convicted_details').val(data.others.convicted_details);
        $('#_separated').val(data.others.seperated_from_service);
        $('#_separated_details').val(data.others.seperated_from_service_details);
        $('#_candidate').val(data.others.election_candidate);
        $('#_candidate_details').val(data.others.election_candidate_details);
        $('#_resigned').val(data.others.resigned_3months_period);
        $('#_resigned_details').val(data.others.resigned_3months_period_details);
        $('#_immigrant').val(data.others.immigrant_status);
        $('#_immigrant_details').val(data.others.immigrant_status_details);
        $('#_indigenous').val(data.others.is_ip);
        $('#_indigenous_details').val(data.others.is_ip_details);
        $('#_disability').val(data.others.is_pwd);
        $('#_disability_details').val(data.others.is_pwd_details);
        $('#solo_parent').val(data.others.is_solo_parent);
        $('#solo_parent_details').val(data.others.solo_parent_details);
      }
      
    },
    complete: function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();
    },
  });
}


function submitAddOthersForm() {
  $("#othersForm").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateOthers",
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
          loadOthers();
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

