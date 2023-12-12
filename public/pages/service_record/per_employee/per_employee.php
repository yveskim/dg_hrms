
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
        <input type="hidden" id="emp_id_ref">
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

    <div class="row mb-4">
        <div class="col-md-12">
            <strong><h5 style="font-weight: blod">SERVICE RECORD</h5></strong>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <button class="btn btn-warning full-size" data-toggle="modal" data-target="#modalUpdateServiceRecord">UPDATE SERVICE RECORD</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover table-service-record table-sm full-size" style=" white-space: nowrap;">
                <thead class="bg-info">
                    <tr>
                        <th>-</th>
                        <th>Status</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Designation</th>
                        <th>Appt. Status</th>
                        <th>Salary</th>
                        <th>Station/Office</th>
                        <th>Branch</th>
                        <th>LOA w/o Pay From</th>
                        <th>LOA w/o Pay To</th>
                        <th>LOA Deductions</th>
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
            <div class="modal-body">
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
                  



<div class="modal fade mb-4" id="modalUpdateServiceRecord">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Update Service Record</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" name="transaction_type" id="transaction_type" form="updateServiceRecordForm">
                            <option value="">--Transaction Type--</option>
                            <option value="1">New</option>
                            <option value="2">Transfer Station</option>
                            <option value="3">Change Employement Status</option>
                            <option value="4">New Tranche</option>
                            <option value="5">Step Increment</option>
                            <option value="6">Promotion</option>
                            <option value="7">Loyalty Increment (10 years)</option>
                            <option value="8">Loyalty Increment (5 years after 10 years)</option>
                            <option value="9">Seperation</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div id="updateServiceRecordForm"></div>
        </div>
    </div>
</div>
                                    

<script src="pages/service_record/per_employee/per_employee.js"></script>