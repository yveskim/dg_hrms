<div class="row">
    <div class="col-md-10">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="col-md-10">
                        <h4>V. WORK EXPERIENCE</h4>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddWorkXp"><i class="fa fa-plus"></i>&nbsp;Add</button>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table_work_xp full-size table-sm" style="width: 100%; white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="10%">Action</th>
                                    <th>Agency/Company</th>
                                    <th>Position/Title</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Monthly Salary</th>
                                    <th>Salary Grade</th>
                                    <th>Gov. Service</th>
                                    <th>Apt. Status</th>
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



<div class="modal fade mb-4" id="modalAddWorkXp">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Work Experience <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="workXpForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit">
                <input type="hidden" name="work_exp_id" id="work_exp_id">
                <div class="col-md-6 mb-2">
                    <label for="agency_company" class="form-label">Agency/Company</label>
                    <input type="text" class="form-control form-control-sm" id="agency_company" name="agency_company" form="workXpForm">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="position_title" class="form-label">Position/Title</label>
                    <input type="text" class="form-control form-control-sm" id="position_title" name="position_title" form="workXpForm">
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-6">
                    <label for="date_from" class="form-label">Date From</label>
                    <input type="date"  class="form-control form-control-sm" id="date_from" name="date_from" form="workXpForm">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date_to" class="form-label">Date To</label>
                    <input type="date" class="form-control form-control-sm" id="date_to" name="date_to" form="workXpForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="monthly_salary" class="form-label">Monthly Salary</label>
                    <input type="text" class="form-control form-control-sm" id="monthly_salary" name="monthly_salary" form="workXpForm">
                </div>
                <div class="col-md-6">
                    <label for="salary_grade" class="form-label">Salary Grade</label>
                    <select type="text" class="form-control form-control-sm" id="salary_grade" name="salary_grade" form="workXpForm">
                        <option value="">-</option>
                        <option value="SG1">SG1</option>
                        <option value="SG2">SG2</option>
                        <option value="SG3">SG3</option>
                        <option value="SG4">SG4</option>
                        <option value="SG5">SG5</option>
                        <option value="SG6">SG6</option>
                        <option value="SG7">SG7</option>
                        <option value="SG8">SG8</option>
                        <option value="SG9">SG9</option>
                        <option value="SG10">SG10</option>
                        <option value="SG11">SG11</option>
                        <option value="SG12">SG12</option>
                        <option value="SG13">SG13</option>
                        <option value="SG14">SG14</option>
                        <option value="SG15">SG15</option>
                        <option value="SG16">SG16</option>
                        <option value="SG17">SG17</option>
                        <option value="SG18">SG18</option>
                        <option value="SG19">SG19</option>
                        <option value="SG20">SG20</option>
                        <option value="SG21">SG21</option>
                        <option value="SG22">SG22</option>
                        <option value="SG23">SG23</option>
                        <option value="SG24">SG24</option>
                        <option value="SG25">SG25</option>
                        <option value="SG26">SG26</option>
                        <option value="SG27">SG27</option>
                        <option value="SG28">SG28</option>
                        <option value="SG29">SG29</option>
                        <option value="SG30">SG30</option>
                        <option value="SG31">SG31</option>
                        <option value="SG32">SG32</option>
                        <option value="SG33">SG33</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="gov_service" class="form-label">Government Service</label>
                    <select type="text" class="form-control form-control-sm" id="gov_service" name="gov_service" form="workXpForm">
                        <option value="">-</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="appointment_status" class="form-label">Appointment Status</label>
                    <select type="text" class="form-control form-control-sm" id="appointment_status" name="appointment_status" form="workXpForm">
                        <option value="">-</option>
                        <option value="Permanent">Permanent</option>
                        <option value="Probationary">Probationary</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Job Order">Job Order</option>
                        <option value="Temporary Replacement">Temporary Replacement</option>
                        <option value="OJT">OJT</option>
                    </select>
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="workXpForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="assets/myCustomJs/work_xp.js"></script>
