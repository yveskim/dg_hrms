
<div class="card card-fam-bg">
    <form id="edit-fam-bg-form"></form>
    <div class="card-header p-2 bg-secondary">
        <div class="row">
            <div class="col-lg-8">
                <h5>II. Family Background</h5>
            </div>
            <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-famBg" type="button" >Cancel</button>
            <div class="col-lg-2 float-right">
                <button class="btn btn-info full-size btn-sm fs-1" id="btn-edit-fam-bg" type="button" name="button" form="edit-fam-bg-form">Edit</button>
                <button class="btn btn-warning full-size btn-sm fs-1" id="btn-update-fam-bg" type="submit" name="button" form="edit-fam-bg-form">Apply Changes</button>
            </div>
        </div>  <!-- eor -->
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="sp_surname" class="col-sm-4 col-form-label">Spouse Surname:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="sp_surname" name="sp_surname" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="sp_fname" class="col-sm-4 col-form-label">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="sp_fname" name="sp_fname" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="sp_mname" class="col-sm-4 col-form-label">Middle Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="sp_mname" name="sp_mname" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>
        </div>  <!-- eor -->


        <div class="row">
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="_occupation" class="col-sm-4 col-form-label">Occupation:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="_occupation" name="_occupation" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="employer_business" class="col-sm-4 col-form-label">Employer/Business Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="employer_business" name="employer_business" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="business_address" class="col-sm-4 col-form-label">Business Address:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="business_address" name="business_address" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="contact_no" class="col-sm-4 col-form-label">Tel No./Contact #:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="contact_no" name="contact_no" readonly="true" form="edit-fam-bg-form">
                    </div>
                </div>
            </div>
        </div>  <!-- eor -->
    </div>
</div>

<hr class="bg-primary">


<div class="row">
    <div class="col-lg-12">
        <div class="card card-parents-info">
            <form id="parents-info-form"></form>
            <div class="card-header p-2 bg-secondary">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Parents Information</h5>
                    </div>
                    <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-parent" type="button" >Cancel</button>
                    <div class="col-lg-2 float-right">
                        <button class="btn btn-info full-size btn-sm fs-1 " id="btn-edit-parents-info" type="button" name="button" form="parents-info-form">Edit</button>
                        <button class="btn btn-warning full-size btn-sm fs-1 " id="btn-update-parents-info" type="submit" name="button" form="parents-info-form">Apply Changes</button>
                    </div>
                </div>  <!-- eor -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="employer_business" class="col-sm-4 col-form-label">Father Surname:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled" id="father_surname" name="father_surname" readonly="true" form="parents-info-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="father_firstname" class="col-sm-4 col-form-label">First Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled" id="father_firstname" name="father_firstname" readonly="true" form="parents-info-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="father_middlename" class="col-sm-4 col-form-label">Middle Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled" id="father_middlename" name="father_middlename" readonly="true" form="parents-info-form">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h6>Mother's Maiden Name</h6>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="mother_maiden_name" class="col-sm-4 col-form-label">Mother Surname:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled" id="mother_maiden_name" name="mother_maiden_name" readonly="true" form="parents-info-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="mother_firstname" class="col-sm-4 col-form-label">First Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled" id="mother_firstname" name="mother_firstname" readonly="true" form="parents-info-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="mother_middlename" class="col-sm-4 col-form-label">Middle Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled" id="mother_middlename" name="mother_middlename" readonly="true" form="parents-info-form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="bg-primary">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Children Information</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-10"><h4>List of Children</h4></div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddChildren"><i class="fa fa-plus"></i>&nbsp;Add</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover _table_children  table-sm" style="width: 100%; white-space: nowrap;">
                                    <thead class="bg-info">
                                        <tr>
                                            <th width="5%"></th>
                                            <th width="10%">Action</th>
                                            <th>Name</th>
                                            <th>Birthday</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
    </div><!-- end of left col-->
</div>



<div class="modal fade mb-4" id="modalAddChildren">
    <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Add Children <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="addChildrenForm">
            <div class="row">
                <input type="hidden" value="0" name="is_edit" id="is_edit">
                <input type="hidden" name="child_id" id="child_id">
                <div class="col-md-12 mb-4">
                    <label for="child_name" class="form-label">Child Complete Name</label>
                    <input type="text" class="form-control form-control-sm" id="child_name" name="child_name" form="addChildrenForm">
                </div>
                <div class="col-md-12 mb-4">
                    <label for="_birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control form-control-sm" id="_birthday" name="_birthday" form="addChildrenForm">
                </div>
            </div>
            <hr class="bg-success">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success full-size" form="addChildrenForm">SAVE</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="assets/myCustomJs/family_bg.js"></script>