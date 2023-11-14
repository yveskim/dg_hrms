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
                        <h4>VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS / TRAINING / PROGRAMS ATTENDED</h4>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddLearningDev"><i class="fa fa-plus"></i>&nbsp;Add</button>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table_learning_dev full-size table-sm" style="width: 100%; white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="10%">Action</th>
                                    <th>Training Program</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Total Hours</th>
                                    <th>Type</th>
                                    <th>Conducted By</th>
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



<div class="modal fade mb-4" id="modalAddLearningDev">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Learning and Development <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="learningDevForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit">
                <input type="hidden" name="ld_id" id="ld_id">
                <div class="col-md-12 mb-2">
                    <label for="training_program" class="form-label">Training Program</label>
                    <input type="text" class="form-control form-control-sm" id="training_program" name="training_program" form="learningDevForm">
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-6">
                    <label for="date_from" class="form-label">Date From</label>
                    <input type="date"  class="form-control form-control-sm" id="date_from" name="date_from" form="learningDevForm">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date_to" class="form-label">Date To</label>
                    <input type="date" class="form-control form-control-sm" id="date_to" name="date_to" form="learningDevForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="total_hours" class="form-label">Total Hours</label>
                    <input type="number" class="form-control form-control-sm" id="total_hours" name="total_hours" form="learningDevForm">
                </div>
                <div class="col-md-6">
                    <label for="type" class="form-label">Type</label>
                    <select type="text" class="form-control form-control-sm" id="type" name="type" form="learningDevForm">
                        <option value="">-</option>
                        <option value="Managerial">Managerial</option>
                        <option value="Supervisory">Supervisory</option>
                        <option value="Technical">Technical</option>
                    </select>
                </div>
            </div>
             <div class="row mb-2">
                <div class="col-md-6">
                    <label for="conducted_by" class="form-label">Conducted / Sponsored By</label>
                    <input type="text" class="form-control form-control-sm" id="conducted_by" name="conducted_by" form="learningDevForm">
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="learningDevForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="assets/myCustomJs/learning_dev.js"></script>

