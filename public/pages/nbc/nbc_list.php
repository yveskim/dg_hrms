<div class="card">
    <div class="card-header">
        <h4>SALARY SCHEDULE (NBC)</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 nbc-content-div">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddNbc"><i class="fa fa-plus"></i>&nbsp;Add New NBC</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table table-bordered table-hover table-nbc table-sm full-size" style=" white-space: nowrap;">
                                    <thead class="bg-info">
                                        <tr>
                                            <th></th>
                                            <th>Action</th>
                                            <th>NBC No</th>
                                            <th>Title</th>
                                            <th>Tranche</th>
                                            <th>Effectivity Date</th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="modal fade mb-4" id="modalAddNbc">
                        <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-primary">
                            <h4 class="modal-title">New NBC <span class="form-type text-warning"></span></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body" >
                            <!-- ----------------------------- -->
                            <form id="nbcForm">
                                <div class="row mb-2">
                                    <input type="hidden" value="0" name="is_edit" id="is_edit">
                                    <input type="hidden" name="nbc_id" id="nbc_id">
                                    <div class="col-md-6 mb-2">
                                        <label for="nbc_no" class="form-label">NBC No</label>
                                        <input type="text" class="form-control form-control-sm" id="nbc_no" name="nbc_no" form="nbcForm">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="nbc_title" class="form-label">NBC Title</label>
                                        <input type="text" class="form-control form-control-sm" id="nbc_title" name="nbc_title" form="nbcForm">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 mb-2">
                                        <label for="tranche" class="form-label">Tranche</label>
                                        <select class="form-control form-control-sm" name="tranche" id="tranche" form="nbcForm">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="effectivity_date" class="form-label">Effectivity Date</label>
                                        <input type="date" class="form-control form-control-sm" id="effectivity_date" name="effectivity_date" form="nbcForm">
                                    </div>
                                </div>
                            
                                <hr class="bg-success">
                                <br>
                                <div class="row mb-2">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success full-size" form="nbcForm">SAVE/UPDATE</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="pages/nbc/nbc_list.js"></script>