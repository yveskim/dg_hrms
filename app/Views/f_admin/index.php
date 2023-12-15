<?php $this->extend("f_layout/admin_layout") ?>

<?php $this->Section('content') ?>
<style media="screen">
  .content-div {
    margin-top: 2%;
    /* padding: 2%; */
  }


  .faded {
    opacity: .9;
  }

  .div-main{
    background-image: url('upload/system_file/facade.jpg');
    background-repeat: no-repeat;
    background-size: cover ;
    min-height:50vh;
    width:100%;
  }

  .charts-div{
    background-color: rgb(0,0,0, .6);
    overflow-x: scroll;
    min-height: 50vh;
    max-height: 50vh;
    overflow-y: scroll;
  }

  table.dataTable td {
      padding: 0;
  }


</style>


<div class="content-div">
  <div class="row dashboard-div mb-4">
    <div class="col-md-12 div-main">
        <div class="bg-warning pt-2 pb-2" style="font-weight: bold; text-align: center; color: white; margin-top: 10%;">
          <h1 class="text-info">Welcome to Schools Division Of <strong>GUIMARAS</strong></h1>
          <h1 class="text-danger"><strong> Human Resource Management System</strong></h1>
        </div>
    </div>
  </div> 

  <div class="row" >
    <div class="col-md-6">
      <div class="card text-dark charts-div">
        <div class="card-header bg-info text-light text-light">
          <h6>Teachers Available for Step Increase</h6>
        </div>
        <div class="card-body" >
            <table class="table table-bordered table-stripped table-hover table-employee full-size table-dark table-sm " style="white-space: nowrap; ">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Emp ID</th>
                  <th>Sur Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Plantilla Item</th>
                  <th>Date Started</th>
                  <th>Current Step</th>
                </tr>
              </thead>
              
            </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-dark charts-div">
        <div class="card-header bg-info text-light">
          <h6>Vacant Position/Plantilla</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stripped table-hover table-plantilla full-size table-dark table-sm" style="white-space: nowrap;">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Plantilla Item No</th>
                  <th>Position</th>
                  <th>SG</th>
                </tr>
              </thead>
            </table>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <div class="row" >
    <div class="col-md-6">
      <div class="card text-dark  charts-div" >
        <div class="card-header bg-info text-light">
          <h6>10 Years Loyalty Awardee</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stripped table-hover table-loyalty-10 full-size table-dark table-sm" style="white-space: nowrap;">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Emp ID</th>
                  <th>Sur Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Plantilla Item</th>
                  <th>Date Started</th>
                  <th>Current Step</th>
                </tr>
              </thead>
            </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-dark charts-div">
        <div class="card-header bg-info text-light">
          <h6>5 Years Succeeding 10 Years Loyalty Awardee</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stripped table-hover table-loyalty-5-after-10 full-size table-dark table-sm display compact nowrap" style="white-space: nowrap;">
              <thead>
                <tr>
                <th>-</th>
                  <th>Emp ID</th>
                  <th>Sur Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Plantilla Item</th>
                  <th>Date Started</th>
                  <th>Current Step</th>
                </tr>
              </thead>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">


  $(document).ready(function(){
    $('.spiner-div').hide();
    $('.div-blur').hide();
    loadPlantilla();
    loadTeachersForStepIncrease();
    loadTeachersLoyalty5Years();
    loadTeachersLoyalty10Years();
  });


  function loadTeachersForStepIncrease() {
    $.ajax({
      url: "service/getTeachersForStepIncrease",
      method: "get",
      dataType: "json",
      success: function (data) {
        $(".table-employee").off();
        $(".table-employee").DataTable().clear().destroy();
        $(".table-employee").DataTable({
          data: data.sr,
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
            { data: "emp_agency_employee_no" },
            { data: "emp_lname" },
            { data: "emp_fname" },
            { data: "emp_mname" },
            { data: "plantilla_item_no" },
            { data: "sr_date_started" },
            { data: "sr_step" },
          ],
        }); //end of datatable
        // end delete child =====================
      },
    });
  }


  function loadPlantilla() {
    $.ajax({
      url: "plantilla/getAvailablePlantilla",
      method: "get",
      dataType: "json",
      success: function (data) {
        $(".table-plantilla").off();
        $(".table-plantilla").DataTable().clear().destroy();
        $(".table-plantilla").DataTable({
          data: data.plant,
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
            { data: "plantilla_item_no" },
            { data: "position_title" },
            { data: "salary_grade" }
          ],
        }); //end of datatable
        // end delete child =====================
      },
    });
  }



  function loadTeachersLoyalty5Years() {
    $.ajax({
      url: "service/getTeachersLoyalty5YearsSucceeding10Years",
      method: "get",
      dataType: "json",
      success: function (data) {
        $(".table-loyalty-5-after-10").off();
        $(".table-loyalty-5-after-10").DataTable().clear().destroy();
        $(".table-loyalty-5-after-10").DataTable({
          data: data.sr,
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
            { data: "emp_agency_employee_no" },
            { data: "emp_lname" },
            { data: "emp_fname" },
            { data: "emp_mname" },
            { data: "plantilla_item_no" },
            { data: "sr_date_started" },
            { data: "sr_step" },
          ],
        }); //end of datatable
        // end delete child =====================
      },
    });
  }


  function loadTeachersLoyalty10Years() {
    $.ajax({
      url: "service/getTeachersLoyalty10Years",
      method: "get",
      dataType: "json",
      success: function (data) {
        $(".table-loyalty-10").off();
        $(".table-loyalty-10").DataTable().clear().destroy();
        $(".table-loyalty-10").DataTable({
          data: data.sr,
          responsive: false,
          scrollX: true,
          autoWidth: false,
          destroy: true,
          searching: false,
          paging: false,
          columnDefs: [ {
            targets: 3,
            createdCell: function (td, cellData, rowData, row, col) {
              if ( cellData < 1 ) {
                $(td).css('color', 'red')
              }
            }
          } ],
          columns: [
            {
              data: null,
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              },
            },
            { data: "emp_agency_employee_no" },
            { data: "emp_lname" },
            { data: "emp_fname" },
            { data: "emp_mname" },
            { data: "plantilla_item_no" },
            { data: "sr_date_started" },
            { data: "sr_step" },
          ],
        }); //end of datatable
        // end delete child =====================
      },
    });
  }


  
</script>


<?php $this->endSection(); ?>