

<div class="row">
    <div class="col-md-8">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="col-md-10">
                        <h4>IV. CIVIL SERVICE ELIGIBILITY</h4>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddEligibility"><i class="fa fa-plus"></i>&nbsp;Add</button>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table_eligibility full-size table-sm" style="width: 100%; white-space:nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="10%">Action</th>
                                    <th>Bord/CES/CSEE</th>
                                    <th>Rating</th>
                                    <th>Date of Exam</th>
                                    <th>Place of Exam</th>
                                    <th>License No.</th>
                                    <th>Valid Until</th>
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



<div class="modal fade mb-4" id="modalAddEligibility">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Eligibility <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="eligibilityForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit" form="eligibilityForm">
                <input type="hidden" name="elig_id" id="elig_id" form="eligibilityForm">
                <div class="col-md-6 mb-2">
                    <label for="board_bar" class="form-label">Board(Bar)/CES/CSEE</label>
                    <input type="text" class="form-control form-control-sm" id="board_bar" name="board_bar" form="eligibilityForm" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="_rating" class="form-label">Rating</label>
                    <input type="text" class="form-control form-control-sm" id="_rating" name="_rating" form="eligibilityForm" required>
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-6">
                    <label for="date_exam" class="form-label">Date of Exam</label>
                    <input type="date"  class="form-control form-control-sm" id="date_exam" name="date_exam" form="eligibilityForm" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="place_exam" class="form-label">Place of Exam</label>
                    <input type="text" class="form-control form-control-sm" id="place_exam" name="place_exam" form="eligibilityForm" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="license_no" class="form-label">License No.</label>
                    <input type="text" class="form-control form-control-sm" id="license_no" name="license_no" form="eligibilityForm" required>
                </div>
                <div class="col-md-6">
                    <label for="date_valid" class="form-label">Valid Until</label>
                    <input type="date" class="form-control form-control-sm" id="date_valid" name="date_valid" form="eligibilityForm" required>
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="eligibilityForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="assets/myCustomJs/eligibility.js"></script>
