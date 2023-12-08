
<div class="row">
    <div class="col-md-2">
        <button class="btn btn-info" data-toggle="modal" data-target="#modalChooseEmp">Select Employee</button>
    </div>
</div>
<hr>

<div class="sr-details-div" style="padding: .5rem; border: .5vw solid lightgray;">
    <div class="row">
        <div class="col-md-12">
        <h6>Employee ID: <span class="emphasis" id="emp_id_det"></span></h6>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h6>Surname: <span class="emphasis" id="surname"></span></h6>
        </div>
        <div class="col-md-4">
            <h6>Given Name: <span class="emphasis" id="given_name"></span></h6>
        </div>
        <div class="col-md-4">
            <h6>Middle Name: <span class="emphasis" id="middle_name"></span></h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h6>Birth Date: <span class="emphasis" id="birth"></span></h6>
        </div>
        <div class="col-md-8">
            <h6>Address: <span class="emphasis" id="address"></span></h6>
        </div>
    </div>
    <hr>
    <hr class="bg-primary" style="height: .4vw;">

    <div class="row">
        <div class="col-md-12">
            <strong><h5 style="font-weight: blod">SERVICE RECORD</h5></strong>
        </div>
    </div>
    <br>
    <div class="row mb-4">
        <div class="col-md-2">
            <button class="btn btn-primary full-size">ADD NEW</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover table-service-record table-sm full-size" style=" white-space: nowrap;">
                <thead class="bg-info">
                    <tr>
                        <th>-</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Designation</th>
                        <th>Appt. Status</th>
                        <th>Salary</th>
                        <th>Station/Office</th>
                        <th>Branch</th>
                        <th>LOA w/o Pay From</th>
                        <th>LOA w/o Pay To</th>
                        <th>Seperated</th>
                        <th>Cause</th>
                        <th>Seperation Date</th>
                        <th>NBC no.</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="modal fade mb-4" id="modalChooseEmp">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Select Employee</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" >
                <div class="row">
                    <div class="col-md">
                        <table class="table table-bordered table-hover table-choose-emp table-sm full-size" style=" white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th>-</th>
                                    <th>Emp ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                  


<script>

    $(document).ready(function(){
        $('.sr-details-div').hide();
    })

    $('#modalChooseEmp').on('shown.bs.modal', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });
        
    $('#modalChooseEmp').on('show.bs.modal', function(){
        
        $.ajax({
            url: "service/selectEmployeeSr",
            method: "get",
            dataType: "json",
            beforeSend: function () {
                $(".spiner-div").show();
                $(".div-blur").show();
            },
            complete: function () {
                $(".spiner-div").hide();
                $(".div-blur").hide();
            },
            success: function (data) {
                $(".table-choose-emp").off();
                $(".table-choose-emp").DataTable().clear().destroy();
                $(".table-choose-emp").DataTable({
                    data: data.emp,
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
                        { data: "emp_agency_employee_no" },
                        { data: "emp_lname" },
                        { data: "emp_fname" },
                        { data: "emp_mname" },
                        { data: "emp_gender" },
                        {
                            data: null,
                            render: function (data, type, row) {
                            return (
                                '<div class="display-block"><button type="button" id="' +
                                    data.emp_id +
                                '" class="btn btn-success btn-sm btn-xs _select" title="select employee"><i class="fa fa-check-square"></i>&nbsp;Select</button>'
                            );
                            },
                        },
                    ],
                }); //end of datatable

                $(".table-choose-emp").on("click", "._select", function () {
                    $("#modalChooseEmp").modal("toggle");
                    let emp_id = $(this).prop("id");
                    $.ajax({
                        url: "service/getEmpServiceRecord",
                        method: "get",
                        dataType: "json",
                        data: { emp_id: emp_id },
                        beforeSend: function () {
                            $(".spiner-div").show();
                            $(".div-blur").show();
                        },
                        complete: function () {
                            $(".spiner-div").hide();
                            $(".div-blur").hide();
                        },
                        success: function (data) {
                           
                            let house = data.emp.emp_p_add_house;if(house == null || house == ""){house = "";}else{ house = data.emp.emp_p_add_house+', ';}
                            let street = data.emp.emp_p_add_street;if(street == null || street == ""){street = "";}else{street = data.emp.emp_p_add_street+', ';}
                            let subdivision = data.emp.emp_p_add_subdivision;if(subdivision == null || subdivision == ""){subdivision = "";}else{subdivision = data.emp.emp_p_add_subdivision+', ';}
                            let barangay = data.emp.emp_p_add_barangay;if(barangay == null || barangay == ""){barangay = "";}else{barangay = data.emp.emp_p_add_barangay+', ';}
                            let municipality = data.emp.emp_p_add_municipality;if(municipality == null || municipality == ""){municipality = "";}else{municipality = data.emp.emp_p_add_municipality+', ';}
                            let city = data.emp.emp_p_add_city;if(city == null || city == ""){city = "";}else{city = data.emp.emp_p_add_city+', ';}
                            let province = data.emp.emp_p_add_province;if(province == null || province == ""){province = "";}else{province = data.emp.emp_p_add_province+', ';}
                            let zip = data.emp.emp_p_add_zip;if(zip == null || zip == ""){zip = "";}

                            
                            $('#emp_id_det').text(data.emp.emp_agency_employee_no);
                            $('#surname').text(data.emp.emp_lname);
                            $('#given_name').text(data.emp.emp_fname);
                            $('#middle_name').text(data.emp.emp_mname);
                            $('#birth').text(data.emp.emp_birthdate);
                            $('#address').text(house+street+subdivision+barangay+municipality+city+province+zip);

                            $('.sr-details-div').show(function(){
                                $(".table-service-record").off();
                                $(".table-service-record").DataTable().clear().destroy();
                                $(".table-service-record").DataTable({
                                    data: data.sr,
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
                                    { data: "sr_date_started" },
                                    { data: "sr_date_end" },
                                    { data: "position_title" },
                                    { data: "sr_status" },
                                    {
                                        data: null,
                                        render: function (data, type, row, meta) {
                                            let salary = data.amount * 12;
                                        return salary;
                                        },
                                    },
                                    { data: "st_title" },
                                    { data: "st_branch" },
                                    { data: "loa_wo_pay_date_from" },
                                    { data: "loa_wo_pay_date_to" },
                                    { data: "sr_is_seperated" },
                                    { data: "sr_seperation_cause" },
                                    { data: "sr_seperation_date" },
                                    { data: "nbc_no" },
                                    { data: "sr_remarks" },
                                    ],
                                }); //end of datatable
                            })

                            $('html, body').animate({
                                scrollTop: $(".table-service-record").offset().top
                            }, 500);
                            

                        },
                    });
                });

            },
            
        });

        
        
    })
</script>