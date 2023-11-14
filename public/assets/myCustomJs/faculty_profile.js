$(document).ready(function () {
  loadProfile();
});

$("#personalInfoTab").click(() => {
  loadProfile();
});

function loadProfile() {
  $("#faculty_profile").addClass("active");
  $("#menu-dashboard").removeClass("active");
  // --------------------------------------------
  $("#personal_info").load(
    "pages/faculty/profile/personal_info.php",
    function () {
      $(".spiner-div").hide();
      $(".div-blur").hide();

      loadPersonalInfo();

      editBasicInfo();
      editOtherInfo();
      editContactInfo();
      editPermanentAddress();
      editCurrentAddress();
      submitBasicInfoForm();
      submitOtherForm();
      disableContactInfo();
      submitContactForm();

      submitPermanentAddressForm();

      submitCurmanentAddressForm();

      cancelBasicInfo();
      cancelOtherInfo();
      cancelContactInfo();
      cancelPerInfo();
      cancelCurInfo();
    }
  );
}

function editBasicInfo() {
  $(".card-basic-info").addClass("bg-disabled");
  $("#btn-update-basic-info").hide();

  // enable select and input in the basic info
  $("#btn-edit-basic-info").click(() => {
    $(".card-basic-info").find("select").prop("disabled", false);
    $(".card-basic-info").find("input").prop("readonly", false);
    $(".card-basic-info").find("input").addClass("input-minimal-enabled");
    $(".card-basic-info").find("select").addClass("input-minimal-enabled");
    $(".card-basic-info").removeClass("bg-disabled");
    $(".card-basic-info").addClass("bg-enabled");
    $("#btn-edit-basic-info").hide();
    $("#btn-update-basic-info").show();
    $("#btn-cancel-basic").show();
  });
}

function disableBasicInfo() {
  $(".card-basic-info").find("select").prop("disabled", true);
  $(".card-basic-info").find("input").prop("readonly", true);
  $(".card-basic-info").find("input").removeClass("input-minimal-enabled");
  $(".card-basic-info").find("select").removeClass("input-minimal-enabled");
  $(".card-basic-info").removeClass("bg-enabled");
  $(".card-basic-info").addClass("bg-disabled");
  $("#btn-edit-basic-info").show();
  $("#btn-update-basic-info").hide();
}

function cancelBasicInfo() {
  $("#btn-cancel-basic").hide();
  $("#btn-cancel-basic").click(function () {
    disableBasicInfo();
    $("#btn-cancel-basic").hide();
  });
}

function submitBasicInfoForm() {
  $("#edit-basic-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateBasicInfo",
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
          disableBasicInfo();
          cancelBasicInfo();
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

function editOtherInfo() {
  $(".card-other").addClass("bg-disabled");
  $("#btn-update-other").hide();

  // enable select and input in the basic info
  $("#btn-edit-other").click(() => {
    $(".card-other").find("input").prop("readonly", false);
    $(".card-other").find("select").prop("disabled", false);
    $(".card-other").find("input").addClass("input-minimal-enabled");
    $(".card-other").removeClass("bg-disabled");
    $(".card-other").addClass("bg-enabled");
    $("#btn-edit-other").hide();
    $("#btn-update-other").show();
    $("#btn-cancel-other").show();
  });
}

function disableOtherInfo() {
  $(".card-other").find("select").prop("disabled", true);
  $(".card-other").find("input").prop("readonly", true);
  $(".card-other").find("input").removeClass("input-minimal-enabled");
  $(".card-other").find("select").removeClass("input-minimal-enabled");
  $(".card-other").removeClass("bg-enabled");
  $(".card-other").addClass("bg-disabled");
  $("#btn-edit-other").show();
  $("#btn-update-other").hide();
}

function cancelOtherInfo() {
  $("#btn-cancel-other").hide();
  $("#btn-cancel-other").click(function () {
    disableOtherInfo();
    $("#btn-cancel-other").hide();
  });
}

function submitOtherForm() {
  $("#other-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateOtherInfo",
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
          disableOtherInfo();
          cancelOtherInfo();
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

function disableContactInfo() {
  $(".card-contact-info").find("select").prop("disabled", true);
  $(".card-contact-info").find("input").prop("readonly", true);
  $(".card-contact-info").find("input").removeClass("input-minimal-enabled");
  $(".card-contact-info").find("select").removeClass("input-minimal-enabled");
  $(".card-contact-info").removeClass("bg-enabled");
  $(".card-contact-info").addClass("bg-disabled");
  $("#btn-edit-contact-info").show();
  $("#btn-update-contact-info").hide();
}

function cancelContactInfo() {
  $("#btn-cancel-contact").hide();
  $("#btn-cancel-contact").click(function () {
    disableContactInfo();
    $("#btn-cancel-contact").hide();
  });
}

function submitContactForm() {
  $("#contact-info-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateContactInfo",
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
          disableContactInfo();
          cancelContactInfo();
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

function editContactInfo() {
  $(".card-contact-info").addClass("bg-disabled");
  $("#btn-update-contact-info").hide();

  // enable select and input in the basic info
  $("#btn-edit-contact-info").click(() => {
    $(".card-contact-info").find("input").prop("readonly", false);
    $(".card-contact-info").find("select").prop("disabled", false);
    $(".card-contact-info").find("input").addClass("input-minimal-enabled");
    $(".card-contact-info").removeClass("bg-disabled");
    $(".card-contact-info").addClass("bg-enabled");
    $("#btn-edit-contact-info").hide();
    $("#btn-update-contact-info").show();
    $("#btn-cancel-contact").show();
  });
}

function editPermanentAddress() {
  $(".card-permanent-address").addClass("bg-disabled");
  $("#btn-update-permanent-address").hide();

  // enable select and input in the basic info
  $("#btn-edit-permanent-address").click(() => {
    $(".card-permanent-address").find("input").prop("readonly", false);
    $(".card-permanent-address").find("select").prop("disabled", false);
    $(".card-permanent-address")
      .find("input")
      .addClass("input-minimal-enabled");
    $(".card-permanent-address").removeClass("bg-disabled");
    $(".card-permanent-address").addClass("bg-enabled");
    $("#btn-edit-permanent-address").hide();
    $("#btn-update-permanent-address").show();
    $("#btn-cancel-per").show();
  });
}

function disablePerAddressInfo() {
  $(".card-permanent-address").find("select").prop("disabled", true);
  $(".card-permanent-address").find("input").prop("readonly", true);
  $(".card-permanent-address")
    .find("input")
    .removeClass("input-minimal-enabled");
  $(".card-permanent-address")
    .find("select")
    .removeClass("input-minimal-enabled");
  $(".card-permanent-address").removeClass("bg-enabled");
  $(".card-permanent-address").addClass("bg-disabled");
  $("#btn-edit-permanent-address").show();
  $("#btn-update-permanent-address").hide();
}

function cancelPerInfo() {
  $("#btn-cancel-per").hide();
  $("#btn-cancel-per").click(function () {
    disablePerAddressInfo();
    $("#btn-cancel-per").hide();
  });
}

function submitPermanentAddressForm() {
  $("#permanent-address-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updatePerAddressInfo",
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
          disablePerAddressInfo();
          cancelPerInfo();
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

function editCurrentAddress() {
  $(".card-current-address").addClass("bg-disabled");
  $("#btn-update-current-address").hide();

  // enable select and input in the basic info
  $("#btn-edit-current-address").click(() => {
    $(".card-current-address").find("input").prop("readonly", false);
    $(".card-current-address").find("select").prop("disabled", false);
    $(".card-current-address").find("input").addClass("input-minimal-enabled");
    $(".card-current-address").removeClass("bg-disabled");
    $(".card-current-address").addClass("bg-enabled");
    $("#btn-edit-current-address").hide();
    $("#btn-update-current-address").show();
    $("#btn-cancel-cur").show();
  });
}

function cancelCurInfo() {
  $("#btn-cancel-cur").hide();
  $("#btn-cancel-cur").click(function () {
    disableCurAddressInfo();
    $("#btn-cancel-cur").hide();
  });
}

function disableCurAddressInfo() {
  $(".card-current-address").find("select").prop("disabled", true);
  $(".card-current-address").find("input").prop("readonly", true);
  $(".card-current-address").find("input").removeClass("input-minimal-enabled");
  $(".card-current-address")
    .find("select")
    .removeClass("input-minimal-enabled");
  $(".card-current-address").removeClass("bg-enabled");
  $(".card-current-address").addClass("bg-disabled");
  $("#btn-edit-current-address").show();
  $("#btn-update-current-address").hide();
}

function submitCurmanentAddressForm() {
  $("#current-address-form").submit(function (event) {
    event.preventDefault();
    let emp_id = $("#emp_id").val();
    let formData = new FormData(this);
    formData.append("emp_id", emp_id);
    $.ajax({
      url: "employee/updateCurAddressInfo",
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
          disableCurAddressInfo();
          cancelCurInfo();
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

function loadPersonalInfo() {
  let emp_id = $("#emp_id").val();
  $.ajax({
    url: "employee/personalInfo",
    method: "get",
    dataType: "json",
    data: { emp_id: emp_id },
    success: function (data) {
      // console.log(data);
      $("#inputEmpSchoolId").val(data.emp.emp_school_id);
      $("#inputFirstName").val(data.emp.emp_fname);
      $("#inputMiddleName").val(data.emp.emp_mname);
      $("#inputLastName").val(data.emp.emp_lname);
      $("#inputGender").val(data.emp.emp_gender);
      $("#inputBirthdate").val(data.emp.emp_birthdate);
      $("#inputBirthplace").val(data.emp.emp_place_of_birth);
      $("#inputMaritalStatus").val(data.emp.emp_marital_status);
      $("#inputCitizenship").val(data.emp.emp_citizenship);
      $("#inputCitizenBy").val(data.emp.emp_citizen_by);
      $("#inputCountry").val(data.emp.emp_country);
      $("#inputReligion").val(data.emp.emp_religion);
      $("#inputBloodType").val(data.emp.emp_blood_type);
      $("#inputHeight").val(data.emp.emp_height);
      $("#inputWeight").val(data.emp.emp_weight);
      $("#inputTin").val(data.emp.emp_tin);
      $("#inputGsis").val(data.emp.emp_gsis);
      $("#inputSss").val(data.emp.emp_sss);
      $("#inputPagibig").val(data.emp.emp_pagibig);
      $("#inputPhilhealth").val(data.emp.emp_philhealth);
      $("#inputAgency").val(data.emp.emp_agency_employee_no);
      $("#inputEmail").val(data.emp.emp_email);
      $("#_phone").val(data.emp.emp_mobile_no);
      $("#tel_no").val(data.emp.emp_telephone_no);
      $("#inputPerHouse").val(data.emp.emp_p_add_house);
      $("#inputPerStreet").val(data.emp.emp_p_add_street);
      $("#inputPerSubdivision").val(data.emp.emp_p_add_subdivision);
      $("#inputPerBarangay").val(data.emp.emp_p_add_barangay);
      $("#inputPerMunicipality").val(data.emp.emp_p_add_municipality);
      $("#inputPerCity").val(data.emp.emp_p_add_city);
      $("#inputPerProvince").val(data.emp.emp_p_add_province);
      $("#inputPerZip").val(data.emp.emp_p_add_zip);
      $("#inputCurHouse").val(data.emp.emp_r_add_house);
      $("#inputCurStreet").val(data.emp.emp_r_add_street);
      $("#inputCurSubdivision").val(data.emp.emp_r_add_subdivision);
      $("#inputCurBarangay").val(data.emp.emp_r_add_barangay);
      $("#inputCurMunicipality").val(data.emp.emp_r_add_municiplaity);
      $("#inputCurCity").val(data.emp.emp_r_add_city);
      $("#inputCurProvince").val(data.emp.emp_r_add_province);
      $("#inputCurZip").val(data.emp.emp_r_add_zip);
    },
  });
}
