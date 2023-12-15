

<div class="row" >
    <div class="col-md-9" >
        <div class="row">
            <div class="col-md-10">
                <h4>REFERENCES <span><i class="text-danger" style="font-size: 1rem;">(Person not related by consanguinity or affinity to applicant/appointee)</i></span></h4>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddReference"><i class="fa fa-plus"></i>&nbsp;Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Add a maximum of three (3) references.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table_reference full-size table-sm" style="width: 100%; white-space: nowrap;">
                    <thead class="bg-info">
                        <tr>
                            <th width="5%"></th>
                            <th width="10%">Action</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
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



<div class="modal fade mb-4" id="modalAddReference">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">References <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="refForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit" form="refForm">
                <input type="hidden" name="ref_id" id="ref_id" form="refForm">
                <div class="col-md-12 mb-2">
                    <label for="ref_name" class="form-label">Reference Name</label>
                    <input type="text" class="form-control form-control-sm" id="ref_name" name="ref_name" form="refForm">
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-6">
                    <label for="ref_address" class="form-label">Reference Address</label>
                    <input type="text"  class="form-control form-control-sm" id="ref_address" name="ref_address" form="refForm">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="ref_contact" class="form-label">Contact Info</label>
                    <input type="text" class="form-control form-control-sm" id="ref_contact" name="ref_contact" form="refForm">
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="refForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="assets/myCustomJs/reference.js"></script>




