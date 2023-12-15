

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-10">
                <h4>SPECIAL SKILLS / HOBBIES</h4>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddSkillsHobbies"><i class="fa fa-plus"></i>&nbsp;Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table_skills full-size table-sm" style="width: 100%; white-space: nowrap;">
                    <thead class="bg-info">
                        <tr>
                            <th width="5%"></th>
                            <th width="10%">Action</th>
                            <th>Special Skills/Hobbies</th>
                            <th>Non Academic Distinctions</th>
                            <th>Organization</th>
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
<div class="modal fade mb-4" id="modalAddSkillsHobbies">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Special Skills / Hobbies <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="skillsForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit" form="skillsForm">
                <input type="hidden" name="skills_id" id="skills_id" form="skillsForm">
                <div class="col-md-12 mb-2">
                    <label for="special_skills" class="form-label">Special Skills/Hobbies</label>
                    <input type="text" class="form-control form-control-sm" id="special_skills" name="special_skills" form="skillsForm">
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-6">
                    <label for="non_acad_distinctions" class="form-label">Non Academic Destinctions</label>
                    <input type="text"  class="form-control form-control-sm" id="non_acad_distinctions" name="non_acad_distinctions" form="skillsForm">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="organization" class="form-label">Organization</label>
                    <input type="text" class="form-control form-control-sm" id="organization" name="organization" form="skillsForm">
                </div>
            </div>
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="skillsForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="assets/myCustomJs/skills_hobbies.js"></script>


