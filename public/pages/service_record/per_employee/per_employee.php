
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
    <div class="row">
        <div class="col-md-12">
            <!-- <input type="hidden" id="emp_station_id"> -->
            <h6>Current Station: <span class="emphasis" id="station"></span> <span id="spanSet"></span></h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h6>Plantilla Item No.: <span class="emphasis" id="plantilla_item"></span></h6>
        </div>
    </div>
    <hr class="bg-primary" style="height: .4vw;">

   
    <div class="row">
        <div class="col-md-12">
            <h5>Update Service Record</h5>
        </div>
    </div>

    <div class="row mb-4 bg-warning text-light" style="padding-top: .2rem; padding-bottom: .2rem;">
        <div class="col-md-3">
            <select class="form-control" name="transaction_type" id="transaction_type">
                <option value="">--Transaction Type--</option>
                <option value="1">New Hire</option>
                <option value="2">Transfer Station</option>
                <option value="3">Change Employement Status</option>
                <option value="4">New Tranche</option>
                <option value="5">Step Increment</option>
                <option value="6">Promotion</option>
                <option value="7">Seperation</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary full-size" id="btnSetSr">Update</button>
        </div>
        <!-- <div class="col-md-3">
            <button class="btn btn-warning full-size" data-toggle="modal" data-target="#modalUpdateServiceRecord">UPDATE SERVICE RECORD</button>
        </div> -->
    </div>

    <hr>
     <div class="row">
        <div class="col-md-12">
            <strong><h5 style="font-weight: blod">EMPLOYEE SERVICE RECORD</h5></strong>
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
                        <th>Step</th>
                        <th>Appt. Status</th>
                        <th>Salary</th>
                        <th>Station/Office</th>
                        <th>Branch</th>
                        <th>LOA w/o Pay From</th>
                        <th>LOA w/o Pay To</th>
                        <th>LOA Deductions</th>
                        <th>Seperation Cause</th>
                        <th>Seperation Date</th>
                        <th>NBC no.</th>
                        <th>Remarks</th>
                        <th>Action</th>
                        <th>Edit</th>
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
                  


<div class="modal fade mb-4" id="modalSetStation">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Set Station</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table-station table-sm full-size" style=" white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th>-</th>
                                    <th>Title</th>
                                    <th>Station ID</th>
                                    <th>Address</th>
                                    <th>Branch</th>
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


<div class="modal fade mb-4" id="modalSubmitStation">
    <div class="modal-dialog modal-md  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Set Station</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="setStationForm">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="station_title">Station Title</label>
                            <input type="text" readonly class="form-control" name="station_title" id="station_title">
                            <input type="hidden" class="form-control" name="station_id" id="station_id" form="setStationForm">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="date_started">Date Started</label>
                            <input type="date" required class="form-control" name="date_started" id="date_started" form="setStationForm">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success full-size" form="setStationForm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                                    


<div class="modal fade mb-4" id="modalNewServiceRecord">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Service Record Transaction Form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div id="transaction-div"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade mb-4" id="modalLoa">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">LOA w/o Pay Form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- TODO: Tapuson and submit -->
            <!-- Modal body -->
            <div class="modal-body">
                <form id="loaForm">
                    <input type="hidden" name="sr_id" id="sr_id" form="loaForm">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="date_from">Date From</label>
                            <input type="date" class="form-control" name="date_from" id="date_from" required form="loaForm">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="date_to">Date To</label>
                            <input type="date" class="form-control" name="date_to" id="date_to" required form="loaForm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="total_deductions">Total Deductions</label>
                            <input type="text" class="form-control" name="total_deductions" id="total_deductions" required form="loaForm">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 float-right">
                            <button class="btn btn-success full-size float-right" type="submit" form="loaForm">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                                    

<script src="pages/service_record/per_employee/per_employee.js"></script>