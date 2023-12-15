<!-- <div class="card">
    <div class="card-header p-2">

    </div>
    <div class="card-body">

    </div>
</div> -->

<!-- <div class="row">
    <div class="col-lg-3">

    </div>
</div> -->

<div class="row">
    <div class="col-md-10">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="col-md-10">
                        <h4>VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</h4>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddWorkInv"><i class="fa fa-plus"></i>&nbsp;Add</button>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table_work_inv full-size table-sm" style="width: 100%; white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="10%">Action</th>
                                    <th>Org. Name and Address</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Total Hours</th>
                                    <th>Position</th>
                                    <th width="10%">Action</th>
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



<div class="modal fade mb-4" id="modalAddWorkInv">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Work Involvement <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="workInvForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit" form="workInvForm">
                <input type="hidden" name="work_inv_id" id="work_inv_id" form="workInvForm">
                <div class="col-md-12 mb-2">
                    <label for="name_address" class="form-label">Name and Address of Org.</label>
                    <input type="text" class="form-control form-control-sm" id="name_address" name="name_address" form="workInvForm">
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-6">
                    <label for="date_from" class="form-label">Date From</label>
                    <input type="date"  class="form-control form-control-sm" id="date_from" name="date_from" form="workInvForm">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date_to" class="form-label">Date To</label>
                    <input type="date" class="form-control form-control-sm" id="date_to" name="date_to" form="workInvForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="total_hours" class="form-label">Total Hours</label>
                    <input type="number" class="form-control form-control-sm" id="total_hours" name="total_hours" form="workInvForm">
                </div>
                <div class="col-md-6">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control form-control-sm" id="position" name="position" form="workInvForm">
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="workInvForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="assets/myCustomJs/work_inv.js"></script>

