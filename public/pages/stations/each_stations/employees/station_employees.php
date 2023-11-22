
<br>
<br>
<div class="row station-div">
    <div class="col-md-10">
        
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary btn-add-emp" data-toggle="modal" data-target="#modalSelectEmployee">Assign Employee To Station</button>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-emp-station full-size table-sm" style="width: 100%; white-space: nowrap;">
                    <thead class="bg-info">
                        <tr>
                            <th width="5%"></th>
                            <th width="5%">Edit</th>
                            <th>Emp ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Sex</th>
                            <th>Date Started</th>
                            <th>Date Ended</th>
                            <th>Assigned By</th>
                            <th width="5%">Del</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade mb-4" id="modalSelectEmployee">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Select Employee <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="selectEmpForm">
            <div class="row mb-4">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped table-select-employee full-size table-sm" style="width: 100%; white-space: nowrap; ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><input type="checkbox"> All</th>
                                <th>Emp ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
          
            <hr>
            <div class="row mb-2">
                <div class="col-md-3 mb-2">
                    <label for="date_started" class="form-label">Date Started</label>
                    <input type="date" class="form-control form-control-sm" id="date_started" required name="date_started" form="selectEmpForm">
                </div>
                <div class="col-md-3 mb-2">
                    <label for="date_ended" class="form-label">Date End</label>
                    <input type="date" class="form-control form-control-sm" id="date_ended" name="date_ended" form="selectEmpForm">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 ">
                    <label for=""></label>
                    <button type="submit" class="btn btn-success full-size" form="selectEmpForm">ADD</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>


<script src="pages/stations/each_stations/employees/station_employees.js"></script>