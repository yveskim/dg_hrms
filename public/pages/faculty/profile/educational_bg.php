

<div class="row">
    <div class="col-md-10">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="col-md-10">
                        <h4>III. EDUCATIONAL BACKGROUND</h4>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddEducBg"><i class="fa fa-plus"></i>&nbsp;Add</button>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table_educ_bg full-size table-sm" style="width: 100%; white-space:nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="10%">Action</th>
                                    <th>Level</th>
                                    <th>School</th>
                                    <th>Degree</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Year Graduated</th>
                                    <th>Units</th>
                                    <th>Scholarship</th>
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



<div class="modal fade mb-4" id="modalAddEducBg">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Educational Background <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="addEducBgForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit" form="addEducBgForm">
                <input type="hidden" name="educ_bg_id" id="educ_bg_id" form="addEducBgForm">
                <div class="col-md-6 mb-2">
                    <label for="educ_level" class="form-label">Education Level</label>
                    <select name="educ_level" id="educ_level" class="form-control form-control-sm" form="addEducBgForm">
                        <option value="">-</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High School">High School</option>
                        <option value="Vocational">Vocational</option>
                        <option value="College">College</option>
                        <option value="Masteral">Masteral</option>
                        <option value="Doctoral">Doctoral</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="school_name" class="form-label">School Name</label>
                    <input type="text" class="form-control form-control-sm" id="school_name" name="school_name" form="addEducBgForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <label for="_degree" class="form-label">Degree/Course</label>
                    <input type="text" class="form-control form-control-sm" id="_degree" name="_degree" form="addEducBgForm">
                </div>
                 <div class="col-md-6">
                    <label for="year_from" class="form-label">Year From</label>
                    <input type="date"  class="form-control form-control-sm" id="year_from" name="year_from" form="addEducBgForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="year_to" class="form-label">Year To</label>
                    <input type="date" class="form-control form-control-sm" id="year_to" name="year_to" form="addEducBgForm">
                </div>
                <div class="col-md-6">
                    <label for="highest_unit" class="form-label">Highest Grade/Level/Units Earned <i class="text-danger">(if not graduated)</i></label>
                    <input type="text" class="form-control form-control-sm" id="highest_unit" name="highest_unit" form="addEducBgForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="year_graduated" class="form-label">Year Graduated</label>
                    <input type="number" placeholder="____" class="form-control form-control-sm" id="year_graduated" name="year_graduated" form="addEducBgForm">
                </div>
                <div class="col-md-6">
                    <label for="academic_honors" class="form-label">Scholarship/Academic Honors</label>
                    <input type="text" class="form-control form-control-sm" id="academic_honors" name="academic_honors" form="addEducBgForm">
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="addEducBgForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>




<script type="text/javascript" src="assets/myCustomJs/educational_bg.js"></script>